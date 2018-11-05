

<body id="home-page" class="index">
    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="<?php echo $this->config->base_url();?>"><img class="img-responsive" src="media/logo_home.png" /></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="<?php echo $this->config->base_url();?>">Home</a>
                    </li>
					<li>
                        <a class="page-scroll" href="<?php echo $this->config->base_url();?>">Professional CV Writing</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo $this->config->base_url();?>">Psychometric Test</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="<?php echo $this->config->base_url('Jobs');?>">Search Jobs</a>
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