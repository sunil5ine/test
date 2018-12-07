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
                           <form action="<?php echo base_url('price/update_package') ?>" method="post">

                             <div class="row m0">
                                <div class="input-field col s12 l4">
                                  <input type="text" id="first_name" required name='title' value="<?php echo $canPrice['pr_name'] ?>" class="validate">
                                  <label for="first_name">Title</label>
                                </div>
                                <div class="input-field col s12 l4">
                                  <input type="number" id="last_name" required name="oprice" class="validate" value="<?php echo $canPrice['pr_orginal'] ?>">
                                  <label for="last_name">Original Price</label>
                                </div>
                                <div class="input-field col s12 l4">
                                  <input type="number" id="number" required name="ofprice" class="validate" value="<?php echo $canPrice['pr_offer'] ?>">
                                  <label for="number" data-error="wrong" data-success="right">Offer Price</label>
                                </div>
                             </div>

                             

                             <div class="row m0">
                                 <div class="input-field col s12 l4">
                                    <p>
                                       <label>
                                       <input type="checkbox" value="1" name="pr_enrichment" <?php echo($canPrice['pr_enrichment'] == 1) ?'checked':'' ?> class="filled-in"  />
                                       <span>Profile Enrichment</span>
                                       </label>
                                    </p>
                                 </div>
                                 <div class="input-field col s12 l4">
                                    <p>
                                       <label>
                                       <input type="checkbox" value="1" name="pr_job_aler" <?php echo($canPrice['pr_job_aler'] == 1) ?'checked':'' ?> class="filled-in"  />
                                       <span>Personalised Job Alerts</span>
                                       </label>
                                    </p>
                                 </div>
                                 <div class="input-field col s12 l4">
                                    <p>
                                       <label>
                                       <input type="checkbox" value="1" name="prved" <?php echo($canPrice['pr_view_employer_detail'] == 1) ?'checked':'' ?> class="filled-in"  />
                                       <span>View Employer Details</span>
                                       </label>
                                    </p>
                                 </div>
                             </div>

                             

                             <div class="row m0">
                                 <div class="input-field col s12 l4">
                                    <p>
                                       <label>
                                       <input type="checkbox" value="1" name="pr_prfle_viewrs" <?php echo($canPrice['pr_prfle_viewrs'] == 1) ?'checked':'' ?> class="filled-in"  />
                                       <span>Who Viewd Your Profile</span>
                                       </label>
                                    </p>
                                 </div>
                                 <div class="input-field col s12 l4">
                                    <p>
                                       <label>
                                       <input type="checkbox" value="1" name="pr_boost" <?php echo($canPrice['pr_boost'] == 1) ?'checked':'' ?> class="filled-in"  />
                                       <span>More Profile Views</span>
                                       </label>
                                    </p>
                                 </div>
                                 <div class="input-field col s12 l4">
                                    <p>
                                       <label>
                                       <input type="checkbox" value="1" name="pr_as_jobsearch" <?php echo($canPrice['pr_as_jobsearch'] == 1) ?'checked':'' ?> class="filled-in"  />
                                       <span>Assisted Job Search</span>
                                       </label>
                                    </p>
                                 </div>
                             </div>

                             <div class="row m0">
                                 <div class="input-field col s12 l4">
                                    <p>
                                       <label>
                                       <input type="checkbox" value="1" name="pr_resume_view" <?php echo($canPrice['pr_resume_view'] == 1) ?'checked':'' ?> class="filled-in"  />
                                       <span>Resume Review</span>
                                       </label>
                                    </p>
                                 </div>
                                 <div class="input-field col s12 l4">
                                    <p>
                                       <label>
                                      
                                       <input type="checkbox" value="1" name="pr_psy_test" <?php echo($canPrice['pr_psy_test'] == 1) ?'checked':'' ?> class="filled-in"  />
                                       <span>Psychometric Test</span>
                                       </label>
                                    </p>
                                 </div>
                                 <div class="input-field col s12 l4">
                                    <p>
                                       <label>
                                       <input type="checkbox" value="1" name="pr_gend_test" <?php echo($canPrice['pr_gend_test'] == 1) ?'checked':'' ?> class="filled-in"  />
                                       <span>General Aptitude Test</span>
                                       </label>
                                    </p>
                                 </div>
                             </div>
                             <div class="row m0">
                                 <div class="input-field col s12 l4">
                                    <p>
                                       <label>
                                       
                                       <input type="checkbox" value="1" name="pr_video" <?php echo (!empty($canPrice['pr_video_interview']))? 'checked' :'' ?>  class="filled-in"  />
                                       <span>Video Interview</span>
                                       </label>
                                    </p>
                                 </div>
                                 <div class="input-field col s12 l4">
                                    <p>
                                       <label>
                                       
                                       <input type="checkbox" value="1" name="pr_notify" <?php echo (!empty($canPrice['pr_notify']))? 'checked' :'' ?>  class="filled-in"  />
                                       <span>Most popular</span>
                                       </label>
                                    </p>
                                 </div>
                             </div>

                             <div class="row m0">
                                 
                                 <div class="input-field col s12 l4">
                                  <input type="number" name="pr_limit" id="first_name" value="<?php echo $canPrice['pr_limit'] ?>" required  name='' class="validate">
                                  <label for="first_name">Package valdity in month</label>
                                </div>
                                <div class="input-field col s12 l4">
                                  <input type="number" name="pr_nojob" id="last_name" name="oprice" value="<?php echo $canPrice['pr_nojob'] ?>" required class="validate">
                                  <label for="last_name">Job Applications</label>
                                  <input type="hidden" name="pid" value="<?php echo $canPrice['pr_encrypt_id'] ?>">
                                </div>
                             </div>

                             <div class="row m0">
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
