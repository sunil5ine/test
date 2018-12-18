<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class testimonialModel extends CI_Model {

   /** testimonial list */ 
   public function get()
   {
      return $this->db->where('status', '1')->get('ch_testimonial')->result();
   }

   /** Insert new tetimonials */
   public function insertnew($data)
   {
       $this->db->insert('ch_testimonial', $data);
       if($this->db->affected_rows() > 0){
           return true;
       }else{
           return false;
       }   
   }

   /** delete the testimonial */
   public function delete($id)
   {
        $this->db->where('ts_id', $id)->delete('ch_testimonial');
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }   
   }

   /** get single data */
   public function getsingle($id)
   {
        return $this->db->where('ts_id', $id)->get('ch_testimonial')->row_array();
   }

   /** update */
   public function update($id,$data)
    {
        $this->db->where('ts_id', $id)->update('ch_testimonial',$data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }   
    }   
}

/* End of file TestimonialModel.php */

