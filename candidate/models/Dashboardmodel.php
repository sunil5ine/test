<?php 
class Dashboardmodel extends CI_Model {
	
	var $table_candidate = '';
	var $table_can_summary = '';
	var $table_can_work = '';
	var $table_country = '';
	var $table_farea = '';
	var $table_edu = '';
	var $table_cv = '';
	var $table_edu_spec = '';
	var $table_ind = '';
	var $table_jrole = '';
	var $table_jrole_grp = '';
	var $table_job = '';
	var $table_jobapply = '';
	var $table_emp = '';
	var $table_smedia = '';
	var $table_subscribe = '';
	var $table_skill = '';

    public function __construct()
    {	
    	ini_set('memory_limit', '-1');
		$this->table_candidate = 'ch_candidate';
		$this->table_can_summary = 'ch_candidate_summary';
		$this->table_can_work = 'ch_candidate_exp';
		$this->table_country = 'ch_country';
		$this->table_farea = 'enum_job_function'; /*ch_funarea*/
		$this->table_edu = 'ch_education';
		$this->table_edu_spec = 'ch_edu_spec';
		$this->table_degree = 'enum_degree';
		$this->table_degree_type = 'enum_degree_type';
		$this->table_cv = 'ch_cv';
		$this->table_ind = 'enum_industry'; /*ch_industry*/
		$this->table_jrole = 'ch_jobrole';
		$this->table_jrole_grp = 'ch_jobrole_group';
		$this->table_job = 'ch_jobs';
		$this->table_jobapply ='ch_jobapply';
		$this->table_emp = 'ch_employer';
		$this->table_smedia = 'ch_socialmedia';
		$this->table_subscribe = 'ch_emp_subscribe';
		$this->table_edu_details = 'ch_candidate_education';
		$this->table_skill = 'enum_skill_area';
    }	
	
	public function get_single_record($cid=null)
	{
		$query = $this->db->query("select c.can_curr_sal, c.can_id, c.can_encrypt_id, c.can_fname, c.can_lname, c.can_ccode, c.can_phone, c.can_email, c.can_hash, c.can_dob, c.can_gender, c.can_experience, c.can_curr_company, c.can_curr_loc, c.can_skills, c.can_alert, c.can_pref_loc, c.can_curr_desig, c.can_propic, c.edu_id, c.co_id, c.fun_id, c.ind_id, c.can_relocate, c.can_reg_date, c.can_upd_date, co.co_name, co.co_nationality, e.deg_type_sdisplay as edu_name, f.jfun_display, cv.cv_headline, cv.cv_path, cv.cv_cletter, sm.sm_linkdin, sm.sm_fb, sm.sm_tw, sm.sm_gp, sum.csum_details, ind.ind_display from ".$this->table_candidate." c left join ".$this->table_country." co on co.co_id = c.co_id left join ".$this->table_degree_type." e on e.deg_type_id = c.edu_id left join ".$this->table_farea." f on f.jfun_id = c.fun_id left join ".$this->table_cv." cv on cv.can_id = c.can_id  left join ".$this->table_smedia." sm on sm.can_id = c.can_id left join ".$this->table_can_summary." sum on sum.can_id = c.can_id left join ".$this->table_ind." ind on ind.ind_id = c.ind_id where c.can_id=".$cid);
		return $query->row_array();
	}
	
	public function chk_pwd_record($cid=null, $pwd=null)
	{
		$this->db->select('can_id');
		$this->db->from($this->table_candidate);
		$this->db->where('can_id', $cid);
		$this->db->where('can_password', md5($pwd));
		return $this->db->count_all_results();
	}
	
	public function get_cand_work($cid=null)
    {	
       	$query=$this->db->query("select cexp_id, cexp_encrypt_id, cexp_company, cexp_location, cexp_from_mon, cexp_from_yr, cexp_to_mon, cexp_to_yr, cexp_position, cexp_key_role, cexp_present from ".$this->table_can_work." where can_id=".$cid." order by cexp_present desc, cexp_from_yr desc");
		return $query->result();
    }

    public function get_cand_eduq($cid=null)
    {	
       	$query=$this->db->query("select e.cedu_id, e.cedu_encrypt_id, e.can_id, e.cedu_school, e.deg_type_id, e.deg_id, e.cedu_specialization, e.cedu_startdt, e.cedu_enddt, e.cedu_status, d.deg_sdisplay, dt.deg_type_sdisplay from ".$this->table_edu_details." e left join ".$this->table_degree." d on d.deg_id=e.deg_id left join ".$this->table_degree_type." dt on dt.deg_type_id=e.deg_type_id where can_id=".$cid." order by e.cedu_enddt desc");
		return $query->result();
    }
	
	public function update_profile()
	{
		$cid = $this->session->userdata('cand_chid');
		
		$can_up_data=array(
			'can_hash'=>$this->input->post('usrpwd'),
			'can_password'=>md5($this->input->post('usrpwd')),
			'can_upd_date'=>date('Y-m-d H:i:s'),
		);
		$this->db->where('can_id', $cid);
	   	$this->db->update($this->table_candidate, $can_up_data);
	}
	
	public function get_pref_country()
    {	
       	$query=$this->db->query("select co_id, co_code, co_name from ".$this->table_country." where co_status=1 order by co_name asc");

		$country_list = $query->result();
		/*$dropDownList['']='Current Location';*/
		foreach($country_list as $dropdown)
		{
			$dropDownList[$dropdown->co_id] = $dropdown->co_name;
		}
		return $dropDownList;
    }
	
