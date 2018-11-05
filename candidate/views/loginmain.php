	<style>
	.lform {
		margin: auto !important;
		/*padding: 22px 108px 26px;*/
		padding: 22px 12px 26px;
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
                        <form method="post" name="signinfrm" action="<?php echo $this->config->base_url();?>LoginProcess/" data-toggle="validator" role="form" class="login_box_new">
                            <h5>Already <strong>REGISTERED</strong>? Login here!</h5>
                            <div class="col-md-12 space-top-12">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="icon-envelope"></i></span>
                                    <input type="email" class="form-control" placeholder="Email ID/UserName" name="emailid" id="emailid" required>
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="icon-lock"></i></span>
                                    <input type="password" class="form-control" placeholder="Password" name="pwd" id="pwd" required>
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <input type="submit" value="Sign In" class="col-md-12 btn btn-success">
                            </div>
                            <div class="col-md-12 space-top-12">
                                <div class="col-md-5 space-top-12">
                                    <a href="<?php echo $this->config->item('web_url').'PostCV';?>" class="reset_pass">New Signup</a>
                                </div>
                                <div class="col-md-7 space-top-12">
                                    <a data-toggle="modal" href="#myModal" class="reset_pass">Forgot Password?</a>
                                </div>
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
    
    
    <!-- Modal -->
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
      <div class="modal-dialog">
          <div class="modal-content">
              <form id="fpwdfrm" name="fpwdfrm" method="post" action="<?php echo $this->config->base_url();?>User/RecoverInitiate/" data-toggle="validator" role="form">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                  <p>Enter your e-mail address below to reset your password.</p>
                  <input type="email" name="uemail" id="uemail" placeholder="Enter your email id" value="" autocomplete="off" class="form-control" required>
              </div>
              <div class="modal-footer">
                  <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                  <button class="btn btn-default" type="submit">Submit</button>
              </div>
              </form>
          </div>
      </div>
    </div>
    <!-- modal -->