<div class="col l3 m12 s12">
					<div class="show-on-med-and-down row grey darken-1 bashboard-nav right-align">
							<a class="white-text m0 p10 dashboard-button waves-effect">Dashboard 
								<i class="material-icons arrow-down back-icon">keyboard_arrow_down</i>
								<i class="material-icons arrow-up back-icon" style="display: none">keyboard_arrow_up</i>
							</a>
					</div>
					
					<div class="dashboard-sildebar">
						<div class="card mb25 profile-card">
							<div class="card-content">
								<div class="profile-detail center">
									<span class="profile-pic ">
										<?php if (!empty($prodetails['ep_logo'])){ ?>
											<img src="<?php echo base_url().$prodetails['ep_logo']?>" class="responsive-img circle image" width="75px" height="75px">
										<?php }else{ ?>
											<img src="<?php echo $this->config->item('web_url')?>assets/img/person.png" class="responsive-img circle image" width="75px" height="75px">
										<?php } ?>
											<p class="label"><a href="#modal2" class="edite-layout center waves-effect modal-trigger white-text"><i class="material-icons ">create</i></a></p>
										
									</span>
									<div class="profile-content">
										<p class="bold black-text mb10"><?php echo $formdata['fname']; ?></p>
										<p class="can-designation mb10"><?php echo $formdata['designation']; ?></p>
										<div class="dividers mb10"></div>
										<p class="small-text"><small><?php echo $formdata['notifyemail']; ?></small></p>
									</div>
								</div>
								
							</div>
						</div>
						<div class="card">
							<div class="card-content">
								<div class="center">
									<h4 class="m0 p0"><i class="far fa-comments"></i></h4>
									<p class="black-text bold ">Have any Queries. Our team is here to he	lp</p>
									<p class="ptb10"><small>Email: support@cherryhire.com</small></p>
									<ul class="social-share-box">
										<li><i class="fab fa-facebook-f"></i></li>
										<li><i class="fab fa-twitter"></i></li>
										<li><i class="fab fa-behance"></i></li>
										<li><i class="fab fa-instagram"></i></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>