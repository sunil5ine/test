<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php' ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width" />
  	<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo $this->config->item('web_url')?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/style.css">
</head>
<body>
	<!-- navigation bar -->
	<?php include 'include/header.php' ?>
	<!-- end nav bar -->
	
	<section class="">
		<div class="row">
			<div class="container-wrap">
				<div class="row">
					<div class="center title">
						<h5 class="black-text">Choose the appropriate plan for you</h5>
						<p>Lorem ipsum dolor sit amet elit.</p>
					</div>
				</div><!-- end row -->

				<div class="row switch-container">
					<div class="col s12 m6">
						<div class="switch">
							<label>
								<span class="bold">Monthly Plan</span>
								<input type="checkbox">
								<span class="lever"></span>
								<span class="fad-text">Yearly Plan</span>
							</label>
						</div>
					</div>
					<div class="col s12 m6">
						<div class="right-align">
							<h6><a href="#billing" class='blue-text billing modal-trigger'>View Billing History</a></h6>
						</div>
					</div>
				</div><!-- end row -->
					
				<!-- payment -->
				<div class="row">
					<div class="col m6 l6 xl3 s12">
						<!-- card start -->
						<div class="card-panel plans">
							<div class="card-title-box">
						        <span class="card-title left-align"> Starter </span>
						        <span class="card-title right"> $ Free </span>
							    <div class="card-sub-title">
									<span class="left-align">Loream ipsum</span>
									<span class="right">/Week</span>
						        </div>
					        </div>
					        
					        <div class="card-action ">
					        	<ul>
					        		<li>
					        			<span class="left-align">Validity Period </span>
					        			<span class="right">7 days</span>
					        		</li>
					        		<li>
					        			<span class="left-align">Job Applications</span>
					        			<span class="right">1</span>
					        		</li>
					        		<li>
					        			<span class="left-align">Personalised Job Alerts</span>
					        			<span class="right brand-text"><i class="material-icons">done</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">View Employeer Details</span>
					        			<span class="right brand-text"><i class="material-icons">done</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">Who Viewd Your Profile</span>
					        			<span class="right red-text"><i class="material-icons">close</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">More Profile Views</span>
					        			<span class="right red-text"><i class="material-icons">close</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">Assisted Job Search</span>
					        			<span class="right red-text"><i class="material-icons">close</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">Resume Review</span>
					        			<span class="right red-text"><i class="material-icons">close</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">Profile Enrichment</span>
					        			<span class="right red-text"><i class="material-icons">close</i></span>
					        		</li>
					        	</ul>
					        	<div class="center">
					        		<a style="min-width: 180px" class=" btn btn-m brand-text btn-nc waves-green  waves-effect transparent">Get Started</a>
					        	</div>
					    	</div>
					    </div><!-- end card  1-->
					</div><!-- end col -->

					<div class="col m6 l6 xl3 s12">
						<!-- card start 2-->
						<div class="card-panel plans">
							<div class="card-title-box">
						        <span class="card-title left-align"> Standard </span>
						        <span class="card-title right"> $ 10 </span>
							    <div class="card-sub-title">
									<span class="left-align">Loream ipsum</span>
									<span class="right">/1 Month</span>
						        </div>
					        </div>
					        
					        <div class="card-action ">
					        	<ul>
					        		<li>
					        			<span class="left-align">Validity Period </span>
					        			<span class="right">1Month</span>
					        		</li>
					        		<li>
					        			<span class="left-align">Job Applications</span>
					        			<span class="right">2</span>
					        		</li>
					        		<li>
					        			<span class="left-align">Personalised Job Alerts</span>
					        			<span class="right brand-text"><i class="material-icons">done</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">View Employeer Details</span>
					        			<span class="right brand-text"><i class="material-icons">done</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">Who Viewd Your Profile</span>
					        			<span class="right red-text"><i class="material-icons">close</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">More Profile Views</span>
					        			<span class="right red-text"><i class="material-icons">close</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">Assisted Job Search</span>
					        			<span class="right red-text"><i class="material-icons">close</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">Resume Review</span>
					        			<span class="right red-text"><i class="material-icons">close</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">Profile Enrichment</span>
					        			<span class="right red-text"><i class="material-icons">close</i></span>
					        		</li>
					        	</ul>
					        	<div class="center">
					        		<a style="min-width: 180px" class=" btn btn-m brand-text btn-nc waves-green  waves-effect transparent">Get Started</a>
					        	</div>
					    	</div>
					    </div><!-- end card 3-->
					</div><!-- end col -->

					<div class="col m6 l6 xl3 s12">
						<!-- card start 3-->
						<div class="card-panel plans">
							<div class="card-title-box">
						        <span class="card-title left-align"> Premium </span>
						        <span class="card-title right"> $ 25 </span>
							    <div class="card-sub-title">
									<span class="left-align">Loream ipsum</span>
									<span class="right">/2 Months</span>
						        </div>
					        </div>
					        
					        <div class="card-action center payment-success">
					        	<p class="card-action-title">Your Order Is Completed</p>
					        	<p class="card-action-small">You will receive email Confirmation Shortly</p>
									<div class="success-icon">
										<a class="btn-floating btn-xl brand pulse">
											<i class="material-icons">done</i>
										</a>
									</div>
					        	<p class="card-action-small ptb10">Order NO:2354123245</p>
					        	<div class="center">
					        		<a style="min-width: 180px" class=" btn btn-m white-text brand waves-green  waves-effect ">Close</a>
					        	</div>
					    	</div>
					    </div><!-- end card -->
					</div><!-- end col -->

					<div class="col m6 l6 xl3 s12">
						<!-- card start -->
						<div class="card-panel plans">
							<div class="card-title-box">
						        <span class="card-title left-align"> Platinum </span>
						        <span class="card-title right"> $ Free </span>
							    <div class="card-sub-title">
									<span class="left-align">Loream ipsum</span>
									<span class="right">/3 monts</span>
						        </div>
					        </div>
					        
					        <div class="card-action ">
					        	<ul>
					        		<li>
					        			<span class="left-align">Validity Period </span>
					        			<span class="right">3 monts</span>
					        		</li>
					        		<li>
					        			<span class="left-align">Job Applications</span>
					        			<span class="right">10</span>
					        		</li>
					        		<li>
					        			<span class="left-align">Personalised Job Alerts</span>
					        			<span class="right brand-text"><i class="material-icons">done</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">View Employeer Details</span>
					        			<span class="right brand-text"><i class="material-icons">done</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">Who Viewd Your Profile</span>
					        			<span class="right brand-text"><i class="material-icons">done</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">More Profile Views</span>
					        			<span class="right brand-text"><i class="material-icons">done</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">Assisted Job Search</span>
					        			<span class="right brand-text"><i class="material-icons">done</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">Resume Review</span>
					        			<span class="right brand-text"><i class="material-icons">done</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align">Profile Enrichment</span>
					        			<span class="right brand-text"><i class="material-icons">done</i></span>
					        		</li>
					        	</ul>
					        	<div class="center">
					        		<a style="min-width: 180px" class=" btn btn-m brand-text btn-nc waves-green  waves-effect transparent">Get Started</a>
					        	</div>
					    	</div>
					    </div><!-- end card -->
					</div><!-- end col -->
				</div><!-- end row -->




			</div><!-- end wrap -->
		</div> <!-- end row -->
	</section>

