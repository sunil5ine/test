<?php $alert = $this->alert_lib->alertsets(); ?>
	<!-- navigation bar -->
	<header class="nav-bar">
		<div class="navbar-fixed">
		<nav class="white black-text">
	    <div class="nav-wrapper container-wrap">
	      	<a href="<?php echo $this->config->item('web_url'); ?>" class="brand-logo "><img src="<?php echo $this->config->item('web_url'); ?>assets/img/logo.png" class="responsive-img"></a>
	      	<a href="#" data-target="mobile-demo" class="sidenav-trigger  black-text"><i class="material-icons">menu</i></a>
	      	<?php if(!$this->session->userdata('cand_chid')) { ?>
	     	 	<a href="<?php echo $this->config->item('web_url') ?>PostCV" class="white-text brand btn right hide-on-large-only mr10 mt10">Sign up</a>
	     	 <?php } else{ ?>

	      		<a href='#' class="waves-effect right waves-light dropdown-trigger hide-on-large-only" data-target='profile-dropdown1' style=" line-height: 0;">
		  			
					<?php  if(!empty($this->session->userdata('propics'))) { 
									if(substr($this->session->userdata('propics'),0,4) == 'http' || substr($this->session->userdata('propics'),0,5) == 'https'){
					?>
						<img src="<?php echo $this->session->userdata('propics')?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 3px">
					<?php } else{ ?>				
								<img src="<?php echo $this->config->base_url().$this->session->userdata('propics') ?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 3px">
					<?php } } else{ ?>
						<img src="<?php echo $this->config->item('web_url');?>assets/img/person.png" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 3px">
		
					<?php } ?>
		  			
			  	</a>
			<?php } ?>

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
		  		<li><a href="<?php echo base_url()?>MyProfile" class="waves-effect bold">Dashboard</a></li>
		  		<li><a href="<?php echo $this->config->item('web_url');?>Jobs?jobs=list" class="waves-effect bold">Find Jobs	</a></li>
		  		<li><a href="<?php echo $this->config->item('web_url');?>Psychometric" class="waves-effect bold">Psychometric Test</a></li>
		  		<li><a href="<?php echo base_url()?>Subscriptions" class="waves-effect">Pricing</a></li>
		  		<li>|</li>
		  		<li>
						<a  class="waves-effect dropdown-trigger bold" data-target='alert'>
							<i class="tiny material-icons left">notifications_none</i>
							<?php if($alert['count'] > 0){echo '<span class="new badge brand">'.$alert['count'].'</span>'; } ?>
						</a>
					</li>
		  		<li>
		  			<a href='#' class="waves-effect waves-light dropdown-trigger" data-target='profile-dropdown' style=" line-height: 0;">
		  				
							<?php  if(!empty($this->session->userdata('propics'))) { 
										if(substr($this->session->userdata('propics'),0,4) == 'http' || substr($this->session->userdata('propics'),0,5) == 'https'){
							?>
							<img src="<?php echo $this->session->userdata('propics')?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 7px">
							<?php } else{ ?>				
									<img src="<?php echo $this->config->base_url().$this->session->userdata('propics') ?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 7px">
						<?php } } else{ ?>
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



		<ul id='alert' class='dropdown-content' style="min-width: 300px">
			<?php foreach ($alert['alerts'] as $key => $value) { ?>
				<li>
					<a href="<?php echo base_url('notification/').$value->ca_id ?>">
						<?php
							echo '<span style="font-size:13px">'.$value->ca_title.'</span><span class="right" style="font-size:12px">'.date('d M y',strtotime($value->ca_date)).'</span></p>';
						?>
					</a>
				</li>
			<?php } ?>
				<li class="grey lighten-4">
					<a class="center" href="<?php echo base_url('notification') ?>">See all alerts</a>				
				</li>
		</ul>						

	  	<!-- Profile -->
		<ul id="profile-dropdown" class="dropdown-content" style="min-width: 165px">
		  <li><a href="<?php echo base_url()?>MyProfile">Profile</a></li>
		  <li><a href="<?php echo  base_url()?>ProfileSettings">Settings</a></li>
		  <li><a href="<?php echo  base_url()?>Support">Help</a></li>
		  <li class="divider"></li>
		  <li><a href="<?php echo  base_url()?>Logout">Logout <i class="tiny material-icons right">exit_to_app</i></a></li>
		</ul>
		<!-- -->




	  <ul class="sidenav" id="mobile-demo">
	  	

	  	<?php if(!$this->session->userdata('cand_chid')) { ?> 
	  		
	  			<a href="<?php echo $this->config->item('web_url'); ?>" class="brand-logo ">
	  				<img src="<?php echo $this->config->item('web_url'); ?>assets/img/logo.png" class="responsive-img circle ml10">
	  			</a>
	  		<li><a href="<?php echo $this->config->item('web_url');?>candidate" class="waves-effect">Login</a></li>
		    <li><a href="<?php echo $this->config->item('web_url');?>PostCV" class="waves-effect">Register</a></li>
		    <li><a href="<?php echo $this->config->item('web_url');?>hire/login" class="waves-effect"> Post a Job</a></li>
	    	<li><a href="<?php echo $this->config->item('web_url');?>Jobs?jobs=list" class="waves-effect">Find Jobs</a></li>
	    	<li><a href="<?php echo $this->config->item('web_url');?>Psychometric" class="waves-effect">Psychometric Test</a></li>
	    	<li><a href="<?php echo $this->config->item('web_url');?>CV_Writing" class="waves-effect">Professional CV Writing</a></li>
		   <li><a href="<?php echo $this->config->item('web_url');?>Pricing" class="waves-effect bold">Pricing</a></li>
	    	
		<?php }else{ ?>

			<li>
	  			<a href="<?php echo $this->config->item('web_url'); ?>" class="brand-logo " style="height: 65px">
	  				<?php  if(!empty($this->session->userdata('propics'))) { 
										if(substr($this->session->userdata('propics'),0,4) == 'http' || substr($this->session->userdata('propics'),0,5) == 'https'){
							?>
							<img src="<?php echo $this->session->userdata('propics')?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 7px">
							<?php } else{ ?>				
									<img src="<?php echo $this->config->base_url().$this->session->userdata('propics') ?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 7px">
						<?php } } else{ ?>
							<img src="<?php echo $this->config->item('web_url');?>assets/img/person.png" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 7px">
		
					<?php } ?>
	  			</a>
	  		</li>
	  		
			<?php $url = $this->uri->segment(1); ?>
			<li class=" <?php echo ($url=='MyProfile')? 'activel':'' ?>" >
				<a href="<?php echo base_url()?>PostCv" class="waves-effect "> <i class="material-icons">dashboard</i> Dashboard</a>
			</li>
			<li class=" <?php echo ($url=='applied-jobs')? 'activel':'' ?>">
				<a href="<?php echo base_url()?>applied-jobs" class="waves-effect"> <i class="material-icons">playlist_add_check</i> Applied Jobs</a>
			</li>
			<li class=" <?php echo ($url=='saved-jobs')? 'activel':'' ?>">
				<a href="<?php echo base_url()?>saved-jobs" class="waves-effect"><i class="material-icons">star</i> Saved Jobs</a>
			</li>
			<li class=" <?php echo ($url=='recommended-jobs')? 'activel':'' ?>">
				<a href="<?php echo base_url()?>recommended-jobs" class="waves-effect"><i class="material-icons">event_note</i> Recommended Jobs</a>
			</li>
			<li><a href="<?php echo base_url()?>Subscriptions" class="waves-effect bold"><i class="material-icons" style="margin-right:10px">monetization_on</i>Subscriptions</a></li>
			<li class=" <?php echo ($url=='cvwriting')? 'activel':'' ?>">
				<a href="<?php echo base_url()?>cvwriting/professional-cv" class="waves-effect"><i class="fas fa-pen-nib" style="margin-left: 3px;margin-right: 5px"></i> Professional CV Writing</a>
			</li>
			<li class=" <?php echo ($url=='psychotest')? 'activel':'' ?>">
				<a href="<?php echo base_url() ?>psychotest/plans" class="waves-effect"><i class="fas fa-file-signature" style="margin-left: 3px;margin-right: 5px"></i> Psychometric test</a>
			</li>
			<li class=" <?php echo ($url=='notification')? 'activel':'' ?>">
				<a href="<?php echo base_url() ?>notification" class="waves-effect"><i class="material-icons " style="margin-right:10px"> move_to_inbox</i>Inbox</a>
			</li>
			<li class=" <?php echo ($url=='cv-visitors')? 'activel':'' ?>">
				<a href="<?php base_url()?>cv-visitors" class="waves-effect"><i class="material-icons " style="margin-right:10px"> people_outline</i>Recruiters Visits on cv</a>
			</li>
			
		  	<li><a href="<?php echo $this->config->item('web_url');?>Jobs?jobs=list" class="waves-effect bold"><i class="material-icons " style="margin-right:10px">search</i>Find Jobs	</a></li>
		  	<!-- <li><a href="<?php echo  base_url()?>ProfileSettings">Settings</a></li> -->
		  	<!-- <li><a href="<?php echo base_url()?>Jobs">Profile</a></li> -->
		  	<li><a class="waves-effect bold" href="<?php echo  base_url()?>Logout">Logout <i class="material-icons nav-slid-icon">exit_to_app</i></a></li>
		  	
		  	<!-- <li class="divider"></li> -->
		  	
		<?php }?>
	  </ul>

	  	<ul id="profile-dropdown1" class="dropdown-content" style="min-width: 165px">
		  <li><a href="<?php echo base_url()?>MyProfile">Profile</a></li>
		  <li><a href="<?php echo  base_url()?>ProfileSettings">Settings</a></li>
		  <li><a href="<?php echo  base_url()?>Support">Help</a></li>
		  <li class="divider"></li>
		  <li><a href="<?php echo  base_url()?>Logout">Logout <i class="tiny material-icons right">exit_to_app</i></a></li>
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
