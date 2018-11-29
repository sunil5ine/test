<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php' ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width" />
  	<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/select2.min.css">
	<link href="<?php echo $this->config->item('web_url')?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/style.css">
	<style type="text/css">
		.select2-selection.select2-selection--single{border-radius: 0px}
		.select2-container--default .select2-selection--single{height: 40px}
		.select2-selection.select2-selection--single, input, textarea, .chips.input-field{margin-top: 2px !important;font-size: 14px;} 
		#jobpost label {font-size: 13px; margin-bottom: 0; }
		#jobpost input, #jobpost select, .chips.input-field{margin: 0px;border-radius: 0px !important}
		.select2-container--default .select2-selection--multiple{border-radius: 0px}
		.select2-search__field {margin: 0 !important; }
		.select2-container--default .select2-selection--single .select2-selection__arrow {top: 9px; }
	</style>
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
						<div class="appl-job-heading col m8 s8 l12 ">
							<p class="black-text h5"><?php echo $pagehead; ?></p>
							<?php echo $message; ?>
						</div>
					</div>

					<div class="row ">
						<div class="col m12 l12 s12">
							<!-- card start -->
							<div class="card">
								<div class="card-content">
									<p class="black-text bold h6 mb10">Basic Information</p>

									<form id="jobpost" name="jobpost" action="<?php echo base_url(); ?>Jobs/Update/<?php echo $formdata['job_url_id']; ?>" method="post">
										<div class="col s12 m12 l12">
											<div class="row">
												<input name="job_id" id="job_id" type="hidden" value="<?php echo $formdata['jobid']; ?>" />
                                        <input name="jobid" id="jobid" type="hidden" value="<?php echo $formdata['job_url_id']; ?>" />
												<div class="col s12 m6 l6">
													<label for="jtitle">Job  Title <span class="red-text">*</span></label>
													<input id="jtitle" name="jtitle" type="text" value="<?php echo $formdata['jtitle']; ?>" placeholder="Enter Job alert Title" class="validate" required>
												</div>
												<div class="col s12 m6 l6">
													<label for="jrole">Job Role <span class="red-text">*</span></label>
													<input id="jrole" name="jrole" value="<?php echo $formdata['jrole']; ?>" type="text" placeholder="Enter Job alert Title" class="validate" required>
												</div>
											</div>
										</div>
										<div class="col s12 m12 l12">
											<div class="row">
											 	<div class="col s12 m6 l6">
											  		<label for="jobtype">Job Type <span class="red-text">*</span></label>
										          	<select name="jobtype" id="jobtype" class="required" required>
													<option >Job Type</option>
                                                    <option value="Full Time" <?php echo ($formdata['jobtype'] == "Full Time")?'selected':''; ?>>Full Time</option>
                                                    <option value="Part Time" <?php echo ($formdata['jobtype'] == "Part Time")?'selected':''; ?>>Part Time</option>
                                                    <option value="Freelance" <?php echo ($formdata['jobtype'] == "Freelance")?'selected':''; ?>>Freelance</option>
                                                    <option value="Temporary" <?php echo ($formdata['jobtype'] == "Temporary")?'selected':''; ?>>Temporary</option>
													</select>
												</div>
											  	<div class="col s12 m6 l6">
											  		<label for="location">Location <span class="red-text">*</span></label>
													<?php echo form_dropdown('location',$country_list,$formdata['location'],'id="location" class=" form-control has-feedback-left" tabindex="2"  required');?>
											  		
											  	</div>
											</div>
										</div>
										
										<div class="col s12 m12 l12">
											<div class="row m0">
												<div class="col s12 m6 l6">
													<label for="minsal">Expected Work Experience Range <span class="red-text">*</span></label>
													<div class="row">
													 	<div class="col s6 m6 l6">
															<?php echo form_dropdown('minexp',$minexp_list,$formdata['minexp'],'id="minsal" class=" form-control has-feedback-left" tabindex="4"  required');?>
														</div>
													  	<div class="col s6 m6 l6">
															<?php echo form_dropdown('maxexp',$maxexp_list,$formdata['maxexp'],'id="maxsal" class=" form-control has-feedback-left" tabindex="5"  required');?>
													  	</div>
												  	</div>
												</div>

												<div class="col s12 m6 l6">
													<label for="salrang">Offered Salary Range (Monthly) <span class="red-text">*</span></label>
													<?php echo form_dropdown('monsal',$monsal_list,$formdata['monsal'],'id="salrang" class=" form-control has-feedback-left" tabindex="7"  required');?>
												</div>
											</div>
										</div>

										<div class="col s12 m12 l12">
											<div class="row">
											 	<div class="col s12 m6 l6">
											  		<label for="funarea">Function Area <span class="red-text">*</span></label>
													<?php echo form_dropdown('farea',$funarea_list,$formdata['farea'],'id="funarea" class=" form-control has-feedback-left" tabindex="8" rejected required');?>
												</div>
											  	<div class="col s12 m6 l6">
											  		<label for="education">Educational Qualification <span class="red-text">*</span></label>
													<?php echo form_dropdown('edu',$edu_list,$formdata['edu'],'id="education" class=" form-control has-feedback-left" tabindex="9" rejected required');?>
											  	</div>
											</div>
										</div>
										
										<div class="col s12 m12 l12">
											<div class="row">
											 	<div class="col s12 m6 l6">
											 		<input type="hidden" name="jobsite" id="jobsite" value="1">
											  		<label for="industry">Industry </label>
										          	
										          	<input type="text" name="industry" value="<?php echo  $formdata['industry']?>">
												</div>

											  	<div class="col s12 m6 l6">
											  		<label for="skills">Skills: <span class="red-text">*</span></label>
											  		<div class="chips">
														<input class="custom-class" id="skills" name="skillval" value="<?php echo $formdata['skillval']; ?> " >
													</div>
											  	</div>
											</div>
										</div>

										<div class="col s12 m12 l12">
											<br>
											<div class="dividers"></div>
											<br><br>
										</div>
										<div class="col s12 m12 l12">
											<p class="black-text bold h6 mb10">Job Description</p>
											<textarea style="width: 100%;" rows="6" placeholder="Job Description" name="jobdesc" id="area2"><?php echo $formdata['jobdesc']; ?></textarea>
											<p><small>Please do not enter any contact email, phone or url to avoid job beign rejected by the job portal!</small></p>
										</div>
										

										<div class="col s12 m12 l12" style="margin-top: 20px">
											<br>
											<div class="dividers"></div>
											<br><br>
											<p class="black-text bold h6 mb10">Job Settings</p>	
											<div class="row">
											 	<div class="col s12 m6 l6 mobile-m10" >
											  		<label for="hire">Employer Name</label>
										          	<input id="hire" type="text" placeholder="Hiring For" class="validate" value="<?php echo $this->session->userdata('hirename'); ?>" name="hcompany">
										          	<label class="">
										          	<input type="checkbox" name="hire4" value="1">
										          	<span>Set as Confidential</span>
										          	</label>
												</div>
											  	<div class="col s12 m6 l6">
											  		<label for="noty">Send Notifications to</label>
										          	<input type="email" value="<?php echo $formdata['notifyemail']; ?>" class="validate" name="notifyemail" placeholder="Enter Email ID" id="noty">
													<p style="    font-size: 12px;"><small><i>Email id where the notifications are to be sent when a candidate applies for this job. Leave blank if you do not want any notifications</i></small></p>
											  	</div>
											</div>
										</div>

										<div class="col s12 m12 l12">
											<label>Notes</label>
											<textarea rows="4" name="jobnotes" placeholder="Notes"><?php echo $formdata['jobnotes']; ?></textarea>
										</div>
											
										<div class="col s12 m12 l12 ptb30">
											<button type="submit" class="btn brand hoverable  waves-effect"> Submit</button>
											<a href="" class="btn transparent z-depth-0 black-text hoverable  waves-effect"> Cancel</a>
										</div>
									</form>
								</div>
							</div><!-- end profile card start -->
						</div><!-- end row  -->
						

					</div><!-- end 9 right content -->
				</div>
			</div>
		</div>
	</section>
	



<!-- footer -->
<?php include 'include/footer.php' ?>




	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/script.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/nicEdit.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/select2.min.js"></script>
	<script type="text/javascript">
		bkLib.onDomLoaded(function() {
			new nicEditor({fullPanel : true,iconsPath : '<?php echo $this->config->item('web_url')?>assets/img/nicEditorIcons.gif'}).panelInstance('area2');
			
		});
	</script>
	
	<script>
		$(document).ready(function(){
			$('select').select2({width: "100%"});
			$("form").validate({
			rules:{
				industry:"required",
				jtitle: "required",
				jobtype: "required",
				location: "required",
				minsal: "required",
				maxsal: "required",
				salrang: "required",
				funarea: "required",
				education: "required",
				jrole:"required",
				
			},
			messages:{
				industry:  "Please Select  industry",
				jtitle: "Please enter  jobtitle",
				jobtype: "Please select  job type",
				location: "Please enter  location",
				minsal: "Please enter  min salary",
				maxsal: "Please enter  max salary",
				salrang: "Please enter  Offered Salary Range",
				funarea: "Please select  Function Area",
				education: "Please select  Educational Qualification",
				jrole:"Please select job role"
				
			},
		});
			
		});
	</script>
</body>
</html>