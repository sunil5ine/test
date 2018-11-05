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
                                    <img src="<?php echo $this->config->base_url();?>images/img.jpg" alt=""><?php echo $this->session->userdata('cand_chname'); ?>
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="<?php echo $this->config->base_url().'Dashboard';?>">  Profile</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $this->config->base_url().'ProfileSettings';?>">
                                            <!-- <span class="badge bg-red pull-right">50%</span> -->
                                            <span>Settings</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo $this->config->base_url().'Support';?>">Help</a>
                                    </li>
                                    <li><a href="<?php echo $this->config->base_url();?>Logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->
            <div id="hidden_container"> </div>