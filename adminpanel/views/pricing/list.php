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
                                <div class="col s12 m4"> 
                                    <p class="h5-para black-text  m0 mb10">Manage Pricing</p>
                                    <small><i>Hello, Comapny name. Check out what's happening!</i></small>
                                </div>
                                <div class="col s12 m4"> 
                                    <div class="switch center mb10">
                                        <label>
                                            <span class="bold black-text p-txt1">Candidates Plan</span>
                                            <input type="checkbox" id="plan-selector">
                                            <span class="lever"></span>
                                            <span class="fad-text p-txt2">Employers Plan</span>
                                        </label>
                                    </div>
                                    <p class="m0 center"><small><i>Choose Package</i></small></p>
                                </div>
                                <div class="col s12 m4 ">
                                    <a href="<?php echo base_url() ?>price/add-candidate" class="waves-effect block waves-light hoverable white-text can-btn  green darken-4 btn">Add New Candidate Package</a>
                                    <a href="<?php echo base_url() ?>price/add-employer"  style="display:none" class="waves-effect block waves-light hoverable white-text emp-btn  blue darken-4 btn">Add New Employer Package</a>
                                </div>
                            </div>
                            <div class="row" id="candidate">
                            <?php 
                                if(!empty($canprice)){
                                foreach ($canprice as $plan) { 
                                    if ($plan->pr_gat == 0) { ?>
                                    
                                    <div class="col m6 l4  s12">
                                            <!-- card start -->
                                            <div class="card-panel plans">
                                                <?php  if (!empty($plan->pr_notify)) { $btn_class = 'white-text green'; ?>
                                                    <div class="center" style="margin-top: -37px;">
                                                        <div class="chip green darken-4 white-text ">
                                                            <?php  echo $plan->pr_notify; ?>
                                                        </div>
                                                    </div>
                                                <?php }else{ $btn_class = 'green-text';} ?>
                                                <div class="card-title-box">
                                                    <span class="card-title left-align"> <?php echo $plan->pr_name ?> </span>
                                                    <span class="card-title right"> $ <?php echo $plan->pr_offer ?> </span>
                                                    <div class="card-sub-title">
                                                        <span class="left-align"></span>
                                                        <span class="right">/ <?php echo $plan->pr_limit;echo ($plan->pr_id>1)? ' months':' month';?></span>
                                                    </div>
                                                </div>
                                                
                                                <div class="card-action ">
                                                    <ul>
                                                        <li>
                                                            <span class="left-align">Validity Period </span>
                                                            <span class="right"><?php echo $plan->pr_limit;echo ($plan->pr_id>1)? ' months':' month';?></span>
                                                        </li>
                                                        <li>
                                                            <span class="left-align">Job Applications</span>
                                                            <span class="right"><?php echo $plan->pr_nojob ?></span>
                                                        </li>
                                                        <li>
                                                            <span class="left-align">Personalised Job Alerts</span>
                                                            <span class="right <?php echo ($plan->pr_job_aler== 1)? ' green-text':' red-text'; ?>">
                                                                <?php echo ($plan->pr_job_aler == 1)? ' <i class="fas fa-check green-text"></i>':' <i class="fas fa-times red-text"></i>'; ?>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="left-align">View Employer  Details</span>
                                                            <span class="right <?php echo ($plan->pr_view_employer_detail == 1)? ' green-text':' red-text'; ?>">
                                                                <?php echo ($plan->pr_view_employer_detail== 1)? ' <i class="fas fa-check green-text"></i>':' <i class="fas fa-times red-text"></i>'; ?>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="left-align">Who Viewd Your Profile</span>
                                                            <span class="right <?php echo ($plan->pr_prfle_viewrs== 1)? ' green-text':' red-text'; ?>">
                                                                <?php echo ($plan->pr_prfle_viewrs== 1)? ' <i class="fas fa-check green-text"></i>':' <i class="fas fa-times red-text"></i>'; ?>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="left-align">More Profile Views</span>
                                                            <span class="right <?php echo ($plan->pr_boost== 1)? ' green-text':' red-text'; ?>">
                                                               <?php echo ($plan->pr_boost== 1)? ' <i class="fas fa-check green-text"></i>':' <i class="fas fa-times red-text"></i>'; ?>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="left-align">Assisted Job Search</span>
                                                            <span class="right <?php echo ($plan->pr_as_jobsearch== 1)? ' green-text':' red-text'; ?>">
                                                                <?php echo ($plan->pr_as_jobsearch== 1)? ' <i class="fas fa-check green-text"></i>':' <i class="fas fa-times red-text"></i>'; ?>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="left-align">Resume Review</span>
                                                            <span class="right <?php echo ($plan->pr_resume_view== 1)? ' green-text':' red-text'; ?>">
                                                               <?php echo ($plan->pr_resume_view== 1)? ' <i class="fas fa-check green-text"></i>':' <i class="fas fa-times red-text"></i>'; ?>
                                                            </span>
                                                        </li>
                                                        <li>
                                                            <span class="left-align">Profile Enrichment</span>
                                                            <span class="right <?php echo ($plan->pr_enrichment== 1)? ' green-text':' red-text'; ?>">
                                                               <?php echo ($plan->pr_enrichment== 1)? ' <i class="fas fa-check green-text"></i>':' <i class="fas fa-times red-text"></i>'; ?>
                                                            </span>
                                                        </li>

                                                        <li>
                                                            <span class="left-align">Video Interview</span>
                                                            <span class="right <?php echo ($plan->pr_video_interview== 1)? ' green-text':' red-text'; ?>">
                                                               <?php echo ($plan->pr_video_interview== 1)? ' <i class="fas fa-check green-text"></i>':' <i class="fas fa-times red-text"></i>'; ?>
                                                            </span>
                                                        </li>

                                                        <?php if(!$plan->pr_gend_test == 0){ ?>
                                                            <li>
                                                                <span class="left-align">General Aptitude Test</span>
                                                                <span class="right green-text">
                                                                    <i class="fas fa-check green-text"></i>
                                                                </span>
                                                            </li>
                                                        <?php	}	?>
                                                        <?php if(!$plan->pr_psy_test == 0){ ?>
                                                            <li>
                                                                <span class="left-align">Psychometric Test</span>
                                                                <span class="right green-text">
                                                                    <i class="fas fa-check green-text"></i>
                                                                </span>
                                                            </li>
                                                        <?php	}	?>
                                                        
                                                    </ul>
                                                    <div class="center">
                                                        <a style="min-width: 180px" href="<?php echo $this->config->base_url();?>price/update/<?php echo $plan->pr_encrypt_id;?>" class=" btn btn-m green darken-4  white-text btn-nc waves-green hoverable  waves-effect ">Edit</a>
                                                    </div>
                                                </div>
                                            </div><!-- end card  1-->
                                        </div><!-- end col -->

                                <?php } } } ?>  
                            </div>       
                            <!-- Employers -->
                            <div class="row" id="employer" style="display:none">
                            <?php if(!empty($empprice)) {  foreach ($empprice as $result) {  ?>
                                <div class="col m6 l6 xl4 s12">
                                    <!-- card start -->
                                    <div class="card-panel plans">
                                        <?php if($result->pr_notify != '') { ?>
                                            <div class="center" style="margin-top: -37px;">
                                                <div class="chip green darken-4 white-text ">
                                                    Most popular
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="card-title-box">
                                            <span class="card-title left-align"> <?php echo $result->pr_name;?> </span>
                                            <span class="card-title right">  <?php echo ($result->pr_offer != 0)? '$ '. number_format($result->pr_offer,0): ''?> </span>
                                            <div class="card-sub-title">
                                                <span class="left-align"><?php echo $result->exprence_level ?> </span>
                                                <span class="right">/  <s> <?php echo ($result->pr_offer != 0)? '$ '. number_format($result->pr_orginal,0): ''?></s></span>
                                            </div>
                                        </div>
                                        
                                        <div class="card-action ">
                                            <ul>
                                                <li>
                                                    <span class="left-align">Plan Name</span>
                                                    <span class="right"><?php echo $result->pr_name;?></span>
                                                </li>
                                                <li>
                                                    <span class="left-align">Candidates Experience Level</span>
                                                    <span class="right"><?php echo $result->exprence_level;?></span>
                                                </li>
                                                <li>
                                                    <span class="left-align">Verified candidates</span>
                                                    <span class="right "><?php echo $result->pr_cvno;?></span>
                                                </li>
                                                <li>
                                                    <span class="left-align">Validity Period </span>
                                                    <span class="right"><?php echo ($result->peried > 1)?$result->peried.' Days'  : $result->peried.' Day' ?></span>
                                                </li>
                                                
                                                <li>
                                                    <span class="left-align">Price</span>
                                                    <span class="right"> <s><?php echo ($result->pr_orginal != 0)? '$ '. number_format($result->pr_orginal,0): 'Free'?></s></span>
                                                </li>
                                                <li>
                                                    <span class="left-align">Offer price</span>
                                                    <span class="right"><?php echo ($result->pr_offer != 0)? '$ '. number_format($result->pr_offer,0): 'Free'?></span>
                                                </li>

                                                <li>
                                                    <span class="left-align">Premium <?php echo ($result->pr_limit==1)?'Job':'Jobs';?></span>
                                                    <span class="right"><?php echo $result->pr_limit;?></span>
                                                </li>
                                                

                                            </ul>
                                            <div class="center">
                                                <a href="<?php echo $this->config->base_url();?>pricing/emp-price-Edit/<?php echo $result->pr_encrypt_id;?>" style="min-width: 180px" class=" btn btn-m white-text green darken-4 waves-green  hoverable waves-effect ">Edit</a>
                                            </div>
                                        </div>
                                    </div><!-- end card  1-->
                                </div><!-- end col -->
                                <?php } } ?>
                            </div>

                        </div><!-- end right side content -->
                    </div>
                </div>
            </div>
        </section>
        <?php echo $this->session->flashdata('messeg'); ?> 

        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/script.js"></script>
        <script>
            $(document).ready(function(){
               
                    $('#plan-selector').change(function(){
                    if($(this).is(':checked'))
                    {
                        $('#candidate').toggle(500);
                        $('#employer').toggle(500);
                        $('.can-btn').toggle();
                        $('.emp-btn').toggle();
                        $('.p-txt1').removeClass('bold black-text').addClass('fad-text');
                        $('.p-txt2').removeClass(' fad-text').addClass('bold black-text');

                    }else{
                        $('#employer').toggle(500);
                        $('#candidate').toggle(500);
                        $('.can-btn').toggle();
                        $('.emp-btn').toggle();
                        $('.p-txt2').removeClass('bold black-text').addClass('fad-text');
                        $('.p-txt1').removeClass(' fad-text').addClass('bold black-text');
                    }
                });
            });
        </script>
    </body>
</html>
