		<!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo $this->config->base_url();?>images/img.jpg" alt="CherryHire"><?php echo $this->session->userdata('hirename'); ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>

                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?php echo $this->config->base_url();?>AccountSettings">Profile Settings</a> </li>
                                    <li> <a href="<?php echo $this->config->base_url();?>Subscriptions"> Subscription </a> </li>
                                    <li> <a href="#">Help</a> </li>
                                    <li><a href="<?php echo $this->config->base_url();?>Logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <div id="hidden_container"> </div>