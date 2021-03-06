<?php

defined('BASEPATH') or exit('No direct script access allowed');

class employees extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('adminid')) {redirect($this->config->base_url() . 'login');}
        $this->load->model('employeesModel');

    }

    /**
     * Get all active employees details
     */
    public function index()
    {
        $data['title'] = 'Manage Employees';
        $data['employees'] = $this->employeesModel->getActiveLists();
        $this->load->view('employees/list', $data);

    }

    /**
     * Get pending activation
     */
    public function pending()
    {
        $data['title'] = 'Pending Employees';
        $data['pendingemp'] = $this->employeesModel->getPendingLists();
        $this->load->view('employees/pending', $data);
    }

    /**
     * Delete a single employee.
     */
    public function delete_employee($id)
    {
        if ($this->employeesModel->delete_employee($id)) {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a><p>Successfully Deleted. </p></div>');
        } else {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p>Please try agin. </p></div>');
        }
        redirect('employees');
    }

    /**
     * Aprove employees
     */
    public function approve($id)
    {
        if ($this->employeesModel->approve_employee($id)) {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a><p>The pending employee Approved successfully. </p></div>');
        } else {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p>Please try agin. </p></div>');
        }
        redirect('employees/pending');
    }

    /**
     * Reject employees
     */
    public function reject($id)
    {
        if ($this->employeesModel->delete_employee($id)) {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a><p>Employer registered successfully. </p></div>');
        } else {
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
        $data['package'] = $this->employeesModel->packagelist();
        $data['jobs'] = $this->employeesModel->postedJobs($id);
        $data['subscr'] = $this->employeesModel->subscr($id);
        $data['pending'] = $this->employeesModel->pendingcv($id);
        $data['uploades'] = $this->employeesModel->resumecount($id);
        $data['title'] = $data['employers']['emp_comp_name'] . ' | CherryHire employers';
        $this->load->view('employees/detail', $data, false);
    }

    /**
     * EMPLOYEERS POSTED JOBS
     */
    public function posted_jobs($id)
    {
        $data['jobs'] = $this->employeesModel->postedJobs($id);
        $data['employers'] = $this->employeesModel->companyDetails($id);
        $data['package'] = $this->employeesModel->packagelist();
        $data['subscr'] = $this->employeesModel->subscr($id);
        $data['pending'] = $this->employeesModel->pendingcv($id);
        $data['uploades'] = $this->employeesModel->resumecount($id);
        // $data['title'] = $data['jobs']['0']->emp_comp_name.' | CherryHire employers';
        $data['title'] = 'Posted Jobs | CherryHire employers';
        $this->load->view('employees/jobs', $data, false);
    }

    /**
     *  Push CVs
     */
    public function pushCv()
    {
        $uqid = $this->input->post('uqid');
        $alert = 'VRD_CV_' . date('YmdHis');
        $data = array(
            'job_id' => $this->input->post('job'),
            'emp_id' => $this->input->post('empId'),
            'can_id' => $this->input->post('canId'),
            'vc_des' => $this->input->post('des'),
            'vc_alert' => $alert,
            'vc_createdBy' => $this->session->userdata('adminid'),
        );
        if ($this->employeesModel->pushCV($data, $alert)) {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a><p>Successfully verified CV submited</p></div>');
            redirect('employees/posted-jobs/' . $uqid, 'refresh');

        } else {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p>Verified CV submission failed!<br />  Please try agin later. </p></div>');
            redirect('employees/posted-jobs/' . $uqid, 'refresh');
        }

    }

    /**
     * Fetch uploaded resumes
     */
    public function uploaded_resumes($var = null)
    {
        $data['title'] = ' CherryHire Employers';
        $data['package'] = $this->employeesModel->packagelist();
        $data['jobs'] = $this->employeesModel->postedJobs($var);
        $data['package'] = $this->employeesModel->packagelist();
        $data['resumes'] = $this->employeesModel->uploadedResumes($var);
        $data['employers'] = $this->employeesModel->companyDetails($var);
        $data['subscr'] = $this->employeesModel->subscr($var);
        $data['pending'] = $this->employeesModel->pendingcv($var);
        $data['uploades'] = $this->employeesModel->resumecount($var);
        $this->load->view('employees/uploaded-resumes', $data, false);
    }

    /**
     * Update Package
     */
    public function packageUpdate()
    {
        $uqid = $this->input->post('uqid');
        if ($this->employeesModel->updradepackage()) {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a><p>Successfully package updated</p></div>');
            redirect('employees/posted-jobs/' . $uqid, 'refresh');
        } else {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p>Package upgradation failed. Please try again later.</p></div>');
            redirect('employees/posted-jobs/' . $uqid, 'refresh');
        }
    }

    /**
     * date fileter
     */
    public function datefilter()
    {
        $date1 = date('Y-m-d', strtotime($this->input->post('start')));
        $date2 = date('Y-m-d', strtotime($this->input->post('end')));
        if ($date1 < $date2) {
            $start = $date1;
            $end = $date2;
        } else {
            $start = $date2;
            $end = $date1;
        }
        $data['employees'] = $this->employeesModel->filterdate($start, $end);
        $data['title'] = 'Manage Employees';
        $data['start'] = $start;
        $data['end'] = $end;
        $this->load->view('employees/list', $data, false);
    }

}

/* End of file Controllername.php */
