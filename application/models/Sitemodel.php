<?php 
class Sitemodel extends CI_Model {
	
	var $table_candidate 		= '';
	var $table_country 			= '';
	var $table_farea 			= '';
	var $table_edu 				= '';
	var $table_cv 				= '';
	var $table_ind 				= '';
	var $table_summary 			= '';
	var $table_smedia 			= '';
	var $table_degree_type 		= '';
	var $table_exp 				= '';
	var $table_can_subscribe	= '';
	var $table_newsletter 		= '';

    public function __construct()
    {	
		ini_set('memory_limit', '-1');
		$this->table_candidate 		= 'ch_candidate';
		$this->table_can_subscribe 	= 'ch_can_subscribe';
		$this->table_summary 		= 'ch_candidate_summary';
		$this->table_country 		= 'ch_country';
		$this->table_farea 			= 'enum_job_function';
		$this->table_ind 			= 'enum_industry';
		$this->table_edu 			= 'ch_education';
		$this->table_cv 			= 'ch_cv';
		$this->table_smedia 		= 'ch_socialmedia';
		$this->table_degree_type	= 'enum_degree_type';
		$this->table_exp 			= 'enum_experience';
		$this->table_newsletter 	= 'ch_newsletter';
		
		//Hirewand login URL and Credentials
		$this->loginurl 	= "https://www.hirewand.com/user/signin";  
		//$this->loginrequest =	"email=anju@ipfhr.com&password=hire123&remember_me=true&GMTOffset=-330";
                $this->loginrequest =	"email=jitin@cherryhire.com&password=hire123123";
    }
	
	public function record_count() 
	{
        return $this->db->count_all($this->table_candidate);
    }
	
	public function get_country()
    {	
       	$query=$this->db->query("select co_id, co_code, co_name from ".$this->table_country." where co_status=1 order by co_name asc");
		$country_list = $query->result();
		$dropDownList['']='Current Location';
		foreach ($country_list as $dropdown) {
			$dropDownList[$dropdown->co_name] = $dropdown->co_name;
		}
		return $dropDownList;
    }

    public function get_nationality()
    {	
       	$query=$this->db->query("select co_id, co_code, co_name, co_nationality from ".$this->table_country." where co_status=1 order by co_nationality asc");
		$nation_list = $query->result();
		$dropDownList['']='Nationality';
		foreach ($nation_list as $dropdown) {
			$dropDownList[$dropdown->co_id] = $dropdown->co_nationality;
		}
		return $dropDownList;
    }

    public function get_cmp_location()
    {	
       	$query=$this->db->query("select co_id, co_code, co_name from ".$this->table_country." where co_status=1 order by co_name asc");
		$country_list = $query->result();
		$dropDownList['']='Company Location';
		foreach ($country_list as $dropdown) {
			$dropDownList[$dropdown->co_name] = $dropdown->co_name;
		}
		return $dropDownList;
    }
	
	public function get_farea()
    {	
       	$query=$this->db->query("select jfun_id, jfun_display from ".$this->table_farea." order by jfun_display asc");
		$fun_list = $query->result();
		$dropDownList['']='Functional Area';
		foreach ($fun_list as $dropdown) {
			$dropDownList[$dropdown->jfun_id] = $dropdown->jfun_display;
		}
		return $dropDownList;
    }
	
	public function get_edu()
    {	
       	$query=$this->db->query("select deg_type_id, deg_type_sdisplay from ".$this->table_degree_type." order by deg_type_weight asc");
		$edu_list = $query->result();
		$dropDownList['']='Educational Qualification';
		foreach($edu_list as $dropdown) {
			$dropDownList[$dropdown->deg_type_id] = $dropdown->deg_type_sdisplay;
		}
		return $dropDownList;
    }
	
	public function get_industry()
    {	
       	$query=$this->db->query("select ind_id, ind_display from ".$this->table_ind." order by ind_display asc");
		$ind_list = $query->result();
		$dropDownList['']='Industry';
		foreach ($ind_list as $dropdown) {
			$dropDownList[$dropdown->ind_id] = $dropdown->ind_display;
		}
		return $dropDownList;
    }
	
