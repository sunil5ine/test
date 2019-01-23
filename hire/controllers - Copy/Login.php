<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Login controller for this App.
 *
 * @package    CI
 * @subpackage Controller
 * @author     Sreejith Gopinath <sreejith@aatoon.com>
 */
 
class Login extends CI_Controller {

	/** 
	* Init Function
	*
	* @return void
	*/
	public function __construct()
	{
		parent::__construct();
		$this->load->library('email'); // load email library
		$this->load->model('loginmodel');
		$this->clear_cache();
		$this->data['thisyear'] = date('Y');
		$this->data['emid'] 	= 0;
		$this->data['cmid'] 	= 0;
	}

	/** 
	* Index Function
	*
	* @return array
	*/
	public function index()
	{
		$this->data['errmsg']='';
		$this->data['message'] = '';
		
		if($this->input->get('sent') == 1 && $this->input->get('process') == 'reset'  && $this->input->get('status') == 'success')
		 {
			 $this->data['status'] = 'success';
			 $this->data['errmsg'] = '<div style="margin-top: 16px;" class="alert alert-success">
			 <button data-dismiss="alert" class="close" type="button">&times;</button> The password reset link has been sent to your email account, please follow the same to reset your password. </div>';
		 }
		 if($this->input->get('sent') == 2 && $this->input->get('process') == 'reset'  && $this->input->get('status') == 'fail')
		 {
			 $this->data['status'] = 'fail';
			 $this->data['errmsg'] = '<div style="margin-top: 16px;" class="alert alert-danger">
			 <button data-dismiss="alert" class="close" type="button">&times;</button> Unable to process your request. Please try again</div>';
		 }
		 if($this->input->get('sent') == 3 && $this->input->get('process') == 'reset'  && $this->input->get('status') == 'invalid')
		 {
			 $this->data['status'] = 'fail';
			 $this->data['errmsg'] = '<div style="margin-top: 16px;" class="alert alert-danger">
			 <button data-dismiss="alert" class="close" type="button">&times;</button> Invalid Request - Email id not exiting. Unable to process!</div>';
		 }

		 if($this->input->get('accept') == 1 && $this->input->get('process') == 'reset'  && $this->input->get('status') == 'invalid')
		 {
			 $this->data['status'] = 'fail';
			 $this->data['errmsg'] = '<div style="margin-top: 16px;" class="alert alert-danger">
			 <button data-dismiss="alert" class="close" type="button">&times;</button> Sorry, Unable to process. <br> Your password reset link has been expired or Invalid request!</div>';
		 }

		 if($this->input->get('accept') == 101 && $this->input->get('process') == 'reset'  && $this->input->get('status') == 'success')
		 {
			 $this->data['status'] = 'success';
			 $this->data['errmsg'] = '<div style="margin-top: 16px;" class="alert alert-success">
			 <button data-dismiss="alert" class="close" type="button">&times;</button> Your password has been successfully reset. Login to proceed! </div>';
		 }
		 
		 if($this->input->get('vr') == 1)
		{
			$this->data['status'] = 'success';
			$this->data['message'] = '<div class="alert alert-success fade in">
			<strong>Success!</strong> Your email account has been verified!!! <br > We will get back to you once the activation is done from our end. <br> In case you do not hear from us in 48hrs, you can reach us on support@cherryhire.com. </div>';
		}
		
		if($this->input->get('vr') == 2)
		{
			$this->data['status'] = 'fail';
			$this->data['message'] = '<div class="alert alert-danger fade in">
			<strong>Failed!</strong> Sorry, we are unable to process your request. The email verification has been failed. Contact our support team on support@cherryhire.com to proceed.
		  </div>';
		}
		
		if($this->input->get('vr') == 3)
		{
			$this->data['status'] = 'fail';
			$this->data['message'] = '<div class="alert alert-warning fade in">
			<strong>Failed!</strong> Sorry, we are unable to process your request. The email verification has been already done. For assistance contact our support team on support@cherryhire.com.
		  </div>';
		}
		 
		if ($this->session->userdata('hireid')) {
			redirect($this->config->base_url().'Dashboard');
		} else {
			if($this->input->post('username')) {
				/**************************Form Validation*****************************************/
				$this->form_validation->set_rules('username', 'Username', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');
				if ($this->form_validation->run() == FALSE) {
					$this->data['errmsg'] = '<div style="margin-top: 16px;" class="alert alert-danger">
			 <button data-dismiss="alert" class="close" type="button">&times;</button> '.validation_errors().' </div>';
				} else {
					redirect($this->config->base_url().'Dashboard');
				}
			}
		}
		$this->data['title']= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['emid'] = 99;
		$this->data['title'] = 'Cherry Hire App - Login';
		$this->load->view('new/login',$this->data);
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
		$this->data['emid'] = 99;
		$this->data['title'] = 'Cherry Hire App - Get Candidate';
		$this->load->view('common/frontend/header',$this->data);
		$this->load->view('common/frontend/employer-menu',$this->data);
		$this->load->view('forgotpwd',$this->data);
		$this->load->view('common/frontend/footer',$this->data);
	}

	/** 
	* Check Login Function
	*
	* @return boolean
	*/
	function check_database($password)
	{
		//Field validation succeeded.  Validate against database
		$username = $this->input->post('username');
		//query the database
		$result = $this->loginmodel->login($username, $password);
		if ($result) {
			$profile = $this->loginmodel->profile($row->emp_id);
			$sess_array = array();
			foreach ($result as $row) {
				$sess_array = array(
				'hireid' 	=> $row->emp_id,
				'hirename'  => $row->emp_comp_name,
				'hireemail' => $row->emp_email,
				'hirepwd' 	=> $row->emp_hash,
				'hireurl' 	=> $row->emp_jobportal,
				'profile'   => $profile['ep_logo'],
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
	
	/** 
	* Check User Function
	*
	* @return boolean
	*/
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
	
	/** 
	* Password reset request Function
	*
	* @return void
	*/
	function epwd_request()
	{
		$this->data['errmsg'] = '';
		if($this->input->get('pid') && $this->input->get('exp') && $this->input->get('auth')) {
			//process=change&pid='.base64_encode($resetdetails['cpwd_encrypt_id']).'&exp='$expdt.'&auth='.$resetdetails['cpwd_vcode'].'"
			//$data = $this->security->xss_clean($this->input->get('auth'));
			$verifydata = $this->loginmodel->verify_recover_data($this->security->xss_clean($this->input->get('auth')));

			if(empty($verifydata)) { redirect($this->config->base_url().'Login/?process=reset&accept=1&status=invalid&vr=101'); }
			
			$get_encrypt_id = base64_decode($this->input->get('pid'));
			$get_expdt 		= $this->input->get('exp');
			$get_auth 		= $this->input->get('auth');

			$r_encrypt_id 	= $verifydata['epwd_encrypt_id'];
			$r_auth 		= $verifydata['epwd_vcode'];
			$r_expdt 		= strtotime($verifydata['epwd_reqtime']);
			$expDate 		= date('Y-m-d H:i:s', strtotime('+1 day', $r_expdt));			
			$nowDate 		= time();

			if($nowDate > strtotime($expDate)) {  redirect($this->config->base_url().'Login/?process=reset&accept=1&status=invalid&vr=102');  }
			if($r_encrypt_id != $get_encrypt_id) {  redirect($this->config->base_url().'Login/?process=reset&accept=1&status=invalid&vr=103');  }
			if($r_auth != $get_auth) {  redirect($this->config->base_url().'Login/?process=reset&accept=1&status=invalid&vr=104');  }

			$this->data['encrypt_id']	= $r_encrypt_id;
			$this->data['auth_id']		= $r_auth;
			$this->data['title']		= 'Cherry Hire';
        	$this->data['metakey']		= 'HR Solutions, Cherry Hire, IPF';
        	$this->data['metadesc']		= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
        	$this->data['emid'] 		= 99;
			$this->load->view('common/frontend/header',$this->data);
			$this->load->view('common/frontend/employer-menu',$this->data);
			$this->load->view('resetmain',$this->data);
			$this->load->view('common/frontend/footer',$this->data);
		} else {
		 	redirect($this->config->base_url().'Login/?process=reset&accept=1&status=invalid&vr=105');
		}		
	}
	
	/** 
	* Confirm Password reset Function
	*
	* @return void
	*/
	function confirm_reset_request()
	{
		$this->data['errmsg'] = '';
		if($this->input->post('encrypt_id') && $this->input->post('auth_id') && $this->input->post('npwd') && $this->input->post('vcode')) {			
			$rstatus = $this->loginmodel->confirm_reset_request();
			if($rstatus == 1) {
				redirect($this->config->base_url().'Login/?process=reset&accept=101&status=success');
			} else {
				redirect($this->config->base_url().'Login/?process=reset&accept=1&status=invalid&vr=106');
			}			
		} else {
			redirect($this->config->base_url().'Login/?process=reset&accept=1&status=invalid&vr=107');
		}

	}
	
	/** 
	* Password reset Function
	*
	* @return void
	*/
	function fpwd_request()
	{
		$this->data['errmsg'] = '';
		$this->data['uemail'] = $this->input->post('uemail');
		
		$this->form_validation->set_rules('uemail', 'Email Account', 'trim|required|valid_email|callback_check_userbase');
		if ($this->form_validation->run() == FALSE)
		{
			//$this->data['errmsg']='Invalid username or password';
			redirect($this->config->base_url().'Login/?process=reset&sent=3&status=invalid');
		}
		else
		{
			$cpwd_id = $this->loginmodel->recover_set($this->data['uemail']);
			$fwmailstatus = $this->fsendmail($cpwd_id);
			//$fwmailstatus = 1;
			if($fwmailstatus == 1) {
				redirect($this->config->base_url().'Login/?process=reset&sent=1&status=success');
			} else {
				redirect($this->config->base_url().'Login/?process=reset&sent=2&status=fail');
			}
		}
	}
	
	/** 
	* Verify Email Function
	*
	* @return void
	*/
	public function verify_account_online($empid=null, $authcode=null)
	{
		if(!isset($empid)) { redirect($this->config->base_url().'?status=failed&vr=2&Process=Verification'); }
		if(!isset($authcode)) { redirect($this->config->base_url().'?status=failed&vr=2&Process=Verification'); }
		if($this->loginmodel->upadteemailvarify($empid, $authcode))
		{
			redirect($this->config->base_url().'?status=success&vr=1&Process=Verification');
		}else
		{
			redirect($this->config->base_url().'?status=failed&vr=2&Process=Verification');
		}
	}
	
	/** 
	* Password reset mail Function
	*
	* @return boolean
	*/
	function fsendmail($epwd_id=null)
	{
		$resetdetails = $this->loginmodel->get_recover_data($epwd_id);
		if(empty($resetdetails)) {
			redirect($this->config->base_url().'Login/?process=reset&sent=2&status=fail');
		}
		$emmpname 	= $resetdetails['emp_fname'].' '.$resetdetails['emp_lname'];
		$to 		= $resetdetails['emp_email'];
		$from 		= 'no-reply@cherryhire.com';
		$subject 	= 'Reset your Cherry Hire password';
		$startDate 	= time();
		$expdt 		= strtotime(date('Y-m-d H:i:s', strtotime('+1 day', $startDate)));
		
		$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
						<html><head><title>Reset your Cherry Hire password</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
						<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
						<table id="Table_01" width="596" height="507" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#ececec; font-size:14px; font-family:Arial, Helvetica, sans-serif;">
							<tr>
								<td rowspan="7" style="width:5px; height:507px;"> </td>
								<td colspan="7" style="width:585px; height:82px; background:#ececec;">
									<a href="http://www.cherryhire.com" target="_blank"><img src="'.$this->config->item('web_url').'emailtemplate/logohome.png" alt=""></a>
								</td>
								<td rowspan="7" style="width:6px; height:507px;"> </td>
							</tr>
							<tr>
								<td colspan="7" style="background:#AD1E24; width:585px; height:110px; vertical-align:middle; color:#FFF; padding:10px 40px 0px 40px; font-size:40px; font-weight:bold;" valign="middle">
									Reset your <span style="color:#FC0">Cherry Hire</span> account password
								</td>
							</tr>
							<tr>
								<td><img src="'.$this->config->item('web_url').'emailtemplate/Cherry-Hire_Register_05.jpg" width="10" height="10" alt=""></td>
								<td colspan="5" style="width:564px; height:10px;background:#FFF; "> </td>
								<td><img src="'.$this->config->item('web_url').'emailtemplate/Cherry-Hire_Register_07.jpg" width="11" height="10" alt=""></td>
							</tr>
							<tr>
								<td rowspan="3" style="width:10px; height:260px;"> </td>
								<td colspan="5" style="width:564px; height:24px;background:#FFF; "></td>
								<td rowspan="3" style="width:11px; height:260px;"> </td>
							</tr>
							<tr>
								<td rowspan="2" style="width:27px; height:236px;background:#FFF; "> </td>
								<td colspan="3" style="width:492px; height:93px;background:#FFF; line-height:30px;">
								<p>Dear '.$emmpname.'</p>
						
								<p>Somebody recently asked to reset your Cherry Hire account password</p>
								<p style="font-size:18px; margin:10px 0px 10px 0px;"><h1><strong>Code : '.$resetdetails['epwd_otp'].'</strong></h1></p>
								<p>Click here to <strong><a href="'.$this->config->base_url().'User/ResetInitiate/?process=change&pid='.base64_encode($resetdetails['epwd_encrypt_id']).'&exp='.$expdt.'&auth='.$resetdetails['epwd_vcode'].'">reset</a></strong> your password.</p>
								
								<p>If you did not request a new password, please let us know immediately at support@cherryhire.com</p>
								
								</td>
								<td rowspan="2" style="width:45px; height:236px;background:#FFF; "> </td>
							</tr>
							<tr>
								<td colspan="3" style="width:492px; height:143px;background:#FFF; padding:0px 0px 0px 10px; line-height:21px; font-size:12px; ">
									Regards, <br >
									Team- Cherry Hire.com <br >
									www.cherryhire.com        
								</td>
							</tr>
							<tr>
								<td colspan="2" style="width:37px; height:45px; background:#ececec;"></td>
								<td style="width:193px; height:45px; background:#ececec;"></td>
								<td style="width:119px; height:45px; background:#ececec;">
									<a href="https://www.facebook.com/cherryhire" target="_blank"><img src="'.$this->config->item('web_url').'emailtemplate/sicon1.png" alt=""></a>
									<a href="https://twitter.com/cherry_hire" target="_blank"><img src="'.$this->config->item('web_url').'emailtemplate/sicon2.png" alt=""></a>
									<a href="https://www.linkedin.com/company/cherry-hire" target="_blank"><img src="'.$this->config->item('web_url').'emailtemplate/sicon3.png" alt=""></a>
									<a href="https://www.instagram.com/cherryhire/" target="_blank"><img src="'.$this->config->item('web_url').'emailtemplate/sicon4.png" alt=""></a>
								</td>
								<td style="width:180px; height:45px; background:#ececec;"></td>
								<td colspan="2" style="width:56px; height:45px; background:#ececec;"></td>
							</tr>
						</table>
						</body></html>';		
		
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
         $this->load->library('email'); 
         $this->email->initialize($config);	
		$this->email->clear(TRUE);
		$this->email->set_newline("\r\n");
		$this->email->from($from, 'Cherry Hire');
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

	/** 
	* Clear Cache Function
	*
	* @return void
	*/
	function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
}

/* End of file Login.php */
/* Location: ./hire/controllers/Login.php */