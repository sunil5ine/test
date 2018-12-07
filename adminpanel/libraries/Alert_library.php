<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class alert_library
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->database();

        $alerts[] = $this->getcvalert(); 
        $alerts[] = $this->ct_alert(); 

        foreach ($alerts as $row) {
            if (!empty($row)) {
                foreach ($row as $key => $value) {
                    $dataall[$key] = array(
                        'title' => $value->name,
                        'uid'   => $value->uid,
                        'cid'   => $value->cid,
                        'name'  => $value->cfname. ' '. $value->clname,
                    );
                }
            }
        }
        $data['nav_alerts'] = array('name','laname','cname','dname');
        $this->ci->load->vars($data);
    }


    /** 
     * Cv Alerts
    */
    function getcvalert()
    {
        $this->ci->db->from('ch_cv_writing cv');
        $this->ci->db->select('trans_id as uid, cv.can_id as cid, can_fname as cfname, can_lname as clname');
        $this->ci->db->where('trans_id is NOT NULL');
        $this->ci->db->where('cv_alert', 0);
        $this->ci->db->join('ch_candidate c', 'c.can_id = cv.can_id', 'left');
        $result =  $this->ci->db->get(); 
        if($result->num_rows() > 0)
        {
            foreach ($result->result() as $key => $value) { $newVal[] = $value; }
            foreach($newVal as $element) { $element->name ='Cv writing'; }  
            return $newVal;
        }
    }

    /**
     * Pychomtric test / gendrel aptitude test 
    */
    function ct_alert()
    {
        $this->ci->db->from('ch_can_test ct');
        $this->ci->db->where('ct_alert', 0);        
        $this->ci->db->select('ct_id as uid, ct.can_id as cid, can_fname as cfname, can_lname as clname, psyp_heading as name');
        $this->ci->db->join('ch_candidate c', 'c.can_id = ct.can_id', 'left');
        $this->ci->db->join('ch_psychotest_pricing cp', 'cp.psyp_id = ct.pr_id', 'left');
        return $this->ci->db->get()->result();   
    }

}

/* End of file Alert_library.php */
