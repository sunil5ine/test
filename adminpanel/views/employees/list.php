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
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
      <style>
         .datepicker { width: auto !important; border: 1px solid #c6c4c4 !important; padding: 7px 5px !important; height: auto !important;margin-right: 15px !important; }
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

                     <div class="row m0">
                        <div class="col s12 m12 l4">
                           <p class="h5-para black-text  mtb-20">Manage Employers</p>
                        </div>
                        <div class="col s12 m12 l8">
                           <div class="row m0">
                              <form id="" action="<?php echo base_url('employees/datefilter') ?>" method="post">
                                 <div class="col s12 m4 l5">
                                    <label for="">Start Date</label><br>
                                    <input type="text" value="<?php echo (!empty($start)?$start:'') ?>" id="startdate" name="start" class="datepicker">
                                 </div>
                                 <div class="col s12 m4 l5">
                                    <label for="">End Date</label><br>
                                    <input type="text" name="end" value="<?php echo (!empty($end)?$end:'') ?>" id="enddate" class="datepicker">
                                 </div>
                                 <div class="col s12 m4 l2"><br>
                                    <button class="btn waves-effect waves-light" type="submit" name="action">Filter</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>


                     <div class="white m0 tab-list-view">
                        <div class="row m0">
                           <div class="col l3 m6 s12">
                              <a href="<?php echo base_url('employees') ?>">
                                 <p class="h5-para3 f-left m0">View Active List</p>
                              </a>
                           </div>
                           <div class="col l3 m6 s12">
                              <a href="<?php echo base_url('employees/pending') ?>">
                                 <p class="h5-para3 r-left m0">View Pending List</p>
                              </a>
                           </div>
                        </div>
                     </div>
                   
                     <div class="main-bar">
                        <!-- shorting -->
                        <div class="shorting-table1">
                           <div class="row">
                              <div class="col l12 m12 s12">
                                 <table id="dynamic" class="striped">
                                    <thead>
                                       <tr class="tt">
                                          <th id="a" class="h5-para-p2">Company Name</th>
                                          <th id="b" class="h5-para-p2">Company Person</th>
                                          <th id="c" class="h5-para-p2">Contact No</th>
                                          <th id="d" class="h5-para-p2">Email ID</th>
                                          <th id="d" class="h5-para-p2">How did you hear</th>
                                          <th id="e" class="h5-para-p2">Reg Date</th>
                                          <th id="f" class="h5-para-p2">Last Update</th>
                                          <th style="width: 65px;" class="h5-para-p2">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($employees as $key => $value) { ?>
                                        <tr>
                                            <td ><?php echo $value->emp_comp_name ?></td>
                                            <td ><?php echo $value->emp_fname." ". $value->emp_lname ?></td>
                                            <td ><?php echo '+'.$value->emp_ccode. ' '. $value->emp_phone ?></td>
                                            <td ><?php echo $value->emp_email ?></td>
                                            <td > <a href="<?php echo base_url('employees/details/').$value->emp_authkey ?>" style="width:100px;display:block" class=""><?php echo $value->why_here ?></a></td>
                                            <td ><span style="display:none"><?php echo date('Ymd', strtotime($value->emp_reg_date)) ?> </span> <?php echo date('d M Y', strtotime($value->emp_reg_date)) ?></td>
                                            <td class=""><?php echo date('d M Y', strtotime($value->emp_update_date)) ?></td>
                                            <td class="action-btn  center-align">
                                              <a href="<?php echo base_url('employees/details/').$value->emp_authkey ?>" class="blue hoverable"><i class="fas fa-eye "></i></i></a>
                                              <a href="<?php echo base_url('delete-employee/').$value->emp_authkey ?>" class="red hoverable delete-btn"><i class="fas fa-trash  "></i></a>
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
       <!-- date picker -->
       <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <!-- data table -->
        <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/datatables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/pdfmake.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/vfs_fonts.js"></script>
        <script>
            $(document).ready( function () {
               $(".datepicker").datepicker();
                $('#dynamic').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf'
                    ], 
                });
                $('select').formSelect();
            } );
        </script>                                

      <script type='text/javascript'>
         $(function () {
             $('.delete-btn').click(function(){
              if(!confirm('Are you sure you want to Delete?')) {
                return false;
                }
             });

             
             
         });
      </script>
   </body>
</html>
