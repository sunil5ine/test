<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->clear_cache();
		
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
		// $data['chartEmployee']  = $this->NewemployeeYear();

		$this->load->view('Dashboard/dashboard',$data);
	}
	
	function NewemployeeYear()
    {
		$wnf = date('Y-m-d',strtotime(date('Y-01-01')));
		$data['monts'] = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
		$employers = $this->dashboardModel->newEmployee($wnf);
		
		
		print_r ($employers);
		
		$data = 0;
		foreach ($employers as $key => $value) {
			// $mothry = date('m',strtotime($value->emp_reg_date));
			// if( $mothry == 10){
			// 	$data['10'] = $data['10'] + count($value->emp_reg_date);
			// }
		}
		// echo $data10;

		exit;

    }
}

