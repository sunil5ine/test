<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('adminModel');
        
    }
    

    function index($id = null)
	{
        $data['title'] = 'Add New admin';
        $data['admin'] = $this->adminModel->lists();
        if(!empty($id)){
            $data['edite'] = $this->adminModel->singleuser($id);
        }
		$this->load->view('admin/new-admin', $data);
		
	}

    public function setting()
    {
       $data['title'] = 'Admin Settings';
       $this->load->view('admin/account-setting', $data);
    }

    public function newadmin()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('user', 'User', 'trim|required|callback_username_check');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|callback_email_check');
        $this->form_validation->set_rules('psw', 'psw', 'trim|required|min_length[8]');
        if ($this->form_validation->run() == TRUE) {
            $this->adminModel->newadmin();
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green darken-4"><a class="close-tost ">X</a><p>You Successfully created user</p></div>');
            redirect('admin','refresh');
        } else {
            redirect('admin','refresh');
        }
        
    }
    
    public function username_check($str)
    {
        if ($str == 'test')
        {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red darken-3"><a class="close-tost ">X</a><p>The {field} field can not be the word "test"</p></div>');
            return FALSE;
        }
        else
        {
            return TRUE;
        }
    }

    function email_check($email)
    {
       if($this->adminModel->isuniq($email)){
        $this->session->set_flashdata('messeg', '<div id="snackbar" class="red darken-3"><a class="close-tost ">X</a><p>Email id already exist</p></div>');
           return FALSE;
       }else{
           return TRUE;
       }
    }

    /**
     * Delete admin
     */
    public function delete($id)
    {
        if($this->adminModel->delete($id))
        {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green darken-3"><a class="close-tost ">X</a><p>Admin user successfully deleted.</p></div>');
            redirect('admin','refresh');
        }else{
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red darken-3"><a class="close-tost ">X</a><p>Sorry No data found! Try again later.</p></div>');
            redirect('admin','refresh');
        }
    }

    /**
     * update 
    */
    public function update()
    {
        $input = $this->input->post();
        $this->form_validation->set_rules('user', 'User', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('psw', 'psw', 'trim|required|min_length[8]');
        if ($this->form_validation->run() == TRUE) {
            if($this->adminModel->update($input))
            {
                $this->session->set_flashdata('messeg', '<div id="snackbar" class="green darken-3"><a class="close-tost ">X</a><p>Admin user successfully updated.</p></div>');
                redirect('admin','refresh');
            }else{
                $this->session->set_flashdata('messeg', '<div id="snackbar" class="red darken-3"><a class="close-tost ">X</a><p>Sorry admin user updation failed.<br/> Please try agin later</p></div>');
                redirect('admin/'.$input['id'],'refresh');
            }
        }else{
            redirect('admin/'.$input['id'],'refresh');
        }
    }
}

/* End of file Admin.php */
