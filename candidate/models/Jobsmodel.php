<?php 

class Jobsmodel extends CI_Model {



	var $table_emp = '';

	var $table_job = '';

	var $table_country = '';

	var $table_farea = '';

	var $table_edu = '';

	var $table_edu_spec = '';

	var $table_ind = '';

	var $table_jrole = '';

	var $table_jrole_grp = '';

	var $table_apply = '';

	var $table_jpost = '';

	var $table_jportal = '';

	var $table_subscribe = '';

	var $table_cvsource = '';

	var $table_candidate = '';

	var $table_skill = '';

	var $table_exp = '';

	var $table_enum_country = '';

	

    public function __construct()

    {	

		ini_set('memory_limit', '-1');

		$this->table_emp = 'ch_employer';

		$this->table_job = 'ch_jobs';

		$this->table_country = 'ch_country';

		$this->table_farea = 'enum_job_function';

		$this->table_edu = 'enum_degree_type';

		$this->table_edu_spec = 'ch_edu_spec';

		$this->table_ind = 'enum_industry';

		$this->table_jrole = 'enum_role';

		$this->table_jrole_grp = 'ch_jobrole_group';

		$this->table_apply = 'ch_jobapply';

		$this->table_jpost = 'ch_jobpost';

		$this->table_jportal = 'ch_jobportal';

		$this->table_cvsource = 'ch_cvsource';

		$this->table_candidate = 'ch_candidate';

		$this->table_skill = 'enum_skill_area';

		$this->table_exp = 'enum_experience';

		$this->table_enum_country = 'enum_country';		

		$this->table_subscribe = 'ch_can_subscribe';

    }

	

	public function get_cand_record($cid=null)

	{

		$query = $this->db->query("select c.can_id, c.can_encrypt_id, c.can_fname, c.can_lname, c.can_ccode, c.can_phone, c.can_email, c.can_curr_sal, c.can_dob, c.can_gender, c.can_experience, c.can_curr_company, c.can_curr_loc, c.can_skills, c.can_pref_loc, c.can_curr_desig, c.can_alert, c.can_propic, c.edu_id, c.co_id, c.fun_id, c.ind_id, c.can_relocate, c.can_reg_date, c.can_upd_date, co.co_name, co.co_nationality, f.jfun_display as fun_name, ind.ind_display from ".$this->table_candidate." c left join ".$this->table_country." co on co.co_id = c.co_id left join ".$this->table_farea." f on f.jfun_id = c.fun_id left join ".$this->table_ind." ind on ind.ind_id = c.ind_id where c.can_id=".$cid);

		return $query->row_array();

	}

	

	public function record_count($can_skill_list, $can_ind, $can_farea, $can_exp) 

	{

		$where = "";

		for($i=0; $i<count($can_skill_list); $i++) {

			if($i>0) { $where = $where." or ";}

			$where = $where."j.job_skills LIKE '%".$can_skill_list[$i]."' ";

		}

		if($can_ind != '') {

			$indname = $this->get_ind_name($can_ind);

			if(!empty($indname)) {

				if($where =='') {

					$where = $where." j.job_industry ='".$indname['ind_display']."' ";

				} else {

					$where = $where."or j.job_industry ='".$indname['ind_display']."' ";

				}

			}

		}

		if($can_farea != '') {

			if($where =='' ) {

				$where = $where." j.job_farea =".$can_farea." ";

			} else {

				$where = $where."or j.job_farea =".$can_farea." ";

			}

		}

		/*if($can_exp != '') {

			$where = $where."or (j.job_min_exp>=".$can_exp." and j.job_max_exp<=".$can_exp.") ";

		}*/

		if($where != '') {

			$where = "(".$where.")";

		}

		$query=$this->db->query("select distinct(jp.job_id), j.job_id from ".$this->table_jpost." jp left join ".$this->table_job." j on j.job_id=jp.job_id where ".$where." and j.job_status=1 order by j.job_id desc");

		

		return $query->num_rows();

    }

	

	public function get_record($can_skill_list, $can_ind, $can_farea, $can_exp)

