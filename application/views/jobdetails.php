

	<link rel="stylesheet" href="<?php echo $this->config->base_url();?>web/Telebuild/css/intlTelInput.css">

	<section id="candsection">

        <div class="container">

            <div class="row">

				<div class="signup-main" style="background-color: #fff;"> 

                    <div class="col-md-12 space-top-12"><h3><a href="<?php echo $this->config->base_url();?>Jobs" class="btn btn-default">Back to Jobs</a></h3></div>

                    <?php if(isset($status) && $status=='success') { echo $message; } if(isset($status) && $status=='fail') { echo $message; } ?>

                    <?php if($this->session->userdata('cand_chid')) { ?>

                        <div class="col-lg-12 col-lg-offset-0 col-sm-12 col-sm-offset-2 col-md-12 col-xs-12">

                    <?php } else { ?>

                        <div class="col-lg-6 col-lg-offset-0 col-sm-12 col-sm-offset-2 col-md-6 col-xs-12">

                    <?php } ?>

                    <h2><?php echo $jobdata['job_title'].' ['.$jobcode.']'; ?></h2>

                    <div class="col-md-6 space-top-12">

                        <i class="fa fa-building"></i> <strong>Hiring For : </strong><?php echo $jobdata['job_company']; ?>

                    </div>

                    <div class="col-md-6 space-top-12">

                        <i class="fa fa-map-marker"></i> <strong>Location :</strong> <?php echo $jobdata['job_location']; ?>

                    </div>

                    

                    <div class="col-md-6 space-top-12">

                    	<i class="fa fa-windows"></i> <strong>Function Area :</strong> <?php echo $jobdata['fun_name'];?>

                    </div>

                    <div class="col-md-6 space-top-12">

                    	<i class="fa fa-group"></i> <strong>Job Role :</strong> <?php echo $jobdata['job_role'];?>

                    </div>

                    <div class="col-md-6 space-top-12">

                    	<i class="fa fa-sitemap"></i> <strong>Industry :</strong> <?php echo $jobdata['job_industry'];?>

                    </div>

                    <div class="col-md-6 space-top-12">

                    	<i class="fa fa-book"></i> <strong>Education :</strong> <?php echo $jobdata['edu_name']; ?>

                    </div>

                    <div class="col-md-6 space-top-12">

                    	<i class="fa fa-clock-o"></i> <strong>Experience :</strong> <?php if(($jobdata['job_max_exp']-1) == 0) { echo 'Fresher'; } else { echo ($jobdata['job_min_exp']-1).' Yrs ~ '.($jobdata['job_max_exp']-1).' Yrs'; } ?> 

                    </div>

                    <div class="col-md-6 space-top-12">

                    	<i class="fa fa-usd"></i> <strong>Salary :</strong> <?php if($jobdata['job_min_sal'] == 0 && $jobdata['job_max_sal'] == 0) { echo 'Unspecified'; } else { echo '$'.$jobdata['job_min_sal'].' ~ $'.$jobdata['job_max_sal']; }?> 

                    </div>

                    <div class="col-md-12 space-top-12">

                    	<i class="fa fa-tags"></i> <strong>Skills :</strong> <?php echo $jobdata['job_skills'];?>

                    </div>

                    

                    <div class="col-md-12 space-top-12">

                    	<i class="fa fa-sticky-note-o"></i> <strong>Job Description :</strong> 

                    <p><?php echo $jobdata['job_desc'];?> </p>

                    </div>

                    

                    <div class="col-md-12 space-top-12">

                    	<i class="fa fa-building"></i> <strong>About Company :</strong> 

                    <p><?php echo $jobdata['emp_desc'];?>  </p>

                    </div>

                    

                    

                    </div>

                    <?php if($this->session->userdata('cand_chid')) { ?>

                        <div class="col-lg-12 col-lg-offset-0 col-sm-12 col-sm-offset-2 col-md-12 col-xs-12 cv-send-form">

                            <form method="post" action="<?php echo $this->config->base_url().'SignIn/'.$jobid.'/?js='.$jsrc.'&source='.$source;?>" name="postcvfrm"  data-toggle="validator" role="form">

                                <input type="submit" name="submit" class="btn btn-success col-md-3" value="Apply">

                            </form>

                        <div class="clearfix"> </div>

                        <br />

                        </div>

                    <?php } else { ?>

                        <div class="col-lg-6 col-lg-offset-0 col-sm-12 col-sm-offset-2 col-md-6 col-xs-12 cv-send-form">

                        <?php if(isset($status) && $status=='fail') { $divview = 'style="display:none;"'; $divview1 = ''; ?>

                        <div class="col-md-12 space-top-12 text-center">

                            <label  class="btn btn-default" id="signin" onclick="chngJoblabel('Login & Apply','Create Account','signin','signup');"> <i class="fa fa-square-o"></i> Login & Apply </label>

                            <label  class="btn btn-success" id="signup" onclick="chngJoblabel('Create Account','Login & Apply','signup','signin');"> <i class="fa fa-check-square"></i> Create Account </label>

                        </div>

                        <?php } else { $divview1 = 'style="display:none;"'; $divview = ''; ?>

                            <div class="col-md-12 space-top-12 text-center">

                                <label  class="btn btn-success" id="signin" onclick="chngJoblabel('Login & Apply','Create Account','signin','signup');"> <i class="fa fa-check-square"></i> Login & Apply </label>

                                <label  class="btn btn-default" id="signup" onclick="chngJoblabel('Create Account','Login & Apply','signup','signin');"> <i class="fa fa-square-o"></i> Create Account </label>

                            </div>

                        

                        <?php } ?>

                        <div class="col-md-12" id="signindiv" <?php echo $divview; ?> >

                            <form method="post" name="postcvfrm" action="<?php echo $this->config->base_url().'SignIn/'.$jobid.'/?js='.$jsrc.'&source='.$source;?>" data-toggle="validator" role="form">

                                <h2>Already registered with us?</h2>

                                <div class="col-md-12">

                                    <div class="form-group input-group">

                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                        <input type="email" class="form-control" placeholder="Email ID" value="" name="username" id="username" required >

                                    </div>

                                </div>

                                <div class="col-md-12 space-top-12">

                                    <div class="form-group input-group">

                                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                        <input type="password" class="form-control" placeholder="Password" value="" name="password" id="password" required >

                                    </div>

                                </div>

                                <div class="col-md-6 col-sm-12 space-top-12">

                                    <input type="submit" name="submit" value="Apply" class="btn btn-success col-md-6">

                                </div>

                            </form>

                            <div class="col-md-6 col-sm-12 space-top-12">

                                <div class="form-group input-group">

                                    <label><i class="icon-question-sign"></i> <a data-toggle="modal" href="#myModal" >Lost your password?</a></label>

                                </div>

                            </div>

                            

                            </div>

                            <div class="col-md-12" id="signupdiv" <?php echo $divview1; ?> >

                            <h2>Register & apply for this position</h2>

                            <form data-toggle="validator" role="form" method="post" name="signupfrm" id="signupfrm" action="<?php echo $this->config->base_url().'JobApply/'.$jobid.'/?js='.$jsrc.'&source='.$source;?>" enctype="multipart/form-data">

                                <div id="ErrAlert"></div>

                                <div class="form-group row">

                                    <div class="col-md-6 col-sm-6 space-top-30">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                            <input type="text" class="form-control" placeholder="First Name" value="<?php echo $formdata['firstname']; ?>" name="firstname" id="firstname" tabindex="1" required >

                                        </div>    

                                        <span id="firstname_validate"></span>                      

                                    </div>

                                    <div class="col-md-6 col-sm-6 space-top-30">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-user"></i></span>

                                            <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $formdata['lastname']; ?>" name="lastname" id="lastname" tabindex="2" required >

                                        </div>

                                        <span id="lastname_validate"></span>                        

                                    </div>

                                </div>

                                

                                <div class="form-group row">

                                    <div class="col-md-6 col-sm-6 space-top-30">

                                        <div class="input-group">                            

                                            <span class="input-group-addon"><i class="fa fa-phone"></i></span>

                                            <input style="width:30%;" type="hidden" class="form-control" placeholder="Code" value="<?php echo $formdata['cntrycode']; ?>"  name="cntrycode" id="cntrycode" tabindex="3">

                                            <input type="text" class="form-control" maxlength="16" placeholder="Contact Number" value="<?php echo $formdata['phone']; ?>" name="phone" id="phone" tabindex="4" required >

                                        </div>

                                        <span id="phone_validate"></span>                         

                                    </div>

                                    <div class="col-md-6 col-sm-6 space-top-30">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                                            <input type="email" class="form-control" placeholder="E-mail ID" name="emailid" value="<?php echo $formdata['emailid']; ?>" id="emailid" tabindex="5" required>

                                        </div>

                                        <span id="emailid_validate"></span>                         

                                    </div>

                                </div>

                                

                                <div class="form-group row">

                                    <div class="col-md-6 col-sm-6 space-top-30">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                            <input data-toggle="tooltip"  type="password" class="form-control" placeholder="Password" value="<?php echo $formdata['usrpwd']; ?>" name="usrpwd" id="usrpwd" tabindex="6" required >

                                        </div>

                                        <span id="usrpwd_validate"></span>

                                    </div>

                                    <div class="col-md-6 col-sm-6 space-top-30">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                                            <input type="password" class="form-control" placeholder="Confirm Password" value="<?php echo $formdata['repwd']; ?>" name="repwd" id="repwd" tabindex="7" required >

                                        </div>

                                        <span id="repwd_validate"></span>

                                    </div>

                                </div>

                                

                                <div class="form-group row">

                                    <div class="col-md-6 col-sm-6 space-top-30">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-birthday-cake"></i></span>                    

                                            <input type="hidden" id="dob" class="form-control" value="<?php echo $formdata['dob']; ?>" name="dob" tabindex="8" required>

                                        </div>

                                        <span id="dob_validate"></span>

                                    </div>

                                    <div class="col-md-6 col-sm-6 space-top-30">

                                        <div class="input-group">  

                                            <span class="input-group-addon"><i class="fa fa-female"></i><i class="icon-male"></i></span>

                                            <select name="gender" id="gender" class="form-control" tabindex="9" required>

                                                <option disabled selected>Gender</option>

                                                <option <?php echo ($formdata['gender']=='Male')?'selected':''; ?> value="Male">Male</option>

                                                <option <?php echo ($formdata['gender']=='Female')?'selected':''; ?> value="Female">Female</option>

                                                <option <?php echo ($formdata['gender']=='other')?'selected':''; ?> value="Other">Other</option>

                                            </select>

                                        </div>

                                        <span id="gender_validate"></span>

                                    </div>

                                </div>

                                

                                <div class="form-group row">

                                    <div class="col-md-6 col-sm-6 space-top-30">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-book"></i></span>

                                            <?php echo form_dropdown('edu',$edu_list,$formdata['edu'],'id="edu" class=" form-control" tabindex="10" required');?>

                                        </div>

                                        <span id="edu_validate"></span>

                                    </div>

                                    <div class="col-md-6 col-sm-6 space-top-30">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>

                                            <?php echo form_dropdown('nation',$nation_list,$formdata['nation'],'id="nation" class=" form-control" tabindex="11" required');?>

                                        </div>

                                        <span id="nation_validate"></span>

                                    </div>

                                </div>

                                

                                <div class="form-group row">

                                    <div class="col-md-6 col-sm-6 space-top-30">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-windows"></i></span>

                                            <?php echo form_dropdown('funarea',$funarea_list,$formdata['funarea'],'id="funarea" class=" form-control" tabindex="12" required');?>

                                        </div>

                                        <span id="funarea_validate"></span>

                                    </div>                                

                                    <div class="col-md-6 col-sm-6 space-top-30">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-anchor"></i></span>

                                            <?php echo form_dropdown('industry',$ind_list,$formdata['industry'],'id="industry" class=" form-control" tabindex="13" required');?>

                                        </div>

                                        <span id="industry_validate"></span>

                                    </div>                            

                                </div>

                                

                                <div class="form-group row">

                                    <div class="col-md-6 col-sm-6 space-top-30">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-diamond"></i></span>

                                            <input type="text" class="form-control" placeholder="Current Designation" value="<?php echo $formdata['currdesig']; ?>" name="currdesig" id="currdesig" tabindex="14" required >

                                        </div>

                                        <span id="currdesig_validate"></span>

                                    </div>

                                    <div class="col-md-6 col-sm-6 space-top-30">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>

                                            <select name="totexp" id="totexp" class="form-control" tabindex="15" required>

                                            <option disabled selected>Total Experience</option>

                                            <option <?php echo ($formdata['totexp']=="Fresher")?'selected':''; ?> value="Fresher">Fresher</option>

                                            <option <?php echo ($formdata['totexp']=="01")?'selected':''; ?> value="01">1</option>

                                            <option <?php echo ($formdata['totexp']=="02")?'selected':''; ?> value="02">2</option>

                                            <option <?php echo ($formdata['totexp']=="03")?'selected':''; ?> value="03">3</option>

                                            <option <?php echo ($formdata['totexp']=="04")?'selected':''; ?> value="04">4</option>

                                            <option <?php echo ($formdata['totexp']=="05")?'selected':''; ?> value="05">5</option>

                                            <option <?php echo ($formdata['totexp']=="06")?'selected':''; ?> value="06">6</option>

                                            <option <?php echo ($formdata['totexp']=="07")?'selected':''; ?> value="07">7</option>

                                            <option <?php echo ($formdata['totexp']=="08")?'selected':''; ?> value="08">8</option>

                                            <option <?php echo ($formdata['totexp']=="09")?'selected':''; ?> value="09">9</option>

                                            <option <?php echo ($formdata['totexp']=="10")?'selected':''; ?> value="10">10</option>

                                            <option <?php echo ($formdata['totexp']=="11")?'selected':''; ?> value="11">11</option>

                                            <option <?php echo ($formdata['totexp']=="12")?'selected':''; ?> value="12">12</option>

                                            <option <?php echo ($formdata['totexp']=="13")?'selected':''; ?> value="13">13</option>

                                            <option <?php echo ($formdata['totexp']=="14")?'selected':''; ?> value="14">14</option>

                                            <option <?php echo ($formdata['totexp']=="15")?'selected':''; ?> value="15">15</option>

                                            <option <?php echo ($formdata['totexp']=="16")?'selected':''; ?> value="16">16</option>

                                            <option <?php echo ($formdata['totexp']=="17")?'selected':''; ?> value="17">17</option>

                                            <option <?php echo ($formdata['totexp']=="18")?'selected':''; ?> value="18">18</option>

                                            <option <?php echo ($formdata['totexp']=="19")?'selected':''; ?> value="19">19</option>

                                            <option <?php echo ($formdata['totexp']=="20")?'selected':''; ?> value="20">20</option>

                                            <option <?php echo ($formdata['totexp']=="21")?'selected':''; ?> value="21">21</option>

                                            <option <?php echo ($formdata['totexp']=="22")?'selected':''; ?> value="22">22</option>

                                            <option <?php echo ($formdata['totexp']=="23")?'selected':''; ?> value="23">23</option>

                                            <option <?php echo ($formdata['totexp']=="24")?'selected':''; ?> value="24">24</option>

                                            <option <?php echo ($formdata['totexp']=="25")?'selected':''; ?> value="25">25</option>

                                            <option <?php echo ($formdata['totexp']=="26")?'selected':''; ?> value="26">26</option>

                                            <option <?php echo ($formdata['totexp']=="27")?'selected':''; ?> value="27">27</option>

                                            <option <?php echo ($formdata['totexp']=="28")?'selected':''; ?> value="28">28</option>

                                            <option <?php echo ($formdata['totexp']=="29")?'selected':''; ?> value="29">29</option>

                                            <option <?php echo ($formdata['totexp']=="30")?'selected':''; ?> value="30">30</option>

                                            <option <?php echo ($formdata['totexp']=="31")?'selected':''; ?> value="31">30+</option>

                                            </select>                          

                                        </div>

                                        <span id="totexp_validate"></span>                              

                                    </div>

                                </div>

                                

                                <div class="form-group row">

                                    <div class="col-md-12 col-sm-12 space-top-30">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                            <input type="hidden" value="<?php echo $formdata['currcompany']; ?>" name="currcompany" id="currcompany">

                                            <?php echo form_dropdown('currloc',$country_list,$formdata['currloc'],'id="currloc" class=" form-control" tabindex="14" required');?>

                                        </div>

                                        <span id="currloc_validate"></span>

                                    </div>

                                </div>

                                

                                <div class="form-group row">

                                    <div class="col-md-12 col-sm-12 space-top-30">

                                        <div class="">

                                            <input type="file" class="form-control input_syle" id="fileToUpload" name="fileToUpload" tabindex="15" required>

                                        </div>

                                        <span id="fileToUpload_validate"></span>

                                    </div>

                                </div>

                                

                                <div class="form-group row">

                                    <div class="col-md-12 col-sm-12 space-top-30">

                                        <div class="input-group">

                                            <label>

                                                <input type="checkbox" name="jobalert" id="jobalert" tabindex="16" value="1" <?php echo ($formdata['jobalert']==1)?'checked':''; ?>> Create a Job Alert - Get the freshest jobs in your inbox every day. 

                                            </label>

                                        </div>

                                        <span id="jobalert_validate"></span>

                                    </div>

                                </div>

                                

                                <div class="form-group row">

                                    <div class="col-md-12">

                                        <div class="input-group">

                                            <label>

                                                <input type="checkbox" name="tandc" id="tandc" value="1" tabindex="17" checked required> I agree with the Terms and Conditions 

                                            </label>

                                        </div>

                                        <span id="tandc_validate"></span>

                                        <input class="form-control" type="hidden" name="returnurl" id="returnurl" value="<?php echo $sum; ?>">

                                    </div>

                                </div>

                                

                                <div class="col-md-12 text-center">

                                    <input type="submit" name="submit" value="Apply!" class="btn btn-success btn-xl">

                                </div>

                                <br>

                                <div class="clearfix"> </div>

                            </form>

                        	<div class="clearfix"> </div>

                        </div>

                    <?php } ?>   

                    </div>

                    <div class="clearfix"> </div>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">

      <div class="modal-dialog">

          <div class="modal-content">

              <form action="http://staging.cherryhire.com/candidate/User/RecoverInitiate/" method="post" id="fpwdfrm">

              <div class="modal-header">

                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                  <h4 class="modal-title">Forgot Password ?</h4>

              </div>

              <div class="modal-body">

                  <p>Enter your e-mail address below to reset your password.</p>

                  <input type="text" name="uemail" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

              </div>

              <div class="modal-footer">

                  <button data-dismiss="modal" class="btn btn-danger" type="button">Cancel</button>

                  <button class="btn btn-success" type="submit">Submit</button>

              </div>

              </form>

          </div>

      </div>

    </div>

	<script src="<?php echo $this->config->base_url();?>web/Telebuild/js/intlTelInput.js"></script>

    <script src="<?php echo $this->config->base_url();?>web/js/countrySync.js"></script>

    <script type="text/javascript" src="<?php echo $this->config->base_url();?>web/js/jquery.date-dropdowns.js"></script>

    <script type="text/javascript">

      $('#usrpwd').tooltip({'trigger':'focus', 'placement':'bottom', 'html':'true', 'title': '<b>Password must contain:</b> <br > Atleast 8 characters.'});

    </script>

    

    <script src="<?php echo $this->config->base_url();?>web/js/jquery-ui.min.js"></script>

    <script type="text/javascript" src="<?php echo $this->config->base_url();?>web/js/bootstrap-filestyle.js"></script>

    <link href="<?php echo $this->config->base_url();?>web/css/datepicker.css" rel="stylesheet" type="text/css" media="all"/>

    <script type="text/javascript" src="<?php echo $this->config->base_url();?>web/js/bootstrap-datepicker.js"></script>

    <link rel="stylesheet" href="<?php echo $this->config->base_url();?>web/css/jquery-ui.css" />





	<script type="text/javascript">

        $('#fileToUpload').filestyle({

            buttonName : 'btn-danger'

        });

      var AjaxURL = "<?php echo $this->config->base_url().'EmailValid';?>";

    </script>

    

    <script type="text/javascript">

    //var $j = jQuery.noConflict();

        // When the document is ready

        

        $(document).ready(function () {

            $("#dob").dateDropdowns({

                  defaultDateFormat: "dd/mm/yyyy",

                  submitFormat: "dd/mm/yyyy",

                  minAge: 18,

                  maxAge: 70,

                  monthFormat: 'short',

                  required: true,

                  dropdownClass:"form-control wauto"

            });	

                    

        });

    </script>

	<script src="<?php echo $this->config->base_url();?>web/js/postcv.js"></script>

    

    <script type="text/javascript">

    function chngJoblabel(labltxt, clabltxt, thelabel, clabel) {

        

        var labelvar = document.getElementById(thelabel);

        var clabelvar = document.getElementById(clabel);

        var sid = document.getElementById(thelabel+'div');

        var hid = document.getElementById(clabel+'div');

        labelvar.innerHTML = "<i class='fa fa-check-square'></i> " + labltxt;

        clabelvar.innerHTML = "<i class='fa fa-square-o'></i> " + clabltxt;

        

        $(labelvar).addClass('btn-success');	

        $(labelvar).removeClass('btn-default');	

        $(clabelvar).addClass('btn-default');	

        $(clabelvar).removeClass('btn-success');	

        

        $(hid).hide();

        $(sid).show();

        

    }

    

    </script>