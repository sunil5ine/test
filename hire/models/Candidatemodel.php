<?php 
/**
 * Candidate model for the entire APP
 * 
 * 
 * @package    CI
 * @subpackage Model
 * @author     Sreejith Gopinath <sreejith@aatoon.com>
 */
	 
class Candidatemodel extends CI_Model {

	var $table_candidate 	= '';
	var $table_can_summary 	= '';
	var $table_can_work 	= '';
	var $table_country 		= '';
	var $table_farea 		= '';
	var $table_edu 			= '';
	var $table_cv 			= '';
	var $table_edu_spec 	= '';
	var $table_ind 			= '';
	var $table_jrole 		= '';
	var $table_jrole_grp 	= '';
	var $table_job 			= '';
	var $table_jobapply 	= '';
	var $table_emp 			= '';
	var $table_smedia 		= '';
	var $table_subscribe 	= '';
	var $table_skill 		= '';
	
    public function __construct()
    {	
		ini_set('memory_limit', '-1');
		$this->table_candidate 		= 'ch_candidate';
		$this->table_can_summary 	= 'ch_candidate_summary';
		$this->table_can_work 		= 'ch_candidate_exp';
		$this->table_country 		= 'ch_country';
		$this->table_farea 			= 'enum_job_function'; /*ch_funarea*/
		$this->table_edu 			= 'ch_education';
		$this->table_edu_spec 		= 'ch_edu_spec';
		$this->table_degree 		= 'enum_degree';
		$this->table_degree_type 	= 'enum_degree_type';
		$this->table_cv 			= 'ch_cv';
		$this->table_ind 			= 'enum_industry'; /*ch_industry*/
		$this->table_jrole 			= 'ch_jobrole';
		$this->table_jrole_grp 		= 'ch_jobrole_group';
		$this->table_job 			= 'ch_jobs';
		$this->table_jobapply 		= 'ch_jobapply';
		$this->table_emp 			= 'ch_employer';
		$this->table_smedia 		= 'ch_socialmedia';
		$this->table_subscribe 		= 'ch_emp_subscribe';
		$this->table_edu_details 	= 'ch_candidate_education';
		$this->table_skill 			= 'enum_skill_area';
		
    }

    /*
    * Get single candidate profile data
    *
    * @return array
    */
    public function get_single_record($cid=null)
	{
		$query = $this->db->query("select c.can_id, c.can_encrypt_id, c.can_fname, c.can_lname, c.can_ccode, c.can_phone, c.can_email, c.can_hash, c.can_dob, c.can_gender, c.can_experience, c.can_curr_company, c.can_curr_loc, c.can_skills, c.can_alert, c.can_pref_loc, c.can_curr_desig, c.can_propic, c.edu_id, c.co_id, c.fun_id, c.ind_id, c.can_relocate, c.can_reg_date, c.can_upd_date, co.co_name, co.co_nationality, e.deg_type_sdisplay as edu_name, f.jfun_display, cv.cv_headline, cv.cv_path, cv.cv_cletter, sm.sm_linkdin, sm.sm_fb, sm.sm_tw, sm.sm_gp, sum.csum_details, ind.ind_display from ".$this->table_candidate." c left join ".$this->table_country." co on co.co_id = c.co_id left join ".$this->table_degree_type." e on e.deg_type_id = c.edu_id left join ".$this->table_farea." f on f.jfun_id = c.fun_id left join ".$this->table_cv." cv on cv.can_id = c.can_id  left join ".$this->table_smedia." sm on sm.can_id = c.can_id left join ".$this->table_can_summary." sum on sum.can_id = c.can_id left join ".$this->table_ind." ind on ind.ind_id = c.ind_id where c.can_encrypt_id='".$cid."'");
		return $query->row_array();
	}

	/*
    * Get single candidate work data
    *
    * @return array
    */
	public function get_cand_work($cid=null)
    {	
       	$query=$this->db->query("select cexp_id, cexp_encrypt_id, cexp_company, cexp_location, cexp_from_mon, cexp_from_yr, cexp_to_mon, cexp_to_yr, cexp_position, cexp_key_role, cexp_present from ".$this->table_can_work." where can_id=".$cid." order by cexp_present desc, cexp_from_yr desc");
		return $query->result();
    }

    /*
    * Get single candidate education data
    *
    * @return array
    */
    public function get_cand_eduq($cid=null)
    {	
       	$query=$this->db->query("select e.cedu_id, e.cedu_encrypt_id, e.can_id, e.cedu_school, e.deg_type_id, e.deg_id, e.cedu_specialization, e.cedu_startdt, e.cedu_enddt, e.cedu_status, d.deg_sdisplay, dt.deg_type_sdisplay from ".$this->table_edu_details." e left join ".$this->table_degree." d on d.deg_id=e.deg_id left join ".$this->table_degree_type." dt on dt.deg_type_id=e.deg_type_id where can_id=".$cid." order by e.cedu_enddt desc");
		return $query->result();
    }

    /*
    * Get single country
    *
    * @return array
    */
    public function get_single_country($coid=null)
	{
		$query = $this->db->query("select co_id, co_code, co_name from ".$this->table_country." where co_id=".$coid);
		return $query->row_array();
	}
}