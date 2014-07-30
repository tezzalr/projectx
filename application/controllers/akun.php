<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Akun extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('mmycash');
        $this->load->model('mlabel');
        $this->load->model('mmerchant');
        $this->load->model('makun');
    }
    /**
     * Method for page (public)
     */
    public function index()
    {

		$data['title'] = "Halaman Akun";
	
		$accounts = $this->makun->get_all_akun_with_child();
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('akun/akun_page',array('accounts' => $accounts),TRUE);

		$this->load->view('front',$data);
        
    }
    
    
    public function add_akun()
    {
    	$data['title'] = "Add My Account";
	
		$parents = $this->makun->get_all_akun_parent();
		
		$data['header'] = $this->load->view('shared/header','',TRUE);	
		$data['footer'] = $this->load->view('shared/footer','',TRUE);
		$data['content'] = $this->load->view('akun/add_akun',array('parents' => $parents),TRUE);

		$this->load->view('front',$data);
    }
    
    public function submit_new_akun()
    {
    	$akun['name'] = $this->input->post('name');
    	$akun['amount'] = $this->input->post('amount');
    	$akun['note'] = $this->input->post('detail');
    	
    	if($this->input->post('real_source')){
    		$akun['parent_id'] = $this->input->post('real_source');
    	}
    	
    	if($this->makun->insert_akun($akun)){
    		redirect('akun');
    	}
    }
}
