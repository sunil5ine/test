<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php'  ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo $this->config->item('web_url');?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/style.css">
	<link rel="stylesheet" href="<?php echo $this->config->item('web_url');?>assets/css/intlTelInput.css">
	<link rel="stylesheet" href="<?php echo $this->config->item('web_url');?>assets/css/jquery.tagsinput-revisited.css"> 
	<style type="text/css"> 
	.modal .datepicker-modal {min-width: 300px; max-height: none; width: 79% !important; }.ft10{font-size:10px}
	form{overflow: visible !important;}
	</style>
</head>
<body>
	<!-- header -->
	<?php include 'include/header.php'  ?>
	<!-- End header -->


	<!-- Applied Jobs -->
	<section>
		<div class="row">
			<div class="container-wrap">
				<!-- left nav -->
					<?php include 'include/left-nav.php'  ?>
				<!-- end left nav -->

				<!-- right side -->
				<div class="col m12  s12 l9 pofile-details-table-card">
					<div><?php echo $message ?>
						
						<?php 
							if (!empty($this->session->flashdata('message'))) {
								echo $this->session->flashdata('message');
							}
						?>
					</div>
					<div class="card z-depth-2" style="margin-bottom: 30px">
						<div class="card-content">
							<div class="resume-set">
								<div class="row m0">
									<div class="col s4 m4 l2">
										<div class="center">
											<img src="<?php echo $this->config->item('web_url') ?>assets/img/resume.png" class="responsive-img">
											
										</div>
									</div>
									<div class="col s8 m5 l8">
										<p class="black-text h6 ">Resume</p>
										<!-- <p class="mb10 font12">2.5 mb</p> -->
										<br><?php if(!empty($formdata['cv_path'])){ ?>
											<a class="btn brand white-text hoverable waves-effect waves-lighten mr10" href="<?php echo $formdata['cv_path']; ?>" target="_blank"> View Resume </a>
										<?php } ?>		
										<a href="#upload-resume" class="brand-text bold tooltipped modal-trigger" data-position="top" data-tooltip="Please choose only .doc, .docx and .pdf files">Upload New Resume</a>
									</div>
									<div class="col s12 m3 l2 grey  lighten-5 z-depth-2">
										<div class="ptb10">
											<?php 
												$exp = date('Y-m-d', strtotime($subdetails['csub_expire_dt']));
												$now = date('Y-m-d');
												$dif = date_diff(date_create($now),date_create($exp)); 
												$left = $dif->format('%R%a');
												if($left > 0){ ?>
													<h5 class=" brand-text m0 mb10"><?php echo (!empty($subdetails['pr_name']))?$subdetails['pr_name'] :'Free Package' ?></h5>
													<p class=" black-text ft10">
														<span style="font-size:14px" class=" bold"><?php echo $subdetails['csub_nojobs'] ?> </span><?php echo ($subdetails['csub_nojobs'] > 0)?'Jobs left':'Job left' ?>
													</p>
													<p class=" black-text ft10">
														<span style="font-size:14px" class=" bold"><?php echo $dif->format('%a') ?></span> Days Left
													</p>
											<?php }else{ ?>
												<h5 class=" m0 mb10 red-text">Expired</h5>
												<a href="<?php echo base_url('Subscriptions') ?>" class="blue-text">Update Package</a>
											<?php } ?>
										</div>	
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="tab-buttons show-on-large hide-on-med-and-down">
						<ul class="tabs1 transparent">
					        <li class="tab1 col s3"><a href="#personal-detail" class="active">Personal Details</a></li>
					        <li class="tab1 col s3"><a href="#profile" >Profile</a></li>
					        <li class="tab1 col s3"><a href="#experience" >Work Experience</a></li>
					        <li class="tab1 col s3"><a href="#education">Educational Qualification</a></li>
					    </ul>
					</div><!-- end tab buttons -->
					<!-- Personal Details -->
					<div class="card scrollspy" id="personal-detail">
						<div class="card-content">
							<a href="#personal-detail-popup" class="edite-layout right waves-effect  modal-trigger"><i class="material-icons font25 mr10">create</i><span style="position: relative; top: -7px;">Edit</span></a>
							<p class="bold mb10 h6">Personal Details</p>
							<table>
								<tr>
									<th class="w205"><i class="material-icons mr10 back-icon">person_outline</i> Name</th>
									<td><?php echo $formdata['cfname'].' '.$formdata['clname']; ?></td>
								</tr>
								<tr>
									<th class="w205"><i class=" mr10 back-icon material-icons">blur_circular</i> Gender</th>
									<td><?php echo $formdata['gender']; ?></td>
								</tr>
								<tr>
									<th class="w205"><i class="material-icons  mr10 back-icon">date_range</i> Date of Birth</th>
									<td><?php echo $formdata['cdob']; ?></td>
								</tr>
								<tr>
									<th class="w205"><i class="material-icons  mr10 back-icon">mail_outline</i> Email ID</th>
									<td><?php echo $formdata['cmail']; ?></td>
								</tr>
								<tr>
									<th class="w205"><i class="material-icons mr10 back-icon">place</i>Nationality</th>
									<td><?php echo $formdata['nation']; ?></td>
								</tr>
							</table>
						</div>
					</div> <!-- end Personal Details -->



					<!-- Profile Details -->
					<div class="card scrollspy" id="profile">
						<div class="card-content">
							<a href="#profile-detail-popup" class="edite-layout right waves-effect modal-trigger"><i class="material-icons font25 mr10">create</i><span style="position: relative; top: -7px;">Edit</span></a>
							<p class="bold mb10 h6">Profile</p>
							<ul class="profile-box">
								<li class="profile-items">
									<div class="profile-item-title">
										<i class="fas fa-id-card-alt"></i>
										<span>Current Designation</span>
									</div>
									<div class="profile-item-content">
										<span><?php echo (!empty($formdata['cdesig'])) ? $formdata['cdesig']:"_______"; ?></span>
									</div>
								</li>
								<li class="profile-items">
									<div class="profile-item-title">
										<i class="fas fa-building"></i>
										<span>Current Company </span>
									</div>
									<div class="profile-item-content">
										<span><?php echo (!empty($formdata['ccomp'])) ? $formdata['ccomp']:"_______"; ?></span>
									</div>
								</li>
								<li class="profile-items">
									<div class="profile-item-title">
										<i class="far fa-id-card"></i>
										<span>Function Area</span>
									</div>
									<div class="profile-item-content">
										<span><?php echo (!empty($formdata['cfarea'])) ? $formdata['cfarea']:"_______"; ?></span>
									</div>
								</li>
								<li class="profile-items">
									<div class="profile-item-title">
										<i class="fas fa-anchor"></i>
										<span>Industry </span>
									</div>
									<div class="profile-item-content">
										<span><?php echo (!empty($formdata['cindustry'])) ? $formdata['cindustry']:"_______"; ?></span>
									</div>
								</li>
								<li class="profile-items">
									<div class="profile-item-title">
										<i class="fas fa-briefcase"></i>
										<span>Experience</span>
									</div>
									<div class="profile-item-content">
										<span><?php echo (!empty($formdata['cexp'])) ? $formdata['cexp']:"_______"; ?></span>
									</div>
								</li>
								<li class="profile-items">
									<div class="profile-item-title">
										<i class="fas fa-map-marked-alt"></i>
										<span>Preferred Location</span>
									</div>
									<div class="profile-item-content">
										<span><?php echo (!empty($preffered)) ? $preffered:"_______"; ?></span>
									</div>
								</li>
								<li class="profile-items">
									<div class="profile-item-title">
										<i class="fas fa-map-marker-alt"></i>
										<span>Current Location</span>
									</div>
									<div class="profile-item-content">
										<span><?php echo (!empty($formdata['ccurrloc'])) ? $formdata['ccurrloc']:"_______"; ?></span>
									</div>
								</li>
								<li class="profile-items">
									<div class="profile-item-title">
										<i class="fas fa-hand-holding-usd"></i>
										<span>Current Salary</span>
									</div>
									<div class="profile-item-content">
										<span><?php echo (!empty($formdata['csal'])) ? '$ '.$formdata['csal'] : "_______"; ?></span>
									</div>
								</li>
							</ul>
						</div>
					</div> <!-- end Profile Details -->

					<!-- Work Experience -->
					<div class="card scrollspy" id="experience">
						<div class="card-content">
							<a href="#work-experience-popup" class="edite-layout right waves-effect modal-trigger"><i class="material-icons font25 mr10">add</i><span style="position: relative; top: -7px;">Add</span></a>
							<p class="bold mb10 h6">Work Experience</p>
							<div class="table-box hide-on-med-and-down">
								<table class="highlight responsive-table">
									<thead>
										<th><i class="fas fa-id-card-alt"></i> Designation</th>
										<th><i class="fas fa-building"></i> Current Company</th>
										<th><i class="fas fa-calendar-alt"></i> From</th>
										<th><i class="fas fa-map-marker-alt"></i> Location</th>
										<th></th>
									</thead>
									<tbody>
										<?php foreach ($cwork as $work) 
										{ ?>
										
										<?php 
												$mfdate = '01-'.$work->cexp_from_mon.'-'.$work->cexp_from_yr;
												$mtdate = '01-'.$work->cexp_to_mon.'-'.$work->cexp_to_yr;
												$from   = date('M Y',strtotime($mfdate));
												$to     = date('M Y',strtotime($mtdate));
												if($work->cexp_present == 1){
													$to = 'Present';
												}
												else{
													$to     = date('M Y',strtotime($mtdate));
												}
										?>
										<tr>
											<td><?php echo (!empty($work->cexp_position)) ? $work->cexp_position : '_______' ;?></td>
											<td><?php echo (!empty($work->cexp_company)) ? $work->cexp_company : '_______' ;?></td>
											<td><?php echo $from .' to '. $to ?></td>
											<td><?php echo (!empty($work->cexp_location)) ? $work->cexp_location : '_______' ;?></td>
											<td>
												<a  class="edite-layout right red-text waves-effect delete-works"   href="<?php echo base_url()?>delete-experience?workid=<?php echo $work->cexp_encrypt_id; ?>"><i class="material-icons ">delete</i></a>

												<a href="<?php echo base_url()?>edite-experience?workid=<?php echo $work->cexp_encrypt_id; ?>" class="edite-layout left waves-effect"><i class="material-icons ">create</i></a>

											</td>
										</tr>

										<?php } ?>
										
									</tbody>
								</table>
							</div>

							<div class="exp-mob show-on-medium-and-down  hide-on-large-only">
								<div class="row">
									<div class="col m12 s12 ">
										<div class="set-box">
											<?php foreach ($cwork as $work) 
											{ ?>
											
											<?php 
													$mfdate = '01-'.$work->cexp_from_mon.'-'.$work->cexp_from_yr;
													$mtdate = '01-'.$work->cexp_to_mon.'-'.$work->cexp_to_yr;
													$from   = date('M Y',strtotime($mfdate));
													$to     = date('M Y',strtotime($mtdate));
													if($work->cexp_present == '0')
														{
															$to = 'Present';
														}
											?>
											<ul class="exp-items-box grey lighten-4">
												<li class="exp-items right">
													<a  class="edite-layout right red-text waves-effect mr10 delete-works"   href="<?php echo base_url()?>delete-experience?workid=<?php echo $work->cexp_encrypt_id; ?>"><i class="material-icons ">delete</i></a>

												<a href="<?php echo base_url()?>edite-experience?workid=<?php echo $work->cexp_encrypt_id; ?>" class="edite-layout left waves-effect"><i class="material-icons ">create</i></a>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-id-card-alt"></i> Designation
													</div>
													<div class="exp-items-content">
														<span><?php echo (!empty($work->cexp_position)) ? $work->cexp_position : '_______' ;?></span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-building"></i> Current Company
													</div>
													<div class="exp-items-content">
														<span><?php echo (!empty($work->cexp_company)) ? $work->cexp_company : '_______' ;?></span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-calendar-alt"></i> From
													</div>
													<div class="exp-items-content">
														<span><?php echo $from .' to '. $to ?></span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-map-marker-alt"></i> Location
													</div>
													<div class="exp-items-content">
														<span><?php echo (!empty($work->cexp_location)) ? $work->cexp_location : '_______' ;?></span>
													</div>
												</li>
											</ul>
											<?php } ?>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div><!-- End Work Experiance -->


					<!-- Education -->
					<div class="card scrollspy" id="education">
						<div class="card-content">
							<a href="#education-popup" class="edite-layout right waves-effect modal-trigger"><i class="material-icons font25 mr10">add</i> <span style="position: relative; top: -7px;">Add</span></a>
							<p class="bold mb10 h6">Education</p>
							<div class="table-box hide-on-med-and-down">
								<table class="highlight responsive-table">
									<thead>
										<th><i class="fas fa-building"></i> Name of the institution</th>
										<th><i class="fas fa-graduation-cap"></i> Grade / Degree</th>
										<th><i class="fas fa-calendar-alt"></i> From Year</th>
										<th><i class="fas fa-calendar-alt"></i> To Year</th>
										<th></th>
									</thead>
									<tbody>
										<?php if(!empty($cedu_details)) { $x=0; foreach ($cedu_details as $educdetails) { $x++; ?>
                                        <?php
                                            if($x%2 == 0)
                                            {
                                                $tdcls = 'even pointer';
                                            }
                                            else
                                            {
                                                $tdcls = 'odd pointer';
                                            }
                                        
                                            $startyear = ($educdetails->cedu_startdt)?$educdetails->cedu_startdt:0;
                                            $endyear = ($educdetails->cedu_enddt)?$educdetails->cedu_enddt:0;

                                            if(isset($educdetails->cedu_school)) { 
                                        ?>
										
										<tr>
											<td><?php echo $educdetails->cedu_school;?></td>
											<td><?php echo $educdetails->deg_type_sdisplay;?></td>
											<td><?php echo $startyear;?></td>
											<td><?php echo $endyear;?></td>
											<td>
												<a href="<?php echo base_url() ?>Dashboard/edite_edution?edu=<?php echo $educdetails->cedu_encrypt_id; ?>" class="edite-layout left  waves-effect"><i class="material-icons ">create</i></a>
												<a href="<?php echo base_url() ?>Dashboard/delete_edution?edu=<?php echo $educdetails->cedu_encrypt_id; ?>" class="edite-layout right red-text waves-effect del-btn" ><i class="material-icons ">delete</i></a>
											</td>
										</tr>

										<?php } } } ?>
									</tbody>
								</table>
							</div>

							<div class="exp-mob show-on-medium-and-down  hide-on-large-only">
								<div class="row">
									<div class="col m12 s12 ">
										<div class="set-box">
											<?php if(!empty($cedu_details)) { $x=0; foreach ($cedu_details as $educdetails) { $x++; ?>
	                                        <?php
	                                            if($x%2 == 0)
	                                            {
	                                                $tdcls = 'even pointer';
	                                            }
	                                            else
	                                            {
	                                                $tdcls = 'odd pointer';
	                                            }
	                                        
	                                            $startyear = ($educdetails->cedu_startdt)?$educdetails->cedu_startdt:0;
	                                            $endyear = ($educdetails->cedu_enddt)?$educdetails->cedu_enddt:0;

	                                            if(isset($educdetails->cedu_school)) { 
	                                        ?>
											<ul class="exp-items-box grey lighten-4">
												<li class="exp-items right">
													<a href="<?php echo base_url() ?>Dashboard/?edu=<?php echo $educdetails->cedu_encrypt_id; ?>" class="edite-layout left mr10  waves-effect"><i class="material-icons ">create</i></a>
												<a href="<?php echo base_url() ?>Dashboard/delete_edution?edu=<?php echo $educdetails->cedu_encrypt_id; ?>" class="edite-layout right red-text waves-effect del-btn" ><i class="material-icons ">delete</i></a>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-building"></i> Name of the institution
													</div>
													<div class="exp-items-content">
														<span><?php echo $educdetails->cedu_school;?></span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-graduation-cap"></i> Grade / Degree
													</div>
													<div class="exp-items-content">
														<span><?php echo $educdetails->deg_type_sdisplay;?></span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-calendar-alt"></i> From Year
													</div>
													<div class="exp-items-content">
														<span><?php echo $startyear;?></span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-calendar-alt"></i> From Year
													</div>
													<div class="exp-items-content">
														<span><?php echo $endyear;?></span>
													</div>
												</li>
											</ul>
										<?php } } } ?>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div><!-- End education -->

						<div class="card " >
						<div class="card-content">
							<a href="#social-media-popup" class="edite-layout right waves-effect  modal-trigger"><i class="material-icons font25 mr10">create</i><span style="position: relative; top: -7px;">Edit</span></a>
							<p class="bold mb10 h6">Social Media</p>
							<ul class="social-link-boxs">
								<li><i class="fab fa-facebook-f"></i><?php echo ($formdata['fburl']=='')?'Not Set':$formdata['fburl']; ?></li>
								<li><i class="fab fa-linkedin-in "></i><?php echo ($formdata['linkurl']=='')?'Not Set':$formdata['linkurl']; ?></li>
								<li><i class="fab fa-twitter"></i><?php echo ($formdata['twurl']=='')?'Not Set':$formdata['twurl']; ?></li>
								<li><i class="fab fa-google-plus-g"></i><?php echo ($formdata['gurl']=='')?'Not Set':$formdata['gurl']; ?></li>
							</ul>
						</div>
					</div> <!-- end Personal Details -->

				</div>
			</div>
		</div>
	</section>
	


