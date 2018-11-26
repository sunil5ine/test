<?php 
/**
 * Job model for this APP
 * 
 * 
 * @package    CI
 * @subpackage Model
 * @author     Sreejith Gopinath <sreejith@aatoon.com>
 */

class Jobsmodel extends CI_Model {

	var $table_emp 			= '';
	var $table_job 			= '';
	var $table_country 		= '';
	var $table_farea 		= '';
	var $table_edu 			= '';
	var $table_edu_spec 	= '';
	var $table_ind 			= '';
	var $table_jrole 		= '';
	var $table_jrole_grp	= '';
	var $table_apply 		= '';
	var $table_jpost 		= '';
	var $table_jportal 		= '';
	var $table_subscribe 	= '';
	var $table_cvsource 	= '';
	var $table_candidate 	= '';
	var $table_can_summary 	= '';
	var $table_can_work 	= '';
	var $table_skill 		= '';
	var $table_exp 			= '';
	var $table_cv 			= '';
	var $table_smedia 		= '';
	var $table_edu_details 	= '';
	var $table_enum_country = '';

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
		$this->table_apply 			= 'ch_jobapply';
		$this->table_jpost 			= 'ch_jobpost';
		$this->table_jportal 		= 'ch_jobportal';
		$this->table_subscribe 		= 'ch_emp_subscribe';
		$this->table_cvsource 		= 'ch_cvsource';
		$this->table_candidate 		= 'ch_candidate';
		$this->table_can_summary 	= 'ch_candidate_summary';
		$this->table_can_work 		= 'ch_candidate_exp';
		$this->table_skill 			= 'enum_skill_area';
		$this->table_exp 			= 'enum_experience';
		$this->table_cv 			= 'ch_cv';
		$this->table_smedia 		= 'ch_socialmedia';
		$this->table_edu_details 	= 'ch_candidate_education';
		$this->table_enum_country 	= 'enum_country';
		
