<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('loginmodel');
		$this->clear_cache();
	}

	public function index()
	{
		if($this->session->userdata('adminid')) {
			redirect($this->config->base_url().'Dashboard');
		} else {
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
			if ($this->form_validation->run() == FALSE) {
				$this->data['errmsg']='Invalid username or password';
			} else {
				$this->data['errmsg']='';
				redirect($this->config->base_url().'Dashboard');
			}
		}

		$this->data['title']= 'Cherry Hire Admin Login';
		$this->load->view('login',$this->data);
	}

	function check_database($password)
	{
		//Field validation succeeded.  Validate against database
		$username = $this->input->post('username');
		//query the database
		$result = $this->loginmodel->login($username, $password);
		if($result) {
			$sess_array = array();
			foreach($result as $row) {
				$sess_array = array(
				'adminid' => $row->ad_id,
				'adminname' => $row->ad_name,
				'adminemail' => $row->ad_email,
				'logged_in' => TRUE
				);
				$this->session->set_userdata($sess_array);
			}
			return TRUE;
		} else {
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}
	}

	function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
}

/* End of file login.php */
/* Location: ./adminpanel/controllers/login.php */