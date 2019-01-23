<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Nopage extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('adminid')) { redirect($this->config->base_url().'login'); } // Handling Session
		$this->data['mid'] 		= 0;
		$this->data['sid'] 		= 0;
		$this->data['title'] 	= 'Cherry Hire - 404';
		$this->data['pagehead'] = '404 - Not Found';
		$this->data['left_nav']	= $this->load->view('common/leftmenu',$this->data,true);
		$this->data['top_nav']	= $this->load->view('common/topmenu',$this->data,true);
		$this->load->view('nopage_404',$this->data); 
	}
}