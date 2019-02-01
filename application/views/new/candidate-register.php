<?php
    $stamp = strtotime(date('Y-m-d H:i:s')); // get unix timestamp
    $time_in_ms = $stamp*1000;
?>

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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/intlTelInput.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/zebra_datepicker.min.css" type="text/css">
	<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/08e8400f2a017f75248ca3150/51800c7df4b7fa0ff3b694943.js");</script>

</head>
<body style="overflow-x: hidden;">
	<!-- header -->
	<?php include 'include/header.php'  ?>
	<!-- End header -->

	<!-- login section -->
	<section>
		<div class="container">
			<div class="row">
				<div class="col s12 m12 l10 push-l1">
			      <div class="card z-depth-2">
			        <div class="card-content" style="padding: 40px 8%;">
			          	<div class="center">
			          		<p class="card-title"><b>Register</b></>
			          		<!-- <h6>EASILY USING</h6> -->
			          	</div>
			          	<!-- <div>
			          		<?php //echo $message ?>
			          	</div> -->
						
						<center>
							<a href="<?php echo base_url() ?>candidate/login/linkedin" ><img class="hoverable responsive-img" width="200px" src="<?php echo base_url() ?>assets/img/linkedin.png" alt=""></a>
							<br>
							<span>OR</span>
						</center>
			          	<div class="emil-contect  row">
			          		<!-- <h6 class="center">OR USING EMAIL</h6> -->
							<br>

			          		<form class="form-inline" method="post" id="signupForm"  action="<?php echo base_url('PostCV');?>" enctype="multipart/form-data" style="overflow: visible;">


			          			<input type="hidden" value="<?php echo $time_in_ms; ?>" name="time_in_ms" id="time_in_ms">

			          			<div class="row m0">
				          			<div class="form-group col s12 m6">
							          	<label for="firstname">First name</label><br>
							          	<input value="<?php echo $formdata['firstname']; ?>" name="firstname" id="firstname" type="text" class="validate" placeholder="First Name" required>
							        </div>

							        <div class="form-group col s12 m6">
							          	<label for="lastname">Last Name</label>
							          	<input  placeholder="Last Name" type="text" class="validate" value="<?php echo $formdata['lastname']; ?>" name="lastname" id="lastname" tabindex="2" required>
							        </div>
							    </div>


						        <div class="row m0">
							        <div class="form-group col s12 m6">
							          	<label for="emailid">Email id</label>

							          	<input id="emailid" type="email" class="validate" placeholder="E-mail ID" name="emailid" value="<?php echo $formdata['emailid']; ?>"  tabindex="5" required>
							        </div>

							        <div class="form-group col s12 m6">
							          	<label for="cntrycode">Contact Number	</label>
							          	<input style="width:30%;" type="hidden" class="form-control" placeholder="Code" value="1"  name="cntrycode" id="cntrycode" tabindex="3">

							          	<input id="phone" type="tel" class="validate" style="max-width: 300px" maxlength="16" placeholder="Contact Number" value="<?php echo $formdata['phone']; ?>" name="phone"  tabindex="4" required>
							        </div>
								</div>
								<div class="row m0">
									<div class="form-group col s12 m6">
							          	<label for="usrpwd">Password</label>

							          	<input data-toggle="tooltip"  type="password" class="form-control" placeholder="Password" value="" name="usrpwd" id="usrpwd" tabindex="6" required >
							          	<span class="helper-text" data-error="wrong" data-success="right"><small><b>Note: </b>Password must contain 8 characters</small></span>							        
									</div>
							        <div class="form-group col s12 m6">
							          	<label for="repwd">Confirm Password</label>
							          	<input type="password" class="form-control" placeholder="Confirm Password" value="" name="repwd" id="repwd" tabindex="7" required >
							        </div> 
								</div>
								<div class="row m0">
									 <div class="form-group col s12 m6">
							          	<label for="dob">Date of Birth</label>
							          	<input id="dob" type="text" class="" value="<?php echo $formdata['dob']; ?>" name="dob" tabindex="8" required placeholder="Select your Date of Birth">
							        </div>

							        <div class="form-group col s12 m6">
							        	
							          	<label for="last_name">Current Location</label>
							          	<input type="hidden" value="<?php echo $formdata['currcompany']; ?>" name="currcompany" id="currcompany">
	                                <?php echo form_dropdown('currloc',$country_list,$formdata['currloc'],'id="currloc" class=" form-control" tabindex="16" required');?>
							        
							        </div>
								</div>
								<div class="row m0">
									<div class="form-group col s12 m6">
										<label for="last_name">Educational Qualification</label>
										<?php echo form_dropdown('edu',$edu_list,$formdata['edu'],'id="edu" class=" form-control" tabindex="10" required');?> 
							        </div>

							        <div class="form-group col s12 m6">
										<label for="last_name">Nationality</label>
							          	 <?php echo form_dropdown('nation',$nation_list,$formdata['nation'],'id="nation" class=" form-control" tabindex="11" required');?>
							        </div>
								</div>
								<div class="row m0">
									<div class="form-group col s12 m6">
							          	<label for="last_name">Functional Area</label>
							          	<?php echo form_dropdown('funarea',$funarea_list,$formdata['funarea'],'id="funarea" class=" form-control" tabindex="12" required');?>
							        </div>

									<div class="form-group col s12 m6">
							          	<label for="last_name">Industry</label>
							          	<?php echo form_dropdown('industry',$ind_list,$formdata['industry'],'id="industry" class=" form-control" tabindex="13" required');?>
							        </div>
								</div>
								<div class="row m0">
						        <div class="form-group col s12 m6">
						          	<label for="last_name">Current Designation</label>
						          	<input type="text" class="form-control" placeholder="Current Designation" value="<?php echo $formdata['currdesig']; ?>" name="currdesig" id="currdesig" tabindex="14" required >
						        </div>
								
								<div class="form-group col s12 m6">
						          	<label for="totexp">Total Experiance</label>
						          	<select name="totexp" id="totexp"  tabindex="15" required class="browser-default">
									   <option disabled selected>Total Experience</option>
                                  <option <?php echo ($formdata['totexp']=="Fresher")?'selected':''; ?> value="Fresher">Fresher</option>
                                  <option <?php echo ($formdata['totexp']=="01")?'selected':''; ?> value="01">1 yr</option>
                                  <option <?php echo ($formdata['totexp']=="02")?'selected':''; ?> value="02">2 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="03")?'selected':''; ?> value="03">3 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="04")?'selected':''; ?> value="04">4 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="05")?'selected':''; ?> value="05">5 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="06")?'selected':''; ?> value="06">6 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="07")?'selected':''; ?> value="07">7 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="08")?'selected':''; ?> value="08">8 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="09")?'selected':''; ?> value="09">9 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="10")?'selected':''; ?> value="10">10 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="11")?'selected':''; ?> value="11">11 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="12")?'selected':''; ?> value="12">12 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="13")?'selected':''; ?> value="13">13 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="14")?'selected':''; ?> value="14">14 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="15")?'selected':''; ?> value="15">15 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="16")?'selected':''; ?> value="16">16 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="17")?'selected':''; ?> value="17">17 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="18")?'selected':''; ?> value="18">18 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="19")?'selected':''; ?> value="19">19 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="20")?'selected':''; ?> value="20">20 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="21")?'selected':''; ?> value="21">21 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="22")?'selected':''; ?> value="22">22 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="23")?'selected':''; ?> value="23">23 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="24")?'selected':''; ?> value="24">24 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="25")?'selected':''; ?> value="25">25 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="26")?'selected':''; ?> value="26">26 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="27")?'selected':''; ?> value="27">27 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="28")?'selected':''; ?> value="28">28 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="29")?'selected':''; ?> value="29">29 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="30")?'selected':''; ?> value="30">30 yrs</option>
                                  <option <?php echo ($formdata['totexp']=="31")?'selected':''; ?> value="31">30 yrs+</option>
									</select>
						        </div>
								</div>

								<div class="row m0">
									<div class="  col s12 m6">
											<label for="last_name " class="block" style="display:block;">Upload CV</label>
											<div class="file-field input-field m0">
											<div class="btn white-text upload-btn" >
											File
											<input type="file" name="fileToUpload" tabindex="17" required>
											</div>
											<div class="file-path-wrapper">
											<input class="file-path validate" type="text" placeholder="Upload one or more files" style="width: 90%">
											</div>
											<span class="helper-text" data-error="wrong" data-success="right"><small><b>Note: </b> Please choose only .doc, .docx and .pdf files</small></span>
										</div>
									</div>
									<div class="form-group col s12 m6">
										<label for="last_name">How did you hear about Cherryhire</label>
										<select name="hear" id="hear" tabindex="10" required>
											<option value="">----------</option>
											<option value="Email alert">Email alert</option>
											<option value="Friends/family">Friends/family</option>
											<option value="Facebook">Facebook</option>
											<option value="Got a call">Got a call</option>
											<option value="Instagram">Instagram</option>
											<option value="LinkedIn">LinkedIn</option>
											<option value="Saw an online ad">Saw an online ad</option>
											<option value="Others">Others</option>
										</select>
									</div>

								</div>


								<div class="row m0">
									<div class="form-group col s12 m6">
										<div class="" style="padding-bottom: 29px;"><b>Gender</b></div>
								        <div class="row">
								        	<lable class="col s4" for="rad1">
										      	<input class="with-gap" name="gender"  <?php echo ($formdata['gender']=='Male')?'checked':''; ?> type="radio" id="rad1"  value="Male" checked/>
										      	<span>Male</span>
										  	</lable>
										  	<lable class="col s4" for="rad2">
										      	<input class="with-gap"  name="gender" <?php echo ($formdata['gender']=='Male')?'checked':''; ?> type="radio" id="rad2" value="Female" />
										      	<span>Female</span>
										  	</lable>
										  	<lable class="col s4" for="rad3">
										      	<input class="with-gap"  name="gender" <?php echo ($formdata['gender']=='Male')?'checked':''; ?> type="radio" id="rad3"  value="Other"/>
										      	<span>Others</span>
										  	</lable>
									    </div>
									</div>
		
									
								</div>
								<div class="row m0">
									<div class="form-group  col s12 reg-checkbox">
										
											<lable >Create a Job Alert-Get the freshest jobs in your inbox every day </lable>
									        <input type="checkbox" class="left" name="jobalert" id="jobalert" tabindex="18" value="1"  <?php echo ($formdata['jobalert']==1)?'checked':''; ?>/>
									        
									    
									</div>

									<div class="form-group  col s12 reg-checkbox">
										
										<lable>
									       I agree with the Terms and Condition
									    </lable>
									        <input type="checkbox" class="left" name="tandc" id="tandc" value="1"  tabindex="19" required   />
										
									</div>
								</div>
						        
						        <div class="form-group col s12">
						        	<input name="return_url" type="hidden" value="http://staging.cherryhire.com/postcv">
						        	<button type="submit" class="waves-effect z-depth-2 waves-light btn white-text  brand login-btn block btn-md">Register</button>
						        </div>
								<div class="form-group col s12">
									<p class="center  mt15">Already have an account? <a href="<?php echo base_url()?>candidate">Login</a></p>
								</div>
			          		</form>

			          		
			          	</div>
			        </div>
			      </div>
			    </div>
		    </div>
		</div>
	</section>
	
