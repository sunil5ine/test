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
            <a href="<?php echo $this->config->base_url().'PostJob';?>" class="btn-default">Post jobs for FREE<i class="fa fa-angle-right"></i> </a> </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12 nopadding">
          <div class="employee-main-section">
            <h1>Job Seekers</h1>
            <p>Create a CherryHire account in just a few steps and get benefits of Cherryhire.Upload resume on Cherryhire Now!</p>
            <a href="<?php echo $this->config->base_url().'PostCV';?>" class="btn-default">Register Now<i class="fa fa-angle-right"></i></a> </div>
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
                <li><a href="<?php echo $this->config->base_url().'Jobs';?>"><i class="fa fa-line-chart"></i>Accounting</a></li>
                <li><a href="<?php echo $this->config->base_url().'Jobs';?>"><i class="fa fa-wrench"></i>Automotive</a></li>
                <li><a href="<?php echo $this->config->base_url().'Jobs';?>"><i class="fa fa-building-o"></i>Construction</a></li>
                <li><a href="<?php echo $this->config->base_url().'Jobs';?>"><i class="fa fa-graduation-cap"></i>Educational</a></li>
                <li><a href="<?php echo $this->config->base_url().'Jobs';?>"><i class="fa fa-medkit"></i>Healthcare</a></li>
                <li><a href="<?php echo $this->config->base_url().'Jobs';?>"><i class="fa fa-cutlery"></i>Food Service</a></li>
                <li><a href="<?php echo $this->config->base_url().'Jobs';?>"><i class="fa fa-globe"></i>Logistics</a></li>
                <li><a href="<?php echo $this->config->base_url().'Jobs';?>"><i class="fa fa-laptop"></i>Telecom</a></li>
              </ul>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <?php /*
  
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
  
  
  */ ?>
  
  <section class="servies-section-main">
    <div class="container" style="max-width:960px">
      <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 nopadding hidden-sm">
          <div class="service-img-section-left mobile-hide"> <img class="srv-img" src="<?php echo $this->config->base_url();?>site/images/service-01.png"> </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12 nopadding">
          <div class="servies-detail-section">
          <h2>Psychometric Test</h2>
            <p style="color:black">  First platform in the region to provide verified candidates.</p>
            <p>
                Saves time and money in addition to providing employers with a true picture of candidates. 
                No need for employers to sift through a mountain of applications as our platform now filters and identifies candidates who best fit the company both through their abilities and their personality. Helps in employing staff most suited to your company’s culture.
            </p>
        
           <form name="jobfrm" id="jobfrm" action="<?php echo base_url(); ?>Site/psychometric" method="post">
            <button style="display: inline-block;" class="btn-default-style btn btn-servies-section-main">        
                Know More           
            </button>
           </form> 
            
            
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12 nopadding">
          <div class="servies-detail-section">
            <h2>Professional CV Writing</h2>            
            
            <p style="color:black">Create a great impression on Employers.</p>
            <p>We employ professional experts for creating well-crafted resumes ranging from entry level to executive level. It helps the employer to get an idea about your objectives and goals associated with the career. Our resume writing specialists will ask you about the details of current job history, previous experience and career goals. The professional resume expert will then create your curriculum vitae appealing to the employer.</p>
            
            <form name="jobfrm" id="jobfrm" action="<?php echo base_url(); ?>Site/cv_writing" method="post">
            <button style="display: inline-block;" class="btn-default-style btn btn-servies-section-main">        
                Know More            
            </button>
           </form> 
                  
        
          </div>
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
              <a href="#" class="btn-default-style">Coming Soon</a> </div>
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
  
  
  
  
  
  
  
  
   
  
  
