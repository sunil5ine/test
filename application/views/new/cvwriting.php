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

    <section class="white">
        <div class="container-wrap">
            <div class="row">
                <div class="col s12 m12 l10 push-l1 center-align">
                    <h4>
                        Professional CV Writing
                    </h4>
                    <p><small>Create a great impression on Employers</small></p>
                    <br>
                    <p>
                        Whether you are just starting out or making a considered move from one role to another, your first step forward can be everything. If you put forward the best possible representation of your professional self, you can truly test what the market thinks you are worth. A confident summary will position you in the recruiter’s mind and if you look good on paper, you will feel good about yourself, about your skills, your experience and what you have achieved. 
                    </p>
                    <p>
                    We employ professional experts for creating well-crafted resumes ranging from entry level to executive level. It helps the employer to get an idea about your objectives and goals associated with the career. Our resume writing specialists will ask you about the details of current job history, previous experience and career goals. The professional resume expert will then create your curriculum vitae appealing to the employer. 
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- package -->
    <section class="">
        <div class="container-wrap">
            <div class="row">
               <?php foreach ($cv_package as $key => $value) { ?>
                    <div class="col s12 m4 scrollspy" id="cvs">
                        <div class="card">
                            <div class="card-content center">
                                <h5 class="black-text"><?php echo $value->cp_title ?>  </h5>
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

</body>
</html>