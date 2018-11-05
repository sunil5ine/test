<?php 
/**
 * Jobportal model for this APP
 * 
 * 
 * @package    CI
 * @subpackage Model
 * @author     Sreejith Gopinath <sreejith@aatoon.com>
 */

class Jobportalmodel extends CI_Model {

	var $table_emp 		= '';
	var $table_job 		= '';
	var $table_country 	= '';
	var $table_farea 	= '';
	var $table_edu 		= '';
	var $table_edu_spec = '';
	var $table_ind 		= '';
	var $table_jrole	= '';
	var $table_jrole_grp= '';
	var $table_candidate= '';
	var $table_cv 		= '';
	var $table_smedia 	= '';
	var $table_apply 	= '';
	
	/** 
	* Init Function
	*
	* @return void
	*/
    public function __construct()
    {	
		ini_set('memory_limit', '-1');
		$this->table_emp 		= 'ch_employer';
		$this->table_job 		= 'ch_jobs';
		$this->table_country 	= 'ch_country';
		$this->table_farea 		= 'ch_funarea';
		$this->table_edu 		= 'ch_education';
		$this->table_edu_spec 	= 'ch_edu_spec';
		$this->table_ind 		= 'ch_industry';
		$this->table_jrole 		= 'ch_jobrole';
		$this->table_jrole_grp 	= 'ch_jobrole_group';
		$this->table_candidate 	= 'ch_candidate';
		$this->table_cv 		= 'ch_cv';
		$this->table_smedia 	= 'ch_socialmedia';
		$this->table_apply 		= 'ch_jobapply';
    }
	
	public function get_emp_record($purl=null)
	{
		$query=$this->db->query("select emp_id,emp_comp_name from ".$this->table_emp." where emp_jobportal='".$purl."'");
		return $query->row_array();
	}

	public function record_count($portalid=null) 
	{
		$this->db->select('job_id');
		$this->db->from($this->table_job);
		$this->db->where('job_status !=', 0);
		$this->db->where('job_created_by', $portalid);
		return $this->db->count_all_results();
    }

	public function get_record($portalid=null)
    {	
       	$query = $this->db->query("select j.job_id, j.job_title, j.job_location, j.job_min_exp, j.job_max_exp, j.job_min_sal, j.job_max_sal, j.job_industry, j.job_farea, j.job_role, j.job_edu, j.job_edu_spec, j.job_skills, j.job_company, j.job_desc, j.job_type, j.job_created_dt, j.job_created_by, e.edu_name, f.fun_name, ind.ind_name, jr.jr_name, emp.emp_comp_name, emp.emp_fname  from ".$this->table_job." j left join ".$this->table_ind." ind on ind.ind_id = j.job_industry left join ".$this->table_edu." e on e.edu_id = j.job_edu left join ".$this->table_farea." f on f.fun_id = j.job_farea left join ".$this->table_jrole." jr on jr.jr_id = j.job_role left join ".$this->table_emp." emp on emp.emp_id = j.job_created_by where j.job_status!=0 and j.job_site=1 and j.job_created_by = ".$portalid." order by j.job_id desc");

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
    }
	
	public function get_single_record($jid=null, $portalid=null)
	{
		$query = $this->db->query("select j.job_id, j.job_title, j.job_location, j.job_min_exp, j.job_max_exp, j.job_min_sal, j.job_max_sal, j.job_industry, j.job_farea, j.job_role, j.job_edu, j.job_edu_spec, j.job_skills, j.job_company, j.job_desc, j.job_type, j.job_created_dt, j.job_created_by, e.edu_name, f.fun_name, ind.ind_name, jr.jr_name, emp.emp_comp_name, emp.emp_email, emp.emp_fname, emp.emp_desc  from ".$this->table_job." j left join ".$this->table_ind." ind on ind.ind_id = j.job_industry left join ".$this->table_edu." e on e.edu_id = j.job_edu left join ".$this->table_farea." f on f.fun_id = j.job_farea left join ".$this->table_jrole." jr on jr.jr_id = j.job_role left join ".$this->table_emp." emp on emp.emp_id = j.job_created_by where j.job_id=".$jid." and j.job_status!=0 and j.job_created_by = ".$portalid);
		return $query->row_array();
	}
	
	public function get_candidate_record($cid=null)
	{
		$query = $this->db->query("select c.can_id, c.can_fname, c.can_lname, c.can_ccode, c.can_phone, c.can_email, c.can_hash, c.can_dob, c.can_gender, c.can_experience,  c.can_curr_company, c.can_curr_loc, c.can_alert, c.edu_id, c.co_id, c.fun_id, co.co_name, e.edu_name, f.fun_name, cv.cv_path, cv.cv_cletter from ".$this->table_candidate." c left join ".$this->table_country." co on co.co_id = c.co_id left join ".$this->table_edu." e on e.edu_id = c.edu_id left join ".$this->table_farea." f on f.fun_id = c.fun_id  left join ".$this->table_cv." cv on cv.can_id = c.can_id where c.can_id=".$cid);
		return $query->row_array();
	}
	
