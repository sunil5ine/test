<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class blogModel extends CI_Model {

    /**
     * Get all list
     */
    function getlist()
    {
        $now = date('Y-m-d');
        $this->db->where('postOn <=', $now);
        $this->db->where('bg_status', 1);
        return  $this->db->get('ch_blogposts')->result();        
    }

        /**
         * Get single list
         */
    function singlegetlist($id)
    {
        $this->db->where('id', $id);
        return  $this->db->get('ch_blogposts')->row_array(); 
    }

    /**
     * get next blog
     */
    function next($id){
        $now = date('Y-m-d');
        $this->db->where('id >', $id);
        $this->db->select('id,title');
        $this->db->where('postOn <=', $now);
        $this->db->where('bg_status', 1);
        $this->db->order_by('id', 'asc');        
        return  $this->db->get('ch_blogposts')->row_array();         
    }

    /**
     * get privious list
     */
    function previous($id){
        $now = date('Y-m-d');
        $this->db->where('id <', $id);
        $this->db->select('id,title');
        $this->db->where('postOn <=', $now);
        $this->db->where('bg_status', 1);
        $this->db->order_by('id', 'desc');        
        return  $this->db->get('ch_blogposts')->row_array();   
    }

    /**
     * Get 3 blogs 
    */
    function getfblog($id)
    {
        $now = date('Y-m-d');
        $this->db->where('id !=', $id);
        $this->db->where('postOn <=', $now);
        $this->db->where('bg_status', 1);
        $this->db->order_by('id', 'desc');
        $this->db->limit(3);        
        return  $this->db->get('ch_blogposts')->result();
        
    }
    

}

/* End of file BlogModel.php */
