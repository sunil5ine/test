<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class partnersModel extends CI_Model {

    public function getlist()
    {
        $this->db->order_by('pt_id', 'desc');
        return $this->db->get('ch_partners')->result();        
    }

}

/* End of file partnersModel.php */
