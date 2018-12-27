<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class alert_lib
{
    protected $ci;

    public function __construct()
    {
        $this->ci =& get_instance();
        $this->ci->load->database();
        if($this->session->userdata('cand_chid')){
            $this->alertsets();
        }
    }

    public function alertsets()
    {
        $alert[] = $this->cvdownload();
    }
    

}

/* End of file Alert_lib.php */
