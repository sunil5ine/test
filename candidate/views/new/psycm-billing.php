<?php header('Access-Control-Allow-Origin: *'); header('Cache-Control: max-age=900');?>

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
			<?php echo $message; ?>
			<h5 class="black-text h6">
				<a href="<?php echo base_url() ?>psychotest/reviewcart">
					<i class="material-icons font25" style="position: relative; top: 6px;"> keyboard_backspace</i>
					Billing Details
				</a>
			</h5>
			<form class="" action="<?php echo base_url('psychotest/buy'); ?>" method="post">
			<div class="card row ">
				<div class="card-content" style="overflow: hidden;">
					<div class="col s12 m12 l4 border-right">
						
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
						        <label for="last_name">Country</label>
						        <?php echo form_dropdown('bcountry',$country_list,$formdata['bcountry'],'id="bcountry" class=" form-control browser-default has-feedback-left"  required');?>
						    </div>

						    <div class=" col s12 m0">
						        <label for="last_name">Postal Code</label>
						        <input id="last_name" type="text" class="validate" id="bpcode" name="bpcode" placeholder="Postal Code" required  value="<?php echo $formdata['bpcode']; ?>">
						    </div>
						
					</div>

					<div class="col s12 m12 l8 lpl25">
						<p class="h6">Cart Details</p>
						<table class="highlight">
							<thead class="grey  lighten-2">
								<tr>
									<td class="bold black-text">Product</td>
									<td class="right-align bold black-text">Amount</td>
								</tr>
							</thead>
							<tbody>
								
                                                  <?php $sumamt = 0; if(!empty($cartdata)) { $x=0; foreach ($cartdata as $result) { $x++; ?>
													<?php
                                                        if($x%2 == 0)
                                                        {
                                                            $tdcls = 'even pointer';
                                                        }
                                                        else
                                                        {
                                                            $tdcls = 'odd pointer';
                                                        }
                                                        $sumamt = $sumamt + $result->psyr_amount;
                                                        
                                                    ?>
                                                  <tr class="even pointer">
                                                    <td><?php echo $result->psyr_name;?></td>
                                                    <td class="right-align">$ <?php echo $result->psyr_amount;?></td>
                                                  </tr>                                                  
                                                  <?php $name = $result->psyr_name; } }  ?>
                                                  <tr>
                                                    <td class="right-align" > <b>Total Amount</b></td>
                                                    <td class=" right-align">$ <b><?php echo number_format($sumamt,2);?></b></td>
                                                  </tr>
                                            <input name="totamt" type="hidden" value="<?php echo $sumamt;?>" />
                                            <input type="hidden" name="count" value="<?php echo count($cartdata) ?>">
                                        	<input name="canid" type="hidden" value="<?php echo base64_encode($this->encryption->encrypt($this->session->userdata('cand_chid'))); ?>" />
                                                  
							</tbody>
						</table>
						<br>
						<div>
							<div id="paypal-button" class="right"><button  type="submit" class="btn-flat"><img src="<?php echo base_url()?>images/bye.png" style="max-width: 100%;width: 150px"></button></div>
							<a type="button" class="btn brand white-text hoverable waves-effect waves-lighten mr10 " value="Pay with Lightbox" style="margin-top: 8px" onclick="Checkout.showPaymentPage();" >Proceed to checkout</a>
						</div>
							
					</div>
				</div>
			</div>
			</form>
		</div>
	</section>

	<!-- footer -->
	<?php echo include'include/footer.php' ?>
<?php
	$pid = $cartdata[0]->psyr_id;
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
							        "returnUrl":"'.base_url().'psychotest/completePayment?scrid='.$pid.'&count='.$count.'"
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
	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/script.js"></script>
	<script src="https://credimax.gateway.mastercard.com/checkout/version/49/checkout.js" 
				data-error="errorCallback" 
				data-cancel="<?php echo base_url() ?>psychotest/Cart?process=payment&status=cancled">
	</script>

	
	<script type="text/javascript"> 
		var x = Math.floor((Math.random() * 100000) + 1000); 
		var n = x.toString();
		function errorCallback(error) { 
		console.log(JSON.stringify(error));
		}
		var text = Checkout.configure({ 
		merchant: 'E13763950', 
		order: { 
			amount: function() { 
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