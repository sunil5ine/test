<?php 
$this->ci =& get_instance();
$this->load->model('employeesModel');
if(!empty($employers['sub_packid'])){
    $sub_detail = $this->ci->employeesModel->getSubcriptionDetail($employers['sub_packid']);
}else{
    $sub_detail = 'Free';
}
?>
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
                                <p class="h5-para black-text  m0">Company Details</p>
                                <small><i>Hello, Admin. Check out what's happening!</i></small>
                            </div><!-- end row1 -->
                            <div class="row">
                                <div class="col s12">
                                    <div class="card">
                                        <div class="card-content">
                                            <div class="row m0">
                                                <div class="col s12 m4 border-right">
                                                    <?php if(!empty($employers['ep_logo'])) { ?>
                                                        <img src="<?php echo $this->config->item('empurl').'/'.$employers['ep_logo'] ?>" alt="" class="circle responsive-img left mr10" width="120px" />                                                        
                                                     <?php    }else{ ?>
                                                        <img src="<?php echo $this->config->item('web_url') ?>/assets/img/logo.png" alt="" class="circle responsive-img left mr10" width="120px" />
                                                    <?php } ?>
                                                    <div class="ptb10">
                                                        <h6 class="bold"><?php echo $employers['emp_comp_name'] ?></a></h6>
                                                        <h6><small><a href="<?php echo $employers['emp_website'] ?>" target="_blank"><?php echo $employers['emp_website'] ?></a></small></h6>
                                                        <h6><small><a href="tel:<?php echo '+'.$employers['emp_ccode'].$employers['emp_phone'] ?>"><?php echo '+'.$employers['emp_ccode'].' '.$employers['emp_phone'] ?></a></small></h6>
                                                    </div>
                                                </div>

                                                <div class="col s12 m8">
                                                    <div class="row m0">
                                                        <div class="col s12 m4">
                                                           <h5 class="green-text darken-3"><?php echo (!empty($employers['sub_nocv'])) ? $employers['sub_nocv']  : '0' ?></h5> 
                                                           <p>Number of CV Pending</p>
                                                        </div>
                                                        <div class="col s12 m4">
                                                        <h5 class="green-text darken-4"><?php echo (!empty($employers['sub_pending_cv'])) ? $employers['sub_pending_cv']  : '0' ?></h5> 
                                                           <p>Number of CV Uploaded</p>
                                                        </div>
                                                        <div class="col s12 m4">
                                                        <h5 class="green-text darken-4"><?php echo  $sub_detail; ?></h5> 
                                                           <p>Package Type <a href="" class="blue-text">[Upgrade]</a></p>
                                                        </div>

                                                        <div class="col s12 center mt15">
                                                            <a href="#" class="waves-effect waves-light btn green darken-4 plr40">Upload Resume</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end row2 -->

                            <div class="row m0 boder-bottom">
                                <div class="col l4 m4 s12 pl0">
                                    <a href="<?php echo base_url('employees/details/').$this->uri->segment(3) ?>">
                                        <p class="black-text f-left m0">Company Details</p>
                                    </a>
                                </div>
                                <div class="col l4 m4 s12">
                                    <a href="<?php echo base_url('employees/posted-jobs/').$this->uri->segment(3) ?>">
                                        <p class="black-text r-left m0">Posted Jobs</p>
                                    </a>
                                </div>
                                <div class="col l4 m4 s12">
                                    <a href="<?php echo base_url('employees/uploaded-resumes/').$this->uri->segment(3) ?>">
                                        <p class="black-text r-left m0">Uploaded Resumes</p>
                                    </a>
                                </div>
                            </div><!-- end row3 -->

                            <div class="row">
                                <div class="card">
                                    <div class="card-content">
                                       <h6 class="bold">Comany Details</h6>
                                       <br>
                                       <table class="no-border">
                                           <tr>
                                               <th><i class="fas fa-building left mr10"></i> Company Name</th>
                                               <td><?php echo $employers['emp_comp_name'] ?></td>
                                           </tr>
                                           <tr>
                                               <th><i class="far fa-user left mr10"></i> Contact Person</th>
                                               <td><?php echo $employers['emp_fname'].' '.$employers['emp_lname'] ?></td>
                                           </tr>
                                           <tr>
                                               <th><i class="fas fa-mobile-alt left mr10"></i> Contact Number</th>
                                               <td><a href="tel:<?php echo '+'.$employers['emp_ccode'].$employers['emp_ccode'] ?>" ><?php echo '+'.$employers['emp_ccode'].' '.$employers['emp_ccode'] ?></a></td>
                                           </tr>
                                           <tr>
                                               <th><i class="fas fa-envelope left mr10"></i> Email</th>
                                               <td><a href="mailto:<?php echo $employers['emp_email'] ?>"> <?php echo $employers['emp_email'] ?> </a></td>
                                            </tr>
                                            <tr>
                                               <th><i class="fas fa-map-marker-alt left mr10"></i> Address</th>
                                               <td><?php echo $employers['emp_location'] ?></td>
                                           </tr>
                                       </table>

                                       <div>
                                           <form action="" class="overflow-h mt20">
                                             <div class="borderd col s11 l4">
                                                <div class="truncate">
                                                    <i class="fab fa-facebook-square left mr10"></i>
                                                    <p><a href="<?php echo $employers['esm_fb'] ?>" target="_blank"><?php echo $employers['esm_fb'] ?></a></p>  
                                                </div>                                             
                                             </div>
                                             <div class="borderd col s11 l4">
                                                <div class="truncate">
                                                    <i class="fab fa-twitter left mr10"></i>
                                                    <p><a href="<?php echo $employers['esm_fb'] ?>" target="_blank"><?php echo $employers['esm_fb'] ?></a></p>
                                                </div>
                                             </div>
                                             <div class="clearfix"></div>
                                             <div class="borderd col s11 l4">
                                                <div class="truncate">
                                                    <i class="fab fa-google-plus-g left mr10"></i>
                                                    <p><a href="<?php echo $employers['esm_fb'] ?>" target="_blank"><?php echo $employers['esm_fb'] ?></a></p>
                                                </div>
                                             </div>
                                             <div class="borderd col s11 l4">
                                                <div class="truncate">
                                                    <i class="fab fa-linkedin-in left mr10"></i>
                                                    <p><a href="<?php echo $employers['esm_fb'] ?>" target="_blank"><?php echo $employers['esm_fb'] ?></a></p>
                                                </div>
                                             </div>
                                           </form>
                                       </div>
                                    </div>
                                </div>
                            </div><!-- end row4 -->

                        </div><!-- end right side content -->
                    </div>
                </div>
            </div>
        </section>


        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>dist/js/script.js"></script>
    </body>
</html>

