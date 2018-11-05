<link href="<?php echo $this->config->base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo $this->config->base_url();?>fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url();?>css/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url();?>css/custom.css" rel="stylesheet">
    
     <script src="<?php echo $this->config->base_url();?>js/jquery.min.js"></script>
    
    <script src="<?php echo $this->config->base_url();?>js/jquery-ui.min.js"></script>
                <?php
				$checked = ($formdata['cexp_present']==1)?'checked':'';
				$disabled = ($formdata['cexp_present']==1)?'disabled':'required';
				
				?>
                <div class="col-md-12 col-xs-12">
                
                <div class="x_panel">
                <!--<div class="x_title">
                  <h2>Edit Work Experience</h2> 
                  <div class="clearfix"></div>
                </div>-->
                <?php if(!empty($formdata)) { ?>
                <div class="row">
                        <form method="post" name="editworkfrm" id="editworkfrm" action="<?php echo $this->config->base_url().'EditWork/'.$formdata['cexp_encrypt_id'];?>">
                            <a onclick="window.parent.tb_remove(true);" href="javascript:void(0);" class="btn btn-danger btn-xs pull-right"><i class="fa fa-times"> </i> Close</a>
                            <div class="col-md-8 col-sm-8 col-xs-8 space-top-12">
                                <label for="edit_company">Employer <span id="edit_company_validate"></span></label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-building"></i></span>
                                    <input type="text" class="form-control" placeholder="Employer" value="<?php echo $formdata['cexp_company'];?>" name="edit_company" id="edit_company" required>
                                </div>
                             </div>
                             <div class="col-md-4 col-sm-4 col-xs-4 space-top-12">
                                <div class="form-group input-group">
                                <label>
                                  <input type="checkbox" name="edit_cmp_present" id="edit_cmp_present" value="1" <?php echo $checked;?>> Current Employer
                                </label>                                
                              	</div>
                            </div>
                             <div class="col-md-12 col-sm-12 col-xs-12 space-top-12">
                                <label for="edit_location">Location  <span id="edit_location_validate"></span></label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-home"></i></span>
                                    <input type="text" class="form-control" placeholder="Company Location" value="<?php echo $formdata['cexp_location'];?>" name="edit_location" id="edit_location" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 space-top-12">
                                <label for="edit_frmmon">From Date  <span id="edit_frmmon_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    <?php echo form_dropdown('edit_frmmon',$month_list,$formdata['cexp_from_mon'],'id="edit_frmmon" class=" form-control" tabindex="1" style="width:45%;" required');?>
                                    <?php echo form_dropdown('edit_frmyr',$year_list,$formdata['cexp_from_yr'],'id="edit_frmyr" class=" form-control" tabindex="1" style="width:45%;" required');?>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 space-top-12">
                                <label for="edit_tomon">To Date  <span id="edit_tomon_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    <?php echo form_dropdown('edit_tomon',$month_list,$formdata['cexp_to_mon'],'id="edit_tomon" class=" form-control" tabindex="1" style="width:45%;" '. $disabled);?>
                                    <?php echo form_dropdown('edit_toyr',$year_list,$formdata['cexp_to_yr'],'id="edit_toyr" class=" form-control" tabindex="1" style="width:45%;"'. $disabled);?>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 space-top-12">
                                <label for="edit_position">Position <span id="edit_position_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-sitemap"></i></span>
                                    <input type="text" class="form-control" placeholder="Position" name="edit_position" value="<?php echo $formdata['cexp_position'];?>" id="edit_position" required>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 space-top-12">
                                <label for="edit_keyrole">Key Responsibility</label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-sliders"></i></span>
                                    <textarea class="form-control" placeholder="Key Resposibility" name="edit_keyrole" id="edit_keyrole" ><?php echo $formdata['cexp_key_role'];?></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 col-xs-12 col-xs-12 space-top-12">
                                
                                <input type="submit" value="Update" class="btn btn-primary pull-right">
                            </div>
                        </form>
                    </div>
                 <?php } else { ?>   
                 	<div class="x_title error">
                  		<a onclick="window.parent.tb_remove(true);" href="javascript:void(0);" class="btn btn-danger btn-xs pull-right"><i class="fa fa-times"> </i> Close</a>
                        <h2>Sorry unable to process!</h2> 
                  		<div class="clearfix"></div>
               	 	</div
                 ><?php } ?>
                    </div>
                    </div>

    <script src="<?php echo $this->config->base_url();?>assets/js/bootstrap.min.js"></script>

	<script src="<?php echo $this->config->item('web_url');?>js/jquery.validate.js"></script>
   <script type="text/javascript" src="<?php echo $this->config->item('web_url');?>js/editcandidate.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>js/thickbox.js"></script>