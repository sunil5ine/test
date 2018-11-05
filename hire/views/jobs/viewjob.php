
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '985670251500659',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

    <!-- page content -->
	<div class="right_col" role="main">
    	<div class="">
                    <div class="page-title">
                    	<?php echo $message; ?>
                        <div class="title_left">
                            <?php if($publish_count > 0) { echo '<span class="label label-success">Already Published</span>'; }?>
                            <h3>
                               <?php echo $formdata['jtitle']; ?>
                               
                            </h3>
                            <h2><?php echo $formdata['farea']; ?> - <?php echo $formdata['location']; ?></h2>
                            
                        </div>

                        <div class="title_right">
                            <div class="col-md-10 col-sm-10 col-xs-12 form-group pull-right top_search">
                                    <?php if($formdata['job_status']!=1) { ?>
                                    <a href="<?php echo $this->config->base_url().'Jobs/Reopen/'.$formdata['job_url_id']; ?>" onclick="return reopen_confirmation();" class="btn btn-warning"><i class="fa fa-folder-open-o"></i> Re-open</a> 
                                    <a href="<?php echo $this->config->base_url().'Jobs/Delete/'.$formdata['job_url_id']; ?>" class="btn btn-danger "  onclick="return del_confirmation();" ><i class="fa fa-trash"></i>  Remove</a> 
                                    <?php } else { ?>                                    
                                    <?php if($publish_count > 0) { ?><a href="<?php echo $this->config->base_url().'Profile/List/'.$formdata['job_url_id']; ?>" class="btn btn-primary"><i class="fa fa-file-word-o"></i> Matching Profiles</a> <?php } else { ?> <a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" class="btn btn-primary"><i class="fa fa-upload"></i> Publish Job</a><?php } ?>
                                    <a href="<?php echo $this->config->base_url().'Jobs/Edit/'.$formdata['job_url_id']; ?>" class="btn btn-success" <?php echo $postdisable; ?> ><i class="fa fa-edit"></i>  Edit</a>
                                    <a href="<?php echo $this->config->base_url().'Jobs/Duplicate/'.$formdata['job_url_id']; ?>" class="btn btn-warning" onclick="return dupli_confirmation();" <?php echo $postdisable; ?> ><i class="fa fa-copy"></i> Duplicate</a>
                                    <a href="<?php echo $this->config->base_url().'Jobs/CloseJob/'. $formdata['job_url_id']; ?>" class="btn btn-danger" onclick="return close_confirmation();"><i class="fa fa-trash"></i> Close</a>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                    <li role="presentation" class="active" id="t1"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-suitcase"></i> <strong>Job Details</strong></a>
                                    </li>
                                    <?php if($formdata['job_status']==1) { ?>
                                    <li role="presentation" class="" id="t2"><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-share-alt"></i> <strong>Social Postings</strong></a>
                                    </li>
                                    <li role="presentation" class="" id="t3"><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab"  aria-expanded="false"><i class="fa fa-diamond"></i> <strong>Job Board Postings</strong></a>
                                    </li>
                                    <?php } ?>
                                    <li role="presentation" class="" id="t4"><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab"  aria-expanded="false"><i class="fa fa-line-chart"></i> <strong>Statistics</strong></a>
                                    </li>
                                    <li role="presentation" class="" id="t5"><a href="#tab_content5" role="tab" id="profile-tab4" data-toggle="tab"  aria-expanded="false"><i class="fa fa-file-word-o"></i> <strong>Applications [<?php echo $can_count; ?>]</strong></a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                                        <div class="col-md-8 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Job Information</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <br />
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <strong>Job Title</strong> : <?php echo $formdata['jtitle']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <strong>Location</strong> : <?php echo $formdata['location']; ?>
                                                    </div>
            
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <strong>Experience</strong> : <?php echo $formdata['minexp'].' to '.$formdata['maxexp'];?>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <strong>Monthly Salary</strong> : <?php echo '$'.$formdata['minsal'].' ~ $'.$formdata['maxsal'];?>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <strong>Education</strong> : <?php echo $formdata['edu']; ?>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <strong>Functional Area</strong> : <?php echo $formdata['farea']; ?>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <strong>Industry</strong> : <?php echo $formdata['industry']; ?>
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                        <strong>Job Role</strong> : <?php echo $formdata['jrole']; ?>
                                                    </div>
                                                    
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <strong>Skills</strong> :  <?php echo $formdata['skill']; ?>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <h2>Job Description</h2>
                                                       <?php echo $formdata['jobdesc']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="col-md-4 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Job Settings</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <strong>Hiring For</strong> :  <?php echo $formdata['hcompany']; ?>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <strong>Send Notifications to</strong> :  <?php echo $formdata['notifyemail']; ?>
                                                    </div>
                                                    
                                                    <!--<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       Publish on Company Career Site? :-  <?php //echo ($formdata['jobsite']==1)?'Yes':'No'; ?>
                                                    </div>-->
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <strong>Notes</strong> :  <?php echo $formdata['jobnotes']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_content">
                                                    <br />
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <strong>Created On</strong> :  <?php echo date('d/m/Y H:i:s', strtotime($formdata['createddt'])); ?>
                                                    </div>
                                                    
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <strong>Last Updated</strong> :  <?php echo date('d/m/Y H:i:s', strtotime($formdata['updateddt'])); ?>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <strong>Created By</strong> :  <?php echo $formdata['createdby']; ?>
                                                    </div>
                                                    <!--<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <a href="<?php //echo base_url().'Jobs/Edit/'. $formdata['job_url_id']; ?>" class="btn btn-success pull-right" <?php //echo $postdisable; ?> ><i class="fa fa-edit"></i>  Edit Job</a>
                                                    </div>-->
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                        				<strong>Job URL</strong> :
                                        				<a data-toggle="modal" href="#myModal" class="label label-default">Click here to copy URL</a>
                                                		<textarea id="holdtext" style="display:none;"><?php echo $this->data['joburl']; ?></textarea>
                                                    </div>
                                                    <?php if($postdisable != '') {?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback alert alert-error">
                                                       Sorry! You are unable to EDIT jobs, as your subscription has been reach upto the LIMIT. So please do subscription to proceed further.
                                                    </div>
                                                    <?php } ?>
                                                    
                                                    <br />
                                                    <?php if($publish_count > 0) { echo '<span class="label label-success">Already Published</span>'; }?>
                                                    <?php if($publish_count > 0) {?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback alert alert-warning">
                                                       Note : If you edit this job, it will not reflect the previous publications. You need to republish the job as a new posting.
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="clearfix"></div>
                                        
                                    </div>
                                    <!-- Copy URL Modal -->
                                      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                      <h4 class="modal-title">Job URL</h4>
                                                  </div>
                                                  <div class="modal-body">
                                                      <p>Copy and paste the below url to share and apply for this job!</p>
                                                      <textarea id="joburl" class="form-control placeholder-no-fix" ><?php echo $this->data['joburl']; ?></textarea>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                      <!-- modal -->
                                    <?php if($formdata['job_status']==1) { ?>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                                        <div class="col-md-7 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Email Referrals</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                	<p>Enter the email addresses seperated by comma you wish to seek referral.</p>
                                                    <br />
                                                    <form action="<?php echo base_url(); ?>Jobs/EmailJob/<?php echo $formdata['job_url_id']; ?>" method="post" id="reffrm" name="reffrm">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                       <textarea class="form-control" placeholder="Email IDs" name="emailids" id="emailids" ></textarea>
                                                       <p>ex: person@domain.com, anotherperson@domain2.com</p>
                                                    </div>
                                                    
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                       <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject"  value="Applicants Wanted for <?php echo $formdata['jtitle']; ?>">
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                       <textarea class="form-control" placeholder="Message" name="message" id="message" rows="10"><?php echo $mailmsg; ?></textarea>
                                                    	<!--<p>Tag Information: <br />{job_title} - Job Title, {can_fname} - Extracted Candidate Name, {emp_name} - Hiring Company Name, {job_url} - Unique Job URL, {emp_fname} - Recuiter Name</p>
                                                        <i>The tags are mandatory and should not be altered, meaning the brackets along with text inside should not be edited. However, you are allowed to place it anywhere.</i>-->
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <button type="submit" class="btn btn-success pull-right"><i class="fa fa-share"></i>  Request Referrals / Share via Email</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-5 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Social Networks</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                	<p>Click on the below social sharing buttons to post the job on the corresponding network.</p>
                                                    <br />
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo 'http://www.cherryhire.com/JobDetails/'.$formdata['job_url_id'].'/?js=9&source=linkedin';?>&title=<?php echo $formdata['jtitle']; ?>&summary=<?php echo $formdata['hcompany']; ?> is looking to fill <?php echo $formdata['jtitle']; ?> position in <?php echo $formdata['location']; ?>&source=LinkedIn" class="col-md-8 btn btn-linkedin has-feedback-left" target="_blank"> Share on LinkedIn</a>
                                                       <span class="fa fa-linkedin form-control-feedback colorwhite left" aria-hidden="true"></span>
                                                    </div>
                                                    
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <a href="https://twitter.com/intent/tweet?text=<?php echo $formdata['hcompany']; ?> is looking to fill <?php echo $formdata['jtitle']; ?> position in <?php echo $formdata['location']; ?>&url=<?php echo 'http://www.cherryhire.com/JobDetails/'.$formdata['job_url_id'].'/?js=8&source=twitter';?>" class="col-md-8 btn btn-twitter has-feedback-left" target="_blank"> Share on Twitter</a>
                                                       <span class="fa fa-twitter form-control-feedback colorwhite left" aria-hidden="true"></span>
                                                    </div>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <!--<a href="#" id="sharefb" name="sharefb" class="col-md-8 btn btn-facebook has-feedback-left"> Share on Facebook</a>-->
                                                       <?php 
													   $fbtitle = $formdata['jtitle'];
													   $fbsummary = $formdata['hcompany'].' is looking to fill '. $formdata['jtitle'].' position in '.$formdata['location']; 
													   $fburl = 'http://www.cherryhire.com/JobDetails/'.$formdata['job_url_id'].'/?js=7&amp;source=facebook';
													   ?>
                                                       <a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $fbtitle;?>&amp;p[summary]=<?php echo $fbsummary;?>&amp;p[url]=<?php echo $fburl; ?>','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"  class="col-md-8 btn btn-facebook has-feedback-left">Share on Facebook</a>
                                                       
                                                       <span class="fa fa-facebook form-control-feedback colorwhite left" aria-hidden="true"></span>
                                                    </div>
                                                    
                                                    
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <a href="https://plus.google.com/share?url=<?php echo 'http://www.cherryhire.com/JobDetails/'.$formdata['job_url_id'].'/?js=10&source=googleplus';?>&title=<?php echo $formdata['hcompany']; ?> is looking to fill <?php echo $formdata['jtitle']; ?> position in <?php echo $formdata['location']; ?>" class="col-md-8 btn btn-googleplus has-feedback-left" target="_blank"> Share on Google +</a>
                                                       <span class="fa fa-google-plus form-control-feedback colorwhite left" aria-hidden="true"></span>
                                                    </div>
                                                    <!--<div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <a href="#" class="col-md-8 btn btn-info has-feedback-left"> Share via Email</a>
                                                       <span class="fa fa-at form-control-feedback colorwhite left" aria-hidden="true"></span>
                                                    </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab2">
                                        <div class="col-md-12 col-xs-12">
                                        	<form name="pfrm" id="pfrm" action="<?php echo base_url(); ?>Jobs/SubmitJob/<?php echo $formdata['job_url_id']; ?>" method="post">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Publish Job Openings to multiple external Job portals at once.</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                	<?php if($publish_count > 0){ ?>
														<div style="margin: 10px 0px 10px 0px; " class="alert alert-success"><h2>Note : The job is already published.</h2></div>
													<?php }?>
                                                    
                                                    <p>Increase applicant count by multi times; Save money on job posting; And best of all, save plenty of time by posting jobs to various sites on a single click and receiving all the responces from everywhere right here into a single window.</p>
                                                    <br />
                                                    <?php if($subdetails['sub_expire_dt']==0 || $subdetails['sub_nojobs']==0 || $subdetails['sub_expire_dt']<date('Y-m-d H:i:s')) { ?>
                                                        <div style="margin-top: 16px;" class="alert alert-error">
                                                            <h2><i class="fa fa-exclamation-triangle"></i> Subscription has been expired!</h2>
                                                            <p>You need to <a href="<?php echo $this->config->base_url();?>Subscriptions" style="color:#FFF;"><strong>buy Premium jobs</strong></a> from subscription page inorder to have internal jobs posted on Free and Paid Boards.</p>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    <?php } ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group ">
                                                       <strong>Job Portals</strong>
                                                       <div class="clearfix"></div>
                                                       <div class="col-md-3 col-sm-12 col-xs-12"><input id="portal" name="portal[]" type="checkbox" value="3" checked="checked" readonly="readonly" /> <img src="<?php echo $this->config->item('web_url').'media/logo_home.png'; ?>" /></div>
                                                       <div class="col-md-3 col-sm-12 col-xs-12"><input id="portal" name="portal[]" type="checkbox" value="3" checked="checked" <?php echo $postdisable; ?> /> <img src="<?php echo $this->config->item('web_url').'media/jobportals/indeed.png'; ?>" /></div>
                                                       <div class="col-md-3 col-sm-12 col-xs-12"><input id="portal" name="portal[]" type="checkbox" value="4" checked="checked" <?php echo $postdisable; ?> /> <img src="<?php echo $this->config->item('web_url').'media/jobportals/simplyhired.png'; ?>" /></div>
                                                       <div class="col-md-3 col-sm-12 col-xs-12"><input id="portal" name="portal[]" type="checkbox" value="11" checked="checked" <?php echo $postdisable; ?> /> <img src="<?php echo $this->config->item('web_url').'media/jobportals/jooble.png'; ?>" /></div>
                                                   
                                                       <div class="col-md-3 col-sm-12 col-xs-12"><input id="portal" name="portal[]" type="checkbox" value="1" checked="checked" <?php echo $postdisable; ?> /> <img src="<?php echo $this->config->item('web_url').'media/jobportals/naukri.png'; ?>" /></div>
                                                       <div class="col-md-3 col-sm-12 col-xs-12"><input id="portal" name="portal[]" type="checkbox" value="2" checked="checked" <?php echo $postdisable; ?> /> <img src="<?php echo $this->config->item('web_url').'media/jobportals/monster.png'; ?>" /></div>
                                                       
                                                    </div>
                                                    <br />
                                                    <br />
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <button type="submit" class="btn btn-success pull-right" <?php echo $postdisable; ?> ><i class="fa fa-upload"></i>  <?php echo ($publish_count > 0)?'Re-Publish Job':'Confirm'; ?></button>
                                                    </div>
                                                    <br />
                                                    <div class="clearfix"></div>
                                                    <div style="margin-top: 16px;" class="alert alert-warning">Note : You need to <a href="<?php echo $this->config->base_url();?>Subscriptions" style="color:#FFF;"><strong>buy Premium jobs</strong></a> from subscription page inorder to have your job posted on various Job Portals.</div>
                                                    
                                                </div>
                                            </div>
                                        	</form>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab3">
                                        <div class="col-md-6 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Job Summary</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                	<div class="col-md-12 col-sm-12 col-xs-12">
                                                       <strong>Total Applicants : <?php echo $source_count;?></strong>
                                                    </div>
                                                    <br />
                                                    <br />
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                       <strong>Track Applications:</strong>
                                                    </div>
                                                    <?php if(!empty($source_count_list)) { foreach ($source_count_list as $cresult) { ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                       <?php echo $cresult->cvs_name;?> : <?php echo $cresult->total;?>
                                                    </div>
                                                    <?php } } ?>
                                                    <br />
                                                    <br />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Applicants Pipeline</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">                                             	
                                                  
                                                    <br />
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>

                                    <div role="tabpanel" class="tab-pane fade" id="tab_content5" aria-labelledby="profile-tab3">
                                        <div class="col-md-12 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Applications</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                  <div class="col-md-12 col-sm-12 col-xs-12">
                                                    <table id="canlist" class="table table-striped responsive-utilities jambo_table">
                                                    <thead>
                                                      <tr class="bg-olive">
                                                        <th data-sortable="false"></th>
                                                        <th data-sortable="false"></th>
                                                      </tr>
                                                    </thead>

                                                    <tbody>
                                                      <?php if(!empty($can_records)) { $x=0; foreach ($can_records as $canresult) { $x++; ?>
                                                      <?php
                                                        if($x%2 == 0)
                                                        {
                                                          $tdcls = 'even pointer';
                                                        }
                                                        else
                                                        {
                                                          $tdcls = 'odd pointer';
                                                        }
                                                      ?>
                                                      <tr class="<?php echo $tdcls; ?>">
                                                        <td class=" " width="1%"></td>
                                                        <td class=" " width="75%">
                                                          <div class="col-md-12 col-sm-12 col-xs-12">
                                                            <h2><a href="<?php echo $this->config->base_url();?>Apply/ViewProfile/<?php echo $canresult->can_encrypt_id.'/'.$this->data['formdata']['job_url_id'];?>" target="_blank"><?php echo $canresult->can_fname.' '.$canresult->can_lname;?></a></h2>
                                                            
                                                            <div class="row form-group">
                                                                <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-envelope"></i> <strong>Email : </strong> <?php echo $canresult->can_email;?></div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-mobile"></i> <strong>Contact No : </strong> <?php echo $canresult->can_ccode.'-'.$canresult->can_phone;?></div>
                                                            </div>
                                                            
                                                            <div class="row form-group">
                                                                <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-clock-o"></i> <strong>Experience : </strong> <?php echo $canresult->can_experience;?> Year(s) of experience</div>
                                                                
                                                                <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-flag"></i> <strong>Nationality : </strong> <?php echo $canresult->co_nationality;?></div>
                                                            </div>
                                                            <div class="row form-group">
                                                                <div class="col-md-6 col-sm-3 col-xs-12"><i class="fa fa-building"></i> <strong>Current Company : </strong> <?php echo $canresult->can_curr_company;?></div>
                                                                <div class="col-md-6 col-sm-3 col-xs-12"><i class="fa fa-map-marker"></i> <strong>Current Location : </strong> <?php echo $canresult->can_curr_loc;?></div>
                                                            </div>  
                                                            <div class="row form-group">  
                                                                <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-sitemap"></i> <strong>Functional Area : </strong> <?php echo $canresult->fun_name;?></div>
                                                                <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-graduation-cap"></i> <strong>Education : </strong> <?php echo $canresult->edu_name;?></div>
                                                            </div>  
                                                            <div class="row form-group">  
                                                                <div class="col-md-12 col-sm-12 col-xs-12"><i class="fa fa-tag"></i> <strong>Skills : </strong> <?php echo $canresult->can_skills;?></div>
                                                            </div>                                              

                                                          </div>
                                                        </td>
                                                      </tr>
                                                      <?php  } }?>
                                                    </tbody>
                                                  </table>
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
<script type="text/javascript">
function del_confirmation(){
   // return confirm('Are you sure you want to delete?');
     return confirm("Do you really want to delete this vacancy?");
}
function dupli_confirmation(){
   // return confirm('Are you sure you want to delete?');
     return confirm("Do you really want to make a new copy of this vacancy?");
}

function close_confirmation(){
   // return confirm('Are you sure you want to delete?');
     return confirm("Do you really want to close this vacancy?");
}
function reopen_confirmation(){
   // return confirm('Are you sure you want to delete?');
     return confirm("Do you really want to re-open this vacancy?");
}

</script>         
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
		/*$('#co_code').editable();
		$('#co_name').editable();
		$('#co_del_status').editable();*/
		$('.is_editable').editable();
});
</script>
<script>
	var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#mechantlist').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [
                        {
                            'bSortable': false,
                            'aTargets': [0, 1]
                        } //disables sorting for column one
            		    ],
					         "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        			     "iDisplayLength": 25,
                   "sPaginationType": "full_numbers",
                   "dom": 'T<"clear">lfrtip',
                   /*"tableTools": {
                        "sSwfPath": "<?php echo base_url().'js/datatables/tools/swf/copy_csv_xls_pdf.swf'; ?>"
                    }*/
                });
                var oTable1 = $('#canlist').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [
                        {
                            'bSortable': false,
                            'aTargets': [0, 1]
                        } //disables sorting for column one
                  ],
                  "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
                  "iDisplayLength": 25,
                  "sPaginationType": "full_numbers"
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable1.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });
</script>

<script type="text/javascript">
$(document).ready(function(){
  $("#profile-tab2").click(function(){
      $("#t1").removeClass("active");
      $("#t2").removeClass("active");
      $("#t3").removeClass("active");
      $("#t4").removeClass("active");
      $("#t5").removeClass("active");
      $("#t3").addClass("active");
  }); 

  $('#sharefb').click(function(e){
    e.preventDefault();
    FB.ui(
    {
      method: 'feed',
      name: '<?php echo $formdata['jtitle']; ?>',
      link: '<?php echo 'http://www.cherryhire.com/JobDetails/'.$formdata['jobid'].'/?js=7&source=facebook';?>',
      caption: '<?php echo $formdata['skill']; ?>',
      description: '<?php echo $formdata['hcompany']; ?> is looking to fill <?php echo $formdata['jtitle']; ?> position in <?php echo $formdata['location']; ?>',
      message: ''
    });
  });
});

</script>