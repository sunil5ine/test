<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php'  ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width" />
  	<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<!-- navigation bar -->
<?php include 'include/header.php'  ?>

    <section class="con-section">
        <div class="row">
			<div class="container-wrap">
				<div class="col s12">
				<?php if(isset($status) && $status=='success') { echo $message; } if(isset($status) && $status=='fail') { echo $message; } ?>
				</div>
				<div class="card">
						<div class="contact wrap row">
							<div class="col s12 m6 p0">
								<div class="c-bg inner">
									<div class="title center">
										<h5 class="">Get in Touch</h5>
									</div>
									<div class="address">
										<div class="address-title-box">
											<span class="adress-icon">
												<i class="material-icons">location_on</i>
											</span >
											<h6 class="address-title">Contact Address</h6>
										</div>
							
										<div class="address-content">
											<ul>
												<li>IPF Consulting WLL</li>
												<li>PO Box 76056</li>
												<li>Email: <a href="mailto:support@cherryhire.com">support@cherryhire.com</a></li>
											</ul>
										</div>
									</div>
							
									<div class="address ptb30">
										<div class="address-title-box">
											<span class="adress-icon">
												<i class="material-icons">local_phone</i>
											</span >
											<h6 class="address-title">Let Talk</h6>
										</div>
							
										<div class="address-content">
											<ul>
												<li>+1 800 23456789</li>
											</ul>
										</div>
									</div>
							
									<div class="address ">
										<div class="address-title-box">
											<span class="adress-icon">
												<i class="material-icons">local_post_office</i>
											</span >
											<h6 class="address-title">General Support</h6>
										</div>
							
										<div class="address-content">
											<ul class="m0">
												<li><a href="mailto:support@cherryhire.com">support@cherryhire.com</a></li>
											</ul>
										</div>
									</div>

									<div class="s-box center ptb30">
										<h6 class="ptb10">Connect with social media</h6>
										<a class="mlr10 waves-effect z-depth-2 waves-light btn btn-large light-blue darken-2 rounded-6">
											<i class="fab fa-twitter"></i>
										</a>
										<a class="mlr10 waves-effect z-depth-2 waves-light btn btn-large light-blue darken-4 rounded-6">
											<i class="fab fa-facebook-f"></i>
										</a>
										<a class="mlr10 waves-effect z-depth-2 waves-light btn btn-large red rounded-6">
										<i class="fab fa-google-plus-g"></i>
										</a>
									</div>
								</div>
							</div>
								<!--  end contcat address -->
							<div class="col s12 m6 white" style="margin-top: -1px;">
								<div class="inner">
									<h5>Send Us A Message</h5>
									<form name="contactfrm" action="<?php echo $this->config->base_url();?>Contact" method="post" id="contactfrm" data-toggle="validator" role="form">
										<div class="row">
											<div class="form-group col s11 m11">
												<label for="cname" class="">Name</label>
												<input value="" name="cname" id="cname" type="text" class="validate " placeholder="Name" required="">
											</div>
											<div class="form-group col s11 m11">
												<label for="cemail" class="">Email Id</label>
												<input value="" name="cemail" id="cemail" type="email" class="validate " placeholder="Email Id" required="">
											</div>

											<div class="form-group col s11 m11">
												<label for="cphone" class="">Contact</label>
												<input value="" name="cphone" id="cphone" type="number" class="validate " placeholder="Contact No" required="">
											</div>
											<input autocomplete="off" class="form-control" type="hidden" name="captcha" id="captcha" value="<?php echo $number1 + $number2 ?>" required>
											<div class="form-group col s11 m11">
												<label for="cmsg" class="">Message</label>
												<textarea name="cmsg" id="cmsg" cols="" rows="2"></textarea>
											</div>
											<div class="form-group col s11 m11">
												<div class="g-recaptcha" data-sitekey="6LdV93gUAAAAAKQ_whRP-9gOq2CX1xO29FpMGQOX"></div>
												<span class="error red-text"></span>
											</div>
											<div class="form-group col s11 m11">
												<button class="waves-effect waves-light btn white-text  brand nav-btn">SEND MESSAGE</button>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					
				</div>
				
			</div>
        </div>
    </section>


<!-- footer -->
<?php echo include'include/footer.php' ?>
<!-- end footer -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/script.js"></script>
	<script>
	
	$(function(){

		$('form').on('submit', function(e) {

		if(grecaptcha.getResponse() == "") {

			e.preventDefault();

			$('.error').text('Captcha is required')

		} 

		});

		});
	</script>
</body>
</html>