<?php 
class Candidatemodel extends CI_Model {

	var $table_candidate = '';
	var $table_can_summary = '';
	var $table_can_work = '';
	var $table_country = '';
	var $table_farea = '';
	var $table_edu = '';
	var $table_cv = '';
	var $table_degree = '';
	var $table_degree_type = '';
	var $table_ind = '';
	var $table_jrole = '';
	var $table_jrole_grp = '';
	var $table_job = '';
	var $table_jobapply = '';
	var $table_emp = '';
	var $table_smedia = '';
	var $table_subscribe = '';
	var $table_edu_details = '';
	
    public function __construct()
    {	
		ini_set('memory_limit', '-1');
		$this->table_candidate = 'ch_candidate';
		$this->table_can_summary = 'ch_candidate_summary';
		$this->table_can_work = 'ch_candidate_exp';
		$this->table_country = 'ch_country';
		$this->table_farea = 'enum_job_function';
		$this->table_edu = 'ch_education';
		$this->table_degree = 'enum_degree';
		$this->table_degree_type = 'enum_degree_type';
		$this->table_cv = 'ch_cv';
		$this->table_ind = 'enum_industry';
		$this->table_jrole = 'ch_jobrole';
		$this->table_jrole_grp = 'ch_jobrole_group';
		$this->table_job = 'ch_jobs';
		$this->table_jobapply ='ch_jobapply';
		$this->table_emp = 'ch_employer';
		$this->table_smedia = 'ch_socialmedia';
		$this->table_subscribe = 'ch_emp_subscribe';
		$this->table_edu_details = 'ch_candidate_education';
    }
	
	public function get_single_record($cid=null)
	{
		$query = $this->db->query("select c.can_id, c.can_encrypt_id, c.can_fname, c.can_lname, c.can_ccode, c.can_phone, c.can_email, c.can_hash, c.can_dob, c.can_gender, c.can_experience, c.can_curr_company, c.can_curr_loc, c.can_skills, c.can_pref_loc, c.can_curr_desig, c.can_alert, c.can_propic, c.edu_id, c.co_id, c.fun_id, c.ind_id, c.can_relocate, c.can_reg_date, c.can_upd_date, co.co_name, co.co_nationality, e.deg_type_sdisplay as edu_name, f.jfun_display, cv.cv_headline, cv.cv_path, cv.cv_cletter, sm.sm_linkdin, sm.sm_fb, sm.sm_tw, sm.sm_gp, sum.csum_details, ind.ind_display from ".$this->table_candidate." c left join ".$this->table_country." co on co.co_id = c.co_id left join ".$this->table_degree_type." e on e.deg_type_id = c.edu_id left join ".$this->table_farea." f on f.jfun_id = c.fun_id left join ".$this->table_cv." cv on cv.can_id = c.can_id  left join ".$this->table_smedia." sm on sm.can_id = c.can_id left join ".$this->table_can_summary." sum on sum.can_id = c.can_id left join ".$this->table_ind." ind on ind.ind_id = c.ind_id where c.can_id=".$cid);
		return $query->row_array();
	}

	public function get_cand_eduq($cid=null)
    {	
       	$query=$this->db->query("select e.cedu_id, e.cedu_encrypt_id, e.can_id, e.cedu_school, e.deg_type_id, e.deg_id, e.cedu_specialization, e.cedu_startdt, e.cedu_enddt, e.cedu_status, d.deg_sdisplay, dt.deg_type_sdisplay from ".$this->table_edu_details." e left join ".$this->table_degree." d on d.deg_id=e.deg_id left join ".$this->table_degree_type." dt on dt.deg_type_id=e.deg_type_id where can_id=".$cid." order by e.cedu_enddt desc");
		return $query->result();
    }

    public function get_cand_eduq_single($eqid=null)
    {	
		$cid = $this->session->userdata('cand_chid');
       	$query=$this->db->query("select e.cedu_id, e.cedu_encrypt_id, e.can_id, e.cedu_school, e.deg_type_id, e.deg_id, e.cedu_specialization, e.cedu_startdt, e.cedu_enddt, e.cedu_status, d.deg_sdisplay, dt.deg_type_sdisplay from ".$this->table_edu_details." e left join ".$this->table_degree." d on d.deg_id=e.deg_id left join ".$this->table_degree_type." dt on dt.deg_type_id=e.deg_type_id where e.can_id=".$cid." and e.cedu_encrypt_id='".$eqid."'");
		return $query->row_array();
    }
	
