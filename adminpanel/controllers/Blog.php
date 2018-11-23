<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class blog extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('adminid')) { redirect($this->config->base_url().'login'); }
        $this->load->model('blogModel');
    }
    

    public function index()
    {
        $data['title'] = 'Post A blog';
        $this->load->view('blog/add', $data);        
    }

    public function lists()
    {
        $data['title'] = 'Post A blog';
        $this->load->view('blog/list', $data);
    }

    /**
     * Post a blog
    */
    public function post()
    {
        $postdate = $this->input->post('postdate');
        $titile   = $this->input->post('title');
        $category = $this->input->post('category');
        $stitle   = $this->input->post('stitle');
        $sdes     = $this->input->post('sdes');
        $skeyw    = $this->input->post('skeyword');
        $descr    = $this->input->post('descr');
        
        

        
        $config['upload_path'] = '../blog-file/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '512';
        $config['max_width']  = '0';
        $config['max_height']  = '0';
        $config['encrypt_name']  = TRUE;
        
        $this->load->library('upload', $config);
        if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
        if ( ! $this->upload->do_upload('file')){
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $error['error']);
            redirect('blog','refresh');
                        
        }
        else{
            $filedatas = array('filedata' => $this->upload->data());
            $data = array(
                'postFor'   => $postdate, 
                'title'         => $titile, 
                'catogory'      => $category , 
                'metatitle'     => $stitle, 
                'metades'       => $sdes, 
                'metakey'       => $skeyw, 
                'des'           => $descr, 
                'file'          => 'blog-file/'.$filedatas['filedata']['file_name'], 
                'file_origin'   => $filedatas['filedata']['orig_name'], 
            );
            if($this->blogModel->addpost($data)){
                $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a><p>Successfully Posted. </p></div>');
                redirect('blog/lists','refresh');
                
            }else{
                $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p><b>Unavailable to post a blog.</b> <br /> Please try again later</p></div>');
                redirect('blog/lists','refresh');
            }
            
           

            
        }
       
        
        
        echo "<pre>";
        print_r ($data);
        echo "</pre>";
        
    }

}

/* End of file blog.php */
