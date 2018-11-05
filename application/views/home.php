

    <!-- Header -->

    <header>

        <div class="container">

            <div class="intro-text">

                <!--  -->

                <div class="intro-heading">

                <div class="intro-lead-in"><h1>Start here</h1></div>

                	<div class="row text-center ">

                        <!-- 

                        <label class="btn btn-danger" id="emp" onclick="chnglabel('Employer','Job Seeker','emp','cand');"> <i class="fa fa-square-o"></i> I'm an Employer </label>

                        <label class="btn btn-success" id="cand" onclick="chnglabel('Job Seeker','Employer','cand','emp');"> <i class="fa fa-square-o"></i> I'm a Job Seeker </label>

                        -->

                        <a href="<?php echo $this->config->base_url().'PostJob';?>" ><label class="btn btn-danger" id="emp" > <i class="fa fa-suitcase"></i> I'm an Employer </label></a>

                        <a href="<?php echo $this->config->base_url().'PostCV';?>" ><label class="btn btn-success" id="cand" > <i class="fa fa-users"></i> I'm a Job Seeker </label></a>

                       

                        <div class="headbottomdiv" id="empdiv" style="display:none;">

                            <form class="form-inline" method="post" name="empfrm" id="empfrm" action="<?php echo $this->config->base_url().'PostJob';?>">

                                <div class="col-md-3" id="EmpAlert"></div>

                                <div class="col-md-12 space-top-12"><h3>Experience the all new HIRING power of Cherry Hire</h3>

                                    <div class="col-md-4">

                                        <input type="text" class="form-control space-top-12" name="fname" id="fname" value="" placeholder="Enter your Name" required>

                                        <span id="fname_validate"></span>

                                    </div>

                                    <div class="col-md-4">

                                        <input type="email" class="form-control space-top-12" value="" name="emailid" id="emailid" placeholder="Email Address" required>

                                        <span id="emailid_validate"></span>

                                    </div>

                                    <div class="col-md-4">

                                        <input type="submit"  class="btn btn-primary space-top-12" value="Post Job">

                                        <input type="button"  class="btn btn-primary space-top-12" value="Cancel" onClick="closediv('emp','Employer');">

                                    </div>

                                    <div class="clearfix"> </div>

                                </div>

                                 

                            </form>

                        </div>

                                    

                        <div class="headbottomdiv" id="canddiv" style="display:none;">

                            <form class="form-inline" method="post" name="candfrm" id="candfrm" action="<?php echo $this->config->base_url().'PostCV';?>">

                                <div class="col-md-3" id="ErrAlert"></div>

                                <div class="col-md-12 space-top-12"><h3>Register FREE and POST CV now!</h3>                                

                                    <div class="col-md-4">

                                        <input type="text" class="form-control space-top-12" name="cname" id="cname" value="" placeholder="Enter your Name" required>

                                        <span id="cname_validate"></span>

                                    </div>

                                    <div class="col-md-4">

                                        <input type="text" class="form-control space-top-12" value="" name="cemailid" id="cemailid" placeholder="Email Address" required> 

                                        <span id="cemailid_validate"></span>

                                    </div>

                                    <div class="col-md-4">

                                        <input type="submit"  class="btn btn-primary space-top-12" value="Post CV">

                                        <input type="button"  class="btn btn-primary space-top-12" value="Cancel" onClick="closediv('cand','Job Seeker');">

                                    </div>

                                    <div class="clearfix"> </div>

                                </div>

                                

                            </form>

                        </div>

                        <div class="clearfix"> </div>

                    </div>

                </div>

                

            </div>

        </div>

    </header>

