<!DOCTYPE html>

<html lang="en">



<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Meta, title, CSS, favicons, etc. -->

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">



    <title><?php echo $title; ?></title>



    <!-- Bootstrap core CSS -->



    <link href="<?php echo $this->config->base_url();?>css/bootstrap.min.css" rel="stylesheet">



    <link href="<?php echo $this->config->base_url();?>fonts/css/font-awesome.min.css" rel="stylesheet">

    <link href="<?php echo $this->config->base_url();?>css/animate.min.css" rel="stylesheet">



    <!-- Custom styling plus plugins -->

    <link href="<?php echo $this->config->base_url();?>css/custom.css" rel="stylesheet">

    <link href="<?php echo $this->config->base_url();?>css/icheck/flat/green.css" rel="stylesheet">





    <script src="<?php echo $this->config->base_url();?>js/jquery.min.js"></script>

    

    <script src="<?php echo $this->config->base_url()?>js/bootstrap.min.js"></script>



    <!--[if lt IE 9]>

        <script src="../assets/js/ie8-responsive-file-warning.js"></script>

        <![endif]-->



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>

          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

        <![endif]-->



</head>



<body style="background:#F7F7F7;">

    

    <div class="">

        <a class="hiddenanchor" id="toregister"></a>

        <a class="hiddenanchor" id="tologin"></a>



        <div id="wrapper">

            <div id="login" class="animate form">

                <section class="login_content">

                    <form role="form" data-toggle="validator" class="form-login" action="<?php echo $this->config->base_url();?>login" method="post">

                        <h1>Admin Login</h1>

                        <div>

                            <input type="text" name="username" class="form-control" placeholder="Username" required />

                        </div>

                        <div>

                            <input type="password" name="password" class="form-control" placeholder="Password" required />

                        </div>

                        <div>

                            <button class="btn btn-default submit" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>

                            <a data-toggle="modal" href="#myModal" class="reset_pass">Lost your password?</a>

                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">



                            <!--<p class="change_link">New to site?

                                <a href="#toregister" class="to_register"> Create Account </a>

                            </p>-->

                            <div class="clearfix"></div>

                            <br />

                            <div>

                                <h1><img src="<?php echo $this->config->base_url();?>images/logohome.png" alt="Kerala Travelshop"></h1>



                                <p>&copy; <?php echo date('Y');?> All Rights Reserved. Cherry Hire. Privacy and Terms</p>

                            </div>

                        </div>

                    </form>

                    <!-- form -->

                </section>

                <!-- content -->

            </div>

            

            <!-- Modal -->

		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">

		              <div class="modal-dialog">

		                  <div class="modal-content">

		                      <div class="modal-header">

		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

		                          <h4 class="modal-title">Forgot Password ?</h4>

		                      </div>

                              

		                      <div class="modal-body">

		                          <p>Enter your e-mail address below to reset your password.</p>

		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

		

		                      </div>

		                      <div class="modal-footer">

		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>

		                          <button class="btn btn-theme" type="button">Submit</button>

		                      </div>

                              

		                  </div>

		              </div>

		          </div>

		          <!-- modal -->

                  

            <div id="register" class="animate form">

                <section class="login_content">

                    <form>

                        <h1>Create Account</h1>

                        <div>

                            <input type="text" class="form-control" placeholder="Username" required />

                        </div>

                        <div>

                            <input type="email" class="form-control" placeholder="Email" required />

                        </div>

                        <div>

                            <input type="password" class="form-control" placeholder="Password" required />

                        </div>

                        <div>

                            <a class="btn btn-default submit" href="index.html">Submit</a>

                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">



                            <p class="change_link">Already a member ?



                                <a href="#tologin" class="to_register"> Log in </a>

                            </p>

                            <div class="clearfix"></div>

                            <br />

                            <div>

                                <h1><img src="<?php echo $this->config->base_url();?>images/logohome.png" alt="Kerala Travelshop"></h1>



                                <p>&copy; 2015 All Rights Reserved. Kerala Travelshop. Privacy and Terms</p>

                            </div>

                        </div>

                    </form>

                    <!-- form -->

                </section>

                <!-- content -->

            </div>

        </div>

    </div>

	<!--<script type="text/javascript" src="<?php echo $this->config->base_url()?>assets/js/jquery.backstretch.min.js"></script>

    <script>

        $.backstretch("<?php echo $this->config->base_url()?>images/login-bg.jpg", {speed: 500});

    </script>-->

    

</body>



</html>