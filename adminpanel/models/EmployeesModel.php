<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeesModel extends CI_Model {
    /**
     * Get all active employees details
     */
    public function getActiveLists()
    {
        $this->db->select('emp_id, emp_comp_name, emp_fname, emp_lname, emp_ccode, emp_phone, emp_email, emp_authkey, emp_reg_date, emp_update_date, why_here');
        $this->db->where('emp_status', 1);
        $this->db->where('emp_verify', 1);
        return $this->db->get('ch_employer')->result();   
    }

    /**
     * Delete employee
     */
    public function delete_employee($id)
    {
        $this->db->where('emp_authkey', $id);
        $this->db->update('ch_employer',array('emp_status'=> 2, "emp_verify"=> 2));
        if($this->db->affected_rows() > 0)
        {
            return true;
        }else{
            return false;
        }    
    }

    /**
     * Fetch all pending employees
    */
    public function getPendingLists()
    {
        $this->db->select('emp_id, emp_comp_name, emp_fname, emp_lname, emp_ccode, emp_phone, emp_email, emp_authkey, emp_reg_date, emp_update_date');
        $this->db->where('emp_status', 0);
        $this->db->where('emp_verify', 0);
        return $this->db->get('ch_employer')->result();
    }

    /**
     * Approve employee
    */
    public function approve_employee($id)
    {
        $this->db->where('emp_authkey', $id);
        $this->db->update('ch_employer',array('emp_status'=> 1, "emp_verify"=> 1));
        if($this->db->affected_rows() > 0)
        {
            return true;
        }else{
            return false;
        }    
    }

    /**
     *Company details 
    */
    public function companyDetails($id)
    {
       
        $this->db->select('ch_employer.emp_id, emp_comp_name, emp_fname, emp_lname, emp_designation, emp_ccode, emp_phone, emp_email, emp_website, emp_number, emp_desc, emp_type, emp_location, emp_jobportal, emp_jobportal, why_here, emp_authkey, emp_verify, emp_reg_date, emp_update_date, emp_encrypt_id, emp_status, sub_id, sub_packid, sub_nojobs, sub_nocv, sub_pending_cv, sub_ex_limits, sub_expire_dt, sub_type, sub_status, sub_alert, esm_id, esm_linkdin, esm_fb, esm_tw, esm_gp, esm_blog, esm_status, ep_id, ep_dispaly_name, ep_logo, ep_welcome_msg, ep_notify_email');
        // $this->db->select_sum('jp_cvs');
        $this->db->from('ch_employer');
        $this->db->where('emp_authkey', $id);
        // $this->db->order_by('sub_expire_dt', 'desc');
        // $this->db->join('ch_jobs', 'ch_jobs.job_created_by = ch_employer.emp_id', 'left');
        $this->db->join('ch_emp_subscribe', 'ch_emp_subscribe.emp_id = ch_employer.emp_id', 'left');
        $this->db->join('ch_emp_social',  'ch_emp_social.emp_id = ch_employer.emp_id', 'left');
        $this->db->join('ch_emp_profile',  'ch_emp_profile.emp_id = ch_employer.emp_id', 'left');
        $query = $this->db->get()->row_array();

        $this->pendingcv($id);
        return $query;  
        
    }


    public function subscr($id)
    {
        $this->db->select('SUM(sub_nocv) as totalcv');
        // $this->db->select_sum('sub_nocv');
        $this->db->from('ch_emp_subscribe s');
        $this->db->where('emp_authkey', $id);
        $this->db->join('ch_employer e', 'e.emp_id = s.emp_id', 'left');
        $result = $this->db->get()->row_array();
        return   $result;  
    }

    /**
     * Pending cv
     */
    public function pendingcv($id){
        $this->db->select('SUM(jp_cvs) as pending');
        // $this->db->select('*');
        $this->db->from('ch_jobs');
        $this->db->where('emp_authkey', $id);
        $this->db->join('ch_employer', 'ch_employer.emp_id = ch_jobs.job_created_by', 'right');
        $query = $this->db->get()->row_array();
        return  $query;
        
    }

    /**
     * Get subscription Detail
     */
    function getSubcriptionDetail($id)
    {
        $this->db->select('pr_name');        
        $this->db->where('pr_encrypt_id', $id);
        $query = $this->db->get('ch_pricing')->row();
        return $query->pr_name;
    }

    /**
     * Get Posted Jobs List
    */
    public function postedJobs($id)
    {
        
        $this->db->select('job_title,job_farea,hire_jobid,job_min_sal,job_max_sal,job_status,job_created_by, job_min_exp, job_max_exp, job_id, emp_id, emp_comp_name');
        $this->db->from('ch_jobs');
        $this->db->where('emp_authkey', $id);
        $this->db->join('ch_employer', 'ch_jobs.job_created_by = ch_employer.emp_id', 'left');
        return $this->db->get()->result();   
    }

    /**
     * GET FUNCTION AREA
    */
    public function getFunctionArea($fid,$jid)
    {
        $data['function'] = $this->fnarea($fid);
        $data['pllication'] = $this->apply($jid);
        return $data;
        
    }
    public function fnarea($fid)
    {
        $this->db->where('fun_id', $fid);
        $this->db->select('fun_name');   
        return $this->db->get('ch_funarea')->row();
    }
    public function apply($jid)
    {
        $this->db->where('job_id', $jid);
        $this->db->select('count(job_id) as couts');
        return $this->db->get('ch_jobapply')->row();     
    }

    /**
     * Push cv
     */
    public function pushCV($data, $alert)
    {
        $this->db->insert('ch_varified_cv', $data);
        $insert_id = $this->db->insert_id();
        if($this->db->affected_rows() > 0 ){
            $this->cvadded($data['job_id']);
            $this->alert($data['emp_id'],$insert_id, $alert);
            return true;
        }else{
            return false;
        }
    }

    /**
     * decreez verified cvs
    */
    function cvadded($jid){
        $this->db->where('job_id', $jid);
        $this->db->set('jp_cvs', 'jp_cvs-1', FALSE);
        $this->db->update('ch_jobs');
        if($this->db->affected_rows() > 0){
            return true;
        }
        else{
            return false;
        }    
    }

    /** 
     * uploaded resume count
    */
    function resumecount($id){

        $this->db->where('emp_authkey',$id);
        $this->db->from('ch_varified_cv v');
        $this->db->join('ch_employer e', 'e.emp_id = v.emp_id', 'left');
        $data = $this->db->get();
        return $data->num_rows(); 
    }

    /**
     * Uploaded Resumes
     */
    public function uploadedResumes($var)
    {
        $this->db->select('job_farea, job_title, v.job_id, v.can_id, can_fname, can_lname, can_experience, can_email');
        $this->db->from('ch_employer e');
        $this->db->where('emp_authkey',$var);
        $this->db->join('ch_varified_cv v', 'v.emp_id = e.emp_id', 'left');
        $this->db->join('ch_jobs c', 'c.job_id = v.job_id', 'left');
        $this->db->join('ch_candidate n', 'n.can_id = v.can_id', 'left');
        
        $data = $this->db->get();
        
        return $data->result();
    }

    /**
     * packagelist
     */
    public function packagelist()
    {
        $this->db->where('pr_status', 1);
        return $this->db->get('ch_pricing')->result();  
        
    }

    /**
     * updrade package
     */
    public function updradepackage()
    {
        $type = $this->input->post('type');
        $empid = $this->input->post('empid');
        $package = $this->getpackage($type);
        if(!empty($package))
        {
            $date = date('Y-m-d H:i:s',strtotime('+'.$package["peried"].' days'));
            $data = array(
                'emp_id'        => $empid, 
                'sub_packid'    => $package["pr_encrypt_id"], 
                'sub_nojobs'    => $package["pr_limit"], 
                'sub_nocv'      => $package["pr_cvno"], 
                'sub_ex_limits' => $package["exprence_level"], 
                'sub_expire_dt' => $date, 
                'sub_type'      => $package["pr_type"], 
            );
            $this->db->insert('ch_emp_subscribe', $data);
            return true;            
        }else{
            return False;
        }
    }

    /**
     * single package
     */
    function getpackage($type)
    {
        $this->db->where('pr_encrypt_id', $type);
        return $this->db->get('ch_pricing')->row_array();
    }


    /**  add alert */
    function alert($emp,$id, $alert)
    {
        $data = array(
            'ea_enc'=> $alert,
            'ea_type'=> 'Verified cv',
            'ea_ref_id'=> $id,
            'ea_createdOn'=> date('Y-m-d H:i:s'),
            'ea_createdBy'=> $emp,
        );
        $this->db->insert('ch_emp_alerts', $data);
        return true;
        
    }

    /** 
     * Filter by datewise
    */
    public function filterdate($start, $end)
    {
        $this->db->select('emp_id, emp_comp_name, emp_fname, emp_lname, emp_ccode, emp_phone, emp_email, emp_authkey, emp_reg_date, emp_update_date, why_here');
        $this->db->where('emp_reg_date >= ', $start);
        $this->db->where('emp_reg_date <=', $end);
        $this->db->where('emp_status', 1);
        $this->db->where('emp_verify', 1);
        return $this->db->get('ch_employer')->result();   
    }

}

/* End of file EmployeesModel.php */




?>