<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class alert extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('alertmodel');  
        $this->load->helper('string');

    }
    

    public function package()
    {
        $data = $this->alertmodel->package();

        // $alid = 'ALR_PCK_'.random_string('alnum', 4).'_'.date('YmdHis');
        if(!empty($data)){
            foreach ($data as $key => $value) {
                $id = $value->sub_id;
                $alid = 'EMP_PCK_'.random_string('alnum', 4).'_'.date('YmdHis');
                if($this->alertmodel->updateAlert($id,$alid)){
                    $dataarry = array(
                        'ea_enc' => $alid, 
                        'ea_type' =>'Package expired', 
                        'ea_ref_id' => $id, 
                        'ea_createdOn' =>date('Y-m-d H:i:s') , 
                        'ea_createdBy' => $value->emp_id, 
                    );
                    $this->alertmodel->insertalert($dataarry);
                }
            }
        }
    }

}

/* End of file alert.php */
