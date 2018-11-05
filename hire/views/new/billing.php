<?php header('Access-Control-Allow-Origin: *'); ?>

<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php' ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width" />
  	<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo $this->config->item('web_url')?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/style.css">
	<style type="text/css">
		input, select{margin-top: 3px !important;margin-bottom: 15px !important;}
		label{font-size: 13px}
	</style>
</head>
<body>
	<?php include 'include/header.php' ?>
	<section> 
		<div class="container-wrap"> 
			<?php echo $message; ?>
			<h5 class="black-text h6 mb10"> 
				<a href="<?php echo base_url() ?>Subscriptions/Cart"> 
					<i class="material-icons font25" style="position: relative; top: 6px;"> keyboard_backspace</i> 
					Cart Details 
				</a> 
			</h5> 
			<form class="form-horizontal form-label-left input_mask" action="<?php echo base_url(); ?>Subscriptions/PlaceOrder" method="post">
			<div class="card row "> 
				<div class="card-content" style="overflow: hidden;"> 
					<div class="col s12 m12 l4 border-right"> 
						
							<p class="font15 bold col s12 mb10">Billing Address</p> 
							<div class=" col s12 m0"> 
								<label for="last_name" class="active">Address</label> 
								<input type="text" class="form-control has-feedback-left" id="baddress" name="baddress" placeholder="Address" required  value="<?php echo $formdata['baddress']; ?>">
							</div> 
							<div class=" col s12 m0">
							<label for="last_name" class="active">City / Town</label> 
							 <input type="text" class="form-control has-feedback-left" id="bcity" name="bcity" placeholder="City/Town" value="<?php echo $formdata['bcity']; ?>" >
						</div> 
						<div class=" col s12 m0"> 
							<label for="last_name" class="active">State</label> 
							<input type="text" class="form-control has-feedback-left" id="bstate" name="bstate" placeholder="State" required  value="<?php echo $formdata['bstate']; ?>">
						</div> 
						<div class=" col s12 m0"> 
							<label for="last_name" class="active">Postal Code</label> 
							 <input type="text" class="form-control  has-feedback-left" id="bpcode" name="bpcode" placeholder="Postal Code" required  value="<?php echo $formdata['bpcode']; ?>"> 
						</div> 
						<div class=" col s12 m0">
							<label for="last_name" class="active">Select counrty</label>
							<?php echo form_dropdown('bcountry',$country_list,$formdata['bcountry'],'id="bcountry" class=" form-control has-feedback-left" tabindex="1" required');?>
						</div>
					 
				</div> 
				<div class="col s12 m12 l8 lpl25"> 
					<p class="h6">Cart Details</p> 
					<br>
					<table class=" striped"> 
						<thead class="grey  lighten-2"> 
							<tr> 
								<td class="bold black-text">Product</td> 
								<td class="right-align bold black-text">Amount</td> 
							</tr> 
						</thead> 
						<tbody> 
						<?php $sumamt = 0; if(!empty($cartdata)) { $x=0; foreach ($cartdata as $result) { $x++;  $sumamt = $sumamt +($result->temp_amt * $result->temp_items); ?>
							<tr class="even pointer"> 
								<td><?php echo 'Plan : '.$result->pr_name.' - '.(($result->pr_type==1)?'Monthly':'Annual').' <br> No of Premium Jobs : '.$result->temp_nojobs;?></td> 
								<td class="right-align"><?php echo number_format($result->temp_amt * $result->temp_items,2);?></td> 
							</tr> 
							
						<?php  } }  ?>

							<tr> 
								<td class="right-align"> <b>Total Amount</b></td>
								<td class=" right-align">$ <b><?php echo number_format($sumamt,2);?></b></td> 
							</tr> 


							<input name="totamt" type="hidden" value="<?php echo $sumamt;?>" />
							<input name="empid" type="hidden" value="<?php echo base64_encode($this->encryption->encrypt($this->session->userdata('hireid')));?>" />
						</tbody> 
					</table> 
					<div> 
						<div id="paypal-button" class="right">
							<br>
							<!-- <a href="https://www.cherryhire.com/candidate/Psychotest/buy?name=Management Aptitude Test&amp;amt=20"> -->
								<a type="button" class="btn brand white-text hoverable waves-effect waves-lighten mr10 " value="Pay with Lightbox" style="margin-top: 8px" onclick="Checkout.showPaymentPage();" >Proceed to checkout</a>
								
							<button type="submit" class="btn-flat ">
								<img src="https://www.cherryhire.com/candidate/images/bye.png" style="max-width: 100%;width: 150px">
							</button>
							
							<br>
							
							<!-- </a> -->
						</div> 
					</div> 
				</div> 
			</div> 
		</div>
		</form> 
	</div> 
</section>

<div id="demo2"></div>

<?php
$pid = $cartdata[0]->temp_encrypt_id;
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
    "order":{"currency":"BHD",
    "id":"'.$pid.'",
    "amount":"'.$sumamt * 0.38.'"
    },
        "interaction":{
        "returnUrl":"'.base_url().'Subscription/completePayment?scrid='.$pid.'"
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
<?php include 'include/footer.php' ?>

<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/script.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
	    $('select').formSelect();
	});
	</script>
	<script src="https://credimax.gateway.mastercard.com/checkout/version/49/checkout.js" 
				data-error="errorCallback" 
				data-cancel="<?php echo base_url() ?>Subscriptions/Cart">
	</script> 
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