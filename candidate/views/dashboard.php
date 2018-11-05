<style>
#imgHover {
	border:1px solid #73879c;
	background:#FFF;
}
#imgHover .hover {    
	background: #999 none repeat scroll 0 0;
    color: #FFF;
    display: none;
    position: absolute;
    right: 0px;
    bottom: 0px;
    height: 30px;
    text-align: center;
    
    width: 100%;
    z-index: 2;
}
#imgHover a{ 
	color: #FFF;
	text-decoration:none;
}
#dummy{
    visibility: hidden!Important;
    height:1px;
    width:1px;
}
</style>
<style>
.datepicker{z-index:1151 !important; top: 238px !important;}
.ui-datepicker {
    /*top: 92px !important;*/
}
</style>
<link rel="stylesheet" href="<?php echo $this->config->item('web_url');?>web/css/thickbox.css">
<link rel="stylesheet" href="<?php echo $this->config->base_url();?>Telebuild/css/intlTelInput.css">

	<!-- page content -->
	<div class="right_col" role="main">
    	<div class="">
                    <div class="page-title">
                    	<?php echo $message; ?>
                        <div class="alert alert-warning fade in">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Get noticed by the employers and get the best matching jobs by : </strong>
                            <p>
                                &bull; Keeping your <strong>profile updated</strong> !!! <br >
                                &bull; <strong>Searching and applying </strong> for jobs regularly !!! <br >
                            </p>
                        </div>
                        <?php if($subsType == 1) { ?>
							<div style="margin-top: 16px;" class="alert alert-danger">
                            <h2><i class="fa fa-exclamation-triangle"></i> Free Trial Subscription!</h2>
                            <p>Number of jobs you can apply for : <?php echo $subdetails['csub_nojobs'] - $totjobapply; ?>. To apply for more jobs, <a href="<?php echo $this->config->base_url();?>Subscriptions" style="color:#FFF;"><strong>upgrade your plan</strong></a>.</p>
                        </div>						
						<?php } else { if($postdisable!='') { ?>
                        <div style="margin-top: 16px;" class="alert alert-error">
                            <h2><i class="fa fa-exclamation-triangle"></i> Subscription has been expired!</h2>
                            <p>You need to <a href="<?php echo $this->config->base_url();?>Subscriptions" style="color:#FFF;"><strong>upgrade your plan</strong></a> to apply for more jobs.</p>
                        </div>
                        <?php } } ?>
                        <div class="col-md-1 col-sm-1 col-xs-2" id="imgHover">
                        	<div class="hover"><a href="#profilepicModal" role="button" data-toggle="modal" id="pic_btn" ><i class="fa fa-camera" aria-hidden="true"></i> Change</a></div>
                            <img src="<?php echo $this->config->base_url().$formdata['can_propic'];?>" class="img-responsive" alt="" />
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-8">
                            <h3><?php echo $formdata['cfname'].' '.$formdata['clname']; ?> </h3>
                            <h2><?php echo $formdata['cfarea']; ?> - <?php echo ($formdata['cexp']); echo($formdata['cexp']!='Fresher' && $formdata['cexp']!='0'&& $formdata['cexp']!='00')?'year(s) of experience':'';?></h2>
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
                                                    <h2>Your Profile</h2> <a href="#basicModal" role="button" data-toggle="modal" id="basic_btn"><button class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-edit"></i> Edit</button></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-bookmark"></i> <strong>Current Designation :</strong> <?php echo $formdata['cdesig'];?>
                                                    </div>                                                   
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-building"></i> <strong>Current Company :</strong> <?php echo $formdata['ccomp'];?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-map-marker"></i> <strong>Current Location :</strong> <?php echo $formdata['ccurrloc'];?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-flag"></i> <strong>Willing to relocate? :</strong>  <?php echo ($formdata['creloc']==1)?'Yes':'No'; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-clock-o"></i> <strong>Preferred Location :</strong> 
													   <?php echo $preffered;?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-clock-o"></i> <strong>Experience :</strong> <?php echo ($formdata['cexp']!='Fresher')?$formdata['cexp'].' Yrs':$formdata['cexp'];?>
                                                    </div>                                                    
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-sitemap"></i> <strong>Functional Area :</strong> <?php echo $formdata['cfarea']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-anchor"></i> <strong>Industry :</strong> <?php echo $formdata['cindustry']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-flag"></i> <strong>Nationality :</strong> <?php echo $formdata['nation']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-birthday-cake"></i> <strong>Date of Birth :</strong>  <?php echo $formdata['cdob']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-user"></i> <strong>Gender :</strong>  <?php echo $formdata['gender']; ?>
                                                    </div>  
                                                    
                                                    <!-- <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-tags"></i> <strong>Skills :</strong>  <?php //echo $formdata['cskills']; ?>
                                                       <a href="#" id="can_skills" data-name="can_skills"  data-value="<?php //echo $formdata['cskills'];?> "  data-type="text" data-pk="<?php //echo $formdata['encrypt_id']; ?>" data-url="<?php //echo $this->config->base_url().'EditSkill/'.$formdata['encrypt_id'];?>" data-title="Enter Key Skills" style="color:#06F;"><i class="fa fa-edit"></i></a> <i class='fa fa-edit'></i>
                                                    </div> -->                                                    
                                                </div>
                                            </div>

                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Skills</h2> 
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <!--<i class="fa fa-tags"></i> <strong>Skills :</strong>-->
                                                       <?php //echo $formdata['cskills']; ?>
                                                       <form action="<?php echo $this->config->base_url().'EditSkill/'.$formdata['encrypt_id'];?>" method="post" id="skillfrm" name="skillfrm">
                                                            <div class="col-md-12 space-top-12">
                                                                <label for="dummy"> <span id="dummy_validate"></span></label>
                                                                <input id="skillval" type="text" class="tags" name="skillval" value="<?php echo $formdata['cskills']; ?>" required >
                                                                <input id="dummy" name="dummy" type="text" /><!-- dummy text field -->
                                                            </div>
                                                            <div class="col-md-12 space-top-12">
                                                                <input type="submit" value="Update" class="btn btn-default pull-right" style="margin: 10px 5px 0px 0px;">
                                                            </div>
                                                       </form>
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
                                                    <h2>Work Experience</h2> <a href="#workModal" role="button" data-toggle="modal" id="work_btn"><button class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-plus"></i> Add Experience</button></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <?php 
														foreach($cwork as $wexp) 
														{ 
															$year1 = ($wexp->cexp_from_yr)?$wexp->cexp_from_yr:0;
															$year2 = ($wexp->cexp_to_yr)?$wexp->cexp_to_yr:0;
															
															$month1 = ($wexp->cexp_from_mon)?$wexp->cexp_from_mon:0;
															$month2 = ($wexp->cexp_to_mon)?$wexp->cexp_to_mon:0;
															
															
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
															if($wexp->cexp_present == 1) {
																$expmsg = 'From :'.$monthName1.' '.$year1.' to Present';
															} else {
																$expmsg = 'From :'.$monthName1.' '.$year1.' to '.$monthName2.' '.$year2;
															}
													 		if(isset($wexp->cexp_company)) { 
													?>
                                                    	
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <p>
                                                        	<i class="fa fa-building"></i> <strong><?php echo (isset($wexp->cexp_company))?$wexp->cexp_company:'No Name'; ?>, <?php echo (isset($wexp->cexp_location))?$wexp->cexp_location:'Not Set'; ?></strong> <a href="<?php echo $this->config->base_url().'DeleteCandExp/'.$wexp->cexp_encrypt_id;?>"  onclick="return confirm('Are you sure?')"><button class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-trash"></i></button></a> <a href="#" onclick="showwork('<?php echo $wexp->cexp_encrypt_id; ?>')" id="<?php echo $wexp->cexp_encrypt_id; ?>" class="workpush"><button class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-edit"></i></button></a><br /> 
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

                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Education</h2> <a href="#eduModal" role="button" data-toggle="modal" id="edu_btn"><button class="btn btn-default pull-right" style="margin-right: 5px;"><i class="fa fa-plus"></i> Add Education</button></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                    <?php if(!empty($cedu_details)) { ?>
                                                    <table id="mechantlist" class="table table-striped responsive-utilities jambo_table">
                                                        <thead>
                                                            <tr class="headings">
                                                                <th>School name </th>
                                                                <th>Qualification </th>
                                                                <th>Specialization </th>
                                                                <th>Start</th>
                                                                <th>End </th>
                                                                <th class="centered no-link last" align="center"><span class="nobr"></span>
                                                                </th>
                                                            </tr>
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
                                                        
                                                    
                                                            <tr class="<?php echo $tdcls; ?>">
                                                                <td class=" "><?php echo $educdetails->cedu_school;?></td>
                                                                <td class=" "><?php echo $educdetails->deg_type_sdisplay;?></td>
                                                                <td class=" "><?php echo $educdetails->deg_sdisplay.'-'.$educdetails->cedu_specialization;?></td>
                                                                <td class=" "><?php echo $startyear;?></td>
                                                                <td class=" "><?php echo $endyear;?></td>
                                                                <td class=" last" align="center">
                                                                <a title="Edit" href="#" onclick="showedu('<?php echo $educdetails->cedu_encrypt_id; ?>')" id="<?php echo $educdetails->cedu_encrypt_id; ?>" class="edupush"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button></a>
                                                                <a class="table-action-deletelink" title="Delete" href="<?php echo $this->config->base_url().'DeleteCandEdu/'.$educdetails->cedu_encrypt_id;?>"  onclick="return confirm('Are you sure?')"><button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>
                                                                </td>
                                                            </tr>
                                                    
                                                            <?php } } } ?>
                                                        </tbody>

                                                    </table>
                                                    <?php } ?>
                                                    </div>
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
                                                       <i class="fa fa-phone-square"></i> <strong>Contact No :</strong> <?php echo '+'.$formdata['cccode'].' '.$formdata['cphone']; ?>
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
                                                    <h2>Resume</h2>
                                                    <a href="#resumeModal" role="button" data-toggle="modal" id="resume_btn1"><button class="btn btn-success pull-right" style="margin-right: 5px;"><i class="fa fa-edit"></i> Update</button></a>
                                                    <a href="<?php echo $formdata['cv_path']; ?>" target="_blank"><button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Download</button></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <br />
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                       <!--style="width: 1100px; height: 900px;" -->
                                                       <?php if($formdata['cv_path']!='') { ?>
                                                       <iframe src="http://docs.google.com/viewerng/viewer?url=<?php echo $formdata['cv_path']; ?>&embedded=true" style="width: 900px; height: 600px;" frameborder="0"></iframe>
                                                       <?php } ?>
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
                <h4 class="modal-title">Your Profile</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="row">
                        <form method="post" name="basicfrm" id="basicfrm" action="<?php echo $this->config->base_url().'UpdateBasic/'.$formdata['encrypt_id'];?>">
                        <input type="hidden" class="form-control" placeholder="First Name" value="<?php echo $formdata['cfname']; ?>" name="firstname" id="firstname" tabindex="1" required >
                        <input type="hidden" class="form-control" placeholder="Last Name" value="<?php echo $formdata['clname']; ?>" name="lastname" id="lastname" tabindex="2" required >
                        <div class="row">
                            <div class="col-md-6 space-top-12">                             	
                                <label for="currdesig">Current Designation <span id="currdesig_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-diamond"></i></span>
                                    <input type="text" class="form-control" placeholder="Current Designation" value="<?php echo $formdata['cdesig']; ?>" name="currdesig" id="currdesig" tabindex="3">
                                </div>
                            </div>                            
                            <div class="col-md-6 space-top-12">                             	
                                <label for="currcompany">Current Company <span id="currcompany_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                    <input type="text" class="form-control" placeholder="Current Employer" value="<?php echo $formdata['ccomp']; ?>" name="currcompany" id="currcompany" tabindex="4">
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 space-top-12">                             	
                                <label for="currloc">Current Location <span id="currloc_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                    <!--<input type="text" class="form-control" placeholder="Current Location" value="<?php //echo $formdata['ccurrloc']; ?>" name="currloc" id="currloc" required>-->
                                    <?php echo form_dropdown('currloc',$country_list,$formdata['ccurrloc'],'id="currloc" class=" form-control" tabindex="5" required');?>
                                </div>
                            </div>                            
                            <div class="col-md-6 space-top-12">
                                <div class="form-group input-group">
                                    <label for="relocate">Willing to relocate?</label>
                                    <select name="relocate" id="relocate" class="form-control" tabindex="6">
                                        <option value="1" <?php echo ($formdata['creloc']==1)?'selected':''; ?>>Yes</option>
                                        <option value="0" <?php echo ($formdata['creloc']==0)?'selected':''; ?>>No</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 space-top-12">                             	
                                <label for="preloc">Prefered Location<em>(Max select 5)</em> <span id="preloc_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-location-arrow"></i></span>
                                    <?php echo form_dropdown('preloc[]',$pre_country_list,$formdata['preloc'],'id="preloc" class="form-control" tabindex="7" multiple="multiple" ');?>
                                </div>
                            </div>                        
                            <div class="col-md-6 space-top-12">                             	
                                <label for="totexp">Total Experience <span id="totexp_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    <select name="totexp" id="totexp" class="form-control" tabindex="8" required>
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
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 space-top-12">                             	
                                <label for="funarea">Functional Area <span id="funarea_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-windows"></i></span>
                                    <?php echo form_dropdown('funarea',$funarea_list,$formdata['fun_id'],'id="funarea" class=" form-control" tabindex="9" required');?>
                                </div>
                            </div>
                            <div class="col-md-6 space-top-12">                             	
                                <label for="industry">Industry <span id="industry_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-anchor"></i></span>
                                    <?php echo form_dropdown('industry',$ind_list,$formdata['ind_id'],'id="industry" class=" form-control" tabindex="10"');?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 space-top-12">                             	
                                <label for="edu">Educational Qualification <span id="edu_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                    <?php echo form_dropdown('edu',$edu_list,$formdata['edu_id'],'id="edu" class=" form-control" tabindex="11" required');?>
                                </div>
                            </div>                            
                            <div class="col-md-6 space-top-12">                                 
                                <label for="nation">Nationality <span id="nation_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                                    <?php echo form_dropdown('nation',$nation_list,$formdata['co_id'],'id="nation" class=" form-control" tabindex="12" required');?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-8 space-top-12">                            	
                                <label for="dob">Date of birth <span id="dob_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>
                                    <!--<input autocomplete="off" readonly type="text" class="form-control" value="<?php //echo $formdata['cdob']; ?>" data-provide="datepicker" placeholder="Date of Birth" name="dob" id="dob" required>-->
                                    <input type="hidden" id="dob" class="form-control" value="<?php echo $formdata['cdob']; ?>" name="dob" tabindex="13" required>
                                </div>
                            </div>                            
                            <div class="col-md-4 space-top-12">                             	
                                <label for="gender">Gender <span id="gender_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-female"></i><i class="fa fa-male"></i></span>
                                    <select name="gender" id="gender" class="form-control" tabindex="14" required>
                                        <option disabled selected>Gender</option>
                                        <option <?php echo ($formdata['gender']=='Male')?'selected':''; ?> value="Male">Male</option>
                                        <option <?php echo ($formdata['gender']=='Female')?'selected':''; ?> value="Female">Female</option>
                                        <option <?php echo ($formdata['gender']=='Other')?'selected':''; ?> value="Other">Other</option>
                                    </select>
                                </div>
                            </div>
                        </div>  
                             
                        <div class="col-md-6 space-top-12">
                            <input type="submit" value="Update" tabindex="15" class="btn btn-primary pull-right">
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
                        <form method="post" name="summaryfrm" id="summaryfrm" action="<?php echo $this->config->base_url().'UpdateSummary/'.$formdata['encrypt_id'];?>">
                            <div class="col-md-12 space-top-12">
                            	 <span id="prosummary_validate"></span>
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
                        <form method="post" name="workfrm" id="workfrm" action="<?php echo $this->config->base_url().'UpdateWork/'.$formdata['encrypt_id'];?>">
                            <div class="col-md-8 space-top-12">
                                <label for="company">Employer <span id="company_validate"></span></label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                    <input type="text" class="form-control" placeholder="Employer" value="" name="company" id="company" required>
                                </div>
                             </div>
                             <div class="col-md-4 space-top-12">
                                <label for="cmp_present"> <span id="cmp_present_validate"></span></label>
                                <div class="form-group input-group">
                                <label>
                                  <input type="checkbox" name="cmp_present" id="cmp_present" value="1"> Current Employer
                                </label>                                
                              	</div>
                            </div>
                             <div class="col-md-12 space-top-12">
                                <label for="location">Location  <span id="location_validate"></span></label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                    <input type="text" class="form-control" placeholder="Company Location" value="" name="location" id="location" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 space-top-12">
                                <label for="frmmon">From Date  <span id="frmmon_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    <?php echo form_dropdown('frmmon',$month_list,'','id="frmmon" class=" form-control" tabindex="1" style="width:45%;" required');?>
                                    <?php echo form_dropdown('frmyr',$year_list,'','id="frmyr" class=" form-control" tabindex="1" style="width:45%;" required');?>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 space-top-12">
                                <label for="tomon">To Date  <span id="tomon_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    <?php echo form_dropdown('tomon',$month_list,'','id="tomon" class=" form-control" tabindex="1" style="width:45%;" required');?>
                                    <?php echo form_dropdown('toyr',$year_list,'','id="toyr" class=" form-control" tabindex="1" style="width:45%;" required');?>
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <label for="position">Position <span id="position_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-sitemap"></i></span>
                                    <input type="text" class="form-control" placeholder="Position" name="position" id="position" required>
                                </div>
                            </div>
                            
                            <div class="col-md-12 space-top-12">
                                <label for="keyrole">Key Responsibility</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-sliders"></i></span>
                                    <textarea class="form-control" placeholder="Key Resposibility" name="keyrole" id="keyrole" ></textarea>
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