	public function insert_record()
	{
		$data=array(
			'can_fname'=>$this->input->post('firstname'),
			'can_lname'=>$this->input->post('lastname'),
			'can_ccode'=>$this->input->post('cntrycode'),
			'can_phone'=>$this->input->post('phone'),
			'can_email'=>$this->input->post('emailid'),
			'can_password'=>md5($this->input->post('firstname')),
			'can_hash'=>$this->input->post('firstname'),
			'can_gender'=>$this->input->post('gender'),
			'edu_id'=>$this->input->post('edu'),
			'co_id'=>$this->input->post('nation'),
			'can_experience'=>$this->input->post('exp'),
			'can_curr_company'=>$this->input->post('curremp'),
			'can_curr_loc'=>$this->input->post('currloc'),
			'can_curr_sal'=>$this->input->post('currsal'),
			'fun_id'=>$this->input->post('farea'),
			'ind_id'=>$this->input->post('industry'),
			'jr_id'=>$this->input->post('jrole'),
			'can_skills'=>$this->input->post('skills'),
			'can_alert'=>$this->input->post('jobalert'),
			'can_relocate'=>$this->input->post('relocate'),
			'can_reg_date'=>date('Y-m-d'),
			'can_upd_date'=>date('Y-m-d H:i:s'),
			'can_status'=>1
		);

		$this->db->insert($this->table_candidate, $data);
		$insert_cadid = $this->db->insert_id();
		return $insert_cadid;
	}
	
	public function postcv_details($canid=null, $cvpath=null)
	{
		$cvdata=array(
			'can_id'=>$canid,
			'cv_headline'=>$this->input->post('resumehead'),
			'cv_cletter'=>$this->input->post('covernotes'),
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
			'sm_linkdin'=>$this->input->post('socialmedia'),
			'sm_status'=>1,
		);
		$this->db->insert($this->table_smedia, $smdata);
		$insert_smid = $this->db->insert_id();
		return $insert_smid;
	}
	
	public function postjob_source($canid=null,$jobid=null,$jsrc=null)
	{
		$jsdata=array(
			'job_id'=>$jobid,
			'can_id'=>$canid,
			'ja_source'=>$jsrc,
			'ja_date'=>date('Y-m-d H:i:s'),
			'ja_status'=>1,
		);
		$this->db->insert($this->table_apply, $jsdata);
		$insert_jsid = $this->db->insert_id();
		return $insert_jsid;
	}

	public function get_country()
    {	
       	$query=$this->db->query("select co_id, co_code, co_name from ".$this->table_country." where co_status=1 order by co_name asc");

		$country_list = $query->result();
		$dropDownList['']='Nationality';
		foreach($country_list as $dropdown) {
			$dropDownList[$dropdown->co_id] = $dropdown->co_name;
		}
		return $dropDownList;
    }
	
	public function get_edu()
    {	
       	$query=$this->db->query("select edu_id, edu_name from ".$this->table_edu." where edu_status=1 order by edu_priority asc");

		$edu_list = $query->result();
		$dropDownList['']='Educational Qualification';
		foreach($edu_list as $dropdown) {
			$dropDownList[$dropdown->edu_id] = $dropdown->edu_name;
		}
		return $dropDownList;
    }
	
	public function get_farea()
    {	
       	$query=$this->db->query("select fun_id, fun_name from ".$this->table_farea." where fun_status=1 order by fun_name asc");

		$fun_list = $query->result();
		$dropDownList['']='Functional Area';
		foreach($fun_list as $dropdown) {
			$dropDownList[$dropdown->fun_id] = $dropdown->fun_name;
		}
		return $dropDownList;
    }
	
	public function get_industry()
    {	
       	$query=$this->db->query("select ind_id, ind_name from ".$this->table_ind." where ind_status=1 order by ind_name asc");

		$ind_list = $query->result();
		$dropDownList['']='Industry';
		foreach($ind_list as $dropdown) {
			$dropDownList[$dropdown->ind_id] = $dropdown->ind_name;
		}
		return $dropDownList;
    }
	
	public function get_jobrole()
    {
		$optquery=$this->db->query("select jrg_id, jrg_name from ".$this->table_jrole_grp." order by jrg_id asc");
		$opt_list = $optquery->result();
			
		$dropDownList['']['']='Job Role';
		foreach($opt_list as $jglist) {
			$query=$this->db->query("select jr_id, jrg_id, jr_name from ".$this->table_jrole." where jr_status=1 and jrg_id=".$jglist->jrg_id." order by jr_name asc");
			$jr_list = $query->result();
			foreach($jr_list as $dropdown) {
				$dropDownList[$jglist->jrg_name][$dropdown->jr_id] = $dropdown->jr_name;
			}
		}
		return $dropDownList;
    }
	
	public function get_minsal()
    {	
		$dropDownList['']='Current Salary';
		$dropDownList['0']='0 lac';
		for($i=1; $i<=50; $i++) {
			$dropDownList[$i] = $i;
		}
		$dropDownList['50+']='50+';
		return $dropDownList;
    }
	
	public function get_maxsal()
    {	
		$dropDownList['']='Max Salary';
		$dropDownList['0']='0 lac';
		for($i=5; $i<=95; $i=$i+5) {
			$dropDownList[$i] = $i;
		}
		$dropDownList['95+']='95+';
		return $dropDownList;
    }

	
	public function get_minexp()
    {	
		$dropDownList['']='Min Exp';
		$dropDownList['0']='0 Yrs';
		for($i=1; $i<=30; $i++) {
			$dropDownList[$i] = $i;
		}
		$dropDownList['30+']='30+';
		return $dropDownList;
    }
	
	public function get_maxexp()
    {	
		$dropDownList['']='Experience';
		$dropDownList['0']='0 Yrs';
		for($i=1; $i<=30; $i++) {
			$dropDownList[$i] = $i;
		}
		$dropDownList['30+']='30+';
		return $dropDownList;
    }
}