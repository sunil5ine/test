<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="author" content="ScriptsBundle">
<title>CherryHire - Opportunities</title>

<!-- =-=-=-=-=-=-= Favicons Icon =-=-=-=-=-=-= -->
<link rel="icon" href="<?php echo $this->config->base_url();?>site/images/favicon.ico" type="image/x-icon" />

<!-- =-=-=-=-=-=-= Mobile Specific =-=-=-=-=-=-= -->
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

<!-- BOOTSTRAPE STYLESHEET CSS FILES -->
<link rel="stylesheet" href="<?php echo $this->config->base_url();?>site/css/bootstrap.min.css">

<!-- JQUERY SELECT -->
<link href="<?php echo $this->config->base_url();?>site/css/select2.min.css" rel="stylesheet" />

<!-- JQUERY MENU -->
<link rel="stylesheet" href="<?php echo $this->config->base_url();?>site/css/mega_menu.min.css">

<!-- ANIMATION -->
<link rel="stylesheet" href="<?php echo $this->config->base_url();?>site/css/animate.min.css">

<!-- OWl  CAROUSEL-->
<link rel="stylesheet" href="<?php echo $this->config->base_url();?>site/css/owl.carousel.css">
<link rel="stylesheet" href="<?php echo $this->config->base_url();?>site/css/owl.style.css">

<!-- TEMPLATE CORE CSS -->
<link rel="stylesheet" href="<?php echo $this->config->base_url();?>site/css/style.css">

<!-- FONT AWESOME -->
<link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url();?>site/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo $this->config->base_url();?>site/css/et-line-fonts.css" type="text/css">

<!-- Google Fonts -->
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet" type="text/css">

