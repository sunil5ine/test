<div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?php echo $this->config->base_url().'Dashboard';?>" class="site_title"><img src="<?php echo $this->config->base_url();?>images/adminlogo.png" alt="Cherry Hire" class="img-responsive"></a>
                    </div>
                    <div class="clearfix"></div>
                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3><?php //echo 'Date : '.date('d-m-Y H:i:s'); ?> &nbsp;</h3>
                            <ul class="nav side-menu">
                                <li <?php if($mid == 1) { echo 'class="current-page"'; } ?>><a href="<?php echo $this->config->base_url();?>Dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
                                <li <?php if($mid == 2) { echo 'class="current-page"'; } ?>><a><i class="fa fa-heart"></i> My Account <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" <?php ($mid != 2)? 'style="display: none"':'style="display: block"';?>>
                                        <li <?php if($mid == 2 && $sid == 1) { echo 'class="current-page"'; } ?>><a  href="<?php echo $this->config->base_url();?>AccountSettings">Profile Settings</a></li>
                                        <li <?php if($mid == 2 && $sid == 3) { echo 'class="current-page"'; } ?>><a  href="<?php echo $this->config->base_url();?>Subscriptions">Subscription</a></li>
                                        <li <?php if($mid == 2 && $sid == 4) { echo 'class="current-page"'; } ?>><a  href="<?php echo $this->config->base_url();?>TransactionList">Billing History</a></li>
                                    </ul>
                                </li>
                                <li <?php if($mid == 3) { echo 'class="current-page"'; } ?>><a><i class="fa fa-briefcase"></i> Jobs <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" <?php ($mid != 3)? 'style="display: none"':'style="display: block"';?>>
                                        <li <?php if($mid == 3 && $sid == 303) { echo 'class="current-page active"'; } ?>><a href="<?php echo $this->config->base_url();?>Jobs/Add"> Post a Job </a></li>
                                        <li <?php if($mid == 3 && $sid == 301) { echo 'class="current-page active"'; } ?>><a href="<?php echo $this->config->base_url();?>MyJobs"> Active Jobs </a></li>
                                        <li <?php if($mid == 3 && $sid == 302) { echo 'class="current-page active"'; } ?>><a href="<?php echo $this->config->base_url();?>MyJobs/Expired"> Closed Jobs </a></li>
                                    </ul>
                                </li> 
                                <li <?php if($mid == 5) { echo 'class="current-page"'; } ?>><a href="#"><i class="fa fa-graduation-cap"></i> Tutorials </a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->
                    <div class="sidebar-footer hidden-small">
                        <a data-toggle="tooltip" data-placement="top" title="Settings" href="<?php echo $this->config->base_url();?>AccountSettings">
                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                        </a>

                        <a data-toggle="tooltip" data-placement="top" title="Plans" href="<?php echo $this->config->base_url();?>Subscriptions">
                            <span class="glyphicon glyphicon-tree-conifer" aria-hidden="true"></span>
                        </a>

                        <a data-toggle="tooltip" data-placement="top" title="Tutorials" href="#">
                            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span>
                        </a>

                        <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?php echo $this->config->base_url();?>Logout">
                            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                        </a>
                    </div>
                    <!-- /menu footer buttons -->
                </div>
            </div>