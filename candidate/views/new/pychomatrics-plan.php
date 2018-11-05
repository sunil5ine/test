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

	<!-- Applied Jobs -->

	<section>
		<div class="row">
			<div class="container-wrap">
				<!-- left nav -->
					<?php include 'include/left-nav.php'  ?>
				<!-- end left nav -->
				<div class="col  s12 l9">
					<div class="row">
							
						<div class="appl-job-heading col m8 s8 l6 ">
							<p class="black-text h5">Psychometric Test</p>
							<!-- <small><i>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</i></small> -->
						</div>
						<div class="appl-job-heading col m8 s8 l6 ">
							<?php echo $message; ?>
							<?php echo $this->session->flashdata('message'); ?>
						</div>
						
					</div>

					<div class="card inbox-container">
						<div class="">
							<div class="collection">
								<div class="padd-test">
                                <div class="row">
                                	<?php 
                                	foreach ($plan as $key => $value) {
                                	?>
                                	<div class="col s12 l6 m6">
                                		<img src="<?php echo $this->config->item('web_url');?>assets/img/file-test.png" class="responsive-img file-img" >
                                		<p class="lighten-3-text general"><?php echo $value->psyp_heading ?></p>
                                		<p class="lighten-3-text para-general"><?php echo $value->psyp_info ?></p>
                                		<p class="lighten-3-text price-list">Test Price : $<?php echo $value->psyp_amount ?></p><br>
                                		<a href="<?php echo base_url().'psychotest/choose_plan/'.$value->psyp_id ?>" class="btn brand waves-effect white-text">Pay & Take Test</a>
                                	</div>
                                	<?php } ?>
                                </div>
                            </div>
						</div>
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