<div id="eduModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add Education</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="row">
                        <form method="post" name="edufrm" id="edufrm" action="<?php echo $this->config->base_url().'UpdateEduDetails/'.$formdata['encrypt_id'];?>">
                            <div class="col-md-12 space-top-12">
                                <label for="school">School/University <span id="school_validate"></span></label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-university"></i></span>
                                    <input type="text" class="form-control" placeholder="School/University" value="" name="school" id="school" required>
                                </div>
                             </div>

                             <div class="col-md-6 space-top-12">
                                <label for="degree_type">Qualification  <span id="degree_type_validate"></span></label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                    <?php echo form_dropdown('degree_type',$degree_type_list,'','id="degree_type" class=" form-control" tabindex="1" required');?>
                                </div>
                            </div>

                            <div class="col-md-6 space-top-12">
                                <label for="degree">Degree  <span id="degree_validate"></span></label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lightbulb-o"></i></span>
                                    <?php echo form_dropdown('degree',$degree_list,'','id="degree" class=" form-control" tabindex="1" required');?>
                                </div>
                            </div>
                             
                             <div class="col-md-12 space-top-12">
                                <label for="spec">Specialization  <span id="spec_validate"></span></label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-share-alt"></i></span>
                                    <input type="text" class="form-control" placeholder="Specialization" value="" name="spec" id="spec" required>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 space-top-12">
                                <label for="edufrmyr">Start  <span id="edufrmyr_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    <?php echo form_dropdown('edufrmyr',$year_list,'','id="edufrmyr" class=" form-control" tabindex="1" required');?>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 space-top-12">
                                <label for="edutoyr">End  <span id="edutoyr_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    <?php echo form_dropdown('edutoyr',$year_list,'','id="edutoyr" class=" form-control" tabindex="1" required');?>
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