<!-- mode -->
<div id="billing" class="modal">
    <div class="modal-content  p0">
      <table class="striped highlight responsive-table">
      	<thead class="center grey lighten-2" style="padding-left: 15px">
      		<th style="">Date</th>
      		<th>Order Number</th>
      		<th>Payment Details</th>
      		<th>Payment Status</th>
      		<th>Amount Paid</th>
      		<th>PDF</th>
      	</thead>
      	<tbody>
      		<tr>
      			<td>09/03/2018</td>
      			<td>1009975635</td>
      			<td>Card Ending in 0793</td>
      			<td><span class="brand-text">Success</span></td>
      			<td>$ 10</td>
      			<td><a><i class="material-icons">file_download</i></a></td>
      		</tr>
      		<tr>
      			<td>09/03/2018</td>
      			<td>1009975635</td>
      			<td>Card Ending in 0793</td>
      			<td><span class="red-text">Error</span></td>
      			<td>$ 10</td>
      			<td><a href="" ><i class="material-icons">file_download</i></a></td>
      		</tr>
      		<tr>
      			<td>09/03/2018</td>
      			<td>1009975635</td>
      			<td>Card Ending in 0793</td>
      			<td><span class="brand-text">Success</span></td>
      			<td>$ 10</td>
      			<td><a href="" ><i class="material-icons">file_download</i></a></td>
      		</tr>
      		<tr>
      			<td>09/03/2018</td>
      			<td>1009975635</td>
      			<td>Card Ending in 0793</td>
      			<td><span class="brand-text">Success</span></td>
      			<td>$ 10</td>
      			<td><a href="" ><i class="material-icons">file_download</i></a></td>
      		</tr>

      	</tbody>
      </table>
    </div>
  
  </div>

	<!-- footer -->
		<section class="footer white">
			<div class="row">
				<div class="container-wrap">
					<div class="col m12 s12 l4">
						<div class="footer-container">
							<img src="<?php echo $this->config->item('web_url')?>assets/img/logo.png " class="responsive-img footerlogo" alt="" width="95px">
							<div class="footer-heading">
								<p>Have question? We're here to help</p>
							</div>
							<div class="footer-content ">
								<ul>
									<li><a href=""><i class="material-icons back-icon mr10">mail_outline</i> Support@cherryhire.com</a></li>
									<li><a href=""><i class="material-icons back-icon mr10">phone</i> +91 0123 456 789</a></li>
								</ul>
								<ul class="footer-social-icons ">
									<li>
										<a class="fab fa-twitter fit" href="#"></a>
									</li>
									<li>
										<a class="fab fa-facebook fif" href="https://www.facebook.com/cherryhire/"></a>
									</li>
									<li>
										<a class="fab fa-instagram fii" href="#"></a>
									</li>
									<li>
										<a class="fab fa-linkedin fil" href="#"></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col m12 s12 l8">
						<div class="row">
							<div class="col s12 m4 l4">
								<div class="footer-container">
									<div class="footer-heading">
										<p>CherryHire</p>
									</div>
									<div class="footer-content">
										<ul>
											<li><a href="">About us</a></li>
											<li><a href="">Contact us</a></li>
											<li><a href="">Blog</a></li>
											<li><a href="">FAQs</a></li>
											<li><a href="">Advertise with us</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col s12 m4 l4">
								<div class="footer-container">
									<div class="footer-heading">
										<p>Employers</p>
									</div>
									<div class="footer-content">
										<ul>
											<li><a href="">Get a free account</a></li>
											<li><a href="">Employer Center</a></li>
											<li><a href="">Post a jobs</a></li>
											
										</ul>
									</div>
								</div>
								<div class="footer-container">
									<div class="footer-heading">
										<p>Community</p>
									</div>
									<div class="footer-content">
										<ul>
											
											<li><a href="">Support/cUstomer Center</a></li>
											<li><a href="">Guidelines</a></li>
											<li><a href="">Cookies</a></li>
										</ul>
									</div>
								</div>
							</div>
							<div class="col s12 m4 l4">
								<div class="footer-container">
									<div class="footer-heading">
										<p>Job Seekers</p>
									</div>
									<div class="footer-content">
										<ul>
											<li><a href="">Resume Review</a></li>
											<li><a href="">Create  Job Alert</a></li>
											<li><a href="">Career Advice</a></li>
											<li><a href="">Community</a></li>
											<li><a href="">Courses</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
			<div class="row">

				<div class="bottom-footer container-wrap">
					<div class="dividers"></div>
					<div class="col s12 m6 l6 ">
						<p>Copyright©2018 - CherryHire - All rights Reserved.</p>
					</div>
					<div class="col s12 m6 l6 ">
						<ul class="footernav">
							<li><a href="">Privacy</a></li>
							<li>|</li>
							<li><a href="">Terms of use</a></li>
							<li>|</li>
							<li>Site map</li>
						</ul>
					</div>
				</div>
			</div>
		</section>




	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/script.js"></script>
</body>
</html>