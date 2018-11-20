<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class blog extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Blog';
        $this->load->view('new/blog', $data, FALSE);        
    }

    public function detail()
    {
        $data['title'] = 'Blog Detail';
        $this->load->view('new/blog-detail', $data, FALSE);
    }
}

/* End of file blog.php */