<div id="contactModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Connect Details</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    
                    <div class="row">
                        <form method="post" name="contactfrm" id="contactfrm" action="<?php echo $this->config->base_url().'UpdateContactInfo/'.$formdata['encrypt_id'];?>">
                            <div class="col-md-12 space-top-12">
                            	<label for="emailid"><span id="emailid_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="text" class="form-control" placeholder="Email ID" name="emailid" id="emailid" value="<?php echo $formdata['cmail']; ?>" required readonly="readonly">
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                            	<label for="phone"><span id="phone_validate"></span></label>
                                 <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                    <input style="width:30%;" type="hidden" class="form-control" placeholder="Code" value="<?php echo $formdata['cccode']; ?>"  name="cntrycode" id="cntrycode" >
                                    <input type="text" class="form-control" placeholder="Contact Number" value="<?php echo $formdata['cphone']; ?>" name="phone" id="phone" required >
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
                                    <input type="text" class="form-control" placeholder="Linked In" name="linlink" value="<?php echo $formdata['linkurl'];?>" id="linlink">
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-facebook"></i></span>
                                    <input type="text" class="form-control" placeholder="Facebook" name="fblink" value="<?php echo $formdata['fburl'];?>" id="fblink">
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-twitter"></i></span>
                                    <input type="text" class="form-control" placeholder="Twitter" name="twittlink" value="<?php echo $formdata['twurl'];?>" id="twittlink">
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-google-plus"></i></span>
                                    <input type="text" class="form-control" placeholder="Google+" name="gpluslink" value="<?php echo $formdata['gurl'];?>" id="gpluslink">
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
                        <form method="post" name="cvfrm" id="cvfrm" action="<?php echo $this->config->base_url().'UpdateResume/'.$formdata['encrypt_id'];?>" enctype="multipart/form-data">
                            <div class="col-md-12 space-top-12">
                                <label for="resumehead"><span id="resumehead_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-list"></i></span>
                                    <input type="text" class="form-control" placeholder="Resume Heading" value="<?php echo $formdata['resumehead']; ?>" name="resumehead" id="resumehead" required>
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <label for="resumehead"><span id="fileToUpload_validate"></span></label>
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