<!-- footer -->
	<?php echo include'include/footer.php' ?>
<!-- end footer -->

<!-- profile pop up -->

<!-- personal-detail -->

  <div id="personal-detail-popup" class="modal" style="overflow: visible;">
    <div class="modal-content1">
    	<div class="presonal-head-required">
		<h6 class="gray-text pre-text-control">Personal Detail</h6>
		<i class="material-icons pos-close modal-close">close</i>
	</div>
      	<form class="hide-form" method="post" action="<?php echo base_url()?>Dashboard/personal_update">
      		<div class="mar-top-pop">
            <div class="row m0">
            	<div class="col s12 l6 m6">
            		<label class="lable-text" for="fname">First Name</label>
				<input id="fname" name="fname" type="text" class="validate borderd-0" placeholder="Enter your first name" style="border-radius: 0; height: 38px;" value="<?php echo $formdata['cfname'] ?>">
            </div>
            <div class="col s12 l6 m6">
            		<label class="lable-text" for="lname">Last Name</label>
				<input id="lname" name="lname" type="text" class="validate borderd-0" placeholder="Enter your last name" style="border-radius: 0; height: 38px;" value="<?php echo $formdata['clname'] ?>">
            </div>
        	</div>
            <div class="row m0">
            <div class="col s12 l6 m6">
            		<label class="lable-text" for="email">Email ID</label>
				<input id="email" name="email" type="email" class="validate borderd-0" placeholder="Enter your email address" style="border-radius: 0; height: 38px;" value="<?php echo $formdata['cmail']; ?>">
            </div>
            <div class="col s12 l6 m6">
            	<label class="lable-text" for="contact">Contact Number</label>
            	<input style="width:30%;" type="hidden" class="form-control" placeholder="Code" value="<?php $formdata['cccode'] ?>"  name="cntrycode" id="cntrycode" tabindex="3">
				<input id="phone" type="tel" class="validate" style="max-width: 300px" maxlength="16" placeholder="Contact Number" value="<?php echo $formdata['cphone']; ?>" name="contact"  tabindex="4" required>
	        </div>
	        </div>
            <div class="row m0">
            <div class="col s12 l6 m6">
            	<label class="lable-text">Gender</label>
            	<p>
            		<label>
            			<input class="with-gap" name="gender" type="radio" value="Male" <?php echo ($formdata['gender'] == 'Male')?'checked':''; ?>/>
            			<span class="radio-text" >Male</span>
            		</label>
            		<label>
            			<input class="with-gap" name="gender" type="radio" value="Female" <?php echo ($formdata['gender'] == 'Female')?'checked':''; ?>/>
            			<span class="radio-text">Female</span>
            			
            		</label>
            		<label>
            			<input class="with-gap" name="gender" type="radio" value="Other" <?php echo ($formdata['gender'] == 'Other')?'checked':''; ?>/>
            			<span class="radio-text">Other</span>
            			
            		</label>
            	</p>
            </div>
            <div class="col s12 l6 m6">
               <label class="lable-text" for="dob" style="display: block;">Date Of Birth </label>
                <input type="text" name="dob" class="datepicker validate borderd-0" id="dob" placeholder="Select Date" style="border-radius: 0; height: 38px;" value="<?php echo $formdata['cdob']; ?>">
            </div>
            </div>
            <div class="row m0">
            <div class="col s12 l12 m12">
               <label class="lable-text">Nationality</label>
                <?php echo form_dropdown('nation',$nation_list,$formdata['co_id'],'  required');?>
            </div>
            </div>
        </div>
    </div>
    <div class="presonal-head-required1 right-align">
    	<a  class="btn-flat waves-effect black-text modal-close">Cancel</a>
		<button  type="submit" class="btn brand waves-effect white-text">Save</button>
	</div>
		</form>
  </div>
