<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="<?php echo $metakey; ?>" />
    <meta name="description" content="<?php echo $metadesc; ?>"/>
    <meta name="author" content="Sreejith Gopinath">  
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->config->item('web_url');?>media/favicon.ico" />

	<!-- Bootstrap Core CSS -->
    <link href="<?php echo $this->config->item('web_url');?>web/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="<?php echo $this->config->base_url();?>css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!--web-fonts-->
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700,900" rel="stylesheet" type="text/css" media="all">
    <!-- Theme CSS -->
    <link href="<?php echo $this->config->item('web_url');?>web/css/theme.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js" integrity="sha384-0s5Pv64cNZJieYFkXYOTId2HMA2Lfb6q2nAcx2n0RTLUnCAoTTsS0nKEO27XyKcY" crossorigin="anonymous"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js" integrity="sha384-ZoaMbDF+4LeFxg6WdScQ9nnR1QC2MIRxA1O9KWEXQwns1G8UNyIEZIQidzb0T1fo" crossorigin="anonymous"></script>
    <![endif]-->
    
    <!-- jQuery -->
    <script src="<?php echo $this->config->item('web_url');?>web/js/jquery-3.2.0.min.js"></script>
    <!-- jQuery Validation -->
	<script src="<?php echo $this->config->item('web_url');?>web/js/jquery.validate.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $this->config->item('web_url');?>web/js/bootstrap.min.js"></script>
    
</head>
