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
      <link rel="stylesheet" href="<?php echo $this->config->item('web_url');?>assets/css/jquery.tagsinput-revisited.css">
      <style>
         #skillstags_tag{padding:0px !important}
      </style>
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
                           <p class="h5-para black-text  m0">Search Candidate</p>
                           <h6 class="m0 bold"> <small><i>Hello, Admin. Search candidates!</i></small> </h6>
                        </div>
                        <div class="col s12 m6 l5 ">
                           
                        </div>
                     </div>
                     
                     <div class="row">
                        <div class="card">
                           <div class="card-content">
                              <form   style="overflow:visible" action="<?php echo base_url() ?>search/result" method="post">
                                <div class="row">
                                   <div class="input-field col s12 l6">
                                     <input type="text" id="" name="desgnation" class="validate">
                                     <label for="">Current Designation</label>
                                   </div>
                                   <div class="input-field col s12 l6">
                                    <select name="education">
                                       <option value="" >Educational Qualification</option>
                                       <option value="3" >Schooling</option>
                                       <option value="2" >Pre University</option>
                                       <option value="1" >Certification Course</option>
                                       <option value="4" >Graduate</option>
                                       <option value="5" >Post Graduate</option>
                                       <option value="6" >Doctorate</option>
                                    </select>
                                     <label for="last_name">Education</label>
                                   </div>
                                

                                <div class="input-field col s12 l6">
                                    <select name="ind">
                                    <option value="" disabled selected>Select Industry</option>
                                    <?php foreach ($ind as $row) {
                                       echo '<option value="'.$row->ind_id.'" >'.$row->ind_name.'</option>';
                                    } ?>
                                    </select>
                                    <label for="first_name">Industry Type</label>
                                </div>
                                <div class="input-field col s12 l6">
                                  <select name="gender">
                                       <option value="" disabled selected>Select Gender</option>
                                       <option value="Male">Male</option>
                                       <option value="Female">Female</option>
                                  </select>
                                  <label for="last_name">Gender</label>
                                </div>
                                <div class="input-field col s12 l6">
                                    <select name="nation">
                                          <option value="" disabled selected>Select Nationality</option>
                                          <?php foreach ($nat as $nats) {
                                            echo '<option value="'.$nats->co_id.'">'.$nats->co_nationality.'</option>';
                                          } ?>
                                    </select>      
                                    <label for="first_name">Nationality</label>
                                </div>
                                <div class="input-field col s12 l6">
                                    <select name="loacation">
                                          <option value="" disabled selected>Select Current Location</option>
                                          <?php foreach ($nat as $nats) {
                                            echo '<option value="'.$nats->co_name.'">'.$nats->co_name.'</option>';
                                          } ?>
                                    </select>
                                  <label for="last_name">Current Location</label>
                                </div>
                                <div class="input-field col s16 l3">
                                    <select name="expf">
                                       <option value="" disabled selected>Select experience from</option>
                                       <?php 
                                          for ($i=1; $i < 16; $i++) {  ?>
                                          <option value="<?php echo $i ?>" ><?php if($i > 1){ echo $i.' Years'; }else{echo $i. ' Year';} ?></option>
                                       <?php    }  ?>
                                    </select>
                                  <label for="first_name">Experience From</label>
                                </div>
                                <div class="input-field col s16 l3">
                                    <select name="expto">
                                    <option value="" disabled selected>Select experience to</option>
                                       <?php  for ($i=1; $i < 16; $i++) {  ?>
                                             <option value="<?php echo $i ?>" ><?php if($i > 1){ echo $i.' Years'; }else{echo $i. ' Year';} ?></option>
                                       <?php   } ?>
                                       <option value="16">15+ Years</option>
                                    </select>
                                  <label for="first_name">Experience To</label>
                                </div>

                                 <div class="input-field col s12 l6">
                                  <input type="text" id="skillstags" name="skills" class="validate" >
                                </div>

                                 <div class="clearfix"></div>         
                                
                                <div class="input-field col s12 l6">
                                    <button class="btn waves-effect green darken-4 block white-text hoverable waves-light" type="submit" name="action">
                                       <i class="fas fa-search li-icon mr10"></i> Search
                                    </button>
                                </div>
                              </div>         
                              </form>
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
      <script src="<?php echo $this->config->item('web_url');?>assets/js/tagsinput.min.js"></script>
      <!-- data table -->
      <script> $(document).ready( function () { $('#skillstags').tagsInput(); $('select').formSelect(); $('.close-tost').click(function(){ $('#snackbar').fadeOut(300); }); setTimeout(function(){ $('#snackbar').addClass('show'); }, 500); } ); </script>                                
   </body>
</html>
