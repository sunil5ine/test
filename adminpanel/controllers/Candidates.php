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

    public function detail($id = null)
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
       $data['verify'] =  $this->candidateModel->vrifycheck($id);
       $data['price']   =  $this->candidateModel->price();
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

    public function packageUpdate()
    {
        $id = $this->input->post('empid');
        if($this->candidateModel->packageUpdate())
        {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a><p>Successfully new package updated/p></div>');
            redirect('candidates/detail/'.$id,'refresh');
            
        }else{
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p><b>Sorry! </b> Please try again</p></div>');
            redirect('candidates/detail/'.$id,'refresh');
        }  
    }

    /**
     * make candidate verified 
    */
    public function makeverify()
    {
      $id   = $this->input->post('id');
      $mark = $this->input->post('mark');
      $data = array('can_id' =>$id , 'tr_marks'=>$mark );
      if($this->candidateModel->makeverify($data))
      {
        $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a><p>Verification updated</p></div>');
        redirect('candidates/detail/'.$id,'refresh');
      }else{
        $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p><b>Sorry! </b> Please try agin later</p></div>');
        redirect('candidates/detail/'.$id,'refresh');
      }
    }

}

/* End of file candidates.php */