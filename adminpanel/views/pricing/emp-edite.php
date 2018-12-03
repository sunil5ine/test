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
                           <p class="h5-para black-text  m0">Edit candidate package</p>
                           <h6 class="m0 bold"> <small><i>Hello, Admin. Change candidate package!</i></small> </h6>
                        </div>                        
                     </div>

                     <div class="card">
                        <div class="card-content">
                           <form action="<?php echo base_url('pricing/update-emp-package') ?>" method="post" style="overflow:visible">

                             <div class="row m0">
                                <div class="input-field col s12 l4">
                                  <input type="text" id="first_name" required name='title' value="<?php echo $emp['pr_name'] ?>" class="validate">
                                  <label for="first_name">Title</label>
                                </div>
                                <div class="input-field col s12 l4">
                                  <input type="number" id="last_name" required name="oprice" class="validate" value="<?php echo $emp['pr_orginal'] ?>">
                                  <label for="last_name">Original Price</label>
                                </div>
                                <div class="input-field col s12 l4">
                                  <input type="number" id="number" required name="ofprice" class="validate" value="<?php echo $emp['pr_offer'] ?>">
                                  <label for="number" data-error="wrong" data-success="right">Offer Price</label>
                                </div>
                             </div>

                             

                             <div class="row m0">
                                 <div class="input-field col s12 l4">
                                    <select name="valdity">
                                       <?php for ($i=1; $i < 300; $i++) {  ?>
                                          <option value="<?php echo $i  ?>" <?php echo ($i == $emp['peried'])?'selected':''  ?> ><?php echo $i  ?></option>

                                       <?php   } ?>
                                    </select>
                                    <label>Validity Period  in Days</label>
                                </div>
                                <div class="input-field col s12 l4">
                                    <input type="number" id="number" required name="jobs" class="validate" value="<?php echo $emp['pr_limit'] ?>">
                                    <label for="number" data-error="wrong" data-success="right">Premium Job</label>
                                </div>
                                <div class="input-field col s12 l4">
                                    <input type="number" id="number" required name="vcan" class="validate" value="<?php echo $emp['pr_cvno'] ?>">
                                    <label for="number" data-error="wrong" data-success="right">Verified candidates</label>
                                </div>
                                
                             </div>
                             <?php
                                 $year = $emp['exprence_level'];
                                 $str = preg_replace('/\D/', '', $year);
                                 $split = str_split($str, 1);
                             ?>
                             <div class="row m0">
                                 <div class="input-field col s12 l4">
                                    <select name="expf">
                                       <?php 
                                          for ($i=1; $i < 16; $i++) {  ?>
                                          <option value="<?php echo $i ?>" <?php if($split['0'] == $i){ echo 'selected';} ?>><?php if($i > 1){ echo $i.' Years'; }else{echo $i. ' Year';} ?></option>
                                          <?php    }  ?>
                                    </select>
                                    <label>Experience Level From</label>
                                 </div> 

                                 <div class="input-field col s12 l4">
                                    <select name="expto">
                                       <?php  for ($i=1; $i < 16; $i++) {  ?>
                                             <option value="<?php echo $i ?>" <?php if($split['1'] == $i){ echo 'selected';} ?>><?php if($i > 1){ echo $i.' Years'; }else{echo $i. ' Year';} ?></option>
                                       <?php   } ?>
                                       <option value="16">15+ Years</option>
                                    </select>
                                    <label>Experience Level To</label>
                                </div> 
                                <div class="input-field col s12 l4">
                                    <p style="margin-top: 23px;">
                                       <label>
                                       <input type="checkbox" value="1" name="pr_notify" <?php echo (!empty($emp['pr_notify']))? 'checked' :'' ?>  class="filled-in"  />
                                       <span>Most popular</span>
                                       </label>
                                    </p>
                                </div>

                             </div>
                             <div class="row m0">
                             <input type="hidden" name="eid" value="<?php echo  $emp['pr_encrypt_id'] ?>" id="">
                                <div class="input-field col s12 l4">
                                    <button class="btn hoverable large waves-effect waves-light block green darken-4 " style="width:100%" type="submit" name="action">Update</button>
                                 </div>
                             </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- row -->
            </div>
         </div>
         <!-- container wrap -->
      </section>
      <?php echo $this->session->flashdata('messeg'); ?>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/script.js"></script>
     
        <script>
            $(document).ready( function () {
               $('select').formSelect();
            } );
        </script>                                

   </body>
</html>
