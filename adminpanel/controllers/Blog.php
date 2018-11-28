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
        $data['blog'] = $this->blogModel->getblog();
        $this->load->view('blog/list', $data);
    }

    /**
     * Post a blog
    */
    public function post()
    {
        $postdate = $this->input->post('postdate');
        $titile   = $this->input->post('title');
        $stitle   = $this->input->post('stitle');
        $sdes     = $this->input->post('sdes');
        $skeyw    = $this->input->post('skeyword');
        $descr    = $this->input->post('descr');
        if($postdate == ''){$postdate =date('Y-m-d');}

        
        $config['upload_path'] = './blog-file/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '512';
        $config['max_width']  = '0';
        $config['max_height']  = '0';
        $config['encrypt_name']  = TRUE;
        
        $this->load->library('upload', $config);
        if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
        if(!is_dir($config['upload_path'].'tumb/')) mkdir($config['upload_path'].'tumb/', 0777, TRUE);
        if ( ! $this->upload->do_upload('file')){
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a>'.$this->upload->display_errors().'</div>');
            redirect('blog');
                        
        }
        else{

            $filedatas = array('filedata' => $this->upload->data());
            $this->thumbimage($filedatas['filedata']['file_name']);
            $data = array(
                'postOn'        => $postdate, 
                'title'         => $titile, 
                'metatitle'     => $stitle, 
                'metades'       => $sdes, 
                'metakey'       => $skeyw, 
                'des'           => $descr, 
                'file'          => 'blog-file/'.$filedatas['filedata']['file_name'], 
                'file_origin'   => $filedatas['filedata']['orig_name'], 
                'created_by'    => $this->session->userdata('adminid'),
            );
            if($this->blogModel->addpost($data)){
                $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a><p>Successfully Posted. </p></div>');
                redirect('blog/lists');
                
            }else{
                $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p><b>Unavailable to post a blog.</b> <br /> Please try again later</p></div>');
                redirect('blog/lists');
            }            
        }
        
    }

    /**
     * thumnile image storing
     */
    function thumbimage($file){

        
        $config['image_library']    = 'gd2';
        $config['source_image']     = './blog-file/'.$file;
        $config['new_image']        = './blog-file/tumb/'.$file;
        $config['maintain_ratio']   = TRUE;
        $config['width']            = 260;
        $config['height']           = 175;
        $this->load->library('image_lib', $config);
        if ( ! $this->image_lib->resize())
        {
                return false;
        }else{
            return true;
        }
    }


    /**
     * Edite Blog
    */
    public function edite($id)
    {
        $data['title'] = 'Edite Blog | Cherryhire';
        if($data['blog'] = $this->blogModel->getsingle($id)){
           $this->load->view('blog/edite', $data, FALSE);           
        }else{
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p><b>Invalid data or no data found in database</p></div>');
            redirect('blog/lists','refresh');
        }
    }

    /**
     * Update blog
     */
    public function update()
    {
        $input = $this->input->post();
        $postdate = date('Y-m-d',strtotime($this->input->post('postdate')));
        $titile   = $this->input->post('title');
        $stitle   = $this->input->post('stitle');
        $sdes     = $this->input->post('sdes');
        $skeyw    = $this->input->post('skeyword');
        $descr    = $this->input->post('descr');
        $file = $_FILES['file'];
        if(!empty($file['name'])){
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
                $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a>'.$this->upload->display_errors().'</div>');
                redirect('blog/edite/'.$input['blogId']);                            
            }else{
                $filedatas = array('filedata' => $this->upload->data());
                $filename = 'blog-file/'.$filedatas['filedata']['file_name'];
                $fileOrigin = $filedatas['filedata']['orig_name'];
                $this->thumbimage($filedatas['filedata']['file_name']);
            }
        }else{
            $filename = $input['fileName'];
            $fileOrigin = $input['fileOrigin'];
        }

        $data = array(
            'postOn'        => $postdate, 
            'title'         => $titile, 
            'metatitle'     => $stitle, 
            'metades'       => $sdes, 
            'metakey'       => $skeyw, 
            'des'           => $descr, 
            'file'          => $filename,
            'file_origin'   => $fileOrigin, 
            'created_by'    => $this->session->userdata('adminid'),
        );

        if($this->blogModel->update($data,$input['blogId'])){
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a><p>Blog successfully updated. </p></div>');
            redirect('blog/lists','refresh');
        }
        else{
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p><b>Update Faild!</b> <br>There was a Problem to Update a blog. Please try agin later.  </p></div>');
            redirect('blog/edite/'.$input['blogId'],'refresh');
        }        
    }

    /**
     * DELETE BLOG
    */
    public function delete($id)
    {
        if($blog = $this->blogModel->delete($id))
        {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a><p<b>Success: </b> The blog has been successfully removed. </p></div>');
            redirect('blog/lists','refresh');
        }else{
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p<b>Error: </b> There was a Problem to Delete a blog. Please try agin later. </p></div>');
            redirect('blog/lists','refresh');
        }
        
        
    }

}

/* End of file blog.php */
