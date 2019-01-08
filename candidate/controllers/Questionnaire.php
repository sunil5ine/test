<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class questionnaire extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
		$this->load->model('subscriptionmodel');
		$this->load->model('m_questionnaire');
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
        $data['title'] 		= 'questionnaire';
		$data['verbal'] 	= $this->m_questionnaire->verble();
		$data['logical']	= $this->m_questionnaire->logical();
		$data['numerical']  = $this->m_questionnaire->numerical();
		$data['resability'] = $this->m_questionnaire->resability();
		if($this->m_questionnaire->getcan()){
			redirect('psychotest/plans','refresh');
		}else{
			$this->load->view('new/qutions', $data, FALSE);
		}
	}
	
	public function validate()
	{
		$input = $this->input->post();
		$result = $this->m_questionnaire->countanw($input);
		$mark = $result * 100 / 25;
		$this->m_questionnaire->resultinsert($mark);
		if($mark >= 35){
			$sess = array( 'tectcheck' => '0' );
			$this->session->set_userdata( $sess );
			$this->successmail();
		}else{
			$this->faildmail();
		}
		$this->session->set_flashdata('mark', $mark);
		redirect('MyProfile','refresh');
	}

	
	function successmail()
	{
		$this->load->model('subscriptionmodel');
		$umid = $this->session->userdata('cand_chid');
		$candata = $this->subscriptionmodel->getmuser($umid);
		
		$from = 'do-not-reply@cherryhire.com';
		$to   = $candata['can_email'];
		$subject 	= 'General Aptitude Test';
		$message    = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
		<html>
		
		<head>
			<title>Candidate_Register</title>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
			<style>
				#t11,#t11 th,#t11 td {
												border: 1px solid black;
												border-collapse: collapse;
											}
											#t11 th, #t11 td {
												padding: 15px;
												text-align: left;
											}
											table#t01 {
												width: 100%;    
												background-color: #f1f1c1;
											}
			</style>
		</head>
		
		<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
			<table id="Table_01" width="642" height="933" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#FFF; font-size:14px; font-family:Arial, Helvetica, sans-serif;">
				<tr>
					<td colspan="9" style="width:642px; height:30px;"></td>
				</tr>
				<tr>
					<td rowspan="13" style="width:28px; height:903px; border-top:1px solid #CCC; border-left:1px solid #CCC; border-bottom:1px solid #CCC;"></td>
					<td colspan="7" style="width:585px; height:103px; border-top:1px solid #CCC;">
						<a href="http://www.cherryhire.com" target="_blank">
							<img src="http://staging.cherryhire.com/site/images/logo.png" alt="">
						</a>
					</td>
					<td rowspan="13" style="width:29px; height:903px; border-top:1px solid #CCC; border-right:1px solid #CCC; border-bottom:1px solid #CCC;"></td>
				</tr>
				<tr>
					<td colspan="7" style="background:#AD1E24; width:585px; height:111px; vertical-align:middle; color:#FFF; padding:10px 0px 0px 30px; font-size:28px; font-weight:bold;">General Aptitude Test</td>
				</tr>
				<tr>
					<td style="width:10px; height:10px; line-height:0px;" valign="top">
						<img src="'.base_url().'emailtemplate/Candidate_Register_06.png" alt="">
					</td>
					<td colspan="5" style="background:#F0EFEC; width:564px; height:10px; line-height:0px;"></td>
					<td style="width:11px; height:10px; line-height:0px;" valign="top">
						<img src="'.base_url().'emailtemplate/Candidate_Register_08.png" alt="">
					</td>
				</tr>
				<tr>
					<td rowspan="9" style="background:#FFF; width:10px; height:643px;"></td>
					<td style="background:#F0EFEC; width:36px; height:122px;"></td>
					<td colspan="3" style="background:#F0EFEC; width:488px; height:122px; line-height:30px;padding:0px 0px 0px 10px;">
						<p>Hi '.$candata["can_fname"].',</p>
						<p>	Thank you for taking the General Aptitude Test administered through <a href="https://www.cherryhire.com/candidate">www.cherryhire.com</a>, the first platform in the region to provide verified profiles to employers.<br><br>
							We are pleased to inform that you have successfully cleared the test and your profile is now registered as "Verified" on our platform. Your test score sheet is attached for your ready reference.<br><br>
							You will now start receiving intimations from Cherryhire team about any job position that matches your profile to enable you apply against the same. We also request you to regularly visit your "Dashboard" and view the complete job listing.<br><br>
							Wishing you the best in your career.
						</p>
					</td>
					<td style="background:#F0EFEC; width:40px; height:122px;"></td>
					<td rowspan="9" style="background:#FFF; width:11px; height:643px;"></td>
				</tr>
				<tr>
					<td style="background:#F0EFEC; width:36px; height:104px;"></td>
					<td colspan="3" style="background:#F0EFEC; width:488px; height:104px; padding:0px 0px 0px 10px; line-height:21px; font-size:12px;">Best regards.
						<br>Cherryhire Team.</td>
					<td style="background:#F0EFEC; width:40px; height:104px;"></td>
				</tr>
			</table>
		</body>
		</html>';
		$config = Array(
			'protocol' => 'mail',
			'smtp_host' => 'mail.cherryhire.com',
			'smtp_port' => 465,
			'smtp_user' => 'no-reply@cherryhire.com',
			'smtp_pass' => 'Chire@DNply',
			'mailtype'  => 'html', 
			'wordwrap'  =>true,
			'charset'   => 'utf-8'
		);
		$this->load->library('email'); 
		$this->email->initialize($config);
		$this->email->set_newline('\r\n'); 
		// $this->email->clear(TRUE);
		$this->email->from('no-reply@cherryhire.com', 'Cherryhire'); 
		$this->email->to($to);
		// $this->email->cc('jitinajithk@gmail.com');
		$this->email->subject('General Aptitude Test'); 
		$this->email->message($message);
		if ($this->email->send()) {
			return 1;
		} else {
			return 0;

		}
	}


	function faildmail()
	{
		$this->load->model('subscriptionmodel');
		$umid = $this->session->userdata('cand_chid');
		$candata = $this->subscriptionmodel->getmuser($umid);
		
		$from = 'do-not-reply@cherryhire.com';
		$to   = $candata['can_email'];
		$subject 	= 'General Aptitude Test';
		$message    = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
		<html>
		
		<head>
			<title>Candidate_Register</title>
			<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
			<style>
				#t11,#t11 th,#t11 td {
												border: 1px solid black;
												border-collapse: collapse;
											}
											#t11 th, #t11 td {
												padding: 15px;
												text-align: left;
											}
											table#t01 {
												width: 100%;    
												background-color: #f1f1c1;
											}
			</style>
		</head>
		
		<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
			<table id="Table_01" width="642" height="933" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#FFF; font-size:14px; font-family:Arial, Helvetica, sans-serif;">
				<tr>
					<td colspan="9" style="width:642px; height:30px;"></td>
				</tr>
				<tr>
					<td rowspan="13" style="width:28px; height:903px; border-top:1px solid #CCC; border-left:1px solid #CCC; border-bottom:1px solid #CCC;"></td>
					<td colspan="7" style="width:585px; height:103px; border-top:1px solid #CCC;">
						<a href="http://www.cherryhire.com" target="_blank">
							<img src="http://staging.cherryhire.com/site/images/logo.png" alt="">
						</a>
					</td>
					<td rowspan="13" style="width:29px; height:903px; border-top:1px solid #CCC; border-right:1px solid #CCC; border-bottom:1px solid #CCC;"></td>
				</tr>
				<tr>
					<td colspan="7" style="background:#AD1E24; width:585px; height:111px; vertical-align:middle; color:#FFF; padding:10px 0px 0px 30px; font-size:28px; font-weight:bold;">General Aptitude Test</td>
				</tr>
				<tr>
					<td style="width:10px; height:10px; line-height:0px;" valign="top">
						<img src="'.base_url().'emailtemplate/Candidate_Register_06.png" alt="">
					</td>
					<td colspan="5" style="background:#F0EFEC; width:564px; height:10px; line-height:0px;"></td>
					<td style="width:11px; height:10px; line-height:0px;" valign="top">
						<img src="'.base_url().'emailtemplate/Candidate_Register_08.png" alt="">
					</td>
				</tr>
				<tr>
					<td rowspan="9" style="background:#FFF; width:10px; height:643px;"></td>
					<td style="background:#F0EFEC; width:36px; height:122px;"></td>
					<td colspan="3" style="background:#F0EFEC; width:488px; height:122px; line-height:30px;padding:0px 0px 0px 10px;">
						<p>Hi '.$candata["can_fname"].',</p>
						<p>	Thank you for taking the General Aptitude Test administered through  <a href="https://www.cherryhire.com/candidate">www.cherryhire.com</a>, the first platform in the region to provide verified profiles to employers.<br><br>
							We regret to inform that your score does not qualify you to be recommended as a "Verified" candidate to employers. Your test score sheet is attached for your ready reference.<br><br>
							We recommend that you take some more time for preparation and take the test again after 15 - 30 days.<br><br>
							Wishing you the best in your career.
						</p>
					</td>
					<td style="background:#F0EFEC; width:40px; height:122px;"></td>
					<td rowspan="9" style="background:#FFF; width:11px; height:643px;"></td>
				</tr>
				<tr>
					<td style="background:#F0EFEC; width:36px; height:104px;"></td>
					<td colspan="3" style="background:#F0EFEC; width:488px; height:104px; padding:0px 0px 0px 10px; line-height:21px; font-size:12px;">Best regards.
						<br>Cherryhire Team.</td>
					<td style="background:#F0EFEC; width:40px; height:104px;"></td>
				</tr>
			</table>
		</body>
		</html>';
		$config = Array(
			'protocol' => 'mail',
			'smtp_host' => 'mail.cherryhire.com',
			'smtp_port' => 465,
			'smtp_user' => 'no-reply@cherryhire.com',
			'smtp_pass' => 'Chire@DNply',
			'mailtype'  => 'html', 
			'wordwrap'  =>true,
			'charset'   => 'utf-8'
		);
		$this->load->library('email'); 
		$this->email->initialize($config);
		$this->email->set_newline('\r\n'); 
		// $this->email->clear(TRUE);
		$this->email->from('no-reply@cherryhire.com', 'Cherryhire'); 
		$this->email->to($to);
		// $this->email->cc('jitinajithk@gmail.com');
		$this->email->subject('General Aptitude Test'); 
		$this->email->message($message);
		if ($this->email->send()) {
			return 1;
		} else {
			return 0;

		}
	}



}

/* End of file questionnaire.php */

