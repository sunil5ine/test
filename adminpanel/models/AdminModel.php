<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class adminModel extends CI_Model {

    function isuniq($email)
    {
        $this->db->where('ad_email', $email);
        $query = $this->db->get('ch_admin');
        if($query->num_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }   
    }

    /**
     * new admin
    */
    function newadmin()
    {
        if($this->input->post('type') == "on"){$type='1';}else{$type='0';}
        $data = array(
            'ad_name'       => $this->input->post('user'), 
            'ad_email'      => $this->input->post('email'), 
            'ad_hash'       => $this->input->post('psw'), 
            'ad_password'   => md5($this->input->post('psw')), 
            'aut_rese'      => md5($this->input->post('user')),
            'ad_status'     => '1',
            'type'          => $type,
        );
        $this->db->insert('ch_admin', $data);
        if($this->db->affected_rows() > 0)
        {
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function lists()
    {
        $this->db->where('ad_status', 1);
        return $this->db->get('ch_admin')->result();    
    }

    /**
     * Delete admin user
     */
    function delete($id)
    {
        $this->db->where('ad_id', $id);
        $this->db->delete('ch_admin');
        if($this->db->affected_rows() > 0 )
        {
            return true;
        }else{
            return false;
        }
        
        
        
    }
    

}

/* End of file adminModel.php */