	public function get_cand_work($cid=null)
    {	
       	$query=$this->db->query("select cexp_id, cexp_encrypt_id, cexp_company, cexp_location, cexp_from_mon, cexp_from_yr, cexp_to_mon, cexp_to_yr, cexp_position, cexp_key_role, cexp_present from ".$this->table_can_work." where can_id=".$cid." order by cexp_present desc, cexp_from_yr desc");
		return $query->result();
    }
	
	public function get_cand_work_single($wid=null)
    {	
		$cid = $this->session->userdata('cand_chid');
       	$query=$this->db->query("select cexp_id, cexp_encrypt_id, cexp_company, cexp_location, cexp_from_mon, cexp_from_yr, cexp_to_mon, cexp_to_yr, cexp_position, cexp_key_role, cexp_present from ".$this->table_can_work." where can_id=".$cid." and cexp_encrypt_id='".$wid."'");
		return $query->row_array();
    }
	
	public function update_basic($canid=null)
	{
		$cid = $this->session->userdata('cand_chid');
		if (!empty($this->input->post('preloc'))) {
			$prefloc = implode(',',$this->input->post('preloc'));
		} else {
			$prefloc = '';
		}
		
		$cdata=array(
			'can_fname'=>$this->input->post('firstname'),
			'can_lname'=>$this->input->post('lastname'),
			'can_dob'=>date('Y-m-d', strtotime(str_replace('/','-',$this->input->post('dob')))),
			'can_gender'=>$this->input->post('gender'),
			'can_experience'=>$this->input->post('totexp'),
			'edu_id'=>$this->input->post('edu'),
			'co_id'=>$this->input->post('nation'),
			'fun_id'=>$this->input->post('funarea'),
			'ind_id'=>$this->input->post('industry'),
			'can_curr_company'=>$this->input->post('currcompany'),
			'can_curr_desig'=>$this->input->post('currdesig'),
			'can_curr_loc'=>$this->input->post('currloc'),
			'can_pref_loc'=>$prefloc,
			'can_relocate'=>$this->input->post('relocate'),
			'can_upd_date'=>date('Y-m-d H:i:s'),
		);
		
		$this->db->where('can_id', $cid);
	   	$this->db->update($this->table_candidate, $cdata);
	}
	
	public function update_summary($canid=null)
	{
		$cid = $this->session->userdata('cand_chid');
		$csum_data=array(
			'csum_details'=>$this->input->post('prosummary'),
			'csum_updatedt'=>date('Y-m-d H:i:s'),
		);
		
		$this->db->where('can_id', $cid);
	   	$this->db->update($this->table_can_summary, $csum_data);
		
		$can_up_data=array(
			'can_upd_date'=>date('Y-m-d H:i:s'),
		);
		$this->db->where('can_id', $cid);
	   	$this->db->update($this->table_candidate, $can_up_data);
	}
	public function delete_cand_work($wid=null)
	{
		$this->db->where('cexp_encrypt_id', $wid);
		$this->db->delete($this->table_can_work);
	}
	
	public function delete_cand_edu($eduid=null)
	{
		$this->db->where('cedu_encrypt_id', $eduid);
		$this->db->delete($this->table_edu_details);
	}
	