	public function valid_candidate_email($cemail=null)
	{
		$this->db->select('can_id');
		$this->db->from($this->table_candidate);
		$this->db->where('can_email', $cemail);
		return $this->db->count_all_results();
	}
	
	public function post_newsletter($data)
	{
		$this->db->insert($this->table_newsletter, $data);
		$nlid = $this->db->insert_id();
		return $nlid;
	}
	
	public function postcv_record()
	{
		$dob = str_replace('/','-',$this->input->post('dob'));
		$alerts = $this->input->post('jobalert');
			if ($alerts == '') {
				$alerts =0;
			}
		$data=array(
			'can_fname'=>$this->input->post('firstname'),
			'can_lname'=>$this->input->post('lastname'),
			'can_ccode'=>$this->input->post('cntrycode'),
			'can_phone'=>$this->input->post('phone'),
			'can_email'=>$this->input->post('emailid'),
			'can_password'=>md5($this->input->post('usrpwd')),
			'can_hash'=>$this->input->post('usrpwd'),
			'can_dob'=>date('Y-m-d', strtotime($dob)),
			'can_gender'=>$this->input->post('gender'),
			'edu_id'=>$this->input->post('edu'),
			'co_id'=>$this->input->post('nation'),
			'can_experience'=>$this->input->post('totexp'),
			'can_curr_company'=>$this->input->post('currcompany'),
			'can_curr_loc'=>$this->input->post('currloc'),
			'fun_id'=>$this->input->post('funarea'),
			'ind_id'=>$this->input->post('industry'),
			'can_curr_desig'=>$this->input->post('currdesig'),
			'can_alert'=>$alerts,
			'can_propic'=>'profilepic/cand_no_pic.png',
			'can_reg_date'=>date('Y-m-d'),
			'can_upd_date'=>date('Y-m-d H:i:s'),
			'can_status'=>1
		);
		
		$this->db->insert($this->table_candidate, $data);
		$insert_cadid = $this->db->insert_id();
		
		/*$updata = array(
			'can_encrypt_id'=>md5($this->encrypt->encode($insert_cadid)),
			'can_vcode'=>md5($this->encrypt->encode($insert_cadid).'*'.$this->input->post('emailid')),
			'can_propic'=>'profilepic/cand_no_pic.png'
		);*/

                $updata = array(
			'can_encrypt_id'=>md5($this->encryption->encrypt($insert_cadid)),
			'can_vcode'=>md5($this->encryption->encrypt($insert_cadid).'*'.$this->input->post('emailid')),
			'can_propic'=>'profilepic/cand_no_pic.png'
		);



		$this->db->where('can_id', $insert_cadid);
		$this->db->update($this->table_candidate, $updata);
                
                
		return $insert_cadid;
                
	}
	
	public function postcv_details($canid=null, $cvpath=null)
	{
		
		$cvpath = base_url().'resume/'. basename($cvpath);
		$cvdata=array(
			'can_id'=>$canid,
			'cv_path'=>$cvpath,
			'cv_text'=>''
		);                
                
		$this->db->insert($this->table_cv, $cvdata);
                
		$insert_cvid = $this->db->insert_id();
		return $insert_cvid;
	}
	
	public function postsocial_media($canid=null)
	{
		$smdata=array(
			'can_id'=>$canid,
			'sm_linkdin'=>'',
			'sm_fb'=>'',
			'sm_tw'=>'',
			'sm_gp'=>'',
			'sm_status'=>1,
		);
		$this->db->insert($this->table_smedia, $smdata);
		$insert_smid = $this->db->insert_id();
		return $insert_smid;
	}
	
	public function postsummary($canid=null)
	{
		$sumdata=array(
			'can_id'=>$canid,
			'csum_updatedt'=>date('Y-m-d H:i:s'),
		);
		$this->db->insert($this->table_summary, $sumdata);
		$insert_sumid = $this->db->insert_id();
		return $insert_sumid;
	}
	
