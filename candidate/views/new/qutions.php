<?php 
$this->load->model('m_questionnaire');
?>
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
			.font-12{font-size:12px}
		}
	</style>
</head>
<body>
	<!-- navigation bar -->
	<?php include 'include/header.php'  ?>
	<!-- end nav bar -->

	
	<section class="">
		<div class="row">
			<div class="container">

				<div class="row">
					<div class="col s12 m6 appl-job-heading">
						<p class="black-text h5">General Aptitude Test</p>
						<!-- <small><i>view all your Recently Applied Jobs</i></small> -->
					</div>
					<div class="col s12 m6 appl-job-heading " id="countdowntimer">
						<p  class="black-text h5 right">Time left: <span id="ms_timer"></span></p>
					</div>
				</div>
			<form action="<?php echo base_url() ?>questionnaire/validate" method="post">
				<div class="row">
					<div class="col s12">
						<div class="card">
							<div class="card-content">
								<?php $count = 0; 
									foreach ($verbal as $key => $value) {  $leter = ord('A');
										$anw = $this->m_questionnaire->getansw($value->tq_uid);
								?>
									<div class="quetion-sets">
										<p class="quetion"><?php echo '<span class="slno">'.$count += 1; echo '.</span>  <span>'.$value->tq_quetion ?></span></p>
										<div class="answ">
											<?php foreach ($anw as $keys => $anws) {  ?>
												<p>
													<label>
														<input class="with-gap" name="<?php echo $value->tq_uid ?>" value="<?php echo chr($leter) ?>" type="radio"  />
														<span><?php echo $anws->tq_option ?></span>
													</label>
												</p>
											<?php $leter++; } ?>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col s12">
						<div class="card">
							<div class="card-content">
								<?php 
									foreach ($logical as $key => $value) {  $leter = ord('A');
										$anw = $this->m_questionnaire->getansw($value->tq_uid);
								?>
									<div class="quetion-sets">
										<p class="quetion"><?php echo '<span class="slno">'.$count += 1; echo '.</span>  <span>'.$value->tq_quetion ?></p>
										<div class="answ">
											<?php foreach ($anw as $keys => $anws) {  ?>
												<p>
													<label>
														<input class="with-gap" name="<?php echo $value->tq_uid ?>" value="<?php echo chr($leter) ?>" type="radio"  />
														<span><?php echo $anws->tq_option ?></span>
													</label>
												</p>
											<?php $leter++; } ?>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col s12">
						<div class="card">
							<div class="card-content">
								<?php  
									foreach ($numerical as $key => $value) {  $leter = ord('A');
										$anw = $this->m_questionnaire->getansw($value->tq_uid);
								?>
									<div class="quetion-sets">
										<p class="quetion"><?php echo '<span class="slno">'.$count += 1; echo '.</span>  <span>'.$value->tq_quetion ?></p>
										<?php if(!empty($value->tq_qimg)) {
											echo '<img src="'.$this->config->item('web_url').'assets/qut-img/'.$value->tq_qimg.'" alt="" class="responsive-img"/>';
										}?>
										<div class="answ">
											<?php foreach ($anw as $keys => $anws) {  ?>
												<p>
													<label>
														<input class="with-gap" name="<?php echo $value->tq_uid ?>" value="<?php echo chr($leter) ?>" type="radio"  />
														<span><?php echo $anws->tq_option ?></span>
													</label>
												</p>
											<?php $leter++; } ?>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col s12">
						<div class="card">
							<div class="card-content">
								<?php  
									foreach ($resability as $key => $value) {  $leter = ord('A');
										$anw = $this->m_questionnaire->getansw($value->tq_uid);
								?>
									<div class="quetion-sets">
										<p class="quetion"><?php echo '<span class="slno">'.$count += 1; echo '.</span>  <span>'.$value->tq_quetion ?></p>
										<?php if(!empty($value->tq_type) && $value->tq_type =="text/image") {
											echo '<img src="'.$this->config->item('web_url').'assets/qut-img/'.$value->tq_qimg.'" alt="" class="responsive-img" style="max-height: 326px;"/>';
										}?>
										<div class="answ">
										<?php 
											if($anw['0']->tq_top != 0){
												$op = ord('A');
												for ($i=1; $i <= $anw['0']->tq_top ; $i++) { 
													
													echo '<p>
													<label>
														<input class="with-gap" name="'.$value->tq_uid.'" value="'.chr($op).'" type="radio"  />
														<span>'.chr($op).'</span>
													</label>
												</p>';
												$op++;
												}
											} 
										?>
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col s12">
						<button class="btn waves-effect brand white-text waves-light" type="submit" name="action">Submit
							<i class="material-icons right">send</i>
						</button>
					</div>
				</div>
			</form>								
			</div><!-- end wrap -->
		</div> <!-- end row -->
	</section>
	
	<div id="over-test" class="modal test-popup">
		<div class="modal-content center">
		<h4 class=""><i class="large material-icons red-text">access_alarms</i><br>Times Up</h4>
		<p class="">Your test time is over thank you for taking the test</p>
		</div>
	</div>

	<!-- footer -->
	<?php echo include'include/footer.php' ?>
	<!-- scripts -->
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/pdf/jspdf.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/pdf/pdfFromHTML.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/script.js"></script>
	<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>assets/js/jquery.countdownTimer.min.js"></script>
	<script> $(function(){ $('#ms_timer').countdowntimer({ minutes :45, seconds : 00, timeUp :timeisUp }); function timeisUp() { $('#over-test').modal('open'); setTimeout(function(){ $('form').submit(); },1500); } }); </script>
	<script type="text/javascript"> var areYouReallySure = false; function areYouSure() { if(allowPrompt){ if (!areYouReallySure && true) { areYouReallySure = true; var confMessage = "Are you sure you want to leave this page? " return confMessage; } }else{ allowPrompt = true; } } var allowPrompt = true; window.onbeforeunload = areYouSure; </script>
</body>
</html>