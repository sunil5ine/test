<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->clear_cache();
		
		if(!$this->session->userdata('adminid')) { redirect($this->config->base_url().'login'); }
		$this->load->model('dashboardModel');
		
	}

	public function index()
	{
		$data['contCandidate'] = $this->dashboardModel->getCandidate(); 
		exit;
		$this->load->view('Dashboard/dashboard');
		
	}
	
	function clear_cache()
    {
    
    }
}

