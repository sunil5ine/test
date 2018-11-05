<!DOCTYPE html>
<html>
<head>
<title><?php echo $title; ?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $this->config->base_url();?>images/favicon.ico" />
<link href="<?php echo $this->config->base_url();?>css/datatables.min.css" rel="stylesheet">
<link href="<?php echo $this->config->base_url();?>css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo $this->config->base_url();?>css/bootstrap-theme.min.css" rel="stylesheet" type="text/css" media="all">
<link href="<?php echo $this->config->base_url();?>css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href="<?php echo $this->config->base_url();?>css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all"/>
<!--web-fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
<!--js-->
<script src="<?php echo $this->config->base_url();?>js/jquery.min.js"></script>
<script src="<?php echo $this->config->base_url();?>js/bootstrap.min.js"></script>
<script src="<?php echo $this->config->base_url();?>js/validator.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->base_url();?>src/jquery.accordion.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="keywords" content="<?php echo $metakey; ?>" />
<meta name="description" content="<?php echo $metadesc; ?>"/>
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?php echo $this->config->base_url();?>js/move-top.js"></script>
<script type="text/javascript" src="<?php echo $this->config->base_url();?>js/easing.js"></script>
	<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
	</script>
<!-- //end-smoth-scrolling -->
<style>

.space-top-12 {
	margin-top:15px;
}
</style>
</head>
<body> 
<!--header start here-->
 <div class="header-welcome">
 	  <div class="container">
 	       <div class="header-main home">
 	        	<div class="logo">
 	        		<a href="<?php echo $this->config->base_url();?>"><img src="<?php echo $this->config->base_url();?>images/logo.png" alt="" /></a>
 	        	</div> 
 	        	
 	        	<div class="clearfix"> </div>
 	       </div>
 	       <div class="header-bottom">
                
				<!-- <div class="col-md-3 text-center">
                	<a href="#"><img alt="" src="<?php echo $this->config->base_url();?>images/special-offer-cherryhire.png"></a>
                
                </div> -->
                <div class="col-md-12 mt" id="msgbox">
                <div class="col-md-12 txtleft"><span>We are Coming Soon!!!</span></div><br>
                <div class="col-md-12 txtright"><span>We are Still Working on it.</span></div>
                </div>
                <div class="clearfix"> </div>
            </div>          
 	  </div>
 </div>
<!-- <div class="intro-strip"> </div> -->
<div id="fixedsocial">
    <div class="footer-right">
	  	             <ul>
	  	             	<li><a rel="nofollow" href="http://facebook.com/cherryhire" target="_blank"> <span class="x"> </span> </a></li>
	  	             	<li><a rel="nofollow" href="https://twitter.com/cherry_hire" target="_blank"> <span class="y"> </span> </a></li>
                        <li><a rel="nofollow" href="http://instagram.com/cherryhire" target="_blank"> <span class="z"> </span> </a></li>
                        <li><a rel="nofollow" href="https://linkedin.com/company/cherry-hire" target="_blank"> <span class="w"> </span> </a></li>
	  	             </ul>
	  	    	</div>
</div>

<!--contant start here-->
<div class="strip"> </div>


<!--sharethis script-->
<div class="share-box">
<span class='st_facebook_hcount' displayText='Facebook'></span>
<span class='st_twitter_hcount' displayText='Tweet'></span>
<span class='st_pinterest_hcount' displayText='Pinterest'></span>
<span class='st_googleplus_hcount' displayText='Google +'></span>
</div>
