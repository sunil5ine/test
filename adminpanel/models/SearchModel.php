<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class searchModel extends CI_Model {

   function industry()
   {
       $this->db->order_by('ind_name', 'asc');
       $this->db->where('ind_status', 1);
       return $this->db->get('ch_industry')->result();
   }

   function nationality()
   {
       $this->db->select('co_id, co_nationality, co_name');
       $this->db->order_by('co_nationality', 'asc');
       $this->db->where('co_nationality IS NOT NULL');
       return $this->db->get('ch_country')->result();
   }

   function searchResult($des= null, $edu= null, $exf= null, $ext= null, $ind= null, $gend= null, $na= null, $lct= null, $skills= null)
   {
       $this->db->where('can_status', 1);
       $this->db->select('*');
       $this->db->from('ch_candidate');
       if($ext != NULL){
           
        if($exf == null){ $exf = 0; }
         $this->db->where('can_experience >=', $exf);
         $this->db->where('can_experience <=', $ext);
        }
        $this->db->like('can_curr_desig', $des, 'both');
        $this->db->like('edu_id', $edu, 'both');
        $this->db->like('can_gender', $gend, 'both');
        $this->db->like('co_id', $na, 'both');
        $this->db->like('can_curr_loc', $lct, 'both');
        $this->db->like('ind_id', $ind, 'both');
        $array_like = explode(',', $skills);
        foreach($array_like as $key => $value) {
            if($key == 0) {
                $this->db->like('can_skills', $value);
            } else {
                $this->db->or_like('can_skills', $value);
            }
        }
       
       return $this->db->get()->result();
       
    //    $this->db->join('ch_country cn', 'cn.co_id = c.co_id', 'left');
    //    $this->db->join('ch_industry i', 'i.ind_id = c.ind_id', 'left');
    //    $this->db->join('ch_industry i', 'i.ind_id = c.ind_id', 'left');
       
       
       

       
       
   }

}

/* End of file searchModel.php */
