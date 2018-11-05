<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php' ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/fonts/css/all.min.css" >
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/style.css">
	<style type="text/css">
		.toast{background: #f44336}
		.form-set input, .form-set textarea{padding: 0 5px; width: 98% !important; margin-bottom: 0 !important;border-radius: 1px !important}
		.form-set {margin: 13px 0; }
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
				<?php include 'include/menu.php' ?>
			
				<!-- right side -->
				<div class="col m12  s12 l9 pofile-details-table-card">
						
					<div class="row">	
						<div class="appl-job-heading col m8 s8 l12 ">
							<p class="black-text h5">My jobs </p>
							<small><i><?php if($publish_count > 0) { echo ' Note : If you edit this job, it will not reflect the previous publications. You need to republish the job as a new posting.'; }
							

							?></i></small>
						</div>

						
					</div>
					<div class="row m0">
						<div class="col s12">
						<?php echo $message; ?>
						</div>
					</div>
					<div class="card">
						<div class="card-content">
							<div class="row mb0" >
							<div class="col s12 m12 l8">
							<div class="row m0 border-r" >
				        	<div class="col s12 l2 m4 p0">
				        		<center>
				        			<img src="<?php echo $this->config->item('web_url')?>assets/img/logo.png" class="responsive-img responsive-img circle" width="75px" style="margin-top: 17px;">
				        		</center>
				        	</div>
				        	<div class="col s12 l10 m8 ">
				        		<div class="ptb15">
					        		<h6 class="bold"><?php echo $formdata['jtitle']; ?></h6>
					        		<ul class="job-card" style="overflow: hidden;">
					        			<li>
					        				<span class="back-icon"><i class="material-icons">card_travel</i></span>
											<span></span>
					        			</li>
					        			<li>
					        				<span class="back-icon"><i class="material-icons">map</i></span>
											<span>Bangalore</span>
					        			</li>
					        			<li>
					        				<span class="back-icon"><i class="material-icons">access_time</i></span>
											<span>3 Years</span>
					        			</li>
					        			<li>
					        				<span class="back-icon"><i class="material-icons">business</i></span>
											<span>IT</span>
					        			</li>
					        		</ul>
					        		
				        		</div>
				        	</div>

				        	<div class="col s12 l12 m12 ">
				        		<div class="divider mb10"></div>

								<p class="mb10"><span class="bold">Hire for:</span> <?php echo $formdata['hcompany']; ?></p>
								<p class="mb10"><span class="bold">Send notifications to:</span> <?php echo $formdata['notifyemail']; ?></p>

				        	</div>
				        	
				        	</div>
				        	
				        	</div>
				        	<div class="col s12 l4 m12 ">
				        		<div class="ptb15 pl10 font13set">
					        		<p class="mb10"><span class="bold mr10">Created on :</span> <?php echo date('d/m/Y H:i:s', strtotime($formdata['createddt'])); ?></p>
					        		<p class="mb10"><span class="bold mr10">Latest Updated :</span> <?php echo date('d/m/Y H:i:s', strtotime($formdata['updateddt'])); ?></p>
					        		<p class="mb10"><span class="bold mr10">Created by :</span> <?php echo $formdata['createdby']; ?></p>
					        		<p class="mb10"><span class="bold mr10">Job URL :</span> </p>
									<ul class="social-share-box-myjob pt10 m0 ">
										<li><a href=""><i class="fab fa-facebook-f"></i></a></li>
										<li><a href=""><i class="fab fa-twitter"></i></a></li>
										<li><a href=""><i class="fab fa-behance"></i></a></li>
										<li><a href=""><i class="fab fa-instagram"></i></a></li>
									</ul>
								
				        		</div>
				        	</div>
				        </div>
						</div>
					</div>
					<div class="">
						<ul class="tabs transparent">
					        <li class="tab col s3"><a href="#job-detail" class="active">Job Details</a></li>
					        <li class="tab col s3"><a href="#social-posting" >Social Postings</a></li>
					        <li class="tab col s3"><a href="#job-board-posting" >Job Board Postings</a></li>
					        <li class="tab col s3"><a href="#statistics">Statistics</a></li>
					        <li class="tab col s3"><a href="#applications">Applications</a></li>
					    </ul>
					</div><!-- end tab buttons -->
        
					<!-- Personal Details -->
				
					
					

					
					<div class="card" id="job-detail">
						<div class="card-content">
							
							<?php if($postdisable != '') { ?>
  								<a onclick="M.toast({html: 'Sorry! You are unable to EDIT jobs, as your subscription has been reach upto the LIMIT.<br> So please do subscription to proceed further.'})" class="edite-layout right waves-effect "><i class="material-icons font25 mr10">create</i><span style="position: relative; top: -7px;">Edit</span></a>
  							<?php }else{ ?> 
								<a href="<?php echo $this->config->base_url().'Jobs/Edit/'.$formdata['job_url_id']; ?>" class="edite-layout right waves-effect "><i class="material-icons font25 mr10">create</i><span style="position: relative; top: -7px;">Edit</span></a>
  							<?php } ?>
        
							<p class="bold mb10 h6">Job Details</p>
							<ul class="profile-box">
								<li class="profile-items">
									<div class="profile-item-title">
										<i class="fas fa-id-card-alt"></i>
										<span>Job Title</span>
									</div>
									<div class="profile-item-content">
										<span><?php echo $formdata['jtitle']; ?></span>
									</div>
								</li>
								<li class="profile-items">
									<div class="profile-item-title">
										<i class="far fa-id-card"></i>
										<span>Functional Area</span>
									</div>
									<div class="profile-item-content">
										<span><?php echo $formdata['farea']; ?></span>
									</div>
								</li>
								<li class="profile-items">
									<div class="profile-item-title">
										<i class="fas fa-map-marker-alt"></i>
										<span>Location</span>
									</div>
									<div class="profile-item-content">
										<span><?php echo $formdata['location']; ?></span>
									</div>
								</li>
								<li class="profile-items">
									<div class="profile-item-title">
										<i class="fas fa-anchor"></i>
										<span>Industry </span>
									</div>
									<div class="profile-item-content">
										<span><?php echo $formdata['industry']; ?></span>
									</div>
								</li>
								<li class="profile-items">
									<div class="profile-item-title">
										<i class="fas fa-briefcase"></i>
										<span>Experience</span>
									</div>
									<div class="profile-item-content">
										<span><?php echo $formdata['minexp'].' to '.$formdata['maxexp'];?></span>
									</div>
								</li>
								<li class="profile-items">
									<div class="profile-item-title">
										<i class="fas fa-map-marked-alt"></i>
										<span>Job Role</span>
									</div>
									<div class="profile-item-content">
										<span><?php echo $formdata['jrole']; ?></span>
									</div>
								</li>
								<li class="profile-items">
									<div class="profile-item-title">
										<i class="fas fa-hand-holding-usd"></i>
										<span>Monthly Salary</span>
									</div>
									<div class="profile-item-content">
										<span><?php echo '$'.$formdata['minsal'].' ~ $'.$formdata['maxsal'];?></span>
									</div>
								</li>
								<li class="profile-items">
									<div class="profile-item-title">
										<i class="fas fa-brain"></i>
										<span>Skills</span>
									</div>
									<div class="profile-item-content">
										<span><?php echo $formdata['skill']; ?></span>
									</div>
								</li>

								<li class="profile-items">
									<div class="profile-item-title">
										<i class="fas fa-graduation-cap"></i>
										<span>Education</span>
									</div>
									<div class="profile-item-content">
										<span></span>
									</div>
								</li>
							</ul>
							
							<div class="des">
								<p class="bold mb10 h6">Job Details</p>
								<p>
								<?php echo $formdata['jobdesc']; ?>
							</p>
							</div>
						</div>
					</div><!-- job details end -->

					
					<div class="card " id="social-posting">
						<div class="card-content">
							<p class="bold mb10 h6">Job Details</p>

							<form action="<?php echo base_url(); ?>Jobs/EmailJob/<?php echo $formdata['job_url_id']; ?>" method="post" id="reffrm" name="reffrm">
								<div class="form-set">
									<label>Enter the email addresses seperated by comma you wish to seek referral.</label>
									<input type="text" name="emailids" placeholder="Email ID's" style="padding:0 5px">
									<small>ex: person@domain.com, anotherperson@domain2.com</small>
								</div>
								<div class="form-set">
									<input type="text" name="subject"  placeholder="Application Wanted for" value="Applicants Wanted for <?php echo $formdata['jtitle']; ?>" style="padding:0 5px">
								</div>
								<div class="form-set">
									<textarea name="message" placeholder="message" style="padding: 5px" rows="6"><?php echo $mailmsg; ?></textarea>
								</div>
								<div class="form-set">
									<button class="btn brand white-text hoverable waves-effect waves-lighten right">Share via Email</button>
								</div>
							</form>
						</div>
					</div> <!-- end social posting -->
					<div class="card " id="job-board-posting"></div> 
					<div class="card " id="statistics"></div> 
					<div class="card " id="applications"></div> 




				</div>
			</div>
		</div>
	</section>




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
		    $('.tabs').tabs();
		  });
	</script>
</body>
</html>