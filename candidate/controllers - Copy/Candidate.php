<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Candidate extends CI_Controller {



	public function __construct()

	{

		parent::__construct();

		$this->clear_cache();

		$this->load->model('candidatemodel');

		$this->load->model('subscriptionmodel');

		$this->load->library('email');

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

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$this->data['message'] = '';

		if($this->session->flashdata('errmsg')){ $this->data['message'] = $this->session->flashdata('errmsg'); }

		

		$this->data['cdata'] = $this->candidatemodel->get_single_record($this->session->userdata('cand_chid'));

		$this->data['cwork'] = $this->candidatemodel->get_cand_work($this->session->userdata('cand_chid'));

		$this->data['cedu_details'] = $this->candidatemodel->get_cand_eduq($this->session->userdata('cand_chid'));

		if(empty($this->data['cdata'])) { redirect($this->config->base_url().'LoginProcess'); }

		$today = date('Y-m-d');

		

		

		$this->data['formdata'] = array(

			'cid'=>$this->data['cdata']['can_id'],

			'encrypt_id'=>$this->data['cdata']['can_encrypt_id'],

			'cfname'=>$this->data['cdata']['can_fname'],

			'clname'=>$this->data['cdata']['can_lname'],

			'cccode'=>$this->data['cdata']['can_ccode'],

			'cphone'=>$this->data['cdata']['can_phone'],

			'cmail'=>$this->data['cdata']['can_email'],

			'usrpwd'=>$this->data['cdata']['can_hash'],

			'repwd'=>$this->data['cdata']['can_hash'],

			'cdob'=>($this->data['cdata']['can_dob']==0)?'Not Set':date('d/m/Y', strtotime($this->data['cdata']['can_dob'])),

			'gender'=>$this->data['cdata']['can_gender'],

			'cedu'=>$this->data['cdata']['edu_name'],

			'ccon'=>$this->data['cdata']['co_name'],

			'nation'=>$this->data['cdata']['co_nationality'],

			'cexp'=>$this->data['cdata']['can_experience'],

			'ccomp'=>$this->data['cdata']['can_curr_company'],

			'ccurrloc'=>$this->data['cdata']['can_curr_loc'],

			'cfarea'=>$this->data['cdata']['fun_name'],

			'cindustry'=>$this->data['cdata']['ind_name'],

			'cskills'=>$this->data['cdata']['can_skills'],

			'resumehead'=>$this->data['cdata']['cv_headline'],

			'linkurl'=>$this->data['cdata']['sm_linkdin'],

			'fburl'=>$this->data['cdata']['sm_fb'],

			'twurl'=>$this->data['cdata']['sm_tw'],

			'gurl'=>$this->data['cdata']['sm_gp'],

			'creloc'=>$this->data['cdata']['can_relocate'],

			'createddt'=>date('d F Y', strtotime($this->data['cdata']['can_reg_date'])),

			'updateddt'=>date('d F Y', strtotime($this->data['cdata']['can_upd_date'])),

			'cv_path'=>$this->data['cdata']['cv_path'],

			'csummary'=>$this->data['cdata']['csum_details'],

			'cworkexp'=>$this->data['cwork'],

			'edu_id'=>$this->data['cdata']['edu_id'],

			'co_id'=>$this->data['cdata']['co_id'],

			'fun_id'=>$this->data['cdata']['fun_id'],

			'ind_id'=>$this->data['cdata']['ind_id'],

			'can_propic'=>$this->data['cdata']['can_propic'],

			'preloc'=>explode(',',$this->data['cdata']['can_pref_loc']),

			'cdesig'=>$this->data['cdata']['can_curr_desig'],

		);

		

		$ploc = explode(',',$this->data['cdata']['can_pref_loc']);

		$this->data["preffered"] = '';

		if(!empty($ploc)) { 

			$i = 0;			

			while($i < count($ploc)) {

				if($ploc[$i]!='') {

					$country = $this->dashboardmodel->get_single_country($ploc[$i]);

					if($i == 0) {

						$this->data["preffered"] = $country['co_name'];

					} else {

						$this->data["preffered"] = $this->data["preffered"].', '.$country['co_name'];

					}

				}

				$i++;

			}

		}

		if($this->data["preffered"] == ''){ 

			$this->data["preffered"] =  'Not set'; 

		}

		

		$this->data['mid'] 				= 1;

		$this->data['sid'] 				= 0;

		$this->data['title'] 			= 'Cherry Hire - Candidate Dashboard';

		

		$this->data["degree_list"] 		= $this->candidatemodel->get_degree();

		$this->data["degree_type_list"] = $this->candidatemodel->get_degreetype();

		$this->data["country_list"] 	= $this->candidatemodel->get_country();

		$this->data["nation_list"] 		= $this->candidatemodel->get_nationality();

		$this->data["edu_list"] 		= $this->candidatemodel->get_edu();

		$this->data["funarea_list"] 	= $this->candidatemodel->get_farea();

		$this->data["ind_list"] 		= $this->candidatemodel->get_industry();

		$this->data["year_list"] 		= $this->candidatemodel->get_year();

		$this->data["month_list"] 		= $this->candidatemodel->get_month();

		

		$this->load->view('common/header_inner',$this->data);

		$this->load->view('common/leftmenu',$this->data);

		$this->load->view('common/topmenu',$this->data);

		$this->data['footer_nav']=$this->load->view('common/footerbar',$this->data,true);

		$this->load->view('dashboard',$this->data);

		$this->load->view('common/footer_inner',$this->data);

	}



	public function update_candidate_basic($canid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$this->data['message'] = '';



		/*********Form Validation************/

		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');

		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');

		$this->form_validation->set_rules('totexp', 'Total Experience', 'trim|required');

		$this->form_validation->set_rules('edu', 'Education', 'trim|required');

		$this->form_validation->set_rules('nation', 'Nationality', 'trim|required');	

		$this->form_validation->set_rules('funarea', 'Functional Area', 'trim|required');

		if($this->input->post('totexp') != 'Fresher' && $this->input->post('totexp') != '0' && $this->input->post('totexp') != '00') {

			$this->form_validation->set_rules('industry', 'Industry', 'trim|required');	

			$this->form_validation->set_rules('currcompany', 'Current Company Name', 'trim|required|callback_name_check');

			$this->form_validation->set_rules('currdesig', 'Current Designation', 'trim|callback_name_check');

		}

		$this->form_validation->set_rules('currloc', 'Current Location', 'trim|required|callback_name_check');

		/***************************************************************/		

		

		if ($this->form_validation->run() == TRUE && $canid!='') {

			$this->candidatemodel->update_basic($canid); //Update details

			$mailstatus = $this->update_notify($canid); //Update Notification Email

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Details updated successfully </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);			

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=1&Stat=Success');

		} else {

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button> Details Updation Failed! '.validation_errors().' </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=2&Stat=Failed');			

		}

	}

	

	public function update_candidate_summary($canid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$this->data['message'] = '';



		/*********Form Validation************/

		$this->form_validation->set_rules('prosummary', 'Summary', 'trim|required|callback_name_check');

		/*****************************************************/



		if ($this->form_validation->run() == TRUE && $canid!='') {

			$this->candidatemodel->update_summary($canid);

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully Updated! </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);			

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=1&Stat=Success');

		} else {

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! '.validation_errors().' </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=2&Stat=Failed');	

		}

	}

	

	public function update_skill($canid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$this->data['message'] = '';

		

		$this->form_validation->set_rules('skillval', 'Skill', 'trim|required|callback_name_check');

		if ($this->form_validation->run() == TRUE && $canid!='') {

			$result = $this->candidatemodel->update_qskill($canid);

			$mailstatus = $this->update_notify($canid); //Update Notification Email

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully Updated! </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);			

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=1&Stat=Success');

		} else{

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! '.validation_errors().' </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=2&Stat=Failed');

		}

	}	

	

	public function update_candidate_work($canid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$this->data['message'] = '';

		

		/*********Form Validation************/

		$this->form_validation->set_rules('company', 'Company Name', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('location', 'Location', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('frmmon', 'From Month', 'required');

		$this->form_validation->set_rules('frmyr', 'From Year', 'required');

		if($this->input->post('tomon')) {

			$this->form_validation->set_rules('tomon', 'To Month', 'required');

		}

		if($this->input->post('toyr')) {

			$this->form_validation->set_rules('toyr', 'To Year', 'required');

		}

		$this->form_validation->set_rules('position', 'Position', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('keyrole', 'Key Role', 'trim|callback_name_check');

		

		$toyr 	= ($this->input->post('toyr'))?$this->input->post('toyr'):date('Y');

		$frmyr 	= $this->input->post('frmyr');

		$tomon 	= ($this->input->post('tomon'))?$this->input->post('tomon'):date('m');

		$frmmon = $this->input->post('frmmon');

		

		$diff = (($toyr - $frmyr) * 12) + ($tomon - $frmmon);

		if($diff < 0) {

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! Invalid Dates given</div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=2&Stat=Failed');

		}



		if ($this->form_validation->run() == TRUE && $canid!='') {

			$this->candidatemodel->update_workdetails($canid);

			$mailstatus = $this->update_notify($canid); //Update Notification Email

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully Updated! </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);			

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=1&Stat=Success');

		} else {

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! '.validation_errors().' </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=2&Stat=Failed');

		}

	}

	

	public function edit_candidate_work($expid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$this->data['message'] = '';

		$this->data["formdata"] = $this->candidatemodel->get_cand_work_single($expid);

		if(empty($this->data["formdata"])) { redirect($this->config->base_url().'MyProfile/?Process=Update&upd=2&Stat=Failed'); }

		/*********Form Validation************/

		$this->form_validation->set_rules('edit_company', 'Company Name', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('edit_location', 'Location', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('edit_frmmon', 'From Month', 'required');

		$this->form_validation->set_rules('edit_frmyr', 'From Year', 'required');

		if($this->input->post('edit_tomon')) {

			$this->form_validation->set_rules('edit_tomon', 'To Month', 'required');

		}

		if($this->input->post('edit_toyr')) {

			$this->form_validation->set_rules('edit_toyr', 'To Year', 'required');

		}

		$this->form_validation->set_rules('edit_position', 'Position', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('edit_keyrole', 'Key Role', 'trim|callback_name_check');

		

		$toyr = ($this->input->post('edit_toyr'))?$this->input->post('edit_toyr'):date('Y');

		$frmyr = $this->input->post('edit_frmyr');

		$tomon = ($this->input->post('edit_tomon'))?$this->input->post('edit_tomon'):date('m');

		$frmmon = $this->input->post('edit_frmmon');

		

		$diff = (($toyr - $frmyr) * 12) + ($tomon - $frmmon);

		if($diff < 0) {

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! Invalid Dates given</div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=2&Stat=Failed');

		}



		if ($this->form_validation->run() == TRUE && $expid!='') {

			$this->candidatemodel->edit_workdetails($expid);

			$mailstatus = $this->update_notify($this->session->userdata('cand_chid')); //Update Notification Email

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully Updated! </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);			

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=1&Stat=Success');

		} else {

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! '.validation_errors().' </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=2&Stat=Failed');

		}

	}

	

	public function show_candidate_work($expid=null)

	{

		$formresult = '';

		$this->data["year_list"] 	= $this->candidatemodel->get_year();

		$this->data["month_list"] 	= $this->candidatemodel->get_month();

		$this->data["formdata"] 	= $this->candidatemodel->get_cand_work_single($expid);

		$this->load->view('editwork',$this->data);		

	}

	

	public function show_candidate_eduq($eduid=null)

	{

		$formresult = '';

		$this->data["year_list"] 		= $this->candidatemodel->get_year();

		$this->data["degree_list"] 		= $this->candidatemodel->get_degree();

		$this->data["degree_type_list"] = $this->candidatemodel->get_degreetype();

		$this->data["formdata"] 		= $this->candidatemodel->get_cand_eduq_single($eduid);

		$this->load->view('editeduq',$this->data);		

	}



	public function update_candidate_eduq($canid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$this->data['message'] = '';

		

		/*********Form Validation************/

		$this->form_validation->set_rules('school', 'School/University', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('degree_type', 'Qualification', 'required');

		$this->form_validation->set_rules('degree', 'Degree', 'required');		

		$this->form_validation->set_rules('spec', 'Specification', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('edufrmyr', 'From Year', 'required');

		$this->form_validation->set_rules('edutoyr', 'To Year', 'required');

		

		$toyr = ($this->input->post('edutoyr'))?$this->input->post('edutoyr'):date('Y');

		$frmyr = $this->input->post('edufrmyr');

		

		$diff = ($toyr - $frmyr);

		if($diff < 0) {

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! Invalid Dates given</div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=2&Stat=Failed');

		}



		if ($this->form_validation->run() == TRUE && $canid!='') {

			$this->candidatemodel->update_eduq_details($canid);

			$mailstatus = $this->update_notify($canid); //Update Notification Email

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully Updated! </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);			

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=1&Stat=Success');

		} else {

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! '.validation_errors().' </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=2&Stat=Failed');

		}

	}

	

	public function edit_candidate_eduq($eduid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$this->data['message'] = '';

		

		/*********Form Validation************/

		$this->form_validation->set_rules('edit_school', 'School/University', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('edit_degree_type', 'Qualification', 'required');

		$this->form_validation->set_rules('edit_degree', 'Degree', 'required');		

		$this->form_validation->set_rules('edit_spec', 'Specification', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('edit_edufrmyr', 'From Year', 'required');

		$this->form_validation->set_rules('edit_edutoyr', 'To Year', 'required');

		

		$toyr = ($this->input->post('edit_edutoyr'))?$this->input->post('edit_edutoyr'):date('Y');

		$frmyr = $this->input->post('edit_edufrmyr');

		

		$diff = ($toyr - $frmyr);

		if($diff < 0) {

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! Invalid Dates given</div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=2&Stat=Failed');

		}



		if ($this->form_validation->run() == TRUE && $eduid!='') {

			$this->candidatemodel->edit_eduq_details($eduid);

			$mailstatus = $this->update_notify($this->session->userdata('cand_chid')); //Update Notification Email

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully Updated! </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);			

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=1&Stat=Success');

		} else {

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! '.validation_errors().' </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=2&Stat=Failed');

		}

	}

	

	public function delete_candidate_edu($eduid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$this->data['message'] = '';

		if(!isset($eduid))  { 

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Failed to delete! Try again! </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Delete&del=2&Stat=Failed'); 

		}

		$edurecord = $this->candidatemodel->get_cand_eduq_single($eduid);

		

		if(count($edurecord) > 0) {

			$this->candidatemodel->delete_cand_edu($eduid);

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Educational qualification successfully Deleted! </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);			

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=1&Stat=Success'); 			

		} else {

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Failed to delete! Try again! </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Delete&del=2&Stat=Failed'); 

		}

	}

	

	public function delete_candidate_work($workid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$this->data['message'] = '';

		if(!isset($workid))  { 

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Failed to delete! Try again! </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Delete&del=2&Stat=Failed'); 

		}

		$wrecord = $this->candidatemodel->get_cand_work_single($workid);

		

		if(count($wrecord) > 0) {

			$this->candidatemodel->delete_cand_work($workid);

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Work experience successfully Deleted! </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);			

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=1&Stat=Success'); 			

		} else {

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Failed to delete! Try again! </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Delete&del=2&Stat=Failed'); 

		}

	}

	

	public function update_contact($canid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$this->data['message'] = '';

		

		/*********Form Validation************/

		$this->form_validation->set_rules('cntrycode', 'Country Code', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('phone', 'Phone No', 'trim|required|callback_name_check');

		//$this->form_validation->set_rules('emailid', 'Email ID', 'trim|required|valid_email');



		if ($this->form_validation->run() == TRUE && $canid!='') {

			$this->candidatemodel->update_contact($canid);

			$mailstatus = $this->update_notify($canid); //Update Notification Email

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully Updated! </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);			

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=1&Stat=Success');

		} else {

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! '.validation_errors().' </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=2&Stat=Failed');

		}

	}

	

	public function update_smedia($canid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$this->data['message'] = '';

		

		/*********Form Validation************/

		$this->form_validation->set_rules('linlink', 'Linked In', 'trim|callback_name_check');

		$this->form_validation->set_rules('fblink', 'Facebook', 'trim|callback_name_check');

		$this->form_validation->set_rules('twittlink', 'Twitter', 'trim|callback_name_check');

		$this->form_validation->set_rules('gpluslink', 'Google Plus', 'trim|callback_name_check');



		if ($this->form_validation->run() == TRUE && $canid!='') {

			$this->candidatemodel->update_smedia($canid);

			$mailstatus = $this->update_notify($canid); //Update Notification Email

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully Updated! </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);			

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=1&Stat=Success');

		} else {

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! '.validation_errors().' </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=2&Stat=Failed');	

		}

	}

	

	public function update_resume($canid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$this->data['message'] = '';
		$currentcvpath = '';
		$resultrecord 	= $this->candidatemodel->get_single_record($this->session->userdata('cand_chid'));
		$patchtoCV = realpath(APPPATH . '../resume');
		$currentResumewebpath = $resultrecord['cv_path'];
		$cvfilenamesplit = explode("http://cherryhire.com/resume/",$result['cv_path']);
		if($currentResumewebpath !='' ) {
			$link_array = explode('/',$currentResumewebpath);
			$cvfilenamesplit = end($link_array);
			$currentcvpath = $patchtoCV.'/'.$cvfilenamesplit;
		}

		/*********Form Validation************/

		$this->form_validation->set_rules('resumehead', 'Resume heading', 'trim|callback_name_check');

		if ($this->form_validation->run() == TRUE) {

			$cid 		= $canid;

			$upfilename = 'resume'.'_'.$cid;

			$this->load->library('upload');

			if (isset($_FILES['fileToUpload'])  && !empty($_FILES['fileToUpload']) && is_uploaded_file($_FILES['fileToUpload']['tmp_name']))  {
				if($currentcvpath != '' && file_exists($currentcvpath) ){
					unlink($currentcvpath);
				}
				$image_path 			= realpath(APPPATH . '../resume');

				$cv['upload_path'] 		= $image_path;

				$cv['allowed_types'] 	= 'doc|docx|pdf|DOC|DOCX|PDF';

				$cv['max_size']			= '0';

				$cv['file_name'] 		= $upfilename;

				

				$this->upload->initialize($cv);

				if ($this->upload->do_upload('fileToUpload')) {

					$this->upload_file_name = '';

					$data 	=  $this->upload->data();									

					$this->upload_file_name = $data['file_name'];	

					$cvpath = $data['full_path'];

					

					$cvid = $this->candidatemodel->postcv_details($cid,$cvpath);					

					$mailstatus = $this->update_notify($cid); //Update Notification Email

					

					$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

					 <button data-dismiss="alert" class="close" type="button">x</button> Your CV is successfully updated! </div>';

					$this->session->set_flashdata('errmsg', $this->data['message']);			

					redirect($this->config->base_url().'MyProfile/?Process=Update&upd=1&Stat=Success');

				} else {	

					$error = $this->upload->display_errors();

					$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

					 <button data-dismiss="alert" class="close" type="button">x</button> Failed to update your CV! '.$error.' </div>';

					$this->session->set_flashdata('errmsg', $this->data['message']);

					redirect($this->config->base_url().'MyProfile/?Process=Update&upd=102&Stat=Failed');	

				}

			 } else {

				 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

				 <button data-dismiss="alert" class="close" type="button">x</button>  Failed to update your CV! - Invalid File </div>';

				$this->session->set_flashdata('errmsg', $this->data['message']);

				redirect($this->config->base_url().'MyProfile/?Process=Update&upd=103&Stat=Failed');	

			 }



		} else {

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Failed to update your CV! '.validation_errors().' </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=104&Stat=Failed');	

		}

	}

	

	public function update_profile_pic($canid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$this->data['message'] = '';

	

		$cid = $canid;

		

		$upfilename = 'cand_pic'.'_'.$cid;

		

		$this->load->library('upload');

		//list($width, $height, $type, $attr) = getimagesize($_FILES['picToUpload']['tmp_name']);

		$imgsize 	= getimagesize($_FILES['picToUpload']['tmp_name']);

		$width 		= $imgsize[0];

		$height 	= $imgsize[1];

		if(($width>500 || $width<100 || $height>500 || $height<100)) {	

			$error = 'Image resolution should be minimum 100 x 100 and maximum 500 x 500.';

			$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Photo updation failed! '.$error.' </div>';

			$this->session->set_flashdata('errmsg', $this->data['message']);

			redirect($this->config->base_url().'MyProfile/?Process=Update&upd=3&Stat=Failed');	

		}

		if (isset($_FILES['picToUpload'])  && !empty($_FILES['picToUpload']) && is_uploaded_file($_FILES['picToUpload']['tmp_name']))  {

			

			$image_path 			= realpath(APPPATH . 'profilepic');

			$pic['upload_path'] 	= $image_path;

			$pic['allowed_types'] 	= 'jpg|jpeg|JPG|png|PNG|gif|GIF|JPEG';

			$pic['max_size']		= '0';

			$pic['file_name'] 		= $upfilename;

			

			$this->upload->initialize($pic);

			if ($this->upload->do_upload('picToUpload')) {

				$this->upload_file_name = '';

				$data 	=  $this->upload->data();									

				$this->upload_file_name = $data['file_name'];	

				$picpath = $data['full_path'];

				

				$picid = $this->candidatemodel->update_profilepic($cid,$picpath);					
				$picpaths = 'profilepic/'. basename($picpath);
				$sess_array = array('propics' => $picpaths);
				$this->session->set_userdata( $sess_array );
				
				
				//$mailstatus = $this->cvsendmail($cid,$cvpath);

				$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">

				 <button data-dismiss="alert" class="close" type="button">x</button> Photo updated successfully! </div>';

				$this->session->set_flashdata('errmsg', $this->data['message']);			

				redirect($this->config->base_url().'MyProfile/?Process=Update&upd=1&Stat=Success');

			} else {	

				$error = $this->upload->display_errors();

				$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

				 <button data-dismiss="alert" class="close" type="button">x</button>  Photo updation failed! '.$error.' </div>';

				$this->session->set_flashdata('errmsg', $this->data['message']);

				redirect($this->config->base_url().'MyProfile/?Process=Update&upd=2&Stat=Failed');	

			}

		 } else {

			 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">

			 <button data-dismiss="alert" class="close" type="button">x</button>  Photo updation failed! - Invalid File </div>';

			 $this->session->set_flashdata('errmsg', $this->data['message']);

			 redirect($this->config->base_url().'MyProfile/?Process=Update&upd=2&Stat=Failed');	

		 }

	}

	

	function update_notify($cid=null)

	{

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session

		$this->data['message'] = '';

		$subject 	= 'Updated your profile in Cherry Hire.com';

		$result 	= $this->candidatemodel->get_single_record($this->session->userdata('cand_chid'));

		$from 		= 'do-not-reply@cherryhire.com';

		$FName 		= $result['can_fname'];

		$LName 		= $result['can_lname'];

		$RegEmail 	= $result['can_email'];

		$to 		= $RegEmail;	

		

		$updatemessage    = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

								<html><head><title>Cherry Hire_Updation</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>

								<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

								<table id="Table_01" width="596" height="507" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#ececec; font-size:14px; font-family:Arial, Helvetica, sans-serif;">

									<tr>

										<td rowspan="7" style="width:5px; height:507px;"> </td>

										<td colspan="7" style="width:585px; height:82px; background:#ececec;">

											<a href="http://www.cherryhire.com" target="_blank"><img src="'.$this->config->item('web_url').'emailtemplate/logohome.png" alt=""></a>

										</td>

										<td rowspan="7" style="width:6px; height:507px;"> </td>

									</tr>

									<tr>

										<td colspan="7" style="background:#AD1E24; width:585px; height:110px; vertical-align:middle; color:#FFF; padding:10px 40px 0px 40px; font-size:40px; font-weight:bold;" valign="middle">

											Profile updated with <span style="color:#FC0">Cherry Hire.com</span>

										</td>

									</tr>

									<tr>

										<td style="width:10px; height:10px; line-height:0px;" valign="top"><img src="'.$this->config->item('web_url').'emailtemplate/Cherry-Hire_Register_05.jpg" alt=""></td>

										<td colspan="5" style="width:564px; height:10px;background:#FFF; "> </td>

										<td style="width:11px; height:10px; line-height:0px;" valign="top"><img src="'.$this->config->item('web_url').'emailtemplate/Cherry-Hire_Register_07.jpg" alt=""></td>

									</tr>

									<tr>

										<td rowspan="3" style="width:10px; height:260px;"> </td>

										<td colspan="5" style="width:564px; height:24px;background:#FFF; "></td>

										<td rowspan="3" style="width:11px; height:260px;"> </td>

									</tr>

									<tr>

										<td rowspan="2" style="width:27px; height:236px;background:#FFF; "> </td>

										<td colspan="3" style="width:492px; height:93px;background:#FFF; line-height:30px;">

										<p>Dear '.$FName.'</p>

								

										<p>We have found that you have updated your profile recently. However, we recommend you to keep it completely updated especially the social media portion so as to increase the visibility of your profile by top employers</p>

										

                                        <p style="font-weight:bold;">To get noticed, we recommended you do the following:</p>

                                        <p>

                                            &bull; Update your profile regularly <br >

                                            &bull; Search and Apply to Jobs <br >

                                            &bull; Set Profile Privacy Settings

                                        </p>

                                            

										<p>For any queries send us an email at jobassist@cherryhire.com <br >

								            Good Luck in your journey to find a great job!</p>

										</td>

										<td rowspan="2" style="width:45px; height:236px;background:#FFF; "> </td>

									</tr>

									<tr>

										<td colspan="3" style="width:492px; height:143px;background:#FFF; padding:0px 0px 0px 10px; line-height:21px; font-size:12px; ">

											Regards, <br >

											Jacob Thomas <br >

											Co-Founder & CEO, Cherry Hire.com <br >

											www.cherryhire.com        

										</td>

									</tr>

									<tr>

										<td colspan="2" style="width:37px; height:45px; background:#ececec;"></td>

										<td style="width:193px; height:45px; background:#ececec;"></td>

										<td style="width:119px; height:45px; background:#ececec;">

											<a href="https://www.facebook.com/cherryhire" target="_blank"><img src="'.$this->config->item('web_url').'emailtemplate/sicon1.png" alt=""></a>

											<a href="https://twitter.com/cherry_hire" target="_blank"><img src="'.$this->config->item('web_url').'emailtemplate/sicon2.png" alt=""></a>

											<a href="https://www.linkedin.com/company/cherry-hire" target="_blank"><img src="'.$this->config->item('web_url').'emailtemplate/sicon3.png" alt=""></a>

											<a href="https://www.instagram.com/cherryhire/" target="_blank"><img src="'.$this->config->item('web_url').'emailtemplate/sicon4.png" alt=""></a>

										</td>

										<td style="width:180px; height:45px; background:#ececec;"></td>

										<td colspan="2" style="width:56px; height:45px; background:#ececec;"></td>

									</tr>

								</table>

								</body></html>';

								

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

		$this->email->from($from, 'Cherry Hire');

		$this->email->to($to);

		$this->email->subject($subject);

		$this->email->message($updatemessage);

		if ($this->email->send()) {

			return 1;

		} else {

			return 0;

		}

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

	

	function getDomainName($url)

	{

		if(filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_HOST_REQUIRED) === FALSE) {

			return false;

		}

		

		$urlChenks = parse_url($url);

		return $urlChenks['scheme'].'://'.$urlChenks['host'];

	}

	

	function clear_cache()

    {

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");

        $this->output->set_header("Pragma: no-cache");

    }

}