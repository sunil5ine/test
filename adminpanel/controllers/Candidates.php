<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class candidates extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('candidateModel');
        
    }
    

    public function index()
    {
        $data['title'] = 'Candidates';
        $data['candidate'] = $this->candidateModel->getlist();
        $this->load->view('candidate/candidate-list', $data, FALSE); 
    }

    public function detail()
    {
       $data['title'] = 'Candidates Detail';
       $this->load->view('candidate/detail', $data, FALSE);
       
    }

}

/* End of file candidates.php */