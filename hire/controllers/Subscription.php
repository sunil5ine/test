<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**

 * Subscription controller for this App.

 *

 * @package    CI

 * @subpackage Controller

 * @author     Sreejith Gopinath <sreejith@aatoon.com>

 */

 

class Subscription extends CI_Controller {



	/*

	* Init function

	* @return void

	*/

	public function __construct()

	{

		parent::__construct();

		$this->clear_cache();

		$this->load->model('subscriptionmodel');

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

		

		if(isset($_COOKIE["PHPSESSID"])) {

			$this->data['sessionid'] = $_COOKIE["PHPSESSID"];

		} else {

			$this->data['sessionid'] = '';

		}

	}

	

	/** 

	* Index Function

	*

	* @return void

	*/

	public function index()

	{

		if(!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session

		$this->data['message'] 	= '';

		$this->data['mid'] 		= 2;

		$this->data['sid'] 		= 3;

		$this->data['title'] 	= 'Cherry Hire App - Subscriptions';

		$this->data['pagehead'] = 'Subscriptions';

		$this->data["mon_plan"] = $this->subscriptionmodel->get_monthly();

		// $this->data["ann_plan"] = $this->subscriptionmodel->get_annual();

		// $this->data["cart_count"] = $this->subscriptionmodel->cart_count();

		
		$this->load->view('new/pricing',$this->data);

	}

	

	/** 

	* Add to cart Function

	* @param varchar $planid

	* @return void

	*/

	public function tocart($planid=null)

	{

		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session

		$this->data['message'] = '';

		$plan_records = $this->subscriptionmodel->get_plan_record($planid);
		

		if (empty($plan_records)) { redirect($this->config->base_url().'Subscriptions'); }


		$tempdata = array(

			'temp_session' => $plan_records['pr_encrypt_id'],

			'temp_emp_id' => $this->session->userdata('hireid'),

			'temp_pr_id' => $plan_records['pr_id'],

			'temp_nojobs' => $plan_records['pr_limit'],

			'temp_nocvs' => $plan_records['pr_cvno'],

			'temp_amt' => $plan_records['pr_offer'],

			'temp_items' => '1',

		   	'temp_date' => date('Y-m-d H:i:s'),

			'temp_status' => 'T'

		);

		$tempid = $this->subscriptionmodel->ins_tempdata($tempdata);
		redirect($this->config->base_url().'Subscriptions/Cart');


	}

	

	/** 

	* Review Cart Function

	* @param string $errcode

	* @return void

	*/

	public function reviewcart($errcode=null)

	{

		if(!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session

		$this->data['message'] 	= '';

		$this->data['mid'] 		= 2;

		$this->data['sid'] 		= 3;

		$this->data['title'] 	= 'Cherry Hire App - Cart Review';

		$this->data['pagehead'] = 'Review Cart';

		$this->data["cartdata"] = $this->subscriptionmodel->get_tempdata($this->data['sessionid']);

		if ($this->input->get('process') == 'delete' && $this->input->get('status') == 'success') {
			$this->data['message'] 	= '<div style="margin-bottom: 0px;" class="alert alert-success">
			 <button data-dismiss="alert" class="close" type="button">&times;</button> successfully deleted</div> ';
		}
		if($this->input->get('process') == 'delete' && $this->input->get('status') == 'Failed'){
			$this->data['message'] 	= '<div style="margin-bottom: 0px;" class="alert alert-error">
			 <button data-dismiss="alert" class="close" type="button">&times;</button>Some error occurred.  Please try again later!</div>';
		}

		if ($this->input->get('process') == "view" && $this->input->get('status') == 'Failed' && $this->input->get('pro') == "2") {

			$this->data['message'] 	= '<div style="margin-bottom: 0px;" class="alert alert-error">
			 <button data-dismiss="alert" class="close" type="button">&times;</button>Your payment has been declined </div>';
		}


		$this->load->view('new/cart',$this->data);
	}

	

	/** 

	* Billing section Function

	* @param string $errcode

	* @return void

	*/

	public function billingcart($errcode=null)

	{

		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session

		$this->data['message'] 	= '';

		$this->data["formdata"] = array(

				'baddress'=>'',

				'bstate'=>'',

				'bcity'=>'',

				'bpcode'=>'',

				'bcountry'=>''

		);

		$perItem 	= $this->input->post('itemcount');
		$itemId 	= $this->input->post('itemId');
		$perAmount 	= $this->input->post('itemAmount');
		$jobs 	    = $this->input->post('jobs');
		for ($i=0; $i < count($itemId); $i++) { 
			$upjobs = $jobs[$i];
			$this->subscriptionmodel->updateItems($perItem[$i],$itemId[$i],$perAmount[$i],$upjobs);
		}


		if ($this->input->post('totamt') && $this->input->post('empid')) {

			$bill_address = $this->subscriptionmodel->get_baddress($this->session->userdata('hireid'));

			if (!empty($bill_address)) {

				$this->data["formdata"] = array(

					'baddress'=>$bill_address['eba_address'],

					'bstate'=>$bill_address['eba_state'],

					'bcity'=>$bill_address['eba_city'],

					'bpcode'=>$bill_address['eba_postal_code'],

					'bcountry'=>$bill_address['eba_country'],

				);

			}

			$this->data['mid'] 			= 2;

			$this->data['sid']		 	= 3;

			$this->data['title'] 		= 'Cherry Hire App - Billing Details';

			$this->data['pagehead'] 	= 'Billing Details';

			$this->data["cartdata"] 	= $this->subscriptionmodel->get_tempdata($this->data['sessionid']);

			$this->data["country_list"] = $this->subscriptionmodel->get_country();
			
			$this->load->view('new/billing',$this->data);

		} else {

			redirect($this->config->base_url().'Subscriptions/Cart/?process=view&pro=2&status=Failed');

		}

	}

	

	/** 

	* Delete Cart Function

	* @param string $cartid

	* @return void

	*/

	public function deletecart($cartid=null)

	{

		if(!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session

		$this->data['message'] 	= '';

		$this->data['cartid'] 	= $cartid;

		$tempdata 				= $this->subscriptionmodel->get_tempdata_single($this->data['cartid']);

		if (empty($tempdata)) {

			redirect($this->config->base_url().'Subscriptions/Cart/?process=delete&del=2&status=Failed');

		} else {

			$this->subscriptionmodel->delete_tempdata($this->data['cartid']);

			redirect($this->config->base_url().'Subscriptions/Cart/?process=delete&del=1&status=success');

		}

	}

	

	/** 

	* Process cart Function

	* 

	* @return void

	*/


public function processcart()
{
	if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'LoginProcess'); }
	$this->load->library('paypal_lib');

	$returnURL 	= base_url().'Subscription/success';
    $cancelURL 	= base_url().'Subscription/cancel';
    $notifyURL 	= base_url().'Subscription/ipn';

	$baddress 	= $this->input->post('baddress');
	$bcity 		= $this->input->post('bcity');
	$bpcode 	= $this->input->post('bpcode');
	$bstate 	= $this->input->post('bstate');
	$bcountry 	= $this->input->post('bcountry');
	$totamt 	= $this->input->post('totamt');
	$userID 	= $this->session->userdata('hireid');

	$billinkgdata = array(
		'eba_address' 		=>$baddress , 
		'eba_city' 			=>$bcity , 
		'eba_postal_code' 	=>$bpcode , 
		'eba_state' 		=>$bstate , 
		'eba_country' 		=>$bcountry , 
		'emp_id' 			=>$userID , 
		'eba_created_dt' 	=> date('Y-m-d H:i:s'), 
		'eba_status' 		=> 1, 
	);
	$this->subscriptionmodel->updateBillingAddress($billinkgdata, $userID);

	$details    = $this->subscriptionmodel->cheksecr($userID);

	
	
		$this->load->helper('string');
		$ino =random_string('alnum',4).date('ymdhis');
		$this->paypal_lib->add_field('return', $returnURL);
	    $this->paypal_lib->add_field('cancel_return', $cancelURL);
	    $this->paypal_lib->add_field('notify_url', $notifyURL);
	    $this->paypal_lib->add_field('item_name', 'cherryhire employer');
	    $this->paypal_lib->add_field('custom', $userID);
	    $this->paypal_lib->add_field('item_number',  $ino);
	    $this->paypal_lib->add_field('amount',  $totamt);
	    // Render paypal form
	    $this->paypal_lib->paypal_auto_form();	
	
	
}

function success(){
 	if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'LoginProcess'); }
        // Get the transaction data
       $this->data['message'] 	='';
        if($paypalInfo = $this->input->post())
	        {
	        	$paypalInfo = $this->input->post();
	        	$data['item_name']      = $paypalInfo['item_name'];
		        $data['item_number']    = $paypalInfo['item_number'];
		        $data['txn_id']         = $paypalInfo["txn_id"];
		        $data['payment_amt']    = $paypalInfo["mc_gross"];
		        $data['currency_code']  = $paypalInfo["mc_currency"];
		        $data['status']         = $paypalInfo["payment_status"];
		        if($this->subscriptionmodel->newSubscription($paypalInfo))
		        {
		        	$psd = array('temp_status' => 'C');
		        	$this->subscriptionmodel->paymentStatus($this->session->userdata('hireid'),$psd);
		        	$result =  $this->sendsuccess($paypalInfo);
		        }		        
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
		        if($this->subscriptionmodel->newSubscription($paypalInfo))
		        {
		        	$psd = array('temp_status' => 'C');
		        	$this->subscriptionmodel->paymentStatus($this->session->userdata('hireid'),$psd);
		       		$result =  $this->sendsuccess($paypalInfo);
		       	}		       	
	        }


			
	        $this->session->set_flashdata('success','Thank you for your subscription');
			redirect('Subscriptions/Cart');
        
}



