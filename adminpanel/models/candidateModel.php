<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class candidateModel extends CI_Model {

    /**
     * Candidates list fetch
     */
    public function getlist()
    {
        $this->db->where('can_status', 1);
        return  $this->db->get('ch_candidate')->result();
    }

    /**
     * Get single employee 
    */
    public function getSingleCandidate($id)
    {
        $this->db->select('*');
        $this->db->where('can_id', $id);
        return  $this->db->get('ch_candidate')->row_array();   
    }

    /**
     * Single indestry 
    */
    public function canInd($id)
    {
        $this->db->where('ind_id', $id);
        return $this->db->get('ch_industry')->row_array();    
    }

    /**
     * Cv
    */
    public function cv($id)
    {
        $this->db->select('cv_path,cv_headline');
        $this->db->where('can_id', $id);
        return $this->db->get('ch_cv')->row_array();    
    }

    /**
     * social media
    */
    public function social($id)
    {
        $this->db->select('sm_linkdin, 	sm_fb, sm_tw, sm_gp');
        $this->db->where('can_id', $id);
        return $this->db->get('ch_socialmedia')->row_array();    
    }

    /**
     * Function area
    */
    public function fun($id)
    {
        $this->db->select('fun_name');
        $this->db->where('fun_id', $id);
        return $this->db->get('ch_funarea')->row_array();
    }

    /**
     * Expireance
    */
    public function expireance($id)
    {
        $this->db->select('cexp_company, cexp_location,cexp_from_mon,cexp_from_yr,cexp_from_yr,cexp_to_yr,cexp_position,cexp_present ');
        $this->db->where('can_id', $id);
        return $this->db->get('ch_candidate_exp')->row_array();
    }

    /**
     * Education
    */
    public function education($id)
    {
        $this->db->select('cedu_school, cedu_specialization, cedu_startdt, cedu_enddt');
        
        $this->db->where('can_id', $id);
        return $this->db->get('ch_candidate_education')->row_array();
    }

}

/* End of file candidateModel.php */