</div>
  


<!-- profile detail -->
  <div id="profile-detail-popup" class="modal white">
    <div class="modal-content1">
    	<div class="presonal-head-required">
		<h6 class="gray-text pre-text-control">Profile</h6>
		<i class="material-icons pos-close modal-close">close</i>
	</div>
      	<form class="hide-form" method="post" action="<?php echo base_url().'Dashboard/profile_upload/'.$formdata['encrypt_id']; ?>">
      		<div class="mar-top-pop">
            <div class="row m0">
	            <div class="col s12 l6 m6">
	            	<label class="lable-text" for="desg">Destination</label>
					<input id="desg" type="text" name="desg" class="validate borderd-0" placeholder="Ex: Sales Marketing & Executive" style="border-radius: 0;" value="<?php echo $formdata['cdesig']?>">
	            </div>
	            <div class="col s12 l6 m6">
	            		<label class="lable-text" for="ccomp">Current Company</label>
					<input id="ccomp" type="text" name="ccomp" class="validate borderd-0" placeholder="Enter your Current Company" style="border-radius: 0;" value="<?php echo $formdata['ccomp']?>">
	            </div>
			</div>
			<div class="row m0">
	            <div class="col s12 l6 m6">
	            		<label class="lable-text" for="cfarea">Functional Area</label>
					
					<?php echo form_dropdown('cfarea',$funarea_list,$formdata['fun_id'],'id="funarea" class=" form-control" tabindex="9" required');?>
	            </div>
	            <div class="col s12 l6 m6">
	            	<label class="lable-text" for="cexp">Experience</label>
					    <select name="cexp">
					    	<option disabled selected>Total Exp</option>
                                        <option <?php echo ($formdata['cexp']=="0" || $formdata['cexp']=="00" || $formdata['cexp']=="Fresher")?'selected':''; ?> value="Fresher">Fresher</option>
                                        <option <?php echo ($formdata['cexp']=="01")?'selected':''; ?> value="01">1 Year</option>
                                        <option <?php echo ($formdata['cexp']=="02")?'selected':''; ?> value="02">2 Years</option>
                                        <option <?php echo ($formdata['cexp']=="03")?'selected':''; ?> value="03">3 Years</option>
                                        <option <?php echo ($formdata['cexp']=="04")?'selected':''; ?> value="04">4 Years</option>
                                        <option <?php echo ($formdata['cexp']=="05")?'selected':''; ?> value="05">5 Years</option>
                                        <option <?php echo ($formdata['cexp']=="06")?'selected':''; ?> value="06">6 Years</option>
                                        <option <?php echo ($formdata['cexp']=="07")?'selected':''; ?> value="07">7 Years</option>
                                        <option <?php echo ($formdata['cexp']=="08")?'selected':''; ?> value="08">8 Years</option>
                                        <option <?php echo ($formdata['cexp']=="09")?'selected':''; ?> value="09">9 Years</option>
                                        <option <?php echo ($formdata['cexp']=="10")?'selected':''; ?> value="10">10 Years</option>
                                        <option <?php echo ($formdata['cexp']=="11")?'selected':''; ?> value="11">11 Years</option>
                                        <option <?php echo ($formdata['cexp']=="12")?'selected':''; ?> value="12">12 Years</option>
                                        <option <?php echo ($formdata['cexp']=="13")?'selected':''; ?> value="13">13 Years</option>
                                        <option <?php echo ($formdata['cexp']=="14")?'selected':''; ?> value="14">14 Years</option>
                                        <option <?php echo ($formdata['cexp']=="15")?'selected':''; ?> value="15">15 Years</option>
                                        <option <?php echo ($formdata['cexp']=="16")?'selected':''; ?> value="16">16 Years</option>
                                        <option <?php echo ($formdata['cexp']=="17")?'selected':''; ?> value="17">17 Years</option>
                                        <option <?php echo ($formdata['cexp']=="18")?'selected':''; ?> value="18">18 Years</option>
                                        <option <?php echo ($formdata['cexp']=="19")?'selected':''; ?> value="19">19 Years</option>
                                        <option <?php echo ($formdata['cexp']=="20")?'selected':''; ?> value="20">20 Years</option>
                                        <option <?php echo ($formdata['cexp']=="21")?'selected':''; ?> value="21">21 Years</option>
                                        <option <?php echo ($formdata['cexp']=="22")?'selected':''; ?> value="22">22 Years</option>
                                        <option <?php echo ($formdata['cexp']=="23")?'selected':''; ?> value="23">23 Years</option>
                                        <option <?php echo ($formdata['cexp']=="24")?'selected':''; ?> value="24">24 Years</option>
                                        <option <?php echo ($formdata['cexp']=="25")?'selected':''; ?> value="25">25 Years</option>
                                        <option <?php echo ($formdata['cexp']=="26")?'selected':''; ?> value="26">26 Years</option>
                                        <option <?php echo ($formdata['cexp']=="27")?'selected':''; ?> value="27">27 Years</option>
                                        <option <?php echo ($formdata['cexp']=="28")?'selected':''; ?> value="28">28 Years</option>
                                        <option <?php echo ($formdata['cexp']=="29")?'selected':''; ?> value="29">29 Years</option>
                                        <option <?php echo ($formdata['cexp']=="30")?'selected':''; ?> value="30">30 Years</option>
                                        <option <?php echo ($formdata['cexp']=="31")?'selected':''; ?> value="31">30+ Years</option>
					    </select>
	            </div>
	        </div>
			<div class="row m0">
	           
	            <div class="col s12 l6 m6">
	               <label class="lable-text" for="csal">Current salary</label>
	            	<input id="csal" name="csal" type="text" class="validate borderd-0" placeholder="$20,000" style="border-radius: 0; " value="<?php echo $formdata['csal']?>">
	            </div>

	             <div class="col s12 l6 m6">
	            	<label class="lable-text" for="cindustry">Industry </label>
	            	<?php echo form_dropdown('cindustry',$ind_list,$formdata['ind_id'],'id="industry" class=" form-control" tabindex="10"');?>

	            </div>
	        </div>
			<div class="row m0">
	            <div class="col s12 l6 m6">
	            	<label class="lable-text">Current Location</label>
	            	 <?php echo form_dropdown('ccurrloc',$country_list,$formdata['ccurrloc'],'id="currloc" class=" form-control" tabindex="5" required');?>

	            </div>
	            <div class="col s12 l6 m6">
	               <label class="lable-text" for="preffered">Preferred Location</label>
	            	
	            	<?php echo form_dropdown('preffered[]',$pre_country_list,$formdata['preloc'],'id="preloc" class="form-control" tabindex="7" multiple="multiple" ');?>
	            </div>
	        </div>
			<div class="row ">
	            <div class="col s12 l12 m12">
	               <label class="lable-text" for="cskills">Skills</label>
	            	<input id="skillstags"  name="cskills" type="text" value="<?php echo $formdata['cskills']; ?>">
	            </div>
	          </div>
	            <div class="row m0">
	            <div class="col l12 s12 m12">
	            	<label for="textarea2" class="lable-text" for="csummary">Profikle Summary</label>
	            	<textarea id="textarea2" name="csummary" class="materialize-textarea" ><?php echo $formdata['csummary']; ?></textarea>
	            </div>
        	</div>
    </div>
    <div class="presonal-head-required1 right-align">
    	<a  class="btn-flat waves-effect black-text modal-close">Cancel</a>
		<button type="submit" class="btn brand waves-effect white-text">Save</button>
	</div>
		</form>
  </div>
