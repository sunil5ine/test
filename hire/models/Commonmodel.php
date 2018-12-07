<?php 
/**
 * Common model for the entire APP
 * 
 * 
 * @package    CI
 * @subpackage Model
 * @author     Sreejith Gopinath <sreejith@aatoon.com>
 */
	 
class Commonmodel extends CI_Model {	
	
	var $table_subscribe 	= '';
	var $table_emp 			= '';
	var $table_emp_pro 		= '';
	var $table_country 		= '';
	var $table_farea 		= '';
	var $table_edu 			= '';
	var $table_edu_spec 	= '';
	var $table_ind 			= '';
	var $table_jrole 		= '';
	var $table_jrole_grp 	= '';
	var $table_skill 		= '';
	var $table_exp 			= '';
	var $table_emp_sm 		= '';
	
	/** 
	* Init Function
	*
	* @return void
	*/
	public function __construct()
	{
		ini_set('memory_limit', '-1');
		$this->table_subscribe 	= 'ch_emp_subscribe';
		$this->table_emp 		= 'ch_employer';
		$this->table_emp_pro 	= 'ch_emp_profile';	
		$this->table_emp_sm 	= 'ch_emp_social';		
		$this->table_country 	= 'enum_country';
		$this->table_farea 		= 'enum_job_function';
		$this->table_edu 		= 'enum_degree_type';
		$this->table_edu_spec 	= 'ch_edu_spec';
		$this->table_ind 		= 'enum_industry';
		$this->table_jrole 		= 'enum_role';
		$this->table_jrole_grp 	= 'ch_jobrole_group';
		$this->table_skill 		= 'enum_skill_area';
		$this->table_exp 		= 'enum_experience';
	}
	
	/** 
	* Get subscription details Function
	*
	* @return array
	*/
	public function get_subscribe()
	{
		$now = date('Y-m-d H:i:s');
		return $this->db->select('sub_nojobs , sub_nocv, sub_type, sub_expire_dt')->select_sum('sub_nojobs')->where('sub_expire_dt >=', $now)->where('emp_id', $this->session->userdata('hireid'))->get($this->table_subscribe)->row_array();
		
	}
	
	/** 
	* Get Employer Profile Function
	*
	* @return array
	*/
	public function get_emp_profile()
	{
		$query = $this->db->query("select ep.ep_dispaly_name, ep.ep_logo, ep.ep_welcome_msg, ep.ep_notify_email, em.emp_comp_name, em.emp_fname, em.emp_lname, em.emp_designation, em.emp_ccode, em.emp_phone, em.emp_email, em.emp_hash, em.emp_location, em.emp_website, em.emp_number, em.	emp_authkey, em.emp_encrypt_id, em.emp_desc, em.emp_reg_date, em.emp_update_date, sm.esm_linkdin, sm.esm_fb, sm.esm_tw, sm.esm_gp, sm.esm_blog  from ".$this->table_emp_pro." ep left join ".$this->table_emp." em on em.emp_id=ep.emp_id left join ".$this->table_emp_sm." sm on sm.emp_id=ep.emp_id where ep.emp_id=".$this->session->userdata('hireid'));
		return $query->row_array();
	}
	
	/** 
	* Get Employer Social profile Function
	*
	* @return array
	*/
	public function get_emp_socialmedia()
	{
		$query = $this->db->query("select sm.esm_id, sm.esm_linkdin, sm.esm_fb, sm.esm_tw, sm.esm_gp, sm.esm_blog from ".$this->table_emp_sm." sm where sm.emp_id=".$this->session->userdata('hireid'));
		return $query->row_array();
	}
	
	/** 
	* Populate country list function
	*
	* @return array
	*/
	public function get_country()
    {	
       	$query = $this->db->query("select cnt_id, cnt_hireid, cnt_display from ".$this->table_country." order by cnt_id asc");
		$country_list = $query->result();
		$dropDownList['']='Nationality';
		foreach ($country_list as $dropdown) {
			$dropDownList[$dropdown->cnt_id] = $dropdown->cnt_display;
		}
		return $dropDownList;
    }
	
	/** 
	* Poplulate education list function
	*
	* @return array
	*/
	public function get_edu()
    {	
       	$query = $this->db->query("select deg_type_id, deg_type_display from ".$this->table_edu." order by deg_type_duration asc");
		$edu_list = $query->result();
		$dropDownList['']='Educational Qualification';
		foreach ($edu_list as $dropdown) {
			$dropDownList[$dropdown->deg_type_id] = $dropdown->deg_type_display;
		}
		return $dropDownList;
    }
	
