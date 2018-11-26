<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class jobs extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('adminid')) { redirect($this->config->base_url().'login'); }
        $this->load->model('jobsModel');
    }
    

    public function index()
    {
        $data['jobs'] = $this->jobsModel->getLists();
        $data['title'] = 'Manage Jobs';
        $this->load->view('jobs/list', $data, FALSE);        
    }

    /**
     * Detail of job
    */
    public function detail($id= null){
        $data['detail'] = $this->jobsModel->detail($id);
        $data['title'] = 'Job detail |Cherryhire Manage Jobs';
        $this->load->view('jobs/detail', $data, FALSE);
    }

    /**
     * Delete Jobs
    */
    public function delete($id = null)
    {
       if($this->jobsModel->delete($id))
       {
        $this->session->set_flashdata('messeg', '<div id="snackbar" class="green darken-4"><a class="close-tost ">X</a><p>Successfully deleted the job </p></div>');
            redirect('jobs/manage-jobs','refresh');   
       }else{
        $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p>Cannot deleted the selected item<br /> Please try agin later! </p></div>');
         redirect('jobs/manage-jobs','refresh');
       }
       
    }

    /**
     * Add New Job
    */
    public function add(){
        $data['title'] = 'Add New Job | Cherryhire Manage Jobs';
        $data['funarea'] = $this->jobsModel->funarea();
        $data['industry'] = $this->jobsModel->industry();
        $data['education'] = $this->jobsModel->education();
        $data['location'] = $this->jobsModel->location();
        
        $this->load->view('jobs/add-jobs', $data, FALSE);
        
    }
}

/* End of file jobs.php */
