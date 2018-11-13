<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

		$this->clear_cache();

		$this->load->model('jobsmodel');

		$this->load->model('subscriptionmodel');

		$this->load->library('email');

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }

		$this->data["subdetails"] = $this->subscriptionmodel->get_subscribe();

		$this->data["totjobapply"] = $this->subscriptionmodel->get_totaljob_apply();

		if($this->data["totjobapply"]>0 && ($this->data["subdetails"]['csub_type']==1 || $this->data["subdetails"]['csub_expire_dt']==0 || $this->data["subdetails"]['csub_expire_dt']<date('Y-m-d H:i:s'))) {

			$this->data["postdisable"] = 'disabled="disabled"';

		} else {

			$this->data["postdisable"] = '';

		}

		

		if ($this->data["subdetails"]['csub_type']==1) {

			$this->data["subsType"] = 1;

		} else {

			$this->data["subsType"] = 2;	

		}

	}

	

	public function viewlist()

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$cand_record = $this->jobsmodel->get_cand_record($this->session->userdata('cand_chid'));

		$can_skill_list = array();

		$can_ind = '';

		$can_farea = '';

		$can_exp = '';

		if($cand_record['can_skills'] != '') {

			$can_skill_list = explode(',', $cand_record['can_skills']);

		}

		

		if($cand_record['fun_id'] != '') {

			$can_farea = $cand_record['fun_id'];

		}

		

		if($cand_record['ind_id'] != '') {

			$can_ind = $cand_record['ind_id'];

		}

		

		if($cand_record['can_experience'] != '') {

			$can_exp = $cand_record['can_experience'];

		}

		

		$total_row = $this->jobsmodel->record_count($can_skill_list, $can_ind, $can_farea, $can_exp);

		$this->data["records"] = $this->jobsmodel->get_record($can_skill_list, $can_ind, $can_farea, $can_exp);

		$this->data['message'] = '';

		if($this->input->get('ins')==1 || $this->input->get('ins')==2 || $this->input->get('app')==1 || $this->input->get('app')==2) { 

			 if($this->input->get('ins') == 1) {

				 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

	             <button data-dismiss="alert" class="close" type="button">x</button> New Job Added </div>';

			 }

			 if($this->input->get('ins') == 2) {

			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

	             <button data-dismiss="alert" class="close" type="button">x</button> Job Creation Failed! '.validation_errors().'</div>';

			 }

			 if($this->input->get('app') == 1) {

				 if($this->session->flashdata('jobtitle')) { 

				 	$jobtitle = $this->session->flashdata('jobtitle'); 

				 	$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

	             	<button data-dismiss="alert" class="close" type="button">x</button> You have successfully applied to '.$jobtitle.' job and your CV has been sent to the employer </div>';

	         	}

			 }

			 if($this->input->get('app') == 2) {

			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

	             <button data-dismiss="alert" class="close" type="button">x</button>  You have failed to apply for the job! </div>';

			 }

		}



		$this->data['mid'] = 3;

		$this->data['sid'] = 301;

		$this->data['title'] = 'Cherry Hire App - My Jobs';

		$this->data['pagehead'] = 'Recommended Jobs For You';
		$this->data['count'] = $total_row ;


		// $this->load->view('common/header_inner',$this->data);

		// $this->load->view('common/leftmenu',$this->data);

		// $this->load->view('common/topmenu',$this->data);

		// $this->data['footer_nav']=$this->load->view('common/footerbar',$this->data,true);

		// $this->load->view('jobs/list',$this->data);

		// $this->load->view('common/footer_inner',$this->data);

		$this->load->view('new/list',$this->data);
	}

	

	public function skilllist()

	{

		$term = $this->input->post('term');

		$skill_list = $this->jobsmodel->get_skill_list();

		echo $skill_list;

	}



	public function jrolelist()

	{

		$term = $this->input->post('term');

		$jrole_list = $this->jobsmodel->get_jobrole_list();

		echo $jrole_list;

	}



	public function industrylist()

	{

		$term = $this->input->post('term');

		$ind_list = $this->jobsmodel->get_ind_list();

		echo $ind_list;

	}

	

	public function searchjob()

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$this->data['message'] = '';

		

		if($this->input->get('ins')==1 || $this->input->get('ins')==2 || $this->input->get('app')==1 || $this->input->get('app')==2) { 

			 if($this->input->get('ins') == 1)  {

				 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

	             <button data-dismiss="alert" class="close" type="button">x</button> New Job Added </div>';

			 }

			 if($this->input->get('ins') == 2) {

			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

	             <button data-dismiss="alert" class="close" type="button">x</button> Job Creation Failed! '.validation_errors().'</div>';

			 }

			 if($this->input->get('app') == 1) {

				 if($this->session->flashdata('jobtitle')) { 

				 	$jobtitle = $this->session->flashdata('jobtitle'); 

				 	$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

	             	<button data-dismiss="alert" class="close" type="button">x</button> You have successfully applied to '.$jobtitle.' job and your CV has been sent to the employer </div>';

	         	}

			 }

			 if($this->input->get('app') == 2) {

			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

	             <button data-dismiss="alert" class="close" type="button">x</button>  You have failed to apply for the job! </div>';

			 }

		}

		

		$this->data["country_list"] = $this->jobsmodel->get_country();

		$this->data["edu_list"] 	= $this->jobsmodel->get_edu();

		$this->data["funarea_list"] = $this->jobsmodel->get_farea();

		$this->data["ind_list"] 	= $this->jobsmodel->get_industry();

		$this->data["jrole_list"] 	= $this->jobsmodel->get_jobrole();

		$this->data["monsal_list"] 	= $this->jobsmodel->getsalary_list();

		$this->data["minexp_list"] 	= $this->jobsmodel->get_minexp();

		$this->data["maxexp_list"] 	= $this->jobsmodel->get_maxexp();

		$this->data["skill_list"]	= json_decode($this->jobsmodel->get_skill());



		$this->data['mid'] 		= 3;

		$this->data['sid'] 		= 302;

		$this->data['title'] 	= 'Cherry Hire App - Search Job';

		$this->data['pagehead'] = 'Search Jobs';

		$this->load->view('common/header_inner',$this->data);

		$this->load->view('common/leftmenu',$this->data);

		$this->load->view('common/topmenu',$this->data);

		$this->data['footer_nav']=$this->load->view('common/footerbar',$this->data,true);

		$this->load->view('jobs/search',$this->data);

		$this->load->view('common/footer_inner',$this->data);

	}

	

	public function searchjob_result()

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$this->data['message'] = '';

		$this->form_validation->set_rules('jtitle', 'Job Title', 'trim|callback_name_check');

		$this->form_validation->set_rules('farea', 'Functional Area', 'trim');

		$this->form_validation->set_rules('jrole', 'Job Role', 'trim');

		$this->form_validation->set_rules('skillval', 'Skills', 'trim');			

		$this->form_validation->set_rules('edu', 'Educational Qualification', 'trim');

		

		if ($this->form_validation->run() == TRUE) {

			if($this->input->post('jtitle') == '' && $this->input->post('minexp') == '' && $this->input->post('maxexp') == '' && count($this->input->post('location')) == '' && $this->input->post('monsal') == '' && $this->input->post('industry') == '' && $this->input->post('farea') == '' && $this->input->post('jrole') == '' && $this->input->post('skillval') == '' && $this->input->post('edu')) {

				$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

	             <button data-dismiss="alert" class="close" type="button">x</button> Unable to process your request! <br> Fill any of the criteria.</div>';

				$this->session->set_flashdata('errMessage', $this->data['message']);

				redirect($this->config->base_url().'Jobs/AdvanceSearch/?process=search&status=failed');

			}

			$total_row = $this->jobsmodel->adv_record_count($this->input->post('jtitle'), $this->input->post('minexp'), $this->input->post('maxexp'), $this->input->post('location'),$this->input->post('monsal'), $this->input->post('industry'), $this->input->post('farea'), $this->input->post('jrole'), $this->input->post('skillval'), $this->input->post('edu'));

			$this->data["records"] = $this->jobsmodel->get_adv_record($this->input->post('jtitle'), $this->input->post('minexp'), $this->input->post('maxexp'), $this->input->post('location'),$this->input->post('monsal'), $this->input->post('industry'), $this->input->post('farea'), $this->input->post('jrole'), $this->input->post('skillval'), $this->input->post('edu'));

		} else {

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

	             <button data-dismiss="alert" class="close" type="button">x</button> Unable to process your request! '.validation_errors().'</div>';

			$this->session->set_flashdata('errMessage', $this->data['message']);

			redirect($this->config->base_url().'Jobs/AdvanceSearch/?process=search&status=failed');

		}	



		$this->data['mid'] 		= 3;

		$this->data['sid'] 		= 0;

		$this->data['title'] 	= 'Cherry Hire App - Job Search';

		$this->data['pagehead'] = 'Search Result';

		$this->load->view('common/header_inner',$this->data);

		$this->load->view('common/leftmenu',$this->data);

		$this->load->view('common/topmenu',$this->data);

		$this->data['footer_nav']=$this->load->view('common/footerbar',$this->data,true);

		$this->load->view('jobs/list',$this->data);

		$this->load->view('common/footer_inner',$this->data);

	}

	

	public function viewjob_details($jid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect('LoginProcess'.$jid); } // Handling Session

		$this->data['message'] = '';

		if($this->input->get('upd')==1 || $this->input->get('upd')==2 || $this->input->get('p') == 1 || $this->input->get('p') == 2 || $this->input->get('e') == 1 || $this->input->get('e') == 2) { 

			 if($this->input->get('upd') == 1) {

			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

	             <button data-dismiss="alert" class="close" type="button">x</button> Details updated </div>';

			 }

			 if($this->input->get('upd') == 2) {

			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

	             <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! '.validation_errors().' </div>';

			 }

		}



		$this->data['jdata'] = $this->jobsmodel->get_single_record($jid);

		if(empty($this->data['jdata'])) { redirect($this->config->base_url().'MyJobs/?Process=Update&upd=2&Stat=Failed'); }

		
		$this->data['applposible'] = $this->jobsmodel->subscriptionPosible($this->session->userdata('cand_chid'));
		$this->data['formdata'] = array(

			'jobid'=>$this->data['jdata']['job_id'],

			'jobcode'=>$this->jobsmodel->formatedjobid($this->data['jdata']['job_id']),

			'jtitle'=>$this->data['jdata']['job_title'],

			'location'=>$this->data['jdata']['job_location'],

			'hcompany'=>$this->data['jdata']['job_company'],

			'minexp'=>$this->data['jdata']['minexp'],

			'maxexp'=>$this->data['jdata']['maxexp'],

			'minsal'=>$this->data['jdata']['job_min_sal'],

			'maxsal'=>$this->data['jdata']['job_max_sal'],

			'industry'=>$this->data['jdata']['job_industry'],

			'farea'=>$this->data['jdata']['fun_name'],

			'jrole'=>$this->data['jdata']['job_role'],

			'edu'=>$this->data['jdata']['edu_name'],

			'skill'=>$this->data['jdata']['job_skills'],

			'jobtype'=>$this->data['jdata']['job_type'],

			'jobdesc'=>$this->data['jdata']['job_desc'],

			'notifyemail'=>$this->data['jdata']['job_notifyemail'],

			'jobsite'=>$this->data['jdata']['job_site'],

			'jobnotes'=>$this->data['jdata']['job_notes'],

			'noprofiles'=>$this->data['jdata']['job_noprofiles'],

			'createddt'=>$this->data['jdata']['job_created_dt'],

			'updateddt'=>$this->data['jdata']['job_updated_dt'],

			'createdby'=>$this->data['jdata']['emp_fname'],

			'portalurl'=>$this->data['jdata']['emp_jobportal'],

			'job_url_id'=>$this->data['jdata']['job_url_id'],

			'job_status'=>$this->data['jdata']['job_status'],

			'job_applycount'=>$this->data['jdata']['job_applycount']

		);
		$this->data['savedjobs'] =$this->jobsmodel->saved($this->data['jdata']['job_id']); 
		

		$this->data['joburl'] = "http://www.cherryhire.com/JobDetails/".$this->data['formdata']['job_url_id'].'/?js=6&source=Email';

		

		$this->data['mailmsg'] = "Hello, \n\n".$this->data['formdata']['hcompany']." is looking to fill ".$this->data['formdata']['jtitle']." position, and we would like your help. \nIf you know anyone who would be a great fit for this position, please pass along this job link. \n\n".$this->data['joburl']." \n\nThanks in advance for your referrals! \n- ".$this->data['formdata']['createdby'];



		$this->data['mid'] = 3;

		$this->data['sid'] = 0;

		$this->data['title'] = 'Cherry Hire - Job - View Details';

		$this->data['pagehead'] = 'View Details';
		
		$this->load->view('new/jobdetail',$this->data);
	}

	

	public function apply_job($jid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$applposible = $this->jobsmodel->subscriptionPosible($this->session->userdata('cand_chid'));
		
		if($applposible->csub_nojobs <= 0) { redirect($this->config->base_url().'Subscriptions'); }
		
		if($jid)

		{

			$JobResult = $this->jobsmodel->get_single_record($jid);
			
			
			if(empty($JobResult)) { redirect($this->config->base_url().'MyJobs/?Process=Apply&app=2&Stat=Failed101'); }

			$this->session->set_flashdata('jobtitle', $JobResult['job_title']);

			$result = $this->jobsmodel->applyjob($JobResult['job_id']);
			$this->jobsmodel->dcrjobs_count($this->session->userdata('cand_chid'));
			
			if($result == '0') { redirect($this->config->base_url().'MyJobs/?Process=Apply&app=2&Stat=Failed102'); }

			$notify_result = $this->apply_notify($jid, $result);	

			$this->applymail($this->session->userdata('cand_chid'), $jid, $JobResult['job_title']);
exit;
			redirect($this->config->base_url().'applied-jobs/?Process=Apply&app=1&Stat=Success');

		}

		else

		{

			redirect($this->config->base_url().'applied-jobs/?Process=Apply&app=2&Stat=Failed103');

		}

	}

	

	public function email_job($jid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		if($jid) {

			$this->form_validation->set_rules('emailids', 'Email Ids', 'trim|required|callback_name_check');

			$this->form_validation->set_rules('subject', 'Subject', 'trim|required|callback_name_check');

			$this->form_validation->set_rules('message', 'Mail Content', 'trim|required|callback_name_check');

			

			if ($this->form_validation->run() == TRUE) {

				$em_array = array();

				if($this->input->post('emailids')) {

					$em_array = explode(',',$this->input->post('emailids'));

				}

				$message = str_replace("\n", "<br >",$this->input->post('message'));

				foreach($em_array as $emailid) {

					$mailsent = $this->mailjob($emailid, $this->input->post('subject'), $message);

				}

				redirect($this->config->base_url().'Jobs/Viewdetails/'.$jid.'/?Process=Email&e=1&Stat=Success');

			} else {

				redirect($this->config->base_url().'Jobs/Viewdetails/'.$jid.'/?Process=Email&e=2&Stat=Failed');

			}

		} else {

			redirect($this->config->base_url().'Jobs/Viewdetails/'.$jid.'/?Process=Email&e=2&Stat=Failed');

		}

	}



	function apply_notify($jid=null,$jaid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$JobResult = $this->jobsmodel->get_single_record($jid);

		if(empty($JobResult)) { redirect($this->config->base_url().'MyJobs/?Process=Apply&app=2&Stat=Failed'); }

		$CanResult = $this->jobsmodel->get_cand_record($this->session->userdata('cand_chid'));

		$EmpName = $JobResult['emp_fname'];

		$EmpEmail = $JobResult['emp_email'];

		$JobNotifyemail = $JobResult['job_notifyemail'];

		$JobId = $JobResult['job_id'];

		$JobEnId = $JobResult['job_url_id'];

		$JobTitle = $JobResult['job_title'];



		$CName = $CanResult['can_fname'].' '.$CanResult['can_lname'];

		$canEmail = $CanResult['can_email'];

		$ContactNo = '+'.$CanResult['can_ccode'].'-'.$CanResult['can_phone'];

		$canSkills = $CanResult['can_skills'];



		$Resumewebpath = $this->config->item('web_url').'hire/Apply/ViewProfile/'.$CanResult['can_encrypt_id'].'/'.$JobEnId;



		$subject = 'Application for the post of -'.$JobTitle.'(#'.$JobId.')';



		$mailcontent = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

					<html>

					<head>

					  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

					  <title>Cherryhire: New Job Application</title>

					</head>

					<body>

					<div style="width: 650px; font-family: Arial, Helvetica, sans-serif; font-size: 13px; border:1px solid #000; margin:0px auto; padding:10px;">

					  

					  <p><strong>CherryHire : Application received for the post of -'.$JobTitle.'(#'.$JobId.')</strong></p>

					  <hr>

					  <div align="left" style="padding:20px;">

					  <p>'.$CName.' has applied to the '.$JobTitle.'(#'.$JobId.') job your company posted through Cherryhire.</p>

					  <table width="100%" border="0" style="border:1px solid #CCC; background:#CCC; line-height:45px;">

						  <tr>

							<td colspan="3" style="padding:8px;">

                            <strong>Name :</strong> '.$CName.'<br /><strong>Email :</strong> '.$canEmail.'<br /><strong>Phone :</strong>'.$ContactNo.'<br /><strong>Skills :</strong>'.$canSkills.'</td>

							<td width="26%"><a href="'.$Resumewebpath.'" title="Download CV"><img src="'.$this->config->item('web_url').'images/download_cv.png" alt="View Profile"></a></td>

						  </tr>

						</table>

						

						</div>

					  

					  <p><strong>To view the profile or download cv, login to your employer account!</strong></p>

					  <p>-- </p>

					  <p>Regards, <br> Webmaster - Cherry Hire</p>

					</div>

					</body>

					</html>';

		$mailsent = $this->mailjob($JobNotifyemail, $subject, $mailcontent);

	}



	function applymail($cid=null, $jid=null, $jobtitle=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		//$result = $this->jobportalmodel->get_candidate_record($cid);

		$result = $this->jobsmodel->get_cand_record($this->session->userdata('cand_chid'));

		

		$CName 		= $result['can_fname'].' '.$result['can_lname'];

		$ContactNo 	= $result['can_ccode'].'-'.$result['can_phone'];

		$canEmail 	= $result['can_email'];

		$ctc 		= $result['can_curr_sal'];

		$skill 		= $result['can_skills'];

		$farea 		= $result['fun_name'];

		$company 	= $result['can_curr_company'];

		$jobURL 	= $this->config->item('web_url').'JobDetails/'.$jid.'/?js=6&source=Email';

		$to 		= $canEmail;

		$from = 'do-not-reply@cherryhire.com';

		$subject 	= 'Your CV has been successfully delivered to the employer';

		

		$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

					<html>

					<head>

					  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">

					  <title>Apply job - CherryHire</title>

					</head>

					<body>

					<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 13px; background:#CCC; border:1px solid #CCC; margin:0px auto; padding:30px;">

						<p><img src="http://www.cherryhire.com/candidate/images/adminlogo.png" alt="Cherry Hire"></p>

						<br />

						<div style="background:#fff; border:1px solid #999; margin:0px auto; padding:10px;">

							<p>Hi '.$CName.',<p>

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
         $this->load->library('email'); 
         $this->email->initialize($config);
         $this->email->set_newline('\r\n'); 

		




		$this->email->from($from, 'CherryHire');

		$this->email->to($to);

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

	

	function mailjob($list=null,$subject=null, $mailcontent=null)

	{

		$from = 'do-not-reply@cherryhire.com';

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

		$this->email->to($list);

		$this->email->subject($subject);

		$this->email->message($mailcontent);

		if ($this->email->send()) {

			return 1;

		} else {

			return 0;

		}

	}

	function getDomainName($url)

	{

		if(filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED) === FALSE) {

			return false;

		}

		

		$urlChenks = parse_url($url);

		return $urlChenks['scheme'].'://'.$urlChenks['host'];

	}



	public function name_check($str)

	{

		if ($str == 'test' || $str == 'Test') {

			$this->form_validation->set_message('name_check', 'The %s field can not be the word "test"');

			return FALSE;

		} else {

			return TRUE;

		}

	}

	

	public function anyone_chk($strval)

	{

		if($strval=="" || count($strval)<=0 ){

			$this->form_validation->set_message('anyone_chk', 'Skill or Job role, any one of the field is mandatory');

			return false;

		} else {

			// User picked something.

			return true;

		}

	}

	

	public function select_validate($strarray)

	{

		if($strarray=="" || count($strarray)<=0 ){

			$this->form_validation->set_message('select_validate', 'The %s field can not be blank');

			return false;

		} else{

			// User picked something.

			return true;

		}

	}

	

	function clear_cache()

    {

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");

        $this->output->set_header("Pragma: no-cache");

    }

}