<!-- JavaScripts -->
<script src="<?php echo $this->config->base_url();?>site/js/modernizr.js"></script>

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
<div class="page">
  <div id="spinner">
    <div class="spinner-img"> <img alt="Opportunities Preloader" src="<?php echo $this->config->base_url();?>site/images/loader.gif" />
      <h2>Please Wait.....</h2>
    </div>
  </div>
  <nav id="menu-1" class="mega-menu fa-change-black" data-color="">
    <section class="menu-list-items container">
      <div class="container">
        <ul class="menu-logo">
          <li> <a href="index-home.html"> <img src="<?php echo $this->config->base_url();?>site/images/logo.png" alt="logo" class="img-responsive"> </a> </li>
        </ul>
        <ul class="menu-links pull-left">
          <li> <a href="#"> Find Jobs </a></li>
          <li> <a href="Physometric-Test.html"> Psychometric Test </a></li>
           <li> <a href="#"> Career Advice </a></li>
          <li> <a href="#"> CV Writing </a></li>
          <li class="mobile-show"> <a href="login.html"> Log in </a></li>
          <li class="mobile-show"> <a href="registration.html"> Register </a></li>
        </ul>
        <ul class="startup-links pull-right mobile-hide" style="margin-left:0px !important">
          <li> <a href="login.html"> Log in </a></li>
          <li> <a href="registration.html" class="nopadding"> <span>Register</span> </a></li>
          <li class="no-bg"><a href="post-job.html" class="p-job"><i class="fa fa-plus-square"></i> Post a Job</a></li>
        </ul>
      </div>
    </section>
  </nav>


    
    
    
    
    
  <div class="clearfix"></div>
  <div class="search">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
          <div class="input-group">
            <div class="input-group-btn search-panel">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"> <span id="search_concept">Filter By</span> <span class="caret"></span> </button>
              <ul class="dropdown-menu" role="menu">
                <li><a href="#">By Company</a></li>
                <li><a href="#">By Function</a></li>
                <li><a href="#">By City </a></li>
                <li><a href="#">By Salary </a></li>
                <li><a href="#">By Industry</a></li>
              </ul>
            </div>
            <input type="hidden" name="search_param" value="all" id="search_param">
            <input type="text" class="form-control search-field" name="x" placeholder="Search term...">
            <span class="input-group-btn">
            <button class="btn btn-default" type="button"><span class="fa fa-search"></span></button>
            </span> </div>
        </div>
      </div>
    </div>
  </div>
  <section class="portal-main-section">
    <div class="container-fluid" style="background:url(<?php echo $this->config->base_url();?>site/images/main-banner.png); background-size:cover;">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
          <div class="employer-main-section">
            <h1>Employers</h1>
            <p>Thousands of companies like yours have succeeded hiring the verified trusted candidates through CherryHire.</p>
            <a href="#" class="btn-default">Post jobs for FREE<i class="fa fa-angle-right"></i> </a> </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
          <div class="employee-main-section">
            <h1>Job Seekers</h1>
            <p>Create a CherryHire account in just a few steps and get benefits of Cherryhire.Upload resume on Cherryhire Now!</p>
            <a href="#" class="btn-default">Register Now<i class="fa fa-angle-right"></i></a> </div>
        </div>
      </div>
    </div>
  </section>
  <section class="slidershow-bg parallex">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-sm-12 col-md-offset-1 col-xs-12 nopadding">
          <div class="search-form-contaner">
            <p class="color"> Find your dream job here!</p>
            <form class="form-inline">
              <div class="col-md-4 col-sm-4 col-xs-12 nopadding">
                <div class="form-group">
                  <input type="text" class="form-control" name="search" placeholder="Job Title, Keyword" value="">
                </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12 nopadding">
                <div class="form-group">
                  <select class="select-category form-control">
                    <option value="" disabled selected hidden>Location...</option>
                    <option value="0">Customer Service</option>
                    <option value="1">Designer</option>
                    <option value="2">Developer</option>
                    <option value="3">Finance</option>
                    <option value="4">Human Resource</option>
                    <option value="5">Information Technology</option>
                    <option value="6">Marketing</option>
                    <option value="7">Others</option>
                    <option value="8">Sales</option>
                  </select>
                </div>
              </div>
              <div class="col-md-3 col-sm-3 col-xs-12 nopadding">
                <div class="form-group">
                  <select class="select-location form-control">
                    <option value="0">SriLanka</option>
                    <option value="1">Australia</option>
                    <option value="2">Bahrain</option>
                    <option value="3">Canada</option>
                    <option value="4">Denmark</option>
                    <option value="5">Germany</option>
                  </select>
                </div>
              </div>
              <div class="col-md-2 col-sm-2 col-xs-12 nopadding">
                <div class="form-group form-action">
                  <button type="button" class="btn btn-default btn-search-submit">Search <i class="fa fa-angle-right"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="how-works">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="Heading-title black">
            <h1>How it Works</h1>
          </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12"> <img src="<?php echo $this->config->base_url();?>site/images/How-it-works.png" style="width:100%;"> </div>
      </div>
    </div>
  </section>
  <section id="categories-section-2" class="light-grey">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="Heading-title black">
            <h1>Popular Category</h1>
          </div>
        </div>
        <div class="container">
          <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
            <div class="categories-section-2">
              <ul id="popular-categories">
                <li><a href="#"><i class="fa fa-line-chart"></i> Accounting Jobs </a></li>
                <li><a href="#"><i class="fa fa-wrench"></i> Automotive Jobs</a></li>
                <li><a href="#"><i class="fa fa-building-o"></i> Construction Jobs </a></li>
                <li><a href="#"><i class="fa fa-graduation-cap"></i> Educational Jobs</a></li>
                <li><a href="#"><i class="fa fa-medkit"></i> Healthcare Jobs </a></li>
                <li><a href="#"><i class="fa fa-cutlery"></i> Food Service Jobs></a></li>
                <li><a href="#"><i class="fa fa-globe"></i> Logistics Jobs</a></li>
                <li><a href="#"><i class="fa fa-laptop"></i> Telecom Jobs</a></li>
              </ul>
              <div class="clearfix"></div>
            </div>
            <a href="#" class="btn-default-style">View All Category</a> </div>
        </div>
      </div>
    </div>
  </section>
  <section class="featured-jobs">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="Heading-title black">
              <h1>Featured Jobs</h1>
            </div>
          </div>
          <div class="f-post owl-carousel owl-theme">
            <div class="item">
              <div class="col-md-12">
                <div class="feature-post">
                  <div class="post-type-duration">
                    <div class="post-name pull-left"> <img src="<?php echo $this->config->base_url();?>site/images/feature-post.png"> </div>
                    <div class="post-duration pull-right"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <small> 8 Hrs Ago</small> </div>
                  </div>
                  <div class="clearfix"></div>
                  <h4>IT Project Manager at AirBnB</h4>
                  <ul>
                    <li>AirBnB</li>
                    <li>Bahrain</li>
                    <li>Best in Industry</li>
                  </ul>
                  <div class="clearfix"></div>
                  <p>Lorem ipsum dolor sit amet, conse
                    Adipiscing elit, sed do eiusmod 
                    tempor incididunt ut...</p>
                  <a href="#" class="btn-default">View Job</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-12">
                <div class="feature-post">
                  <div class="post-type-duration">
                    <div class="post-name pull-left"> <img src="<?php echo $this->config->base_url();?>site/images/feature-post.png"> </div>
                    <div class="post-duration pull-right"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <small> 8 Hrs Ago</small> </div>
                  </div>
                  <div class="clearfix"></div>
                  <h4>IT Project Manager at AirBnB</h4>
                  <ul>
                    <li>AirBnB</li>
                    <li>Bahrain</li>
                    <li>Best in Industry</li>
                  </ul>
                  <div class="clearfix"></div>
                  <p>Lorem ipsum dolor sit amet, conse
                    Adipiscing elit, sed do eiusmod 
                    tempor incididunt ut...</p>
                  <a href="#" class="btn-default">View Job</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-12">
                <div class="feature-post">
                  <div class="post-type-duration">
                    <div class="post-name pull-left"> <img src="<?php echo $this->config->base_url();?>site/images/feature-post.png"> </div>
                    <div class="post-duration pull-right"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <small> 8 Hrs Ago</small> </div>
                  </div>
                  <div class="clearfix"></div>
                  <h4>IT Project Manager at AirBnB</h4>
                  <ul>
                    <li>AirBnB</li>
                    <li>Bahrain</li>
                    <li>Best in Industry</li>
                  </ul>
                  <div class="clearfix"></div>
                  <p>Lorem ipsum dolor sit amet, conse
                    Adipiscing elit, sed do eiusmod 
                    tempor incididunt ut...</p>
                  <a href="#" class="btn-default">View Job</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-12">
                <div class="feature-post">
                  <div class="post-type-duration">
                    <div class="post-name pull-left"> <img src="<?php echo $this->config->base_url();?>site/images/feature-post.png"> </div>
                    <div class="post-duration pull-right"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <small> 8 Hrs Ago</small> </div>
                  </div>
                  <div class="clearfix"></div>
                  <h4>IT Project Manager at AirBnB</h4>
                  <ul>
                    <li>AirBnB</li>
                    <li>Bahrain</li>
                    <li>Best in Industry</li>
                  </ul>
                  <div class="clearfix"></div>
                  <p>Lorem ipsum dolor sit amet, conse
                    Adipiscing elit, sed do eiusmod 
                    tempor incididunt ut...</p>
                  <a href="#" class="btn-default">View Job</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-12">
                <div class="feature-post">
                  <div class="post-type-duration">
                    <div class="post-name pull-left"> <img src="<?php echo $this->config->base_url();?>site/images/feature-post.png"> </div>
                    <div class="post-duration pull-right"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <small> 8 Hrs Ago</small> </div>
                  </div>
                  <div class="clearfix"></div>
                  <h4>IT Project Manager at AirBnB</h4>
                  <ul>
                    <li>AirBnB</li>
                    <li>Bahrain</li>
                    <li>Best in Industry</li>
                  </ul>
                  <div class="clearfix"></div>
                  <p>Lorem ipsum dolor sit amet, conse
                    Adipiscing elit, sed do eiusmod 
                    tempor incididunt ut...</p>
                  <a href="#" class="btn-default">View Job</a> </div>
              </div>
            </div>
            <div class="item">
              <div class="col-md-12">
                <div class="feature-post">
                  <div class="post-type-duration">
                    <div class="post-name pull-left"> <img src="<?php echo $this->config->base_url();?>site/images/feature-post.png"> </div>
                    <div class="post-duration pull-right"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> <small> 8 Hrs Ago</small> </div>
                  </div>
                  <div class="clearfix"></div>
                  <h4>IT Project Manager at AirBnB</h4>
                  <ul>
                    <li>AirBnB</li>
                    <li>Bahrain</li>
                    <li>Best in Industry</li>
                  </ul>
                  <div class="clearfix"></div>
                  <p>Lorem ipsum dolor sit amet, conse
                    Adipiscing elit, sed do eiusmod 
                    tempor incididunt ut...</p>
                  <a href="#" class="btn-default">View Job</a> </div>
              </div>
            </div>
          </div>
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="load-more-btn">
              <button class="btn-default-style"> View All </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="servies-section-main">
    <div class="container" style="max-width:960px">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 nopadding hidden-sm">
          <div class="service-img-section-left mobile-hide"> <img class="srv-img" src="<?php echo $this->config->base_url();?>site/images/service-01.png"> </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 nopadding">
          <div class="servies-detail-section">
            <h2>Professional CV Writing</h2>            
            
            <p style="color:black">Create a great impression on Employers.</p>
            <p>We employ professional experts for creating well-crafted resumes ranging from entry level to executive level. It helps the employer to get an idea about your objectives and goals associated with the career. Our resume writing specialists will ask you about the details of current job history, previous experience and career goals. The professional resume expert will then create your curriculum vitae appealing to the employer.</p>
           
            <a href="#" style="display: inline-block;" class="btn-default-style btn btn-servies-section-main">Sign up Now</a> </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12 nopadding">
          <div class="servies-detail-section">
            <h2>Psychometric Test</h2>
            <p style="color:black">  First platform in the region to provide verified candidates.</p>
            <p>
                Saves time and money in addition to providing employers with a true picture of candidates. 
                No need for employers to sift through a mountain of applications as our platform now filters and identifies candidates who best fit the company both through their abilities and their personality. Helps in employing staff most suited to your company’s culture.
            </p>
        <a href="#" style="display: inline-block;" class="btn-default-style btn btn-servies-section-main">Sign up Now</a> </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 nopadding hidden-sm">
          <div class="service-img-section-right mobile-hide"> <img class="srv-img" style="max-width: 350px !important; float:right;" src="<?php echo $this->config->base_url();?>site/images/servies-02.png"> </div>
        </div>
      </div>

    </div>
  </section>
  <section class="call-to-action-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-12 col-sm-10 col-xs-12">
            <div class="heading-detail vdo-interniew-bnr">
              <h3>Video Interview</h3>
              <p>Make an informed decision sooner with our live 
                video interviewing. No downloads or third-party 
                software required, just click and smile. 
                Launching Soon!</p>
              <a href="#" class="btn-default-style">Register Now</a> </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="service-provide light-grey">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="Heading-title black">
            <h2>Hire the Right Candidate. Find Them Here.</h2>
          </div>
        </div>
        <div class="portel-image"> <img src="<?php echo $this->config->base_url();?>site/images/portel-view.png" class="img-responsive"> </div>
        <div class="portel-points">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="row">
              <div class="col-md-6">
                <ul>
                  <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Advertise your jobs and promote your employer brand to the   candidates you want.</li>
                  <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Advertise your jobs and promote your employer brand to the   candidates you want.</li>
                </ul>
              </div>
              <div class="col-md-6">
                <ul>
                  <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Advertise your jobs and promote your employer brand to the   candidates you want.</li>
                  <li><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Advertise your jobs and promote your employer brand to the   candidates you want.</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="our-features">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12 nopadding">
        <div class="Heading-title black">
          <h1>Our Features</h1>
          <p style="margin-top:0px">A modern and affordable hiring tool that helps recruiters to automatically filter, review, 
            shortlist and hire the right candidates in minutes.</p>
        </div>
      </div>
    </div>
    <div class="row our-feature-detail">
      <div class="col-md-4 col-sm-4"> <a href="#"><img src="<?php echo $this->config->base_url();?>site/images/career-f.png"></a> </div>
      <div class="col-md-4 col-sm-4"> <a href="#"><img src="<?php echo $this->config->base_url();?>site/images/ranking-f.png"></a> </div>
      <div class="col-md-4 col-sm-4"> <a href="#"><img src="<?php echo $this->config->base_url();?>site/images/insightful-f.png"></a> </div>
      <div class="col-md-6 col-sm-6"> <a href="#"><img src="<?php echo $this->config->base_url();?>site/images/cv-f.png"></a> </div>
      <div class="col-md-6 col-sm-6"> <a href="#"><img src="<?php echo $this->config->base_url();?>site/images/candidate-f.png"></a> </div>
    </div>
  </div>