	public function post_csubscribe($canid=null)
	{
		$expdt = date('Y-m-d H:i:s');
		
		$newxpdt = date('Y-m-d H:i:s',(strtotime(date("Y-m-d H:i:s", strtotime($expdt)) . " +7 days")));
		$csdata=array(
			'can_id'=>$canid,
			'csub_nojobs'=>1,
			'csub_expire_dt'=>$newxpdt,
			'csub_type'=>1,
			'csub_status'=>1
		);
		$this->db->insert($this->table_can_subscribe, $csdata);
		$insert_csid = $this->db->insert_id();
		return $insert_csid;
	}	
	
	public function get_candidate($cid=null)
	{
		$query = $this->db->query("select c.can_id, c.can_encrypt_id, c.can_fname, c.can_lname, c.can_ccode, c.can_phone, c.can_email, c.can_dob, c.can_gender, c.can_experience, c.can_curr_company, c.can_curr_loc, c.can_alert, c.can_vcode, co.co_name, co.co_nationality, e.deg_type_sdisplay as edu_name, f.jfun_display  as fun_name from ".$this->table_candidate." c left join ".$this->table_country." co on co.co_id = c.co_id left join ".$this->table_degree_type." e on e.deg_type_id = c.edu_id left join ".$this->table_farea." f on f.jfun_id = c.fun_id where c.can_id=".$cid);
		return $query->row_array();
	}
	
        
        public function upload_resume_api($cvpath)
	{
        /* HireWand API to add resume */
           
                   $requrl = "https://www.hirewand.com/api/upload";
                
                // $resume_name = str_replace("http://localhost/CherryHireCode/resume/","",$cvpath);
                 $resume_name = str_replace("http://staging.cherryhire.com/resume/","",$cvpath);
                // $resume_name = str_replace("http://www.cherryhire.com/resume/","",$cvpath);
               
                // $callback="http://localhost/CherryHireCode/candidate/MyProfile";
                 $callback    ="http://staging.cherryhire.com/candidate/MyProfile";
                //$callback    ="http://www.cherryhire.com/candidate/MyProfile";
                
                // echo $resume_name.'</br>';
                // echo $callback.'</br>';exit;
                
		$reqrequest = "filename=".$resume_name.'callback='.$callback; 

		$dir = realpath(APPPATH . '../ctemp');
		$path = $dir;
		$cookie_file_path = $path."/cookie.txt";
		
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
		curl_setopt($ch, CURLOPT_URL, $requrl);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $reqrequest);
		
		//do stuff with the info with DomDocument() etc
		$html = curl_exec($ch);
               
		curl_close($ch);	
               // Send the request and store the result in an array
			
		$response = explode(',', rtrim(ltrim($html,'{'),'}'));
		// Tokenise the response
		for ($i=0; $i<count($response); $i++) {
			// Find position of first "=" character
			$splitAt = strpos($response[$i], ":");
			// Create an associative (hash) array with key/value pairs ('trim' strips excess whitespace)
			$keyval = trim(str_replace('"','',(substr($response[$i], 0, $splitAt))));
			$resval = trim(str_replace('"','',(substr($response[$i], ($splitAt+1)))));
			$output[$keyval] = $resval;
		} 

