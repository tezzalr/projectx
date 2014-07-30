<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Myplan extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('mmycash');
        $this->load->model('mmyplan');
        $this->load->model('mlabel');
    }
    /**
     * Method for page (public)
     */
    public function index()
    {

		$data['title'] = "My Cash";
	
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('home/index','',TRUE);

		$this->load->view('front',$data);
        
    }
    
    public function add_new()
    {
    	$data['title'] = "Add My Plan";
		$rab_id = $this->uri->segment(3);
		$myplans = $this->mmyplan->get_myplan_by_RAB($rab_id);
		$myplans_td = $this->load->view('myplan/_table_myplan_td',array('myplans' => $myplans),TRUE);
		$rab = $this->mmyplan->get_rab_by_id($rab_id);
		$labels = $this->mlabel->get_all_label();
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('myplan/add',array('myplans_td' => $myplans_td, 'labels' => $labels, 'rab' => $rab),TRUE);

		$this->load->view('front',$data);
    }
    
    public function submit_new()
    {
    	$my_plan['max_amount'] = $this->input->post('amount');
    	$my_plan['detail'] = $this->input->post('detail');
    	$my_plan['rab_id'] = $this->uri->segment(3);
    	if($this->input->post('label')!='new'){
    		$my_plan['label_id'] = $this->input->post('label');
    	}
    	else{
    		$label['name'] = $this->input->post('new_label');
    		$label['priority'] = 1;
    		$my_plan['label_id'] = $this->mlabel->insert_get_new_label($label);
    		//make new label
    	}
    	
    	if($this->mmyplan->insert_my_plan_real($my_plan)){
    		if($this->input->post('repeat') == 'yes'){
    			$fix_plan['label_id'] = $my_plan['label_id'];
    			$fix_plan['detail'] = $my_plan['detail'];
    			$fix_plan['max_amount'] = $my_plan['max_amount'];
    			if($this->mmyplan->insert_fix_plan($fix_plan)){
    				$json['status']= 1;
    			}	
    		}else{
    			$json['status']= 1;
    		}
		}else{
			$json['status']= 0;
		}
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    	
    }
    
    public function load_all_my_plan(){
    	$rab_id = $this->uri->segment(3);
    	$myplans = $this->mmyplan->get_myplan_by_RAB($rab_id);
		$myplans_td = $this->load->view('myplan/_table_myplan_td',array('myplans' => $myplans),TRUE);
		
		echo $myplans_td;
    }
    
    public function budgeting(){
    	$data['title'] = "Budgeting";
	
		$allrab = $this->mmyplan->get_all_rab();
		$rab_td = $this->load->view('myplan/_rab_td',array('allrab' => $allrab),TRUE);
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('myplan/budgeting',array('rab_td' => $rab_td),TRUE);

		$this->load->view('front',$data);
    }
    
    public function load_all_rab(){
    	$allrab = $this->mmyplan->get_all_rab();
		$rab_td = $this->load->view('myplan/_rab_td',array('allrab' => $allrab),TRUE);
		
		echo $rab_td;
    }
    public function submit_new_rab()
    {
    	$rab['month'] = $this->input->post('month');
    	$rab['year'] = $this->input->post('year');
    	
    	if($this->mmyplan->insert_rab($rab)){
    		if($this->mmyplan->insert_fix_plan_to_rab($rab['month'], $rab['year'])){
    			$json['status']= 1;	
    		}
    	
		}else{
			$json['status']= 0;
		}
        $this->output->set_content_type('application/json')
                     ->set_output(json_encode($json));
    	
    }
    
}
