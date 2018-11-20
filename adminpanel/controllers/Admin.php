<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    function index()
	{
		$data['title'] = 'Add New admin';
		$this->load->view('dashboard/new-admin', $data, FALSE);
		
	}

    public function setting()
    {
       $data['title'] = 'Admin Settings';
       $this->load->view('admin/account-setting', $data);
        
    }

    

}

/* End of file Admin.php */
