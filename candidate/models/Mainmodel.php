<?php 
class Mainmodel extends CI_Model {
	
	var $table_employer = '';
	var $table_profile = '';
	var $table_subscribe = '';
	var $table_type = '';

    public function __construct()
    {	
		ini_set('memory_limit', '-1');
		$this->table_employer 	= 'ps_employer';
		$this->table_profile 	= 'ps_employer_profile';
		$this->table_subscribe 	= 'ps_employer_subscribe';
		$this->table_type 		= 'ps_employer_type';
    }
	
	public function record_count() 
	{
        return $this->db->count_all($this->table_employer);
    }
	
	public function insert_record()
	{
		$data=array(
			'emp_comp_name'=>$this->input->post('comp'),
			'emp_fname'=>$this->input->post('firstname'),
			'emp_lname'=>$this->input->post('lastname'),
			'emp_ccode'=>$this->input->post('cntrycode'),
			'emp_phone'=>$this->input->post('phone'),
			'emp_email'=>$this->input->post('emailid'),
			'emp_password'=>md5($this->input->post('usrpwd')),
			'emp_hash'=>$this->input->post('usrpwd'),
			'emp_website'=>$this->input->post('url'),
			'emp_number'=>$this->input->post('empcnt'),
			'emp_desc'=>$this->input->post('descr'),
			'emp_type'=>1,
			'emp_authkey'=>'',
			'emp_reg_date'=>date('Y-m-d'),
			'emp_update_date'=>date('Y-m-d H:i:s'),
			'emp_status'=>0
		);
		
		$this->db->insert($this->table_employer, $data);
		return $insert_eid = $this->db->insert_id();
	}
	
	public function insert_profile($eid=null,$name=null,$nemail=null)
	{
		$pdata=array(
			'emp_id'=>$eid,
			'ep_dispaly_name'=>$name,
			'ep_logo'=>'',
			'ep_welcome_msg'=>'',
			'ep_notify_email'=>$nemail,
		);
		
		$this->db->insert($this->table_profile, $pdata);
		return $insert_pid = $this->db->insert_id();
	}
	
	public function insert_subscribe($eid=null)
	{
		$today = date('Y/m/d H:i:s');
		$expdate = date('Y-m-d H:i:s',strtotime($today . "+30 days"));
		$subdata=array(
			'emp_id'=>$eid,
			'sub_nojobs'=>0,
			'sub_expire_dt'=>$expdate,
			'sub_type'=>1,
			'sub_status'=>1,
		);
		
		$this->db->insert($this->table_subscribe, $subdata);
		return $insert_subid = $this->db->insert_id();
	}
	
	public function get_employer($eid=null)
	{
		$query = $this->db->query("select emp_fname, emp_lname, emp_comp_name, emp_ccode, emp_phone, emp_email, emp_website from ".$this->table_employer." where emp_id=".$eid);
		return $query->row_array();
	}
	
}