</div>
          
<!-- work-experience detail -->
  <div id="work-experience-popup" class="modal">
    <div class="modal-content1">
    	<div class="presonal-head-required">
		<h6 class="gray-text pre-text-control">Work Experience</h6>
		<i class="material-icons pos-close modal-close">close</i>
	</div>
      	<form method="post" name="smfrm" action="<?php echo $this->config->base_url().'addwork/'.$formdata['encrypt_id'];?>" data-toggle="validator" role="form">
      		<div class="mar-top-pop">
            <div class="row ">
            	<div class="col s12 l6 m6">
            		<label class="lable-text">Employer</label>
				<input id="last_name"  class="validate borderd-0" type="text"  placeholder="Employer" value="" name="company" id="company" required style="border-radius: 0; height: 38px;">
            </div>
            <div class="col s12 l6 m6">
                       	<label class="lable-text">Location</label>
            	<input id="last_name" type="text" class="validate borderd-0" placeholder="Company Location" value="" name="location" id="location" required style="border-radius: 0; height: 38px;">
            </div>

            <div class="col s12 l6 m6">
               <label class="lable-text">Position</label>
               <input id="last_name" type="text" class="validate borderd-0" name="position" placeholder="Position" style="border-radius: 0; height: 38px;">
            </div>
             <div class="col s12 l6 m6">
             	<div class="ptb30">
	               <label>
			        <input type="checkbox" name="cmp_present" id="present-check" value="1"/>
			        <span>Current Employer </span>
			      </label>
		      </div>
            </div>

            <div class="col s12 l6 m6">
               <label class="lable-text">From Date</label>
               <div class="row m0">
               	<div class="col s6 m6 l6">
               		<?php echo form_dropdown('frmmon',$month_list,'','id="frmmon" class="" tabindex="1" style="width:45%;border-radius: 0; height: 38px;" required');?>
               	</div>
               	<div class="col s6 m6 l6">
               	 <?php echo form_dropdown('frmyr',$year_list,'','id="frmyr" class="" tabindex="1" style="width:45%;border-radius: 0; height: 38px;" required');?>
               	</div>
               </div>
                
                
            </div>
            <div class="col s12 l6 m6">
               <label class="lable-text">To Date</label>
                <div class="row m0" id="todis">
	               	<div class="col s6 m6 l6">
	               		<?php echo form_dropdown('tomon',$month_list,'','id="tomon" class=" form-control" tabindex="1" style="width:45%;" required');?>
	               	</div>
	               	<div class="col s6 m6 l6">
	               	 <?php echo form_dropdown('toyr',$year_list,'','id="toyr" class=" form-control" tabindex="1" style="width:45%;" required');?>
	               	</div>
               </div>
            </div>

            
            <div class="col l12 s12 m12">
            	<label for="textarea2" class="lable-text">Key Responsibility</label>
            	<textarea id="textarea2" class="materialize-textarea" class="form-control" placeholder="Key Resposibility" name="keyrole" data-length="2000"></textarea>    
            </div>
        </div>
    </div>
    <div class="presonal-head-required1 right-align" style="overflow: hidden;">
    	<a class="btn-flat waves-effect black-text modal-close">Cancel</a>
		<button class="btn brand waves-effect white-text" type="submit" value="Update">Save</button>
	</div>
	</form>
  </div>
