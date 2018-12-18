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
      <link rel="stylesheet" href="<?php echo base_url() ?>dist/dataTable/datatables.min.css">
      <link rel="stylesheet" href="<?php echo base_url() ?>dist/dataTable/button/css/buttons.dataTables.css">
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
                        <div class="col s12 m6 l7">
                           <p class="h5-para black-text  m0">Add Testimonial</p>
                           <h6 class="m0 bold"> <small><i>Hello, Admin. Add testimonial!</i></small> </h6>
                        </div>
                     </div>
                     
                     <div class="main-bar">
                        <!-- shorting -->
                        <div class="">
                           <div class="row">
                             <div class="card">
                                  <div class="card-content">
                                      <form action="<?php echo base_url() ?>testimonial/insert" method="post" enctype='multipart/form-data'>
                                        <div class="input-field col s12 l6">
                                          <input type="text" id="first_name" name="name"  required class="validate">
                                          <label for="first_name">Name <span class="red-text">*</span></label>
                                        </div>
                                        <div class="input-field col s12 l6">
                                          <input type="text" id="last_name" name="des" class="validate" required>
                                          <label for="last_name">Designation <span class="red-text">*</span></label>
                                        </div>
                                        <div class="input-field col s12">
                                            <div class="file-field input-field">
                                                <div class="btn">
                                                    <span>File</span>
                                                    <input type="file" name="pic" accept="image/*">
                                                </div>
                                                <div class="file-path-wrapper">
                                                    <input class="file-path validate" type="text" placeholder="choose pic">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="input-field col s12">
                                          <textarea id="textarea1 " name="content" class="materialize-textarea validate" required></textarea>
                                          <label for="textarea1">Content <span class="red-text">*</span></label>
                                        </div>

                                        <div class="input-field col s12 l6">
                                            <button class="btn waves-effect waves-light " type="submit" name="action">Submit
                                            </button>
                                        </div>
                                      </form>
                                  </div>
                             </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- row -->
            </div>
         </div>
         <!-- container wrap -->
      </section>
      <?php
        echo $this->session->flashdata('messeg'); 
             
      ?>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/script.js"></script>
     
    <!-- Alert confirmation -->
      <script type='text/javascript'>
         $(function () {
            
             $('.close-tost').click(function(){
              $('#snackbar').fadeOut(300);              
             });
             setTimeout(function(){
               $('#snackbar').addClass('show');
             }, 500);
             
         });
      </script>
   </body>
</html>
