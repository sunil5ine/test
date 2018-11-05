<?php 
/**
 * Profile model for this APP
 * 
 * 
 * @package    CI
 * @subpackage Model
 * @author     Sreejith Gopinath <sreejith@aatoon.com>
 */

class Profilemodel extends CI_Model {

	var $table_candidate 	= '';
	var $table_emp 			= '';
	var $table_profile 		= '';
	var $table_job 			= '';
	var $table_subscribe 	= '';
	var $table_shortlist 	= '';
	
	/*
	* init function
	* @return void
	*/
    public function __construct()
    {	
		ini_set('memory_limit', '-1');
		$this->table_candidate 	= 'ch_candidate';
		$this->table_emp 		= 'ch_employer';
		$this->table_job 		= 'ch_jobs';
		$this->table_profile 	= 'ch_profileview';
		$this->table_subscribe 	= 'ch_emp_subscribe';
		$this->table_shortlist 	= 'ch_shortlist';
		$this->loginurl			= "https://www.hirewand.com/user/signin";
		$this->loginrequest 	= "email=anju@ipfhr.com&password=hire123&remember_me=true&GMTOffset=-330";
    }
	
	/*
	* Min profile show count function
	* @return integer
	*/
	public function record_count($nid=null) 
	{
		$profilecount = 50;
		return $profilecount;
    }
	
	/*
	* Get job details function
	* @param varchar $jid - Job id
	* @return array
	*/
	public function get_job_record($jid=null)
	{
		$query = $this->db->query("select j.job_id, j.hire_jobid, j.job_title, j.job_location, j.job_url_id, j.job_noprofiles  from ".$this->table_job." j where j.job_url_id='".$jid."' and j.job_created_by = ".$this->session->userdata('hireid'));
		return $query->row_array();
	}
	
	/*
	* Get shortlisted function
	* @param varchar $jid - Job id
	* @param varchar $personid - Profile id
	* @return array
	*/
	public function get_shortlist_record($jid=null, $personid=null)
	{
		$query = $this->db->query("select slist_id, slist_comment from ".$this->table_shortlist." where person_id = '".$personid."' and job_id=".$jid);
		return $query->row_array();
	}
	
	/*
	* Get subscription details function
	* @return array
	*/
	public function get_subscribe()
	{
		$query = $this->db->query("select sub_nojobs, sub_nocv, sub_expire_dt  from ".$this->table_subscribe." where emp_id=".$this->session->userdata('hireid'));
		return $query->row_array();
	}
	
	/*
	* Get profile download count function
	* @param varchar $personid - HW profile id
	* @return array
	*/
	public function get_resume_record($personid=null)
	{
		$query = $this->db->query("select pv_id, personid, pv_path, pv_status, pv_date from ".$this->table_profile." where personid='".$personid."' and emp_id=".$this->session->userdata('hireid'));
		return $query->row_array();	
	}
	
	/*
	* Update download profile details function
	* @param varchar $personid - HW profile id
	* @param varchar $path -Cv path
	* @return boolean
	*/
	public function update_resume_count($personid=null,$path=null)
	{
		$balcvcount  = 0;
		$profiledata = array(
			'personid'=>$personid,
			'emp_id'=>$this->session->userdata('hireid'),
			'pv_path'=>$path,
			'pv_status'=>1,
			'pv_date'=>date('Y-m-d H:i:s'),
		);
		
		$this->db->where('personid',$personid);
		$this->db->where('pv_status',1);
		$this->db->where('emp_id', $this->session->userdata('hireid'));
		$q = $this->db->get($this->table_profile);
		
		$this->db->where('emp_id', $this->session->userdata('hireid'));
		$query = $this->db->get($this->table_subscribe);

		foreach($query->result() as $subrow) {
			$balcvcount = $subrow->sub_nocv - 1;
		}

		if($balcvcount <= 0) {
			$balcvcount = 0;	
		}
		$subscribedata=array(
			'sub_nocv'=>$balcvcount,
		);
		if ( $q->num_rows() <= 0 )  {
			$this->db->insert($this->table_profile, $profiledata);
			$insert_pv = $this->db->insert_id();

			$this->db->where('emp_id', $this->session->userdata('hireid'));
			$this->db->update($this->table_subscribe,$subscribedata);
		}		
        return true;
	}
	
