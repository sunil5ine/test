<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class blog extends CI_Controller {

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
        
        $this->load->library('upload', $config);
        if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
        if ( ! $this->upload->do_upload('file')){
            $error = array('error' => $this->upload->display_errors());
            
            echo "<pre>";
            print_r ($error);
            echo "</pre>";
            
        }
        else{
            $data = array('upload_data' => $this->upload->data());
            echo "success";
        }
        exit;
        $data = array(
            'postingdate'   => $postdate, 
            'title'         => $titile, 
            'catogory'      => $category , 
            'metatitle'     => $stitle, 
            'metades'       => $sdes, 
            'metakey'       => $skeyw, 
            'des'           => $descr, 
            'file'          => $filename, 
        );
        
        echo "<pre>";
        print_r ($n);
        echo "</pre>";
        
    }

}

/* End of file blog.php */
