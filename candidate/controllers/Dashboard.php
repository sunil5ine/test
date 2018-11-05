<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->clear_cache();
		$this->load->model('dashboardmodel');
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

		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session
		$this->data['message'] = '';
		
		if($this->session->flashdata('errmsg')){ $this->data['message'] = $this->session->flashdata('errmsg'); }
		
		$this->data['cdata'] 		= $this->dashboardmodel->get_single_record($this->session->userdata('cand_chid'));
		$this->data['cwork'] 		= $this->dashboardmodel->get_cand_work($this->session->userdata('cand_chid'));
		$this->data['cedu_details'] = $this->dashboardmodel->get_cand_eduq($this->session->userdata('cand_chid'));
		
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
			'csal'=>$this->data['cdata']['can_curr_sal'],
			'cfarea'=>$this->data['cdata']['jfun_display'],
			'cindustry'=>$this->data['cdata']['ind_display'],
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
		
		$this->data["degree_list"] = $this->dashboardmodel->get_degree();
		$this->data["degree_type_list"] = $this->dashboardmodel->get_degreetype();
		$this->data["country_list"] = $this->dashboardmodel->get_country();
		$this->data["pre_country_list"] = $this->dashboardmodel->get_pref_country();
		$this->data["nation_list"] = $this->dashboardmodel->get_nationality();
		$this->data["edu_list"] = $this->dashboardmodel->get_edu();
		$this->data["funarea_list"] = $this->dashboardmodel->get_farea();
		$this->data["ind_list"] = $this->dashboardmodel->get_industry();
		$this->data["year_list"] = $this->dashboardmodel->get_year();
		$this->data["month_list"] = $this->dashboardmodel->get_month();
		
		$this->load->view('new/candidate-profile',$this->data);
		
	}
	
	public function profile()
	{
		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session
		$this->data['message'] = '';
		$this->data['pwdstat'] = 0;
		
		$this->data['cdata'] = $this->dashboardmodel->get_single_record($this->session->userdata('cand_chid'));
		
		if(empty($this->data['cdata'])) { redirect($this->config->base_url().'LoginProcess'); }
		$today = date('Y-m-d');
		
		if(md5($this->session->userdata('cand_chpwd')) == md5($this->input->post('oldpwd'))) {
			/*********Form Validation************/
			$this->form_validation->set_rules('usrpwd', 'Password', 'trim|required|min_length[8]|callback_name_check');
			$this->form_validation->set_rules('repwd', 'Confirm Password', 'trim|required|min_length[8]|matches[usrpwd]');
			if ($this->form_validation->run() == TRUE)
			{
				$this->dashboardmodel->update_profile(); //Update details
				$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-success">
				 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully Updated! </div>';
				$this->session->set_flashdata('errmsg', $this->data['message']);			
				$this->data['pwdstat'] = 1;
			} else {
				$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
			 			<button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed! '.validation_errors().' </div>';
			}
		
		} else {
			if($this->input->post('oldpwd')) {
				$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
			 		<button data-dismiss="alert" class="close" type="button">x</button>  Unable to process! - Your password was incorrect. </div>';
			}
		}
		$this->data['formdata'] = array(
			'cid'=>$this->data['cdata']['can_id'],
			'encrypt_id'=>$this->data['cdata']['can_encrypt_id'],
			'cmail'=>$this->data['cdata']['can_email'],
			'usrpwd'=>$this->data['cdata']['can_hash'],
			'repwd'=>$this->data['cdata']['can_hash'],
			'createddt'=>date('d F Y', strtotime($this->data['cdata']['can_reg_date'])),
			'updateddt'=>date('d F Y H:i:s', strtotime($this->data['cdata']['can_upd_date'])),
		);
		$this->data['mid'] 				= 2;
		$this->data['sid'] 				= 1;
		$this->data['title'] 			= 'Cherry Hire - Candidate Settings';
		
		// $this->load->view('common/header_inner',$this->data);
		// $this->load->view('common/leftmenu',$this->data);
		// $this->load->view('common/topmenu',$this->data);
		// $this->data['footer_nav']=$this->load->view('common/footerbar',$this->data,true);
		// $this->load->view('profile',$this->data);
		// $this->load->view('common/footer_inner',$this->data);
		 
		$this->load->view('new/candidate-password-change',$this->data);
	}
	
	public function skilllist()
	{
		$term = $this->input->post('term');
		$skill_list = $this->dashboardmodel->get_skill_list();
		echo $skill_list;
	}
		
	public function chk_curr_password()
	{
		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session
		$this->data['message'] = '';
		$this->data['pwdstat'] = 0;		
		$currpwd = $this->input->post('cpwd');
		$result = $this->dashboardmodel->chk_pwd_record($this->session->userdata('cand_chid'), $currpwd);
		if ($result == 0) {
			echo 0;//email is unique. not signed up before
		} else {
			echo 1;
		}
		
	}
	
	public function support()
	{
		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session
		$this->data['message'] = '';
		
		$this->data['mid'] 				= 4;
		$this->data['sid'] 				= 0;
		$this->data['title'] 			= 'Cherry Hire - Candidate Support';
		
		$this->load->view('common/header_inner',$this->data);
		$this->load->view('common/leftmenu',$this->data);
		$this->load->view('common/topmenu',$this->data);
		$this->data['footer_nav']=$this->load->view('common/footerbar',$this->data,true);
		$this->load->view('support',$this->data);
		$this->load->view('common/footer_inner',$this->data);
		
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
	
	function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }


