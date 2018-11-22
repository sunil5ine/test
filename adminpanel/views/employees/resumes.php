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
                                <p class="h5-para black-text  m0">Company Details</p>
                                <small><i>Hello, Comapny name. Check out what's happening!</i></small>
                            </div><!-- end row1 -->

                            <div class="row">
                                <div class="col s12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="row m0">
                                                <div class="col s12 m4 border-right">
                                                    <img src="<?php echo base_url() ?>dist/img/clogo.png" alt="" class="circle responsive-img left mr10" width="120px" />
                                                    <div class="ptb15">
                                                        <h6 class="bold">Gcc Private LTD</h6>
                                                        <p><small>Recruiter Baharain</small></p>
                                                        <p><small>0123456789</small></p>
                                                    </div>
                                                </div>

                                                <div class="col s12 m8">
                                                    <div class="row m0">
                                                        <div class="col s12 m4">
                                                           <h5 class="green-text darken-3">08</h5> 
                                                           <p>Number of CV Pending</p>
                                                        </div>
                                                        <div class="col s12 m4">
                                                        <h5 class="green-text darken-4">12</h5> 
                                                           <p>Number of CV Uploaded</p>
                                                        </div>
                                                        <div class="col s12 m4">
                                                        <h5 class="green-text darken-4">Srandard</h5> 
                                                           <p>Package Type <a href="" class="blue-text">[Upgrade]</a></p>
                                                        </div>

                                                        <div class="col s12 center mt15">
                                                            <a href="#" class="waves-effect waves-light btn green darken-4 plr40">Upload Resume</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end row2 -->

                            <div class="row m0 boder-bottom">
                                <div class="col l4 m4 s12 pl0">
                                    <a href="<?php echo base_url() ?>employees/details/f03a9">
                                        <p class="black-text r-left m0">Company Details</p>
                                    </a>
                                </div>
                                <div class="col l4 m4 s12">
                                    <a href="<?php echo base_url() ?>employees/posted-jobs/f03a9">
                                        <p class="black-text r-left m0">Posted Jobs</p>
                                    </a>
                                </div>
                                <div class="col l4 m4 s12">
                                    <a href="<?php echo base_url() ?>employees/uploaded-resumes/f03a9">
                                        <p class="black-text l-left m0">Uploaded Resumes</p>
                                    </a>
                                </div>
                            </div><!-- end row3 -->

                            <div class="row">
                                <div class="card">
                                    <div class="card-content">
                                       
                                        <table class="striped">
                                            <thead>
                                                <tr>
                                                    <th >Job Title</th>
                                                    <th >Function Area</th>
                                                    <th >Salary</th>
                                                    <th >Experience</th>
                                                    <th >Status</th>
                                                    <th >Applications</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Alvin</td>
                                                    <td>Eclair</td>
                                                    <td>$87</td>
                                                    <td>2+years</td>
                                                    <td class="green-text">Active</td>
                                                    <td>05</td>
                                                </tr>
                                                <tr>
                                                    <td>Alvin</td>
                                                    <td>Eclair</td>
                                                    <td>$87</td>
                                                    <td>2+years</td>
                                                    <td class="green-text">Active</td>
                                                    <td>05</td>
                                                </tr>
                                                <tr>
                                                    <td>Alvin</td>
                                                    <td>Eclair</td>
                                                    <td>$87</td>
                                                    <td>2+years</td>
                                                    <td class="green-text">Active</td>
                                                    <td>05</td>
                                                </tr>
                                                <tr>
                                                    <td>Alvin</td>
                                                    <td>Eclair</td>
                                                    <td>$87</td>
                                                    <td>2+years</td>
                                                    <td class="green-text">Active</td>
                                                    <td>05</td>
                                                </tr>
                                                <tr>
                                                    <td>Alvin</td>
                                                    <td>Eclair</td>
                                                    <td>$87</td>
                                                    <td>2+years</td>
                                                    <td class="green-text">Active</td>
                                                    <td>05</td>
                                                </tr>
                                                <tr>
                                                    <td>Alvin</td>
                                                    <td>Eclair</td>
                                                    <td>$87</td>
                                                    <td>2+years</td>
                                                    <td class="green-text">Active</td>
                                                    <td>05</td>
                                                </tr>
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div><!-- end row4 -->

                        </div><!-- end right side content -->
                    </div>
                </div>
            </div>
        </section>


        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/script.js"></script>
    </body>
</html>

