<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Employer extends CI_Controller {



	/* Init function

	 * return void

	 */

	public function __construct()

	{

		parent::__construct();

		$this->clear_cache();

		$this->load->library('email'); // load email library

		$this->load->model('employermodel');

		$this->data['thisyear'] = date('Y');

		$this->data['mid'] 		= 0;

		$this->data['emid'] 	= 99;

		$this->data['cmid'] 	= 0;

	}

	

	/* Index function

	 * return void

	 */

	public function index()

	{

		$this->data['message'] = '';

		$this->data['title']= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';

		$this->data['metakey']= 'HR Solutions, cherryhire, IPF';

		$this->data['metadesc']= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';

		$this->load->view('common/header',$this->data);

		$this->load->view('common/home-menu',$this->data);

		$this->load->view('home',$this->data);

		$this->load->view('common/footer',$this->data);

	}

	

	/* Email validation function

	 * return int

	 */

	public function email_valid_ajax()

	{

		$email = $this->input->post('email');

		$result = $this->employermodel->valid_emp_email($email);

	 

		if ($result == 0) {

			echo 0;//email is unique. not signed up before

		} else {

			echo 1;

		}

	}

	

	/* Employer reg submit function

	 * return void

	 */



	public function create_account()

	{
		
		$this->data['message'] = '';

		$this->data['status'] = '';

		$this->data['formdata'] = array(

			'firstname'=>'',

			'lastname'=>'',

			'designation'=>'',

			'cntrycode'=>'',

			'phone'=>'',

			'emailid'=>'',

			'usrpwd'=>'',

			'repwd'=>'',

			'comp'=>'',

			'complocation'=>'',

			'url'=>'',

			'empcnt'=>'',

			'descr'=>'',
			'hear'=>'',

			'emptype'=>'1'

		);


		//Form validation
		// $this->spamMail();
		
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('designation', 'Designation', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('cntrycode', 'Country Code', 'trim|required');

		$this->form_validation->set_rules('phone', 'Phone No', 'trim|required');

		$this->form_validation->set_rules('emailid', 'Email ID', 'trim|required|valid_email|is_unique[ch_employer.emp_email]',array('is_unique'     => 'This %s already exists.'));

		$this->form_validation->set_rules('usrpwd', 'Password', 'trim|required|min_length[8]|callback_name_check');

		$this->form_validation->set_rules('repwd', 'Confirm Password', 'trim|required|matches[usrpwd]');

		$this->form_validation->set_rules('comp', 'Company Name', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('complocation', 'Company Location', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('url', 'Company Website', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('empcnt', 'No of Employee(s)', 'trim|required');

		$this->form_validation->set_rules('descr', 'Company description', 'trim|callback_name_check');

		

		if ($this->form_validation->run() == TRUE) {

			$email = explode('@',$this->input->post('emailid'));
			if($this->employermodel->getspammail($email[1]))
			{
				$this->data['status'] = 'fail';
				
				$this->session->set_flashdata('msg', '<div style="position:relative;right:0px" class="alert alert-danger fade in">
				<strong>Failed!</strong> Please Use  Comapany email id only.
				</div>');
				redirect($this->config->base_url().'PostJob');
			}else
			{
			$empid = $this->employermodel->insert_record();

			$seid = $this->employermodel->insert_profile($empid,$this->input->post('comp'),$this->input->post('emailid'));

			$peid = $this->employermodel->insert_subscribe($empid);

			

			$edata = $this->employermodel->get_employer($empid);

			$mailsent = $this->signup_sendmail($edata); //Sent mail

			$Tmailsent = $this->signup_thankumail($edata); //Sent mail to employer

			

			//On success

			redirect($this->config->base_url().'PostJob/?status=success&ins=1&Process=Insert');
		}

		} else {

			if($this->input->post('firstname') || $this->input->post('emailid')) {

				$this->data['formdata'] = array(

					'firstname'=>$this->input->post('firstname'),

					'lastname'=>$this->input->post('lastname'),

					'designation'=>$this->input->post('designation'),

					'cntrycode'=>$this->input->post('cntrycode'),

					'phone'=>$this->input->post('phone'),

					'emailid'=>$this->input->post('emailid'),

					'usrpwd'=>$this->input->post('usrpwd'),

					'repwd'=>$this->input->post('repwd'),

					'comp'=>$this->input->post('comp'),

					'url'=>$this->input->post('url'),

					'empcnt'=>$this->input->post('empcnt'),

					'descr'=>$this->input->post('descr'),

					'emptype'=>$this->input->post('emptype'),

					'complocation'=>$this->input->post('complocation'),

				);

			}

			

			$this->data['status'] = 'fail';

			$this->data['message'] = '<div style="position:relative;right:0px" class="alert alert-danger fade in">

			<strong>Failed!</strong> Sorry, we are unable to process your request. Please try again.

			<br> '.validation_errors().'

			</div>';

		}

		$this->data["country_list"] = $this->employermodel->get_cmp_location(); // Get country List

		$this->data['title']		= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';

		$this->data['metakey']		= 'HR Solutions, cherryhire, IPF';

		$this->data['metadesc']		= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';

		$this->data['emid'] 		= 2;

		$this->data['submiturl'] 	= 'Employer/CreateAccount'; //Form submit URL

		$this->load->view('new/employer-registration',$this->data);

	}

/**
 * spam mail check 
 */

	function spamMail()
	{
		$email = explode('@',$this->input->post('emailid'));
		if($this->employermodel->getspammail($email[1]))
		{

			$this->data['message'] = '<div style="position:relative;right:0px" class="alert alert-danger fade in"> <strong>Failed!</strong> Please use Valid company email Id </div>';
			// $this->load->view('new/employer-registration',$this->data);
			echo "Please use Valid company email Id ";

		}else{
			echo "";
		}
	}

	/* Employer free-reg submit function

	 * return void

	 */

	public function create_trial_account()

	{

		$this->data['message'] = '';

		$this->data['status'] = '';

		$this->data['formdata'] = array(

			'firstname'=>'',

			'lastname'=>'',

			'designation'=>'',

			'cntrycode'=>'',

			'phone'=>'',

			'emailid'=>'',

			'usrpwd'=>'',

			'repwd'=>'',

			'comp'=>'',

			'complocation'=>'',

			'url'=>'',

			'empcnt'=>'',

			'descr'=>'',

			'emptype'=>'1'

		);

		//Form validation

		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('designation', 'Designation', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('cntrycode', 'Country Code', 'trim|required');

		$this->form_validation->set_rules('phone', 'Phone No', 'trim|required');

		$this->form_validation->set_rules('emailid', 'Email ID', 'trim|required|valid_email|is_unique[ch_employer.emp_email]',array('is_unique'     => 'This %s already exists.'));

		$this->form_validation->set_rules('usrpwd', 'Password', 'trim|required|min_length[8]|callback_name_check');

		$this->form_validation->set_rules('repwd', 'Confirm Password', 'trim|required|matches[usrpwd]');

		$this->form_validation->set_rules('comp', 'Company Name', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('complocation', 'Company Location', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('url', 'Company Website', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('empcnt', 'No of Employee(s)', 'trim|required');

		$this->form_validation->set_rules('descr', 'Company description', 'trim|callback_name_check');

		

		if ($this->form_validation->run() == TRUE) {

			$empid = $this->employermodel->insert_record();

			$seid = $this->employermodel->insert_profile($empid,$this->input->post('comp'),$this->input->post('emailid'));

			$peid = $this->employermodel->insert_subscribe($empid);

			

			$edata = $this->employermodel->get_employer($empid);

			$mailsent = $this->signup_sendmail($edata);

			$Tmailsent = $this->signup_thankumail($edata);

			

			redirect($this->config->base_url().'PostJob/?status=success&ins=1&Process=Insert');

		} else {

			if($this->input->post('firstname') || $this->input->post('emailid')) {

				$this->data['formdata'] = array(

					'firstname'=>$this->input->post('firstname'),

					'lastname'=>$this->input->post('lastname'),

					'designation'=>$this->input->post('designation'),

					'cntrycode'=>$this->input->post('cntrycode'),

					'phone'=>$this->input->post('phone'),

					'emailid'=>$this->input->post('emailid'),

					'usrpwd'=>$this->input->post('usrpwd'),

					'repwd'=>$this->input->post('repwd'),

					'comp'=>$this->input->post('comp'),

					'url'=>$this->input->post('url'),

					'empcnt'=>$this->input->post('empcnt'),

					'descr'=>$this->input->post('descr'),

					'emptype'=>$this->input->post('emptype'),

					'complocation'=>$this->input->post('complocation'),

				);

			}

			

			$this->data['status'] = 'fail';

			$this->data['message'] = '<div style="position:relative;right:0px" class="alert alert-danger fade in">

			<strong>Failed!</strong> Sorry, we are unable to process your request. Please try again.

			<br> '.validation_errors().'

			</div>';

		}

		$this->data["country_list"] = $this->employermodel->get_cmp_location();

		$this->data['title']= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';

		$this->data['metakey']= 'HR Solutions, cherryhire, IPF';

		$this->data['metadesc']= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';

		$this->data['emid'] = 4;

		$this->data['submiturl'] = 'Employer/FreeTrialReg';

		$this->load->view('common/header',$this->data);

		$this->load->view('common/employer-menu',$this->data);

		$this->load->view('freetrial',$this->data);

		$this->load->view('common/footer',$this->data);

	}

	

	/* peoplesearch reg submit function

	 * return void

	 */

	public function peoplesearch()

	{

		$this->data['message'] = '';

		$this->data['status'] = '';

		$this->data['formdata'] = array(

			'firstname'=>'',

			'lastname'=>'',

			'cntrycode'=>'',

			'phone'=>'',

			'emailid'=>'',

			'usrpwd'=>'',

			'repwd'=>'',

			'comp'=>'',

			'url'=>'',

			'empcnt'=>'',

			'descr'=>'',

			'emptype'=>'1'

		);

		

		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('cntrycode', 'Country Code', 'trim|required');

		$this->form_validation->set_rules('phone', 'Phone No', 'trim|required');

		$this->form_validation->set_rules('emailid', 'Email ID', 'trim|required|valid_email|is_unique[ch_employer.emp_email]',array('is_unique'     => 'This %s already exists.'));

		$this->form_validation->set_rules('usrpwd', 'Password', 'trim|required|min_length[8]|callback_name_check');

		$this->form_validation->set_rules('repwd', 'Confirm Password', 'trim|required|min_length[8]|matches[usrpwd]');

		$this->form_validation->set_rules('comp', 'Company Name', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('url', 'Company Website', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('empcnt', 'No of Employee(s)', 'trim|required');

		$this->form_validation->set_rules('descr', 'Company description', 'trim|callback_name_check');

		

		if ($this->form_validation->run() == TRUE) {

			$empid = $this->employermodel->insert_record();

			$seid = $this->employermodel->insert_profile($empid,$this->input->post('comp'),$this->input->post('emailid'));

			$peid = $this->employermodel->insert_subscribe($empid);

			

			$edata = $this->employermodel->get_employer($empid);

			$mailsent = $this->signup_sendmail($edata);

			$Tmailsent = $this->signup_thankumail($edata);

			

			redirect($this->config->base_url().'PeopleSearch/?status=success&ins=1&Process=Insert');

		} else {

			if($this->input->post('firstname') || $this->input->post('emailid')) {

				$this->data['formdata'] = array(

					'firstname'=>$this->input->post('firstname'),

					'lastname'=>$this->input->post('lastname'),

					'cntrycode'=>$this->input->post('cntrycode'),

					'phone'=>$this->input->post('phone'),

					'emailid'=>$this->input->post('emailid'),

					'usrpwd'=>$this->input->post('usrpwd'),

					'repwd'=>$this->input->post('repwd'),

					'comp'=>$this->input->post('comp'),

					'url'=>$this->input->post('url'),

					'empcnt'=>$this->input->post('empcnt'),

					'descr'=>$this->input->post('descr'),

					'emptype'=>$this->input->post('emptype'),

				);

			}

		

			$this->data['status'] = 'fail';

			$this->data['message'] = '<div style="position:relative;right:0px" class="alert alert-danger fade in">

			<strong>Failed!</strong> Sorry, we are unable to process your request. Please try again.

			<br> '.validation_errors().'

			</div>';

		}

		$this->data["country_list"] = $this->employermodel->get_cmp_location();

		$this->data['title']		= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';

		$this->data['metakey']		= 'HR Solutions, cherryhire, IPF';

		$this->data['metadesc']		= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';

		$this->data['mid'] 			= 4;

		$this->data['submiturl'] 	= 'PeopleSearch';

		$this->load->view('common/header',$this->data);

		$this->load->view('peoplesearch',$this->data);

		$this->load->view('common/footer',$this->data);

	}

	

	/* Name Check Function

	 * @param string $str

	 * return boolean

	 */

	public function name_check($str)

	{

		if ($str == 'test' || $str == 'Test') {

			$this->form_validation->set_message('name_check', 'The %s field can not be the word "test"');

			return FALSE;

		} else {

			return TRUE;

		}

	}

	

	/* Password Check Function

	 * @param string $pwd

	 * return boolean

	 */

	public function pwd_check($pwd)

	{

		$error = "";

		if( strlen($pwd) < 8 ) {

			$error .= "Password should be minimum 8 characters in length.<br>";

		}		

		

		if( !preg_match("#[0-9]+#", $pwd) ) {

			$error .= "Password should be containing minimum one number!<br>";

		}		

		

		if( !preg_match("#[a-z]+#", $pwd) ) {

			$error .= "Password should be containing minimum one letter!<br>";

		}		

		

		if( !preg_match("#[A-Z]+#", $pwd) ) {

			$error .= "Password should be containing minimum one uppercase letter!<br>";

		}

		

		if ($error) {

			$error = rtrim($error,'<br>');

			$this->form_validation->set_message('pwd_check', 'Password should be minimum 8 characters in length containing one uppercase letter and one digit');

			return FALSE;

		} else {

			return TRUE;

		}

	}



	/* Password Valid Check Function

	 *

	 * return int

	 */

	public function pwd_valid_check()

	{

		$pwd  = $this->input->post('pwd');

		$error = "";

		if( strlen($pwd) < 8 ) {

			$error .= "Password should be minimum 8 characters in length.<br>";

		}		

		

		if( !preg_match("#[0-9]+#", $pwd) ) {

			$error .= "Password should be containing minimum one number!<br>";

		}		

		

		if( !preg_match("#[a-z]+#", $pwd) ) {

			$error .= "Password should be containing minimum one letter!<br>";

		}		

		

		if( !preg_match("#[A-Z]+#", $pwd) ) {

			$error .= "Password should be containing minimum one uppercase letter!<br>";

		}

		

		if ($error) {

			echo 0; //False

		} else {

			echo 1; //True

		}

	}

	

	/* Signup mail Function

	 * @param array $edata

	 * return int

	 */

	function signup_sendmail($edata=null)

	{

		$subject = 'New Employer Registration From cherryhire';

		

		$to = 'support@cherryhire.com';

		$from = 'no-reply@cherryhire.com';

		

		$name = $edata['emp_fname'].' '.$edata['emp_lname'];

		$emailid = $edata['emp_email'];

		$phone = $edata['emp_ccode'].'-'.$edata['emp_phone'];

		$company = $edata['emp_comp_name'];

		$web = $edata['emp_website'];

		

		$message = "<html><head><title>Employer Registration From cherryhire</title></head><body>
					<p><strong>New Employer Registration From cherryhire</strong> </p>

		<br><p> Hi Team, </p>

		<p> Please see the Details listed below </p>

		<br><p> Name :".$name." </p>

		<p> Email Id :".$emailid." </p>

		<p> Contact No :".$phone." </p>

		<p> Company :".$company." </p>

		<p> Website :".$web." </p>

		<p><br> Regards, 

		 <br> Webmaster - cherryhire </p>

		</body></html></html>";

		
//Mail configuration
				$config['protocol']     = 'smtp';
				$config['smtp_host']    = 'ssl://smtp.cherryhire.net';
				$config['smtp_port']    = 587;
				$config['smtp_user']    = 'no-reply@cherryhire.net';
				$config['smtp_pass']    = 'Startup2019#';
				$config['charset']      = 'utf-8';

				$this->load->library('email'); 
				$this->email->set_mailtype("html");
				$this->email->set_newline('\r\n');

				$this->email->from('no-reply@cherryhire.net' , 'Cherryhire');

		$this->email->to($to);

		$this->email->subject($subject);

		$this->email->message($message);

		if ($this->email->send()) {

			return 1;

		} else {

			return 0;

		}

	}



	/* Thankyou mail Function

	 * @param array $edata

	 * return int

	 */

	function signup_thankumail($edata=null)

	{

		$subject = 'Activate your cherryhire account';

		$from = 'no-reply@cherryhire.com';

		

		$name = $edata['emp_fname'].' '.$edata['emp_lname'];

		$emailid = $edata['emp_email'];

		$phone = $edata['emp_ccode'].'-'.$edata['emp_phone'];

		$company = $edata['emp_comp_name'];

		$web = $edata['emp_website'];

		

		$AuthKey = $edata['emp_authkey'];

		$EncryptID = $edata['emp_encrypt_id'];

		

		$FName = $name;

		$to = $emailid;

		$mainurl = 'http://cherryhire.com/hire/';

								

		$thanksmessage    = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

								<html><head><title>cherryhire Register</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

								<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

								<table id="Table_01" width="596" height="507" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#ececec; font-size:14px; font-family:Arial, Helvetica, sans-serif;">

									<tr>

										<td rowspan="7" style="width:5px; height:507px;"> </td>

										<td colspan="7" style="width:585px; height:82px; background:#ececec;">

											

										</td>

										<td rowspan="7" style="width:6px; height:507px;"> </td>

									</tr>

									<tr>
										<td colspan="3" style="background:#981b33; width:585px; height:110px; vertical-align:middle; color:#FFF; padding:15px 35px; font-size:40px; font-weight:bold;" valign="middle">
											<a href="https://www.cherryhire.com" target="_blank"><img src="https://www.cherryhire.com/assets/img/logo.png" alt="" style="max-width: 75%;border: 1px solid #fff;"></a>
										</td>

										<td colspan="4" style="background:#981b33; width:585px; height:110px; vertical-align:middle; color:#FFF; padding:10px 40px 0px 40px; font-size:40px; font-weight:bold;" valign="middle">

											Thank you </span>

										</td>

									</tr>

									<tr>

										<td style="width:10px; height:10px; line-height:0px;" valign="top"><img src="'.$this->config->base_url().'emailtemplate/Cherry-Hire_Register_05.jpg" alt=""></td>

										<td colspan="5" style="width:564px; height:10px;background:#FFF; "> </td>

										<td style="width:11px; height:10px; line-height:0px;" valign="top"><img src="'.$this->config->base_url().'emailtemplate/Cherry-Hire_Register_07.jpg" alt=""></td>

									</tr>

									<tr>

										<td rowspan="3" style="width:10px; height:260px;"> </td>

										<td colspan="5" style="width:564px; height:24px;background:#FFF; "></td>

										<td rowspan="3" style="width:11px; height:260px;"> </td>

									</tr>

									<tr>

										<td rowspan="2" style="width:27px; height:236px;background:#FFF; "> </td>

										<td colspan="3" style="width:492px; height:93px;background:#FFF; line-height:30px;">

										<p>Dear '.$FName.'</p>

								

										<p>
										Thank you for registering on <a href="https://www.cherryhire.com" target="_blank">www.cherryhire.com</a>, the first platform in the region to provide you with verified candidates.
										</p>

										

										<p>Kindly confirm your email address <a href="'.$mainurl.'EVerify/'.$EncryptID.'/'.$AuthKey.'" target="_blank"><strong> HERE </strong></a> to activate your account. </p>

										
										<p>
											Once activated, you can login to our platform using your credentials and begin your journey with us. 

										</p>
										<p>We are delighted to be at your service and look forward to a healthy business relationship.</p>
										

										

										<p>In case you encounter any issues relating to your account, please do not hesitate to contact us at <a href="mailto:support@cherryhire.com">support@cherryhire.com</a></p>

										</td>

										<td rowspan="2" style="width:45px; height:236px;background:#FFF; "> </td>

									</tr>

									<tr>

										<td colspan="3" style="width:492px; height:143px;background:#FFF; padding:0px 0px 0px 10px; line-height:21px; font-size:12px; ">

											Kind Regards, <br >

											
											Cherryhire       

										</td>

									</tr>

									<tr>

										<td colspan="2" style="width:37px; height:45px; background:#ececec;"></td>

										<td style="width:193px; height:45px; background:#ececec;"></td>

										<td style="width:119px; height:45px; background:#ececec;">

											<a href="https://www.facebook.com/cherryhire" target="_blank"><img src="'.$this->config->base_url().'emailtemplate/sicon1.png" alt=""></a>

											<a href="https://twitter.com/cherry_hire" target="_blank"><img src="'.$this->config->base_url().'emailtemplate/sicon2.png" alt=""></a>

											<a href="https://www.linkedin.com/company/cherry-hire" target="_blank"><img src="'.$this->config->base_url().'emailtemplate/sicon3.png" alt=""></a>

											<a href="https://www.instagram.com/cherryhire/" target="_blank"><img src="'.$this->config->base_url().'emailtemplate/sicon4.png" alt=""></a>

										</td>

										<td style="width:180px; height:45px; background:#ececec;"></td>

										<td colspan="2" style="width:56px; height:45px; background:#ececec;"></td>

									</tr>

								</table>

								</body></html>';		

		
				//Mail configuration
				$config['protocol']     = 'smtp';
				$config['smtp_host']    = 'ssl://smtp.cherryhire.net';
				$config['smtp_port']    = 587;
				$config['smtp_user']    = 'no-reply@cherryhire.net';
				$config['smtp_pass']    = 'Startup2019#';
				$config['charset']      = 'utf-8';

				$this->load->library('email'); 
				$this->email->set_mailtype("html");
				$this->email->set_newline('\r\n');

				$this->email->from('no-reply@cherryhire.net' , 'Cherryhire');

		$this->email->to($to);

		$this->email->subject($subject);

		$this->email->message($thanksmessage);

		if ($this->email->send()) {

			return 1;
			

		} else {

			return 0;
			

// echo $this->email->print_debugger();exit;

		}

	}



	/* Cache clear Function

	 * 

	 * return void

	 */

	function clear_cache()

    {

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");

        $this->output->set_header("Pragma: no-cache");

    }


   function sendmailtocandidates($rname,$to,$subject,$subject1)
   {
   	$message = '<!doctype html><html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1"><title>Cherryhire</title><style type="text/css">p{margin:10px 0;padding:0}table{border-collapse:collapse}h1,h2,h3,h4,h5,h6{display:block;margin:0;padding:0}img,a img{border:0;height:auto;outline:none;text-decoration:none}body,#bodyTable,#bodyCell{height:100%;margin:0;padding:0;width:100%}.mcnPreviewText{display:none !important}#outlook a{padding:0}img{-ms-interpolation-mode:bicubic}table{mso-table-lspace:0pt;mso-table-rspace:0pt}.ReadMsgBody{width:100%}.ExternalClass{width:100%}p,a,li,td,blockquote{mso-line-height-rule:exactly}a[href^=tel],a[href^=sms]{color:inherit;cursor:default;text-decoration:none}p,a,li,td,body,table,blockquote{-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%}.ExternalClass,.ExternalClass p,.ExternalClass td,.ExternalClass div,.ExternalClass span,.ExternalClass font{line-height:100%}a[x-apple-data-detectors]{color:inherit !important;text-decoration:none !important;font-size:inherit !important;font-family:inherit !important;font-weight:inherit !important;line-height:inherit !important}a.mcnButton{display:block}.mcnImage,.mcnRetinaImage{vertical-align:bottom}.mcnTextContent{word-break:break-word}.mcnTextContent img{height:auto !important}.mcnDividerBlock{table-layout:fixed !important}body,#bodyTable,#templateFooter{background-color:rgba(126,124,124,0.9)}#bodyCell{border-top:0}h1{color:#FFF !important;font-family:Helvetica;font-size:26px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:normal;text-align:center}h2{color:#2D9CE8 !important;font-family:Helvetica;font-size:20px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:normal;text-align:center}h3{color:#505050 !important;font-family:Helvetica;font-size:18px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:normal;text-align:left}h4{color:#2D9CE8 !important;font-family:Helvetica;font-size:16px;font-style:normal;font-weight:bold;line-height:125%;letter-spacing:normal;text-align:center}.mcnImageCardTopContent,.mcnImageCardRightContent,.mcnImageCardBottomContent,.mcnImageCardLeftContent{border-radius:6px}#templatePreheader{background-color:#002D54;border-top:0;border-bottom:0}.preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{color:#FFF;font-family:Helvetica;font-size:11px;line-height:125%;text-align:left}.preheaderContainer .mcnTextContent a{color:#FFF;font-weight:normal;text-decoration:underline}#templateHeader{background-color:rgba(126, 124, 124, 0.9);border-top:0;border-bottom:0}.headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{color:#FFF;font-family:Helvetica;font-size:18px;line-height:150%;text-align:center}.headerContainer .mcnTextContent a{color:#FFF;font-weight:normal;text-decoration:underline}#templateBody{background-color:rgba(126,124,124,0.9);border-top:0;border-bottom:0}#bodyBackground{background-color:#FFF;border-radius:5px}.bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{color:#303030;font-family:Helvetica;font-size:16px;line-height:150%;text-align:left}.bodyContainer .mcnTextContent a{color:#2A9AE7;font-weight:bold;text-decoration:none}.footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{color:#FFF;font-family:Helvetica;font-size:11px;line-height:125%;text-align:left}.footerContainer .mcnTextContent a{color:#FFF;font-weight:normal;text-decoration:underline}@media only screen and (max-width: 480px){body,table,td,p,a,li,blockquote{-webkit-text-size-adjust:none !important}}@media only screen and (max-width: 480px){body{width:100% !important;min-width:100% !important}}@media only screen and (max-width: 480px){.templateContainer{max-width:600px !important;width:100% !important}}@media only screen and (max-width: 480px){.mcnRetinaImage{max-width:100% !important}}@media only screen and (max-width: 480px){.mcnImage{height:auto !important;width:100% !important}}@media only screen and (max-width: 480px){.mcnCartContainer,.mcnCaptionTopContent,.mcnRecContentContainer,.mcnCaptionBottomContent,.mcnTextContentContainer,.mcnBoxedTextContentContainer,.mcnImageGroupContentContainer,.mcnCaptionLeftTextContentContainer,.mcnCaptionRightTextContentContainer,.mcnCaptionLeftImageContentContainer,.mcnCaptionRightImageContentContainer,.mcnImageCardLeftTextContentContainer,.mcnImageCardRightTextContentContainer,.mcnImageCardLeftImageContentContainer,.mcnImageCardRightImageContentContainer{max-width:100% !important;width:100% !important}}@media only screen and (max-width: 480px){.mcnBoxedTextContentContainer{min-width:100% !important}}@media only screen and (max-width: 480px){.mcnImageGroupContent{padding:9px !important}}@media only screen and (max-width: 480px){.mcnCaptionLeftContentOuter .mcnTextContent,.mcnCaptionRightContentOuter .mcnTextContent{padding-top:9px !important}}@media only screen and (max-width: 480px){.mcnImageCardTopImageContent,.mcnCaptionBottomContent:last-child .mcnCaptionBottomImageContent,.mcnCaptionBlockInner .mcnCaptionTopContent:last-child .mcnTextContent{padding-top:18px !important}}@media only screen and (max-width: 480px){.mcnImageCardBottomImageContent{padding-bottom:9px !important}}@media only screen and (max-width: 480px){.mcnImageGroupBlockInner{padding-top:0 !important;padding-bottom:0 !important}}@media only screen and (max-width: 480px){.mcnImageGroupBlockOuter{padding-top:9px !important;padding-bottom:9px !important}}@media only screen and (max-width: 480px){.mcnTextContent,.mcnBoxedTextContentColumn{padding-right:18px !important;padding-left:18px !important}}@media only screen and (max-width: 480px){.mcnImageCardLeftImageContent,.mcnImageCardRightImageContent{padding-right:18px !important;padding-bottom:0 !important;padding-left:18px !important}}@media only screen and (max-width: 480px){.mcpreview-image-uploader{display:none !important;width:100% !important}}@media only screen and (max-width: 480px){h1{font-size:24px !important;line-height:125% !important}}@media only screen and (max-width: 480px){h2{font-size:20px !important;line-height:125% !important}}@media only screen and (max-width: 480px){h3{font-size:18px !important;line-height:125% !important}}@media only screen and (max-width: 480px){h4{font-size:16px !important;line-height:125% !important}}@media only screen and (max-width: 480px){.mcnBoxedTextContentContainer .mcnTextContent,.mcnBoxedTextContentContainer .mcnTextContent p{font-size:18px !important;line-height:125% !important}}@media only screen and (max-width: 480px){#templatePreheader{display:block !important}}@media only screen and (max-width: 480px){.preheaderContainer .mcnTextContent,.preheaderContainer .mcnTextContent p{font-size:14px !important;line-height:115% !important}}@media only screen and (max-width: 480px){.headerContainer .mcnTextContent,.headerContainer .mcnTextContent p{font-size:18px !important;line-height:125% !important}}@media only screen and (max-width: 480px){.bodyContainer .mcnTextContent,.bodyContainer .mcnTextContent p{font-size:18px !important;line-height:125% !important}}@media only screen and (max-width: 480px){.footerContainer .mcnTextContent,.footerContainer .mcnTextContent p{font-size:14px !important;line-height:115% !important}}</style></head><body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0"> <!--[if !gte mso 9]><!----><span class="mcnPreviewText" style="display:none; font-size:0px; line-height:0px; max-height:0px; max-width:0px; opacity:0; overflow:hidden; visibility:hidden; mso-hide:all;">*|MC_PREVIEW_TEXT|*</span><!--<![endif]--><center><table align="center" border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable"><tr><td align="center" valign="top" id="bodyCell"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateHeader"><tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer"><tr><td valign="top" class="headerContainer" style="padding-top:9px; padding-bottom:9px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;"><tbody class="mcnDividerBlockOuter"><tr><td class="mcnDividerBlockInner" style="min-width: 100%; padding: 9px 18px;"><table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;"><tbody><tr><td> <span></span></td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnImageBlock" style="min-width:100%;"><tbody class="mcnImageBlockOuter"><tr><td valign="top" style="padding:9px" class="mcnImageBlockInner"><table align="left" width="100%" border="0" cellpadding="0" cellspacing="0" class="mcnImageContentContainer" style="min-width:100%;"><tbody><tr><td class="mcnImageContent" valign="top" style="padding-right: 9px; padding-left: 9px; padding-top: 0; padding-bottom: 0; text-align:center;"> <img align="center" alt="" src="http://cherryhire.com/media/logo_home.png" width="185" style="max-width:185px; padding-bottom: 0; display: inline !important; vertical-align: bottom;" class="mcnImage"></td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;"><tbody class="mcnDividerBlockOuter"><tr><td class="mcnDividerBlockInner" style="min-width: 100%; padding: 9px 18px;"><table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;"><tbody><tr><td> <span></span></td></tr></tbody></table></td></tr></tbody></table></td></tr></table></td></tr></table></td></tr><tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateBody"><tr><td align="center" valign="top" class="mobilePaddingRL5"><table border="0" cellpadding="0" cellspacing="0" width="600" id="bodyBackground" class="templateContainer"><tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%"><tr><td valign="top" class="bodyContainer" style="padding-top:9px; padding-bottom:9px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;"><tbody class="mcnDividerBlockOuter"><tr><td class="mcnDividerBlockInner" style="min-width: 100%; padding: 9px 18px;"><table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;"><tbody><tr><td> <span></span></td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;"><tbody class="mcnTextBlockOuter"><tr><td valign="top" class="mcnTextBlockInner" style="padding-top:9px;"> <!--[if mso]><table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;"><tr> <![endif]--> <!--[if mso]><td valign="top" width="600" style="width:600px;"> <![endif]--><table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer"><tbody><tr><td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;"><div style="text-align: left;"><strong><span style="font-size:12px">
	<span style="font-family:arial,helvetica neue,helvetica,sans-serif">Dear '.$rname.',</span>
	</span></strong><br> &nbsp;</div><div style="text-align: left;"><br> 
		'.$subject.'
	
	</div></td></tr></tbody></table> <!--[if mso]></td> <![endif]--> <!--[if mso]></tr></table> <![endif]--></td></tr></tbody>
</table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;"><tbody class="mcnDividerBlockOuter"><tr><td class="mcnDividerBlockInner" style="min-width: 100%; padding: 0px 18px 18px;"><table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width: 100%;border-top: 1px solid #DDDDDD;"><tbody><tr><td> <span></span></td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;"><tbody class="mcnTextBlockOuter"><tr><td valign="top" class="mcnTextBlockInner" style="padding-top:9px;"> <!--[if mso]><table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;"><tr> <![endif]--> <!--[if mso]><td valign="top" width="600" style="width:600px;"> <![endif]--><table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer"><tbody><tr><td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;"><div style="text-align: left;"><em><span style="font-size:12px">Best regards.</span></em></div><div style="text-align: left;"><em><span style="font-size:12px">Cherryhire</span></em><em><span style="font-size:12px">&nbsp;Team.&nbsp;</span></em></div></td></tr></tbody></table> <!--[if mso]></td> <![endif]--> <!--[if mso]></tr></table> <![endif]--></td></tr></tbody></table></td></tr></table></td></tr></table></td></tr></table></td></tr><tr><td align="center" valign="top" style="padding-bottom:40px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" id="templateFooter"><tr><td align="center" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="600" class="templateContainer"><tr><td valign="top" class="footerContainer" style="padding-top:9px; padding-bottom:9px;"><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnDividerBlock" style="min-width:100%;"><tbody class="mcnDividerBlockOuter"><tr><td class="mcnDividerBlockInner" style="min-width: 100%; padding: 9px 18px;"><table class="mcnDividerContent" border="0" cellpadding="0" cellspacing="0" width="100%" style="min-width:100%;"><tbody><tr><td> <span></span></td></tr></tbody></table></td></tr></tbody></table><table border="0" cellpadding="0" cellspacing="0" width="100%" class="mcnTextBlock" style="min-width:100%;"><tbody class="mcnTextBlockOuter"><tr><td valign="top" class="mcnTextBlockInner" style="padding-top:9px;"> <!--[if mso]><table align="left" border="0" cellspacing="0" cellpadding="0" width="100%" style="width:100%;"><tr> <![endif]--> <!--[if mso]><td valign="top" width="600" style="width:600px;"> <![endif]--><table align="left" border="0" cellpadding="0" cellspacing="0" style="max-width:100%; min-width:100%;" width="100%" class="mcnTextContentContainer"><tbody><tr><td valign="top" class="mcnTextContent" style="padding-top:0; padding-right:18px; padding-bottom:9px; padding-left:18px;"><div style="text-align: center;"><h2>Have questions? We´re here to help.</h2><h3 style="text-align: center;"><span style="color:#F0FFF0">support@cherryhire.com</span></h3> <br> <br> 2018 © Cherry Hire. All right reserved.</div></td></tr></tbody></table> <!--[if mso]></td> <![endif]--> <!--[if mso]></tr></table> <![endif]--></td></tr></tbody></table></td></tr></table></td></tr></table></td></tr></table></td></tr></table></center></body></html>

	';
	$from = 'no-reply@cherryhire.com';
//Mail configuration
				$config['protocol']     = 'smtp';
				$config['smtp_host']    = 'ssl://smtp.cherryhire.net';
				$config['smtp_port']    = 587;
				$config['smtp_user']    = 'no-reply@cherryhire.net';
				$config['smtp_pass']    = 'Startup2019#';
				$config['charset']      = 'utf-8';

				$this->load->library('email'); 
				$this->email->set_mailtype("html");
				$this->email->set_newline('\r\n');

				$this->email->from('no-reply@cherryhire.net' , 'Cherryhire');
		$this->email->to($to);

		//$this->email->cc('sreejith@aatoon.com');

		$this->email->subject($subject1);
		$this->email->message($message);
		if ($this->email->send()) {

			echo "Mail Sent!";exit;

			return 1;

		} else {

			echo "There is error in sending mail!";exit;

			return 0;

		}

   }

public function test()
{
	$empid = '221';
	$this->employermodel->insert_subscribe($empid);
}


}



/* End of file employer.php */

/* Location: ./application/controllers/employer.php */