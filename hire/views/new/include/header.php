<?php
$alert = $this->alerts->get_alerts();
?>
	<!-- navigation bar -->
	<header class="nav-bar">
		<div class="navbar-fixed">
		<nav class="white black-text">
	    <div class="nav-wrapper container-wrap">
	      	<a href="<?php echo $this->config->item('web_url'); ?>" class="brand-logo "><img src="<?php echo $this->config->item('web_url'); ?>assets/img/logo.png" class="responsive-img"></a>
	      	<a href="#" data-target="mobile-demo" class="sidenav-trigger  black-text"><i class="material-icons">menu</i></a>
		  
		  	<a href='#' class="waves-effect waves-light dropdown-trigger right mr10 hide-on-med-and-up" data-target='profile-dropdown1' style=" line-height: 0;">
		  		<?php if (!empty($this->session->userdata('profile'))) { ?>
					<img src="<?php echo $this->config->base_url().$this->session->userdata('profile');?>" class="responsive-img circle left" width="45px" height="45px" style="margin-top: 7px">
				<?php } else { ?>
					<img src="<?php echo $this->config->item('web_url');?>assets/img/person.png" class="responsive-img circle left" width="45px" height="45px" style="margin-top: 7px">
				<?php } ?>
			</a>

	      <?php if(!$this->session->userdata('hireid')) { ?>
		      <ul class=" hide-on-med-and-down ">
		        <li><a href="<?php echo $this->config->item('web_url');?>Jobs" class="waves-effect">Find Jobs	</a></li>
		        <li><a href="<?php echo $this->config->item('web_url');?>Psychometric" class="waves-effect">Psychometric Test</a></li>
		        <li><a href="<?php echo $this->config->item('web_url');?>CV_Writing" class="waves-effect">Professional CV Writing</a></li>
		        <li><a href="<?php echo $this->config->item('web_url');?>Pricing" class="waves-effect">Pricing</a></li>
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
		  		<li><a href="<?php echo base_url()?>" class="waves-effect bold">Dashboard</a></li>
		  		<li><a href="<?php echo base_url()?>" class="waves-effect bold">Find Candidate	</a></li>
		  		<li><a href="<?php echo base_url()?>Jobs/Add" class="waves-effect bold"> Post a Job	</a></li>
		  		<li><a href="<?php echo base_url()?>Subscriptions" class="waves-effect bold">Pricing</a></li>
		  		<li>|</li>
		  		<li>
						<a  class="waves-effect dropdown-trigger bold" data-target='alert'>
							<i class="tiny material-icons left">notifications_none</i>
							<?php if(count($alert) > 0){echo '<span class="new badge brand">'.count($alert).'</span>'; } ?>
						</a>
					</li>
		  		<li>
		  			<a href='#' class="waves-effect waves-light dropdown-trigger" data-target='profile-dropdown' style=" line-height: 0;">
		  				

		  				<?php if (!empty($this->session->userdata('profile'))) { ?>
											
							<img src="<?php echo $this->config->base_url().$this->session->userdata('profile');?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 7px">
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

	<ul id='alert' class='dropdown-content' style="min-width: 300px">

			<?php 
			$i = 0; 
			if(count($alert) >= 5){$j = 4;}
			elseif(count($alert) < 5){$j = count($alert)-1;}
			while ($i <= $j) { 
				if(!empty($alert[$i]->name) == 'Package expiry'){
					$link = base_url('alert/').$alert[$i]->ea_enc;
				}elseif(!empty($alert[$i]->ea_enc) == 'verified_cv'){
					$link = base_url('alert/').$alert[$i]->ea_enc;
				}else{
					$link = '#!';
				}
			?>
				<li>
					 	<a href="<?php echo $link ?>">
							<?php
								if(!empty($alert[$i]->ea_type)){
									echo '<p class="bold font-15 m0">'.$alert[$i]->ea_type.'</p>';
								}elseif(!empty($alert[$i]->name)){
									echo '<p class="bold font-15 m0">'.$alert[$i]->name.' on - '.date('d M Y',strtotime($alert[$i]->date)).'</p>';
								}

								if(!empty($alert[$i]->name) == 'Package expiry'){
									echo '<p class="font-15 m0">'.$alert[$i]->pr_name.'</p>';
								}elseif(!empty($alert[$i]->ea_type) == 'job apply'){
									echo '<p class="font-15 m0">'.$alert[$i]->job_title.'</p>';
								}else{
									echo '<p class="font-15 m0">'.$alert[$i]->job_title.'</p>';
								}
								if(!empty($alert[$i]->name) == 'Package expiry'){
									echo ' <span class="right alert-span"> '. $alert[$i]->days.'</span>';
								}else{
									echo '<span class="right alert-span">'.date('d-m-Y',strtotime($alert[$i]->date)).'</span>';
								}
							?>
						</a>
					</li>
			<?php $i += 1; }
				if(count($alert) == 0){
					echo '<li><a>No new alerts found !</a></li>';
				}
			?>	
				<li class="grey lighten-4">
					<a class="center" href="<?php echo base_url('alerts') ?>">See all alerts</a>				
				</li>		
  </ul>



	  	<!-- Profile -->
		<ul id="profile-dropdown" class="dropdown-content" style="min-width: 165px">
		  <li><a href="<?php echo base_url()?>Jobs">Dashboard</a></li>
		  <li><a href="<?php echo  base_url()?>AccountSettings">Profile</a></li>
		  <li><a href="<?php echo  base_url()?>Support">Help</a></li>
		  <li class="divider"></li>
		  <li><a href="<?php echo  base_url()?>Logout">Logout <i class="tiny material-icons right">exit_to_app</i></a></li>
		</ul>
		<!-- -->


	  <ul class="sidenav" id="mobile-demo">
	  	<a href="<?php echo $this->config->item('web_url'); ?>" class="brand-logo "><img src="<?php echo $this->config->item('web_url'); ?>assets/img/logo.png" class="responsive-img ml10"></a>
	  	<?php if(!$this->session->userdata('hireid')) { ?> 
	  		<li><a href="<?php echo $this->config->item('web_url');?>candidate" class="waves-effect">Login</a></li>
		    <li><a href="<?php echo $this->config->item('web_url');?>PostCV" class="waves-effect">Register</a></li>
		    <li><a href="<?php echo $this->config->item('web_url');?>hire/login" class="waves-effect"> Post a Job</a></li>
	    	<li><a href="<?php echo $this->config->item('web_url');?>Jobs?jobs=list" class="waves-effect">Find Jobs</a></li>
	    	<li><a href="<?php echo $this->config->item('web_url');?>Psychometric" class="waves-effect">Psychometric Test</a></li>
	    	<li><a href="<?php echo $this->config->item('web_url');?>CV_Writing" class="waves-effect">Professional CV Writing</a></li>
		     <li><a href="<?php echo $this->config->item('web_url');?>Pricing" class="waves-effect">Pricing</a></li>
	    	
		<?php }else{ ?>
			<li>
				<a href="<?php echo base_url()?>" class="waves-effect active"> <i class="material-icons nav-slid-icon">dashboard</i> Dashboard</a>
			</li>
			<li >
				<a href="<?php echo base_url()?>Jobs/Add" class="waves-effect "> <i class="material-icons nav-slid-icon">playlist_add_check</i> Post Jobs</a>
			</li>
			<li>
				<a href="<?php echo base_url() ?>application" class="waves-effect"><i class="fas fa-users "></i> All Application</a>
			</li>
			
			<li>
				<a class="waves-effect menu-main"><i class="fas fa-file-signature" style="margin-left: 3px;margin-right: 5px"></i>My Jobs</a>
				<ul class="menu-sub">
					<li><a href="<?php echo base_url()?>MyJobs"> Active Job</a></li>
					<li><a href="<?php echo base_url()?>MyJobs/Expired"> Close Job</a></li>
				</ul>
			</li>

			<li>
				<a href="<?php echo base_url() ?>billing-history" class="waves-effect"><i class="fas fa-file-invoice-dollar"></i> Billing History</a>
			</li>
			<li><a href="<?php echo  base_url()?>AccountSettings"><i class="far fa-user-circle"></i> Profile</a></li>
		  	
		  	<li><a href="<?php echo base_url()?>Subscriptions" class="waves-effect bold"><i class="fas fa-dollar-sign"></i> Subscriptions</a></li>
		  	<li class="divider"></li>
		  	<li><a href="<?php echo  base_url()?>Logout">Logout <i class="tiny material-icons">exit_to_app</i></a></li>
		<?php }?>
	  </ul>
	  <ul id="profile-dropdown1" class="dropdown-content" style="min-width: 165px">
		  <li><a href="<?php echo base_url()?>Jobs">Dashboard</a></li>
		  <li><a href="<?php echo  base_url()?>AccountSettings">Profile</a></li>
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
