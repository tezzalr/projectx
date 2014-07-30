<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Mycash extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('mmycash');
        $this->load->model('mlabel');
        $this->load->model('mmerchant');
    }
    /**
     * Method for page (public)
     */
    public function index()
    {

		$data['title'] = "My Cash";
	
		$sumallmycash = $this->mmycash->get_position_by_RAB(1);
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('home/index',array('sumallmycash' => $sumallmycash),TRUE);

		$this->load->view('front',$data);
        
    }
    
    public function cash_flow()
    {
    	$data['title'] = "My Cash Flow";
    	
    	$allmylabel = $this->mmycash->get_mycash_labelsort_by_RAB(1);
		$mylabelflow_td = $this->load->view('mycash/_table_mylabel_td',array('allmylabel' => $allmylabel),TRUE);
	
		//$allmycash = $this->mmycash->get_mycash_by_RAB(1);
		$sumallmycash = $this->mmycash->get_position_by_RAB(1);
		//$mycashflow_td = $this->load->view('mycash/_table_mycash_td',array('allmycash' => $allmycash),TRUE);
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('mycash/cash_flow',array('mylabelflow_td' => $mylabelflow_td, 'sumallmycash' => $sumallmycash),TRUE);

		$this->load->view('front',$data);
    }
    
    public function mypoint()
    {
    	$data['title'] = "My Point";
	
		$allpromo = $this->mmycash->get_all_promo();
		$mypoint = $this->mmycash->get_user('tezzalr');
		$promo_point_td = $this->load->view('mycash/_promo_point_td',array('allpromo' => $allpromo),TRUE);
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('mycash/mypoint',array('promo_point_td' => $promo_point_td, 'mypoint' => $mypoint->point),TRUE);

		$this->load->view('front',$data);
    }
    
    function redeem_point()
    {
    	$point = $this->uri->segment(3);
    	
    	if($this->mmycash->redeem_my_point($point)){
			redirect('mycash/mypoint');
		}
    }
    
    public function emoney()
    {
    	$data['title'] = "E-Money";
	
		$allmycash = $this->mmycash->get_mycash_by_RAB(1);
		$sumallmycash = $this->mmycash->get_position_by_RAB(1);
		$mycashflow_td = $this->load->view('mycash/_table_mycash_td',array('allmycash' => $allmycash),TRUE);
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('mycash/emoney',array('sumallmycash' => $sumallmycash),TRUE);

		$this->load->view('front',$data);
    }
    
    function bayar_emoney()
    {
    	$merchant = $this->uri->segment(3);
    	$my_cash['kind'] = 'Expense';
    	$my_cash['date'] = date('Y-m-d');
    	if($merchant == 'tol'){
			$my_cash['amount'] = 8500;
			$my_cash['detail'] = 'Pintu Tol Pondok Indah';
			$my_cash['merchant_id'] = 9;
			$my_cash['label_id'] = 10;
    	}
    	elseif($merchant == 'indomaret'){
    		$my_cash['amount'] = 200000;
			$my_cash['detail'] = 'Indomaret Pondok Kopi';
			$my_cash['merchant_id'] = 7;
			$my_cash['label_id'] = 15;
    	}
    	else{
    		$my_cash['amount'] = 200000;
			$my_cash['detail'] = 'SPBU Pertamina Kuningan';
			$my_cash['merchant_id'] = 6;
			$my_cash['label_id'] = 10;
    	}
    	
    	if($this->mmycash->insert_my_cash($my_cash)){
			redirect('mycash/cash_flow');
		}
    }
    
    public function load_label_flow()
    {
    	$allmylabel = $this->mmycash->get_mycash_labelsort_by_RAB(1);
		$mylabelflow_td = $this->load->view('mycash/_table_mylabel_td',array('allmylabel' => $allmylabel),TRUE);
		
		echo $mylabelflow_td;
    }
    
    public function load_cash_flow()
    {
    	$allmycash = $this->mmycash->get_mycash_by_RAB(1);
		$mycashflow_td = $this->load->view('mycash/_table_mycash_td',array('allmycash' => $allmycash),TRUE);
		
		echo $mycashflow_td;
    }
    
    public function add_new()
    {
    	$data['title'] = "Add My Cash";
	
		$labels = $this->mlabel->get_all_label();
		$merchants = $this->mmerchant->get_all_merchant();
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('mycash/add',array('labels' => $labels, 'merchants' => $merchants),TRUE);

		$this->load->view('front',$data);
    }
    
    public function submit_new()
    {
    	$my_cash['kind'] = $this->input->post('kind');
    	$my_cash['date'] = DateTime::createFromFormat('d/m/Y', $this->input->post('date'))->format('Y-m-d');
    	$my_cash['amount'] = $this->input->post('amount');
    	$my_cash['detail'] = $this->input->post('detail');
    	$my_cash['akun_id'] = $this->input->post('akun');
    	$my_cash['merchant_id'] = $this->input->post('merchant');
    	if($this->input->post('label')!='new'){
    		$my_cash['label_id'] = $this->input->post('label');
    	}
    	else{
    		$label['name'] = $this->input->post('new_label');
    		$label['priority'] = 1;
    		$my_cash['label_id'] = $this->mlabel->insert_get_new_label($label);
    		//make new label
    	}
    	
    	if($this->mmycash->insert_my_cash($my_cash)){
    		redirect('mycash/cash_flow');
    	}
    }
}
