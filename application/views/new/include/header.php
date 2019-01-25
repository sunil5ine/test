<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5c480abe51410568a107ea15/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->

<!-- navigation bar -->
<header class="nav-bar">
	<div class="navbar-fixed">
		<nav class="white black-text">
			<div class="nav-wrapper container-wrap"> <a href="<?php echo base_url(); ?>" class="brand-logo "><img src="<?php echo base_url(); ?>assets/img/logo.png" class="responsive-img"></a>
				<a href="#" data-target="mobile-demo" class="sidenav-trigger  black-text"><i class="material-icons">menu</i></a>
				<?php if($this->session->userdata('cand_chid')) { ?>
				<a href='#' class="waves-effect right waves-light dropdown-trigger hide-on-large-only" data-target='profile-dropdown1' style=" line-height: 0;">
				<?php if(!empty($this->session->userdata('propics'))) { if(substr($this->session->userdata('propics'),0,4) == 'http' || substr($this->session->userdata('propics'),0,5) == 'https'){ ?>
					<img src="<?php echo $this->session->userdata('propics')?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 3px">
					<?php } else{ ?>
					<img src="<?php echo $this->config->base_url().'candidate/'.$this->session->userdata('propics') ?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 3px">
					<?php } } else{ ?>
					<img src="<?php echo base_url();?>assets/img/person.png" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 3px">
					<?php } ?>
				</a>
				<?php } ?>
				<?php if($this->session->userdata('hireid')) { ?>
				<a href='#' class="waves-effect waves-light dropdown-trigger right mr10 hide-on-large-only" data-target='profile-dropdown2' style=" line-height: 0;">
					<?php if (!empty($this->session->userdata('profile'))) { ?>
					<img src="<?php echo $this->config->base_url().'hire/'.$this->session->userdata('profile');?>" class="responsive-img circle left" width="45px" height="45px" style="margin-top: 7px">
					<?php } else { ?>
					<img src="<?php echo base_url();?>assets/img/person.png" class="responsive-img circle left" width="45px" height="45px" style="margin-top: 7px">
					<?php } ?>
				</a>
				<?php } ?>
				<?php if(!$this->session->userdata('cand_chid') && !$this->session->userdata('hireid')) { ?>	<a href="<?php echo base_url()?>candidate" class="white-text brand btn right hide-on-med-and-up mr10 mt10">Sign in</a>
				<ul class=" hide-on-med-and-down ">
					<li><a href="<?php echo base_url()?>Jobs?jobs=list" class="waves-effect">Find Jobs	</a>
					</li>
					<li><a href="<?php echo base_url()?>Psychometric" class="waves-effect">Psychometric Test</a>
					</li>
					<li><a href="<?php echo base_url()?>CV_Writing" class="waves-effect">Professional CV Writing</a>
					</li>
					<li><a href="<?php echo base_url()?>Pricing" class="waves-effect">Pricing</a>
					</li>
					<li><a href="<?php echo base_url()?>blog" class="waves-effect">Blog</a>
					</li>
				</ul>
				<ul class="right hide-on-med-and-down ">
					<li><a href="<?php echo base_url()?>candidate" class="waves-effect">Login</a>
					</li>
					<li>|</li>
					<li><a href="<?php echo base_url()?>PostCV" class="waves-effect">Register</a>
					</li>
					<li class="">
						<a href="<?php echo base_url()?>hire/login" class="waves-effect waves-light btn white-text  brand nav-btn">	<i class="material-icons left white-text">add_box</i> Post a Job</a>
					</li>
				</ul>
				<?php } elseif($this->session->userdata('cand_chid')){ ?>
				<ul class="right hide-on-med-and-down ">
					<li><a href="<?php echo base_url()?>candidate/MyProfile" class="waves-effect bold">Dashboard</a>
					</li>
					<li><a href="<?php echo base_url()?>Jobs?jobs=list" class="waves-effect bold">Find Jobs	</a>
					</li>
					<li><a href="<?php echo base_url()?>Psychometric" class="waves-effect bold">Psychometric Test</a>
					</li>
					<li><a href="<?php echo base_url()?>candidate/Subscriptions" class="waves-effect bold">Pricing</a>
					</li>
					<li>|</li>
					<li><a href="<?php echo base_url()?>candidate/notification" class="waves-effect bold"><i class="tiny material-icons left">notifications_none</i></a>
					</li>
					<li>
						<a href='#' class="waves-effect waves-light dropdown-trigger" data-target='profile-dropdown' style=" line-height: 0;">
						<?php if(!empty($this->session->userdata('propics'))) { if(substr($this->session->userdata('propics'),0,4) == 'http' || substr($this->session->userdata('propics'),0,5) == 'https'){ ?>
							<img src="<?php echo $this->session->userdata('propics')?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 3px">
							<?php } else{ ?>
							<img src="<?php echo $this->config->base_url().'candidate/'.$this->session->userdata('propics') ?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 3px">
							<?php } } else{ ?>
							<img src="<?php echo base_url();?>assets/img/person.png" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 3px">
							<?php } ?>	
							<i class="tiny material-icons left">arrow_drop_down</i>
						</a>
					</li>
				</ul>
				<?php } elseif($this->session->userdata('hireid')){ ?>
				<ul class="right hide-on-med-and-down ">
					<li><a href="<?php echo base_url()?>hire" class="waves-effect bold">Dashboard</a>
					</li>
					<li><a href="<?php echo base_url()?>" class="waves-effect bold">Find Candidate	</a>
					</li>
					<li><a href="<?php echo base_url()?>hire/Jobs/Add" class="waves-effect bold"> Post a Job	</a>
					</li>
					<li><a href="<?php echo base_url()?>hire/Subscriptions" class="waves-effect bold">Pricing</a>
					</li>
					<li>|</li>
					<li><a href="<?php echo base_url()?>notification" class="waves-effect bold"><i class="tiny material-icons left">notifications_none</i></a>
					</li>
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
		<li><a href="<?php echo base_url()?>candidate/MyProfile">Profile</a>
		</li>
		<li><a href="<?php echo  base_url()?>candidate/ProfileSettings">Settings</a>
		</li>
		<li><a href="<?php echo  base_url()?>candidate/Support">Help</a>
		</li>
		<li class="divider"></li>
		<li><a href="<?php echo  base_url()?>candidate/Logout">Logout <i class="tiny material-icons right">exit_to_app</i></a>
		</li>
	</ul>
	<!-- -->
	<?php } if ($this->session->userdata('hireid')) { ?>
	<ul id="profile-dropdown" class="dropdown-content" style="min-width: 165px">
		<li><a href="<?php echo base_url()?>hire/Dashboard">Dashboard</a>
		</li>
		<li><a href="<?php echo  base_url()?>hire/AccountSettings">Profile</a>
		</li>
		<li><a href="<?php echo  base_url()?>hire/Support">Help</a>
		</li>
		<li class="divider"></li>
		<li><a href="<?php echo  base_url()?>hire/Logout">Logout <i class="tiny material-icons right">exit_to_app</i></a>
		</li>
	</ul>
	<?php } ?>


	<ul class="sidenav" id="mobile-demo">
		<?php if(!$this->session->userdata('cand_chid') && !$this->session->userdata('hireid')) { ?>	<a href="<?php echo base_url()?>" class="brand-logo "><img src="<?php echo base_url(); ?>assets/img/logo.png" class="circle ml10 responsive-img"></a>
		<li><a href="<?php echo base_url()?>candidate" class="waves-effect">Login</a>
		</li>
		<li><a href="<?php echo base_url()?>PostCV" class="waves-effect">Register</a>
		</li>
		<li><a href="<?php echo base_url()?>hire/login" class="waves-effect"> Post a Job</a>
		</li>
		<li><a href="<?php echo base_url()?>Jobs?jobs=list" class="waves-effect">Find Jobs</a>
		</li>
		<li><a href="<?php echo base_url()?>Psychometric" class="waves-effect">Psychometric Test</a>
		</li>
		<li><a href="<?php echo base_url()?>CV_Writing" class="waves-effect">Professional CV Writing</a>
		</li>
		<li><a href="<?php echo base_url()?>Pricing" class="waves-effect">Pricing</a>
		</li>
		<li><a href="<?php echo base_url()?>blog" class="waves-effect">Blog</a>
		</li>
		<?php } elseif($this->session->userdata('cand_chid')){ ?>
		<li>
			<a href="<?php echo base_url(); ?>candidate" class="brand-logo " style="height: 65px">
				<?php if(!empty($this->session->userdata('propics'))) { if(substr($this->session->userdata('propics'),0,4) == 'http' || substr($this->session->userdata('propics'),0,5) == 'https'){ ?>
					<img src="<?php echo $this->session->userdata('propics')?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 3px">
					<?php } else{ ?>
					<img src="<?php echo $this->config->base_url().'candidate/'.$this->session->userdata('propics') ?>" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 3px">
					<?php } } else{ ?>
					<img src="<?php echo base_url();?>assets/img/person.png" class="responsive-img circle left" width="50px" height="50px" style="margin-top: 3px">
					<?php } ?>
			</a>
		</li>


		<?php $url = $this->uri->segment(1); ?>
			<li class=" <?php echo ($url=='MyProfile')? 'activel':'' ?>" >
				<a href="<?php echo base_url()?>candidate/PostCv" class="waves-effect "> <i class="material-icons">dashboard</i> Dashboard</a>
			</li>
			<li class=" <?php echo ($url=='applied-jobs')? 'activel':'' ?>">
				<a href="<?php echo base_url()?>candidate/applied-jobs" class="waves-effect"> <i class="material-icons">playlist_add_check</i> Applied Jobs</a>
			</li>
			<li class=" <?php echo ($url=='saved-jobs')? 'activel':'' ?>">
				<a href="<?php echo base_url()?>candidate/saved-jobs" class="waves-effect"><i class="material-icons">star</i> Saved Jobs</a>
			</li>
			<li class=" <?php echo ($url=='recommended-jobs')? 'activel':'' ?>">
				<a href="<?php echo base_url()?>candidate/recommended-jobs" class="waves-effect"><i class="material-icons">event_note</i> Recommended Jobs</a>
			</li>
			<li><a href="<?php echo base_url()?>candidate/Subscriptions" class="waves-effect bold"><i class="material-icons" style="margin-right:10px">monetization_on</i>Subscriptions</a></li>
			<li class=" <?php echo ($url=='cvwriting')? 'activel':'' ?>">
				<a href="<?php echo base_url()?>candidate/cvwriting/professional-cv" class="waves-effect"><i class="fas fa-pen-nib" style="margin-left: 3px;margin-right: 5px"></i> Professional CV Writing</a>
			</li>
			<li class=" <?php echo ($url=='psychotest')? 'activel':'' ?>">
				<a href="<?php echo base_url() ?>candidate/psychotest/plans" class="waves-effect"><i class="fas fa-file-signature" style="margin-left: 3px;margin-right: 5px"></i> Psychometric test</a>
			</li>
			<li class=" <?php echo ($url=='notification')? 'activel':'' ?>">
				<a href="<?php echo base_url() ?>candidate/notification" class="waves-effect"><i class="material-icons " style="margin-right:10px"> move_to_inbox</i>Inbox</a>
			</li>
			<li class=" <?php echo ($url=='cv-visitors')? 'activel':'' ?>">
				<a href="<?php base_url()?>candidate/cv-visitors" class="waves-effect"><i class="material-icons " style="margin-right:10px"> people_outline</i>Recruiters Visits on cv</a>
			</li>
			
		  	<li><a href="<?php echo base_url();?>Jobs?jobs=list" class="waves-effect bold"><i class="material-icons " style="margin-right:10px">search</i>Find Jobs	</a></li>
		  	<!-- <li><a href="<?php echo  base_url()?>ProfileSettings">Settings</a></li> -->
		  	<!-- <li><a href="<?php echo base_url()?>Jobs">Profile</a></li> -->
		  	<li><a class="waves-effect bold" href="<?php echo  base_url()?>candidate/Logout">Logout <i class="material-icons nav-slid-icon">exit_to_app</i></a></li>	




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
			<li>
				<a href="<?php echo base_url()?>hire" class="waves-effect active"> <i class="material-icons nav-slid-icon">dashboard</i> Dashboard</a>
			</li>
			<li >
				<a href="<?php echo base_url()?>hire/Jobs/Add" class="waves-effect "> <i class="material-icons nav-slid-icon">playlist_add_check</i> Post Jobs</a>
			</li>
			<li>
				<a href="<?php echo base_url() ?>hire/application" class="waves-effect"><i class="fas fa-users "></i> All Application</a>
			</li>
			
			<li>
				<a class="waves-effect menu-main"><i class="fas fa-file-signature" style="margin-left: 3px;margin-right: 5px"></i>My Jobs</a>
				<ul class="menu-sub">
					<li><a href="<?php echo base_url()?>hire/MyJobs"> Active Job</a></li>
					<li><a href="<?php echo base_url()?>hire/MyJobs/Expired"> Close Job</a></li>
				</ul>
			</li>

			<li>
				<a href="<?php echo base_url() ?>hire/billing-history" class="waves-effect"><i class="fas fa-file-invoice-dollar"></i> Billing History</a>
			</li>
			<li><a href="<?php echo  base_url()?>hire/AccountSettings"><i class="far fa-user-circle"></i> Profile</a></li>
		  	
		  	<li><a href="<?php echo base_url()?>hire/Subscriptions" class="waves-effect bold"><i class="fas fa-dollar-sign"></i> Subscriptions</a></li>
		  	<li class="divider"></li>
		  	<li><a href="<?php echo  base_url()?>hire/Logout">Logout <i class="tiny material-icons">exit_to_app</i></a></li>
		<?php } ?>
	</ul>


	<ul id="profile-dropdown1" class="dropdown-content" style="min-width: 165px">
		<li><a href="<?php echo base_url().'candidate/'?>Jobs">Profile</a>
		</li>
		<li><a href="<?php echo  base_url().'candidate/'?>ProfileSettings">Settings</a>
		</li>
		<li><a href="<?php echo  base_url().'candidate/'?>Support">Help</a>
		</li>
		<li class="divider"></li>
		<li><a href="<?php echo  base_url().'candidate/'?>Logout">Logout <i class="tiny material-icons right">exit_to_app</i></a>
		</li>
	</ul>
	<ul id="profile-dropdown2" class="dropdown-content" style="min-width: 165px">
		<li><a href="<?php echo base_url().'hire/'?>Jobs">Dashboard</a>
		</li>
		<li><a href="<?php echo  base_url().'hire/'?>AccountSettings">Profile</a>
		</li>
		<li><a href="<?php echo  base_url().'hire/'?>Support">Help</a>
		</li>
		<li class="divider"></li>
		<li><a href="<?php echo  base_url().'hire/'?>Logout">Logout <i class="tiny material-icons right">exit_to_app</i></a>
		</li>
	</ul>
</header>
<!-- end nav bar -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-126732830-1"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	
	  gtag('config', 'UA-126732830-1');
</script>