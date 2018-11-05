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

				<div class="col  s12 l8">
					<div class="row">	
						<?php echo $message ?>
						<div class="appl-job-heading col m8 s8 l12 ">
							<p class="black-text h5">Professional CV Writing</span></p>
							<small><i>Get you Professional CV today</i></small>
						</div>
						
					</div>

					<div class="card ">
						<div class="card-content">
							<form class="form-inline " id="qnfrm" name="qnfrm" action="<?php echo base_url('cvwriting/questionnaire'); ?>" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label>1. What are your achievements worth adding to your resume?</label>
									<textarea id="qn1" name="qn1" class="cv-textarea" rows="4"><?php echo $formdata['qn1']; ?></textarea>
								</div>
								<div class="form-group">
									<label>2. How were you able to add value to the operations of your previous employers?</label>
									<textarea id="qn2" name="qn2" class="cv-textarea" rows="4"><?php echo $formdata['qn2']; ?></textarea>
								</div>
								<div class="form-group">
									<label>3. What are your technical skills you think can add value to your professional profile?</label>
									<textarea id="qn3" name="qn3" class="cv-textarea" rows="4"><?php echo $formdata['qn3']; ?></textarea>
								</div>
								<div class="form-group">
									<label>4. Explain your professional journey so far?</label>
									<textarea id="qn4" name="qn4" class="cv-textarea" rows="4"><?php echo $formdata['qn4']; ?></textarea>
								</div>
								<div class="form-group">
									<label>5. What are your educational qualifications?</label>
									<textarea id="qn5" name="qn5" class="cv-textarea" rows="4"><?php echo $formdata['qn5']; ?></textarea>
								</div>
								<div class="form-group">
									<label>6. Do you have any additional qualifications or training you have attended worth adding to your profile? Provide the same, if any.</label>
									<textarea id="qn6" name="qn6" class="cv-textarea" rows="4"><?php echo $formdata['qn6']; ?></textarea>
								</div>
								<div class="form-group">
									<label>7. What are your technical skills?</label>
									<textarea id="qn7" name="qn7" class="cv-textarea" rows="4"><?php echo $formdata['qn7']; ?></textarea>
								</div>
								<div class="form-group">
									<label>8. What are your personal traits you have acquired over the years as a professional?</label>
									<textarea id="qn8" name="qn8" class="cv-textarea" rows="4"><?php echo $formdata['qn8']; ?></textarea>
								</div>
								<div class="form-group">
									<label>9. What are your career goals?</label>
									<textarea id="qn9" name="qn9" class="cv-textarea" rows="4"><?php echo $formdata['qn9']; ?></textarea>
								</div>
								<div class="form-group">
									<label>10. Where do you want to see yourself over the course of next the five years?</label>
									<textarea id="qn10" name="qn10" class="cv-textarea" rows="4"><?php echo $formdata['qn10']; ?></textarea>
								</div>
								<div class="form-group">
									<label>11. What are the interests you have that you think are worth adding to your profile?</label>
									<textarea id="qn11" name="qn11" class="cv-textarea" rows="4"><?php echo $formdata['qn11']; ?></textarea>
								</div>
								<div class="form-group  dropzone" id="my-awesome-dropzone">
									<div class="dran-upload center">
										<div class="block verical  grey-text darken-3 " id="filename">
											<p><i class="fas fa-upload"></i> Drag and Drop your Resume <span class="hide-on-small-only">here or <span class="blue-text"><u>brows</u></span> To upload</span></p>
											
										</div>
										<input name="fileToUpload" required type="file" class="dropzone-input" style="cursor: crosshair;" />
									</div>
								</div>
	
							<div class="form-group">
								<button class="btn brand white-text hoverable waves-effect " style="width: 150px">Create</button>
							</div>
							</form>
						</div>
					</div>
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