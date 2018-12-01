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

}

/* End of file priceModel.php */
