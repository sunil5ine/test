
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
							<p class="black-text h5">Verified CVs</p>
                            <small><i></i></small>
                        </div>
                    </div>
                        <div class="row">
                            <ul class="collection with-header">
                                <?php foreach ($vcv as $key => $value) { ?>
                                    <li class="collection-item cv-lists">
                                        <div class="row m0">
                                            <div class="col s12">
                                                <h6 class="bold green-text "><?php echo $value->can_fname.' '.$value->can_lname?></h6>
                                                <p class="bold"><u><i><?php echo $value->job_title?></i></u></p>
                                            </div>

                                            <div class="col s12 m6 l6">
                                                <p>
                                                    <span class="cv-heading">Phone: </span>
                                                    <span class="cv-content"><?php echo '+'.$value->can_ccode.' '. $value->can_phone?></span>
                                                </p>
                                            </div>
                                            <div class="col s12 m6 l6">
                                                <p>
                                                    <span class="cv-heading">Email: </span>
                                                    <span class="cv-content"><?php echo $value->can_email?></span>
                                                </p>
                                            </div>
                                            <div class="col s12 m6 l6">
                                                <p>
                                                    <span class="cv-heading">Experience: </span>
                                                    <span class="cv-content"><?php echo $value->can_experience?></span>
                                                </p>
                                            </div>
                                            <div class="col s12 m6 l6">
                                                <p>
                                                    <span class="cv-heading">Designation: </span>
                                                    <span class="cv-content"><?php echo $value->can_curr_desig?></span>
                                                </p>
                                            </div>
                                            <div class="col s12 m6 l6">
                                                <p>
                                                    <span class="cv-heading">Location: </span>
                                                    <span class="cv-content"><?php echo $value->can_curr_loc?></span>
                                                </p>
                                            </div>
                                            <div class="col s12 m6 l6">
                                                <p>
                                                    <span class="cv-heading">Location: </span>
                                                    <span class="cv-content"><?php echo $value->can_curr_loc?></span>
                                                </p>
                                            </div>
                                            <div class="col s12 m6 l6">
                                                <p>
                                                    <span class="cv-heading">Function area: </span>
                                                    <span class="cv-content"><?php echo $value->fun_name?></span>
                                                </p>
                                            </div>
                                            <div class="col s12 m6 l6">
                                                <a href="<?php echo base_url('jobs/download?id=').$value->cv_id?>" class="waves-effect downloadcv waves-light btn brand">Download Cv  <i class="material-icons right">file_download</i></a>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>    
                            </ul>
                        </div>
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