<!--</div>-->
</section>
  
  
  
  
  
<div class="brand-logo-area clients-bg light-grey">
  <div class="clients-list">
    <div class="client-logo"> <a href="#"><img src="<?php echo $this->config->base_url();?>site/images/clients/client_1.png" class="img-responsive" alt="Brand Image" /></a> </div>
    <div class="client-logo"> <a href="#"><img src="<?php echo $this->config->base_url();?>site/images/clients/client_2.png" class="img-responsive" alt="Brand Image" /></a> </div>
    <div class="client-logo"> <a href="#"><img src="<?php echo $this->config->base_url();?>site/images/clients/client_4.png" class="img-responsive" alt="Brand Image" /></a> </div>
    <div class="client-logo"> <a href="#"><img src="<?php echo $this->config->base_url();?>site/images/clients/client_1.png" class="img-responsive" alt="Brand Image" /></a> </div>
    <div class="client-logo"> <a href="#"><img src="<?php echo $this->config->base_url();?>site/images/clients/client_2.png" class="img-responsive" alt="Brand Image" /></a> </div>
    <div class="client-logo"> <a href="#"><img src="<?php echo $this->config->base_url();?>site/images/clients/client_3.png" class="img-responsive" alt="Brand Image" /></a> </div>
    <div class="client-logo"> <a href="#"><img src="<?php echo $this->config->base_url();?>site/images/clients/client_4.png" class="img-responsive" alt="Brand Image" /></a> </div>
  </div>