</div>
          

<!-- Eductation detail -->
  <div id="education-popup" class="modal">
    <div class="modal-content1">
    	<div class="presonal-head-required">
		<h6 class="gray-text pre-text-control">Education</h6>
		<i class="material-icons pos-close modal-close">close</i>
	</div>
      	<form class="hide-form" method="post" name="edufrm" id="edufrm" action="<?php echo $this->config->base_url().'UpdateEduDetails/'.$formdata['encrypt_id'];?>">
      		<div class="mar-top-pop">
            <div class="row ">
            	<div class="col s12 l12 m12">
            		<label class="lable-text">School / University</label>
				<input  type="text" class="validate borderd-0"  placeholder="School/University" value="" name="school" id="school" required style="border-radius: 0; height: 38px;">
            </div>
            <div class="col s12 l6 m6">
                       	<label class="lable-text">Qualification</label>
            	<?php echo form_dropdown('degree_type',$degree_type_list,'','id="degree_type" class=" form-control" tabindex="1" required');?>
            </div>
            <div class="col s12 l6 m6">
                       	<label class="lable-text">Degree</label>
            	<?php echo form_dropdown('degree',$degree_list,'','id="degree" class=" form-control" tabindex="1" required');?>
            </div>
            <div class="col s12 l12 m12">
               <label class="lable-text">Specialization</label>
               <input  type="text" class="validate borderd-0" placeholder="Specialization" value="" name="spec" id="spec" required style="border-radius: 0; height: 38px;">
            </div>
            <div class="col s12 l6 m6">
               <label class="lable-text">From</label>
                <?php echo form_dropdown('edufrmyr',$year_list,'','id="edufrmyr" class=" form-control" tabindex="1" required');?>
            </div>
            <div class="col s12 l6 m6">
               <label class="lable-text">To</label>
                <?php echo form_dropdown('edutoyr',$year_list,'','id="edutoyr" class=" form-control" tabindex="1" required');?>
            </div>
        </div>
    </div>
    <div class="presonal-head-required1 right-align">
    	<a  class="btn-flat waves-effect black-text modal-close">Cancel</a>
		<button type="submit" value="Update" class="btn brand waves-effect white-text">Save</button>
	</div>
		</form>
  </div>
