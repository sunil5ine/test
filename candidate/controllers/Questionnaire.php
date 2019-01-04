<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class questionnaire extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('subscriptionmodel');
		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
		$this->data["subdetails"] = $this->subscriptionmodel->get_subscribe();
		$this->data["totjobapply"] = $this->subscriptionmodel->get_totaljob_apply();
		if($this->data["totjobapply"] >= $this->data["subdetails"]['csub_nojobs'] || $this->data["subdetails"]['csub_expire_dt'] == 0 || $this->data["subdetails"]['csub_expire_dt'] < date('Y-m-d H:i:s')) {
			$this->data["postdisable"] = 'disabled="disabled"';
		} else {
			$this->data["postdisable"] = '';
		}
		if ($this->data["subdetails"]['csub_type']==1) {
			$this->data["subsType"] = 1;
		} else {
			$this->data["subsType"] = 2;	
		}
	}

    public function index()
    {
        $data['title'] = 'questionnaire';
        
        $this->load->view('new/qutions', $data, FALSE);
        
    }

}

/* End of file questionnaire.php */

