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

                                                        <?php if(!empty($plan->pr_details)){ ?>
                                                            <li>
                                                                <span class="left-align"><?php echo $plan->pr_details ?></span>
                                                                <span class="right green-text">
                                                                    <i class="fas fa-check green-text"></i>
                                                                </span>
                                                            </li>
                                                        <?php	}	?>
                                                        
                                                    </ul>
                                                    <div class="center">
                                                        <a style="min-width: 180px" href="<?php echo $this->config->base_url();?>price/update/<?php echo $plan->pr_encrypt_id;?>" class=" btn btn-m green darken-4  white-text btn-nc waves-green hoverable  waves-effect ">Edite</a>
                                                    </div>
                                                </div>
                                            </div><!-- end card  1-->
                                        </div><!-- end col -->

                                <?php } } } ?>                
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
                                            <a href="" style="min-width: 180px" class=" btn btn-m white-text green waves-green  waves-effect ">Get Started</a>
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