	public function update_workdetails($canid=null)
	{
		$cid = $this->session->userdata('cand_chid');
		if($this->input->post('cmp_present') == 1) {
			$u_data=array(
				'cexp_present'=>0
			);
			$this->db->where('can_id', $cid);
	   		$this->db->update($this->table_can_work, $u_data);
		}
		
		$work_data=array(
			'can_id'=>$cid,
			'cexp_company'=>$this->input->post('company'),
			'cexp_location'=>$this->input->post('location'),
			'cexp_from_mon'=>$this->input->post('frmmon'),
			'cexp_from_yr'=>$this->input->post('frmyr'),
			'cexp_to_mon'=>($this->input->post('tomon'))?$this->input->post('tomon'):'',
			'cexp_to_yr'=>($this->input->post('toyr'))?$this->input->post('toyr'):'',
			'cexp_position'=>$this->input->post('position'),
			'cexp_key_role'=>$this->input->post('keyrole'),
			'cexp_present'=>$this->input->post('cmp_present'),
			'cexp_updatedt'=>date('Y-m-d H:i:s'),
		);
		
		$this->db->insert($this->table_can_work, $work_data);
		$insert_wid = $this->db->insert_id();
		
		$work_data1=array(
			'cexp_encrypt_id'=>md5($insert_wid),
		);
		$this->db->where('cexp_id', $insert_wid);
	   	$this->db->update($this->table_can_work, $work_data1);
		
		$can_up_data=array(
			'can_upd_date'=>date('Y-m-d H:i:s'),
		);
		$this->db->where('can_id', $cid);
	   	$this->db->update($this->table_candidate, $can_up_data);
	}
	
	public function edit_workdetails($expid=null)
	{
		$cid = $this->session->userdata('cand_chid');
		if($this->input->post('edit_cmp_present') == 1) {
			$u_data=array(
				'cexp_present'=>0
			);
			$this->db->where('can_id', $cid);
	   		$this->db->update($this->table_can_work, $u_data);
		}
		
		$work_data=array(
			'cexp_company'=>$this->input->post('edit_company'),
			'cexp_location'=>$this->input->post('edit_location'),
			'cexp_from_mon'=>$this->input->post('edit_frmmon'),
			'cexp_from_yr'=>$this->input->post('edit_frmyr'),
			'cexp_to_mon'=>($this->input->post('edit_tomon'))?$this->input->post('edit_tomon'):'',
			'cexp_to_yr'=>($this->input->post('edit_toyr'))?$this->input->post('edit_toyr'):'',
			'cexp_position'=>$this->input->post('edit_position'),
			'cexp_key_role'=>$this->input->post('edit_keyrole'),
			'cexp_present'=>$this->input->post('edit_cmp_present'),
			'cexp_updatedt'=>date('Y-m-d H:i:s'),
		);
		
		$this->db->where('cexp_encrypt_id', $expid);
	   	$this->db->update($this->table_can_work, $work_data);
		
		$can_up_data=array(
			'can_upd_date'=>date('Y-m-d H:i:s'),
		);
		$this->db->where('can_id', $cid);
	   	$this->db->update($this->table_candidate, $can_up_data);
	}

	public function update_eduq_details($canid=null)
	{
		$cid = $this->session->userdata('cand_chid');
		
		$edu_data=array(
			'can_id'=>$cid,
			'cedu_school'=>$this->input->post('school'),
			'deg_type_id'=>$this->input->post('degree_type'),
			'deg_id'=>$this->input->post('degree'),
			'cedu_specialization'=>$this->input->post('spec'),
			'cedu_startdt'=>($this->input->post('edufrmyr'))?$this->input->post('edufrmyr'):'',
			'cedu_enddt'=>($this->input->post('edutoyr'))?$this->input->post('edutoyr'):'',
			'cedu_status'=>1,
			'cedu_updatedt'=>date('Y-m-d H:i:s'),
		);
		//`can_id`, `cedu_school`, `deg_type_id`, `deg_id`, `cedu_specialization`, `cedu_startdt`, `cedu_enddt`, `cedu_status`
		$this->db->insert($this->table_edu_details, $edu_data);
		$insert_eduid = $this->db->insert_id();
		
		$edu_data1=array(
			'cedu_encrypt_id'=>md5($insert_eduid),
		);
		$this->db->where('cedu_id', $insert_eduid);
	   	$this->db->update($this->table_edu_details, $edu_data1);
		
		$can_up_data=array(
			'can_upd_date'=>date('Y-m-d H:i:s'),
		);
		$this->db->where('can_id', $cid);
	   	$this->db->update($this->table_candidate, $can_up_data);
	}	
	
