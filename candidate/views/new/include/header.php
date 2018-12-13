	<!-- navigation bar -->
	<header class="nav-bar">
		<div class="navbar-fixed">
		<nav class="white black-text">
	    <div class="nav-wrapper container-wrap">
	      <a href="<?php echo $this->config->item('web_url'); ?>" class="brand-logo "><img src="<?php echo $this->config->item('web_url'); ?>assets/img/logo.png" class="responsive-img"></a>
	      <a href="#" data-target="mobile-demo" class="sidenav-trigger  black-text"><i class="material-icons">menu</i></a>
	      <?php if(!$this->session->userdata('cand_chid')) { ?>
		      <ul class=" hide-on-med-and-down ">
		        <li><a href="<?php echo $this->config->item('web_url');?>Jobs?jobs=list" class="waves-effect">Find Jobs	</a></li>
		        <li><a href="<?php echo $this->config->item('web_url');?>Psychometric" class="waves-effect">Psychometric Test</a></li>
		        <li><a href="<?php echo $this->config->item('web_url');?>CV_Writing" class="waves-effect">Professional CV Writing</a></li>
		        <li><a href="<?php echo $this->config->item('web_url');?>Pricing" class="waves-effect ">Pricing</a></li>
		      </ul>

		      <ul class="right hide-on-med-and-down ">
		        <li><a href="<?php echo $this->config->item('web_url');?>candidate" class="waves-effect">Login</a></li>
		         <li>|</li>
		        <li><a href="<?php echo $this->config->item('web_url');?>PostCV" class="waves-effect">Register</a></li>
		        <li class="">
		        	<a href="<?php echo $this->config->item('web_url');?>hire/login" class="waves-effect waves-light btn white-text  brand nav-btn">
		        	<i class="material-icons left white-text">add_box</i> Post a Job
		        	</a>
		    	</li>
		      </ul> 
		  <?php } else{ ?>
		  	<ul class="right hide-on-med-and-down ">
		  		<li><a href="<?php echo base_url()?>Jobs?jobs=list" class="waves-effect bold">Dashboard</a></li>
		  		<li><a href="<?php echo $this->config->item('web_url');?>Jobs?jobs=list" class="waves-effect bold">Find Jobs	</a></li>
		  		<li><a href="<?php echo $this->config->item('web_url');?>Psychometric" class="waves-effect bold">Psychometric Test</a></li>
		  		<li><a href="<?php echo base_url()?>Subscriptions" class="waves-effect">Pricing</a></li>
		  		<li>|</li>
		  		<li><a href="<?php echo base_url()?>notification" class="waves-effect bold"><i class="tiny material-icons left">notifications_none</i></a></li>
		  		<li>
		  			<a href='#' class="waves-effect waves-light dropdown-trigger" data-target='profile-dropdown' style=" line-height: 0;">
		  				

		  				<?php if (!empty($this->session->userdata('propics'))) { ?>
											
							<img src="<?php echo $this->config->base_url().$this->session->userdata('propics') ?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 7px">
						<?php } else { ?>
							<img src="<?php echo $this->config->item('web_url');?>assets/img/person.png" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 7px">
		
						<?php } ?>
		  				<i class="tiny material-icons left">arrow_drop_down</i>

			  		</a>
			  	</li>		         
		  	</ul>
		 <?php  } ?>
	    </div>
	  </nav>
	</div>

	  	<!-- Profile -->
		<ul id="profile-dropdown" class="dropdown-content" style="min-width: 165px">
		  <li><a href="<?php echo base_url()?>Jobs">Profile</a></li>
		  <li><a href="<?php echo  base_url()?>ProfileSettings">Settings</a></li>
		  <li><a href="<?php echo  base_url()?>Support">Help</a></li>
		  <li class="divider"></li>
		  <li><a href="<?php echo  base_url()?>Logout">Logout <i class="tiny material-icons right">exit_to_app</i></a></li>
		</ul>
		<!-- -->

	  <ul class="sidenav" id="mobile-demo">
	  	

	  	<?php if(!$this->session->userdata('cand_chid')) { ?> 
	  		<li>
	  			<a href="<?php echo $this->config->item('web_url'); ?>" class="brand-logo ">
	  				<img src="<?php echo $this->config->item('web_url'); ?>assets/img/logo.png" class="responsive-img">
	  			</a>
	  		</li>
	    	<li><a href="<?php echo $this->config->item('web_url');?>Jobs?jobs=list" class="waves-effect">Find Jobs</a></li>
	    	<li><a href="<?php echo $this->config->item('web_url');?>Psychometric" class="waves-effect">Psychometric Test</a></li>
	    	<li><?php echo $this->config->item('web_url');?>CV_Writing" class="waves-effect">Professional CV Writing</a></li>
		        <li><a href="<?php echo $this->config->item('web_url');?>Pricing" class="waves-effect bold">Pricing</a></li>
	    	<li><a href="<?php echo $this->config->item('web_url');?>candidate" class="waves-effect">Login</a></li>
		    <li><a href="<?php echo $this->config->item('web_url');?>PostCV" class="waves-effect">Register</a></li>
		    <li><a href="<?php echo $this->config->item('web_url');?>hire/login" class="waves-effect"> Post a Job</a></li>
		<?php }else{ ?>

			<li>
	  			<a href="<?php echo $this->config->item('web_url'); ?>" class="brand-logo " style="height: 65px">
	  				<img src="<?php echo $this->config->base_url().$this->session->userdata('propics') ?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 7px">
	  			</a>
	  		</li>
			<li><a href="<?php echo base_url()?>Jobs" class="waves-effect bold">Dashboard</a></li>
		  	<li><a href="<?php echo $this->config->item('web_url');?>Jobs?jobs=list" class="waves-effect bold">Find Jobs	</a></li>
		  	<li><a href="<?php echo  base_url()?>ProfileSettings">Settings</a></li>
		  	<li><a href="<?php echo base_url()?>Jobs">Profile</a></li>
		  	<li><a href="<?php echo $this->config->item('web_url');?>Psychometric" class="waves-effect bold">Psychometric Test</a></li>
		  	<li><a href="<?php echo base_url()?>Subscriptions" class="waves-effect bold">Pricing</a></li>
		  	<li class="divider"></li>
		  <li><a href="<?php echo  base_url()?>Logout">Logout <i class="tiny material-icons right">exit_to_app</i></a></li>
		<?php }?>
	  </ul>
	</header> <!-- end nav bar -->
	<!-- Global site tag (gtag.js) - Google Analytics --> 
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126732830-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-126732830-1');
</script>
