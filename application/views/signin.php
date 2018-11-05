
<div class="about-banner">
	   <div class="container mb25">
      	<div id="login_form_wrap" class="w480 w100pPhone centerTable pRelative">
	      	 <div class="br8 whitePanel overflowHide mt50">
        		<div class="row intro">
          			<div class="col-md-12 signin-left">
                    	<div class="p25"><h1 class="text-center mb25">Sign In</h1>
                            	<div class="col-md-12 space-top-12  mb25">
                                    <div class="form-group input-group centerTable">
                                        <label  class="btn btn-success" id="emp" onclick="chnglabel('Employer','Job Seeker','emp','cand');"> <i class="icon-check-sign"></i> I'm an Employer </label>
                                        <label  class="btn btn-default" id="cand" onclick="chnglabel('Job Seeker','Employer','cand','emp');"> <i class="icon-check-empty"></i> I'm a Job Seeker </label>
                                    </div>
                                </div>
                                <div class="row" id="empdiv">
                                <form method="post" name="signinfrm" action="<?php echo $this->config->base_url();?>hire/login" data-toggle="validator" role="form">
                                 <div class="col-md-12 space-top-12">
                                     <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="icon-envelope"></i></span>
                                        <input type="text" class="form-control" placeholder="Email ID/UserName" name="username" id="username" required>
                                     </div>
                                 </div>
                                 <div class="col-md-12 space-top-12">
                                     <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                                     </div>
                                 </div>
                                 <div class="col-md-12 space-top-12">
                                        <input type="submit" value="Sign In" class="ser">
                                 </div>
                                 </form>
                                </div>
                                
                                <div class="row" id="canddiv" style="display:none;">
                                <form method="post" name="candfrm" action="#" data-toggle="validator" role="form">
                                <div class="col-md-12 space-top-12">
                                     <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="icon-envelope"></i></span>
                                        <input type="email" class="form-control" placeholder="Your Email ID" name="emailid" id="emailid" value="" required>
                                     </div>
                                </div>
                                <div class="col-md-12 space-top-12">
                                     <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="Your Password" name="pwd" id="pwd" value="" required>
                                     </div>
                                </div>
                                <div class="col-md-12 space-top-12">
                                        <input type="submit" value="Sign In" class="ser">
                                 </div>
                           		</form>
                                </div>
                        </div>
                    </div>
                </div>
             </div>       
        </div>
	   </div>
</div>

</div>

<script type="text/javascript">
$(function() {
	$('.faq_section').accordion({ multiOpen: false });
});


function chnglabel(labltxt, clabltxt, thelabel, clabel) {
    
    var labelvar = document.getElementById(thelabel);
	var clabelvar = document.getElementById(clabel);
	var sid = document.getElementById(thelabel+'div');
	var hid = document.getElementById(clabel+'div');
	labelvar.innerHTML = "<i class='icon-check-sign'></i> I'" + "m an " + labltxt;
	clabelvar.innerHTML = "<i class='icon-check-empty'></i> I'" + "m a " + clabltxt;
    
	$(labelvar).addClass('btn-success');	
	$(labelvar).removeClass('btn-default');	
	$(clabelvar).addClass('btn-default');	
	$(clabelvar).removeClass('btn-success');	
	
	$(hid).hide();
	$(sid).show();
	
}

</script>

<!--sharethis script-->
<div class="share-box">
<span class='st_facebook_hcount' displayText='Facebook'></span>
<span class='st_twitter_hcount' displayText='Tweet'></span>
<span class='st_pinterest_hcount' displayText='Pinterest'></span>
<span class='st_googleplus_hcount' displayText='Google +'></span>
</div>