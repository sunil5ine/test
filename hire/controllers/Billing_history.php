<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class billing_history extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // $this->clear_cache();
		$this->load->model('subscriptionmodel');
		$this->load->model('commonmodel');
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
    

    public function index()
    {
        if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'Login'); }
        $this->data['title'] 	= 'Cherry Hire - Billing history';
        $this->data['bills'] = $this->subscriptionmodel->getbills();
        $this->load->view('new/billing-history', $this->data, FALSE);
        
    }

}

/* End of file billing_history.php */
