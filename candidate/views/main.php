<!DOCTYPE html>
<html>
<head>
<title><?php echo $title; ?></title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="keywords" content="<?php echo $metakey; ?>" />
<meta name="description" content="<?php echo $metadesc; ?>"/>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->config->item('web_url');?>images/favicon.ico" />
<link href="<?php echo $this->config->item('web_url');?>css/datatables.min.css" rel="stylesheet">
<link href="<?php echo $this->config->item('web_url');?>css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo $this->config->item('web_url');?>css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo $this->config->item('web_url');?>css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo $this->config->base_url();?>css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all"/>
<!--web-fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--js-->
<script src="<?php echo $this->config->item('web_url');?>js/jquery.min.js"></script>
<script src="<?php echo $this->config->item('web_url');?>js/bootstrap.min.js"></script>
<script src="<?php echo $this->config->item('web_url');?>js/validator.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>src/jquery.accordion.js"></script>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //end-smoth-scrolling -->
<script src="<?php echo $this->config->item('web_url');?>js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function () {
		$('#horizontalTab').easyResponsiveTabs({
			type: 'default', //Types: default, vertical, accordion           
			width: 'auto', //auto or any width like 600px
			fit: true   // 100% fit in a container
		});
	});
</script>	
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

</head>
<body> 
<!-- SignIn Start  -->
<div id="SigninModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Sign In</h4>
            </div>
            <div class="modal-body">
                <div class="col-md-12 signin-left">
                    <div class="col-md-12">
                        <div class="form-group input-group centerTable">
                            <label  class="btn btn-success" id="semp" onclick="chngsignin_label('Employer','Job Seeker','semp','scand');"> <i class="icon-check-sign"></i> I'm an Employer </label>
                            <label  class="btn btn-default" id="scand" onclick="chngsignin_label('Job Seeker','Employer','scand','semp');"> <i class="icon-check-empty"></i> I'm a Job Seeker </label>
                        </div>
                    </div>
                    <div class="row" id="sempdiv">
                        <form method="post" name="signinfrm" action="<?php echo $this->config->item('web_url');?>hire/login" data-toggle="validator" role="form">
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
                    <div class="row" id="scanddiv" style="display:none;">
                        <form method="post" name="candfrm" action="<?php echo $this->config->base_url();?>login" data-toggle="validator" role="form">
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
                 <div class="clearfix"> </div>
            </div>
        </div>
    </div>
     <div class="clearfix"> </div>
</div>
<!-- SignIn End  -->
<!--header start here-->
 <div class="header-b">
 	  <div class="container">
 	       <div class="header-main">
 	        	<div class="logo">
 	        		<a href="<?php echo $this->config->item('web_url');?>"><img src="<?php echo $this->config->item('web_url');?>images/logo.png" alt=""></a>
 	        	</div> 
 	        	<span class="menu"> <img src="<?php echo $this->config->item('web_url');?>images/icon.png"> </span>
                <div class="header-navg-secondary">
                	<ul class="res">
                    	<li><span><a href="#SigninModal" role="button" data-toggle="modal" id="signin_btn">Sign In</a></span></li>
                    </ul>
                </div>
 	        	<div class="header-navg">
 	        		<ul class="res">
 	        			<li><a <?php echo ($mid==1) ? 'class="active"':''; ?> href="<?php echo $this->config->item('web_url');?>">HOME</a></li>
 	        			<li><a <?php echo ($mid==2) ? 'class="active"':''; ?> href="<?php echo $this->config->item('web_url');?>PostJob">POST A JOB</a></li>
 	        			<li><a <?php echo ($mid==3) ? 'class="active"':''; ?> href="<?php echo $this->config->item('web_url');?>Candidate">POST YOUR CV</a></li>
                        <li><a <?php echo ($mid==4) ? 'class="active"':''; ?> href="<?php echo $this->config->item('web_url');?>PeopleSearch">PEOPLE SEARCH</a></li>
 	        			<li><a <?php echo ($mid==5) ? 'class="active"':''; ?> href="<?php echo $this->config->item('web_url');?>FreeTrial">FREE TRIAL</a></li>
 	        		</ul>
 	        		 <script>
					  $( "span.menu").click(function() {
						$(  "ul.res" ).slideToggle("slow", function() {
						 // Animation complete.
						 });
						 });
					 </script>
 	        	</div>
 	        	<div class="clearfix"> </div>
 	       </div>
 	 </div>
