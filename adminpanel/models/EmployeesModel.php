<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class EmployeesModel extends CI_Model {
    /**
     * Get all active employees details
     */
    public function getActiveLists()
    {
        $this->db->select('emp_id, emp_comp_name, emp_fname, emp_lname, emp_ccode, emp_phone, emp_email, emp_authkey, emp_reg_date, emp_update_date');
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
       
        $this->db->select('*');
        // $this->db->select_sum('jp_cvs');
        $this->db->from('ch_employer');
        $this->db->where('emp_authkey', $id);
        $this->db->order_by('sub_expire_dt', 'desc');
        // $this->db->join('ch_jobs', 'ch_jobs.job_created_by = ch_employer.emp_id', 'left');
        $this->db->join('ch_emp_subscribe', 'ch_emp_subscribe.emp_id = ch_employer.emp_id', 'left');
        $this->db->join('ch_emp_social',  'ch_emp_social.emp_id = ch_employer.emp_id', 'left');
        $this->db->join('ch_emp_profile',  'ch_emp_profile.emp_id = ch_employer.emp_id', 'left');
        $query = $this->db->get()->row_array();

        $this->pendingcv($id);
        return $query;  
        
    }

    /**
     * Pending cv
     */
    public function pendingcv($id){
        $this->db->select_sum('jp_cvs');
        $this->db->from('ch_employer');
        $this->db->where('emp_authkey', $id);
        $this->db->join('ch_jobs', 'ch_jobs.job_created_by = ch_employer.emp_id', 'left');
        $query = $this->db->get()->row_array();
        
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
    public function pushCV($data)
    {
        $this->db->insert('ch_varified_cv', $data);
        if($this->db->affected_rows() > 0 ){
            $this->cvadded($data['job_id']);
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

}

/* End of file EmployeesModel.php */




?>