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
                     <p class="h5-para black-text  mtb-20">Manage Employers</p>
                     <div class="white m0 tab-list-view">
                        <div class="row m0">
                           <div class="col l3 m6 s12">
                              <a href="<?php echo base_url('employees') ?>">
                                 <p class="h5-para3 r-left m0">View Active List</p>
                              </a>
                           </div>
                           <div class="col l3 m6 s12">
                              <a href="<?php echo base_url('employees/pending') ?>">
                                 <p class="h5-para3 f-left m0">View Pending List</p>
                              </a>
                           </div>
                        </div>
                     </div>
                    
                     <div class="main-bar">
                        <!-- shorting -->
                        <div class="shorting-table1">
                           <div class="row">
                              <div class="col l12 m12 s12">
                                 <table id="table-short" class="responsive-table tab-time">
                                    <thead>
                                       <tr class="tt">
                                          <th id="a" class="h5-para-p2">Company Name</th>
                                          <th id="b" class="h5-para-p2">Company Person</th>
                                          <th id="c" class="h5-para-p2">Contact No</th>
                                          <th id="d" class="h5-para-p2">Email ID</th>
                                          <th id="e" class="h5-para-p2">Reg Date</th>
                                          <th id="g" class="h5-para-p2">Action</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($pendingemp as $key => $value) { ?>
                                        <tr>
                                            <td ><?php echo $value->emp_comp_name ?></td>
                                            <td ><?php echo $value->emp_fname." ". $value->emp_lname ?></td>
                                            <td ><?php echo '+'.$value->emp_ccode. ' '. $value->emp_phone ?></td>
                                            <td ><?php echo $value->emp_email ?></td>
                                            <td ><?php echo date('d M Y', strtotime($value->emp_reg_date)) ?></td>
                                            <td class="action-btn  center-align">
                                              <a href="<?php echo base_url('employees/approve/30').$value->emp_authkey ?>" class="waves-effect waves-light green tooltipped" data-position="left" data-tooltip="Approve Employer"><i class="fas fa-user-check"></i></a>
                                              <a href="<?php echo base_url('employees/reject/').$value->emp_authkey ?>" class="waves-effect waves-light red tooltipped reject" data-position="top" data-tooltip="Reject Employer"><i class="fas fa-user-times"></i></a>
                                              <a href="<?php echo base_url('employees/details/').$value->emp_authkey ?>" class="blue  tooltipped" data-position="bottom" data-tooltip="View employer Details"><i class="fas fa-eye "></i></i></a>
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
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/short.js"></script>
      <script type='text/javascript'>
         $(function () {
             $("table").sortpaginate();
             $('.tooltipped').tooltip();
             $('.reject').click(function(){
              if(!confirm('Are you sure you want to Reject the employee?')) {
                return false;
                }
             });

             
         });
      </script>
   </body>
</html>
