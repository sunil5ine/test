<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class alerts extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('notification');
		if (!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }		
		if (isset($_COOKIE["PHPSESSID"])) {
			$this->data['sessionid'] = $_COOKIE["PHPSESSID"];
		} else {
			$this->data['sessionid'] = '';
		}
		$this->data['mid'] = 6;
	}

    public function index($id = NULL)
    {
        $this->data['mid'] 	 = 1;
	    $this->data['sid'] 	 = 0;
        $this->data['title'] = 'Cherry Hire - Cndidate Notification';
        $this->data['alert'] = array();
        $data = array('count'=>'');
        $alert = array();
        if(!empty($id)){
            $data = $this->notification->getsingle($id);
        }else{
            $data = $this->notification->getall();
        }
        
        $this->data['counts'] = $data['count'];
        foreach ($data['alerts'] as $key => $value) {
            $cid = $value->ca_id;
            if($value->ca_type == 'rocomended'){
                $alert[] = $this->notification->recomended($cid);
            }
            elseif($value->ca_type == 'package-exp'){
                $alert[] = $this->notification->package($cid);
                
            }
            elseif($value->ca_type == 'Subscription'){
                $alert[] = $this->notification->subs($cid);
            }
            elseif($value->ca_type == 'cv_write'){
                $alert[] = $this->notification->cvs($cid);
            }
            elseif($value->ca_type == 'test'){
                $alert[] = $this->notification->test($cid);
            }
        }
        $this->data['noti'] =  $alert;
        $this->load->view('new/inbox', $this->data, FALSE);
        
    }

    public function get($id = null)
    {
        $data = $this->notification->getsingle($id);
        foreach ($data['alerts'] as $key => $value) {
            $cid = $value->ca_id;
            if($value->ca_type == 'rocomended'){
                $alert = $this->notification->recomended($cid);
                redirect('Jobs/Viewdetails/'.$alert['id'].'/?js=5&source=cherryhire','refresh');
            }
            elseif($value->ca_type == 'package-exp'){
                redirect('Subscriptions','refresh');
            }
            elseif($value->ca_type == 'Subscription'){
                redirect('Subscriptions','refresh');
            }
            elseif($value->ca_type == 'cv_write'){
                redirect('cvwriting/professional-cv','refresh');
            }
            elseif($value->ca_type == 'test'){
                redirect('psychotest/plans','refresh');
            }
        }
    }

}

/* End of file alerts.php */
