<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class blogModel extends CI_Model {


    function getlist()
    {
        $now = date('Y-m-d');
        $this->db->where('postOn <=', $now);
        $this->db->where('bg_status', 1);
        return  $this->db->get('ch_blogposts')->result();        
    }

    function singlegetlist($id)
    {
        $this->db->where('id', $id);
        return  $this->db->get('ch_blogposts')->row_array(); 
    }
    

}

/* End of file BlogModel.php */