	public function get_single_country($coid=null)
	{
		$query = $this->db->query("select co_id, co_code, co_name from ".$this->table_country." where co_id='".$coid."'");
		return $query->row_array();
	}
	
	public function get_country()
    {	
       	$query=$this->db->query("select co_id, co_code, co_name from ".$this->table_country." where co_status=1 order by co_name asc");

		$country_list = $query->result();
		$dropDownList['']='Current Location';
		foreach($country_list as $dropdown)
		{
			$dropDownList[$dropdown->co_name] = $dropdown->co_name;
		}
		return $dropDownList;
    }
	
	public function get_nationality()
    {	
       	$query=$this->db->query("select co_id, co_code, co_name, co_nationality from ".$this->table_country." where co_status=1 order by co_nationality asc");

		$country_list = $query->result();
		$dropDownList['']='Nationality';
		foreach($country_list as $dropdown)
		{
			$dropDownList[$dropdown->co_id] = $dropdown->co_name;
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
	
	public function get_skill_list()
    {
    	$term = $this->input->post('term');
		$query = $this->db->query("select skillarea_id, skillarea_display from ".$this->table_skill." where skillarea_display like '".$term."%' order by skillarea_display asc");
		$skill_list = $query->result();
		return json_encode($skill_list);
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
	
	function getDomainName($url)
	{
		if(filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED) === FALSE)
		{
			return false;
		}
		
		$urlChenks = parse_url($url);
		return $urlChenks['scheme'].'://'.$urlChenks['host'];
	}


	/* new 5ine developers code */

		/* profile update*/
	 function profile_upload($updata,$can_id,$caneid)
	{
		
		$this->db->trans_start();
		$this->db->where('can_id',$can_id);
		$this->db->set('can_encrypt_id',$caneid);
		$this->db->update('ch_candidate',$updata);
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE){return false;}else{return true;}
	}

	public function personal_update($updata,$can_id)
	{
		
		
		$this->db->where('can_id',$can_id);
		$this->db->update('ch_candidate',$updata);
		
		if($this->db->affected_rows() > 0){

			return false;
		}
		else{
			return false;
			}
	}

/*ad work expireance*/

public function addwork($work_data)
{
	$this->db->trans_start();
	$this->db->insert('ch_candidate_exp',$work_data);
	$this->db->trans_complete();
	if($this->db->trans_status() === FALSE){return false;}else{return true;}
}

/* delete work*/
function delete_work_experience($canid, $enid)
{
	$this->db->trans_start();
		$this->db->where('cexp_encrypt_id',$enid);
		$this->db->where('can_id',$canid);
		$this->db->delete($this->table_can_work);
	$this->db->trans_complete();
	if($this->db->trans_status() === FALSE){return false;}else{return true;}
}
/* get sinbgle experience data */

function getsingle_work_experience($canid, $enid)
{
	$this->db->where('cexp_encrypt_id',$enid);
	$this->db->where('can_id',$canid);
	$query = $this->db->get($this->table_can_work);
		if($query->num_rows() > 0){
			return $query->row_array();
		}
		else{
			return false;
		}
}


/* update work experiance */

function update_works($work_data,$can_en,$cid)
{
	$this->db->where('can_id',$cid);
	$this->db->where('cexp_encrypt_id',$can_en);
	$this->db->set('cexp_encrypt_id',$can_en);
	$this->db->update('ch_candidate_exp',$work_data);
	if($this->db->affected_rows() > 0){return true;}else{return false;}
}

/* delete education */
function delete_edution($cid, $eudid)
{
	$this->db->trans_start();
		$this->db->where('cedu_encrypt_id',$eudid);
		$this->db->where('can_id',$cid);
		$this->db->delete('ch_candidate_education');
	$this->db->trans_complete();
	if($this->db->trans_status() === FALSE){return false;}else{return true;}
}

/* get single education row */
function edite_edution($cid, $eudid)
{
	$this->db->where('cedu_encrypt_id',$eudid);
		$this->db->where('can_id',$cid);
	$query = $this->db->get('ch_candidate_education');
		if($query->num_rows() > 0){
			return $query->row_array();
		}
		else{
			return false;
		}
}

/* update education */
function update_education($data, $ceid, $cid)
{
	
	$this->db->where('can_id',$cid);
	$this->db->where('cedu_encrypt_id',$ceid);
	$this->db->set('cedu_encrypt_id',$ceid);
	$this->db->update($this->table_edu_details, $data);
	if($this->db->affected_rows() > 0){return true;}else{return false;}
}



function update_profilepic($cid,$picpath)
{
	$this->db->where('emp_id', $cid);
	$query = $this->db->update('ch_emp_profile',array('ep_logo' =>$picpath));
	if ($query->affected_rows() > 0) {
		return true;
	}
	else
	{
		return false;
	}
}

public function qtest($id)
{
	$this->db->where('can_id', $id);
	$query = $this->db->get('ch_can_test');
	if($query->num_rows() > 0)
	{
		return 0;
	}
	else
	{
		$this->db->where('can_id', $id);
		$this->db->where('tr_marks >', 35);
		$query1 = $this->db->get('test_result');
		if($query1->num_rows() > 0){
			return 0;
		}else{
			return 1;
		}
	}
	
	
	
}

}