function cancel(){
        // Load payment failed view
        // 
        $this->data['message'] = '';
        if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'LoginProcess'); }
        $psd = array('temp_status' => 'P');
		$this->subscriptionmodel->paymentStatus($this->session->userdata('hireid'),$psd);
		
        $this->session->set_flashdata('error','Your payment order could not be processed. Please try again');
		redirect('Subscriptions/Cart');
        
     }


function ipn(){
	if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'LoginProcess'); }
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
                $psd = array('temp_status' => 'F');
		        $this->subscriptionmodel->paymentStatus($this->session->userdata('hireid'),$psd);
            }
        }
        redirect('Subscriptions/Cart');
    }



function sendsuccess($paypalInfo)
{
	
	$umid = $this->session->userdata('hireid');
	$candata = $this->subscriptionmodel->getmuser($umid);
	
	$from = 'do-not-reply@cherryhire.com';
	$to   = $candata['emp_email'];
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
</style></head>
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
								            <p>Hi '.$candata["emp_fname"].',</p>
								            <p>Greetings from <a href="www.cherryhire.com"> www.cherryhire.com</a>
								            <br>
											Thank you for the payment for your Psychometric Test...
											<br>
											We acknowledge receipt of the same and confirm that the Test link will be forwarded to you within 2 working days. The test result will be emailed to you within 24 hours of completion of the test.
											Wishing you the very best in your career

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
                   'protocol' => 'mail',
                   'smtp_host' => 'mail.cherryhire.com',
                   'smtp_port' => 587,
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
         $this->email->cc('jitinajithk@gmail.com');
         $this->email->subject('Payment success'); 
         $this->email->message($message);

		if ($this->email->send()) {

			// echo "Mail Sent!";exit;

			return 1;

		} else {

			// echo $this->email->print_debugger();exit;

			return 0;

		}
}

























	public function processcart1()

	{

		if(!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session

		$this->data['message'] = '';

		$this->data["formdata"] = array(

				'baddress'=>'',

				'bstate'=>'',

				'bcity'=>'',

				'bpcode'=>'',

				'bcountry'=>''

		);

		//Form validation

		$this->form_validation->set_rules('baddress', 'Address', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('bcity', 'City/Town', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('bstate', 'State', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('bpcode', 'Postal Code', 'trim|required|callback_name_check');

		$this->form_validation->set_rules('bcountry', 'Country', 'trim|required');

		

		if ($this->form_validation->run() == TRUE) { 

			$badd_id 		= $this->subscriptionmodel->ins_baddress();

			$bill_address 	= $this->subscriptionmodel->get_baddress($this->session->userdata('hireid'));

			if (empty($bill_address)){ redirect($this->config->base_url().'Subscriptions/Cart/?process=view&pro=2&status=Failed'); }

			$last_ordid 	= $this->subscriptionmodel->get_orderid();

			if (empty($last_ordid)){ $nxt_ordid = 1; } else {  $nxt_ordid = $last_ordid['trans_id']+1; }

			$reference_no 			= $this->formated_ordid($nxt_ordid);

			$updtdata 				= $this->subscriptionmodel->updt_tempdata($this->data['sessionid'],'T','P');

			$this->data["cartdata"] = $this->subscriptionmodel->get_tempdata($this->data['sessionid'],'P');



			$products_per_title = '';

			$unit_price 		= '';

			$quantity 			= '';

			$amount 			= 0;

			foreach ($this->data["cartdata"] as $cartrow) {

				$products_per_title = $products_per_title.$cartrow->pr_name;

				$unit_price 		= $unit_price.(round(($cartrow->temp_amt * 0.38), 2)); // USD to BHD Conversion

				$quantity 			= $quantity.'1';

				$amount 			= $amount + ($cartrow->temp_amt  *0.38);  // USD to BHD Conversion

				if (count($this->data["cartdata"])>1) {

					$products_per_title = $products_per_title.' || ';

					$unit_price 		= $unit_price.' || ';

					$quantity 			= $quantity.' || ';

				}

			}

			$amount = round($amount, 2);

			

			//Sample Price for Testing

			/*$amount = 00.11;

			$unit_price = 00.11;*/

			

			$intrans_id = $this->subscriptionmodel->ins_trans($amount);

			$ipaddress 	= gethostbyname($_SERVER['REMOTE_ADDR']);

			//$url='https://www.paytabs.com/apiv2/validate_secret_key';

			$url='https://www.paytabs.com/apiv2/create_pay_page';

			

			/****** Live Account*****/

			$this->transaction['merchant_email']='abraham@ipfhr.com';

			$this->transaction['secret_key']= 'YeKEbiCikF9pSQ5B5c3i7CgSaABTvS1u6M8i4LBoqKOiAUUF7XXeze7KPIDkAFOHrXZwIAV8lJqVEkALiy0SM7CBQgWrWL8nI8Tr';

			

			/****** Test Account*****/

			//$this->transaction['merchant_email']='sreejith.g@ipfhr.com';

			//$this->transaction['secret_key']='icc3LbWW2WcyZDvgAFUAxtyDr0rjOga7tnaey6bB3o932FjCledSHLv8MXrBeCIIZSWyZ892wj6yZpbkDodl9JuWGWxVyfDx8A67';

			

			$this->transaction['site_url']    			=  "http://www.cherryhire.com";

			$this->transaction['return_url']  			=  "http://www.hire.cherryhire.com/Subscriptions/ProcessPayment/?trid=".base64_encode($this->encryption->encrypt($intrans_id)); 

			$this->transaction['title']    				=  $bill_address['emp_comp_name'];

			$this->transaction['cc_first_name']     	=  $bill_address['emp_fname'];

			$this->transaction['cc_last_name']    		=  $bill_address['emp_lname'];

			$this->transaction['cc_phone_number']   	=  $bill_address['emp_ccode'];

			$this->transaction['phone_number']   		=  $bill_address['emp_phone'];

			$this->transaction['email']    				=  $bill_address['emp_email'];

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

			$this->transaction['billing_address']    	=  $bill_address['eba_address'];

			$this->transaction['state']    				=  $bill_address['eba_state'];

			$this->transaction['city']    				=  $bill_address['eba_city'];

			$this->transaction['postal_code']    		=  $bill_address['eba_postal_code'];

			$this->transaction['country']    			=  $bill_address['co_iso_code'];

			$this->transaction['shipping_first_name']	=  $bill_address['emp_fname'];

			$this->transaction['shipping_last_name'] 	=  $bill_address['emp_lname'];

			$this->transaction['address_shipping']   	=  $bill_address['eba_address'];

			$this->transaction['state_shipping']    	=  $bill_address['eba_state'];

			$this->transaction['city_shipping']  		=  $bill_address['eba_city'];

			$this->transaction['postal_code_shipping']	=  $bill_address['eba_postal_code'];

			$this->transaction['country_shipping']   	=  $bill_address['co_iso_code'];

			$this->transaction['msg_lang']    			=  "English";

			$this->transaction['cms_with_version']    	=  "Codeigniter 2.2";

			

			//print_r($this->transaction); exit;

			//echo '<pre>',print_r($this->transaction,1),'</pre>'; exit;

			

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

			// Split response into name=value pairs

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

	

			// Return the output

			//Array ( [result] => The Pay Page is created. [response_code] => 4012 [payment_url] => https:\/\/www.paytabs.com\/h2fxBthycp286y8pBQ7hdP9XDK9HeZM3kEuTAEITrBQoE\/KlUDLV2-aQDkMV30JcnoaM6mpT7O19BjHKzplT-Ppb-f0\/XvCr8N-iSmzJf0l15-DdaJ4olkmxuae6HuIfqzRwlI1c0\/vd7kYHdR7aYB_UeFRsoMEe-k8b8MDUkfAUezaVrpmB0LjEom3_XGwQc4eAxZ18p1Z9aB5CnYZp4c9KOkPAHPDouhHg [p_id] => 36720 ) 

			

			//return $output;

			if ($output['response_code'] == 4012) {

				$trdata = array(

					'trans_verify_respcode'=>$output['response_code'],

					'trans_p_id'=>$output['p_id']

				);

				

				$updtrans 	= $this->subscriptionmodel->updt_trans($intrans_id, $trdata);		

				$urllink 	= $output['payment_url']; 

				$urllink 	= str_replace("\\/", "/", $urllink);

				$this->external_redirect($urllink); exit();	

			} else {

				$trdata = array(

					'trans_verify_respcode'=>$output['response_code']

				);

				

				$updtrans = $this->subscriptionmodel->updt_trans($intrans_id, $trdata);				

				$updtdata = $this->subscriptionmodel->updt_tempdata($this->data['sessionid'],'P','F');

				redirect($this->config->base_url().'Subscriptions/TransDetails/?Process=Complete&trans='.base64_encode($this->encryption->encrypt($intrans_id)));

			}

		} else {

			$this->data["formdata"] = array(

				'baddress'=>$this->input->post('baddress'),

				'bstate'=>$this->input->post('bstate'),

				'bcity'=>$this->input->post('bcity'),

				'bpcode'=>$this->input->post('bpcode'),

				'bcountry'=>$this->input->post('bcountry'),

			);

			

			$this->data['mid'] 			= 2;

			$this->data['sid'] 			= 3;

			$this->data['title'] 		= 'Cherry Hire App - Billing Details';

			$this->data['pagehead'] 	= 'Billing Details';

			$this->data["cartdata"] 	= $this->subscriptionmodel->get_tempdata($this->data['sessionid']);

			$this->data["country_list"] = $this->subscriptionmodel->get_country();

			

			$this->load->view('common/header_inner',$this->data);

			$this->load->view('common/leftmenu',$this->data);

			$this->load->view('common/topmenu',$this->data);

			$this->data['footer_nav'] = $this->load->view('common/footerbar',$this->data,true);

			$this->load->view('subscription/billing',$this->data);

			$this->load->view('common/footer_inner',$this->data);

		}

	}

	

	/** 

	* Process Payment Function

	* 

	* @return void

	*/

	public function paymentprocess()

	{

		if (!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session

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

		if(!isset($_GET['trid'])) { redirect($this->config->base_url().'Subscriptions/Cart/?process=payment&tran=1&status=Failed'); } // Handling Session

		//$this->data['portalurl'] = $this->input->get('company');

		$this->data['trid'] = $this->encryption->decrypt(base64_decode($this->input->get('trid')));

		$trdata = array(

				'trans_payment_reference'=>$payment_reference,

			);

		

		$updtrans = $this->subscriptionmodel->updt_trans($this->data['trid'], $trdata);

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

		

		if($output['response_code']==100) {

			$trdata = array(

				'trans_result'=>$output['result'],

				'trans_pt_invoice_id'=>$output['pt_invoice_id'],

				'trans_pay_respcode'=>$output['response_code'],

				'trans_transaction_id'=>$output['transaction_id'],

				'trans_status'=>1,

			);

		

			$updtrans = $this->subscriptionmodel->updt_trans($this->data['trid'], $trdata);

			$this->data["cartdata"] = $this->subscriptionmodel->get_tempdata($this->data['sessionid'],'P');

			$nojobs = 0;

			$nocvs = 0;

			$period_valid = 0;

			foreach($this->data["cartdata"] as $cartrow) {

				$insOrder = $this->subscriptionmodel->ins_order($this->data['trid'], $cartrow->pr_name, $cartrow->temp_amt);

				$nojobs = $nojobs + $cartrow->temp_nojobs;

				$nocvs = $nocvs + $cartrow->temp_nocvs;

				$period_valid = $period_valid + (($cartrow->pr_type == 1)?30:365);

			}

			

			$updtdata = $this->subscriptionmodel->updt_tempdata($this->data['sessionid'],'P','C');

			$updtdata = $this->subscriptionmodel->updt_subscription($nojobs,$nocvs,$period_valid);

		} else {

			$trdata = array(

				'trans_result'=>$output['result'],

				'trans_pt_invoice_id'=>$output['pt_invoice_id'],

				'trans_pay_respcode'=>$output['response_code'],

				'trans_transaction_id'=>$output['transaction_id'],

				'trans_status'=>0,

			);

		

			$updtrans = $this->subscriptionmodel->updt_trans($this->data['trid'], $trdata);

			$updtdata = $this->subscriptionmodel->updt_tempdata($this->data['sessionid'],'P','F');

		}

		redirect($this->config->base_url().'Subscriptions/TransDetails/?Process=Complete&trans='.base64_encode($this->encryption->encrypt($this->data['trid'])));

	}

	

	/** 

	* Order result Function

	* 

	* @return void

	*/

	public function orderresult()

	{

		if(!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session

		$this->data['message'] = '';

		

		if(!isset($_GET['trans'])) { redirect($this->config->base_url().'Subscriptions/Cart/?process=payment&tran=1&status=Failed'); } // Handling Session

		//$this->data['portalurl'] = $this->input->get('company');

		$this->data['trid'] = $this->encryption->decrypt(base64_decode($this->input->get('trans')));

		$this->data["transaction"] = $this->subscriptionmodel->get_transdetails($this->data['trid']);

		

		if(empty($this->data["transaction"])) { redirect($this->config->base_url().'Subscriptions/Cart/?process=payment&tran=1&status=Failed'); }

		

		$this->data['mid'] 		= 2;

		$this->data['sid'] 		= 3;

		$this->data['title'] 	= 'Cherry Hire App - Transaction Details';

		$this->data['pagehead'] = 'Transaction Details';

		

		//$this->data["orderdata"] = $this->subscriptionmodel->get_orderdata($this->data['sessionid']);

		$this->load->view('common/header_inner',$this->data);

		$this->load->view('common/leftmenu',$this->data);

		$this->load->view('common/topmenu',$this->data);

		$this->data['footer_nav'] = $this->load->view('common/footerbar',$this->data,true);

		$this->load->view('subscription/result',$this->data);

		$this->load->view('common/footer_inner',$this->data);

	}

	

	/** 

	* Transaction history Function

	* 

	* @return void

	*/

	public function translist()

	{

		if(!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session

		$this->data['message'] 		= '';

		$this->data["transdata"]	= $this->subscriptionmodel->get_billdetails_all();

		$this->data['mid'] 			= 2;

		$this->data['sid'] 			= 4;

		$this->data['title'] 		= 'Cherry Hire App - Billing History';

		$this->data['pagehead'] 	= 'Billing History';

		

		$this->load->view('common/header_inner',$this->data);

		$this->load->view('common/leftmenu',$this->data);

		$this->load->view('common/topmenu',$this->data);

		$this->data['footer_nav'] = $this->load->view('common/footerbar',$this->data,true);

		$this->load->view('subscription/bhistory',$this->data);

		$this->load->view('common/footer_inner',$this->data);

	}



	/*

	* Text validation function

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

	

	/*

	* External redirection function

	* @param string $url

	* @return void

	*/

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

	

	/*

	* Clear cache function

	* @return void

	*/

	function clear_cache()

    {

        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");

        $this->output->set_header("Pragma: no-cache");

    }

	

	/*

	* Format order id function

	* @param int $orderId

	* @return string

	*/

	public function formated_ordid($ordId=NULL)

	{

		$outputJobId = $ordId;

		// format the job id

		if ($outputJobId<100000) {

			$outputJobId = "0" . $outputJobId;

			if ($outputJobId<10000) {

				$outputJobId = "0" . $outputJobId;

				if ($outputJobId<1000) {

					$outputJobId = "0" . $outputJobId;

					if ($outputJobId<100) {

						$outputJobId = "0" . $outputJobId;

						if ($outputJobId<10) {

							$outputJobId = "0" . $outputJobId;

						}// end if

					}// end if

				}// end if

			}// end if

		}// end if

		$outputJobId = "CH-" . $outputJobId;

		return $outputJobId;

	}


/**
 * [completePayment credimax payment suceess]
 * @return [type] [description]
 */
public function completePayment()
{
	$subid = $this->input->get('scrid');
	
	if($this->subscriptionmodel->newSubscription($subid))
	{
		$psd = array('temp_status' => 'C');
		$this->subscriptionmodel->paymentStatus($this->session->userdata('hireid'),$psd);
		$result =  $this->sendPayentsuccess($subid);
	}	
	
	$this->data['message'] 	= '<div style="margin-bottom: 0px;" class="alert alert-success">
			 <button data-dismiss="alert" class="close" type="button">&times;</button>Payment Success</div> ';
	$this->session->set_flashdata('message', '<div style="margin-bottom: 0px;" class="alert alert-success">
			 <button data-dismiss="alert" class="close" type="button">&times;</button>Payment Success</div>');
	redirect('Subscriptions');
}




function sendPayentsuccess($subid)
{
	
	$umid = $this->session->userdata('hireid');
	$candata = $this->subscriptionmodel->getmuser($umid);
	$datats = $this->subscriptionmodel->subdetails($subid);
	
	$from = 'do-not-reply@cherryhire.com';
	$to   = $candata['emp_email'];
	$subject 	= 'Payment Success';
	$message    = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> <html><head><title>Candidate_Register</title><meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style> #t11,#t11 th,#t11 td {border: 1px solid black; border-collapse: collapse; } #t11 th, #t11 td {padding: 15px; text-align: left; } table#t01 {width: 100%; background-color: #f1f1c1; } </style></head> <body bgcolor="#FFFFFF" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0"> <table id="Table_01" width="642" height="933" border="0" cellpadding="0" cellspacing="0" align="center" style="background:#FFF; font-size:14px; font-family:Arial, Helvetica, sans-serif;"> <tr> <td colspan="9" style="width:642px; height:30px;"> </td> </tr> <tr> <td rowspan="13" style="width:28px; height:903px; border-top:1px solid #CCC; border-left:1px solid #CCC; border-bottom:1px solid #CCC;"> </td> <td colspan="7" style="width:585px; height:103px; border-top:1px solid #CCC;"> <a href="http://www.cherryhire.com" target="_blank"><img src="http://staging.cherryhire.com/site/images/logo.png" alt=""></a> </td> <td rowspan="13" style="width:29px; height:903px; border-top:1px solid #CCC; border-right:1px solid #CCC; border-bottom:1px solid #CCC;"> </td> </tr> <tr> <td colspan="7" style="background:#AD1E24; width:585px; height:111px; vertical-align:middle; color:#FFF; padding:10px 0px 0px 30px; font-size:28px; font-weight:bold;"> Payment Detail </td> </tr> <tr> <td style="width:10px; height:10px; line-height:0px;" valign="top"> <img src="'.base_url().'emailtemplate/Candidate_Register_06.png" alt=""> </td> <td colspan="5" style="background:#F0EFEC; width:564px; height:10px; line-height:0px;"> </td> <td style="width:11px; height:10px; line-height:0px;" valign="top"> <img src="'.base_url().'emailtemplate/Candidate_Register_08.png" alt=""> </td> </tr> <tr> <td rowspan="9" style="background:#FFF; width:10px; height:643px;"> </td> <td style="background:#F0EFEC; width:36px; height:122px;"> </td> <td colspan="3" style="background:#F0EFEC; width:488px; height:122px; line-height:30px;padding:0px 0px 0px 10px;"> <p>Hi '.$candata["emp_fname"].',</p> <p>Greetings from <a href="www.cherryhire.com"> www.cherryhire.com</a> <br> Thank you for the payment for your Psychometric Test... <br> We acknowledge receipt of the same and confirm that the Test link will be forwarded to you within 2 working days. The test result will be emailed to you within 24 hours of completion of the test. Wishing you the very best in your career </p> </td> <td style="background:#F0EFEC; width:40px; height:122px;"> </td> <td rowspan="9" style="background:#FFF; width:11px; height:643px;"> </td> </tr> <tr> <td rowspan="4" style="background:#F0EFEC; width:36px; height:128px;"> </td> <td colspan="3" style="background:#FFF; width:488px; height:36px; padding:0px 0px 0px 16px; font-weight:bold; line-height:30px;"> <p>Payment Details</p> <td rowspan="4" style="background:#F0EFEC; width:36px; height:128px;"> </td> </tr> <tr> <td style="background:#FFF; width:55px; height:40px;"> <img src="'.base_url().'emailtemplate/Candidate_Register_17.png" alt=""> </td> <td style=" width:100% "> <table style="width:96%;padding-left:2%;padding-right:2%;background:#FFF;" id="t11"> 
								<tr> 
									<th>Item</th> 
									<th>Reference id</th> 
									<th>Currency</th> 
									<th>Payment Amount</th> 
								</tr>
												  <tr>
												  	<td>Subscription Package</td>
												  	<td>'.$datats['temp_encrypt_id'].'</td>
												  	<td>USD</td>
												  	<td>'.$datats['temp_amt'].'</td>
												  </tr>
		</table> <br> </td> <td rowspan="2" style="background:#FFF; width:212px; height:82px;"> </td> </tr> <tr> <td colspan="3" style="background:#FFF; width:488px; height:10px;"> </td> </tr> <tr> <td style="background:#F0EFEC; width:36px; height:151px;"> </td> <td colspan="3" style="background:#F0EFEC; width:488px; height:151px; padding:0px 0px 0px 10px; line-height:30px;"> <p style="font-weight:bold;">To get noticed, we recommended you do the following:</p> <p> &bull; Update your profile regularly <br > &bull; Search and Apply to Jobs <br > &bull; Set Profile Privacy Settings </p> </td> <td style="background:#F0EFEC; width:40px; height:151px;"> </td> </tr> <tr> <td style="background:#F0EFEC; width:36px; height:82px;"> </td> <td colspan="3" style="background:#F0EFEC; width:488px; height:82px; padding:0px 0px 0px 10px; line-height:30px;"> For any queries send us an email at jobassist@cherryhire.com <br > Good Luck in your journey to find a great job! </td> <td style="background:#F0EFEC; width:40px; height:82px;"> </td> </tr> <tr> <td style="background:#F0EFEC; width:36px; height:104px;"> </td> <td colspan="3" style="background:#F0EFEC; width:488px; height:104px; padding:0px 0px 0px 10px; line-height:21px; font-size:12px;"> Best regards.<br> Cherryhire Team. </td> <td style="background:#F0EFEC; width:40px; height:104px;"> </td> </tr> <tr> <td style="background:#F0EFEC; width:36px; height:56px;"> </td> <td colspan="3" style="background:#F0EFEC; width:488px; height:56px; padding:0px 180px 0px 180px;"> <a href="https://www.facebook.com/cherryhire" target="_blank"><img src="'.base_url().'emailtemplate/sicon1.png" alt=""></a> <a href="https://twitter.com/cherry_hire" target="_blank"><img src="'.base_url().'emailtemplate/sicon2.png" alt=""></a> <a href="https://www.linkedin.com/company/cherry-hire" target="_blank"><img src="'.base_url().'emailtemplate/sicon3.png" alt=""></a> <a href="https://www.instagram.com/cherryhire/" target="_blank"><img src="'.base_url().'emailtemplate/sicon4.png" alt=""></a> </td> <td style="background:#F0EFEC; width:40px; height:56px;"> </td> </tr> <tr> <td colspan="7"  style="width:585px; height:36px; border-bottom:1px solid #CCC;"> </td> </tr> </table></body></html>';
			$config = Array(
                   'protocol' => 'mail',
                   'smtp_host' => 'mail.cherryhire.com',
                   'smtp_port' => 587,
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
         $this->email->cc('jitinajithk@gmail.com');
         $this->email->subject('Payment success'); 
         $this->email->message($message);

		if ($this->email->send()) {
			return 1;

		} else {
			return 0;
		}
}

function wiretransfe()
{
	if(!$this->session->userdata('hireid')) { redirect($this->config->base_url().'login'); } // Handling Session
	$this->data['title'] 	= 'Cherry Hire App - Subscriptions';
	$this->data['pagehead'] = 'Subscriptions';
	$this->data['message'] = '';
	$this->sent();
	$this->load->view('new/wiretransfe', $this->data);
	
}

function sent()
{
	$id = $this->session->userdata('hireid');
	$candata = $this->subscriptionmodel->getmuser($id);
	
	$from = 'do-not-reply@cherryhire.com';
	$to   = $candata['emp_email'];
	$subject 	= 'Wire Transfer Account Details';
	$message    = '
	<!DOCTYPE html> <html lang="en"> <head> <meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1.0"> <meta http-equiv="X-UA-Compatible" content="ie=edge"> <title>Document</title> </head> <body>
	<p>Thank you for selecting the job posting plan.<br> Please refer to your cart for the total amount due.<br> Request you to wire transfer the due amount to our bank account as per details shown. Your plan will be immediately activated on receipt of payment. </p>
	<br>
	<table class="m_3906602186747293702MsoNormalTable" border="0" cellspacing="0" cellpadding="0" width="0" style="width:470.0pt;border-collapse:collapse"><tbody><tr style="height:18.0pt"><td width="627" nowrap="" colspan="2" valign="bottom" style="width:470.0pt;border:solid #538ed5 1.5pt;border-bottom:solid #538ed5 1.0pt;background:#538ed5;padding:0cm 5.4pt 0cm 5.4pt;height:18.0pt"><p class="MsoNormal" align="center" style="text-align:center"><b><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:white">Bank Account Details-&nbsp;IPF consulting Bank details&nbsp;</span></b><u></u><u></u></p></td></tr><tr style="height:16.5pt"><td width="155" nowrap="" valign="bottom" style="width:116.6pt;border-top:none;border-left:solid #538ed5 1.5pt;border-bottom:solid #538ed5 1.0pt;border-right:solid #538ed5 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt;background-size:initial"><p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:red">Beneficiary Name</span><u></u><u></u></p></td><td width="471" nowrap="" valign="bottom" style="width:353.4pt;border-top:none;border-left:none;border-bottom:solid #538ed5 1.0pt;border-right:solid #538ed5 1.5pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt;background-size:initial"><p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:red">IPF CONSULTING W.L.L</span><u></u><u></u></p></td></tr><tr style="height:16.5pt"><td width="155" nowrap="" valign="bottom" style="width:116.6pt;border-top:none;border-left:solid #538ed5 1.5pt;border-bottom:solid #538ed5 1.0pt;border-right:solid #538ed5 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt;background-size:initial"><p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:red">Office Address</span><u></u><u></u></p></td><td width="471" nowrap="" valign="bottom" style="width:353.4pt;border-top:none;border-left:none;border-bottom:solid #538ed5 1.0pt;border-right:solid #538ed5 1.5pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt;background-size:initial"><p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:red">PO Box No 60705,,AL Seef ,Kingdom of Bahrain</span><u></u><u></u></p></td></tr><tr style="height:16.5pt"><td width="155" nowrap="" valign="bottom" style="width:116.6pt;border-top:none;border-left:solid #538ed5 1.5pt;border-bottom:solid #538ed5 1.0pt;border-right:solid #538ed5 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt;background-size:initial"><p class="MsoNormal" style="text-align:justify"><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:red">Bank Name</span><u></u><u></u></p></td><td width="471" nowrap="" valign="bottom" style="width:353.4pt;border-top:none;border-left:none;border-bottom:solid #538ed5 1.0pt;border-right:solid #538ed5 1.5pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt;background-size:initial"><p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:red">State Bank of India, Bahrain</span><u></u><u></u></p></td></tr><tr style="height:16.5pt"><td width="155" nowrap="" rowspan="2" style="width:116.6pt;border-top:none;border-left:solid #538ed5 1.5pt;border-bottom:solid #538ed5 1.0pt;border-right:solid #538ed5 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt;background-size:initial"><p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:red">Bank Address</span><u></u><u></u></p></td><td width="471" nowrap="" valign="bottom" style="width:353.4pt;border-top:none;border-left:none;border-bottom:solid #538ed5 1.0pt;border-right:solid #538ed5 1.5pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt;background-size:initial"><p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:red">Office No 707, Building No 705 (Diplomat City Tower)</span><u></u><u></u></p></td></tr><tr style="height:16.5pt"><td width="471" nowrap="" valign="bottom" style="width:353.4pt;border-top:none;border-left:none;border-bottom:solid #538ed5 1.0pt;border-right:solid #538ed5 1.5pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt;background-size:initial"><p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:red">Diplomat Area, Manama, PO Box No 10763</span><u></u><u></u></p></td></tr><tr style="height:16.5pt"><td width="155" nowrap="" valign="bottom" style="width:116.6pt;border-top:none;border-left:solid #538ed5 1.5pt;border-bottom:solid #538ed5 1.0pt;border-right:solid #538ed5 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt;background-size:initial"><p class="MsoNormal" style="text-align:justify"><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:red">Account No</span><u></u><u></u></p></td><td width="471" nowrap="" valign="bottom" style="width:353.4pt;border-top:none;border-left:none;border-bottom:solid #538ed5 1.0pt;border-right:solid #538ed5 1.5pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt;background-size:initial"><p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:red">02700683020001</span><u></u><u></u></p></td></tr><tr style="height:16.5pt"><td width="155" nowrap="" valign="bottom" style="width:116.6pt;border-top:none;border-left:solid #538ed5 1.5pt;border-bottom:solid #538ed5 1.0pt;border-right:solid #538ed5 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt;background-size:initial"><p class="MsoNormal" style="text-align:justify"><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:red">Swift Code</span><u></u><u></u></p></td><td width="471" nowrap="" valign="bottom" style="width:353.4pt;border-top:none;border-left:none;border-bottom:solid #538ed5 1.0pt;border-right:solid #538ed5 1.5pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt;background-size:initial"><p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:red">SBINBHBMFCB</span><u></u><u></u></p></td></tr><tr style="height:16.5pt"><td width="155" nowrap="" valign="bottom" style="width:116.6pt;border-top:none;border-left:solid #538ed5 1.5pt;border-bottom:solid #538ed5 1.0pt;border-right:solid #538ed5 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt;background-size:initial"><p class="MsoNormal" style="text-align:justify"><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:red">IBAN No</span><u></u><u></u></p></td><td width="471" nowrap="" valign="bottom" style="width:353.4pt;border-top:none;border-left:none;border-bottom:solid #538ed5 1.0pt;border-right:solid #538ed5 1.5pt;padding:0cm 5.4pt 0cm 5.4pt;height:16.5pt;background-size:initial"><p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:red">BH13SBIN02700683020001</span><u></u><u></u></p></td></tr><tr style="height:17.25pt"><td width="155" nowrap="" valign="bottom" style="width:116.6pt;border-top:none;border-left:solid #538ed5 1.5pt;border-bottom:solid #538ed5 1.5pt;border-right:solid #538ed5 1.0pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.25pt;background-size:initial"><p class="MsoNormal" style="text-align:justify"><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:red">Currency</span><u></u><u></u></p></td><td width="471" nowrap="" valign="bottom" style="width:353.4pt;border-top:none;border-left:none;border-bottom:solid #538ed5 1.5pt;border-right:solid #538ed5 1.5pt;padding:0cm 5.4pt 0cm 5.4pt;height:17.25pt;background-size:initial"><p class="MsoNormal"><span style="font-size:11.0pt;font-family:&quot;Palatino Linotype&quot;,serif;color:red">Bahraini Dinar (BHD)</span><u></u><u></u></p></td></tr></tbody></table>
	<br>
	<p>Best regards.<br>
	Cherryhire</p>

	</body> </html>	';

					$config = Array(
                   'protocol' => 'mail',
                   'smtp_host' => 'mail.cherryhire.com',
                   'smtp_port' => 587,
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
        //  $this->email->cc('jitinajithk@gmail.com');
         $this->email->subject($subject); 
         $this->email->message($message);

		if ($this->email->send()) {
			return 1;

		} else {
			return 0;
		}
	
	
}





}