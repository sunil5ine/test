<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class price extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('adminid')) { redirect($this->config->base_url().'login'); }
        $this->load->model('priceModel');
        
    }

    public function index()
    {
        $data['title'] = 'Manage Pricing';
        $data['canprice'] = $this->priceModel->canprice();
        $this->load->view('pricing/list', $data, FALSE);
    }

    /**
     * Get can pricing single
     */
    public function update($id)
    {
        $data['canPrice'] = $this->priceModel->getcanSingle($id);
        $data['title'] = 'Manage Pricing | edite Pricing';
        // echo "<pre>";
        // print_r ($data['canPrice']);
        // echo "</pre>";
        $this->load->view('pricing/canedite',$data);   
        
    }

}

/* End of file price.php */
