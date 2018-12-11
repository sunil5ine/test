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
	<link rel="stylesheet" href="<?php echo $this->config->item('web_url');?>assets/css/jquery.tagsinput-revisited.css">
	<style type="text/css">
		.select2-selection.select2-selection--single{border-radius: 0px} .select2-container--default .select2-selection--single{height: 40px} .select2-selection.select2-selection--single, input, textarea, .chips.input-field{margin-top: 2px !important;font-size: 14px;} #jobpost label {font-size: 13px; margin-bottom: 0; } #jobpost input, #jobpost select, .chips.input-field{margin: 0px;border-radius: 0px !important} .select2-container--default .select2-selection--multiple{border-radius: 0px} .select2-search__field {margin: 0 !important; } .select2-container--default .select2-selection--single .select2-selection__arrow {top: 9px; } #skillstags_tag { padding: 0; }
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
						<div class="appl-job-heading col m6 s12 l7 ">
							<p class="black-text h5">Create a new job </p>
							<?php echo $message; ?>
						</div>
						<div class="col m6 s12 l5">
							<p class="right-align bold blue-text m0"><span style="font-size:17px"><?php echo (empty($subdetails['sub_nojobs']))?'0 ' : $subdetails['sub_nojobs']; ?></span> Jobs left.</p>
							<?php
							$now  = date('Y-m-d');
							$expi = date('Y-m-d', strtotime($subdetails['sub_expire_dt']));
							$left = date_diff(date_create($now),date_create($expi));
						?>
						<?php if($left->format("%R%a Days") > 0){ ?>
								<p class="m0 right-align"><span class="black-text "> <?php echo $left->format("%a Days") ?> left</span> </p>
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
									<p class="black-text bold h6 mb10">Basic Information</p>

									<form id="jobpost" name="jobpost" action="<?php echo base_url(); ?>Jobs/Add" method="post">
										<div class="col s12 m12 l12">
											<div class="row">
												<div class="col s12 m6 l6 input-field m0">
													<p for="jtitle" >Job  Title <span class="red-text">*</span></p>
													<input id="jtitle" name="jtitle" autocomplete="off" type="text" value="<?php echo $formdata['jtitle']; ?>" placeholder="Enter Job  Title" class="validate autocomplete-title" required>
												</div>
												<div class="col s12 m6 l6 input-field m0">
													<p for="jrole">Job Role <span class="red-text">*</span></label>
													<input id="jrole" name="jrole" autocomplete="off" value="<?php echo $formdata['jrole']; ?>" type="text" placeholder="Enter Job Role" class="validate autocomplete-role" required>
												</div>
											</div>
										</div>
										<div class="col s12 m12 l12">
											<div class="row">
											 	<div class="col s12 m6 l6">
											  		<label for="jobtype">Job Type <span class="red-text">*</span></p>
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
													<?php echo form_dropdown('location',$country_list,$formdata['location'],'id="location" class=" form-control has-feedback-left"   required');?>
											  		
											  	</div>
											</div>
										</div>
										
										<div class="col s12 m12 l12">
											<div class="row m0">
												<div class="col s12 m6 l6">
													<label for="minsal">Expected Work Experience Range <span class="red-text">*</span></label>
													<div class="row">
													 	<div class="col s6 m6 l6">
															<select  name="minexp" id="minsal" class=" form-control has-feedback-left"   required>
																<option>Min Exp</option>
																<?php foreach ($maxexp_list as $key => $value): ?>
																	<option value="<?php echo $key ?>"><?php echo $value ?></option>
																<?php endforeach ?>
																
															</select>
														</div>
													  	<div class="col s6 m6 l6">
													  		<select name="maxexp" 'id="maxsal" class=" form-control has-feedback-left"   required>
													  			<option>Max Exp</option>
																<?php foreach ($maxexp_list as $key => $value): ?>
																	<option value="<?php echo $key ?>"><?php echo $value ?></option>
																<?php endforeach ?>
																
															</select>
													  	</div>
												  	</div>
												</div>

												<div class="col s12 m6 l6">
													<label for="salrang">Offered Salary Range (Monthly) <span class="red-text">*</span></label>
													<?php echo form_dropdown('monsal',$monsal_list,$formdata['monsal'],'id="salrang" class=" form-control has-feedback-left"   required');?>
												</div>
											</div>
										</div>

										<div class="col s12 m12 l12">
											<div class="row">
											 	<div class="col s12 m6 l6">
											  		<label for="funarea">Function Area <span class="red-text">*</span></label>
													<?php echo form_dropdown('farea',$funarea_list,$formdata['farea'],'id="funarea" class=" form-control has-feedback-left"  rejected required');?>
												</div>
											  	<div class="col s12 m6 l6">
											  		<label for="education">Educational Qualification <span class="red-text">*</span></label>
													<?php echo form_dropdown('edu',$edu_list,$formdata['edu'],'id="education" class=" form-control has-feedback-left"  rejected required');?>
											  	</div>
											</div>
										</div>
										
										<div class="col s12 m12 l12">
											<div class="row">
											 	<div class="col s12 m6 l6 input-field m0">
											 		
											  		<p for="industry">Industry <span class="red-text">*</span></p>
										          	<input type="text" autocomplete="off" class="autocomplete-ind" name="industry" value="<?php echo  $formdata['industry']?>">
												</div>
												<input type="hidden" name="jobsite" id="jobsite" value="1">

												<div class="col s12 m6 l6 input-field m0">
											 		
													<p for="industry">Nationality <span class="red-text">*</span></p>
													<?php echo form_dropdown('nation',$nation,$formdata['location'],'id="nation" class=" form-control has-feedback-left"   required');?>
											   </div>
											  	
											</div>
											<div class="row">
												<div class="col s12 m12 l12">
											  		<label for="skills">Skills <span class="red-text"></span></label>
													<input class="custom-class" id="skillstags" name="skillval" value="<?php echo $formdata['skillval']; ?> " >
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
	<script src="<?php echo $this->config->item('web_url');?>assets/js/tagsinput.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/script.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/nicEdit.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/select2.min.js"></script>
	
	<script>
		 $(document).ready(function(){
			$(function() { $.ajax({ type: 'GET', dataType: 'json', url: '<?php echo base_url("Jobs/title") ?>', success: function(response) { var titleArray = response; var dataTitle = {}; for (var i = 0; i < titleArray.length; i++) { dataTitle[titleArray[i].title] = titleArray[i].flag; } $('input.autocomplete-title').autocomplete({ data: dataTitle, limit: 6, }); } }); });
			$(function() { $.ajax({ type: 'GET', dataType: 'json', url: '<?php echo base_url("Jobs/roles") ?>', success: function(response) { var roleArray = response; var dataRole = {}; for (var i = 0; i < roleArray.length; i++) { dataRole[roleArray[i].title] = roleArray[i].flag; }  $('input.autocomplete-role').autocomplete({ data: dataRole, limit: 6, }); } }); });
			$(function() { $.ajax({ type: 'GET', dataType: 'json', url: '<?php echo base_url("Jobs/industry") ?>', success: function(response) { var indArray = response; var dataind = {}; for (var i = 0; i < indArray.length; i++) { dataind[indArray[i].title] = indArray[i].flag; }  $('input.autocomplete-ind').autocomplete({ data: dataind, limit: 6, }); } }); });
		});
	</script>
	<script type="text/javascript"> bkLib.onDomLoaded(function() { new nicEditor({fullPanel : true,iconsPath : '<?php echo $this->config->item('web_url')?>assets/img/nicEditorIcons.gif'}).panelInstance('area2'); }); </script>	
	<script> $(document).ready(function(){ $('select').select2({width: "100%"}); $('#skillstags').tagsInput(); $("form").validate({ rules:{ industry:"required", jtitle: "required", jobtype: "required", location: "required", minsal: "required", maxsal: "required", salrang: "required", funarea: "required", education: "required", jrole:"required", }, messages:{ industry:  "Please Select  industry", jtitle: "Please enter  jobtitle", jobtype: "Please select  job type", location: "Please enter  location", minsal: "Please enter  min salary", maxsal: "Please enter  max salary", salrang: "Please enter  Offered Salary Range", funarea: "Please select  Function Area", education: "Please select  Educational Qualification", jrole:"Please select job role" }, }); }); </script>
	
</body>
</html>