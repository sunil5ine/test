
    <!--common footer start herer-->
    <section id="subscribe">
        <div class="container">
        	<div class="row">
                <div class="col-md-4 col-sm-5 col-xs-12"><span class="headlabel">Subscribe to our newsletter</span></div>
                <div class="col-md-8 col-sm-7 col-xs-12">
                    <span class="search" style="float:left;">
                        <!-- Begin MailChimp Signup Form -->
                        <div id="mc_embed_signup">
                            <form action="//cherryhire.us12.list-manage.com/subscribe/post?u=6574db52fa2b53dbce48c4d82&amp;id=470f8ef08b&AMP;MMERGE1=MainForm" class="form-inline" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll" class="form-group" style="width:90%;">
                                    <input type="email" value="" name="EMAIL" class="form-control" id="mce-EMAIL" style="width:80%;align-content: center" placeholder="Please enter your email address" required>
                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_6574db52fa2b53dbce48c4d82_470f8ef08b" tabindex="-1" value=""></div>
                                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-danger">
                                </div>
                            </form>
                        </div>
                        <!--End mc_embed_signup-->
                    </span>
                </div>
            </div>
        </div>
    </section>
    <footer>
        <div class="container">
            <div class="row">
	  	    	<div class="col-md-12 text-center footer-top"> 
                <h2>Have questions? We are here to help</h2>

				<h3>support@cherryhire.com</h3>
                </div>
                <div class="col-md-12 text-center footer-middle"> 
                	<ul>
	  	             	<li><a href="<?php echo $this->config->base_url();?>About">About Us</a></li>
                     	<li><a href="<?php echo $this->config->base_url();?>Privacy">Privacy</a></li>
                     	<li><a href="<?php echo $this->config->base_url();?>Terms">Terms and Conditions</a></li>
                     	<li><a href="<?php echo $this->config->base_url();?>Contact">Contact Us</a></li>
                        <li><a href="<?php echo $this->config->base_url();?>blog">Blog</a></li>
                	</ul>
                </div>
                <div class="col-md-12 layout-margin-btm text-center">
	             <p> <?php echo $thisyear; ?> &copy; Cherry Hire. All right reserved. </p>
	  	    	</div>
	  	    	<div class="col-md-12 layout-margin-btm">
                     <ul class="list-inline social-buttons">
                        <li><a rel="nofollow" href="http://facebook.com/cherryhire" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a rel="nofollow" href="https://twitter.com/cherry_hire" target="_blank"><i class="fa fa-twitter"></i></a></li>
                        <li><a rel="nofollow" href="http://instagram.com/cherryhire" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a rel="nofollow" href="https://linkedin.com/company/cherry-hire" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                        <li><a rel="nofollow" href="https://www.youtube.com/channel/UCw8IiW6dM5JmgGH4ijJWpjA" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        <li><a rel="nofollow" href="http://blog.cherryhire.com/" target="_blank"><i class="fa fa-rss"></i></a></li>
                    </ul>
	  	    	</div>
	  	    	<div class="clearfix"> </div>
            </div>
        </div>
    </footer>
    
    <div id="nlModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Notification</h4>
            </div>
            <div class="modal-body">
                <!--<p><?php //echo $message; ?></p>-->
                <div id="dynamic-content"></div>
            </div>
        </div>
    </div>
    </div>
                    
    
    <!--Modal-->
    <div id="SigninModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Sign In</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12 signin-left">
                        <div class="col-md-12">
                            <div class="text-center">
                                <label  class="btn btn-danger" id="semp" onclick="chngsignin_label('Employer','Job Seeker','semp','scand');"> <?php if($emid!=0){ echo '<i class="fa fa-check-square"></i>'; } else { echo '<i class="fa fa-square-o"></i>'; }?> I'm an Employer </label>
                                <label  class="btn btn-success" id="scand" onclick="chngsignin_label('Job Seeker','Employer','scand','semp');"> <?php if($cmid!=0){ echo '<i class="fa fa-check-square"></i>'; } else { echo '<i class="fa fa-square-o"></i>'; }?> I'm a Job Seeker </label>
                            </div>
                        </div>
                        <div class="row" id="sempdiv" <?php if($cmid!=0){ echo 'style="display:none;"';} ?>>
                            <form method="post" name="signinfrm" action="<?php echo $this->config->base_url('hire/Login');?>" data-toggle="validator" role="form">
                                <div class="col-md-12 space-top-12">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="text" class="form-control" placeholder="Email ID/UserName" name="username" id="username" required>
                                    </div>
                                </div>
                                <div class="col-md-12 space-top-12">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                                    </div>
                                </div>
                                <div class="col-md-12 space-top-12 text-center">
                                    <input type="submit" value="Login" class="btn btn-success">
                                </div>
                                <div class="col-md-12">
                                    <a href="<?php echo $this->config->base_url('hire/Login');?>User/ForgotPassword">Forgot Password?</a>
                                    <a href="<?php echo $this->config->base_url().'PostJob';?>" class="pull-right">New Registration?</a>
                                </div>
                            </form>
                        </div>
                        <div class="row" id="scanddiv" <?php if($emid!=0){ echo 'style="display:none;"';} ?>>
                            <form method="post" name="candfrm" action="<?php echo $this->config->base_url('candidate/LoginProcess');?>" data-toggle="validator" role="form">
                                <div class="col-md-12 space-top-12">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email" class="form-control" placeholder="Your Email ID" name="emailid" id="emailid" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-12 space-top-12">
                                    <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="Your Password" name="pwd" id="pwd" value="" required>
                                    </div>
                                </div>
                                <div class="col-md-12 space-top-12 text-center">
                                    <input type="submit" value="Login" class="btn btn-success">
                                </div>
                                <div class="col-md-12">
                                    <a href="<?php echo $this->config->base_url('candidate/LoginProcess');?>User/ForgotPassword">Forgot Password?</a>
                                    <a href="<?php echo $this->config->base_url().'PostCV';?>" class="pull-right">New Registration?</a>
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
    <!-- Ends -->

    <!--footer scripts--> 
    <script type="text/javascript">
    	//Newsletter Msg modal init		
		function chngsignin_label(slabltxt, sclabltxt, sthelabel, sclabel)
		{            
            var slabelvar 	= document.getElementById(sthelabel);
            var sclabelvar 	= document.getElementById(sclabel);
            var ssid 		= document.getElementById(sthelabel+'div');
            var shid 		= document.getElementById(sclabel+'div');
        
            if(sthelabel == 'semp') {
                slabelvar.innerHTML	 	= "<i class='fa fa-check-square'></i> I'" + "m an " + slabltxt;
                sclabelvar.innerHTML 	= "<i class='fa fa-square-o'></i> I'" + "m a " + sclabltxt;
            } else {
                slabelvar.innerHTML 	= "<i class='fa fa-check-square'></i> I'" + "m a " + slabltxt;
                sclabelvar.innerHTML 	= "<i class='fa fa-square-o'></i> I'" + "m an " + sclabltxt;
            }            
            $(shid).hide();
            $(ssid).show();
            
    	}		
    
    $(document).ready(function(){
		$("#nl_submit").click(function(){
			var email = $("#nl_emailid").val();
			var rurl = $("#nl_Return").val();
			// Returns successful data submission message when the entered information is stored in database.
			var dataString = 'nl_emailid='+ email + '&nl_Return='+ rurl;
			if(email=='')
			{
				alert("Please enter the email id");
			}
			else
			{
				// AJAX Code To Submit Form.
				$.ajax({
					type: "POST",
					url: "<?php echo $this->config->base_url().'site/newsletter';?>",
					data: dataString,
					cache: false,
					success: function(result){
						$("#nl_emailid").val() = '';
						$('#dynamic-content').html(''); // blank before load.
          				$('#dynamic-content').html(result); // load here
						$("#nlModal").modal('show');
					}
				});
			}
			return false;
		});
	});
</script>
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    
      ga('create', 'UA-67756653-1', 'auto');
      ga('send', 'pageview');
    
    </script>

</body>
</html>