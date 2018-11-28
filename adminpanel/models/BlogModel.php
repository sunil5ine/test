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
    
    /**
     * Get single blog
     */
    function getsingle($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('ch_blogposts');   
        if($query->num_rows() > 0)   {
            return $query->row_array();
        }  else{
            return false;
        }
        
    }

    /**
     * Update blog
     */
    function update($data,$id)
    {
        $this->db->where('id', $id);
        $this->db->update('ch_blogposts', $data);
        if($this->db->affected_rows() > 0 ){
            return true;
        }else{
            return false;
        }        
    }

    function delete($id){
        $this->db->where('id', $id);
        $this->db->delete('ch_blogposts');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }
        
        
        
    }



}

/* End of file BlogModel.php */
