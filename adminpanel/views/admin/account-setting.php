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
      <!-- end headder -->
      <!-- first layout -->
        <section class="sec-top">
            <div class="container-wrap">
                <div class="col l12 m12 s12">
                    <div class="row">
                        <?php $this->load->view('include/menu'); ?> 

                        <div class="col m12 s12 l9">
                            <p class="h5-para black-text m0">Account Settings</p>
                            <small ><i>Hello, <?php echo $profile['ad_name'] ?> Check out what's hapening!</i></small>
                            <br><br>
                            <div class="card">
                                <div class="card-content">
                                    
                                    <div class="form-container">
                                        
                                        <form action="<?php echo base_url('setting/update')  ?>" enctype="multipart/form-data" method="post"  style="overflow-y: auto;overflow-x: hidden;">

                                            <div class="row m0">
                                                <div class="input-field col s6 l2">
                                                    <div class="profile-pic-container">
                                                        <?php if(!empty($profile['ap_pic'])) { ?>
                                                            <img src="<?php echo $profile['ap_pic'] ?>" alt="" class="circle" width="100px">
                                                        <?php } else{ ?>
                                                            <img src="https://dummyimage.com/100x100/7a747a/fafafa" alt="" class="circle" width="100px">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                
                                                <div class="input-field col s6 l5">
                                                    <div class="file-field input-field">
                                                        <div class="hoverable btn-flat btn">
                                                            <span class="blue-text bold">Change profile pic</span>
                                                            <input type="file" name="pic">
                                                        </div>
                                                        <div class="file-path-wrapper">
                                                            <input class="file-path validate" type="text" style="border:transparent">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="input-field col s12 l6">
                                                <input type="text" id="first_name" name="name"  value="<?php echo $profile['ad_name'] ?>" class="validate">
                                                <label for="first_name">Admin Name</label>
                                                <span data-error="wrong" class="red-text helper-text "><?php echo form_error('name'); ?></span>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <input type="email" id="last_name" name="email" class="validate" value="<?php echo $profile['ad_email'] ?>">
                                                <label for="last_name">Email ID</label>
                                                <span data-error="wrong" class="red-text helper-text "><?php echo form_error('email'); ?></span>
                                            </div>
                                          
                                            <div class="input-field col s12 l6">
                                                <input type="password" name="psw" id="last_name" class="validate" value="<?php echo $profile['ad_hash'] ?>">
                                                <label for="last_name">Change password</label>
                                                <span data-error="wrong" class="red-text helper-text "><?php echo form_error('psw'); ?></span>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <input type="password" name="cpsw" id="first_name" class="validate" value="<?php echo $profile['ad_hash'] ?>">
                                                <label for="first_name">Confirm Password</label>
                                                <span data-error="wrong" class="red-text helper-text "><?php echo form_error('cpsw'); ?></span>
                                            </div>

                                            <div class="input-field col s12 l6">
                                                <input type="number" name="phone" id="first_name" class="validate" value="<?php echo $profile['ap_mobile'] ?>">
                                                <label for="first_name">Mobile Number</label>
                                            </div>

                                            <div class="clearfix"></div>

                                            <p class="col s12 bold">Send Notification Emails</p>
                                            <div class="input-field col s12 l6">
                                                <input type="email" name="nemail" id="last_name" class="validate" value="<?php echo $profile['ap_notification'] ?>">
                                                <label for="last_name">Notification</label>
                                            </div>
                                            <div class="input-field col s12 l6">
                                                <input type="email" name="pemail" id="first_name" class="validate" value="<?php echo $profile['ap_payment'] ?>">
                                                <label for="first_name">Payment</label>
                                            </div>

                                            <div class="input-field col s12 l6">
                                                <input type="email" name="cemail" id="last_name" class="validate" value="<?php echo $profile['ap_cvwriting'] ?>">
                                                <input type="hidden" name="id" value="<?php echo $this->session->userdata('adminid'); ?>" readonly >
                                                <label for="last_name">Cv Writing</label>
                                            </div>
                                            <div class="input-field col s12 l12 center">
                                                <button class="btn waves-effect waves-light green darken-4 btn-large hoverable" type="submit" name="action">Save Details
                                                    <i class="far fa-save right"></i>
                                                </button>  
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div><!-- cad end -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php echo $this->session->flashdata('messeg');?>                                                    


        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/script.js"></script>
    </body>
</html>