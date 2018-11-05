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
	<!-- Applied Jobs -->

	<section>
		<div class="row">
			<div class="container-wrap">
				<?php include 'include/left-nav.php'  ?>
				<div class="col  s12 l9">
					<div class="row">	
						<div class="appl-job-heading col m6 s8 l6 ">
							<p class="black-text h5">Saved Jobs <span>(<?php 
								if (!empty($savedjobs)) { echo count($savedjobs);}else{echo "0";} ?>)</span></p>
							<small><i>View all your Recently saved Jobs</i></small>
						</div>
						<div class="col m6 s8 l6 ">
							<?php echo $this->session->flashdata('message');?>
						</div>
						
					</div>



					<div class="card ">
						<div class="collection">
							<?php 
							if (!empty($savedjobs)) {
								foreach ($savedjobs as $row) { ?>
							<div class="collection-item">
								<div class="row mb0">
									<div class="col m12 s12 l8">
										<p class="black-text bold mb0"><?php echo $row->job_title ?></p>
										<p class="small-text m0"><?php echo $row->job_industry ?></p>
										<ul class="saved-jobs-list">
											<li>
						        				<span class="back-icon"><i class="material-icons">card_travel</i></span>
												<span class="font12"><?php echo $row->job_company ?></span>
						        			</li>
						        			<li>
												<span class="back-icon"><i class="material-icons">place</i></span>
												<span class="font12"><?php echo $row->job_location ?></span>
						        			</li>
						        			<li>
												<span class="x-smll-text">Posted on :</span>
												<span class="font12"><?php echo date('d M Y',strtotime($row->job_created_dt)) ?></span>
						        			</li>
						        			
						        			
										</ul>
									</div>
									<div class="col s12 l4">
										<div class="ptb30 svaed-job-btn">
											<a href="<?php echo $this->config->base_url().'Jobs/ApplyJob/'.$row->job_url_id; ?>" class="btn hoverable waves-effect brand white-text">Apply</a>
											<a href="<?php echo base_url('remove-saved-jobs/').$row->sv_encrypt_id ?>" class="btn hoverable waves-effect btn-nc transparent brand-text" >Remove</a>
										</div>
									</div>
								</div>
							</div><!-- collection end -->
							<?php }}  ?>
						</div>
						<?php if (empty($savedjobs)) { ?>
						<div class="valign-wrapper  empty-jobs">
							<div class="block">
								<center>
									<img src="<?php echo $this->config->item('web_url');?>assets/img/empty.png" class="responsive-img ">
									<p class="h5 typography">Oops... There are no jobs Saved</p>
									<p class=" typography">Your recently Saved jobs will appear her</p>
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




	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/script.js"></script>
</body>
</html>