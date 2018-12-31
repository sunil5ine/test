<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

		$this->clear_cache();

		$this->load->library('email'); // load email library

		$this->load->model('loginmodel');		

		$this->data['thisyear'] = date('Y');

	}



	public function index()

	{

		$this->data['errmsg']='';

		

		if($this->input->get('sent') == 1 && $this->input->get('process') == 'reset'  && $this->input->get('status') == 'success') {

			 $this->data['status'] = 'success';

			 $this->data['errmsg'] = '<div style="margin-top: 16px;" class="alert alert-success">

			 <button data-dismiss="alert" class="close" type="button">&times;</button> The password reset link has been sent to your email account, please follow the same to reset your password. </div>';

		 }

		 if($this->input->get('sent') == 2 && $this->input->get('process') == 'reset'  && $this->input->get('status') == 'fail') {

			 $this->data['status'] = 'fail';

			 $this->data['errmsg'] = '<div style="margin-top: 16px;" class="alert alert-danger">

			 <button data-dismiss="alert" class="close" type="button">&times;</button> Unable to process your request. Please try again</div>';

		 }

		 if($this->input->get('sent') == 3 && $this->input->get('process') == 'reset'  && $this->input->get('status') == 'invalid') {

			 $this->data['status'] = 'fail';

			 $this->data['errmsg'] = '<div style="margin-top: 16px;" class="alert alert-danger">

			 <button data-dismiss="alert" class="close" type="button">&times;</button> Invalid Request - Email id not exiting. Unable to process!</div>';

		 }



		 if($this->input->get('accept') == 1 && $this->input->get('process') == 'reset'  && $this->input->get('status') == 'invalid') {

			 $this->data['status'] = 'fail';

			 $this->data['errmsg'] = '<div style="margin-top: 16px;" class="alert alert-danger">

			 <button data-dismiss="alert" class="close" type="button">&times;</button> Sorry, Unable to process. <br> Your password reset link has been expired or Invalid request!</div>';

		 }



		 if($this->input->get('accept') == 101 && $this->input->get('process') == 'reset'  && $this->input->get('status') == 'success') {

			 $this->data['status'] = 'success';

			 $this->data['errmsg'] = '<div style="margin-top: 16px;" class="alert alert-success">

			 <button data-dismiss="alert" class="close" type="button">&times;</button> Your password has been successfully reset. Login to proceed! </div>';

		 }

		 

		

		if($this->session->userdata('cand_chid')) {

			redirect($this->config->base_url().'MyProfile');

		} else {

			$this->form_validation->set_rules('emailid', 'Username', 'trim|required');

			$this->form_validation->set_rules('pwd', 'Password', 'trim|required|callback_check_database');

			if ($this->form_validation->run() == FALSE) {

				if ($this->input->post('emailid')) {

				$this->data['errmsg']='<div style="margin-top: 16px;" class="alert alert-danger">

	             <button data-dismiss="alert" class="close" type="button">x</button> Login attempt failed! '.validation_errors().'</div>';		

				}

			} else {

				$this->data['errmsg']='';
				redirect($this->config->base_url().'MyProfile');

			}

		}



		

        $this->data['title']	= 'CherryHire - Candidate';

        $this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';

        $this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';

        $this->data['cmid'] 	= 0;

		// $this->load->view('common/frontend/header',$this->data);
		// $this->load->view('common/frontend/candidate-menu',$this->data);
		// $this->load->view('loginmain',$this->data);
		// $this->load->view('common/frontend/footer',$this->data);

		$this->load->view('new/candidate-loggin',$this->data);

	}



	function check_database($password)

	{

		//Field validation succeeded.  Validate against database

		$username = $this->input->post('emailid');

		//query the database

		$result = $this->loginmodel->login($username, $password);


		if($result) {

			$sess_array = array();

			foreach($result as $row) {

				$sess_array = array(

					'cand_chid' => $row->can_id,

					'cand_chname' => $row->can_fname.' '.$row->can_lname,

					'cand_chemail' => $row->can_email,

					'propics' => $row->can_propic,

					'cand_chlogged_in' => TRUE

				);

				$this->session->set_userdata($sess_array);

			}
// echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';exit;
			return TRUE;

		} else {

			$this->form_validation->set_message('check_database', 'Invalid username or password');

			return false;

		}

	}

	

	function cpwd_request()

	{

		$this->data['errmsg']='';

		if($this->input->get('pid') && $this->input->get('exp') && $this->input->get('auth')) {



			$verifydata = $this->loginmodel->verify_recover_data($this->input->get('auth'));



			if(empty($verifydata)) { redirect($this->config->base_url().'LoginProcess/?process=reset&accept=1&status=invalid&vr=101'); }

			

			$get_encrypt_id = base64_decode($this->input->get('pid'));

			$get_expdt = $this->input->get('exp');

			$get_auth = $this->input->get('auth');





			$r_encrypt_id = $verifydata['cpwd_encrypt_id'];

			$r_auth = $verifydata['cpwd_vcode'];

			$r_expdt = strtotime($verifydata['cpwd_reqtime']);

			$expDate = date('Y-m-d H:i:s', strtotime('+1 day', $r_expdt));			

			$nowDate = time();



			if($nowDate > strtotime($expDate)) {  

				redirect($this->config->base_url().'LoginProcess/?process=reset&accept=1&status=invalid&vr=102');  

			}

			if($r_encrypt_id != $get_encrypt_id) {  

				redirect($this->config->base_url().'LoginProcess/?process=reset&accept=1&status=invalid&vr=103');  

			}

			if($r_auth != $get_auth) {

				redirect($this->config->base_url().'LoginProcess/?process=reset&accept=1&status=invalid&vr=104'); 

			}



			$this->data['encrypt_id']	= $r_encrypt_id;

			$this->data['auth_id']		= $r_auth;

			$this->data['title']		= 'CherryHire - Candidate';

        	$this->data['metakey']		= 'HR Solutions, Cherry Hire, IPF';

        	$this->data['metadesc']		= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';

        	$this->data['cmid'] 		= 0;

			$this->load->view('common/frontend/header',$this->data);

			$this->load->view('common/frontend/candidate-menu',$this->data);

			$this->load->view('resetmain',$this->data);

			$this->load->view('common/frontend/footer',$this->data);



		} else {

		 	redirect($this->config->base_url().'LoginProcess/?process=reset&accept=1&status=invalid&vr=105');

		}

		

	}



	function confirm_reset_request()

	{

		$this->data['errmsg']='';

		if($this->input->post('encrypt_id') && $this->input->post('auth_id') && $this->input->post('npwd') && $this->input->post('vcode')) {			

			$rstatus = $this->loginmodel->confirm_reset_request();

			if($rstatus == 1) {

				redirect($this->config->base_url().'LoginProcess/?process=reset&accept=101&status=success');

			} else {

				redirect($this->config->base_url().'LoginProcess/?process=reset&accept=1&status=invalid&vr=106');

			}

			

		} else {

			redirect($this->config->base_url().'LoginProcess/?process=reset&accept=1&status=invalid&vr=107');

		}



	}

	

	function fpwd_request()

	{

		$this->data['errmsg']='';

		$this->data['uemail'] = $this->input->post('uemail');

		

		$this->form_validation->set_rules('uemail', 'Email Account', 'trim|required|valid_email|callback_check_userbase');

		if ($this->form_validation->run() == FALSE) {

			redirect($this->config->base_url().'LoginProcess/?process=reset&sent=3&status=invalid');

		} else {

			$cpwd_id = $this->loginmodel->recover_set($this->data['uemail']);

			$fwmailstatus = $this->fsendmail($cpwd_id);

			//$fwmailstatus = 1;

			if($fwmailstatus == 1) {

				redirect($this->config->base_url().'LoginProcess/?process=reset&sent=1&status=success');

			} else {

				redirect($this->config->base_url().'LoginProcess/?process=reset&sent=2&status=fail');

			}

		}

	}

	

	/** 

	* New Password Function

	*

	* @return array

	*/

	public function newpwd_request()

	{

		$this->data['errmsg']='';

		$this->data['title']= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';

		$this->data['metakey']= 'HR Solutions, Cherry Hire, IPF';

		$this->data['metadesc']= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';

		$this->data['cmid'] = 0;

		$this->data['title'] = 'Cherry Hire App - Get Jobs';

		$this->load->view('common/frontend/header',$this->data);

		$this->load->view('common/frontend/candidate-menu',$this->data);

		$this->load->view('forgotpwd',$this->data);

		$this->load->view('common/frontend/footer',$this->data);

	}

	

	function check_userbase($uid)

	{

		//Field validation succeeded.  Validate against database

		$username = $this->input->post('uemail');

		//query the database

		$result = $this->loginmodel->checkuser($uid);

		if($result>0) {

			return TRUE;

		} else {

			$this->form_validation->set_message('check_database', 'Invalid username or password');

			return false;

		}

	}

	

	function fsendmail($cpwd_id=null)

	{

		$resetdetails = $this->loginmodel->get_recover_data($cpwd_id);

		if(empty($resetdetails)) {

			redirect($this->config->base_url().'LoginProcess/?process=reset&sent=2&status=fail');

		}

		$candname = $resetdetails['can_fname'].' '.$resetdetails['can_lname'];

		$to = $resetdetails['can_email'];

		$from = 'do-not-reply@cherryhire.com';

		$subject = 'Reset your Cherry Hire password';

		$startDate = time();

		$expdt = strtotime(date('Y-m-d H:i:s', strtotime('+1 day', $startDate)));



		$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

					<html>

					<head>

					  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

					  <title>Reset your Cherry Hire password</title>

					</head>

					<body>

					<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 13px; background:#CCC; border:1px solid #CCC; margin:0px auto; padding:30px;">

						<p><img src="http://www.cherryhire.com/candidate/images/adminlogo.png" alt="Cherry Hire"></p>

						<br />

						<div style="background:#fff; border:1px solid #999; margin:0px auto; padding:10px;">

							<p>Hi '.$candname.'!<p>

							<br />

							<p>Somebody recently asked to reset your Cherry Hire account password.</p>

							<p style="font-size:18px; margin:10px 0px 10px 0px;"><h1><strong>Code : '.$resetdetails['cpwd_otp'].'</strong></h1></p>

							<p>Click here to <strong><a href="'.$this->config->base_url().'User/ResetInitiate/?process=change&pid='.base64_encode($resetdetails['cpwd_encrypt_id']).'&exp='.$expdt.'&auth='.$resetdetails['cpwd_vcode'].'">reset</a></strong> your password.</p>

							

							<p>If you did not request a new password, please let us know immediately at support@cherryhire.com</p>

							

							<p>See you soon on CherryHire.</p>

							<p>-- </p>

					  		<p>Regards, <br> - Cherry Hire Team</p>

							

						</div>

					</div>

					</body>

					</html>';



		$config['protocol'] 	= "mail";

		$config['smtp_crypto']	= "ssl"; 

		$config['smtp_host'] 	= "smtp.zoho.com";

		$config['smtp_user'] 	= "do-not-reply@cherryhire.com";

		$config['smtp_pass'] 	= "Chire@DNply";

		$config['smtp_port'] 	= "465"; //587

		$config['charset']		= "utf-8";

		$config['newline']		= "\r\n";

		$config['crlf'] 		= "\r\n";

		$config['mailtype'] 	= 'html';

		

		$this->email->initialize($config);		

		$this->email->clear(TRUE);

		$this->email->set_newline("\r\n");

		$this->email->from($from, 'CherryHire');

		$this->email->to($to);

		//$this->email->cc('sreejith@aatoon.com');

		$this->email->subject($subject);

		$this->email->message($message);

		if ($this->email->send()) {

			//echo "Mail Sent!";

			return 1;

		} else {

			//echo "There is error in sending mail!";

			return 0;

		}

	}



	function clear_cache()

    {

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");

        $this->output->set_header("Pragma: no-cache");

	}
	

	public function linkedin()
	{
		if (empty($_GET["action"])) {
			require_once 'config.php';
			require ('oauth/http.php');
			require ('oauth/oauth_client.php');
			
			if (!empty($_GET["oauth_problem"])) {
				$error1 = $_GET["oauth_problem"];
			}
			
			$client = new oauth_client_class();
			
			$client->debug = false;
			$client->debug_http = true;
			$client->redirect_uri = REDIRECT_URI;
			$client->server = "LinkedIn";
			$client->client_id = CLIENT_ID;
			$client->client_secret = CLIENT_SECRET;
			$client->scope = SCOPE;
			
			if (($success = $client->Initialize())) {
				if (($success = $client->Process())) {
					if (strlen($client->authorization_error)) {
						$client->error = $client->authorization_error;
						$success = false;
					} elseif (strlen($client->access_token)) {
						$success = $client->CallAPI('http://api.linkedin.com/v1/people/~:(id,email-address,location,first-name,last-name,picture-url,public-profile-url,formatted-name,specialties,summary,industry,positions,num-connections,honors-awards,educations,skills)', 'GET', array(
							'format' => 'json'
						), array(
							'FailOnAccessError' => true
						), $user);
					}
				}
				$success = $client->Finalize($success);
				
			}
			if ($client->exit) {
				exit();
			}
			if ($success) {
				$insert = $this->loginmodel->linkedin($user);
				$sess_array = array(

					'cand_chid' => $insert->can_id,

					'cand_chname' => $insert->can_fname.' '.$insert->can_lname,

					'cand_chemail' => $insert->can_email,

					'propics' => $insert->can_propic,

					'cand_chlogged_in' => TRUE,
					'type'	=>'linkedin',

				);

				$this->session->set_userdata($sess_array);

				
				redirect('login','refresh');
				
								
			} else {
				$error = $client->error;
				
				$this->session->set_flashdata('error', '<div style="margin-top: 16px;" class="alert alert-success"><button data-dismiss="alert" class="close" type="button">&times;</button> Something went wrong. Please try agin </div>');
				redirect('login','refresh');
				
			}
		} 
		
		else {
			$_SESSION = array();
			unset($_SESSION);
			session_destroy();
			redirect('login','refresh');
		}
	}

}



/* End of file login.php */

/* Location: ./candidate/controllers/login.php */