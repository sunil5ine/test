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
                            <small><i>Hello, Admin Name Check out what's hapening!</i></small>

                            <div class="card">
                                <div class="card-content">
                                    <div class="profile-pic-container">
                                        <img src="https://dummyimage.com/100x100/7a747a/fafafa" alt="" class="circle" width="100px">
                                    </div>
                                    <div class="form-container">
                                        <form action="" style="overflow-y: auto;overflow-x: hidden;">
                                          <div class="input-field col s12 l6">
                                            <input type="text" id="first_name" class="validate">
                                            <label for="first_name">Admin Name</label>
                                          </div>
                                          <div class="input-field col s12 l6">
                                            <input type="text" id="last_name" class="validate">
                                            <label for="last_name">Email ID</label>
                                          </div>
                                          
                                          <div class="input-field col s12 l6">
                                            <input type="text" id="last_name" class="validate">
                                            <label for="last_name">Change password</label>
                                          </div>
                                          <div class="input-field col s12 l6">
                                            <input type="text" id="first_name" class="validate">
                                            <label for="first_name">Confirm Password</label>
                                          </div>
                                          <div class="input-field col s12 l6">
                                            <input type="text" id="first_name" class="validate">
                                            <label for="first_name">Mobile Number</label>
                                          </div>
                                          <div class="clearfix"></div>
                                          <p class="col s12 bold">Send Notification</p>
                                          <div class="input-field col s12 l6">
                                            <input type="text" id="last_name" class="validate">
                                            <label for="last_name">Notification</label>
                                          </div>
                                          <div class="input-field col s12 l6">
                                            <input type="text" id="first_name" class="validate">
                                            <label for="first_name">Payment</label>
                                          </div>
                                          <div class="input-field col s12 l6">
                                            <input type="text" id="last_name" class="validate">
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



        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/script.js"></script>
    </body>
</html>