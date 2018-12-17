<?php 
class Jobportalmodel extends CI_Model {

	var $table_emp 				= '';
	var $table_job 				= '';
	var $table_country 			= '';
	var $table_farea 			= '';
	var $table_edu 				= '';
	var $table_edu_spec 		= '';
	var $table_ind 				= '';
	var $table_jrole 			= '';
	var $table_jrole_grp 		= '';
	var $table_candidate 		= '';
	var $table_cv 				= '';
	var $table_smedia 			= '';
	var $table_apply 			= '';
	var $table_skill 			= '';
	var $table_exp 				= '';
	var $table_cpwd 			= '';
	var $table_jpost 			= '';
	var $table_can_subscribe 	= '';
	

    public function __construct()
    {	
		ini_set('memory_limit', '-1');
		$this->table_emp 			= 'ch_employer';
		$this->table_job 			= 'ch_jobs';
		$this->table_country 		= 'ch_country';
		$this->table_farea 			= 'enum_job_function';
		$this->table_edu 			= 'enum_degree_type';
		$this->table_edu_spec 		= 'ch_edu_spec';
		$this->table_ind 			= 'enum_industry';
		$this->table_jrole 			= 'enum_role';
		$this->table_jrole_grp 		= 'ch_jobrole_group';
		$this->table_jpost 			= 'ch_jobpost';
		$this->table_candidate 		= 'ch_candidate';
		$this->table_can_subscribe 	= 'ch_can_subscribe';
		$this->table_cv 			= 'ch_cv';
		$this->table_smedia 		= 'ch_socialmedia';
		$this->table_apply 			= 'ch_jobapply';
		$this->table_skill 			= 'enum_skill_area';
		$this->table_exp 			= 'enum_experience';
		$this->table_cpwd 			= 'ch_cpwd_reset';
    }
	
