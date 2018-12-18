<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class partnersEnquiry extends CI_Controller {

    public function index()
    {
        $this->load->model('partnersModel');        
        $data['title'] = 'Partners Enquiry | Cherry Hire';
        $data['lists'] = $this->partnersModel->getlist();
        $this->load->view('partners/list', $data, FALSE);
        
    }

}

/* End of file partnersEnquiry.php */
