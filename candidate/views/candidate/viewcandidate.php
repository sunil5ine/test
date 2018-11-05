	<!-- page content -->
	<div class="right_col" role="main">
    	<div class="">
                    <div class="page-title">
                    	<?php echo $message; ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <h3><?php echo $formdata['cfname'].' '.$formdata['clname']; ?> </h3>
                            <h2><?php echo $formdata['cfarea']; ?> - <?php echo ($formdata['cexp']); ?>year(s) of experience</h2>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-suitcase"></i> <strong>Candidate Details</strong></a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-eye"></i> <strong>View Resume</strong></a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                        <div class="col-md-8 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Basic Informations</h2> <a href="#basicModal" role="button" data-toggle="modal" id="basic_btn"><button class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-edit"></i> Edit</button></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-map-marker"></i> <strong>Current Location :</strong> <?php echo $formdata['ccurrloc'];?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-building"></i> <strong>Current Company :</strong> <?php echo $formdata['ccomp'];?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-clock-o"></i> <strong>Experience :</strong> <?php echo $formdata['cexp'].' Yrs';?>
                                                    </div>                                                    
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-sitemap"></i> <strong>Functional Area :</strong> <?php echo $formdata['cfarea']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-anchor"></i> <strong>Industry :</strong> <?php echo $formdata['cindustry']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-graduation-cap"></i> <strong>Education :</strong> <?php echo $formdata['cedu']; ?>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-calendar"></i> <strong>Date of Birth :</strong>  <?php echo $formdata['cdob']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-user"></i> <strong>Gender :</strong>  <?php echo $formdata['gender']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-flag"></i> <strong>Nationality :</strong> <?php echo $formdata['ccon']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-flag"></i> <strong>Willing to relocate? :</strong>  <?php echo ($formdata['creloc']==1)?'Yes':'No'; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-tags"></i> <strong>Skills :</strong>  <?php echo $formdata['cskills']; ?>
                                                    </div>
                                                    
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Profile Summary</h2> <a href="#summaryModal" role="button" data-toggle="modal" id="summary_btn"><button class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-edit"></i> Edit</button> </a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <?php echo $formdata['csummary']; ?>                      
                                                </div>
                                            </div>
                                            
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Work Experience</h2> <a href="#workModal" role="button" data-toggle="modal" id="work_btn"><button class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-edit"></i> Edit</button></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <?php 
														foreach($cwork as $wexp) 
														{ 
															$year1 = $wexp->cexp_from_yr;
															$year2 = $wexp->cexp_to_yr;
															
															$month1 = $wexp->cexp_from_mon;
															$month2 = $wexp->cexp_to_mon;
															
															/*$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
															if($diff > 12) {
																$totalyear = $diff/12;
																$expmsg = $totalyear.' year(s) of experience';
															} else {
																$expmsg = $diff.' month(s) of experience';
															}
															*/
															$dateObj1   = DateTime::createFromFormat('!m', $month1);
															$monthName1 = $dateObj1->format('F');
															
															$dateObj2   = DateTime::createFromFormat('!m', $month2);
															$monthName2 = $dateObj2->format('F');

															$expmsg = 'From :'.$monthName1.' '.$year1.' to '.$monthName2.' '.$year2;
													 		if(isset($wexp->cexp_company)) { 
													?>
                                                    	
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <p>
                                                        	<i class="fa fa-building"></i> <strong><?php echo (isset($wexp->cexp_company))?$wexp->cexp_company:'No Name'; ?>, <?php echo (isset($wexp->cexp_location))?$wexp->cexp_location:'Not Set'; ?></strong><br /> 
                                                            <em><i class="fa fa-history"></i> <?php echo $expmsg.' as '.$wexp->cexp_position;?></em>
                                                        </p>
                                                        <p>
                                                        <strong>Key Role :</strong>
                                                        <?php echo $wexp->cexp_key_role;?>
                                                        </p>
                                                    </div>
                                                    <?php } } ?>
                                                    
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    
                                        <div class="col-md-4 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Connect Details</h2> <a href="#contactModal" role="button" data-toggle="modal" id="contact_btn"><button class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-edit"></i> Edit</button></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-envelope"></i> <strong>Email ID :</strong>  <?php echo $formdata['cmail']; ?>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-phone-square"></i> <strong>Contact No :</strong> <?php echo $formdata['cphone']; ?>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Social Media Connections</h2> <a href="#smediaModal" role="button" data-toggle="modal" id="smedia_btn"><button class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-edit"></i> Edit</button></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <i class="fa fa-linkedin"></i> <strong>LinkedIn :</strong> <?php echo ($formdata['linkurl']=='')?'Not Set':$formdata['linkurl']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <i class="fa fa-facebook"></i> <strong>Facebook :</strong> <?php echo ($formdata['fburl']=='')?'Not Set':$formdata['fburl']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <i class="fa fa-twitter"></i> <strong>Twitter :</strong> <?php echo ($formdata['twurl']=='')?'Not Set':$formdata['twurl']; ?>
                                                    </div>
            
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <i class="fa fa-google-plus"></i> <strong>Google+ :</strong> <?php echo ($formdata['gurl']=='')?'Not Set':$formdata['gurl']; ?>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="x_panel">
                                                <!--<div class="x_title">
                                                    <h2>Job Settings</h2>
                                                    <div class="clearfix"></div>
                                                </div>-->
                                                <div class="x_content">
                                                    <br />
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-calendar"></i> <strong>Created On :</strong>  <?php echo ($formdata['createddt']==0)?'Not Set': date('d-M-Y', strtotime($formdata['createddt'])); ?>
                                                    </div>
                                                    
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-calendar"></i> <strong>Last Updated :</strong>  <?php echo ($formdata['updateddt']==0)?'Not Set': date('d-M-Y', strtotime($formdata['updateddt'])); ?>
                                                    </div>
                                                   
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                               
                                                                    <a href="#resumeModal" role="button" class="btn btn-success pull-right" data-toggle="modal" id="resume_btn"><i class="fa fa-edit"></i>  Update Resume </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Resume</h2> <a href="#resumeModal" role="button" data-toggle="modal" id="resume_btn1"><button class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-edit"></i> Update</button></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <br />
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                       <!--style="width: 1100px; height: 900px;" -->
                                                       <iframe src="http://docs.google.com/viewerng/viewer?url=<?php echo $formdata['cv_path']; ?>&embedded=true" style="width: 900px; height: 600px;" frameborder="0"></iframe>
                                                    </div>
                                         			
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    
                                    
                                </div>
                            </div>
                        </div>
						
                        <br />
                        <br />
                        <br />

                    </div>
                </div>
    	<!-- footer content -->
    	<?php echo $footer_nav; ?>
        <!-- /footer content -->
    </div>
    <!-- /page content -->
    
    <!-- ----------------------------------Modals--------------------------------------- -->
    
