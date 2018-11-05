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
			<div id="hidden_container"> </div>
            <!-- page content -->
            <div class="right_col" role="main">
                <br />
                <div class="">
                    <div class="row top_tiles"><!-- style="min-height:550px;"-->
                        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-briefcase "></i></div>
                                <div class="count"><?php echo $jobcount; ?></div>
                                <h3>Active Jobs</h3>
                                <!--<p>Pending employer approval</p>-->
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-users"></i></div>
                                <div class="count"><?php echo $candcount; ?></div>
                                <h3>Applications Received</h3>
                                <!--<p>Total active employers</p>-->
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-sitemap "></i></div>
                                <div class="count"><?php if(!empty($subdetails)) { echo $subdetails['sub_nojobs']; } else { echo 0; } ?></div>
                                <h3>Job Posts Remaining</h3>
                                <!--<p>Recent Candidate registration</p>-->
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-trash "></i></div>
                                <div class="count"><?php echo $expjobcount; ?></div>
                                <h3>Closed Jobs</h3>
                                <!--<p>Recent Candidate registration</p>-->
                            </div>
                        </div>
                        <div class="animated flipInY col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-calendar"></i></div>
                                <div class="count"><?php if(!empty($subdetails)) { echo ($subdetails['sub_expire_dt']==0)?'Not Set':date("j-M-Y", strtotime($subdetails['sub_expire_dt'])); } else { echo 'Not Set'; } ?></div>
                                <h3>Expiry Date</h3>
                                <!--<p>Total candidate registration till date</p>-->
                            </div>
                        </div>
                        
                        <div class="clearfix"></div>
                        <?php if($subsType == 1) { ?>
							<div style="margin-top: 16px;" class="alert alert-error">
                            <h2>Free Trial Subscription!</h2>
                            <p>You are now on a free trial subscription. <a href="<?php echo $this->config->base_url();?>Subscriptions" style="color:#FFF;"><strong>Subscribe</strong></a> for a premium account for more job postings and profile downloads. </p>
                        </div>						
						<?php } else { if($subdetails['sub_expire_dt']==0 || $subdetails['sub_nojobs']==0 || $subdetails['sub_expire_dt']<date('Y-m-d H:i:s')) { ?>
                        <div style="margin-top: 16px;" class="alert alert-error">
                            <h2><i class="fa fa-exclamation-triangle"></i> Your validity is over!</h2>
                            <p>Please <a href="<?php echo $this->config->base_url();?>Subscriptions" style="color:#FFF;"><strong>upgrade your plan</strong></a> inorder to have internal jobs posted on Free and Paid Boards.</p>
                        </div>
                        <?php } } ?>
                    </div>
                    
					<!-- Job Track row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Recent Job Posting</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <!-- <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li> -->
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php
                                    if(!empty($top5_job)) {
                                        $x=0;
                                        foreach ($top5_job as $jobresult)
                                        {
                                            $x++; 
                                            $cmon = date('M', strtotime($jobresult->job_created_dt));
                                            $cday = date('d', strtotime($jobresult->job_created_dt));
                                    
                                    ?>
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month"><?php echo $cmon; ?></p>
                                            <p class="day"><?php echo $cday; ?></p>
                                        </a>
                                        <div class="media-body">
                                            <a class="title" href="<?php echo $this->config->base_url();?>Jobs/Viewdetails/<?php echo $jobresult->job_url_id;?>" target="_blank"><?php echo $jobresult->job_title; ?></a>
                                            <p><?php echo $jobresult->fun_name.', '.$jobresult->job_location; ?></p>
                                        </div>
                                    </article>
                                    <?php }} ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Latest Applications</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li class="pull-right"><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                        <!-- <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li> -->
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php
                                    if(!empty($top5_candidate)) {
                                        $x=0;
                                        foreach ($top5_candidate as $canresult)
                                        {
                                            $x++; 
                                            $cmon = date('M', strtotime($canresult->can_upd_date));
                                            $cday = date('d', strtotime($canresult->can_upd_date));
                                    
                                    ?>
                                    <article class="media event">
                                        <a class="pull-left date">
                                            <p class="month"><?php echo $cmon; ?></p>
                                            <p class="day"><?php echo $cday; ?></p>
                                        </a>
                                        <div class="media-body">
                                            <a href="<?php echo $this->config->base_url();?>Apply/ViewProfile/<?php echo $canresult->can_encrypt_id.'/'.$canresult->job_url_id;?>" target="_blank"><strong><?php echo $canresult->can_fname.' '.$canresult->can_lname; ?></strong></a>
                                            <p><?php echo $canresult->fun_name.', '.$canresult->can_curr_loc; ?></p>
                                            <p><a href="<?php echo $this->config->base_url();?>Jobs/Viewdetails/<?php echo $canresult->job_url_id;?>"><?php echo 'Applied for : '.$canresult->job_title.', '.$canresult->job_location; ?></a></p>
                                        </div>
                                    </article>
                                    <?php }} ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Job Track row endds-->

                <!--
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Application Summary <small>Application progress</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-9 col-sm-12 col-xs-12">
                                        <div style="position:absolute; z-index:9999; left:-35px; top:25%; transform: rotate(-90deg); transform-origin: right, top; -ms-transform: rotate(-90deg); -ms-transform-origin:right, top; -webkit-transform: rotate(-90deg);  -webkit-transform-origin:right, top;">no of jobs</div>
                                        <div style="position:absolute; z-index:9999; top:69%; left:50%;">application date</div>
                                        <div class="demo-container" style="height:280px">
                                            <div id="placeholder33x" class="demo-placeholder"></div>
                                        </div>
                                        <div class="tiles">
                                            <div class="col-md-4 tile">
                                                <span>Social Media</span>
                                                <h2>Total : <?php echo number_format($totcv,0);?></h2>
                                                <span class="smchart graph" style="height: 160px;">
                                                    <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                                </span>
                                            </div>
                                            <div class="col-md-4 tile">
                                                <span>Job Portals</span>
                                                <h2>Total : <?php echo number_format($jptotcv,0);?></h2>
                                                <span class="jpchart graph" style="height: 160px;">
                                                    <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                                </span>
                                            </div>
                                            <div class="col-md-4 tile">
                                                <span>Referrals</span>
                                                <h2>Total : <?php echo number_format($reftotcv,0);?></h2>
                                                <span class="refchart graph" style="height: 160px;">
                                                    <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                                </span>
                                            </div>
                                        </div>

                                    </div>

                                    
                                    <div class="col-md-3 col-sm-12 col-xs-12">
                                        <div>
                                            <div class="x_title">
                                                <h2>Subscription Summary</h2>
                                                <div class="clearfix"></div>
                                            </div>
                                            <ul class="list-unstyled top_profiles scroll-view">
                                                <?php if(!empty($top5_bills)) { $x=0; foreach ($top5_bills as $tranresult) { $x++; ?>
												<?php
                                                    if($x%2 == 0)
                                                    {
                                                        $tdcls = 'green';
                                                    }
                                                    else
                                                    {
                                                        $tdcls = 'aero';
                                                    }
                                                    
                                                ?>
                                                
                                                <li class="media event">
                                                    <a class="pull-left border-<?php echo $tdcls; ?> profile_thumb">
                                                        <i class="fa fa-history <?php echo $tdcls; ?>"></i>
                                                    </a>
                                                    <div class="media-body">
                                                        <a class="title" href="#"><?php echo $tranresult->ord_product; ?></a>
                                                        <p><strong>Amount: $ <?php echo $tranresult->ord_amt; ?></strong> </p>
                                                        <p> <small><?php echo date("F j, Y", strtotime($tranresult->ord_date)); ?></small>
                                                        </p>
                                                    </div>
                                                </li>
                                                <?php } } ?>
                                                
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                -->
                
                <!--    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Job Posting Summary <small>Last 20 days</small></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">

                                    <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                                        <div class="col-md-7" style="overflow:hidden;">
                                            <span class="sparkline_one" style="height: 160px; padding: 10px 25px;">
                                    <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                </span>
                                            <h4 style="margin:18px">Weekly posting progress</h4>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="row" style="text-align: center;">
                                                <div class="col-md-4">
                                                    <canvas id="canvas1i" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                                    <h4 style="margin:0">Posting Rates</h4>
                                                </div>
                                                <div class="col-md-4">
                                                    <canvas id="canvas1i2" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                                    <h4 style="margin:0">New Application</h4>
                                                </div>
                                                <div class="col-md-4">
                                                    <canvas id="canvas1i3" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                                    <h4 style="margin:0">Share or Views</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                
                -->
                    
                    
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
    
    <script type="text/javascript">
    
    function handle_response1(data){
        $("#hidden_container").empty();
        var response = $("#hidden_container").html(data);
        var status = response.find("status").html();
        if(status=="ok") return "Redirecting"
        else return response.find("message").html()
    }
    
    function do_hirewand_login(){
        var email = '<?php echo $this->session->userdata('hireemail'); ?>'
        var pass = '<?php echo $this->session->userdata('hirepwd'); ?>'
        var url = 'http://peoplesearch.cherryhire.com/user/signin?email='+email+'&password='+pass+'&remember_me=true&GMTOffset=-330'
        $.ajax({
			url: url,
			dataType: 'html',	
			xhrFields: {
				withCredentials: true
			},
			success: function(data,status) {
						//alert(data);
				var resp = handle_response1(data)
						//alert(resp)
						if(resp=='Redirecting'){window.location = "http://peoplesearch.cherryhire.com/hire/dashboard"}
					}
	    });
    }
    
