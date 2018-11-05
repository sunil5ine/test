<?php 
class Employermodel extends CI_Model {
	
	var $table_employer 	= '';
	var $table_country 		= '';
	var $table_farea 		= '';
	var $table_edu 			= '';
	var $table_subscribe 	= '';
	var $table_profile 		= '';

    public function __construct()
    {	ini_set('memory_limit', '-1');
		$this->table_employer 	= 'ch_employer';
		$this->table_country 	= 'ch_country';
		$this->table_farea 		= 'ch_funarea';
		$this->table_edu 		= 'ch_education';
		$this->table_subscribe 	= 'ch_emp_subscribe';
		$this->table_profile 	= 'ch_emp_profile';
    }
	
	public function record_count() 
	{
        return $this->db->count_all($this->table_employer);
    }
	
	public function get_nationality()
    {	
       	$query=$this->db->query("select co_id, co_code, co_name from ".$this->table_country." where co_status=1 order by co_name asc");
		$country_list 		= $query->result();
		$dropDownList['']	='Nationality';
		foreach($country_list as $dropdown) {
			$dropDownList[$dropdown->co_id] = $dropdown->co_name;
		}
		return $dropDownList;
    }

    public function get_cmp_location()
    {	
       	$query=$this->db->query("select co_id, co_code, co_name from ".$this->table_country." where co_status=1 order by co_name asc");
		$country_list 		= $query->result();
		$dropDownList['']	='Company Location';
		foreach($country_list as $dropdown) {
			$dropDownList[$dropdown->co_name] = $dropdown->co_name;
		}
		return $dropDownList;
    }
	
	public function valid_emp_email($empemail=null)
	{
		$this->db->select('emp_id');
		$this->db->from($this->table_employer);
		$this->db->where('emp_email', $empemail);
		return $this->db->count_all_results();
		
	}
	
	public function insert_record()
	{
		$data=array(
			'emp_comp_name'		=>$this->input->post('comp'),
			'emp_fname'			=>$this->input->post('firstname'),
			'emp_lname'			=>$this->input->post('lastname'),
			'emp_designation'	=>$this->input->post('designation'),
			'emp_ccode'			=>$this->input->post('cntrycode'),
			'emp_phone'			=>$this->input->post('phone'),
			'emp_email'			=>$this->input->post('emailid'),
			'emp_password'		=>md5($this->input->post('usrpwd')),
			'emp_hash'			=>$this->input->post('usrpwd'),
			'emp_website'		=>$this->input->post('url'),
			'emp_number'		=>$this->input->post('empcnt'),
			'emp_desc'			=>$this->input->post('descr'),
			'emp_type'			=>$this->input->post('emptype'),
			'emp_location'		=>$this->input->post('complocation'),
			'emp_authkey'		=>md5($this->encryption->encrypt($this->input->post('emailid'))),
			'emp_verify'		=>0,
			'emp_reg_date'		=>date('Y-m-d'),
			'emp_update_date'	=>date('Y-m-d H:i:s'),
			'emp_status'		=>0
		);
		
		$this->db->insert($this->table_employer, $data);
		$insert_eid = $this->db->insert_id();	
		
		$emp_encrypt_id = md5($insert_eid); //Encrypt Job ID
		$emp_en_data = array(
			'emp_encrypt_id'=>$emp_encrypt_id
		);
		$this->db->where('emp_id', $insert_eid);
	   	$this->db->update($this->table_employer, $emp_en_data);
		
		return $insert_eid;
	}
	
	public function insert_profile($eid=null,$name=null,$nemail=null)
	{
		$pdata=array(
			'emp_id'=>$eid,
			'ep_dispaly_name'	=>$name,
			'ep_logo'			=>'',
			'ep_welcome_msg'	=>'',
			'ep_notify_email'	=>$nemail,
		);
		
		$this->db->insert($this->table_profile, $pdata);
		return $insert_pid = $this->db->insert_id();
	}
	
	public function insert_subscribe($eid=null)
	{
		$this->db->where('pr_id', '3');
		$data = $this->db->get('ch_pricing')->row_array();
		
		$today = date('Y/m/d H:i:s');
		$expdate = date('Y-m-d H:i:s',strtotime($today . "+".$data['peried']." days"));
		
		$sdata=array(
			'emp_id'			=>$eid,
			'sub_nojobs'		=>$data['pr_limit'],
			'sub_nocv'			=>$data['pr_cvno'],
			'sub_packid'		=>'0e1ea334ea26cbedb6df7e66e8c8015d',
			'sub_ex_limits'		=>'6-8 years',
			'sub_expire_dt'		=>$expdate,
			'sub_type'			=>1,
			'sub_status'		=>1
		);
		
		$this->db->insert($this->table_subscribe, $sdata);
		return $insert_sid = $this->db->insert_id();
	}
	
	public function get_employer($eid=null)
	{
		$query = $this->db->query("select emp_authkey, emp_encrypt_id, emp_fname, emp_lname, emp_designation, emp_comp_name, emp_ccode, emp_phone, emp_email, emp_website, emp_verify, emp_location from ".$this->table_employer." where emp_id=".$eid);
		return $query->row_array();
	}
	

	public function getspammail($email)
	{
		$this->db->where('mails', $email);
		$query = $this->db->get('spam_mail');
		if ($query->num_rows() > 0) {
			return true;
		}
		else{
			return false;
		}
	}
}