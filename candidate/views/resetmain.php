	
	<style>
	.lform {
		margin: auto !important;
		padding: 22px 108px 26px;
		background-color: #CCC;
		float:none;
		clear:both;
	}
	.login_box_new {
		border: 1px solid #fff;
		border-radius: 5px;
		margin: 1em 0 1em;
		padding: 10px;
		text-align: center;
	}
	.reset_pass {
		color:#333;
		font-size:11px;
	}
	</style>
    <section id="commonsection">
		<div class="container">
            <div class="row">
                <div class="signup-main">
                    <div class="col-lg-12">
                        <div class="content-header text-center">
                            <h1>Find the <strong>RIGHT job</strong>. Login and update your Profile!</h1>
                            <h2>See how Cherry Hire can transform your Career.</h2>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    
                    <div class="col-lg-6 lform">
                        <div><?php echo $errmsg; ?></div>
                        <div class="clearfix"> </div>
                        <form method="post" name="resetfrm" id="resetfrm" action="<?php echo $this->config->base_url();?>User/ConfirmReset/?process=go" class="login_box_new">
                            <h5>Reset <strong>Password</strong></h5>
                            <input type="hidden" value="<?php echo $encrypt_id; ?>" name="encrypt_id" id="encrypt_id">
                            <input type="hidden" value="<?php echo $auth_id; ?>" name="auth_id" id="auth_id">
                            <div class="col-md-12 space-top-12">
                                <span id="npwd_validate"></span>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                                    <input type="password" class="form-control" placeholder="Enter New Password" value="" name="npwd" id="npwd" required>
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <span id="ncpwd_validate"></span>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                                    <input type="password" class="form-control" placeholder="Re-Confirm Password" value="" name="ncpwd" id="ncpwd" required>
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <span id="vcode_validate"></span>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="icon-eye"></i></span>
                                    <input type="text" class="form-control" placeholder="Enter Verification Code" value="" name="vcode" id="vcode" required>
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <input type="submit" value="Reset Password" class="col-md-12 btn btn-success">
                            </div>
                            <div class="clearfix"> </div>
                        </form>
                    </div>
                    <div class="clearfix"> </div>
                </div>
        	</div>
        </div>
		<div class="clearfix"> </div>
    </section>

	<script>
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
    
        jQuery( document ).ready(function( $ ) {
            $("#resetfrm").validate({
                 rules: {
                    npwd:{
                        required: true,
                        minlength: 8
                    },
                    ncpwd:{
                        equalTo: "#npwd",
                        required: true
                    },
                    vcode:{
                        required: true
                    }
                 },
                 messages: {
                    npwd:{
                        required: 'Password required',
                        minlength: 'The password should be atleast 8 characters long'
                    },
                    ncpwd:{
                        required: 'Password required',
                        equalTo: 'The passwords do not match'
                    },
                    vcode:{
                        required: 'Verification code required'
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