</script>

	<!-- flot -->
    <script type="text/javascript">
        //define chart clolors ( you maybe add more colors if you want or flot will add it automatic )
        var chartColours = ['#96CA59', '#3F97EB', '#72c380', '#6f7a8a', '#f7cb38', '#5a8022', '#2c7282'];

        //generate random number for charts
        randNum = function () {
            //return (Math.floor(Math.random() * (1 + 40 - 20))) + 20;
			return rangeNum();
        }

        $(function () {
			var d1 = new Array();
			var d3 = [];
			var d2 = [];
			
            var d2 = [<?php echo $apply_rangenum; ?>];
			
            //here we generate data for chart
			for (var i = 0; i < 11; i++) {
                //d1.push([new Date(Date.today().add(i).days()).getTime(), randNum() + i + i + 10]);
				
				//d1.push([new Date(Date.today().add(i-10).days()).getTime(), randNum() + i + i + 10]);
				d1.push([new Date(Date.today().add(i-10).days()).getTime(), d2[i]]);
                //d2.push([new Date(Date.today().add(i).days()).getTime(), randNum()]);
            }
			
			var chartMinDate = d1[0][0]; //first day
            var chartMaxDate = d1[10][0]; //last day

            var tickSize = [1, "day"];
            var tformat = "%d/%m/%y";

            //graph options
            var options = {
                grid: {
                    show: true,
                    aboveData: true,
                    color: "#3f3f3f",
                    labelMargin: 10,
                    axisMargin: 0,
                    borderWidth: 0,
                    borderColor: null,
                    minBorderMargin: 5,
                    clickable: true,
                    hoverable: true,
                    autoHighlight: true,
                    mouseActiveRadius: 100
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        lineWidth: 2,
                        steps: false
                    },
                    points: {
                        show: true,
                        radius: 4.5,
                        symbol: "circle",
                        lineWidth: 3.0
                    }
                },
                legend: {
                    position: "ne",
                    margin: [0, -25],
                    noColumns: 0,
                    labelBoxBorderColor: null,
                    labelFormatter: function (label, series) {
                        // just add some space to labes
                        return label + '&nbsp;&nbsp;';
                    },
                    width: 40,
                    height: 1
                },
                colors: chartColours,
                shadowSize: 0,
                tooltip: true, //activate tooltip
                tooltipOpts: {
                    content: "%s: %y.0",
                    xDateFormat: "%d/%m",
                    shifts: {
                        x: -30,
                        y: -50
                    },
                    defaultTheme: false
                },
                yaxis: {
                    min: 0,
					axisLabel: 'bar',
					axisLabelUseCanvas: true
                },
                xaxis: {
                    mode: "time",
                    minTickSize: tickSize,
                    timeformat: tformat,
                    min: chartMinDate,
                    max: chartMaxDate,
					axisLabel: 'foo',
					axisLabelUseCanvas: true,
					axisLabelFontSizePixels: 20,
					axisLabelFontFamily: 'Arial'
                }
            };
            var plot = $.plot($("#placeholder33x"), [{
                label: "Job Application",
                data: d1,
                lines: {
                    fillColor: "rgba(150, 202, 89, 0.12)"
                }, //#96CA59 rgba(150, 202, 89, 0.42)
                points: {
                    fillColor: "#fff"
                }
            }], options);
        });
    </script>
    <!-- /flot -->
    
    <!--  -->
    <script>
        $('document').ready(function () {
            $(".sparkline_one").sparkline([<?php echo $rangenum; ?>], {
                type: 'bar',
                height: '125',
                barWidth: 13,
                colorMap: {
                    '7': '#a1a1a1'
                },
                barSpacing: 2,
                barColor: '#26B99A'
            });

            $(".sparkline11").sparkline([2, 4, 3, 4, 5, 4, 5, 4, 3, 4, 6, 2, 4, 3, 4, 5, 4, 5, 4, 3], {
                type: 'bar',
                height: '40',
                barWidth: 8,
                colorMap: {
                    '7': '#a1a1a1'
                },
                barSpacing: 2,
                barColor: '#26B99A'
            });
			
			$(".smchart").sparkline([<?php echo $sm_rangenum; ?>], {
                type: 'bar',
                height: '40',
                barWidth: 8,
                colorMap: {
                    '7': '#a1a1a1'
                },
                barSpacing: 2,
                barColor: '#26B99A'
            });
			
			$(".refchart").sparkline([<?php echo $ref_rangenum; ?>], {
                type: 'bar',
                height: '40',
                barWidth: 8,
                colorMap: {
                    '7': '#a1a1a1'
                },
                barSpacing: 2,
                barColor: '#26B99A'
            });

            $(".jpchart").sparkline([<?php echo $jp_rangenum; ?>], {
                type: 'line',
                height: '40',
                width: '200',
                lineColor: '#26B99A',
                fillColor: '#ffffff',
                lineWidth: 3,
                spotColor: '#34495E',
                minSpotColor: '#34495E'
            });

            var doughnutData = [
                {
                    value: 30,
                    color: "#455C73"
                },
                {
                    value: 30,
                    color: "#9B59B6"
                },
                {
                    value: 60,
                    color: "#BDC3C7"
                },
                {
                    value: 100,
                    color: "#26B99A"
                },
                {
                    value: 120,
                    color: "#3498DB"
                }
        ];
            var myDoughnut = new Chart(document.getElementById("canvas1i").getContext("2d")).Doughnut(doughnutData);
            var myDoughnut = new Chart(document.getElementById("canvas1i2").getContext("2d")).Doughnut(doughnutData);
            var myDoughnut = new Chart(document.getElementById("canvas1i3").getContext("2d")).Doughnut(doughnutData);
        });
    </script>
    <!-- -->
    
    <!-- datepicker -->
    <script type="text/javascript">
        $(document).ready(function () {

            var cb = function (start, end, label) {
                console.log(start.toISOString(), end.toISOString(), label);
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                //alert("Callback has fired: [" + start.format('MMMM D, YYYY') + " to " + end.format('MMMM D, YYYY') + ", label = " + label + "]");
            }

            var optionSet1 = {
                startDate: moment().subtract(29, 'days'),
                endDate: moment(),
                minDate: '01/01/2012',
                maxDate: '12/31/2015',
                dateLimit: {
                    days: 60
                },
                showDropdowns: true,
                showWeekNumbers: true,
                timePicker: false,
                timePickerIncrement: 1,
                timePicker12Hour: true,
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                opens: 'left',
                buttonClasses: ['btn btn-default'],
                applyClass: 'btn-small btn-primary',
                cancelClass: 'btn-small',
                format: 'MM/DD/YYYY',
                separator: ' to ',
                locale: {
                    applyLabel: 'Submit',
                    cancelLabel: 'Clear',
                    fromLabel: 'From',
                    toLabel: 'To',
                    customRangeLabel: 'Custom',
                    daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                    monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                    firstDay: 1
                }
            };
            $('#reportrange span').html(moment().subtract(29, 'days').format('MMMM D, YYYY') + ' - ' + moment().format('MMMM D, YYYY'));
            $('#reportrange').daterangepicker(optionSet1, cb);
            $('#reportrange').on('show.daterangepicker', function () {
                console.log("show event fired");
            });
            $('#reportrange').on('hide.daterangepicker', function () {
                console.log("hide event fired");
            });
            $('#reportrange').on('apply.daterangepicker', function (ev, picker) {
                console.log("apply event fired, start/end dates are " + picker.startDate.format('MMMM D, YYYY') + " to " + picker.endDate.format('MMMM D, YYYY'));
            });
            $('#reportrange').on('cancel.daterangepicker', function (ev, picker) {
                console.log("cancel event fired");
            });
            $('#options1').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet1, cb);
            });
            $('#options2').click(function () {
                $('#reportrange').data('daterangepicker').setOptions(optionSet2, cb);
            });
            $('#destroy').click(function () {
                $('#reportrange').data('daterangepicker').remove();
            });
        });
    </script>
    <!-- /datepicker -->

</body>
</html>