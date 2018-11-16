<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logout extends CI_Controller {

	public function index()
	{
		$array_items = array('adminid', 'adminname', 'adminemail', 'logged_in');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect($this->config->base_url().'login');
	}

	function test()
	{
		$data['title'] = 'Add New admin';
		$this->load->view('dashboard/new-admin', $data, FALSE);
		
	}
}