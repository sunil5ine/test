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
	<!-- end nav bar -->

	<!-- Applied Jobs -->

	<section>
		<div class="row">
			<div class="container-wrap">
				<!-- slide bar -->
				<?php include 'include/left-nav.php'  ?>

				<div class="col  s12 l9">
					<div class="row">	
						<div class="appl-job-heading col m8 s8 l12 ">
							<p class="black-text h5">Applied Jobs <span>(<?php echo $count ?>)</span></p>
							<small><i>view all your Recently Applied Jobs</i></small>
						</div>
						<?php echo $this->session->flashdata('message'); ?>
					</div>

					<div class="card applied-joblist">
						<div class="">
							<ul class="collection">
							<?php 
								if (!empty($aplJobs)) {
								foreach ($aplJobs as $rows) {
								if($rows->ja_status == 1){
								
							?>
						      <li class="collection-item row hoverable">
						      	<div class="col s12 l9 m9 ">
						        		<div class="ptb10">
						        			<a href="<?php echo base_url().'Jobs/Viewdetails/'.$rows->job_url_id.'/?js=5&source=cherryhire';?>">
								        		<p class="heading-text m0"><b><?php echo $rows->job_title ?></b></p>
								        		<ul class="applied-job-card">
								        			<li class="truncate">
								        				<span class="back-icon"><i class="material-icons">card_travel</i></span>
														<span><?php echo $rows->job_company ?></span>
								        			</li>
								        			<li class="truncate">
								        				<span class="back-icon"><i class="material-icons">map</i></span>
														<span><?php echo $rows->job_location ?></span>
								        			</li>
								        			<li class="truncate">
								        				<span class="back-icon"><i class="material-icons">business</i></span>
														<span><?php echo $rows->job_industry ?></span>
								        			</li>
								        			<li class="truncate">
								        				<span class="back-icon"><i class="material-icons">access_time</i></span>
														<span><?php echo $rows->job_min_exp.' - '.$rows->job_min_exp.' Years'?></span>
								        			</li>
								        		</ul>
							        		</a>
						        		</div>
						        	</div>
						        	<div class="col s12 l3 m3 ">
						        		<div class="">
							        		<a href="<?php echo base_url('cancle-applied-jobs/').$rows->ja_encrypt_id?>" class="  btn brand waves-effect waves-light white-text ">Cancel Job</a>
						        		</div>
						        	</div>						      	
						      </li>
						  <?php } } }?>
						  </ul>
						</div>
						<?php if ($count < 1) { ?>
							<div class="valign-wrapper  empty-jobs">
								<div class="block">
									<center>
										<img src="<?php echo $this->config->item('web_url');?>assets/img/empty.png" class="responsive-img ">
										<p class="h5 typography">Oops... There are no jobs applied</p>
										<p class=" typography">Your recently applied jobs will appear here.</p>
									</center>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	



			
<!-- footer -->
	<?php echo include'include/footer.php' ?>
<!-- end footer -->




	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/script.js"></script>
</body>
</html>