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
			$this->session->set_flashdata('check_database', 'Invalid username or password');
			
			return false;
		}
	}

	public function forgot()
	{
		$email =  $this->input->post('email');
		$this->load->helper('string');
		
		$rand = date('Ydm').random_string('numeric', 10);
		if($this->loginmodel->chekexist($email,$rand))
		{
			$config = Array(
				'protocol' => 'mail',
				'smtp_host' => 'mail.cherryhire.com',
				'smtp_port' => 587,
				'smtp_user' => 'no-reply@cherryhire.com',
				'smtp_pass' => 'Chire@DNply',
				'mailtype'  => 'html', 
				'wordwrap'  =>true,
				'charset'   => 'utf-8'
			);

			$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
			<html>
			
			<head>
			  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
			  <title>Reset your Cherry Hire password</title>
			</head>
			
			<body>
			  <div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 13px; background:#CCC; border:1px solid #CCC; margin:0px auto; padding:30px;">
				<p><img src="http://www.cherryhire.com/candidate/images/adminlogo.png" alt="Cherry Hire"></p> <br />
				<div style="background:#fff; border:1px solid #999; margin:0px auto; padding:10px;">
				  <p>Hi Admin<p> <br />
					  <p>Somebody recently asked to reset your Cherry Hire account password.</p>
					  <p style="font-size:18px; margin:10px 0px 10px 0px;">
						<h1><strong>Code :'.$rand.' </strong></h1>
					  </p>
					  <p>Click here to <strong><a href="'.$this->config->base_url("forgotp/").$rand.'">reset</a></strong>
						your password.</p>
					  <p>If you did not request a new password, please let us know immediately at support@cherryhire.com</p>
					  <p>See you soon on CherryHire.</p>
					  <p>-- </p>
					  <p>Regards, <br> - Cherry Hire Team</p>
				</div>
			  </div>
			</body>
			
			</html>';
			$this->load->library('email', $config);
			$this->email->set_newline('\r\n');
			
			$this->email->from('no-reply@cherryhire.com', 'Cherryhire');
			$this->email->to($email);
			$this->email->bcc('support@cherryhire.com');
			
			$this->email->subject('Reset your Cherry Hire password');
			$this->email->message($message);
			
			if($this->email->send())
			{
				$this->session->set_flashdata('success', 'A message has been sent to'.$email.' <br>with instruction to reset yor password');
				redirect(base_url());
			}
			else{
				echo $this->email->print_debugger();
			}
			
		}else{
			$this->session->set_flashdata('check_database', 'Invalid email address');
			redirect(base_url());			
		}
	}

	function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
	}
	
	public function forgotp($var = null)
	{
		$data['title'] = "Reset Password";
		if($this->loginmodel->getpfror($var))
			{
			$this->session->set_flashdata('success', 'Your Email Address is successfuly verified!<br> Please reset your password');
				$this->load->view('reset',$data);
			}
		else{
			$this->session->set_flashdata('check_database', 'Reset password link hasbeen expaired.');
			redirect(base_url());
		}
	}

	public function reset()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'trim|required|callback_check_email');
		$this->form_validation->set_rules('pwd1', 'Password', 'required');
		$this->form_validation->set_rules('pwd2', 'Password Confirmation', 'required');
		if ($this->form_validation->run() == FALSE) {
			
		} else {
			
		}
		
	}
}

/* End of file login.php */
/* Location: ./adminpanel/controllers/login.php */