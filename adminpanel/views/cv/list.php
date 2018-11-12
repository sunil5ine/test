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
                     <p class="h5-para black-text  mtb-20">CV Writing</p>
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
                                          <th id="c" class="h5-para-p2 center-align">Order No</th>
                                          <th id="d" class="h5-para-p2">Phone Number</th>
                                          <th width="65px" id="e" class="h5-para-p2 center-align">Express<br>Delivery</th>
                                          <th width="65px" id="f" class="h5-para-p2 center-align">Cover</th>
                                          <th width="65px" id="g" class="h5-para-p2 center-align">Amount</th>
                                          <th id="h" class="h5-para-p2">Date</th>
                                       </tr>
                                       <tr>
                                          <th class="th-padd th-aro"><input id="myInput" type="name" class="validate input-type " placeholder="search.."></th>
                                          <th class="th-padd th-aro"><input id="myInput1" type="email" class="validate input-type " placeholder="search.."></th>
                                          <th class="th-aro1"></th>
                                          <th class="th-aro1"></th>
                                          <th class="th-aro1"></th>
                                          <th class="th-aro1"></th>
                                          <th class="th-aro1"></th>
                                          <th class="th-aro1"></th>
                                       </tr>
                                    </thead>

                                    <tbody id="my">
                                      <?php foreach ($cv as $key => $value) { 
                                        $cover   = ($value->cvw_cover == 1)? "10":0 ;
                                        $express = ($value->cvw_express == 1)? "10":0 ;
                                        $amount = $cover + $express + $value->cvw_amt;
                                        if(!empty($value->trans_id)) {
                                      ?>
                                        <tr>
                                          <td><?php echo $value->can_fname .' '. $value->can_lname?></td>
                                          <td><?php echo $value->can_email ?></td>
                                          <td><?php echo $value->trans_id ?></td>
                                          <td><?php echo '+'.$value->can_ccode.' '.$value->can_phone ?></td>
                                          <td class="center"><?php echo ($value->cvw_express == 1)?'<i class="fas fa-check green-text"></i>' :'<i class="fas fa-times red-text"></i>' ?></td>
                                          <td class="center"><?php echo ($value->cvw_cover == 1)?'<i class="fas fa-check green-text"></i>' :'<i class="fas fa-times red-text"></i>' ?></td>
                                          <td class="center"><?php echo $amount ?></td>
                                          <td><?php echo date('d M Y',strtotime($value->cvw_date)) ?></td>
                                        </tr>
                                      <?php }  } ?>
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
     
      <!-- end footer -->
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