	public function edit_eduq_details($eduid=null)
	{
		$cid = $this->session->userdata('cand_chid');
		
		$edu_updata=array(
			'cedu_school'=>$this->input->post('edit_school'),
			'deg_type_id'=>$this->input->post('edit_degree_type'),
			'deg_id'=>$this->input->post('edit_degree'),
			'cedu_specialization'=>$this->input->post('edit_spec'),
			'cedu_startdt'=>($this->input->post('edit_edufrmyr'))?$this->input->post('edit_edufrmyr'):'',
			'cedu_enddt'=>($this->input->post('edit_edutoyr'))?$this->input->post('edit_edutoyr'):'',
			'cedu_status'=>1,
			'cedu_updatedt'=>date('Y-m-d H:i:s'),
		);
		
		$this->db->where('cedu_encrypt_id', $eduid);
	   	$this->db->update($this->table_edu_details, $edu_updata);
		
		$can_up_data=array(
			'can_upd_date'=>date('Y-m-d H:i:s'),
		);
		$this->db->where('can_id', $cid);
	   	$this->db->update($this->table_candidate, $can_up_data);
	}
	
	public function update_contact($canid=null)
	{
		$cid = $this->session->userdata('cand_chid');
		$contact_data=array(
			'can_ccode'=>$this->input->post('cntrycode'),
			'can_phone'=>$this->input->post('phone'),
			'can_upd_date'=>date('Y-m-d H:i:s'),
		);
		//can_email
		$this->db->where('can_id', $cid);
	   	$this->db->update($this->table_candidate, $contact_data);
	}	
	
	public function update_smedia($canid=null)
	{
		$cid = $this->session->userdata('cand_chid');
		
		$query=$this->db->query("select can_id from ".$this->table_smedia." where can_id=".$cid);
		$sm_list = $query->result();			
		
		if(count($sm_list)>0) {
			$cdata=array(
				'sm_linkdin'=>$this->input->post('linlink'),
				'sm_fb'=>$this->input->post('fblink'),
				'sm_tw'=>$this->input->post('twittlink'),
				'sm_gp'=>$this->input->post('gpluslink')
			);
			$this->db->where('can_id', $cid);
	   		$this->db->update($this->table_smedia, $cdata);
		} else {
			$cdata=array(
				'can_id'=>$cid,
				'sm_linkdin'=>$this->input->post('linlink'),
				'sm_fb'=>$this->input->post('fblink'),
				'sm_tw'=>$this->input->post('twittlink'),
				'sm_gp'=>$this->input->post('gpluslink'),
				'sm_status'=>1
			);
			$this->db->insert($this->table_smedia, $cdata);
		}
				
		$can_up_data=array(
			'can_upd_date'=>date('Y-m-d H:i:s'),
		);
		$this->db->where('can_id', $cid);
	   	$this->db->update($this->table_candidate, $can_up_data);
	}
	
	public function postcv_details($canid=null, $cvpath=null)
	{
		$cid = $this->session->userdata('cand_chid');
		
		$cvpath = $this->config->item('web_url').'resume/'. basename($cvpath);
		$cvdata=array(
			'can_id'=>$cid,
			'cv_path'=>$cvpath,
			'cv_headline'=>$this->input->post('resumehead')
		);
		$this->db->where('can_id', $cid);
		$this->db->update($this->table_cv, $cvdata);
		
		$can_up_data=array(
			'can_upd_date'=>date('Y-m-d H:i:s'),
		);
		$this->db->where('can_id', $cid);
	   	$this->db->update($this->table_candidate, $can_up_data);
	}
	
	public function update_qskill($canid=null)
	{
		$cid = $this->session->userdata('cand_chid');
		/*
		$name = $this->input->post('name');
		$pk= $this->input->post('pk');
		$value= $this->input->post('value');
		*/
		$name = 'can_skills';
		$value= $this->input->post('skillval');
		if($value!='')
		{
       		$this->db->where('can_id', $cid);
	   		$this->db->update($this->table_candidate, array($name=>$value));
	   		return 1;
		} else {

			return 0;
		}
		 
	}
	
	public function update_profilepic($canid=null, $propicpath=null)
	{
		$cid = $this->session->userdata('cand_chid');		
		$picpath = 'profilepic/'. basename($propicpath);				
		$can_up_data=array(
			'can_propic'=>$picpath,
			'can_upd_date'=>date('Y-m-d H:i:s'),
		);
		$this->db->where('can_id', $cid);
	   	$this->db->update($this->table_candidate, $can_up_data);
	}

