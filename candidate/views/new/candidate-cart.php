<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php'  ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo $this->config->item('web_url');?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url');?>assets/css/style.css">
</head>
<body>
	<!-- header -->
	<?php include 'include/header.php'  ?>
	<!-- End header -->


	<!-- Applied Jobs -->
	<section>
		<div class="row">
			<div class="container-wrap">
				<!-- left nav -->
					<?php include 'include/left-nav.php'  ?>
				<!-- end left nav -->

				<!-- right side -->
				<div class="col m12  s12 l9 pofile-details-table-card">
					<div class="row">	
						<div class="appl-job-heading col m8 s8 l6 ">
							<p class="black-text h5"> <?php echo $pagehead; ?> </p>
						</div>

						<div class="col s12 m12 l6">
							<div class="page-title">
		                    	<?php echo $message; ?>
		                    </div>
		                    <?php if($this->session->flashdata('success'))
		                        { ?>
		                            <div class="alert alert-success alert-dismissible fade in">
		                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                                <strong>Success!</strong><br> <?php echo $this->session->flashdata('success'); ?>
		                            </div>
		                    <?php } if($this->session->flashdata('error')) { ?>
		                                <div class="alert alert-danger alert-dismissible fade in">
		                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		                                <strong>Error!</strong><br> <?php echo $this->session->flashdata('error'); ?>
		                            </div>
		                    <?php } ?>
						</div>
						
					</div>
					<!-- Education -->
					<div class="card scrollspy" id="education">
						<div class="card-content">
							<p class="bold mb10 h6">Cart Details</p>
							<div class="table-box ">
								<table class="highlight responsive-table striped">
									<thead class="grey  lighten-2">
										<th> Sl No</th>
										<th> Plan</th>
										<th> Validity period</th>
										<th> No of jobs</th>
										<th> Amount</th>
										<th></th>
									</thead>
									<tbody>
										<?php 
											$sumamt = 0; 
											if(!empty($cartdata)){ 
												$x=0; 
												foreach ($cartdata as $result){ 
													$x++; 
													if($x%2 == 0) {
														$tdcls = 'even pointer';
													}
												else {
													$tdcls = 'odd pointer';
												}
												$sumamt = $sumamt + $result->temp_amt;
										?>
											<tr>
												<td><?php echo $x;?></td>
												<td><?php echo  $result->pr_name ?></td>
												<td><?php echo  ($result->pr_limit > 1)? $result->pr_limit.' Months' : $result->pr_limit." Month"  ?></td>
												<td><?php echo  $result->pr_nojob?></td>
												<td><?php echo  $result->temp_amt ?></td>
												<td><a href="<?php echo $this->config->base_url().'Subscriptions/RemoveCart/'.$result->temp_encrypt_id; ?>" class="edite-layout delete-c right red-text waves-effect"><i class="material-icons ">delete</i></a></td>
											</tr>

										<?php  } } 
											if($sumamt > 0) { ?>
											<tr>
                                                <td class=" "></td>
                                                <td class=" "></td>
                                                <td class=" "></td>
                                                <td class="black-text" align="right"> <b>Total Amount</b></td>
                                                <td class="black-text bold"><i class="fa fa-usd "></i> <b><?php echo number_format($sumamt,2);?></b></td>
                                                <td class=" last" align="center"></td>
                                            </tr>
										<?php } else { ?>
                                        	<tr>
                                        		<td colspan="6" class=" " align="center"> Cart is Empty</td>
                                        	</tr>   
                                    	<?php } ?> 
									</tbody>
								</table>
							</div>

							<!-- bottons -->
							<div class="row m0">
								<div class="divider" style="margin: 15px 0"></div>
								<div class="col s6 m6 l6">

									<a href="<?php echo $this->config->base_url().'Subscriptions'; ?>" class="btn brand white-text hoverable waves-effect waves-lighten-1">Continue Shopping</a>
								</div>

								<div class="col s6 m6 l6">
									<form style="overflow: visible" action="<?php echo $this->config->base_url().'Subscriptions/BillingSection'; ?>" method="post">
										<input name="totamt" type="hidden" value="<?php echo $sumamt;?>" />
										<input name="canid" type="hidden" value="<?php echo base64_encode($this->encryption->encrypt($this->session->userdata('cand_chid')));?>" />
										<?php if($sumamt > 0) { ?>
											<button class="right btn btn-nc hoverable brand-text transparent waves-effect waves-green" type="submit">Place Order</button>
										<?php } ?>
									</form>
								</div>
							</div>
						</div>
					</div><!-- End education -->
				</div>
			</div>
		</div>
	</section>
	


<!-- footer -->
	<?php echo include'include/footer.php' ?>
<!-- end footer -->




	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/script.js"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			$('.delete-c').click(function() {
				if (confirm('Are you Sure'))
				{
					return true;
				}
				else
				{
					return false;
				}
				
			});
		});
	</script>
</body>
</html>