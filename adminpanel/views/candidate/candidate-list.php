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
                     <p class="h5-para black-text  mtb-20">Manage Candidates</p>
                     <div class="main-bar">
                        <!-- shorting -->
                        <div class="shorting-table1 z-depth-1">
                           <div class="row">
                              <div class="col l12 m12 s12">
                                 
                                 <table id="table-short" class="responsive-table " width="100%" style="max-width:100%">
                                    <thead>
                                       <tr class="tt">
                                          <th id="a" class="h5-para-p2">Candidate Name</th>
                                          <th id="b" class="h5-para-p2">Email ID</th>
                                          <th id="c" class="h5-para-p2 ">Gender</th>
                                          <th id="d" class="h5-para-p2">Designation</th>
                                          <th id="e" class="h5-para-p2 ">Experience</th>
                                          <th id="f" class="h5-para-p2">Nationality</th>
                                          <!-- <th id="g" class="h5-para-p2">PreferredLocation</th> -->
                                          <th class="h5-para-p2">Phone</th>  
                                          <th class="h5-para-p2">Action</th>  

                                       </tr>
                                       <tr>
                                          <th class="th-padd th-aro"><input id="myInput" type="name" class="validate input-type " placeholder="search.."></th>
                                          <th class="th-padd th-aro"><input id="myInput1" type="email" class="validate input-type " placeholder="search.."></th>
                                          <th class="th-aro1"></th>
                                          <th class="th-aro1"></th>
                                          <th class="th-aro1"></th>
                                          <th class="th-aro1"></th>
                                          <th class="th-aro1"></th>
                                       </tr>
                                    </thead>
                                    <tbody id="my">
                                       <?php foreach ($candidate as $key => $val) { ?>
                                          <tr>
                                             <td><?php echo $val->can_fname. ' '. $val->can_lname ?></td>
                                             <td><?php echo $val->can_email ?></td>
                                             <td><?php echo $val->can_gender ?></td>
                                             <td><?php echo $val->can_curr_desig ?></td>
                                             <td>
                                                <?php if($val->can_experience == 'Fresher')
                                                {
                                                   echo $val->can_experience;
                                                }elseif($val->can_experience == 01){
                                                   echo $val->can_experience.' Year';   
                                                }else{
                                                   echo $val->can_experience.' Years';
                                                }
                                             ?>
                                                
                                             </td>
                                             <td><?php echo $val->can_curr_loc ?></td>
                                             <td>
                                                <?php echo (!empty($val->can_ccode))?'+'.$val->can_ccode.' '.$val->can_phone:$val->can_phone ?>
                                             </td>
                                             <td class="action-btn  center-align">
                                             <a href="<?php echo base_url('candidates/detail/').$val->can_id ?>" class="blue hoverable tooltipped" ><i class="fas fa-eye "></i></a>
                                             </td>
                                          </tr>
                                       <?php } ?>
                                    </tbody>
                                 </table>
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
      <!-- end layout -->
      
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/script.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/short.js"></script>
   
      <script type='text/javascript'>
         $(function () {
            
             $("table").sortpaginate();
         });
      </script>
      <script>
         $(document).ready(function(){
           $("#myInput").on("keyup", function() {
             var value = $(this).val().toLowerCase();
             $("#my tr").filter(function() {
               $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
           });
           $("#myInput1").on("keyup", function() {
             var value = $(this).val().toLowerCase();
             $("#my tr").filter(function() {
               $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
             });
           });
         });
      </script>
   </body>
</html>
