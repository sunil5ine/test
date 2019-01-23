<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Profile controller for this App.
 *
 * @package    CI
 * @subpackage Controller
 * @author     Sreejith Gopinath <sreejith@aatoon.com>
 */
 
class Profile extends CI_Controller {

	/*
	* Init function
	* @return void
	*/
	public function __construct()
	{
		parent::__construct();
		$this->clear_cache();
		$this->load->model('profilemodel');
		$this->load->library('email');
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); }
		$this->data["subdetails"] = $this->profilemodel->get_subscribe();
		if ($this->data["subdetails"]['sub_expire_dt']==0 || $this->data["subdetails"]['sub_nocv']==0 || $this->data["subdetails"]['sub_expire_dt']<date('Y-m-d H:i:s')) {
			$this->data["postdisable"] 	= 'disabled="disabled"';
			$this->data["balnocv"] 		= 0;
		} else {
			$this->data["postdisable"] 	= '';
			$this->data["balnocv"] 		= $this->data["subdetails"]['sub_nocv'];
		}
	}
	
	/*
	* Get profile list function
	* @param varchar $jobid - Job id
	* @return void
	*/
	public function viewlist($jobid=null)
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		if (!isset($jobid)) { redirect($this->config->base_url().'MyJobs'); } // Handling Needid
		
		/**************************Check Job id valid or Not***********************************/
		$Jobdata = $this->profilemodel->get_job_record($jobid);
		
		if (empty($Jobdata)) { redirect($this->config->base_url().'MyJobs'); } // Handling Needid
		
		$reqid 				= $Jobdata['hire_jobid']; // Get HW id or Reqid
		$profile_startlimit = 0;
		$profile_endlimit 	= $Jobdata['job_noprofiles'];
		
		//If HW req id=0 or fails to create before, do a try again
		if ($reqid == 0) {
			redirect($this->config->base_url().'jobs/create_hire_job/'.$jobid);
		}
		
		$profiledata 			= $this->profilemodel->fetch_profile($reqid, $profile_startlimit, $profile_endlimit, $Jobdata['job_id']);
		//print_r($profiledata);  exit;
		$total_row 				= count($profiledata);
		$this->data["records"] 	= $profiledata;

		$this->data['message'] 	= '';
		if($this->session->flashdata('message')) {
			$this->data['message'] = $this->session->flashdata('message');
		}
		$this->data['jobid']	= $jobid;

		$this->data['mid'] 		= 0;
		$this->data['sid'] 		= 0;
		$this->data['title'] 	= 'Cherry Hire App - View Matching Profiles';
		$this->data['pagehead'] = 'View Matching Profiles - '.$Jobdata['job_title'];
		$this->load->view('common/header_inner',$this->data);
		$this->load->view('common/leftmenu',$this->data);
		$this->load->view('common/topmenu',$this->data);
		$this->data['footer_nav'] = $this->load->view('common/footerbar',$this->data,true);
		$this->load->view('profile/list',$this->data);
		$this->load->view('common/footer_inner',$this->data);
	}
	
	/*
	* Shortlist info function
	* @param varchar $jobid - Job id
	* @return void
	*/
	public function addtoshortlist($jobid=null)
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		$jobid 	= $this->input->post('jobid');
		$personid 	= $this->input->post('personid');
		$comment 	= $this->input->post('commentbox');
		if (empty($jobid))  { 
			redirect($this->config->base_url().'MyJobs'); 
		} // Handling Needid
		if (empty($personid) || empty($comment)) { 
			$Errmessage = '<div class="alert alert-danger"> <button data-dismiss="alert" class="close" type="button">x</button>
                    	<strong>Failed!</strong> Unable to process your request</div>';
			$this->session->set_flashdata('message', $Errmessage);			
			redirect($this->config->base_url().'Profile/List/'.$jobid); 
		} 
		$Jobdata = $this->profilemodel->get_job_record($jobid);
		$reqid 	= $Jobdata['hire_jobid'];
		$job_id	= $Jobdata['job_id'];
		$this->profilemodel->insert_shortlisted($job_id);
		
		$Errmessage = '<div style="margin-top: 16px;" class="alert alert-success">
						<button data-dismiss="alert" class="close" type="button">x</button> Added to shortlisted bucket</div>';
		$this->session->set_flashdata('message', $Errmessage);
		redirect($this->config->base_url().'Profile/List/'.$jobid);

	}
	
	/*
	* Download cv function
	* @param varchar $cv - cv path
	* @return string
	*/
	public function downloadresume($cv=null)
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		$this->data['message'] = '';

		$personid 	= $this->input->post('personid');
		$profileid 	= $this->input->post('profileid');
		if (empty($profileid)) { redirect($this->config->base_url().'MyJobs'); } // Handling Needid
		if (empty($personid)) { redirect($this->config->base_url().'MyJobs'); } // Handling Needid
		$procv = $this->profilemodel->get_resume_record($personid);
		if ($profileid != '') {
			$ext	= end(explode('.', $profileid));
		} else {
			$ext	= 'docx';
		}

		$resumepath = $this->profilemodel->downloadprofile($personid, $ext);
		
		if (empty($procv)) {
			$this->profilemodel->update_resume_count($personid, $resumepath);
		}
		echo $this->config->base_url().$resumepath;
		exit;
	}
	
	/*
	* View profile deatils function
	* @param varchar $jobid - jobid
	* @param varchar $personid - profile id
	* @return void
	*/
	public function viewdetails($jobid=null,$personid=null)
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		$this->data['message'] = '';
		
		/**************************Check Job id valid or Not***********************************/
		if (isset($jobid)) {
			$Jobdata = $this->profilemodel->get_job_record($jobid);
			if (empty($Jobdata)) { redirect($this->config->base_url().'MyJobs'); } // Handling Needid
			$reqid = $Jobdata['hire_jobid']; // Get HW id or Reqid			
			if (!isset($personid)) { redirect($this->config->base_url().'Profile/List/'.$reqid); } // Handling Profile ID. Redirect to profile list
			$this->data['backlink'] = 'Profile/List/'.$jobid;
		} else {
			$reqid = '';
			if (!isset($personid)) { redirect($this->config->base_url().'Candidate/List/'); } // Handling Profile ID. Redirect to profile list
			$this->data['backlink'] = 'Candidate/List/';
		}
		
		$this->data['cdata'] = $this->profilemodel->get_single_profile($reqid,$personid);
		if ($reqid == '') {
			if (empty($this->data['cdata'])) { redirect($this->config->base_url().'Candidate/List/'); } // Redirect to profile list
		} else { 
			if (empty($this->data['cdata'])) { redirect($this->config->base_url().'Profile/List/'.$reqid); } // Redirect to profile list
		}
		
		$this->data['formdata'] = array(
			'personid'=>$this->data['cdata']['personid'],
			'cname'=>$this->data['cdata']['name'],
			'cphone'=>$this->data['cdata']['phone'],
			'cemail'=>$this->data['cdata']['email'],
			'cdob'=>'Not Set',
			'gender'=>$this->data['cdata']['gender'],
			'ceducation'=>$this->data['cdata']['education'],
			'ccountry'=>$this->data['cdata']['country'],
			'cexp'=>$this->data['cdata']['tot_exp'],
			'ccompany'=>$this->data['cdata']['curr_company'],
			'currlocation'=>$this->data['cdata']['location'],
			'cjfunction'=>$this->data['cdata']['job_function'],
			'cindustry'=>$this->data['cdata']['job_industry'],
			'cskills'=>$this->data['cdata']['skills'],
			'cworkexp'=>$this->data['cdata']['company'],
			'csummary'=>$this->data['cdata']['summary'],
			'resumehead'=>'',
			'linkurl'=>$this->data['cdata']['sociallink'],
			'fburl'=>'',
			'twurl'=>'',
			'gurl'=>'',
			'creloc'=>1,
			'createddt'=>$this->data['cdata']['date_of_creation'],
			'updateddt'=>$this->data['cdata']['last_updated'],
			'resumedt'=>$this->data['cdata']['resume_date'],
			'resumepath'=>$this->data['cdata']['resumepath'],
		);
		
		$this->data['mid'] = 0;
		$this->data['sid'] = 0;
		$this->data['title'] = 'CherryHire App - View Candidate Details';
		$this->data['pagehead'] = 'View Details';
		$this->load->view('common/header_inner',$this->data);
		$this->load->view('common/leftmenu',$this->data);
		$this->load->view('common/topmenu',$this->data);
		$this->data['footer_nav']=$this->load->view('common/footerbar',$this->data,true);
		$this->load->view('profile/viewcandidate',$this->data);
		$this->load->view('common/footer_inner',$this->data); 
	}
	
	/*
	* Text validation function
	* @param string $str
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
	* Get domain name function
	* @param string $url - url path
	* @return boolean
	*/
	function getDomainName($url)
	{
		if (filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED) === FALSE) {
			return false;
		}
		
		$urlChenks = parse_url($url);
		return $urlChenks['scheme'].'://'.$urlChenks['host'];
	}
	
	/*
	* Clear cache function
	* @return void
	*/
	function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
}