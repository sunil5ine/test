<!DOCTYPE html>

<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">

    <meta name="author" content="Dashboard">

    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">



    <title><?php echo $title; ?></title>

	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->config->base_url();?>images/favicon.ico" />

    <!-- Bootstrap core CSS -->

    <link href="<?php echo $this->config->base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo $this->config->base_url();?>fonts/css/font-awesome.min.css" rel="stylesheet">

    <link href="<?php echo $this->config->base_url();?>css/animate.min.css" rel="stylesheet">



    <!-- Custom styling plus plugins -->

    <link href="<?php echo $this->config->base_url();?>css/custom.css" rel="stylesheet">

    <link href="<?php echo $this->config->base_url();?>css/icheck/flat/green.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url();?>css/progressbar/bootstrap-progressbar-3.3.0.css">

    <link href="<?php echo $this->config->base_url();?>css/datatables/tools/css/dataTables.tableTools.css" rel="stylesheet">

    <link href="<?php echo $this->config->base_url();?>css/calendar/fullcalendar.css" rel="stylesheet">

    <link href="<?php echo $this->config->base_url();?>css/calendar/fullcalendar.print.css" rel="stylesheet" media="print">



    <!-- editor -->

    <link href="<?php echo $this->config->base_url();?>css/editor/external/google-code-prettify/prettify.css" rel="stylesheet">

    <link href="<?php echo $this->config->base_url();?>css/editor/index.css" rel="stylesheet">

    <!-- select2 -->

    <link href="<?php echo $this->config->base_url();?>css/select/select2.min.css" rel="stylesheet">

    <!-- switchery -->

    <link rel="stylesheet" href="<?php echo $this->config->base_url();?>css/switchery/switchery.min.css" />

    <script src="<?php echo $this->config->base_url();?>js/jquery.min.js"></script>



    <!--[if lt IE 9]>

        <script src="../assets/js/ie8-responsive-file-warning.js"></script>

        <![endif]-->



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

        <![endif]-->



    <style>

	#pagination{

	margin: 40 40 0;

	}

	ul.tsc_pagination li a

	{

	border:solid 1px;

	border-radius:3px;

	-moz-border-radius:3px;

	-webkit-border-radius:3px;

	padding:6px 9px 6px 9px;

	}

	ul.tsc_pagination li

	{

	padding-bottom:1px;

	}

	ul.tsc_pagination li a:hover,

	ul.tsc_pagination li a.current

	{

	color:#FFFFFF;

	box-shadow:0px 1px #EDEDED;

	-moz-box-shadow:0px 1px #EDEDED;

	-webkit-box-shadow:0px 1px #EDEDED;

	}



	ul.tsc_pagination

	{

	margin:4px 0;

	padding:0px;

	height:100%;

	overflow:hidden;

	font:12px 'Tahoma';

	list-style-type:none;

	}



	ul.tsc_pagination li

	{

	float:left;

	margin:0px;

	padding:0px;

	margin-left:5px;

	}

	ul.tsc_pagination li a

	{

	color:black;

	display:block;

	text-decoration:none;

	padding:7px 10px 7px 10px;

	}

	ul.tsc_pagination li a img

	{

	border:none;

	}

	ul.tsc_pagination li a

	{

	color:#0A7EC5;

	border-color:#8DC5E6;

	background:#F8FCFF;

	}

	ul.tsc_pagination li a:hover,

	ul.tsc_pagination li a.current

	{

	text-shadow:0px 1px #388DBE;

	border-color:#3390CA;

	background:#58B0E7;

	background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);

	background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));

	}

	</style>    

</head>



