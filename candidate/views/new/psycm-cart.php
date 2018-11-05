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
										<th> Description</th>
										<th> Amount</th>
										<th class="right-align">Action</th>
									</thead>
									<tbody>
										 
                                        <?php $sumamt = 0; $x=0; if(!empty($cartdata)) { $x=0; foreach ($cartdata as $result) { $x++; ?>
                                        <?php
											if($x%2 == 0)
											{
												$tdcls = 'even pointer';
											}
											else
											{
												$tdcls = 'odd pointer';
											}
											$sumamt = $sumamt + $result->psyr_amount;
											//$sumamt = 49;
										?>
                                            <tr class="">
                                                <td class=" "><?php echo $x;?></td>
                                                <td class=" "><?php echo $result->psyr_name; ?></td>
                                                <td class=" last"><i class="fa fa-usd "></i> <?php echo number_format($result->psyr_amount,2);?>
                                            	</td>
                                                
                                                <td class="right-align"><a href="<?php echo base_url() ?>psychotest/deleteit?id=<?php echo $result->psyr_id ?>"  class="red-text waves-effect del-btn" valt='<?php echo $result->psyr_id?>'><i class="fa fa-trash "></i></a></td>
                                            </tr>
                                            <?php  } } if($sumamt > 0) {?>
                                            <tr>
                                                <td class=" "></td>
                                                <td class="right-align" > <b>Total Amount</b></td>
                                                <td class=" last">$ <?php echo number_format($sumamt,2);?></td>
                                                <td class=" "></td>
                                            </tr>
                                            
                                            <?php } else { ?>
                                            <tr>
                                                <td colspan="4" class=" " align="center"> Cart is Empty</td>
                                             </tr>   
                                             <?php } ?>  
									</tbody>
								</table>
								<form class="form-horizontal form-label-left input_mask" action="<?php echo $this->config->base_url('psychotest/billingcart'); ?>" method="post">
									<div class="divider" style="margin: 5px 0"></div>
									<div class="btnssets" style="overflow: hidden;padding: 12px 0" >
										<a href="<?php echo base_url() ?>psychotest/plans">
                                                <i class="material-icons font25" style="position: relative; top: 6px;"> keyboard_backspace</i>
                                                 Psychometric Test
                                            </a>
                                                
										<input name="totamt" type="hidden" value="<?php echo $sumamt;?>" />
	                                    <input name="canid" type="hidden" value="<?php echo base64_encode($this->encryption->encrypt($this->session->userdata('cand_chid')));?>" />

										<?php if($sumamt > 0) { ?>
											<button class="btn brand white-text hoverable waves-effect right" type="submit">Place Order</button>
										<?php } ?>
	                                        
									
									</div>
								</form>
							</div>
							
							<!-- bottons -->
							
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

	 <script>
    $(document).ready(function(){
        $('.del-btn').click(function(){
            if (!confirm("Do you want to delete")){
              return false;
            }
            else{
               return true;
            }
        });
    })
</script>
</body>
</html>