</div>

 <!-- Modal Structure -->
  <div id="upload-resume" class="modal">
    <div class="modal-content">
      <h5>Upload New Resume</h5>
      <div class="divider"></div>
      	<form method="post" name="cvfrm" id="cvfrm" action="<?php echo $this->config->base_url().'UpdateResume/'.$formdata['encrypt_id'];?>" enctype="multipart/form-data">
      		<br>
            <div class="col s12 m10 input-field">
                <input type="text" class="form-control" placeholder="Resume Heading" value="<?php echo $formdata['resumehead']; ?>" name="resumehead" id="resumehead" required>

                <label for="resumehead"><span id="resumehead_validate"></span></label>
            </div>
            <div class="col s12 m10">
                <label for="resumehead"><span id="fileToUpload_validate"></span></label>
                <div class="form-group">
                    <input type="file" class="form-control input_syle" id="fileToUpload" name="fileToUpload" required accept=".doc, docx, .pdf">
                </div>
            </div>
            <div class="col s12 m10 ">
            	<a href="#!" class="modal-close waves-effect waves-green btn-flat right">Close</a>
                <button type="submit" value="" class="btn aves-effect waves-green right">Update</button>
            </div>
        </form>
    </div>
    <div class="modal-footer">
      
    </div>
  </div>
          