</div>
<div class="fixed-footer">
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-md-3 col-xs-12">
          <div class="footer_block"> <a href="#" class="f_logo"><img src="<?php echo $this->config->base_url();?>site/images/logo.png" class="img-responsive" alt="logo"></a>
            <p>
                Cherryhire.com is a unique platform for employers to cherry pick the right candidate. It is the first online platform in the region to provide verified profiles.
            </p>
            <div class="social-bar">
              <ul>
                <li> <a class="fa fa-twitter" href="https://twitter.com/cherry_hire"></a> </li>
                <li> <a class="fa fa-pinterest" href="#"></a> </li>
                <li> <a class="fa fa-facebook" href="#"></a> </li>
                <li> <a class="fa fa-behance" href="#"></a> </li>
                <li> <a class="fa fa-instagram" href="#"></a> </li>
                <li> <a class="fa fa-linkedin" href="#"></a> </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-2 col-xs-12">
          <div class="footer_block">
            <h4>Hot Links</h4>
            <ul class="footer-links">
              <li> <a href="#">Home</a> </li>
              <li> <a href="#">About Us</a> </li>
              <li> <a href="#">Privacy</a> </li>
              <li> <a href="#">Contact Us</a> </li>
              <li> <a href="#">Term & Conditions</a> </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-xs-12">
          <div class="footer_block dark_gry">
            <h4>Recent Posts</h4>
            <ul class="recentpost">
              <li> <span><a class="plus" href="#"><img src="<?php echo $this->config->base_url();?>site/images/footer/1.png" alt="" /><i>+</i></a></span>
                <p><a href="#">Fusce gravida tortor felis, ac dictum risus sagittis</a></p>
                <h3>Sep 15, 2016</h3>
              </li>
              <li> <span><a class="plus" href="#"><img src="<?php echo $this->config->base_url();?>site/images/footer/2.png" alt="" /><i>+</i></a></span>
                <p><a href="#">Fusce gravida tortor felis, ac dictum risus sagittis</a></p>
                <h3>Fab 10, 2016</h3>
              </li>
              <li> <span><a class="plus" href="#"><img src="<?php echo $this->config->base_url();?>site/images/footer/3.png" alt="" /><i>+</i></a></span>
                <p><a href="#">Fusce gravida tortor felis, ac dictum risus sagittis</a></p>
                <h3>Fab 10, 2016</h3>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3 col-xs-12">
          <div class="footer_block">
            <h4>Contact Information</h4>
            <ul class="personal-info">
              <li><i class="fa fa-map-marker"></i> 3rd Floor,Link Arcade Model Town, BBL, USA.</li>
              <li><i class="fa fa-envelope"></i> Support@domain.com</li>
              <li><i class="fa fa-phone"></i> (0092)+ 124 45 78 678 </li>
              <li><i class="fa fa-clock-o"></i> Mon - Sun: 8:00 - 16:00</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <section class="footer-bottom-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="footer-bottom">
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <p>Copyright ©2018 - CherryHire - All rights Reserved.</p>
                <p>Reproduction of material from scriptsBundle without permission is strictly prohibited. </p>
              </div>
              <div class="col-md-12 col-sm-12 col-xs-12 hidden-xs hidden-sm">
                <ul class="footer-menu">
                  <li> <a href="#">Jobs in australia</a> </li>
                  <li> <a href="#">Jobs in malaysia</a> </li>
                  <li> <a href="#">Jobs in england</a> </li>
                  <li> <a href="#">Jobs in saudi arabia</a> </li>
                  <li> <a href="#">Jobs in south africa</a> </li>
                  <li> <a href="#">Jobs in saudi Pakistan</a> </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a> 