	function candlogin($username, $password)
	{
		$this->db->select('can_id, can_fname, can_lname, can_email, can_hash');
		$this->db->from($this->table_candidate);
		$this->db->where('can_email', $username);
		$this->db->where('can_password', MD5($password));
		$this->db->where('can_status', 1);
		$this->db->limit(1);
		
		$query = $this->db->get();
		if($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	function cand_fdetails($username)
	{
		$this->db->select('can_id, can_fname, can_lname, can_email');
		$this->db->from($this->table_candidate);
		$this->db->where('can_email', $username);
		$this->db->where('can_status', 1);
		$this->db->limit(1);

		$query = $this->db->get();
		if($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
	public function get_emp_record($eid=null)
	{
		$query=$this->db->query("select emp_id,emp_comp_name,emp_jobportal, emp_email, emp_fname, emp_desc from ".$this->table_emp." where emp_id='".$eid."'");
		return $query->row_array();
	}

	public function record_count_all($jtitle='',$minexp=0,$maxexp=99,$location='') 
	{
		$where1 = '';
		$where2 = '';
		if($jtitle != '') {
			$jtitle = $this->db->escape('%'.$jtitle.'%');
			$where1 = "job_title LIKE ".$jtitle;
		}
		
		if($location != '') {
			$where2 .= "(";
			foreach ($location as $lvalue) {
				$location_val = $this->db->escape('%'.$lvalue.'%');
				$where2 .= "job_location LIKE ".$location_val." OR ";
		  	}
			$where2 = rtrim($where2," OR ");
			$where2 .= ")";
		}
		
		if($minexp == '') {
			$minexp = 0;
		}
		
		if($maxexp == '') {
			$maxexp = 99;
		}
		
		$this->db->select("job_id");
		$this->db->from($this->table_job);
		$this->db->where("job_status", 1);
		if($where1 != '') {
			$this->db->where($where1);
		}
		$this->db->where("job_min_exp >=", $minexp);
		$this->db->where("job_max_exp <=", $maxexp);
		if($where2 != '') {;
			$this->db->where($where2);
		}
		return $this->db->count_all_results();
    }
	
	public function record_count($jtitle='',$minexp=0,$maxexp=99,$location='')
    {
		$where1 = '';
		$where2 = '';
		$where3 = '';
		$where4 = '';
		if($jtitle != '') {
			$jtitle = $this->db->escape('%'.$jtitle.'%');
			$where1 = " AND (j.job_title LIKE ".$jtitle." OR j.job_skills LIKE ".$jtitle." OR jfun_display LIKE ".$jtitle." OR ind.ind_display LIKE ".$jtitle.")";
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
			$minexp = 0;
		}
		
		if($maxexp == '') {
			$maxexp = 99;
		}
		
		$where3 = " and j.job_min_exp >= ".$minexp;		
		$where4 = " and j.job_max_exp <= ".$maxexp;
		
    	$canid = ($this->session->userdata('cand_chid'))?$this->session->userdata('cand_chid'):0;
       	$query = $this->db->query("select distinct(jp.job_id), j.job_url_id, j.job_title, j.job_location, j.job_min_exp as minexp, j.job_max_exp as maxexp, j.job_min_sal, j.job_max_sal, j.job_industry, j.job_farea, j.job_role, j.job_edu, j.job_edu_spec, j.job_skills, j.job_company, j.job_desc, j.job_type, j.job_created_dt, j.job_created_by, e.deg_type_display, f.jfun_display, ind.ind_display, jr.jrole_display, emp.emp_comp_name, emp.emp_fname, (select count(ja.ja_id) from ".$this->table_apply." ja where ja.job_id=j.job_id and ja.can_id=".$canid.") as job_applycount  from ".$this->table_jpost." jp left join ".$this->table_job." j on j.job_id=jp.job_id left join ".$this->table_ind." ind on ind.ind_id = j.job_industry left join ".$this->table_edu." e on e.deg_type_id = j.job_edu left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_jrole." jr on jr.jrole_id = j.job_role left join ".$this->table_emp." emp on emp.emp_id = j.job_created_by where j.job_status=1 and j.job_site=1 ". $where1.$where2.$where3.$where4." order by j.job_id desc");

		return $query->num_rows();
    }


    public function get_record($jtitle=null,$shrt=null,$funarea=null,$location=null,$jtype=null,$sal=null,$expr=null)
    {
    	$now = date('Y-m-d');

    	$this->db->select('job_url_id, job_updated_dt, hire_status, job_title, job_location, job_min_exp as minexp, job_max_exp as maxexp, job_min_sal, job_max_sal, job_industry, job_farea, job_role, job_edu, job_edu_spec, job_skills, job_company, job_desc, job_expaired, job_type, job_created_dt, job_created_by,fun_name as jfun_display ');
    	$this->db->from('ch_jobs');
    	$this->db->join ( 'ch_funarea', 'ch_funarea.fun_id = ch_jobs.job_farea' , 'left' );
    	$this->db->join ( 'enum_experience',   'enum_experience.exp_id = ch_jobs.job_max_exp' , 'left' );
    	$this->db->join ( 'ch_jobapply',       'ch_jobapply.job_id = ch_jobs.job_id' , 'left' );
    	$this->db->join ( 'enum_industry',     'enum_industry.ind_id = ch_jobs.job_industry' , 'left' );

    	/************************ title filter *************************/
		/*function area filtering */
			foreach ($funarea as $key => $value) {
				if(!empty($funarea[$key])) {
					$this->db->where('ch_jobs.job_farea',$value);
				}
			}

		/*location filtering */
			foreach ($location as $key => $value) {
				if(!empty($location[$key])) {
					$this->db->where('ch_jobs.job_location',$value);
				}
			}

		/* Job types filtering */
		
			if (!empty($jtype) && $jtype != 'all') {

				$this->db->where('ch_jobs.job_type',$jtype);
			}
			if($jtype == 'all'){
				
				$this->db->or_where_not_in('ch_jobs.job_type ','');
			}

			/* sal filter */

			if (!empty($sal)) {
				$monthlysal = explode('~',$sal);
				$min_sal = $monthlysal[0];
				$max_sal = $monthlysal[1];

				$this->db->where('ch_jobs.job_min_sal >=',$min_sal);
				$this->db->where('ch_jobs.job_max_sal <=',$max_sal);
			}
		

    	/* post date shorting */
    	if(!empty($shrt['pstany']) == 'pstany'){}
		elseif(!empty($shrt['pstmont']) == 'pstmont'){
			$month  =  date('Y-m-d', strtotime("-30 day"));
			$this->db->where('ch_jobs.job_updated_dt >=', $month);
			$this->db->where('ch_jobs.job_updated_dt <=', $now);
		}
		elseif(!empty($shrt['pstweek']) == 'pstweek' ){
			$week  =  date('Y-m-d', strtotime("-7 day"));
			$this->db->where('ch_jobs.job_updated_dt >=', $week);
			$this->db->where('ch_jobs.job_updated_dt <=', $now);
		}
		elseif(!empty($shrt['pst24']) == 'pst24'){
			$oneday  =  date('Y-m-d', strtotime("-1 day"));
			$this->db->where('ch_jobs.job_updated_dt >=', $oneday);
			$this->db->where('ch_jobs.job_updated_dt <=', $now);
		}/* end  post date shorting */


		/*fnction experiance shorting*/
		if (!empty($expr)) {
			$exp = explode(',', $expr);
			$minex = $exp[0]; 
			$maxex = $exp[1]; 
			$this->db->where('ch_jobs.job_min_exp >=',$minex);
			$this->db->where('ch_jobs.job_max_exp <=',$maxex);
		}
		if(!empty($jtitle))
			{
				$this->db->group_start();
					$this->db->like('job_title', $jtitle);
					$this->db->or_like('job_skills', $jtitle);
					$this->db->or_like('jfun_display', $jtitle);
					$this->db->or_like('ind_display', $jtitle);
				$this->db->group_end();
			}
    	// $this->db->where('ch_jobs.hire_status','success');
    	$this->db->where('ch_jobs.job_site','1');
    	$this->db->where('ch_jobs.job_status','1');

    	$this->db->distinct();
    	$this->db->order_by('ch_jobs.job_id','desc');
    	$query = $this->db->get();
    	if($query->num_rows() > 0){
			foreach ($query->result() as $row){
				$data[] = $row;
			}
			return $data;
		}
		return false;
    }







	public function get_record1($jtitle='',$minexp=0,$maxexp=99,$location='',$shrt=null,$funarea=null)
    {
    	
		$where1 = '';
		$where2 = '';
		$where3 = '';
		$where4 = '';
		$where5 = '';
		$where6 = "";
		$where7 = "";
		$where8 = "";
		$now = date('Y-m-d');
		if($jtitle != '') {
			$jtitle = $this->db->escape('%'.$jtitle.'%');
			$where1 = " AND (j.job_title LIKE ".$jtitle." OR j.job_skills LIKE ".$jtitle." OR jfun_display LIKE ".$jtitle." OR ind.ind_display LIKE ".$jtitle.")";
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
			$minexp = 0;
		}
		
		if($maxexp == '') {
			$maxexp = 99;
		}

		/* short date */

		if(!empty($shrt['pstany']) == 'pstany')
		{
			
			$where5 = " ";
			$where6 = " ";
		}

		elseif(!empty($shrt['pstmont']) == 'pstmont')
		{
			$month  =  date('Y-m-d', strtotime("-30 day"));
			$where5 = " AND j.job_updated_dt >= ".$now;
			$where6 = " AND j.job_updated_dt <= ".$month;
		}
		elseif(!empty($shrt['pstweek']) == 'pstweek' ) {
			$week  =  date('Y-m-d', strtotime("-7 day"));
			$where5 = " AND j.job_updated_dt >= ".$now;
			$where6 = " AND j.job_updated_dt <= ".$week;
		}
		elseif(!empty($shrt['pst24']) == 'pst24') {
			
			$oneday  =  date('Y-m-d', strtotime("-1 day"));
			
			$where5 = " AND j.job_updated_dt >= ".$now;
			$where6 = " AND j.job_updated_dt <= ".$oneday;
		}

			
			
		/* filter function area */
		
		if(!empty($funarea)) {
			$prefix = $fra = '';
			foreach ($funarea as $valuee) {
				$fra .= $prefix . $valuee;
				$prefix = ', ';
				
			}
			// $fra=array_map('intval', explode(',', $fra));
			// $fra = implode("','",$fra);
			$fra= implode(',', array_map('intval', explode(',', $fra)));
			$where7 = "AND j.job_farea IN ('".$fra."')";
		}
		$where3 = " AND j.job_min_exp >= ".$minexp;		
		$where4 = " AND j.job_max_exp <= ".$maxexp;
		
    	$canid = ($this->session->userdata('cand_chid'))?$this->session->userdata('cand_chid'):0;
       	$query = $this->db->query("
       		select distinct(jp.job_id), 
       		j.job_url_id,
       		j.job_updated_dt,
       		j.hire_status, 
       		j.job_title, 
       		j.job_location, 
       		j.job_min_exp as minexp, 
       		j.job_max_exp as maxexp, 
       		j.job_min_sal, 
       		j.job_max_sal, 
       		j.job_industry, 
       		j.job_farea, 
       		j.job_role, 
       		j.job_edu, 
       		j.job_edu_spec, 
       		j.job_skills, 
       		j.job_company, 
       		j.job_desc, 
       		j.job_type, 
       		j.job_created_dt, 
       		j.job_created_by,
       		e.deg_type_display, 
       		f.jfun_display, 
       		ind.ind_display, 
       		jr.jrole_display,
       		emp.emp_comp_name, 
       		emp.emp_fname, 
       		(select count(ja.ja_id) from 
       		 ".$this->table_apply." ja where ja.job_id=j.job_id and ja.can_id=".$canid.") as 
       		 job_applycount  from ".$this->table_jpost." jp left join 
       		 ".$this->table_job." j on j.job_id=jp.job_id left join 
       		 ".$this->table_ind." ind on ind.ind_id = j.job_industry left join 
       		 ".$this->table_edu." e on e.deg_type_id = j.job_edu left join 
       		 ".$this->table_farea." f on f.jfun_id = j.job_farea left join 
       		 ".$this->table_jrole." jr on jr.jrole_id = j.job_role left join 
       		 ".$this->table_emp." emp on emp.emp_id = j.job_created_by where j.job_status=1 and j.job_site=1 ". $where1.$where2.$where3.$where4.$where5.$where6.$where7.$where8." order by j.job_id desc");

		if ($query->num_rows() > 0){
			foreach ($query->result() as $row){
				$data[] = $row;

			}
			// echo "<pre>";
			// print_r ($data);
			// echo "</pre>";exit;
			return $data;
		}
		return false;
    }
	
	public function get_single_record($jid=null)
	{
		$canid = ($this->session->userdata('cand_chid'))?$this->session->userdata('cand_chid'):0;
		$query = $this->db->query("select j.job_id, j.job_url_id, j.job_title, j.job_location, j.job_min_exp, j.job_max_exp, j.job_min_sal, j.job_max_sal, j.job_industry, j.job_farea, j.job_role, j.job_edu, j.job_edu_spec, j.job_skills, j.job_company, j.job_desc, j.job_type, j.job_created_dt, j.job_updated_dt, j.job_created_by, j.job_notifyemail, j.job_notes, j.job_status, e.deg_type_display as edu_name, f.jfun_display as fun_name, miexp.exp_display as minexp, maexp.exp_display as maxexp, emp.emp_comp_name, emp.emp_fname, emp.emp_jobportal, emp.emp_desc, emp.emp_email, (select count(ja.ja_id) from ".$this->table_apply." ja where ja.job_id=j.job_id and ja.can_id=".$canid.") as job_applycount  from ".$this->table_job." j left join ".$this->table_edu." e on e.deg_type_id = j.job_edu left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_exp." miexp on miexp.exp_id = j.job_min_exp left join ".$this->table_exp." maexp on maexp.exp_id = j.job_max_exp left join ".$this->table_emp." emp on emp.emp_id = j.job_created_by where j.job_url_id='".$jid."'");
		return $query->row_array();
	}
	
	public function get_candidate_record($cid=null)
	{
		$query = $this->db->query("select c.can_id, c.can_encrypt_id, c.can_fname, c.can_lname, c.can_ccode, c.can_phone, c.can_email, c.can_hash, c.can_dob, c.can_gender, c.can_experience,  c.can_curr_company, c.can_curr_loc, c.can_curr_sal, c.can_skills, c.can_alert, c.edu_id, c.co_id, c.fun_id, co.co_name, co.co_nationality, e.deg_type_display as edu_name, f.jfun_display as fun_name, cv.cv_path, cv.cv_cletter from ".$this->table_candidate." c left join ".$this->table_country." co on co.co_id = c.co_id left join ".$this->table_edu." e on e.deg_type_id = c.edu_id left join ".$this->table_farea." f on f.jfun_id = c.fun_id  left join ".$this->table_cv." cv on cv.can_id = c.can_id where c.can_id=".$cid);
		return $query->row_array();
	}
	
	public function change_usr_pwd($cid=null)
	{
		$cdata = array(
			'can_password'=>md5($this->input->post('npwd')),
			'can_hash'=>$this->input->post('npwd'),
			'can_upd_date'=>date('Y-m-d H:i:s'),
		);
		
		$this->db->where('can_id', $cid);
	   	$this->db->update($this->table_candidate, $cdata);
		return 1;
	}
	
	public function insert_record()
	{
		$dob = str_replace('/','-',$this->input->post('dob'));
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
			'can_alert'=>$this->input->post('jobalert'),
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
		$curr_date = date('Y-m-d H:i:s');
		$query=$this->db->query("select job_id from ".$this->table_apply." where job_id=".$jobid." and can_id=".$canid);

		if ($query->num_rows() > 0) {
			//Already applied
			return 0;
			exit();
		} else {
			$subscribe_details = $this->get_csubscribe($canid);
			$tot_job_apply = $this->get_totaljob_apply($canid);
			//if($tot_job_apply > 0 && ($subscribe_details['csub_type'] == 1 || $subscribe_details['csub_expire_dt'] < $curr_date)) {
			if(($tot_job_apply >= $subscribe_details['csub_nojobs'] || $subscribe_details['csub_expire_dt'] < $curr_date) && ($subscribe_details['csub_type'] == 1)) {	
				//Free Account
				return 2;
				exit();
			}
			if(($tot_job_apply >= $subscribe_details['csub_nojobs']) || ($subscribe_details['csub_expire_dt'] < $curr_date)) {	
				//Premium account
				return 3;
				exit();
			}
			$jsdata=array(
				'job_id'=>$jobid,
				'can_id'=>$canid,
				'ja_source'=>$jsrc,
				'ja_date'=>date('Y-m-d H:i:s'),
				'ja_status'=>1,
			);
			$this->db->insert($this->table_apply, $jsdata);
			$insert_jsid = $this->db->insert_id();

			$updata = array(
				'ja_encrypt_id'=>md5($this->encrypt->encode($insert_jsid))
			);
			$this->db->where('ja_id', $insert_jsid);
			$this->db->update($this->table_apply, $updata);
			return $insert_jsid;
		}
	}
	
	public function get_totaljob_apply($cid=null)
	{
		$query = $this->db->query("select job_id from ".$this->table_apply." where can_id=".$cid);
		return $query->num_rows();	
	}
	
	public function get_csubscribe($cid=null)
	{
		$query = $this->db->query("select csub_id, can_id, csub_nojobs, csub_expire_dt, csub_type, csub_status from ".$this->table_can_subscribe." where can_id=".$cid);
		return $query->row_array();	
	}

	public function get_country()
    {	
       	$query 			= $this->db->query("select co_id, co_name, co_nationality from ".$this->table_country." order by co_name asc");
		$country_list 	= $query->result();
		$dropDownList[''] = 'Location';
		foreach($country_list as $dropdown) {
			$dropDownList[$dropdown->co_name] = $dropdown->co_name;
		}
		return $dropDownList;
    }
	
	public function get_nationality()
    {	
       	$query 			= $this->db->query("select co_id, co_name, co_nationality from ".$this->table_country." order by co_name asc");
		$country_list 	= $query->result();
		$dropDownList[''] = 'Nationality';
		foreach($country_list as $dropdown) {
			$dropDownList[$dropdown->co_id] = $dropdown->co_nationality;
		}
		return $dropDownList;
    }
	
	public function get_edu()
    {	
       	$query 		= $this->db->query("select deg_type_id, deg_type_display from ".$this->table_edu." order by deg_type_duration asc");
		$edu_list 	= $query->result();
		$dropDownList[''] = 'Educational Qualification';
		foreach($edu_list as $dropdown) {
			$dropDownList[$dropdown->deg_type_id] = $dropdown->deg_type_display;
		}
		return $dropDownList;
    }
	
	public function get_farea()
    {	
       	$query 		= $this->db->query("select jfun_id, jfun_display from ".$this->table_farea." order by jfun_display asc");
		$fun_list 	= $query->result();
		$dropDownList[''] = 'Functional Area';
		foreach($fun_list as $dropdown) {
			$dropDownList[$dropdown->jfun_id] = $dropdown->jfun_display;
		}
		return $dropDownList;
    }
	
	public function get_industry()
    {	
       	$query 		= $this->db->query("select ind_id, ind_display from ".$this->table_ind." order by ind_display asc");
		$ind_list 	= $query->result();
		$dropDownList[''] = 'Industry';
		foreach($ind_list as $dropdown) {
			$dropDownList[$dropdown->ind_id] = $dropdown->ind_display;
		}
		return $dropDownList;
    }
	
	public function get_jobrole()
    {
		$query 		= $this->db->query("select jrole_id, jrole_display from ".$this->table_jrole." order by jrole_display asc");
		$jr_list 	= $query->result();
		$dropDownList[''] = 'Job Role';
		foreach($jr_list as $dropdown) {
			$dropDownList[$dropdown->jrole_id] = $dropdown->jrole_display;
		}
		return $dropDownList;
    }

    public function get_skill()
    {
		$query 		= $this->db->query("select skillarea_id, skillarea_display from ".$this->table_skill." order by skillarea_display asc");
		$skill_list = $query->result();
		foreach($skill_list as $dropdown) {
			$dropDownList[] = $dropdown->skillarea_display;
		}
		return json_encode($dropDownList);
    }

    public function get_minexp()
    {
		$query 		= $this->db->query("select exp_id, exp_display from ".$this->table_exp." order by exp_id asc");
		$exp_list 	= $query->result();
		$dropDownList['']='Min Experience';
		foreach($exp_list as $dropdown) {
			$dropDownList[$dropdown->exp_id] = $dropdown->exp_display;
		}
		return $dropDownList;
    }

    public function get_maxexp()
    {
		$query 		= $this->db->query("select exp_id, exp_display from ".$this->table_exp." order by exp_id asc");
		$exp_list 	= $query->result();
		$dropDownList[''] 	= 'Max Experience';
		foreach($exp_list as $dropdown) {
			$dropDownList[$dropdown->exp_id] = $dropdown->exp_display;
		}
		return $dropDownList;
    }
	
	public function get_minsal()
    {	
		$dropDownList[''] 	= 'Current Salary';
		$dropDownList['0'] 	= '0 lac';
		for($i=1; $i<=50; $i++) {
			$dropDownList[$i] = $i;
		}
		$dropDownList['50+'] = '50+';
		return $dropDownList;
    }
	
	public function get_maxsal()
    {	
		$dropDownList[''] 	= 'Max Salary';
		$dropDownList['0'] 	= '0 lac';
		for ($i=5; $i<=95; $i=$i+5) {
			$dropDownList[$i] = $i;
		}
		$dropDownList['95+'] = '95+';
		return $dropDownList;
    }

	public function getsalary_list()
	{
		$dropDownList['']	 = 'Monthly Salary';
		$dropDownList['0~0'] = 'Unspecified';
		$j = 0;
		for ($i=500; $i<=2000; $i=$i+500) {
			$dropDownList[$j.'~'.$i] = '$'.$j.' to $'.$i;
			$j = $i;
		}
		
		for ($i=$j+1000; $i<=10000; $i=$i+1000) {
			$dropDownList[$j.'~'.$i] = '$'.$j.' to $'.$i;
			$j = $i;
		}
		$dropDownList['10000~15000']	= '$10000 to $15000';
		$dropDownList['15000~30000']	= '$15000 to $30000';
		$dropDownList['30000~50000']	= '$30000 to $50000';
		return $dropDownList;
	}
	
	public function get_minexp_inc()
    {	
		$dropDownList['']	= 'Min Exp';
		$dropDownList['0']	= '0 Yrs';
		for ($i=1; $i<=30; $i++) {
			$dropDownList[$i] = $i;
		}
		$dropDownList['30+'] = '30+';
		return $dropDownList;
    }
	
	public function get_maxexp_inc()
    {	
		$dropDownList['']	= 'Max Exp';
		$dropDownList['0']	= '0 Yrs';
		for ($i=1; $i<=30; $i++) {
			$dropDownList[$i] = $i;
		}
		$dropDownList['30+'] = '30+';
		return $dropDownList;
    }

    function recover_set($username)
	{
		$this->db->select('can_id, can_encrypt_id, can_fname, can_lname, can_email');
		$this->db->from($this->table_candidate);
		$this->db->where('can_email', $username);
		$this->db->where('can_status', 1);
		$this->db->limit(1);
		$query 	= $this->db->get();
		$result = $query->result();
		if (empty($result)) {
			return 0;	
		}
		
		foreach ($result as $row) {
			$cand_chid 		= $row->can_id;
			$can_encrypt_id = $row->can_encrypt_id;
			$cand_chname 	= $row->can_fname.' '.$row->can_lname;
			$cand_chemail 	= $row->can_email;
		}
		
		if ($cand_chid!='') {
			$autoexp_data = array(
				'cpwd_status'=>2,
			);
			$this->db->where('can_id', $cand_chid);
			$this->db->update($this->table_cpwd, $autoexp_data);
		} else {
			return 0;	
		}
		
		$nowtime 	= time();		
		$vcode 		= md5($this->encrypt->encode($can_encrypt_id).$nowtime);		
		$digits 	= 4;
		$otp 		= str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
		
		$pwd_data=array(
			'can_id'=>$cand_chid,
			'cpwd_vcode'=>$vcode,
			'cpwd_otp'=>$vcode,
			'cpwd_otp'=>$otp,
			'cpwd_reqtime'=>date('Y-m-d H:i:s'),
			'cpwd_status'=>0
		);
		
		$this->db->insert($this->table_cpwd, $pwd_data);
		$insert_pid = $this->db->insert_id();
		
		$work_data1=array(
			'cpwd_encrypt_id'=>md5($insert_pid),
		);
		$this->db->where('cpwd_id', $insert_pid);
	   	$this->db->update($this->table_cpwd, $work_data1);
		
		return $insert_pid;
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
	


}