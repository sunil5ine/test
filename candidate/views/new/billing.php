<?php header('Access-Control-Allow-Origin: *'); ?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php'  ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo $this->config->item('web_url');?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/style.css">
	<style type="text/css">
		form input{
			height: 38px !important;
			border-radius: 1px !important;
			margin-top: 3px !important;
		}
		form label{font-size: 13px}
		@media (min-width: 993px){
			.lpl25{padding-left: 25px !important}
		}
	</style>
</head>
<body>
	<!-- header -->
	<?php include 'include/header.php'  ?>

	<section>
		<div class="container-wrap">
			<h5 class="black-text h6">
				<a href="<?php echo base_url() ?>Subscriptions/Cart">
					<i class="material-icons font25" style="position: relative; top: 6px;"> keyboard_backspace</i>
					Billing Details
				</a>
				
			</h5>
			<div class="card row ">
				<div class="card-content" style="overflow: hidden;">
					<div class="col s12 m12 l4 border-right">
						<form class="" action="<?php echo base_url(); ?>Subscriptions/PlaceOrder" method="post">
							<p class="font15 bold col s12 mb10">Billing Address</p>
							<div class=" col s12 m0">
						        <label for="last_name">Address</label>
						        <input id="last_name" type="text" class="validate" id="baddress" name="baddress" placeholder="Address" required  value="<?php echo $formdata['baddress']; ?>">
						    </div>

						    <div class=" col s12 m0">
						        <label for="last_name">City / Town</label>
						        <input id="last_name" type="text" class="validate" id="bcity" name="bcity" placeholder="City/Town" value="<?php echo $formdata['bcity']; ?>">
						    </div>

						    <div class=" col s12 m0">
						        <label for="last_name">State</label>
						        <input id="last_name" type="text" id="bstate" name="bstate" placeholder="State" required  value="<?php echo $formdata['bstate']; ?>">
						    </div>

						    <div class=" col s12 m0">
						        <label for="last_name">Postal Code</label>
						        <input id="last_name" type="text" class="validate" id="bpcode" name="bpcode" placeholder="Postal Code" required  value="<?php echo $formdata['bpcode']; ?>">
						    </div>
						</form>
					</div>

					<div class="col s12 m12 l8 lpl25">
						<p class="h6">Cart Details</p>
						<table class="highlight">
							<thead class="grey  lighten-2">
								<tr>
									<td class="bold black-text">Sl No</td>
									<td class="bold black-text">Plan </td>
									<td class="bold black-text">Validity period</td>
									<td class="bold black-text">No of jobs</td>
									<td class="right-align bold black-text">Amount</td>
								</tr>
							</thead>
							<tbody>
								<?php 
									$sumamt = 0; 
									if(!empty($cartdata)) { 
										$x=0; 
										foreach ($cartdata as $result) { 
											$x++; 
											if($x%2 == 0) {
												$tdcls = 'even pointer'; 
											} 
											else {
												$tdcls = 'odd pointer'; 
											} 
											$sumamt = $sumamt + $result->temp_amt; 
											?> 
											<tr> 
												<td>
													<?php echo $x;?>
												</td>
												<td><?php echo $result->pr_name ?></td> 
												<td><?php echo $result->pr_limit ?> Months</td> 
												<td><?php echo $result->pr_nojob;?> Jobs</td> 
												<td class="right-align"> 
													<i class="fa fa-usd "></i> <?php echo $result->temp_amt;?>
												</td> 
											</tr> 
								<?php  } }  ?>


									<div class="divider" style="margin: 15px 0"></div>
								<tr style="border: transparent;">
									<td colspan="5" class="right-align"> Total&nbsp;&nbsp;&nbsp;&nbsp; $ <span class="font20 bold"><?php echo number_format($sumamt,2);?></span></td>
								</tr>

								<input name="totamt" type="hidden" value="<?php echo $sumamt;?>" />
								<input name="empid" type="hidden" value="<?php echo base64_encode($this->encryption->encrypt($this->session->userdata('hireid')));?>" />
							</tbody>
						</table>
						<div>
							<div id="paypal-button" class="right"><a class="btn hoverable" href="<?php echo base_url('Subscription/buy');?>"><img src="<?php echo base_url()?>images/bye.png" style="max-width: 100%;width: 150px"></a></div>

							<a type="button" class="btn brand white-text hoverable waves-effect waves-lighten mr10 " value="Pay with Lightbox" style="margin-top: 8px" onclick="Checkout.showPaymentPage();" >Proceed to checkout</a>
       
						</div>
							
					</div>
				</div>
			</div>
		</div>
	</section>
