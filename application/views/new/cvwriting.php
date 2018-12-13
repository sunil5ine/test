<!DOCTYPE html>
<html>
<head>
	<?php include 'include/titles.php'  ?>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width" />
  	<meta name="viewport" content="target-densitydpi=device-dpi, initial-scale=1.0, user-scalable=no"/>
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
  	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="<?php echo base_url() ?>assets/fonts/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
    <style>
    .plr15{padding:0 25px}
    </style>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.transitions.css"> -->
    <!-- <style>
        .testimonial{
    margin: 0 15px;
}
.testimonial .description{
    position: relative;
    font-size: 16px;
    line-height:26px;
    color: #696969;
    padding: 25px 20px;
    border:1px solid #d3d3d3;
    border-radius: 20px;
}
.testimonial .description:after{
    content: "";
    width: 36px;
    height: 36px;
    background: #f6f6f6;
    border-style: none none solid solid;
    border-width: 0 0 1px 1px;
    border-color: #d3d3d3;
    position: absolute;
    bottom: -19px;
    left: 6%;
    transform: skewY(-45deg);
}
.testimonial .pic{
    width: 80px;
    height: 80px;
    border-radius: 50%;
    overflow: hidden;
    margin:20px 30px;
    display: inline-block;
    float: left;
}
.testimonial .pic img{
    width: 100%;
    height: auto;
}
.testimonial .testimonial-title{
    display: inline-block;
    text-transform: capitalize;
    margin-top: 35px;
}
.testimonial .testimonial-title span{
    color: #3498db;
    display: block;
    font-size:17px;
    font-weight: bold;
    margin-bottom: 10px;
}
.testimonial .testimonial-title small{
    display: block;
    font-size:14px;
}
.owl-theme .owl-controls{
    position: absolute;
    bottom: 10%;
    right: 10px;
}
.owl-theme .owl-controls .owl-buttons div{
    border-radius: 0;
    background:#000;
    padding: 3px 8px;
}
.owl-prev:before,
.owl-next:before{
    content: "\f053";
    font-family: "Font Awesome 5 Free"; font-weight: 900;
    color: #fff;
}
.owl-next:before{
    content: "\f054";
}
@media only screen and (max-width: 767px){
    .testimonial .description{
        font-size: 14px;
    }
    .testimonial .description:after{
            left: 14%;
    }
}
@media only screen and (max-width: 479px){
    .owl-theme .owl-controls{
        bottom: 0;
    }
    .testimonial .description:after{
        left: 18%;
    }
}
    </style> -->