<section id="empsection">
        <div class="container">
            <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12">
                	<div class="features-grids features-grid text-center">
                    	<h1>Features</h1>
                        <h3>A modern and affordable hiring tool that helps recruiters to automatically filter, review, shortlist and hire the right candidates in minutes. </h3>
                    </div>
                    <div class="features-grids">
                        <div class="col-md-3 col-sm-6 features-grid text-center">
                            <div class="box-icon"></div>
                            <h3>DASHBOARD</h3>
                            <div class="border"></div>
                            <p>Info-graphic display of your candidates and jobs. A detailed dashboard for both employers and candidates to give a complete view of the activities.</p>
                        </div>
                        <div class="col-md-3 col-sm-6 features-grid text-center">
                            <div class="star-icon"></div>
                            <h3>RESUME SOURCING</h3>
                            <div class="border"></div>
                            <p>Our technology allows you to source resumes from various channels. All resumes are consolidated in one talent pool, making your hiring process faster.</p>
                        </div>
                        <div class="col-md-3 col-sm-6 features-grid text-center">
                            <div class="sou-icon"></div>
                            <h3>CANDIDATE POOL</h3>
                            <div class="border"></div>
                            <p>The CVs are aggregated from different sources such as your emails, social networks &amp; more. This allows you to build a long-lasting and searchable talent pool.</p>
                        </div>
                        <div class="col-md-3 col-sm-6 features-grid text-center">
                            <div class="tm-icon"></div>
                            <h3>CV RANKING </h3>
                            <div class="border"></div>
                            <p>Our unique algorithm searches and ranks the best fitting candidates as per the job description. Our ranking engine displays the candidates as excellent, very good and acceptable for each job or requirement.</p>
                        </div>
                        <div class="col-md-3 col-sm-6 features-grid text-center">
                            <div class="vis-icon"></div>
                            <h3>INSIGHTFUL VIEWS</h3>
                            <div class="border"></div>
                            <p>Cherry hire displays meaningful and actionable details of each profile thereby allowing the recruiters to take a more informed decision in line with their job requirement.</p>
                        </div>
                        <div class="col-md-3 col-sm-6 features-grid text-center">
                            <div class="mob-icon"></div>
                            <h3>CAREER PAGE</h3>
                            <div class="border"></div>
                            <p>Employers can build, share and integrate their customized career page using our API thereby attracting more candidates to a consolidated pool.</p>
                        </div>
                        
                        <div class="col-md-3 col-sm-6 features-grid text-center">
                            <div class="cvw-icon"></div>
                            <h3>PROFESSIONAL CV WRITING</h3>
                            <div class="border"></div>
                            <p>Employers can build, share and integrate their customized career page using our API thereby attracting more candidates to a consolidated pool.</p>
                        </div>
                        
                        <div class="col-md-3 col-sm-6 features-grid text-center">
                            <div class="ptest-icon"></div>
                            <h3>PSYCHOMETRIC TEST</h3>
                            <div class="border"></div>
                            <p>Make an informed decision sooner with our live video interviewing. No downloads or third-party software required, just click and smile. Launching Soon!</p>
                        </div>
                        <div class="clearfix"></div>
                        
                    </div>
                    <div class="features-grid text-center">
                    	<h4><a href="<?php echo $this->config->base_url().'PostJob';?>"> Get Started</a></h4>
                    </div>          
                
                </div> 
                <div class="clearfix"></div>
                <div class="col-md-12 cvcount">
                	<h1>100,000 +</h1>
					<h3>Candidate Applications Delivered</h3>
                </div>   
                <div class="clearfix"></div>
                <div class="col-md-12 jblist">
                	<h3>Post to 100+ Job Boards with One Submission</h3>
                    <div class="jblist-list text-center">
                        <ul class="list-inline">
                            <li class="jbimg"><img src="<?php echo $this->config->base_url();?>media/jobboard/fb.png" class="img-responsive"/></li>
                            <li class="jbimg"><img src="<?php echo $this->config->base_url();?>media/jobboard/twitter.png" class="img-responsive" /></li>
                            <li class="jbimg"><img src="<?php echo $this->config->base_url();?>media/jobboard/gplus.png" class="img-responsive" /></li>
                            <li class="jbimg"><img src="<?php echo $this->config->base_url();?>media/jobboard/indeed.png" class="img-responsive" /></li>
                            <li class="jbimg"><img src="<?php echo $this->config->base_url();?>media/jobboard/cherryhire.png" class="img-responsive" /></li>
                            <li class="jbimg"><img src="<?php echo $this->config->base_url();?>media/jobboard/ipf.png" class="img-responsive" /></li>
                            <li class="jbimg"><img src="<?php echo $this->config->base_url();?>media/jobboard/linkedin.png" class="img-responsive" /></li>
                    	</ul>
                    </div>
                    <div class="clearfix"></div>
                </div>            
 	  	   </div>
           
        </div>
    </section>

	<script type="text/javascript">

		/************Change banner label*****************/

		function chnglabel(labltxt, clabltxt, thelabel, clabel)

		{

			var labelvar = document.getElementById(thelabel);

			var clabelvar = document.getElementById(clabel);

			var sid = document.getElementById(thelabel+'div');

			var hid = document.getElementById(clabel+'div');

			if(thelabel == 'emp') {

				labelvar.innerHTML = "<i class='fa fa-check-square'></i> I'" + "m an " + labltxt;

				clabelvar.innerHTML = "<i class='fa fa-square-o'></i> I'" + "m a " + clabltxt;

			} else {	

				labelvar.innerHTML = "<i class='fa fa-check-square'></i> I'" + "m a " + labltxt;

				clabelvar.innerHTML = "<i class='fa fa-square-o'></i> I'" + "m an " + clabltxt;

			}		

			$(hid).hide();

			$(sid).show();		

		}

		

		/************Close the window*****************/

		function closediv(childdiv, divlabel)

		{

			$('.headbottomdiv').hide();	

			var changebtn = document.getElementById(childdiv);

			if(divlabel == 'emp') {

				changebtn.innerHTML = "<i class='fa fa-square-o'></i> I'" + "m an " + divlabel;

			} else {	

				changebtn.innerHTML = "<i class='fa fa-square-o'></i> I'" + "m a " + divlabel;

			}

		}

		

		/************Form Validation*****************/

		jQuery(document).ready(function ($) {

			/***********************************************************/

			/////////Employer

			$('#fname').bind('keyup blur',function(){ 

				var node = $(this);

				node.val(node.val().replace(/[^a-zA-Z ]/g,'')); 

			});

			

			$('#fname').bind('keypress', function(e) {

				var charCode = e.keyCode || e.which;

				var val = $('#fname').val();

				 if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode==8)  || (charCode==32))

				 {

					 $('#fname').val(val.substr(0, 1).toUpperCase() + val.substr(1));

					 return true;

				 }

				 else {

					return false;

				 }

			});

		

			$('#fname').change(function(){

				var val = $('#fname').val();	

				$('#fname').val(val.substr(0, 1).toUpperCase() + val.substr(1));

			});

			/**************************************************************/

			/////////Candidate

			$('#cname').bind('keyup blur',function(){ 

				var node = $(this);

				node.val(node.val().replace(/[^a-zA-Z ]/g,'')); 

			});

			

			$('#cname').bind('keypress', function(e) {

				var charCode = e.keyCode || e.which;

				var val = $('#cname').val();

				 if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode==8)  || (charCode==32))

				 {

					 $('#cname').val(val.substr(0, 1).toUpperCase() + val.substr(1));

					 return true;

				 }

				 else {

					return false;

				 }

			});

			

			$('#cname').change(function(){

				var val = $('#cname').val();	

				$('#cname').val(val.substr(0, 1).toUpperCase() + val.substr(1));

			});

			/*************************************************************/

		

			// Function that validates email address through a regular expression.

			function validateEmail(sEmail) {

				var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,10}$/;

				if (filter.test(sEmail)) {

					return true;

				}

				else {

					return false;

				}

			}

		

			$.validator.addMethod("formatEmail", function(value, element) {

				var response;	

				var sEmail = value;

				var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,10}$/;

				if (filter.test(sEmail)) {

					return true;

				}

				else {

					return false;

				}	

			}, "");

		

			/***********************************************************/

			/////////Employer	

			$.validator.addMethod("emailExist", function(value, element) {

				var response;	

				//var email=$('#emailid').val();

				var email = value;

				$.ajax({

					type: "POST",

					url: "<?php echo $this->config->base_url(); ?>EmailCheck",

					data:{email:email},

					async:false,

					success:function(data){

						response = data;

					}

				});

				if (response == 0) {

					return true;

				} else {

					return false;

				}

			}, "");

		

			$('#empfrm').validate({ // initialize the plugin

				rules: {

					emailid: {

						required: true,

						email: true,

						emailExist: true,

						formatEmail: true

					},

					fname: {

						required: true

					}

				},

				messages: {

					fname:{

						required: 'Enter your name'

					},

					emailid:{ 

						required: 'Enter your email id',

						email: 'Enter a valid email id',

						emailExist: 'Email id already registered',

						formatEmail: 'Enter a valid email id'

					}

				},

				errorPlacement : function(error, element) {

					//$('#EmpAlert').append(error);

					var name = $(element).attr("name");

					error.appendTo($("#" + name + "_validate"));

				},

				success: function (label, element) {

					label.parent().removeClass('error');

					label.remove();

				}

			});

			/**************************************************************/

			/////////Candidate	

			$.validator.addMethod("uniqueEmail", function(value, element) {

				var response;	

				//var email=$('#cemailid').val();

				var email = value;

				$.ajax({

					type: "POST",

					url: "<?php echo $this->config->base_url(); ?>EmailValid",

					data:{email:email},

					async:false,

					success:function(data){

						response = data;

					}

				});

				if (response == 0) {

					return true;

				} else {

					return false;

				}

			}, "");

	

			$("#candfrm").validate({

				 rules: {

					cemailid:{ 

					   required: true,

					   email: true,

					   uniqueEmail: true,

					   formatEmail: true

					},

					cname:{

						required: true

					}

				 },

				 messages: {

					cname:{

						required: 'Enter your name'

					},

					cemailid:{ 

					   required: 'Enter your email id',

					   email: 'Enter a valid email id',

					   uniqueEmail: 'Email id already registered',

					   formatEmail: 'Enter a valid email id',

					}

				 },

				errorPlacement : function(error, element) {

					//$('#EmpAlert').append(error);

					var name = $(element).attr("name");

					error.appendTo($("#" + name + "_validate"));

				},

				success: function (label, element) {

					label.parent().removeClass('error');

					label.remove();

				}

			});

			/*************************************************************/

		});

	</script>