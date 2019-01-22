<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class candidates extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('adminid')) { redirect($this->config->base_url().'login'); }
        $this->load->model('candidateModel');
        
    }
    

    public function index()
    {
        $data['title'] = 'Candidates';
        $data['candidate'] = $this->candidateModel->getlist();
        $this->load->view('candidate/candidate-list', $data, FALSE); 
    }

    public function detail($id = null)
    {
       $data['title']   = 'Candidates Detail';
       $data['profile'] =  $this->candidateModel->getSingleCandidate($id);
       $data['ind']     =  $this->candidateModel->canInd($data['profile']['ind_id']);
       $data['cv']      =  $this->candidateModel->cv($id);
       $data['social']  =  $this->candidateModel->social($id);
       $data['fun']     =  $this->candidateModel->fun($data['profile']['fun_id']);
       $data['exp']     =  $this->candidateModel->expireance($id);
       $data['edu']     =  $this->candidateModel->education($id);
       $data['package'] =  $this->candidateModel->package($id);
       $data['verify'] =  $this->candidateModel->vrifycheck($id);
       $data['price']   =  $this->candidateModel->price();
       $this->load->view('candidate/detail', $data);
    }

    public function download_resume($id = null)
    {
        $data = $this->candidateModel->download($id);
        $this->load->helper('download');
        if(!empty($data['cv_path'])){
            $file = file_get_contents($data['cv_path']);
            $name = $data['cv_headline'];
            force_download($data['cv_path'], $file);
        }else{
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p><b>Sorry! </b> No CV found</p></div>');
        }
        
        redirect('candidates/detail/'.$id,'refresh'); 
    }

    public function packageUpdate()
    {
        $id = $this->input->post('empid');
        if($this->candidateModel->packageUpdate())
        {
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a><p>Successfully new package updated/p></div>');
            redirect('candidates/detail/'.$id,'refresh');
            
        }else{
            $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p><b>Sorry! </b> Please try again</p></div>');
            redirect('candidates/detail/'.$id,'refresh');
        }  
    }

    /**
     * make candidate verified 
    */
    public function makeverify()
    {
      $id   = $this->input->post('id');
      $mark = $this->input->post('mark');
      $data = array('can_id' =>$id , 'tr_marks'=>$mark );
      if($this->candidateModel->makeverify($data))
      {
        $this->session->set_flashdata('messeg', '<div id="snackbar" class="green"><a class="close-tost ">X</a><p>Verification updated</p></div>');
        redirect('candidates/detail/'.$id,'refresh');
      }else{
        $this->session->set_flashdata('messeg', '<div id="snackbar" class="red"><a class="close-tost ">X</a><p><b>Sorry! </b> Please try agin later</p></div>');
        redirect('candidates/detail/'.$id,'refresh');
      }
    }

    /** 
     * date fileter
    */
    function datefilter()
    {
        $date1 = date('Y-m-d', strtotime($this->input->post('start')));
        $date2 =  date('Y-m-d',strtotime($this->input->post('end')));
        if($date1 < $date2){
            $start = $date1;
            $end   = $date2;
        }else{
            $start = $date2;
            $end   = $date1;
        }
        $data['candidate'] = $this->candidateModel->filterdate($start, $end);
        $data['title'] = 'Candidates';
        $data['start'] = $start;
        $data['end'] = $end;
        $this->load->view('candidate/candidate-list', $data, FALSE); 

        // $json = '';
        // foreach ($result as $key => $val) { 
        //     if($val->can_experience == 'Fresher')
        //     {
        //         $expr =  $val->can_experience;
        //     }elseif($val->can_experience == 01){
        //         $expr = $val->can_experience.' Year';   
        //     }else{
        //         $expr = $val->can_experience.' Years';
        //     }
        //     if($val->tr_marks >= 35){ $cls = 'green-text';$nums=1;}else{$cls = 'red-text';$nums=2;}
        //     if(!empty($val->tr_marks)){ $vrf = $val->tr_marks;} else{ $vrf = 'Not attend'; }
        //     if(!empty($val->can_ccode)){
        //         $phon = $val->can_ccode.' '.$val->can_phone;
        //     }else{
        //         $phon = '+'.$val->can_phone;
        //     }
        //     if(!empty($val->can_curr_desig)){ $des = $val->can_curr_desig ;}else{$des = 'Not mention';}

        //     $json= '<tr>
        //         <td class="td-a"><a href="\''.base_url('candidates/detail/').$val->can_id.'\'">'. $val->can_id .'</a></td>

        //         <td class="td-a"><a href="\''. base_url('candidates/detail/').$val->can_id.'\'">'. $val->can_fname. ' '. $val->can_lname .'</a></td>

        //         <td class="td-a"><a href="mailto:'. $val->can_email .'">'. $val->can_email .'</a></td>

        //         <td class="td-a"><a href="\''. base_url('candidates/detail/').$val->can_id .'\'">'. $val->co_nationality .'</a></td>

        //         <td class="td-a"><a href="\''. base_url('candidates/detail/').$val->can_id .'\'">'. $des .'</a></td>

        //         <td class="td-a">'. $expr .'</td>

        //         <td class="td-a"><a href="\''. base_url('candidates/detail/').$val->can_id .'\'">'. $val->can_curr_loc .'</a></td>

        //         <td class="center">
        //             <a href="\''. base_url('candidates/detail/').$val->can_id .'\'">
        //                 <i class="fas fa-circle '. $cls.'"><span style="font-size: 0.1px; opacity: 0;">'. $nums .'</span></i>
        //             </a>
        //         </td>

        //         <td><a href="\''. base_url('candidates/detail/').$val->can_id .'\'">'. $vrf .'</a></td>

        //         <td class="td-a"><a href="\''. base_url('candidates/detail/').$val->can_id .'\'">'. $des .'</a></td>

        //         <td class="td-a"><a href="tel:'. $phon .'" >
        //                 '. $phon .'
        //         </a></td>
        //         <td class="action-btn  center-align">
        //             <a href="\''. base_url('candidates/detail/').$val->can_id .'\'" class="blue hoverable tooltipped" ><i class="fas fa-eye "></i></a>
        //         </td>
        //     </tr>';
        //     echo $json;
        // }
    }

}

/* End of file candidates.php */