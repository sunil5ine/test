<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php'  ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width" />
  	<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/select2.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/css/style.css">
	
</head>
<body>
	
<!-- header -->
	<?php include 'include/header.php'  ?>
<!-- End header -->

	<!-- section -->

	<section class="p0 banner">
		<div class="row m0 ">
			<div class="container-wrap">
				<div class="col s12 m6 border-right">
					<div class="ptb30 plr50">
						<h4 class="white-text"><b>Employers</b></h4>
						<p class="white-text">Thousands of companies like yours have succeeded hiring the verified trusted candidates through CherryHire.</p>
						<a href="<?php echo base_url()?>PostJob" class="btn brand white-text waves-effect">Post job for FREE <i class="fas fa-angle-right right"></i></a>
					</div>
				</div>
				<div class="col s12 m6">
					<div class="ptb30 plr50">
						<h4 class="white-text"><b>Job Seekers</b></h4>
						<p class="white-text">Create a CherryHire account in just a few steps and get benefits of Cherryhire.Upload resume on Cherryhire Now!</p>
						<a href="<?php echo base_url()?>candidate/MyProfile" class="btn brand white-text waves-effect">Register Now <i class="fas fa-angle-right right"></i></a>
					</div>
				</div>
			</div>
		</div>

	</section>
	<div class="brand">
		<div class="container ">
			<div class="result-serach-bar ptb10">
					<div class="row m0">
						<p class=" mb10"><small class="white-text ">Find your dream job here! </small></p>
						<form class="white" style="overflow: visible" method="GET" action="<?php echo base_url()?>Jobs">
							<div class="white serach-box-container">	
							<div class="col l6 s12 p0 m0 m6 input-field  white ">
							    <i class="material-icons search-icon">search</i>
							    <input id="search"  name="title" type="search" required placeholder="Search..."  style="height: 3rem !important;">
							</div>
							<div class="col l4 s12 input-field p0 m0 m6 white" id="location-serach">
								<i class="material-icons ">location_on</i>
								<select  name="location[]" style="height: 3rem !important;"  id="sel-location">
								  <option value="" > Location </option>
								  <option value="Bahrain" > Bahrain </option>
								  <option value="Kuwait" > Kuwait </option>
								  <option value="Oman" > Oman </option>
								  <option value="Qatar" > Qatar </option>
								  <option value="Bahrain" > Saudi Arabia </option>
								  <option value="United Arab Emirates" > United Arab Emirates </option>
								</select>
							</div>
							<div class="col l2 s12 p0 input-field m0 m6">
								<div class="mxw-box">
								<button class="btn red darken-2 waves-effect btn-search  block" style="margin: 2px;height: 45px">
									SEARCH
								</button>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
		</div>
	</div><!-- end section -->

	<section class="white">
		<div class="container-wrap">
			<div class="row">
				<div class="col s12 m12 l12">
					<div class="h-title center">
						<h4 class=""><b>How it Works</b></h4>
					</div>
					<div class="center">
						<img src="<?php echo base_url() ?>site/images/How-it-works.png" class="responsive-img">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- popular catogory -->
	<section>
		<div class="container">
			<div class="row">
				<div class="h-title center">
					<h4 class="mb30"><b>Popular Category</b></h4>
				</div>
				<div class="col s12 m12 l12">
					<ul id="popular-categories" style="overflow: hidden;">
		                <li><a href="<?php echo base_url() ?>Jobs?jobs=list&funarea[3]=3"><i class="fas fa-chart-line"></i>Accounting & Finance</a></li>
		                <li><a href="<?php echo base_url() ?>Jobs?jobs=list&funarea[37]=37"><i class="fa fa-wrench"></i>Automotive</a></li>
		                <li><a href="<?php echo base_url() ?>Jobs?jobs=list&funarea[38]=38"><i class="fas fa-building "></i>Construction</a></li>
		                <li><a href="<?php echo base_url() ?>Jobs?jobs=list&funarea[6]=6"><i class="fa fa-laptop"></i>IT</a></li>
		                <li><a href="<?php echo base_url() ?>Jobs?jobs=list&funarea[39]=39"><i class="fa fa-medkit"></i>Healthcare</a></li>
		                <li><a href="<?php echo base_url() ?>Jobs?jobs=list&funarea[39]=39"><i class="fas fa-hospital-alt"></i>Hospitality</a></li>
		                <li><a href="<?php echo base_url() ?>Jobs?jobs=list&funarea[40]=40"><i class="fa fa-globe"></i>Logistics</a></li>
		                <li><a href="<?php echo base_url() ?>Jobs?jobs=list&funarea[1]=1"><i class="fas fa-user-cog"></i>Administrative</a></li>
		              </ul>
		              <div class="center viewmore-box">
		              	<a href="<?php echo base_url() ?>Jobs" class="btn btn-nc waves-effect transparent btn-m hoverable brand-text "> View All Categories </a>
		              </div>
				</div>
			</div>
		</div>
	</section>
		<?php if (!empty($fetu_jobs)) { ?>
			
		
	<section class="white">
		<div class="container-wrap">
			<div class="row">

				<div class="h-title center">
					<h4 class="mb30"><b>Featured Jobs</b></h4>
				</div>
				<div class="carousel" data-mixed="">
					
					<ul>
						<?php 
							foreach ($fetu_jobs as $fjobs) { 
							$jpdate1 	= date("Y-m-d h:i:s",strtotime($fjobs->job_updated_dt));
							$cdate1 	= date("Y-m-d h:i:s");
							$jpdate 	= new DateTime($jpdate1); 
   							$cdate   	= new DateTime($cdate1); 
							$interval 	= $jpdate->diff($cdate);
							$interval->format('%R%a days');
							$pi = $interval->format("%I");
							$ph = $interval->format("%h");
							$pd = $interval->format("%d");
							$pm = $interval->format("%m");
							$py = $interval->format("%y");
							if ($py > 0) {
								($py>1)?$agotime =$py." Years Ago":$agotime =$py." Year Ago";
							}
							elseif ($pm > 0) {
								($pm>1)?$agotime =$pm." Months Ago":$agotime =$pm." Month Ago";
							}
							elseif ($pd > 0) {
								($pd>1)?$agotime =$pd." Days Ago":$agotime =$pd." Day Ago";
							}
							elseif ($ph > 0) {
								($ph>1)?$agotime =$ph." Hours Ago":$agotime =$ph." Hour Ago";
							}
							else{
								($pi>1)?$agotime =$pi." minutes Ago":$agotime =$pi." minute Ago";
							}
						


						?>
						
						<li>
							<div class="feturjob-item">
								<div class="card ">
									<div class="card-content">
										<div class="corsal-head">
											<img src="<?php echo base_url()?>assets/img/logo.png" class="responsive-img" width="50px">
											<span class="right font12"></span>
										</div>
										<div class="corsul-content">
											<p class="corsul-content-head truncate"><?php echo $fjobs->job_title; ?></p>
											<div class="span-set ">
												<p class="crs-icon truncate ">
													<i class="fas fa-briefcase"></i>
													<?php echo (!empty($fjobs->job_company))?$fjobs->job_company:'Not mention'; ?>
												</p>
												<p class="crs-icon truncate "> 
													<i class="fas fa-map-marked-alt"></i>
													<?php echo (!empty($fjobs->job_location))?$fjobs->job_location:'Not mention'; ?>
												</p>
												<p class="crs-icon truncate ">
													<i class="fas fa-money-bill-wave"></i> 
													<?php echo (!empty($fjobs->job_industry))?$fjobs->job_industry:'Not mention'; ?>
												</p>
											</div>
											<p class="crs-des"><b>Skills: </b><?php echo 
											
												substr($fjobs->job_skills, 0, 60) .((strlen($fjobs->job_skills) > 60) ? '...' : '');
											
											 ?></p>
											
											<a href="<?php echo $this->config->base_url().'candidate/Jobs/Viewdetails/'.$fjobs->job_url_id.'/?js=5&source=cherryhire';?>" class="btn brand white-text waves-effect block">View Job</a>
										</div>
									</div>
								</div>
							</div>
						</li>
					<?php } ?>
					</ul>

					<a class="prev disabled btn-floating btn-large waves-effect waves-light white "> <i class="material-icons black-text">arrow_back</i></a>
					<a class="next btn-floating btn-large waves-effect waves-light white "> <i class="material-icons black-text">arrow_forward</i></a>
				</div>
			</div>
		</div>
	</section>
<?php } ?>
	<section>
		<div class="container-wrap">
			<div class="row">
				<div class="col s12 l6 m12">
					<div class="center">
						<img src="<?php echo base_url() ?>assets/img/service-01.png" class="responsive-img" width="80%">
					</div>
				</div>
				<div class="col s12 l5 m12">
					<div class="p75" >
						<div class="h-psychometric">
							<h5 class="htitle"> <b>Psychometric Test</b></h5>
							<p class="font13 black-text">First platform in the region to provide verified candidates.</p>
							<p>
								Saves time and money in addition to providing employers with a true picture of candidates. No need for employers to sift through a mountain of applications as our platform now filters and identifies candidates who best fit the company both through their abilities and their personality. Helps in employing staff most suited to your company’s culture. 
							</p>
							<a href="<?php echo base_url() ?>Site/psychometric" class="btn transparent btn-nc waves-effect brand-text hoverable btn-m">Take your test	</a>
						</div>
					</div>
				</div>
			</div>

			<div class="row middile-item">
				<div class="col s12 l6 m12 push-l6">
					<div class="center ">
						<img src="<?php echo base_url() ?>assets/img/servies-02.png" class="responsive-img" width="60%">
					</div>
				</div>
				<div class="col s12 l5 m12 pull-l5">
					<div class="p75" >
						<div class="h-psychometric">
							<h5 class="htitle"> <b>Professional CV Writing</b></h5>
							<p class="font13 black-text">Create a great impression on Employers.</p>
							<p class="font13">
								We employ professional experts for creating well-crafted resumes ranging from entry level to executive level. It helps the employer to get an idea about your objectives and goals associated with the career. Our resume writing specialists will ask you about the details of current job history, previous experience and career goals. The professional resume expert will then create your curriculum vitae appealing to the employer.
							</p>
							<a href="<?php echo base_url()?>Site/cv_writing" class="btn transparent btn-nc waves-effect brand-text hoverable btn-m">Create  Profile	</a>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col s12 l6 m12">
					<div class="center">
						<img src="<?php echo base_url() ?>assets/img/service-01.png" class="responsive-img" width="80%">
					</div>
				</div>
				<div class="col s12 l5 m12">
					<div class="p75" >
						<div class="h-psychometric">
							<h5 class="htitle"> <b>Resume Parsing</b></h5>
							<p class="black-text">Real time intelligent screening & indexing of Resumes.</p>
							<p class="">Cherry Hire uses resume parsing technology which is designed to mimic human intelligence as it screens, sorts and filters resumes to find the most relevant candidates. Our resume parsing technology achieves “near human accuracy” with up to 95% efficiency.</p>
							<p class="">Recruiter needs to only look through quality candidates now, for further validation and evaluation. Recruiter can now focus on the more human aspects of hiring.</p>
							<!-- <ul class="font13 h-ul before-li">
								<li class="font14">Lorem ipsum dolor sit amet,  adipisicing elit. Itaque, dolore.</li>
								<li class="font14">Ipsum dolor sit amet, consectetur  elit. Itaque, dolore.</li>
								<li class="font14">Consectetur adipisicing elit. Itaque, dolore.</li>
								<li class="font14">Dolor sit amet, consectetur adipisicing elit. Itaque, dolore.</li>
							</ul> -->
							<a href="" class="btn transparent btn-nc waves-effect brand-text hoverable btn-m">Create  Profile	</a>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</section>


	<section class="video-interview">
		<div class="container">
			<div class="row">
				<div class="col s12 m6 l5">
					<div class="card z-depth-0 ">
						<div class="card-content">
							<h5 class="white-text pl10"><b>Video Interview</b></h5>
							<p class="white-text font12  p10">Make an informed decision sooner with our live video interviewing. No downloads or third-party software required, just click and smile. Launching Soon!</p>
							<div class="pl10">
								<a href="" class="btn transparent btn-nc waves-effect  hoverable btn-m white-text ">Coming Soon</a>
							</div>

						</div>
						<div class="vido-back"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section style="background-color: #fbfcfc">
		<div class="container-wrap">
			<div class="row m0">
				<div class="col l12">
					<div class="h-title center">
						<h4 class="mb30"><b>Hire the Right Candidate. Find Them Here.</b></h4>
					</div>
					<div class="center">
						<img src="<?php echo base_url() ?>assets/img/portel-view.png" class="responsive-img">
					</div>
					<div class="row m0">
						<div class="col s12 m12 l8 push-l2">
							<ul class="before-li mon-ul">
								<li>Advertise your jobs and promote your employer brand to the candidates you want.</li>
								<li>Info-graphic display of your candidates and jobs</li>
								<li>Flexible packages based on your budget</li>
								<li>A detailed dashboard for both employers and candidates to give a complete view of the activities.</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<!-- subscriber -->
	<!-- <section class="white">
		<div class="row m0">
			<div class="container-wrap ">
				<div class="ptb30 ov-h">
					<div class="col s12 m12 l6 border-right">
						<div class="center">
							<p class="h6 bold m0">Subscribe to our newsletter</p>
							<p class="m0 mb10"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</small></p>
							<div class="row m0">
								<div class=" col s12 m12 l12">
									<input type="text" name="" class="join-input" placeholder="Enter your email id">
									<button class="brand btn waves-effect z-depth-0 join-btn" style="margin-top: -1px;">Subscribe</button>
									
								</div>
								
							</div>
						</div>
					</div>

					<div class="col s12 m12 l6">
						<div class="center ">
							<p class="h6 bold m0">Start a Free Trail now</p>
							<p class="m0 mb10"><small>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</small></p>
							<a href="" class="btn brand waves-effect hoverable" style="margin-top:20px ">Create Profile</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
 -->

	<section class="">
		<div class="container">
			<div class="row">
			    <div class="row">
			      <div class="col m12 s12 l12 p0">
			      	<div class="h-title center">
						<h4 class="mb10" style="padding-bottom: 10px"><b>Our Features</b></h4>
						<p><small>A modern and affordable hiring tool that helps recruiters to automatically filter, review, 
			            shortlist and hire the right candidates in minutes.</small></p>
					</div>
			        
			      </div>
			    </div>
			    <div class=" our-feature-detail">
			    <div class="row m0" >
			    	 <div class="col l4 m4 s12">
			    	 	<div class="card bc-red hoverable">
			    	 		<a href="" class="waves-effect waves-light ">
				    	 		<div class="card-content white-text">
				    	 			<div class="icon-bigs">
				    	 				<img src="<?php echo base_url()?>assets/img/000_icon.png" class="responsive-img">
				    	 			</div>
				    	 			<p class="h6 white-text mb10"><b>Career page</b></p>
				    	 			<p class="small white-text font12">Employers can build, Share and integrate their customized career page using our API thereby attracting more candidates to a consolidated pool.</p>
				    	 		</div>
			    	 		</a>
			    	 	</div>
			    	 </div>
			    	 <div class="col l4 m4 s12 ">
			    	 	<div class="card bc-gray hoverable">
			    	 		<a href="" class="waves-effect waves-light ">
				    	 		<div class="card-content white-text">
				    	 			<div class="icon-bigs">
					    	 			<img src="<?php echo base_url()?>assets/img/001_icon.png" class="responsive-img">
					    	 		</div>
					    	 		<p class="h6 white-text mb10"><b>CV Ranking</b></p>
					    	 		<p class="small white-text font12">Cherry Hire is designed to mimic human intelligence as it screens, sorts, and filters resume to find the most relevant candidates.
					    	 		</p>
				    	 		</div>
				    	 	</a>
			    	 	</div>
			    	 </div>
			    	 <div class="col l4 m4 s12 ">
			    	 	<div class="card bc-orenge hoverable">
			    	 		<a href="" class="waves-effect waves-light ">
				    	 		<div class="card-content white-text">
				    	 			<div class="icon-bigs">
					    	 			<img src="<?php echo base_url()?>assets/img/002_icon.png" class="responsive-img">
					    	 		</div>
					    	 		<p class="h6 white-text mb10"><b>Insightful Views</b></p>
					    	 		<p class="small white-text font12">Cherry Hire displays meaningful and actionable details of each profile thereby allowing the recruiters to make a more informed decision in line with their job requirement.
					    	 		</p>
				    	 		</div>
			    	 		</a>
			    	 	</div>
			    	 </div>
			    </div>

			    <div class="row m0" >
			    	 <div class="col l6 m4 s12">
			    	 	<div class="card bc-black hoverable">
			    	 		<a href="" class="waves-effect waves-light ">
				    	 		<div class="card-content white-text">
				    	 			<div class="icon-bigs">
				    	 				<img src="<?php echo base_url()?>assets/img/003_icon.png" class="responsive-img">
				    	 			</div>
				    	 			<p class="h6 white-text mb10"><b>Professional CV Writing</b></p>
				    	 			<p class="small white-text font12 mb10">Cherry Hire provides expert CV writing services to job seekers, enabling employers to match profiles with a job-specific requirement.</p>
				    	 		</div>
			    	 		</a>
			    	 	</div>
			    	</div>
			    	<div class="col l6 m4 s12 ">
			    	 	<div class="card bc-blue hoverable">
			    	 		<a href="" class="waves-effect waves-light ">
				    	 		<div class="card-content white-text">
				    	 			<div class="icon-bigs">
					    	 			<img src="<?php echo base_url()?>assets/img/004_icon.png" class="responsive-img">
					    	 		</div>
					    	 		<p class="h6 white-text mb10"><b>Candidate Pool</b></p>
					    	 		<p class="small white-text font12 mb10">The CVs are aggregated from different sources such as your emails, Social networks & more. This allows you to build a long-lasting and searchable talent pool.
					    	 		</p>
				    	 		</div>
			    	 		</a>
			    	 	</div>
			    	</div>
			    </div>
			</div>
			    <!-- <div class=" our-feature-detail">
			      <div class="col l4 m4 s12 mb10"> <a href="#"><img  class="responsive-img" src="<?php echo base_url() ?>site/images/career-f.png"></a> </div>
			      <div class="col l4 m4 s12 mb10"> <a href="#"><img  class="responsive-img" src="<?php echo base_url() ?>site/images/ranking-f.png"></a> </div>
			      <div class="col l4 m4 s12 mb10"> <a href="#"><img  class="responsive-img" src="<?php echo base_url() ?>site/images/insightful-f.png"></a> </div>
			      <div class="col l6 s12 m6  "> <a href="#"><img  class="responsive-img" src="<?php echo base_url() ?>site/images/cv-f.png"></a> </div>
			      <div class="col l6 s12 m6  "> <a href="#"><img  class="responsive-img" src="<?php echo base_url() ?>site/images/candidate-f.png"></a> </div>
			    </div> -->
			  </div>
		</div>
	</section>


	<!-- footer -->
	<?php echo include'include/footer.php' ?>
	<!-- end footer -->




	<!-- scripts -->
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/component.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/script.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.anoslide.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/select2.min.js"></script>
	<script >
		$(document).ready(function(){
			// $('select').formSelect();
			$('.carousel[data-mixed] ul').anoSlide(
			{
				items: 4,
				speed: 500,
				prev: 'a.prev',
				next: 'a.next',
				lazy: true,
				delay: 100,
				responsiveAt:800,
			});
			$('select').select2({width: "100%"});
			$('#sel-location').change(function(){
		       var val = $(this).val();
		       $(this).attr('name','location['+val+']');
		    });
		});
	</script>
</body>
</html>