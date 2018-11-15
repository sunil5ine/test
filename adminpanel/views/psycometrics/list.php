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
      <!-- first layout -->
      <section class="sec-top">
         <div class="container-wrap">
            <div class="col l12 m12 s12">
               <div class="row">
                     <?php $this->load->view('include/menu'); ?>
                  <div class="col m12 s12 l9">
                     <p class="h5-para black-text  mtb-20">Psychometric Test</p>
                     <div class="main-bar">
                        <!-- shorting -->
                        <div class="shorting-table1 z-depth-1">
                           <div class="row">
                              <div class="col l12 m12 s12">
                                 <table id="table-short" class="responsive-table tab-time">
                                    <thead>
                                       <tr class="tt">
                                          <th id="a" class="h5-para-p2">Candidate Name</th>
                                          <th id="b" class="h5-para-p2">Email ID</th>
                                          <th id="c" class="h5-para-p2">Phone Number</th>
                                          <th id="d" class="h5-para-p2">Test</th>
                                          <th id="e" class="h5-para-p2 center-align">Amount</th>
                                          <th id="f" class="h5-para-p2">Transaction ID</th>
                                          <th id="g" class="h5-para-p2">Date</th>
                                       </tr>
                                       <tr>
                                          <td colspan="2" class="th-padd th-aro"><input id="myInput" type="name" class="validate input-type " placeholder="search.."></td>
                                          <td class="th-aro1"></td>
                                          <td class="th-aro1"></td>
                                          <td class="th-aro1"></td>
                                          <td class="th-aro1"></td>
                                       </tr>
                                    </thead>
                                    <tbody id="my">
                                       <?php foreach ($test as $key => $value) {  ?>
                                          <tr>
                                             <td><?php  echo $value->can_fname.' '.$value->can_lname  ?></td>
                                             <td><?php  echo $value->can_email ?></td>
                                             <td><?php  echo (!empty($value->can_ccode))? '+'.$value->can_ccode.' '.$value->can_phone : $value->can_phone ?></td>
                                             <td><?php  echo $value->psyp_heading ?></td>
                                             <td class="center-align"><?php  echo $value->psyp_amount ?></td>
                                             <td><?php  echo date('dmY', strtotime($value->created_on)).'-'.$value->ct_id ?></td>
                                             <td ><?php  echo date('Y M d', strtotime($value->created_on)) ?></td>
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
