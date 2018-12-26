<?php defined('BASEPATH') OR exit('No direct script access allowed');
    $this->ci =& get_instance();
    $this->ci->load->model('jobsmodel');
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
	<link href="<?php echo $this->config->item('web_url');?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/style.css">
</head>
<body>
	<!-- header -->
	<?php include 'include/header.php'  ?>
	<!-- End header -->

	<!-- Applied Jobs -->

	<section>
		<div class="row">
			<div class="container-wrap">
				<?php include 'include/left-nav.php'  ?>
				
				<div class="col  s12 l9">
					<div class="row">	
						<div class="appl-job-heading col m8 s8 l12 ">
							<p class="black-text h5"><?php  echo $pagehead ?><span> (<small>
								<?php if(!empty($jobslist)) { 
									echo count($jobslist);
								}else{echo '0';}?>
									
								</small>)</span></p>
							<small><i>view all your Recently recommended Jobs</i></small>
						</div>
						
					</div>

					<div class="card ">
						<div class="collection">

							<?php if(!empty($jobslist)) {  
								foreach ($jobslist as $result) {
                                $japp = $this->ci->jobsmodel->job_applycount($result->job_id);
                                
							?>
							<div class="collection-item">
								<div class="row mb0">
									<div class="col m12 s12 l10">
										<p class="black-text bold mb0"><?php echo $result->job_title ?></p>
										<p class="small-text m0"><span class="font12 bold black-text">Location:</span> <?php echo $result->job_location ?></p>
										<ul class="saved-jobs-list">
											<li>
						        				<span class="back-icon"><i class="material-icons">card_travel</i></span>
												<span class="font12"><?php echo $result->job_company ?></span>
						        			</li>
						        			<li>
												<span class="x-smll-text">Posted on :</span>
												<span class="font12"><?php echo date('d M Y', strtotime($result->job_created_dt));?></span>
						        			</li>
						        			
						        			<li>
												<span class="x-smll-text">Experience :</span>
												<span class="font12"><?php echo $result->job_min_exp;?> ~  <?php echo $result->job_max_exp;?></span>
						        			</li>
										</ul>
                                        <p class="small-text m0"><span class="font12 bold black-text">Skills:</span> <?php echo $result->job_skills ?></p>
									</div>
									<div class="col s12 l2">
										<div class="ptb30 svaed-job-btn">
											<?php if($japp['job_applycount'] == 0) { ?>
												<a href="<?php echo $this->config->base_url().'Jobs/Viewdetails/'.$result->job_url_id; ?>" class="btn hoverable waves-effect brand white-text" style="line-height: 33px;">Apply</a>
											<?php } else { ?>
												<a href="<?php echo $this->config->base_url().'Jobs/Viewdetails/'.$result->job_url_id; ?>" class="btn hoverable waves-effect deep-orange lighten-1 white-text font12" style="line-height: 33px;">Applied</a>
											<?php } ?>
										</div>
									</div>
								</div>
							</div><!-- collection end -->
							
							<?php } }else{ ?>

						    <div class="valign-wrapper  empty-jobs">
							    <div class="block">
								    <center>
										<img src="<?php echo $this->config->item('web_url');?>assets/img/empty.png" class="responsive-img ">
										<p class="h5 typography">Oops... There are no recommended jobs</p>
										<p class=" typography">Your recently recommended  jobs will appear her</p>
									</center>
								</div>
							</div><!-- collection end -->
                            <?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php echo include'include/footer.php' ?>

	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/script.js"></script>
</body>
</html>