<div id="basicModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Basic Informations</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="row">
                        <form method="post" name="basicfrm" action="<?php echo $this->config->base_url().'UpdateBasic/'.$formdata['encrypt_id'];?>" data-toggle="validator" role="form">
                            <div class="col-md-6 space-top-12">
                            	<label for="firstname">First Name</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="First Name" value="<?php echo $formdata['cfname']; ?>" name="firstname" id="firstname" required >
                                </div>
                            </div>
                            <div class="col-md-6 space-top-12">
                            	<label for="lastname">Last Name</label>
                                <div class="form-group input-group">
                                	
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                    <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $formdata['clname']; ?>" name="lastname" id="lastname" required >
                                </div>
                            </div>
                            
                            <div class="col-md-4 space-top-12">
                            	<label for="dob">Date of birth</label>
                                 <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                    <input autocomplete="off" readonly type="text" class="form-control" value="<?php echo $formdata['cdob']; ?>" data-provide="datepicker" placeholder="Date of Birth" name="dob" id="dob" required>
                                 </div>
                             </div>
                             <div class="col-md-4 space-top-12">
                             	<label for="gender">Gender</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-female"></i><i class="fa fa-male"></i></span>
                                    <select name="gender" id="gender" class="form-control" required>
                                          <option disabled selected>Gender</option>
                                          <option <?php echo ($formdata['gender']=='Male')?'selected':''; ?> value="Male">Male</option>
                                          <option <?php echo ($formdata['gender']=='Female')?'selected':''; ?> value="Female">Female</option>
                                      </select>
                                  </div>
                             </div>
                             <div class="col-md-4 space-top-12">
                             	<label for="totexp">Total Experience</label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                <select name="totexp" id="totexp" class="form-control" required>
                                      <option disabled selected>Total Exp</option>
                                      <option <?php echo ($formdata['cexp']=="Fresher")?'selected':''; ?> value="Fresher">Fresher</option>
                                      <option <?php echo ($formdata['cexp']=="00")?'selected':''; ?> value="00">0 Year</option>
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
                             <div class="col-md-6 space-top-12">
                             	<label for="edu">Educational Qualification</label>
                                 <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                    <?php echo form_dropdown('edu',$edu_list,$formdata['edu_id'],'id="edu" class=" form-control" tabindex="1" required');?>
                                 </div>
                             </div>
                             
                             <div class="col-md-6 space-top-12">
                                 <label for="nation">Nationality</label>
                                 <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                      <?php echo form_dropdown('nation',$country_list,$formdata['co_id'],'id="nation" class=" form-control" tabindex="1" required');?>
                                 </div>
                             </div>
                             <div class="col-md-6 space-top-12">
                             	<label for="funarea">Functional Area</label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-windows"></i></span>
                                    <?php echo form_dropdown('funarea',$funarea_list,$formdata['fun_id'],'id="funarea" class=" form-control" tabindex="1" required');?>
                                </div>
                             </div>
                             <div class="col-md-6 space-top-12">
                             	<label for="funarea">Industry</label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-anchor"></i></span>
                                    <?php echo form_dropdown('industry',$ind_list,$formdata['ind_id'],'id="industry" class=" form-control" tabindex="1" required');?>
                                </div>
                             </div>
                             
                             <div class="col-md-6 space-top-12">
                             	<label for="cuttcompany">Current Company</label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                    <input type="text" class="form-control" placeholder="Current Employer" value="<?php echo $formdata['ccomp']; ?>" name="currcompany" id="currcompany" required>
                                </div>
                             </div>
                             <div class="col-md-6 space-top-12">
                             	<label for="currloc">Current Location</label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                    <input type="text" class="form-control" placeholder="Current Location" value="<?php echo $formdata['ccurrloc']; ?>" name="currloc" id="currloc" required>
                                </div>
                             </div>
                             
                            <div class="col-md-12 space-top-12">
                                <input type="submit" value="Update" class="btn btn-primary pull-right">
                            </div>
                        </form>
                    </div>                    
                </div>
                 <div class="clearfix"> </div>
            </div>
        </div>
    </div>
     <div class="clearfix"> </div>
