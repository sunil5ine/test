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

    <meta name="keyword" content="CherryHire">



    <title><?php echo $title; ?></title>



    <!-- Bootstrap core CSS -->

    <link href="<?php echo $this->config->base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo $this->config->base_url();?>fonts/css/font-awesome.min.css" rel="stylesheet">

    <link href="<?php echo $this->config->base_url();?>css/animate.min.css" rel="stylesheet">
    
    <link href="<?php echo $this->config->base_url();?>css/jquery-ui.css" rel="stylesheet">



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
    
    <!-- New Tag Input -->
    <link rel="stylesheet" href="<?php echo $this->config->base_url();?>css/tagsly.css" />

    <link rel="stylesheet" href="<?php echo $this->config->base_url();?>css/jquery.tagsinput.css" />

    <script src="<?php echo $this->config->base_url();?>js/jquery.min.js"></script>

    <script src="<?php echo $this->config->base_url();?>js/jquery.tagsinput.js"></script>
    
    <script src="<?php echo $this->config->base_url();?>js/jquery-ui.min.js"></script>

	

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
<style type="text/css">
.bootstrap-tagsinput {
    width: 100%;
}
.label {
    line-height: 2 !important;
}
</style>
  </head>



  <body class="nav-md">

    <div class="container body">

    	<div class="main_container">
        