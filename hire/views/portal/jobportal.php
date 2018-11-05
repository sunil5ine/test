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

            	<a href="#" class="site_title"><?php echo $portalname; ?></a>

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



                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="x_panel">

                                <div class="x_title">

                                    <h2><?php echo $pagehead; ?></h2>

                                    <ul class="nav navbar-right panel_toolbox">

                                    </ul>

                                    <div class="clearfix"></div>

                                </div>

                                <div class="x_content">

                                    <table id="mechantlist" class="table table-striped responsive-utilities jambo_table">

                                        



                                        <tbody>

                                        <?php if(!empty($records)) { $x=0; foreach ($records as $result) { $x++; ?>

                                        <?php

											if($x%2 == 0)

											{

												$tdcls = 'even pointer';

											}

											else

											{

												$tdcls = 'odd pointer';

											}

										?>

                                            <tr class="<?php echo $tdcls; ?>">

                                                <td class=" " width="80%">

												<div class="col-md-12 col-sm-12 col-xs-12">

                                                	<h2><a href="#"><?php echo $result->job_title;?></a> [#<?php echo $result->job_id;?>]</h2>

                                                	<div class="row form-group">

                                                        <div class="col-md-3 col-sm-3 col-xs-12"><i class="fa fa-building"></i> <?php echo $result->emp_comp_name;?></div>

                                                        <div class="col-md-3 col-sm-3 col-xs-12"><i class="fa fa-map-marker"></i> <?php echo $result->job_location;?></div>

                                                        <div class="col-md-6 col-sm-3 col-xs-12"><i class="fa fa-sitemap"></i> <?php echo $result->fun_name;?></div>

                                                    </div>

                                                    

                                                    <div class="row form-group">

                                                        <div class="col-md-3 col-sm-3 col-xs-12"><i class="fa fa-clock-o"></i> <?php echo $result->job_min_exp;?> Yrs ~  <?php echo $result->job_max_exp;?> Yrs</div>

                                                        <div class="col-md-3 col-sm-3 col-xs-12"><i class="fa fa-inr"></i> <?php echo $result->job_min_sal;?> Lakh/Yr to <?php echo $result->job_max_sal;?> Lakh/Yr</div>

                                                    

                                                        <div class="col-md-3 col-sm-3 col-xs-12"><i class="fa fa-graduation-cap"></i> <?php echo $result->edu_name;?></div>

                                                        <div class="col-md-3 col-sm-3 col-xs-12"><i class="fa fa-calendar"></i> <?php echo date('d/m/Y', strtotime($result->job_created_dt));?> by <?php echo $result->emp_fname;?></div>

                                                    </div>

                                                    <div class="row form-group">

                                                        <div class="col-md-12 col-sm-12 col-xs-12"><i class="fa fa-tags"></i> <?php echo $result->job_skills;?></div>

                                                    </div>

                                                </div>

												

                                                

                                                </td>

                                                <td class=" " width="20%">

                                                <a title="Apply" href="<?php echo $this->config->base_url().'JobPortal/Job/?jobid='.base64_encode($this->encryption->encrypt($result->job_id)).'&company='.base64_encode($this->encryption->encrypt($portalurl));?>"><button class="btn btn-success" style="margin-right: 5px; margin-top: 55px;"><i class="fa fa-share"></i> Apply Now</button></a>

                                                </td>

                                            </tr>

                                            <?php  } }?>

                                            

                                        </tbody>



                                    </table>

                                </div>

                            </div>

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

</body>

</html>