<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class detail extends CI_Controller {

    public function viewjob_details($jid=null)

	{
        $this->load->model('jobsmodel');
		// if(!$this->session->userdata('cand_chid')) { redirect('LoginProcess'.$jid); } // Handling Session

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

}

/* End of file Controllername.php */