<div id="profilepicModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Upload New Photo</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="row">
                        <form method="post" name="picfrm" id="picfrm" action="<?php echo $this->config->base_url().'UpdatePhoto/'.$formdata['encrypt_id'];?>" enctype="multipart/form-data">
                            <div class="col-md-12 space-top-12">
                                <span id="picToUpload_validate"></span>
                                <div class="form-group">
                                    <input type="file" class="form-control input_syle" id="picToUpload" name="picToUpload" required>
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

<link rel="stylesheet" href="<?php echo $this->config->base_url();?>css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="<?php echo $this->config->base_url();?>js/bootstrap-multiselect.js"></script>
<script src="<?php echo $this->config->base_url();?>Telebuild/js/intlTelInput.js"></script>
<script src="<?php echo $this->config->base_url();?>js/countrySync.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>web/js/bootstrap-filestyle.js"></script>
<link href="<?php echo $this->config->item('web_url');?>web/css/datepicker.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>web/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>web/js/jquery.date-dropdowns.js"></script>
<script type="text/javascript" src="<?php echo $this->config->base_url();?>ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>web/js/candidate.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>web/js/thickbox.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#preloc').multiselect({
            enableFiltering: true,
			maxHeight: 200,
			filterPlaceholder: 'Search Country...',
            enableCaseInsensitiveFiltering: true,
			onChange: function(option, checked) {
                // Get selected options.
                var selectedOptions = $('#preloc option:selected');
 
                if (selectedOptions.length >= 5) {
                    // Disable all other checkboxes.
                    var nonSelectedOptions = $('#preloc option').filter(function() {
                        return !$(this).is(':selected');
                    });
 
                    nonSelectedOptions.each(function() {
                        var input = $('input[value="' + $(this).val() + '"]');
                        input.prop('disabled', true);
                        input.parent('li').addClass('disabled');
                    });
                }
                else {
                    // Enable all checkboxes.
                    $('#preloc option').each(function() {
                        var input = $('input[value="' + $(this).val() + '"]');
                        input.prop('disabled', false);
                        input.parent('li').addClass('disabled');
                    });
                }
            }
        });
    });