</div>   
<div id="fixedsocial">
    <div class="footer-right">
         <ul>
            <li><a href="http://facebook.com/cherryhire" target="_blank"> <span class="x"> </span> </a></li>
            <li><a href="https://twitter.com/cherry_hire" target="_blank"> <span class="y"> </span> </a></li>
            <li><a href="http://instagram.com/cherryhire" target="_blank"> <span class="z"> </span> </a></li>
            <li><a href="https://linkedin.com/company/cherry-hire" target="_blank"> <span class="w"> </span> </a></li>
            <li><a href="http://blog.cherryhire.com" target="_blank"> <span class="v"> </span> </a></li>
         </ul>
    </div>
</div>
<div class="about-banner">
	   <div class="container">
	      	 <div class="signup-main"> 
             	<div class="col-lg-12">
                    <div class="content-header">
                       <!--  <h1>Sign up for a Free Account</h1> -->
                        <h1>Find the <strong>RIGHT job</strong>. Create your Profile now, Free!</h1>
                        <h2>See how CherryHire can transform your Career.</h2>
                    </div>
                </div>
	      	 	<!--<h2>We are CherryHire</h2>-->
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
                    <div class="candidate-testimonial">
                        <div class="meta row">
                            <div class="col-xs-12 col-sm-6 candpic"><img src="<?php echo $this->config->item('web_url');?>/images/cand_test_pic.png"></div>
                            <div class="col-xs-12 col-sm-6 col-md-6 testiby">
                                <div class="name">Sooraj Madhav</div>
                                <div class="role">Project Coordinator<br>Imax Web</div>
                            </div>
                        </div>
                        <div class="testimonial">
                            "Cherry Hire exceeded my expectations and made my search for a new position easy, enjoyable and ultimately very rewarding. I thoroughly recommend them to anyone looking for a new challenge in their career"
                        </div>
                    </div>
        
                    <div class="candidate-testimonial">
                        <div class="meta row">
                            <div class="col-xs-12 col-sm-6 candpic"><img src="<?php echo $this->config->item('web_url');?>/images/cand_test_pic.png"></div>
                            <div class="col-xs-12 col-sm-6 col-md-6 testiby">
                                <div class="name">Dadu Joseph</div>
                                <div class="role">Manager HR <br>IPF Consulting</div>
                            </div>
                        </div>
                        <div class="testimonial">
                            "I'm just writing to tell you that I've accepted a job with the IPF Consulting. And thankyou Cherry Hire for all of your help along the way. You and Search Associates made the whole job-hunting process effective and user-friendly."
                        </div>
                    </div>
                </div>
                 <div class="col-lg-6 col-lg-offset-0 col-sm-8 col-sm-offset-2 cv-send-form">
                 	<form method="post" name="signupfrm" action="<?php echo $this->config->base_url();?>Candidate" data-toggle="validator" role="form" enctype="multipart/form-data">
	      	   	      <div class="col-md-6 space-top-12">
                          <div class="form-group input-group">
                            <span class="input-group-addon"><i class="icon-user"></i></span>
                            <input type="text" class="form-control" placeholder="First Name" value="<?php echo $formdata['firstname']; ?>" name="firstname" id="firstname" required >
                          </div>
                      </div>
                     <div class="col-md-6 space-top-12">
                        <div class="form-group input-group">
                        	<span class="input-group-addon"><i class="icon-user"></i></span>
                            <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $formdata['lastname']; ?>" name="lastname" id="lastname" required >
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
                            <input type="email" class="form-control" placeholder="E-mail ID" name="emailid" value="<?php echo $formdata['emailid']; ?>" id="emailid" required>
                         </div>
                     </div>
                     <div class="col-md-6 space-top-12">
                          <div class="form-group input-group">
                            <span class="input-group-addon"><i class="icon-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Password" value="<?php echo $formdata['usrpwd']; ?>" name="usrpwd" id="usrpwd" required >
                          </div>
                      </div>
                     <div class="col-md-6 space-top-12">
                        <div class="form-group input-group">
                        	<span class="input-group-addon"><i class="icon-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Re-Password" value="<?php echo $formdata['repwd']; ?>" name="repwd" id="repwd" required >
                        </div>
                     </div>
                     <div class="col-md-6 space-top-12">
                         <div class="form-group input-group">
                            <span class="input-group-addon"><i class="icon-calendar"></i></span>
                            <input autocomplete="off" readonly type="text" class="form-control" value="<?php echo $formdata['dob']; ?>" data-provide="datepicker" placeholder="Date of Birth" name="dob" id="dob" required>
                         </div>
                     </div>
                     <div class="col-md-6 space-top-12">
                        <div class="form-group input-group">
                            <span class="input-group-addon"><i class="icon-female"></i><i class="icon-male"></i></span>
                            <select name="gender" id="gender" class="form-control" required>
                                  <option disabled selected>Gender</option>
                                  <option <?php echo ($formdata['gender']=='Male')?'selected':''; ?> value="Male">Male</option>
                                  <option <?php echo ($formdata['gender']=='Female')?'selected':''; ?> value="Female">Female</option>
                              </select>
                          </div>
                     </div>
                     <div class="col-md-6 space-top-12">
                         <div class="form-group input-group">
                            <span class="input-group-addon"><i class="icon-book"></i></span>
                          	<?php echo form_dropdown('edu',$edu_list,$formdata['edu'],'id="edu" class=" form-control" tabindex="1" required');?>
                         </div>
                     </div>
                     <div class="col-md-6 space-top-12">
                         <div class="form-group input-group">
                            <span class="input-group-addon"><i class="icon-flag"></i></span>
                              <?php echo form_dropdown('nation',$country_list,$formdata['nation'],'id="nation" class=" form-control" tabindex="1" required');?>
                         </div>
                     </div>
                     <div class="col-md-6 space-top-12">
                        <div class="form-group input-group">
                        <span class="input-group-addon"><i class="icon-windows"></i></span>
                            <?php echo form_dropdown('funarea',$funarea_list,$formdata['funarea'],'id="funarea" class=" form-control" tabindex="1" required');?>
                        </div>
                     </div>
                     <div class="col-md-6 space-top-12">
                        <div class="form-group input-group">
                        <span class="input-group-addon"><i class="icon-time"></i></span>
                        <select name="totexp" id="totexp" class="form-control" required>
                              <option disabled selected>Total Exp</option>
                              <option <?php echo ($formdata['totexp']=="Fresher")?'selected':''; ?> value="Fresher">Fresher</option>
                              <option <?php echo ($formdata['totexp']=="00")?'selected':''; ?> value="00">0</option>
                              <option <?php echo ($formdata['totexp']=="01")?'selected':''; ?> value="01">1</option>
                              <option <?php echo ($formdata['totexp']=="02")?'selected':''; ?> value="02">2</option>
                              <option <?php echo ($formdata['totexp']=="03")?'selected':''; ?> value="03">3</option>
                              <option <?php echo ($formdata['totexp']=="04")?'selected':''; ?> value="04">4</option>
                              <option <?php echo ($formdata['totexp']=="05")?'selected':''; ?> value="05">5</option>
                              <option <?php echo ($formdata['totexp']=="06")?'selected':''; ?> value="06">6</option>
                              <option <?php echo ($formdata['totexp']=="07")?'selected':''; ?> value="07">7</option>
                              <option <?php echo ($formdata['totexp']=="08")?'selected':''; ?> value="08">8</option>
                              <option <?php echo ($formdata['totexp']=="09")?'selected':''; ?> value="09">9</option>
                              <option <?php echo ($formdata['totexp']=="10")?'selected':''; ?> value="10">10</option>
                              <option <?php echo ($formdata['totexp']=="11")?'selected':''; ?> value="11">11</option>
                              <option <?php echo ($formdata['totexp']=="12")?'selected':''; ?> value="12">12</option>
                              <option <?php echo ($formdata['totexp']=="13")?'selected':''; ?> value="13">13</option>
                              <option <?php echo ($formdata['totexp']=="14")?'selected':''; ?> value="14">14</option>
                              <option <?php echo ($formdata['totexp']=="15")?'selected':''; ?> value="15">15</option>
                              <option <?php echo ($formdata['totexp']=="16")?'selected':''; ?> value="16">16</option>
                              <option <?php echo ($formdata['totexp']=="17")?'selected':''; ?> value="17">17</option>
                              <option <?php echo ($formdata['totexp']=="18")?'selected':''; ?> value="18">18</option>
                              <option <?php echo ($formdata['totexp']=="19")?'selected':''; ?> value="19">19</option>
                              <option <?php echo ($formdata['totexp']=="20")?'selected':''; ?> value="20">20</option>
                              <option <?php echo ($formdata['totexp']=="21")?'selected':''; ?> value="21">21</option>
                              <option <?php echo ($formdata['totexp']=="22")?'selected':''; ?> value="22">22</option>
                              <option <?php echo ($formdata['totexp']=="23")?'selected':''; ?> value="23">23</option>
                              <option <?php echo ($formdata['totexp']=="24")?'selected':''; ?> value="24">24</option>
                              <option <?php echo ($formdata['totexp']=="25")?'selected':''; ?> value="25">25</option>
                              <option <?php echo ($formdata['totexp']=="26")?'selected':''; ?> value="26">26</option>
                              <option <?php echo ($formdata['totexp']=="27")?'selected':''; ?> value="27">27</option>
                              <option <?php echo ($formdata['totexp']=="28")?'selected':''; ?> value="28">28</option>
                              <option <?php echo ($formdata['totexp']=="29")?'selected':''; ?> value="29">29</option>
                              <option <?php echo ($formdata['totexp']=="30")?'selected':''; ?> value="30">30</option>
                              <option <?php echo ($formdata['totexp']=="31")?'selected':''; ?> value="31">30+</option>
                          </select>
                          
                          </div>
                     </div>
                     <div class="col-md-6 space-top-12">
                        <div class="form-group input-group">
                        <span class="input-group-addon"><i class="icon-group"></i></span>
                        	<input type="text" class="form-control" placeholder="Current Employer" value="<?php echo $formdata['currcompany']; ?>" name="currcompany" id="currcompany" required>
                        </div>
                     </div>
                     <div class="col-md-6 space-top-12">
                        <div class="form-group input-group">
                        <span class="input-group-addon"><i class="icon-home"></i></span>
                        	<input type="text" class="form-control" placeholder="Current Location" value="<?php echo $formdata['currloc']; ?>" name="currloc" id="currloc" required>
                        </div>
                     </div>
                     
                     
                     <div class="col-md-12 space-top-12">
                     	<div class="form-group">
                        <input type="file" class="form-control input_syle" id="fileToUpload" name="fileToUpload" required>
                        </div>
                     	
                     </div>
                     
                     <div class="col-md-12">
                          <div class="form-group input-group">
                            <label>
                              <input type="checkbox" name="jobalert" id="jobalert" value="1" <?php echo ($formdata['jobalert']==1)?'checked':''; ?>> Create a Job Alert - Get the freshest jobs in your inbox every day. 
                            </label>
                          </div>
                     </div>
                     
                     <div class="col-md-12">
                          <div class="form-group input-group">
                            <label>
                              <input type="checkbox" name="tandc" id="tandc" value="1" checked required> I agree with the Terms and Conditions 
                            </label>
                          </div>
                          <input class="form-control" type="hidden" name="returnurl" id="returnurl" value="<?php echo $sum; ?>" required>
                     </div>
                     
                     <div class="col-md-12 text-center">
                            <input type="submit" name="submit" value="Post CV!" class="ser">
                     </div>
                     <br>
                     </form>
                 </div>
                 <!-- <div class="col-md-12 postcv-middle">
                 	<img alt="" src="<?php echo $this->config->base_url();?>images/post-cv-img.jpg" class="img-responsive" style="width:100%;">
                 </div> -->
                 
	      	   <div class="clearfix"> </div>
	      	 </div>
	   </div>