	/** 
	* Populate functional area list Function
	*
	* @return array
	*/
	public function get_farea()
    {	
       	$query = $this->db->query("select jfun_id, jfun_display from ".$this->table_farea." order by jfun_display asc");
		$fun_list = $query->result();
		$dropDownList['']='Functional Area';
		foreach ($fun_list as $dropdown) {
			$dropDownList[$dropdown->jfun_id] = $dropdown->jfun_display;
		}
		return $dropDownList;
    }
	
	/** 
	* Populate industry dropdown Function
	*
	* @return array
	*/
	public function get_industry_list()
    {	
       	$query = $this->db->query("select ind_id, ind_display from ".$this->table_ind." order by ind_display asc");
		$ind_list = $query->result();
		$dropDownList['']='Industry';
		foreach ($ind_list as $dropdown) {
			$dropDownList[$dropdown->inind_displayd_id] = $dropdown->ind_display;
		}
		return $dropDownList;
    }
	
	/** 
	* Get industry list Function
	*
	* @return array
	*/
	public function get_industry()
    {	
       	$query = $this->db->query("select ind_id, ind_display from ".$this->table_ind." order by ind_display asc");
		$ind_list = $query->result();
		foreach ($ind_list as $dropdown) {
			$dropDownList[$dropdown->ind_display] = $dropdown->ind_display;
		}
		return $dropDownList;
    }
	
	public function get_jobrole()
    {
		$query = $this->db->query("select jrole_id, jrole_display from ".$this->table_jrole." order by jrole_display asc");
		$jr_list = $query->result();
		foreach ($jr_list as $dropdown) {
			$dropDownList[$dropdown->jrole_display] = $dropdown->jrole_display;
		}
		return $dropDownList;
    }

    public function get_skill()
    {
		$query = $this->db->query("select skillarea_id, skillarea_display from ".$this->table_skill." order by skillarea_display asc");
		$skill_list = $query->result();
		foreach ($skill_list as $dropdown) {
			$dropDownList[$dropdown->skillarea_display] = $dropdown->skillarea_display;
		}
		return json_encode($dropDownList);
    }

    public function get_minexp()
    {
		$query = $this->db->query("select exp_id, exp_display from ".$this->table_exp." order by exp_id asc");
		$exp_list = $query->result();
		$dropDownList['']='Min Exp';
		foreach ($exp_list as $dropdown) {
			$dropDownList[$dropdown->exp_id] = $dropdown->exp_display;
		}
		return $dropDownList;
    }
	
	
    public function get_maxexp()
    {
		$query = $this->db->query("select exp_id, exp_display from ".$this->table_exp." order by exp_id asc");
		$exp_list = $query->result();
		$dropDownList['']='Max Exp';
		foreach ($exp_list as $dropdown) {
			$dropDownList[$dropdown->exp_id] = $dropdown->exp_display;
		}
		return $dropDownList;
    }
	
	public function get_minsal()
    {	
		$dropDownList['']='Min Salary';
		$dropDownList['0']='00 Thousands';
		for ($i=100; $i<=5000; $i=$i+100) {
			$dropDownList[$i] = $i;
		}
		$dropDownList['5000+']='5000+';
		return $dropDownList;
    }
	
	public function get_maxsal()
    {	
		$dropDownList['']='Max Salary';
		$dropDownList['0']='00 Thousands';
		for ($i=500; $i<=9500; $i=$i+500) {
			$dropDownList[$i] = $i;
		}
		$dropDownList['9500+']='9500+';
		return $dropDownList;
    }
	
	public function get_minexp_inc()
    {	
		$dropDownList[''] = 'Min Exp';
		$dropDownList['0'] = '0 Yrs';
		for ($i=1; $i<=30; $i++) {
			$dropDownList[$i] = $i;
		}
		$dropDownList['30+'] = '30+';
		return $dropDownList;
    }
	
	public function get_maxexp_inc()
    {	
		$dropDownList[''] = 'Max Exp';
		$dropDownList['0'] = '0 Yrs';
		for ($i=1; $i<=30; $i++) {
			$dropDownList[$i] = $i;
		}
		$dropDownList['30+'] = '30+';
		return $dropDownList;
    }
}