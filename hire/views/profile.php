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
    <link rel="stylesheet" href="<?php echo $this->config->base_url();?>Telebuild/css/intlTelInput.css">
    <!-- page content -->
	<div class="right_col" role="main">
    	<div class="">
                    <div class="page-title">
                    	<?php echo $message; ?>
                        <div class="title_left">
                            <h3>
                               <?php echo $pagehead; ?>
                            </h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        
                        <div class="col-md-6 col-xs-12">
                        	<form method="post" name="basicfrm" id="basicfrm" action="<?php echo $this->config->base_url().'AccountSettings';?>">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Profile Overview</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                 <label for="fname">First Name</label> 
                                                 <input type="text" class="form-control has-feedback-left" id="fname" name="fname" placeholder="First Name" required  value="<?php echo $formdata['fname']; ?>">
                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                <span id="fname_validate"></span>
                                            </div>
                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label for="lname">Last Name</label> 
                                                <input type="text" class="form-control has-feedback-left" id="lname" name="lname" placeholder="Last Name" value="<?php echo $formdata['lname']; ?>" >
                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                                <span id="lname_validate"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label for="designation">Designation</label> 
                                                <input type="text" class="form-control has-feedback-left" placeholder="Designation" value="<?php echo $formdata['designation']; ?>"  name="designation" id="designation" required >
                                                <span class="fa fa-shield form-control-feedback left" aria-hidden="true"></span>
                                                <span id="designation_validate"></span>
                                            </div>
                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                <label for="phone">Contact No</label> 
                                                <input type="hidden" class="form-control" placeholder="Code" value="<?php echo $formdata['cntrycode']; ?>"  name="cntrycode" id="cntrycode" required >
                                                <input type="text" class="form-control" placeholder="Contact Number" value="<?php echo $formdata['phone']; ?>" name="phone" id="phone" required >
                                                <span id="phone_validate"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label for="usrpwd">Password</label> 
                                                <input type="password" class="form-control has-feedback-left" placeholder="Password" value="<?php echo $formdata['usrpwd']; ?>" name="usrpwd" id="usrpwd" required >
                                                <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                                                <span id="usrpwd_validate"></span>
                                            </div>
    
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label for="repwd">Confirm password</label> 
                                                <input type="password" class="form-control" placeholder="Re-Password" value="<?php echo $formdata['repwd']; ?>" name="repwd" id="repwd" required >
                                                <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                                                <span id="repwd_validate"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                                <label for="repwd">Location</label> 
                                                <input type="text" class="form-control" placeholder="Company Location" value="<?php echo $formdata['complocation']; ?>" name="complocation" id="complocation" required >
                                                <span class="fa fa-compass form-control-feedback right" aria-hidden="true"></span>
                                                <span id="complocation_validate"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label for="disname">Display Name</label> 
                                                <input type="text" class="form-control has-feedback-left" id="disname" name="disname" placeholder="Display Name" required  value="<?php echo $formdata['disname']; ?>">
                                                <span class="fa fa-building form-control-feedback left" aria-hidden="true"></span>
                                                <span id="disname_validate"></span>
                                            </div>
                                        
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <label for="notifyemail">Notification Email</label> 
                                                <input type="email" class="form-control" placeholder="Notification Email" value="<?php echo $formdata['notifyemail']; ?>" name="notifyemail" id="notifyemail" required >
                                                <span class="fa fa-envelope form-control-feedback right" aria-hidden="true"></span>
                                                <span id="notifyemail_validate"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-8 col-sm-8 col-xs-12 form-group has-feedback">
                                                <label for="notifyemail">Company Website</label> 
                                                <input type="text" class="form-control has-feedback-left" placeholder="Company Website" value="<?php echo $formdata['compurl']; ?>" name="compurl" id="compurl" required >
                                                <span class="fa fa-globe form-control-feedback left" aria-hidden="true"></span>
                                                <span id="compurl_validate"></span>
                                            </div>
                                            
                                            <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                                <label for="notifyemail">No of Employees</label> 
                                                <select name="empcnt" id="empcnt" class="form-control has-feedback-left" required>
                                                      <option disabled selected>Employees</option>
                                                      <option <?php echo ($formdata['empcnt']=="1~3")?'selected':''; ?> value="1~3">1~3</option>
                                                      <option <?php echo ($formdata['empcnt']=="3~10")?'selected':''; ?> value="3~10">3~10</option>
                                                      <option <?php echo ($formdata['empcnt']=="10~25")?'selected':''; ?> value="10~25">10~25</option>
                                                      <option <?php echo ($formdata['empcnt']=="25~50")?'selected':''; ?> value="25~50">25~50</option>
                                                      <option <?php echo ($formdata['empcnt']=="50~100")?'selected':''; ?> value="50~100">50~100</option>
                                                      <option <?php echo ($formdata['empcnt']=="100+")?'selected':''; ?> value="100+">100+</option>
                                                  </select>
                                                <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>
                                                <span id="empcnt_validate"></span>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5">
                                                <button type="submit" class="btn btn-success"  tabindex="16">Update</button>
                                            </div>
                                        </div>
                                        
                                </div>
                            </div>
                            <input name="empid" type="hidden" value="<?php echo $prodetails['emp_authkey'];?>" />
                        	</form>
                        </div>
                        
                        <div class="col-md-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Look Up</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
										<div class="row form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <strong>Company Name :</strong> <?php echo $prodetails['emp_comp_name']; ?>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <strong>Account Email :</strong> <?php echo $prodetails['emp_email']; ?>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <strong>Created date :</strong> <?php echo date('d M Y', strtotime($prodetails['emp_reg_date'])); ?>
                                            </div>
                                        </div>
                                        
                                        <div class="row form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <strong>Last updated date :</strong> <?php echo date('d M Y H:i:s', strtotime($prodetails['emp_update_date'])); ?>
                                            </div>
                                        </div>
                                        
                                </div>
                            </div>
                            
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
                        </div>
                        
                        
                        
                        <br />
                        <br />
                        <br />

                    </div>
                </div>

<!--Modal-->
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
                        <form method="post" name="smfrm" action="<?php echo $this->config->base_url().'UpdateSocialMedia/'.$prodetails['emp_authkey'];?>" data-toggle="validator" role="form">
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
<!-- modal ends -->
	<!-- footer content -->
    	<?php echo $footer_nav; ?>
        <!-- /footer content -->
    </div>
    <!-- /page content -->

<script src="<?php echo $this->config->base_url();?>Telebuild/js/intlTelInput.js"></script>
<script src="<?php echo $this->config->base_url();?>js/countrySync.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>js/bootstrap-filestyle.js"></script>
<link href="<?php echo $this->config->item('web_url');?>css/datepicker.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>js/employer.js"></script>
<script type="text/javascript">
	// When the document is ready
	$(document).ready(function () {		
		$('#picToUpload').filestyle({
			buttonName : 'btn-danger',
			buttonText : 'Choose Photo',
			placeholder : 'Upload your photo in jpg or png format; Max 2MB(500x500) size'
		});	

        //$('#usrpwd').tooltip({'trigger':'focus', 'html':'true', 'title': '<b>Password Tips</b> <br > -Should be at-least 8 characters long. <br > -Should contain upper & lowercase letters. <br > -Should contain at-least one digit.'});

		$("#imgHover").hover(
			function() {
				$(this).children("img").fadeTo(200, 0.85).end().children(".hover").show();
			},
			function() {
				$(this).children("img").fadeTo(200, 1).end().children(".hover").hide();
			});	
	});
	
	$.fn.editable.defaults.mode = 'popup';
</script>
