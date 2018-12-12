<?php 
/**
 * Dashboard model for this APP
 * 
 * 
 * @package    CI
 * @subpackage Model
 * @author     Sreejith Gopinath <sreejith@aatoon.com>
 */
 
class Dashboardmodel extends CI_Model {

	var $table_jobs 		= '';
	var $table_candidate 	= '';
	var $table_jobapply 	= '';
	var $table_emp 			= '';
	var $table_emp_pro 		= '';
	var $table_country 		= '';
	var $table_farea 		= '';
	var $table_orders 		= '';
	var $table_trans 		= '';
	var $table_emp_sm 		= '';

	/** 
	* Init Function
	*
	* @return void
	*/
    public function __construct()
    {	
		ini_set('memory_limit', '-1');
		$this->table_jobs 		= 'ch_jobs';
		$this->table_candidate 	= 'ch_candidate';
		$this->table_jobapply 	= 'ch_jobapply';
		$this->table_emp 		= 'ch_employer';
		$this->table_emp_pro 	= 'ch_emp_profile';
		$this->table_emp_sm 	= 'ch_emp_social';	
		$this->table_country 	= 'ch_country';
		$this->table_farea 		= 'enum_job_function';
		$this->table_orders 	= 'ch_orders';
		$this->table_trans 		= 'ch_transaction';
    }
	
	public function total_job_count()
	{
		$this->db->select('job_id');
		$this->db->from($this->table_jobs);
		$this->db->where('job_created_by', $this->session->userdata('hireid'));
		$this->db->where('job_status', 1);
		return $this->db->count_all_results();
	}
	
	public function total_expjob_count()
	{
		$this->db->select('job_id');
		$this->db->from($this->table_jobs);
		$this->db->where('job_created_by', $this->session->userdata('hireid'));
		$this->db->where('job_status  != ', 1);
		return $this->db->count_all_results();
	}
	
	public function total_cand_count1() 
	{
		$this->db->select('distinct(a.can_id)');
		$this->db->from($this->table_jobapply.' as a');
		$this->db->join($this->table_candidate.' as c', 'c.can_id=a.can_id');
		$this->db->join($this->table_jobs.' as j', 'j.job_id=a.job_id');
		$this->db->where('c.can_status', 1);
		$this->db->where('j.job_created_by', $this->session->userdata('hireid'));
		return $this->db->count_all_results();
    }
	
	public function total_cand_count() 
	{
		$day = date('w');
		$week_start = date('Y-m-d H:i:s', strtotime('+'.(1-$day).' days'));
		$this->db->select('distinct(a.can_id)');
		$this->db->from($this->table_jobapply.' as a');
		$this->db->join($this->table_candidate.' as c', 'c.can_id=a.can_id');
		$this->db->join($this->table_jobs.' as j', 'j.job_id=a.job_id');
		$this->db->join($this->table_emp.' as e', 'e.emp_id=j.job_created_by');
		$this->db->where('c.can_status', 1);
		$this->db->where('ja_date  >=', $week_start);
		$this->db->where('j.job_created_by', $this->session->userdata('hireid'));
		return $this->db->count_all_results();
    }

	public function total_cand_count_all()
	{
		$this->db->select('can_id');
		$this->db->from($this->table_candidate);
		$this->db->where('can_status', 1);
		return $this->db->count_all_results();
	}
	
	public function get_cand_record($limit=0)
    {	
		if($limit==0) {
			$climit='';
		} else {
			$climit='limit 0,'.$limit;
		}
		   $query=$this->db->query(" select distinct(a.can_id), c.can_encrypt_id, c.can_fname, c.can_lname, c.can_ccode, c.can_phone, c.can_email, c.can_experience, c.can_curr_desig, c.can_curr_loc, c.can_upd_date, co.co_name, f.jfun_display as fun_name, j.job_url_id, j.job_title, j.job_location from ch_varified_cv a left join ".$this->table_candidate." c on c.can_id=a.can_id left join ".$this->table_country." co on co.co_id = c.co_id left join ".$this->table_farea." f on f.jfun_id = c.fun_id left join ".$this->table_jobs." j on j.job_id=a.job_id left join ".$this->table_emp." emp on emp.emp_id=j.job_created_by where c.can_status=1 and emp.emp_id=".$this->session->userdata('hireid')." order by can_id desc ".$climit);

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
    }
	
	
	public function get_job_record($limit=0)
    {
		if($limit==0) {
			$jlimit='';
		} else {
			$jlimit='limit 0,'.$limit;
		}
       	$query = $this->db->query("select j.job_id, j.job_url_id, j.job_title, j.job_location, j.job_min_exp, j.job_max_exp, j.job_farea, j.job_skills, j.job_created_dt, f.jfun_display as fun_name from ".$this->table_jobs." j left join ".$this->table_farea." f on f.jfun_id = j.job_farea left join ".$this->table_emp." emp on emp.emp_id = j.job_created_by where j.job_status!=0 and j.job_created_by = ".$this->session->userdata('hireid')." order by j.job_id desc ".$jlimit);

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
    }
	
