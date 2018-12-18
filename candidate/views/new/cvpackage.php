<?php  $this->ci =& get_instance(); ?>
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
	<style>
		.cv-textarea{padding: 2px 9px !important; width: 97% !important;border-radius: 0;}
	</style>
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
						<?php echo $message ?>
						<div class="appl-job-heading col m8 s8 l12 ">
							<p class="black-text h5">Professional CV Writing</span></p>
							<small><i>Create a great impression on Employers</i></small>
						</div>
						
					</div>

                <div class="row">
                  <?php foreach ($cv_package as $key => $value) { ?>
                    <div class="col s12 m4 scrollspy" id="cvs">
                        <div class="card">
                            <div class="card-content center">
                                <h5 class="black-text"><?php echo $value->cp_title ?>  </h5>
                                <p class="bold black-text mb10">
                                    <?php
                                        echo $value->cp_from;
                                        echo ($value->cp_to == '+')? '' : ' - ';
                                        echo $value->cp_to;
                                    ?>
                                     Years
                                </p>
                                <p>Cover Letter +$10.00 <br> Express Delivery +$10.00</p>
                                
                                <div class="pring-section">
                                    <h3>$ <?php echo $value->cp_price; ?></h3>
                                    <a href="<?php echo base_url('cvwriting/questionnaire/').$value->cp_id ?>" class=" btn plr15  brand-text  btn-nc waves-green hoverable  waves-effect transparent">Get your cv</a>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php } ?>
				</div>
			</div>
		</div>
	</section>
	


	<!-- footer -->
	<?php echo include'include/footer.php' ?>

	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/script.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/dropzone.js"></script>
</body>
</html>