<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class blog extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('blogModel');
        
    }
    
    public function index()
    {
        $data['title'] = 'Blog';
        $data['blog'] = $this->blogModel->getlist();
        $this->load->view('new/blog', $data, FALSE);        
    }

    public function detail($title,$id)
    {
        $data['title'] = 'Blog Detail';
        $data['blog'] = $this->blogModel->singlegetlist($id);
        $data['next'] = $this->blogModel->next($id);
        $data['prev'] = $this->blogModel->previous($id);
        $data['fblog'] = $this->blogModel->getfblog($id);
        $this->load->view('new/blog-detail', $data, FALSE);
    }
}

/* End of file blog.php */
