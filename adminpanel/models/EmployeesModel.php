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

}

/* End of file EmployeesModel.php */




?>