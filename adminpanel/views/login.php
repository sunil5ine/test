<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $title; ?></title>
    <link href="<?php echo $this->config->item('web_url');?>assets/fonts/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>dist/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>dist/css/style.css">
</head>
<body>
    <br><br>
    	<!-- login section -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col s12 l6 m10 push-m1 push-l3">
					
			      <div class="card z-depth-2">
			        <div class="card-content">
			          	<div class="center">
                          <img src="<?php echo $this->config->item('web_url')?>/assets/img/logo.png" alt="" class="responsive-img circle"  width="75px">
			          		<h4 class="">Admin Login</h4>
			          	</div>
			          	<div class="emil-contect center row">  
			          		<form action="<?php echo $this->config->base_url();?>login" method="post">
			          			<div class="input-field col s12">
						          	<input id="email" type="email" class="validate" name="username">
						          	<label for="email">Email</label>
						        </div>
						        <div class="input-field col s12">
						          	<input name="password" id="password" type="password" class="validate">
						          	<label  for="password">Password</label>
								</div>
								<div class="col s12 center">
									<span class="red-text"><?php echo $this->session->flashdata('check_database');
									 ?></span>
								</div>
						        <div class="input-field col s12">
						        	<button class="waves-effect z-depth-2 waves-light btn white-text  green darken-4 login-btn block btn-md">Login</button>
                                </div>
                                <div class="col s12 center">
                                    <a href="#forgot-password"  class="modal-trigger blue-text " >Forgot Password</a>
                                </div>
			          		</form>
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
      	<form>
	      	<div class="input-field col l8 push-l2">
				<input id="last_name" type="email" class="validate borderd-0" placeholder="Enter your email address" style="border-radius: 0; height: 38px;">
			</div>
			<div class="clearfix"></div>
			<div class="input-field col l6 push-l3" style="margin-top: 0">
				<a href="" class="btn waves-effect brand hoverable white-text">Send Password reset link</a>
			</div>
			<div class="clearfix"></div>
			<a href="#!" class="blue-text modal-close">Back To Login</a>
		</form>
    </div>
  
  </div>
    
    <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.modal').modal();
		});
	</script>
</body>
</html>