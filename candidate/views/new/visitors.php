!DOCTYPE html>
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
				<div class="col  s12 l7">
					<div class="row">	
						<div class="appl-job-heading col m6 s8 l6 ">
							<p class="black-text h5">Recruiter Visits On Your CV <span>(<?php 
								if (!empty($cv_visitor)) { echo count($cv_visitor);}else{echo "0";} ?>)</span></p>
							<!-- <small><i>Who  views yours Resume</i></small> -->
						</div>
						<div class="col m6 s8 l6 ">
							<?php echo $this->session->flashdata('message');?>
						</div>						
					</div>





					<div class="card ">
                        <?php if (!empty($cv_visitor)) { ?>
						<div class="collection">
							<?php foreach ($cv_visitor as $row) { ?>
							<div class="collection-item">
								<div class="row mb0">
									<h6  class="bold " style="margin-top: 3px;
                                    "><?php echo $row->emp_comp_name ?></h6>
                                    <p class="m0">
                                        <span><?php echo $row->emp_designation ?></span><br>
                                        <span><i class="fas fa-map-marker-alt mr10"></i> <?php echo $row->emp_location ?></span>
                                        <span class="right"><?php echo date('d M y', strtotime($row->createdOn)) ?> </span>
                                    </p>
								</div>
							</div>
							<?php }  ?>
						</div>
                        <?php }else{ ?>
						<div class="valign-wrapper  empty-jobs">
							<div class="block">
								<center>
									<img src="<?php echo $this->config->item('web_url');?>assets/img/empty.png" class="responsive-img ">
									<p class="h5 typography">Oops... There are no recuruiters visits on  your CV</p>
									
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