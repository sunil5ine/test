<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class blog extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Post A blog';
        $this->load->view('blog/add', $data);
        
    }

}

/* End of file blog.php */
