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
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/dataTables.material.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo $this->config->item('web_url')?>assets/css/daterangepicker.css" />
	<style type="text/css">
		th, td{font-size: 13px;}
		tr td a{display: block;padding: 15px 5px;}
		tr td{padding: 0px}
	</style>
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
				
				<div class="col  s12 l9">
					<div class="row">	
						<div class="appl-job-heading col m8 s8 l12 ">
							<p class="black-text h5"><?php echo $pagehead; ?></p>
							<?php if($subdetails['sub_expire_dt']==0 || $subdetails['sub_nojobs']==0 || $subdetails['sub_expire_dt']<date('Y-m-d H:i:s')) { ?>
								<small class="red-text"><i>Please <a href="<?php echo $this->config->base_url();?>Subscriptions" ><strong>upgrade your plan</strong></a> inorder to have internal jobs posted on Free and Paid Boards.</i></small>
							<?php } echo $message; ?>
						</div>
					</div>

				<?php if(!empty($records)) { ?>
					<div class="row ">
						<div class="card">
							<div class="card-content">
								<div class="row">
									<div class="tabel-filt">
										<div class="col s6 m6 l2">
											<select class=""  id="maxRows">
										      <option value="10">10</option>
										      <option value="25">25</option>
										      <option value="50">50</option>
										      <option value="100">100</option>
										      <option value="10000">All</option>
										    </select>
										</div>
									
										<div class="col s6 m6 l4">
											<div class="">

											 <i class="material-icons daterange font25">date_range</i>
											<input type="text" id="config-demo" class="form-control" style="padding-left: 33px;" name="dates">
											 </div>
										</div>
										<div class="col s6 m6 l4  white">
										    <i class="material-icons search-icont font25">search</i>
										    <input id="ser-input" required="" placeholder="Search..." type="search" style="padding-left: 33px;width: 88%;">
										</div>
										<div class="col s6 m6 l2">
											<a href="<?php echo $this->config->base_url();?>Jobs/Add"" class="btn brand waves-effect hoverable z-depth-0" style="margin-top: 13px"> + Add New Job</a>
										</div>
								</div>
								</div>
								<div >
								<table class="responsive-table striped" id="myjobs">
									<thead class="red white-text">
										<th>Job Title</th>
										<th>Functional Area</th>
										<th>Location</th>
										<th>Published</th>
										<th>Status</th>
										<th></th>
									</thead>
									<tbody id="results">
										<?php foreach ($records as $result) {  
											if($result->job_status ==1) {
											  	// $publishcount = $this->jobsmodel->publish_count($result->job_id);
											  	$publishcount = 1;
										?>

											<tr>
												<td>
													<a href="<?php echo ($publishcount > 1)? $this->config->base_url().'Profile/List/'.$result->job_url_id : $this->config->base_url().'Jobs/Viewdetails/'.$result->job_url_id ?>"> <?php echo $result->job_title;?> </a>
												</td>
												<td>
													<a href="<?php echo ($publishcount > 1)? $this->config->base_url().'Profile/List/'.$result->job_url_id : $this->config->base_url().'Jobs/Viewdetails/'.$result->job_url_id ?>"><?php echo $result->jfun_display;?></a>
												</td>
												<td>
													<a href="<?php echo ($publishcount > 1)? $this->config->base_url().'Profile/List/'.$result->job_url_id : $this->config->base_url().'Jobs/Viewdetails/'.$result->job_url_id ?>"><?php echo $result->job_location;?></a>
												</td>
												<td>
													<a href="<?php echo ($publishcount > 1)? $this->config->base_url().'Profile/List/'.$result->job_url_id : $this->config->base_url().'Jobs/Viewdetails/'.$result->job_url_id ?>"><?php echo date('d M Y', strtotime($result->job_created_dt));?></a>
												</td>
												<td>
													<a href="<?php echo ($publishcount > 1)? $this->config->base_url().'Profile/List/'.$result->job_url_id : $this->config->base_url().'Jobs/Viewdetails/'.$result->job_url_id ?>"><?php if($publishcount > 0) { ?>
														<i class="material-icons brand-text">fiber_manual_record</i> live
													<?php }else{ ?>
														<i class="material-icons red-text accent-4">fiber_manual_record</i> Not Published
													<?php } ?></a>
												</td>
												<td>
													<a href="<?php echo $this->config->base_url().'Jobs/CloseJob/'. $result->job_url_id; ?>" class="del-jobs">
														<i class="material-icons">delete</i>
													</a>
												</td>
												
											</tr>
										<?php } }?>
									</tbody>
									
								</table>
								<div class="row">
									<div class="col s12 m12">
										<ul class="pagination"> </ul>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php } else{ ?>
					<div class="row ">
						<div class="col m12 l12 s12">
							<!-- card start -->
							<div class="card">
								<div class="card-content">
									<div class="center ptb30">
										<img src="<?php echo $this->config->item('web_url')?>assets/img/mange.png" class="responsive-img">
										<h5>No Jobs Posted Yet!</h5>
										<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis nemo amet porro.</p>
										<br>
										<a href="<?php echo base_url() ?>Jobs/Add" class="btn brand waves-effect">Add New Jobs</a>
									</div>
								</div>
							</div><!-- end profile card start -->
						</div>
					</div><!-- end row  -->
				<?php } ?>
					</div><!-- end 9 right content -->
				</div>
			</div>
		</div>
	</section>
	


<!-- footer -->
<?php include 'include/footer.php' ?>




	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/script.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/tablep.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/moment.min.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('web_url')?>assets/js/daterangepicker.js"></script>
	<script >
	getPagination('#myjobs');
	$(document).ready(function(){
		$('input[name="dates"]').daterangepicker();
	    $('select').formSelect();
	    $('.del-jobs').click(function(){if (confirm('Do you really want to close this vacancy?') == true) {return true; } else{return false; } });

	    /* ajax date btween */
	    $('input[name="dates"]').change(function() {
	    	let dates = $(this).val();
	    	$.ajax({
				  method: "GET",
				  url: "<?php echo base_url()?>Jobs/getbydate",
				  data: { date:dates },
				  dataType:'JSON',
				  success: function(data){
				    $("#results").html(data);
				    console.log(data);
				  }
			});

			
	    });
	});
	</script> 


</body>
</html>
