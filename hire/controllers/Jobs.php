<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Job controller for this App.
 *
 * @package    CI
 * @subpackage Controller
 * @author     Sreejith Gopinath <sreejith@aatoon.com>
 */ 

class Jobs extends CI_Controller {

	/*
	* Init function
	* @return void
	*/
	public function __construct()
	{
		parent::__construct();
		$this->clear_cache();
		$this->load->model('jobsmodel');
		$this->load->library('email');
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		$this->data["subdetails"] = $this->jobsmodel->get_subscribe();
		if($this->data["subdetails"]['sub_expire_dt']==0 || $this->data["subdetails"]['sub_nojobs']==0 || $this->data["subdetails"]['sub_expire_dt']<date('Y-m-d H:i:s')) {
			$this->data["postdisable"] = 'disabled="disabled"';
		} else {
			$this->data["postdisable"] = '';
		}
	}
	
	/*
	* Get active job list function
	* @return void
	*/
	public function viewlist()
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		$total_row = $this->jobsmodel->record_count();
		$this->data["records"] = $this->jobsmodel->get_record();
		$this->data['message'] = '';
		if ($this->input->get('ins') == 1 || $this->input->get('del') == 1 || $this->input->get('upd') == 1 || $this->input->get('inval') == 1  || $this->input->get('cpy') == 1  || $this->input->get('clo') == 1  || $this->input->get('rp') == 1 || $this->input->get('ins') == 2 || $this->input->get('del') == 2 || $this->input->get('upd') == 2  || $this->input->get('cpy') == 2  || $this->input->get('clo') == 2  || $this->input->get('rp') == 2 || $this->input->get('vw') == 2) { 
			 if ($this->input->get('ins') == 1) {
				 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
	             <button data-dismiss="alert" class="close" type="button">x</button> New Job Added </div>';
			 }
			 if ($this->input->get('del') == 1) { 
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Record Deleted </div>';
			 }
			 if ($this->input->get('cpy') == 1) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job has been Duplicated. New Job Added. </div>';
			 }
			 if ($this->input->get('upd') == 1) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Details Updated </div>';
			 }
			 if ($this->input->get('clo') == 1) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Vacancy Closed </div>';
			 }
			 if ($this->input->get('rp') == 1) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Vacancy Reopened </div>';
			 }
			 if ($this->input->get('upd') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button>  Job Updation Failed! '.validation_errors().' </div>';
			 }
			 if ($this->input->get('ins') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Creation Failed! '.validation_errors().'</div>';
			 }
			 if ($this->input->get('del') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Deletion Failed! '.validation_errors().'</div>';
			 }
			 if ($this->input->get('cpy') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Duplicated Failed! '.validation_errors().'</div>';
			 }
			 if ($this->input->get('vw') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button> Failed to load profiles! </div>';
			 }
			 if ($this->input->get('clo') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Vacancy Close Failed! '.validation_errors().'</div>';
			 }
			 if ($this->input->get('rp') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Vacancy Reopen Failed! '.validation_errors().'</div>';
			 }
		}

		$this->data['mid'] 		= 3;
		$this->data['sid'] 		= 301;
		$this->data['title'] 	= 'Cherry Hire App - Manage Jobs';
		$this->data['pagehead'] = 'Manage Jobs';
		// $this->load->view('common/header_inner',$this->data);
		// $this->load->view('common/leftmenu',$this->data);
		// $this->load->view('common/topmenu',$this->data);
		// $this->data['footer_nav']=$this->load->view('common/footerbar',$this->data,true);
		// $this->load->view('jobs/list',$this->data);
		// $this->load->view('common/footer_inner',$this->data);
		
		$this->load->view('new/myjobs',$this->data);
	}
	
	/*
	* Get expired job list function
	* @return void
	*/
	public function viewexplist()
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		$total_row = $this->jobsmodel->record_exp_count();
		$this->data["records"] = $this->jobsmodel->get_exp_record();
		$this->data['message'] = '';
		if ($this->input->get('ins') == 1 || $this->input->get('del') == 1 || $this->input->get('upd') == 1 || $this->input->get('inval') == 1  || $this->input->get('cpy') == 1  || $this->input->get('clo') == 1  || $this->input->get('rp') == 1 || $this->input->get('ins') == 2 || $this->input->get('del') == 2 || $this->input->get('upd') == 2  || $this->input->get('cpy') == 2  || $this->input->get('clo') == 2  || $this->input->get('rp') == 2 || $this->input->get('vw') == 2) { 
			 if ($this->input->get('ins') == 1) {
				 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
	             <button data-dismiss="alert" class="close" type="button">x</button> New Job Added </div>';
			 }
			 if ($this->input->get('del') == 1) { 
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Record Deleted </div>';
			 }
			 if ($this->input->get('cpy') == 1) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job has been Duplicated. New Job Added. </div>';
			 }
			 if ($this->input->get('upd') == 1) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Details Updated </div>';
			 }
			 if ($this->input->get('clo') == 1) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Vacancy Closed </div>';
			 }
			 if ($this->input->get('rp') == 1) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Vacancy Reopened </div>';
			 }
			 if ($this->input->get('upd') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button>  Job Updation Failed! '.validation_errors().' </div>';
			 }
			 if ($this->input->get('ins') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Creation Failed! '.validation_errors().'</div>';
			 }
			 if ($this->input->get('del') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Deletion Failed! '.validation_errors().'</div>';
			 }
			 if ($this->input->get('cpy') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Duplicated Failed! '.validation_errors().'</div>';
			 }
			 if ($this->input->get('vw') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button> Failed to load profiles! </div>';
			 }
			 if ($this->input->get('clo') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Vacancy Close Failed! '.validation_errors().'</div>';
			 }
			 if ($this->input->get('rp') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job Vacancy Reopen Failed! '.validation_errors().'</div>';
			 }
		}

		$this->data['mid'] 		= 3;
		$this->data['sid'] 		= 302;
		$this->data['title'] 	= 'CherryHire - Expired Jobs';
		$this->data['pagehead'] = 'Expired Jobs';
		$this->load->view('new/closjobs',$this->data);
	}
	
	/*
	* Candidate list function
	* @return void
	*/
	public function cand_list($jid=null)
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		$this->data["cand_record"] = $this->jobsmodel->get_cand_record($jid);
		$this->load->view('jobs/candlist',$this->data);
	}
	
	/*
	* Skills list function
	* @return json_array
	*/
	public function skilllist()
	{
		$term = $this->input->post('term');
		$skill_list = $this->jobsmodel->get_skill_list();
		echo $skill_list;
	}

	/*
	* Jobrole list function
	* @return json_array
	*/
	public function jrolelist()
	{
		$term = $this->input->post('term');
		$jrole_list = $this->jobsmodel->get_jobrole_list();
		echo $jrole_list;
	}

	/*
	* Industry list function
	* @return json_array
	*/
	public function industrylist()
	{
		$term = $this->input->post('term');
		$ind_list = $this->jobsmodel->get_ind_list();
		echo $ind_list;
	}
	
	/*
	* Create Job function
	* @return void
	*/
	public function addnew()
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
			
		if($this->jobsmodel->checkpackage($this->session->userdata('hireid')) == false)
		{	
			$this->session->set_flashdata('message', '<div style="margin:0;" class="alert alert-error">
				             	<button data-dismiss="alert" class="close" type="button">x</button> 
				             	<div class="alert-div"><i class="fas fa-exclamation-triangle"></i></div>
				             	<p>Your subscription package has been expired! <br> Please upgrade new package. </p>
				       	</div>');
			redirect('Subscriptions');
		}

		if($this->jobsmodel->checkJobsremaining($this->session->userdata('hireid')) == false)
		{	
			$this->session->set_flashdata('message', '<div style="margin:0;" class="alert alert-error">
				             	<button data-dismiss="alert" class="close" type="button">x</button> 
				             	<div class="alert-div"><i class="fas fa-exclamation-triangle"></i></div>
				             	<p>You reached the Premium Job posting limits! <br> Please upgrade new package. </p>
				       	</div>');
			redirect('Subscriptions');
		}

		$this->data['message'] 	= '';
		$this->data['formdata'] = array(
			'jtitle'=>'',
			'location'=>'',
			'hcompany'=>'',
			'minexp'=>'',
			'maxexp'=>'',
			'monsal'=>'',
			'industry'=>'',
			'farea'=>'',
			'jrole'=>'',
			'edu'=>'',
			'skillval'=>'',
			'jobtype'=>'',
			'jobdesc'=>'',
			'notifyemail'=>$this->session->userdata('hireemail'),
			'jobsite'=>'',
			'jobnotes'=>'',
			'nation' => ''
		);
		//Form Validation
		$this->form_validation->set_rules('jtitle', 'Job Title', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('location', 'Location', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('minexp', 'Min Experience', 'trim|required');
		$this->form_validation->set_rules('maxexp', 'Max Experience', 'trim|required');
		$this->form_validation->set_rules('monsal', 'Monthly Salary', 'trim|required');
		//$this->form_validation->set_rules('industry', 'Industry', 'callback_select_validate');
		$this->form_validation->set_rules('farea', 'Functional Area', 'trim|required');
		if ($this->input->post('jrole'))	{
			$this->form_validation->set_rules('jrole', 'Job Role', 'trim|callback_anyone_chk');
		}
		if ($this->input->post('nation'))	{
			$this->form_validation->set_rules('jrole', 'Job Role', 'trim|required');
		}
		else {
			$this->form_validation->set_rules('skillval', 'Skills', 'trim|callback_anyone_chk');			
		}
		$this->form_validation->set_rules('edu', 'Educational Qualification', 'trim|required');
		//$this->form_validation->set_rules('jobdesc', 'Job Description', 'trim|required|callback_name_check');
		
		if ($this->input->post('notifyemail')) {
			$this->form_validation->set_rules('notifyemail', 'Notification Email ID', 'trim|required|valid_email');
		}
		if ($this->input->post('jobnotes')) {
			$this->form_validation->set_rules('jobnotes', 'Job Note', 'trim|callback_name_check');
		}

		if ($this->form_validation->run() == TRUE) {
			$cvcount = $this->jobsmodel->checkpacake();
			$jid = $this->jobsmodel->insert_record($cvcount);
			redirect($this->config->base_url().'MyJobs/?Process=Insert&ins=1&Stat=Success');
		} else {
			if ($this->input->post('jtitle') || $this->input->post('jrole') || $this->input->post('skillval')) {
				$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
					<button data-dismiss="alert" class="close" type="button">x</button> <strong>Insertion Failed!</strong> '.validation_errors().'</div>';
				$this->data['formdata'] = array(
					'jtitle'=>$this->input->post('jtitle'),
					'location'=>$this->input->post('location'),
					'hcompany'=>$this->input->post('hcompany'),
					'minexp'=>$this->input->post('minexp'),
					'maxexp'=>$this->input->post('maxexp'),
					'monsal'=>$this->input->post('monsal'),
					'industry'=>$this->input->post('industry'),
					'farea'=>$this->input->post('farea'),
					'jrole'=>$this->input->post('jrole'),
					'edu'=>$this->input->post('edu'),
					'skillval'=>$this->input->post('skillval'),
					'jobtype'=>$this->input->post('jobtype'),
					'jobdesc'=>$this->input->post('jobdesc'),
					'notifyemail'=>$this->input->post('notifyemail'),
					'jobsite'=>$this->input->post('jobsite'),
					'jobnotes'=>$this->input->post('jobnotes'),
					'nation' => $this->input->post('nation')
				);
			}
		}

		$this->data['mid'] 			= 3;
		$this->data['sid'] 			= 303;
		$this->data['title'] 		= 'Cherry Hire App - Add New Job';
		$this->data['pagehead'] 	= 'Create a New Job';
		$this->data["country_list"] = $this->jobsmodel->get_country();
		$this->data["nation"] 		= $this->data["country_list"];
		array_shift($this->data["nation"]);
		$this->data["nation"]['Any Country'] = 'Any Country';
		$this->data["edu_list"] 	= $this->jobsmodel->get_edu();
		$this->data["funarea_list"] = $this->jobsmodel->get_farea();
		$this->data["ind_list"] 	= $this->jobsmodel->get_industry();
		$this->data["jrole_list"] 	= $this->jobsmodel->get_jobrole();
		$this->data["monsal_list"] 	= $this->jobsmodel->getsalary_list();
		$this->data["skill_list"] 	= json_decode($this->jobsmodel->get_skill());
		$experience 				= $this->jobsmodel->get_post_maxexp();
		$this->data["maxexp_list"] 	= $this->maxexp($experience);
		$this->data["minexp_list"] 	= $this->minexp($experience);
		$this->load->view('new/job-post',$this->data);

	}

	/**
	 * max experenace list generates
	*/
	function maxexp($experience)
	{
		
		if (count($experience) >=17) {
			$count = 17;
		}else{
			$count =count($experience);
		}
		for ($i=0; $i < $count; $i++) { 
			if ($i == 0) {
				$ex = 'Fresher';
			}
			if ($i == 1) {
				$ex = '1 year';
			}
			elseif ($i > 1) {
				$ex = $i.' years';
			}
			if ($i == 16) {
				$ex = $i.' +years';
			}
			$data[]= $ex;
		}
		return $data;
	}



	/**
	 * min experenace list generates
	*/
	function minexp($experience)
	{
		for ($i=0; $i < count($experience)-1; $i++) { 
			if ($i == 0) {
				$ex = 'Fresher';
			}
			if ($i == 1) {
				$ex = '1 year';
			}
			elseif ($i > 1) {
				$ex = $i.' years';
			}
			$data[]= $ex;
		}
		return $data;
	}



	/*
	* Edit Job function
	* @param String $jid
	* @return void
	*/
	public function edit_job($jid=null)
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		$this->data['message'] = '';
		if ($this->input->get('upd')==1 || $this->input->get('upd')==2) { 
			 if ($this->input->get('upd') == 1) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
	             <button data-dismiss="alert" class="close" type="button">x</button> Details updated </div>';
			 }
			 if ($this->input->get('upd') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! '.validation_errors().' </div>';
			 }
		}
		
		if (!isset($jid)) { redirect($this->config->base_url().'MyJobs/?Process=Update&upd=2&Stat=Success'); }
		$this->data['jdata'] = $this->jobsmodel->get_single_record($jid);
		if (empty($this->data['jdata'])) { redirect($this->config->base_url().'MyJobs/?Process=Update&upd=2&Stat=Success'); }
		$this->data['formdata'] = array(
			'jobid'=>$this->data['jdata']['job_id'],
			'jtitle'=>$this->data['jdata']['job_title'],
			'location'=>$this->data['jdata']['job_location'],
			'hcompany'=>$this->data['jdata']['job_company'],
			'minexp'=>$this->data['jdata']['job_min_exp'],
			'maxexp'=>$this->data['jdata']['job_max_exp'],
			'monsal'=>$this->data['jdata']['job_min_sal'].'~'.$this->data['jdata']['job_max_sal'],
			'industry'=>$this->data['jdata']['job_industry'], 
			'farea'=>$this->data['jdata']['job_farea'],
			'jrole'=>$this->data['jdata']['job_role'], 
			'edu'=>$this->data['jdata']['job_edu'],
			'skillval'=>$this->data['jdata']['job_skills'],
			'jobtype'=>$this->data['jdata']['job_type'],
			'jobdesc'=>$this->data['jdata']['job_desc'],
			'notifyemail'=>$this->data['jdata']['job_notifyemail'],
			'jobsite'=>$this->data['jdata']['job_site'],
			'jobnotes'=>$this->data['jdata']['job_notes'],
			'noprofiles'=>$this->data['jdata']['job_noprofiles'],
			'job_url_id'=>$this->data['jdata']['job_url_id']
		);

		$this->data['mid'] 			= 3;
		$this->data['sid'] 			= 1;
		$this->data['title'] 		= 'Cherry Hire - Job - Edit Details';
		$this->data['pagehead'] 	= 'Edit Job Details';
		$this->data["country_list"] = $this->jobsmodel->get_country();
		$this->data["edu_list"] 	= $this->jobsmodel->get_edu();
		$this->data["funarea_list"] = $this->jobsmodel->get_farea();
		$this->data["ind_list"] 	= $this->jobsmodel->get_industry();
		$this->data["jrole_list"] 	= $this->jobsmodel->get_jobrole();
		$this->data["monsal_list"] 	= $this->jobsmodel->getsalary_list();
		$this->data["minexp_list"] 	= $this->jobsmodel->get_minexp();
		$this->data["maxexp_list"] 	= $this->jobsmodel->get_maxexp();
		$this->data["skill_list"] 	= json_decode($this->jobsmodel->get_skill());
		
		// $this->load->view('common/header_inner',$this->data);
		// $this->load->view('common/leftmenu',$this->data);
		// $this->load->view('common/topmenu',$this->data);
		// $this->data['footer_nav'] = $this->load->view('common/footerbar',$this->data,true);
		// $this->load->view('jobs/editview',$this->data);
		// $this->load->view('common/footer_inner',$this->data);
		$this->load->view('new/edit-job',$this->data);
	}

	/*
	* Update Job function
	* @param String $jid
	* @return void
	*/
	public function update_job($jid=null)
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
        //Form Validation
		$this->form_validation->set_rules('jtitle', 'Job Title', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('location', 'Location', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('minexp', 'Min Experience', 'trim|required');
		$this->form_validation->set_rules('maxexp', 'Max Experience', 'trim|required');
		$this->form_validation->set_rules('monsal', 'Monthly Salary', 'trim|required');
		$this->form_validation->set_rules('farea', 'Functional Area', 'trim|required');
		if ($this->input->post('jrole')) {
			$this->form_validation->set_rules('jrole', 'Job Role', 'trim|callback_anyone_chk');
		}
		else {
			$this->form_validation->set_rules('skillval', 'Skills', 'trim|callback_anyone_chk');
		}
		$this->form_validation->set_rules('edu', 'Educational Qualification', 'trim|required');
		if ($this->input->post('notifyemail')) {
			$this->form_validation->set_rules('notifyemail', 'Notification Email ID', 'trim|required|valid_email');
		}
		if ($this->input->post('jobnotes')) {
			$this->form_validation->set_rules('jobnotes', 'Job Note', 'trim|callback_name_check');
		}

		if ($this->form_validation->run() == TRUE && $this->input->post('jobid')!='') {
			$this->jobsmodel->update_record();
			redirect($this->config->base_url().'Jobs/Viewdetails/'.$jid.'?Process=Update&upd=1&Stat=Success');
		} else {
			if ($this->input->post('jobid')=='') { redirect($this->config->base_url().'MyJobs/?Process=Update&upd=2&Stat=Failed'); }
			$this->data['jdata'] = $this->jobsmodel->get_single_record($this->input->post('jobid'));
			if (empty($this->data['jdata'])) { redirect($this->config->base_url().'MyJobs/?Process=Update&upd=2&Stat=Failed'); }
			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
			 <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! '.validation_errors().' </div>';
			 
			$this->data['formdata'] = array(
				'jobid'=>$this->data['jdata']['job_id'],
				'jtitle'=>$this->data['jdata']['job_title'],
				'location'=>$this->data['jdata']['job_location'],
				'hcompany'=>$this->data['jdata']['job_company'],
				'minexp'=>$this->data['jdata']['job_min_exp'],
				'maxexp'=>$this->data['jdata']['job_max_exp'],
				'monsal'=>$this->data['jdata']['job_min_sal'].'~'.$this->data['jdata']['job_max_sal'],
				'industry'=>$this->data['jdata']['job_industry'],
				'farea'=>$this->data['jdata']['job_farea'],
				'jrole'=>$this->data['jdata']['job_role'],
				'edu'=>$this->data['jdata']['job_edu'],
				'skillval'=>$this->data['jdata']['job_skills'],
				'jobtype'=>$this->data['jdata']['job_type'],
				'jobdesc'=>$this->data['jdata']['job_desc'],
				'notifyemail'=>$this->data['jdata']['job_notifyemail'],
				'jobsite'=>$this->data['jdata']['job_site'],
				'jobnotes'=>$this->data['jdata']['job_notes'],
				'noprofiles'=>$this->data['jdata']['job_noprofiles'],
				'job_url_id'=>$this->data['jdata']['job_url_id']
			);

			$this->data['mid'] 			= 3;
			$this->data['sid'] 			= 1;
			$this->data['title'] 		= 'Cherry Hire - Job - Edit Details';
			$this->data['pagehead'] 	= 'Edit Job Details';
			$this->data["country_list"] = $this->jobsmodel->get_country();
			$this->data["edu_list"] 	= $this->jobsmodel->get_edu();
			$this->data["funarea_list"] = $this->jobsmodel->get_farea();
			$this->data["ind_list"] 	= $this->jobsmodel->get_industry();
			$this->data["jrole_list"] 	= $this->jobsmodel->get_jobrole();
			$this->data["monsal_list"] 	= $this->jobsmodel->getsalary_list();
			$this->data["minexp_list"] 	= $this->jobsmodel->get_minexp();
			$this->data["maxexp_list"] 	= $this->jobsmodel->get_maxexp();
			$this->data["skill_list"] 	= json_decode($this->jobsmodel->get_skill());
			
			$this->load->view('common/header_inner',$this->data);
			$this->load->view('common/leftmenu',$this->data);
			$this->load->view('common/topmenu',$this->data);
			$this->data['footer_nav'] = $this->load->view('common/footerbar',$this->data,true);
			$this->load->view('jobs/editview',$this->data);
			$this->load->view('common/footer_inner',$this->data);
		}
	}

	/*
	* Duplicate Job function
	* @param String $jid
	* @return void
	*/
	public function copy_job($jid=null)
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		$this->data['message'] = '';
		if ($this->input->get('cpy')==1 || $this->input->get('cpy')==2) { 
			 if ($this->input->get('cpy') == 1) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
	             <button data-dismiss="alert" class="close" type="button">x</button> Details updated </div>';
			 }
			 if ($this->input->get('cpy') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! '.validation_errors().' </div>';
			 }
		}
		
		if (!isset($jid)) { redirect($this->config->base_url().'MyJobs/?Process=Update&cpy=2&Stat=Failed'); }
		$this->data['jdata'] = $this->jobsmodel->get_single_record($jid);
		if (empty($this->data['jdata'])) { redirect($this->config->base_url().'MyJobs/?Process=Update&cpy=2&Stat=Failed'); }
		
		$this->data['formdata'] = array(
			'jobid'=>$this->data['jdata']['job_id'],
			'jtitle'=>$this->data['jdata']['job_title'],
			'location'=>$this->data['jdata']['job_location'],
			'hcompany'=>$this->data['jdata']['job_company'],
			'minexp'=>$this->data['jdata']['job_min_exp'],
			'maxexp'=>$this->data['jdata']['job_max_exp'],
			'monsal'=>$this->data['jdata']['job_min_sal'].'~'.$this->data['jdata']['job_max_sal'],
			'industry'=>$this->data['jdata']['job_industry'],
			'farea'=>$this->data['jdata']['job_farea'],
			'jrole'=>$this->data['jdata']['job_role'],
			'edu'=>$this->data['jdata']['job_edu'],
			'skillval'=>$this->data['jdata']['job_skills'],
			'jobtype'=>$this->data['jdata']['job_type'],
			'jobdesc'=>$this->data['jdata']['job_desc'],
			'notifyemail'=>$this->data['jdata']['job_notifyemail'],
			'jobsite'=>$this->data['jdata']['job_site'],
			'jobnotes'=>$this->data['jdata']['job_notes'],
			'noprofiles'=>$this->data['jdata']['job_noprofiles'],
			'job_url_id'=>$this->data['jdata']['job_url_id']
		);

		$this->data['mid'] 			= 3;
		$this->data['sid'] 			= 1;
		$this->data['title'] 		= 'Cherry Hire - Duplicate Job';
		$this->data['pagehead'] 	= 'Duplicate Job';
		$this->data["country_list"] = $this->jobsmodel->get_country();
		$this->data["edu_list"] 	= $this->jobsmodel->get_edu();
		$this->data["funarea_list"] = $this->jobsmodel->get_farea();
		$this->data["ind_list"] 	= $this->jobsmodel->get_industry();
		$this->data["jrole_list"] 	= $this->jobsmodel->get_jobrole();
		$this->data["monsal_list"] 	= $this->jobsmodel->getsalary_list();
		$this->data["minexp_list"] 	= $this->jobsmodel->get_minexp();
		$this->data["maxexp_list"] 	= $this->jobsmodel->get_maxexp();
		
		$this->load->view('common/header_inner',$this->data);
		$this->load->view('common/leftmenu',$this->data);
		$this->load->view('common/topmenu',$this->data);
		$this->data['footer_nav']=$this->load->view('common/footerbar',$this->data,true);
		$this->load->view('jobs/addnew',$this->data);
		$this->load->view('common/footer_inner',$this->data);
	}
	
	/*
	* View Job details function
	* @param String $jid
	* @return void
	*/
	public function viewjob_details($jid=null)
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		$this->data['message'] = '';
		if ($this->input->get('upd')==1 || $this->input->get('upd')==2 || $this->input->get('p') == 1 || $this->input->get('p') == 2 || $this->input->get('e') == 1 || $this->input->get('e') == 2) { 
			 if ($this->input->get('upd') == 1) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
	             <button data-dismiss="alert" class="close" type="button">x</button> Details updated </div>';
			 }
			 if($this->input->get('upd') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! '.validation_errors().' </div>';
			 }
			 if ($this->input->get('e') == 1) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job has been successfully send via email </div>';
			 }
			 if ($this->input->get('e') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button>  Job Sending Failed! '.validation_errors().' </div>';
			 }
			 if ($this->input->get('p') == 1) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
	             <button data-dismiss="alert" class="close" type="button">x</button> Job has been successfully Published </div>';
			 }
			 if ($this->input->get('p') == 2) {
			 	 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
	             <button data-dismiss="alert" class="close" type="button">x</button>  Job Failed to Publish! '.validation_errors().' </div>';
			 }
		}

		$this->data['jdata'] = $this->jobsmodel->get_single_record($jid);
		if (empty($this->data['jdata'])) { redirect($this->config->base_url().'MyJobs/?Process=Update&upd=2&Stat=Failed'); }
		
		$this->data['formdata'] = array(
			'jobid'=>$this->data['jdata']['job_id'],
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
			'job_status'=>$this->data['jdata']['job_status']
		);
		
		$this->data['publish_count'] 		= $this->jobsmodel->publish_count($this->data['jdata']['job_id']);
		$this->data['source_count'] 		= $this->jobsmodel->apply_count($this->data['jdata']['job_id']);
		$this->data['source_count_list'] 	= $this->jobsmodel->apply_count_list($this->data['jdata']['job_id']);
		$this->data['can_count'] 			= $this->jobsmodel->apply_count($this->data['jdata']['job_id']);
		$this->data['can_count_list'] 		= $this->jobsmodel->apply_count_list($this->data['jdata']['job_id']);
		$this->data['cvs'] 					= $this->jobsmodel->verified_cvs($jid);
		$this->data['application'] 			= $this->jobsmodel->applications($jid);
		
		$total_can_row 				= $this->jobsmodel->record_can_count($this->data['jdata']['job_id']);
		$this->data["can_records"] 	= $this->jobsmodel->get_cand_record($this->data['jdata']['job_id']);
		$this->data['joburl'] 		= "http://www.cherryhire.com/JobDetails/".$this->data['formdata']['job_url_id'].'/?js=6&source=Email';
		$this->data['mailmsg'] 		= "Hello, \n\n".$this->data['formdata']['hcompany']." is looking to fill ".$this->data['formdata']['jtitle']." position, and we would like your help. \nIf you know anyone who would be a great fit for this position, please pass along this job link. \n\n".$this->data['joburl']." \n\nThanks in advance for your referrals! \n- ".$this->data['formdata']['createdby'];

		$this->data['mid'] 		= 3;
		$this->data['sid'] 		= 1;
		$this->data['title'] 	= 'Cherry Hire - Job - View Details';
		$this->data['pagehead'] = 'View Details';

		$this->load->view('new/view-job',$this->data);
	}
	
	/*
	* Delete Job function
	* @param String $jid
	* @return void
	*/
	public function delete_job($jid=null)
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		if($jid) {
			$result = $this->jobsmodel->delete_record($jid); //For delete the job record
			if ($result == 1) {
				redirect($this->config->base_url().'MyJobs/?Process=Delete&del=1&Stat=Success');
			} else {
				redirect($this->config->base_url().'MyJobs/?Process=Delete&del=2&Stat=Failed');
			}
		} else {
			redirect($this->config->base_url().'MyJobs/?Process=Delete&del=2&Stat=Failed');
		}
	}
	
	/*
	* Close or deactive Job function
	* @param String $jid
	* @return void
	*/
	public function close_job($jid=null)
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		if ($jid) {
			$result = $this->jobsmodel->close_job($jid); //Changing the status only
			if ($result == 1) {
				redirect($this->config->base_url().'MyJobs/?Process=Close&clo=1&Stat=Success');
			} else {
				redirect($this->config->base_url().'MyJobs/?Process=Close&clo=2&Stat=Failed');
			}
		} else {
			redirect($this->config->base_url().'MyJobs/?Process=Close&clo=2&Stat=Failed');
		}
	}
	
	/*
	* Reopen or activate Job function
	* @param String $jid
	* @return void
	*/
	public function reopen_job($jid=null)
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		if ($jid) {
			$result = $this->jobsmodel->reopen_job($jid); //For delete the job record
			if ($result == 1) {
				redirect($this->config->base_url().'MyJobs/?Process=Reopen&rp=1&Stat=Success');
			} else {
				redirect($this->config->base_url().'MyJobs/?Process=Reopen&rp=2&Stat=Failed');
			}
		} else {
			redirect($this->config->base_url().'MyJobs/?Process=Reopen&rp=2&Stat=Failed');
		}
	}

	/*
	* Integrate Job to Hirewand function
	* @param String $jid
	* @return void
	*/
	public function create_hire_job($jobid=null)
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		if ($jobid) {
			$result = $this->jobsmodel->create_hire_job($jobid);
			if (empty($result) || $result == 0) {
				redirect($this->config->base_url().'MyJobs/?Process=Fetch&vw=2&Stat=Failed');
			}
			redirect($this->config->base_url().'Profile/List/'.$jobid);
		} else {
			redirect($this->config->base_url().'MyJobs/?Process=Create&ins=2&Stat=Failed');
		}
	}
	
	/* Publish Job function
	 * @param $jid - Job id
	 * return void
	 */
	public function submit_job($jid=null)
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		if ($jid) {
			$JobResult 		= $this->jobsmodel->get_single_record($jid);
			$Bal_sub_nojobs = $this->data["subdetails"]['sub_nojobs'] - 1;
			$result 		= $this->jobsmodel->postjob($JobResult['job_id']);
			if ($result == 0) { redirect($this->config->base_url().'Jobs/Viewdetails/'.$jid.'/?Process=Post&p=2&Stat=Failed'); }
			$dedsubscribe 	= $this->jobsmodel->ded_subscribe($Bal_sub_nojobs);
			$mailsent 		= $this->pubsendmail($jid);
			
			/*For Candidate Jobalert*/
			$candidate_records = $this->jobsmodel->get_can_match($JobResult['job_title'], $JobResult['job_min_exp'], $JobResult['job_max_exp'], $JobResult['job_industry'], $JobResult['job_farea'], $JobResult['job_role'], $JobResult['job_skills'], $JobResult['job_edu']);
			if (!empty($candidate_records)){
				$mailstatus = $this->jobalert_mail($candidate_records,$JobResult); //Sent mail to candidate	
			}
			$resultx = $this->jobsmodel->simplyjobxml(); // For Simplyhired
			$resultjoo = $this->jobsmodel->jooblejobxml(); //For Jooble
			redirect($this->config->base_url().'Jobs/Viewdetails/'.$jid.'/?Process=Post&p=1&Stat=Success');
		} else {
			redirect($this->config->base_url().'Jobs/Viewdetails/'.$jid.'/?Process=Post&p=2&Stat=Failed');
		}
	}
	
	/*
	* Email Job function
	* @param String $jid
	* @return void
	*/
	public function email_job($jid=null)
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		if ($jid) {
			//Form Validation
			$this->form_validation->set_rules('emailids', 'Email Ids', 'trim|required|callback_name_check');
			$this->form_validation->set_rules('subject', 'Subject', 'trim|required|callback_name_check');
			$this->form_validation->set_rules('message', 'Mail Content', 'trim|required|callback_name_check');
			
			if ($this->form_validation->run() == TRUE) {
				$em_array = array();
				if ($this->input->post('emailids')) {
					$em_array = explode(',',$this->input->post('emailids'));
				}
				$message = str_replace("\n", "<br >",$this->input->post('message'));
				foreach ($em_array as $emailid) {
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
	
	/*
	* Job mail function
	* @param Array $list
	* @param String $subject
	* @param String $mailcontent
	* @return int
	*/
	function mailjob($list=null,$subject=null, $mailcontent=null)
	{
		$from = 'do-not-reply@cherryhire.com';
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
         $this->email->set_newline('\r\n');
		
		$this->email->from($from, 'CherryHire');
		$this->email->to($list);
		$this->email->subject($subject);
		$this->email->message($mailcontent);
		if ($this->email->send()) {
			return 1;
			
		} else {
			return 0;
			 // echo $this->email->print_debugger();exit;
		}
	}
	
	/*
	* Publish notification mail function
	* @param String $jid
	* @return int
	*/
	function pubsendmail($jid=null)
	{
		$job_res 	= $this->jobsmodel->get_single_record($jid);
		$portal_res = $this->jobsmodel->get_publish_record($job_res['job_id']);
		$to 		= 'support@cherryhire.com';
		$from 		= 'do-not-reply@cherryhire.com';
		$website_url= $this->getDomainName(base_url());
		$joblink 	= $website_url."/JobDetails/".$jid.'/?js=6&source=Email';
		$subject 	= 'Job published for Paid promotions -'.$job_res['job_title'];
		$pdata 		= '';
		if (!empty($portal_res)) {
			$x=0;
			foreach ($portal_res as $result) {
				$x++;
				if($result->jp_type==1){ $ptype = "Free"; } else { $ptype =  "Paid"; }
				$pdata = $pdata.'<tr>
							<td style="border:1px solid #000;"> '.$x.'</td>
							<td style="border:1px solid #000; background:#CCC;"><strong> '.$result->jp_name.'</strong></td>
							<td style="border:1px solid #000;"> '.$ptype.'</td>
						  </tr>';
			}
		}

		$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
					<html>
					<head>
					  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
					  <title>Cherry Hire</title>
					</head>
					<body>
					<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
					  <p>Dear Team, </p>
					  <p><strong> '.$job_res['emp_comp_name'].' has published paid promotions in Cherry Hire</strong></p>
					  <div align="left">
					  <table width="80%" border="0" style="border:1px solid #000; line-height:35px; background:#CCC;">
						  <tr>
							<td width="5%"  style="border:1px solid #000; background:#CCC;"><strong>Slno</strong></td>
							<td width="24%" style="border:1px solid #000;"><strong>Portal Name</strong></td>
							<td width="24%" style="border:1px solid #000;">$ptype</td>
						  </tr>
						  '.$pdata.'
						  <tr>
							<td colspan="3" style="border:1px solid #000;">Job Link :- <a href="'.$joblink.'" title="View Job">'.$joblink.'</a></td>
						  </tr>
						</table>
						</div>
					  <p>-- </p>
					  <p>Regards, <br> Webmaster - Cherry Hire</p>
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
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
			return 1;
		} else {
			return 0;
		}
	}
	
	/*
	* Domain Name function
	* @param String $url
	* @return String
	*/
	function getDomainName($url)
	{
		if(filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED) === FALSE) {
			return false;
		}
		$urlChenks = parse_url($url);
		return $urlChenks['scheme'].'://'.$urlChenks['host'];
	}

	/*
	* String validation function
	* @param String $str
	* @return boolean
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
	
	/*
	* Multiple validation function
	* @param String $strval
	* @return boolean
	*/
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
	
	/*
	* Dropdown validation function
	* @param array $strarray
	* @return boolean
	*/
	public function select_validate($strarray)
	{
		if($strarray=="" || count($strarray)<=0 ){
			$this->form_validation->set_message('select_validate', 'The %s field can not be blank');
			return false;
		} else {
			// User picked something.
			return true;
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




    	public function getbydate()
	{
		$this->load->helper('html');
		$out = '';
		$count = 0;
		$datarry   =  explode('-',$this->input->get('date'));
		$startDate =  date('Y-m-d h:i:s', strtotime($datarry[0]));
		$endDate   =  date('Y-m-d h:i:s', strtotime($datarry[1]));
		$data = $this->jobsmodel->get_record_bydate($startDate,$endDate);

		if (!empty($data)) {
			
		foreach ($data as $result) {
			$publishcount = $this->jobsmodel->publish_count($result->job_id);
			$count = $count + 1;
			if ($publishcount > 0) 
				{  $link = $this->config->base_url().'Profile/List/'.$result->job_url_id; }
			else{  $link = $this->config->base_url().'Jobs/Viewdetails/'.$result->job_url_id; }
			$del = $this->config->base_url().'Jobs/CloseJob/'. $result->job_url_id;

			if($publishcount > 0){ 
				$status = '<i class="material-icons brand-text">fiber_manual_record</i> live';
			 }else{ 
				$status = '<i class="material-icons red-text accent-4">fiber_manual_record</i> Not Published';
			 } 

			 $out  .= ' <tr>
			 					<td> <a href="'.$link.'">'. $count.'
								<td> <a href="'.$link.'"> '.$result->job_title.'
								

								<td>
									<a href="'.$link.'">'.$result->jfun_display.'

								
								<td>
									
									<a href="'.$link.'">'.$result->job_location.'

								<td>
									<a href="'.$link.'">'.date('d M Y', strtotime($result->job_created_dt)).'

								<td>
									
									<a href="'.$link.'">'.$status.'

								<td>
									<a onclick = "if (! confirm(\'Do you really want to close this vacancy?\')) { return false; }" href="'.$del.'" class="del-jobs">
										<i class="material-icons">delete
												
								</tr>
										
							';
		}

		}
		else{
			$out .='<tr></td colspan="7" class="center"> No Results found';
		}
		echo json_encode($out) ;

	
		
	}

	public function getbydateclose()
	{
		$this->load->helper('html');
		$out = '';
		$count = 0;
		$datarry   =  explode('-',$this->input->get('date'));
		$startDate =  date('Y-m-d h:i:s', strtotime($datarry[0]));
		$endDate   =  date('Y-m-d h:i:s', strtotime($datarry[1]));
		$data = $this->jobsmodel->getclose_record_bydate($startDate,$endDate);

		if (!empty($data)) {
			
		foreach ($data as $result) {
			$publishcount = $this->jobsmodel->publish_count($result->job_id);
			$count = $count + 1;
			if ($publishcount > 0) 
				{  $link = $this->config->base_url().'Profile/List/'.$result->job_url_id; }
			else{  $link = $this->config->base_url().'Jobs/Viewdetails/'.$result->job_url_id; }
			$del = $this->config->base_url().'Jobs/Delete/'. $result->job_url_id;
			
			$link1 = $this->config->base_url().'Jobs/Reopen/'.$result->job_url_id;
			$status = '<i class="material-icons brand-text ">file_upload</i> Re Open';
			 

			 $out  .= ' <tr>
			 					<td> <a href="'.$link.'">'. $count.'
								<td> <a href="'.$link.'"> '.$result->job_title.'
								

								<td>
									<a href="'.$link.'">'.$result->jfun_display.'

								
								<td>
									
									<a href="'.$link.'">'.$result->job_location.'

								<td>
									<a href="'.$link.'">'.date('d M Y', strtotime($result->job_created_dt)).'

								<td>
									
									<a href="'.$link1.'">'.$status.'

								<td>
									<a onclick = "if (! confirm(\'Do you really want to delete this vacancy?\')) { return false; }" href="'.$del.'" class="del-jobs">
										<i class="material-icons">delete
												
								</tr>
										
							';
		}

		}
		else{
			$out .='<tr></td colspan="7" class="center"> No Results found';
		}
		echo json_encode($out) ;
	}





	
	/* Jobalert mail Function
	 * @param array $cid
	 * @param array $jid
	 * return int
	 */
	function jobalert_mail($crecord=null, $jrecord=null)
	{	
		$subject 	= 'New matching job for you on Cherry Hire';
		$from 		= 'do-not-reply@cherryhire.com';
		foreach($crecord as $result) 
		{
			$FName 		= $result->can_fname;
			$LName 		= $result->can_lname;
			$RegEmail 	= $result->can_email;
			$jtitle 	= $jrecord['job_title'];
			$location 	= $jrecord['job_location'];
			$farea 		= $jrecord['fun_name'];
			$industry 	= $jrecord['job_industry'];
			if(($jrecord['maxexp']-1) == 0) { $exp = 'Fresher'; } else { $exp = ($jrecord['minexp']-1).' ~ '.($jrecord['maxexp']-1).' Yrs'; }
			if($jrecord['job_min_sal'] == 0 && $jrecord['job_max_sal'] == 0) { $salary = 'Unspecified'; } else { $salary = '$'.$jrecord['job_min_sal'].' ~ $'.$jrecord['job_max_sal']; }
			$edu 		= $jrecord['edu_name'];
			$skills 	= $jrecord['job_skills'];
			$joburl		= $jrecord['job_url_id'];
			$to 		= $RegEmail;	
			//Mail body
			$jobmessage = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
	<html><head><title>Candidate_Register</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
									<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
									<table id="Table_01" width="642" height="933" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#FFF; font-size:14px; font-family:Arial, Helvetica, sans-serif;">
										<tr>
											<td colspan="9" style="width:642px; height:30px;">
											</td>
										</tr>
										<tr>
											<td rowspan="12" style="width:28px; height:903px; border-top:1px solid #CCC; border-left:1px solid #CCC; border-bottom:1px solid #CCC;">
											</td>
											<td colspan="7" style="width:585px; height:103px; border-top:1px solid #CCC;">
												<a href="http://www.cherryhire.com" target="_blank"><img src="http://www.cherryhire.com/emailtemplate/logohome.png" alt=""></a>
											</td>
											<td rowspan="12" style="width:29px; height:903px; border-top:1px solid #CCC; border-right:1px solid #CCC; border-bottom:1px solid #CCC;">
											</td>
										</tr>
										<tr>
											<td colspan="7" style="background:#AD1E24; width:585px; height:111px; vertical-align:middle; color:#FFF; padding:10px 0px 0px 30px; font-size:28px; font-weight:bold;">
												Job Alert
											</td>
										</tr>
										<tr>
											<td style="width:10px; height:10px; line-height:0px;" valign="top">
												<img src="http://www.cherryhire.com/emailtemplate/Candidate_Register_06.png" alt="">
											</td>
											<td colspan="5" style="background:#F0EFEC; width:564px; height:10px; line-height:0px;">
											</td>
											<td style="width:11px; height:10px; line-height:0px;" valign="top">
												<img src="http://www.cherryhire.com/emailtemplate/Candidate_Register_08.png" alt="">
											</td>
										</tr>
										<tr>
											<td rowspan="8" style="background:#FFF; width:10px; height:643px;">
											</td>
											<td style="background:#F0EFEC; width:36px; height:122px;">
											</td>
											<td colspan="3" style="background:#F0EFEC; width:488px; height:122px; line-height:30px;">
												<p>Dear '.$FName.'</p>
												<p>We are pleased to inform you that your profile has matched the folowing job on our platform.</p>
											</td>
											<td style="background:#F0EFEC; width:40px; height:122px;">
											</td>
											<td rowspan="8" style="background:#FFF; width:11px; height:643px;">
											</td>
										</tr>
										<tr>
											<td rowspan="3" style="background:#F0EFEC; width:36px; height:128px;">
											</td>
											<td colspan="3" style="background:#FFF; width:488px; height:36px; padding:0px 0px 0px 16px; font-weight:bold; line-height:30px;">
												<div style="width:380;"><p><a href="http://www.cherryhire.com/JobDetails/'.$joburl.'/?js=5&source=cherryhire">'.$jtitle.'</a></p></div>
												<div style="width:80;"><a href="http://www.cherryhire.com/JobDetails/'.$joburl.'/?js=5&source=cherryhire"><img src="http://www.cherryhire.com/emailtemplate/apply-now.png" alt=""></a></div>
												
											</td>
											<td rowspan="3" style="background:#F0EFEC; width:36px; height:128px;">
											</td>
										</tr>
										<tr>
											<td colspan="3" style="background:#FFF; width:488px; height:36px; padding:0px 0px 0px 16px; line-height:30px;">
												<table width="100%">
													<tr>
														<td><strong>Location :</strong> '.$location.'</td>
														<td><strong>Functional area :</strong> '.$farea.'</td>
													</tr>
													<tr>
														<td><strong>Experience :</strong> '.$exp.'</td>
														<td><strong>Monthly Salary :</strong> '.$salary.'</td>
													</tr>
													<tr>
														<td><strong>Education :</strong> '.$edu.'</td>
														<td><strong>Industry :</strong> '.$industry.'</td>
													</tr>
													<tr>
														<td colspan="2"><strong>Skills required :</strong> '.$skills.'</td>
													</tr>
												</table>
											</td>
										</tr>
										<tr>
											<td style="background:#FFF; width:488px; height:10px;"></td>
										</tr>
										<tr>
											<td style="background:#F0EFEC; width:36px; height:151px;">
											</td>
											<td colspan="3" style="background:#F0EFEC; width:488px; height:151px; padding:0px 0px 0px 10px; line-height:30px;">
												<p style="font-weight:bold;">To get more perfect updates about matching jobs:</p>
												<p>
													&bull; Update your cv/profile regularly <br >
													&bull; Search and Apply to Jobs <br >
													&bull; Set Profile Privacy Settings
												</p>
	
											</td>
											<td style="background:#F0EFEC; width:40px; height:151px;">
											</td>
										</tr>
										<tr>
											<td style="background:#F0EFEC; width:36px; height:82px;">
											</td>
											<td colspan="3" style="background:#F0EFEC; width:488px; height:82px; padding:0px 0px 0px 10px; line-height:30px;">
												For any queries send us an email at jobassist@cherryhire.com <br >
												Good Luck in your journey to find a great job!
											</td>
											<td style="background:#F0EFEC; width:40px; height:82px;">
											</td>
										</tr>
										<tr>
											<td style="background:#F0EFEC; width:36px; height:104px;">
											</td>
											<td colspan="3" style="background:#F0EFEC; width:488px; height:104px; padding:0px 0px 0px 10px; line-height:21px; font-size:12px;">
												Regards, <br >
												Jacob Thomas <br >
												Co-Founder & CEO, Cherry Hire.com <br >
												www.cherryhire.com
											</td>
											<td style="background:#F0EFEC; width:40px; height:104px;">
											</td>
										</tr>
										<tr>
											<td style="background:#F0EFEC; width:36px; height:56px;">
											</td>
											<td colspan="3" style="background:#F0EFEC; width:488px; height:56px; padding:0px 180px 0px 180px;">
												<a href="https://www.facebook.com/cherryhire" target="_blank"><img src="http://www.cherryhire.com/emailtemplate/sicon1.png" alt=""></a>
												<a href="https://twitter.com/cherry_hire" target="_blank"><img src="http://www.cherryhire.com/emailtemplate/sicon2.png" alt=""></a>
												<a href="https://www.linkedin.com/company/cherry-hire" target="_blank"><img src="http://www.cherryhire.com/emailtemplate/sicon3.png" alt=""></a>
												<a href="https://www.instagram.com/cherryhire/" target="_blank"><img src="http://www.cherryhire.com/emailtemplate/sicon4.png" alt=""></a>
											</td>
											<td style="background:#F0EFEC; width:40px; height:56px;">
											</td>
										</tr>
										<tr>
											<td colspan="7"  style="width:585px; height:36px; border-bottom:1px solid #CCC;">
											</td>
										</tr>
	</table></body></html>';
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
			$this->email->from($from, 'Cherry Hire');
			$this->email->to($to);
			$this->email->subject($subject);
			$this->email->message($jobmessage);
			if ($this->email->send()) {
				return 1;
			} else {
				return 0;
			}
		}
	}

	/**
	 * Verified cvs
	 */
	public function verified_cv($id=null)
	{
		$this->data['vcv'] = $this->jobsmodel->verified_cv($id);
		$this->data['title'] 	= 'Cherry Hire - Job - Verified CVs';
		$this->data['pagehead'] = 'View Details';
		$this->data['message'] = '';
		$this->load->view('new/verifiedcv', $this->data, FALSE);
		
	}

	/**
	 * Download
	 */
	public function download()
	{
		$id =  $this->input->get('id');
		$data = $this->jobsmodel->getcvd($id);
		$this->load->helper('download');
		$name = $data['can_fname'].' '.$data['can_lname'];
		$file = $data['cv_path'];
		$newdata = file_get_contents($file);
		force_download($file, $newdata);
		redirect('verified-cv','refresh');
	}

	/**
	* title auto completion  
	*/
	public function title()
	{
		$title = $this->jobsmodel->gettitle();
		echo json_encode($title);
	}

	/**
	 * Job role auto complition 
	 */
	public function roles()
	{
		$title = $this->jobsmodel->getrole();
		echo json_encode($title);
	}

	/**
	 * industry
	 */
	public function industry()
	{
		$title = $this->jobsmodel->getindustry();
		echo json_encode($title);
	}


}