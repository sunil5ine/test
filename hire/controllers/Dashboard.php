<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Dashboard controller for this App.
 *
 * @package    CI
 * @subpackage Controller
 * @author     Sreejith Gopinath <sreejith@aatoon.com>
 */
 
class Dashboard extends CI_Controller {

	/** 
	* Init Function
	*
	* @return void
	*/
	public function __construct()
	{
		parent::__construct();
		$this->clear_cache();
		$this->load->model('dashboardmodel');
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

	/** 
	* Index Function
	*
	* @return void
	*/
	public function index()
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'Login'); }
		$today 				= date('Y-m-d');
		$this->data['mid'] 	= 1;
		$this->data['sid'] 	= 0;
		$this->data['title']		= 'Cherry Hire App - Dashboard';
		$this->data["jobcount"] 	= $this->dashboardmodel->total_job_count();
		$this->data["expjobcount"] 	= $this->dashboardmodel->total_expjob_count();
		$this->data["candcount"]	= $this->dashboardmodel->total_cand_count();
		
		$jobrange_res 	= $this->dashboardmodel->job_nums_range();
		$applyrange_res = $this->dashboardmodel->apply_nums_range();
		$smrange_res 	= $this->dashboardmodel->sm_nums_range();
		$jprange_res 	= $this->dashboardmodel->jp_nums_range();
		$refrange_res 	= $this->dashboardmodel->ref_nums_range();
		
		/*************************Job Apply 10days******************************************************/
		$aprange 	= '';
		$appenddt 	= date('Y-m-d',strtotime("-1 day" , strtotime ( $today )));
		$appstartdt = date('Y-m-d',strtotime("-11 day" , strtotime ( $today )));

		while ($appstartdt < $appenddt) {
			$achkdt = date('m-d-Y',strtotime($appstartdt));
			$rval 	= 0;
			foreach ($applyrange_res as $arrow) {
				if ($achkdt == $arrow['jdate']) {
					$rval = $arrow['totcount'];
				}
			}
			
			if ($aprange != '') {
				$aprange = $aprange.','.$rval;
			} else {
				$aprange = $aprange.$rval;
			}
			
			$appstartdt = date('Y-m-d',strtotime ( '+1 day' , strtotime ( $appstartdt ) )) ;
		}
		//$aprange = '5,3,8,2,10,24'; //sample
		$this->data["apply_rangenum"] = $aprange;
		/***********************************************************************************************/
		
		/*************************Job Apply Social Media 20days*****************************************/
		$smrange 	= '';
		$smenddt 	= date('Y-m-d',strtotime($today));
		$smstartdt 	= date('Y-m-d',strtotime("-21 day" , strtotime ( $today )));
		$this->data["totcv"] = 0; 
		while ($smstartdt < $smenddt) {
			$smchkdt 	= date('m-d-Y',strtotime($smstartdt));
			$rval 		= 0;
			foreach ($smrange_res as $smrow) {
				if($smchkdt == $smrow['jdate']) {
					$rval = $smrow['totcount'];
				}
			}
			
			if ($smrange != '') {
				$smrange = $smrange.','.$rval;
			} else {
				$smrange = $smrange.$rval;
			}
			$this->data["totcv"] = $this->data["totcv"] + $rval;
			$smstartdt = date('Y-m-d',strtotime ( '+1 day' , strtotime ( $smstartdt ) )) ;
		}
		$this->data["sm_rangenum"] = $smrange; 
		/***********************************************************************************************/
		
		/*************************Job Apply Job Portal 20days*******************************************/
		$jprange 	= '';
		$jpenddt	= date('Y-m-d',strtotime($today));
		$jpstartdt 	= date('Y-m-d',strtotime("-21 day" , strtotime ( $today )));
		$this->data["jptotcv"] = 0; 
		while ($jpstartdt < $jpenddt) {
			$jpchkdt 	= date('m-d-Y',strtotime($jpstartdt));
			$rval 		= 0;
			foreach ($jprange_res as $jprow) {
				if($jpchkdt == $jprow['jdate']) {
					$rval = $jprow['totcount'];
				}
			}
			
			if ($jprange != '') {
				$jprange = $jprange.','.$rval;
			} else {
				$jprange = $jprange.$rval;
			}
			$this->data["jptotcv"] = $this->data["jptotcv"] + $rval;
			$jpstartdt = date('Y-m-d',strtotime ( '+1 day' , strtotime ( $jpstartdt ) )) ;
		}
		$this->data["jp_rangenum"] = $jprange; 
		/***********************************************************************************************/
		
		/*************************Job Apply Refferal 20days*********************************************/
		$refrange 	= '';
		$refenddt 	= date('Y-m-d',strtotime($today));
		$refstartdt = date('Y-m-d',strtotime("-21 day" , strtotime ( $today )));
		$this->data["reftotcv"] = 0; 
		while ($refstartdt < $refenddt) {
			$refchkdt = date('m-d-Y',strtotime($refstartdt));
			$rval = 0;
			foreach ($refrange_res as $refrow) {
				if ($refchkdt == $refrow['jdate']) {
					$rval = $refrow['totcount'];
				}
			}
			
			if ($refrange != '') {
				$refrange = $refrange.','.$rval;
			} else {
				$refrange = $refrange.$rval;
			}
			$this->data["reftotcv"] = $this->data["reftotcv"] + $rval;
			$refstartdt 			= date('Y-m-d',strtotime ( '+1 day' , strtotime ( $refstartdt ) )) ;
		}
		$this->data["ref_rangenum"] = $refrange; 
		/***********************************************************************************************/
		
		/*************************Job Posting 30days****************************************************/
		$jrange 	= '';
		$penddt 	= date('Y-m-d',strtotime($today));
		$pstartdt 	= date('Y-m-d',strtotime("-21 day" , strtotime ( $today )));
		while ($pstartdt <= $penddt) {
			$chkdt 	= date('m-d-Y',strtotime($pstartdt));
			$rval 	= 0;
			foreach ($jobrange_res as $rrow) {
				if ($chkdt == $rrow['jdate']) {
					$rval = $rrow['totcount'];
				}
			}
			
			if ($jrange != '') {
				$jrange = $jrange.','.$rval;
			} else {
				$jrange = $jrange.$rval;
			} 
			$pstartdt = date('Y-m-d',strtotime ( '+1 day' , strtotime ( $pstartdt ) )) ; 
		}
		$this->data["rangenum"] = $jrange;
		/***********************************************************************************************/
		
		/*************************Latest 5 jobs*********************************************************/
		$this->data["top5_job"] 		= $this->dashboardmodel->get_job_record(5);
		/***********************************************************************************************/
		
		/*************************Latest 5 Application**************************************************/
		$this->data["top5_candidate"] 	= $this->dashboardmodel->get_cand_record(5);
		/***********************************************************************************************/
		$this->load->view('new/dashboard',$this->data);
	}
	
	/** 
	* Profile Settings Function
	*
	* @return array
	*/
	public function profilesettings()
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'Login'); } // Handling Session
		$this->data['message'] 	= '';
		$this->data["formdata"] = array(
			'fname'=>'',
			'lname'=>'',
			'complocation'=>'',
			'designation'=>'',
			'disname'=>'',
			'cntrycode'=>'',
			'phone'=>'',
			'usrpwd'=>'',
			'repwd'=>'',
			'notifyemail'=>'',
			'compurl'=>'',
			'empcnt'=>'',
			'linkurl'=>'',
			'fburl'=>'',
			'twurl'=>'',
			'gurl'=>''
		);
		$this->data["prodetails"] = $this->commonmodel->get_emp_profile();
		$this->data["smdetails"] = $this->commonmodel->get_emp_socialmedia();
		if($this->session->flashdata('errmsg')){ $this->data['message'] = $this->session->flashdata('errmsg'); }
		if (isset($_GET['upd'])) {
			if ($this->input->get('upd')==1) {
				$this->data['message'] = '<div class="alert alert-success fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Details has been updated</div>';
			}
		}
				
		/********************************Form Validation*************************************************/		
		$this->form_validation->set_rules('fname', 'First Name', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('designation', 'Designation', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('cntrycode', 'Country Code', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone No', 'trim|required');
	
		$this->form_validation->set_rules('complocation', 'Company Location', 'trim|required|callback_name_check');
		
		$this->form_validation->set_rules('notifyemail', 'Notification Email ID', 'trim|required|valid_email');
		$this->form_validation->set_rules('compurl', 'Company Website', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('empcnt', 'No of Employee(s)', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) {
			$empid = $this->dashboardmodel->update_profile(); //Profile Update
			redirect($this->config->base_url().'AccountSettings/?process=update&upd=1&status=Success');
		} else {
			if ($this->input->post('notifyemail')) {
				$this->data["formdata"] = array(
					'fname'=>$this->input->post('fname'),
					'lname'=>$this->input->post('lname'),
					'designation'=>$this->input->post('designation'),
					'complocation'=>$this->input->post('complocation'),
					'disname'=>$this->input->post('disname'),
					'cntrycode'=>$this->input->post('cntrycode'),
					'phone'=>$this->input->post('phone'),
					'usrpwd'=>$this->input->post('usrpwd'),
					'repwd'=>$this->input->post('repwd'),
					'notifyemail'=>$this->input->post('notifyemail'),
					'compurl'=>$this->input->post('compurl'),
					'empcnt'=>$this->input->post('empcnt'),
					'linkurl'=>$this->data["prodetails"]["esm_linkdin"],
					'fburl'=>$this->data["prodetails"]["esm_fb"],
					'twurl'=>$this->data["prodetails"]["esm_tw"],
					'gurl'=>$this->data["prodetails"]["esm_gp"]
				);
				
				$this->data['message'] = '<div class="alert alert-danger fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Failed!</strong> Sorry, we are unable to process your request. Please try again.
				<br> '.validation_errors().'
				</div>';
			} else {
				$this->data["formdata"] = array(
					'fname'=>$this->data["prodetails"]['emp_fname'],
					'lname'=>$this->data["prodetails"]['emp_lname'],
					'complocation'=>$this->data["prodetails"]['emp_location'],
					'designation'=>$this->data["prodetails"]['emp_designation'],
					'disname'=>$this->data["prodetails"]["ep_dispaly_name"],
					'cntrycode'=>$this->data["prodetails"]["emp_ccode"],
					'phone'=>$this->data["prodetails"]["emp_phone"],
					'usrpwd'=>$this->data["prodetails"]["emp_hash"],
					'repwd'=>$this->data["prodetails"]["emp_hash"],
					'notifyemail'=>$this->data["prodetails"]["ep_notify_email"],
					'totalemployee'=>$this->data["prodetails"]["ep_notify_email"],
					'compurl'=>$this->data["prodetails"]["emp_website"],
					'empcnt'=>$this->data["prodetails"]["emp_number"],
					'linkurl'=>$this->data["prodetails"]["esm_linkdin"],
					'fburl'=>$this->data["prodetails"]["esm_fb"],
					'twurl'=>$this->data["prodetails"]["esm_tw"],
					'gurl'=>$this->data["prodetails"]["esm_gp"]
				);				
			}
		}
		
		$this->data['mid'] 		= 2;
		$this->data['sid'] 		= 1;
		$this->data['title']	= 'Cherry Hire App- Profile Settings';		
		$this->data['pagehead'] = 'Profile Settings';
		
		$this->load->view('new/profile',$this->data);
		
	}
	
	/** 
	* Update Social Media links
	* @param String $empid
	* @return void
	*/
	public function update_smedia($empid=null)
	{
		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'Login'); } // Handling Session
		$this->data['message'] = '';
		
		/*********Form Validation************/
		$this->form_validation->set_rules('linlink', 'Linked In', 'trim|callback_name_check');
		$this->form_validation->set_rules('fblink', 'Facebook', 'trim|callback_name_check');
		$this->form_validation->set_rules('twittlink', 'Twitter', 'trim|callback_name_check');
		$this->form_validation->set_rules('gpluslink', 'Google Plus', 'trim|callback_name_check');

		if ($this->form_validation->run() == TRUE && $empid!='') {
			$this->dashboardmodel->update_smedia($empid);
			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
			 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully Updated! </div>';
			$this->session->set_flashdata('errmsg', $this->data['message']);			
			redirect($this->config->base_url().'AccountSettings/?process=update&upd=1&status=Success');
		} else {
			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
			 <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! '.validation_errors().' </div>';
			$this->session->set_flashdata('errmsg', $this->data['message']);
			redirect($this->config->base_url().'AccountSettings/?process=update&upd=2&status=failed');
		}
	}
	
	/** 
	* Check String Validation Function
	* @param string $str
	* @return boolean
	*/
	public function name_check($str)
	{
		if ($str == 'test' || $str == 'Test') {
			$this->form_validation->set_message('name_check', 'The %s field can not be the word "test"');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	/** 
	* Check password strength Function
	* @param String $pwd
	* @return boolean
	*/
	public function pwd_check($pwd)
	{
		$error = "";
		if( strlen($pwd) < 8 ) {
			$error .= "Password should be minimum 8 characters in length.<br>";
		}		
		
		if( !preg_match("#[0-9]+#", $pwd) ) {
			$error .= "Password should be containing minimum one number!<br>";
		}		
		
		if( !preg_match("#[a-z]+#", $pwd) ) {
			$error .= "Password should be containing minimum one letter!<br>";
		}		
		
		if( !preg_match("#[A-Z]+#", $pwd) ) {
			$error .= "Password should be containing minimum one uppercase letter!<br>";
		}
		
		if ($error) {
			$error = rtrim($error,'<br>');
			$this->form_validation->set_message('pwd_check', 'Password should be minimum 8 characters in length containing one uppercase letter and one digit');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	/** 
	* Get Date range Function
	*
	* @return json array
	*/
	public function get_range()
	{
		$today = date('Y-m-d');
		$enddt = date('Y-m-d',strtotime("-1 day" , strtotime ( $today )));
		$startdt = date('Y-m-d',strtotime("-11 day" , strtotime ( $today )));
		header('Content-Type: application/x-json; charset=utf-8');
		$i=0;
		while ($i<11) {
			$r = mt_rand(0,9)+10;
			$json[$i] = array('dt' => $startdt, 'rval' => $r);
			$startdt = date('Y-m-d',strtotime ( '+1 day' , strtotime ( $startdt ) )) ;
			$i++;
		}
		echo json_encode($json);
	}
	
	/** 
	* Clear Cache Function
	*
	* @return void
	*/
	function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }


    public function profilepic()
    {
    	if(!$this->session->userdata('hireid')) { redirect($this->config->base_url().'Login'); } // Handling Session

		$this->data['message'] = '';
		$cid = $this->session->userdata('hireid');
		$upfilename = 'emp_pic'.'_'.$cid.'_'.date('Ymdhis');
		$this->load->library('upload');

		$imgsize 	= getimagesize($_FILES['picToUpload']['tmp_name']);
		$width 		= $imgsize[0];
		$height 	= $imgsize[1];
		if(($width>500 || $width<100 || $height>500 || $height<100)) 
		{
			$error = 'Image resolution should be minimum 100 x 100 and maximum 500 x 500.';
			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
			 <button data-dismiss="alert" class="close" type="button">x</button>  Photo updation failed! '.$error.' </div>';
			$this->session->set_flashdata('errmsg', $this->data['message']);
			redirect($this->config->base_url().'AccountSettings/?Process=Update&upd=3&Stat=Failed');
		}

		if (isset($_FILES['picToUpload'])  && !empty($_FILES['picToUpload']) && is_uploaded_file($_FILES['picToUpload']['tmp_name']))  
		{
			
			$pic['upload_path'] 	= 'upload';
			$pic['allowed_types'] 	= 'jpg|jpeg|JPG|png|PNG|gif|GIF|JPEG';
			$pic['max_size']		= '0';
			$pic['encrypt_name'] 		= true;
			$this->upload->initialize($pic);
			// echo $pic['upload_path'];exit;
			if (!file_exists($pic['upload_path'])) {
				    mkdir($pic['upload_path'], 0777, true);
				}
				if ($this->upload->do_upload('picToUpload')) 
				{
					$this->upload_file_name = '';
					$data 	=  $this->upload->data();
					$this->upload_file_name = $data['file_name'];
					$picpath =$pic['upload_path'].'/'.$this->upload->data('file_name');
	 				$picid = $this->dashboardmodel->update_profilepic($cid,$picpath);
					$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success"> <button data-dismiss="alert" class="close" type="button">x</button> Photo updated successfully! </div>';
					$this->session->set_flashdata('errmsg', $this->data['message']);
					redirect($this->config->base_url().'AccountSettings/?Process=Update&upd=1&Stat=Success');

				} 
				else
				{
					$error = $this->upload->display_errors();
					$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error"> <button data-dismiss="alert" class="close" type="button">x</button>  Photo updation failed! '.$error.' </div>';
					$this->session->set_flashdata('errmsg', $this->data['message']);
					redirect($this->config->base_url().'AccountSettings/?Process=Update&upd=2&Stat=Failed'); 
				}

		} 
		else 
		{
			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error"> <button data-dismiss="alert" class="close" type="button">x</button>  Photo updation failed! - Invalid File </div>'; 
			$this->session->set_flashdata('errmsg', $this->data['message']); 
			redirect($this->config->base_url().'AccountSettings/?Process=Update&upd=2&Stat=Failed'); 
		} 
	}



}