	/*
	* Shortlisted function
	* @param varchar $jobid - job id
	* @return boolean
	*/
	public function insert_shortlisted($jobid=null)
	{
		$jobid 		= $jobid;
		$personid 	= $this->input->post('personid');
		$comment 	= $this->input->post('commentbox');
		$sprofiledata=array(			
			'job_id'=>$jobid,
			'person_id'=>$personid,
			'slist_comment'=>$comment,
			'slist_date'=>date('Y-m-d H:i:s'),
		);
		
		$this->db->insert($this->table_shortlist, $sprofiledata);
		
		return true;	
	}

	/*
	* Download CV from HW function
	* @param varchar $personid - profile id
	* @param varchar $ext - CV extension type
	* @return string
	*/
	public function downloadprofile($personid=null,$ext='docx')
	{
		//Hirewand direct link to download cv
		//hirewand.com/hire/download?owner_accid=42&this_needid=421300&personid=56e8fadbe4b0cef64a9a618d 
		//$fileUrl = 'https://www.hirewand.com/hireapi/download?'."personid=".$personid;
		
		$profileurl = "https://www.hirewand.com/hireapi/download";
		$profilerequest = "personid=".$personid; 		
		
		$dir = realpath(APPPATH . '../ctemp');
		$path = $dir;
		
		$cookie_file_path = $path."/cookie.txt";

		//The path & filename to save to.
		$saveTo = 'hwresume/'.$personid.'.'.$ext;
		 
		//Open file handler.
		$fp = fopen($saveTo, 'w+');
		 
		//If $fp is FALSE, something went wrong.
		if($fp === false){
		    throw new Exception('Could not open: ' . $saveTo);
		}
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_NOBODY, false);
		curl_setopt($ch, CURLOPT_URL, $this->loginurl);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
		//set the cookie the site has for certain features, this is optional
		curl_setopt($ch, CURLOPT_COOKIE, "cookiename=0");
		//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
		
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->loginrequest);
		curl_exec($ch);
		
		//page with the content I want to grab
		curl_setopt($ch, CURLOPT_URL, $profileurl);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $profilerequest);
		//Pass our file handle to cURL.
		curl_setopt($ch, CURLOPT_FILE, $fp);
		//Timeout if the file doesn't download after 20 seconds.
		curl_setopt($ch, CURLOPT_TIMEOUT, 20);
		//do stuff with the info with DomDocument() etc
		curl_exec($ch);

		//If there was an error, throw an Exception
		if(curl_errno($ch)){
		    throw new Exception(curl_error($ch));
		}
		 
		//Get the HTTP status code.
		$statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
		curl_close($ch);	
				 
		if($statusCode == 200){
		    return $saveTo;
		} else{
		    $saveTo = '';
		    return $saveTo;
		}		
	}
	
	/*
	* Get domain name function
	* @param varchar $url - url path
	* @return boolean
	*/
	function getDomainName($url)
	{
		if(filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED) === FALSE)
		{
			return false;
		}
		
		$urlChenks = parse_url($url);
		return $urlChenks['scheme'].'://'.$urlChenks['host'];
	}
	
	/*
	* Fetch Individual profile details based on Profileid - Req id optional
	* @param int $nid -Requirement ID optional
	* @param varchar $personid -Profile ID
	* @return array
	*/
	public function get_single_profile($nid=null, $personid=null)
	{
		$getprofileurl 		= "https://www.hirewand.com/hireapi/getprofile";
		$getprofilerequest 	= "personid=".$personid; 
		
		$dir 				= realpath(APPPATH . '../ctemp');
		$path 				= $dir;		
		$cookie_file_path 	= $path."/cookie.txt";
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_NOBODY, false);
		curl_setopt($ch, CURLOPT_URL, $this->loginurl);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
		//set the cookie the site has for certain features, this is optional
		curl_setopt($ch, CURLOPT_COOKIE, "cookiename=0");
		//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
		
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->loginrequest);
		curl_exec($ch);
		
		//page with the content I want to grab
		curl_setopt($ch, CURLOPT_URL, $getprofileurl);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $getprofilerequest);
		//do stuff with the info with DomDocument() etc
		$proresult = curl_exec($ch);
		//echo $proresult; exit;
		curl_close($ch);	
		$proresult = json_decode($proresult);
		//print_r( $proresult); exit;

		$single_profiledata	= array();
		$name 			= '';
		$hirejobid 		= $nid;
		$phone 			= '';
		$email 			= '';
		$gender 		= '';
		$location 		= '';
		$job_function 	= '';
		$skills 		= '';
		$match_skills 	= '';
		$job_industry 	= '';
		$education 		= '';
		$curr_company 	= '';
		$tot_exp 		= '';
		$rating 		= '';
		$personid 		= '';
		$resumepath		= '';
		$sociallink		= '';
		$resume_date 	= '';
		$company		= array();
		$experience		= array();
		$summary		= array();

		if (isset($proresult->profile)) {
			$result 		= $proresult->profile;
			$name 			= '';
			$hirejobid 		= $nid;
			$phone 			= '';
			$email 			= '';
			$gender 		= '';
			$location 		= '';
			$job_function 	= '';
			$skills 		= '';
			$match_skills 	= '';
			$job_industry 	= '';
			$education 		= '';
			$curr_company 	= '';
			$tot_exp 		= '';
			$rating 		= '';
			$personid 		= '';
			$resumepath		= '';
			$sociallink		= '';
			$resume_date 	= '';
			$company		= array();
			$experience		= array();
			$summary		= array();

		   if (isset($result->name)) {
			   foreach ($result->name as $namex => $nameresult) {
				   if (isset($nameresult->v)) {
			   			$name = $nameresult->v;
			   		}
			   }
			   if ($name == null) {
			   		$name = 'No Name';  
			   }
		   } else {
				$name = 'No Name';   
		   }

		   if (isset($result->phone)) {
			   foreach ($result->phone as $px => $phresult) {
				   $phone = $phresult->v;
			   }
			   if ($phone == null) {
			   		$phone = 'Not Set';  
			   }
		   } else {
				$phone = 'Not Set';   
		   }

		   if (isset($result->emails)) {
			   foreach ($result->emails as $emailx => $emailresult) {
			   		if (isset($emailresult->v)) {
			   			$email = $emailresult->v;
			   		}				   
			   }
			   if ($email == null) {
			   		$email = 'Not Set';  
			   }
		   } else {
				$email = 'Not Set';   
		   }
		   
		   if (isset($result->gender)) {
			   $gender = $result->gender->display;
			   if($gender == null) {
			   		$gender = 'Not Set';  
			   }
		   } else {
				$gender = 'Not Set';   
		   }
		   
		   if (isset($result->wwwlinks)) {
			   foreach ($result->wwwlinks as $wwwlinksx => $wwwlinksresult) {	
				   if (isset($wwwlinksresult->site)) {
						if($wwwlinksresult->site=='linkedin') {
							$sociallink = $wwwlinksresult->v;
						}
					}
			   }				
			   if (empty($sociallink)) {
					$sociallink = 'Not Set';  
			   }
		   } else {
				$sociallink = 'Not Set';  
		   }
		   
		   if (isset($result->m_country)) {
			   foreach ($result->m_country as $cntx => $cntresult) {
				   if (isset($cntresult->display)) {
			   			$country = $cntresult->display;
			   		}
			   }
			   if ($country == null) {
			   		$country = 'Not Set';  
			   }
		   } else {
				$country = 'Not Set';   
		   }		   
		   
		   if (isset($result->m_location)) {
			   foreach ($result->m_location as $locx => $locresult) {
			   		if (isset($locresult->display)) {
			   			$location = $locresult->display;
			   		}				   
			   }
			   if ($location == null) {
			   		$location = 'Not Set';  
			   }
		   } else {
				$location = 'Not Set';   
		   }		   
		   
		   if (isset($result->jobFunctions)) {
			   $function = '';
			   foreach ($result->jobFunctions as $funx => $funresult) {
			   		if (isset($funresult->display)) {
			   			$function = $function.', '.$funresult->display;
			   		}
			   }
			   if ($function == '') {
				   $job_function = 'Not Set';
			   } else {
				   $job_function = ltrim($function,',');
			   }
		   } else {
				$job_function = 'Not Set';   
		   }		   
		   
		   if (isset($result->m_skill)) {
			   $skills_val = '';
			   foreach ($result->m_skill as $skilx => $skilresult) {
			   		if (isset($skilresult->area_display)) {
			   			$skills_val = $skills_val.', '.$skilresult->area_display;
			   		}
			   }
			   if ($skills_val == '') {
				   $skills = 'Not Set';
			   } else {
				   $skills = ltrim($skills_val,',');
			   }
		   } else {
				$skills = 'Not Set';   
		   } 
		   
		   if (isset($result->mCard->matchedSkills)) {
			   $mskills = '';
			   foreach ($result->mCard->matchedSkills as $mskilx => $mskilresult) {
				   $mskills = $mskills.', '.$mskilresult->display.' for '.$mskilresult->period;
			   }
			   if ($mskills == '') {
				   $match_skills = 'No match Skills';
			   } else {
				   $match_skills = ltrim($mskills,',');
			   }
		   } else {
				$match_skills = 'No Match Skills';   
		   }		   
		   
		   if (isset($result->jobIndustries)) {
			   $jind = '';
			   foreach ($result->jobIndustries as $jix => $jiresult) {
				   $jind =  $jiresult->display;
			   }			   
			   if ($jind == '' ) {
				   $job_industry = 'Not Set';
			   } else {
				   $job_industry = $jind;
			   }
		   } else {
				$job_industry = 'Not Set';   
		   }
		   
		   if (isset($result->resume_date)) {
			   $resume_date = $result->resume_date;
		   } else {
				$resume_date = 'Not Set';   
		   }
		   
		   if (isset($result->companyTimeLine)) {
			   $companydetails = array();
			   foreach ($result->companyTimeLine as $cmpx => $cmpresult) {
				   if (isset($cmpresult->timeline)) {
					   	foreach ($cmpresult->timeline as $cmpdx => $cmpdresult) {
							$companydetails['cmpid'] = $cmpdresult->company_id;
							if (isset($cmpdresult->company_role)) {
								foreach ($cmpdresult->company_role as $cmprdx => $cmprresult) {
									$companydetails['cmprole'] = $cmprresult->display;
								}
							}
							if (isset($cmpdresult->company_companyDetails)) {
								foreach ($cmpdresult->company_companyDetails as $cmpnamedx => $cmpnameresult) {
									$companydetails['cmpname'] = $cmpnameresult->display;
								}
							}
							if (isset($cmpdresult->company_period)) {
								$companydetails['cmpperiod'] = $cmpdresult->company_period->v;
							}
							$company[] = $companydetails;
						}
				   }
			   }
		   }
		   
		   if (isset($result->experience_timeline)) {
			   $expdetails = array();
			   foreach ($result->experience_timeline as $expx => $expresult) {
					if (isset($expresult->company)) {
						$expdetails['cmpname'] = $expresult->company;
					} else { 
						$expdetails['cmpname'] = '';
					}
					
					if (isset($expresult->latestrole)) {
						$expdetails['cmprole'] = $expresult->latestrole;
					} else {
						$expdetails['cmprole'] = '';
					}
					
					if (isset($expresult->start)) {
						$expdetails['cmpstart_dt'] = $expresult->start;
					} else {
						$expdetails['cmpstart_dt'] = '';
					}
					
					if (isset($expresult->end)) {
						$expdetails['cmpend_dt'] = $expresult->end;
					} else {
						$expdetails['cmpend_dt'] = '';
					}
					
					if (isset($expresult->period)) {
						$expdetails['cmpperiod'] = $expresult->period;
					} else {
						$expdetails['cmpperiod'] = '';
					}					
					$experience[] = $expdetails;
			   }
		   }
		   
		   if (isset($result->summary)) {
			   foreach ($result->summary as $summx => $summresult) {
				   foreach ($summresult->sentences as $sumdx => $sumdresult) {
					   if (isset($sumdresult->val)) {
						   $summary[] = $sumdresult->val;
					   }
				   }
			   }
			   
		   }
		   
		   if (isset($result->pg_m_education)) {
			   $deg = '';
			   foreach ($result->pg_m_education as $degx => $degresult) {
				   if (isset($degresult->degree)) {
					   foreach ($degresult->degree as $degdx => $degdresult) {
							$deg = $degdresult->display;
					   }
				   }
			   }
			   if ($deg == '') {
				   $education = 'Not Set';
			   } else {
				   $education = $deg;
			   }
		   } else {
				$education = 'Not Set';   
		   } 
		   
		   if (isset($result->latestcompany)) {
			   foreach ($result->latestcompany as $cmpx => $cmpresult) {
				   $curr_company = $cmpresult->display;
			   }
		   } else {
				$curr_company = 'Not Set';   
		   } 
		   

		   if (isset($result->m_experience)) {
			   $expval = ($result->m_experience->v)/12;
			   $tot_exp = $result->m_experience->v;
		   } else {
				$tot_exp = 0;   
		   }
		   
		   if (isset($result->overallrating)) {
			   $rating = $result->overallrating;
		   } else {
				$rating = 0;   
		   }
		   
		   $personid = $result->personid;		   
		   
		   if (isset($result->resume_revised_on)) {
			   $last_updated = $result->resume_revised_on;
		   } else {
				$last_updated = 'Not Set';   
		   }

		   if (isset($result->date_of_creation)) {
			   $date_of_creation = $result->date_of_creation;
		   } else {
				$date_of_creation = 'Not Set';   
		   }
		   
		   if (isset($result->resumefiles)) {
			   foreach ($result->resumefiles as $rfx => $rfresult) {
				   $resumefile = $rfresult->path;
			   }
			   if ($resumefile == null) {
			   		$resumefile = '';  
			   }
		   } else {
				$resumefile = '';   
		   }
		   
		   if ($resumefile!='') {
			   $ext = end(explode('.', $resumefile));
		   } else {
			   $ext = 'docx';
		   }

		   //$getResume = $this->downloadprofile($personid,$ext);
		   $getResume = $personid.'.'.$ext;
		   if ($getResume != '') {
		   		$resumepath = $getResume;
		   }

		    $single_profiledata = array(
				'hirejobid'=>$hirejobid,
				'name'=>$name,
				'phone'=>$phone,
				'email'=>$email,
				'gender'=>$gender,
				'location'=>$location,
				'country'=>$country,
				'job_function'=>$job_function,
				'skills'=>$skills,
				'match_skills'=>$match_skills,
				'job_industry'=>$job_industry,
				'education'=>$education,
				'curr_company'=>$curr_company,
				'tot_exp'=>$tot_exp,
				'rating'=>$rating,
				'personid'=>$personid,
				'resumepath'=>$resumepath,
				'last_updated'=>$last_updated,
				'date_of_creation'=>$date_of_creation,
				'sociallink'=>$sociallink,
				'resume_date'=>$resume_date,
				'company'=>$company,
				'experience'=>$experience,
				'summary'=>$summary,
			);
        }
		
        return $single_profiledata;
	}
	
	/*
	* Fetch Profiles based on Requirement
	* @param int $nid -Requirement ID
	* @param int $start -Limit Start
	* @param int $end -Limit End
	* @return array
	*/
	public function fetch_profile($nid=null, $start=0, $end=20, $jid=null)
	{
		//Hirewand API URL
		$profileurl 	= "https://www.hirewand.com/hireapi/fetchrequirementresults";
		$profilerequest = "needid=".$nid."&from=".$start."&resSize=".$end; 
				
		$dir 				= realpath(APPPATH . '../ctemp');
		$path 				= $dir;
		$cookie_file_path 	= $path."/cookie.txt";
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_NOBODY, false);
		curl_setopt($ch, CURLOPT_URL, $this->loginurl);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file_path);
		//set the cookie the site has for certain features, this is optional
		curl_setopt($ch, CURLOPT_COOKIE, "cookiename=0");
		//curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.12) Gecko/20050915 Firefox/1.0.7");
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_REFERER, $_SERVER['REQUEST_URI']);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
		
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $this->loginrequest);
		curl_exec($ch);
		
		//page with the content I want to grab
		curl_setopt($ch, CURLOPT_URL, $profileurl);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $profilerequest);
		//do stuff with the info with DomDocument() etc
		$proresult = curl_exec($ch);
		curl_close($ch);	
		//echo $proresult; exit;
		$proresult = json_decode($proresult);
		//print_r( $proresult); exit;

		$profiledata	= array();
		$name 			= '';
		$hirejobid 		= $nid;
		$phone 			= '';
		$email 			= '';
		$gender 		= '';
		$location 		= '';
		$job_function 	= '';
		$skills 		= '';
		$match_skills 	= '';
		$missed_skills 	= '';
		$job_industry 	= '';
		$education 		= '';
		$curr_company 	= '';
		$tot_exp 		= '';
		$rating 		= '';
		$personid 		= '';
		$resumepath		= '';
		$sociallink		= '';
		$resume_date 	= '';
		$fittype		= '';
		$company		= array();
		$experience		= array();
		$summary		= array();
		$edu_timeline	= array();
		$slist_id 		= 0;
		$slist_comment 	= '';

		if (isset($proresult)) {
			if($proresult->status != 'fail') {
				foreach ($proresult->result as $idx => $result) {
					$name 			= '';
					$hirejobid 		= $nid;
					$phone 			= '';
					$email 			= '';
					$gender 		= '';
					$location 		= '';
					$job_function 	= '';
					$skills 		= '';
					$match_skills 	= '';
					$missed_skills	= '';
					$job_industry 	= '';
					$education 		= '';
					$curr_company 	= '';
					$tot_exp 		= '';
					$rating 		= '';
					$personid 		= '';
					$resumepath		= '';
					$sociallink		= '';
					$resume_date 	= '';
					$fittype		= '';
					$company		= array();
					$experience		= array();
					$summary		= array();
					$edu_timeline	= array();
					$slist_id 		= 0;
					$slist_comment 	= '';
		
				   if (isset($result->phone)) {
					   foreach($result->phone as $px => $phresult) {
						   $phone = $phresult->v;
					   }	
					   if($phone == null) {
							$phone = 'Not Set';  
					   }
				   } else {
						$phone = 'Not Set';   
				   }
		
				   if (isset($result->name)) {
					   foreach ($result->name as $namex => $nameresult) {
						   if (isset($nameresult->v)) {
								$name = $nameresult->v;
							}
					   }	
					   if ($name == null) {
							$name = 'No Name';  
					   }
				   } else {
						$name = 'No Name';   
				   }
				   
		
				   if (isset($result->emails)) {
					   foreach ($result->emails as $emailx => $emailresult) {
							if (isset($emailresult->v)) {
								$email = $emailresult->v;
							}				   
					   }	
					   if ($email == null) {
							$email = 'Not Set';  
					   }
				   } else {
						$email = 'Not Set';   
				   }			   
				   
				   if (isset($result->gender)) {
					   $gender = $result->gender->display;	
					   if ($gender == null) {
							$gender = 'Not Set';  
					   }
				   } else {
						$gender = 'Not Set';   
				   }
				   
				   if (isset($result->wwwlinks)) {				   
					   foreach ($result->wwwlinks as $wwwlinksx => $wwwlinksresult)	 {					   		
						   if (isset($wwwlinksresult->site)) {
								if ($wwwlinksresult->site=='linkedin') {
									$sociallink = $wwwlinksresult->v;								
								}
							}
					   }					
					   if (empty($sociallink)) {
							$sociallink = 'Not Set';  
					   }
				   } else {
						$sociallink = 'Not Set';  
				   }			   
				   
				   if (isset($result->m_country)) {
					   foreach ($result->m_country as $cntx => $cntresult) {
						   if (isset($cntresult->display)) {
								$country = $cntresult->display;
							}
					   }	
					   if ($country == null) {
							$country = 'Not Set';  
					   }
				   } else {
						$country = 'Not Set';   
				   }			   
				   
				   if (isset($result->m_location)) {
					   foreach ($result->m_location as $locx => $locresult) {
							if (isset($locresult->display)) {
								$location = $locresult->display;
							}				   
					   }	
					   if ($location == null) {
							$location = 'Not Set';  
					   }
				   } else {
						$location = 'Not Set';   
				   }
				   
				   if (isset($result->jobFunctions)) {
					   $function = '';
					   foreach ($result->jobFunctions as $funx => $funresult) {
							if (isset($funresult->display)) {
								$function = $function.', '.$funresult->display;
							}
					   }	
					   if ($function == '') {
						   $job_function = 'Not Set';
					   } else {
						   $job_function = ltrim($function,',');
					   }
				   } else {
						$job_function = 'Not Set';   
				   } 
				   
				   if (isset($result->m_skill)) {
					   $skills_val = '';
					   foreach ($result->m_skill as $skilx => $skilresult) {
							if (isset($skilresult->area_display)) {
								$skills_val = $skills_val.', '.$skilresult->area_display;
							}
					   }	
					   if ($skills_val == '') {
						   $skills = 'Not Set';
					   } else {
						   $skills = ltrim($skills_val,',');
					   }
				   } else {
						$skills = 'Not Set';   
				   } 
				   
				   if (isset($result->mCard->matchedSkills)) {
					   $mskills = '';
					   foreach ($result->mCard->matchedSkills as $mskilx => $mskilresult) {
						   $mskills = $mskills.', '.$mskilresult->display.' for '.$mskilresult->period;
					   }	
					   if ($mskills == '') {
						   $match_skills = 'No match Skills';
					   } else {
						   $match_skills = ltrim($mskills,',');
					   }
				   } else {
						$match_skills = 'No Match Skills';   
				   } 
				   
				   if (isset($result->mCard_text->missedskills)) {
					   $missed_skills = $result->mCard_text->missedskills->text;
				   } else {
						$missed_skills = 'No Missing Skills';   
				   }
				   
				   if(isset($result->mCard_text->fittype)) {
					   $fittype = $result->mCard_text->fittype;
				   } else {
						$fittype = '';   
				   } 
				   
				   if (isset($result->jobIndustries)) {
					   $jind = '';
					   foreach ($result->jobIndustries as $jix => $jiresult) {
						   $jind =  $jiresult->display;
					   }				   
					   if ($jind == '' ) {
						   $job_industry = 'Not Set';
					   } else {
						   $job_industry = $jind;
					   }
				   } else {
						$job_industry = 'Not Set';   
				   }
				   
				   if (isset($result->resume_date)) {
					   $resume_date = $result->resume_date;
				   } else {
						$resume_date = 'Not Set';   
				   }
				   
				   if (isset($result->companyTimeLine)) {
					   $companydetails = array();
					   foreach ($result->companyTimeLine as $cmpx => $cmpresult) {					   
						   if (isset($cmpresult->timeline)) {
								foreach ($cmpresult->timeline as $cmpdx => $cmpdresult) {
									$companydetails['cmpid'] = $cmpdresult->company_id;
									if (isset($cmpdresult->company_role)) {
										foreach ($cmpdresult->company_role as $cmprdx => $cmprresult) {
											$companydetails['cmprole'] = $cmprresult->display;
										}
									}
									
									if (isset($cmpdresult->company_companyDetails)) {
										foreach ($cmpdresult->company_companyDetails as $cmpnamedx => $cmpnameresult) {
											$companydetails['cmpname'] = $cmpnameresult->display;
										}
									}
									
									if (isset($cmpdresult->company_period)) {
										$companydetails['cmpperiod'] = $cmpdresult->company_period->v;
									}
									$company[] = $companydetails;
								}
						   }
					   }
				   }
				   
				   if (isset($result->experience_timeline)) {
					   $expdetails = array();
					   foreach ($result->experience_timeline as $expx => $expresult) {
							if (isset($expresult->company)) {
								$expdetails['cmpname'] = $expresult->company;
							} else { 
								$expdetails['cmpname'] = '';
							}
							
							if (isset($expresult->latestrole)) {
								$expdetails['cmprole'] = $expresult->latestrole;
							} else {
								$expdetails['cmprole'] = '';
							}
							
							if (isset($expresult->start)) {
								$expdetails['cmpstart_dt'] = $expresult->start;
							} else {
								$expdetails['cmpstart_dt'] = '';
							}
							
							if (isset($expresult->end)) {
								$expdetails['cmpend_dt'] = $expresult->end;
							} else {
								$expdetails['cmpend_dt'] = '';
							}
							
							if (isset($expresult->period)) {
								$expdetails['cmpperiod'] = $expresult->period;
							} else {
								$expdetails['cmpperiod'] = '';
							}						
							$experience[] = $expdetails;
					   }
				   }
				   
				   if (isset($result->education_timeline)) {
					   $edudetails = array();
					   foreach ($result->education_timeline as $edux => $eduresult) {
						   if (isset($eduresult->school)) {
								$edudetails['school'] = $eduresult->school;
							} else { 
								$edudetails['school'] = '';
							}
							
							if (isset($eduresult->educationname)) {
								$edudetails['educationname'] = $eduresult->educationname;
							} else { 
								$edudetails['educationname'] = '';
							}
							
							if (isset($eduresult->schoolcity)) {
								$edudetails['schoolcity'] = $eduresult->schoolcity;
							} else { 
								$edudetails['schoolcity'] = '';
							}					   
						   $edu_timeline[] = $edudetails;
					   }				   
				   }
				   
				   if (isset($result->summary)) {
					   foreach ($result->summary as $summx => $summresult) {
						   foreach ($summresult->sentences as $sumdx => $sumdresult) {
							   if (isset($sumdresult->val)) {
								   $summary[] = $sumdresult->val;
							   }
						   }
					   }
				   }
				   
				   if (isset($result->pg_m_education)) {
					   $deg = '';
					   foreach ($result->pg_m_education as $degx => $degresult) {
						   if (isset($degresult->degree)) {
							   foreach ($degresult->degree as $degdx => $degdresult) {
									$deg = $degdresult->display;
							   }
						   }
					   }
		
					   if ($deg == '') {
						   $education = 'Not Set';
					   } else {
						   $education = $deg;
					   }
				   } else {
						$education = 'Not Set';   
				   } 
				   
				   if (isset($result->latestcompany)) {
					   foreach ($result->latestcompany as $cmpx => $cmpresult) {
						   $curr_company = $cmpresult->display;
					   }
				   } else {
						$curr_company = 'Not Set';   
				   }			   
		
				   if (isset($result->m_experience)) {
					   $expval = ($result->m_experience->v)/12;
					   $tot_exp = $result->m_experience->v;
				   } else {
						$tot_exp = 0;   
				   }
				   
				   if (isset($result->overallrating)) {
					   $rating = $result->overallrating;
				   } else {
						$rating = 0;   
				   }
				   
				   $personid = $result->personid;
				   $shortlistData = $this->get_shortlist_record($jid, $personid);
				   if (empty($shortlistData)) {
					   $slist_id = 0;
					   $slist_comment = '';
				   } else {
						$slist_id = $shortlistData['slist_id']; 
						$slist_comment = $shortlistData['slist_comment']; 
				   }
				   
				   if (isset($result->profile_revised_on)) {
					   $last_updated = $result->profile_revised_on;
				   } else {
						$last_updated = 'Not Set';   
				   }
				   
				   if (isset($result->date_of_creation)) {
						$date_of_creation = $result->date_of_creation;
				   } else {
						$date_of_creation = 'Not Set';   
				   }
		
				   //$getResume = $this->downloadprofile($personid);
				   $getResume = '';
				   if($getResume != '') {
						$resumepath = $getResume;
				   }
		
					$profiledata[] = array(
						'hirejobid'=>$hirejobid,
						'name'=>$name,
						'phone'=>$phone,
						'email'=>$email,
						'gender'=>$gender,
						'location'=>$location,
						'country'=>$country,
						'job_function'=>$job_function,
						'skills'=>$skills,
						'match_skills'=>$match_skills,
						'missed_skills'=>$missed_skills,
						'job_industry'=>$job_industry,
						'education'=>$education,
						'curr_company'=>$curr_company,
						'tot_exp'=>$tot_exp,
						'rating'=>$rating,
						'fittype'=>$fittype,
						'personid'=>$personid,
						'resumepath'=>$resumepath,
						'last_updated'=>$last_updated,
						'date_of_creation'=>$date_of_creation,
						'sociallink'=>$sociallink,
						'resume_date'=>$resume_date,
						'company'=>$company,
						'experience'=>$experience,
						'summary'=>$summary,
						'edu_timeline'=>$edu_timeline,
						'slist_id'=>$slist_id,
						'slist_comment'=>$slist_comment
					);
				}
			}
		}
        return $profiledata;
	}	
}