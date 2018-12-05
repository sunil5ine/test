<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class alert_library
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->database();

        $data['cv'] = $this->getcvalert(); 
        echo "<pre>";
        print_r ($data);
        echo "</pre>";

        $data['nav_alerts'] = array('name','laname','cname','dname');
        $this->ci->load->vars($data);
    }

    function getcvalert()
    {
        $this->ci->db->from('ch_cv_writing cv');
        $this->ci->db->select('trans_id, cv.can_id, can_fname, can_lname ');
        $this->ci->db->where('trans_id is NOT NULL');
        $this->ci->db->where('cv_alert', 0);
        $this->ci->db->join('ch_candidate c', 'c.can_id = cv.can_id', 'left');
        return $this->ci->db->get()->result(); 
    }


}

/* End of file Alert_library.php */
