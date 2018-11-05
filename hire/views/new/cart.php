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

	<!-- Applied Jobs -->

	<section>
		<div class="row m0">
			<div class="container-wrap">
				<?php include 'include/menu.php' ?>

					<div class="col m12  s12 l9 pofile-details-table-card"> 
						<div class="row"> 
							<div class="appl-job-heading col m8 s8 l6 "> 
								<p class="black-text h5"> Review Cart </p> 
							</div> 
							<div class="col s12 m12 l6"> 
								<div class="page-title"> 
									<?php echo $message; ?>
									<?php 
										if ($this->session->flashdata('success')) { ?>
											<div style="margin-bottom: 0px;" class="alert alert-danger">
												<button data-dismiss="alert" class="close" type="button">&times;</button><?php echo $this->session->flashdata('success') ?></div>
										<?php } if ($this->session->flashdata('error')) { ?>
											<div style="margin-bottom: 0px;" class="alert alert-danger">
												<button data-dismiss="alert" class="close" type="button">&times;</button><?php echo $this->session->flashdata('error'); ?></div>
										<?php } ?>
								</div> 
							</div> 
						</div> <!-- Education --> 
						<div class="card scrollspy" id="education"> 
							<div class="card-content"> 
								<p class="bold mb10 h6">Cart Details</p> 
								<form class="form-horizontal form-label-left input_mask" action="<?php echo $this->config->base_url().'Subscriptions/BillingSection'; ?>" method="post"> 
								<div class="table-box "> 
									<table class="highlight responsive-table striped"> 
										<thead class="grey  lighten-2"> 
											<tr>
												<th> Sl No</th> 
												<th> Description</th> 
												<th>No of package</th> 
												<th> Amount</th> 
												<th class="right-align">Action</th> 
											</tr>
										</thead> 
										<tbody> 
											<?php 
												$sumamt = 0; $x=0; 
												if(!empty($cartdata)) { 
												foreach ($cartdata as $result) {
												$x = $x+1;
												$sumamt = $sumamt + ($result->temp_amt * $result->temp_items); 
											?>
											<tr class="itemadding"> 
												<td class=" "><?php echo $x;?></td> 
												<td class=" ">
													<?php echo 'Plan : '.$result->pr_name.' - '.(($result->pr_type==1)?'Monthly':'Annual').' <br> No of Premium Jobs : <span class="nojobs">'.$result->temp_nojobs.'<span>';?>
													
													
												</td> 
												<td>
													<div class="setb">
														<button type="button" class="btn waves-effect waves-teal brand decreez"><i class="tiny material-icons">remove</i></button>
														<input class="new itemcount" type="" peritem="<?php echo $result->temp_amt ?>" disabled="" value="<?php echo $result->temp_items ?>" name="<?php echo $result->temp_encrypt_id ?>" >
														<button type="button" class="btn waves-effect waves-teal brand incrrez"><i class="tiny material-icons">add</i></button>
														<!-- form  -->
														<input type="hidden" class="itemcount" value="<?php echo  $result->temp_items?>" name="itemcount[]">
														<input type="hidden" value="<?php echo $result->temp_encrypt_id ?>" name="itemId[]">
														<input type="hidden" value="<?php echo $result->temp_amt ?>" name="itemAmount[]">
														<input type="hidden"  class="itemcount" value="<?php echo $result->temp_nojobs ?>" name="jobs[]">
														
													</div>
												</td>
												<td class=" last "><i class="fa fa-usd "></i>$ <span class="cartamount"><?php echo sprintf('%0.2f',$result->temp_amt * $result->temp_items);?></span></td> 
												<td class="right-align">
													<a href="<?php echo $this->config->base_url().'Subscriptions/RemoveCart/'.$result->temp_encrypt_id; ?>" class="red-text waves-effect del-btn" valt="452"><i class="material-icons">delete</i></a>
												</td> 
											</tr> 
											<?php } } if($sumamt > 0) { ?>
											<tr> 
												<td class=" "></td> 
												<td class=" "></td> 
												<td class="right-align"> <b>Total Amount</b></td> 
												<td class=" last">$ <span class="gtotal"><?php echo sprintf('%0.2f',$sumamt);?></span></td> 
												<td class=" "></td> 
											</tr>
											<?php } else { ?>

                                            <tr>

                                                <td colspan="5" class="center" align="center"> Cart is Empty</td>

                                             </tr>   
												
                                             <?php } ?>    
										</tbody> 
									</table> 
									
										<div class="divider" style="margin: 5px 0"></div> 
										<div class="btnssets" style="overflow: hidden;padding: 12px 0"> 
											<a href="<?php echo $this->config->base_url().'Subscriptions'; ?>"> 
												<i class="material-icons font25" style="position: relative; top: 6px;"> keyboard_backspace</i> Continue Shopping
											</a> 
											<input name="totamt" type="hidden" value="<?php echo $sumamt;?>" />
											<input name="empid" type="hidden" value="<?php echo base64_encode($this->encryption->encrypt($this->session->userdata('hireid')));?>" />
											<?php if($sumamt > 0) { ?>
											<button class="btn brand white-text hoverable waves-effect right" type="submit">Place Order</button> 
											<?php } ?>
										</div> 
									 
								</div> <!-- bottons -->
								</form>
								 
							</div> 
						</div><!-- End education --> 
					</div> 

				</div> 
			</div> 
		</section>
<!-- footer -->
<?php include 'include/footer.php' ?>




	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/script.js"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			$('.del-btn').click(function() {if (confirm('Are you sure you want to delete?')){return true; } else{return false; } });

			$(".itemadding .btn").on("click", function() {

			  var $button 	= $(this);
			  var oldValue 	= $button.parent().find(".itemcount").val();
			  var amont 	= $button.parent().find(".itemcount").attr('peritem');
			  var amotTable	= $button.parent().parent().parent().find(".cartamount");
			  
			  var gtotal 	= $('.gtotal').text()
			  
			  if ($button.hasClass('incrrez')) {
				  var newVal = parseFloat(oldValue) + 1;
				  var price = parseFloat(newVal) * parseFloat(amont);
				  amotTable.text(price.toFixed(2));
				  var newGtotal = parseFloat(gtotal) + parseFloat(amont);
				} else {
			   // Don't allow decrementing below zero
			    if (oldValue > 1) {
			      var newVal = parseFloat(oldValue) - 1;
			      var price = parseFloat(newVal) * parseFloat(amont);
				  amotTable.text(price.toFixed(2));
				  var newGtotal = parseFloat(gtotal) - parseFloat(amont);
			    } else {
			    	
			      newVal = 1;
			    }
			  }

			  $button.parent().find(".itemcount").val(newVal);
			  $button.parent().parent().parent().find(".nojobs").text(newVal);
			  $('.gtotal').text(newGtotal.toFixed(2))

			});


		});
	</script>
</body>
</html>