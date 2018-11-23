<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class employees extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('adminid')) { redirect($this->config->base_url().'login'); }
        $this->load->model('employeesModel');
        
    }
    
    /**
     * Get all active employees details
    */
    public function index()
    {
        $data['title']      = 'Manage Employees';
        $data['employees']  = $this->employeesModel->getActiveLists();
        $this->load->view('employees/list', $data);
        
    }
    /**
     * Get pending activation 
     */
    public function pending()
    {
        $data['title']      = 'Pending Employees';
        $data['pendingemp']  = $this->employeesModel->getPendingLists();
        $this->load->view('employees/pending', $data);
    }

    /**
     * Delete a single employee.
     */
    public function delete_employee($id)
    {
        if($this->employeesModel->delete_employee($id))
        {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a><p>Successfully Deleted. </p></div>');
        }
        else
        {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p>Please try agin. </p></div>');
        }
        redirect('employees');
    }

    /**
     * Aprove employees
     */
    public function approve($id)
    {
        if($this->employeesModel->approve_employee($id))
        {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a><p>The pending employee Approved successfully. </p></div>');
        }
        else
        {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p>Please try agin. </p></div>');
        }
        redirect('employees/pending');
    }

    /**
     * Reject employees
     */
    public function reject($id)
    {
        if($this->employeesModel->delete_employee($id))
        {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a><p>Employer registered successfully. </p></div>');
        }
        else
        {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p>Please try agin. </p></div>');
        }
        redirect('employees/pending');
    }

    /**
     * EMPLOYEERS DETAIL
    */
    public function details($id)
    {
        $data['employers'] = $this->employeesModel->companyDetails($id);
        $data['title'] = $data['employers']['emp_comp_name'] .' | CherryHire employers';
        $this->load->view('employees/detail', $data, FALSE);
    }

    /**
     * EMPLOYEERS POSTED JOBS
    */
    public function posted_jobs($id)
    {
        $data['jobs'] = $this->employeesModel->postedJobs($id);
        $data['employers'] = $this->employeesModel->companyDetails($id);
        $data['title'] = $data['jobs']['0']->emp_comp_name.' | CherryHire employers';
        $this->load->view('employees/jobs', $data, FALSE);
    }




}

/* End of file Controllername.php */


?>