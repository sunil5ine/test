<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class cvwritingModel extends CI_Model {

    public function getCvs()
    {
       
        $this->db->select('cvw_cover, cvw_express, cvw_amt, can_fname, can_lname, can_email, trans_id, can_ccode, can_phone, cvw_date, ch_cv_writing.can_id, cvw_id');
        $this->db->from('ch_cv_writing');
        $this->db->where('cvw_status', 0);
        $this->db->join('ch_candidate', 'ch_candidate.can_id = ch_cv_writing.can_id', 'left');
                
        return $this->db->get()->result();
        
    }

}

/* End of file cvwritingModel.php */
