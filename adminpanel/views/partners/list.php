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
                           <p class="h5-para black-text  m0">Partners Enquiry</p>
                           <h6 class="m0 bold"> <small><i>Hello, Admin. Check out Partners Enquiry</i></small> </h6>
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
                                          <th class="h5-para-p2">SL NO</th>
                                          <th class="h5-para-p2">Name</th>
                                          <th class="h5-para-p2">Organization Name</th>
                                          <th class="h5-para-p2">Organization Type</th>
                                          <th class="h5-para-p2">Email</th>
                                          <th class="h5-para-p2">Phone</th>
                                          <th class="h5-para-p2">Staff Count</th>
                                          <th class="h5-para-p2">Query</th>
                                       </tr>
                                    </thead>
                                    <tbody>
                                        <?php $count=0; foreach ($lists as $key => $value) { ?> 
                                            <tr>
                                                <td><?php echo $count += 1; ?></td>
                                                <td><?php echo $value->pt_fname. ' '.$value->pt_lname ?></td>
                                                <td><?php echo $value->pt_orgname ?></td>
                                                <td><?php echo $value->pt_orgType ?></td>
                                                <td><?php echo $value->pt_email ?></td>
                                                <td><?php echo $value->pt_phone ?></td>
                                                <td><?php echo $value->pt_staffCount ?></td>
                                                <td><?php echo $value->pt_des ?></td>
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
      <!-- data table -->
      <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/datatables.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/buttons.flash.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/pdfmake.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/vfs_fonts.js"></script>
    <!-- Pdf download -->
        <script>
            $(document).ready( function () {
                $('#dynamic').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf'
                    ], 
                });
                $('select').formSelect();
            } );
        </script>                                
<!-- delete confirmation -->
      <script type='text/javascript'>
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
