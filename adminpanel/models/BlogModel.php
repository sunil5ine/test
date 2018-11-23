<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class BlogModel extends CI_Model {

    public function addpost($data)
    {
        $this->db->insert('ch_blogposts', $data);
        
        if($this->db->affected_rows() > 0)
        {
            return true;
        }else{
            return false;
        }
        
        
    }

}

/* End of file BlogModel.php */
