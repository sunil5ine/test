<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php'  ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width" />
  	<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo $this->config->item('web_url');?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/style.css">
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
						<?php echo $this->session->flashdata('message'); ?>
					</div>
					<div class="col s12 m6">
						<div class="right-align">
							<h6><a href="#billing" class='blue-text billing modal-trigger'>View Billing History</a></h6>
						</div>
					</div>
				</div><!-- end row -->
					
				<!-- payment -->
				<div class="row">
				<?php 
				if(!empty($mon_plan)){
				foreach ($mon_plan as $plan) { 
					if ($plan->pr_gat == 1) { ?>
					
						<div class="col m6 l4  s12">
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
					        		<a style="min-width: 180px" href="<?php echo $this->config->base_url();?>Subscriptions/Order/<?php echo $plan->pr_encrypt_id;?>" class=" btn btn-m <?php echo $btn_class ?>  btn-nc waves-green hoverable  waves-effect transparent">Get Started</a>
					        	</div>
					    	</div>
					    </div><!-- end card  1-->
					</div><!-- end col -->


					<?php  } if ($plan->pr_gat == 0) { ?>
				
					<div class="col m6 l4  s12">
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

									<?php if(!empty($plan->pr_details)){ ?>
										<li>
											<span class="left-align"><?php echo $plan->pr_details ?></span>
											<span class="right brand-text">
												<i class="material-icons">done</i>
											</span>
										</li>
									<?php	}	?>
									<li>
					        			<span class="left-align">Video Interview </span>
					        			<span class="right <?php echo ($plan->pr_video_interview== 1)? ' brand-text':' red-text'; ?>">
										<i class="material-icons"><?php echo ($plan->pr_video_interview== 1)? ' done':' close'; ?></i>
										</span>
					        		</li>
					        		
					        	</ul>
					        	<div class="center">
					        		<a style="min-width: 180px" href="<?php echo $this->config->base_url();?>Subscriptions/Order/<?php echo $plan->pr_encrypt_id;?>" class=" btn btn-m <?php echo $btn_class ?>  btn-nc waves-green hoverable  waves-effect transparent">Get Started</a>
					        	</div>
					    	</div>
					    </div><!-- end card  1-->
					</div><!-- end col -->

				<?php } } }?>
				</div><!-- end row -->




			</div><!-- end wrap -->
		</div> <!-- end row -->
	</section>



	<!-- footer -->
		<?php echo include'include/footer.php' ?>
	<!-- mode -->
<div id="billing" class="modal">
    <div class="modal-content  p0">
      <table class="striped highlight responsive-table">
      	<thead class="center grey lighten-2" style="padding-left: 15px">
      		<th style="">Date</th>
      		<th>Order Number</th>
      		<th>Payment Details</th>
      		<th>Payment Status</th>
      		<th>Amount Paid</th>
      		<th>PDF</th>
      	</thead>
      	<tbody>
      		<?php 
      		if(!empty($order_bills)) {
      		foreach ($order_bills as $row) { ?>
      		
      		<tr>
      			<td><?php echo date('d M Y',strtotime($row->ord_date)); ?></td>
      			<td><?php echo $row->trans_id ?></td>
      			<td><?php echo $row->ord_product ?> plan</td>
      			<td><span class="brand-text">Success</span></td>
      			<td class=""><?php echo $row->ord_amt ?></td>
      			<td><a><i class="material-icons">file_download</i></a></td>
      		</tr>

      		<?php } }else{?>
      		<tr>
      			<td colspan="6" class="center">No Order Found</td>
      			
      		</tr>
      		<?php } ?>

      	</tbody>
      </table>
    </div>
  
  </div>



	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/script.js"></script>
</body>
</html>