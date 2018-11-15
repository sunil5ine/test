<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class candidates extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('adminid')) { redirect($this->config->base_url().'login'); }
        $this->load->model('candidateModel');
        
    }
    

    public function index()
    {
        $data['title'] = 'Candidates';
        $data['candidate'] = $this->candidateModel->getlist();
        $this->load->view('candidate/candidate-list', $data, FALSE); 
    }

    public function detail($id)
    {
       $data['title']   = 'Candidates Detail';
       $data['profile'] =  $this->candidateModel->getSingleCandidate($id);
       $data['ind']     =  $this->candidateModel->canInd($data['profile']['ind_id']);
       $data['cv']      =  $this->candidateModel->cv($id);
       $data['social']  =  $this->candidateModel->social($id);
       $data['fun']     =  $this->candidateModel->fun($data['profile']['fun_id']);
       $data['exp']     =  $this->candidateModel->expireance($id);
       $data['edu']     =  $this->candidateModel->education($id);

       $this->load->view('candidate/detail', $data);
       
    }

}

/* End of file candidates.php */