<?php
	$pid = $cartdata[0]->temp_encrypt_id;
	$count =  count($cartdata);
	$curl = curl_init();
	$username ="merchant.E13763950";
	$password ="0c0261d7af402d8abd7f9aa850f98295";
	curl_setopt_array($curl, array(
	  CURLOPT_URL => "https://credimax.gateway.mastercard.com/api/rest/version/49/merchant/E13763950/session",
	  CURLOPT_RETURNTRANSFER => true,
	  CURLOPT_ENCODING => "",
	  CURLOPT_MAXREDIRS => 10,
	  CURLOPT_TIMEOUT => 30,
	  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	  CURLOPT_USERPWD=> $username . ":" . $password,
	  CURLOPT_CUSTOMREQUEST => "POST",
	  CURLOPT_POSTFIELDS => '{
							    "apiOperation":"CREATE_CHECKOUT_SESSION",
							    "order":{
							    	"currency":"BHD",
							    	"id":"'.$pid.'",
							    	"amount":"'.$sumamt * 0.38.'"
							    },
							    "interaction":{
							        "returnUrl":"'.base_url().'Subscription/CompletePayment?scrid='.$pid.'&count='.$count.'"
							    }
							}',
	  CURLOPT_HTTPHEADER => array(
	    "cache-control: no-cache",
	     "Content-Type: application/json",
	  ),
	));

	$response = curl_exec($curl);
	$err = curl_error($curl);

	curl_close($curl);

	if ($err) {
	   "cURL Error #:" . $err;
	} else {
		
	 $session =  json_decode($response)->session->id;
	}

?>

	<!-- footer -->
	<?php echo include'include/footer.php' ?>

	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/script.js"></script>
	<!-- 0c0261d7af402d8abd7f9aa850f98295 -->
	<script src="https://credimax.gateway.mastercard.com/checkout/version/49/checkout.js" 
				data-error="errorCallback" 
				data-cancel="<?php echo base_url() ?>Subscriptions/Cart?process=payment&status=cancled">
	</script>
	<!-- <script type="text/javascript"> 
	function myFunction() { 
		var x = Math.floor((Math.random() * 100000) + 1000); 
		var n = x.toString(); 
		var document.getElementById("demo").innerHTML = x;
	} 

</script>  -->
		
	<script type="text/javascript"> 
		var x = Math.floor((Math.random() * 100000) + 1000); 
		var n = x.toString(); 


		function errorCallback(error) { 
		console.log(JSON.stringify(error)); 

		} 
		 
		function after(data) {
			// body...
			confirm('complete?'); 
		}
		cancelCallback = "http://www.bbc.com/"; 
		
		var text = Checkout.configure({ 
		merchant: 'E13763950', 
		order: { 
			amount: function() { 
			//Dynamic calculation of amount 
				return '<?php echo $sumamt * 0.38 ;?>';
			}, 
			currency: 'BHD', 
			description: 'Ordered goods', 
			id: JSON.stringify(n) 
		}, 
		interaction: {
            merchant: {
                name: 'Cherryhire Payment Gateway',
                address: {
                    line1: '200 Sample St',
                    line2: '1234 Example Town'
                }               
            } 
        },
		session: {
		 	id: "<?php echo $session ?>"
		}
		}); 

		

	</script> 

</body>
</html>