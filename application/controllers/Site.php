<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {
	
	/* Init function
	 * return void
	 */
    
        public $mgClient = '';
		public $domain = '';
    //    protected $CI;

	public function __construct()
	{
		parent::__construct();
		$this->clear_cache();
		$this->load->library('email'); // load email library
		$this->load->model('sitemodel');
		$this->data['thisyear'] = date('Y');
		$this->data['mid'] 		= 0;
		$this->data['emid'] 	= 99;
		$this->data['cmid'] 	= 0;
		
            //    $this->CI = & get_instance();
                
		//$this->mgClient = new Site('d8f3066eee1d31f39228ec8b6c5ef54e-a5d1a068-cf700220');
		//$this->domain = "mailer.cherryhire.com";
             //   $mgClient = new Site('d8f3066eee1d31f39228ec8b6c5ef54e-a5d1a068-cf700220');
             //   $domain = "mailer.cherryhire.com";
	}
	
	/* Index function
	 *
	 * return void
	 */
	public function index()
	{
		$this->data['message'] 	= '';
		$this->data['title']	= 'CherryHire - Opportunities';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, Post job, CV shortlisting';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['mid'] 		= 0;
		$this->data['emid'] 	= 99;
		$this->data['fetu_jobs'] = $this->sitemodel->getfetured();
		$this->load->model('jobportalmodel');
		$this->data["country_list"] = $this->jobportalmodel->get_country();
        $this->load->view('new/index',$this->data);
                    

                
	}
	
        
    public function psychometric()
	{
		$this->data['message'] 	= '';
		$this->data['title']	= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['emid'] 	= 99;
                
                
                // $this->load->view('layer/header',$this->data);
                // $this->load->view('layer/nav',$this->data);
                // $this->load->view('layer/physometric',$this->data);
                // $this->load->view('layer/footer',$this->data);  
                // 
            $this->load->view('new/physometric',$this->data);
	}
        
        public function psycho_test(){
         
        if($this->session->userdata('cand_chid')) {
           
            redirect(base_url()."candidate/psychotest"); 
            
        }else{ 
            redirect(base_url()."/candidate"); 
        }
        }
        
        public function cv_writing_service(){
         
        if($this->session->userdata('cand_chid')) {
           
            redirect(base_url()."candidate/cvwriting"); 
            
        }else{ 
            redirect(base_url()."candidate"); 
        }
        }
        
        
                	public function cv_writing()
	{
		$this->data['message'] 	= '';
		$this->data['title']	= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['emid'] 	= 99;
                
                
                $this->load->view('layer/header',$this->data);
                $this->load->view('layer/nav',$this->data);
                $this->load->view('layer/cv_writing',$this->data);
                $this->load->view('layer/footer',$this->data);  
	}
	/* Home page function
	 *
	 * return void
	 */
	public function home()
	{
		$this->data['message'] 	= '';
		$this->data['title']	= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['emid'] 	= 99;
		$this->load->view('common/header',$this->data);
		$this->load->view('common/home-menu',$this->data);
		$this->load->view('home',$this->data);
		$this->load->view('common/footer',$this->data);
	}
	
	/* Employer about-us page
	 *
	 * return void
	 */
	public function about()
	{
		$this->data['message'] 	= '';
		$this->data['title']	= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['emid'] 	= 99;
		// $this->load->view('common/header',$this->data);
		// $this->load->view('common/home-menu',$this->data);
		$this->load->view('new/about',$this->data);
		// $this->load->view('common/footer',$this->data);
	}
	
	/* Employer features page
	 *
	 * return void
	 */
	public function features()
	{
		$this->data['message'] 	= '';
		$this->data['title']	= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['emid'] 	= 1;
		$this->load->view('common/header',$this->data);
		$this->load->view('common/employer-menu',$this->data);
		$this->load->view('features',$this->data);
		$this->load->view('common/footer',$this->data);
	}
	
	/* Employer pricing
	 *
	 * return void
	 */
	public function pricing()
	{
		$this->data['message'] 	= '';
		$this->data['title']	= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data["mon_plan"] = $this->sitemodel->get_candidates();
		$this->data["employer"] = $this->sitemodel->get_employersplan();
		$this->load->view('new/pricing',$this->data);
		
	}
	
	/* CV Writing page
	 *
	 * return void
	 */
	public function cvwriting()
	{
		$this->data['message'] 	= '';
		$this->data['title']	= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['emid'] 	= 1;
		$this->load->view('common/header',$this->data);
		$this->load->view('common/candidate-menu',$this->data);
		$this->load->view('cv-writing',$this->data);
		$this->load->view('common/footer',$this->data);
	}
	
	/* Candidate pricing
	 *
	 * return void
	 */
	public function plan()
	{
		$this->data['message'] 	= '';
		$this->data['title']	= 'Post CV Online Free|Find Jobs|Conduct Video Interviews';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['cmid'] 	= 3;
		$this->load->view('common/header',$this->data);
		$this->load->view('common/candidate-menu',$this->data);
		$this->load->view('candidate_pricing',$this->data);
		$this->load->view('common/footer',$this->data);
	}
	
	/* FAQ page
	 *
	 * return void
	 */
	public function faq()
	{
		$this->data['message'] 	= '';
		$this->data['title']	= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['emid'] 	= 99;
		$this->load->view('common/header',$this->data);
		$this->load->view('common/home-menu',$this->data);
		$this->load->view('faq',$this->data);
		$this->load->view('common/footer',$this->data);
	}
	
	/* Jobboards list page
	 *
	 * return void
	 */
	public function joboards()
	{
		$this->data['message'] 	= '';
		$this->data['title']	= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['emid'] 	= 99;
		$this->load->view('common/header',$this->data);
		$this->load->view('common/home-menu',$this->data);
		$this->load->view('joboards',$this->data);
		$this->load->view('common/footer',$this->data);
	}
	
	/* Privacy page
	 *
	 * return void
	 */
	public function privacy()
	{
		$this->data['message'] 	= '';
		$this->data['title']	= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['emid'] 	= 99;
		$this->load->view('common/header',$this->data);
		$this->load->view('common/home-menu',$this->data);
		$this->load->view('privacy',$this->data);
		$this->load->view('common/footer',$this->data);
	}
	
	/* Disclamer page
	 *
	 * return void
	 */
	public function disclaimer()
	{
		$this->data['message'] 	= '';
		$this->data['title']	= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['emid'] 	= 99;
		$this->load->view('common/header',$this->data);
		$this->load->view('common/home-menu',$this->data);
		$this->load->view('disclaimer',$this->data);
		$this->load->view('common/footer',$this->data);
	}
	
	/* T&C page
	 *
	 * return void
	 */
	public function terms()
	{
		$this->data['message'] 	= '';
		$this->data['title']	= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['emid'] 	= 99;
		$this->load->view('common/header',$this->data);
		$this->load->view('common/home-menu',$this->data);
		$this->load->view('terms',$this->data);
		$this->load->view('common/footer',$this->data);
	}
	
	/* Employer Signup function
	 *
	 * return void
	 */
	public function postjob()
	{
		$this->data['message'] 	= '';
		$this->data['status'] 	= '';
		if ($this->input->post('fname') && $this->input->post('emailid')) {
			//This section is used to handle if there is an input from the home page
			$Username 	= ltrim(rtrim($this->input->post('fname')));
			$name 		= explode(' ', $Username);
			if (count($name) > 1) {
				$string 	= ltrim(rtrim($this->input->post('fname')));
				$last_space = strrpos($string, ' ');
				$lname 		= substr($string, $last_space);
				$fname 		= substr($string, 0, $last_space);
			} else {
				$fname = $name[0];
				$lname = '';
			}
			$emailid = $this->input->post('emailid');
			//Form validation
			$this->form_validation->set_rules('fname', 'Name', 'trim|required|callback_name_check');
			$this->form_validation->set_rules('emailid', 'Email ID', 'trim|required|valid_email|is_unique[ch_employer.emp_email]');
			$this->form_validation->set_message('is_unique', 'An account with this %s already exists. Kindly use a different one or sign in using your username and password');
			
			if ($this->form_validation->run() == FALSE) {
				//Validation fails
				$this->data['status'] 	= 'fail';
				$this->data['message'] 	= '<div class="alert alert-danger">
                    <strong>Failed!</strong> Sorry, we are unable to process your request. Please try again.
					'.validation_errors().'
                  </div>';
			}
		} else {
			$fname 		= '';
			$lname 		= '';
			$emailid 	= '';
		}
		
		$this->data['formdata'] = array(
			'firstname'=>ucwords($fname),
			'lastname'=>ucwords($lname),
			'designation'=>'',
			'cntrycode'=>'',
			'phone'=>'',
			'emailid'=>$emailid,
			'usrpwd'=>'',
			'repwd'=>'',
			'comp'=>'',
			'complocation'=>'',
			'url'=>'',
			'empcnt'=>'',
			'descr'=>'',
			'emptype'=>'1',
		);
		
		if($this->input->get('ins') == 1) {
			$this->data['status'] 	= 'success';
			$this->data['message'] 	= '<div class="alert alert-success fade in">
									<strong>Success!</strong> Thank you for registering on www.cherryhire.com , first platform in the 	region to provide verified candidates.
								We just need to verify your email to activate your account. Please click on the verification link sent to your email and get started. 
								</div>';
			
		}
		$this->data["country_list"] = $this->sitemodel->get_cmp_location(); //Get country list
		$this->data['title']		= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']		= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']		= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['emid'] 		= 2;
		$this->data['submiturl'] 	= 'Employer/CreateAccount'; //Form submit URL

		
		$this->load->view('new/employer-registration',$this->data);

	}
	
	/* Newsletter function
	 *
	 * return void
	 */
	public function newsletter()
	{
		$this->data['message'] 	= '';
		$this->data['status'] 	= '';
		if ($this->input->post('nl_emailid')) {			
			$emailid 	= $this->input->post('nl_emailid');
			$returnURL 	= $this->input->post('nl_Return');
			//Form validation
			$this->form_validation->set_rules('nl_emailid', 'Email ID', 'trim|required|valid_email|is_unique[ch_newsletter.nl_email]');
			$this->form_validation->set_message('is_unique', 'An account with this %s already subscribed. Kindly use a different one');
			
			if ($this->form_validation->run() == FALSE) {
				$this->data['status'] 	= 'fail';
				$this->data['message'] 	= '<div class="alert alert-danger">
                    <strong>Failed!</strong> Sorry, we are unable to process your request. Please try again.
					'.validation_errors().'
                  </div>';
			} else {
				$formdata = array(
					'nl_email'=>$emailid,
					'nl_date'=>date('Y-m-d H:i:s'),
					'nl_status'=>'1',
				);
				$nlid = $this->sitemodel->post_newsletter($formdata);
				$this->data['status'] 	= 'success';
				$this->data['message'] 	= '<div class="alert alert-success fade in">
					<strong>Success!</strong> Thank you for subscribing to the Cherry Hire newsletter. </div>';
			}
		} else {
			$this->data['status'] 	= 'fail';
			$this->data['message'] 	= '<div class="alert alert-danger">
				<strong>Failed!</strong> Sorry, we are unable to process your request. Please try again.
				'.validation_errors().'
			  </div>';
		}		
		echo $this->data['message'];
	}
	
	/* Employer free trial function
	 *
	 * return void
	 */
	public function reg_freetrial()
	{
		$this->data['message'] 	= '';
		$this->data['status'] 	= '';
		$this->data['formdata'] = array(
			'firstname'=>'',
			'lastname'=>'',
			'designation'=>'',
			'cntrycode'=>'',
			'phone'=>'',
			'emailid'=>'',
			'usrpwd'=>'',
			'repwd'=>'',
			'comp'=>'',
			'complocation'=>'',
			'url'=>'',
			'empcnt'=>'',
			'descr'=>'',
			'emptype'=>'1',
		);
		
		if($this->input->get('ins') == 1) {
			$this->data['status'] = 'success';
			$this->data['message'] = '<div class="alert alert-success fade in">
			<strong>Success!</strong> Thank you for registering with Cherryhire.com, the latest tool to shortlist and rank candidates as per your job description.<br > An email verification link has been sent to you. Kindly verify it for us to activate your account. <br > In case you do not hear from us in 48hrs, you can reach us on support@cherryhire.com.</div>';			
		}
		$this->data["country_list"] = $this->sitemodel->get_cmp_location(); // Get country List
		$this->data['title']		= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']		= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']		= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['emid'] 		= 4;
		$this->data['submiturl'] 	= 'Employer/CreateAccount'; //Form submit URL
		$this->load->view('common/header',$this->data);
		$this->load->view('common/employer-menu',$this->data);
		$this->load->view('signup',$this->data);
		$this->load->view('common/footer',$this->data);
	}
	
	/* PeopleSearch reg function
	 *
	 * return void
	 */
	public function peoplesearch()
	{
		$this->data['message'] 	= '';
		$this->data['formdata'] = array(
			'firstname'=>'',
			'lastname'=>'',
			'cntrycode'=>'',
			'phone'=>'',
			'emailid'=>'',
			'usrpwd'=>'',
			'repwd'=>'',
			'comp'=>'',
			'url'=>'',
			'empcnt'=>'',
			'descr'=>'',
			'emptype'=>'1',
		);
		
		if ($this->input->get('ins') == 1) {
			$this->data['status'] = 'success';
			$this->data['message'] = '<div class="alert alert-success fade in">
			<strong>Success!</strong> Thank you for registering with Cherryhire.com - People Search APP, the own storage and latest tool to shortlist and rank candidates as per your job description.<br > An email verification link has been sent to you. Kindly verify it for us to activate your account. <br > In case you do not hear from us in 48hrs, you can reach us on support@cherryhire.com.</div>';			
		}
		
		$this->data['title']		= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']		= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']		= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['emid'] 		= 99;
		$this->data['submiturl'] 	= 'PeopleSearch'; //From submit URL
		$this->load->view('common/header',$this->data);
		$this->load->view('peoplesearch',$this->data);
		$this->load->view('common/footer',$this->data);
	}
	
	/* Contact-us page
	 *
	 * return void
	 */
	public function contact()
	{
		$this->data['message'] 	= '';
		$this->data['formdata'] = array(
			'cname'=>'',
			'cemail'=>'',
			'cphone'=>'',
			'cmsg'=>'',
			'captcha'=>''
		);
		
		//Form Validation
		$this->form_validation->set_rules('cname', 'First Name', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('cemail', 'Email ID', 'trim|required|valid_email');
		$this->form_validation->set_rules('cphone', 'Phone No', 'trim|required');
		$this->form_validation->set_rules('cmsg', 'Message', 'trim|required');
		$this->form_validation->set_rules('captcha', 'Security Check', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) {
			if ($this->session->userdata('correctsum') == $this->input->post('captcha')) {
				$this->data['formdata'] = array(
					'cname'=>$this->input->post('cname'),
					'cemail'=>$this->input->post('cemail'),
					'cphone'=>$this->input->post('cphone'),
					'cmsg'=>$this->input->post('cmsg')
				);
				$mailstatus = $this->contact_sendmail($this->data['formdata']);
				
				if ($mailstatus == 1) {
					$Tmailstatus = $this->contact_thankumail($this->input->post('cname'), $this->input->post('cemail'));
				} else {
					$this->data['status'] 	= 'fail';
					$this->data['message'] 	= '<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Failed!</strong> Sorry, we are unable to process your request. Please try again.
					<br> Mail sending failed!
				  	</div>';
				}
				$this->data['status'] 	= 'success';
				$this->data['message'] 	= '<div class="alert alert-success fade in">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<strong>Success!</strong> Thanks for contacting Cherry Hire. Your request is under process, will get in touch with you soon.
				</div>';
			} else {
				$this->data['status'] 	= 'fail';
				$this->data['message'] 	= '<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Failed!</strong> Sorry, we are unable to process your request. Please try again.
					<br> Security Check failed!
				  </div>';
			}
						
		  	$sess_array = array(
				'correctsum' => 0
			);
			$this->session->set_userdata($sess_array);
		} else {
			if ($this->input->post('cname') || $this->input->post('cemail')) {
				$this->data['formdata'] = array(
					'cname'=>$this->input->post('cname'),
					'cemail'=>$this->input->post('cemail'),
					'cphone'=>$this->input->post('cphone'),
					'cmsg'=>$this->input->post('cmsg')
				);
				$this->data['status'] 	= 'fail';
				$this->data['message'] 	= '<div class="alert alert-danger fade in">
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Failed!</strong> Sorry, we are unable to process your request. Please try again.
					'.validation_errors().'
				  </div>';				
				$sess_array = array(
					'correctsum' => 0
				);
				$this->session->set_userdata($sess_array);  
			}
		}
		
		$this->data['title']	= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['emid'] 	= 99;
		$this->data['number1'] 	= rand(1,9);
		$this->data['number2'] 	= rand(1,9);
		$this->data['sum'] 		= $this->data['number1'] + $this->data['number2'];
		
		$sess_array = array(
			'correctsum' => $this->data['sum']
		);
		$this->session->set_userdata($sess_array);
		
		$this->load->view('common/header',$this->data);
		$this->load->view('common/home-menu',$this->data);
		$this->load->view('contact',$this->data);
		$this->load->view('common/footer',$this->data);
	}
	
	/* Candidate Reg function
	 *
	 * return void
	 */
	public function postcv()
	{
		


		if($this->session->userdata('cand_chid')) { redirect(base_url()."candidate"); }
		$this->data['message'] 	= '';
		$this->data['status'] 	= '';
		//From Home Page
		if ($this->input->post('cname') && $this->input->post('cemailid')) {			
			$name = explode(' ', ltrim(rtrim($this->input->post('cname'))));
			if (count($name) > 1) {
				$string 	= ltrim(rtrim($this->input->post('cname')));
				$last_space = strrpos($string, ' ');
				$lname 		= substr($string, $last_space);
				$fname 		= substr($string, 0, $last_space);
			} else {
				$fname = $name[0];
				$lname = '';
			}
			$emailid = $this->input->post('cemailid');
			//From Validation
			$this->form_validation->set_rules('cname', 'Name', 'trim|required|callback_name_check');
			$this->form_validation->set_rules('cemailid', 'Email ID', 'trim|required|valid_email|is_unique[ch_candidate.can_email]');
			$this->form_validation->set_message('is_unique', 'An account with this %s already exists. Kindly use a different one or sign in using your username and password');
			
			if ($this->form_validation->run() == FALSE) {
				$this->data['status'] 	= 'fail';
				$this->data['message'] 	= '<div class="alert alert-danger">
                    <strong>Failed!</strong> Sorry, we are unable to process your request. Please try again.
					'.validation_errors().'
                  </div>';
			}
		} else {
			$fname 		= '';
			$lname 		= '';
			$emailid 	= '';
		}
		
		$this->data['formdata'] = array(
			'firstname'=>ucwords($fname),
			'lastname'=>ucwords($lname),
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
			'industry'=>'',
			'currdesig'=>'',
			'jobalert'=>'1'
		);
		
		//Form validation
		$this->form_validation->set_rules('firstname', 'First Name', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('lastname', 'Last Name', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('cntrycode', 'Country Code', 'trim|required');
		$this->form_validation->set_rules('phone', 'Phone No', 'trim|required');
		$this->form_validation->set_rules('emailid', 'Email ID', 'trim|required|valid_email|is_unique[ch_candidate.can_email]');
		$this->form_validation->set_rules('usrpwd', 'Password', 'trim|required|min_length[8]|callback_name_check');
		$this->form_validation->set_rules('repwd', 'Confirm Password', 'trim|required|matches[usrpwd]');
		$this->form_validation->set_rules('dob', 'Date of Birth', 'trim|required');
		$this->form_validation->set_rules('gender', 'Gender', 'trim|required');
		$this->form_validation->set_rules('edu', 'Educational Qualification', 'trim|required');
		$this->form_validation->set_rules('nation', 'Nationality', 'trim|required');
		$this->form_validation->set_rules('totexp', 'Total Experiance', 'trim|required');
		$this->form_validation->set_rules('currloc', 'Current Location', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('funarea', 'Functional Area', 'trim|required');
		$this->form_validation->set_rules('industry', 'Industry', 'trim|required');
		$this->form_validation->set_rules('currdesig', 'Current Designation', 'trim|required|callback_name_check');
		if (empty($_FILES['fileToUpload'])) {
			$this->form_validation->set_rules('fileToUpload', 'Resume', 'required');
		}
		$this->form_validation->set_message('is_unique', 'An account with this %s already exists. Kindly use a different one or sign in using your username and password');

		if ($this->form_validation->run() == TRUE) {
			$cid 		= $this->sitemodel->postcv_record();			
			$csummry 	= $this->sitemodel->postsummary($cid);
			$smid 		= $this->sitemodel->postsocial_media($cid);
			$csubs 		= $this->sitemodel->post_csubscribe($cid);
			$upfilename = 'resume'.'_'.$cid; //Resume path
			
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
					$data 	=  $this->upload->data();									
					$this->upload_file_name = $data['file_name'];	
					$cvpath = $data['full_path'];
					
					$cvid 		= $this->sitemodel->postcv_details($cid,$cvpath); // Post cv
                                        
                   $person_id=$this->sitemodel->upload_resume_api($cvpath);
                                        
					//$mailstatus = $this->cvsendmail($cid,$cvpath); //Sent mail to employer
                     $Tmailstatus = $this->cvthankumail($cid);                   
                    $mailstatus = $this->apicvsendmail($cid,$cvpath);
                                        
					if ($mailstatus == '1') {
						$Tmailstatus = $this->cvthankumail($cid); //Thankyou mail to candidate
					} else { 
						//Mail send fail
						$this->data['status'] 	= 'fail';
						$this->data['message'] 	= '<div class="alert alert-danger">
						<strong>Failed!</strong> Congrats! <br> Thank You for registering at CherryHire.com, the premium online HR solution provider but failed to complete the process. 
						<br> Mail sending failed! 
						<br> Send your updated resume to cv@cherryhire.com
						<br> Kindly log into your account and update your profile to get the best matching jobs instantly
						<br> Wishing you the very best for a bright career!
						</div>';
					}					
					
					//Registration success
					$this->data['status'] 	= 'success';
					$this->data['message'] 	= '<div class="alert alert-success">
                    <strong>Success!</strong> Congrats! <br> Thank You for registering at CherryHire.com, the premium online HR solution provider. <br> Kindly log into your account and update your profile to get the best matching jobs instantly.<br> Wishing you the very best for a bright career! </div>';					
				} else {	
					//CV upoad fail
					$error = $this->upload->display_errors();
					$this->data['status'] 	= 'cvfail';
					$this->data['message'] 	= '<div class="alert alert-info">
                    	<strong>Failed!</strong> Congrats! <br> Thank You for registering at CherryHire.com, the premium online HR solution provider but failed to upload your CV. <br> Kindly log into your account and update your profile to get the best matching jobs instantly<br> Upload your CV and get your profile quickly noticed!!!<br> Wishing you the very best for a bright career!
						'.$error.'
                  		</div>';
				}
				
			 } else {
				//CV upload fail
				$this->data['status'] 	= 'cvfail';
				$this->data['message'] 	= '<div class="alert alert-info">
					<strong>Failed!</strong> Congrats! <br> Thank You for registering at CherryHire.com, the premium online HR solution provider but failed to upload your CV.  <br> Kindly log into your account and update your profile to get the best matching jobs instantly<br> Upload your CV and get your profile quickly noticed!!!<br> Wishing you the very best for a bright career!
					</div>'; 
			 }		
		} else {
			if ($this->input->post('firstname') || $this->input->post('lastname')) {
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
					'industry'=>$this->input->post('industry'),
					'currdesig'=>$this->input->post('currdesig'),
					'jobalert'=>$this->input->post('jobalert'),
				);
			
				$this->data['status'] = 'fail';
				$this->data['message'] = '<div class="alert alert-danger">
                    <strong>Failed!</strong> Sorry, we are unable to process your request. Please try again.
					'.validation_errors().'
                  </div>';
			}
		}
		
		$this->data['title']	= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['cmid'] 	= 1;
		$this->data['number1'] 	= rand(1,9);
		$this->data['number2'] 	= rand(1,9);
		$this->data['sum'] 		= $this->data['number1'] + $this->data['number2'];
		
		$sess_array = array(
			'correctsum' => $this->data['sum']
		);
		$this->session->set_userdata($sess_array);
		
		$this->data["nation_list"] 	= $this->sitemodel->get_nationality();
		$this->data["country_list"] = $this->sitemodel->get_country();
		$this->data["edu_list"] 	= $this->sitemodel->get_edu();
		$this->data["funarea_list"] = $this->sitemodel->get_farea();
		$this->data["ind_list"] 	= $this->sitemodel->get_industry();
		
		// $this->load->view('common/header',$this->data);
		// $this->load->view('common/candidate-menu',$this->data);
		// $this->load->view('postcv',$this->data);
		// $this->load->view('common/footer',$this->data);
		 
		$this->load->view('new/candidate-register',$this->data);
	}
	
	/* Handle upload Function
	 *
	 * return boolean
	 */
	function handle_upload()
	{
		if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
		  if ($this->upload->do_upload('image')) {
			// set a $_POST value for 'image' that we can use later
			$upload_data    = $this->upload->data();
			$_POST['image'] = $upload_data['file_name'];
			return true;
		  } else {
			// possibly do some clean up ... then throw an error
			$this->form_validation->set_message('handle_upload', $this->upload->display_errors());
			return false;
		  }
		} else {
		  // throw an error because nothing was uploaded
		  $this->form_validation->set_message('handle_upload', "You must upload an image!");
		  return false;
		}
	}
	
	/* Name Check Function
	 * @param string $str
	 * return boolean
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
	
	/* Password Check Function
	 * @param string $pwd
	 * return boolean
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
		}
		else
		{
			return TRUE;
		}

	}

	/* Password Valid Check Function
	 *
	 * return int
	 */
	public function pwd_valid_check()
	{
		$pwd  = $this->input->post('pwd');
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
			echo 0; //False
		} else {
			echo 1; //True
		}
	}
	
	/* Email Vaild Ajax Function
	 *
	 * return int
	 */
	public function email_valid_ajax()
	{
		$email = $this->input->post('email');		
		$result = $this->sitemodel->valid_candidate_email($email);	 
		if ($result == 0) {
			echo 0;//email is unique. not signed up before
		} else {
			echo 1;
		}
	}
	
	/* CV Send mail Function
	 * @param int $cid
	 * @param string $cvpath
	 * return int
	 */
        
	/* CV Send mail Function
	 * @param int $cid
	 * @param string $cvpath
	 * return int
	 */
	function cvsendmail($name,$emailid)
	{
	
	$from = 'do-not-reply@cherryhire.com';
	$to   = $emailid;
	// $subject 	= 'Payment Success';
	$message    = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
							<html><head><title>Candidate_Register</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style>
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
								        <td colspan="9" style="width:642px; height:30px;">
								        </td>
								    </tr>
								    <tr>
								        <td rowspan="13" style="width:28px; height:903px; border-top:1px solid #CCC; border-left:1px solid #CCC; border-bottom:1px solid #CCC;">
								        </td>
								        <td colspan="7" style="width:585px; height:103px; border-top:1px solid #CCC;">
								            <a href="http://www.cherryhire.com" target="_blank"><img src="http://cherryhire.com/site/images/logo.png" alt=""></a>
								        </td>
								        <td rowspan="13" style="width:29px; height:903px; border-top:1px solid #CCC; border-right:1px solid #CCC; border-bottom:1px solid #CCC;">
								        </td>
								    </tr>
								    <tr>
								        <td colspan="7" style="background:#AD1E24; width:585px; height:111px; vertical-align:middle; color:#FFF; padding:10px 0px 0px 30px; font-size:28px; font-weight:bold;">
								            Welcome aboard
								        </td>
								    </tr>
								    <tr>
								        <td style="width:10px; height:10px; line-height:0px;" valign="top">
								            <img src="'.base_url().'emailtemplate/Candidate_Register_06.png" alt="">
								        </td>
								        <td colspan="5" style="background:#F0EFEC; width:564px; height:10px; line-height:0px;">
								        </td>
								        <td style="width:11px; height:10px; line-height:0px;" valign="top">
								            <img src="'.base_url().'emailtemplate/Candidate_Register_08.png" alt="">
								        </td>
								    </tr>
								    <tr>
								        <td rowspan="9" style="background:#FFF; width:10px; height:643px;">
								        </td>
								        <td style="background:#F0EFEC; width:36px; height:122px;">
								        </td>
								        <td colspan="3" style="background:#F0EFEC; width:488px; height:122px; line-height:30px;padding:0px 0px 0px 10px;">
								            <p>Hi '.$name.',</p>
								            <p>Greetings from <a href="www.cherryhire.com"> www.cherryhire.com</a>
								            <br>
											Thank you for the payment for your Subscription.
											<br>
											
												


											</p>
								        </td>
								        <td style="background:#F0EFEC; width:40px; height:122px;">
								        </td>
								        <td rowspan="9" style="background:#FFF; width:11px; height:643px;">
								        </td>
								    </tr>
								    <tr>
								        <td rowspan="4" style="background:#F0EFEC; width:36px; height:128px;">
								        </td>
								        <td colspan="3" style="background:#FFF; width:488px; height:36px; padding:0px 0px 0px 16px; font-weight:bold; line-height:30px;">
								            <p>Payment Details</p>
								        <td rowspan="4" style="background:#F0EFEC; width:36px; height:128px;">
								        </td>
								    </tr>
								    <tr>
								        <td style="background:#FFF; width:55px; height:40px;">
								            <img src="'.base_url().'emailtemplate/Candidate_Register_17.png" alt="">
								        </td>
								        
								        <td rowspan="2" style="background:#FFF; width:212px; height:82px;">
								        </td>
								    </tr>
								    
								    <tr>
								        <td colspan="3" style="background:#FFF; width:488px; height:10px;">
								        </td>
								    </tr>
								    <tr>
								        <td style="background:#F0EFEC; width:36px; height:151px;">
								        </td>
								        <td colspan="3" style="background:#F0EFEC; width:488px; height:151px; padding:0px 0px 0px 10px; line-height:30px;">
								            <p style="font-weight:bold;">To get noticed, we recommended you do the following:</p>
								            <p>
								                &bull; Update your profile regularly <br >
								                &bull; Search and Apply to Jobs <br >
								                &bull; Set Profile Privacy Settings
								            </p>

								        </td>
								        <td style="background:#F0EFEC; width:40px; height:151px;">
								        </td>
								    </tr>
								    <tr>
								        <td style="background:#F0EFEC; width:36px; height:82px;">
								        </td>
								        <td colspan="3" style="background:#F0EFEC; width:488px; height:82px; padding:0px 0px 0px 10px; line-height:30px;">
								            For any queries send us an email at jobassist@cherryhire.com <br >
								            Good Luck in your journey to find a great job!
								        </td>
								        <td style="background:#F0EFEC; width:40px; height:82px;">
								        </td>
								    </tr>
								    <tr>
								        <td style="background:#F0EFEC; width:36px; height:104px;">
								        </td>
								        <td colspan="3" style="background:#F0EFEC; width:488px; height:104px; padding:0px 0px 0px 10px; line-height:21px; font-size:12px;">
								            Best regards.<br>
											Cherryhire Team. 

								        </td>
								        <td style="background:#F0EFEC; width:40px; height:104px;">
								        </td>
								    </tr>
								    <tr>
								        <td style="background:#F0EFEC; width:36px; height:56px;">
								        </td>
								        <td colspan="3" style="background:#F0EFEC; width:488px; height:56px; padding:0px 180px 0px 180px;">
								            <a href="https://www.facebook.com/cherryhire" target="_blank"><img src="'.base_url().'emailtemplate/sicon1.png" alt=""></a>
											<a href="https://twitter.com/cherry_hire" target="_blank"><img src="'.base_url().'emailtemplate/sicon2.png" alt=""></a>
											<a href="https://www.linkedin.com/company/cherry-hire" target="_blank"><img src="'.base_url().'emailtemplate/sicon3.png" alt=""></a>
											<a href="https://www.instagram.com/cherryhire/" target="_blank"><img src="'.base_url().'emailtemplate/sicon4.png" alt=""></a>
								        </td>
								        <td style="background:#F0EFEC; width:40px; height:56px;">
								        </td>
								    </tr>
								    <tr>
								        <td colspan="7"  style="width:585px; height:36px; border-bottom:1px solid #CCC;">
								        </td>
								    </tr>
								</table></body></html>';




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
         $this->email->subject('Thank you for registering on cherryhire.com'); 
         $this->email->message($message);

		if ($this->email->send()) {

			// echo "Mail Sent!";exit;

			return 1;

		} else {

			// echo $this->email->print_debugger();

			return 0;

		}
	}
	/* Thankyou mail Function
	 * @param int $cid
	 * return int
	 */
	function cvthankumail($cid=null)
	{
		$result 	= $this->sitemodel->get_candidate($cid);
		$subject 	= 'Welcome to Cherryhire.com';
		$from 		= 'do-not-reply@cherryhire.com';
		
		$FName 		= $result['can_fname'];
		$LName 		= $result['can_lname'];
		$RegEmail 	= $result['can_email'];
		
		$to 		= $RegEmail;	
		//Mail body
		$thanksmessage = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
							<html><head><title>Candidate_Register</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
								<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
								<table id="Table_01" width="642" height="933" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#FFF; font-size:14px; font-family:Arial, Helvetica, sans-serif;">
								    <tr>
								        <td colspan="9" style="width:642px; height:30px;">
								        </td>
								    </tr>
								    <tr>
								        <td rowspan="13" style="width:28px; height:903px; border-top:1px solid #CCC; border-left:1px solid #CCC; border-bottom:1px solid #CCC;">
								        </td>
								        <td colspan="7" style="width:585px; height:103px; border-top:1px solid #CCC;">
								            <a href="http://www.cherryhire.com" target="_blank"><img src="http://cherryhire.com/site/images/logo.png" alt=""></a>
								        </td>
								        <td rowspan="13" style="width:29px; height:903px; border-top:1px solid #CCC; border-right:1px solid #CCC; border-bottom:1px solid #CCC;">
								        </td>
								    </tr>
								    <tr>
								        <td colspan="7" style="background:#AD1E24; width:585px; height:111px; vertical-align:middle; color:#FFF; padding:10px 0px 0px 30px; font-size:28px; font-weight:bold;">
								            Welcome aboard
								        </td>
								    </tr>
								    <tr>
								        <td style="width:10px; height:10px; line-height:0px;" valign="top">
								            <img src="'.base_url().'emailtemplate/Candidate_Register_06.png" alt="">
								        </td>
								        <td colspan="5" style="background:#F0EFEC; width:564px; height:10px; line-height:0px;">
								        </td>
								        <td style="width:11px; height:10px; line-height:0px;" valign="top">
								            <img src="'.base_url().'emailtemplate/Candidate_Register_08.png" alt="">
								        </td>
								    </tr>
								    <tr>
								        <td rowspan="9" style="background:#FFF; width:10px; height:643px;">
								        </td>
								        <td style="background:#F0EFEC; width:36px; height:122px;">
								        </td>
								        <td colspan="3" style="background:#F0EFEC; width:488px; height:122px; line-height:30px;">
								            <p>Dear '.$FName.'</p>
								            <p>Thank you for registering on<a href="www.cherryhire.com"> www.cherryhire.com</a><br>
											Cherry Hire is first platform in the region to provide verified profiles to employers through a 2-step process that consists of administering a "General Aptitude Test" and a "Job Specific Psychometric Test". The test results provide a fair analysis to employers and it increases the probability of your profile being shortlisted.
											</p>
											
											<h4>This General Aptitude Test is priced at US $10 only.</h4>
											<p>
												Based on the results of this General Aptitude Test, as a 2nd step, you may be required to take a Job-specific Psychometric test to enhance your profile further with the employers.<br>The Job Specific Psychometric Test is not a mandatory test.
											</p>

											<h4>The price of Job Specific Psychometric Test will be US $20 only. </h4>
											<p>
												Click here to take the "General Aptitude Test".
												The result of the test will be sent to you within 24 hours of completion of the test.

											</p>
								        </td>
								        <td style="background:#F0EFEC; width:40px; height:122px;">
								        </td>
								        <td rowspan="9" style="background:#FFF; width:11px; height:643px;">
								        </td>
								    </tr>
								    
								    <tr>
								        <td rowspan="4" style="background:#F0EFEC; width:36px; height:128px;">
								        </td>
								        <td colspan="3" style="background:#FFF; width:488px; height:36px; padding:0px 0px 0px 16px; font-weight:bold; line-height:30px;">
								            <p>Your account details are</p>
								        <td rowspan="4" style="background:#F0EFEC; width:36px; height:128px;">
								        </td>
								    </tr>
								    <tr>
								        <td style="background:#FFF; width:55px; height:40px;">
								            <img src="'.base_url().'emailtemplate/Candidate_Register_17.png" alt="">
								        </td>
								        <td style="background:#FFF; width:221px; height:40px; ">
								            <table>
								                <tr>
								                    <td style="border:1px solid #CCC; padding:5px 5px 5px 5px; min-width:55px; font-size:12px;">'.$RegEmail.'</td>
								                </tr>
								            </table>
								        </td>
								        <td rowspan="2" style="background:#FFF; width:212px; height:82px;">
								        </td>
								    </tr>
								    <tr>
								        <td style="background:#FFF; width:55px; height:42px;">
								            <img src="'.base_url().'emailtemplate/Candidate_Register_20.png" alt="">
								        </td>
								        <td style="background:#FFF; width:221px; height:42px;">
								            <a href="http://candidate.cherryhire.com" target="_blank"><img src="'.base_url().'emailtemplate/Candidate_Register_21.png" alt="Login to account"></a>
								        </td>
								    </tr>
								    <tr>
								        <td colspan="3" style="background:#FFF; width:488px; height:10px;">
								        </td>
								    </tr>
								    
								    <tr>
								        <td style="background:#F0EFEC; width:36px; height:82px;">
								        </td>
								        <td colspan="3" style="background:#F0EFEC; width:488px; height:82px; padding:0px 0px 0px 10px; line-height:30px;">
								            If you require any further information, please do not hesitate to contact us.<br>
								           <b> Cherry Hire Team</b>
								        </td>
								        <td style="background:#F0EFEC; width:40px; height:82px;">
								        </td>
								    </tr>
								    <tr>
								        <td style="background:#F0EFEC; width:36px; height:104px;">
								        </td>
								        <td colspan="3" style="background:#F0EFEC; width:488px; height:104px; padding:0px 0px 0px 10px; line-height:21px; font-size:12px;">
								             
								            Jithin Ajith Kumar | Digital Head <br >
								             <b>phone:</b> +973 33313551<br>
											<b>Mail:</b> jithinajith@cherryhire.com
								        </td>
								        <td style="background:#F0EFEC; width:40px; height:104px;">
								        </td>
								    </tr>
								    <tr>
								        <td style="background:#F0EFEC; width:36px; height:56px;">
								        </td>
								        <td colspan="3" style="background:#F0EFEC; width:488px; height:56px; padding:0px 180px 0px 180px;">
								            <a href="https://www.facebook.com/cherryhire" target="_blank"><img src="'.base_url().'emailtemplate/sicon1.png" alt=""></a>
											<a href="https://twitter.com/cherry_hire" target="_blank"><img src="'.base_url().'emailtemplate/sicon2.png" alt=""></a>
											<a href="https://www.linkedin.com/company/cherry-hire" target="_blank"><img src="'.base_url().'emailtemplate/sicon3.png" alt=""></a>
											<a href="https://www.instagram.com/cherryhire/" target="_blank"><img src="'.base_url().'emailtemplate/sicon4.png" alt=""></a>
								        </td>
								        <td style="background:#F0EFEC; width:40px; height:56px;">
								        </td>
								    </tr>
								    <tr>
								        <td colspan="7"  style="width:585px; height:36px; border-bottom:1px solid #CCC;">
								        </td>
								    </tr>
								</table></body></html>';
		
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

		
		
		// $config = Array(
  //                  'protocol' => 'mail',
  //                  'smtp_host' => 'mail.cherryhire.com',
  //                  'smtp_port' => 587,
  //                  'smtp_user' => 'no-reply@cherryhire.com',
  //                  'smtp_pass' => 'Chire@DNply',
  //                  'mailtype'  => 'html', 
  //                  'wordwrap'  =>true,
  //                  'charset'   => 'utf-8'
  //              );
  //        $this->load->library('email'); 
  //        $this->email->initialize($config);
  //        $this->email->set_newline('\r\n'); 
         // $this->email->clear(TRUE);
   
         $this->email->from('no-reply@cherryhire.com', 'Cherryhire'); 
         $this->email->to($to);
   
         // $this->email->from('no-reply@cherryhire.com', 'Cherryhire'); 
         // $this->email->to('testing@5ines.com');
         $this->email->subject($subject); 
         $this->email->message($thanksmessage);  


		
		if ($this->email->send()) {
			return 1;
			// echo "email sent";
		} else {
			return 0;
			// echo $this->email->print_debugger();
		}
	}
	
	/* Contact form mail Function
	 * @param array $formdata
	 * return int
	 */
	function contact_sendmail($formdata=null)
	{
		$subject 	= 'Enquiry from Cherry Hire Website';		
		$to 		= 'info@cherryhire.com';
		$from 		= 'do-not-reply@cherryhire.com';
		
		$cemail = $formdata['cemail'];
		$cname 	= $formdata['cname'];
		$cphone = $formdata['cphone'];
		$cmsg 	= $formdata['cmsg'];
		
		$message = "<html><head><title>Enquiry with Cherry Hire</title></head><body>";
		$message = $message."<p><strong>Enquiry from Cherry Hire Website </strong> </p>";
		$message = $message."<br><p> Hi Team, </p>";
		$message = $message."<p> Please see the Details listed below </p>";
		$message = $message."<br><p> Name :".$cemail.' </p>';
		$message = $message."<p> Email Id :".$cname.' </p>';
		$message = $message."<p> Contact No :".$cphone.' </p>';
		$message = $message."<p> Message :".$cmsg.' </p>';
		$message = $message."<p><br> Regards, ";
		$message = $message." <br> Webmaster - Cherry Hire </p>";
		$message = $message."</body></html></html>";
		
		//Mail configuration
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
		$this->email->subject($subject);
		$this->email->message($message);
		if ($this->email->send()) {
			return 1;
		} else {
			return 0;
		}
	}
	
	/* Contact Thankyou mail Function
	 * @param sting $name
	 * @param sting $emailid
	 * return int
	 */
	function contact_thankumail($name=null, $emailid=null)
	{
		$subject 	= 'Greetings from Cherry Hire';		
		$from 		= 'do-not-reply@cherryhire.com';		
		$FName 		= $name;		
		$to 		= $emailid;
		
		//Mail Body
		$thanksmessage = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
								<html><head><title>Cherry Hire</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"></head>
								<body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
								<table id="Table_01" width="596" height="507" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#ececec; font-size:14px; font-family:Arial, Helvetica, sans-serif;">
									<tr>
										<td rowspan="7" style="width:5px; height:507px;"> </td>
										<td colspan="7" style="width:585px; height:82px; background:#ececec;">
											<a href="http://www.cherryhire.com" target="_blank"><img src="http://cherryhire.com/site/images/logo.png" alt=""></a>
										</td>
										<td rowspan="7" style="width:6px; height:507px;"> </td>
									</tr>
									<tr>
										<td colspan="7" style="background:#AD1E24; width:585px; height:110px; vertical-align:middle; color:#FFF; padding:10px 40px 0px 40px; font-size:40px; font-weight:bold;" valign="middle">
											Greetings from <span style="color:#FC0">Cherryhire.com</span>
										</td>
									</tr>
									<tr>
										<td><img src="'.$this->config->base_url().'emailtemplate/Cherry-Hire_Register_05.jpg" width="10" height="10" alt=""></td>
										<td colspan="5" style="width:564px; height:10px;background:#FFF; "> </td>
										<td><img src="'.$this->config->base_url().'emailtemplate/Cherry-Hire_Register_07.jpg" width="11" height="10" alt=""></td>
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
								
										<p>Thank you for interesting with Cherry Hire. We are currently processing it for you and will contact you shortly.</p>
										
										</td>
										<td rowspan="2" style="width:45px; height:236px;background:#FFF; "> </td>
									</tr>
									<tr>
										<td colspan="3" style="width:492px; height:143px;background:#FFF; padding:0px 0px 0px 10px; line-height:21px; font-size:12px; ">
											Regards, <br >
											Jacob Thomas <br >
											Co-Founder & CEO, Cherryhire.com <br >
											www.cherryhire.com        
										</td>
									</tr>
									<tr>
										<td colspan="2" style="width:37px; height:45px; background:#ececec;"></td>
										<td style="width:193px; height:45px; background:#ececec;"></td>
										<td style="width:119px; height:45px; background:#ececec;">
											<a href="https://www.facebook.com/cherryhire" target="_blank"><img src="'.$this->config->base_url().'emailtemplate/sicon1.png" alt=""></a>
											<a href="https://twitter.com/cherry_hire" target="_blank"><img src="'.$this->config->base_url().'emailtemplate/sicon2.png" alt=""></a>
											<a href="https://www.linkedin.com/company/cherry-hire" target="_blank"><img src="'.$this->config->base_url().'emailtemplate/sicon3.png" alt=""></a>
											<a href="https://www.instagram.com/cherryhire/" target="_blank"><img src="'.$this->config->base_url().'emailtemplate/sicon4.png" alt=""></a>
										</td>
										<td style="width:180px; height:45px; background:#ececec;"></td>
										<td colspan="2" style="width:56px; height:45px; background:#ececec;"></td>
									</tr>
								</table>
								</body></html>';
		//Mail configuration
		$config = Array(
                   'protocol' => 'mail',
                   'smtp_host' => 'mail.cherryhire.com',
                   'smtp_port' => 25,
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
         $this->email->subject($subject); 
         $this->email->message($thanksmessage); 
		if ($this->email->send()) {
			return 1;
		} else {
			return 0;
		}
	}
	
	/* 404 page Function
	 * 
	 * return void
	 */
	public function notfound()
	{
		$this->data['message'] 	= '';
		$this->data['title']	= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
		$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
		$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
		$this->data['mid'] 		= 0;
		$this->load->view('common/header',$this->data);
		$this->load->view('common/home-menu',$this->data);
		$this->load->view('404',$this->data);
		$this->load->view('common/footer',$this->data);
	}
	
        
        
        
        
        
        function apicvsendmail($cid=null, $cvpath=null)
	{
           
            //$session = curl_init(MAILGUN_URL.'/messages');
            //$mgClient = new \Mailgun\Mailgun("key-xxxxxxxxxxxxxxxxxxxxxx");            
            // $mgClient = new Mailgun('d8f3066eee1d31f39228ec8b6c5ef54e-a5d1a068-cf700220');
            //$domain = "mailer.cherryhire.com";

        /*   $domain = "mailer.cherryhire.com";
           $result = sendMessage($domain, array(
                    'from'    => 'postmaster@mailer.cherryhire.com',
                    'to'      => 'cv@cherryhire.com',
                    'bcc'     => 'anupama.bbalakrishnan8@gmail.com',
                    'subject' => 'Hello',
                    'text'    => 'Testing some Mailgun awesomness!'
                ));
            $curl = curl_init(MAILGUN_URL.'/messages');
            curl_setopt($curl, CURLOPT_URL, 'https://api.mailgun.net/v2/mailer.cherryhire.com/messages');
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($curl, CURLOPT_USERPWD, "api:d8f3066eee1d31f39228ec8b6c5ef54e-a5d1a068-cf700220");
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
            curl_setopt($curl, CURLOPT_POST, true); 
            curl_setopt($curl, CURLOPT_POSTFIELDS, $result);

            $result = curl_exec($curl);
            curl_close($curl);
            print_r($result);
            */
            
            
            
            
                # Instantiate the client.
                 
                # Make the call to the client.
//                $result = $mgClient->sendMessage($domain, array(
//                    'from'    => 'postmaster@mailer.cherryhire.com',
//                    'to'      => 'cv@cherryhire.com',
//                    'bcc'     => 'anupama.bbalakrishnan8@gmail.com',
//                    'subject' => 'Hello',
//                    'text'    => 'Testing some Mailgun awesomness!'
//                ));
            
            
            
            
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
  curl_setopt($ch, CURLOPT_USERPWD,  "api:d8f3066eee1d31f39228ec8b6c5ef54e-a5d1a068-cf700220");
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

 

  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_URL, 'https://api.mailgun.net/v2/mailer.cherryhire.com/messages');
  curl_setopt($ch, CURLOPT_POSTFIELDS, array(          
                    'from'    => 'postmaster@mailer.cherryhire.com',
                    'to'      => 'cv@cherryhire.com',
                    'bcc'     => 'anupama.balakrishnan8@gmail.com',
                    'subject' => 'Hello',
                    'text'    => 'Testing some Mailgun awesomness!'
          ));

  $j = json_decode(curl_exec($ch));

  $info = curl_getinfo($ch);

  if($info['http_code'] != 200)
        return false;

  curl_close($ch);

  return $j;
        }
        
        
        
        
        
        
        
        
        
        
        
        
        
        

	/* 404 page Function
	 * 
	 * return void
	 */
	// public function notfound()
	// {
	// 	$this->data['message'] 	= '';
	// 	$this->data['title']	= 'Post Jobs Online Free|Get Resumes|Conduct Video Interviews';
	// 	$this->data['metakey']	= 'HR Solutions, Cherry Hire, IPF';
	// 	$this->data['metadesc']	= 'Online recruitment software to post jobs free to online job portals, social media websites in one click,conduct video interviews and make hiring process fast';
	// 	$this->data['mid'] 		= 0;
	// 	$this->load->view('common/header',$this->data);
	// 	$this->load->view('common/home-menu',$this->data);
	// 	$this->load->view('404',$this->data);
	// 	$this->load->view('common/footer',$this->data);
	// }
	
	/* Cache clear Function
	 * 
	 * return void
	 */
	function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
	
	/* Sync profile to HW Function
	 * @param int $cid
	 * return array
	 */
    public function publish_hire($cid=null)
    {
    	$this->sitemodel->publish_hire_req($cid);
    }
}

/* End of file Site.php */
/* Location: ./application/controllers/Site.php */
