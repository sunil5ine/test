<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class admin extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('adminid')) { redirect($this->config->base_url().'login'); }
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
       $data['profile'] = $this->adminModel->getProfile();
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

    /**
     * update_profile
     */
    public function update_profile()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('psw', 'Password', 'trim|required');
        $this->form_validation->set_rules('cpsw', 'Password Confirmation', 'trim|required|matches[psw]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        if ($this->form_validation->run() == TRUE ) {
            if($this->adminModel->upadteAdminUserAccount())
            {
                $file = $_FILES['pic']['name'];
                if(!empty($file)){  $picName = $this->uploadpic(); }
                $input = $this->input->post();
                if(!empty($picName))
                {
                    $profileupdate = array(
                        'ap_mobile'         => $input['phone'],
                        'ap_notification'   => $input['nemail'],
                        'ap_payment'        => $input['pemail'],
                        'ap_cvwriting'      => $input['cemail'],
                        'ad_id'             => $input['id'],
                        'ap_pic'            => $picName,
                        'refid'             => date('Ymdhis'),

                    );
                }
                else
                {
                    $profileupdate = array(
                        'ap_mobile'         => $input['phone'],
                        'ap_notification'   => $input['nemail'],
                        'ap_payment'        => $input['pemail'],
                        'ap_cvwriting'      => $input['cemail'],
                        'ad_id'             => $input['id'],
                        'refid'             => date('Ymdhis'),
                    );
                }
                
                    if($this->adminModel->update_profile($profileupdate,$input['id']))
                    {
                        $this->session->set_flashdata('messeg', '<div id="snackbar" class="green darken-3"><a class="close-tost ">X</a><p>Admin user successfully updated.</p></div>');
                        redirect('setting','refresh');
                    }else{
                        $this->session->set_flashdata('messeg', '<div id="snackbar" class="red darken-3"><a class="close-tost ">X</a><p>Sorry admin user updation failed.<br/> Please try agin later</p></div>');
                        redirect('setting','refresh');
                    }
            }else{
                $this->session->set_flashdata('messeg', '<div id="snackbar" class="red darken-3"><a class="close-tost ">X</a><p>Sorry admin user updation failed.<br/> Please try agin later</p></div>');
                redirect('setting','refresh');
            }
        
            
        } 
        else{
            $data['title'] = 'Admin Settings';
            $data['profile'] = $this->adminModel->getProfile();
            $this->load->view('admin/account-setting', $data);
        }   
    }

    /**
     * upload pic
     */
    function uploadpic()
    {
        $config['upload_path']          = './profile/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 0;
        $config['max_width']            = 0;
        $config['max_height']           = 0;
        $config['encrypt_name']         = TRUE;
        $this->load->library('upload', $config);
        if (!file_exists($config['upload_path'])) { mkdir($config['upload_path'], 0777, true); }
        $this->upload->do_upload('pic');

        
        $filename = $this->upload->data('file_name');
        $config['image_library']    = 'gd2';
        $config['source_image']     = $config['upload_path'].$filename;
        $config['create_thumb']     = FALSE;
        $config['maintain_ratio']   = FALSE;
        $config['width']            = 100;
        $config['height']           = 100;   
        $config['quality']          = '60%';  
        $config['new_image']        = $config['upload_path'].$filename;  
        $this->load->library('image_lib', $config);
        if($this->image_lib->resize()){
            return 'profile/'.$filename;
        }else{
            return FALSE;
        }
       
    }

}

/* End of file Admin.php */
