<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class candidateModel extends CI_Model {

    /**
     * Candidates list fetch
     */
    public function getlist()
    {
        $this->db->distinct('r.can_id');
        $this->db->select('cn.can_id, can_encrypt_id, can_fname, can_lname, can_ccode, can_phone, can_email, can_password, can_hash, can_dob, can_gender, edu_id, cn.co_id, can_experience, can_curr_company, can_curr_desig, can_curr_loc, can_pref_loc, can_curr_sal, fun_id, ind_id, jr_id, can_skills, can_relocate, can_alert, can_propic, can_reg_date, can_upd_date, can_vcode, can_hireid, can_status, co_code, co_iso_code, co_name, co_nationality, co_priority, co_status, tr_id, tr_marks, CreatedOn, why_here');
        $this->db->where('can_status', 1);
        $this->db->from('ch_candidate cn');
        $this->db->join('ch_country cnt', 'cnt.co_id = cn.co_id', 'left');
        $this->db->join('test_result r', 'r.can_id = cn.can_id', 'left');
        return $this->db->get()->result();
        
    }

    /**
     * check varified candtate
     * @param  [type] $id [can id]
     * @return [type]     [fetch verified candidate marks]
     */
    public function vrifycheck($id)
    {
        $this->db->select('tr_id, tr_marks, CreatedOn');
        $this->db->where('r.can_id', $id);
        $this->db->where('tr_marks >=', 35);
        $this->db->from('test_result r');
        $this->db->join('ch_candidate c', 'c.can_id = r.can_id', 'left');
        return $this->db->get()->row_array();
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
        $this->db->select('ind_sdisplay as ind_name,ind_id');
        $this->db->where('ind_id', $id);
        return   $this->db->get('enum_industry')->row_array();    
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
        $this->db->select('cexp_company, cexp_location,cexp_to_mon,cexp_from_mon,cexp_from_yr,cexp_from_yr,cexp_to_yr,cexp_position,cexp_present ');
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

    /**
     * Pricing list
    */
    function price()
    {
        $this->db->select('pr_encrypt_id, pr_name, pr_orginal');
        return $this->db->get('ch_can_pricing')->result();        
    }

    /** 
     * update package
    */
    function packageUpdate()
    {
        $type  = $this->input->post('type');
        $canid = $this->input->post('empid');
        if($packge = $this->getsinglePcakage($type))
        {
            if($this->updatepackage($canid,$packge))
            {
                $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a><p>Successfully Package updated</p></div>');
                return true;
            }else{
                $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p><b>Sorry! </b> Package update failed.<br> Try agin.</p></div>');
                return false;
            }
        }
        else{
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p><b>Sorry! </b> This package is not available</p></div>');
            return false;
        }
        
    }

    /** 
     * Get single package 
    */
    function getsinglePcakage($type)
    {
        $this->db->where('pr_encrypt_id', $type);
        return $this->db->get('ch_can_pricing')->row_array();        
    }

    /**
     * update candidate package
    */
    function updatepackage($canid,$packge)
    {
        $limits = $packge['pr_limit'] * 30;   
        $date = date('Y-m-d H:i:s',strtotime('+ '.$limits.' days'));
        $data = array(
            'can_id'            => $canid ,
            'csub_nojobs'       => $packge['pr_nojob'],
            'csub_expire_dt'    => $date,
            'csub_type'         => $packge['pr_type'],
            'pr_id'             => $packge['pr_id'],
        );
        $this->db->insert('ch_can_subscribe', $data);
        if($this->db->affected_rows() > 0)
        {
            return true;
        }else{
            return false;
        }  
    }

    /** 
     * Make candidate verified
    */
    public function makeverify($data)
    {
        $this->db->where('can_id', $data['can_id']);
        $qu = $this->db->get('test_result');
        if($qu->num_rows() > 0){
            $this->db->where('can_id', $data['can_id']);
            $this->db->update('test_result', array('tr_marks'=>$data['tr_marks']));
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            } 
        }else{
            $query = $this->db->insert('test_result', $data);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            } 
        }    
    }

    /** 
     * filter date wise
    */
    public function filterdate($start, $end)
    {
        $this->db->distinct('r.can_id');
        $this->db->select('cn.can_id, can_encrypt_id, can_fname, can_lname, can_ccode, can_phone, can_email, can_password, can_hash, can_dob, can_gender, edu_id, cn.co_id, can_experience, can_curr_company, can_curr_desig, can_curr_loc, can_pref_loc, can_curr_sal, fun_id, ind_id, jr_id, can_skills, can_relocate, can_alert, can_propic, can_reg_date, can_upd_date, can_vcode, can_hireid, can_status, co_code, co_iso_code, co_name, co_nationality, co_priority, co_status, tr_id, tr_marks, CreatedOn, why_here');
        $this->db->where('can_reg_date >= ', $start);
        $this->db->where('can_reg_date <=', $end);
        $this->db->where('can_status', 1);
        $this->db->from('ch_candidate cn');
        $this->db->join('ch_country cnt', 'cnt.co_id = cn.co_id', 'left');
        $this->db->join('test_result r', 'r.can_id = cn.can_id', 'left');
        return $this->db->get()->result();
    }
}

/* End of file candidateModel.php */
