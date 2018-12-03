<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class priceModel extends CI_Model {

    /**
     * Candidate pricing table
     */
    function canprice()
    {
        return $this->db->get('ch_can_pricing')->result();
    }

    /**
     * single can pricing 
    */
    function getcanSingle($id)
    {
        $this->db->where('pr_encrypt_id', $id);
        return $this->db->get('ch_can_pricing')->row_array();  
    }

    /**
     * notify update 
    */
    function notiy()
    {
       $query = $this->db->update('ch_can_pricing', array('pr_notify' => '' ));
       
       if($this->db->affected_rows() > 0){
            $this->db->where('pr_encrypt_id', $this->input->post('pid'));            
            $this->db->update('ch_can_pricing', array('pr_notify' => 'Most popular' ));
            if($this->db->affected_rows() > 0){
                    return true;
                }else{
                    return false;
                }

       }else{
           return false;
       }
       return true;
    }

    /**
     * update full
    */
    function updateFull($data)
    {
        $this->db->where('pr_encrypt_id', $this->input->post('pid'));
        $this->db->update('ch_can_pricing', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }else{
            return false;
        }

    }


    /********************** E M P L O Y E R   P R I C I N G *********************/
    /**
     * Fetch all pricings
     */
    function empPrice()
    {
        return $this->db->where('pr_status', 1)->get('ch_pricing')->result();        
    }

    /**
     * update notify 
     */
    function empnotify()
    {
       $query = $this->db->update('ch_pricing', array('pr_notify' => '' ));
       
       if($this->db->affected_rows() > 0){
            $this->db->where('pr_encrypt_id', $this->input->post('eid'));            
            $this->db->update('ch_pricing', array('pr_notify' => 'Most popular' ));
            if($this->db->affected_rows() > 0){
                    return true;
                }else{
                    return false;
                }
       }else{
           return false;
       }
       return true;
    }

    /**
     * package update 
    */
    public function emppckUpdate($data, $id)
    {
        $this->db->where('pr_encrypt_id', $id);
        $this->db->update('ch_pricing',$data);
        if($this->db->affected_rows() > 0){
                return true;
        }else{
                return false;
        }   
    }
}

/* End of file priceModel.php */
