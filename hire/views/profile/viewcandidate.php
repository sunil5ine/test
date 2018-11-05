	<!-- page content -->
	<div class="right_col" role="main">
    	<div class="">
                    <div class="page-title">
                    	<?php echo $message; ?>
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <h3><?php echo $formdata['cname']; ?> </h3>
                            <h2><?php echo $formdata['cjfunction']; ?> - <?php echo number_format(($formdata['cexp']/12), 1); ?>year(s) of experience</h2>
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group pull-right">
                                <!--<button type="button" class="btn btn-primary"  tabindex="16">0 Application</button>
                                <button type="button" class="btn btn-info"  tabindex="16"><i class="fa fa-plus-circle"></i> Add Candidate</button>
                                <button type="button" class="btn btn-warning"  tabindex="16"><i class="fa fa-copy"></i> Duplicate</button>
                                <button type="button" class="btn btn-danger"  tabindex="16"><i class="fa fa-trash"></i> Close</button>-->
                                <a href="<?php echo $this->config->base_url().$backlink; ?>" class="btn btn-primary pull-right" ><i class="fa fa-outdent"></i> Go Back</a>
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
                                                    <h2>Basic Informations <!--<small>different form elements</small>--></h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <?php if($formdata['cemail'] != 'Not Set') { ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-envelope"></i> <strong>Email :</strong> <?php echo $formdata['cemail']; ?>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($formdata['cphone'] != 'Not Set') { ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-phone-square"></i> <strong>Contact Number :</strong> <?php echo $formdata['cphone']; ?>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($formdata['ccountry'] != 'Not Set') { ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-flag"></i> <strong>Country :</strong> <?php echo $formdata['ccountry']; ?>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($formdata['currlocation'] != 'Not Set') { ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-map-marker"></i> <strong>Current Location :</strong> <?php echo $formdata['currlocation'];?>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($formdata['cexp']) { ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-clock-o"></i> <strong>Experience :</strong> <?php echo number_format(($formdata['cexp']/12), 1).' Yrs';?>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($formdata['ccompany'] != 'Not Set') { ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-building"></i> <strong>Current Company :</strong> <?php echo $formdata['ccompany'];?>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($formdata['cjfunction'] != 'Not Set') { ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-sitemap"></i> <strong>Functional Area :</strong> <?php echo $formdata['cjfunction']; ?>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($formdata['cindustry'] != 'Not Set') { ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-anchor"></i> <strong>Industry :</strong> <?php echo $formdata['cindustry']; ?>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($formdata['ceducation'] != 'Not Set') { ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-graduation-cap"></i> <strong>Education :</strong> <?php echo $formdata['ceducation']; ?>
                                                    </div>
                                                    <!-- <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-calendar"></i> <strong>Date of Birth :</strong>  <?php// echo $formdata['cdob']; ?>
                                                    </div> -->
                                                    <?php } ?>
                                                    <?php if($formdata['gender'] != 'Not Set') { ?>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-user"></i> <strong>Gender :</strong>  <?php echo $formdata['gender']; ?>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($formdata['cskills'] != 'Not Set') { ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-tags"></i> <strong>Skills :</strong>  <?php echo $formdata['cskills']; ?>
                                                    </div>
                                                     <?php } ?>
                                                </div>
                                            </div>
                                            
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Profile Summary</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <?php for($s=0;$s<count($formdata['csummary']);$s++) { ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <i class="fa fa-chevron-circle-right"></i> <?php echo $formdata['csummary'][$s]; ?>
                                                    </div>
                                                    <?php } ?>                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Work Experience</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <?php foreach($formdata['cworkexp'] as $wexp) { ?>
                                                    <?php if(isset($wexp['cmpname']) || isset($wexp['cmpperiod'])) { ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <p>
                                                        	<i class="fa fa-building"></i> <?php echo (isset($wexp['cmpname']))?$wexp['cmpname']:'No Name'; ?> <br /> 
                                                            <em><i class="fa fa-history"></i> <?php echo (isset($wexp['cmpperiod']))?number_format(($wexp['cmpperiod']/12), 1).' year(s) of experience':'Not Set';?></em>
                                                        </p>
                                                    </div>
                                                    <?php } } ?>
                                                    
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                    
                                        <div class="col-md-4 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Quick Connect <!--<small>different form elements</small>--></h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                	<?php if($formdata['cemail'] != 'Not Set') { ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-reply"></i> <strong>Alert to :</strong>  <?php echo $formdata['cemail']; ?>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($formdata['cphone'] != 'Not Set') { ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-phone"></i> <strong>Call me on :</strong> <?php echo $formdata['cphone']; ?>
                                                    </div>
                                                    <?php } ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-flag"></i> <strong>Willing to relocate? :</strong>  <?php echo ($formdata['creloc']==1)?'Yes':'No'; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-4 col-xs-12">
                                            <div class="x_panel">
                                                <div class="x_title">
                                                    <h2>Social Media Connections</h2>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <?php if($formdata['linkurl'] != '') { ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <i class="fa fa-linkedin"></i> <strong>LinkedIn :</strong> <?php echo ($formdata['linkurl']=='')?'Not Set':$formdata['linkurl']; ?>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($formdata['fburl'] != '') { ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <i class="fa fa-facebook"></i> <strong>Facebook :</strong> <?php echo ($formdata['fburl']=='')?'Not Set':$formdata['fburl']; ?>
                                                    </div>
                                                    <?php } ?>
                                                    <?php if($formdata['twurl'] != '') { ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <i class="fa fa-twitter"></i> <strong>Twitter :</strong> <?php echo ($formdata['twurl']=='')?'Not Set':$formdata['twurl']; ?>
                                                    </div>
            										<?php } ?>
                                                    <?php if($formdata['gurl'] != '') { ?>
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <i class="fa fa-google-plus"></i> <strong>Google+ :</strong> <?php echo ($formdata['gurl']=='')?'Not Set':$formdata['gurl']; ?>
                                                    </div>
                                                    <?php } ?>
                                                    
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
                                                       <i class="fa fa-calendar"></i> <strong>Created On :</strong>  <?php echo ($formdata['createddt']==0)?'Not Set': date('d-M-Y', ($formdata['createddt']/1000)); ?>
                                                    </div>
                                                    
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-calendar"></i> <strong>Last Updated :</strong>  <?php echo ($formdata['updateddt']==0)?'Not Set': date('d-M-Y', $formdata['updateddt']/1000); ?>
                                                    </div>
                                                    <!-- <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                       <i class="fa fa-calendar"></i> <strong>Resume Date :</strong>  <?php //echo ($formdata['resumedt']==0)?'Not Set': date('d-M-Y', (strtotime($formdata['resumedt']))); ?> 
                                                    </div> -->
                                                   
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                        <?php if($balnocv != 0) { ?>
                                                        <?php if($formdata['resumepath'] != '') { ?>
                                                                <!-- <a href="<?php //echo $this->config->base_url().$formdata['resumepath']; ?>" target="_blank"><button id="dwnload" class="btn btn-success pull-right"><i class="fa fa-eye"></i>  Download Resume</button></a>
                                                                -->
                                                                <button id="dwnload" class="btn btn-success pull-right"><i class="fa fa-eye"></i>  Download Resume</button>                                                                
                                                                <input type="hidden" id="personid" value="<?php echo $formdata['personid']; ?>" />
                                                                <input type="hidden" id="profileid" value="<?php echo $formdata['resumepath']; ?>" />
                                                                 
                                                                
                                                            <?php } else { ?>
                                                                <button class="btn btn-danger pull-right" style="margin-right: 5px;"><i class="fa fa-eye"></i> Unable to Download Resume</button>
                                                            <?php } ?>
                                                        <?php } else { ?>
                                                        	<a href="<?php echo $this->config->base_url().'Subscriptions';?>" class="btn btn-success pull-right" target="_blank">
                                                                    <i class="fa fa-shopping-cart"></i>  Subscribe Now!
                                                                </a>
                                                        <?php } ?>  
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
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="x_content">
                                                    <br />
                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                       <!--style="width: 1100px; height: 900px;" -->
                                                       <?php // 'http://docs.google.com/viewerng/viewer?url='. $this->config->base_url().'hwresume/'.$formdata['resumepath'].'&embedded=true' ?>
                                                       <iframe id="googframe" src="" style="width: 900px; height: 600px;" frameborder="0"></iframe>
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
    <script>
		$(document).ready(function () {
			$('#dwnload').click(function () {
				/*var form_data = {
					profileid: $('#profileid').val(),
					personid: $('#personid').val()
				}*/
				var form_data = {
					personid: '<?php echo $formdata['personid']; ?>',
					profileid: '<?php echo $formdata['resumepath']; ?>'
				}

				$.ajax({
					url: '<?php echo base_url().'profile/downloadresume'; ?>',
					type:'POST',
					data: form_data,
					cache: false,
					success: function(data) {
					   // data is ur summary
						//alert('Success');
						window.open(data);					
					}
				});	
			});
			
			$('#profile-tab').click(function () {
				var form_data = {
					personid: '<?php echo $formdata['personid']; ?>',
					profileid: '<?php echo $formdata['resumepath']; ?>'
				}

				$.ajax({
					url: '<?php echo base_url().'profile/downloadresume'; ?>',
					type:'POST',
					data: form_data,
					cache: false,
					success: function(data) {
					   // data is ur summary
						//alert('Success');
						$('#googframe').attr('src','http://docs.google.com/viewerng/viewer?url='+ data +'&embedded=true'); 				
					}
				});	
			});
			
		});
	</script>