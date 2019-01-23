<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class packagebenifits extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->clear_cache();
		$this->load->model('subscriptionmodel');
		$this->load->model('benifitsModel');
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
    
    /** cv viewers list  */
    public function index()
    {
        $this->data['cv_visitor'] = $this->benifitsModel->cvVisitor();
        $this->data['mid'] 				= 1;
		$this->data['sid'] 				= 0;
        $this->data['title'] 			= 'Cherry Hire - Recruiters vists on your resumes';
        
        $this->load->view('new/visitors', $this->data, FALSE);
    }



     /** clear cache */
     function clear_cache()
     {
         $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
         $this->output->set_header("Pragma: no-cache");
     }
}

/* End of file packagebenifits.php */