	public function get_bill_record($limit=0)
	{
		if($limit==0) {
			$blimit='';
		} else {
			$blimit='limit 0,'.$limit;
		}
		
		$query = $this->db->query("select ord.ord_id, ord.trans_id, ord.emp_id, ord.ord_product, ord.ord_amt, ord.ord_date, t.trans_pt_invoice_id  from ".$this->table_orders." ord left join ".$this->table_trans." t on t.trans_id=ord.trans_id where ord.emp_id=".$this->session->userdata('hireid')." order by ord.ord_id desc ".$blimit);
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {
				$data[] = $row;
			}
			return $data;
		}
		return false;
	}
	
	public function job_nums_range()
	{
		$last20 = date ('Y-m-d H:i:s', strtotime('-21 day'.date('Y-m-d H:i:s'))); 
		
		$query = $this->db->query("select DATE_FORMAT(a.job_created_dt,'%m-%d-%Y') as jdate, count(a.job_id) as totcount from ".$this->table_jobs." a where a.job_created_dt >='".$last20."' and a.job_created_dt <='".date('Y-m-d H:i:s')."' and a.job_status != 0 and a.job_created_by ='".$this->session->userdata('hireid')."' group by DATE_FORMAT(a.job_created_dt,'%m-%d-%Y') ");
		return $query->result_array();
	}
	
	public function apply_nums_range()
	{
		$last10 = date ('Y-m-d H:i:s', strtotime('-11 day'.date('Y-m-d H:i:s'))); 
		
		$query = $this->db->query("select DATE_FORMAT(a.ja_date,'%m-%d-%Y') as jdate, count(a.can_id) as totcount from ".$this->table_jobapply." a left join ".$this->table_jobs." j on j.job_id = a.job_id left join ".$this->table_emp." e on e.emp_id = j.job_created_by where a.ja_date >='".$last10."' and a.ja_date <='".date('Y-m-d H:i:s')."' and a.ja_status = 1 and j.job_created_by ='".$this->session->userdata('hireid')."' group by DATE_FORMAT(a.ja_date,'%m-%d-%Y') ");
		return $query->result_array();
	}
	
	public function sm_nums_range()
	{
		$last20 = date ('Y-m-d H:i:s', strtotime('-20 day'.date('Y-m-d H:i:s'))); 
		
		$query = $this->db->query("select DATE_FORMAT(a.ja_date,'%m-%d-%Y') as jdate, count(a.can_id) as totcount from ".$this->table_jobapply." a left join ".$this->table_jobs." j on j.job_id = a.job_id left join ".$this->table_emp." e on e.emp_id = j.job_created_by where a.ja_date >='".$last20."' and a.ja_date <='".date('Y-m-d H:i:s')."' and a.ja_status = 1 and a.ja_source IN (7,8,9,10) and j.job_created_by ='".$this->session->userdata('hireid')."' group by DATE_FORMAT(a.ja_date,'%m-%d-%Y') ");
		return $query->result_array();
	}
	
	public function jp_nums_range()
	{
		$last20 = date ('Y-m-d H:i:s', strtotime('-20 day'.date('Y-m-d H:i:s'))); 
		
		$query = $this->db->query("select DATE_FORMAT(a.ja_date,'%m-%d-%Y') as jdate, count(a.can_id) as totcount from ".$this->table_jobapply." a left join ".$this->table_jobs." j on j.job_id = a.job_id left join ".$this->table_emp." e on e.emp_id = j.job_created_by where a.ja_date >='".$last20."' and a.ja_date <='".date('Y-m-d H:i:s')."' and a.ja_status = 1 and a.ja_source IN (1,2,3,4,5) and j.job_created_by ='".$this->session->userdata('hireid')."' group by DATE_FORMAT(a.ja_date,'%m-%d-%Y') ");
		return $query->result_array();
	}
	
	public function ref_nums_range()
	{
		$last20 = date ('Y-m-d H:i:s', strtotime('-20 day'.date('Y-m-d H:i:s'))); 
		
		$query = $this->db->query("select DATE_FORMAT(a.ja_date,'%m-%d-%Y') as jdate, count(a.can_id) as totcount from ".$this->table_jobapply." a left join ".$this->table_jobs." j on j.job_id = a.job_id left join ".$this->table_emp." e on e.emp_id = j.job_created_by where a.ja_date >='".$last20."' and a.ja_date <='".date('Y-m-d H:i:s')."' and a.ja_status = 1 and a.ja_source=6 and j.job_created_by ='".$this->session->userdata('hireid')."' group by DATE_FORMAT(a.ja_date,'%m-%d-%Y') ");
		return $query->result_array();
	}
	
	public function update_profile($cid=null)
	{
		$edata = array(
			'emp_fname'=>$this->input->post('fname'),
			'emp_lname'=>$this->input->post('lname'),
			'emp_designation'=>$this->input->post('designation'),
			'emp_ccode'=>$this->input->post('cntrycode'),
			'emp_phone'=>$this->input->post('phone'),
			'emp_password'=>md5($this->input->post('usrpwd')),
			'emp_hash'=>$this->input->post('usrpwd'),
			'emp_number'=>$this->input->post('empcnt'),
			'emp_location'=>$this->input->post('complocation'),
			'emp_website'=>$this->input->post('compurl'),
			'emp_update_date'=>date('Y-m-d H:i:s'),
		);
		
		$this->db->where('emp_id', $this->session->userdata('hireid'));
	   	$this->db->update($this->table_emp, $edata);
		
		$epdata = array(
			'ep_dispaly_name'=>$this->input->post('disname'),
			'ep_notify_email'=>$this->input->post('notifyemail'),
		);
		
		$this->db->where('emp_id', $this->session->userdata('hireid'));
	   	$this->db->update($this->table_emp_pro, $epdata);
		
		return 1;
	}
	
	public function update_smedia($empid=null)
	{
		$eid = $this->session->userdata('hireid');
		
		$query=$this->db->query("select emp_id from ".$this->table_emp_sm." where emp_id=".$eid);
		$sm_list = $query->result();			
		
		if(count($sm_list)>0) {
			$edata=array(
				'esm_linkdin'=>$this->input->post('linlink'),
				'esm_fb'=>$this->input->post('fblink'),
				'esm_tw'=>$this->input->post('twittlink'),
				'esm_gp'=>$this->input->post('gpluslink')
			);
			$this->db->where('emp_id', $eid);
	   		$this->db->update($this->table_emp_sm, $edata);
		} else {
			$edata=array(
				'emp_id'=>$eid,
				'esm_linkdin'=>$this->input->post('linlink'),
				'esm_fb'=>$this->input->post('fblink'),
				'esm_tw'=>$this->input->post('twittlink'),
				'esm_gp'=>$this->input->post('gpluslink'),
				'esm_status'=>1
			);
			$this->db->insert($this->table_emp_sm, $edata);
		}
				
		$e_up_data=array(
			'emp_update_date'=>date('Y-m-d H:i:s'),
		);
		$this->db->where('emp_id', $eid);
	   	$this->db->update($this->table_emp, $e_up_data);
	}


function update_profilepic($cid,$picpath)
{
	$this->db->where('emp_id', $cid);
	$query = $this->db->update('ch_emp_profile',array('ep_logo' =>$picpath));
	if ($this->db->affected_rows() == true) {
		return true;
	}
	else
	{
		return false;
	}
}
/**total verified cvs */
	public function verifiedcvs()
	{
		$this->db->where('emp_id', $this->session->userdata('hireid'));
		$this->db->where('vc_status', 1);
		$this->db->select('COUNT(vc_id) as count');
		$query = $this->db->get('ch_varified_cv')->row_array();
		return $query;
	}
}