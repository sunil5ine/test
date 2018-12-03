<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class price extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('adminid')) { redirect($this->config->base_url().'login'); }
        $this->load->model('priceModel');
        
    }

    public function index()
    {
        $data['title'] = 'Manage Pricing';
        $data['canprice'] = $this->priceModel->canprice();
        $this->load->view('pricing/list', $data, FALSE);
    }

    /**
     * Get can pricing single
     */
    public function update($id)
    {
        $data['canPrice'] = $this->priceModel->getcanSingle($id);
        $data['title'] = 'Manage Pricing | edite Pricing';        
        $this->load->view('pricing/canedite',$data);    
    }

    /**
     * upadate packages
     */

    public function update_package()
    {
        $input = $this->input->post();
        $nifiyq = false;
        if(!empty($this->input->post('pr_notify')))
        {
           $nifiyq =  $this->priceModel->notiy();
        }

        
        $pr_enrichment  = 0;
        $pr_job_aler    = 0;
        $pr_prfle_viewrs= 0;
        $pr_boost       = 0;
        $pr_as_jobsearch= 0;
        $pr_resume_view = 0;
        $pr_psy_test    = 0;
        $pr_gend_test   = 0;
        
        if(!empty($this->input->post('pr_enrichment'))){ $pr_enrichment  = $this->input->post('pr_enrichment');}
        if(!empty($this->input->post('pr_job_aler'))){ $pr_job_aler    = $this->input->post('pr_job_aler');}
        if(!empty($this->input->post('pr_prfle_viewrs'))){ $pr_prfle_viewrs= $this->input->post('pr_prfle_viewrs');}
        if(!empty($this->input->post('pr_boost'))){ $pr_boost       = $this->input->post('pr_boost');}
        if(!empty($this->input->post('pr_as_jobsearch'))){ $pr_as_jobsearch= $this->input->post('pr_as_jobsearch');}
        if(!empty($this->input->post('pr_resume_view'))){ $pr_resume_view = $this->input->post('pr_resume_view');}
        if(!empty($this->input->post('pr_psy_test'))){ $pr_psy_test    = $this->input->post('pr_psy_test');}
        if(!empty($this->input->post('pr_gend_test'))){ $pr_gend_test   = $this->input->post('pr_gend_test');}
        $title          =   $this->input->post('title');
        $oprice         =   $this->input->post('oprice');
        $ofprice        =   $this->input->post('ofprice');
        $pr_limit       =   $this->input->post('pr_limit');
        $pr_nojob       =   $this->input->post('pr_nojob');

        $datas = array(
            'pr_enrichment'     => $pr_enrichment, 
            'pr_job_aler'       => $pr_job_aler, 
            'pr_prfle_viewrs'   => $pr_prfle_viewrs, 
            'pr_boost'          => $pr_boost, 
            'pr_as_jobsearch'   => $pr_as_jobsearch, 
            'pr_resume_view'    => $pr_resume_view , 
            'pr_psy_test'       => $pr_psy_test, 
            'pr_gend_test'      => $pr_gend_test, 
            'pr_name'           => $title, 
            'pr_orginal'        => $oprice, 
            'pr_offer'          => $ofprice, 
            'pr_limit'          => $pr_limit, 
            'pr_nojob'          => $pr_nojob, 
        );

        if($this->priceModel->updateFull($datas))
        {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green darken-3"><a class="close-tost ">X</a><p>Successfully package updated. </p></div>');
            redirect('price','refresh');
            
        }
        elseif($nifiyq == true){
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green darken-3"><a class="close-tost ">X</a><p>Successfully package updated. </p></div>');
            redirect('price','refresh');
        }
        else{
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p>Package updation failed!<br> please try agin later. </p></div>');
            redirect('price/update/'.$input['pid'],'refresh');
        }




       
        
    }

}

/* End of file price.php */
