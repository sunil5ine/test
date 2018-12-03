<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php'  ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width" />
  	<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo $this->config->item('web_url');?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/style.css">
</head>
<body>
	<!-- navigation bar -->
	<?php include 'include/header.php'  ?>
	
	<!-- End navigation bar -->


	<!-- login section -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col s12 l6 m10 push-m1 push-l3">
			      <div class="card z-depth-2">
			        <div class="card-content">
			          	<div class="center">
			          		<h5 class=""><b>Candidate Login</b></h5>
			          	</div>
			          	<div class="clearfix"> </div>
			          	<div><?php echo $errmsg; ?></div>
                        <div class="clearfix"> </div>
						<!-- <br>
			          	<div class="center otherlogin">
							<a class=" mlr10 waves-effect z-depth-2 waves-light btn btn-large light-blue darken-2 rounded-6">
								<i class="fab fa-twitter"></i>
							</a>
							<a class=" mlr10 waves-effect z-depth-2 waves-light btn btn-large light-blue darken-4 rounded-6">
								<i class="fab fa-facebook-f"></i>
							</a>
							<a class=" mlr10 waves-effect z-depth-2 waves-green  btn btn-large transparent black-text rounded-6">
								<img src="<?php echo $this->config->item('web_url');?>assets/img/google.png" class="responsive-img" style="max-height: 40px;margin-top: 5px; float: left; margin-right: 4px;">
								<span>Google</span>
							</a>
			          	</div> -->
			          	<br>
			          	<div class="emil-contect  row">
			          		<!-- <h6 class="center-align">OR USING EMAIL</h6> -->
			          		<form method="post" name="signinfrm" action="<?php echo base_url()?>LoginProcess/" data-toggle="validator" role="form">
			          			<div class=" col s12 m0">
						          	<label for="last_name">Email</label>
						          	<input id="last_name" type="email" class="validate" name="emailid" required="">
						        </div>
						        <div class=" col s12 m0 mb10">
						          	<label for="last_name">Password</label>
						          	<input id="last_name" type="password" class="validate" name="pwd"  required>
						        </div>
						        <div class="col s12 m6">
									<label>
								        <input type="checkbox" />
								        <span>Remember me</span>
								    </label>
						        </div>
						        <div class="col s12 m6">
									<a href="#forgot-password"  class="modal-trigger blue-text" >Forgot Password</a>
						        </div>
						        <div class="input-field col s12">
						        	<button class="waves-effect z-depth-2 waves-light btn white-text  brand login-btn block btn-md">Login</button>
						        </div>
			          		</form>
			          		<p class="center">New to Cherryhire? <a href="<?php echo $this->config->item('web_url').'PostCV';?>" class="blue-text">Create Account</a></p>
							  <div class="center"><span>or</span></div>
			          		<p class="center"><a href="<?php echo $this->config->item('web_url').'hire/login';?>" class="blue-text">Employer Login</a></p>
			          	</div>
			        </div>
			      </div>
			    </div>
		    </div>
		</div>
	</section>
	
<div id="forgot-password" class="modal">
    <div class="modal-content center row">
      <h5 class="bold">Forgot Password!</h5>
      	<form id="fpwdfrm" name="fpwdfrm" method="post" action="<?php echo $this->config->base_url();?>User/RecoverInitiate/" data-toggle="validator" role="form">
	      	<div class="input-field col l8 push-l2">
				<input autocomplete="off" type="email" class="validate borderd-0" placeholder="Enter your email address" style="border-radius: 0; height: 38px;" name="uemail" id="uemail">
			</div>
			<div class="clearfix"></div>
			<div class="input-field col l6 push-l3" style="margin-top: 0">
				<button type="submit" class="btn waves-effect brand hoverable white-text">Send Password rest link</button>
			</div>
			<div class="clearfix"></div>
			<a href="#!" class="blue-text modal-close">Back To Login</a>
		</form>
    </div>
  
  </div>

<!-- footer -->
		<?php echo include'include/footer.php' ?>




	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/script.js"></script>
</body>
</html>