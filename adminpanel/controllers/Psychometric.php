<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class psychometric extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('adminid')) { redirect($this->config->base_url().'login'); }
        $this->load->model('psychometricModel');
    }
    

    public function index()
    {
        $data['title'] = 'psychometric test';
        $data['test'] = $this->psychometricModel->get();
        $this->load->view('psycometrics/list', $data, FALSE);
    }

    function test()
    {
        $this->load->view('login1');
        
    }

}

/* End of file psychometric.php */
