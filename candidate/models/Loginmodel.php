<?php 

class Loginmodel extends CI_Model {

	var $table_master = '';

	var $table_logdetails = '';

	var $table_cpwd = '';



    public function __construct()

    {	ini_set('memory_limit', '-1');

		$this->table_master = 'ch_candidate';

		$this->table_logdetails = '';

		$this->table_cpwd = 'ch_cpwd_reset';

    }



	public function record_count() 

	{

        return $this->db->count_all($this->table_master);

    }



	function login($username, $password)

	{

		$this->db->select('can_id, can_fname, can_lname, can_email, can_hash, can_propic');

		$this->db->from($this->table_master);

		$this->db->where('can_email', $username);

		$this->db->where('can_password', MD5($password));

		$this->db->where('can_status', 1);

		$this->db->limit(1);



		$query = $this->db->get();

		if($query->num_rows() == 1)

		{

			return $query->result();

		}

		else

		{

			return false;

		}

	}

	

	function checkuser($username)

	{

		$this->db->select('can_id, can_fname, can_lname, can_email');

		$this->db->from($this->table_master);

		$this->db->where('can_email', $username);

		$this->db->where('can_status', 1);

		$this->db->limit(1);



		$query = $this->db->get();

		return $query->num_rows();

		

	}

	

	function recover_set($username)

	{

		$this->db->select('can_id, can_encrypt_id, can_fname, can_lname, can_email');

		$this->db->from($this->table_master);

		$this->db->where('can_email', $username);

		$this->db->where('can_status', 1);

		$this->db->limit(1);

		$query = $this->db->get();

		$result = $query->result();

		if(empty($result))

		{

			return 0;	

		}

		

		foreach($result as $row)

		{

			$cand_chid = $row->can_id;

			$can_encrypt_id = $row->can_encrypt_id;

			$cand_chname = $row->can_fname.' '.$row->can_lname;

			$cand_chemail = $row->can_email;

		}

		

		if($cand_chid!='') {

			$autoexp_data = array(

				'cpwd_status'=>2,

			);

			$this->db->where('can_id', $cand_chid);

			$this->db->update($this->table_cpwd, $autoexp_data);

		} else {

			return 0;	

		}

		

		$nowtime = time();		

		$vcode = md5($this->encryption->encrypt($can_encrypt_id).$nowtime);

		

		$digits = 4;

		$otp = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);

		

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

	

	public function get_recover_data($cpwd_id=null)

	{

		$query = $this->db->query("select r.cpwd_id, r.cpwd_encrypt_id, r.can_id, r.cpwd_vcode, r.cpwd_reqtime, r.cpwd_otp, c.can_id, c.can_encrypt_id, c.can_fname, c.can_lname, c.can_email from ".$this->table_cpwd." r left join ".$this->table_master." c on c.can_id = r.can_id where r.cpwd_id=".$cpwd_id);

		return $query->row_array();

	}



	public function verify_recover_data($cpwd_vcode=null)

	{

		$query = $this->db->query("select r.cpwd_id, r.cpwd_encrypt_id, r.can_id, r.cpwd_vcode, r.cpwd_reqtime, r.cpwd_otp, c.can_id, c.can_encrypt_id, c.can_fname, c.can_lname, c.can_email from ".$this->table_cpwd." r left join ".$this->table_master." c on c.can_id = r.can_id where r.cpwd_vcode='".$cpwd_vcode."' and cpwd_status=0");

		return $query->row_array();

	}



	public function confirm_reset_request() 

	{

		$verifydata = $this->verify_recover_data($this->security->xss_clean($this->input->post('auth_id')));

		if(empty($verifydata)) { return 0; }

			

		$get_encrypt_id = $this->input->post('encrypt_id');

		$get_auth = $this->input->post('auth_id');



		$can_id = $verifydata['can_id'];

		$r_encrypt_id = $verifydata['cpwd_encrypt_id'];

		$r_auth = $verifydata['cpwd_vcode'];

		$r_otp = $verifydata['cpwd_otp'];

		$r_expdt = strtotime($verifydata['cpwd_reqtime']);

		$expDate = date('Y-m-d H:i:s', strtotime('+1 day', $r_expdt));			

		$nowDate = time();



		if($nowDate > strtotime($expDate)) {  return 0; }

		if($r_encrypt_id != $get_encrypt_id) {  return 0; }

		if($r_auth != $get_auth) {  return 0;  }

		if($r_otp != $this->input->post('vcode')) {  return 0;  }



		if($this->input->post('npwd')!='') {

			$reset_data = array(

				'can_password'=>md5($this->input->post('npwd')),

				'can_hash'=>$this->input->post('npwd'),

				'can_upd_date'=>date('Y-m-d H:i:s'),

			);

			$this->db->where('can_id', $can_id);

			$this->db->update($this->table_master, $reset_data);



			$reset_data1=array(

				'cpwd_status'=>1,

			);

			$this->db->where('cpwd_encrypt_id', $r_encrypt_id);

			$this->db->where('can_id', $can_id);

		   	$this->db->update($this->table_cpwd, $reset_data1);



			return 1;	

		} else {

			return 0;	

		}





	}

}