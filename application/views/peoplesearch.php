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

	   <div class="container">

	      	 <div class="signup-main"> 

	      	 	<!--<h2>We are Cherry Hire</h2>-->

                   <?php if(isset($status) && $status=='success') { echo $message; } if(isset($status) && $status=='fail') { echo $message; } ?>

                  <!--<div id="hidden_container"> </div>-->

	      	     <div class="col-md-8 people-left">

                 	<form method="post" name="signupfrm" id="signupfrm" action="<?php echo $this->config->base_url().$submiturl;?>" data-toggle="validator" role="form">

	      	   	      <h2>Software for automatic shortlisting of candidates <br /><strong>Signup for your ACCOUNT today!</strong></h2>

                      

	      	   	      <div class="col-md-6 space-top-12">

                          <div class="form-group input-group">

                            <span class="input-group-addon"><i class="icon-user"></i></span>

                            <input type="text" class="form-control" placeholder="First Name" value="<?php echo $formdata['firstname']; ?>" name="firstname" id="firstname" required >

                          </div>

                      </div>

                     <div class="col-md-6 space-top-12">

                        <div class="form-group input-group">

                        	<span class="input-group-addon"><i class="icon-user"></i></span>

                            <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $formdata['lastname']; ?>"  name="lastname" id="lastname" required >

                            

                        </div>

                     </div>

                     <div class="col-md-6 space-top-12">

                         <div class="form-group input-group">

                            <span class="input-group-addon"><i class="icon-phone"></i></span>

                            <input style="width:30%;" type="text" class="form-control" placeholder="Code" value="<?php echo $formdata['cntrycode']; ?>"  name="cntrycode" id="cntrycode" required >

                            <input style="width:70%;" type="text" class="form-control" placeholder="Contact Number" value="<?php echo $formdata['phone']; ?>" name="phone" id="phone" required >

                         </div>

                     </div>

                     <div class="col-md-6 space-top-12">

                         <div class="form-group input-group">

                            <span class="input-group-addon"><i class="icon-envelope"></i></span>

                            <input type="email" class="form-control" placeholder="Company e-mail (no Gmail, Yahoo etc)" name="emailid" id="emailid" value="<?php echo $formdata['emailid']; ?>" required>

                         </div>

                     </div>

                     <div class="col-md-6 space-top-12">

                          <div class="form-group input-group">

                            <span class="input-group-addon"><i class="icon-lock"></i></span>

                            <input type="password" class="form-control" placeholder="Admin Password" value="<?php echo $formdata['usrpwd']; ?>" name="usrpwd" id="usrpwd" required >

                          </div>

                      </div>

                     <div class="col-md-6 space-top-12">

                        <div class="form-group input-group">

                        	<span class="input-group-addon"><i class="icon-lock"></i></span>

                            <input type="password" class="form-control" placeholder="Repeat Password" value="<?php echo $formdata['repwd']; ?>" name="repwd" id="repwd" required >

                            

                        </div>

                     </div>

                     <div class="col-md-12 space-top-12">

                         <div class="form-group input-group">

                            <span class="input-group-addon"><i class="icon-home"></i></span>

                            <input type="text" class="form-control" placeholder="Company Name" name="comp" id="comp" value="<?php echo $formdata['comp']; ?>" required>

                         </div>

                     </div>

                     <div class="col-md-8 space-top-12">

                         <div class="form-group input-group">

                            <span class="input-group-addon"><i class="icon-globe"></i></span>

                            <input type="text" class="form-control" placeholder="Company Website" name="url" id="url" value="<?php echo $formdata['url']; ?>" required>

                         </div>

                     </div>

                     <div class="col-md-4 space-top-12">

                        <div class="form-group input-group">

                        <span class="input-group-addon"><i class="icon-group"></i></span>

                        <select name="empcnt" id="empcnt" class="form-control" required>

                              <option disabled selected>Employees</option>

                              <option <?php echo ($formdata['empcnt']=="1~3")?'selected':''; ?> value="1~3">1~3</option>

                              <option <?php echo ($formdata['empcnt']=="3~10")?'selected':''; ?> value="3~10">3~10</option>

                              <option <?php echo ($formdata['empcnt']=="10~25")?'selected':''; ?> value="10~25">10~25</option>

                              <option <?php echo ($formdata['empcnt']=="25~50")?'selected':''; ?> value="25~50">25~50</option>

                              <option <?php echo ($formdata['empcnt']=="50~100")?'selected':''; ?> value="50~100">50~100</option>

                              <option <?php echo ($formdata['empcnt']=="100+")?'selected':''; ?> value="100+">100+</option>

                          </select>

                          

                          </div>

                     </div>

                     <div class="col-md-12 space-top-12">

                     	<div class="form-group input-group">

                        <span class="input-group-addon"><i class="icon-info"></i></span>

                        <textarea class="form-control" info="Company description should contain atleast 150 characters or more."  expand="125px" placeholder="Company Description" name="descr" id="descr" required><?php echo $formdata['descr']; ?></textarea>

                        </div>

                     </div>

                     

                     

                     

                     <div class="col-md-12 space-top-12">

                          <div class="form-group input-group">

                            <label>

                              <input type="checkbox" name="tandc" id="tandc" value="1" checked required>I agree with the Terms and Conditions 

                            </label>

                          </div>

                          <input name="return_url" type="hidden" value="http://staging.cherryhire.com/PeopleSearch">

                     </div>

                     

                     <div class="col-md-12 space-top-12">

                            <input name="emptype" type="hidden" value="1" />

                            <input type="submit" value="SignUp" class="ser">

                     </div>

                     </form>

                     

	      	     </div>

	      	     <div class="col-md-4 people-right-new">

                 		<div class="clearfix"> </div>

                        <div class="left_box-new"> 

                            <!--<p>Already registered?</p>-->

                            <!--<h5>Post Job now</h5>-->

                            <form method="post" name="signinfrm" action="<?php echo $this->config->base_url();?>hire/login" data-toggle="validator" role="form">

                             <h5>Already <strong>REGISTERED</strong>? Login here!</h5>

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

                                    <!--<input type="button" value="Sign In" class="ser" onclick="do_hirewand_login()">-->

                                    <input type="submit" value="Sign In" class="ser">

                             </div>

                             </form>

                             <div class="clearfix"> </div>

                        </div>

                 	<h2>Experience the all new <strong>HIRING power</strong> of Cherry Hire</h2>

                    <p>Cherryhire drastically reduces cost of hire and minimizes time to hire by Intelligently matching just the right candidates for your requirements across all sources.</p>

	      	   	      <!-- <img src="images/h.jpg" alt="">-->

                      <div class="left-ftr"><img alt="" src="<?php echo $this->config->base_url();?>images/logo.png" class="img-responsive"></div>  

                    <div class="clearfix"> </div>

	      	     </div>

                 

	      	   <div class="clearfix"> </div>

	      	 </div>

	   </div>

