<link rel="stylesheet" href="<?php echo $this->config->base_url();?>css/postcv.css">

<link rel="stylesheet" href="<?php echo $this->config->base_url();?>Telebuild/css/intlTelInput.css">

<div class="about-banner">

	   <div class="container">

	      	 <div class="signup-main"> 

	      	 	<div class="col-lg-12">

                    <div class="content-header">

                        <h1>Sign up for <strong>FREE TRIAL ACCOUNT</strong> today!</h1>

                        <h2>Experience the all new hiring power of Cherry Hire</h2>

                    </div>

                </div>

                  <?php if(isset($status) && ($status=='success' || $status=='fail')) {  ?>

                    <div id="myModal" class="modal fade">

                    <div class="modal-dialog">

                        <div class="modal-content">

                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                <h4 class="modal-title">Notification</h4>

                            </div>

                            <div class="modal-body">

                                <p><?php echo $message; ?></p>

                            </div>

                        </div>

                    </div>

                    </div>

                 <?php } ?>



	      	     <div class="col-lg-6 col-lg-offset-0 col-sm-8 col-sm-offset-2 hidden-xs hidden-sm">

                    <div class="employer-testimonial">

                        <div class="meta row">

                            <div class="col-xs-12 col-sm-6 emppic"><img src="<?php echo $this->config->base_url();?>/images/emp-pic-1.png"></div>

                            <div class="col-xs-12 col-sm-6 col-md-6 testiby">

                                <div class="name">Sreejith Gopinath</div>

                                <div class="role">Co-Founder and CEO<br>Aatoon Solutions</div>

                            </div>

                        </div>

                        <div class="testimonial">

                            "Cherry Hire stands out with its power to persistently bring the most relevant talents to our hiring table. We have been able to use our time productively for potential hires."

                        </div>

                    </div>

        

                    <div class="employer-testimonial">

                        <div class="meta row">

                            <div class="col-xs-12 col-sm-6 emppic"><img src="<?php echo $this->config->base_url();?>/images/emp-pic-4.png"></div>

                            <div class="col-xs-12 col-sm-6 col-md-6 testiby">

                                <div class="name">Rakesh Raman</div>

                                <div class="role">Director <br>Go Alive Media, Bahrain</div>

                            </div>

                        </div>

                        <div class="testimonial">

                            "Thanks to Cherry Hire for your assistance and support throughout our search process for right candidates."

                        </div>

                    </div>

                </div>

                

                <div class="col-lg-6 col-lg-offset-0 col-sm-8 col-sm-offset-2 emp-reg-form">

                	<form method="post" name="signupfrm" id="signupfrm" action="<?php echo $this->config->base_url().$submiturl;?>" data-toggle="validator" role="form">

	      	   	      <!-- <h2>Signup for <strong>EMPLOYER ACCOUNT</strong> today!</h2> -->

                      <div id="ErrAlert"></div>

	      	   	      <div class="form-group row">

                          <div class="col-md-6 space-top-12">

                              <div class="input-group">

                                <span class="input-group-addon"><i class="icon-user"></i></span>

                                <input type="text" class="form-control" placeholder="First Name" value="<?php echo $formdata['firstname']; ?>" name="firstname" id="firstname" tabindex="1" required >

                              </div>

                          	  <span id="firstname_validate"></span>

                          </div>

                         <div class="col-md-6 space-top-12">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="icon-user"></i></span>

                                <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $formdata['lastname']; ?>"  name="lastname" id="lastname" tabindex="2" required >                                

                            </div>

                            <span id="lastname_validate"></span>

                         </div>

                     </div>

                     

                     <div class="form-group row">

                         <div class="col-md-12 space-top-12">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="icon-shield"></i></span>

                                <input type="text" class="form-control" placeholder="Designation" value="<?php echo $formdata['designation']; ?>"  name="designation" id="designation" tabindex="3" required >                                

                            </div>

                            <span id="designation_validate"></span>

                         </div>

                     </div>

                     

                     <div class="form-group row">

                         <div class="col-md-6 space-top-12">

                             <div class="input-group">

                                <span class="input-group-addon"><i class="icon-phone"></i></span>

                                <input type="hidden" class="form-control" placeholder="Code" value="<?php echo $formdata['cntrycode']; ?>"  name="cntrycode" id="cntrycode" tabindex="4" required >

                                <input type="text" class="form-control" maxlength="16" placeholder="Contact Number" value="<?php echo $formdata['phone']; ?>" name="phone" id="phone" tabindex="5" required >

                             </div>

                             <span id="phone_validate"></span>

                         </div>

                         <div class="col-md-6 space-top-12">

                             <div class="input-group">

                                <span class="input-group-addon"><i class="icon-envelope"></i></span>

                                <input type="email" class="form-control" placeholder="Company E-mail" name="emailid" id="emailid" value="<?php echo $formdata['emailid']; ?>" tabindex="6" required>

                             </div>

                             <span id="emailid_validate"></span>

                         </div>

                     </div>

                         

                     <div class="form-group row">

                         <div class="col-md-6 space-top-12">

                              <div class="input-group">

                                <span class="input-group-addon"><i class="icon-lock"></i></span>

                                <input data-toggle="tooltip" type="password" class="form-control" placeholder="Password" value="<?php echo $formdata['usrpwd']; ?>" name="usrpwd" id="usrpwd" tabindex="7" required >

                              </div>

                              <span id="usrpwd_validate"></span>

                          </div>

                              

                         <div class="col-md-6 space-top-12">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="icon-lock"></i></span>

                                <input type="password" class="form-control" placeholder="Confirm Password" value="<?php echo $formdata['repwd']; ?>" name="repwd" id="repwd" tabindex="8" required >                                

                            </div>

                            <span id="repwd_validate"></span>

                         </div>

                     </div>

                     

                     <div class="form-group row">

                         <div class="col-md-8 space-top-12">

                             <div class="input-group">

                                <span class="input-group-addon"><i class="icon-building"></i></span>

                                <input type="text" class="form-control" placeholder="Company Name" name="comp" id="comp" value="<?php echo $formdata['comp']; ?>" tabindex="9" required>

                             </div>

                             <span id="comp_validate"></span>

                         </div>

                         <div class="col-md-4 space-top-12">

                            <div class="input-group">

                            <span class="input-group-addon"><i class="icon-group"></i></span>

                            	<select name="empcnt" id="empcnt" class="form-control" tabindex="10" required>

                                  <option disabled selected>Employees</option>

                                  <option <?php echo ($formdata['empcnt']=="1~3")?'selected':''; ?> value="1~3">1~3</option>

                                  <option <?php echo ($formdata['empcnt']=="3~10")?'selected':''; ?> value="3~10">3~10</option>

                                  <option <?php echo ($formdata['empcnt']=="10~25")?'selected':''; ?> value="10~25">10~25</option>

                                  <option <?php echo ($formdata['empcnt']=="25~50")?'selected':''; ?> value="25~50">25~50</option>

                                  <option <?php echo ($formdata['empcnt']=="50~100")?'selected':''; ?> value="50~100">50~100</option>

                                  <option <?php echo ($formdata['empcnt']=="100+")?'selected':''; ?> value="100+">100+</option>

                              	</select>                              

                              </div>

                            <span id="empcnt_validate"></span>

                         </div>

                     </div>

                     

                     <div class="form-group row">

                         <div class="col-md-6 space-top-12">

                             <div class="input-group">

                                <span class="input-group-addon"><i class="icon-compass"></i></span>

                                <!-- <input type="text" class="form-control" placeholder="Company Location" name="complocation" id="complocation" value="<?php //echo $formdata['complocation']; ?>" required> -->

                                <?php echo form_dropdown('complocation',$country_list,$formdata['complocation'],'id="complocation" class=" form-control" tabindex="11" required');?>

                             </div>

                             <span id="complocation_validate"></span>

                         </div>

                         <div class="col-md-6 space-top-12">

                             <div class="input-group">

                                <span class="input-group-addon"><i class="icon-globe"></i></span>

                                <input type="text" class="form-control" placeholder="Company Website(www.example.com)" name="url" id="url" value="<?php echo $formdata['url']; ?>" tabindex="12" required>

                             </div>

                             <span id="url_validate"></span>

                         </div>

                     </div>

                     

                     <div class="form-group row">

                         <div class="col-md-12 space-top-12">

                            <div class="input-group">

                            <span class="input-group-addon"><i class="icon-info"></i></span>

                            <textarea class="form-control" info="Company description should contain atleast 150 characters or more."  expand="125px" placeholder="Company Description" name="descr" id="descr" tabindex="13"><?php echo $formdata['descr']; ?></textarea>

                            </div>

                            <span id="descr_validate"></span>

                         </div>

                     </div>

                     

                     <div class="col-md-12">

                     	<h3>Are you an employment Agency?</h3>

                          <div class="radio">

                            <label>

                              <input type="radio" name="emptype" id="emptype1" value="1" <?php echo ($formdata['emptype']==1)?'checked':''; ?> tabindex="14" >

                              No, we recruit directly.

                            </label>

                          </div>

                          <div class="radio">

                            <label>

                              <input type="radio" name="emptype" id="emptype2" value="2" <?php echo ($formdata['emptype']==2)?'checked':''; ?> tabindex="15" >

                              Yes, we're a Headhunting Agency.

                            </label>

                          </div>

                          <div class="radio">

                            <label>

                              <input type="radio" name="emptype" id="emptype2" value="3" <?php echo ($formdata['emptype']==3)?'checked':''; ?> tabindex="16" >

                              Yes and No. We recruit directly and are also a Headhunting Agency.

                            </label>

                          </div>

                     </div>

                     

                     <div class="col-md-12">

                          <div class="form-group input-group">

                          	<span id="tandc_validate"></span>

                            <label>

                              <input type="checkbox" name="tandc" id="tandc" value="1" checked tabindex="17" required> I agree with the Terms and Conditions 

                            </label>

                          </div>

                          <input name="return_url" type="hidden" value="http://staging.cherryhire.com/PostJob">

                     </div>

                     

                     <div class="col-md-12 text-center">

                            <input type="submit" value="Sign Up" class="ser" tabindex="18">

                     </div>

                     </form>

                </div>

	      	     

                 

	      	   <div class="clearfix"> </div>

	      	 </div>

	   </div>

</div>



<script src="<?php echo $this->config->base_url();?>Telebuild/js/intlTelInput.js"></script>

<script src="<?php echo $this->config->base_url();?>js/countrySync.js"></script>

<script type="text/javascript">

  $('#usrpwd').tooltip({'trigger':'focus', 'placement':'bottom', 'html':'true', 'title': '<b>Password must contain:</b> <br > Atleast 8 characters.'});

</script>

<script src="<?php echo $this->config->base_url();?>js/jquery-ui.min.js"></script>

<link rel="stylesheet" href="<?php echo $this->config->base_url();?>css/jquery-ui.css" />

<script type="text/javascript">

	var AjaxURL = "<?php echo $this->config->base_url().'EmailCheck';?>";

</script>

<script src="<?php echo $this->config->base_url();?>js/signup.js"></script>

<script type="text/javascript">	

        $("#myModal").modal('show');

</script>





<!--sharethis script-->

<!-- <div class="share-box">

<span class='st_facebook_hcount' displayText='Facebook'></span>

<span class='st_twitter_hcount' displayText='Tweet'></span>

<span class='st_pinterest_hcount' displayText='Pinterest'></span>

<span class='st_googleplus_hcount' displayText='Google +'></span>

</div>

-->