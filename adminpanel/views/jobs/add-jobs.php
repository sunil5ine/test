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
      <link rel="stylesheet" href="<?php echo $this->config->item('web_url');?>assets/css/jquery.tagsinput-revisited.css">
      <link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/select2.min.css">
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
                          <div class="col s12">
                               <p class="h5-para black-text  m0">Add New Job</p>
                               <h6 class="m0 bold"> <small><i>Hello, Admin. Post a new Job!</i></small> </h6>
                          </div>
                     </div>

                     <div class="card ">
                        <div class="card-content ">
                            <form action="<?php echo base_url('jobs/post') ?>" method="post" style="overflow:hidden" id="addform">
                                <div class="row">
                                    <div class=" col s12 l6">
                                        <label for="jtitle" class="active">Job  Title <span class="red-text">*</span></label>
                                        <input type="text" id="" name='title' class="validate" placeholder="Enter Job Title" required>
                                    </div>
                                    <div class=" col s12 l6">
                                        <label for="jtitle" class="active">Job Role <span class="red-text">*</span></label>
                                        <input type="text" id="role" name="role" class="validate" placeholder=" Enter  Job Role" required>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class=" col s12 l6">
                                        <label for="jtitle" class="active">Job Type <span class="red-text">*</span></label>
                                        <select required name="type">
                                            <option value="Full Time" >Job Type</option>
                                            <option value="Full Time" >Full Time</option>
                                            <option value="Part Time" >Part Time</option>
                                            <option value="Freelance" >Freelance</option>
                                            <option value="Temporary" >Temporary</option>
                                        </select>
                                    </div>
                                    
                                    <div class=" col s12 l6">
                                        <label for="jtitle" class="active">Location  <span class="red-text">*</span></label>
                                        <select required name="location">
                                            <?php foreach ($location as $key => $value) { ?>
                                                <option value="<?php echo $value->co_name ?>" ><?php echo $value->co_name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s12 p0 l6">
                                    <div class=" col s12  ">
                                        <label for="" class="">Expected Work Experience Range  <span class="red-text">*</span></label>
                                    </div>
                                        <div class=" col s12 l6 ">
                                            <select required name="minexp">
                                                <option value="" disabled selected>Min Exp</option>
                                                <option value="0">Fresher</option>
                                                <?php for ($i=1; $i < 16; $i++) {  ?>
                                                    <option value="<?php echo $i ?>">
                                                    <?php if($i > 1 && $i < 15){echo $i.' Years'; } 
                                                         else{ echo $i .' Year';}                                                         
                                                    ?>
                                                    </option>
                                                <?php  } ?>
                                                <option value="16">16 +years</option>
                                            </select>
                                        </div>
                                        <div class=" col s12 l6 ">
                                            <select required name="maxexp">
                                                <option value="" disabled selected>Max Exp</option>
                                                <option value="0">Fresher</option>
                                                <?php for ($i=1; $i < 16; $i++) {  ?>
                                                    <option value="<?php echo $i ?>">
                                                    <?php if($i > 1 && $i < 15){echo $i.' Years'; } 
                                                         else{ echo $i .' Year';}                                                         
                                                    ?>
                                                    </option>
                                                <?php  } ?>
                                                <option value="16">16 +years</option>
                                            </select>
                                        </div>
                                    </div>
                                
                                    <div class="col s12  l6">
                                        <label for="" class="">Offered Salary Range (Monthly)<span class="red-text">*</span></label>
                                       <select required name="salary">
                                            <option value="" selected="selected" data-select2-id="11">Monthly Salary</option>
                                            <option value="0~0" >Unspecified</option>
                                            <option value="0~500" >$0 - $500</option>
                                            <option value="500~1000">$500 - $1000</option>
                                            <option value="1000~1500">$1000 - $1500</option>
                                            <option value="1500~2000">$1500 - $2000</option>
                                            <option value="2000~3000">$2000 - $3000</option>
                                            <option value="3000~4000">$3000 - $4000</option>
                                            <option value="4000~5000">$4000 - $5000</option>
                                            <option value="5000~6000">$5000 - $6000</option>
                                            <option value="6000~7000">$6000 - $7000</option>
                                            <option value="7000~8000">$7000 - $8000</option>
                                            <option value="8000~9000">$8000 - $9000</option>
                                            <option value="9000~10000">$9000 - $10000</option>
                                            <option value="10000~15000">$10000 - $15000</option>
                                            <option value="15000~30000">$15000 - $30000</option>
                                            <option value="30000~50000">$30000 - $50000</option>
                                       </select>
                                    </div>
                                </div>
                                               
                                <div class="row">
                                    <div class=" col s12 l6">
                                        <label for="" class="">Function Area<span class="red-text">*</span></label>
                                        <select name="funarea">
                                            <?php foreach ($funarea as $key => $value) { ?>
                                               <option value="<?php echo $value->fun_id ?>"><?php echo $value->fun_name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class=" col s12 l6">
                                        <label for="" class="">Educational Qualification<span class="red-text">*</span></label>
                                        <select name="education">
                                            <?php foreach ($education as $key => $value) { ?>
                                               <option value="<?php echo $value->edu_id ?>"><?php echo $value->edu_name ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class=" col s12 l6">
                                        <label for="" class=""> Industry <span class="red-text">*</span></label>
                                        <select name="industry">
                                            <?php foreach ($industry as $key => $value) { ?>
                                               <option value="<?php echo $value->ind_name ?>"><?php echo $value->ind_name ?></option>
                                            <?php } ?>
                                            <option value="other">Other...</option>
                                        </select>
                                    </div>
                                    <div class=" col s12 l6">
                                        <label for="" id=""  class=""> Skills  <span class="red-text"></span></label>
                                        <input type="text" id="skillstags" name="skils" class="validate">                                        
                                    </div>
                                </div>

                                <div class="col s12 m12 l12"> <br> <div class="dividers"></div> <br></div>

                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <p class="black-text bold h6 mb10">Job Description</p>
                                        <textarea style="width: 100%;" rows="8" placeholder="Job Description" name="jobdesc" id="area2"></textarea>
											<p><small>Please do not enter any contact email, phone or url to avoid job beign rejected by the job portal!</small></p>
										
                                    </div>
                                </div>

                                <div class="col s12 m12 l12"> <br> <div class="dividers"></div> <br> </div>

                                <div class="row"> 
                                    <div class="col s12 m4 l4 mobile-m10"> 
                                        <label for="hire" class="active">Employer Name / Compny Name</label> 
                                        <input id="hire" type="text" placeholder="Hiring For" class="validate" value="CherryHire" name="hcompany"> 
                                        
                                    </div> 
                                    <div class="col s12 m4 l4"> 
                                        <label for="noty" class="active">Send Notifications to</label> 
                                        <input type="email" value="" class="validate" name="notifyemail" placeholder="Enter Email ID" id="noty"> 
                                        <p style=""><small><i>Email id where the notifications are to be sent when a candidate applies for this job.</i></small></p> 
                                    </div> 
                                    <div class="col s12 m4 l4"> 
                                        <label for="noty" class="active">Number of verified Cv <span class="red-text">*</span></label> 
                                        <select name="cv" required>
                                            <?php for ($i=1; $i < 51 ; $i++) {  ?>
                                                <option value="<?php echo  $i ?>"><?php echo  $i ?></option>
                                            <?php } ?>
                                        </select>
                                         
                                    </div> 
                                </div>
                                <div class="row"> 
                                    <div class="col s12 m12 l12 input-field">
                                        <label class="active">Notes</label>
                                        <textarea rows="4" id="textarea1" name="jobnotes" id="" placeholder="Notes"></textarea>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s12 m12 l12 input-field">
                                        <button class="btn waves-effect waves-light green darken-4 white-text hoverable plr60" type="submit" name="action">Post
                                            <i class="fas fa-upload right"></i>
                                        </button>
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
      <script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/nicEdit.js"></script>
      <script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/select2.min.js"></script>
      <script src="<?php echo $this->config->item('web_url');?>assets/js/tagsinput.min.js"></script>
      <script type="text/javascript">
            bkLib.onDomLoaded(function() {
                new nicEditor({fullPanel : true,iconsPath : '<?php echo $this->config->item('web_url')?>assets/img/nicEditorIcons.gif'}).panelInstance('area2');
            });
	  </script>
      <!-- Tosd confirmation -->
      <script type='text/javascript'>
         $(function () {
            $('select').select2({width: "100%"});
			$('#skillstags').tagsInput();
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
