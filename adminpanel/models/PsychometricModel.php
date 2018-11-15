<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class psychometricModel extends CI_Model {

    public function get()
    {
        $this->db->select('can_fname,ct_id, can_email, can_lname, can_ccode, can_phone, ch_can_test.can_id, created_on, psyp_heading, psyp_amount');
        
        $this->db->from('ch_can_test');
        $this->db->where('ch_can_test.status', 1);
        $this->db->join('ch_candidate', 'ch_candidate.can_id = ch_can_test.can_id', 'left');
        $this->db->join('ch_psychotest_pricing', 'ch_psychotest_pricing.pys_encrpit = ch_can_test.pr_encript_id', 'left');
        return $this->db->get()->result();
    }

}

/* End of file psychometricModel.php */
