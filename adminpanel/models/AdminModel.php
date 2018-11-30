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

    /**
     * Get single user
     */
    function singleuser($id)
    {
        $this->db->where('ad_id', $id);
        return $this->db->get('ch_admin')->row_array();        
    }

    /**
     * Admin user updation 
     */
    function update($input)
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
        $this->db->where('ad_id', $input['id']);
        $this->db->update('ch_admin', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
    }

    /**
    * Admin Profile 
    */
    function getProfile()
    {
        $id= $this->session->userdata('adminid');
        $this->db->select('*');
        $this->db->from('ch_admin a');
        $this->db->where('a.ad_id', $id);
        $this->db->join('ch_admin_profile p', 'p.ad_id = a.ad_id', 'left');
        return $this->db->get()->row_array();    
    }

    /**
     * admin user account upatation  
    */
    function upadteAdminUserAccount()
    {
        
        $id= $this->session->userdata('adminid');
        $data = array(
            'ad_name'       => $this->input->post('name'), 
            'ad_email'      => $this->input->post('email'), 
            'ad_hash'       => $this->input->post('psw'), 
            'ad_password'   => md5($this->input->post('psw')), 
            'aut_rese'      => md5($this->input->post('name')),
        );
        $this->db->where('ad_id', $id);
        $this->db->update('ch_admin', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return true;
        }
    }

    /**
     * admin user detail update 
     */
    function update_profile($profileupdate, $id)
    {
        $this->db->where('ad_id', $id);
        $Var = $this->db->get('ch_admin_profile');
       if($Var->num_rows() > 0){
        $this->db->where('ad_id', $id);
        $this->db->update('ch_admin_profile', $profileupdate); 
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }         
       }else{
           $this->db->insert('ch_admin_profile', $profileupdate);
           if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
       }    
    }

}

/* End of file adminModel.php */