</div>

<!--footer start herer-->
<div class="strip"> </div>
<div class="footer-h">
	  <div class="container">
	  	    <div class="footer-main">
	  	    	<div class="col-md-12 text-center footer-top"> 
                <h1>Have questions? We&acute;re here to help.</h1>

				<h3>support@<span>cherryhire.com</span></h3>
                	<ul>
	  	             	<li><a href="<?php echo $this->config->item('web_url');?>Features">FEATURES</a></li>
                     	<li><a href="<?php echo $this->config->item('web_url');?>FreeTrial">FREE TRIAL</a></li>
                        <li><a href="<?php echo $this->config->item('web_url');?>PostCV">POST CV</a></li>
                        <li><a href="<?php echo $this->config->item('web_url');?>Jobs">JOBS</a></li>
                     	<li><a href="<?php echo $this->config->item('web_url');?>JoBoards">JOB BOARDS</a></li>
                     	<li><a href="<?php echo $this->config->item('web_url');?>Faq">FAQS</a></li>
                     	<li><a href="#">PARTNER WITH US</a></li>
                     	<li><a href="http://blog.cherryhire.com">BLOG</a></li>
                	</ul>
                </div>
                <div class="col-md-12 text-center footer-middle"> 
                	<ul>
	  	             	<li><a href="<?php echo $this->config->item('web_url');?>About">About Us</a></li>
                     	<li><a href="<?php echo $this->config->item('web_url');?>Privacy">Privacy</a></li>
                        <li><a href="<?php echo $this->config->item('web_url');?>Disclaimer">Disclaimer</a></li>
                     	<li><a href="<?php echo $this->config->item('web_url');?>Terms">Terms</a></li>
                     	<li><a href="<?php echo $this->config->item('web_url');?>Contact">Contact Us</a></li>
                	</ul>
                </div>
                <div class="col-md-12 footer-left text-center">
	  	    	 <!--<p class="data"> <a href="mailto:info@cherryhire.com"> info @ cherryhire.com </a> <span class="d"> </span></p>-->
	             <p> <?php echo $thisyear; ?> &copy Cherry Hire. All right reserved.</p>
	  	    	</div>
	  	    	<div class="col-md-12 footer-right">
	  	             <ul>
	  	             	<li><a href="http://facebook.com/cherryhire" target="_blank"> <span class="x"> </span> </a></li>
	  	             	<li><a href="https://twitter.com/cherry_hire" target="_blank"> <span class="y"> </span> </a></li>
                        <li><a href="http://instagram.com/cherryhire" target="_blank"> <span class="z"> </span> </a></li>
                        <li><a href="https://linkedin.com/company/cherry-hire" target="_blank"> <span class="w"> </span> </a></li>
                        <li><a href="http://blog.cherryhire.com" target="_blank"> <span class="v"> </span> </a></li>
	  	             </ul>
	  	    	</div>
	  	    <div class="clearfix"> </div>
	  	    </div>
	  </div>