		//echo $output['personid'] ;exit;
            
        }
        
        
        
	public function publish_hire_req($canid=null)
	{
		/******Delete Requirement in HW*****************/
		$query = $this->db->query("select c.can_id, c.can_encrypt_id, c.can_fname, c.can_lname, c.can_ccode, c.can_phone, c.can_email, c.can_dob, c.can_gender, c.can_experience, c.can_curr_company, c.can_curr_loc, c.can_reg_date, cv.cv_path, co.co_id, co.co_name, co.co_nationality, e.deg_type_id, e.deg_type_sdisplay, f.jfun_hireid, f.jfun_display, exp.exp_value, ind.ind_hireid, ind.ind_display from ".$this->table_candidate." c left join ".$this->table_cv." cv on cv.can_id = c.can_id left join ".$this->table_country." co on co.co_id = c.co_id left join ".$this->table_degree_type." e on e.deg_type_id = c.edu_id left join ".$this->table_farea." f on f.jfun_id = c.fun_id left join ".$this->table_exp." exp on exp.exp_id = c.can_experience left join ".$this->table_ind." ind on ind.ind_id = c.ind_id where c.can_id=".$canid);
		$result = $query->row_array();
		
		// /home/cherryhire/public_html/resume/
		// http://www.cherryhire.com/resume/
		$canname  = $result['can_fname'].' '.$result['can_lname'];
		$canphone = (str_replace("+","",$result['can_ccode'])).'-'.$result['can_phone'];
		$canexp   = $result['can_experience']*12;
		$doc_date = 1000 * strtotime($result['can_reg_date']);
		$resumepath = str_replace("http://www.cherryhire.com/resume/","/home/cherryhire/public_html/resume/",$result['cv_path']);
		$resume_name = str_replace("http://www.cherryhire.com/resume/","",$result['cv_path']);

		$data = array("Stream of the resume" => "@".$resumepath, "experience" => $canexp, "indusrty" => array("v" => $result['ind_hireid'], "display" => $result['ind_display']), "function" => array("v" => $result['jfun_hireid'], "display" => $result['jfun_display']), "name" => $canname, "emailid" => $result['can_email'], "phone no" => $canphone);                                                                    
		$data_string = json_encode($data);

		$requrl = "https://www.hirewand.com/api/upload"; //Delete requirement HW API
		$reqrequest = "filename=".$resume_name.'&overridedata='.$data_string.'&doc_date='.$doc_date.'&resume_owner='.$result['can_email']; 

		$dir = realpath(APPPATH . '../ctemp');
		$path = $dir;
		$cookie_file_path = $path."/cookie.txt";
		
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
		curl_setopt($ch, CURLOPT_URL, $requrl);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $reqrequest);
		//curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type:multipart/form-data"));

		/*curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                          
		    'Content-Type: application/json',                                                                                
		    'Content-Length: ' . strlen($data_string))                                                                       
		);*/

		//do stuff with the info with DomDocument() etc
		$html = curl_exec($ch);
		curl_close($ch);	
		//$html = json_decode($html);
		echo $html; exit;
		return $html->status;
	}


/*get fetured jobs lists*/
	public function getfetured()
	{
		$this->db->order_by('job_updated_dt','desc');
		// $this->db->where('job_priority','Featured');
		$this->db->where('hire_jobid','0');
		$this->db->limit(10);
		$query = $this->db->get('ch_jobs');
		if($query->num_rows() > 0){
			return $query->result();
		}
		else{
			return false;
		}
	}

/**
 * [get_candidates candidate pricing list]
 * @return [type] []
 */
	public function get_candidates()
    {	
       	$query=$this->db->query("select * from ch_can_pricing where pr_status=1 and pr_type=1 order by pr_id asc");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
		return $data;
		}
		return false;
    }

/**
 * [get_employersplan description]
 * @return [type] [description]
 */
	public function get_employersplan()
    {
       	$query = $this->db->query("select pr_id, pr_encrypt_id, pr_name,peried, pr_orginal, pr_offer, pr_type, exprence_level, pr_limit, pr_cvno, pr_notify, pr_status from ch_pricing where pr_status=1 and pr_type=1 order by pr_id asc");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
    }

	public function getpackagecv()
	{
		return $this->db->where('status',1)->get('cv_package')->result();
	}

	/** Add parnters form details */
	public function partners()
	{
		$data = array(
			'pt_fname'		=> $this->input->post('fname'),
			'pt_lname'		=> $this->input->post('lname'),
			'pt_orgType'	=> $this->input->post('orgType'),
			'pt_staffCount' => $this->input->post('staffCount'),
			'pt_email'		=> $this->input->post('email'),
			'pt_phone'		=> $this->input->post('phone'),
			'pt_des'		=> $this->input->post('des'),
			'pt_orgname'	=> $this->input->post('orgName'),
		);
		$this->db->insert('ch_partners', $data);
	}

	/** industry list */
	function ind()
	{
		return $this->db->get('ch_industry')->result(); 
	}


}