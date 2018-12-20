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
						<a href="<?php echo base_url()?>notification" class="waves-effect dropdown-trigger bold" data-target='alert'>
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
			if(count($alert) >= 5){$j = 5;}
			elseif(count($alert) < 5){$j = count($alert)-1;}
			while ($i <= $j) { 
				if(!empty($alert[$i]->name) == 'Package expiry'){
					$link = base_url('Subscriptions');
				}elseif(!empty($alert[$i]->name) == 'verified_cv'){
					$link = '#!';
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
										echo '<p class="bold font-15 m0">'.$alert[$i]->name.'</p>';
									}

									if(!empty($alert[$i]->name) == 'Package expiry'){
										echo '<p class="font-15 m0">'.$alert[$i]->pr_name.' <span class="right alert-span"> '. $alert[$i]->days.'</span></p>';
									}elseif(!empty($alert[$i]->ea_type) == 'job apply'){
										echo '<p class="font-15 m0">'.$alert[$i]->job_title.'</p>';
									}else{
										echo '<p class="font-15 m0">'.$alert[$i]->job_title.'</p>';
									}
									echo '<span class="right alert-span">'.date('d-m-Y',strtotime($alert[$i]->date)).'</span>'
							 ?>
						</a>
					</li>
			<?php $i += 1; } ?>			
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
	  	<li><a href="<?php echo $this->config->item('web_url'); ?>" class="brand-logo "><img src="<?php echo $this->config->item('web_url'); ?>assets/img/logo.png" class="responsive-img"></a></li>
	  	<?php if(!$this->session->userdata('hireid')) { ?> 
	    	<li><a href="<?php echo $this->config->item('web_url');?>Jobs?jobs=list" class="waves-effect">Find Jobs</a></li>
	    	<li><a href="<?php echo $this->config->item('web_url');?>Psychometric" class="waves-effect">Psychometric Test</a></li>
	    	<li><a href="<?php echo $this->config->item('web_url');?>CV_Writing" class="waves-effect">Professional CV Writing</a></li>
		     <li><a href="<?php echo $this->config->item('web_url');?>Pricing" class="waves-effect">Pricing</a></li>
	    	<li><a href="<?php echo $this->config->item('web_url');?>candidate" class="waves-effect">Login</a></li>
		    <li><a href="<?php echo $this->config->item('web_url');?>PostCV" class="waves-effect">Register</a></li>
		    <li><a href="<?php echo $this->config->item('web_url');?>hire/login" class="waves-effect"> Post a Job</a></li>
		<?php }else{ ?>

			<li><a href="<?php echo base_url()?>AccountSettings" class="waves-effect bold">Dashboard</a></li>
			<li><a href="<?php echo  base_url()?>AccountSettings">Profile</a></li>
		  	<li><a href="<?php echo base_url()?>" class="waves-effect bold">Find Candidate	</a></li>
		  	<li><a href="<?php echo base_url()?>Jobs/Add" class="waves-effect bold"> Post a Job	</a></li>
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
