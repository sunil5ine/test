<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class alert_lib
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->database();
        if( $this->ci->session->userdata('cand_chid')){
            $this->alertsets();
        }
    }

    public function alertsets()
    {
        $this->ci->db->where('can_id', $this->ci->session->userdata('cand_chid'));
        $this->ci->db->limit(5);
        $this->ci->db->where('ca_status', 1);
        $this->ci->db->order_by('ca_date', 'desc');
        $result['alerts'] =  $this->ci->db->get('ch_can_alert')->result();
        
        
        $this->ci->db->where('can_id', $this->ci->session->userdata('cand_chid'));
        $this->ci->db->where('ca_status', 1);
        $result['count'] =  $this->ci->db->get('ch_can_alert')->num_rows();

        return  $result;
        
    }
    




}

/* End of file Alert_lib.php */
