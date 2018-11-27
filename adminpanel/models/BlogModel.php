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

    /**
     * Get list
     */
    function getblog()
    {
        $this->db->order_by('creted_on', 'desc');
        return $this->db->get('ch_blogposts')->result();        
    }
    

}

/* End of file BlogModel.php */
