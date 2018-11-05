<body id="employer-page" class="index">
	<!------------ Top Menu Here ------------------>    
    <nav id="mainNav" class="navbar navbar-default navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="<?php echo $this->config->item('web_url');?>"><img class="img-responsive" src="<?php echo $this->config->item('web_url');?>media/logo_home.png" /></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <a href="<?php echo $this->config->item('web_url').'PostCV';?>"><span id="inner-top-button" class="btn-success">Go to Job Seekers</span></a>
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="<?php echo $this->config->item('web_url');?>">Home</a>
                    </li>
                     <li <?php echo ($emid==1) ? 'class="active"':''; ?>>
                        <a class="page-scroll <?php echo ($emid==2) ? 'nobdr':''; ?>" href="<?php echo $this->config->item('web_url').'Features';?>">How it works</a>
                    </li>
                    <li <?php echo ($emid==2) ? 'class="active"':''; ?>>
                        <a class="page-scroll <?php echo ($emid==3) ? 'nobdr':''; ?>" href="<?php echo $this->config->item('web_url').'PostJob';?>">Post a Job</a>
                    </li>
                    <li <?php echo ($emid==3) ? 'class="active"':''; ?>>
                        <a class="page-scroll <?php echo ($emid==4) ? 'nobdr':''; ?>" href="<?php echo $this->config->item('web_url').'Pricing';?>">Pricing</a>
                    </li>
                    <li <?php echo ($emid==4) ? 'class="active"':''; ?>>
                        <a class="page-scroll <?php echo ($emid==5) ? 'nobdr':''; ?>" href="<?php echo $this->config->item('web_url').'FreeTrial';?>">Free Trial</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#" data-toggle="modal" data-target="#SigninModal">Sign in</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>