    <!-- page content -->
	<div class="right_col" role="main">
    	<div class="">
                    <div class="page-title">
                    	<?php echo $message; ?>
                        <div class="title_left">
                            <h3>
                               <?php //echo $pagehead; ?>
                                <!--<small>
                                    Some examples to get you started
                                </small>-->
                            </h3>
                        </div>
                        <?php if($pwdstat == 1) { ?>
                        <script type="text/javascript">
                          $(document).ready(function(){
                            alert("Your Password has been changed successfully. Please login again.")
                            document.location.href = '<?php echo base_url(); ?>'+'Logout';
                          });
                        </script>
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
						<form class="form-horizontal form-label-left input_mask" id="pwdfrm" name="pwdfrm" action="<?php echo base_url(); ?>ProfileSettings" method="post">
                        <div class="col-md-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Change Password</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    	
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <label for="oldpwd">Current Password</label> 
                                            <input type="password" class="form-control has-feedback-left" placeholder="Current Password" value="" name="oldpwd" id="oldpwd" required >
                                            <span id="oldpwd_validate"></span>
                                            <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        
                                         <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <label for="usrpwd">New Password</label> 
                                            <input type="password" class="form-control has-feedback-left" placeholder="New Password" value="" name="usrpwd" id="usrpwd" required >
                                            <span id="usrpwd_validate"></span>
                                            <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <label for="repwd">Confirm Password</label> 
                                            <input type="password" class="form-control has-feedback-left" placeholder="Confirm Password" value="" name="repwd" id="repwd" required >
                                            <span id="repwd_validate"></span>
                                            <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        
                                        
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5">
                                                <button type="submit" class="btn btn-success"  tabindex="16">Update</button>
                                            </div>
                                        </div>
                                        
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Look Up</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
										<div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                Account Email : <?php echo $formdata['cmail']; ?>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                Created on : <?php echo $formdata['createddt']; ?>

                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                Last updated on : <?php echo $formdata['updateddt']; ?>

                                            </div>
                                        </div>
                                        
                                </div>
                            </div>
                        </div>
                        </form>
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
$(document).ready(function() {
	var AjaxURL = "<?php echo $this->config->base_url().'PasswordValid';?>";
	
	$.validator.addMethod("pwdeval", function(value, element) {
		var response;  
		//var pswd=$('#usrpwd').val();    
		var pswd = value;    
		response = 0;
		//validate the length
		if ( pswd.length < 8 ) {
			response = 1;
		}
	
		//validate letter
		if ( !pswd.match(/[a-z]/) ) {
			response = 1;
		}
	
		//validate capital letter
		if ( !pswd.match(/[A-Z]/) ) {
			response = 1;
		}
	
		//validate number
		if ( !pswd.match(/\d/) ) {
			response = 1;
		}
	
		if (response == 1) {
		  return false;
		} else {
		  return true;
		}
	  
	  }, "");
	  
	  $.validator.addMethod("chkpwd", function(value, element) {
		var response;
		//var email = $('#emailid').val();
		var cpwd = value;
		$.ajax({
			type: "POST",
			url: AjaxURL,
			data:{cpwd:cpwd},
			async:false,
			success:function(data){
				response = data;
			}
		});
		
		if (response == 0) {
			return false;
		} else {
			return true;
		}
	
	}, "");
	  
      $('#usrpwd').tooltip({'trigger':'focus', 'html':'true', 'title': '<b>Password must contain:</b> <br > Atleast 8 characters.'});
      
	  $("#pwdfrm").validate({
		 rules: {
			oldpwd:{
				required: true,
				chkpwd: true
			},
			usrpwd:{				
				required: true,
        		minlength: 8
			},
			repwd:{
				equalTo: "#usrpwd",
				required: true
			}
		 },
		 messages: {
			oldpwd:{
				required: 'Enter your current password',
				chkpwd: 'Your password was incorrect'
			},
			usrpwd:{
				required: 'Password required',
				minlength: 'Password does not match the required criteria'
			},
			repwd:{
				required: 'Password required',
				equalTo: 'The passwords do not match'
			}
		 },
		  errorPlacement : function(error, element) {
			     //$('#ErrAlert').append(error);
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_validate"));
      },
      success: function (label, element) {
			  label.parent().removeClass('error');
    		label.remove();  
      },
	});
	
});
</script> 