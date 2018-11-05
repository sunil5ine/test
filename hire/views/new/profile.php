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
	<link rel="stylesheet" href="<?php echo $this->config->item('web_url')?>assets/css/intlTelInput.css">
	<style type="text/css">
		@media (min-width: 800px) {
			th{width: 35%;}
		}


	</style>
</head>
<body>
	<!-- navigation bar -->
	<?php include 'include/header.php' ?>
	<!-- end nav bar -->

	<!-- Applied Jobs -->

	<section>
		<div class="row">
			<div class="container-wrap">
				<?php include 'include/menu2.php' ?>

				<!-- right side -->
				<div class="col m12  s12 l9 pofile-details-table-card">
					<?php echo $message; ?>
					<!-- Personal Details -->
					<div class="card scrollspy" id="personal-detail">
						<div class="card-content">
							
							<p class="bold mb10 h6">Look Up</p>
							<table>
								<tr>
									<th> <i class="material-icons  mr10 back-icon">domain</i> Company Name</th>
									<td> <?php echo $prodetails['emp_comp_name']; ?> 	</td>
								</tr>
								<tr>
									<th><i class="material-icons  mr10 back-icon">mail_outline</i> Email ID</th>
									<td><?php echo $prodetails['emp_email']; ?></td>
								</tr>
								
								<tr>
									<th><i class="material-icons  mr10 back-icon">date_range</i> Create On</th>
									<td><?php echo date('d M Y', strtotime($prodetails['emp_reg_date'])); ?></td>
								</tr>
								
								<tr>
									<th><i class="material-icons mr10 back-icon">cached</i>Last Updated</th>
									<td><?php echo date('d M Y ', strtotime($prodetails['emp_update_date'])); ?></td>
								</tr>
							</table>
						</div>
					</div> <!-- end Personal Details -->

					<!-- Profile Details -->
					<div class="card employer-profile " id="profile">
						<div class="card-content">
							<a href="#modal1" class="edite-layout right waves-effect modal-trigger"><i class="material-icons font25">create</i></a>
							<p class="bold mb10 h6">Profile Details</p>
							<table>
								<tr>
									<th> <i class="fas fa-user"></i> <span>Name</span></th>
									<td><?php echo $formdata['fname'].' '.$formdata['lname']; ?></td>
								</tr>
								<tr>
									<th><i class="fas fa-envelope"></i> <span>Designation</span></th>
									<td><?php echo $formdata['designation']; ?></td>
								</tr>
								
								<tr>
									<th><i class="fas fa-lock-open"></i> <span>Password</span></th>
									<td>************</td>
								</tr>
								
								<tr>
									<th><i class="fas fa-lock"></i> <span>Confirm Password</span></th>
									<td>************</td>
								</tr>
								<tr>
									<th> <i class="fas fa-map-marker-alt"></i> <span>Location</span></th>
									<td><?php echo $formdata['complocation']; ?></td>
								</tr>
								<tr>
									<th><i class="fas fa-envelope"></i> <span>Email ID</span></th>
									<td><?php echo $formdata['notifyemail']; ?></td>
								</tr>
								
								<tr>
									<th><i class="fas fa-globe"></i> <span>Company Website</span></th>
									<td><?php echo $formdata['compurl']; ?></td>
								</tr>
								
								<tr>
									<th><i class="fas fa-users"></i> <span>Number of Employees</span></th>
									<td><?php echo $formdata['empcnt']?> Employees</td>
								</tr>
								<tr>
									<th><i class="fas fa-phone"></i> <span>Phone Number</span></th>
									<td> <?php echo $formdata['cntrycode'].' '.$formdata['phone']; ?></td>
								</tr>
								
								
								
							</table>

						</div>
					</div> <!-- end Profile Details -->

					

				</div>
			</div>
		</div>
	</section>
	
	<div id="modal2" class="modal">
    <div class="modal-content">
      <h5>Change Profile</h5>
		<form method="post" name="basicfrm"  action="<?php echo $this->config->base_url().'profilepic';?>" enctype="multipart/form-data">
			<div class="file-field input-field">
		      <div class="btn">
		        <span>Choose File</span>
		        <input type="file" name="picToUpload">

		      </div>
		      <div class="file-path-wrapper">
		        <input class="file-path validate"  required type="text" placeholder="Choose profile pic only jpg, png" style="margin: 0; margin-left: 0px; width: 80%; margin-left: 10px;"><br>
		         <small>Image resolution should be minimum 100 x 100 and maximum 500 x 500. </small>
		      </div>
		      <br>
		      <button type="submit" class="  waves-effect waves-light btn white-text  brand nav-btn" style="width: 50%;margin-left: 117px">Change</button>
		    </div>
		</form>
		
    </div>
