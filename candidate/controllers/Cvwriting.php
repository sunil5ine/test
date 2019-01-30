<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cvwriting extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->clear_cache();
		$this->load->model('cvwritingmodel');
		$this->load->model('candidatemodel');
		$this->load->library('paypal_lib');
		$this->load->model('subscriptionmodel');
		if (!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }		
		if (isset($_COOKIE["PHPSESSID"])) {
			$this->data['sessionid'] = $_COOKIE["PHPSESSID"];
		} else {
			$this->data['sessionid'] = '';
		}
		$this->data['mid'] = 6;
	}
	
	public function index()
	{
		if (!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session
		$this->data['message'] = '';		
		$this->data['sid'] = 1;
		$this->data['title'] = 'Cherry Hire App - Upgrade';
		$this->data['pagehead'] = 'CV WRITING';		
		$this->data["plan"] = '';
		$this->data["cartdata"] = $this->cvwritingmodel->get_temp_questionnaire();
		$this->data["cvwdata"] = $this->cvwritingmodel->check_cvw_status();
		$this->load->view('common/header_inner',$this->data);
		$this->load->view('common/leftmenu',$this->data);
		$this->load->view('common/topmenu',$this->data);
		$this->data['footer_nav']=$this->load->view('common/footerbar',$this->data,true);
		$this->load->view('cv-writing/index',$this->data);
		$this->load->view('common/footer_inner',$this->data);
	}
	
	public function questionnaire($id)
	{




		if(!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session
		$this->data['message'] = '';		
		$this->data['sid'] = 1;
		$this->data['title'] = 'Cherry Hire App - Upgrade';
		$this->data['pagehead'] = 'CV WRITING';		
		$this->data["plan"] = '';		
		$this->data['formdata'] = array(
			'qn1'=>'',
			'qn2'=>'',
			'qn3'=>'',
			'qn4'=>'',
			'qn5'=>'',
			'qn6'=>'',
			'qn7'=>'',
			'qn8'=>'',
			'qn9'=>'',
			'qn10'=>'',
			'qn11'=>'',
		);	

		$this->data["qdata"] = $this->cvwritingmodel->get_questionnaire();		
		if (!empty($this->data["qdata"])) {			
			$this->data['formdata'] = array(
				'qn1'=>$this->data["qdata"]['qn1'],
				'qn2'=>$this->data["qdata"]['qn2'],
				'qn3'=>$this->data["qdata"]['qn3'],
				'qn4'=>$this->data["qdata"]['qn4'],
				'qn5'=>$this->data["qdata"]['qn5'],
				'qn6'=>$this->data["qdata"]['qn6'],
				'qn7'=>$this->data["qdata"]['qn7'],
				'qn8'=>$this->data["qdata"]['qn8'],
				'qn9'=>$this->data["qdata"]['qn9'],
				'qn10'=>$this->data["qdata"]['qn10'],
				'qn11'=>$this->data["qdata"]['qn11'],
			);	
		}
		$packess = $this->cvwritingmodel->getpackgesSingle($id);

		$this->form_validation->set_rules('qn1', 'Fillup answer for Question 1', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('qn2', 'Fillup answer for Question 2', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('qn3', 'Fillup answer for Question 3', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('qn4', 'Fillup answer for Question 4', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('qn5', 'Fillup answer for Question 5', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('qn6', 'Fillup answer for Question 6', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('qn7', 'Fillup answer for Question 7', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('qn8', 'Fillup answer for Question 8', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('qn9', 'Fillup answer for Question 9', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('qn10', 'Fillup answer for Question 10', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('qn11', 'Fillup answer for Question 11', 'trim|required|callback_name_check');
		if ($this->form_validation->run() == TRUE) {
			if (!empty($this->data["qdata"])) {
				$this->cvwritingmodel->update_questionnaire($packess);
			} else {
				$this->cvwritingmodel->ins_questionnaire($packess);
			}

			$this->data["qdata"] = $this->cvwritingmodel->get_questionnaire();		
			if (!empty($this->data["qdata"])) {			
				$this->data['formdata'] = array(
					'qn1'=>$this->data["qdata"]['qn1'],
					'qn2'=>$this->data["qdata"]['qn2'],
					'qn3'=>$this->data["qdata"]['qn3'],
					'qn4'=>$this->data["qdata"]['qn4'],
					'qn5'=>$this->data["qdata"]['qn5'],
					'qn6'=>$this->data["qdata"]['qn6'],
					'qn7'=>$this->data["qdata"]['qn7'],
					'qn8'=>$this->data["qdata"]['qn8'],
					'qn9'=>$this->data["qdata"]['qn9'],
					'qn10'=>$this->data["qdata"]['qn10'],
					'qn11'=>$this->data["qdata"]['qn11'],
				);	
			}
			
			$currentcvpath = '';
			$resultrecord 	= $this->cvwritingmodel->get_candidate_details($this->session->userdata('cand_chid'));
			$patchtoCV = realpath(APPPATH . '../resume');
			$currentResumewebpath = $resultrecord['cv_path'];
			//$cvfilenamesplit = explode("http://cherryhire.com/resume/",$result['cv_path']);
			if($currentResumewebpath !='' ) {
				$link_array = explode('/',$currentResumewebpath);
				$cvfilenamesplit = end($link_array);
				$currentcvpath = $patchtoCV.'/'.$cvfilenamesplit;
			}
			
			$cid 		= $this->session->userdata('cand_chid');
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
					redirect($this->config->base_url().'cvwriting/reviewcart/?Process=Update&upd=1&Stat=Success');
				} else {	
					$error = $this->upload->display_errors();
					$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
					 <button data-dismiss="alert" class="close" type="button">x</button> Failed to upload your CV! '.$error.' </div>';
					$this->session->set_flashdata('errmsg', $this->data['message']);
				}
			 } else {
				 $this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error">
				 <button data-dismiss="alert" class="close" type="button">x</button>  Failed to upload your CV! - Invalid File </div>';
				$this->session->set_flashdata('errmsg', $this->data['message']);
			 }
			
		} else {
			if ($this->input->post('qn1') || $this->input->post('qn2') || $this->input->post('qn3') || $this->input->post('qn4') || $this->input->post('qn5') || $this->input->post('qn6') || $this->input->post('qn7') || $this->input->post('qn8') || $this->input->post('qn9') || $this->input->post('qn10') || $this->input->post('qn11')) {
				$this->data['formdata'] = array(
					'qn1'=>$this->input->post('qn1'),
					'qn2'=>$this->input->post('qn2'),
					'qn3'=>$this->input->post('qn3'),
					'qn4'=>$this->input->post('qn4'),
					'qn5'=>$this->input->post('qn5'),
					'qn6'=>$this->input->post('qn6'),
					'qn7'=>$this->input->post('qn7'),
					'qn8'=>$this->input->post('qn8'),
					'qn9'=>$this->input->post('qn9'),
					'qn10'=>$this->input->post('qn10'),
					'qn11'=>$this->input->post('qn11'),
					
				);
				$this->data['message'] = '<div style="margin-top: 16px;" class="alert alert-error"><button data-dismiss="alert" class="close" type="button">x</button>  Failed! '.validation_errors().' </div>';
				$this->session->set_flashdata('errmsg', $this->data['message']);
			}
		}
		
		$this->load->view('new/professionalcv',$this->data);

	
	}
	public function reviewcart($errcode=null)
	{
		if (!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session
		$this->data['message'] = '';
		$this->data['sid'] = 3;
		$this->data['title'] = 'Cherry Hire App - Cart Review';
		$this->data['pagehead'] = 'Review Cart';		
		$this->data["cartdata"] = $this->cvwritingmodel->get_temp_questionnaire();	
		$this->load->view('new/cv-cart',$this->data);
	}

	public function billingcart($errcode=null)
	{
		if (!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session
		$this->data['message'] = '';		
		$this->data["formdata"] = array(
				'baddress'=>'',
				'bstate'=>'',
				'bcity'=>'',
				'bpcode'=>'',
				'bcountry'=>''
		);

		if ($this->input->post('cvcover') || $this->input->post('cvexpress')) {
			$this->cvwritingmodel->upd_questionnaire_additional();
		}
			
		if ($this->input->post('totamt') && $this->input->post('canid')) {
			$bill_address = $this->cvwritingmodel->get_baddress($this->session->userdata('cand_chid'));
			if (!empty($bill_address)) {
				$this->data["formdata"] = array(
					'baddress'=>$bill_address['cba_address'],
					'bstate'=>$bill_address['cba_state'],
					'bcity'=>$bill_address['cba_city'],
					'bpcode'=>$bill_address['cba_postal_code'],
					'bcountry'=>$bill_address['cba_country'],
				);
			}

			$this->data['sid'] = 3;
			$this->data['title'] = 'Cherry Hire App - Billing Details';
			$this->data['pagehead'] = 'Billing Details';			
			$this->data["cartdata"] = $this->cvwritingmodel->get_temp_questionnaire();			
			$this->data["country_list"] = $this->cvwritingmodel->get_country();	
			$this->load->view('new/cv-billing',$this->data);		
		
		} else {
			redirect($this->config->base_url().'cvwriting/reviewcart/?process=view&pro=2&status=Failed');
		}
	}

	public function processcart()
	{
		if (!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session
		$this->data['message'] = '';
		$this->data["formdata"] = array(
				'baddress'=>'',
				'bstate'=>'',
				'bcity'=>'',
				'bpcode'=>'',
				'bcountry'=>''
		);
		
		$this->form_validation->set_rules('baddress', 'Address', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('bcity', 'City/Town', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('bstate', 'State', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('bpcode', 'Postal Code', 'trim|required|callback_name_check');
		$this->form_validation->set_rules('bcountry', 'Country', 'trim|required');
		
		if ($this->form_validation->run() == TRUE) { 
			$badd_id = $this->cvwritingmodel->ins_baddress();
			$bill_address = $this->cvwritingmodel->get_baddress($this->session->userdata('cand_chid'));
			if (empty($bill_address)){ redirect($this->config->base_url().'cvwriting/reviewcart/?process=view&pro=2&status=Failed'); }
			
			$last_ordid = $this->cvwritingmodel->get_orderid();
			if (empty($last_ordid)){ $nxt_ordid = 1; } else {  $nxt_ordid = $last_ordid['trans_id']+1; }
			$reference_no = $this->formated_ordid($nxt_ordid);			
			$this->data["cartdata"] = $this->cvwritingmodel->get_temp_questionnaire();			
			$products_per_title = 'Professional CV services';
			$unit_price = '';
			$quantity = '';
			$amount = 0;
			foreach($this->data["cartdata"] as $cartrow) {
				$products_per_title = 'Professional CV services';
				$unit_price = $unit_price.(round(($cartrow->cvw_amt * 0.38), 2)); // USD to BHD Conversion
				$quantity = '1';
				$amount = $amount + ($cartrow->cvw_amt  *0.38);  // USD to BHD Conversion
				if ($result->cvw_cover == 1) {
					$products_per_title = $products_per_title.' || Cover Letter';
					$unit_price = $unit_price.' || '.(round((10 * 0.38), 2));
					$quantity = $quantity.' || 1';
					$amount = $amount + (10*0.38);
				}
				if ($result->cvw_express == 1) {
					$products_per_title = $products_per_title.' || Express Delivery';
					$unit_price = $unit_price.' || '.(round((10 * 0.38), 2));
					$quantity = $quantity.' || 1';
					$amount = $amount + (10*0.38);
				}
			}
			$amount = round($amount, 2);			
			//Sample Price for Testing
			//$amount = 00.11;
			//$unit_price = 00.11;			
			
			$intrans_id = $this->cvwritingmodel->ins_trans($amount);			
			$ipaddress = gethostbyname($_SERVER['REMOTE_ADDR']);
			//$url='https://www.paytabs.com/apiv2/validate_secret_key';
			$url='https://www.paytabs.com/apiv2/create_pay_page';
			
			/****** Live Account*****/
			$this->transaction['merchant_email']='abraham@ipfhr.com';
			$this->transaction['secret_key']= 'YeKEbiCikF9pSQ5B5c3i7CgSaABTvS1u6M8i4LBoqKOiAUUF7XXeze7KPIDkAFOHrXZwIAV8lJqVEkALiy0SM7CBQgWrWL8nI8Tr';
			
			/****** Test Account*****/
			//$this->transaction['merchant_email'] = 'sreejith.g@ipfhr.com';
			//$this->transaction['secret_key'] = 'icc3LbWW2WcyZDvgAFUAxtyDr0rjOga7tnaey6bB3o932FjCledSHLv8MXrBeCIIZSWyZ892wj6yZpbkDodl9JuWGWxVyfDx8A67';
			$trid_en = $this->encryption->encrypt($intrans_id);
			$trid_b64_en = base64_encode($trid_en);

			$this->transaction['site_url']    			=  "http://www.cherryhire.com";
			$this->transaction['return_url']  			=  "http://www.cherryhire.com/candidate/cvwriting/paymentprocess/?trid=".$intrans_id; 
			$this->transaction['title']    				=  'CV Writing';
			$this->transaction['cc_first_name']     	=  $bill_address['can_fname'];
			$this->transaction['cc_last_name']    		=  $bill_address['can_lname'];
			$this->transaction['cc_phone_number']   	=  $bill_address['can_ccode'];
			$this->transaction['phone_number']   		=  $bill_address['can_phone'];
			$this->transaction['email']    				=  $bill_address['can_email'];
			$this->transaction['products_per_title']   	=  $products_per_title; //"Starter || Pro"
			$this->transaction['unit_price']    		=  $unit_price; //"18.00 || 185.00"
			$this->transaction['quantity']    			=  $quantity; //"1 || 1"
			$this->transaction['other_charges']    		=  "00.00";
			$this->transaction['amount']    			=  number_format($amount,2);
			$this->transaction['discount']    			=  "00.00";
			$this->transaction['reference_no']    		=  $reference_no;
			$this->transaction['currency']    			=  "BHD";/*"USD"*/
			$this->transaction['ip_customer']    		=  $ipaddress;
			$this->transaction['ip_merchant']    		=  "198.57.189.12"; //52.70.211.46
			$this->transaction['billing_address']    	=  $bill_address['cba_address'];
			$this->transaction['state']    				=  $bill_address['cba_state'];
			$this->transaction['city']    				=  $bill_address['cba_city'];
			$this->transaction['postal_code']    		=  $bill_address['cba_postal_code'];
			$this->transaction['country']    			=  $bill_address['co_iso_code'];
			$this->transaction['shipping_first_name']	=  $bill_address['can_fname'];
			$this->transaction['shipping_last_name'] 	=  $bill_address['can_lname'];
			$this->transaction['address_shipping']   	=  $bill_address['cba_address'];
			$this->transaction['state_shipping']    	=  $bill_address['cba_state'];
			$this->transaction['city_shipping']  		=  $bill_address['cba_city'];
			$this->transaction['postal_code_shipping']	=  $bill_address['cba_postal_code'];
			$this->transaction['country_shipping']   	=  $bill_address['co_iso_code'];
			$this->transaction['msg_lang']    			=  "English";
			$this->transaction['cms_with_version']    	=  "Codeigniter 3.1.4";
			
			//print_r($this->transaction); exit;
			//echo '<pre>',print_r($this->transaction,1),'</pre>'; exit;
			
			// Format data for post
			$data = http_build_query($this->transaction);
			
			//echo $data; exit;
			// Set a one-minute timeout for this script
			set_time_limit(60);	
			// Initialise output variable
			$output = array();	
			// Open the cURL session
			$curlSession = curl_init();	
			// Set the URL
			curl_setopt ($curlSession, CURLOPT_URL, $url);
			// No headers, please
			curl_setopt ($curlSession, CURLOPT_HEADER, 0);
			// It's a POST request
			curl_setopt ($curlSession, CURLOPT_POST, 1);
			// Set the fields for the POST
			curl_setopt ($curlSession, CURLOPT_POSTFIELDS, $data);
			// Return it direct, don't print it out
			curl_setopt($curlSession, CURLOPT_RETURNTRANSFER,1); 
			// This connection will timeout in 30 seconds
			curl_setopt($curlSession, CURLOPT_TIMEOUT,30); 
			//The next two lines must be present for the kit to work with newer version of cURL
			//You should remove them if you have any problems in earlier versions of cURL
			curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($curlSession, CURLOPT_SSL_VERIFYHOST, 2);
	
			// Send the request and store the result in an array
			$rawresponse = curl_exec($curlSession);
			// Split response into name=value pairs
			$response = explode(',', rtrim(ltrim($rawresponse,'{'),'}'));
			
			//print_r($rawresponse); exit;
			// Check that a connection was made
			if (curl_error($curlSession)) {
				// If it wasn't...
				$output['Status'] = "FAIL";
				$output['StatusDetail'] = curl_error($curlSession);
			}
	
			// Close the cURL session
			curl_close ($curlSession);
	
			// Tokenise the response
			for ($i=0; $i<count($response); $i++) {
				// Find position of first "=" character
				$splitAt = strpos($response[$i], ":");
				// Create an associative (hash) array with key/value pairs ('trim' strips excess whitespace)
				$keyval = trim(str_replace('"','',(substr($response[$i], 0, $splitAt))));
				$resval = trim(str_replace('"','',(substr($response[$i], ($splitAt+1)))));
				$output[$keyval] = $resval;
			} 
	

			
			//return $output;
			if ($output['response_code'] == 4012) {
				$trdata = array(
				'trans_verify_respcode'=>$output['response_code'],
				'trans_p_id'=>$output['p_id']
				);
				
				$updtrans = $this->cvwritingmodel->updt_trans($intrans_id, $trdata);
		
				$urllink = $output['payment_url']; 
				$urllink = str_replace("\\/", "/", $urllink);
				$this->external_redirect($urllink); exit();	
			} else {
				$trdata = array(
				'trans_verify_respcode'=>$output['response_code']
				);
				
				$updtrans = $this->cvwritingmodel->updt_trans($intrans_id, $trdata);
				
				redirect($this->config->base_url().'cvwriting/orderresult/?M=1;Process=Complete&trans='.$trid_b64_en);
			}
		} else {
			$this->data["formdata"] = array(
				'baddress'=>$this->input->post('baddress'),
				'bstate'=>$this->input->post('bstate'),
				'bcity'=>$this->input->post('bcity'),
				'bpcode'=>$this->input->post('bpcode'),
				'bcountry'=>$this->input->post('bcountry'),
			);
			
			$this->data['sid'] = 3;
			$this->data['title'] = 'Cherry Hire App - Billing Details';
			$this->data['pagehead'] = 'Billing Details';
			
			//$this->data["cartdata"] = $this->subscriptionmodel->get_tempdata($this->data['sessionid']);
			$this->data["cartdata"] = $this->cvwritingmodel->get_temp_questionnaire();			
			$this->data["country_list"] = $this->cvwritingmodel->get_country();			
			$this->load->view('common/header_inner',$this->data);
			$this->load->view('common/leftmenu',$this->data);
			$this->load->view('common/topmenu',$this->data);
			$this->data['footer_nav']=$this->load->view('common/footerbar',$this->data,true);
			$this->load->view('cv-writing/billing',$this->data);
			$this->load->view('common/footer_inner',$this->data);
		}
	}

	public function paymentprocess() //ProcessPayment
	{
		if (!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session
		$this->data['message'] = '';
		
		$post_vars = "";
		if ($_POST) {
			$kv = array();
			foreach ($_POST as $key => $value) {
				$kv[] = "$key = $value";
			}
			$post_vars = join("\n", $kv);
		}
		
		$payment_reference = $this->input->post('payment_reference');		
		
		if(!isset($_GET['trid'])) { redirect($this->config->base_url().'cvwriting/reviewcart/?process=payment&tran=1&status=Failed'); } // Handling Session
		//$this->data['portalurl'] = $this->input->get('company');
		//$this->data['trid'] = $this->encryption->decrypt(base64_decode($this->input->get('trid')));		
		
		//$trid_decode = base64_decode($this->input->get('trid'));
		//$this->data['trid'] = $this->encryption->decrypt($trid_decode);
		$this->data['trid'] = $this->input->get('trid');

		$trdata = array(
				'trans_payment_reference'=>$payment_reference,
			);
		
		$updtrans = $this->cvwritingmodel->updt_trans($this->data['trid'], $trdata);
		
		$url='https://www.paytabs.com/apiv2/verify_payment';

		/****** Live Account*****/
		$this->transaction['merchant_email']='abraham@ipfhr.com';
		$this->transaction['secret_key']= 'YeKEbiCikF9pSQ5B5c3i7CgSaABTvS1u6M8i4LBoqKOiAUUF7XXeze7KPIDkAFOHrXZwIAV8lJqVEkALiy0SM7CBQgWrWL8nI8Tr';
		
		/****** Test Account*****/
		//$this->transaction['merchant_email']='sreejith.g@ipfhr.com';
		//$this->transaction['secret_key']='icc3LbWW2WcyZDvgAFUAxtyDr0rjOga7tnaey6bB3o932FjCledSHLv8MXrBeCIIZSWyZ892wj6yZpbkDodl9JuWGWxVyfDx8A67';
			
			
		$this->transaction['payment_reference'] = $payment_reference;
		
		// Format data for post
		$data = http_build_query($this->transaction);
		// Set a one-minute timeout for this script
		set_time_limit(60);
		// Initialise output variable
		$output = array();
		// Open the cURL session
		$curlSession = curl_init();
		// Set the URL
		curl_setopt ($curlSession, CURLOPT_URL, $url);
		// No headers, please
		curl_setopt ($curlSession, CURLOPT_HEADER, 0);
		// It's a POST request
		curl_setopt ($curlSession, CURLOPT_POST, 1);
		// Set the fields for the POST
		curl_setopt ($curlSession, CURLOPT_POSTFIELDS, $data);
		// Return it direct, don't print it out
		curl_setopt($curlSession, CURLOPT_RETURNTRANSFER,1); 
		// This connection will timeout in 30 seconds
		curl_setopt($curlSession, CURLOPT_TIMEOUT,30); 
		//The next two lines must be present for the kit to work with newer version of cURL
		//You should remove them if you have any problems in earlier versions of cURL
	    curl_setopt($curlSession, CURLOPT_SSL_VERIFYPEER, FALSE);
	    curl_setopt($curlSession, CURLOPT_SSL_VERIFYHOST, 2);
		// Send the request and store the result in an array
		$rawresponse = curl_exec($curlSession);		
		$response = explode(',', rtrim(ltrim($rawresponse,'{'),'}'));			
		//print_r($rawresponse);
		// Check that a connection was made
		if (curl_error($curlSession)) {
			// If it wasn't...
			$output['Status'] = "FAIL";
			$output['StatusDetail'] = curl_error($curlSession);
		}

		// Close the cURL session
		curl_close ($curlSession);

		// Tokenise the response
		for ($i=0; $i<count($response); $i++) {
			// Find position of first "=" character
			$splitAt = strpos($response[$i], ":");
			// Create an associative (hash) array with key/value pairs ('trim' strips excess whitespace)
			$keyval = trim(str_replace('"','',(substr($response[$i], 0, $splitAt))));
			$resval = trim(str_replace('"','',(substr($response[$i], ($splitAt+1)))));
			$output[$keyval] = $resval;
		} 

		//echo $rawresponse; exit;
		//{"result":"The payment is completed successfully!","response_code":"100","pt_invoice_id":"36741","amount":203,"currency":"BHD","transaction_id":"30901"}	
		
		if ($output['response_code']==100) {
			$trdata = array(
				'trans_result'=>$output['result'],
				'trans_pt_invoice_id'=>$output['pt_invoice_id'],
				'trans_pay_respcode'=>$output['response_code'],
				'trans_transaction_id'=>$output['transaction_id'],
				'trans_status'=>1,
			);
		
			$updtrans = $this->cvwritingmodel->updt_trans($this->data['trid'], $trdata);
			//$this->data["cartdata"] = $this->subscriptionmodel->get_tempdata($this->data['sessionid'],'P');
			$mailstatus = $this->cvsendmail($this->session->userdata('cand_chid'));
			$this->data["cartdata"] = $this->cvwritingmodel->get_temp_questionnaire();
			$this->cvwritingmodel->change_cvw_status($this->data['trid']);
			$sumamt = 0;
			if (!empty($this->data["cartdata"])) {
				foreach($this->data["cartdata"] as $cartrow) {
					$sumamt = $sumamt + $cartrow->cvw_amt;
                    if($cartrow->cvw_cover == 1){
                        $sumamt = $sumamt + 10;
                    }
                    if($cartrow->cvw_express == 1){
                        $sumamt = $sumamt + 10;
                    }
					$insOrder = $this->cvwritingmodel->ins_order($this->data['trid'], 'Professional CV services', $sumamt);
					
				}
				
			}
		} else {
			$trdata = array(
				'trans_result'=>$output['result'],
				'trans_pt_invoice_id'=>$output['pt_invoice_id'],
				'trans_pay_respcode'=>$output['response_code'],
				'trans_transaction_id'=>$output['transaction_id'],
				'trans_status'=>0,
			);
		
			$updtrans = $this->cvwritingmodel->updt_trans($this->data['trid'], $trdata);
		}
		$intrans_id = $this->data['trid'];
		$trid_en = $this->encryption->encrypt($intrans_id);
		$trid_b64_en = base64_encode($trid_en);
		redirect($this->config->base_url().'cvwriting/orderresult/?M=2&Process=Complete&trid='.$trid_b64_en);
	}


	public function orderresult()
	{
		if (!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); } // Handling Session
		$this->data['message'] = '';
		
		if (!isset($_GET['trid'])) { redirect($this->config->base_url().'cvwriting/reviewcart/?process=payment&tran=1&status=Failed'); } // Handling Session
		//$this->data['portalurl'] = $this->input->get('company');
		//$this->data['trid'] = $this->encryption->decrypt(base64_decode($this->input->get('trans')));

		//170
		//$trid_en = $this->encryption->encrypt(170);
		//$trid_b64_en = base64_encode($trid_en);
		
		$trid_decode = base64_decode($this->input->get('trid'));

		$this->data['trid'] = $this->encryption->decrypt($trid_decode);

		$this->data["transaction"] = $this->cvwritingmodel->get_transdetails($this->data['trid']);
		
		if (empty($this->data["transaction"])) { redirect($this->config->base_url().'cvwriting/reviewcart/?process=payment&tran=1&status=Failed'); }
		
		$this->data['sid'] = 3;
		$this->data['title'] = 'Cherry Hire App - Transaction Details';
		$this->data['pagehead'] = 'Transaction Details';		
		//$this->data["orderdata"] = $this->subscriptionmodel->get_orderdata($this->data['sessionid']);		
		$this->load->view('common/header_inner',$this->data);
		$this->load->view('common/leftmenu',$this->data);
		$this->load->view('common/topmenu',$this->data);
		$this->data['footer_nav']=$this->load->view('common/footerbar',$this->data,true);
		$this->load->view('cv-writing/result',$this->data);
		$this->load->view('common/footer_inner',$this->data);
	}

	/* CV Send mail Function
	 * @param int $cid
	 * @param string $cvpath
	 * return int
	 */
	function cvsendmail($cid=null)
	{
		$result = $this->cvwritingmodel->get_candidate_details($cid);
		
		//$to 		= 'sreejith.g@ipfhr.com';
		$to 		= 'ch.123bcw@gmail.com';
		$from 		= 'do-not-reply@cherryhire.com';
		
		$FName 		= $result['can_fname'];
		$LName 		= $result['can_lname'];
		$ContactNo 	= $result['can_ccode'].'-'.$result['can_phone'];
		$RegEmail 	= $result['can_email'];
		$DOB 		= date('d-m-Y', strtotime($result['can_dob']));
		$Gender 	= $result['can_gender'];
		$Edu 		= $result['edu_name'];
		$Nation 	= $result['co_nationality'];
		$TotExp 	= $result['can_experience'];
		$CEmployer 	= $result['can_curr_company'];
		$CurrLoc 	= $result['can_curr_loc'];
		$FunArea 	= $result['fun_name'];
		$cvcover 	= $result['cvw_cover'];
		$expresscv 	= $result['cvw_express'];
		//Subject
		$subject 	= 'Resume for CV Writing -'.$FName.' '.$LName;
		
		if ($cvcover == 1) {
			$cvcover = 'Yes';
		} else {
			$cvcover = 'No';
		}

		if ($cvw_express == 1) {
			$cvw_express = 'Yes';
		} else {
			$cvw_express = 'No';
		}

		$patchtoCV = realpath(APPPATH . '../resume');
		$Resumewebpath = $result['cv_path'];
		//$cvfilenamesplit = explode("http://cherryhire.com/resume/",$result['cv_path']);
		
		$link_array = explode('/',$Resumewebpath);
    	$cvfilenamesplit = end($link_array);
    	$cvpath = $patchtoCV.'/'.$cvfilenamesplit;
		//Mail body
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
							<td style="border:1px solid #000; background:#CCC;"><strong>Resume Link</strong></td>
							<td colspan="3" style="border:1px solid #000;"> <a href="'.$Resumewebpath.'" title="Download CV" style="background-color:red;padding:10px">Click To View</a></td>
						  </tr>
						  <tr>
							<td style="border:1px solid #000; background:#CCC;"><strong>CV Cover letter required?</strong></td>
							<td colspan="3" style="border:1px solid #000;">'.$cvcover.'</td>
						  </tr>
						  <tr>
							<td style="border:1px solid #000; background:#CCC;"><strong>Express delivery?</strong></td>
							<td colspan="3" style="border:1px solid #000;">'.$cvw_express.'</td>
						  </tr>
						</table>
						</div>
						<div>
						<br>
						<p><strong>1. What are your achievements worth adding to your resume?</strong></p>
						<p>'.$result['qn1'].'</p>
						
						<p><strong>2. How were you able to add value to the operations of your previous employers?</strong></p>
						<p>'.$result['qn2'].'</p>

						<p><strong>3. What are your technical skills you think can add value to your professional profile?</strong></p>
						<p>'.$result['qn3'].'</p>

						<p><strong>4. Explain your professional journey so far?</strong></p>
						<p>'.$result['qn4'].'</p>

						<p><strong>5. What are your education qualifications?</strong></p>
						<p>'.$result['qn5'].'</p>

						<p><strong>6. Do you have any additional qualifications or training you have attended worth adding to your profile? Provide the same, if any.</strong></p>
						<p>'.$result['qn6'].'</p>

						<p><strong>7. What are your technical skills?</strong></p>
						<p>'.$result['qn7'].'</p>

						<p><strong>8. What are your personal traits you have acquired over the years as a professional?</strong></p>
						<p>'.$result['qn8'].'</p>

						<p><strong>9. What are your career goals?</strong></p>
						<p>'.$result['qn9'].'</p>

						<p><strong>10. Where do you want to see yourself over the course of next five years?</strong></p>
						<p>'.$result['qn10'].'</p>

						<p><strong>11. What are the interests you have that you think are worth adding to your profile?</strong></p>
						<p>'.$result['qn11'].'</p>

						</div>
					  <p>-- </p>
					  <p>Regards, <br> Webmaster - Cherry Hire</p>
					</div>
					</body>
					</html>';
				//Mail configuration
				$config = Array(
					'protocol' => 'smtp',
					'smtp_host' => 'ssl://smtp.googlemail.com',
					'smtp_port' => 465,
					'smtp_user' => 'no-reply@cherryhire.com',
					'smtp_pass' => 'vbgtstahuubtwsbj',
					'mailtype'  => 'html', 
					'charset'   => 'utf-8'
					 );
				$this->email->initialize($config);
				$this->load->library('email');
				$this->email->set_newline("\r\n");
				$this->email->from('no-reply@cherryhire.com' , 'Cherryhire');
		$this->email->to($to);
		$this->email->cc('jitinajith@cherryhire.com, jitinajithk@gmail.com, sunilkm.5ine@gmail.com'); 
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->attach($cvpath); // attach file
		//$this->email->attach('/path/to/file2.pdf');
		if ($this->email->send()) {
			//"Mail Sent!";
			return 1;
		} else {
			//"There is error in sending mail!";
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
	
	function external_redirect($url)
	{
	   	if (!headers_sent()) {
			header('Location: '.$url);
		} else {
			echo '<script type="text/javascript">';
	    	echo 'window.location.href="'.$url.'";';
	       	echo '</script>';
	       	echo '<noscript>';
	       	echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
	       	echo '</noscript>';
	   }
	}
	
	function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }
	
	public function formated_ordid($ordId=NULL)
	{
		$outputJobId = $ordId;
		// format the job id
		if ($outputJobId<100000)
		{
			$outputJobId = "0" . $outputJobId;
			if ($outputJobId<10000)
			{
				$outputJobId = "0" . $outputJobId;
				if ($outputJobId<1000)
				{
					$outputJobId = "0" . $outputJobId;
					if ($outputJobId<100)
					{
						$outputJobId = "0" . $outputJobId;
						if ($outputJobId<10)
						{
							$outputJobId = "0" . $outputJobId;
						}// end if
					}// end if
				}// end if
			}// end if
		}// end if
		$outputJobId = "CH-" . $outputJobId;
		return $outputJobId;
	}

	public function buy()
{
	$name   = $this->input->get('name');
	$id  = $this->input->get('id');
	$price = $this->cvwritingmodel->geamount($id);
	$this->load->model('subscriptionmodel');
	if (!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
	$returnURL = base_url().'cvwriting/success';
    $cancelURL = base_url().'cvwriting/cancel';
    $notifyURL = base_url().'cvwriting/ipn';

	

		$userID = $this->session->userdata('cand_chid');
		$this->load->helper('string');
		$ino = random_string('alnum',10);
		$this->paypal_lib->add_field('return', $returnURL);
	    $this->paypal_lib->add_field('cancel_return', $cancelURL);
	    $this->paypal_lib->add_field('notify_url', $notifyURL);
	    $this->paypal_lib->add_field('item_name', $name);
	    $this->paypal_lib->add_field('custom', $userID);
	    $this->paypal_lib->add_field('item_number',  $ino);
	    $this->paypal_lib->add_field('amount',  $price);
	    // Render paypal form
	    $this->paypal_lib->paypal_auto_form();



}


function success(){
 	if (!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
        // Get the transaction data
        if($paypalInfo = $this->input->post())
	        {
	        	$paypalInfo = $this->input->post();
	        	$data['item_name']      = $paypalInfo['item_name'];
		        $data['item_number']    = $paypalInfo['item_number'];
		        $data['txn_id']         = $paypalInfo["txn_id"];
		        $data['payment_amt']    = $paypalInfo["mc_gross"];
		        $data['currency_code']  = $paypalInfo["mc_currency"];
		        $data['status']         = $paypalInfo["payment_status"];
		        $this->cvwritingmodel->copmletUpdate($this->session->userdata('cand_chid'));
		       $result =  $this->sendsuccess($paypalInfo);
		       $result1 =  $this->cvsend();

		        
	        }
        else
	        {
	        	$paypalInfo = $this->input->get();
	        	$data['item_name']      = $paypalInfo['item_name'];
		        $data['item_number']    = $paypalInfo['item_number'];
		        $data['txn_id']         = $paypalInfo["txn_id"];
		        $data['payment_amt']    = $paypalInfo["mc_gross"];
		        $data['currency_code']  = $paypalInfo["mc_currency"];
		        $data['status']         = $paypalInfo["payment_status"];
		        $this->cvwritingmodel->copmletUpdate($this->session->userdata('cand_chid'));
		       	$result =  $this->sendsuccess($paypalInfo);
		       	$result1 =  $this->cvsend();
	        }

	         $this->session->set_flashdata('success','Thank you for the payment for your Professional CV');
			redirect('cvwriting/reviewcart');
        
       
        
        }
    

function cancel(){
        // Load payment failed view
        // 
        if (!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
        $this->session->set_flashdata('error','Your payment order could not be processed. Please try again');
        redirect('cvwriting/reviewcart');
     }


function ipn(){
	if (!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
        // Paypal posts the transaction data
        $paypalInfo = $this->input->post();
        $this->load->model('product');
        if(!empty($paypalInfo)){
            // Validate and get the ipn response
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);

            // Check whether the transaction is valid
            if($ipnCheck){
                // Insert the transaction data in the database
                $data['user_id']        	= $paypalInfo["custom"];
                $data['product_id']        	= $paypalInfo["item_number"];
                $data['txn_id']            	= $paypalInfo["txn_id"];
                $data['payment_gross']    	= $paypalInfo["mc_gross"];
                $data['currency_code']    	= $paypalInfo["mc_currency"];
                $data['payer_email']    	= $paypalInfo["payer_email"];
                $data['payment_status'] 	= $paypalInfo["payment_status"];

                // $this->product->insertTransaction($data);
                // $result =  $this->sendsuccess($paypalInfo);
                // $result1 =  $this->cvsend();
            }
        }
    }


function sendsuccess($paypalInfo)
{
	$this->load->model('subscriptionmodel');
	$umid = $this->session->userdata('cand_chid');
	$candata = $this->subscriptionmodel->getmuser($umid);
	
	$from = 'do-not-reply@cherryhire.com';
	$to   = $candata['can_email'];
	$subject 	= 'Payment Success';
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
								            <a href="http://www.cherryhire.com" target="_blank"><img src="http://staging.cherryhire.com/site/images/logo.png" alt=""></a>
								        </td>
								        <td rowspan="13" style="width:29px; height:903px; border-top:1px solid #CCC; border-right:1px solid #CCC; border-bottom:1px solid #CCC;">
								        </td>
								    </tr>
								    <tr>
								        <td colspan="7" style="background:#AD1E24; width:585px; height:111px; vertical-align:middle; color:#FFF; padding:10px 0px 0px 30px; font-size:28px; font-weight:bold;">
								            Payment Detail
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
								            <p>Hi '.$candata["can_fname"].',</p>
								            <p>Greetings from <a href="www.cherryhire.com"> www.cherryhire.com</a>
								            <br>
											Thank you for the payment for your Professional CV.
											<br>
											
												We acknowledge receipt of the same and confirm that the Professional CV will be forwarded to you within 7 working days or 2 working days if the express delivery is applied.
												Wishing you the very best in your career.


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
								        <td style=" width:100% ">
								           <table style="width:96%;padding-left:2%;padding-right:2%;background:#FFF;" id="t11">
												  <tr>
												    <th>Item</th>
												    <th>Tax-Id</th> 
												    <th>Currency</th>
												    <th>Payment Amount</th>
												  </tr>
												  <tr>
												  	<td>'.$paypalInfo["item_name"].'</td>
												  	<td>'.$paypalInfo["txn_id"].'</td>
												  	<td>'.$paypalInfo["mc_currency"].'</td>
												  	<td>'.$paypalInfo["mc_gross"].'</td>
												  </tr>
											</table>
												<br>
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
									'protocol' => 'smtp',
									'smtp_host' => 'ssl://smtp.googlemail.com',
									'smtp_port' => 465,
									'smtp_user' => 'no-reply@cherryhire.com',
									'smtp_pass' => 'vbgtstahuubtwsbj',
									'mailtype'  => 'html', 
									'charset'   => 'utf-8'
									 );
								$this->email->initialize($config);
								$this->load->library('email');
								$this->email->set_newline("\r\n");
								$this->email->from('no-reply@cherryhire.com' , 'Cherryhire'); 
         $this->email->to($to);
         $this->email->cc('jitinajithk@gmail.com');
         $this->email->cc('jitinajith@cherryhire.com');
         $this->email->subject('Payment success'); 
         $this->email->message($message);

		if ($this->email->send()) {

			// echo "Mail Sent!";exit;

			return 1;

		} else {

			// echo $this->email->print_debugger();

			return 0;

		}
}


function cvsend()
{
	$this->load->model('subscriptionmodel');
	$umid 		= $this->session->userdata('cand_chid');
	$candata 	= $this->subscriptionmodel->getmuser($umid);
	$result = $this->cvwritingmodel->get_candidate_details($umid);
		
		//$to 		= 'sreejith.g@ipfhr.com';
		$to 		= 'ch.123bcw@gmail.com';
		$from 		= 'do-not-reply@cherryhire.com';
		
		$FName 		= $result['can_fname'];
		$LName 		= $result['can_lname'];
		$ContactNo 	= $result['can_ccode'].'-'.$result['can_phone'];
		$RegEmail 	= $result['can_email'];
		$DOB 		= date('d-m-Y', strtotime($result['can_dob']));
		$Gender 	= $result['can_gender'];
		$Edu 		= $result['edu_name'];
		$Nation 	= $result['co_nationality'];
		$TotExp 	= $result['can_experience'];
		$CEmployer 	= $result['can_curr_company'];
		$CurrLoc 	= $result['can_curr_loc'];
		$FunArea 	= $result['fun_name'];
		$cvcover 	= $result['cvw_cover'];
		$expresscv 	= $result['cvw_express'];
		$cv_path1	= $result['cv_path'];
		//Subject
		$subject 	= 'Resume for CV Writing -'.$FName.' '.$LName;
		
		if ($cvcover == 1) {
			$cvcover = 'Yes';
		} else {
			$cvcover = 'No';
		}

		if ($expresscv == 1) {
			$cvw_express = 'Yes';
		} else {
			$cvw_express = 'No';
		}

		//Resume path
		//http://cherryhire.com/resume/resume_1316.doc
		//$Resumewebpath = base_url().'resume/'. basename($cvpath);
		///home/ipfgroup/public_html/resume/
		$patchtoCV = realpath(APPPATH . '../resume');
		$Resumewebpath = $result['cv_path'];
		//$cvfilenamesplit = explode("http://cherryhire.com/resume/",$result['cv_path']);
		
		$link_array = explode('/',$Resumewebpath);
    	$cvfilenamesplit = end($link_array);
    	$cvpath = $patchtoCV.'/'.$cvfilenamesplit;
	
	$from 		= 'do-not-reply@cherryhire.com';
	$to   		= 'shahirkm@5ines.com';
	$subject 	= 'Professional CV';
	$message    = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
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
							<td style="border:1px solid #000; background:#CCC;"><strong>Resume Link</strong></td>
							<td colspan="3" style="border:1px solid #000;"> <a href="'.$Resumewebpath.'" title="Download CV" style="background-color:red;padding:10px">Click To View</a></td>
						  </tr>
						  <tr>
							<td style="border:1px solid #000; background:#CCC;"><strong>CV Cover letter required?</strong></td>
							<td colspan="3" style="border:1px solid #000;">'.$cvcover.'</td>
						  </tr>
						  <tr>
							<td style="border:1px solid #000; background:#CCC;"><strong>Express delivery?</strong></td>
							<td colspan="3" style="border:1px solid #000;">'.$cvw_express.'</td>
						  </tr>
						</table>
						</div>
						<div>
						<br>
						<p><strong>1. What are your achievements worth adding to your resume?</strong></p>
						<p>'.$result['qn1'].'</p>
						
						<p><strong>2. How were you able to add value to the operations of your previous employers?</strong></p>
						<p>'.$result['qn2'].'</p>

						<p><strong>3. What are your technical skills you think can add value to your professional profile?</strong></p>
						<p>'.$result['qn3'].'</p>

						<p><strong>4. Explain your professional journey so far?</strong></p>
						<p>'.$result['qn4'].'</p>

						<p><strong>5. What are your education qualifications?</strong></p>
						<p>'.$result['qn5'].'</p>

						<p><strong>6. Do you have any additional qualifications or training you have attended worth adding to your profile? Provide the same, if any.</strong></p>
						<p>'.$result['qn6'].'</p>

						<p><strong>7. What are your technical skills?</strong></p>
						<p>'.$result['qn7'].'</p>

						<p><strong>8. What are your personal traits you have acquired over the years as a professional?</strong></p>
						<p>'.$result['qn8'].'</p>

						<p><strong>9. What are your career goals?</strong></p>
						<p>'.$result['qn9'].'</p>

						<p><strong>10. Where do you want to see yourself over the course of next five years?</strong></p>
						<p>'.$result['qn10'].'</p>

						<p><strong>11. What are the interests you have that you think are worth adding to your profile?</strong></p>
						<p>'.$result['qn11'].'</p>

						</div>
					  <p>-- </p>
					  <p>Regards, <br> Webmaster - Cherry Hire</p>
					</div>
					</body>
					</html>';

	//Mail configuration
	$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'no-reply@cherryhire.com',
		'smtp_pass' => 'vbgtstahuubtwsbj',
		'mailtype'  => 'html', 
		'charset'   => 'utf-8'
		 );
	$this->email->initialize($config);
	$this->load->library('email');
	$this->email->set_newline("\r\n");
	$this->email->from('no-reply@cherryhire.com' , 'Cherryhire');
         $this->email->to('shunal@cherryhire.com');
         $this->email->cc('jitinajithk@gmail.com, jitinajith@cherryhire.com, do-not-reply@cherryhire.com');
         // $this->email->cc('shahirkm@5ines.com');
         $this->email->subject('Payment success'); 
         $this->email->message($message);
         $this->email->attach($cvpath);
		if ($this->email->send()) {

			// echo "Mail Sent!";exit;

			return 1;

		} else {

			// echo $this->email->print_debugger();exit;

			return 0;

		}
}

 function deleteit()
	{
		if (!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
		$id = $this->input->get('id');
		$this->load->model('Cvwritingmodel');
		if($this->Cvwritingmodel->deleteit($id))
		{
			$this->session->set_flashdata('success','Successfully deleted');
		}
		else
		{
			$this->session->set_flashdata('error','Data does not exist in database');
		}
		redirect('cvwriting/reviewcart');
	}


function cvexpressup()
{
	if (!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
	$id = $this->session->userdata('cand_chid');
	$sataus = $this->input->get('cvexpress');
	$this->load->model('Cvwritingmodel');
	$this->Cvwritingmodel->cvexpressup($sataus,$id);
	


}

function cvw_coverup()
{
	if (!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
	$id = $this->session->userdata('cand_chid');
	$sataus = $this->input->get('cvcover');
	$this->load->model('Cvwritingmodel');
	$this->Cvwritingmodel->cvw_coverup($sataus,$id);
}


function CompletePayment(){
	$limits = $this->input->get('count');
	$umid 	= $this->session->userdata('cand_chid');
	$this->cvwritingmodel->copmletUpdate($umid);
	$result1 =  $this->cvsend();
	$result2 =  $this->paysuccess();
	$this->session->set_flashdata('success','Thank you for the payment for your Professional CV');
	redirect('cvwriting/reviewcart');


}

function paysuccess()
{
	$this->load->model('subscriptionmodel');
	$umid = $this->session->userdata('cand_chid');
	$candata = $this->subscriptionmodel->getmuser($umid);
	$datas  = $this->cvwritingmodel->successdata($umid);

	$total = $datas['cvw_amt'] + ($datas['cvw_cover'] * 10) + ($datas['cvw_express'] * 10);
	
	$from = 'do-not-reply@cherryhire.com';
	$to   = $candata['can_email'];
	$subject 	= 'Payment Success';
	$message    = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> <html><head><title>Candidate_Register</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style> #t11,#t11 th,#t11 td {border: 1px solid black; border-collapse: collapse; } #t11 th, #t11 td {padding: 15px; text-align: left; } table#t01 {width: 100%; background-color: #f1f1c1; } </style> </head> <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"> <table id="Table_01" width="642" height="933" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#FFF; font-size:14px; font-family:Arial, Helvetica, sans-serif;"> <tr> <td colspan="9" style="width:642px; height:30px;"> </td> </tr> <tr> <td rowspan="13" style="width:28px; height:903px; border-top:1px solid #CCC; border-left:1px solid #CCC; border-bottom:1px solid #CCC;"> </td> <td colspan="7" style="width:585px; height:103px; border-top:1px solid #CCC;"> <a href="http://www.cherryhire.com" target="_blank"><img src="http://staging.cherryhire.com/site/images/logo.png" alt=""></a> </td> <td rowspan="13" style="width:29px; height:903px; border-top:1px solid #CCC; border-right:1px solid #CCC; border-bottom:1px solid #CCC;"> </td> </tr> <tr> <td colspan="7" style="background:#AD1E24; width:585px; height:111px; vertical-align:middle; color:#FFF; padding:10px 0px 0px 30px; font-size:28px; font-weight:bold;"> Payment Detail </td> </tr> <tr> <td style="width:10px; height:10px; line-height:0px;" valign="top"> <img src="'.base_url().'emailtemplate/Candidate_Register_06.png" alt=""> </td> <td colspan="5" style="background:#F0EFEC; width:564px; height:10px; line-height:0px;"> </td> <td style="width:11px; height:10px; line-height:0px;" valign="top"> <img src="'.base_url().'emailtemplate/Candidate_Register_08.png" alt=""> </td> </tr> <tr> <td rowspan="9" style="background:#FFF; width:10px; height:643px;"> </td> <td style="background:#F0EFEC; width:36px; height:122px;"> </td> <td colspan="3" style="background:#F0EFEC; width:488px; height:122px; line-height:30px;padding:0px 0px 0px 10px;"> <p>Hi '.$candata["can_fname"].',</p> <p>Greetings from <a href="www.cherryhire.com"> www.cherryhire.com</a> <br> Thank you for the payment for your Professional CV. <br> We acknowledge receipt of the same and confirm that the Professional CV will be forwarded to you within 7 working days or 2 working days if the express delivery is applied. Wishing you the very best in your career. </p> </td> <td style="background:#F0EFEC; width:40px; height:122px;"> </td> <td rowspan="9" style="background:#FFF; width:11px; height:643px;"> </td> </tr> <tr> <td rowspan="4" style="background:#F0EFEC; width:36px; height:128px;"> </td> <td colspan="3" style="background:#FFF; width:488px; height:36px; padding:0px 0px 0px 16px; font-weight:bold; line-height:30px;"> <p>Payment Details</p> <td rowspan="4" style="background:#F0EFEC; width:36px; height:128px;"> </td> </tr> <tr> <td style="background:#FFF; width:55px; height:40px;"> <img src="'.base_url().'emailtemplate/Candidate_Register_17.png" alt=""> </td> <td style=" width:100% "> <table style="width:96%;padding-left:2%;padding-right:2%;background:#FFF;" id="t11">
												 
												  <tr>
												    <th>Item</th>
												    <th>Transaction id</th> 
												    <th>Currency</th>
												    <th>Payment Amount</th>
												  </tr>
												  <tr>
												  	<td>Professional CV services</td>
												  	<td>'.$datas['trans_id'].'</td>
												  	<td>USD</td>
												  	<td>'.$total.'</td>
												  </tr>
		</table> <br> </td> <td rowspan="2" style="background:#FFF; width:212px; height:82px;"> </td> </tr> <tr> <td colspan="3" style="background:#FFF; width:488px; height:10px;"> </td> </tr> <tr> <td style="background:#F0EFEC; width:36px; height:151px;"> </td> <td colspan="3" style="background:#F0EFEC; width:488px; height:151px; padding:0px 0px 0px 10px; line-height:30px;"> <p style="font-weight:bold;">To get noticed, we recommended you do the following:</p> <p> &bull; Update your profile regularly <br > &bull; Search and Apply to Jobs <br > &bull; Set Profile Privacy Settings </p> </td> <td style="background:#F0EFEC; width:40px; height:151px;"> </td> </tr> <tr> <td style="background:#F0EFEC; width:36px; height:82px;"> </td> <td colspan="3" style="background:#F0EFEC; width:488px; height:82px; padding:0px 0px 0px 10px; line-height:30px;"> For any queries send us an email at jobassist@cherryhire.com <br > Good Luck in your journey to find a great job! </td> <td style="background:#F0EFEC; width:40px; height:82px;"> </td> </tr> <tr> <td style="background:#F0EFEC; width:36px; height:104px;"> </td> <td colspan="3" style="background:#F0EFEC; width:488px; height:104px; padding:0px 0px 0px 10px; line-height:21px; font-size:12px;"> Best regards.<br> Cherryhire Team. </td> <td style="background:#F0EFEC; width:40px; height:104px;"> </td> </tr> <tr> <td style="background:#F0EFEC; width:36px; height:56px;"> </td> <td colspan="3" style="background:#F0EFEC; width:488px; height:56px; padding:0px 180px 0px 180px;"> <a href="https://www.facebook.com/cherryhire" target="_blank"><img src="'.base_url().'emailtemplate/sicon1.png" alt=""></a> <a href="https://twitter.com/cherry_hire" target="_blank"><img src="'.base_url().'emailtemplate/sicon2.png" alt=""></a> <a href="https://www.linkedin.com/company/cherry-hire" target="_blank"><img src="'.base_url().'emailtemplate/sicon3.png" alt=""></a> <a href="https://www.instagram.com/cherryhire/" target="_blank"><img src="'.base_url().'emailtemplate/sicon4.png" alt=""></a> </td> <td style="background:#F0EFEC; width:40px; height:56px;"> </td> </tr> <tr> <td colspan="7"  style="width:585px; height:36px; border-bottom:1px solid #CCC;"> </td> </tr> </table></body></html>';
//Mail configuration
$config = Array(
	'protocol' => 'smtp',
	'smtp_host' => 'ssl://smtp.googlemail.com',
	'smtp_port' => 465,
	'smtp_user' => 'no-reply@cherryhire.com',
	'smtp_pass' => 'vbgtstahuubtwsbj',
	'mailtype'  => 'html', 
	'charset'   => 'utf-8'
	 );
$this->email->initialize($config);
$this->load->library('email');
$this->email->set_newline("\r\n");
$this->email->from('no-reply@cherryhire.com' , 'Cherryhire');
         $this->email->to($to);
         $this->email->cc('jitinajithk@gmail.com');
         $this->email->cc('jitinajith@cherryhire.com');
         $this->email->subject('Payment success'); 
         $this->email->message($message);

		if ($this->email->send()) {

			// echo "Mail Sent!";exit;

			return 1;

		} else {

			// echo $this->email->print_debugger();

			return 0;

		}
}


/**
 * Select cv package
*/
public function professional_cv()
{
	if (!$this->session->userdata('cand_chid')) { redirect($this->config->base_url().'LoginProcess'); }
	$this->data['message'] = '';		
	$this->data['sid'] = 1;
	$this->data['title'] = 'Cherry Hire App - Upgrade';
	$this->data['pagehead'] = 'CV WRITING';	
	$this->data['cv_package'] = $this->cvwritingmodel->cvpakage();
	$this->load->view('new/cvpackage', $this->data, FALSE);
	
}


}