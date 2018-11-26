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
                     <p class="h5-para black-text  m0">Manage Employers</p>
                     <h6 class='m0'><small><i><?php echo $detail['job_company'].' - '. $detail['job_title']?></i></small></h6>
                        <div class="manage-job-edit white z-depth-1">
                           <p class="act">
                              <?php  
                                 if($detail['job_status'] == 1){
                                    echo '<i class="fas fa-circle green-text"></i> Active</p>';
                                 }elseif($detail['job_status'] == 0){
                                    echo '<i class="fas fa-circle red-text"></i> Expired</p>';
                                 }
                              ?>
                           
                           <div class="row">
                              <div class="col l8 s12">
                                 <div class="jod-details">
                                 <table>
                                 <tbody>
                                    <tr class="job-list">
                                       <td class="h1-job"><b>Job Tittle</b></td>
                                       <td class="para-job"><?php echo $detail['job_title'] ?></td>                                   
                                    </tr>
                                    <tr class="job-list">
                                       <td class="h1-job"><b>Email ID</b></td>
                                       <td class="para-job"><?php echo $detail['job_notifyemail'] ?></td>                                  
                                    </tr>
                                    <tr class="job-list">
                                       <td class="h1-job"><b>Function Area</b></td>
                                       <td class="para-job"><?php echo $detail['fun_name'] ?></td>   
                                    </tr>
                                    <tr class="job-list">
                                       <td class="h1-job"><b>Job Role</b></td>
                                       <td class="para-job"><?php echo $detail['job_role'] ?></td>
                                    </tr>
                                    <tr class="job-list">
                                       <td class="h1-job"><b>Job Type</b></td>
                                       <td class="para-job"><?php echo $detail['job_type'] ?></td>   
                                    </tr>
                                    <tr class="job-list">
                                       <td class="h1-job"><b>Work Experience Range</b></td>
                                       <td class="para-job"><?php echo $detail['job_min_exp'].' - '. $detail['job_max_exp']?></td>   
                                    </tr>
                                    <tr class="job-list">
                                       <td class="h1-job"><b>Expected Salary (Annually)</b></td>
                                       <td class="para-job"><?php echo '$ ' .$detail['job_min_sal'] .' - '. $detail['job_max_sal']?></td>   
                                    </tr>
                                    <tr class="job-list">
                                       <td class="h1-job"><b>Preffered job location</b></td>
                                       <td class="para-job"><?php echo $detail['job_location'] ?></td>   
                                    </tr>
                                    <tr class="job-list">
                                       <td class="h1-job"><b>Education Qualification</b></td>
                                       <td class="para-job"><?php echo $detail['edu_name'] ?></td>   
                                    </tr>
                                    <tr class="job-list">
                                       <td class="h1-job"><b>Industry</b></td>
                                       <td class="para-job"><?php echo $detail['job_industry'] ?></td>
                                    </tr>
                                    <tr class="job-list">
                                       <td class="h1-job"><b>Skills</b></td>
                                       <td class="para-job"><?php echo $detail['job_skills'] ?></td>                                 
                                    </tr>
                                    <tr class="job-list">
                                       <td class="h1-job"><b>Job Posted</b></td>
                                       <td class="para-job"><?php echo date('Y M d',strtotime($detail['job_created_dt'])) ?></td>                 
                                    </tr>
                                    
                                    <tr>
                                       <th colspan="2">Description</th>
                                    </tr>
                                    <tr class="job-list">
                                       <td colspan="2" class="para-job">
                                          <?php echo $detail['job_desc'] ?>
                                       </td>
                                    </tr>
                                 </tbody>
                                 </table>    
                              </div>
                              <div class="edit-btn-1">
                                 <a class="waves-effect waves-light btn edit-btn green hoverable" href="<?php echo base_url('jobs/edite/').$detail['job_id'] ?>">edit</a>
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

      <script type='text/javascript'>
         $(function () {
             $('.delete-btn').click(function(){
              if(!confirm('Are you sure you want to Delete?')) {
                return false;
                }
             });

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