</div>

<div class="about-banner">

    <div class="container">

    	<div class="people-main">

            <h2>MORE ON PEOPLE SEARCH</h2>

                <div class="col-md-5 space-top-12 people-main-left">

                    <h2>Our matching and ranking of candidates</h2>

    

                    <p>For every requirement Cherryhire ranks the shortlisted candidates and categorizes the candidate as "EXCELLENT FIT", "GOOD FIT", "MEDIUM FIT" and "LOW FIT".</p>

                    

                    <p>Cherryhire also provides you with a match card, which is the summary of reasons why the candidate is a good fit and concerns that you need to be aware of while picking the candidate.</p>

                </div>

                <div class="col-md-7 space-top-12"><img alt="" src="<?php echo $this->config->base_url();?>images/people-1.jpg" class="img-responsive"></div>

                <div class="clearfix"> </div>

                <div class="col-md-5 space-top-12 people-main-left">

                <h2>Crisp and insightful profile view</h2>



                <p>Cherryhire presents a structured and crisp view of the profile. A standardized view of the profile makes it easy for the user to compare and take a call.</p>

                <p>For each profile HireWand adds insights not available in the resume, but can be useful in making hiring decisions. Cherryhire has a semantic knowledge base that allows us to provide additional information about the candidate. This knowledge base is growing and is self learning, that allows us to bring more and more value to you over time.</p>

                <p>E.g., Tier of the college, Type of company worked in etc.,</p>

                <p>A more detailed view of the profile shows the company timeline and the projects within each. This view is structured and consistent across all profiles.</p>

                <p>If you would still like to go through the detailed resume, that is still available within the app</p>

				</div>

                <div class="col-md-7 space-top-12"><img alt="" src="<?php echo $this->config->base_url();?>images/people-2.jpg" class="img-responsive"></div>

    	</div>

    </div>

</div>       





<!--sharethis script-->

<div class="share-box">

<span class='st_facebook_hcount' displayText='Facebook'></span>

<span class='st_twitter_hcount' displayText='Tweet'></span>

<span class='st_pinterest_hcount' displayText='Pinterest'></span>

<span class='st_googleplus_hcount' displayText='Google +'></span>

</div>