<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
       $data['title'] = 'Admin Settings';
       $this->load->view('admin/account-setting', $data);
        
    }

}

/* End of file Admin.php */
