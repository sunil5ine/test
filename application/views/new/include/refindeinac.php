			
			<div class="col l3 m12 s12">
					<div class="show-on-med-and-down row grey darken-1 bashboard-nav right-align">
							<a class="white-text m0 p10 dashboard-button waves-effect">Refine Result 
								<i class="material-icons arrow-down back-icon">tune</i>
								<i class="material-icons arrow-up back-icon" style="display: none">close</i>
							</a>
					</div>
					<div class="job-result-filter dashboard-sildebar">
						<div class="card">
							<div class="card-content" id="fiters">
								<h5 class="h6 black-text">Refine Result 
									<a href="<?php echo base_url();?>Jobs?jobs=list"class="right small">Clear all</a></h5>
								<div class="filter-box">
									<div class="filter-title waves-effect">
										<span class="h7 black-text">Posted On</span>
										<span class="right">
											<i class="material-icons upicon back-icon">keyboard_arrow_down</i>
											<i class="material-icons dowicon d-none back-icon">keyboard_arrow_up</i>
										</span>
									</div>
									<?php 
										 									 
										$urt = $this->input->get('postedon'); 
										

									?>
									<div class="filter-content">
										<div class="lablediv">
											<label>
										        <input type="checkbox" id="past24" class="filled-in" fname="postedon" fvalue="pst24" <?php echo ( !empty($urt['pst24']) == 'pst24')?'checked':'' ?> />
										        <span>Past 24 Hrs</span>
										    </label>
										</div>
										<div class="lablediv">
										    <label>
										        <input type="checkbox" class="filled-in"  fname="postedon" fvalue="pstweek"  <?php echo ( !empty($urt['pstweek']) == 'pstweek')?'checked':'' ?>/>
										        <span>Past 1 Week</span>
										    </label>
										</div>
										<div class="lablediv">
										    <label>
										        <input type="checkbox"  class="filled-in" fname="postedon" fvalue="pstmont"  <?php echo ( !empty($urt['pstmont']) == 'pstmont')?'checked':'' ?>/>
										        <span>Past 1 Month</span>
										    </label>
										</div>
										<div class="lablediv">
										    <label>
										        <input type="checkbox" class="filled-in"  fname="postedon" fvalue="pstany"  <?php echo ( !empty($urt['pstany']) == 'pstany')?'checked':'' ?>/>
										        <span>Any Time</span>
										    </label>
										</div>
									</div>
								</div> <!-- end Post on filter -->

								<div class="filter-box funarea-filter">
									<div class="filter-title waves-effect">
										<span class="h7 black-text">Functional Areas</span>
										<span class="right">
											<i class="material-icons upicon back-icon">keyboard_arrow_down</i>
											<i class="material-icons dowicon d-none back-icon">keyboard_arrow_up</i>
										</span>
									</div>
									<div class="filter-content expandible" id="fun-area-box">
										<?php $rt = ''; foreach ($funarea_list as $key => $value) { 
											if(!empty($key) && !empty($value)){
											 
											 $frd[] = $this->input->get('funarea'); 
										?> 

										<div class="lablediv">
											<label>
										        <input type="checkbox" fname="funarea" fvalue="<?php echo $key; ?>" value="<?php echo $key ?>"  class="filled-in" 
										        <?php echo (!empty($frd[0][$key])) ?'checked': '' ?> />
										        <span class="ton"><?php echo $value ?><!-- <span class="conts"> ()</span> --></span>
										    </label>
										</div>
										<?php } } ?>
										
									    <label class=" block btn-more btn-more-funarea">
									    	<a class="blue-text more block"> More </a>
									    </label> 
									</div>
								</div> <!-- end Functional area filter -->

								<div class="filter-box">
									<div class="filter-title waves-effect">
										<span class="h7 black-text">Location</span>
										<span class="right">
											<i class="material-icons upicon back-icon">keyboard_arrow_down</i>
											<i class="material-icons dowicon d-none back-icon">keyboard_arrow_up</i>
										</span>
									</div>

										<div class="filter-content expandible" id="cntlist">
										<?php foreach ($country_list as $key =>$value) {
											if (!empty($key) && !empty($value)) {
												$loca[] = $this->input->get('location'); 
											 ?>
											<label class="lablediv">
										        <input type="checkbox"  class="filled-in" fname="location" fvalue="<?php echo $key; ?>" value="<?php echo $key?>"  <?php echo (!empty($loca[0][$key])) ?'checked': '' ?>/>
										        <span><?php echo $value ?><span class="conts"></span></span>
										    </label>
										<?php } } ?>
										<label class=" block btn-more btn-more-contry">
									    	<a class="blue-text more block"> More </a>
									    </label>
										</div>

								</div> <!-- end Location filter -->

								<div class="filter-box">
									<div class="filter-title waves-effect">
										<span class="h7 black-text">Job Type</span>
									</div>
									<div class="filter-selecter">
										<div class="form-group">
								          	<select fname="jtype" class="select-list">
											    <option  value="">Select Job Type</option>
											    <option  value="all">All</option>
											    <option  value="Full Time">Full Time</option>
											    <option  value="Part Time">Part Time</option>
											    <option  value="Freelance">Freelance</option>
											    <option  value="Temporary">Temporary</option>
											</select>
								        </div>
									</div>
								</div><!-- end Job type -->

								<div class="filter-box">
									<div class="filter-title waves-effect" >
										<span class="h7 black-text">Experience Level</span>
										<snan class="small right back-icon">Clear all</snan>
									</div>
									<div class="filter-range" style="padding-top: 10px">
										<div id="test-slider"></div>
									</div>
								</div><!-- end Job type -->

								<div class="filter-box">
									<div class="filter-title waves-effect">
										<span class="h7 black-text">Salary Range</span>
									</div>
									<div class="filter-selecter">
										<div class="form-group">
											
								          	<select fname="sal" class="select-list">
								          		<?php  foreach ($monsal_list as $key => $value) {?>
								          			<option value="<?php echo  $key ?>"><?php echo  $value ?></option>
								          		<?php } ?>
											</select>
								        </div>
									</div>
								</div><!-- end Salary range -->
							</div>
						</div>
					</div>
				</div>
