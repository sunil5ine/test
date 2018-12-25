<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class benifitsModel extends CI_Model {

    /** cv visitor */
    public function cvVisitor()
    {

        $id = $this->session->userdata('cand_chid');
        $this->db->select('createdOn, emp_comp_name, emp_designation,emp_location');        
        $this->db->where('can_id', $id);
        $this->db->from('ch_cv_download cd');
        $this->db->join('ch_employer emp', 'emp.emp_id = cd.emp_id', 'left');
        return $this->db->get()->result();       
    }



   


}

/* End of file benifitsModel.php */