<!-- social media -->
  <div id="social-media-popup" class="modal">
    <div class="modal-content1">
    	<div class="presonal-head-required">
		<h6 class="gray-text pre-text-control">Social Media</h6>
		<i class="material-icons pos-close modal-close">close</i>
	</div>
      	<form method="post" name="smfrm" action="<?php echo $this->config->base_url().'UpdateSocialMedia/'.$formdata['encrypt_id'];?>" data-toggle="validator" role="form">
      		<div class="mar-top-pop">
            <div class="row ">
            	<div class="col s12 l12 m12">
            		<label class="lable-text">Facebook</label>
				 <input type="text" class="form-control" placeholder="Facebook" name="fblink" value="<?php echo $formdata['fburl'];?>" id="fblink">
            </div>
            	<div class="col s12 l12 m12">
            		<label class="lable-text">LinkedIn</label>
				<input type="text" class="form-control" placeholder="Linked In" name="linlink" value="<?php echo $formdata['linkurl'];?>" id="linlink">
            </div>
                <div class="col s12 l12 m12">
            		<label class="lable-text">Twitter</label>
				<input type="text" class="form-control" placeholder="Twitter" name="twittlink" value="<?php echo $formdata['twurl'];?>" id="twittlink">
            </div>
                        	<div class="col s12 l12 m12">
            		<label class="lable-text">Google +</label>
				 <input type="text" class="form-control" placeholder="Google+" name="gpluslink" value="<?php echo $formdata['gurl'];?>" id="gpluslink">
            </div>
          
        </div>
    </div>
    <div class="presonal-head-required1 right-align">
    	<a  class="btn-flat waves-effect black-text modal-close">Cancel</a>
		<button type="submit" value="Update" class="btn brand waves-effect white-text">Save</button>
	</div>
		</form>
  </div>
