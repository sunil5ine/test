<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php' ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width" />
  	<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/materialize.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/intlTelInput.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/style.css">
	<style type="text/css">
		.alert {margin-bottom: 0px; }
		select, input, .selection, .select2-container--default .select2-selection--single{margin: 3px 0 !important;}
		label {font-size: 13px; font-weight: 600; color: #5a5757; }
		.intl-tel-input.allow-dropdown .flag-container, .intl-tel-input.separate-dial-code .flag-container {margin-top: 5px !important; } 
		@media (min-width: 1024px) {
			form{padding: 0px 50px;}
			form .row{margin:0px}
		}
	</style>
</head>
<body>
	<!-- navigation bar -->
	<?php include 'include/header.php' ?>

	<!-- login section -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col s12 m12 l10 push-l1">
					<?php if ($this->session->flashdata('msg')){ echo $this->session->flashdata('msg'); } ?>
			      <div class="card z-depth-2">
			        <div class="card-content">
			          	<div class="center">
			          		<p class="card-title"><b>Register</b></>
			          		<h6>Create your Employer account Today</h6>
			          	</div>
						<br><br>
			          	<div class="emil-contect  row">
			          		

			          		<form class="form-inline " id="signupForm"  method="post" action="<?php echo $this->config->base_url().$submiturl;?>">
			          			<div class="row">
			          			<div class="form-group col s12 m6">
						          	<label for="firstname">First name</label><br>
						          	<input  type="text" class="validate" value="<?php echo $formdata['firstname']; ?>" name="firstname" id="firstname" tabindex="1" required placeholder="Enter your first name">
						        </div>

						        <div class="form-group col s12 m6">
						          	<label for="lastname">Last Name</label>
						          	<input  value="<?php echo $formdata['lastname']; ?>"  name="lastname" id="lastname" tabindex="2" required  type="text" class="validate" placeholder="Enter your last Name">
						        </div>
						        </div>
						        <div class="row">
						        <div class="form-group col s12 m6">
						          	<label for="comp">Company Name</label>
						          	<input name="comp" id="comp" value="<?php echo $formdata['comp']; ?>" tabindex="9" required type="text" class="validate" placeholder="Enter Your Company Name">
						        </div>

						        <div class="form-group col s12 m6">
						          	<label for="designation">Designation</label>
						          	<input value="<?php echo $formdata['designation']; ?>"  name="designation" id="designation" tabindex="3" required  type="text" class="validate" placeholder="Enter Designation">
						        </div>
								</div>
						        <div class="row">
								 <div class="form-group col s12 m6">
						          	<label for="emailid">Email ID <i class="far fa-question-circle tiny tooltipped" data-tooltip="Please use your company email id " data-position="right"></i></label>
						          	<input name="emailid" id="emailid" value="<?php echo $formdata['emailid']; ?>" tabindex="6" required type="email" class="validate " placeholder="ex: exmaple@CompanyDomain.com" >
						          	<span class="emailerro red-text"><small></small></span>
						        </div>

						        <div class="form-group col s12 m6">
						        	<input type="hidden" class="form-control" placeholder="Code" value="<?php echo ($formdata['cntrycode'] != '')?$formdata['cntrycode']:'1' ?>"  name="cntrycode" id="cntrycode" tabindex="4" required >
						          	<label for="phone">Contact Number</label>
						          	<input maxlength="16" placeholder="Contact Number" value="<?php echo $formdata['phone']; ?>" name="phone" id="phone" tabindex="5" required type="text" class="validate" placeholder="Enter your Contact number">
						        </div>
								</div>
						        <div class="row">
								<div class="form-group col s12 m6">
						          	<label for="usrpwd">Password</label>
						          	<input name="usrpwd" id="usrpwd" type="password" class="validate" placeholder="Enter your Password">
						        </div>

						        <div class="form-group col s12 m6">
						          	<label for="repwd">Confirm Password</label>
						          	<input name="repwd" id="repwd" type="password" class="validate" placeholder="Confirm Password">
						        </div>
								
								</div>
						        <div class="row">
								<div class="form-group col s12 m6">
						          	<label for="last_name">Company Location</label>
						          	<?php echo form_dropdown('complocation',$country_list,$formdata['complocation'],'id="complocation" class=" form-control" tabindex="11" required');?>
						        </div>

						        <!-- <div class="form-group col s12 m6">
						          	<label for="nationality">Nationality</label>
						          	<?php echo form_dropdown('nationality',$country_list,$formdata['complocation'],'id="nationality" class=" form-control" tabindex="11" required');?>
						        </div> -->

						       
								
								<div class="form-group col s12 m6">
						          	<label for="last_name">Number of Employees</label>
						          	<select name="empcnt" id="empcnt" tabindex="10" required>
									    <option <?php echo ($formdata['empcnt']=="1~3")?'selected':''; ?> value="1~3">1 - 3</option>
		                                <option <?php echo ($formdata['empcnt']=="3~10")?'selected':''; ?> value="3~10">3 - 10</option>
		                                <option <?php echo ($formdata['empcnt']=="10~25")?'selected':''; ?> value="10~25">10 - 25</option>
		                                <option <?php echo ($formdata['empcnt']=="25~50")?'selected':''; ?> value="25~50">25 - 50</option>
		                                <option <?php echo ($formdata['empcnt']=="50~100")?'selected':''; ?> value="50~100">50 - 100</option>
		                                <option <?php echo ($formdata['empcnt']=="100+")?'selected':''; ?> value="100+">100+</option>
									</select>
						        </div>
								</div>
						        <div class="row">
								<div class="form-group col s12 m12">
						          	<label for="last_name">Company Website</label>
						          	 <input type="text" class="" placeholder="www.example.com" name="url" id="url" value="<?php echo $formdata['url']; ?>" tabindex="12" required>
						        </div>
								</div>
						        <div class="row">
						        <div class="form-group col s12 m12">
						          	<label for="last_name">Company Description</label>
						          	<textarea class="" rows="3" width="100%"  name="descr" id="descr" tabindex="13"><?php echo $formdata['firstname']; ?></textarea>
						        </div>
						        </div>
						        <div class="row">
								<div class="form-group col s12 m12 cf">
									<div class="big-radiobutton plan cf">
										<input type="radio" name="emptype" id="free" value="1"  <?php echo ($formdata['emptype']==1)?'checked':''; ?>>
											<label class="free-label four col1" for="free">
												<i class="fas fa-user"></i>
												<p class="checkbox-caption">No, we recruit directly</p>

											</label>
										<input type="radio" name="emptype" id="basic" value="2"  <?php echo ($formdata['emptype']==2)?'checked':''; ?>>
											<label class="basic-label four col1" for="basic">
												<i class="fas fa-people-carry"></i>
												<p class="checkbox-caption">Yes we are Headhunting Agency</p>
											</label>
										<input type="radio" name="emptype" id="premium" value="3" <?php echo ($formdata['emptype']==3)?'checked':''; ?>>
											<label class="premium-label four col1" for="premium">
												<i class="fas fa-users"></i>
												<p class="checkbox-caption">We recruit directly and are also a Headhunting Agency</p>
											</label>
									</div>
								</div>
								
								</div>
						        
								<div class="form-group  col s12">
									<input name="return_url" type="hidden" value="http://staging.cherryhire.com/PostJob">
									<label>
								        <input type="checkbox" checked required name="tandc" id="tandc" value="1"/>
								        
								        <span class="font300">I agree with the Terms and Conditions </span>
								    </label>
								</div>

						        
						        <div class="form-group col s12">
						        	<button  type="submit" value="Sign Up" class="waves-effect z-depth-2 waves-light btn white-text  brand login-btn block btn-md">Register</button>
						        </div>
								<div class="form-group col s12">
									<p class="center  mt15">Already have an account? <a href="<?php echo base_url()?>hire/login" class="blue-text">Login</a></p>
								</div>
			          		</form>

			          		
			          	</div>
			        </div>
			      </div>
			    </div>
		    </div>
		</div>
	</section>
	
<?php if(isset($status) && ($status=='success' || $status=='fail' || $status=='cvfail')) {  ?> 
  	<div id="notification" class="modal opend">
	    <div class="">
	     
	       <a href="#!" class="modal-close waves-effect waves-green btn-flat right">Close</a>
	      <?php echo $message; ?>
	    </div>
	    
  </div>
<?php } ?>

<!-- footer -->
<?php include 'include/footer.php' ?>


	<!-- scripts -->
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/script.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/select2.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/intlTelInput.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		    $('.opend').modal();
		    $('.opend').modal('open');
		    $('.tooltipped').tooltip();
		    $('select').select2({width: "100%"});
		    /*
		    	check email id valid or not 
		    */
		   	$('form').submit(function(event) {
		   		var str1   = $('#url').val();
		   		var email = $('#emailid').val();

		   		url = str.replace(/^https?:\/\//,'');

		   		if (email.substr(email.indexOf('@')+1) == str.substr(str.indexOf('.')+1)) {
		   			
		   		}
		   		else
		   		{
		   			var $target = $('html,body');
  					$target.animate({scrollTop: 0}, 500);
		   			$('#emailid').css({
		   				border: '1px solid red'		   				
		   			});
		   			$('.emailerro').html('<small>The entered emailid is not matching with domain mentioned.</small>')
		   			event.preventDefault();
		   		}
		   	});


			$("#signupForm").validate({
			rules: {
				firstname: "required",
				lastname: "required",
				comp:'required',
				designation:'required',
				complocation:'required',
				empcnt:'required',
				url:'required',
				phone:{
					required: true,
					digits: true
				},

				usrpwd: {
					required: true,
					minlength: 8
				},
				repwd: {
					required: true,
					minlength: 8,
					equalTo: "#usrpwd"
				},
				emailid: {
					required: true,
					email: true
				},
				
				
			},
			messages: {
				firstname: "Please enter your firstname",
				lastname: "Please enter your lastname",
				comp: "Please enter your Company Name",
				designation: "Please enter your Designation",
				complocation:"Please select Company Location",
				complocation:"Please select Number of Employees",
				url:"Please enter company url",
				usrpwd: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long"
				},
				repwd: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long",
					equalTo: "Please enter the same password as above"
				},
				emailid: {
							required:'Email id required',
							email: "Please enter a valid email address",
						},
				phone:{
					required: 'Pnone number required',
					digits: 'Please Only numeric  value'
				}
				
				
				
			}
			});
		    
		  });
		 

		$("#phone").intlTelInput({
	      autoHideDialCode: true,
	      nationalMode: true,
	    });
		$("#phone").on("countrychange", function(e, countryData) {
		  $('#cntrycode').val(countryData['dialCode']);
		  
		});    
	</script>
</body>
</html>