</div>

<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>js/bootstrap-filestyle.js"></script>
<link href="<?php echo $this->config->item('web_url');?>css/datepicker.css" rel="stylesheet" type="text/css" media="all"/>
<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>js/bootstrap-datepicker.js"></script>

<script type="text/javascript">
	$('#fileToUpload').filestyle({
		buttonName : 'btn-danger'
	});
</script>
<script type="text/javascript">
	// When the document is ready
	$(document).ready(function () {
		
		$('#dob').datepicker({
			format: "dd/mm/yyyy",
			viewMode: "months",
    		minViewMode: "months"
		});  
		$("#myModal").modal('show');
		
		$('#SigninModal').dialog({ autoOpen: false });
		$('#signin_btn').click(function(){ $('#SigninModal').modal('show'); });
	
	});
</script>
<script type="text/javascript">
	function chngsignin_label(slabltxt, sclabltxt, sthelabel, sclabel) {
		
		var slabelvar = document.getElementById(sthelabel);
		var sclabelvar = document.getElementById(sclabel);
		var ssid = document.getElementById(sthelabel+'div');
		var shid = document.getElementById(sclabel+'div');
	
		if(sthelabel == 'semp')
		{
			slabelvar.innerHTML = "<i class='icon-check-sign'></i> I'" + "m an " + slabltxt;
			sclabelvar.innerHTML = "<i class='icon-check-empty'></i> I'" + "m a " + sclabltxt;
		}
		else
		{
			slabelvar.innerHTML = "<i class='icon-check-sign'></i> I'" + "m a " + slabltxt;
			sclabelvar.innerHTML = "<i class='icon-check-empty'></i> I'" + "m an " + sclabltxt;
		}
		
		$(slabelvar).addClass('btn-success');	
		$(slabelvar).removeClass('btn-default');	
		$(sclabelvar).addClass('btn-default');	
		$(sclabelvar).removeClass('btn-success');	
		
		$(shid).hide();
		$(ssid).show();
		
	}
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