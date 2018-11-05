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
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/needsharebutton.css">
</head>
<body>
	<!-- navigation bar -->
	<?php include 'include/header.php'  ?>
	<!-- end nav bar -->

	<div class="row">
		<div class="container-wrap">
			<!-- priveos button -->
			<div class="col s12 m6">
				<div class="back-btn-box">
					
					<p>
						<span class="back-icon"><i class="material-icons">navigate_before</i></span>
						<a class="greyd-text" href="<?php echo base_url() ?>MyJobs">Back to Previos Page</a>
					</p>
					
				</div>
			</div>
			<div class="col s12 m6">
				<div class="back-btn-box">
					
					<?php echo $message;echo  $this->session->flashdata('message'); ?>
					
				</div>
			</div><!-- end priveos button -->
			
			<!-- job header -->
			<div class="row">
				<div class="col s12">
					<div class="card-panel job-card-box">
				        <div class="row mb0" >
				        	<div class="col s12 l2 m4">
				        		<center>
				        			<img src="<?php echo $this->config->item('web_url');?>assets/img/jobc.png" class="responsive-img" width="110px">
				        		</center>
				        	</div>
				        	<div class="col s12 l6 m8 ">
				        		<div class="ptb15">
					        		<h6 class=""><b><?php echo $formdata['jtitle'] ?></b></h6>
					        		<ul class="job-card">
					        			<li>
					        				<span class="back-icon"><i class="material-icons">card_travel</i></span>
											<span><?php echo $formdata['hcompany'] ?></span>
					        			</li>
					        			<li>
					        				<span class="back-icon"><i class="material-icons">map</i></span>
											<span><?php echo $formdata['location'] ?></span>
					        			</li>
					        			<li>
					        				<span class="back-icon"><i class="material-icons">business</i></span>
											<span><?php echo $formdata['industry'] ?></span>
					        			</li>
					        			<li>
					        				<span class="back-icon"><i class="material-icons">access_time</i></span>
											<span><?php echo $formdata['minexp'].' ~ '. $formdata['maxexp'] ?></span>
					        			</li>
					        		</ul>
				        		</div>
				        	</div>
				        	<div class="col s12 l4 m12 push-m4">
				        		<div class="ptb30 btnboxs">
				        			<?php if($formdata['job_applycount'] == 0) { ?>
										<?php if($subsType == 1 || $this->data["postdisable"]!='') { ?> 
                                	 		<a href="<?php echo $this->config->base_url();?>Subscriptions" class="z-depth-0 btn brand waves-effect waves-light white-text btn-m"><i class="fa fa-arrow-circle-up left"></i> Upgrade Now!</a>
                                		<?php } else{ ?>
					        			<a href="<?php echo $this->config->base_url().'Jobs/ApplyJob/'.$formdata['job_url_id']; ?>" class="z-depth-0 btn brand waves-effect waves-light white-text btn-m">Apply Job</a>

					        			
					        		<?php } } else {?>
										<a class="z-depth-0 btn deep-orange lighten-1 white-text btn-m" style="margin-top: -4px; border: 1px solid #ff7043;">Applied <i class="material-icons right">done</i> </a>
					        		<?php } 
					        		if (empty($savedjobs)) { ?>
					        			
					        		<a href="<?php echo base_url('saveto-account/').$formdata['jobid'].'/'.$formdata['job_url_id']?>" class="z-depth-0 btn btn-m brand-text btn-nc waves-effect waves-light transparent"><i class="material-icons left brand-text">star</i> Save this job</a>
					        		<?php }else { ?>
					        			<a class="z-depth-0 btn deep-orange lighten-1 white-text btn-m" style="margin-top: -4px; border: 1px solid #ff7043;">Saved <i class="material-icons right">done</i> </a>
					        		<?php } ?>

					        		<a class="z-depth-0  btn btn-m brand-text btn-nc  transparent " id="share-button-2" data-share-icon-style="box" data-share-networks="Twitter,Pinterest,Facebook,GooglePlus,Linkedin" style="margin-top: -2px;padding: 0px"></a>
				        		</div>
				        	</div>
				        </div>
					</div>
				</div>
			</div><!-- end job header -->

			<!--  job Detail -->			
			<div class="row">
				<div class="col s12 m12 l8">
					<div class="card-panel job-details-box">
						<h6><b>About this job and the role</b></h6>
						<p><?php echo $formdata['jobdesc']; ?></p>
						<br>
						<h6><b>Skill</b></h6>
						<?php 
							$sillsarry = explode(',', $formdata['skill']);
							foreach ($sillsarry as $skill_row) {
						?>
								<div class="btn mb10 white-text z-depth-0 brand"><?php echo  $skill_row; ?></div> 
						<?php } ?>
						<br>
						<?php if($formdata['job_applycount'] == 0) { ?>
							<?php if($subsType == 1 || $this->data["postdisable"]!='') { ?> 
                                <a href="<?php echo $this->config->base_url();?>Subscriptions" class="z-depth-0 btn brand waves-effect waves-light white-text btn-m"><i class="fa fa-arrow-circle-up left"></i> Upgrade Now!</a>

                            <?php } else{ ?>
					        	<a href="<?php echo $this->config->base_url().'Jobs/ApplyJob/'.$formdata['job_url_id']; ?>" class="z-depth-0 btn brand waves-effect waves-light white-text btn-m">Apply Job</a>

					        			
					    <?php } } else {?>
							<a class="z-depth-0 btn deep-orange lighten-1 white-text btn-m" style="margin-top: -4px; border: 1px solid #ff7043;">Applied <i class="material-icons right">done</i> </a>
					    <?php } ?>
					</div>
				</div>
				<div class="col s12 m12 l4">
					<div class="recent-box">
						<div class="adsection">
							<img src="https://dummyimage.com/600x400/878787/ffffff" class="responsive-img">
						</div>
						<div class="recet-jobs">
							<h6>Recent jobs</h6>
							<div class="recet-jobs-list">
								<h6>IT Project Manager at 5ine</h6>
								<ul>
									<li class="truncate">
						        		<span class="back-icon"><i class="material-icons">card_travel</i></span>
										<span>5ine</span>
									</li>
									<li class="truncate">
						        		<span class="back-icon"><i class="material-icons">business</i></span>
										<span>Web Development</span>
						        	</li>
						        	<li class="truncate">
						        		<span class="back-icon"><i class="material-icons">access_time</i></span>
										<span>3 Years</span>
						        	</li>
								</ul>
							</div>
							<div class="recet-jobs-list">
								<h6>Consectetur adipisicing elit</h6>
								<ul>
									<li class="truncate">
						        		<span class="back-icon"><i class="material-icons">card_travel</i></span>
										<span>5ine Development</span>
									</li>
									<li class="truncate">
						        		<span class="back-icon"><i class="material-icons">business</i></span>
										<span>Development</span>
						        	</li>
						        	<li class="truncate">
						        		<span class="back-icon"><i class="material-icons">access_time</i></span>
										<span>3 Years</span>
						        	</li>
								</ul>
							</div>
							<div class="recet-jobs-list">
								<h6>IT Project Manager at 5ine</h6>
								<ul>
									<li class="truncate">
						        		<span class="back-icon"><i class="material-icons">card_travel</i></span>
										<span>loream ipsome</span>
									</li>
									<li class="truncate">
						        		<span class="back-icon"><i class="material-icons">business</i></span>
										<span>loream</span>
						        	</li>
						        	<li class="truncate">
						        		<span class="back-icon"><i class="material-icons">access_time</i></span>
										<span>3 Years</span>
						        	</li>
								</ul>
							</div>
							<div class="recet-jobs-list">
								<h6>Consectetur adipisicing elit</h6>
								<ul>
									<li class="truncate">
						        		<span class="back-icon"><i class="material-icons">card_travel</i></span>
										<span>Adipisicing</span>
									</li>
									<li class="truncate">
						        		<span class="back-icon"><i class="material-icons">business</i></span>
										<span>Programer</span>
						        	</li>
						        	<li class="truncate">
						        		<span class="back-icon"><i class="material-icons">access_time</i></span>
										<span>3 Years</span>
						        	</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div><!-- end job Detail -->
	
		</div>
	</div>




	<!-- footer -->
	<?php echo include'include/footer.php' ?>



	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/script.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/needsharebutton.js"></script>
	<script>  
			new needShareDropdown(document.getElementById('share-button-2'));
		</script>
</body>
</html>