<!-- JAVASCRIPT JS  --> 
<script type="text/javascript" src="<?php echo $this->config->base_url();?>site/js/jquery-3.1.1.min.js"></script> 

<!-- JAVASCRIPT JS  --> 
<script type="text/javascript" src="<?php echo $this->config->base_url();?>site/js/jquery-migrate-1.2.1.min.js"></script> 

<!-- BOOTSTRAP CORE JS --> 
<script type="text/javascript" src="<?php echo $this->config->base_url();?>site/js/bootstrap.min.js"></script> 

<!-- JQUERY SELECT --> 
<script type="text/javascript" src="<?php echo $this->config->base_url();?>site/js/select2.min.js"></script> 

<!-- MEGA MENU --> 
<script type="text/javascript" src="<?php echo $this->config->base_url();?>site/js/mega_menu.min.js"></script> 

<!-- JQUERY COUNTERUP --> 
<script type="text/javascript" src="<?php echo $this->config->base_url();?>site/js/counterup.js"></script> 

<!-- JQUERY WAYPOINT --> 
<script type="text/javascript" src="<?php echo $this->config->base_url();?>site/js/waypoints.min.js"></script> 

<!-- JQUERY REVEAL --> 
<script type="text/javascript" src="<?php echo $this->config->base_url();?>site/js/footer-reveal.min.js"></script> 

<!-- Owl Carousel --> 
<script type="text/javascript" src="<?php echo $this->config->base_url();?>site/js/owl-carousel.js"></script> 

<!-- CORE JS --> 
<script type="text/javascript" src="<?php echo $this->config->base_url();?>site/js/custom.js"></script> 
<script>
$('.owl-carousel').owlCarousel({

 
        itemsDesktop: [1199, 3],
        itemsDesktopSmall: [979, 3],
        nav: true,
		 navigationText: [
      "<i class='fa fa-arrow-left icon-white'></i>",
      "<i class='fa fa-arrow-right icon-white'></i>"
      ],
       
    responsive:{
        0:{
            items:4
        },
        600:{
            items:3
        },
        1000:{
            items:3
        }
		
    }
	
})
</script>
</div>
</body>
</html>