<body class="nav-md">

	<div class="container body">

        <div class="main_container">

			<!-- top navigation -->

			<div class="col-md-12 col-sm-12 col-xs-12">

            	<a href="<?php echo $this->config->base_url();?>JobPortal/List/?company=<?php echo base64_encode($this->encryption->encrypt($portalurl)); ?>" class="site_title"><?php echo $portalname; ?></a>

                <div class="clearfix"></div>

            </div>

            <!-- /top navigation -->

		<!-- page content -->

		<div role="main">

    		<div class="">

            	<br>

                    <div class="page-title">

                    	<?php echo $message; ?>

                    </div>

                    <div class="clearfix"></div>

					<br>

                    <div class="row">

						

                        <div class="col-md-6 col-xs-12">

                            <div class="x_panel">

                                <div class="x_title">

                                    <h2><?php echo $jobdata['job_title']; ?></h2>

                                    <div class="clearfix"></div>

                                </div>

                                <div class="x_content">

                                    <br />

                                    	<div class="row form-group">

                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <i class="fa fa-building"></i> <strong>Hiring For : </strong><?php echo $jobdata['emp_comp_name']; ?>

                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <i class="fa fa-map-marker"></i> <strong>Location :</strong> <?php echo $jobdata['job_location']; ?>

                                            </div>

                                        </div>

                                        <div class="row form-group">

                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <i class="fa fa-windows"></i> <strong>Function Area :</strong> <?php echo $jobdata['fun_name'];?>

                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <i class="fa fa-group"></i> <strong>Job Role :</strong> <?php echo $jobdata['jr_name'];?>

                                            </div>

                                        </div>

                                        <div class="row form-group">

                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <i class="fa fa-sitemap"></i> <strong>Industry :</strong> <?php echo $jobdata['ind_name'];?>

                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <i class="fa fa-graduation-cap"></i> <strong>Education :</strong> <?php echo $jobdata['edu_name']; ?>

                                            </div>

                                        </div>

                                        <div class="row form-group">

                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <i class="fa fa-clock-o"></i> <strong>Experience :</strong> <?php echo $jobdata['job_min_exp'];?> Yrs ~  <?php echo $jobdata['job_max_exp'];?> Yrs

                                            </div>

                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                <i class="fa fa-inr"></i> <strong>Salary :</strong> <?php echo $jobdata['job_min_sal'];?> Lakh/Yr to <?php echo $jobdata['job_max_sal'];?> Lakh/Yr

                                            </div>

                                        </div>

                                        <div class="row form-group">

                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                <i class="fa fa-tags"></i> <strong>Skills :</strong> <?php echo $jobdata['job_skills'];?>

                                        	</div>

                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="ln_solid"></div>

                                        <div class="row form-group">

                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                <i class="fa fa-book"></i> <strong>Job Description :</strong> 

                                        	</div>

                                        </div>

                                        <div class="row form-group">

                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                <?php echo $jobdata['job_desc'];?> 

                                        	</div>

                                        </div>

                                        <div class="clearfix"></div>

                                        <div class="ln_solid"></div>

                                        <div class="row form-group">

                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                <i class="fa fa-home"></i> <strong>About Company :</strong> 

                                        	</div>

                                        </div>

                                        <div class="row form-group">

                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                <?php echo $jobdata['emp_desc'];?> 

                                        	</div>

                                        </div>

                              </div>

                            </div>

                        </div>

                        

                        <div class="col-md-6 col-xs-12">

                            <div class="x_panel">

                                <div class="x_title">

                                    <h2>Apply for this position <!--<small>different form elements</small>--></h2>

                                    <div class="clearfix"></div>

                                </div>

                                <form class="form-horizontal form-label-left input_mask" action="<?php echo base_url(); ?>JobPortal/Apply/?jobid=<?php echo base64_encode($this->encryption->encrypt($jobid)); ?>&company=<?php echo base64_encode($this->encryption->encrypt($portalurl)); ?>" method="post" enctype="multipart/form-data">

                                <div class="x_content">

                                    <br />

                                    	<input name="jobid" id="jobid" type="hidden" value="<?php echo $jobid; ?>">

										<div class="form-group">

                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                 <input type="text" class="form-control  has-feedback-left" id="firstname" name="firstname" placeholder="First Name" required  value="<?php echo $formdata['firstname']; ?>">

                                                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>

                                            </div>

                                            

                                            <div class="col-md-6 col-sm-6 col-xs-12">

                                                 <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" required  value="<?php echo $formdata['lastname']; ?>">

                                                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>

                                            </div>

                                        </div>

                                        

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                            <input type="text" class="form-control  has-feedback-left" id="emailid" name="emailid" placeholder="Email ID" required  value="<?php echo $formdata['emailid']; ?>">

                                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>

                                        </div>

                                        

                                        <div class="col-md-2 col-sm-2 col-xs-12 form-group">

                                            <input type="text" class="form-control" placeholder="ISD Code" value="<?php echo $formdata['cntrycode']; ?>"  name="cntrycode" id="cntrycode" required >

                                        </div>

                                        

                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">

                            				<input type="text" class="form-control" placeholder="Contact Number" value="<?php echo $formdata['phone']; ?>" name="phone" id="phone" required >

                                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>

                                        </div>

                                        <div class="form-group">

                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                <input type="file" class="form-control input_syle" id="fileToUpload" name="fileToUpload" required>

                                            </div>

                                        </div>



                                        

                                        <div class="clearfix"></div>

                                        <div class="ln_solid"></div>

                                        

                                        <div class="col-md-12 col-sm-12 col-xs-12">

                                                <i class="fa fa-plus-circle"></i> <strong>Optional Fields :</strong> 

                                                <br> 

                                                <p>Additional information will help in shortlisting your resume quickly!</p>

                                        </div>

                                		<br>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                            <input type="text" class="form-control  has-feedback-left" id="currloc" name="currloc" placeholder="Current Location" value="<?php echo $formdata['phone']; ?>">

                                            <span class="fa fa-map-marker form-control-feedback left" aria-hidden="true"></span>

                                        </div>

                                        

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                            <input type="text" class="form-control" id="curremp" name="curremp" placeholder="Current Employer" value="<?php echo $formdata['phone']; ?>">

                                            <span class="fa fa-building form-control-feedback right" aria-hidden="true"></span>

                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                            <?php echo form_dropdown('jrole',$jrole_list,$formdata['jrole'],'id="jrole" class=" form-control has-feedback-left" tabindex="1"');?>

                                            <span class="fa fa-group form-control-feedback left" aria-hidden="true"></span>

                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                            <?php echo form_dropdown('currsal',$get_maxsal,$formdata['currsal'],'id="currsal" class=" form-control has-feedback-left" tabindex="1"');?>

                                            <span class="fa fa-inr form-control-feedback left" aria-hidden="true"></span>

                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                            <?php echo form_dropdown('exp',$maxexp_list,$formdata['exp'],'id="exp" class=" form-control has-feedback-left" tabindex="1"');?>

                                            <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>

                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                            <?php echo form_dropdown('edu',$edu_list,$formdata['edu'],'id="edu" class=" form-control has-feedback-left" tabindex="1"');?>

                                            <span class="fa fa-graduation-cap form-control-feedback left" aria-hidden="true"></span>

                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                            <?php echo form_dropdown('farea',$funarea_list,$formdata['farea'],'id="farea" class=" form-control has-feedback-left" tabindex="1"');?>

                                            <span class="fa fa-windows form-control-feedback left" aria-hidden="true"></span>

                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                            <?php echo form_dropdown('industry',$industry_list,$formdata['industry'],'id="industry" class=" form-control has-feedback-left" tabindex="1"');?>

                                            <span class="fa fa-sitemap form-control-feedback left" aria-hidden="true"></span>

                                        </div>

                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">

                                            <?php echo form_dropdown('nation',$country_list,$formdata['nation'],'id="nation" class=" form-control has-feedback-left" tabindex="1"');?>

                                            <span class="fa fa-flag form-control-feedback left" aria-hidden="true"></span>

                                        </div>

                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">

                                            <select name="gender" id="gender" class="form-control has-feedback-left">

                                              <option disabled selected value="">Gender</option>

                                              <option <?php echo ($formdata['gender']=='Male')?'selected':''; ?> value="Male">Male</option>

                                              <option <?php echo ($formdata['gender']=='Female')?'selected':''; ?>  value="Female">Female</option>

                                           </select>

                                            <span class="fa fa-female form-control-feedback left" aria-hidden="true"></span>

                                        </div>

                                        <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">

                                            <input type="text" class="form-control" id="socialmedia" name="socialmedia" placeholder="LinkedIn Link" value="<?php echo $formdata['socialmedia']; ?>">

                                            <span class="fa fa-linkedin form-control-feedback right" aria-hidden="true"></span>

                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">

                                            <input type="text" class="form-control has-feedback-left" id="skills" name="skills" placeholder="Skills - ex: PHP, Oracle, Android, RDBMS..." value="<?php echo $formdata['skills']; ?>">

                                            <span class="fa fa-tags form-control-feedback left" aria-hidden="true"></span>

                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">

                                            <input type="text" class="form-control has-feedback-left" id="resumehead" name="resumehead" placeholder="Resume Headlines" value="<?php echo $formdata['resumehead']; ?>">

                                            <span class="fa fa-file-word-o form-control-feedback left" aria-hidden="true"></span>

                                        </div>

                                        

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">

                                            <textarea class="form-control has-feedback-left" placeholder="Cover Letter" name="covernotes" id="covernotes"><?php echo $formdata['covernotes']; ?></textarea> 

                                            <span class="fa fa-copy form-control-feedback left" aria-hidden="true"></span>

                                        </div>

                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">

                                            <input type="checkbox" name="relocate" id="relocate" value="1" <?php echo ($formdata['relocate']==1)?'checked':''; ?> > Willing to relocate?. 

                                        </div>

                                        <div class="col-md-8 col-sm-8 col-xs-12 form-group">

                                            <input type="checkbox" name="jobalert" id="jobalert" value="1" <?php echo ($formdata['jobalert']==1)?'checked':''; ?> > Create a Job Alert - Get the jobs in your inbox every day. 

                                        </div>

                                        

                                        <div class="clearfix"></div>

                                        <div class="ln_solid"></div>



                                        <div class="form-group">

                                            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5">

                                                <button type="reset" class="btn btn-primary"  tabindex="17">Cancel</button>

                                                <button type="submit" class="btn btn-success"  tabindex="16">Submit</button>

                                            </div>

                                        </div>

                                        

                            		</div>

                    		</form>

                    		</div>

                        

                        	<br />

                        	<br />

                        	<br />



                    </div>

                	</div>

    		<!-- footer content -->

    		<?php echo $footer_nav; ?>

        	<!-- /footer content -->

    		</div>

    	</div>    

    	<!-- /page content -->

      

		<script type="text/javascript">

        jQuery(document).ready(function() {  

                $.fn.editable.defaults.mode = 'popup';

                $('.is_editable').editable();

        });

        </script>

        <script>

            var asInitVals = new Array();

                    $(document).ready(function () {

                        var oTable = $('#mechantlist').dataTable({

                            "oLanguage": {

                                "sSearch": "Search all columns:"

                            },

                            "aoColumnDefs": [

                                {

                                    'bSortable': false,

                                    'aTargets': [0, 1]

                                } //disables sorting for column one

                            ],

                            "aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],

                            "iDisplayLength": 25,

                            "sPaginationType": "full_numbers",

                            

                        });

                        $("tfoot input").keyup(function () {

                            /* Filter on the column based on the index of this element's parent <th> */

                            oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));

                        });

                        $("tfoot input").each(function (i) {

                            asInitVals[i] = this.value;

                        });

                        $("tfoot input").focus(function () {

                            if (this.className == "search_init") {

                                this.className = "";

                                this.value = "";

                            }

                        });

                        $("tfoot input").blur(function (i) {

                            if (this.value == "") {

                                this.className = "search_init";

                                this.value = asInitVals[$("tfoot input").index(this)];

                            }

                        });

                    });

        </script>

		</div>

    </div>

    <div id="custom_notifications" class="custom-notifications dsp_none">

        <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">

        </ul>

        <div class="clearfix"></div>

        <div id="notif-group" class="tabbed_notifications"></div>

    </div>

    <script src="<?php echo $this->config->base_url();?>js/bootstrap.min.js"></script>

    <script src="<?php echo $this->config->base_url();?>js/nicescroll/jquery.nicescroll.min.js"></script>



    <!-- chart js -->

    <script src="<?php echo $this->config->base_url();?>js/chartjs/chart.min.js"></script>

    <!-- bootstrap progress js -->

    <script src="<?php echo $this->config->base_url();?>js/progressbar/bootstrap-progressbar.min.js"></script>

    <!-- icheck -->

    <script src="<?php echo $this->config->base_url();?>js/icheck/icheck.min.js"></script>

    <!-- daterangepicker -->

    <script type="text/javascript" src="<?php echo $this->config->base_url();?>js/moment.min2.js"></script>

    <script type="text/javascript" src="<?php echo $this->config->base_url();?>js/datepicker/daterangepicker.js"></script>

    <!-- sparkline -->

    <script src="<?php echo $this->config->base_url();?>js/sparkline/jquery.sparkline.min.js"></script>

    <script src="<?php echo $this->config->base_url();?>js/custom.js"></script>



    <!-- flot js -->

    <!--[if lte IE 8]><script type="text/javascript" src="js/excanvas.min.js"></script><![endif]-->

    <script type="text/javascript" src="<?php echo $this->config->base_url();?>js/flot/jquery.flot.js"></script>

    <script type="text/javascript" src="<?php echo $this->config->base_url();?>js/flot/jquery.flot.pie.js"></script>

    <script type="text/javascript" src="<?php echo $this->config->base_url();?>js/flot/jquery.flot.orderBars.js"></script>

    <script type="text/javascript" src="<?php echo $this->config->base_url();?>js/flot/jquery.flot.time.min.js"></script>

    <script type="text/javascript" src="<?php echo $this->config->base_url();?>js/flot/date.js"></script>

    <script type="text/javascript" src="<?php echo $this->config->base_url();?>js/flot/jquery.flot.spline.js"></script>

    <script type="text/javascript" src="<?php echo $this->config->base_url();?>js/flot/jquery.flot.stack.js"></script>

    <script type="text/javascript" src="<?php echo $this->config->base_url();?>js/flot/curvedLines.js"></script>

    <script type="text/javascript" src="<?php echo $this->config->base_url();?>js/flot/jquery.flot.resize.js"></script>

        <script type="text/javascript" src="<?php echo $this->config->base_url();?>js/bootstrap-filestyle.js"></script>

    <script type="text/javascript">

	$('#fileToUpload').filestyle({

		buttonName : 'btn-danger'

	});

</script>



</body>

</html>