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
      <!-- first layout -->
      <section class="sec-top">
         <div class="container-wrap">
            <div class="col l12 m12 s12">
               <div class="row">
               <?php $this->load->view('include/menu'); ?> 

                  <div class="col m12 s12 l9">
                     <div class="mb10">
                        <h5 class="bold black-text  m0 mb10">Applied list</h5>
                        <?php if(!empty($candidate)){ ?>
                           <p class="m0"><?php echo $candidate['0']->job_title.' - '. $candidate['0']->job_role?></p>
                        <?php } ?>
                        <br>
                     </div>
                     <div class="main-bar">
                        <!-- shorting -->
                        <div class="shorting-table1 z-depth-1">
                           <div class="row">
                              <div class="col l12 m12 s12">
                                 
                                 <table  class="striped" id="dynamic"  width="100%" style="max-width:100%">
                                    <thead>
                                       <tr class="tt">
                                          <th id="a" class="h5-para-p2">Candidate Name</th>
                                          <th id="b" class="h5-para-p2">Email ID</th>
                                          <th id="d" class="h5-para-p2">Designation</th>
                                          <th id="e" class="h5-para-p2 ">Experience</th>
                                          <th  class="h5-para-p2">Nationality</th>
                                          <!-- <th id="g" class="h5-para-p2">PreferredLocation</th> -->
                                          <th class="h5-para-p2">Phone</th>  
                                          <th class="h5-para-p2">Action</th>  

                                       </tr>
                                       
                                    </thead>
                                    <tbody id="my">
                                       <?php foreach ($candidate as $key => $val) { ?>
                                          <tr>
                                             <td  class="td-a"><a href="<?php echo base_url('candidates/detail/').$val->can_id ?>" ><?php echo $val->can_fname. ' '. $val->can_lname ?></a></td>
                                             <td  class="td-a"><a href="mailto:<?php echo $val->can_email ?>"><?php echo $val->can_email ?></a></td>
                                             <td  class="td-a"><?php echo $val->can_curr_desig ?></td>
                                             <td  class="td-a">
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
                                             <td  class="td-a"><?php echo $val->can_curr_loc ?></td>
                                             <td  class="td-a">
                                                <a href="tel:<?php echo (!empty($val->can_ccode))?'+'.$val->can_ccode.$val->can_phone:$val->can_phone ?>"><?php echo (!empty($val->can_ccode))?'+'.$val->can_ccode.' '.$val->can_phone:$val->can_phone ?></a>
                                             </td>
                                             <td class="action-btn  center-align">
                                                <a href="<?php echo base_url('candidates/detail/').$val->can_id ?>" class="blue hoverable tooltipped tooltipped" data-position="top" data-tooltip="View detail"><i class="fas fa-eye "></i></a>
                                                <a href="<?php echo base_url('candidates/download-resume/').$val->can_id ?>" class="green darken-4 hoverable tooltipped tooltipped" data-position="top" data-tooltip="download cv"><i class="fas fa-download"></i></a>
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
                $('#dynamic').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf'
                    ], 
                });
                $('select').formSelect();
                $('.tooltipped').tooltip();
            } );
      </script>
      
   
      
   </body>
</html>
