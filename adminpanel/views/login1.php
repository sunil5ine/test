<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>admin login | Cherryhire</title>
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
			          		<h4 class="">Login</h4>
			          	</div>
			          	<div class="emil-contect center row">  
			          		<form>
			          			<div class="input-field col s12">
						          	<input id="last_name" type="email" class="validate">
						          	<label for="last_name">Email</label>
						        </div>
						        <div class="input-field col s12">
						          	<input id="last_name" type="password" class="validate">
						          	<label for="last_name">Password</label>
						        </div>
						        <div class="input-field col s12">
						        	<button class="waves-effect z-depth-2 waves-light btn white-text  brand login-btn block btn-md">Login</button>
                                </div>
                                <div class="col s12 center">
                                    <a href="#forgot-password"  class="modal-trigger blue-text" >Forgot Password</a>
                                </div>
			          		</form>
			          	</div>
			        </div>
			      </div>
			    </div>
		    </div>
		</div>
    </section>
    
    <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
</body>
</html>