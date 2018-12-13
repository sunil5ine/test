<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Candidate controller for this App.
 *
 * @package    CI
 * @subpackage Controller
 * @author     Sreejith Gopinath <sreejith@aatoon.com>
 */
 
class Candidate extends CI_Controller {

	/** 
	* Init Function
	*
	* @return void
	*/
	public function __construct()
	{
		parent::__construct();
		$this->clear_cache();
		$this->load->model('candidatemodel');
		$this->load->library('email');
		if(!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); }
		$this->data["subdetails"] = $this->candidatemodel->get_subscribe();
		if($this->data["subdetails"]['sub_expire_dt']==0 || $this->data["subdetails"]['sub_nojobs']==0 || $this->data["subdetails"]['sub_expire_dt']<date('Y-m-d H:i:s')) {
			$this->data["postdisable"] = 'disabled="disabled"';
		} else {
			$this->data["postdisable"] = '';
		}
	}

	/** 
	* Applied profile details Function
	* @param Varchar $canid
	* @param Varchar $jobid
	* @return void
	*/
	public function apply_profile_details($canid=null, $jobid=null) {
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
		if (!isset($canid)) { redirect($this->config->base_url().'MyJobs/?Process=ProfileView&pview=2&Stat=fail'); }
		if (!isset($jobid)) { redirect($this->config->base_url().'MyJobs/?Process=ProfileView&pview=2&Stat=fail'); }
		$this->data['message'] = '';
		/**************************Retrive candidate details********************************/
		$this->data['cdata'] 		= $this->candidatemodel->get_single_record($canid);
		if (empty($this->data['cdata'])) { redirect($this->config->base_url().'MyJobs/?Process=ProfileView&pview=2&Stat=fail'); }
		$this->data['cwork'] 		= $this->candidatemodel->get_cand_work($this->data['cdata']['can_id']);
		$this->data['cedu_details'] = $this->candidatemodel->get_cand_eduq($this->data['cdata']['can_id']);

		$today = date('Y-m-d');
		
		
		$this->data['formdata'] = array(
			'cid'=>$this->data['cdata']['can_id'],
			'encrypt_id'=>$this->data['cdata']['can_encrypt_id'],
			'cfname'=>$this->data['cdata']['can_fname'],
			'clname'=>$this->data['cdata']['can_lname'],
			'cccode'=>$this->data['cdata']['can_ccode'],
			'cphone'=>$this->data['cdata']['can_phone'],
			'cmail'=>$this->data['cdata']['can_email'],
			'usrpwd'=>$this->data['cdata']['can_hash'],
			'repwd'=>$this->data['cdata']['can_hash'],
			'cdob'=>($this->data['cdata']['can_dob']==0)?'Not Set':date('d/m/Y', strtotime($this->data['cdata']['can_dob'])),
			'gender'=>$this->data['cdata']['can_gender'],
			'cedu'=>$this->data['cdata']['edu_name'],
			'ccon'=>$this->data['cdata']['co_name'],
			'nation'=>$this->data['cdata']['co_nationality'],
			'cexp'=>$this->data['cdata']['can_experience'],
			'ccomp'=>$this->data['cdata']['can_curr_company'],
			'ccurrloc'=>$this->data['cdata']['can_curr_loc'],
			'cfarea'=>$this->data['cdata']['jfun_display'],
			'cindustry'=>$this->data['cdata']['ind_display'],
			'cskills'=>$this->data['cdata']['can_skills'],
			'resumehead'=>$this->data['cdata']['cv_headline'],
			'linkurl'=>$this->data['cdata']['sm_linkdin'],
			'fburl'=>$this->data['cdata']['sm_fb'],
			'twurl'=>$this->data['cdata']['sm_tw'],
			'gurl'=>$this->data['cdata']['sm_gp'],
			'creloc'=>$this->data['cdata']['can_relocate'],
			'createddt'=>date('d F Y', strtotime($this->data['cdata']['can_reg_date'])),
			'updateddt'=>date('d F Y', strtotime($this->data['cdata']['can_upd_date'])),
			'cv_path'=>$this->data['cdata']['cv_path'],
			'csummary'=>$this->data['cdata']['csum_details'],
			'edu_id'=>$this->data['cdata']['edu_id'],
			'co_id'=>$this->data['cdata']['co_id'],
			'fun_id'=>$this->data['cdata']['fun_id'],
			'ind_id'=>$this->data['cdata']['ind_id'],
			'can_propic'=>$this->data['cdata']['can_propic'],
			'preloc'=>explode(',',$this->data['cdata']['can_pref_loc']),
			'cdesig'=>$this->data['cdata']['can_curr_desig'],
		);
		
		$ploc = explode(',',$this->data['cdata']['can_pref_loc']);
		$this->data["preffered"] = '';
		if(!empty($ploc)) { 
			$i = 0;			
			while($i < count($ploc)) {
				if($ploc[$i]!='') {
					$country = $this->candidatemodel->get_single_country($ploc[$i]);
					if($i == 0) {
						$this->data["preffered"] = $country['co_name'];
					} else {
						$this->data["preffered"] = $this->data["preffered"].', '.$country['co_name'];
					}
				}
				$i++;
			}
		}
		if($this->data["preffered"] == ''){ 
			$this->data["preffered"] =  'Not set'; 
		}

		$this->data['mid'] 		= 0;
		$this->data['sid'] 		= 0;
		$this->data['title'] 	= 'Cherry Hire - Candidate Details';
		$this->load->view('common/header_inner',$this->data);
		$this->load->view('common/leftmenu',$this->data);
		$this->load->view('common/topmenu',$this->data);
		$this->data['footer_nav']=$this->load->view('common/footerbar',$this->data,true);
		$this->load->view('candidate/viewcandidate',$this->data);
		$this->load->view('common/footer_inner',$this->data);

	}
	
	/** 
	* Get Domain name Function
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
	
	/**
	 * Fetch all  applocation
	 */
	public function all_application()
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); }
		$this->data['title'] 	= 'Cherry Hire - Application';
		$this->data['application'] = $this->candidatemodel->allpication();
		
		$this->load->view('new/applications', $this->data, FALSE);
		
		
	}
}