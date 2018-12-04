<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class search extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('adminid')) { redirect($this->config->base_url().'login'); }
        $this->load->model('searchModel');
    }
    

    public function index()
    {
      $data['title']    = 'Canadidate Search | Cherry Hire';
      $data['ind']      = $this->searchModel->industry();
      $data['nat']      = $this->searchModel->nationality();
      $this->load->view('search/index', $data, FALSE);   
    }

    public function result()
    {
        $des    = $this->input->post('desgnation');
        $edu    = $this->input->post('education');
        $exf    = $this->input->post('expf');
        $ext    = $this->input->post('expto');
        $ind    = $this->input->post('ind');
        $gend   = $this->input->post('gender');
        $nat    = $this->input->post('nation');
        $lct    = $this->input->post('loacation');
        $skills =  $this->input->post('skills');
        $data['result'] = $this->searchModel->searchResult($des, $edu, $exf, $ext, $ind, $gend, $nat, $lct,$skills);
        $data['title']    = 'Canadidate Search result | Cherry Hire';
        $this->load->view('search/result', $data, FALSE);
        
    }

}

/* End of file search.php */