</div>
  <!-- Modal Structure -->
  <div id="modal1" class="modal">
    <div class="modal-content">
      <h5>Edite Profile Overview</h5>
      <div class="row">
      	<form method="post" name="basicfrm"  action="<?php echo $this->config->base_url().'AccountSettings';?>">
			<div class="form-group col s12 m6">
			  	<label for="firstname">First name</label><br>
			  	<input type="text" class="form-control has-feedback-left" id="fname" name="fname" placeholder="First Name" required  value="<?php echo $formdata['fname']; ?>">
			</div>

			<div class="form-group col s12 m6">
			  	<label for="lastname">Last Name</label>
			  	<input type="text" class="form-control has-feedback-left" id="lname" name="lname" placeholder="Last Name" value="<?php echo $formdata['lname']; ?>" >
			</div>
			
			<div class="form-group col s12 m6">
			  	<label for="comp">Company Name</label>
			  	<input type="text" class="form-control has-feedback-left" placeholder="Company Website" value="<?php echo $formdata['compurl']; ?>" name="compurl" id="compurl" required >
			</div>

			<div class="form-group col s12 m6">
			  	<label for="designation">Designation</label>
			  	<input type="text" class="form-control has-feedback-left" placeholder="Designation" value="<?php echo $formdata['designation']; ?>"  name="designation" id="designation" required >
			</div>
	
			 <div class="form-group col s12 m6">
			  	<label for="emailid">Email ID</label>
			  	<input type="email" class="form-control" placeholder="Notification Email" value="<?php echo $formdata['notifyemail']; ?>" name="notifyemail" id="notifyemail" required >
			</div>

			<div class="form-group col s12 m6">
				<input type="hidden" class="form-control" placeholder="Code" value="<?php echo $formdata['cntrycode']; ?>"  name="cntrycode" id="cntrycode"  required >
			  	<label for="phone">Contact Number</label>
			  	<input maxlength="16" placeholder="Contact Number" value="<?php echo $formdata['phone']; ?>" name="phone" id="phone"  required type="text" class="validate" placeholder="Enter your Contact number">
			</div>	

			<div class="form-group col s12 m6">
				
			  	<label for="phone">Password</label>
			  	<input maxlength="16" placeholder="Contact Number" value="<?php echo $formdata['usrpwd']; ?>" name="usrpwd" id="psw"  required type="password" class="validate" placeholder="Enter your Contact number">
			</div>	

			<div class="form-group col s12 m6">
				
			  	<label for="phone">Confirm password</label>
			  	<input maxlength="16" placeholder="Contact Number" value="<?php echo $formdata['repwd']; ?>" name="repwd" id="cpsw"  required type="password" class="validate" placeholder="Enter your Contact number">
			</div>	

			<div class="form-group col s12 m6">
			  	<label for="last_name">Company Location</label>
			  	<input type="text" class="form-control" placeholder="Company Location" value="<?php echo $formdata['complocation']; ?>" name="complocation" id="complocation" required >
			</div>
			<div class="form-group col s12 m6">
			  	<label for="last_name">Number of Employees</label>
			  	<select name="empcnt" id="empcnt" class="form-control has-feedback-left" required>
                    <option disabled selected>Employees</option>
                    <option <?php echo ($formdata['empcnt']=="1~3")?'selected':''; ?> value="1~3">1~3</option>
                    <option <?php echo ($formdata['empcnt']=="3~10")?'selected':''; ?> value="3~10">3~10</option>
                    <option <?php echo ($formdata['empcnt']=="10~25")?'selected':''; ?> value="10~25">10~25</option>
                    <option <?php echo ($formdata['empcnt']=="25~50")?'selected':''; ?> value="25~50">25~50</option>
                    <option <?php echo ($formdata['empcnt']=="50~100")?'selected':''; ?> value="50~100">50~100</option>
                    <option <?php echo ($formdata['empcnt']=="100+")?'selected':''; ?> value="100+">100+</option>
                </select>
			</div>

			<div class="form-group col s12 m12">
			  	<label for="last_name">Company Website</label>
			  	 <input type="text" class="form-control has-feedback-left" placeholder="Company Website" value="<?php echo $formdata['compurl']; ?>" name="compurl" id="compurl" required >
			</div>
			<div class="form-group col s12">
				<br>
				<button  type="submit" value="Sign Up" class="waves-effect z-depth-2 waves-light btn white-text  brand login-btn block btn-md">Update</button>
			</div>
			
      	</form>
      </div>
    </div>
    
  </div>

<!-- footer -->
<?php include 'include/footer.php' ?>




	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/script.js"></script>
	<script src="<?php echo $this->config->item('web_url')?>assets/js/intlTelInput.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		    $('.modal').modal();
		    $('select').formSelect();
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