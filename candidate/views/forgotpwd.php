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
                        <form id="fpwdfrm" name="fpwdfrm" method="post" action="<?php echo $this->config->base_url();?>User/RecoverInitiate/" data-toggle="validator" role="form">
                            <h5><strong>Forgot Password</strong>? Enter your e-mail address below to reset your password!</h5>
                            <div class="col-md-12 space-top-12">
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="icon-envelope"></i></span>
                                    <input type="email" name="uemail" id="uemail" placeholder="Enter your email id" value="" autocomplete="off" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-12 space-top-12">
                                <input type="submit" value="Submit" class="col-md-12 btn btn-primary">
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