</div>



  <!-- Modal Trigger -->

  <!-- Modal Structure -->
  <div id="mds" class="modal">
    <div class="modal-content">
      <!-- <h4>Modal Header</h4> -->
	  <h6 class="">Take a psychometric test. psychometric will increez your profile view.</h6>
	  <div>
	  	<a href="#!" class="modal-close waves-effect mb-20 btn red white-text waves-green right">Close</a>
	  	<a href="<?php echo base_url() ?>questionnaire" class="waves-effect mb-20 btn brand white-text waves-green right mr10">Take test</a>
	  </div>
    </div>
   
  </div>


<!-- end popup -->



	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/script.js"></script>
	<script src="<?php echo $this->config->item('web_url');?>assets/js/intlTelInput.js"></script>
	<script src="<?php echo $this->config->item('web_url');?>assets/js/tagsinput.min.js"></script>
	
	

	<script>
	$(document).ready(function(){
		if('<?php echo $this->session->userdata("tectcheck") ?>' == 1)
		{
			$('.datepicker').datepicker();
			setTimeout(function(){
				$('#mds').modal('open');
			}, 3000);
		}
		 
		
		 
		$('select').formSelect();
		$('.tooltipped').tooltip();
		$('#skillstags').tagsInput();
		$('#present-check').change(function(){
			if(this.checked){
				
				$('#todis input.select-dropdown').attr('disabled','true');
				$('#todis input.select-dropdown, #tomon, #toyr').removeAttr('required','true');

			}
			if(this.checked==false){
				$('#todis input.select-dropdown').removeAttr('disabled','true');
				$('#todis input.select-dropdown, #tomon, #toyr').attr('required','true');
			}
		});


		/* delete work expirieons */
		$('.delete-works, .del-btn').click(function() {
			if (confirm("Are you sure?")) {
        		return true;
		    }
		    else
		    {
		    	return false;
		    }
		    
		});
	});



		
	function showwork(exp_id)
	{
		var exp_id = exp_id;	
		  var title = "Edit work experience";
		var url = "<?php echo $this->config->base_url().'GetWork/'; ?>" + exp_id + "/?height=499&width=626&modal=true";
		  showpop(title,url);
	}
	
	function showedu(edu_id)
	{
		var edu_id = edu_id;	
		var title = "Edit education details";
		var url = "<?php echo $this->config->base_url().'GetEduDetails/'; ?>" + edu_id + "/?height=489&width=626&modal=true";
		showpop(title,url);
	}

		$("#phone").intlTelInput({autoHideDialCode: true, nationalMode: true});
		$("#phone").on("countrychange", function(e, countryData) {$('#cntrycode').val(countryData['dialCode']) });
	</script>

	<script>
	
	</script>
</body>
</html>