</script> 

<script type="text/javascript">
	CKEDITOR.replace( 'prosummary' );
	
	function confirmdel (){
	   var answer = confirm("Are you sure delete?");
		  if (answer) {
			 return true;
		  }else{
			 return false;
		  }
	}

	// When the document is ready
	$(document).ready(function () {		
		$('#fileToUpload').filestyle({
			buttonName : 'btn-danger'
		});
		
		$('#picToUpload').filestyle({
			buttonName : 'btn-danger',
			buttonText : 'Choose Photo',
			placeholder : 'Upload your photo in jpg or png format; Max 2MB(500x500) size'
		});	
		
		$('#cmp_present').change(function () {
			if($(this).prop("checked") == true){
              //  alert("Checkbox is checked.");
				$('#tomon').prop('disabled', true);
				$('#toyr').prop('disabled', true);
				$('#tomon').prop('required', false);
				$('#toyr').prop('required', false);
            }
            else if($(this).prop("checked") == false){
               // alert("Checkbox is unchecked.");
				$('#tomon').prop('disabled', false);
				$('#toyr').prop('disabled', false);
				$('#tomon').prop('required', true);
				$('#toyr').prop('required', true);
            }
		});	
		
		
		$('.xcxc').click(function () {
                    $('#desc').val($('#editor').html());
                });
		
		<?php
			$nowdt = date('d-m-Y');
			$maxdate = strtotime($nowdt.' -15 year');
			$mindate = strtotime($nowdt.' -75 year');
			//echo date('Y-m-d', $date);
		?>
		$('#dob_old').datepicker({
			format: "dd/mm/yyyy",
			viewMode: "months",
    		minViewMode: "months",
			startDate: "<?php echo date('d/m/Y', $mindate); ?>",
        	endDate: "<?php echo date('d/m/Y', $maxdate); ?>",
			orientation: "auto",
		});
		
		$("#dob").dateDropdowns({
			  defaultDateFormat: "dd/mm/yyyy",
			  submitFormat: "dd/mm/yyyy",
			  minAge: 18,
			  maxAge: 70,
			  monthFormat: 'short',
			  required: true,
			  dropdownClass:"form-control wauto"
		});
		
		$("#imgHover").hover(
			function() {
				$(this).children("img").fadeTo(200, 0.85).end().children(".hover").show();
			},
			function() {
				$(this).children("img").fadeTo(200, 1).end().children(".hover").hide();
			});	
	});
	
	$.fn.editable.defaults.mode = 'popup';
	$('#can_skills').editable();
	/*$(function(){
		$('.workpush123').click(function(){
			  var exp_id = $(this).attr('id');	
			  var title = "Edit work experience";
			  var url = "<?php echo $this->config->base_url().'GetWork/'; ?>" + exp_id + "/?height=479&width=626&modal=true";
			  showpop(url);
		});
		
		$('.edupush123').click(function(){
			  var edu_id = $(this).attr('id');	
			  var title = "Edit educational qualification";
			  var url = "<?php echo $this->config->base_url().'GetEduDetails/'; ?>" + edu_id + "/?height=479&width=626&modal=true";
			  showpop(title,url);
		});
	});*/
	
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
	
	function showpop(title,url)
	{
		tb_show(title, url);
		return true;
	}
	
