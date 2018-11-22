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
   </head>
   <body>
      <!-- headder -->
      <?php $this->load->view('include/header'); ?>
      <!-- end headder -->
        <section class="sec-top">
            <div class="container-wrap">
                <div class="col l12 m12 s12">
                    <div class="row">
                        <?php $this->load->view('include/menu'); ?>
                        <div class="col m12 s12 l9">
                           
                            <div class="row">
                                <div class="col s12 m6"> 
                                    <p class="h5-para black-text  m0">Manage Pricing</p>
                                    <small><i>Hello, Comapny name. Check out what's happening!</i></small>
                                </div>
                                <div class="col s12 m6"> 
                                    <div class="switch">
                                        <label>
                                            <span class="bold black-text">Candidates Plan</span>
                                            <input type="checkbox" id="plan-selector">
                                            <span class="lever"></span>
                                            <span class="fad-text ">Employers Plan</span>
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="candidate">
                                <div class="col s12 m6 l4">
                                    <div class="card-panel plans">
                                        <div class="center" style="margin-top: -37px;">
                                            <div class="chip green darken-4 white-text ">Most popular</div>
                                        </div>
                                        <div class="card-title-box"> <span class="card-title left-align"> Silver </span>
                                            <span class="card-title right"> $ 20.00 </span>
                                            <div class="card-sub-title"> <span class="left-align"></span>
                                                <span class="right">/ 6 months</span>
                                            </div>
                                        </div>
                                        <div class="card-action ">
                                            <ul>
                                                <li> <span class="left-align">Validity Period </span>
                                                    <span class="right">6 months</span>
                                                </li>
                                                <li> <span class="left-align">Job Applications</span>
                                                    <span class="right">5</span>
                                                </li>
                                                <li> <span class="left-align">Personalised Job Alerts</span>
                                                    <span class="right  green-text">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">View Employer  Details</span>
                                                    <span class="right  green-text">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">Who Viewd Your Profile</span>
                                                    <span class="right  green-text">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">More Profile Views</span>
                                                    <span class="right  red-text">
                                                    <i class="fas fa-times"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">Assisted Job Search</span>
                                                    <span class="right  red-text">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">Resume Review</span>
                                                    <span class="right  red-text">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">Profile Enrichment</span>
                                                    <span class="right  red-text">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                </li>
                                            </ul>
                                            <div class="center"> <a style="min-width: 180px"  class=" btn btn-m white-text green darken-4  waves-green hoverable  waves-effect transparent">Get Started</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l4">
                                    <div class="card-panel plans">
                                        <div class="center" style="margin-top: -37px;">
                                            <div class="chip green darken-4 white-text ">Most popular</div>
                                        </div>
                                        <div class="card-title-box"> <span class="card-title left-align"> Silver </span>
                                            <span class="card-title right"> $ 20.00 </span>
                                            <div class="card-sub-title"> <span class="left-align"></span>
                                                <span class="right">/ 6 months</span>
                                            </div>
                                        </div>
                                        <div class="card-action ">
                                            <ul>
                                                <li> <span class="left-align">Validity Period </span>
                                                    <span class="right">6 months</span>
                                                </li>
                                                <li> <span class="left-align">Job Applications</span>
                                                    <span class="right">5</span>
                                                </li>
                                                <li> <span class="left-align">Personalised Job Alerts</span>
                                                    <span class="right  green-text">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">View Employer  Details</span>
                                                    <span class="right  green-text">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">Who Viewd Your Profile</span>
                                                    <span class="right  green-text">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">More Profile Views</span>
                                                    <span class="right  red-text">
                                                    <i class="fas fa-times"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">Assisted Job Search</span>
                                                    <span class="right  red-text">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">Resume Review</span>
                                                    <span class="right  red-text">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">Profile Enrichment</span>
                                                    <span class="right  red-text">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                </li>
                                            </ul>
                                            <div class="center"> <a style="min-width: 180px" href="" class=" btn btn-m white-text green darken-4  btn-nc waves-green hoverable  waves-effect transparent">Get Started</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s12 m6 l4">
                                    <div class="card-panel plans">
                                        <div class="center" style="margin-top: -37px;">
                                            <div class="chip green darken-4 white-text ">Most popular</div>
                                        </div>
                                        <div class="card-title-box"> <span class="card-title left-align"> Silver </span>
                                            <span class="card-title right"> $ 20.00 </span>
                                            <div class="card-sub-title"> <span class="left-align"></span>
                                                <span class="right">/ 6 months</span>
                                            </div>
                                        </div>
                                        <div class="card-action ">
                                            <ul>
                                                <li> <span class="left-align">Validity Period </span>
                                                    <span class="right">6 months</span>
                                                </li>
                                                <li> <span class="left-align">Job Applications</span>
                                                    <span class="right">5</span>
                                                </li>
                                                <li> <span class="left-align">Personalised Job Alerts</span>
                                                    <span class="right  green-text">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">View Employer  Details</span>
                                                    <span class="right  green-text">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">Who Viewd Your Profile</span>
                                                    <span class="right  green-text">
                                                        <i class="fas fa-check"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">More Profile Views</span>
                                                    <span class="right  red-text">
                                                    <i class="fas fa-times"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">Assisted Job Search</span>
                                                    <span class="right  red-text">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">Resume Review</span>
                                                    <span class="right  red-text">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                </li>
                                                <li> <span class="left-align">Profile Enrichment</span>
                                                    <span class="right  red-text">
                                                        <i class="fas fa-times"></i>
                                                    </span>
                                                </li>
                                            </ul>
                                            <div class="center"> <a style="min-width: 180px" href="" class=" btn btn-m white-text green darken-4  btn-nc waves-green hoverable  waves-effect transparent">Get Started</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Employers -->
                            <div class="row" id="employer" style="display:none">
                            <div class="col m6 l6 xl4 s12">
                                <!-- card start -->
                                <div class="card-panel plans">
                                    <div class="center" style="margin-top: -37px;">
                                        <div class="chip green darken-4 white-text ">
                                            Most popular
                                        </div>
                                    </div>
                                    <div class="card-title-box">
                                        <span class="card-title left-align"> Mid Level  </span>
                                        <span class="card-title right">  $ 200 </span>
                                        <div class="card-sub-title">
                                            <span class="left-align">6-8 years </span>
                                            <span class="right">/  <s> $ 400</s></span>
                                        </div>
                                    </div>
                                    
                                    <div class="card-action ">
                                        <ul>
                                            <li>
                                                <span class="left-align">Plan Name</span>
                                                <span class="right">Mid Level </span>
                                            </li>
                                            <li>
                                                <span class="left-align">Candidates Experience Level</span>
                                                <span class="right">6-8 years</span>
                                            </li>
                                            <li>
                                                <span class="left-align">Verified candidates</span>
                                                <span class="right ">10</span>
                                            </li>
                                            <li>
                                                <span class="left-align">Validity Period </span>
                                                <span class="right">45 Days</span>
                                            </li>
                                            
                                            <li>
                                                <span class="left-align">Price</span>
                                                <span class="right"> <s>$ 400</s></span>
                                            </li>
                                            <li>
                                                <span class="left-align">Offer price</span>
                                                <span class="right">$ 200</span>
                                            </li>

                                            <li>
                                                <span class="left-align">Premium Job</span>
                                                <span class="right">1</span>
                                            </li>
                                        </ul>
                                        <div class="center">                                                                            
                                            <a href="" style="min-width: 180px" class=" btn btn-m white-text brand waves-green  waves-effect ">Get Started</a>
                                        </div>
                                    </div>
                                </div><!-- end card  1-->
                                </div>
                            </div>

                        </div><!-- end right side content -->
                    </div>
                </div>
            </div>
        </section>

        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/script.js"></script>
        <script>
            $(document).ready(function(){
                $('.modal').modal();
                    $('#plan-selector').change(function(){
                    if($(this).is(':checked'))
                    {
                        $('#candidate').toggle(500);
                        $('#employer').toggle(500);

                    }else{
                        $('#employer').toggle(500);
                        $('#candidate').toggle(500);
                    }
                });
            });
        </script>
    </body>
</html>
