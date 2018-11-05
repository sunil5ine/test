<?php 

/**

 * Login model for this APP

 * 

 * 

 * @package    CI

 * @subpackage Model

 * @author     Sreejith Gopinath <sreejith@aatoon.com>

 */

 

class Loginmodel extends CI_Model {

	var $table_master 		= '';

	var $table_logdetails 	= '';

	var $table_cpwd 		= '';



    public function __construct()

    {	ini_set('memory_limit', '-1');

		$this->table_master 	= 'ch_employer';

		$this->table_logdetails = '';

		$this->table_epwd 		= 'ch_emppwd_reset';

    }



	public function record_count() 

	{

        return $this->db->count_all($this->table_master);

    }



	function login($username, $password)

	{

		$this->db->select('emp_id, emp_comp_name, emp_email, emp_hash, emp_jobportal');

		$this->db->from($this->table_master);

		$this->db->where('emp_email', $username);

		$this->db->where('emp_password', MD5($password));

		$this->db->where('emp_status', 1);

		$this->db->limit(1);



		$query = $this->db->get();

		if ($query->num_rows() == 1) {

			return $query->result();

		} else {

			return false;

		}

	}


	

	function checkuser($username)

	{

		$this->db->select('emp_id, emp_fname, emp_lname, emp_comp_name, emp_email');

		$this->db->from($this->table_master);

		$this->db->where('emp_email', $username);

		$this->db->where('emp_status', 1);

		$this->db->limit(1);

		$query = $this->db->get();

		return $query->num_rows();

	}

	function profile($emp_id)
	{
		return $this->db->get('ch_emp_profile')->row_array();
	}

	function recover_set($username)

	{

		$this->db->select('emp_id, emp_encrypt_id, emp_fname, emp_lname, emp_comp_name, emp_email');

		$this->db->from($this->table_master);

		$this->db->where('emp_email', $username);

		$this->db->where('emp_status', 1);

		$this->db->limit(1);

		$query 	= $this->db->get();

		$result = $query->result();

		if (empty($result)) {

			return 0;	

		}

		

		foreach ($result as $row) {

			$emp_id 		= $row->emp_id;

			$emp_encrypt_id = $row->emp_encrypt_id;

			$emp_name 		= $row->emp_fname.' '.$row->emp_lname;

			$emp_email 		= $row->emp_email;

		}

		

		if ($emp_id!='') {

			$autoexp_data = array(

				'epwd_status'=>2,

			);

			$this->db->where('emp_id', $emp_id);

			$this->db->update($this->table_epwd, $autoexp_data);

		} else {

			return 0;	

		}

		

		$nowtime 	= time();		

		$vcode 		= md5($this->encryption->encrypt($emp_encrypt_id).$nowtime);

		$digits 	= 4;

		$otp 		= str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);

		

		$pwd_data=array(

			'emp_id'=>$emp_id,

			'epwd_vcode'=>$vcode,

			'epwd_otp'=>$otp,

			'epwd_reqtime'=>date('Y-m-d H:i:s'),

			'epwd_status'=>0

		);

		

		$this->db->insert($this->table_epwd, $pwd_data);

		$insert_pid = $this->db->insert_id();

		

		$work_data1=array(

			'epwd_encrypt_id'=>md5($insert_pid),

		);

		$this->db->where('epwd_id', $insert_pid);

	   	$this->db->update($this->table_epwd, $work_data1);

		

		return $insert_pid;

	}

	

	public function get_recover_data($epwd_id=null)

	{

		$query = $this->db->query("select r.epwd_id, r.epwd_encrypt_id, r.emp_id, r.epwd_vcode, r.epwd_reqtime, r.epwd_otp, e.emp_id, e.emp_encrypt_id, e.emp_fname, e.emp_lname, e.emp_email from ".$this->table_epwd." r left join ".$this->table_master." e on e.emp_id = r.emp_id where r.epwd_id=".$epwd_id);

		return $query->row_array();

	}



	public function verify_recover_data($epwd_vcode=null)

	{

		$query = $this->db->query("select r.epwd_id, r.epwd_encrypt_id, r.emp_id, r.epwd_vcode, r.epwd_reqtime, r.epwd_otp, e.emp_encrypt_id, e.emp_fname, e.emp_lname, e.emp_email from ".$this->table_epwd." r left join ".$this->table_master." e on e.emp_id = r.emp_id where r.epwd_vcode='".$epwd_vcode."' and epwd_status=0");

		return $query->row_array();

	}

	

	public function confirm_reset_request() 

	{

		$verifydata = $this->verify_recover_data($this->security->xss_clean($this->input->post('auth_id')));

		if (empty($verifydata)) { return 0; }

			

		$get_encrypt_id = $this->input->post('encrypt_id');

		$get_auth = $this->input->post('auth_id');



		$emp_id = $verifydata['emp_id'];

		$r_encrypt_id = $verifydata['epwd_encrypt_id'];

		$r_auth = $verifydata['epwd_vcode'];

		$r_otp = $verifydata['epwd_otp'];

		$r_expdt = strtotime($verifydata['epwd_reqtime']);

		$expDate = date('Y-m-d H:i:s', strtotime('+1 day', $r_expdt));			

		$nowDate = time();



		if ($nowDate > strtotime($expDate)) {  return 0; }

		if ($r_encrypt_id != $get_encrypt_id) {  return 0; }

		if ($r_auth != $get_auth) {  return 0;  }

		if ($r_otp != $this->input->post('vcode')) {  return 0;  }



		if ($this->input->post('npwd')!='') {

			$reset_data = array(

				'emp_password'=>md5($this->input->post('npwd')),

				'emp_hash'=>$this->input->post('npwd'),

				'emp_update_date'=>date('Y-m-d H:i:s'),

			);

			$this->db->where('emp_id', $emp_id);

			$this->db->update($this->table_master, $reset_data);



			$reset_data1=array(

				'epwd_status'=>1,

			);

			$this->db->where('epwd_encrypt_id', $r_encrypt_id);

			$this->db->where('emp_id', $emp_id);

		   	$this->db->update($this->table_epwd, $reset_data1);



			return 1;	

		} else {

			return 0;	

		}

	}

	

	public function get_employer_verify($eid=null,$auth=null,$vstat=0) 

	{

		$this->db->select('emp_id');

		$this->db->from($this->table_master);

		$this->db->where('emp_encrypt_id', $eid);

		$this->db->where('emp_authkey', $auth);

		$this->db->where('emp_verify', $vstat);

		return $this->db->count_all_results();	

    }

	

	public function upadteemailvarify($eid=null,$auth=null) 

	{

		$this->load->helper('string');
		$emp_en_data = array(

			'emp_verify'=>1,
			'emp_status'=>1,
			'emp_encrypt_id'=>random_string('alnum', 16)

		);

		$this->db->where('emp_encrypt_id', $eid);

		$this->db->where('emp_authkey', $auth);

	  	$this->db->update($this->table_master, $emp_en_data);	
	  	if ($this->db->affected_rows() > 0) {
	  		return true;
	  	}
	  	else{
	  		return false;

	  	}


    }

}