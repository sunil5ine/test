<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php'  ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width" />
  	<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
	<style type="text/css">
		@media(min-width: 601px){
			.plan-test{min-height: 464px;}
			.plan-test .center a.btn{position: relative; top: 67px;}
		}
	</style>
</head>
<body>
	<!-- navigation bar -->
	<?php include 'include/header.php'  ?>
	<!-- end nav bar -->

	
	<section class="">
		<div class="row">
			<div class="container-wrap">
				<div class="row">
					<div class="center title">
						<h5 class="black-text">Choose the appropriate plan for you</h5>
						<!-- <p>Lorem ipsum dolor sit amet elit.</p> -->
					</div>
				</div><!-- end row -->

				<div class="row switch-container">
					<div class="col s12 m6"> 
						<div class="switch">
							<label>
								<span class="bold">Candidates Plan</span>
								<input type="checkbox" id="plan-selector">
								<span class="lever"></span>
								<span class="fad-text">Employers Plan</span>
							</label>
						</div>
					</div>
					<div class="col s12 m6"> 
						<?php echo $this->session->flashdata('message'); ?>
					</div>
					
				</div><!-- end row -->
					
				<!-- payment -->
				<div class="row" id="candidate">
				<?php 
				if(!empty($mon_plan)){
				foreach ($mon_plan as $plan) { 
					if ($plan->pr_gat == 1) { ?>
					
						<div class="col m6 l3 xl3 s12">
						<!-- card start -->
						<div class="card-panel plans plan-test">
							<?php  if (!empty($plan->pr_notify)) { $btn_class = 'white-text brand'; ?>
								<div class="center" style="margin-top: -37px;">
									<div class="chip brand white-text ">
							    		<?php  echo $plan->pr_notify; ?>
							    	</div>
								</div>
							<?php }else{ $btn_class = 'brand-text';} ?>
							<div class="card-title-box">
						        <span class="card-title left-align"> <?php echo $plan->pr_name ?> </span>
						        <span class="card-title right"> $ <?php echo $plan->pr_offer ?> </span>
							    <div class="card-sub-title">
									<span class="left-align"></span>
									
						        </div>
					        </div>
					        
					        <div class="card-action ">
					        	<ul>
					        		<li>
					        			<span class="left-align">Validity Period </span>
					        			<span class="right"><?php echo $plan->pr_limit;echo ($plan->pr_id>1)? ' months':' month';?></span>
					        		</li>
					        		
					        		<li>
					        			<span class="left-align ">Test Reasoning Skills </span>
					        			<span class="right brand-text"><i class="material-icons">done</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align ">Test Numerical Ability </span>
					        			<span class="right brand-text"><i class="material-icons">done</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align ">Test Verbal Ability </span>
					        			<span class="right brand-text"><i class="material-icons">done</i></span>
					        		</li>
					        		<li>
					        			<span class="left-align ">Test Data Analysis Skills </span>
					        			<span class="right brand-text"><i class="material-icons">done</i></span>
					        		</li>
					        		
					        	</ul>
					        	<div class="center">
					        		<a style="min-width: 180px" href="<?php echo $this->config->base_url();?>candidate" class=" btn btn-m <?php echo $btn_class ?>  btn-nc waves-green hoverable  waves-effect transparent">Get Started</a>
					        	</div>
					    	</div>
					    </div><!-- end card  1-->
					</div><!-- end col -->


					<?php  } if ($plan->pr_gat == 0) { ?>
				
					<div class="col m6 l3 xl3 s12">
						<!-- card start -->
						<div class="card-panel plans">
							<?php  if (!empty($plan->pr_notify)) { $btn_class = 'white-text brand'; ?>
								<div class="center" style="margin-top: -37px;">
									<div class="chip brand white-text ">
							    		<?php  echo $plan->pr_notify; ?>
							    	</div>
								</div>
							<?php }else{ $btn_class = 'brand-text';} ?>
							<div class="card-title-box">
						        <span class="card-title left-align"> <?php echo $plan->pr_name ?> </span>
						        <span class="card-title right"> $ <?php echo $plan->pr_offer ?> </span>
							    <div class="card-sub-title">
									<span class="left-align"></span>
									<span class="right">/ <?php echo $plan->pr_limit;echo ($plan->pr_id>1)? ' months':' month';?></span>
						        </div>
					        </div>
					        
					        <div class="card-action ">
					        	<ul>
					        		<li>
					        			<span class="left-align">Validity Period </span>
					        			<span class="right"><?php echo $plan->pr_limit;echo ($plan->pr_id>1)? ' months':' month';?></span>
					        		</li>
					        		<li>
					        			<span class="left-align">Job Applications</span>
					        			<span class="right"><?php echo $plan->pr_nojob ?></span>
					        		</li>
					        		<li>
					        			<span class="left-align">Personalised Job Alerts</span>
					        			<span class="right <?php echo ($plan->pr_job_aler== 1)? ' brand-text':' red-text'; ?>">
					        				<i class="material-icons"><?php echo ($plan->pr_job_aler == 1)? ' done':' close'; ?></i>
					        			</span>
					        		</li>
					        		<li>
					        			<span class="left-align">View Employer  Details</span>
					        			<span class="right <?php echo ($plan->pr_view_employer_detail == 1)? ' brand-text':' red-text'; ?>">
					        				<i class="material-icons"><?php echo ($plan->pr_view_employer_detail== 1)? ' done':' close'; ?></i>
					        			</span>
					        		</li>
					        		<li>
					        			<span class="left-align">Who Viewd Your Profile</span>
					        			<span class="right <?php echo ($plan->pr_prfle_viewrs== 1)? ' brand-text':' red-text'; ?>">
					        				<i class="material-icons"><?php echo ($plan->pr_prfle_viewrs== 1)? ' done':' close'; ?></i>
					        			</span>
					        		</li>
					        		<li>
					        			<span class="left-align">More Profile Views</span>
					        			<span class="right <?php echo ($plan->pr_boost== 1)? ' brand-text':' red-text'; ?>">
					        				<i class="material-icons"><?php echo ($plan->pr_boost== 1)? ' done':' close'; ?></i>
					        			</span>
					        		</li>
					        		<li>
					        			<span class="left-align">Assisted Job Search</span>
					        			<span class="right <?php echo ($plan->pr_as_jobsearch== 1)? ' brand-text':' red-text'; ?>">
					        				<i class="material-icons"><?php echo ($plan->pr_as_jobsearch== 1)? ' done':' close'; ?></i>
					        			</span>
					        		</li>
					        		<li>
					        			<span class="left-align">Resume Review</span>
					        			<span class="right <?php echo ($plan->pr_resume_view== 1)? ' brand-text':' red-text'; ?>">
					        				<i class="material-icons"><?php echo ($plan->pr_resume_view== 1)? ' done':' close'; ?></i>
					        			</span>
					        		</li>
					        		<li>
					        			<span class="left-align">Profile Enrichment</span>
					        			<span class="right <?php echo ($plan->pr_enrichment== 1)? ' brand-text':' red-text'; ?>">
					        				<i class="material-icons"><?php echo ($plan->pr_enrichment== 1)? ' done':' close'; ?></i>
					        			</span>
					        		</li>
					        		
					        	</ul>
					        	<div class="center">
					        		<a style="min-width: 180px" href="<?php echo $this->config->base_url();?>candidate" class=" btn btn-m <?php echo $btn_class ?>  btn-nc waves-green hoverable  waves-effect transparent">Get Started</a>
					        	</div>
					    	</div>
					    </div><!-- end card  1-->
					</div><!-- end col -->

				<?php } } }?>
				</div><!-- end row -->
	



				<div class="row" id="employer" style="display: none;">
					<?php if(!empty($employer)) {  foreach ($employer as $result) {  ?>
					<div class="col m6 l6 xl4 s12">
						<!-- card start -->
						<div class="card-panel plans">
							<?php if($result->pr_notify != '') { ?>
								<div class="center" style="margin-top: -37px;">
									<div class="chip brand white-text ">
							    		Most popular
							    	</div>
								</div>
							<?php } ?>
							<div class="card-title-box">
						        <span class="card-title left-align"> <?php echo $result->pr_name;?> </span>
						        <span class="card-title right">  <?php echo ($result->pr_offer != 0)? '$ '. number_format($result->pr_offer,0): ''?> </span>
							    <div class="card-sub-title">
									<span class="left-align"><?php echo $result->exprence_level ?> </span>
									<span class="right">/  <s> <?php echo ($result->pr_offer != 0)? '$ '. number_format($result->pr_orginal,0): ''?></s></span>
						        </div>
					        </div>
					        
					        <div class="card-action ">
					        	<ul>
					        		<li>
					        			<span class="left-align">Plan Name</span>
					        			<span class="right"><?php echo $result->pr_name;?></span>
					        		</li>
									<li>
					        			<span class="left-align">Candidates Experience Level</span>
					        			<span class="right"><?php echo $result->exprence_level;?></span>
					        		</li>
					        		<li>
					        			<span class="left-align">Verified candidates</span>
					        			<span class="right "><?php echo $result->pr_cvno;?></span>
					        		</li>
					        		<li>
					        			<span class="left-align">Validity Period </span>
					        			<span class="right"><?php echo ($result->peried > 1)?$result->peried.' Days'  : $result->peried.' Day' ?></span>
					        		</li>
					        		
					        		<li>
					        			<span class="left-align">Price</span>
					        			<span class="right"> <s><?php echo ($result->pr_orginal != 0)? '$ '. number_format($result->pr_orginal,0): 'Free'?></s></span>
					        		</li>
					        		<li>
					        			<span class="left-align">Offer price</span>
					        			<span class="right"><?php echo ($result->pr_offer != 0)? '$ '. number_format($result->pr_offer,0): 'Free'?></span>
					        		</li>

					        		<li>
					        			<span class="left-align">Premium <?php echo ($result->pr_limit==1)?'Job':'Jobs';?></span>
					        			<span class="right"><?php echo $result->pr_limit;?></span>
					        		</li>
					        		

					        	</ul>
					        	<div class="center">
					        	<?php if($result->pr_notify != '') { ?>
					        		
					        		<a href="<?php echo $this->config->base_url();?>hire/login" style="min-width: 180px" class=" btn btn-m white-text brand waves-green  waves-effect ">Get Started</a>
					        	<?php } else{ ?>
					        		<a href="<?php echo $this->config->base_url();?>hire/login" style="min-width: 180px" class=" btn btn-m brand-text btn-nc waves-green hoverable  waves-effect transparent">Get Started</a>
					        	<?php } ?>
					        	</div>
					    	</div>
					    </div><!-- end card  1-->
					</div><!-- end col -->
					<?php } } ?>
				</div>

			</div><!-- end wrap -->
		</div> <!-- end row -->
	</section>
	<!-- footer -->
		<?php echo include'include/footer.php' ?>
	<!-- scripts -->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#plan-selector').change(function(){
				if($(this).is(':checked'))
				{
					$('#candidate').toggle(500);
					$('#employer').toggle(500);

				}else{
					$('#employer').toggle(500);
					$('#candidate').toggle(500);
				}
			});
		});
	</script>
</body>
</html>