<!-- notification  -->
<?php if(isset($status) && ($status=='success' || $status=='fail' || $status=='cvfail')) {  ?> 
  	<div id="notification" class="modal opend">
	    
	     
	      <p><?php echo $message; ?></p>
	    
	    
  </div>
<?php } ?>



<!-- footer -->
	<?php echo include'include/footer.php' ?>
<!-- end footer -->

	<!-- scripts -->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/script.js"></script>
	<script src="<?php echo base_url() ?>assets/js/intlTelInput.js"></script>
	<script src="<?php echo base_url() ?>assets/js/jquery.validate.min.js"></script>
	<script src="<?php echo base_url() ?>assets/js/zebra_datepicker.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		    $('.opend').modal();
		    $('.opend').modal('open');
		    $('select').select2({width: "100%"});
		    $('#dob').Zebra_DatePicker({
		        direction: ['2003-01-01', true],
		         view: 'years',
		    });
		    $("#dob").val('2003-01-01');
		  });
		 $(document).ready(function(){
			$("#signupForm").validate({
			rules: {
				firstname: "required",
				lastname: "required",
				
				usrpwd: {
					required: true,
					minlength: 8
				},
				repwd: {
					required: true,
					minlength: 8,
					equalTo: "#usrpwd"
				},
				email: {
					required: true,
					email: true
				},
				dob:"required",
				currcompany:"required",
				edu:"required",
				nation:"required",
				funarea:"required",
				industry:"required",
				currdesig:"required",
				totexp:"required",
				fileToUpload:"required",
				tandc:"required",
				
				
			},
			messages: {
				firstname: "Please enter your firstname",
				lastname: "Please enter your lastname",
				
				usrpwd: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long"
				},
				repwd: {
					required: "Please provide a password",
					minlength: "Your password must be at least 8 characters long",
					equalTo: "Please enter the same password as above"
				},
				email: "Please enter a valid email address",
				tandc: "Please accept our Terms and Condition",
				dob:"Please enter your date of birth",
				currcompany:"Please enter your Company name",
				edu:"Please Select your education qualification",
				nation:"Please Select your Nationality",
				funarea:"Please enter your function area",
				industry:"Please select your industry",
				currdesig:"Please enter your current designation",
				totexp:"please Enter your total experiance",
				fileToUpload:"Please upload your CV",
				
				
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