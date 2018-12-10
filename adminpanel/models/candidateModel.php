<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class candidateModel extends CI_Model {

    /**
     * Candidates list fetch
     */
    public function getlist()
    {
        $this->db->where('can_status', 1);
        $this->db->from('ch_candidate cn');
        $this->db->join('ch_country cnt', 'cnt.co_id = cn.co_id', 'left');
        return  $this->db->get()->result();
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

    /**
     * download resume
     */
    public function download($id)
    {
        $this->db->select('cv_path, cv_headline');
        $this->db->from('ch_candidate c');        
        $this->db->where('c.can_id', $id);
        $this->db->join('ch_cv r', 'r.can_id = c.can_id', 'left');
        return $this->db->get()->row_array(); 
    }

    /**
     * Current package 
     */
    function package($id)
    {
        $this->db->where('can_id', $id);
        $this->db->from('ch_can_subscribe s');
        $this->db->order_by('csub_expire_dt', 'desc');
        $this->db->select('csub_expire_dt, pr_name');        
        $this->db->join('ch_can_pricing p', 'p.pr_id = s.pr_id', 'left');
        $query = $this->db->get();
        if($query->num_rows() > 0 )
        {
            $result = $query->row_array();

            if(date('Y-m-d H:i:s') > $result['csub_expire_dt']){
                return 'Expired';
            }else{
                return $result['pr_name'];
            }
        }else{
            return 'Expired';
        }
        
        
        
       
        
        
    }

}

/* End of file candidateModel.php */
