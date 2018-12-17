<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php'  ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width" />
  	<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/nouislider.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
</head>
<body>
	<!-- navigation bar -->
	
<?php include 'include/header.php'  ?>
	<!-- Applied Jobs -->
	
	<section class="section-job-result">
		<div class="container">
			<div class=" card z-depth-2">
				<div class="result-serach-bar ptb10 serach-box-container">
					<div class="row m0">
						<form style="overflow: visible;" method="GET" action="<?php echo base_url()?>Jobs">
							<div class="col l7 s12 p0 m0 m6 input-field">
							    <i class="material-icons search-icon">search</i>
							    <input id="search" name="title" type="search" required placeholder="Search..." >
							</div>
							<div class="col l3 s12 input-field p0 m0 m4" id="location-serach">
								<i class="material-icons ">location_on</i>
								<select name="location[]" id="sel-location">
								
								  <option value="" > Location </option>
								  <option value="Bahrain" > Bahrain </option>
								  <option value="Kuwait" > Kuwait </option>
								  <option value="Oman" > Oman </option>
								  <option value="Qatar" > Qatar </option>
								  <option value="Bahrain" > Saudi Arabia </option>
								  <option value="United Arab Emirates" > United Arab Emirates </option>
								 
								</select>
							</div>
							
							<div class="col l2 s12 p0 input-field m0 m2">
								<div class="mxw">
								<button class="btn red darken-2 waves-effect btn-search btn-lg block">
									SEARCH
								</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div><!-- end search bar -->
		</div><!-- end container -->
		
		
		<div class="row search-result-container">
			<div class="container-wrap">
				<!-- sibe menu -->
				<?php include 'include/refindeinac.php'; ?> 

				<div class="col  s12 l8 job-result-list">
					<div class="row">
					<?php echo  $message; ?>	
						<div class="appl-job-heading col m6 s6 l6 ">
							<p class=" h6 m0"><span id="mjobs"></span> Matching Jobs</p>
						</div>
						<div class="appl-job-heading col m6 s6 l6 ">
							<a href="" class="btn brand right z-depth-2 white-text waves-effect"> Create Job Alert</a>
						</div>
						
					</div>

				<?php $this->load->model('jobportalmodel'); ?>
				<?php 
					if(!empty($records)){ 
					$x=0; 
					$now = date('Y-m-d');
					foreach ($records as $result) { 
						$dats 	= date('Y-m-d',strtotime($result->job_created_dt.'+ '.$result->job_expaired.' days'));
						// if($now <= $dats){
						$x++; 
						
						$diff 	= date_diff(date_create($now),date_create($dats));
						$left 	= $diff->format("%a days left");
				?>
                    <!-- <script>
						window.onload = function() {
							document.getElementById('mjobs').innerHTML = '<?php echo $x ?>';
						}
					</script>                     -->
					<div class="card z-depth-2 hoverable">
						<a href="<?php echo $this->config->base_url().'candidate/Jobs/Viewdetails/'.$result->job_url_id.'/?js=5&source=cherryhire';?>">
						<div class="card-content">
							<div class="row m0">
								<div class="jrlimg col s12 m12 l2 ">
									<img src="assets/img/logo.png" class="responsive-img" alt="">
								</div>
								<div class="jrl-content col s12 m12 l10">
									<span class="h7 list-title"> <?php echo $result->job_title;?> </span>
									<!-- <span class="right bold teal-text "><?php echo $left ?></span> -->
									<ul class="job-card">
						        		<li>
						        			<span class="back-icon"><i class="material-icons">card_travel</i></span>
											<span><?php echo $result->job_company ?></span>
						        		</li>
						        		<li>
						        			<span class="back-icon"><i class="material-icons">map</i></span>
											<span><?php echo $result->job_location;?></span>
						        		</li>
						        		<li>
						        			<span class="back-icon"><i class="material-icons">business</i></span>
											<span><?php echo $result->jfun_display;?></span>
						        		</li>
						        		<li>
						        			<span class="back-icon"><i class="material-icons">access_time</i></span>
											<span><?php if(($result->maxexp-1) == 0) { echo 'Fresher'; } else { echo ($result->minexp-1).' ~ '.($result->maxexp-1).' Yrs'; }?></span>
						        		</li>
						        	</ul>
						        	<p class="m0"><b>Skills: </b>
						        		<?php 
						        			$skills1 = $result->job_skills;
						        			(strlen($skills1) > 131)? $skills = substr($skills1, 0, 130).'...' :  $skills = $skills1;

						        			$exploded_skills = explode(',', $skills);
						        			foreach ($exploded_skills as $skills_list) {
						        				echo  $skills_list.'<span class="comma">,</span> ';
						        		} ?> 
						        	</p>
								</div>
							</div>
						</div>
						</a>
					</div>
				<?php } } 
					if ($records == 0) { ?>
					

				<div class="card z-depth-1">
					<div class="card-content">
						<div class="center ptb30">
							<br>
							<img src="<?php echo base_url()?>assets/img/mange.png" class="responsive-img">
							<h5>Result Not found!</h5>
							<br>
						</div>
					</div>
				</div>
			<?php } ?>
				</div>
			</div>
		</div>
	</section>
	
	<!-- footer -->
	<?php echo include'include/footer.php' ?>
	<!-- scripts -->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/nouislider.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/filters.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/select2.min.js"></script>
</body>
</html>