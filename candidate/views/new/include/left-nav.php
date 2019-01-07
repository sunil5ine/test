				<div class="col l3 m12 s12">
					<div class="show-on-med-and-down row grey darken-1 bashboard-nav right-align">
							<a class="white-text m0 p10 dashboard-button waves-effect">Dashboard 
								<i class="material-icons arrow-down back-icon">keyboard_arrow_down</i>
								<i class="material-icons arrow-up back-icon" style="display: none">keyboard_arrow_up</i>
							</a>
					</div>
					<div class="dashboard-sildebar">
						<?php if(!empty($formdata['cmail'])) { ?>
						<div class="card mb25 profile-card">
							<div class="card-content">
								<div class="profile-detail center">
									<div class="profile-pic " style="min-height: 80px">
										<?php 
											if(substr($formdata['can_propic'],0,4) == 'http' || substr($formdata['can_propic'],0,5) == 'https'){ ?>
												<img src="<?php echo $formdata['can_propic']?>" class="responsive-img prf-pic circle" width="75px" height="75px">
											<?php } else if (!empty($formdata['can_propic'])) { ?>
											
										<img src="<?php echo $this->config->base_url().$formdata['can_propic'];?>" class="responsive-img prf-pic circle" width="75px" height="75px">
									<?php } else { ?>
										<img src="<?php echo $this->config->base_url()?>assets/img/person.png" class="responsive-img prf-pic circle" width="75px" height="75px">
		
									<?php } ?>
										<div class="changeprogile">
											<div class="edite-circle scale-transitions">
											<form method="post" name="picfrm" id="picfrm" action="<?php echo $this->config->base_url().'UpdatePhoto/'.$formdata['encrypt_id'];?>" enctype="multipart/form-data">
												<label for="upload-photo"><i class="material-icons">camera_alt</i></label>
												<input type="file" name="picToUpload" id="upload-photo" />
												<input type="submit" value="Update" id="pr-submit" class="btn btn-primary pull-right" style="display: none">
											</form>
												
												
											</div>
										</div>
									</div>
									<div class="profile-content">
										<p class="bold black-text mb10"><?php echo $formdata['cfname'].' '.$formdata['clname']; ?></p>
										<p class="can-designation mb10"><?php echo $formdata['cfarea']; ?></p>
										<div class="dividers mb10"></div>
										<p class="small-text"><small><?php echo $formdata['cmail']; ?></small></p>
									</div>
								</div>
								
							</div>
						</div>
						<?php } ?>  
						<div class="card">
							<div class="card-content">
								<ul class="dashboard-sildebar-nav">
									<?php $url = $this->uri->segment(1); ?>
									<li class=" <?php echo ($url=='MyProfile')? 'activel':'' ?>" >
										<a href="<?php echo base_url()?>PostCv" class="waves-effect "> <i class="material-icons nav-slid-icon">dashboard</i> Dashboard</a>
									</li>
									<li class=" <?php echo ($url=='applied-jobs')? 'activel':'' ?>">
										<a href="<?php echo base_url()?>applied-jobs" class="waves-effect"> <i class="material-icons nav-slid-icon">playlist_add_check</i> Applied Jobs</a>
									</li>
									<li class=" <?php echo ($url=='saved-jobs')? 'activel':'' ?>">
										<a href="<?php echo base_url()?>saved-jobs" class="waves-effect"><i class="material-icons nav-slid-icon">star</i> Saved Jobs</a>
									</li>
									<li class=" <?php echo ($url=='recommended-jobs')? 'activel':'' ?>">
										<a href="<?php echo base_url()?>recommended-jobs" class="waves-effect"><i class="material-icons nav-slid-icon">event_note</i> Recommended Jobs</a>
									</li>
									<li class=" <?php echo ($url=='cvwriting')? 'activel':'' ?>">
										<a href="<?php echo base_url()?>cvwriting/professional-cv" class="waves-effect"><i class="fas fa-pen-nib" style="margin-left: 3px;margin-right: 5px"></i> Professional CV Writing</a>
									</li>
									<li class=" <?php echo ($url=='psychotest')? 'activel':'' ?>">
										<a href="<?php echo base_url() ?>psychotest/plans" class="waves-effect"><i class="fas fa-file-signature" style="margin-left: 3px;margin-right: 5px"></i> Psychometric test</a>
									</li>
									<li class=" <?php echo ($url=='notification')? 'activel':'' ?>">
										<a href="<?php echo base_url() ?>notification" class="waves-effect"><i class="material-icons nav-slid-icon" style="margin-right:10px"> move_to_inbox</i>Inbox</a>
									</li>
									<li class=" <?php echo ($url=='cv-visitors')? 'activel':'' ?>">
										<a href="<?php base_url()?>cv-visitors" class="waves-effect"><i class="material-icons nav-slid-icon" style="margin-right:10px"> move_to_inbox</i>Recruiters Visits on cv</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>