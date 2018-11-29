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

    /**
     * Post a job
     */
    public function post(){
        $input = $this->input->post();
        $this->load->helper('string');
        $sal = explode('~', $input['salary']);
        $minsal = $sal['0']; $maxsal = $sal['1'];
        $data = array(
            'job_title'         => $input['title'],
            'job_role'          => $input['role'],
            'job_type'          => $input['type'],
            'job_location'      => $input['location'],
            'job_min_exp'       => $input['minexp'],
            'job_max_exp'       => $input['maxexp'],
            'job_min_sal'       => $minsal,
            'job_max_sal'       => $maxsal,
            'job_farea'         => $input['funarea'],
            'job_edu'           => $input['education'],
            'job_industry'      => $input['industry'],
            'job_desc'          => $input['jobdesc'],
            'job_company'       => $input['hcompany'],
            'job_notifyemail'   => $input['notifyemail'],
            'job_notes'         => $input['jobnotes'],
            'job_skills'        => $input['skils'],
            'jp_cvs'            => $input['cv'],
            'hire_status'       => 'success',
            'job_url_id'        => random_string('alnum', 26),
            'job_created_by'    => '0',
            'job_created_dt'    => date('Y-m-d H:i:s'),
            'hire_jobid'        =>'0',
            'job_updated_dt'    => date('Y-m-d H:i:s'),

        );
        if ($this->jobsModel->potJob($data)) {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green darken-4"><a class="close-tost ">X</a><p>Successfully Job Posted </p></div>');
            redirect('jobs/manage-jobs');
            
        }else{
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red "><a class="close-tost ">X</a><p>Unavailable to post this job! <br> Please try again later. </p></div>');
            redirect('jobs/add');
        }
    }

    /**
     * edite Job
     */
    public function edite($id){
        $data['funarea']    = $this->jobsModel->funarea();
        $data['industry']   = $this->jobsModel->industry();
        $data['education']  = $this->jobsModel->education();
        $data['location']   = $this->jobsModel->location();
        $data['jobs']       = $this->jobsModel->singlejob($id);
        $this->load->view('jobs/edite', $data, FALSE);
        
    }

    /**
     * Update job detail
     */
    public function update_post()
    {
        $input = $this->input->post();

        $sal = explode('~', $input['salary']);
        $minsal = $sal['0']; $maxsal = $sal['1'];
        $data = array(
            'job_title'         => $input['title'],
            'job_role'          => $input['role'],
            'job_type'          => $input['type'],
            'job_location'      => $input['location'],
            'job_min_exp'       => $input['minexp'],
            'job_max_exp'       => $input['maxexp'],
            'job_min_sal'       => $minsal,
            'job_max_sal'       => $maxsal,
            'job_farea'         => $input['funarea'],
            'job_edu'           => $input['education'],
            'job_industry'      => $input['industry'],
            'job_desc'          => $input['jobdesc'],
            'job_company'       => $input['hcompany'],
            'job_notifyemail'   => $input['notifyemail'],
            'job_notes'         => $input['jobnotes'],
            'job_skills'        => $input['skils'],
            'jp_cvs'            => $input['cv'],
            'job_updated_dt'    => date('Y-m-d H:i:s'),
        );
        
        if ($this->jobsModel->updateJob($data,$input['id'])) {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green darken-4"><a class="close-tost ">X</a><p>Successfully Job updated </p></div>');
            redirect('jobs/detail/'.$input['id']);
            
        }else{
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red "><a class="close-tost ">X</a><p>Unavailable to upload this job! <br> Please try again later. </p></div>');
            redirect('jobs/edite/'.$input['id']);
        }
    }

    /**
     * Pllied list
     */
    public function applied($id)
    {
        $data['candidate'] = $this->jobsModel->getapplication($id);
        $data['title'] = 'Job applied list | Cherryhire';
        $this->load->view('jobs/applied-list', $data, FALSE);
        
    }
}

/* End of file jobs.php */