</div>

<div id="summaryModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Profile Summary</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                   
                    <div class="row">
                        <form method="post" name="summaryfrm" action="<?php echo $this->config->base_url().'UpdateSummary/'.$formdata['encrypt_id'];?>" data-toggle="validator" role="form">
                            <div class="col-md-12 space-top-12">
                                <div class="form-group input-group">
                                    <textarea class="form-control" placeholder="Profile Summary" name="prosummary" id="prosummary" ><?php echo $formdata['csummary']; ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <input type="submit" value="Update" class="btn btn-primary pull-right">
                            </div>
                        </form>
                    </div>
                </div>
                 <div class="clearfix"> </div>
            </div>
        </div>
    </div>
     <div class="clearfix"> </div>
</div>

<div id="workModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Work Experience</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="row">
                        <form method="post" name="workfrm" action="<?php echo $this->config->base_url().'UpdateWork/'.$formdata['encrypt_id'];?>" data-toggle="validator" role="form">
                            <div class="col-md-12 space-top-12">
                                <label for="company">Company Name</label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                    <input type="text" class="form-control" placeholder="Company Name" value="" name="company" id="company" required>
                                </div>
                             </div>
                             <div class="col-md-12 space-top-12">
                                <label for="company">Location</label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                    <input type="text" class="form-control" placeholder="Company Location" value="" name="location" id="location" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 space-top-12">
                                <label for="company">From Date</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    <?php echo form_dropdown('frmmon',$month_list,'','id="frmmon" class=" form-control" tabindex="1" style="width:45%;" required');?>
                                    <?php echo form_dropdown('frmyr',$year_list,'','id="frmyr" class=" form-control" tabindex="1" style="width:45%;" required');?>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 space-top-12">
                                <label for="company">To Date</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    <?php echo form_dropdown('tomon',$month_list,'','id="frmmon" class=" form-control" tabindex="1" style="width:45%;" required');?>
                                    <?php echo form_dropdown('toyr',$year_list,'','id="frmyr" class=" form-control" tabindex="1" style="width:45%;" required');?>
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <label for="company">Position</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-sitemap"></i></span>
                                    <input type="text" class="form-control" placeholder="Position" name="position" id="position" required>
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <label for="company">Key Responsibility</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-sliders"></i></span>
                                    <textarea class="form-control" placeholder="Key Resposibility" name="keyrole" id="keyrole" ></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <input name="cmp_present" type="checkbox" value="0" /> Current Company <input type="submit" value="Update" class="btn btn-primary pull-right">
                            </div>
                        </form>
                    </div>
                    
                </div>
                 <div class="clearfix"> </div>
            </div>
        </div>
    </div>
     <div class="clearfix"> </div>
