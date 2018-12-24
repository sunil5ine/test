<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class alert extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('commonmodel');
        $this->load->model('alertModel');
		$this->data["subsType"] = 1;
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'Login'); }
		$this->data["subdetails"] = $this->commonmodel->get_subscribe();
		if ($this->data["subdetails"]['sub_expire_dt']==0 || $this->data["subdetails"]['sub_nojobs']==0 || $this->data["subdetails"]['sub_nocv']==0 || $this->data["subdetails"]['sub_expire_dt']<date('Y-m-d H:i:s')) {
			$this->data["postdisable"] = 'disabled="disabled"';
		} else {
			$this->data["postdisable"] = '';
		}
		
		if ($this->data["subdetails"]['sub_type']==1) {
			$this->data["subsType"] = 1;
		} else {
			$this->data["subsType"] = 2;	
		}
    }
    

    public function index($id = NULL)
    {
       $alerts = $this->alertModel->alertdetail($id);
       
       if($alerts['ea_type'] == 'job apply'){

            $this->data['application'] = $this->alertModel->jobapply($alerts);
            $this->data['title'] 	= 'Cherry Hire - Job Apply';
            $this->data['pagehead'] = 'View Details';
            $this->data['message'] = '';
		    $this->load->view('new/application', $this->data, FALSE);


       }
       elseif($alerts['ea_type'] == 'Package expired'){
            redirect('Subscriptions','refresh');
       }
       else{

        $this->data['vcv'] = $this->alertModel->vrcv($alerts);
		$this->data['title'] 	= 'Cherry Hire - Job - Verified CVs';
		$this->data['pagehead'] = 'View Details';
        $this->data['message'] = '';
		$this->load->view('new/verifiedcv', $this->data, FALSE);
       }   
    }


    /** get all alerts list */
    public function getall()
    {
        $this->data = array();
        $this->data['alerts'] = $this->alertModel->getAllList();
        $this->data['title'] 	= 'Cherry Hire - Alerts';
        $this->data['pagehead'] = 'View Details';
        $this->data['message'] = '';
        $this->load->view('new/alerts', $this->data, FALSE);
    }

}

/* End of file Controllername.php */
