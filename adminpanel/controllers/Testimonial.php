<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class testimonial extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('adminid')) { redirect($this->config->base_url().'login'); }
        $this->load->model('testimonialModel');
        
    }
    
    /** get tetimonial lists */
    public function index()
    {
        $data['title']  = 'Testimonial | CherryHire Admin';
        $data['list']   = $this->testimonialModel->get();
        $this->load->view('testimonial/list', $data, FALSE);   
    }

    public function add()
    {
        $data['title']  = 'Add New Testimonial | CherryHire Admin';
        $this->load->view('testimonial/add', $data, FALSE);  
    }

    /** insert new testimonial */
    public function insert(Type $var = null)
    {


        $input =$this->input->post();
        
        echo "<pre>";
        print_r ($input);
        echo "</pre>";

        $isimg = $_FILES['pic']['name'];
        if(!empty($isimg))
        {
            $config['upload_path'] = './testimonial/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '0';
            $config['max_width']  = '0';
            $config['max_height']  = '0';
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);
            if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
            if(!is_dir($config['upload_path'].'tumb/')) mkdir($config['upload_path'].'tumb/', 0777, TRUE);
            if ( ! $this->upload->do_upload('pic')){
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a>'.$this->upload->display_errors().'</div>');
                redirect('testimonial/add');
                            
            }
            else{

                $filedatas = array('filedata' => $this->upload->data());
                $this->thumbimage($filedatas['filedata']['file_name']);
                $filename = 'testimonial/'.$filedatas['filedata']['file_name'];
            }
        }
        else{
            $filename = '';
        }

        $data = array(
            'ts_name' => $this->input->post('name'), 
            'ts_desg' => $this->input->post('des'), 
            'ts_content' => $this->input->post('content'), 
            'ts_pic' => $filename, 
        );
        if($this->testimonialModel->insertnew($data)){
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a>Testimonial added</div>');
            redirect('testimonial/list');
        }else{
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a>Please try agin!</div>');
            redirect('testimonial/add');
        }
        
    }



    /**
     * thumnile image storing
     */
    function thumbimage($file){

        
        $config['image_library']    = 'gd2';
        $config['source_image']     = './testimonial/'.$file;
        $config['new_image']        = './testimonial/tumb/'.$file;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 100;
        $config['height']           = 100;
        $this->load->library('image_lib', $config);
        if ( ! $this->image_lib->resize())
        {
                return false;
        }else{
            return true;
        }
    }

/** Delete testimoial */
public function delete($id = null)
{
    if($this->testimonialModel->delete($id)){
        $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a>Testimonial Successfully deleted </div>');
        redirect('testimonial/list');
    }else{
        $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a>failed to remove testimonial. Please try agin!</div>');
        redirect('testimonial/list');
    }
}

/** edit */
public function edit($id = null)
{
   $data['testimonial'] = $this->testimonialModel->getsingle($id);
   $data['title']  = 'Edit Testimonial | CherryHire Admin';
   $this->load->view('testimonial/edit', $data, FALSE);   

}

/** update */
public function update()
{
    $id = $this->input->post('id');
    $data = array(
        'ts_name' => $this->input->post('name'), 
        'ts_desg' => $this->input->post('des'), 
        'ts_content' => $this->input->post('content'), 
    );

    if($this->testimonialModel->update($id,$data)){
        $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a>Testimonial Successfully Updated </div>');
        redirect('testimonial/list');
    }else{
        $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a>failed to update testimonial. Please try agin!</div>');
        redirect('testimonial/list');
    }
}


}

/* End of file Testimonial.php */
