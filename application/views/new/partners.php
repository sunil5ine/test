<?php
$indus = array( 'Agriculture and Allied Industries', 'Automobiles', 'Auto Components', 'Aviation', 'Banking', 'Cement', 'Consumer Durables', 'Ecommerce', 'Education and Training', 'Engineering and Capital Goods', 'Financial Services', 'FMCG', 'Gems and Jewellery', 'Healthcare', 'Infrastructure', 'Insurance', 'IT & ITeS', 'Manufacturing', 'Media and Entertainment', 'Metals And Mining', 'Oil and Gas', 'Pharmaceuticals', 'Ports', 'Power', 'Railways', 'Real Estate', 'Renewable Energy', 'Retail', 'Roads', 'Science and Technology', 'Services', 'Steel', 'Telecommunications', 'Textiles', 'Tourism and Hospitality' );
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
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/select2.min.css">
	<link href="<?php echo base_url() ?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
	<style>.select2-selection { background: #fff !important; }</style>
</head>
<body>
	<!-- navigation bar -->
<?php include 'include/header.php' ;
echo $this->session->flashdata('success');

?>

	<section class="ptr-nbanner">
		<div class="container-wrap">
			<div class="row m0">
				<div class="col s12 center-align">
					<h4 class="white-text ">Partner With Us</h4>
					<p class="white-text ">
					First platform in the region to provide verified candidates to employers through a pre-screening process of psychometric testing.<br>
						An HR platform that boasts of offering a unique solution to business entities through a proprietary software.
					</p>
				</div>
			</div>
		</div>
	</section>

	<!-- we are -->
	<section class="white">
		<div class="container-wrap">
			<div class="row m0">
				<div class="col s12 m5">
					<center>
						<img src="<?php echo base_url() ?>assets/img/img_whyCherryhire.png" alt="" style="width:65%" class="responsive-img"/>
					</center>
				</div>
				<div class="col s12 m7">
					<h5 class="bold lmt50">We are Cherryhire.com</h5>
					<p> Cherryhire,  a unique platform to "cherry pick" the right candidate, is a brainchild of a team of talent acquisition professionals, having extensive experience in the recruitment industry. </p>
					<p> Our main goal is to simplify  the recruitment process for both job seekers and employers.</p>
				</div>
			</div>
		</div>
	</section>

	<!-- technology -->

	<section>
		<div class="container-wrap">
			<div class="row m0">
				<div class="col s12">
					<h5 class="bold imh4 center-align">What does this technology offer</h5>
				</div>
				
				<div class="col s6 m3">
					<center>
						<img src="<?php echo base_url() ?>assets/img/ico_1.svg" alt="" class="responsive-img"/>
						<p>
							Verified profiles
						</p>
					</center>
				</div>
				<div class="col s6 m3">
					<center>
						<img src="<?php echo base_url() ?>assets/img/ico_6.svg" alt="" class="responsive-img"/>
						<p>
							Intelligent Resume Screening & Shortlisting
						</p>
					</center>
				</div>
				<div class="col s6 m3">
					<center>
						<img src="<?php echo base_url() ?>assets/img/ico_5.svg" alt="" class="responsive-img"/>
						<p>
							Faster Hiring
						</p>
					</center>
				</div>
				<div class="col s6 m3">
					<center>
						<img src="<?php echo base_url() ?>assets/img/ico_4.svg" alt="" class="responsive-img"/>
						<p>
							Increased Productivity
						</p>
					</center>
				</div>
			</div>
		</div>
	</section>
	
	<section class="white">
		<div class="container-wrap">
			<div class="row m0">
				<div class="col s12">
					<h5 class="bold imh4 center-align">How does it work</h5>
				</div>
				
				<div class="col s12 m4">
					<center>
						<img src="<?php echo base_url() ?>assets/img/ico_3.svg" alt="" class="responsive-img"/>
						<p>
							Auto builds a candidate pool
						</p>
					</center>
				</div>
				<div class="col s12 m4">
					<center>
						<img src="<?php echo base_url() ?>assets/img/ico_2.svg" alt="" class="responsive-img"/>
						<p>
							Real time intelligent screening<br> & ranking
						</p>
					</center>
				</div>
				<div class="col s12 m4">
					<center>
						<img src="<?php echo base_url() ?>assets/img/ico_1.svg" alt="" class="responsive-img"/>
						<p>
							Never misses a relevant profile
						</p>
					</center>
				</div>
			
		</div>
	</section>

	<!-- wts for you -->
	<section class="wtfu">
		<div class="container-wrap">
			<div class="row m0">
				<div class="col s12 m7 l5 push-l7 push-m5">
					<h5 class="bold imh4 white-text">Benefits of being our partner</h5>
					<ul class="disc white-text">
						<li>Expansion of your line of business with no investment</li>
						<li>Increase your customer base</li>
						<li class="nolist" style="list-style-type: none !important;">
							<ul class="cirle">
								<li>The prime target is your existing customer</li>
								<li>Get an opportunity to get a new customer</li>
							</ul>
						</li>
						<li>Prohibit competition from capturing your customer</li>
						<li>Conquest customers from competition.</li>
						<li>Scalable model</li>
						<li>Opportunity to promote your existing product offerings</li>
						<li>Work well irrespective of market conditions</li>
						<li>Increase revenues and profit</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- advantage -->
	<section class="white">
		<div class="container-wrap">
			<div class="row m0">
				<div class="col s12">
					<h5 class="bold imh4  center-align">Advantages of becoming our Partner</h5>
				</div>
				<div class="col s12 m12 l10 push-l1 imgul">
					<div class="row m0">
						<div class="col s12 m12 l6">
							<ul class="m0">
								<li>Renewal commissions for qualified partners.</li>
								<li>Earn up to 40% in commission fees.</li>
								<li>No financial investment or program fees.</li>
								
							</ul>
						</div>
						<div class="col s12 m12 l6">
							<ul class="m0">
								<li>Access to proprietary technology.</li>
								<li>Pre-sales, Post-sales, billing and customer support.</li>
								<li>License to sell in your assigned geographical areas.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- next -->
	<section class="nexts">
		<div class="container-wrap">
			<div class="row m0">
				<div class="col s12 m12 l10 push-l1">
					<h5 class="bold imh4 white-text">Next</h5>
					<ul class="disc white-text">
						<li>A signed understanding that details the related parameters.</li>
						<li>Training from our end to as many users as required.</li>
						<li>Technical support agreement from our end.</li>
						<li>Payments and commission agreement</li>
					</ul>
				</div>
			</div>
		</div>
	</section>

	<!-- form -->
	<section>
		<div class="container-wrap">
			<div class="row m0">
				<div class="col s12">
					<h5 class="bold imh4  center-align">Partnership Interest Form</h5>
				</div>
				<div class="col s12 l8 push-l2">
					<form action="<?php echo base_url() ?>site/partnerShip" method="post" class="form-white" style="overflow:visible">
					  <div class="row">
					  	<div class="col s12"><label>Contact Respresentatives's Name</label></div>
						  <div class=" col s12 l6">
						  	<input type="text" id="first_name" required name="fname" class="validate" placeholder="First Name">
						  </div>
						  <div class=" col s12 l6">
						  
						  	<input type="text" id="last_name" name="lname" required class="validate" placeholder="Second Name">
						  </div>
					  </div>
					  <div class="row">
						<div class=" col s12">
							<label for="email"   data-success="right">Name of Organization</label>
							<input type="text" name="orgName" id="orgname" class="validate" required placeholder="Organization Name">
						</div>
					  </div>

					<div class="row">
						<div class=" col s12 l6">
							<label for="first_name">Organization Type</label>
							<select name="orgType" required class="validate">
								<?php
									foreach ($indus as  $value) {
										echo '<option value="'.$value.'">'.$value.'</option>';
									}
								?>
							</select>
						</div>
						<div class=" col s12 l6">
							<label for="last_name">Staff Capacity</label>
							<select name="staffCount" required class="validate"> 
								<option value="0-15"  selected>0 to 15</option>
								<option value="16-40">16 to 40</option>
								<option value="41-75">41 to 75</option>
								<option value="76-100">76 to 100</option>
								<option value="101-150">101 to 150</option>
								<option value="151-200">151 to 200</option>
								<option value="200-300">200 to 300</option>
								<option value="300-500">300 to 500</option>
								<option value="500+">500+</option>
							</select>
						</div>
					</div>

					<div class="row">
					  <div class=" col s12 l6">
					  	<label for="first_name">Email Address</label>
						<input type="email" id="emailad" required name="email" class="validate" placeholder="Email ID">
					  </div>
					  <div class=" col s12 l6">
						<label for="last_name">Contact Number</label>
						<input type="text" id="contactNumber" required name="phone" class="validate" placeholder="+973 xxxx xxx">
					  </div>
					</div>

					<div class="row">
					  <div class=" col s12">
						<label for="textarea1">Additional Comments or Questions</label>
						<textarea id="textarea1" name="des" class="validate"></textarea>
					  </div>
					</div>

					<div class=" col s12">
						<button class="btn waves-effect waves-light block bold brand" type="submit" name="action">Submit </button>
					</div>
					</form>
				</div>
			</div>
		</div>
	</section>

<!-- footer -->
<?php echo include'include/footer.php' ?>
<!-- end footer -->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/script.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/select2.min.js"></script>
	<script>
		$(document).ready(function(){
			$('select').select2({width: "100%"});
			// $('select').formSelect();
		});
	</script>
	
</body>
</html>