		//Hirewand Credentials
		$this->loginurl 			= "https://www.hirewand.com/user/signin";  
		$this->loginrequest 		=	"email=anju@ipfhr.com&password=hire123&remember_me=true&GMTOffset=-330";
    }
	
	public function get_subscribe()
	{
		$query=$this->db->query("select sub_nojobs, sub_expire_dt  from ".$this->table_subscribe." where emp_id=".$this->session->userdata('hireid'));
		return $query->row_array();
	}
	
	public function record_can_count($jid=null)
    {	
       	$query=$this->db->query("select a.can_id from ".$this->table_apply." a where a.job_id=".$jid);
		return $query->num_rows();
    }
	
	public function get_can_match($jtitle, $minexp, $maxexp, $industry, $farea, $jrole, $skillval, $edu) 
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
				
		$min_sal = 0;
		$max_sal = 50000;
		
		if($jtitle != '') {
			$jtitle = $this->db->escape('%'.$jtitle.'%');
			$where1 = " AND (c.can_curr_desig LIKE ".$jtitle." OR c.can_skills LIKE ".$jtitle." OR f.jfun_display LIKE ".$jtitle." OR ind.ind_display LIKE ".$jtitle." OR jr.jrole_display LIKE ".$jtitle.")";
		}		
		
		if($minexp == '') {
			$minexp=0;
		}		
		if($maxexp == '') {
			$maxexp=99;
		}
		
		$where3 = " AND c.can_experience >= ".$minexp;		
		$where4 = " AND c.can_experience <= ".$maxexp;
		//$where5 = " AND j.job_min_sal >= ".$min_sal." AND j.job_max_sal <= ".$max_sal;
		
		if($industry != '') {
			$industry = explode(',',$industry);
			$where6 .= " AND (";
			$in = 0;
			foreach ($industry as $Invalue) {
				$ind_val = $this->db->escape('%'.$Invalue.'%');
				$indid = $this->get_ind_id($ind_val);
				if(!empty($indid)) {
					$where6 .= "c.ind_id LIKE ".$indid['ind_id']." OR ";
					$in++;
				}
		  	}
			$where6 = rtrim($where6," OR ");
			$where6 .= ")";
			
			if($in == 0) {
				$where6 = '';
			}
		}
		
		if($farea != '') {
			$where7 = " AND c.fun_id = ".$farea;
		}
		
		if($jrole != '') {
			$jrole = explode(',',$jrole);
			$jr = 0;
			$where8 .= " AND (";
			foreach ($jrole as $jrvalue) {
				$jr_val = $this->db->escape('%'.$jrvalue.'%');
				$jrid = $this->get_jrole_id($jr_val);
				if(!empty($jrid)) {
					$where8 .= "c.jr_id LIKE ".$jrid['jrole_id']." OR ";
					$jr++;
				}
		  	}
			$where8 = rtrim($where8," OR ");
			$where8 .= ")";
			if($jr == 0) {
				$where8 = '';
			}
		}
		
		if($skillval != '') {
			$skillval = explode(',',$skillval);
			$where9 .= " OR (";
			foreach ($skillval as $skvalue) {
				$sk_val = $this->db->escape('%'.$skvalue.'%');
				$where9 .= "c.can_skills LIKE ".$sk_val." OR ";
		  	}
			$where9 = rtrim($where9," OR ");
			$where9 .= ")";
		}
		
		if($edu != '') {
			$where10 = " AND c.edu_id = ".$edu;
		}
		
		$query=$this->db->query("select c.can_id, c.can_fname, c.can_lname, c.can_email, e.deg_type_display, f.jfun_display, ind.ind_display, jr.jrole_display from ".$this->table_candidate." c left join ".$this->table_ind." ind on ind.ind_id = c.ind_id left join ".$this->table_farea." f on f.jfun_id = c.fun_id left join ".$this->table_jrole." jr on jr.jrole_id = c.jr_id left join ".$this->table_edu." e on e.deg_type_id = c.edu_id where c.can_alert=1 and c.can_status=1 ".$where1.$where2.$where3.$where4.$where5.$where6.$where7.$where8.$where10.$where9." order by c.can_id asc");	
		
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
	
	public function get_cand_record($jid=null)
    {	
       	$query=$this->db->query("select a.can_id, a.ja_source, a.ja_date, c.can_id, c.can_encrypt_id, c.can_fname, c.can_lname, c.can_ccode, c.can_phone, c.can_email, c.can_hash, c.can_dob, c.can_gender, c.can_experience, c.can_curr_company, c.can_curr_loc, c.can_skills, c.can_pref_loc, c.can_curr_desig, c.can_alert, c.can_propic, c.edu_id, c.co_id, c.fun_id, c.ind_id, c.can_relocate, c.can_reg_date, c.can_upd_date, co.co_name, co.co_nationality, e.deg_type_sdisplay as edu_name, f.jfun_display as fun_name, cv.cv_headline, cv.cv_path, cv.cv_cletter, sm.sm_linkdin, sm.sm_fb, sm.sm_tw, sm.sm_gp, sum.csum_details, ind.ind_display, s.cvs_name from ".$this->table_apply." a left join ".$this->table_candidate." c on c.can_id=a.can_id left join ".$this->table_country." co on co.co_id = c.co_id left join ".$this->table_edu." e on e.deg_type_id = c.edu_id left join ".$this->table_farea." f on f.jfun_id = c.fun_id left join ".$this->table_cv." cv on cv.can_id = c.can_id  left join ".$this->table_smedia." sm on sm.can_id = c.can_id left join ".$this->table_can_summary." sum on sum.can_id = c.can_id left join ".$this->table_ind." ind on ind.ind_id = c.ind_id left join ".$this->table_cvsource." s on s.cvs_id = a.ja_source where a.job_id=".$jid." order by c.can_fname asc");

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
    }
	
	public function get_can_single_record($cid=null)
	{
		$query = $this->db->query("select c.can_id, c.can_encrypt_id, c.can_fname, c.can_lname, c.can_ccode, c.can_phone, c.can_email, c.can_hash, c.can_dob, c.can_gender, c.can_experience, c.can_curr_company, c.can_curr_loc, c.can_skills, c.can_pref_loc, c.can_curr_desig, c.can_alert, c.can_propic, c.edu_id, c.co_id, c.fun_id, c.ind_id, c.can_relocate, c.can_reg_date, c.can_upd_date, co.co_name, co.co_nationality, e.deg_type_sdisplay as edu_name, f.jfun_display as fun_name, cv.cv_headline, cv.cv_path, cv.cv_cletter, sm.sm_linkdin, sm.sm_fb, sm.sm_tw, sm.sm_gp, sum.csum_details, ind.ind_display from ".$this->table_candidate." c left join ".$this->table_country." co on co.co_id = c.co_id left join ".$this->table_edu." e on e.deg_type_id = c.edu_id left join ".$this->table_farea." f on f.jfun_id = c.fun_id left join ".$this->table_cv." cv on cv.can_id = c.can_id  left join ".$this->table_smedia." sm on sm.can_id = c.can_id left join ".$this->table_can_summary." sum on sum.can_id = c.can_id left join ".$this->table_ind." ind on ind.ind_id = c.ind_id where c.can_id=".$cid);
		return $query->row_array();
	}

	public function record_count() 
	{
		$this->db->select('job_id');
		$this->db->from($this->table_job);
		$this->db->where('job_status !=', 0);
		$this->db->where('job_created_by', $this->session->userdata('hireid'));
		return $this->db->count_all_results();
    }
	
	public function record_exp_count() 
	{
		$this->db->select('job_id');
		$this->db->from($this->table_job);
		$this->db->where('job_status !=', 1); //$this->db->where('job_status !=', 0);
		$this->db->where('job_created_by', $this->session->userdata('hireid'));
		return $this->db->count_all_results();
    }

	public function get_record()
    {	
       	$query=$this->db->query("select j.job_id, 
       		j.hire_jobid, j.job_url_id, j.job_title, j.job_location, j.job_min_exp, j.job_max_exp, j.job_min_sal, j.job_max_sal, j.job_industry, j.job_farea, j.job_role, j.job_edu, j.job_edu_spec, j.job_skills, j.job_company, j.job_desc, j.job_type, j.job_noprofiles, j.job_created_dt, j.job_created_by, j.job_updated_dt, j.job_status, e.deg_type_display, f.jfun_display, ind.ind_display, jr.jrole_display, emp.emp_comp_name, emp.emp_fname, emp.emp_jobportal, miexp.exp_display as minexp, maexp.exp_display as maxexp, (select count(ja.ja_id) from ".$this->table_apply." ja where ja.job_id=j.job_id) as job_applycount from ".$this->table_job." j left join ".$this->table_ind." ind on ind.ind_id = j.job_industry left join ".$this->table_edu." e on e.deg_type_id = j.job_edu left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_jrole." jr on jr.jrole_id = j.job_role left join ".$this->table_exp." miexp on miexp.exp_id = j.job_min_exp left join ".$this->table_exp." maexp on maexp.exp_id = j.job_max_exp left join ".$this->table_emp." emp on emp.emp_id = j.job_created_by where j.job_status!=0 and j.job_created_by = ".$this->session->userdata('hireid')." order by j.job_id desc");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
    }

    public function get_record_bydate($startDate,$endDate)
    {	
       	$query=$this->db->query("select j.job_id, j.hire_jobid, j.job_url_id, j.job_title, j.job_location, j.job_min_exp, j.job_max_exp, j.job_min_sal, j.job_max_sal, j.job_industry, j.job_farea, j.job_role, j.job_edu, j.job_edu_spec, j.job_skills, j.job_company, j.job_desc, j.job_type, j.job_noprofiles, j.job_created_dt, j.job_created_by, j.job_updated_dt, j.job_status, e.deg_type_display, f.jfun_display, ind.ind_display, jr.jrole_display, emp.emp_comp_name, emp.emp_fname, emp.emp_jobportal, miexp.exp_display as minexp, maexp.exp_display as maxexp, (select count(ja.ja_id) from ".$this->table_apply." ja where ja.job_id=j.job_id) as job_applycount from ".$this->table_job." j left join ".$this->table_ind." ind on ind.ind_id = j.job_industry left join ".$this->table_edu." e on e.deg_type_id = j.job_edu left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_jrole." jr on jr.jrole_id = j.job_role left join ".$this->table_exp." miexp on miexp.exp_id = j.job_min_exp left join ".$this->table_exp." maexp on maexp.exp_id = j.job_max_exp left join ".$this->table_emp." emp on emp.emp_id = j.job_created_by
			where j.job_created_dt >= '".$startDate."' and j.job_created_dt <= '".$endDate."' and 

       	  j.job_status!=0 and j.job_created_by = ".$this->session->userdata('hireid')." order by j.job_id desc");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
    }



    public function getclose_record_bydate($startDate,$endDate)
    {
    	$query = $this->db->query("select j.job_id, j.hire_jobid, j.job_url_id, j.job_title, j.job_location, j.job_min_exp, j.job_max_exp, j.job_min_sal, j.job_max_sal, j.job_industry, j.job_farea, j.job_role, j.job_edu, j.job_edu_spec, j.job_skills, j.job_company, j.job_desc, j.job_type, j.job_noprofiles, j.job_created_dt, j.job_created_by, j.job_updated_dt, j.job_status, e.deg_type_display, f.jfun_display, ind.ind_display, jr.jrole_display, emp.emp_comp_name, emp.emp_fname, emp.emp_jobportal, miexp.exp_display as minexp, maexp.exp_display as maxexp from ".$this->table_job." j left join ".$this->table_ind." ind on ind.ind_id = j.job_industry left join ".$this->table_edu." e on e.deg_type_id = j.job_edu left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_jrole." jr on jr.jrole_id = j.job_role left join ".$this->table_exp." miexp on miexp.exp_id = j.job_min_exp left join ".$this->table_exp." maexp on maexp.exp_id = j.job_max_exp left join ".$this->table_emp." emp on emp.emp_id = j.job_created_by where j.job_created_dt >= '".$startDate."' and j.job_created_dt <= '".$endDate."' and j.job_status!=1 and j.job_created_by = ".$this->session->userdata('hireid')." order by j.job_id desc");

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
    }
	
	public function get_exp_record()
    {	
       	$query = $this->db->query("select j.job_id, j.hire_jobid, j.job_url_id, j.job_title, j.job_location, j.job_min_exp, j.job_max_exp, j.job_min_sal, j.job_max_sal, j.job_industry, j.job_farea, j.job_role, j.job_edu, j.job_edu_spec, j.job_skills, j.job_company, j.job_desc, j.job_type, j.job_noprofiles, j.job_created_dt, j.job_created_by, j.job_updated_dt, j.job_status, e.deg_type_display, f.jfun_display, ind.ind_display, jr.jrole_display, emp.emp_comp_name, emp.emp_fname, emp.emp_jobportal, miexp.exp_display as minexp, maexp.exp_display as maxexp from ".$this->table_job." j left join ".$this->table_ind." ind on ind.ind_id = j.job_industry left join ".$this->table_edu." e on e.deg_type_id = j.job_edu left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_jrole." jr on jr.jrole_id = j.job_role left join ".$this->table_exp." miexp on miexp.exp_id = j.job_min_exp left join ".$this->table_exp." maexp on maexp.exp_id = j.job_max_exp left join ".$this->table_emp." emp on emp.emp_id = j.job_created_by where j.job_status!=1 and j.job_created_by = ".$this->session->userdata('hireid')." order by j.job_id desc");

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
    }

    public function create_hire_job($jid=null)
    {
		$hwjobid = 0;
    	$hirejob = $this->createreq($jid);
		
		if(!empty($hirejob)) {
			if(isset($hirejob->needid)) {
				$hwjobid = $hirejob->needid;
			} else {
				$hwjobid = 0;
			}
			$judata = array(
				'hire_jobid'=>$hwjobid,
				'hire_status'=>$hirejob->status,
				'job_updated_dt'=>date('Y-m-d H:i:s')
			);
			
			$this->db->where('job_url_id', $jid);
			$this->db->update($this->table_job, $judata);
		}
		return $hwjobid;
    }
	
	public function insert_record($cvcount)
	{
		$monsal = explode('~',$this->input->post('monsal'));
		$jdata = array(
			'job_title'			=>$this->input->post('jtitle'),
			'job_location'		=>$this->input->post('location'),
			'job_company'		=>($this->input->post('hcompany')?$this->input->post('hcompany'):'Confidential'),
			'job_min_exp'		=>$this->input->post('minexp'),
			'job_max_exp'		=>$this->input->post('maxexp'),
			'job_min_sal'		=>$monsal[0],
			'job_max_sal'		=>$monsal[1],
			'job_industry'		=>$this->input->post('industry'),
			'job_farea'			=>$this->input->post('farea'),
			'job_role'			=>$this->input->post('jrole'),
			'job_edu'			=>$this->input->post('edu'),
			'job_skills'		=>$this->input->post('skillval'),
			'job_type'			=>$this->input->post('jobtype'),
			'job_desc'			=>$this->input->post('jobdesc'),
			'job_notifyemail'	=>$this->input->post('notifyemail'),
			'job_site'			=>$this->input->post('jobsite'),
			'job_notes'			=>$this->input->post('jobnotes'),
			'job_noprofiles'	=>40,
			'jp_cvs'			=>$cvcount['pr_cvno'],
			'job_expaired'		=>$cvcount['peried'],
			'job_created_dt'	=>date('Y-m-d H:i:s'),
			'job_updated_dt'	=>date('Y-m-d H:i:s'),	
			'hire_jobid'		=>'0',
			'hire_status'		=>'',
			'job_created_by'	=>$this->session->userdata('hireid')
		);
		
	
		/* reduse the jobs */
		$this->jobposted($jdata);
		
		$this->db->insert($this->table_job, $jdata);
		$insert_id = $this->db->insert_id();
		
		$job_url_id = md5($insert_id); //Encrypt Job ID
		$jurldata = array(
			'job_url_id'=>$job_url_id
		);
		$this->db->where('job_id', $insert_id);
	   	$this->db->update($this->table_job, $jurldata);
		
		$hirejob = $this->createreq($job_url_id);
		
		if(!empty($hirejob)) {
			if(isset($hirejob->needid)) {
				$hwjobid = $hirejob->needid;
			} else {
				$hwjobid = 0;
			}

			$judata = array(
				'hire_jobid'=>$hwjobid,
				'hire_status'=>'success',
				'job_updated_dt'=>date('Y-m-d H:i:s')
			);
			
			$this->db->where('job_url_id', $job_url_id);
			$this->db->update($this->table_job, $judata);
		}


		return $insert_id;
	}
	
	function checkpacake()
	{
		$max = $this->input->post('maxexp');
		$this->db->where('cp_max_ex <= ', $max);
		$this->db->order_by('cp_max_ex', 'desc');		
		$package = $this->db->select('cp_max_ex, pr_cvno, peried');
		$data = $this->db->get('ch_pricing')->row_array();
		return $data;	
	}





	function jobposted($jdata)
	{
		
		

		$hid = $this->session->userdata('hireid');
		$now = date('Y-m-d h:i:s');
		$this->db->select('sub_ex_limits,sub_packid');
		$this->db->where('sub_expire_dt >=', $now);
		$this->db->where('emp_id', $hid);
		$this->db->where('sub_nojobs >','0');
		$query = $this->db->get('ch_emp_subscribe');
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $key => $value) {
				if ($value->sub_ex_limits == '15+ years') {
					$int[] =array('year' =>16 ,'id'=> $value->sub_packid);

				}else{
					$arr = explode("-",$value->sub_ex_limits);
					$int[] =array(
						'year' => (int) filter_var($arr[1], FILTER_SANITIZE_NUMBER_INT),
						'id' => $value->sub_packid );
				}
				
			}			
			$yearmax = max($int);
	
			$this->db->where('sub_packid', $yearmax['id']);
			$this->db->where('emp_id', $this->session->userdata('hireid'));
			$this->db->set('sub_nojobs', 'sub_nojobs-1',FALSE);
			$this->db->update('ch_emp_subscribe');
		
		}
		return true;
		
	}





	public function createreq($jobid=null)
	{
		$query = $this->db->query("select j.job_id, j.job_title, j.job_location, j.job_min_sal, j.job_max_sal, j.job_skills, j.job_industry, j.job_role, j.job_company, e.deg_type_display, f.jfun_hireid, f.jfun_display, miexp.exp_value as minexp, maexp.exp_value as maxexp from ".$this->table_job." j left join ".$this->table_edu." e on e.deg_type_id = j.job_edu left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_exp." miexp on miexp.exp_id = j.job_min_exp left join ".$this->table_exp." maexp on maexp.exp_id = j.job_max_exp where j.job_status!=0  and j.job_url_id='".$jobid."' and j.job_created_by = ".$this->session->userdata('hireid'));
		$result 		= $query->row_array();
		$skill_list 	= array();
		$jobtitle 		= $result['job_title'];
		$skill_list 	=  explode(',', $result['job_skills']);
		$maxexp 		= $result['maxexp'];
		$minexp 		= $result['minexp'];
		$skill_str 		= '';
		$role_str 		= '';
		$ind_str 		= '';
		$co_hire_name 	= '';
		$co_hire_id 	= '';
		$jrolename 		= explode(',', $result['job_role']);
		$indname 		= explode(',', $result['job_industry']);

		$hire_loc_result = $this->get_enum_cntry_details($result['job_location']);
		if (!empty($hire_loc_result)) {
			$co_hire_name = $hire_loc_result['cnt_display'];
			$co_hire_id = $hire_loc_result['cnt_hireid'];
		}

		$ix = 0;
		//Skills
		foreach($skill_list as $skill => $skill_value) {
			$ix = 1;
			$squery = $this->db->query("select skillarea_hireid, skillarea_display from ".$this->table_skill." where skillarea_display like '".$skill_value."'");
			$skillresult = $squery->row_array();
			if(!empty($skillresult)) {
				$skill_str = $skill_str . '<i forv="'.$skillresult['skillarea_hireid'].'"><skillarea priority="'.$ix.'" oper="eq" disp="'.$skillresult['skillarea_display'].'">'.$skillresult['skillarea_hireid'].'</skillarea></i>';
				
			} else {
				if(trim($skill_value)!='') {
					$skill_str = $skill_str . '<i forv="-1"> <skillarea priority="'.$ix.'" oper="eq" disp="'.$skill_value.'">-1</skillarea> </i>';
				}
			}	
			//$ix++;		
		}
		//Job role
		foreach($jrolename as $role => $role_value) {
			$role_str = $role_str. '<p es_oper="p" plaintext="true" name="pg_m_role.m_role.search_terms.display" oper="eq">'.$role_value.'</p>';
		}
		//Industry
		foreach($indname as $ind => $ind_value) {
			$indquery = $this->db->query("select ind_hireid, ind_display from ".$this->table_ind." where ind_display like '".$ind_value."'");
			$indresult = $indquery->row_array();
			if(!empty($indresult)) {
				$ind_str = $ind_str . '<i disp="'.$indresult['ind_display'].'">'.$indresult['ind_hireid'].'</i>';
				
			}
		}
				
		/* Sample XML */
		/*$xml ='<need object="hire" id="xml_need_container" type="1">
                <range oper="lteq" name="m_experience.v">48</range> <range oper="gteq" name="m_experience.v">24</range>
                <p name="m_skill" oper="ineq">
                                <i forv="518b8574ba36fb112e6e3fcd">
                                                <skillarea priority="1" oper="eq" disp="PHP">518b8574ba36fb112e6e3fcd</skillarea>
                                </i>
                                <i forv="518b8574ba36fb112e6e3fc1">
                                                <skillarea priority="1" oper="eq" disp="MySQL">518b8574ba36fb112e6e3fc1</skillarea>
                                </i>
                </p>
                <p es_oper="p" plaintext="true" name="pg_m_role.m_role.search_terms.display" oper="eq">PHP Developer</p>
		</need>';*/

		$xml = '<need object="hire" id="xml_need_container" type="1">';
		$xml .= '<range oper="lteq" name="m_experience.v">'.$maxexp.'</range> <range oper="gteq" name="m_experience.v">'.$minexp.'</range>';
		if($skill_str != '') {
			$xml .= '<p name="m_skill" oper="ineq">'.$skill_str.'</p>';
		}
		if($role_str != '') {
			$xml .= $role_str;
		}
		if($ind_str != '') {
			$xml .= '<p name="jobIndustries.v" oper="ineq" acceptmissing="false">'.$ind_str.'</p>';
		}
		if($co_hire_name != '') {
			$xml .= '<p name="m_country.v" disp="'.$co_hire_name.'" oper="eq" acceptmissing="false">'.$co_hire_id.'</p>';
		}
		if($result['jfun_display']) {
			$xml .= '<p name="jobFunctions.v" disp="'.$result['jfun_display'].'" oper="eq" acceptmissing="false">'.$result['jfun_hireid'].'</p>';
		}
		$xml .= '</need>';

		//echo $xml.'<br><br>--------------------------------------------------------------------<br>';  exit;

		$requrl 	= "https://www.hirewand.com/hireapi/saverequirement";
		$reqrequest = "title=".$jobtitle."&xml=".$xml; 
		
		$dir 		= realpath(APPPATH . '../ctemp');
		$path 		= $dir;
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
		
		$html = json_decode($html);
		//echo $html; exit;

		$logtext 	= "Cherry Hire Search JobID:".$result['job_id']." \n ".$xml;
		$saveTo 	= "cherry_create_req.txt";
		$fh = fopen($saveTo, 'a') or die("can't open file");
		fwrite($fh, $logtext);		

		if(!empty($html)) {
			// Update job details with HW data
			if(isset($html->needid)) {
				$hwjobid = "\nHW Req Id: ".$html->needid;
			} else {
				$hwjobid = "\nHW Req Id: 0";
			}

			$hwstatus = "\nHW Req Status: ".$html->status;
		} else {
			$hwjobid = "\nReq Id: 0";
			$hwstatus = "\nReq Status: Unable to create in HW";
		}
		fwrite($fh, $hwjobid);
		fwrite($fh, $hwstatus);
		$brData = "\n*************************************************************************** \n\n\n";
		fwrite($fh, $brData);
		fclose($fh);
		return $html;
	}

	public function get_enum_cntry_details($cntry_name=null)
	{
		$query = $this->db->query("select cnt_hireid, cnt_display  from ".$this->table_enum_country." where LOWER(cnt_display) LIKE '%".strtolower($cntry_name)."%'");
		$result = $query->row_array();
		return $result;
	}
	
	public function delete_hire_req($job_url_id=null)
	{
		/******Delete Requirement in HW*****************/
		$query = $this->db->query("select j.hire_jobid from ".$this->table_job." j where j.job_url_id='".$job_url_id."' and j.job_created_by = ".$this->session->userdata('hireid'));
		$result = $query->row_array();
		
		$hire_id 	= $result['hire_jobid'];
		if($hire_id == 0) {
			$status = 'nojob';
			return $status;
			exit();
		}	
		
		$requrl = "https://www.hirewand.com/hireapi/deleterequirement"; //Delete requirement HW API
		$reqrequest = "needid=".$hire_id; 
				 		
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
		$html = json_decode($html);
		//echo $html; exit;
		return $html->status;
		
	}

	public function get_single_record($jid=null)
	{
		$query=$this->db->query("select j.job_id, j.hire_jobid, j.job_url_id, j.job_title, j.job_location, j.job_min_exp, j.job_max_exp, j.job_min_sal, j.job_max_sal, j.job_industry, j.job_farea, j.job_role, j.job_edu, j.job_edu_spec, j.job_skills, j.job_company, j.job_desc, j.job_type, j.job_noprofiles, j.job_created_dt, j.job_updated_dt, j.job_created_by, j.job_notifyemail, j.job_site, j.job_notes, j.job_status, e.deg_type_display as edu_name, f.jfun_display as fun_name, miexp.exp_display as minexp, maexp.exp_display as maxexp, emp.emp_comp_name, emp.emp_fname, emp.emp_jobportal, emp.emp_desc, emp.emp_email  from ".$this->table_job." j left join ".$this->table_edu." e on e.deg_type_id = j.job_edu left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_exp." miexp on miexp.exp_id = j.job_min_exp left join ".$this->table_exp." maexp on maexp.exp_id = j.job_max_exp left join ".$this->table_emp." emp on emp.emp_id = j.job_created_by where j.job_url_id='".$jid."' and j.job_created_by = ".$this->session->userdata('hireid'));
		
		return $query->row_array();
	}

	public function update_record()
	{
		$jid = $this->input->post('jobid');
		$monsal = explode('~',$this->input->post('monsal'));
		$jdata = array(
			'job_title'=>$this->input->post('jtitle'),
			'job_location'=>$this->input->post('location'),
			'job_company'=>($this->input->post('hcompany')?$this->input->post('hcompany'):'Confidential'),
			'job_min_exp'=>$this->input->post('minexp'),
			'job_max_exp'=>$this->input->post('maxexp'),
			'job_min_sal'=>$monsal[0],
			'job_max_sal'=>$monsal[1],
			'job_industry'=>$this->input->post('industry'),
			'job_farea'=>$this->input->post('farea'),
			'job_role'=>$this->input->post('jrole'),
			'job_edu'=>$this->input->post('edu'),
			'job_skills'=>$this->input->post('skillval'),
			'job_type'=>$this->input->post('jobtype'),
			'job_desc'=>$this->input->post('jobdesc'),
			'job_notifyemail'=>$this->input->post('notifyemail'),
			'job_site'=>$this->input->post('jobsite'),
			'job_notes'=>$this->input->post('jobnotes'),
			'job_noprofiles'=>40,
			'job_updated_dt'=>date('Y-m-d H:i:s'),
		);
		
		$this->db->where('job_url_id', $jid);
	   	$this->db->update($this->table_job, $jdata);
		
		$hirejob = $this->createreq($jid);
		
		if(!empty($hirejob)) {
			if(isset($hirejob->needid)) {
				$hwjobid = $hirejob->needid;
			} else {
				$hwjobid = 0;
			}
			$judata = array(
				'hire_jobid'=>$hwjobid,
				'hire_status'=>$hirejob->status,
				'job_updated_dt'=>date('Y-m-d H:i:s')
			);
			
			$this->db->where('job_url_id', $jid);
			$this->db->update($this->table_job, $judata);
		}
	}
	
	public function publish_count($jid=null) 
	{
		$this->db->select('a.job_id');
		$this->db->from($this->table_jpost.' as a');
		$this->db->join($this->table_job.' as j', 'j.job_id=a.job_id');
		$this->db->where('a.jpost_status', 1);
		$this->db->where('j.job_created_by', $this->session->userdata('hireid'));
		$this->db->where('a.job_id', $jid);
		return $this->db->count_all_results();
    }

	public function delete_record($jid=null)
	{	
		$delresult = $this->delete_hire_req($jid); // Delete From HW account
		if($delresult == 'success' || $delresult == 'nojob') {
			$this->db->where('job_url_id', $jid);
   			$this->db->delete($this->table_job);
			return 1;
		} else {
			return 0;
		}
	}
	
	public function close_job($jid=null)
	{
		$jdata = array(
			'job_status'=>0,
			'job_updated_dt'=>date('Y-m-d H:i:s'),
		);
		$this->db->where('job_url_id', $jid);
		$this->db->update($this->table_job, $jdata);
		return 1;
	}
	
	public function reopen_job($jid=null)
	{
		$jdata = array(
			'job_status'=>1,
			'job_updated_dt'=>date('Y-m-d H:i:s'),
		);
		$this->db->where('job_url_id', $jid);
		$this->db->update($this->table_job, $jdata);
		return 1;
	}
	
	public function apply_count($jid=null) 
	{
		$this->db->select('ja_id');
		$this->db->from($this->table_apply);
		$this->db->where('job_id', $jid);
		return $this->db->count_all_results();
    }
	
	public function apply_count_list($jid=null) 
	{
		$query=$this->db->query("select a.ja_source, COUNT(a.ja_source) as total, s.cvs_name from ".$this->table_apply." a left join ".$this->table_cvsource." s on s.cvs_id = a.ja_source where a.job_id=".$jid." group by a.ja_source order by total desc");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
    }
	
	public function get_hcountry()
    {	
       	$query = $this->db->query("select cnt_id, cnt_hireid, cnt_display from ".$this->table_country." order by cnt_id asc");
		$country_list = $query->result();
		$dropDownList['']='Nationality';
		foreach ($country_list as $dropdown) {
			$dropDownList[$dropdown->cnt_id] = $dropdown->cnt_display;
		}
		return $dropDownList;
    }

    public function get_country()
    {	
       	$query = $this->db->query("select co_id, co_code, co_name from ".$this->table_country." where co_status=1 order by co_name asc");
		$country_list = $query->result();
		$dropDownList['']='Job Location';
		foreach ($country_list as $dropdown) {
			$dropDownList[$dropdown->co_name] = $dropdown->co_name;
		}
		return $dropDownList;
    }

    public function get_nationality()
    {	
       	$query = $this->db->query("select co_id, co_code, co_name, co_nationality from ".$this->table_country." where co_status=1 order by co_nationality asc");
		$nation_list = $query->result();
		$dropDownList['']='Nationality';
		foreach ($nation_list as $dropdown) {
			$dropDownList[$dropdown->co_id] = $dropdown->co_nationality;
		}
		return $dropDownList;
    }
	
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
	
	public function get_ind_list()
    {	
    	$term = $this->input->post('term');
       	$query = $this->db->query("select ind_id, ind_display from ".$this->table_ind." where ind_display like '".$term."%'  order by ind_display asc");
		$ind_list = $query->result();
		return json_encode($ind_list);
    }
	
	public function get_industry()
    {	
       	$query = $this->db->query("select ind_id, ind_display from ".$this->table_ind." order by ind_display asc");
		$ind_list = $query->result();
		foreach ($ind_list as $dropdown) {
			$dropDownList[$dropdown->ind_display] = $dropdown->ind_display;
		}
		return $dropDownList;
    }
	
	public function get_ind_id($term=null)
    {	
       	$query = $this->db->query("select ind_id from ".$this->table_ind." where ind_display LIKE ".$term);
		return $query->row_array();
    }
	
	public function get_jobrole()
    {
		$query=$this->db->query("select jrole_id, jrole_display from ".$this->table_jrole." order by jrole_display asc");

		$jr_list = $query->result();
		//$dropDownList['']='Job Role';
		foreach ($jr_list as $dropdown) {
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
	
	public function get_jrole_id($term=null)
    {	
       	$query = $this->db->query("select jrole_id from ".$this->table_jrole." where jrole_display LIKE ".$term);
		return $query->row_array();
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
	
    public function get_skill_list()
    {
    	$term = $this->input->post('term');
		$query = $this->db->query("select skillarea_id, skillarea_display from ".$this->table_skill." where skillarea_display like '".$term."%' order by skillarea_display asc");
		$skill_list = $query->result();
		return json_encode($skill_list);
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
	
	public function getsalary_list()
	{
		$dropDownList['']='Monthly Salary';
		$dropDownList['0~0']='Unspecified';
		$j = 0;
		for ($i=500; $i<=2000; $i=$i+500) {
			$dropDownList[$j.'~'.$i] = '$'.$j.' ~ $'.$i;
			$j = $i;
		}
		
		for ($i=$j+1000; $i<=10000; $i=$i+1000) {
			$dropDownList[$j.'~'.$i] = '$'.$j.' ~ $'.$i;
			$j = $i;
		}
		$dropDownList['10000~15000']='$10000 ~ $15000';
		$dropDownList['15000~30000']='$15000 ~ $30000';
		$dropDownList['30000~50000']='$30000 ~ $50000';
		return $dropDownList;
	}
	
	public function get_minexp_inc()
    {	
		$dropDownList['']='Min Exp';
		$dropDownList['0']='0 Yrs';
		for ($i=1; $i<=30; $i++) {
			$dropDownList[$i] = $i;
		}
		$dropDownList['30+']='30+';
		return $dropDownList;
    }
	
	public function get_maxexp_inc()
    {	
		$dropDownList['']='Max Exp';
		$dropDownList['0']='0 Yrs';
		for ($i=1; $i<=30; $i++) {
			$dropDownList[$i] = $i;
		}
		$dropDownList['30+']='30+';
		return $dropDownList;
    }
	
	public function postjob($jid=null)
    {
		if ($this->input->post('portal')) {
			$this->db->where('job_id', $jid);
			$this->db->delete($this->table_jpost); 
			
			$today = strtotime(date('Y-m-d'));
			$typesRequest = $this->input->post('portal');
			foreach ($typesRequest as $value) {
			  $data['columnename'] = $value;
			  $jpdata = array(
					'job_id'=>$jid,
					'jp_id'=>$value,
					'jpost_pdate'=>date('Y-m-d'),
					'jpost_edate'=>date("Y-m-d", strtotime("+1 month", $today))
				);
			  $this->db->insert($this->table_jpost, $jpdata);
			}
			return 1;
		} else {
			return 0;	
		}		
    }
	
	public function get_publish_record($jid=null)
	{
		$query=$this->db->query("select jp.job_id, jp.jp_id, k.jp_name, k.jp_type from ".$this->table_jpost." jp left join ".$this->table_jportal." k on k.jp_id = jp.jp_id where jp.job_id =".$jid);

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
	
	public function ded_subscribe($balno=null)
	{
		$sdata=array(
			'sub_nojobs'=>$balno,
		);
		
		$this->db->where('emp_id', $this->session->userdata('hireid'));
	   	$this->db->update($this->table_subscribe, $sdata);
	}

	public function simplyjobxml()
	{
		$query=$this->db->query("select jp.job_id, j.hire_jobid, j.job_url_id, j.job_title, j.job_location, j.job_min_exp, j.job_max_exp, j.job_min_sal, j.job_max_sal, j.job_industry, j.job_farea, j.job_role, j.job_edu, j.job_edu_spec, j.job_skills, j.job_company, j.job_desc, j.job_type, j.job_noprofiles, j.job_created_dt, j.job_updated_dt, j.job_created_by, j.job_notifyemail, j.job_site, j.job_notes, j.job_status, e.deg_type_display as edu_name, f.jfun_display as fun_name, miexp.exp_display as minexp, maexp.exp_display as maxexp, emp.emp_comp_name, emp.emp_fname, emp.emp_jobportal, emp.emp_desc, emp.emp_email  from ".$this->table_jpost." jp left join ".$this->table_job." j on j.job_id=jp.job_id left join ".$this->table_edu." e on e.deg_type_id = j.job_edu left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_exp." miexp on miexp.exp_id = j.job_min_exp left join ".$this->table_exp." maexp on maexp.exp_id = j.job_max_exp left join ".$this->table_emp." emp on emp.emp_id = j.job_created_by where j.job_status=1 and jp.jp_id=4");

		$dom = new DOMDocument('1.0','UTF-8');
		$dom->formatOutput = true;
	
		$root = $dom->createElement('jobs');
		$dom->appendChild($root);
		
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $jdata)
			{
				$jobcdate = date('Y/m/d', strtotime($jdata->job_created_dt)); //2016/01/12
				$jobexpdate = date ('Y/m/d', strtotime('+60 day', strtotime($jdata->job_created_dt))); 
				
				$jobdesc = substr(htmlentities(strip_tags($jdata->job_desc)),0,1000);
				$farea = ($jdata->fun_name) ? htmlentities(strip_tags($jdata->fun_name)):'';
				$skill = ($jdata->job_skills) ? htmlentities(strip_tags($jdata->job_skills)):'';
				$edu = ($jdata->edu_name) ? $jdata->edu_name:'';
				$industry = ($jdata->job_industry) ? htmlentities(strip_tags($jdata->job_industry)):'';
				$result = $dom->createElement('job');
				$root->appendChild($result);
			
				$result->appendChild( $dom->createElement('title', htmlentities(strip_tags($jdata->job_title))));
				$result->appendChild( $dom->createElement('job-board-name', 'CherryHire'));
				$result->appendChild( $dom->createElement('job-board-url', 'http://www.cherryhire.com/Jobs'));
				$result->appendChild( $dom->createElement('job-code', $jdata->job_id) );
				$result->appendChild( $dom->createElement('detail-url', 'http://www.cherryhire.com/JobDetails/'.$jdata->job_url_id.'/?js=4&amp;source=simplyhired'));
				$result->appendChild( $dom->createElement('apply-url', 'http://www.cherryhire.com/JobDetails/'.$jdata->job_url_id.'/?js=4&amp;source=simplyhired'));
				$result->appendChild( $dom->createElement('job-category', $farea));
				
				$desc = $dom->createElement('description');
				$result->appendChild($desc);
				
				$summary = $desc->appendChild($dom->createElement('summary')); 
				$summary->appendChild($dom->createCDATASection( $jobdesc ));
				
				$jskill = $desc->appendChild( $dom->createElement('required-skills'));
				$jskill->appendChild( $dom->createCDATASection($skill));
				
				$desc->appendChild( $dom->createElement('required-education', $edu));
				$desc->appendChild( $dom->createElement('required-experience', $jdata->job_min_exp.'~'.$jdata->job_max_exp.' years'));
				$desc->appendChild( $dom->createElement('full-time', 1));
				$desc->appendChild( $dom->createElement('part-time', ''));
				$desc->appendChild( $dom->createElement('flex-time', ''));
				$desc->appendChild( $dom->createElement('internship', ''));
				$desc->appendChild( $dom->createElement('volunteer', ''));
				$desc->appendChild( $dom->createElement('exempt', ''));
				$desc->appendChild( $dom->createElement('contract', ''));
				$desc->appendChild( $dom->createElement('permanent', ''));
				$desc->appendChild( $dom->createElement('temporary', ''));
				$desc->appendChild( $dom->createElement('telecommute', ''));
				
				$comp = $dom->createElement('compensation');
				$result->appendChild($comp);
				
				$comp->appendChild( $dom->createElement('salary-range', $jdata->job_min_sal.'~'.$jdata->job_max_sal));
				$comp->appendChild( $dom->createElement('salary-amount', ''));
				$comp->appendChild( $dom->createElement('salary-currency', ''));
				$comp->appendChild( $dom->createElement('benefits', ''));
				
				$result->appendChild( $dom->createElement('posted-date', $jobcdate));
				$result->appendChild( $dom->createElement('close-date', $jobexpdate));
		
				$loc = $dom->createElement('location');
				$result->appendChild($loc);
				
				$loc->appendChild( $dom->createElement('address', $jdata->job_location));
				$loc->appendChild( $dom->createElement('city', ''));
				$loc->appendChild( $dom->createElement('state', ''));
				$loc->appendChild( $dom->createElement('zip', ''));
				$loc->appendChild( $dom->createElement('country', ''));
				
				$con = $dom->createElement('contact');
				$result->appendChild($con);
				
				$con->appendChild( $dom->createElement('name', $jdata->emp_fname));
				$con->appendChild( $dom->createElement('email', $jdata->emp_email));
				$con->appendChild( $dom->createElement('hiring-manager-name', ''));
				$con->appendChild( $dom->createElement('hiring-manager-email', ''));
				$con->appendChild( $dom->createElement('phone', ''));
				$con->appendChild( $dom->createElement('fax', ''));
				
				$com = $dom->createElement('company');
				$result->appendChild($com);
				
				$com->appendChild( $dom->createElement('name', htmlentities(strip_tags($jdata->emp_comp_name))));
				
				$edesp = $com->appendChild($dom->createElement('description')); 
				$edesp->appendChild($dom->createCDATASection( htmlentities(strip_tags($jdata->emp_desc)) ));
				
				$com->appendChild( $dom->createElement('industry', $industry));
				$com->appendChild( $dom->createElement('url', 'http://www.cherryhire.com/Jobs'));
			}
		}
		//echo '<xmp>'. $dom->saveXML() .'</xmp>';
		$dom->formatOutput = true; 
		$dom->saveXML();
		$dom->save('xmlfiles/shiredfeed.xml') or die('XML Create Error');
	}
	
	public function jooblejobxml()
	{
		$query=$this->db->query("select jp.job_id, j.hire_jobid, j.job_url_id, j.job_title, j.job_location, j.job_min_exp, j.job_max_exp, j.job_min_sal, j.job_max_sal, j.job_industry, j.job_farea, j.job_role, j.job_edu, j.job_edu_spec, j.job_skills, j.job_company, j.job_desc, j.job_type, j.job_noprofiles, j.job_created_dt, j.job_updated_dt, j.job_created_by, j.job_notifyemail, j.job_site, j.job_notes, j.job_status, e.deg_type_display as edu_name, f.jfun_display as fun_name, miexp.exp_display as minexp, maexp.exp_display as maxexp, emp.emp_comp_name, emp.emp_fname, emp.emp_jobportal, emp.emp_desc, emp.emp_email  from ".$this->table_jpost." jp left join ".$this->table_job." j on j.job_id=jp.job_id left join ".$this->table_edu." e on e.deg_type_id = j.job_edu left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_exp." miexp on miexp.exp_id = j.job_min_exp left join ".$this->table_exp." maexp on maexp.exp_id = j.job_max_exp left join ".$this->table_emp." emp on emp.emp_id = j.job_created_by where j.job_status=1 and jp.jp_id=4");
		
		$dom = new DOMDocument('1.0','UTF-8');
		$dom->formatOutput = true;
	
		$root = $dom->createElement('jobs');
		$dom->appendChild($root);
		
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $jdata)
			{
				$jobcdate = date('d.m.Y', strtotime($jdata->job_created_dt)); //14.07.2015
				$jobupdate = date('d.m.Y', strtotime($jdata->job_updated_dt)); 
				$jobexpdate = date ('d.m.Y', strtotime('+60 day', strtotime($jdata->job_created_dt))); 
				$jobURL = 'http://www.cherryhire.com/JobDetails/'.$jdata->job_url_id.'/?js=11&amp;source=jooble';
				$jobDesc = htmlentities(strip_tags($jdata->job_desc));
				$result = $dom->createElement('job');
				//$result->addAttribute('id', $jdata->job_id);
				$result->setAttribute("id", $jdata->job_id);
				$root->appendChild($result);
				
				$link = $result->appendChild($dom->createElement('link')); 
				$link->appendChild($dom->createCDATASection($jobURL));
				
				$name = $result->appendChild($dom->createElement('name')); 
				$name->appendChild($dom->createCDATASection($jdata->job_title));
				
				$region = $result->appendChild( $dom->createElement('region'));
				$region->appendChild( $dom->createCDATASection($jdata->job_location));
				
				$salary = $result->appendChild( $dom->createElement('salary'));
				$salary->appendChild( $dom->createCDATASection($jdata->job_max_sal));
				
				$description = $result->appendChild( $dom->createElement('description'));
				$description->appendChild($dom->createCDATASection($jobDesc));
				
				$company = $result->appendChild( $dom->createElement('company'));
				$company->appendChild( $dom->createCDATASection($jdata->emp_comp_name));
				
				$result->appendChild( $dom->createElement('pubdate', $jobcdate));
				$result->appendChild( $dom->createElement('updated', $jobupdate));
				$result->appendChild( $dom->createElement('expire', $jobexpdate));
				$result->appendChild( $dom->createElement('jobtype', $jdata->job_type));
			}
		}
		//echo '<xmp>'. $dom->saveXML() .'</xmp>';
		$dom->formatOutput = true; 
		$dom->saveXML();
		$dom->save('jooblefeed/xml-jobs_cherryhire.xml') or die('XML Create Error');
	}


	/* check if package expaired*/

	public function checkpackage($hid)
	{
		$now = date('Y-m-d h:i:s');
		$this->db->where('sub_expire_dt >=', $now);
		$this->db->where('emp_id', $hid);
		$query = $this->db->get('ch_emp_subscribe');
		if ($query->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
		
	}

/* check remaining jobs */

public function checkJobsremaining($hid)
	{
		$now = date('Y-m-d h:i:s');
		$this->db->where('sub_expire_dt >=', $now);
		$this->db->where('emp_id', $hid);
		$this->db->select_sum('sub_nojobs');
		$query = $this->db->get('ch_emp_subscribe')->row();
		if ($query->sub_nojobs > 0) {
			return true;
		}
		else{
			return false;
		}		
	}

	/**
	 * [get_post_maxexp experence]
	 */
	public function get_post_maxexp()
	{
		$hid = $this->session->userdata('hireid');
		$now = date('Y-m-d h:i:s');
		$this->db->select('sub_ex_limits');
		$this->db->where('sub_expire_dt >=', $now);
		$this->db->where('emp_id', $hid);
		$this->db->where('sub_nojobs >','0');
		$query = $this->db->get('ch_emp_subscribe');
		
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $key => $value) {
				if ($value->sub_ex_limits == '15+ years') {
					$int[0] = 50;
				}else{
					$arr = explode("-",$value->sub_ex_limits);
					$int[] = (int) filter_var($arr[1], FILTER_SANITIZE_NUMBER_INT);
				}
				
			}			
			$yearmax = max($int);
			for ($i=0; $i < ($yearmax+1); $i++) { 
				$data[] = $i;
			}	
		}else{
			$data[] = $i = 0;
		}
		return $data;
	}


/**
 * Verified Cvs
 */
function verified_cv($id)
{
	
	   $query=$this->db->query("
		select distinct(a.can_id), 
		c.can_encrypt_id, 
		c.can_fname,
		c.can_lname, 
		c.can_ccode,
		c.can_phone, 
		c.can_email, 
		c.can_experience,
		c.can_curr_desig, 
		c.can_curr_loc, 
		c.can_upd_date, 
		co.co_name, 
		ch.cv_path,
		ch.cv_headline,
		cv_id,
		f.jfun_display as fun_name, 
		j.job_url_id, j.job_title, 
		j.job_location from ch_varified_cv a left join 
		".$this->table_candidate." c on c.can_id=a.can_id left join 
		".$this->table_country." co on co.co_id = c.co_id left join 
		ch_cv ch on ch.can_id = c.can_id left join
		".$this->table_farea." f on f.jfun_id = c.fun_id left join ch_jobs j on j.job_id=a.job_id left join 
		".$this->table_emp." emp on emp.emp_id=j.job_created_by where c.can_status=1 and emp.emp_id=".$this->session->userdata('hireid')."  order by can_id desc ");

	if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
			if(!empty($id)){
				if($id === $row->job_url_id){
					$data[] = $row;
				}
				
			}else{
				$data[] = $row;
			}	
		}
		return $data;
	}
	
}

/**
 * download cv
 */

 public function getcvd($id)
 {
	$this->db->where('cv_id', $id);
	$this->db->from('ch_cv');
	$this->db->join($this->table_candidate, $this->table_candidate.'.can_id = ch_cv.can_id', 'left');
	
	return $this->db->get()->row_array();
}

}