</head>
<body>
	<!-- navigation bar -->
    <?php include 'include/header.php'  ?>
    <!-- banner -->
    <section class="cv-banner pb0">
        <div class="container-wrap">
            <div class="row">
                <div class="col s12 center ">
                    <div class="ptb15 ">
                        <h5 class="white-text bold"> Professional CV Writing</h5>
                        <p class="white-text"><small class="white-text">Create a great impression on Employers</small></p>
                        <br>
                        <a href="#cvs" class="waves-effect waves-light btn white-text   brand nav-btn"> write your own CV </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="clipart"></div>
    </section>

    <!-- package -->
    <section >
        <div class="container-wrap">
            <div class="row">
               <?php foreach ($cv_package as $key => $value) { ?>
                    <div class="col s12 m4 scrollspy" id="cvs">
                        <div class="card">
                            <div class="card-content center">
                                <h5 class="black-text"><?php echo $value->cp_title ?></h5>
                                <p class="bold black-text mb10">
                                    <?php
                                        echo $value->cp_from;
                                        echo ($value->cp_to == '+')? '' : ' - ';
                                        echo $value->cp_to;
                                    ?>
                                     Years
                                </p>
                                <p>Cover Letter +$10.00 <br> Express Delivery +$10.00</p>
                                
                                <div class="pring-section">
                                    <h3>$ <?php echo $value->cp_price; ?></h3>
                                    <a href="<?php echo base_url('candidate/cvwriting/questionnaire/').$value->cp_id ?>" class=" btn plr15  brand-text  btn-nc waves-green hoverable  waves-effect transparent">Get your cv</a>
                                </div>
                            </div>
                        </div>
                    </div>
                  <?php } ?>
            </div>
        </div>
    </section>

    <!-- 10 reson -->
    <!-- <section class="white pb0">
        <div class="container-wrap">
            <div class="row m0">
                <div class="s12">
                  <div class="center">
                        <h4>10 Resons to Choose CherryHire</h4>
                        <p class="bold">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Error molestiae voluptate amet veritatis sint aliquid ratione distinctio, exercitationem explicabo enim ad vel cum impedit optio nemo totam, modi incidunt inventore.</p>
                  </div>
                  <br>
                  <div class="container list-col">
                      <div class="col s12 m4"><span><i class="tiny material-icons green-text">check_circle</i> Lorem ipsum dolor sit.</span></div>
                      <div class="col s12 m4"><span><i class="tiny material-icons green-text">check_circle</i> Lorem ipsum dolor sit.</span></div>
                      <div class="col s12 m4"><span><i class="tiny material-icons green-text">check_circle</i> Lorem ipsum dolor sit.</span></div>
                      <div class="col s12 m4"><span><i class="tiny material-icons green-text">check_circle</i> Lorem ipsum dolor sit.</span></div>
                      <div class="col s12 m4"><span><i class="tiny material-icons green-text">check_circle</i> Lorem ipsum dolor sit.</span></div>
                      <div class="col s12 m4"><span><i class="tiny material-icons green-text">check_circle</i> Lorem ipsum dolor sit.</span></div>
                      <div class="col s12 m4"><span><i class="tiny material-icons green-text">check_circle</i> Lorem ipsum dolor sit.</span></div>
                      <div class="col s12 m4"><span><i class="tiny material-icons green-text">check_circle</i> Lorem ipsum dolor sit.</span></div>
                      <div class="col s12 m4"><span><i class="tiny material-icons green-text">check_circle</i> Lorem ipsum dolor sit.</span></div>
                      <div class="col s12 m4"><span><i class="tiny material-icons green-text">check_circle</i> Lorem ipsum dolor sit.</span></div>
                  </div>
                </div>
            </div>
        </div>
        <div class="clipart"></div>
    </section> -->

    <!-- idea to design -->
    <!-- <section class="itodes">
        <div class="container-wrap">
            <div class="row m0">
                <div class="col s12 center">
                    <h4 class="m0">From idea to Design in Minutes</h4>
                </div>

                <div class="col 12 m3">
                    <div class="card">
                        <div class="card-content center">
                            <center>
                                <div class="icircle">
                                    <img src="<?php echo base_url() ?>assets/img/mancartoon.png" alt="">
                                </div>
                            </center>
                            <p>Lorem ipsum dolor sit amet consectetur.</p>
                        </div>
                    </div>
                </div>
                <div class="col 12 m3">
                    <div class="card">
                        <div class="card-content center">
                            <center>
                                <div class="icircle">
                                    <img src="<?php echo base_url() ?>assets/img/mancartoon.png" alt="">
                                </div>
                            </center>
                            <p>Lorem ipsum dolor sit amet consectetur.</p>
                        </div>
                    </div>
                </div>
                <div class="col 12 m3">
                    <div class="card">
                        <div class="card-content center">
                            <center>
                                <div class="icircle">
                                    <img src="<?php echo base_url() ?>assets/img/mancartoon.png" alt="">
                                </div>
                            </center>
                            <p>Lorem ipsum dolor sit amet consectetur.</p>
                        </div>
                    </div>
                </div>
                <div class="col 12 m3">
                    <div class="card">
                        <div class="card-content center">
                            <center>
                                <div class="icircle">
                                    <img src="<?php echo base_url() ?>assets/img/mancartoon.png" alt="">
                                </div>
                            </center>
                            <p>Lorem ipsum dolor sit amet consectetur.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    
    <!-- Faq -->
    <!-- <section class="white pb0">
        <div class="container-wrap">
            <div class="row">
                <div class="col s12 center">
                    <h4>FAQ's</h4>
                </div>
            <div class=" banner-content col l6 push-l3 ">
					<ul class="collapsible z-depth-0">
					    <li class="">
					      	<div class="collapsible-header" tabindex="0">
					      		<p class="m0 bold"> What are Psychometric Tests? </p>
					      			<i class="material-icons secondary-content rotet">add</i>
					  		</div>
					      	<div class="collapsible-body black-text" style="">
					      		<p class="black-text">
					      			Psychometric testing is used to measure a candidate in a variety of areas, but the basic function of psychometric testing is that it is a measurement of the mind.
					      		</p>
					      		<p class="black-text">
					      			Through Psychometric tests, employer gets an idea of the candidate’s abilities, of how they work in given situations, what their strengths and weaknesses are, what makes them tick and how they prefer to work in given situations, how they work under pressure and how they work alone or as part of a team.
					      		</p>
					      	</div>
					    </li>
					    <li>
					      <div class="collapsible-header" tabindex="0">
					      		<p class="m0 bold"> When are Psychometric tests used? </p>
					      			<i class="material-icons secondary-content">add</i>
					  		</div>
					      	<div class="collapsible-body black-text"><span> Psychometric tests are used to obtain an objective assessment of a person’s personality, aptitude and interest. These tests are administered as a way of screening candidates for interviews. By reviewing the results of the test, employer is able to objectively determine the type of person that they may potentially hire, as far as ability, personality and interests are concerned. </span></div>
					    </li>
					    <li>
					      <div class="collapsible-header" tabindex="0">
					      		<p class="m0 bold">
                                       What are the types of Psychometric tests?
                                        </p>
					      			<i class="material-icons secondary-content">add</i>
					  		</div>
					      	<div class="collapsible-body black-text"><span> There are many types of Psychometric tests that may be used to screen candidates. Cherry Hire uses 2 types of tests – a) General Aptitude Test and b) Job Specific Psychometric Test. The General Aptitude test does not have right or wrong answers. These tests assess the personality characteristic traits of candidates. This test tends to ask if a candidate would rather do one thing or another and are used to measure current or potential performance. These tests are scored based on how a person reacts to a situation. General Aptitude test is timed and it measures Numerical, Clerical, Verbal, Mechanical and Abstract reasoning. Job Specific Psychometric test aims to provide a potential employer with an insight into how well candidates work with other people, how well they handle stress and whether they will be able to cope with the intellectual demands of the job. </span></div>
					    </li>
					  </ul>
				</div>
            </div>
        </div>
        <div class="clipart"></div>
    </section> -->

    <!-- Testimonial -->
    <!-- <section>
        <div class="container-wrap">
            <div class="row">
                <div class="col s12">
                    <h4 class="center-align m0">Testimonial</h4>
                </div>
            </div>

            <div class="row">
                <div class="container">
                    <div class="col s12 m12 l5 right-align">
                        <img src="<?php echo base_url() ?>assets/img/man-2290591_640.png" alt="">
                    </div>
                    <div class="col s12 m12 l7">
                        <div id="testimonial-slider" class="owl-carousel">
                            <div class="testimonial">
                                <p class="description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis commodo nulla dictum felis sollicitudin, euismod finibus augue vulputate. Sed aliquam, elit eu gravida dignissim, justo dolor vulputate ipsum, a dapibus purus dui vitae purus. Maecenas massa arcu, rhoncus sit amet risus quis, porta hendrerit arcu. Pellentesque sagittis pretium nibh, et.
                                </p>
                                <div class="pic">
                                    <img src="<?php echo base_url() ?>assets/img/mancartoon.png" alt="">
                                </div>
                                <div class="clearfix"></div>
                                <h3 class="testimonial-title">
                                    <span>williamson</span>
                                    <small>Web Developer</small>
                                </h3>
                            </div>
                    
                            <div class="testimonial">
                                <p class="description">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis commodo nulla dictum felis sollicitudin, euismod finibus augue vulputate. Sed aliquam, elit eu gravida dignissim, justo dolor vulputate ipsum, a dapibus purus dui vitae purus. Maecenas massa arcu, rhoncus sit amet risus quis, porta hendrerit arcu. Pellentesque sagittis pretium nibh, et.
                                </p>
                                <div class="pic">
                                    <img src="<?php echo base_url() ?>assets/img/mancartoon.png" alt="">
                                </div>
                                <h3 class="testimonial-title">
                                    <span>kristiana</span>
                                    <small>Web Designer</small>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- footer -->
    <?php echo include'include/footer.php' ?>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/materialize.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/js/component.js"></script>
    <script type="text/javascript" src="<?php echo base_url() ?>assets/js/script.js"></script>
    <script>
        $(document).ready(function(){
            $('.scrollspy').scrollSpy();
        });
    </script>

    <!-- <script type="text/javascript" src="<?php echo base_url() ?>assets/js/owl.carousel.min.js"></script>
    <script>
    $(document).ready(function(){
        $("#testimonial-slider").owlCarousel({
                items:1,
                itemsDesktop:[1000,1],
                itemsDesktopSmall:[979,1],
                itemsTablet:[768,1],
                pagination: false,
                navigation:true,
                navigationText:["",""],
                transitionStyle : "goDown",
                autoPlay:false
        });
        });
    </script> -->
</body>
</html>