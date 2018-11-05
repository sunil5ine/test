<body>
<div class="page">
  <div id="spinner">
    <div class="spinner-img"> <img alt="Opportunities Preloader" src="<?php echo $this->config->base_url();?>site/images/loader.gif" />
      <h2>Please Wait.....</h2>
    </div>
  </div>
  <nav id="menu-1" class="mega-menu fa-change-black" data-color="">
    <section class="menu-list-items container">
      <div class="container">
        <ul class="menu-logo">
          <li> <a href="<?php echo $this->config->base_url(); ?>"> <img src="<?php echo $this->config->base_url();?>site/images/logo.png" alt="logo" class="img-responsive"> </a> </li>
        </ul>
        <ul class="menu-links pull-left">
          <li> <a href="<?php echo $this->config->base_url().'Jobs';?>"> Find Jobs </a></li>
          <li> <a href="<?php echo $this->config->base_url().'Psychometric';?>"> Psychometric Test </a></li>
          <li> <a href="<?php echo $this->config->base_url().'CV_Writing';?>"> CV Writing </a></li>
          <li class="mobile-show"> <a href="<?php echo $this->config->base_url().'candidate';?>"> Log in </a></li>
          <li class="mobile-show"> <a href="registration.html"> Register </a></li>
        </ul>
        <ul class="startup-links pull-right mobile-hide" style="margin-left:0px !important">
          <li> <a href="<?php echo $this->config->base_url().'candidate';?>"> Log in </a></li>
          <li> <a href="<?php echo $this->config->base_url().'PostCV';?>" class="nopadding"> <span>Register</span> </a></li>
          <li class="no-bg"><a href="<?php echo $this->config->base_url().'hire/login';?>" class="p-job"><i class="fa fa-plus-square"></i> Post a Job</a></li>
        </ul>
      </div>
    </section>
  </nav>