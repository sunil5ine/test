<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Logout extends CI_Controller {

	public function index()
	{
		$array_items = array('cand_chid', 'cand_chname', 'cand_chemail', 'cand_chpwd', 'cand_chlogged_in');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect($this->config->base_url());
	}
}