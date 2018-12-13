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
		                    	<?php $this->session->flashdata('message'); ?>
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
										<th> Description</th>
										<th> Amount</th>
										<th class="right-align">Action</th>
									</thead>
									<tbody>
										<?php 
											$sumamt = 0; 
											$x=0; 
											if(!empty($cartdata)) { 
												$x=0; 
												foreach ($cartdata as $result) { 
													$x++; 
												$sumamt = $sumamt + $result->cvw_amt;
											
										?>
                                            <tr>
                                                <td class=" "><?php echo $x;?></td>
                                                <td class=" ">Professional CV services</td>
                                                <td class=" last"><i class="fa fa-usd "></i> <?php echo number_format($result->cvw_amt,2);?></td>
                                                <td class="right-align">
                                                	<a href="<?php echo base_url() ?>cvwriting/deleteit?id=<?php echo $result->cvw_id ?>"  class="red-text waves-effect" valt='<?php echo $result->cvw_id?>'> 
                                                		<i class="material-icons">delete</i> 
                                                	</a>
                                                </td>
                                            </tr>
                                            <?php  } } if($sumamt > 0) {?>
                                            <tr>
                                                <td class=" "></td>
                                                <td class="right-align" > <b>Total Amount</b></td>
                                                <td class=" last">$ <b><?php echo number_format($sumamt,2);?></b></td>
                                                <td></td>
                                            </tr>
                                            <?php } else { ?>
                                            <tr>
                                                <td colspan="4" class=" " align="center"> Cart is Empty</td>
                                             </tr>   
                                             <?php } ?> 
											
									</tbody>
								</table>
							</div>

							<!-- bottons -->
							<form class=""  action="<?php echo $this->config->base_url('cvwriting/billingcart'); ?>" method="post">
							<div class="row m0">
								<div class="divider" style="margin: 15px 0"></div>
								<div class="" style="margin: 20px 0px;overflow: hidden;">
									<div class="col s12 m6 l6">
										<label>
	                                        <input type="checkbox" name="cvcover" id="cvcover" class="filled-in" <?php if(!empty($result->cvw_cover)) {echo ($result->cvw_cover==1?'checked':''); }?> value="1" tabindex="2">
	                                        <span>Cover Letter + $10.00</span>
	                                    </label>
									</div>
									<div class="col s12 m6 l6">
										<label>
	                                        <input type="checkbox" name="cvexpress" id="cvexpress" class="filled-in" <?php if(!empty($result->cvw_express)) { echo ($result->cvw_express==1?'checked':'');} ?> value="1" tabindex="3"> <span>Express Delivery + $10.00 (24-48 Hours)</span>
	                                    </label>
									</div>
								</div>
								<div class="col s6 m6 l6">

									<a href="<?php echo $this->config->base_url().'cvwriting/professional-cv'; ?>" class="btn brand white-text hoverable waves-effect waves-lighten-1 mb10">Edit <i class="material-icons right" style="width: 20px">edite</i></a>
								</div>

								<div class="col s6 m6 l6">
									<input name="totamt" type="hidden" value="<?php echo $sumamt;?>" />
                                    <input name="canid" type="hidden" value="<?php echo base64_encode($this->encryption->encrypt($this->session->userdata('cand_chid')));?>" />
									<?php if($sumamt > 0) { ?>
										<button type="submit" class="btn brand white-text hoverable waves-effect waves-lighten-1 right">Continue Shopping</button>
									<?php } ?>
								</div>
							</div>
						</form>
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

			$('#cvexpress').click(function(){
            if($(this). prop("checked") == true)
            {
               var cvexpress = '1';
            }
            else{
                 var cvexpress = '0';
            }

            $.ajax({
                data:{cvexpress:cvexpress},
                type:'GET',
                url:'<?php echo base_url() ?>Cvwriting/cvexpressup',
                success(){

                }

            });
        });

        $('#cvcover').click(function(){
            if($(this). prop("checked") == true)
            {
               var cvcover = '1';
            }
            else{
                 var cvcover = '0';
            }

            $.ajax({
                data:{cvcover:cvcover},
                type:'GET',
                url:'<?php echo base_url() ?>Cvwriting/cvw_coverup',
                success(){

                }

            });
        });
		});
	</script>
</body>
</html>