	public function get_country()
    {	
       	$query=$this->db->query("select co_id, co_code, co_name from ".$this->table_country." where co_status=1 order by co_name asc");

		$country_list = $query->result();
		/*$dropDownList['']='Country';*/
		foreach($country_list as $dropdown)
		{
			$dropDownList[$dropdown->co_id] = $dropdown->co_name;
		}
		return $dropDownList;
    }
	
	public function get_single_country($coid=null)
	{
		$query = $this->db->query("select co_id, co_code, co_name from ".$this->table_country." where co_id=".$coid);
		return $query->row_array();
	}
	
	public function get_nationality()
    {	
       	$query=$this->db->query("select co_id, co_code, co_name, co_nationality from ".$this->table_country." where co_status=1 order by co_nationality asc");

		$country_list = $query->result();
		$dropDownList['']='Nationality';
		foreach($country_list as $dropdown)
		{
			$dropDownList[$dropdown->co_id] = $dropdown->co_nationality;
		}
		return $dropDownList;
    }

    public function get_degree()
    {	
       	$query=$this->db->query("select deg_id, deg_sdisplay from ".$this->table_degree." order by deg_sdisplay asc");

		$edu_list = $query->result();
		$dropDownList['']='Degree Type';
		foreach($edu_list as $dropdown)
		{
			$dropDownList[$dropdown->deg_id] = $dropdown->deg_sdisplay;
		}
		return $dropDownList;
    }

    public function get_degreetype()
    {	
       	$query=$this->db->query("select deg_type_id, deg_type_sdisplay from ".$this->table_degree_type." order by deg_type_weight asc");

		$edu_list = $query->result();
		$dropDownList['']='Qualification';
		foreach($edu_list as $dropdown)
		{
			$dropDownList[$dropdown->deg_type_id] = $dropdown->deg_type_sdisplay;
		}
		return $dropDownList;
    }
	
	public function get_edu()
    {	
       	$query=$this->db->query("select deg_type_id, deg_type_sdisplay from ".$this->table_degree_type." order by deg_type_weight asc");

		$edu_list = $query->result();
		$dropDownList['']='Qualification';
		foreach($edu_list as $dropdown)
		{
			$dropDownList[$dropdown->deg_type_id] = $dropdown->deg_type_sdisplay;
		}
		return $dropDownList;
    }
	
	public function get_edu_old()
    {	
       	$query=$this->db->query("select edu_id, edu_name from ".$this->table_edu." where edu_status=1 order by edu_priority asc");

		$edu_list = $query->result();
		$dropDownList['']='Educational Qualification';
		foreach($edu_list as $dropdown)
		{
			$dropDownList[$dropdown->edu_id] = $dropdown->edu_name;
		}
		return $dropDownList;
    }
	
	public function get_farea()
    {	
       	$query=$this->db->query("select jfun_id, jfun_display from ".$this->table_farea." order by jfun_display asc");
		$fun_list = $query->result();
		$dropDownList['']='Functional Area';
		foreach($fun_list as $dropdown)
		{
			$dropDownList[$dropdown->jfun_id] = $dropdown->jfun_display;
		}
		return $dropDownList;
    }

	public function get_industry()
    {	
       	$query=$this->db->query("select ind_id, ind_display from ".$this->table_ind." order by ind_display asc");

		$ind_list = $query->result();
		$dropDownList['']='Industry';
		foreach($ind_list as $dropdown)
		{
			$dropDownList[$dropdown->ind_id] = $dropdown->ind_display;
		}
		return $dropDownList;
    }
	
	public function get_jobrole()
    {
		$optquery=$this->db->query("select jrg_id, jrg_name from ".$this->table_jrole_grp." order by jrg_id asc");
		$opt_list = $optquery->result();
			
		$dropDownList['']['']='Job Role';
		foreach($opt_list as $jglist)
		{
			$query=$this->db->query("select jr_id, jrg_id, jr_name from ".$this->table_jrole." where jr_status=1 and jrg_id=".$jglist->jrg_id." order by jr_name asc");
			$jr_list = $query->result();
			foreach($jr_list as $dropdown)
			{
				$dropDownList[$jglist->jrg_name][$dropdown->jr_id] = $dropdown->jr_name;
			}
		}
		return $dropDownList;
    }
	
