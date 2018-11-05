<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Logout controller for this App.
 *
 * @package    CI
 * @subpackage Controller
 * @author     Sreejith Gopinath <sreejith@aatoon.com>
 */

class Logout extends CI_Controller {

	/** 
	* Index Function
	*
	* @return array
	*/
	public function index()
	{
		$array_items = array('hireid', 'hirename', 'hireemail', 'hirepwd', 'hireurl', 'logged_in');
		$this->session->unset_userdata($array_items);
		$this->session->sess_destroy();
		redirect($this->config->base_url().'login');
	}
}