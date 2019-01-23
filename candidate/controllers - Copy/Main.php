<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Main extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->clear_cache();
		$this->load->library('email'); // load email library
		$this->load->model('candidatemodel');
		$this->data['thisyear'] = date('Y');
	}

	public function index()
	{
		if($this->session->userdata('cand_chid')) { redirect($this->config->base_url().'MyProfile'); }
		$this->data['message'] 	= '';
		$this->data['status'] 	= '';
		if($this->input->post('cname') && $this->input->post('cemailid')) {
			$fname 		= $this->input->post('cname');
			$emailid 	= $this->input->post('cemailid');
		} else {
			$fname 		= '';
			$emailid 	= '';
		}
		$this->data['formdata'] = array(
			'firstname'=>$fname,
			'lastname'=>'',
			'cntrycode'=>'',
			'phone'=>'',
			'emailid'=>$emailid,
			'usrpwd'=>'',
			'repwd'=>'',
			'dob'=>'',
			'gender'=>'',
			'edu'=>'',
			'nation'=>'',
			'totexp'=>'',
			'currcompany'=>'',
			'currloc'=>'',
			'funarea'=>'',
			'jobalert'=>'1'
		);
		
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('cntrycode', 'Country Code', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone No', 'trim|required');
		$this->form_validation->set_rules('emailid', 'Email ID', 'trim|required|valid_email|is_unique[ch_candidate.can_email]');
		$this->form_validation->set_rules('usrpwd', 'Password', 'trim|required|min_length[6]|callback_name_check');
		$this->form_validation->set_rules('repwd', 'Confirm Password', 'trim|required|min_length[6]|matches[usrpwd]');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
		$this->form_validation->set_rules('edu', 'Gender', 'trim|required');
		$this->form_validation->set_rules('nation', 'Gender', 'trim|required');
		$this->form_validation->set_rules('totexp', 'Gender', 'trim|required');
		$this->form_validation->set_rules('currcompany', 'Current Company Name', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('currloc', 'Current Location', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('funarea', 'Functional Area', 'trim|required');

		if ($this->form_validation->run() == TRUE) {
			$cid 		= $this->sitemodel->postcv_record();
			$upfilename = 'resume'.'_'.$cid;
			$this->load->library('upload');
			//$image_path = realpath(APPPATH . '../resume');
			if (isset($_FILES['fileToUpload'])  && !empty($_FILES['fileToUpload']) && is_uploaded_file($_FILES['fileToUpload']['tmp_name'])) {
				$image_path 			= realpath(APPPATH . '../resume');
				$cv['upload_path'] 		= $image_path;
				$cv['allowed_types'] 	= 'doc|docx|pdf|DOC|DOCX|PDF';
				$cv['max_size']			= '0';
				$cv['file_name'] 		= $upfilename;
				
				$this->upload->initialize($cv);
				if ($this->upload->do_upload('fileToUpload')) {
					$this->upload_file_name = '';
					$data 		=  $this->upload->data();									
					$this->upload_file_name = $data['file_name'];	
					$cvpath 	= $data['full_path'];
					$cvid 		= $this->sitemodel->postcv_details($cid,$cvpath);
					$smid 		= $this->sitemodel->postsocial_media($cid);
					$mailstatus = $this->cvsendmail($cid,$cvpath);
					if($mailstatus == 1) {
						$Tmailstatus = $this->cvthankumail($cid);
					} else {
						$this->data['status'] 	= 'fail';
						$this->data['message'] 	= '<div class="alert alert-danger">
						<strong>Failed!</strong> Thanks for registering with CherryHire. Failed to process the request.
						<br> Mail sending failed! 
						<br> Send your updated resume to cv@cherryhire.com
						</div>';
					}
					$this->data['status'] 	= 'success';
					$this->data['message'] 	= '<div class="alert alert-success">
                    <strong>Success!</strong> Thanks for registering with CherryHire. Your account verification is under process, will get in touch with you via email soon.
                  </div>';
				} else {	
					$error = $this->upload->display_errors();
					$this->data['status'] 	= 'cvfail';
					$this->data['message'] 	= '<div class="alert alert-info">
                    	<strong>Failed!</strong> Thanks for registering with CherryHire. Your CV upload failed. send your updated resume to cv@cherryhire.com.
						'.$error.'
                  		</div>';
				}
			 } else {
				$this->data['status'] 	= 'cvfail';
				$this->data['message'] 	= '<div class="alert alert-info">
					<strong>Failed!</strong> Thanks for registering with CherryHire. Your CV upload failed. send your updated resume to cv@cherryhire.com.
					</div>'; 
			 }
		} else {
			if($this->input->post('firstname') || $this->input->post('lastname')) {
				$this->data['formdata'] = array(
					'firstname'=>$this->input->post('firstname'),
					'lastname'=>$this->input->post('lastname'),
					'cntrycode'=>$this->input->post('cntrycode'),
					'phone'=>$this->input->post('phone'),
					'emailid'=>$this->input->post('emailid'),
					'usrpwd'=>$this->input->post('usrpwd'),
					'repwd'=>$this->input->post('repwd'),
					'dob'=>$this->input->post('dob'),
					'gender'=>$this->input->post('gender'),
					'edu'=>$this->input->post('edu'),
					'nation'=>$this->input->post('nation'),
					'totexp'=>$this->input->post('totexp'),
					'currcompany'=>$this->input->post('currcompany'),
					'currloc'=>$this->input->post('currloc'),
					'funarea'=>$this->input->post('funarea'),
					'jobalert'=>$this->input->post('jobalert'),
				);
			
				$this->data['status'] 	= 'fail';
				$this->data['message'] 	= '<div class="alert alert-danger">
                    <strong>Failed!</strong> Sorry, we are unable to process your request. Please try again.
					'.validation_errors().'
                  </div>';
			}
		}
		
		$this->data['title']	= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['cmid'] 	= 0;
		$this->data['number1'] 	= rand(1,9);
		$this->data['number2'] 	= rand(1,9);
		$this->data['sum'] 		= $this->data['number1'] + $this->data['number2'];
		$sess_array = array(
			'correctsum' => $this->data['sum']
		);
		$this->session->set_userdata($sess_array);
		
		$this->data["country_list"] = $this->candidatemodel->get_country();
		$this->data["edu_list"] 	= $this->candidatemodel->get_edu();
		$this->data["funarea_list"] = $this->candidatemodel->get_farea();
		$this->load->view('common/frontend/header',$this->data);
		$this->load->view('common/frontend/candidate-menu',$this->data);
		$this->load->view('main',$this->data);
		$this->load->view('common/frontend/footer',$this->data);
	}
	
	public function name_check($str)
	{
		if ($str == 'test' || $str == 'Test') {
			$this->form_validation->set_message('name_check', 'The %s field can not be the word "test"');
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	function cvsendmail($cid=null,$cvpath=null)
	{
		$result 	= $this->sitemodel->get_candidate($cid);
		$to 		= 'cv@cherryhire.com';
		$from 		= 'do-not-reply@cherryhire.com';
		$FName 		= $result['can_fname'];
		$LName 		= $result['can_lname'];
		$ContactNo 	= $result['can_ccode'].'-'.$result['can_phone'];
		$RegEmail 	= $result['can_email'];
		$DOB 		= date('d-m-Y', strtotime($result['can_dob']));
		$Gender 	= $result['can_gender'];
		$Edu 		= $result['edu_name'];
		$Nation 	= $result['co_name'];
		$TotExp 	= $result['can_experience'];
		$CEmployer 	= $result['can_curr_company'];
		$CurrLoc 	= $result['can_curr_loc'];
		$FunArea 	= $result['fun_name'];
		$JobAlert 	= $result['can_alert'];		
		$subject 	= 'Resume from Cherry Hire Admin -'.$FName.' '.$LName;
		
		if($JobAlert == 1) {
			$AlertJob = 'Yes';
		} else {
			$AlertJob = 'No';
		}
		
		$Resumewebpath = base_url().'resume/'. basename($cvpath);
		
		$message = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
					<html>
					<head>
					  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
					  <title>Cherry Hire</title>
					</head>
					<body>
					<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
					  
					  <p>Dear Team, </p>
					  <p><strong>CV posting From Cherry Hire Website</strong></p>
					  <div align="left">
					  <table width="100%" border="0" style="border:1px solid #000; line-height:35px;">
						  <tr>
							<td width="20%"  style="border:1px solid #000; background:#CCC;"><strong>First Name :</strong></td>
							<td width="24%" style="border:1px solid #000;"> '.$FName.'</td>
							<td width="20%" style="border:1px solid #000; background:#CCC;"><strong>Last Name :</strong></td>
							<td width="26%" style="border:1px solid #000;"> '.$LName.'</td>
						  </tr>
						  <tr>
							<td style="border:1px solid #000; background:#CCC;"><strong>Contact No : </strong></td>
							<td style="border:1px solid #000;"> '.$ContactNo.'</td>
							<td style="border:1px solid #000; background:#CCC;"><strong>Email Id : </strong></td>
							<td style="border:1px solid #000;"> '.$RegEmail.'</td>
						  </tr>
						  <tr>
							<td style="border:1px solid #000; background:#CCC;"><strong>Date of Birth : </strong></td>
							<td style="border:1px solid #000;"> '.$DOB.'</td>
							<td style="border:1px solid #000; background:#CCC;"><strong>Gender : </strong></td>
							<td style="border:1px solid #000;"> '.$Gender.'</td>
						  </tr>
						  <tr>
							<td style="border:1px solid #000; background:#CCC;"><strong>Educational Qualification : </strong></td>
							<td style="border:1px solid #000;"> '.$Edu.'</td>
							<td style="border:1px solid #000; background:#CCC;"><strong>Nationality : </strong></td>
							<td style="border:1px solid #000;"> '.$Nation.'</td>
						  </tr>
						  <tr>
							<td style="border:1px solid #000; background:#CCC;"><strong>Total Experience : </strong></td>
							<td style="border:1px solid #000;">  '.$TotExp.' year(s)</td>
							<td style="border:1px solid #000; background:#CCC;"><strong>Current Employer : </strong></td>
							<td style="border:1px solid #000;"> '.$CEmployer.'</td>
						  </tr>
						  <tr>
						    <td style="border:1px solid #000; background:#CCC;"><strong>Current Location :</strong></td>
						    <td style="border:1px solid #000;">'.$CurrLoc.'</td>
						    <td style="border:1px solid #000; background:#CCC;"><strong>Functional Area : </strong></td>
						    <td style="border:1px solid #000;">'.$FunArea.'</td>
  						  </tr>
						  <tr>
							<td style="border:1px solid #000; background:#CCC;"><strong>Job Alert : </strong></td>
							<td colspan="3" style="border:1px solid #000;"> '.$AlertJob.'</td>
						  </tr>
						  <tr>
							<td style="border:1px solid #000; background:#CCC;"><strong>Resume Link</strong></td>
							<td colspan="3" style="border:1px solid #000;"> <a href="'.$Resumewebpath.'" title="Download CV"><img src="'.base_url().'images/download_cv.png" alt="Download CV"></a></td>
						  </tr>
						</table>
						</div>
					  <p>-- </p>
					  <p>Regards, <br> Webmaster - Cherry Hire</p>
					</div>
					</body>
					</html>';
		
		$config['protocol'] 	= "mail";
		$config['smtp_crypto']	= "ssl"; 
		$config['smtp_host'] 	= "smtp.zoho.com";
		$config['smtp_user'] 	= "do-not-reply@cherryhire.com";
		$config['smtp_pass'] 	= "Chire@DNply";
		$config['smtp_port'] 	= "465"; //587
		$config['charset']		= "utf-8";
		$config['newline']		= "\r\n";
		$config['crlf'] 		= "\r\n";
		$config['mailtype'] 	= 'html';
		
		$this->email->initialize($config);
		$this->email->clear(TRUE);
		$this->email->set_newline("\r\n");
		$this->email->from($from, 'Webmaster');
		$this->email->to($to);
		//$this->email->cc('test2@gmail.com'); 
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->attach($cvpath); // attach file
		//$this->email->attach('/path/to/file2.pdf');
		if ($this->email->send()) {
			//echo "Mail Sent!";
			return 1;
		} else {
			//echo "There is error in sending mail!";
			return 0;
		}
	}
	
	function cvthankumail($cid=null)
	{
		$subject 	= 'Greetings from Cherry Hire';
		$result 	= $this->sitemodel->get_candidate($cid);
		$from 		= 'do-not-reply@cherryhire.com';
		$FName 		= $result['can_fname'];
		$LName 		= $result['can_lname'];
		$RegEmail 	= $result['can_email'];
		$to 		= $RegEmail;
		$thanksmessage    = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
								<html>
								<head>
								  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
								  <title>Cherry Hire</title>
								</head>
								<body>
								<div style="width: 640px; font-family: Arial, Helvetica, sans-serif; font-size: 14px;">
								  <div align="left">
									<a href="'.base_url().'"><img src="'.base_url().'images/logo.png" alt="cherry hire"></a>
								  </div>
								  <p><strong>Dear '.$FName.',</strong> </p>
								  <h1>Greetings from Cherry Hire!!!</h1>
								  <h2>Thank you for interesting with Cherry Hire. We are currently processing it for you and will contact you shortly.</h2>
								  
								  <p>Best Regards, <br>
								  <strong>HR Team</strong><br>
								  Cherry Hire</p>
								  <br>
								  <p>Please follow us on our social channels to keep yourself posted on our latest offers
									<br><br>
									Follow us on Facebook:<br>
									http://www.facebook.com/cherryhire
									<br><br>
									Follow us on Twitter:<br>
									http://www.twitter.com/cherryhire </p>
									
								</div>
								</body>
								</html>';
		
		$config['protocol'] 	= "mail";
		$config['smtp_crypto']	= "ssl"; 
		$config['smtp_host'] 	= "smtp.zoho.com";
		$config['smtp_user'] 	= "do-not-reply@cherryhire.com";
		$config['smtp_pass'] 	= "Chire@DNply";
		$config['smtp_port'] 	= "465"; //587
		$config['charset']		= "utf-8";
		$config['newline']		= "\r\n";
		$config['crlf'] 		= "\r\n";
		$config['mailtype'] 	= 'html';
		
		$this->email->initialize($config);
		$this->email->clear(TRUE);
		$this->email->set_newline("\r\n");
		$this->email->from($from, 'CherryHire');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($thanksmessage);
		if ($this->email->send()) {
			return 1;
		} else {
			return 0;
		}
	}
	
	function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
}

