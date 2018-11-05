	<!-- navigation bar -->
	<header class="nav-bar">
		<div class="navbar-fixed">
		<nav class="white black-text">
	    <div class="nav-wrapper container-wrap">
	      <a href="<?php echo base_url(); ?>" class="brand-logo "><img src="<?php echo base_url(); ?>assets/img/logo.png" class="responsive-img"></a>
	      <a href="#" data-target="mobile-demo" class="sidenav-trigger  black-text"><i class="material-icons">menu</i></a>

	      <?php if(!$this->session->userdata('cand_chid') && !$this->session->userdata('hireid')) { ?>
		      <ul class=" hide-on-med-and-down ">
		        <li><a href="<?php echo base_url()?>Jobs?jobs=list" class="waves-effect">Find Jobs	</a></li>
		        <li><a href="<?php echo base_url()?>Psychometric" class="waves-effect">Psychometric Test</a></li>
		        <li><a href="<?php echo base_url()?>CV_Writing" class="waves-effect">Professional CV Writing</a></li>
		        <li><a href="<?php echo base_url()?>Pricing" class="waves-effect">Pricing</a></li>
		      </ul>

		      <ul class="right hide-on-med-and-down ">
		        <li><a href="<?php echo base_url()?>candidate" class="waves-effect">Login</a></li>
		         <li>|</li>
		        <li><a href="<?php echo base_url()?>PostCV" class="waves-effect">Register</a></li>
		        <li class="">
		        	<a href="<?php echo base_url()?>hire/login" class="waves-effect waves-light btn white-text  brand nav-btn">
		        	<i class="material-icons left white-text">add_box</i> Post a Job
		        	</a>
		    	</li>
		      </ul> 
		  <?php } 

		  elseif($this->session->userdata('cand_chid')){ ?>
		  	<ul class="right hide-on-med-and-down ">
		  		<li><a href="<?php echo base_url()?>candidate/Jobs" class="waves-effect bold">Dashboard</a></li>
		  		<li><a href="<?php echo base_url()?>Jobs?jobs=list" class="waves-effect bold">Find Jobs	</a></li>
		  		<li><a href="<?php echo base_url()?>Psychometric" class="waves-effect bold">Psychometric Test</a></li>
		  		<li><a href="<?php echo base_url()?>candidate/Subscriptions" class="waves-effect bold">Pricing</a></li>
		  		<li>|</li>
		  		<li><a href="<?php echo base_url()?>candidate/notification" class="waves-effect bold"><i class="tiny material-icons left">notifications_none</i></a></li>
		  		<li>
		  			<a href='#' class="waves-effect waves-light dropdown-trigger" data-target='profile-dropdown' style=" line-height: 0;">
		  				

		  				<?php if (!empty($this->session->userdata('propics'))) { ?>
											
							<img src="<?php echo $this->config->base_url().'candidate/'.$this->session->userdata('propics') ?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 7px">
						<?php } else { ?>
							<img src="<?php echo $this->config->item('web_url');?>assets/img/person.png" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 7px">
		
						<?php } ?>
		  				<i class="tiny material-icons left">arrow_drop_down</i>

			  		</a>
			  	</li>		         
		  	</ul>
		 <?php  } elseif($this->session->userdata('hireid')){ ?>
			<ul class="right hide-on-med-and-down ">
		  		<li><a href="<?php echo base_url()?>hire" class="waves-effect bold">Dashboard</a></li>
		  		<li><a href="<?php echo base_url()?>" class="waves-effect bold">Find Candidate	</a></li>
		  		<li><a href="<?php echo base_url()?>hire/Jobs/Add" class="waves-effect bold"> Post a Job	</a></li>
		  		<li><a href="<?php echo base_url()?>hire/Subscriptions" class="waves-effect bold">Pricing</a></li>
		  		<li>|</li>
		  		<li><a href="<?php echo base_url()?>notification" class="waves-effect bold"><i class="tiny material-icons left">notifications_none</i></a></li>
		  		<li>
		  			<a href='#' class="waves-effect waves-light dropdown-trigger" data-target='profile-dropdown' style=" line-height: 0;">
		  				

		  				<?php if (!empty($this->session->userdata('profile'))) { ?>
											
							<img src="<?php echo $this->config->base_url().'hire/'.$this->session->userdata('profile');?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 7px">
						<?php } else { ?>
							<img src="<?php echo $this->config->item('web_url');?>assets/img/person.png" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 7px">
		
						<?php } ?>
		  				<i class="tiny material-icons left">arrow_drop_down</i>

			  		</a>
			  	</li>		         
		  	</ul>
		<?php } ?>
	    </div>
	  </nav>
	</div>

	<?php if($this->session->userdata('cand_chid')){ ?>
	  	<!-- Profile -->
		<ul id="profile-dropdown" class="dropdown-content" style="min-width: 165px">
		  <li><a href="<?php echo base_url()?>candidate/Jobs">Profile</a></li>
		  <li><a href="<?php echo  base_url()?>candidate/ProfileSettings">Settings</a></li>
		  <li><a href="<?php echo  base_url()?>candidate/Support">Help</a></li>
		  <li class="divider"></li>
		  <li><a href="<?php echo  base_url()?>candidate/Logout">Logout <i class="tiny material-icons right">exit_to_app</i></a></li>
		</ul>
		<!-- -->
	<?php } if ($this->session->userdata('hireid')) { ?>
		<ul id="profile-dropdown" class="dropdown-content" style="min-width: 165px">
		  <li><a href="<?php echo base_url()?>hire/Jobs">Dashboard</a></li>
		  <li><a href="<?php echo  base_url()?>hire/AccountSettings">Profile</a></li>
		  <li><a href="<?php echo  base_url()?>hire/Support">Help</a></li>
		  <li class="divider"></li>
		  <li><a href="<?php echo  base_url()?>hire/Logout">Logout <i class="tiny material-icons right">exit_to_app</i></a></li>
		</ul>
	<?php } ?>








	  <ul class="sidenav" id="mobile-demo">
	  	

	  	<?php if(!$this->session->userdata('cand_chid') && !$this->session->userdata('hireid')) { ?> 
	  		<li><a href="<?php echo base_url()?>" class="brand-logo "><img src="<?php echo base_url(); ?>assets/img/logo.png" class="responsive-img"></a></li>
	    	<li><a href="<?php echo base_url()?>Jobs" class="waves-effect">Find Jobs</a></li>
	    	<li><a href="<?php echo base_url()?>Psychometric" class="waves-effect">Psychometric Test</a></li>
	    	<li><a href="<?php echo base_url()?>CV_Writing" class="waves-effect">Professional CV Writing</a></li>
		    <li><a href="<?php echo base_url()?>Pricing" class="waves-effect">Pricing</a></li>
	    	<li><a href="<?php echo base_url()?>candidate" class="waves-effect">Login</a></li>
		    <li><a href="<?php echo base_url()?>PostCV" class="waves-effect">Register</a></li>
		    <li><a href="<?php echo base_url()?>hire/login" class="waves-effect"> Post a Job</a></li>
		<?php }

		elseif($this->session->userdata('cand_chid')){ ?>
			<li><a href="<?php echo base_url(); ?>" class="brand-logo " style="height: 65px">
				<?php if (!empty($this->session->userdata('propics'))) { ?>
											
							<img src="<?php echo $this->config->base_url().'candidate/'.$this->session->userdata('propics') ?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 7px">
						<?php } else { ?>
							<img src="<?php echo $this->config->item('web_url');?>assets/img/person.png" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 7px">
		
						<?php } ?>
			</a></li>
			<li><a href="<?php echo base_url()?>candidate/Jobs" class="waves-effect bold">Dashboard</a></li>
			<li><a href="<?php echo base_url()?>candidate/ProfileSettings">Profile</a></li>
		  	<li><a href="<?php echo base_url();?>Jobs" class="waves-effect bold">Find Jobs	</a></li>
		  	<li><a href="<?php echo base_url();?>Psychometric" class="waves-effect bold">Psychometric Test</a></li>
		  	<li><a href="<?php echo base_url()?>candidate/Subscriptions" class="waves-effect bold">Pricing</a></li>
		  	<li><a href="<?php echo  base_url()?>candidate/ProfileSettings">Settings</a></li>
		  	<li><a href="<?php echo  base_url()?>candidate/Support">Help</a></li>
		  	<li class="divider"></li>
		  	<li><a href="<?php echo  base_url()?>candidate/Logout">Logout <i class="tiny material-icons right">exit_to_app</i></a></li>

		<?php } elseif ($this->session->userdata('hireid')) { ?>
			<li>
				<a class="brand-logo" href="<?php echo  base_url()?>hire/AccountSettings" style="height: 65px;">
					<?php if (!empty($this->session->userdata('profile'))) { ?>
											
						<img src="<?php echo $this->config->base_url().'hire/'.$this->session->userdata('profile');?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 7px">
					<?php } else { ?>
						<img src="<?php echo $this->config->item('web_url');?>assets/img/person.png" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 7px">
		
					<?php } ?>
				</a>
			</li>
			<li><a href="<?php echo base_url()?>hire/Jobs" class="waves-effect bold">Dashboard</a></li>
			<li><a href="<?php echo  base_url()?>hire/AccountSettings">Profile</a></li>
		  	<li><a href="<?php echo base_url()?>" class="waves-effect bold">Find Candidate	</a></li>
		  	<li><a href="<?php echo base_url()?>hire/Jobs/Add" class="waves-effect bold"> Post a Job	</a></li>
		  	<li><a href="<?php echo base_url()?>hire/Subscriptions" class="waves-effect bold">Pricing</a></li>
		  	<li><a href="<?php echo base_url()?>hire" class="waves-effect bold">Help</a></li>
		  	<li class="divider"></li>
		  	<li><a href="<?php echo  base_url()?>hire/Logout">Logout <i class="tiny material-icons right">exit_to_app</i></a></li>
		<?php } ?>

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
