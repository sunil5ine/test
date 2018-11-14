<!DOCTYPE html>
<html>
   <head>
      <title><?php echo $title ?></title>
      <meta charset="UTF-8">
      <meta name="description" content="Free Web tutorials">
      <meta name="keywords" content="HTML,CSS,XML,JavaScript">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="<?php echo $this->config->item('web_url');?>assets/fonts/css/all.min.css" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>dist/css/materialize.min.css">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>dist/css/style.css">
      <!-- bar -->
      <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>dist/css/short.css">
   </head>
   <body>
    <!-- headder -->
    <?php $this->load->view('include/header'); ?>

      <!-- first layout -->
    <section class="sec-top">
        <div class="container-wrap">
            <div class="col l12 m12 s12">
               <div class="row">
                    <?php $this->load->view('include/menu'); ?> 
                    <div class="col m12 s12 l9 pofile-details-table-card">
                        <p class="h5-para black-text m0 ">Candidates Details</p>
                        <small><i>Hello,Admin! Check out what's Happening!</i></small>
                    
                        <div class="row">
                            <div class="card">
                                <div class="card-content">
                                    <div class="row m0">
                                        <div class="col s12 m6">
                                            <div class="row m0 border-r">
                                                <div class="col s12 l3 m4 p0"> 
                                                    <center> 
                                                        <img src="http://localhost/cherryhire1/assets/img/logo.png" class="responsive-img responsive-img circle" style="margin-top: 17px;" width="100%"> 
                                                    </center> 
                                                </div> 
                                                <div class="col s12 l9 m8 "> 
                                                    <div class="ptb15 pr-container"> 
                                                        <p class="bold">web Developer1</p> 
                                                        <p class="smal">Lorem ipsum dolor sit amet.</p>
                                                        <p class="smal"> <a href="mailto:"> Loremipsum@gtd.com</a></p>
                                                        <p class="smal"><a href="tel:">90123485623</a></p>
                                                    </div> 
                                                    <ul class="social-share-box-myjob pt10 m0 ">
                                                        <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                                                        <li><a href=""><i class="fab fa-twitter"></i></a></li>
                                                        <li><a href=""><i class="fab fa-behance"></i></a></li>
                                                        <li><a href=""><i class="fab fa-instagram"></i></a></li>
                                                    </ul>
                                                </div> 
                                            </div>
                                        </div>

                                        <div class="col s12 m6">
                                            <div class="resume-box center">
                                               <p class="mb10">View Resume:</p>     
                                               <p class="mb15 bold">Lorem ipsum dolor sit.pdf</p>  
                                               <a href="" class="btn waves-effect waves-light green darken-4">View Resume</a>   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-buttons show-on-large hide-on-med-and-down">
                            <ul class="tabs1 transparent">
                                <li class="tab1 col s3"><a href="#personal-detail" class="active">Personal Details</a></li>
                                <li class="tab1 col s3"><a href="#profile" class="">Profile</a></li>
                                <li class="tab1 col s3"><a href="#experience" class="">Work Experience</a></li>
                                <li class="tab1 col s3"><a href="#education" class="">Educational Qualification</a></li>
                            </ul>
                        </div>

                        <div class="card scrollspy" id="personal-detail">
                            <div class="card-content">
                                <p class="bold mb10 h6">Personal Details</p>
                                <table>
                                    <tbody><tr>
                                        <th class="w205"><i class="far fa-user mr10"></i> Name</th>
                                        <td>shahir k m</td>
                                    </tr>
                                    <tr>
                                        <th class="w205"><i class="fas fa-transgender mr10"></i> Gender</th>
                                        <td>Male</td>
                                    </tr>
                                    <tr>
                                        <th class="w205"><i class="far fa-calendar-alt mr10"></i> Date of Birth</th>
                                        <td>18/03/1994</td>
                                    </tr>
                                    <tr>
                                        <th class="w205"><i class="far fa-envelope mr10"></i> Email ID</th>
                                        <td>testing@5ines.com</td>
                                    </tr>
                                    <tr>
                                        <th class="w205"><i class="fas fa-globe-americas mr10"></i>Nationality</th>
                                        <td>Antiguan</td>
                                    </tr>
                                </tbody></table>
                            </div>
                        </div>

                        <div class="card scrollspy" id="profile">
                            <div class="card-content">
                                <p class="bold mb10 h6">Profile</p>
                                <ul class="profile-box">
                                    <li class="profile-items">
                                        <div class="profile-item-title">
                                            <i class="fas fa-id-card-alt"></i>
                                            <span>Current Designation</span>
                                        </div>
                                        <div class="profile-item-content">
                                            <span>Web Develepor</span>
                                        </div>
                                    </li>
                                    <li class="profile-items">
                                        <div class="profile-item-title">
                                            <i class="fas fa-building"></i>
                                            <span>Current Company </span>
                                        </div>
                                        <div class="profile-item-content">
                                            <span>_______</span>
                                        </div>
                                    </li>
                                    <li class="profile-items">
                                        <div class="profile-item-title">
                                            <i class="far fa-id-card"></i>
                                            <span>Function Area</span>
                                        </div>
                                        <div class="profile-item-content">
                                            <span>Information Technology</span>
                                        </div>
                                    </li>
                                    <li class="profile-items">
                                        <div class="profile-item-title">
                                            <i class="fas fa-anchor"></i>
                                            <span>Industry </span>
                                        </div>
                                        <div class="profile-item-content">
                                            <span>Information Technology</span>
                                        </div>
                                    </li>
                                    <li class="profile-items">
                                        <div class="profile-item-title">
                                            <i class="fas fa-briefcase"></i>
                                            <span>Experience</span>
                                        </div>
                                        <div class="profile-item-content">
                                            <span>02</span>
                                        </div>
                                    </li>
                                    <li class="profile-items">
                                        <div class="profile-item-title">
                                            <i class="fas fa-map-marked-alt"></i>
                                            <span>Preferred Location</span>
                                        </div>
                                        <div class="profile-item-content">
                                            <span>Afghanistan, Albania, Algeria, American Samoa, Andorra, Angola, Anguilla, Antigua and Barbuda, Argentina, Armenia, Aruba, Australia, Austria, Azerbaijan, Bahamas, Bahrain, Bangladesh, Barbados, Belarus, Belgium, Belize, Benin, Bermuda, Bhutan, Bolivia, Bosnia and Herzegovina, Botswana, Brazil, Brunei Darussalam, Bulgaria, Burkina Faso, Burundi, Cambodia, Cameroon, Canada, Cape Verde</span>
                                        </div>
                                    </li>
                                    <li class="profile-items">
                                        <div class="profile-item-title">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>Current Location</span>
                                        </div>
                                        <div class="profile-item-content">
                                            <span>India</span>
                                        </div>
                                    </li>
                                    <li class="profile-items">
                                        <div class="profile-item-title">
                                            <i class="fas fa-hand-holding-usd"></i>
                                            <span>Current Salary</span>
                                        </div>
                                        <div class="profile-item-content">
                                            <span>$ 4000</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!--  -->
                        <div class="card scrollspy" id="experience">
						<div class="card-content">
							<p class="bold mb10 h6">Work Experience</p>
							<div class="table-box hide-on-med-and-down">
								<table class="highlight responsive-table">
									<thead>
										<tr><th><i class="fas fa-id-card-alt"></i> Designation</th>
										<th><i class="fas fa-building"></i> Current Company</th>
										<th><i class="fas fa-calendar-alt"></i> From</th>
										<th><i class="fas fa-map-marker-alt"></i> Location</th>
										<th></th>
									</tr></thead>
									<tbody>
																				
																				<tr>
											<td>Fullstack Developer</td>
											<td>5ines</td>
											<td>Jun 2017 to Present</td>
											<td>india</td>
											<td>


											</td>
										</tr>

																				
									</tbody>
								</table>
							</div>

							<div class="exp-mob show-on-medium-and-down  hide-on-large-only">
								<div class="row">
									<div class="col m12 s12 ">
										<div class="set-box">
																						
																						<ul class="exp-items-box grey lighten-4">
												<li class="exp-items right">

												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-id-card-alt"></i> Designation
													</div>
													<div class="exp-items-content">
														<span>Fullstack Developer</span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-building"></i> Current Company
													</div>
													<div class="exp-items-content">
														<span>5ines</span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-calendar-alt"></i> From
													</div>
													<div class="exp-items-content">
														<span>Jun 2017 to Jan 1970</span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-map-marker-alt"></i> Location
													</div>
													<div class="exp-items-content">
														<span>india</span>
													</div>
												</li>
											</ul>
																					</div>
										
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <!--  -->

                    <div class="card scrollspy" id="education">
						<div class="card-content">
							<p class="bold mb10 h6">Education</p>
							<div class="table-box hide-on-med-and-down">
								<table class="highlight responsive-table">
									<thead>
										<tr><th><i class="fas fa-building"></i> Name of the institution</th>
										<th><i class="fas fa-graduation-cap"></i> Grade / Degree</th>
										<th><i class="fas fa-calendar-alt"></i> From Year</th>
										<th><i class="fas fa-calendar-alt"></i> To Year</th>
										<th></th>
									</tr></thead>
									<tbody>
										                                        										
										<tr>
											<td>ccg</td>
											<td>Graduate</td>
											<td>2013</td>
											<td>2016</td>
											<td>
											</td>
										</tr>

																			</tbody>
								</table>
							</div>

							<div class="exp-mob show-on-medium-and-down  hide-on-large-only">
								<div class="row">
									<div class="col m12 s12 ">
										<div class="set-box">
												                                        											<ul class="exp-items-box grey lighten-4">
												<li class="exp-items right">
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-building"></i> Name of the institution
													</div>
													<div class="exp-items-content">
														<span>ccg</span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-graduation-cap"></i> Grade / Degree
													</div>
													<div class="exp-items-content">
														<span>Graduate</span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-calendar-alt"></i> From Year
													</div>
													<div class="exp-items-content">
														<span>2013</span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-calendar-alt"></i> From Year
													</div>
													<div class="exp-items-content">
														<span>2016</span>
													</div>
												</li>
											</ul>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>

                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
      
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/script.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/short.js"></script>
      <script>
          $(document).ready(function(){
            $('.scrollspy').scrollSpy();
          });
      </script>
</body>
</html>