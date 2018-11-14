<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class candidateModel extends CI_Model {

    /**
     * Candidates list fetch
     */
    public function getlist()
    {
        $this->db->where('can_status', 1);
        return  $this->db->get('ch_candidate')->result();
        
        
    }
    

}

/* End of file candidateModel.php */
