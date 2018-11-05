<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php'  ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width" />
  	<!-- <meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/> -->
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo $this->config->item('web_url');?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/style.css">
</head>
<body>
	<!-- navigation bar -->
	<?php include 'include/header.php'  ?>
	<!-- end nav bar -->

	<!-- Applied Jobs -->

	<section class="password-change">
		<div class="row">
			<div class="container-wrap">
				<div class="col s12 m12 l10 push-l1">
					<div class="card">
						<?php echo $message; ?>
					</div>

					<div class="card z-depth-4">
						<div class="card-content ">
							<p class="h6">
								Look Up
							</p>
							<table>
								<tr>
									<th><i class="far fa-envelope"></i> Email ID</th>
									<td><?php echo $formdata['cmail'] ?></td>
								</tr>
								<tr>
									<th><i class="far fa-calendar-alt"></i> Created On</th>
									<td><?php echo $formdata['createddt']; ?></td>
								</tr>
								<tr>
									<th><i class="fas fa-sync-alt"></i> Last Updated</th>
									<td><?php echo $formdata['updateddt'] ?></td>
								</tr>
							</table>
						</div>
					</div>


					<div class="card z-depth-4">
						<div class="card-content ">
							<p class="h6 bold black-text">Change Password</p>
							<div class="row">
								<form class="form-inline col l6 m12 s12 change-password-form" id="pwdfrm" name="pwdfrm" action="<?php echo base_url(); ?>ProfileSettings" method="post">
									<div class="form-group">
										<label class="black-text">Current password</label>
										<input type="password" class="form-control has-feedback-left" placeholder="Current Password" value="" name="oldpwd" id="oldpwd" required >
                                        <span id="oldpwd_validate" class="red-text"></span>
									</div>

									<div class="form-group">
										<label class="black-text">New password</label>
										<input type="password"  placeholder="New Password" value="" name="usrpwd" id="usrpwd" required >
                                        <span id="usrpwd_validate" class="red-text"></span>
									</div>

									<div class="form-group">
										<label class="black-text">Retype password</label>
										<input type="password"  placeholder="Confirm Password" value="" name="repwd" id="repwd" required >
                                        <span id="repwd_validate" class="red-text"></span>
									</div>
									<div class="form-group">
										<button class="waves-effect z-depth-3 waves-light btn white-text  brand " style="width: 120px">
							        	 Update
							        	</button>					
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




	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/script.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/validator.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery.validate.js"></script>
	<?php if($pwdstat == 1) { ?>
		<script type="text/javascript">
		  $(document).ready(function(){
		    alert("Your Password has been changed successfully. Please login again.")
		    document.location.href = '<?php echo base_url(); ?>'+'Logout';
		  });
		</script>
	<?php } ?>
	<script type="text/javascript">
		$(document).ready(function() {
			var AjaxURL = "<?php echo $this->config->base_url().'PasswordValid';?>";
			
			$.validator.addMethod("pwdeval", function(value, element) {
				var response;  
				//var pswd=$('#usrpwd').val();    
				var pswd = value;    
				response = 0;
				//validate the length
				if ( pswd.length < 8 ) {
					response = 1;
				}
			
				//validate letter
				if ( !pswd.match(/[a-z]/) ) {
					response = 1;
				}
			
				//validate capital letter
				if ( !pswd.match(/[A-Z]/) ) {
					response = 1;
				}
			
				//validate number
				if ( !pswd.match(/\d/) ) {
					response = 1;
				}
			
				if (response == 1) {
				  return false;
				} else {
				  return true;
				}
			  
			  }, "");
			  
			  $.validator.addMethod("chkpwd", function(value, element) {
				var response;
				//var email = $('#emailid').val();
				var cpwd = value;
				$.ajax({
					type: "POST",
					url: AjaxURL,
					data:{cpwd:cpwd},
					async:false,
					success:function(data){
						response = data;
					}
				});
				
				if (response == 0) {
					return false;
				} else {
					return true;
				}
			
			}, "");
			  
			  $("#pwdfrm").validate({
				 rules: {
					oldpwd:{
						required: true,
						chkpwd: true
					},
					usrpwd:{				
						required: true,
		        		minlength: 8
					},
					repwd:{
						equalTo: "#usrpwd",
						required: true
					}
				 },
				 messages: {
					oldpwd:{
						required: 'Enter your current password',
						chkpwd: 'Your password was incorrect'
					},
					usrpwd:{
						required: 'Password required',
						minlength: 'Password must contain atleast 8 characters.'
					},
					repwd:{
						required: 'Password required',
						equalTo: 'The passwords do not match'
					}
				 },
				  errorPlacement : function(error, element) {
					     //$('#ErrAlert').append(error);
		            var name = $(element).attr("name");
		            error.appendTo($("#" + name + "_validate"));
		      },
		      success: function (label, element) {
					  label.parent().removeClass('error');
		    		label.remove();  
		      },
			});
			
		});
		</script> 
</body>
</html>