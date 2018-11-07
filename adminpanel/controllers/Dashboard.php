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
		/** Counts */
		$data['contCandidate'] = $this->dashboardModel->getCandidate(); 
		$data['employers']     = $this->dashboardModel->getEmployers(); 
		$data['jobscont']      = $this->dashboardModel->countofJobs(); 

		/** aprovels */
		$data['alempr']     	= $this->dashboardModel->allempr();
		$data['pempr'] 			= $this->dashboardModel->pempr();
		$data['pcand'] 			= $this->dashboardModel->pcand();
		$data['acand']     		= $this->dashboardModel->acand();


		$this->load->view('Dashboard/dashboard',$data);
	}
	
	function clear_cache()
    {
    
    }
}