</script>
<script type="text/javascript">

    function onAddTag(tag) {
        alert("Added a tag: " + tag);
    }
    function onRemoveTag(tag) {
        alert("Removed a tag: " + tag);
    }

    function onChangeTag(input,tag) {
        alert("Changed a tag: " + tag);
    }

    $(function() {
        //$('#skillval').tagsInput({width:'auto',defaultText:'add a skill'});  
		
		$("#skillval").tagsInput({
            'defaultText':'add a skill',
            'width':'auto',
            'autocomplete_url': '',
            'autocomplete' :{
                'source': function (request, response) {
                    $.ajax({
                        url: "<?php echo $this->config->base_url();?>dashboard/skilllist",
                        type: "POST",
                        data: {
                            "term": request.term
                        },
                        success: function (data) {
                            response($.map(JSON.parse(data), function (items) {
                                return {
                                    value: items.skillarea_display,
                                    label: items.skillarea_display
                                }
                            }));

                        },
                        error: function (error) {}
                    });
                }
            }
        });       

        // Uncomment this line to see the callback functions in action
        //          $('input.tags').tagsInput({onAddTag:onAddTag,onRemoveTag:onRemoveTag,onChange: onChangeTag});

        // Uncomment this line to see an input with no interface for adding new tags.
        //          $('input.tags').tagsInput({interactive:false});
    });

</script>