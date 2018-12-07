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
       $data['package'] =  $this->candidateModel->package($id);

       $this->load->view('candidate/detail', $data);
    }

    public function download_resume($id = null)
    {
        $data = $this->candidateModel->download($id);
        $this->load->helper('download');
        if(!empty($data['cv_path'])){
            $file = file_get_contents($data['cv_path']);
            $name = $data['cv_headline'];
            force_download($data['cv_path'], $file);
        }else{
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p><b>Sorry! </b> No CV found</p></div>');
        }
        
        redirect('candidates/detail/'.$id,'refresh');
        
        
    }

}

/* End of file candidates.php */