<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobportal extends CI_Controller {

	

	/* Init Function

	 *

	 * return void

	 */

	public function __construct()

	{

		parent::__construct();

		$this->clear_cache();

		$this->load->library('email'); // load email library

		$this->load->model('jobportalmodel');

		$this->load->model('sitemodel');

		$this->data['thisyear'] = date('Y');

		$this->data['mid'] 		= 0;

		$this->data['emid'] 	= 99;

		$this->data['cmid'] 	= 0;

	}

	

	/* Index List Function

	 *

	 * return void

	 */
	

	public function index()
	{
		$this->data['message'] = '';
		$this->data['status'] = '';
		$shrt[]     = '';
		$funarea[]  = '';
		$location[] = '';
		$jtitle		= ''; 
		$sal		= ''; 
		$expr		= ''; 
		$minexp		= 0; 
		$maxexp 	= 99; 
		$jtype		= '';
		$this->data["country_list"] = $this->jobportalmodel->get_country();
		$this->data["funarea_list"] = $this->sitemodel->get_farea();
		$this->data["monsal_list"] 	= $this->jobportalmodel->getsalary_list();
		/*shorting*/
		if(!empty($this->input->get('postedon'))) { $shrt    	= $this->input->get('postedon'); }
		if(!empty($this->input->get('funarea')))  { $funarea  	= $this->input->get('funarea'); }
		if(!empty($this->input->get('location'))) { $location  	= $this->input->get('location'); }
		if(!empty($this->input->get('jtype')))    { $jtype  	= $this->input->get('jtype'); }
		if(!empty($this->input->get('sal')))      { $sal  		= $this->input->get('sal'); }
		if(!empty($this->input->get('expr')))     { $expr  		= $this->input->get('expr'); }
		if(!empty($this->input->get('title')))    { $jtitle  	= $this->input->get('title'); }

		$this->data["records"] 	= $this->jobportalmodel->get_record($jtitle,$shrt,$funarea,$location,$jtype,$sal,$expr);
		$this->load->view('new/job-result',$this->data);
	}



	public function index1()

	{

		$this->data['message'] = '';

		$this->data['status'] = '';

		//$this->input->post('uemail')

		

		//Form Validation

		$this->form_validation->set_rules('jtitle', 'Job Title', 'trim');

		$this->form_validation->set_rules('minexp', 'Min Experience', 'trim');

		$this->form_validation->set_rules('maxexp', 'Max Experience', 'trim');

		$this->form_validation->set_rules('location', 'Location', 'xss_clean');

		if ($this->form_validation->run() == TRUE && $this->input->post('submit')) {			

			$total_row = $this->jobportalmodel->record_count($this->input->post('jtitle'), $this->input->post('minexp'), $this->input->post('maxexp'), $this->input->post('location'));

			$this->data["records"] = $this->jobportalmodel->get_record($this->input->post('jtitle'), $this->input->post('minexp'), $this->input->post('maxexp'), $this->input->post('location'));

			$this->data['formdata'] = array(

				'jtitle'=>$this->input->post('jtitle'),

				'minexp'=>$this->input->post('minexp'),

				'maxexp'=>$this->input->post('maxexp'),

				'location'=>$this->input->post('location')

			);

		} else {

			$jtitle		= '';

			$minexp		= 0;

			$maxexp 	= 99;

			$location 	= '';

			$total_row 	= $this->jobportalmodel->record_count($jtitle,$minexp,$maxexp,$location);

			//Get Record

			$this->data["records"] 	= $this->jobportalmodel->get_record($jtitle,$minexp,$maxexp,$location);

			$this->data['formdata'] = array(

				'jtitle'=>'',

				'minexp'=>'',

				'maxexp'=>'',

				'location'=>''

			);

		}

		

		//Display message

		if ($this->input->get('ins')==1 || $this->input->get('ins')==2 || $this->input->get('ins')==3 || $this->input->get('ins')==4 || $this->input->get('ins')==5 || $this->input->get('inval')==1) { 

			 if ($this->input->get('ins') == 1) {

				 //Successfully applied

				 $this->data['status'] = 'success';

				 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

	             <button data-dismiss="alert" class="close" type="button">&times;</button> Thank you for applying at CherryHire.com. Your application has been sent successfully to the Employer. Please continue browsing. </div>';

			 }

			 if ($this->input->get('ins') == 2) {

				 //failed to apply

				 $this->data['status'] = 'fail';

			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-danger">

	             <button data-dismiss="alert" class="close" type="button">&times;</button> Unable to process! </div>';

			 }

			 if($this->input->get('ins') == 3) {

				 //Already applied

				 $this->data['status'] = 'fail';

			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-danger">

	             <button data-dismiss="alert" class="close" type="button">&times;</button> You have already applied for this job! </div>';

			 }

			 if($this->input->get('ins') == 4) {

				 //Free account expired

				 $this->data['status'] = 'fail';

			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-danger">

	             <button data-dismiss="alert" class="close" type="button">&times;</button> Thank you. You have reached the limit of your free STARTER  plan. To apply for more jobs, please <a href="'.$this->config->base_url().'Plans">click here</a> to upgrade your plan </div>';

			 }

			 if($this->input->get('ins') == 5) {

				 //Limit expired

				 $this->data['status'] = 'fail';

			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-danger">

	             <button data-dismiss="alert" class="close" type="button">&times;</button> Thank you. You have reached the limit of your plan. To apply for more jobs, please <a href="'.$this->config->base_url().'Plans">click here</a> to upgrade your plan </div>';

			 }

			 if($this->input->get('inval') == 1) {

				 //Access invalid job

				 $this->data['status'] = 'fail';

			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-danger">

	             <button data-dismiss="alert" class="close" type="button">&times;</button> Unable to process! Invalid Job</div>';

			 }

		}

		

		$this->data['title']		= 'JobPortal | Post Jobs Online Free|Get Resumes|Conduct Video Interviews';

		$this->data['metakey']		= 'HR Solutions, Cherry Hire, IPF, Job Openings';

		$this->data['metadesc']		= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';

		$this->data['cmid'] 		= 2;

		$this->data["country_list"] = $this->jobportalmodel->get_country();

		$this->data["minexp_list"] 	= $this->jobportalmodel->get_minexp();

		$this->data["maxexp_list"] 	= $this->jobportalmodel->get_maxexp();

		
		// $this->load->view('common/header',$this->data);

		// $this->load->view('common/candidate-menu',$this->data);

		// $this->load->view('jobs',$this->data);

		// $this->load->view('common/footer',$this->data);
		
		
		$this->load->view('new/job-result',$this->data);

	}

	

	/* Job Details Function

	 * @param string $jobid

	 * return void

	 */

	public function jobdetails($jobid=null)

	{

		if(empty($jobid)) { redirect($this->config->base_url().'Jobs/?inval=1'); } // Handling Session

		if(!isset($_GET['js'])) { $this->data['jsrc'] = 5; }else { $this->data['jsrc'] = $this->input->get('js'); } 

		if(!isset($_GET['source'])) { $this->data['source'] = 'CherryHire'; }else { $this->data['source'] = $this->input->get('source'); } 

		$this->data['jobid'] = $jobid;

		if(empty($this->data['jobid'])) { redirect($this->config->base_url().'Jobs/?inval=1'); }

		//Get Job details

		$this->data["jobdata"] = $this->jobportalmodel->get_single_record($this->data['jobid']);

		$this->data["jobcode"] = $this->jobportalmodel->formatedjobid($this->data["jobdata"]["job_id"]);

		if(empty($this->data["jobdata"])) { redirect($this->config->base_url().'Jobs/?inval=1'); }

		//Get Employer Details

		$emprecords = $this->jobportalmodel->get_emp_record($this->data['jobdata']['job_created_by']);

		if(empty($emprecords)) { redirect($this->config->base_url()); }

		$this->data['portalid'] 	= $emprecords['emp_id'];

		$this->data['portalname'] 	= $emprecords['emp_comp_name'];

		

		$this->data['message']  = '';		

		$this->data['formdata'] = array(

			'firstname'=>'',

			'lastname'=>'',

			'cntrycode'=>'',

			'phone'=>'',

			'emailid'=>'',

			'usrpwd'=>'',

			'repwd'=>'',

			'dob'=>'',

			'gender'=>'',

			'edu'=>'',

			'nation'=>'',

			'totexp'=>'',

			'currcompany'=>'',

			'currloc'=>'',

			'funarea'=>'',

			'industry'=>'',

			'currdesig'=>'',

			'jobalert'=>'1'

		);

		

		//Display message

		if($this->input->get('ins')==1 || $this->input->get('ins')==2 || $this->input->get('ins')==3 || $this->input->get('ins')==11 || $this->input->get('ln')==1) { 

			 if($this->input->get('ins') == 1) {

				 $this->data['status'] = 'success';

				 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

	             <button data-dismiss="alert" class="close" type="button">&times;</button> Thank you. Your application has been sent successfully to the Employer. Please continue browsing </div>';

			 }

			 if($this->input->get('ins') == 11) {

				 $this->data['status'] = 'fail';

				 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-warning">

	             <button data-dismiss="alert" class="close" type="button">&times;</button> Thank you. Your application has been sent successfully to the Employer. But unable to submit CV, so please send your CV to cv@cherryhire.com </div>';

			 }

			 if($this->input->get('ins') == 2) {

				 $this->data['status'] = 'fail';

			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-danger">

	             <button data-dismiss="alert" class="close" type="button">&times;</button> Unable to proccess. Failed to Apply! </div>';

			 }

			 if($this->input->get('ins') == 3) {

				 $this->data['status'] = 'fail';

			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-danger">

	             <button data-dismiss="alert" class="close" type="button">&times;</button> Unable to proccess. Failed to Apply! </div>';

			 }

			 if($this->input->get('ln') == 1) {

				 $this->data['status'] = 'fail';

			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-danger">

	             <button data-dismiss="alert" class="close" type="button">&times;</button> Invalid username or password. Failed to Apply! </div>';

			 }

		}



		$this->data['pagehead'] = 'Job Details';		

		$this->data['number1'] 	= rand(1,9);

		$this->data['number2'] 	= rand(1,9);

		$this->data['sum'] 		= $this->data['number1'] + $this->data['number2'];

		

		$sess_array = array(

			'correctsum' => $this->data['sum']

		);

		$this->session->set_userdata($sess_array);

		

		$this->data["nation_list"] 	= $this->sitemodel->get_nationality();

		$this->data["country_list"] = $this->sitemodel->get_country();

		$this->data["edu_list"] 	= $this->sitemodel->get_edu();

		$this->data["funarea_list"] = $this->sitemodel->get_farea();

		$this->data["ind_list"] 	= $this->sitemodel->get_industry();

		

		$this->data['title']		= $this->data["jobdata"]['job_title'];

		$this->data['metakey']		= 'HR Solutions, Cherry Hire, IPF, Job Openings';

		$this->data['metadesc']		= $this->data["jobdata"]['emp_comp_name'].' is looking to fill '. $this->data["jobdata"]['job_title'].' position in '.$this->data["jobdata"]['job_location'];

		

		$this->data['cmid'] 			= 0;

		$this->load->view('common/header',$this->data);

		$this->load->view('common/candidate-menu',$this->data);

		$this->load->view('jobdetails',$this->data);

		$this->load->view('common/footer',$this->data);		

	}

	

	/* Forget Password Function

	 * @param string $jobid

	 * return void

	 */

	public function fpwd_request($jobid=null)

	{

		if(!isset($jobid)) { redirect($this->config->base_url().'Jobs/?inval=1'); } // Handling Session

		if(!isset($_GET['js'])) { $this->data['jsrc'] = 5; }else { $this->data['jsrc'] = $this->input->get('js'); } 

		if(!isset($_GET['source'])) { $this->data['source'] = 'CherryHire'; }else { $this->data['source'] = $this->input->get('source'); } 

		$this->data['jobid'] 	= $jobid;

		$this->data['uemail'] 	= $this->input->post('uemail');

		//Form validation

		$this->form_validation->set_rules('uemail', 'Username', 'trim|required|valid_email|callback_check_userbase');

		if ($this->form_validation->run() == FALSE) {

			//$this->data['errmsg']='Invalid username or password';

			redirect($this->config->base_url().'JobDetails/'.$this->data['jobid'].'/?js='.$this->data['jsrc'].'&source='. $this->data['source'].'&rq=2');

		} else {

			$cpwd_id = $this->jobportalmodel->recover_set($this->data['uemail']);

			$fwmailstatus = $this->fsendmail($cpwd_id,$this->data['jobid'],$this->data['jsrc'],$this->data['source']);

			//$cid= $this->session->userdata('candid');

			//$fwmailstatus = $this->fsendmail($cid, $this->session->userdata('candname'), $this->session->userdata('candemail'), $this->session->userdata('candhash'));

			redirect($this->config->base_url().'JobDetails/'.$this->data['jobid'].'/?js='.$this->data['jsrc'].'&source='. $this->data['source'].'&rq=1');

		}

	}

	

	/* Change Password Function

	 * 

	 * return void

	 */

	public function cpwd_request()

	{

		$this->data['message'] 	= '';

		$this->data['stat'] 	= '';

		$this->data['errmsg'] 	= '';

		$endDate 				= time();

		$expdt 					= date('Y-m-d H:i:s', strtotime($endDate));

		//Form Validation

		$this->form_validation->set_rules('npwd', 'New Password', 'trim|required|min_length[6]|callback_name_check');

		$this->form_validation->set_rules('cpwd', 'Confirm Password', 'trim|required|min_length[6]|matches[npwd]');

		

		if ($this->form_validation->run() == TRUE) {

			$this->data['cid'] 		= $this->encrypt->decode(base64_decode($this->input->post('authcode')));

			$this->data['startdt'] 	= $this->encrypt->decode(base64_decode($this->input->post('validcode')));

			$this->data['vcode'] 	= $this->encrypt->decode(base64_decode($this->input->post('verifycode')));

			if (empty($this->data['cid']) || empty($this->data['startdt'])) { 

				$this->data['stat']		= 'invalid';

				$this->data['message'] 	= '<div style="margin-top: 16px;" class="alert alert-danger"> Invalid Request. Unable to proccess! </div>';

			} else {

				if ($expdt > $this->data['startdt']) {

					$this->data['stat']		= 'invalid';

					$this->data['message'] 	= '<div style="margin-top: 16px;" class="alert alert-danger">Invalid Request. Unable to proccess!</div>';

				} else {

					$cpwdres 				= $this->jobportalmodel->change_usr_pwd($this->data['cid']);

					$this->data['stat']		= 'success';

					$this->data['message'] 	= '<div style="margin-top:16px;" class="alert alert-success">Password has been changed successfully! </div>';

				}

			}

		} else {

			if (isset($_POST['authcode']) && isset($_POST['validcode'])) {

				$this->data['cid'] 		= $this->encrypt->decode(base64_decode($this->input->post('authcode')));

				$this->data['startdt'] 	= $this->encrypt->decode(base64_decode($this->input->post('validcode')));

				$this->data['vcode'] 	= $this->encrypt->decode(base64_decode($this->input->post('verifycode')));

				if (empty($this->data['cid']) || empty($this->data['startdt'])) { 

					$this->data['stat']		= 'invalid';

					$this->data['message']	= '<div style="margin-top:16px;" class="alert alert-danger">Invalid Request. Unable to proccess!</div>';

				} else {

					$result = $this->jobportalmodel->get_candidate_record($this->data['cid']);

					if (empty($result)) {

						$this->data['stat']		= 'invalid';

						$this->data['message'] 	= '<div style="margin-top: 16px;" class="alert alert-danger"> Invalid Request. Unable to proccess! </div>';

					}

				}

				$this->data['errmsg'] = '<div style="margin-top: 16px;" class="alert alert-danger"> Invalid Request. Unable to proccess! <br> '.validation_errors().'</div>';

			} else {

				if(!isset($_GET['pid'])) { $this->data['stat']='invalid'; } 

				if(!isset($_GET['exp'])) { $this->data['stat']='invalid'; } 

				if(!isset($_GET['auth'])) { $this->data['stat']='invalid'; } 

				

				$this->data['cid'] 		= $this->encrypt->decode(base64_decode($this->input->get('pid')));

				$this->data['startdt'] 	= $this->encrypt->decode(base64_decode($this->input->get('exp')));

				$this->data['vcode'] 	= $this->encrypt->decode(base64_decode($this->input->get('auth')));

				if(empty($this->data['cid']) || empty($this->data['startdt'])) { 

					$this->data['stat']		= 'invalid';

					$this->data['message'] 	= '<div style="margin-top:16px;" class="alert alert-danger">Invalid Request. Unable to proccess!</div>';

				} else {

					$result = $this->jobportalmodel->get_candidate_record($this->data['cid']);

					if(empty($result)) {

						$this->data['stat'] = 'invalid'; $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-danger"> Invalid Request. Unable to proccess! </div>';

					}

				}

			}

			

			if ($expdt > $this->data['startdt']) {

				$this->data['stat']='invalid';

				$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-danger"> Invalid Request. Unable to proccess! </div>';

			}

		}



		$this->data['pagehead']	= 'Change Password';		

		$this->data['title']	= 'JobPortal | Post Jobs Online Free|Get Resumes|Conduct Video Interviews';

		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF, Job Openings';

		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';

		$this->data['mid'] 		= 0;

		$this->load->view('common/header',$this->data);

		$this->load->view('userchngpwd',$this->data);

		$this->load->view('common/footer',$this->data);

	}

	

	/* Signin and Apply Function

	 * @param string $jobid

	 * return void

	 */

	public function signin_user($jobid=null)

	{	

		if(empty($jobid)) { redirect($this->config->base_url().'Jobs/?inval=1'); } // Handling Session

		if(!isset($_GET['js'])) { $this->data['jsrc'] = 5; }else { $this->data['jsrc'] = $this->input->get('js'); } 

		if(!isset($_GET['source'])) { $this->data['source'] = 'CherryHire'; }else { $this->data['source'] = $this->input->get('source'); } 

		$this->data['jobid'] = $jobid;

		//Get Job Details

		$this->data["jobdata"] = $this->jobportalmodel->get_single_record($this->data['jobid']);

		if(empty($this->data["jobdata"])) { redirect($this->config->base_url().'Jobs/?inval=1'); }

		//Get Employer Details

		$emprecords = $this->jobportalmodel->get_emp_record($this->data['jobdata']['job_created_by']);

		if(empty($emprecords)) { redirect($this->config->base_url().'Jobs/?inval=1'); }

		$this->data['portalid'] 	= $emprecords['emp_id'];

		$this->data['portalname'] 	= $emprecords['emp_comp_name'];

		

		$this->form_validation->set_rules('username', 'Username', 'trim|required|valid_email');

		$this->form_validation->set_rules('password', 'Password', 'trim|required|callback_check_database');

		if($this->session->userdata('cand_chid')) {

			$cid	= $this->session->userdata('cand_chid');

			//Apply process

			$pjsid 	= $this->jobportalmodel->postjob_source($cid,$this->data["jobdata"]['job_id'],$this->data['jsrc']);

			

			if($pjsid == 0) {

				//Already applied

				redirect($this->config->base_url().'Jobs/?ins=3&Stat=Success&js='.$this->input->get('js').'&mailstat=0');

			}

			if($pjsid == 2) {

				//Free registration expired

				redirect($this->config->base_url().'Jobs/?ins=4&Stat=Upgrade&js='.$this->input->get('js').'&mailstat=0');

			}

			if($pjsid == 3) {

				//Sunscription expired

				redirect($this->config->base_url().'Jobs/?ins=5&Stat=Upgrade&js='.$this->input->get('js').'&mailstat=0');

			}	

			//Mail to Employer

			$empmailstatus = $this->empsendmail($this->data['jobid'], $this->data["jobdata"]['emp_email'],$this->data["jobdata"]['emp_fname'],$this->data["jobdata"]['job_title'],$this->data["jobdata"]['job_id'],$cid);

			

			//Mail to Candidate

			$appmailstatus = $this->applymail($cid, $this->data['jobid'], $this->data["jobdata"]['job_title']);			

			

			redirect($this->config->base_url().'Jobs/?ins=1&Stat=Success&js='.$this->input->get('js').'&mailstat='.$empmailstatus);

		} else if ($this->form_validation->run() == FALSE) {

			//$this->data['errmsg']='Invalid username or password';

			redirect($this->config->base_url().'JobDetails/'.$this->data['jobid'].'/?js='.$this->data['jsrc'].'&source='. $this->data['source'].'&ln=1');

		} else {

			$cid 	= $this->session->userdata('cand_chid');

			$pjsid 	= $this->jobportalmodel->postjob_source($cid,$this->data["jobdata"]['job_id'],$this->data['jsrc']);

			

			if($pjsid == 0) {

				//Already applied

				redirect($this->config->base_url().'Jobs/?ins=3&Stat=Success&js='.$this->input->get('js').'&mailstat=0');

			}

			if($pjsid == 2) {

				//Free registration expired

				redirect($this->config->base_url().'Jobs/?ins=4&Stat=Upgrade&js='.$this->input->get('js').'&mailstat=0');

			}

			if($pjsid == 3) {

				//Sunscription expired

				redirect($this->config->base_url().'Jobs/?ins=5&Stat=Upgrade&js='.$this->input->get('js').'&mailstat=0');

			}	

			//Mail to Employer

			$empmailstatus = $this->empsendmail($this->data['jobid'], $this->data["jobdata"]['emp_email'],$this->data["jobdata"]['emp_fname'],$this->data["jobdata"]['job_title'],$this->data["jobdata"]['job_id'],$cid);

			

			//Mail to Candidate

			$appmailstatus = $this->applymail($cid, $this->data['jobid'], $this->data["jobdata"]['job_title']);

					

			redirect($this->config->base_url().'Jobs/?ins=1&Stat=Success&js='.$this->input->get('js').'&mailstat='.$empmailstatus);

		}	

	}

	

	/* Logout Function

	 * 

	 * return void

	 */

	public function logout()

	{

		$array_items = array('cand_chid', 'cand_chname', 'cand_chemail', 'cand_chpwd', 'cand_chlogged_in');

		$this->session->unset_userdata($array_items);

		$this->session->sess_destroy();

		redirect($this->config->base_url());

	}

	

	/* Login Check Function

	 * @param string $password

	 * return boolean

	 */

	function check_database($password)

	{

		//Field validation succeeded.  Validate against database

		$username = $this->input->post('username');

		//query the database

		$result = $this->jobportalmodel->candlogin($username, $password);

		if ($result) {

			$sess_array = array();

			foreach ($result as $row) {

				$sess_array = array(

					'cand_chid' => $row->can_id,

					'cand_chname' => $row->can_fname.' '.$row->can_lname,

					'cand_chemail' => $row->can_email,

					'cand_chpwd' => $row->can_hash,

					'cand_chlogged_in' => TRUE

				);

				$this->session->set_userdata($sess_array);

			}

			return TRUE;

		} else {

			$this->form_validation->set_message('check_database', 'Invalid username or password');

			return false;

		}

	}

	

	/* Check Username Function

	 * @param string $username

	 * return void

	 */

	function check_userbase($username)

	{

		//Field validation succeeded.  Validate against database

		//$username = $this->input->post('username');

		//query the database

		$result = $this->jobportalmodel->cand_fdetails($username);

		if ($result) {

			$sess_array = array();

			foreach ($result as $row) {

				$sess_array = array(

					'candid' => $row->can_id,

					'candname' => $row->can_fname.' '.$row->can_lname,

					'candemail' => $row->can_email,

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

	

	/* Signup and apply Job Function

	 * @param string $jobid

	 * return void

	 */

	public function applyjob($jobid=null)

	{

		if(!isset($jobid)) { redirect($this->config->base_url().'Jobs/?inval=1'); } // Handling Session

		if(!isset($_GET['js'])) { $this->data['jsrc'] = 5; }else { $this->data['jsrc'] = $this->input->get('js'); } 

		if(!isset($_GET['source'])) { $this->data['source'] = 'CherryHire'; }else { $this->data['source'] = $this->input->get('source'); } 

		$this->data['jobid'] 	= $jobid;

		//Get Job details

		$this->data["jobdata"] 	= $this->jobportalmodel->get_single_record($this->data['jobid']);

		if(empty($this->data["jobdata"])) { redirect($this->config->base_url().'Jobs/?inval=1'); }

		//Get employer details

		$emprecords = $this->jobportalmodel->get_emp_record($this->data['jobdata']['job_created_by']);

		if(empty($emprecords)) { redirect($this->config->base_url().'Jobs/?inval=1'); }

		$this->data['portalid'] 	= $emprecords['emp_id'];

		$this->data['portalname'] 	= $emprecords['emp_comp_name'];



		$this->data['message'] 	= '';		

		$this->data['formdata'] = array(

			'firstname'=>'',

			'lastname'=>'',

			'cntrycode'=>'',

			'phone'=>'',

			'emailid'=>'',

			'usrpwd'=>'',

			'repwd'=>'',

			'dob'=>'',

			'gender'=>'',

			'edu'=>'',

			'nation'=>'',

			'totexp'=>'',

			'currcompany'=>'',

			'currloc'=>'',

			'funarea'=>'',

			'industry'=>'',

			'currdesig'=>'',

			'jobalert'=>'1'

		);

		

		if ($this->input->get('ins') == 1 || $this->input->get('ins') == 2 || $this->input->get('ln') == 1) { 

			 if ($this->input->get('ins') == 1) {

				 $this->data['status'] 	= 'success';

				 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

	             <button data-dismiss="alert" class="close" type="button">&times;</button> <strong>Success!</strong> Congrats! <br> Thank You for registering at CherryHire.com, the premium online HR solution provider. <br> Kindly log into your account and update your profile to get the best matching jobs instantly.<br> Your application has been sent successfully to the Employer. Please continue browsing.<br>Wishing you the very best for a bright career! </div>';

			 }

			 if ($this->input->get('ins') == 2) {

				 $this->data['status'] 	= 'fail';

			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-danger">

	             <button data-dismiss="alert" class="close" type="button">&times;</button> Failed to Apply! '.validation_errors().'</div>';

			 }

			 if ($this->input->get('ln') == 1) {

				 $this->data['status'] 	= 'fail';

			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-danger">

	             <button data-dismiss="alert" class="close" type="button">&times;</button> Invalid username or password. Failed to Apply! </div>';

			 }

		}

		//From validation

		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('cntrycode', 'Country Code', 'trim|required');

		$this->form_validation->set_rules('phone', 'Phone No', 'trim|required');

		$this->form_validation->set_rules('emailid', 'Email ID', 'trim|required|valid_email|is_unique[ch_candidate.can_email]');

		$this->form_validation->set_rules('usrpwd', 'Password', 'trim|required|min_length[8]|callback_name_check');

		$this->form_validation->set_rules('repwd', 'Confirm Password', 'trim|required|matches[usrpwd]');

		$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');

		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');

		$this->form_validation->set_rules('edu', 'Gender', 'trim|required');

		$this->form_validation->set_rules('nation', 'Gender', 'trim|required');

		$this->form_validation->set_rules('totexp', 'Gender', 'trim|required');

		$this->form_validation->set_rules('currloc', 'Current Location', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('funarea', 'Functional Area', 'trim|required');

		$this->form_validation->set_rules('industry', 'Industry', 'trim|required');

		$this->form_validation->set_rules('currdesig', 'Current Designation', 'trim|required|callback_name_check');

		if (empty($_FILES['fileToUpload'])) {

			$this->form_validation->set_rules('fileToUpload', 'Resume', 'required');

		}

		$this->form_validation->set_message('is_unique', 'An account with this %s already exists. Kindly use a different one or sign in using your username and password');

		

		if ($this->form_validation->run() == TRUE) {

			//$cid=$this->jobportalmodel->insert_record();

			$cid 		= $this->sitemodel->postcv_record();	

			$csummary 	= $this->sitemodel->postsummary($cid);

			$smid 		= $this->sitemodel->postsocial_media($cid);

			$csubs	 	= $this->sitemodel->post_csubscribe($cid);

			$upfilename = 'resume'.'_'.$cid;

			

			$this->load->library('upload');

			if (isset($_FILES['fileToUpload'])  && !empty($_FILES['fileToUpload']) && is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {

				$image_path 			= realpath(APPPATH . '../resume');

				$cv['upload_path'] 		= $image_path;

				$cv['allowed_types'] 	= 'doc|docx|pdf|DOC|DOCX|PDF';

				$cv['max_size']			= '0';

				$cv['file_name'] 		= $upfilename;

				

				$this->upload->initialize($cv);

				if ($this->upload->do_upload('fileToUpload')) {

					$this->upload_file_name = '';

					$data 	=  $this->upload->data();									

					$this->upload_file_name = $data['file_name'];	

					$cvpath = $data['full_path'];

					

					$cvid 		= $this->sitemodel->postcv_details($cid,$cvpath);	

					//$website_url = $this->getDomainName(base_url());

					//$resumepath = $website_url.'/resume/'. basename($cvpath);

					$resumepath = $cvpath;

					//$cvid= $this->jobportalmodel->postcv_details($cid,$resumepath);

					$pjsid 		= $this->jobportalmodel->postjob_source($cid,$this->data['jobdata']['job_id'],$this->data['jsrc']);

					

					//Mail to CherryHire

					$mailstatus = $this->cvsendmail($cid,$cvpath);

					

					//Mail to Employer

					$empmailstatus = $this->empsendmail($this->data['jobid'], $this->data["jobdata"]['emp_email'],$this->data["jobdata"]['emp_fname'],$this->data["jobdata"]['job_title'],$this->data["jobdata"]['job_id'],$cid);

					

					//Mail to Candidate

					$appmailstatus = $this->applymail($cid, $this->data['jobid'], $this->data["jobdata"]['job_title']);

					

					redirect($this->config->base_url().'Jobs/?ins=1&Stat=Success&js='.$this->input->get('js'));

				} else {	

					$error = $this->upload->display_errors();

					redirect($this->config->base_url().'Jobs/?ins=11&Stat=Success');

				}				

			 } else {

				 redirect($this->config->base_url().'Jobs/?ins=11&Stat=Success');

				

			 }

		} else {

			if($this->input->post('firstname') || $this->input->post('emailid'))

			{

				$this->data['formdata'] = array(

					'firstname'=>$this->input->post('firstname'),

					'lastname'=>$this->input->post('lastname'),

					'cntrycode'=>$this->input->post('cntrycode'),

					'phone'=>$this->input->post('phone'),

					'emailid'=>$this->input->post('emailid'),

					'usrpwd'=>$this->input->post('usrpwd'),

					'repwd'=>$this->input->post('repwd'),

					'dob'=>$this->input->post('dob'),

					'gender'=>$this->input->post('gender'),

					'edu'=>$this->input->post('edu'),

					'nation'=>$this->input->post('nation'),

					'totexp'=>$this->input->post('totexp'),

					'currcompany'=>$this->input->post('currcompany'),

					'currloc'=>$this->input->post('currloc'),

					'funarea'=>$this->input->post('funarea'),

					'industry'=>$this->input->post('industry'),

					'currdesig'=>$this->input->post('currdesig'),

					'jobalert'=>$this->input->post('jobalert'),

				);

			

				$this->data['status'] = 'fail';

				$this->data['message'] = '<div class="alert alert-danger">

                    <strong>Failed!</strong> Sorry, we are unable to process your request. Please try again.

					'.validation_errors().'

                  </div>';

			}

		}



		$this->data['pagehead'] = 'Job Details';		

		$this->data['number1'] 	= rand(1,9);

		$this->data['number2'] 	= rand(1,9);

		$this->data['sum'] 		= $this->data['number1'] + $this->data['number2'];

		

		$sess_array = array(

			'correctsum' => $this->data['sum']

		);

		$this->session->set_userdata($sess_array);

		

		$this->data["nation_list"] 	= $this->sitemodel->get_nationality();

		$this->data["edu_list"] 	= $this->sitemodel->get_edu();

		$this->data["funarea_list"] = $this->sitemodel->get_farea();

		$this->data["ind_list"] 	= $this->sitemodel->get_industry();

		

		$this->data['title']		= $this->data["jobdata"]['job_title'];

		$this->data['metakey']		= 'HR Solutions, Cherry Hire, IPF, Job Openings';

		$this->data['metadesc']		= $this->data["jobdata"]['emp_comp_name'].' is looking to fill '. $this->data["jobdata"]['job_title'].' position in '.$this->data["jobdata"]['job_location'];

		$this->data['mid'] 			= 0;

		$this->load->view('common/header',$this->data);

		$this->load->view('jobdetails',$this->data);

		$this->load->view('common/footer',$this->data);

	}

	

	/* CV send mail Function

	 * @param int $cid

	 * @param string $cvpath

	 * return boolean

	 */

	function cvsendmail($cid=null,$cvpath=null)

	{

		$result = $this->jobportalmodel->get_candidate_record($cid);		

		$to 	= 'cv@cherryhire.com';

		$from 	= 'do-not-reply@cherryhire.com';

		

		$FName 		= $result['can_fname'];

		$LName 		= $result['can_lname'];

		$ContactNo 	= $result['can_ccode'].'-'.$result['can_phone'];

		$RegEmail 	= $result['can_email'];

		$DOB 		= ($result['can_dob']==0) ? 'Not Set' : date('d-m-Y', strtotime($result['can_dob']));

		$Gender 	= ($result['can_gender']=='') ? 'Not Set' : $result['can_gender'];

		$Edu 		= ($result['edu_name']=='') ? 'Not Set' : $result['edu_name'];

		$Nation 	= ($result['co_nationality']=='') ? 'Not Set' : $result['co_nationality'];

		$TotExp 	= ($result['can_experience']=='') ? 'Not Set' : $result['can_experience'];

		$CEmployer 	= ($result['can_curr_company']=='') ? 'Not Set' : $result['can_curr_company'];

		$CurrLoc 	= ($result['can_curr_loc']=='') ? 'Not Set' : $result['can_curr_loc'];

		$FunArea 	= ($result['fun_name']=='') ? 'Not Set' : $result['fun_name'];

		$JobAlert 	= $result['can_alert'];

		

		$cvpath 	= $cvpath;		

		$subject 	= 'Resume from Cherry Hire Application-'.$FName.' '.$LName;

		

		if ($JobAlert == 1) {

			$AlertJob = 'Yes';

		} else {

			$AlertJob = 'No';

		}

		

		//$website_url = $this->getDomainName(base_url());

		//$Resumewebpath = $website_url.'resume/'. basename($cvpath);

		$Resumewebpath = $cvpath;

		//Mail Body

		$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

					<html>

					<head>

					  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

					  <title>Cherryhire: New Candidate Received</title>

					</head>

					<body>

					<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">

					  

					  <p><strong>Cherryhire: New Candidate Received</strong></p>

					  <div align="left">

					  <table width="100%" border="0" style="border:1px solid #000; line-height:35px;">

						  <tr>

							<td width="20%"  style="border:1px solid #000; background:#CCC;"><strong>First Name :</strong></td>

							<td width="24%" style="border:1px solid #000;"> '.$FName.'</td>

							<td width="20%" style="border:1px solid #000; background:#CCC;"><strong>Last Name :</strong></td>

							<td width="26%" style="border:1px solid #000;"> '.$LName.'</td>

						  </tr>

						  <tr>

							<td style="border:1px solid #000; background:#CCC;"><strong>Contact No : </strong></td>

							<td style="border:1px solid #000;"> '.$ContactNo.'</td>

							<td style="border:1px solid #000; background:#CCC;"><strong>Email Id : </strong></td>

							<td style="border:1px solid #000;"> '.$RegEmail.'</td>

						  </tr>

						  <tr>

							<td style="border:1px solid #000; background:#CCC;"><strong>Date of Birth : </strong></td>

							<td style="border:1px solid #000;"> '.$DOB.'</td>

							<td style="border:1px solid #000; background:#CCC;"><strong>Gender : </strong></td>

							<td style="border:1px solid #000;"> '.$Gender.'</td>

						  </tr>

						  <tr>

							<td style="border:1px solid #000; background:#CCC;"><strong>Educational Qualification : </strong></td>

							<td style="border:1px solid #000;"> '.$Edu.'</td>

							<td style="border:1px solid #000; background:#CCC;"><strong>Nationality : </strong></td>

							<td style="border:1px solid #000;"> '.$Nation.'</td>

						  </tr>

						  <tr>

							<td style="border:1px solid #000; background:#CCC;"><strong>Total Experience : </strong></td>

							<td style="border:1px solid #000;">  '.$TotExp.' year(s)</td>

							<td style="border:1px solid #000; background:#CCC;"><strong>Current Employer : </strong></td>

							<td style="border:1px solid #000;"> '.$CEmployer.'</td>

						  </tr>

						  <tr>

						    <td style="border:1px solid #000; background:#CCC;"><strong>Current Location :</strong></td>

						    <td style="border:1px solid #000;">'.$CurrLoc.'</td>

						    <td style="border:1px solid #000; background:#CCC;"><strong>Functional Area : </strong></td>

						    <td style="border:1px solid #000;">'.$FunArea.'</td>

  						  </tr>

						  <tr>

							<td style="border:1px solid #000; background:#CCC;"><strong>Job Alert : </strong></td>

							<td colspan="3" style="border:1px solid #000;"> '.$AlertJob.'</td>

						  </tr>

						  <tr>

							<td style="border:1px solid #000; background:#CCC;"><strong>Resume Link</strong></td>

							<td colspan="3" style="border:1px solid #000;"> <a href="'.$Resumewebpath.'" title="Download CV"><img src="'.base_url().'images/download_cv.png" alt="Download CV"></a></td>

						  </tr>

						</table>

						</div>

					  

					  

					  <p>-- </p>

					  <p>Regards, <br> Webmaster - Cherry Hire</p>

					</div>

					</body>

					</html>';

		//Mail configuration

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

		$this->email->from($from, 'Webmaster');

		$this->email->to($to);

		//$this->email->cc('admin@cherryhire.com'); 

		$this->email->subject($subject);

		$this->email->message($message);

		$this->email->attach($cvpath); // attach file

		//$this->email->attach('/path/to/file2.pdf');

		if ($this->email->send()) {

			//"Mail Sent!";

			return 1;

		} else {

			//"There is error in sending mail!";

			return 0;

		}

	}

	

	/* Send mail to employer Function

	 * @param int $cid

	 * @param string $JobEnId

	 * @param string $emailid

	 * @param string $fname

	 * @param string $jobtitle

	 * @param int $jid

	 * return boolean

	 */

	function empsendmail($JobEnId=null,$emailid=null,$fname=null,$jobtitle=null,$jid=null,$cid=null)

	{

		//Get Candidate details

		$result 		= $this->jobportalmodel->get_candidate_record($cid);		

		$to 			= $emailid;

		$from 			= 'do-not-reply@cherryhire.com';		

		$CName 			= $result['can_fname'].' '.$result['can_lname'];

		$ContactNo 		= $result['can_ccode'].'-'.$result['can_phone'];

		$canEmail 		= $result['can_email'];

		$coverletter 	= $result['cv_cletter'];

		$cvpath 		= $result['cv_path'];

		

		if($coverletter == '') {

			$coverletter = 'Not Provided';	

		}

		//Mail subject

		$subject = 'Application for the post of -'.$jobtitle.'(#'.$jid.')';

		

		//$website_url = $this->getDomainName(base_url());

		//$Resumewebpath = $website_url.'resume/'. basename($cvpath);

		//$Resumewebpath = $cvpath; /******Direct CV Path******/

		$Resumewebpath = $this->config->base_url().'hire/Apply/ViewProfile/'.$result['can_encrypt_id'].'/'.$JobEnId;

		//Mail Body

		$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

					<html>

					<head>

					  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

					  <title>Cherryhire: New Candidate Received</title>

					</head>

					<body>

					<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 13px; border:1px solid #000; margin:0px auto;">

					  

					  <p><strong>CherryHire : Application received for the post of -'.$jobtitle.'(#'.$jid.')</strong></p>

					  <hr>

					  <div align="left" style="padding:20px;">

					  <p>'.$CName.' has applied to the '.$jobtitle.'(#'.$jid.') job your company posted through Cherryhire.</p>

					  <table width="100%" border="0" style="border:1px solid #CCC; background:#CCC; line-height:45px;">

						  <tr>

							<td colspan="3">

                            <strong>Name :</strong> '.$CName.'<br /><strong>Email :</strong> '.$canEmail.'<br /><strong>Phone :</strong>'.$ContactNo.'</td>

							<td width="26%"><a href="'.$Resumewebpath.'" title="Download CV"><img src="'.base_url().'images/download_cv.png" alt="Download CV"></a></td>

						  </tr>

						</table>

						<p><strong>Cover Letter :</strong></p>

						<p>'.$coverletter.'</p>

						</div>

					  

					  

					  <p>-- </p>

					  <p>Regards, <br> Webmaster - Cherry Hire</p>

					</div>

					</body>

					</html>';

		//Mail configuration

		$config = Array(
                   'protocol' => 'mail',
                   'smtp_host' => 'mail.cherryhire.com',
                   'smtp_port' => 25,
                   'smtp_user' => 'no-reply@cherryhire.com',
                   'smtp_pass' => 'Chire@DNply',
                   'mailtype'  => 'html', 
                   'wordwrap'  =>true,
                   'charset'   => 'utf-8'
               );

		

		$this->email->initialize($config);

		$this->email->clear(TRUE);

		$this->email->set_newline("\r\n");

		$this->email->from('no-reply@cherryhire.com', 'CherryHire');

		$this->email->to($to);

		$this->email->subject($subject);

		$this->email->message($message);

		if ($this->email->send()) {

			//"Mail Sent!";

			return 1;

		} else {

			//"There is error in sending mail!";

			return 0;

		}

	}

	

	/* Forget password mail Function

	 * @param string $cpwd_id

	 * @param string $jobid

	 * @param int $jsrc

	 * @param int $source

	 * return boolean

	 */

	function fsendmail($cpwd_id=null,$jobid=null,$jsrc=null,$source=null)

	{

		$resetdetails = $this->jobportalmodel->get_recover_data($cpwd_id);

		if(empty($resetdetails)) {

			redirect($this->config->base_url().'JobDetails/'.$jobid.'/?js='.$jsrc.'&source='. $source.'&rq=1');

		}

		$candname 	= $resetdetails['can_fname'].' '.$resetdetails['can_lname'];

		$to 		= $resetdetails['can_email'];

		$from 		= 'do-not-reply@cherryhire.com';

		$subject 	= 'Reset your Cherry Hire password';

		$startDate 	= time();

		$expdt 		= strtotime(date('Y-m-d H:i:s', strtotime('+1 day', $startDate)));

		//Mail body

		$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

					<html>

					<head>

					  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

					  <title>Reset your Cherry Hire password</title>

					</head>

					<body>

					<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 13px; background:#CCC; border:1px solid #CCC; margin:0px auto; padding:30px;">

						<p><img src="http://staging.cherryhire.com/site/images/logo.png" alt="Cherry Hire"></p>

						<br />

						<div style="background:#fff; border:1px solid #999; margin:0px auto; padding:10px;">

							<p>Hi '.$candname.'!<p>

							<br />

							<p>Somebody recently asked to reset your Cherry Hire account password.</p>

							<p style="font-size:18px; margin:10px 0px 10px 0px;"><h1><strong>Code : '.$resetdetails['cpwd_otp'].'</strong></h1></p>

							<p>Click here to <strong><a href="http://staging.cherryhire.com/candidate/User/ResetInitiate/?process=change&pid='.base64_encode($resetdetails['cpwd_encrypt_id']).'&exp='.$expdt.'&auth='.$resetdetails['cpwd_vcode'].'">reset</a></strong> your password.</p>

							

							<p>If you did not request a new password, please let us know immediately at support@cherryhire.com</p>

							

							<p>See you soon on CherryHire.</p>

							<p>-- </p>

					  		<p>Regards, <br> - Cherry Hire Team</p>

							

						</div>

					</div>

					</body>

					</html>';

		//Mail configuration
$config = Array(
                   'protocol' => 'mail',
                   'smtp_host' => 'mail.cherryhire.com',
                   'smtp_port' => 25,
                   'smtp_user' => 'no-reply@cherryhire.com',
                   'smtp_pass' => 'Chire@DNply',
                   'mailtype'  => 'html', 
                   'wordwrap'  =>true,
                   'charset'   => 'utf-8'
               );

		

		$this->email->initialize($config);

		

		$this->email->clear(TRUE);

		$this->email->set_newline("\r\n");

		$this->email->from('no-reply@cherryhire.com', 'CherryHire');

		$this->email->to($to);

		$this->email->subject($subject);

		$this->email->message($message);

		if ($this->email->send()) {

			//"Mail Sent!";

			return 1;

		} else {

			//"There is error in sending mail!";

			return 0;

		}		

	}

	

	/* Apply mail Function

	 * @param int $cid

	 * @param int $jid

	 * @param string $jobtitle

	 * return boolean

	 */

	function applymail($cid=null, $jid=null, $jobtitle=null)

	{

		$result = $this->jobportalmodel->get_candidate_record($cid);

		

		$CName 		= $result['can_fname'].' '.$result['can_lname'];

		$ContactNo 	= $result['can_ccode'].'-'.$result['can_phone'];

		$canEmail 	= $result['can_email'];

		$ctc 		= $result['can_curr_sal'];

		$skill 		= $result['can_skills'];

		$farea 		= $result['fun_name'];

		$company 	= $result['can_curr_company'];

		

		$jobURL 	= $this->config->base_url().'JobDetails/'.$jid.'/?js=6&source=Email';

		

		$to 	= $canEmail;

		$from 	= 'do-not-reply@cherryhire.com';

		$subject= 'Your CV has been successfully delivered to the employer';

		//Mail body

		$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

					<html>

					<head>

					  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

					  <title>Apply job - CherryHire</title>

					</head>

					<body>

					<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 13px; background:#CCC; border:1px solid #CCC; margin:0px auto; padding:30px;">

						<p><img src="http://staging.cherryhire.com/site/images/logo.png" alt="Cherry Hire"></p>

                        <br />

                        <div style="background:#FC6; border:1px solid #F90; border-radius:5px; margin:0px auto; padding:10px; font-size:16px; font-weight:bold;">Your application has been sent successfully to the employer</div>

						<br />

						<div style="background:#fff; border:1px solid #999; margin:0px auto; padding:10px;">

							<p>Dear '.$CName.',<p>

							<br />

							<p>Your application for the below mentioned job has been sent to the employer on '.date('d M, Y').'</p>

                            <div style="background:#FC6; border:1px solid #F90; border-radius:10px; margin:0px auto; padding:10px;">

							

							<table width="100%" border="0">

                              <tr style="border-bottom:1px dotted #39C;">

                                <td width="80%" style="padding-left:10px;">Position applied for : '.$jobtitle.' </td>

                                <td width="20%"> <a href="'.$jobURL.'" style="color:#FFF; text-decoration:underline;" target="_blank"><strong>View Job</strong></a></td>

                              </tr>

                            </table>

							</div>

                            <hr />

								<p>Recruiters may try to get in touch with you at</p>

                                <p>Mobile : '.$ContactNo.'</p>

                                <p>Email : '.$canEmail.'</p>

							<hr />

                            

                            <div style="background:#999; border:1px solid #999; color:#FFF; margin:0px auto; padding:10px; font-weight:bold; text-align:center;">Your profile appears as below to the recruiter. </div>

                            <table width="100%" border="0" style="background:#3CF; border:1px solid #39C; line-height:25px;">

                              <tr style="border-bottom:1px dotted #39C;">

                                <td width="27%" style="padding-left:10px;">Key Skill</td>

                                <td width="73%">: '.$skill.'</td>

                              </tr>

                              <tr style="border-bottom:1px dotted #39C;">

                                <td style="padding-left:10px;">Functional Area</td>

                                <td>: '.$farea.'</td>

                              </tr>

                              <tr style="border-bottom:1px dotted #39C;">

                                <td style="padding-left:10px;">Current Company</td>

                                <td>: '.$company.'</td>

                              </tr>

                              <tr>

                                <td style="padding-left:10px;">Monthly Salary</td>

                                <td>: '.$ctc.' </td>

                              </tr>

                            </table>

							<p><strong>Best of luck and wish you a great career ahead. </strong></p>

							<p>Team CherryHire</p>

						</div>

					</div>

					</body>

					</html>';

		//Mail Configuration			

		$config = Array(
                   'protocol' => 'mail',
                   'smtp_host' => 'mail.cherryhire.com',
                   'smtp_port' => 25,
                   'smtp_user' => 'no-reply@cherryhire.com',
                   'smtp_pass' => 'Chire@DNply',
                   'mailtype'  => 'html', 
                   'wordwrap'  =>true,
                   'charset'   => 'utf-8'
               );

		

		$this->email->initialize($config);		

		$this->email->clear(TRUE);

		$this->email->set_newline("\r\n");

		$this->email->from('no-reply@cherryhire.com', 'CherryHire');

		$this->email->to($to);

		$this->email->subject($subject);

		$this->email->message($message);

		if ($this->email->send()) {

			//"Mail Sent!";

			return 1;

		} else {

			//"There is error in sending mail!";

			return 0;

		}		

	}

	

	/* Get domain name Function

	 * @param string $url

	 * return boolean/string

	 */

	function getDomainName($url)

	{

		if(filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED) === FALSE) {

			return false;

		}

		

		$urlChenks = parse_url($url);

		return $urlChenks['scheme'].'://'.$urlChenks['host'];

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



	/* Email validation function

	 * return int

	 */

	public function email_valid_ajax()

	{

		$email = $this->input->post('email');

		$result = $this->sitemodel->valid_candidate_email($email);

	 

		if ($result == 0) {

			echo 0;//email is unique. not signed up before

		} else {

			echo 1;

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

	

}