	public function get_minsal()
    {	
		$dropDownList['']='Min Salary';
		$dropDownList['0']='0 lac';
		for($i=1; $i<=50; $i++)
		{
			$dropDownList[$i] = $i;
		}
		$dropDownList['50+']='50+';
		return $dropDownList;
    }
	
	public function get_maxsal()
    {	
		$dropDownList['']='Max Salary';
		$dropDownList['0']='0 lac';
		for($i=5; $i<=95; $i=$i+5)
		{
			$dropDownList[$i] = $i;
		}
		$dropDownList['95+']='95+';
		return $dropDownList;
    }
	
	public function get_minexp()
    {	
		$dropDownList['']='Min Exp';
		$dropDownList['0']='0 Yrs';
		for($i=1; $i<=30; $i++)
		{
			$dropDownList[$i] = $i;
		}
		$dropDownList['30+']='30+';
		return $dropDownList;
    }
	
	public function get_maxexp()
    {	
		$dropDownList['']='Max Exp';
		$dropDownList['0']='0 Yrs';
		for($i=1; $i<=30; $i++)
		{
			$dropDownList[$i] = $i;
		}
		$dropDownList['30+']='30+';
		return $dropDownList;
    }
	
	public function get_year()
    {	
		$dropDownList['']='Year';
		$maxyr = date('Y');
		$minyr = date('Y') - 65;
		for($i=$maxyr; $i>=$minyr; $i--)
		{
			$dropDownList[$i] = $i;
		}
		return $dropDownList;
    }
	
	public function get_month()
    {	
		$dropDownList['']='Month';
		$dropDownList['1']='Jan';
		$dropDownList['2']='Feb';
		$dropDownList['3']='Mar';
		$dropDownList['4']='Apr';
		$dropDownList['5']='May';
		$dropDownList['6']='Jun';
		$dropDownList['7']='Jul';
		$dropDownList['8']='Aug';
		$dropDownList['9']='Sep';
		$dropDownList['10']='Oct';
		$dropDownList['11']='Nov';
		$dropDownList['12']='Dec';
		return $dropDownList;
    }
	
	/*Get Domain name from URL
	*
	*@param String $url -URL
	*
	*@return String
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


	/**
	 * new
	 */
	
	/*get applied jobs list */
	public function applied_jobs($cid)
	{
		$this->db->select('ja_status,job_url_id,job_industry,ja_encrypt_id,ch_jobs.job_id,job_title,job_location,job_company,job_min_exp,job_max_exp'); 
		$this->db->from('ch_jobapply');
		$this->db->where('can_id',$cid);
		$this->db->join('ch_jobs', 'ch_jobs.job_id = ch_jobapply.job_id', 'right');
		$query = $this->db->get();
		if($query->num_rows() > 0){return $query->result();}else{return false;}
	}

	/*cancel apply jobs*/
	public function cancle_job($cid,$enis)
	{
		$this->db->trans_start();
		$this->db->where('ja_encrypt_id',$enis);
		$this->db->where('can_id',$cid);
		$this->db->update('ch_jobapply',array('ja_status' =>'0' ));
		$this->db->trans_complete();
		if ($this->db->affected_rows() == '1') {return TRUE; }
		else {if ($this->db->trans_status() === FALSE) {return false; } return true; }
	}

	/*save jobs */
	public function saveto_account($data,$jobid,$cid)
	{
		$this->db->trans_start();		
		$this->db->insert('ch_can_savejobs',$data);
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){return false; }else{ return true; }
	}

	/* get saved jobs */

	public function saved_jobs($cid)
	{
		
		$this->db->select('*'); 
		$this->db->from('ch_can_savejobs');
		$this->db->where('can_id',$cid);
		$this->db->join('ch_jobs', 'ch_jobs.job_id = ch_can_savejobs.job_id', 'right');
		$query = $this->db->get();
		if($query->num_rows() > 0){return $query->result();}else{return false;}
		
	}

	/*rtemove saved jobs */
	public function remove_saved_jobs($jobid,$cid)
	{
		$this->db->trans_start();
		$this->db->where('can_id',$cid);
		$this->db->where('sv_encrypt_id',$jobid);
		$this->db->delete('ch_can_savejobs');
		$this->db->trans_complete();
		if ($this->db->trans_status() === FALSE){return false; }else{ return true; }
	}


}