<style>
.left-inner-addon {
    position: relative;
}
.left-inner-addon input {
    padding-left: 30px;    
}
.left-inner-addon i {
    position: absolute;
    padding: 10px 12px;
    pointer-events: none;
}

.right-inner-addon {
    position: relative;
}
.right-inner-addon input {
    padding-right: 30px;    
}
.right-inner-addon i {
    position: absolute;
    right: 0px;
    padding: 10px 12px;
    pointer-events: none;
}
.space-top-12 {
	margin-top:15px;
}
i {
	color:#999;	
}
</style>
<div class="about-banner">
	   <div class="container mb25">
      	<div id="login_form_wrap" class="w480 w100pPhone centerTable pRelative">
	      	 <div class="br8 whitePanel overflowHide mt50">
        		<div class="row intro">
                	
          			<div class="col-md-12 signin-left">
                    	<div class="p25">
                        <?php echo $errmsg; ?>
                        <h1 class="text-center mb25">Change Password</h1>
                        		<?php if($stat == 'invalid' || $stat == 'success') { echo $message; } else { ?>
                                <form method="post" name="cpwdfrm" action="<?php echo $this->config->base_url();?>User/Changepwd/?process=change&pid=<?php echo base64_encode($this->encrypt->encode($cid)); ?>&exp=<?php echo base64_encode($this->encrypt->encode($startdt)); ?>&auth=<?php echo base64_encode($this->encrypt->encode($vcode)); ?>" data-toggle="validator" role="form">
                                <input name="authcode" type="hidden" value="<?php echo base64_encode($this->encrypt->encode($cid)); ?>" />
                                <input name="validcode" type="hidden" value="<?php echo base64_encode($this->encrypt->encode($startdt)); ?>" />
                                <input name="verifycode" type="hidden" value="<?php echo base64_encode($this->encrypt->encode($vcode)); ?>" />
                                <div class="col-md-12 space-top-12">
                                     <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="New Password" name="npwd" id="npwd" value="" required>
                                     </div>
                                </div>
                                <div class="col-md-12 space-top-12">
                                     <div class="form-group input-group">
                                        <span class="input-group-addon"><i class="icon-lock"></i></span>
                                        <input type="password" class="form-control" placeholder="Confirm Password" name="cpwd" id="cpwd" value="" required>
                                     </div>
                                </div>
                                <div class="col-md-12 space-top-12">
                                        <input type="submit" value="Submit" class="ser">
                                 </div>
                           		</form>
                                <?php } ?>
                        </div>
                    </div>
                </div>
             </div>       
        </div>
	   </div>
</div>