<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php' ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width" />
  	<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo $this->config->item('web_url')?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/style.css">
</head>
<body>
	<!-- navigation bar -->
	<?php include 'include/header.php' ?>
	<!-- end nav bar -->

	
	<section class="">
		<div class="row">
			<div class="container-wrap">
				<div class="row">
					<div class="center title col s12">
						<h5 class="black-text">Choose the appropriate plan for you</h5>
						
					</div>
					<div class="col s12 m6 push-m3 l6 push-l3">
						<?php echo $message;
						echo $this->session->flashdata('message'); ?>
					</div>
				</div><!-- end row -->
				
				<div class="row switch-container">
					<div class="col s12 m4">
					<?php
							$now  = date('Y-m-d');
							$expi = date('Y-m-d', strtotime($subdetails['sub_expire_dt']));
							$left = date_diff(date_create($now),date_create($expi));
					?>
					<?php if($left->format("%R%a Days") > 0){ ?>
							<p class="m0"><span class="black-text"> <?php echo $left->format("%a Days") ?> left</span> </p>
							<p class="m0"><span class="blue-text bold">Expires On:</span> <?php echo date('d-m-Y', strtotime($expi)); ?></p>
						<?php }else{ ?>
							<p class="red-text bold "><i class="fas fa-exclamation-triangle"></i> Subscription Expired</p>
						<?php } ?>
					</div>
					<div class="col s12 m4">
						<p class="center-align bold blue-text"><?php echo (empty($subdetails['sub_nojobs']))?'0 ' : $subdetails['sub_nojobs']; ?> Premium Jobs left.</p>
					</div>
					<div class="col s12 m4">
						<div class="right-align">
							<h6><a href="<?php echo base_url() ?>billing-history" class='blue-text billing '>View Billing History</a></h6>
						</div>
					</div>
				</div><!-- end row -->
					
				<!-- payment -->
				<div class="row" id="month">
					<?php if(!empty($mon_plan)) {  foreach ($mon_plan as $result) {  ?>
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
					        		
					        		<a href="<?php echo $this->config->base_url();?>Subscriptions/Order/<?php echo $result->pr_encrypt_id;?>" style="min-width: 180px" class=" btn btn-m white-text brand waves-green  waves-effect ">Get Started</a>
					        	<?php } else{ ?>
					        		<a href="<?php echo $this->config->base_url();?>Subscriptions/Order/<?php echo $result->pr_encrypt_id;?>" style="min-width: 180px" class=" btn btn-m brand-text btn-nc waves-green hoverable  waves-effect transparent">Get Started</a>
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
<?php include 'include/footer.php' ?>

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
      		<tr>
      			<td>09/03/2018</td>
      			<td>1009975635</td>
      			<td>Card Ending in 0793</td>
      			<td><span class="brand-text">Success</span></td>
      			<td>$ 10</td>
      			<td><a><i class="material-icons">file_download</i></a></td>
      		</tr>
      		<tr>
      			<td>09/03/2018</td>
      			<td>1009975635</td>
      			<td>Card Ending in 0793</td>
      			<td><span class="red-text">Error</span></td>
      			<td>$ 10</td>
      			<td><a href="" ><i class="material-icons">file_download</i></a></td>
      		</tr>
      		<tr>
      			<td>09/03/2018</td>
      			<td>1009975635</td>
      			<td>Card Ending in 0793</td>
      			<td><span class="brand-text">Success</span></td>
      			<td>$ 10</td>
      			<td><a href="" ><i class="material-icons">file_download</i></a></td>
      		</tr>
      		<tr>
      			<td>09/03/2018</td>
      			<td>1009975635</td>
      			<td>Card Ending in 0793</td>
      			<td><span class="brand-text">Success</span></td>
      			<td>$ 10</td>
      			<td><a href="" ><i class="material-icons">file_download</i></a></td>
      		</tr>

      	</tbody>
      </table>
    </div>
  
  </div>




	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/script.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('#plan-selector').change(function(){
				if($(this).is(':checked'))
				{
					$('#month').toggle(500);
					$('#years').toggle(500);

				}else{
					$('#years').toggle(500);
					$('#month').toggle(500);
				}
			});
		});
	</script>
</body>
</html>