<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class cvwriting extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('adminid')) { redirect($this->config->base_url().'login'); }
		$this->load->model('cvwritingModel');
    }
    

    public function index()
    {
        $data['title'] = 'CV Writing';
        $data['cv']    = $this->cvwritingModel->getCvs();
        $this->load->view('cv/list',$data);
        
    }

}

/* End of file cvwriting.php */