</div>

<div id="contactModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Sign In</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    
                    <div class="row">
                        <form method="post" name="contactfrm" action="<?php echo $this->config->base_url().'UpdateContactInfo/'.$formdata['encrypt_id'];?>" data-toggle="validator" role="form">
                            <div class="col-md-12 space-top-12">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" class="form-control" placeholder="Email ID" name="emailid" id="emailid" value="<?php echo $formdata['cmail']; ?>" required readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                 <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input style="width:30%;" type="text" class="form-control" placeholder="Code" value="<?php echo $formdata['cccode']; ?>"  name="cntrycode" id="cntrycode" required >
                                    <input style="width:70%;" type="text" class="form-control" placeholder="Contact Number" value="<?php echo $formdata['cphone']; ?>" name="phone" id="phone" required >
                                 </div>
                             </div>
                            <div class="col-md-12 space-top-12">
                                <input type="submit" value="Update" class="btn btn-primary pull-right">
                            </div>
                        </form>
                    </div>
                    
                </div>
                 <div class="clearfix"> </div>
            </div>
        </div>
    </div>
     <div class="clearfix"> </div>
</div>

<div id="smediaModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Social Media Links</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="row">
                        <form method="post" name="smfrm" action="<?php echo $this->config->base_url().'UpdateSocialMedia/'.$formdata['encrypt_id'];?>" data-toggle="validator" role="form">
                            <div class="col-md-12 space-top-12">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-linkedin"></i></span>
                                    <input type="text" class="form-control" placeholder="Linked In" name="linlink" id="linlink">
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                    <input type="text" class="form-control" placeholder="Facebook" name="fblink" id="fblink">
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                    <input type="text" class="form-control" placeholder="Twitter" name="twittlink" id="twittlink">
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
                                    <input type="text" class="form-control" placeholder="Google+" name="gpluslink" id="gpluslink">
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <input type="submit" value="Update" class="btn btn-primary pull-right">
                            </div>
                        </form>
                    </div>
                </div>
                 <div class="clearfix"> </div>
            </div>
        </div>
    </div>
     <div class="clearfix"> </div>
</div>

<div id="resumeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload New Resume</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="row">
                        <form method="post" name="cvfrm" action="<?php echo $this->config->base_url().'UpdateResume/'.$formdata['encrypt_id'];?>" data-toggle="validator" role="form" enctype="multipart/form-data">
                            <div class="col-md-12 space-top-12">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-list"></i></span>
                                    <input type="text" class="form-control" placeholder="Resume Heading" name="resumehead" id="resumehead" required>
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <div class="form-group">
                                    <input type="file" class="form-control input_syle" id="fileToUpload" name="fileToUpload" required>
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <input type="submit" value="Update" class="btn btn-primary pull-right">
                            </div>
                        </form>
                    </div>
                </div>
                 <div class="clearfix"> </div>
            </div>
        </div>
    </div>
     <div class="clearfix"> </div>
</div>

<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>web/js/bootstrap-filestyle.js"></script>
<link href="<?php echo $this->config->item('web_url');?>web/css/datepicker.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>web/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo $this->config->base_url()?>ckeditor/ckeditor.js"></script>
<script type="text/javascript">
	CKEDITOR.replace( 'prosummary' );
</script>
<script type="text/javascript">
	$('#fileToUpload').filestyle({
		buttonName : 'btn-danger'
	});
</script>
<script type="text/javascript">
	// When the document is ready
	$(document).ready(function () {		
		$('.xcxc').click(function () {
                    $('#desc').val($('#editor').html());
                });
		
		$('#dob').datepicker({
			format: "dd-mm-yyyy",
			viewMode: "months",
    		minViewMode: "months"
		}); 
		
		$('#basicModal').dialog({ autoOpen: false });
		$('#summaryModal').dialog({ autoOpen: false });
		$('#workModal').dialog({ autoOpen: false });
		$('#contactModal').dialog({ autoOpen: false });
		$('#smediaModal').dialog({ autoOpen: false });
		
		
		$('#basic_btn').click(function(){ $('#basicModal').modal('show'); });
		$('#summary_btn').click(function(){ $('#summaryModal').modal('show'); });
		$('#work_btn').click(function(){ $('#workModal').modal('show'); });
		$('#contact_btn').click(function(){ $('#contactModal').modal('show'); });
		$('#smedia_btn').click(function(){ $('#smediaModal').modal('show'); });
	
	});
</script>