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
      <!-- first layout -->
      <section class="sec-top">
         <div class="container-wrap">
            <div class="col l12 m12 s12">
               <div class="row">
               <?php $this->load->view('include/menu'); ?> 

                  <div class="col m12 s12 l9">
                     <div class="row m0">
                        <div class="col s12 m12 l4">
                           <p class="h5-para black-text  mtb-20">Manage Candidates</p>
                        </div>
                        <div class="col s12 m12 l8">
                           <div class="row m0">
                              <form id="" action="<?php echo base_url('candidates/datefilter') ?>" method="post">
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
          
                     <div class="card">
                        <!-- shorting -->
                        <div class="z-depth-1 card-content">
                           <div class="row">
                              <div class="col l12 m12 s12">
                                 
                                 <table  class="striped" id="dynamic"  >
                                    <thead>
                                       <tr>
                                          <th  class="h5-para-p2">Id</th>
                                          <th  class="h5-para-p2">Candidate Name</th>
                                          <th class="h5-para-p2">Email ID</th>
                                          <th  class="h5-para-p2">Nationality</th>
                                          <th  class="h5-para-p2">Designation</th>
                                          <th class="h5-para-p2 ">Experience</th>
                                          <th  class="h5-para-p2">Current Location</th>
                                          <th  class="h5-para-p2">Verified</th>
                                          <th  class="h5-para-p2">Test marks</th>
                                          <th id="g" class="h5-para-p2">Register Date</th>
                                          <th class="h5-para-p2">Phone</th>  
                                          <th class="h5-para-p2">Action</th>  

                                       </tr>
                                       
                                    </thead>
                                    <tbody id="my">
                                       <?php 
                                       
                                       foreach ($candidate as $key => $val) { ?>
                                          <tr>
                                             <td class="td-a"><a href="<?php echo base_url('candidates/detail/').$val->can_id ?>"><?php echo $val->can_id ?></a></td>
                                             <td class="td-a"><a href="<?php echo base_url('candidates/detail/').$val->can_id ?>"><?php echo $val->can_fname. ' '. $val->can_lname ?></a></td>
                                             <td class="td-a"><a href="mailto:<?php echo $val->can_email ?>"><?php echo $val->can_email ?></a></td>
                                             <td class="td-a"><a href="<?php echo base_url('candidates/detail/').$val->can_id ?>"><?php echo $val->co_nationality ?></a></td>
                                             <td class="td-a"><a href="<?php echo base_url('candidates/detail/').$val->can_id ?>"><?php echo (!empty($val->can_curr_desig)) ? $val->can_curr_desig : 'Not mention' ?></a></td>
                                             <td class="td-a">
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
                                             <td class="td-a"><a href="<?php echo base_url('candidates/detail/').$val->can_id ?>"><?php echo $val->can_curr_loc ?></a></td>
                                             <td class="center">
                                                <a href="<?php echo base_url('candidates/detail/').$val->can_id ?>">
                                                   <?php if($val->tr_marks >= 35){ $cls = 'green-text';$nums=1;}else{$cls = 'red-text';$nums=2;} ?>
                                                   <i class="fas fa-circle <?php echo $cls ?>"><span style="font-size: 0.1px; opacity: 0;"><?php echo $nums ?></span></i>
                                                </a>
                                             </td>
                                             <td><a href="<?php echo base_url('candidates/detail/').$val->can_id ?>"><?php echo (!empty($val->tr_marks))?$val->tr_marks : 'Not attend' ?></a></td>
                                             <td class="td-a"><a href="<?php echo base_url('candidates/detail/').$val->can_id ?>"><?php echo date('d-m-Y',strtotime($val->can_reg_date)) ?></a></td>
                                             <td class="td-a"><a href="tel:<?php echo (!empty($val->can_ccode))?'+'.$val->can_ccode.' '.$val->can_phone:$val->can_phone ?>" >
                                                <?php echo (!empty($val->can_ccode))?'+'.$val->can_ccode.' '.$val->can_phone:$val->can_phone ?>
                                             </a></td>
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
      <?php echo $this->session->flashdata('messeg'); ?>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
      <!-- date picker -->
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/script.js"></script>
         <!-- data table -->
      <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/datatables.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/buttons.flash.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/buttons.html5.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/pdfmake.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/dataTable/button/js/vfs_fonts.js"></script>
      
      <script>
            $(document).ready( function () {
               
               var tbles = $('#dynamic').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf'
                    ], 
                });
                $('select').formSelect();
                $(".datepicker").datepicker();

               //  date filter
               // $('#datefilter').submit(function(e) { 
               //    e.preventDefault();
               //    var star = $('#startdate').val();
               //    var end  = $('#enddate').val();
               //    $.ajax({
               //       type: "get",
               //       url: "<?php echo base_url() ?>candidates/datefilter",
               //       data: {start: star, end: end},
               //       dataType: 'html',
               //       success: function (response) {
               //         $('#my').html(response);
               //         tbles.ajax.reload();
               //       }
               //    });
                  
               // });
               
            } );
      </script>
      
   
      
   </body>
</html>
