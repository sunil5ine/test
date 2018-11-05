<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <!-- Bootstrap core CSS -->
    <link href="<?php echo $this->config->base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url();?>fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url();?>css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="<?php echo $this->config->base_url();?>css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo $this->config->base_url();?>css/maps/jquery-jvectormap-2.0.1.css" />
    <link href="<?php echo $this->config->base_url();?>css/icheck/flat/green.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url();?>css/floatexamples.css" rel="stylesheet" />
    <script src="<?php echo $this->config->base_url();?>js/jquery.min.js"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

</head>
<body class="nav-md">
    <div class="container body">
        <div class="main_container">
			<!-- left navigation -->	
            <?php echo $left_nav; ?>
			<!-- /left navigation -->

            <!-- top navigation -->
            <?php echo $top_nav; ?>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row top_tiles" style="min-height:550px;">
                        <div class="text-center text-center">
                        <h1 class="error-number">404</h1>
                        <h2>Sorry but we couldnt find this page</h2>
                        <p>This page you are looking for does not exsist <a href="#">Report this?</a>
                        </p>
                        <!--<div class="mid_center">
                            <h3>Search</h3>
                            <form>
                                <div class="col-xs-12 form-group pull-right top_search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search for...">
                                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                                    </div>
                                </div>
                            </form>
                        </div>-->
                    </div>
                    </div>

                </div>



                <!-- footer content -->

                <footer>

                    <div class="">

                        <p class="pull-right">&copy; <?php echo date('Y'); ?> All Rights Reserved.  

                            <span class="lead"> <img src="<?php echo $this->config->base_url();?>images/pagefooter.png" alt="Cherry Hire"></span>

                        </p>

                    </div>

                    <div class="clearfix"></div>

                </footer>

                <!-- /footer content -->



            </div>

            <!-- /page content -->

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