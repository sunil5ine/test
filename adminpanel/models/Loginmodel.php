<?php 
class Loginmodel extends CI_Model {
	var $table_master = '';
	var $table_logdetails = '';

    public function __construct()
    {	ini_set('memory_limit', '-1');
		$this->table_master = 'ch_admin';
		$this->table_logdetails = '';
    }

	public function record_count() 
	{
        return $this->db->count_all($this->table_master);
    }

	function login($username, $password)
	{
		$this->db->select('ad_id, ad_name, ad_email, ad_password,type');
		$this->db->from($this->table_master);
		$this->db->where('ad_email', $username);
		$this->db->where('ad_password', MD5($password));
		$this->db->limit(1);

		$query = $this->db->get();
		if($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false;
		}
	}
	
}