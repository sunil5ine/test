<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class jobsModel extends CI_Model {

    function getLists()
    {
        $this->db->select('j.job_title, j.job_id, j.job_location,j.job_url_id, f.fun_name, j.job_company, j.job_status, e.emp_authkey, j.job_created_dt');
        $this->db->from('ch_jobs j');
        $this->db->join('ch_funarea f', 'f.fun_id = j.job_farea', 'left');
        $this->db->join('ch_employer e', 'e.emp_id = j.job_created_by', 'left');
        $this->db->order_by('j.job_created_dt', 'desc');
        return $this->db->get()->result();        
    }

    /**
     * Detail of single job
     */
    function detail($id)
    {
        $this->db->select('job_company,job_id, job_title, job_status, job_title, job_notifyemail, fun_name, job_role, job_type, job_min_exp, job_max_exp, job_min_sal, job_max_sal, job_location, edu_name, job_industry, job_skills, job_created_dt, job_desc');
        $this->db->from('ch_jobs j');
        $this->db->where('j.job_id', $id);
        $this->db->join('ch_funarea f', 'f.fun_id = j.job_farea', 'left');
        $this->db->join('ch_education e', 'e.edu_id = j.job_edu', 'left');
        return $this->db->get()->row_array();     
    }

    /**
     * Delete Job 
    */    
    function delete($id)
    {
        $this->db->where('job_id', $id);
        $this->db->delete('ch_jobs');
        if($this->db->affected_rows() > 0)
        {
            return true;
        }
        else{
            return false;
        }  
    }

    /**
     * function area 
    */
    function funarea()
    {
        return $this->db->get('ch_funarea ')->result();        
    }

    /**
     * Location 
    */
    function location()
    {
        return $this->db->get('ch_country ')->result();        
    }

    /**
     * industry 
    */
    function industry()
    {
        return $this->db->get('enum_industry ')->result();        
    }

    /**
     * education 
    */
    function education()
    {
        return $this->db->get('ch_education ')->result();        
    }

    /**
     *Comany name 
    */
    function company()
    {
        $this->db->select('emp_comp_name');
        return $this->db->get('ch_employer')->result();
    }
    

}

/* End of file jobsModel.php */