/* new 5ine developers */

/*Personal detail update */
public function personal_update()
{
	if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
	$can_id 	= $this->session->userdata('cand_chid');
	$fname 		= $this->input->post('fname');
	$lname 		= $this->input->post('lname');
	$email 		= $this->input->post('email');
	$contact 	= $this->input->post('contact');
	$gender 	= $this->input->post('gender');
	$dob 		= date("Y-m-d",strtotime($this->input->post('dob')));
	$nation 	= $this->input->post('nation');
	$ccode 		= $this->input->post('cntrycode');

	$updata = array(
					'can_fname'  	=>$fname,
					'can_email'  	=>$email ,
					'can_phone'  	=>$contact ,
					'can_gender'  	=>$gender ,
					'can_dob'  		=>$dob ,
					'co_id'  =>$nation ,
					'can_lname'  	=>$lname ,
					'can_ccode'  	=>$ccode ,
	);
	if($this->dashboardmodel->personal_update($updata,$can_id) == false)
	{
		$this->session->set_flashdata('message', '<div style="margin-top: 16px;" class="alert alert-success">
				 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully Updated! </div>');
		redirect('MyProfile');
	}
	else
	{
		$this->session->set_flashdata('message', '<div style="margin-top: 16px;" class="alert alert-error">
			 			<button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed!  </div>');
		redirect('MyProfile');
	}
}


/* profile edite */
public function profile_upload($caneid = null)
{

	if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
		$can_id 		= $this->session->userdata('cand_chid');
		$desg 			= $this->input->post('desg');
		$ccomp 			= $this->input->post('ccomp');
		$cfarea 		= $this->input->post('cfarea');
		$cexp 			= $this->input->post('cexp');
		$csal 			= $this->input->post('csal');
		$cindustry 		= $this->input->post('cindustry');
		$preffered		= $this->input->post('preffered');
		$cskills		= $this->input->post('cskills');
		$ccurrloc 		= $this->input->post('ccurrloc');
		if (!empty($preffered)) {
			$prefloc = implode(',',$preffered);
		} else {
			$prefloc = '';
		}

		$updata = array(
			'can_curr_desig'	 	=> $desg, 
			'can_curr_company' 		=> $ccomp, 
			'fun_id' 				=> $cfarea, 
			'can_experience' 		=> $cexp, 
			'can_curr_sal' 			=> $csal, 
			'ind_id' 				=> $cindustry, 
			'can_pref_loc' 			=> $prefloc, 
			'can_skills' 			=> $cskills, 
			'can_curr_loc' 			=> $ccurrloc, 
		);
		if($this->dashboardmodel->profile_upload($updata,$can_id,$caneid))
		{
			$this->session->set_flashdata('message', '<div style="margin-top: 16px;" class="alert alert-success">
				 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully Updated! </div>');
			redirect('MyProfile');
		}
		else
		{
			$this->session->set_flashdata('message', '<div style="margin-top: 16px;" class="alert alert-error">
				 			<button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed!  </div>');
			redirect('MyProfile');
		}

}


public function addwork($can_en=null)
{
	if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
		$cid        = $this->session->userdata('cand_chid');
		$company 	= $this->input->post('company');
		$location 	= $this->input->post('location');
		$smnt 		= $this->input->post('frmmon');
		$syrs 		= $this->input->post('frmyr');
		$emnt		='';
		$eyrs		='';
		$postion 	= $this->input->post('position');
		$keyrol 	= $this->input->post('keyrole');
		$crc  		= $this->input->post('cmp_present');
		if (empty($crc)) {
			$emnt 		= $this->input->post('tomon');
			$eyrs 		= $this->input->post('toyr');	
			$crc = '0';
		}
		else
		{
			$crc = "1";
		}

	$work_data=array(
			'can_id'=>$cid,
			'cexp_company'	=>$company,
			'cexp_location'	=>$location,
			'cexp_from_mon'	=>$smnt,
			'cexp_from_yr'	=>$syrs,
			'cexp_to_mon'	=>$emnt,
			'cexp_to_yr'	=>$eyrs,
			'cexp_position'	=>$postion,
			'cexp_key_role'	=>$keyrol,
			'cexp_present'	=>$crc,
			'cexp_updatedt'	=>date('Y-m-d H:i:s'),
			'cexp_encrypt_id' =>$can_en,
		);
	if($this->dashboardmodel->addwork($work_data))
		{
			$this->session->set_flashdata('message', '<div style="margin-top: 16px;" class="alert alert-success">
				 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully Updated! </div>');
			redirect('MyProfile');
		}
		else
		{
			$this->session->set_flashdata('message', '<div style="margin-top: 16px;" class="alert alert-error">
				 			<button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed!  </div>');
			redirect('MyProfile');
		}

	
}


/* delete items */

function delete_work_experience()
{
	$canid 	= $this->session->userdata('cand_chid');
	$enid 	= $this->input->get('workid');
	if($this->dashboardmodel->delete_work_experience($canid, $enid))
		{
			$this->session->set_flashdata('message', '<div style="margin-top: 16px;" class="alert alert-success">
				 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully Deleted! </div>');
			redirect('MyProfile');
		}
		else
		{
			$this->session->set_flashdata('message', '<div style="margin-top: 16px;" class="alert alert-error">
				 			<button data-dismiss="alert" class="close" type="button">x</button>  Unable to delete. please try again later   </div>');
			redirect('MyProfile');
		}
}

/* get experience single row */
function getsingle_work_experience()
{
	$canid 	= $this->session->userdata('cand_chid');
	$enid 	= $this->input->get('workid');
	if($this->data['wore'] = $this->dashboardmodel->getsingle_work_experience($canid, $enid))
	{
		$this->data['wore'] = array(
			'cid' 			=>$this->data['wore']['can_id'],
			'cwid'			=>$this->data['wore']['cexp_encrypt_id'],
			'cwcompany'		=>$this->data['wore']['cexp_company'],
			'celocation'	=>$this->data['wore']['cexp_location'],
			'cwfm'			=>$this->data['wore']['cexp_from_mon'],
			'cwfy'			=>$this->data['wore']['cexp_from_yr'],
			'cwem'			=>$this->data['wore']['cexp_to_mon'],
			'cwey'			=>$this->data['wore']['cexp_to_yr'],
			'cwposi'		=>$this->data['wore']['cexp_position'],
			'cerole'		=>$this->data['wore']['cexp_key_role'],
			'cwpresent'		=>$this->data['wore']['cexp_present'],
		);
		$this->data["year_list"] = $this->dashboardmodel->get_year();
		$this->data["month_list"] = $this->dashboardmodel->get_month();
		$this->data['pagehead'] = 'Edit Work Experience';
		$this->load->view('new/edite-work',$this->data);
	}
	else{
		$this->session->set_flashdata('message', '<div style="margin-top: 16px;" class="alert alert-error">
				 			<button data-dismiss="alert" class="close" type="button">x</button> This data does not exist.<br>Please clear Your browser cookies.!</div>');
		redirect('MyProfile');
	}
}


/* update work experience */
public function update_works()
{
	if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
		$cid        = $this->session->userdata('cand_chid');
		$company 	= $this->input->post('company');
		$location 	= $this->input->post('location');
		$smnt 		= $this->input->post('frmmon');
		$syrs 		= $this->input->post('frmyr');
		$emnt		='';
		$eyrs		='';
		$postion 	= $this->input->post('position');
		$keyrol 	= $this->input->post('keyrole');
		$crc  		= $this->input->post('cmp_present');
		$can_en		= $this->input->post('work_id');
		if (empty($crc)) {
			$emnt 		= $this->input->post('tomon');
			$eyrs 		= $this->input->post('toyr');	
			$crc = '0';
		}
		else
		{
			$crc = "1";
		}

		$work_data=array(
			
			'cexp_company'	=>$company,
			'cexp_location'	=>$location,
			'cexp_from_mon'	=>$smnt,
			'cexp_from_yr'	=>$syrs,
			'cexp_to_mon'	=>$emnt,
			'cexp_to_yr'	=>$eyrs,
			'cexp_position'	=>$postion,
			'cexp_key_role'	=>$keyrol,
			'cexp_present'	=>$crc,
			'cexp_updatedt'	=>date('Y-m-d H:i:s'),
			
		);

		if($this->dashboardmodel->update_works($work_data,$can_en,$cid))
		{
			$this->session->set_flashdata('message', '<div style="margin-top: 16px;" class="alert alert-success">
				 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully Updated! </div>');
			redirect('MyProfile');
		}
		else
		{
			$this->session->set_flashdata('message', '<div style="margin-top: 16px;" class="alert alert-error">
				 			<button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed!  </div>');
			redirect('MyProfile');
		}
}

/* delete education */
function delete_edution()
{
	
	if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
	$cid        = $this->session->userdata('cand_chid');
	$eudid = $this->input->get('edu');
	if($this->dashboardmodel->delete_edution($cid, $eudid))
		{
			$this->session->set_flashdata('message', '<div style="margin-top: 16px;" class="alert alert-success">
				 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully Deleted! </div>');
			redirect('MyProfile');
		}
		else
		{
			$this->session->set_flashdata('message', '<div style="margin-top: 16px;" class="alert alert-error">
				 			<button data-dismiss="alert" class="close" type="button">x</button>  Unable to delete. please try again later   </div>');
			redirect('MyProfile');
		}
}


/* get education single row for editing */

function edite_edution()
{	
	if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
	$cid    = $this->session->userdata('cand_chid');
	$eudid  = $this->input->get('edu');
	$this->data['pagehead'] = 'Edit Education';
	if ($this->data['education'] = $this->dashboardmodel->edite_edution($cid, $eudid)) {
		
		$this->data['education'] = array(
			'cid' 		=> $this->data['education']['can_id'],
			'ceid' 		=> $this->data['education']['cedu_encrypt_id'],
			'ceshool' 	=> $this->data['education']['cedu_school'],
			'cdegtype' 	=> $this->data['education']['deg_type_id'],
			'cspliz' 	=> $this->data['education']['cedu_specialization'],
			'cstrt' 	=> $this->data['education']['cedu_startdt'],
			'cendt' 	=> $this->data['education']['cedu_enddt'],
			'cedstatus' => $this->data['education']['cedu_status'],
			'deg_id' 	=> $this->data['education']['deg_id'],
			
		);
		$this->data["degree_list"] = $this->dashboardmodel->get_degree();
		$this->data["degree_type_list"] = $this->dashboardmodel->get_degreetype();
		$this->data["year_list"] = $this->dashboardmodel->get_year();
		$this->data["month_list"] = $this->dashboardmodel->get_month();

		$this->load->view('new/edite-education',$this->data);

	}
	else{
		$this->session->set_flashdata('message', '<div style="margin-top: 16px;" class="alert alert-error">
				 			<button data-dismiss="alert" class="close" type="button">x</button> This data does not exist.<br>Please clear Your browser cookies.!</div>');
		redirect('MyProfile');
	}
}


/* update edu catlion details */

function update_education()
{
	if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
	$cid    		= $this->session->userdata('cand_chid');
	$ceid 			= $this->input->post('ceid');
	$school 		= $this->input->post('school');
	$degree_type 	= $this->input->post('degree_type');
	$degree 		= $this->input->post('degree');
	$spec 			= $this->input->post('spec');
	$edufrmyr 		= $this->input->post('edufrmyr');
	$edutoyr 		= $this->input->post('edutoyr');

	$data = array(
		'cedu_school' 			=> $school, 
		'deg_type_id' 			=> $degree_type, 
		'deg_id' 				=> $degree, 
		'cedu_specialization' 	=> $spec, 
		'cedu_startdt' 			=> $edufrmyr, 
		'cedu_enddt' 			=> $edutoyr, 
		'cedu_updatedt' 		=> date('Y-m-d H:i:s'), 
	);
	
	if($this->dashboardmodel->update_education($data,$ceid,$cid))
		{
			$this->session->set_flashdata('message', '<div style="margin-top: 16px;" class="alert alert-success">
				 <button data-dismiss="alert" class="close" type="button">x</button>  Successfully Updated! </div>');
			redirect('MyProfile');
		}
		else
		{
			$this->session->set_flashdata('message', '<div style="margin-top: 16px;" class="alert alert-error">
				 			<button data-dismiss="alert" class="close" type="button">x</button>  Updation Failed!  </div>');
			redirect('MyProfile');
		}
}



}

