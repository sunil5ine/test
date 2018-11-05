<link rel="stylesheet" href="<?php echo $this->config->base_url();?>web/Telebuild/css/intlTelInput.css">



	<section id="empsection">

        <div class="container">

            <div class="row">

            	<div class="col-md-6 col-sm-12 col-xs-12 hidden-sm hidden-xs">

                	<img src="media/employer-img.png" class="img-responsive">

                </div>

                <div class="col-md-6 col-sm-12 col-xs-12 emp-reg-form">

                	<div class="content-header">

                        <h1>Create your Employer account Today</h1>

                        <h2>Already have an account? Sign in <a class="page-scroll" href="#" data-toggle="modal" data-target="#SigninModal">here</a></h2>

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

                    <form method="post" name="signupfrm" id="signupfrm" action="<?php echo $this->config->base_url().$submiturl;?>" data-toggle="validator" role="form">

                      <div id="ErrAlert"></div>

	      	   	      <div class="form-group row">

                          <div class="col-md-6 col-sm-6 space-top-30">                          	  

                              <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control" placeholder="First Name" value="<?php echo $formdata['firstname']; ?>" name="firstname" id="firstname" tabindex="1" required >

                              </div>

                              <span id="firstname_validate"></span>

                          </div>

                         <div class="col-md-6 col-sm-6 space-top-30">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $formdata['lastname']; ?>"  name="lastname" id="lastname" tabindex="2" required >                                

                            </div>

                            <span id="lastname_validate"></span>

                         </div>

                     </div>

                     

                     <div class="form-group row">

                         <div class="col-md-12 col-sm-12 space-top-30">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-shield"></i></span>

                                <input type="text" class="form-control" placeholder="Designation" value="<?php echo $formdata['designation']; ?>"  name="designation" id="designation" tabindex="3" required >                                

                            </div>

                            <span id="designation_validate"></span>

                         </div>

                     </div>

                     

                     <div class="form-group row">

                         <div class="col-md-6 col-sm-6 space-top-30">

                             <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                <input type="hidden" class="form-control" placeholder="Code" value="<?php echo $formdata['cntrycode']; ?>"  name="cntrycode" id="cntrycode" tabindex="4" required >

                                <input type="text" class="form-control" maxlength="16" placeholder="Contact Number" value="<?php echo $formdata['phone']; ?>" name="phone" id="phone" tabindex="5" required >

                             </div>

                             <span id="phone_validate"></span>

                         </div>

                         <div class="col-md-6 col-sm-6 space-top-30">

                             <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                <input type="email" class="form-control" placeholder="Company E-mail" name="emailid" id="emailid" value="<?php echo $formdata['emailid']; ?>" tabindex="6" required>

                             </div>

                             <span id="emailid_validate"></span>

                         </div>

                     </div>

                         

                     <div class="form-group row">

                         <div class="col-md-6 col-sm-6 space-top-30">

                              <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input data-toggle="tooltip" type="password" class="form-control" placeholder="Password" value="" name="usrpwd" id="usrpwd" tabindex="7" required >

                              </div>

                              <span id="usrpwd_validate"></span>

                          </div>

                              

                         <div class="col-md-6 col-sm-6 space-top-30">

                            <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                <input type="password" class="form-control" placeholder="Confirm Password" value="" name="repwd" id="repwd" tabindex="8" required >                                

                            </div>

                            <span id="repwd_validate"></span>

                         </div>

                     </div>

                     

                     <div class="form-group row">

                         <div class="col-md-8 col-sm-8 space-top-30">

                             <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-building"></i></span>

                                <input type="text" class="form-control" placeholder="Company Name" name="comp" id="comp" value="<?php echo $formdata['comp']; ?>" tabindex="9" required>

                             </div>

                             <span id="comp_validate"></span>

                         </div>

                         <div class="col-md-4 col-sm-4 space-top-30">

                            <div class="input-group">

                            <span class="input-group-addon"><i class="fa fa-group"></i></span>

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

                         <div class="col-md-6 col-sm-6 space-top-30">

                             <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-compass"></i></span>

                                <?php echo form_dropdown('complocation',$country_list,$formdata['complocation'],'id="complocation" class=" form-control" tabindex="11" required');?>                                

                             </div>

                             <span id="complocation_validate"></span>

                         </div>

                         <div class="col-md-6 col-sm-6 space-top-30">

                             <div class="input-group">

                                <span class="input-group-addon"><i class="fa fa-globe"></i></span>

                                <input type="text" class="form-control" placeholder="Company Website(www.example.com)" name="url" id="url" value="<?php echo $formdata['url']; ?>" tabindex="12" required>

                             </div>

                             <span id="url_validate"></span>

                         </div>

                     </div>

                     

                     <div class="form-group row">

                         <div class="col-md-12 col-sm-12 space-top-30">

                            <div class="input-group">

                            	<span class="input-group-addon"><i class="fa fa-info"></i></span>

                            	<textarea class="form-control" info="Company description should contain atleast 150 characters or more."  expand="125px" placeholder="Company Description" name="descr" id="descr" tabindex="13"><?php echo $formdata['firstname']; ?></textarea>

                            </div>

                            <span id="descr_validate"></span>

                         </div>

                     </div>

                     

                     <div class="col-md-12 col-sm-12">

                     	<h3>Are you an employment Agency?</h3>

                          <div class="radio">

                            <label>

                              <input type="radio" name="emptype" id="emptype1" value="1" tabindex="14"  <?php echo ($formdata['emptype']==1)?'checked':''; ?>>

                              No, we recruit directly.

                            </label>

                          </div>

                          <div class="radio">

                            <label>

                              <input type="radio" name="emptype" id="emptype2" value="2" tabindex="15"  <?php echo ($formdata['emptype']==2)?'checked':''; ?>>

                              Yes, we're a Headhunting Agency.

                            </label>

                          </div>

                          <div class="radio">

                            <label>

                              <input type="radio" name="emptype" id="emptype2" value="3" tabindex="16"  <?php echo ($formdata['emptype']==3)?'checked':''; ?>>

                              Yes and No. We recruit directly and are also a Headhunting Agency.

                            </label>

                          </div>

                     </div>

                     

                     <div class="col-md-12 col-sm-12">

                          <div class="form-group input-group">

                          	<span id="tandc_validate"></span>

                            <label>

                              <input type="checkbox" name="tandc" id="tandc" value="1" checked tabindex="17" required> I agree with the Terms and Conditions 

                            </label>

                          </div>

                          <input name="return_url" type="hidden" value="http://staging.cherryhire.com/PostJob">

                     </div>

                     

                     <div class="col-md-12 col-sm-12 text-center">

                            <input type="submit" value="Sign Up" class="btn btn-success btn-xl" tabindex="18">

                     </div>

                     </form>

                </div>

 	  	   </div>

           

        </div>

    </section>

	<section id="testsection">

    	<div class="container">

        	<div class="row">

           		<div class="col-md-12 col-sm-12 col-xs-12">

                	<div class="col-md-6 col-sm-6 bdr-right">

                    	<p>"Cherry Hire has made my job easy by helping me to hire potential candidates. By selecting the right plan, all I had to do was post the jobs and the whole process of promoting the job postings was taken care of by Cherry Hire. I got the right candidates in no time." </p>

                        	<div class="tby">                            	

                                Gracy <br>

                                HR Officer <br>

                                Patrick York Insurance, Bahrain

                            </div>

                    </div>

                    <div class="col-md-6 col-sm-6">

                    	<p>"Cherry Hire takes us to every nook and corner of the internet and helps us to find really talented as well as interested candidates. We are free from the task of posting jobs to various job portals and bringing the applications from those different sources to one place for us to shortlist."</p>

                        <div class="tby">                            	

                            Mike Henry <br>

                            General Manager <br>

                            Autovee, Bahrain

                        </div>

                    </div>

                </div>

           </div>

        </div>

    </section>

    

	<script src="<?php echo $this->config->base_url();?>web/Telebuild/js/intlTelInput.js"></script>

    <script src="<?php echo $this->config->base_url();?>web/js/countrySync.js"></script>

	<script type="text/javascript">

      $('#usrpwd').tooltip({'trigger':'focus', 'placement':'bottom', 'html':'true', 'title': '<b>Password must contain:</b> <br > Atleast 8 characters.'});      

	  var AjaxURL = "<?php echo $this->config->base_url().'EmailCheck';?>";

    </script>

<script src="<?php echo $this->config->base_url();?>web/js/signup.js"></script>

<script type="text/javascript">

   $("#myModal").modal('show');

</script>