    {	

		$where = "";

		for($i=0; $i<count($can_skill_list); $i++) {

			if($i>0) { $where = $where." or ";}

			$where = $where."j.job_skills LIKE '%".$can_skill_list[$i]."' ";

		}

		

		if($can_ind != '') {

			$indname = $this->get_ind_name($can_ind);

			if(!empty($indname)) {

				if($where =='') {

					$where = $where." j.job_industry ='".$indname['ind_display']."' ";

				} else {

					$where = $where."or j.job_industry ='".$indname['ind_display']."' ";

				}

			}

		}

		

		if($can_farea != '') {

			if($where =='' ) {

				$where = $where." j.job_farea =".$can_farea." ";

			} else {

				$where = $where."or j.job_farea =".$can_farea." ";

			}

		}

		/*if($can_exp != '') {

			$where = $where."or (j.job_min_exp>=".$can_exp." and j.job_max_exp<=".$can_exp.") ";

		}*/

		if($where != '') {

			$where = "(".$where.")";

		}

       	$query=$this->db->query("select distinct(jp.job_id), j.hire_jobid, j.job_url_id, j.job_title, j.job_location, j.job_min_exp, j.job_max_exp, j.job_min_sal, j.job_max_sal, j.job_industry, j.job_farea, j.job_role, j.job_edu, j.job_edu_spec, j.job_skills, j.job_company, j.job_desc, j.job_type, j.job_noprofiles, j.job_created_dt, j.job_created_by, j.job_updated_dt, e.deg_type_display, f.jfun_display, ind.ind_display, jr.jrole_display, emp.emp_comp_name, emp.emp_fname, emp.emp_jobportal, miexp.exp_display as minexp, maexp.exp_display as maxexp, (select count(ja.ja_id) from ".$this->table_apply." ja where ja.job_id=j.job_id and ja.can_id=".$this->session->userdata('cand_chid').") as job_applycount from ".$this->table_jpost." jp left join ".$this->table_job." j on j.job_id=jp.job_id left join ".$this->table_ind." ind on ind.ind_id = j.job_industry left join ".$this->table_edu." e on e.deg_type_id = j.job_edu left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_jrole." jr on jr.jrole_id = j.job_role left join ".$this->table_exp." miexp on miexp.exp_id = j.job_min_exp left join ".$this->table_exp." maexp on maexp.exp_id = j.job_max_exp left join ".$this->table_emp." emp on emp.emp_id = j.job_created_by where ".$where." and j.job_status=1 order by j.job_id desc");

		

		//$query=$this->db->query("select jp.job_id, j.hire_jobid, j.job_url_id, j.job_title, j.job_location, j.job_min_exp, j.job_max_exp, j.job_min_sal, j.job_max_sal, j.job_industry, j.job_farea, j.job_role, j.job_edu, j.job_edu_spec, j.job_skills, j.job_company, j.job_desc, j.job_type, j.job_noprofiles, j.job_created_dt, j.job_updated_dt, j.job_created_by, j.job_notifyemail, j.job_site, j.job_notes, j.job_status, e.deg_type_display as edu_name, f.jfun_display as fun_name, miexp.exp_display as minexp, maexp.exp_display as maxexp, emp.emp_comp_name, emp.emp_fname, emp.emp_jobportal, emp.emp_desc, emp.emp_email  from ".$this->table_jpost." jp left join ".$this->table_job." j on j.job_id=jp.job_id left join ".$this->table_edu." e on e.deg_type_id = j.job_edu left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_exp." miexp on miexp.exp_id = j.job_min_exp left join ".$this->table_exp." maexp on maexp.exp_id = j.job_max_exp left join ".$this->table_emp." emp on emp.emp_id = j.job_created_by where j.job_status!=0 and jp.jp_id=4");

		



		if ($query->num_rows() > 0)

		{

			foreach ($query->result() as $row)

			{

				$data[] = $row;

			}

			return $data;

		}

		return false;

    }

	

	public function adv_record_count($jtitle, $minexp, $maxexp, $location, $monsal, $industry, $farea, $jrole, $skillval, $edu) 

	{

		$where1 = '';

		$where2 = '';

		$where3 = '';

		$where4 = '';

		$where5 = '';

		$where6 = '';

		$where7 = '';

		$where8 = '';

		$where9 = '';

		$where10 = '';

		if($monsal != ''){

			$monthlysal = explode('~',$monsal);

			$min_sal = $monthlysal[0];

			$max_sal = $monthlysal[1];

		} else {

			$min_sal = 0;

			$max_sal = 50000;

		}

		if($jtitle != '') {

			$jtitle = $this->db->escape('%'.$jtitle.'%');

			$where1 = " AND (j.job_title LIKE ".$jtitle." OR j.job_skills LIKE ".$jtitle." OR f.jfun_display LIKE ".$jtitle." OR ind.ind_display LIKE ".$jtitle.")";

		}

		

		if($location != '') {

			$where2 .= " AND (";

			foreach ($location as $lvalue) {

				$location_val = $this->db->escape('%'.$lvalue.'%');

				$where2 .= "j.job_location LIKE ".$location_val." OR ";

		  	}

			$where2 = rtrim($where2," OR ");

			$where2 .= ")";

		}

		

		if($minexp == '') {

			$minexp=0;

		}		

		if($maxexp == '') {

			$maxexp=99;

		}

		

		$where3 = " AND j.job_min_exp >= ".$minexp;		

		$where4 = " AND j.job_max_exp <= ".$maxexp;

		$where5 = " AND j.job_min_sal >= ".$min_sal." AND j.job_max_sal <= ".$max_sal;

		

		if($industry != '') {

			$industry = explode(',',$industry);

			$where6 .= " AND (";

			foreach ($industry as $Invalue) {

				$ind_val = $this->db->escape('%'.$Invalue.'%');

				$where6 .= "j.job_industry LIKE ".$ind_val." OR ";

		  	}

			$where6 = rtrim($where6," OR ");

			$where6 .= ")";

		}

		

		if($farea != '') {

			$where7 = " AND j.job_farea = ".$farea;

		}

		

		if($jrole != '') {

			$jrole = explode(',',$jrole);

			$where8 .= " AND (";

			foreach ($jrole as $jrvalue) {

				$jr_val = $this->db->escape('%'.$jrvalue.'%');

				$where8 .= "j.job_role LIKE ".$jr_val." OR ";

		  	}

			$where8 = rtrim($where8," OR ");

			$where8 .= ")";

		}

		

		if($skillval != '') {

			$skillval = explode(',',$skillval);

			$where9 .= " AND (";

			foreach ($skillval as $skvalue) {

				$sk_val = $this->db->escape('%'.$skvalue.'%');

				$where9 .= "j.job_skills LIKE ".$sk_val." OR ";

		  	}

			$where9 = rtrim($where9," OR ");

			$where9 .= ")";

		}

		

		if($edu != '') {

			$where10 = " AND j.job_edu = ".$edu;

		}

		

		$query=$this->db->query("select distinct(jp.job_id), j.job_id from ".$this->table_jpost." jp left join ".$this->table_job." j on j.job_id=jp.job_id left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_ind." ind on ind.ind_id = j.job_industry  where j.job_status=1 ".$where1.$where2.$where3.$where4.$where5.$where6.$where7.$where8.$where9.$where10." order by j.job_id desc");

		

		//"select distinct(jp.job_id), j.job_id from ch_jobpost jp left join ch_jobs j on j.job_id=jp.job_id left join enum_job_function f on f.jfun_id = j.job_farea left join enum_industry ind on ind.ind_id = j.job_industry where j.job_status=1 AND (j.job_title LIKE '%Php developer%' OR j.job_skills LIKE '%Php developer%' OR f.jfun_display LIKE '%Php developer%' OR ind.ind_display LIKE '%Php developer%') AND (j.job_location LIKE '%India%' OR j.job_location LIKE '%Kuwait%' OR j.job_location LIKE '%United Arab Emirates%') AND j.job_min_exp >= 3 AND j.job_max_exp <= 9 AND j.job_min_sal >= 1500 AND j.job_max_sal <= 2000 AND (j.job_industry LIKE '%Information Technology%' OR j.job_industry LIKE '%IT%' OR j.job_industry LIKE '%Telecommunications%') AND j.job_farea = 6 AND (j.job_role LIKE '%Developer%' OR j.job_role LIKE '%Enginner%') AND (j.job_skills LIKE '%php%' OR j.job_skills LIKE '%mysql%') AND j.job_edu = 4 order by j.job_id desc";

		

		return $query->num_rows();

    }

	

	public function get_adv_record($jtitle, $minexp, $maxexp, $location, $monsal, $industry, $farea, $jrole, $skillval, $edu) 

	{

		$where1 = '';

		$where2 = '';

		$where3 = '';

		$where4 = '';

		$where5 = '';

		$where6 = '';

		$where7 = '';

		$where8 = '';

		$where9 = '';

		$where10 = '';

		if($monsal != ''){

			$monthlysal = explode('~',$monsal);

			$min_sal = $monthlysal[0];

			$max_sal = $monthlysal[1];

		} else {

			$min_sal = 0;

			$max_sal = 50000;

		}

		if($jtitle != '') {

			$jtitle = $this->db->escape('%'.$jtitle.'%');

			$where1 = " AND (j.job_title LIKE ".$jtitle." OR j.job_skills LIKE ".$jtitle." OR f.jfun_display LIKE ".$jtitle." OR ind.ind_display LIKE ".$jtitle.")";

		}

		

		if($location != '') {

			$where2 .= " AND (";

			foreach ($location as $lvalue) {

				$location_val = $this->db->escape('%'.$lvalue.'%');

				$where2 .= "j.job_location LIKE ".$location_val." OR ";

		  	}

			$where2 = rtrim($where2," OR ");

			$where2 .= ")";

		}

		

		if($minexp == '') {

			$minexp=0;

		}		

		if($maxexp == '') {

			$maxexp=99;

		}

		

		$where3 = " AND j.job_min_exp >= ".$minexp;		

		$where4 = " AND j.job_max_exp <= ".$maxexp;

		$where5 = " AND j.job_min_sal >= ".$min_sal." AND j.job_max_sal <= ".$max_sal;

		

		if($industry != '') {

			$industry = explode(',',$industry);

			$where6 .= " AND (";

			foreach ($industry as $Invalue) {

				$ind_val = $this->db->escape('%'.$Invalue.'%');

				$where6 .= "j.job_industry LIKE ".$ind_val." OR ";

		  	}

			$where6 = rtrim($where6," OR ");

			$where6 .= ")";

		}

		

		if($farea != '') {

			$where7 = " AND j.job_farea = ".$farea;

		}

		

		if($jrole != '') {

			$jrole = explode(',',$jrole);

			$where8 .= " AND (";

			foreach ($jrole as $jrvalue) {

				$jr_val = $this->db->escape('%'.$jrvalue.'%');

				$where8 .= "j.job_role LIKE ".$jr_val." OR ";

		  	}

			$where8 = rtrim($where8," OR ");

			$where8 .= ")";

		}

		

		if($skillval != '') {

			$skillval = explode(',',$skillval);

			$where9 .= " AND (";

			foreach ($skillval as $skvalue) {

				$sk_val = $this->db->escape('%'.$skvalue.'%');

				$where9 .= "j.job_skills LIKE ".$sk_val." OR ";

		  	}

			$where9 = rtrim($where9," OR ");

			$where9 .= ")";

		}

		

		if($edu != '') {

			$where10 = " AND j.job_edu = ".$edu;

		}

		

		//$query=$this->db->query("select distinct(jp.job_id), j.job_id from ".$this->table_jpost." jp left join ".$this->table_job." j on j.job_id=jp.job_id left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_ind." ind on ind.ind_id = j.job_industry  where j.job_status=1 ".$where1.$where2.$where3.$where4.$where5.$where6.$where7.$where8.$where9.$where10." order by j.job_id desc");

		

		$query=$this->db->query("select distinct(jp.job_id), j.hire_jobid, j.job_url_id, j.job_title, j.job_location, j.job_min_exp, j.job_max_exp, j.job_min_sal, j.job_max_sal, j.job_industry, j.job_farea, j.job_role, j.job_edu, j.job_edu_spec, j.job_skills, j.job_company, j.job_desc, j.job_type, j.job_noprofiles, j.job_created_dt, j.job_created_by, j.job_updated_dt, e.deg_type_display, f.jfun_display, ind.ind_display, jr.jrole_display, emp.emp_comp_name, emp.emp_fname, emp.emp_jobportal, miexp.exp_display as minexp, maexp.exp_display as maxexp, (select count(ja.ja_id) from ".$this->table_apply." ja where ja.job_id=j.job_id and ja.can_id=".$this->session->userdata('cand_chid').") as job_applycount from ".$this->table_jpost." jp left join ".$this->table_job." j on j.job_id=jp.job_id left join ".$this->table_ind." ind on ind.ind_id = j.job_industry left join ".$this->table_edu." e on e.deg_type_id = j.job_edu left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_jrole." jr on jr.jrole_id = j.job_role left join ".$this->table_exp." miexp on miexp.exp_id = j.job_min_exp left join ".$this->table_exp." maexp on maexp.exp_id = j.job_max_exp left join ".$this->table_emp." emp on emp.emp_id = j.job_created_by where j.job_status=1 ".$where1.$where2.$where3.$where4.$where5.$where6.$where7.$where8.$where9.$where10." order by j.job_id desc");

		

		//$query=$this->db->query("select jp.job_id, j.hire_jobid, j.job_url_id, j.job_title, j.job_location, j.job_min_exp, j.job_max_exp, j.job_min_sal, j.job_max_sal, j.job_industry, j.job_farea, j.job_role, j.job_edu, j.job_edu_spec, j.job_skills, j.job_company, j.job_desc, j.job_type, j.job_noprofiles, j.job_created_dt, j.job_updated_dt, j.job_created_by, j.job_notifyemail, j.job_site, j.job_notes, j.job_status, e.deg_type_display as edu_name, f.jfun_display as fun_name, miexp.exp_display as minexp, maexp.exp_display as maxexp, emp.emp_comp_name, emp.emp_fname, emp.emp_jobportal, emp.emp_desc, emp.emp_email  from ".$this->table_jpost." jp left join ".$this->table_job." j on j.job_id=jp.job_id left join ".$this->table_edu." e on e.deg_type_id = j.job_edu left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_exp." miexp on miexp.exp_id = j.job_min_exp left join ".$this->table_exp." maexp on maexp.exp_id = j.job_max_exp left join ".$this->table_emp." emp on emp.emp_id = j.job_created_by where j.job_status!=0 and jp.jp_id=4");

		



		if ($query->num_rows() > 0)

		{

			foreach ($query->result() as $row)

			{

				$data[] = $row;

			}

			return $data;

		}

		return false;

    }

	

	public function get_single_record($jid=null)

	{

		$query=$this->db->query("select j.job_id, j.hire_jobid, j.job_url_id, j.job_title, j.job_location, j.job_min_exp, j.job_max_exp, j.job_min_sal, j.job_max_sal, j.job_industry, j.job_farea, j.job_role, j.job_edu, j.job_edu_spec, j.job_skills, j.job_company, j.job_desc, j.job_type, j.job_noprofiles, j.job_created_dt, j.job_updated_dt, j.job_created_by, j.job_notifyemail, j.job_expaired, j.job_site, j.job_notes, j.job_status, e.deg_type_display as edu_name, f.jfun_display as fun_name, miexp.exp_display as minexp, maexp.exp_display as maxexp, emp.emp_comp_name, emp.emp_fname, emp.emp_jobportal, emp.emp_desc, emp.emp_email, (select count(ja.ja_id) from ".$this->table_apply." ja where ja.job_id=j.job_id and ja.can_id=".$this->session->userdata('cand_chid').") as job_applycount  from ".$this->table_job." j left join ".$this->table_edu." e on e.deg_type_id = j.job_edu left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_exp." miexp on miexp.exp_id = j.job_min_exp left join ".$this->table_exp." maexp on maexp.exp_id = j.job_max_exp left join ".$this->table_emp." emp on emp.emp_id = j.job_created_by where j.job_url_id='".$jid."'");

		

		return $query->row_array();

	}	

	

	

	public function apply_count_list($jid=null) 

	{

		$query=$this->db->query("select a.ja_source, COUNT(a.ja_source) as total, s.cvs_name from ".$this->table_apply." a left join ".$this->table_cvsource." s on s.cvs_id = a.ja_source where a.job_id=".$jid." group by a.ja_source order by total desc");



		if ($query->num_rows() > 0)

		{

			foreach ($query->result() as $row)

			{

				$data[] = $row;

			}

			return $data;

		}

		return false;

    }

	

	public function get_country()

    {	

       	$query=$this->db->query("select co_id, co_code, co_name from ".$this->table_country." order by co_name asc");



		$country_list = $query->result();

		$dropDownList['']='Job Location';

		foreach($country_list as $dropdown)

		{

			$dropDownList[$dropdown->co_id] = $dropdown->co_name;

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

			$dropDownList[$dropdown->co_id] = $dropdown->co_nationality;

		}

		return $dropDownList;

    }

	

	public function get_edu()

    {	

       	$query=$this->db->query("select deg_type_id, deg_type_display from ".$this->table_edu." order by deg_type_duration asc");



		$edu_list = $query->result();

		$dropDownList['']='Educational Qualification';

		foreach($edu_list as $dropdown)

		{

			$dropDownList[$dropdown->deg_type_id] = $dropdown->deg_type_display;

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

	

	public function get_industry_list()

    {	

       	$query=$this->db->query("select ind_id, ind_display from ".$this->table_ind." order by ind_display asc");



		$ind_list = $query->result();

		$dropDownList['']='Industry';

		foreach($ind_list as $dropdown)

		{

			$dropDownList[$dropdown->inind_displayd_id] = $dropdown->ind_display;

		}

		return $dropDownList;

    }

	

	public function get_ind_list()

    {	

    	$term = $this->input->post('term');

       	$query = $this->db->query("select ind_id, ind_display from ".$this->table_ind." where ind_display like '".$term."%'  order by ind_display asc");

		$ind_list = $query->result();

		return json_encode($ind_list);

    }

	

	public function get_ind_name($term=null)

    {	

       	$query = $this->db->query("select ind_display from ".$this->table_ind." where ind_id = ".$term);

		return $query->row_array();

    }

	

	public function get_industry()

    {	

       	$query=$this->db->query("select ind_id, ind_display from ".$this->table_ind." order by ind_display asc");



		$ind_list = $query->result();

		foreach($ind_list as $dropdown)

		{

			$dropDownList[$dropdown->ind_display] = $dropdown->ind_display;

		}

		return $dropDownList;

    }

	

	public function get_jobrole()

    {

		$query=$this->db->query("select jrole_id, jrole_display from ".$this->table_jrole." order by jrole_display asc");



		$jr_list = $query->result();

		//$dropDownList['']='Job Role';

		foreach($jr_list as $dropdown)

		{

			$dropDownList[$dropdown->jrole_display] = $dropdown->jrole_display;

		}

		return $dropDownList;

    }

	

    public function get_jobrole_list()

    {

    	$term = $this->input->post('term');

		$query = $this->db->query("select jrole_id, jrole_display from ".$this->table_jrole." where jrole_display like '".$term."%'  order by jrole_display asc");

		$jr_list = $query->result();		

		return json_encode($jr_list);

    }

	

	public function getsalary_list()

	{

		$dropDownList['']='Monthly Salary';

		$dropDownList['0~0']='Unspecified';

		$j = 0;

		for($i=500; $i<=2000; $i=$i+500)

		{

			$dropDownList[$j.'~'.$i] = '$'.$j.' ~ $'.$i;

			$j = $i;

		}

		

		for($i=$j+1000; $i<=10000; $i=$i+1000)

		{

			$dropDownList[$j.'~'.$i] = '$'.$j.' ~ $'.$i;

			$j = $i;

		}

		$dropDownList['10000~15000']='$10000 ~ $15000';

		$dropDownList['15000~30000']='$15000 ~ $30000';

		$dropDownList['30000~50000']='$30000 ~ $50000';

		return $dropDownList;

	}

	

	public function get_skill()

    {

		$query=$this->db->query("select skillarea_id, skillarea_display from ".$this->table_skill." order by skillarea_display asc");



		$skill_list = $query->result();

		foreach($skill_list as $dropdown)

		{

			$dropDownList[$dropdown->skillarea_display] = $dropdown->skillarea_display;

		}

		return json_encode($dropDownList);

    }

    

    public function get_skill_list()

    {

    	$term = $this->input->post('term');

		$query = $this->db->query("select skillarea_id, skillarea_display from ".$this->table_skill." where skillarea_display like '".$term."%' order by skillarea_display asc");

		$skill_list = $query->result();

		return json_encode($skill_list);

    }



    public function get_minexp()

    {

		$query=$this->db->query("select exp_id, exp_display from ".$this->table_exp." order by exp_id asc");



		$exp_list = $query->result();

		$dropDownList['']='Min Exp';

		foreach($exp_list as $dropdown)

		{

			$dropDownList[$dropdown->exp_id] = $dropdown->exp_display;

		}

		return $dropDownList;

    }

	

	public function get_maxexp()

    {

		$query=$this->db->query("select exp_id, exp_display from ".$this->table_exp." order by exp_id asc");



		$exp_list = $query->result();

		$dropDownList['']='Max Exp';

		foreach($exp_list as $dropdown)

		{

			$dropDownList[$dropdown->exp_id] = $dropdown->exp_display;

		}

		return $dropDownList;

    }

	

	public function get_minexp_inc()

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

	

	public function get_maxexp_inc()

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

	

	public function get_minsal()

    {	

		$dropDownList['']='Min Salary';

		$dropDownList['0']='00 Thousands';

		for($i=100; $i<=5000; $i=$i+100)

		{

			$dropDownList[$i] = $i;

		}

		$dropDownList['5000+']='5000+';

		return $dropDownList;

    }

	

	public function get_maxsal()

    {	

		$dropDownList['']='Max Salary';

		$dropDownList['0']='00 Thousands';

		for($i=500; $i<=9500; $i=$i+500)

		{

			$dropDownList[$i] = $i;

		}

		$dropDownList['9500+']='9500+';

		return $dropDownList;

    }



    

	public function applyjob($jid=null)

    {

		if($jid) {

			$jadata = array(

				'job_id'=>$jid,

				'can_id'=>$this->session->userdata('cand_chid'),

				'ja_source'=>5,

				'ja_date'=>date("Y-m-d H:i:s"),

				'ja_status'=>1

			);

			$this->db->insert($this->table_apply, $jadata);

			$insert_jaid = $this->db->insert_id();

			

			$ja_encrypt_id = md5($insert_jaid);

			$ja_data=array(

				'ja_encrypt_id'=>$ja_encrypt_id,

			);

			$this->db->where('ja_id', $insert_jaid);

			$this->db->update($this->table_apply, $ja_data);

			

			return $ja_encrypt_id;

		} else {

			return '0';	

		}		

    }

	

	public function formatedjobid($jobId=null)

	{

		$outputJobId = $jobId;

		// format the job id

		if ($outputJobId<100000) {

			$outputJobId = "0" . $outputJobId;

			if ($outputJobId<10000) {

				$outputJobId = "0" . $outputJobId;

				if ($outputJobId<1000) {

					$outputJobId = "0" . $outputJobId;

					if ($outputJobId<100) {

						$outputJobId = "0" . $outputJobId;

						if ($outputJobId<10) {

							$outputJobId = "0" . $outputJobId;

						}// end if

					}// end if

				}// end if

			}// end if

		}// end if

		

		$outputJobId = "CH" . $outputJobId;

		

		return $outputJobId;

	}

	public function saved($jid)
	{
		$this->db->where('job_id',$jid);
		return $this->db->get('ch_can_savejobs')->row_array();
	}

	/**
	 * Check the apply posiblity
	 */
	public function subscriptionPosible($jid)
		{	
			$this->db->where('can_id', $jid);
			$this->db->where('csub_expire_dt >= ', date('Y-m-d h:i:s'));
			$this->db->select_sum('csub_nojobs');
			$query = $this->db->get('ch_can_subscribe')->row();
			return 	$query;		 
		}
	
	/**
	* decreez id
	*/
	public function dcrjobs_count($user)
	{
		
		$this->db->select_min('csub_expire_dt');
		$this->db->where('can_id', $user);
		$this->db->where('csub_nojobs > ', 0);
		$this->db->where('csub_expire_dt >= ', date('Y-m-d h:i:s'));
		$query = $this->db->get('ch_can_subscribe')->row();
		$this->decreez($query);
		return true;
	}

	/**
	 * decreez value
	 */
	function decreez($query)
	{
		$this->db->where('csub_expire_dt', $query->csub_expire_dt);
		$this->db->set('csub_nojobs', 'csub_nojobs-1', FALSE);
		$this->db->update('ch_can_subscribe');
		return true;
	
	}
}