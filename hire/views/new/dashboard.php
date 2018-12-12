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
</head>
<body>
	<!-- navigation bar -->
	<?php include 'include/header.php' ?>
	<!-- end nav bar -->

	<!-- Applied Jobs -->

	<section>
		<div class="row m0">
			<div class="container-wrap">
				<?php include 'include/menu.php' ?>
				<div class="col  s12 l9">
					<div class="row">	
						<div class="appl-job-heading col m8 s8 l8 ">
							<p class="black-text h5">Dashboard </p>
							<small><!-- <i>Hello,Jithin Ajith! Check out what's happening!</i> --></small>
						</div>
						<?php
							$now  = date('Y-m-d');
							$expi = date('Y-m-d', strtotime($subdetails['sub_expire_dt']));
							$left = date_diff(date_create($now),date_create($expi));
						?>
						<div class="col m4 s12 l4">
						<?php if($left->format("%R%a Days") > 0){ ?>
							<p class="m0 right-align"><span class="black-text"> <?php echo $left->format("%a Days") ?> left</span> </p>
							<p class="m0 right-align"><span class="black-text">Expires On:</span> <?php echo date('d-m-Y', strtotime($expi)); ?></p>
						<?php }else{ ?>
							<p class="red-text bold m0 right-align"><i class="fas fa-exclamation-triangle"></i> Subscription Expire</p>
						<?php } ?>
						</div>
					</div>

					<div class="row ">
						<div class="col m12 l12 s12">
							<!-- card start -->
							<div class="card">
								<div class="card-content">
										<div class=" can-resume row mb0	">
											<div class="col m4 l4 s12 border-right">
												<div class="resume-sets">
													<div class="can-res-icon-box">
														<i class="material-icons brand-text">remove_red_eye</i>
													</div>
													<div class="can-resume-detail">
														<p class="title"><?php echo (empty($subdetails['sub_nojobs']))?'0 ' : $subdetails['sub_nojobs']; ?> <?php echo ($subdetails['sub_nojobs'] > 1)?'Jobs':"Job" ?> </p>
														<p class="small"> Job Posts Remaining</p>
													</div>
												</div>
											</div>
											
											<div class="col m4 l4 s12 border-right">
												<div class="resume-sets">
													<div class="can-res-icon-box">
														<i class="material-icons brand-text">library_books</i>
													</div>
													<div class="can-resume-detail">
														<p class="title"><?php echo $candcount; ?> Applied</p>
														<p class="small">Applied this week</p>
													</div>
												</div>
											</div>

											<div class="col m4 l4 s12 ">
												<div class="resume-sets">
													<div class="can-res-icon-box">
														<i class="material-icons brand-text">archive</i>
													</div>
													<div class="can-resume-detail">
														<p class="title"><?php echo ($totalcv['count'] <= 0) ?'0 ' : $totalcv['count']?> Resumes</p>
														<p class="small">Verified cv's </p>
													</div>
												</div>
											</div>
										</div>
								</div>
							</div><!-- end profile card start -->
						</div><!-- end row  -->
						
						<!-- start matching and applied jobs -->
						<div class=" mb0">
							<!-- matching jobs -->
							<div class="col s12 m12 l6">
								<div class="collection with-header card">
									<div class="collection-header p20 grey lighten-3">
										<p class="m0">
											<spn class="h6 black-text"><b>Recently Posted Jobs</b></spn> 
											<a href="<?php echo $this->config->base_url();?>MyJobs" class="right green-text">View all</a>
										</p>
									</div>
									<?php
									
                                    if(!empty($top5_job)) {
                                        foreach ($top5_job as $jobresult) { ?>
							        <a href="<?php echo $this->config->base_url();?>Jobs/Viewdetails/<?php echo $jobresult->job_url_id;?>" class="collection-item">
							        	<div class="">
							        		<p class="h7 black-text"><?php echo $jobresult->job_title ?></p>
							        		<ul class="applied-job-card-resume">
							        			<li class="truncate">
							        				<span class="back-icon"><i class="material-icons">card_travel</i></span>
													<span><?php echo $jobresult->fun_name ?></span>
							        			</li>
							        			<li class="truncate">
							        				<span class="back-icon"><i class="material-icons">map</i></span>
													<span><?php echo $jobresult->job_location ?></span>
							        			</li>
							        			
							        			<li class="truncate">
							        				<span class="back-icon"><i class="material-icons">access_time</i></span>
													<span><?php echo $jobresult->job_min_exp.' - '.$jobresult->job_max_exp ?> Years</span>
							        			</li>
							        			<li class="truncate">
							        				<span class="back-icon"><i class="material-icons">date_range</i></span>
													<span><?php echo date('d M y', strtotime($jobresult->job_created_dt)) ?></span>
							        			</li>
							        		</ul>
							        	</div>
							        </a><!-- list end -->
									<?php } }else{ ?>
											
							        	<div class="collection-item">
							        		<p class="h7 black-text">No results found</p> 
							        	</div>
									<?php } ?>
							    </div>
							</div>	<!-- matching jobs -->

							<div class="col s12 m12 l6">
								<div class="collection with-header card">
									<div class="collection-header p20 grey lighten-3">
										<p class="m0">
											<span class="h6 black-text"><b>Verified CV's</b></span> 
											<a href="<?php echo base_url() ?>verified-cv" class="right green-text">View all</a>
										</p>
									</div>
									<?php  if(!empty($top5_candidate)) { foreach ($top5_candidate as $canresult)
                                        { ?>
							        <a href="<?php echo $this->config->base_url('verified-cv/').$canresult->job_url_id; ?>" class="collection-item">
							        	<div class="">
							        		<p class="h7 black-text"><?php echo $canresult->can_fname.' '.$canresult->can_lname; ?></p>
							        		<ul class="applied-job-card-resume">
							        			
							        			<li class="truncate">
							        				<span class="back-icon"><i class="material-icons">map</i></span>
													<span><?php echo $canresult->job_location; ?></span>
							        			</li>
							        			
							        			<li class="truncate">
							        				<span class="back-icon"><i class="material-icons">access_time</i></span>
													<span><?php echo $canresult->can_experience?></span>
							        			</li>
							        			<li class="truncate">
							        				<span class="back-icon"><i class="material-icons">business</i></span>
													<span><?php echo $canresult->can_curr_desig; ?></span>
							        			</li>
							        		</ul>
							        	</div>
							        </a><!-- list end -->
									
									<?php } } else{ ?>
											
							        	<div class="collection-item">
							        		<p class="h7 black-text">No results found</p> 
							        	</div>
									<?php } ?>
							    </div>
							</div>	<!-- matching jobs -->
						</div> <!-- endstart matching and applied jobs -->

					</div><!-- end 9 right content -->
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
</body>
</html>