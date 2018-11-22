<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class price extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('adminid')) { redirect($this->config->base_url().'login'); }
        $this->load->model('employeesModel');
        
    }

    public function index()
    {
        $data['title'] = 'Manage Pricing';
        $this->load->view('pricing/list', $data, FALSE);
        
    }

}

/* End of file price.php */
