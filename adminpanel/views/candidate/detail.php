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
      <style>
        @media (min-width:600px){
            .mymodel{width:400px}
        }
      </style>
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
                    <div class="col m12 s12 l9 pofile-details-table-card">
                        <div class="row">
                            <div class="col s6 m6">
                                <p class="h5-para black-text m0 ">Candidates Details</p>
                                <small><i>Hello, Admin! Check out what's Happening!</i></small>
                            </div>
                            <div class="col s6 m6 ">
                                <?php  
                                if(!empty($verify)) { echo'<i class="fas fa-circle green-text right"></i>' ;}else{
                                    echo '<a class="btn right waves-effect  modal-trigger waves-light green darken-4" href="#modal1">Verify</a>';
                                }
                                ?>
                            </div>
                        </div>
                                
                        <!-- Modal Structure -->
                        <div id="modal1" class="modal mymodel">
                          <div class="modal-content">
                            <h5>Verify the candidate</h5>
                            <form action="<?php echo base_url('candidates/makeverify') ?>" method="post">
                              <div class="input-field col s12 l12">
                                <input type="number" id="first_name" name="mark" class="validate">
                                <label for="first_name">Mark in percentage</label>
                                <input type="hidden" name="id" value="<?php echo $profile['can_id'] ?>">
                              </div>
                              <div class="input-field col s12 l12">
                                <button class="btn block waves-effect waves-light" type="submit" name="action">Submit
                                    
                                </button>
                              </div>
                              
                            </form>
                          </div>
                          
                        </div>
                    
                        <div class="row">
                            <div class="card">
                                <div class="card-content">
                                    <div class="row m0">
                                        <div class="col s12 m5">
                                            <div class="row m0 border-r">
                                                <div class="col s12 l4 m4 p0"> 
                                                    <center> 
                                                        <?php
                                                            if(substr(trim($profile['can_propic']),0,5) == 'https' || substr(trim($profile['can_propic']),0,4) == 'http'){
                                                                echo ' <img src="'.$profile['can_propic'].'" class="responsive-img responsive-img circle" style="margin-top: 17px;" width="100%">' ;
                                                            }
                                                            elseif(!empty($profile['can_propic'])){
                                                               echo ' <img src="'.$this->config->item('canurl').'/'.$profile['can_propic'].'" class="responsive-img responsive-img circle" style="margin-top: 17px;" width="100%">' ;        
                                                            }else{
                                                                echo ' <img src="'.$this->config->item('canurl').'assets/img/logo.png" class="responsive-img responsive-img circle" style="margin-top: 17px;" width="100%">';
                                                            }
                                                        ?>
                                                        
                                                    </center> 
                                                </div> 
                                                <div class="col s12 l8 m8 "> 
                                                    <div class="ptb15 pr-container"> 
                                                        <p class="bold"><?php echo $profile['can_curr_desig'] ?></p> 
                                                        <p class="smal"><?php echo $fun['fun_name'] ?></p>
                                                        <p class="smal"> <a href="mailto:"><?php echo $profile['can_email'] ?></a></p>
                                                        <p class="smal"><a href="tel:"><?php echo (!empty($profile['can_ccode']))?'+'.$profile['can_ccode'].' '.$profile['can_phone'] : $profile['can_phone']?></a></p>
                                                    </div> 
                                                    <ul class="social-share-box-myjob pt10 m0 ">
                                                        <?php
                                                           if(!empty($social['sm_fb']))
                                                           {
                                                                echo '<li><a href=""><i class="fab fa-facebook-f"></i></a></li>';
                                                           }
                                                           if(!empty($social['sm_tw'])){
                                                                echo '<li><a href=""><i class="fab fa-twitter"></i></a></li>';
                                                           }
                                                           if(!empty($social['sm_gp'])){
                                                                echo '<li><a href=""><i class="fab fa-behance"></i></a></li>';
                                                           } 
                                                           if(!empty($social['sm_linkdin'])){
                                                                echo '<li><a href=""><i class="fab fa-instagram"></i></a></li>';
                                                           } 

                                                        ?>  
                                                    </ul>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="col s12 m3">
                                            <div class="resume-box center ptb15">
                                               <p class="mb10 bold">View Resume</p>     
                                               <p class="mb15 bold"><?php echo $cv['cv_headline'] ?></p>  
                                               <a  href="<?php echo base_url('candidates/download-resume/').$profile['can_id'] ?>" class="btn waves-effect waves-light green darken-4">View Resume</a>   
                                            </div>
                                        </div>
                                        <div class="col s12 m3">
                                            <div class="resume-box center ptb15">
                                               <p class="mb10 bold">Active Package</p>     
                                               <h5 class=" m0  darken-4">
                                                    <span class="red-text <?php echo ($package == 'Expired')? 'red-text' : 'green-text' ?>"><?php echo $package ?></span> 
                                               </h5>
                                               <p>Package <a class="blue-text modal-trigger" href="#packagemodal">[Upgrade]</a></p>
                                                  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-buttons show-on-large hide-on-med-and-down">
                            <ul class="tabs1 transparent">
                                <li class="tab1 col s3"><a href="#personal-detail" class="active">Personal Details</a></li>
                                <li class="tab1 col s3"><a href="#profile" class="">Profile</a></li>
                                <li class="tab1 col s3"><a href="#experience" class="">Work Experience</a></li>
                                <li class="tab1 col s3"><a href="#education" class="">Educational Qualification</a></li>
                            </ul>
                        </div>

                        <div class="card scrollspy" id="personal-detail">
                            <div class="card-content">
                                <p class="bold mb10 h6">Personal Details</p>
                                <table>
                                    <tbody><tr>
                                        <th class="w205"><i class="far fa-user mr10"></i> Name</th>
                                        <td><?php echo $profile['can_fname'].' '. $profile['can_lname'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205"><i class="fas fa-transgender mr10"></i> Gender</th>
                                        <td><?php echo $profile['can_gender'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205"><i class="far fa-calendar-alt mr10"></i> Date of Birth</th>
                                        <td><?php echo $profile['can_dob'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205"><i class="far fa-envelope mr10"></i> Email ID</th>
                                        <td><?php echo $profile['can_email'] ?></td>
                                    </tr>
                                    <tr>
                                        <th class="w205"><i class="fas fa-globe-americas mr10"></i>Nationality</th>
                                        <td><?php echo $profile['can_curr_loc'] ?></td>
                                    </tr>
                                </tbody></table>
                            </div>
                        </div>

                        <div class="card scrollspy" id="profile">
                            <div class="card-content">
                                <p class="bold mb10 h6">Profile</p>
                                <ul class="profile-box">
                                    <li class="profile-items">
                                        <div class="profile-item-title">
                                            <i class="fas fa-id-card-alt"></i>
                                            <span>Current Designation</span>
                                        </div>
                                        <div class="profile-item-content">
                                            <span><?php echo $profile['can_curr_desig'] ?></span>
                                        </div>
                                    </li>
                                    <li class="profile-items">
                                        <div class="profile-item-title">
                                            <i class="fas fa-building"></i>
                                            <span>Current Company </span>
                                        </div>
                                        <div class="profile-item-content">
                                            <span><?php echo $profile['can_curr_company'] ?></span>
                                        </div>
                                    </li>
                                    <li class="profile-items">
                                        <div class="profile-item-title">
                                            <i class="far fa-id-card"></i>
                                            <span>Function Area</span>
                                        </div>
                                        <div class="profile-item-content">
                                            <span><?php echo $fun['fun_name'] ?></span>
                                        </div>
                                    </li>
                                    <li class="profile-items">
                                        <div class="profile-item-title">
                                            <i class="fas fa-anchor"></i>
                                            <span>Industry </span>
                                        </div>
                                        <div class="profile-item-content">
                                            <span><?php echo $ind['ind_name'] ?></span>
                                        </div>
                                    </li>
                                    <li class="profile-items">
                                        <div class="profile-item-title">
                                            <i class="fas fa-briefcase"></i>
                                            <span>Experience</span>
                                        </div>
                                        <div class="profile-item-content">
                                            <span><?php echo $profile['can_experience'] ?></span>
                                        </div>
                                    </li>
                                    <li class="profile-items">
                                        <div class="profile-item-title">
                                            <i class="fas fa-map-marked-alt"></i>
                                            <span>Preferred Location</span>
                                        </div>
                                        <div class="profile-item-content">
                                            <span><?php echo $profile['can_pref_loc'] ?></span>
                                        </div>
                                    </li>
                                    <li class="profile-items">
                                        <div class="profile-item-title">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <span>Current Location</span>
                                        </div>
                                        <div class="profile-item-content">
                                            <span><?php echo $profile['can_curr_loc'] ?></span>
                                        </div>
                                    </li>
                                    <li class="profile-items">
                                        <div class="profile-item-title">
                                            <i class="fas fa-hand-holding-usd"></i>
                                            <span>Current Salary</span>
                                        </div>
                                        <div class="profile-item-content">
                                            <span><?php echo $profile['can_curr_sal'] ?></span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Work Experiance -->
                        <div class="card scrollspy" id="experience">
						<div class="card-content">
							<p class="bold mb10 h6">Work Experience</p>
							<div class="table-box hide-on-med-and-down">
								<table class="highlight responsive-table">
									<thead>
										<tr><th><i class="fas fa-id-card-alt"></i> Designation</th>
										<th><i class="fas fa-building"></i> Current Company</th>
										<th><i class="fas fa-calendar-alt"></i> From</th>
										<th><i class="fas fa-map-marker-alt"></i> Location</th>
									</tr></thead>
									<tbody>
                                        <?php 
                                        if(!empty($exp['cexp_from_mon'])){
                                            $from = date('M',strtotime($exp['cexp_from_mon'])).' '.$exp['cexp_from_yr'];
                                            if($exp['cexp_present'] == 1){ $to = 'present'; }
                                                else{  $to = date('M',strtotime($exp['cexp_to_mon'])).' '.$exp['cexp_to_yr']; }
                                        }else{
                                            $from ='';
                                        }
                                        if(empty($exp['cexp_to_mon'])){
                                            $to = "";    
                                        }
                                        ?>								
										<tr>
											<td><?php echo $exp['cexp_position'] ?></td>
											<td><?php echo $exp['cexp_company'] ?></td>
                                            <td><?php echo (!empty($from))?$from. ' to '. $to : ''?></td>
											<td><?php echo $exp['cexp_location'] ?></td>
										</tr>

																				
									</tbody>
								</table>
							</div>

							<div class="exp-mob show-on-medium-and-down  hide-on-large-only">
								<div class="row">
									<div class="col m12 s12 ">
										<div class="set-box">
																						
											<ul class="exp-items-box grey lighten-4">
												<li class="exp-items right">

												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-id-card-alt"></i> Designation
													</div>
													<div class="exp-items-content">
														<span><?php echo $exp['cexp_position'] ?></span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-building"></i> Current Company
													</div>
													<div class="exp-items-content">
														<span><?php echo $exp['cexp_company'] ?></span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-calendar-alt"></i> From
													</div>
													<div class="exp-items-content">
														<span><?php echo (!empty($from))?$from. ' to '. $to : ''?></span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-map-marker-alt"></i> Location
													</div>
													<div class="exp-items-content">
														<span><?php echo $exp['cexp_location'] ?></span>
													</div>
												</li>
											</ul>
										</div>
										
									</div>
								</div>
							</div>
						</div>
                    </div>
                    <!--  -->

                    <div class="card scrollspy" id="education">
						<div class="card-content">
							<p class="bold mb10 h6">Education</p>
							<div class="table-box hide-on-med-and-down">
								<table class="highlight responsive-table">
									<thead>
										<tr><th><i class="fas fa-building"></i> Name of the institution</th>
										<th><i class="fas fa-graduation-cap"></i> Grade / Degree</th>
										<th><i class="fas fa-calendar-alt"></i> From Year</th>
										<th><i class="fas fa-calendar-alt"></i> To Year</th>
										
									</tr></thead>
									<tbody>
                                        <tr>
											<td><?php echo $edu['cedu_school'] ?></td>
											<td><?php echo $edu['cedu_specialization'] ?></td>
											<td><?php echo $edu['cedu_startdt'] ?></td>
											<td><?php echo $edu['cedu_enddt'] ?></td>
											
                                        </tr>
                                    </tbody>
								</table>
							</div>

							<div class="exp-mob show-on-medium-and-down  hide-on-large-only">
								<div class="row">
									<div class="col m12 s12 ">
										<div class="set-box">
											<ul class="exp-items-box grey lighten-4">
												<li class="exp-items right">
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-building"></i> Name of the institution
													</div>
													<div class="exp-items-content">
														<span><?php echo $edu['cedu_school'] ?></span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-graduation-cap"></i> Grade / Degree
													</div>
													<div class="exp-items-content">
														<span><?php echo $edu['cedu_specialization'] ?></span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-calendar-alt"></i> From Year
													</div>
													<div class="exp-items-content">
														<span><?php echo $edu['cedu_startdt'] ?></span>
													</div>
												</li>
												<li class="exp-items">
													<div class="exp-items-title">
														<i class="fas fa-calendar-alt"></i> From Year
													</div>
													<div class="exp-items-content">
														<span><?php echo $edu['cedu_enddt'] ?></span>
													</div>
												</li>
											</ul>
										</div>
										
									</div>
								</div>
							</div>
						</div>
					</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- package upgrade model -->
    <div id="packagemodal" class="modal" style="max-width:400px;overflow: visible;">
        <div class="modal-content">
            <form action="<?php echo base_url()?>candidates/packageUpdate" method="post">
                <div class="row m0">
                    <h5 class="m0 mb10">Upgrade Package</h5>
                    <br>
                    <div class="input-field">
                        <select name="type">
                            <?php foreach ($price as $key => $value) {
                                echo  '<option value="'.$value->pr_encrypt_id.'">'.$value->pr_name.'&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;$'.$value->pr_orginal.'</option>';
                            } ?>
                        </select>
                        <label for="">Select Package<span class="red-text">*</span> </label>
                    </div>
                    <input type="hidden" value="<?php echo $profile['can_id'] ?>" name="empid">
                    <input type="hidden" id="" class="validate" value="<?php echo $this->uri->segment(3) ?>" name="uqid">
                    <div class="input-field">
                        <button type="submit" class=" waves-effect waves-green  btn green darken-4 white-text block hoverable">Submit</button>
                    </div>
                </div>
            </form>
        </div>    
    </div>
    
    <?php echo $this->session->flashdata('messeg'); ?>
      
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/jquery-3.3.1.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/materialize.min.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/script.js"></script>
      <script type="text/javascript" src="<?php echo base_url() ?>dist/js/short.js"></script>
      <script>
          $(document).ready(function(){
            $('.scrollspy').scrollSpy();
            $('.modal').modal();
            $('select').formSelect();
          });
      </script>
</body>
</html>