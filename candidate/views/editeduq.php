<link href="<?php echo $this->config->base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo $this->config->base_url();?>fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url();?>css/jquery-ui.css" rel="stylesheet">
    <link href="<?php echo $this->config->base_url();?>css/custom.css" rel="stylesheet">
    
     <script src="<?php echo $this->config->base_url();?>js/jquery.min.js"></script>
    
    <script src="<?php echo $this->config->base_url();?>js/jquery-ui.min.js"></script>
                
                <div class="col-md-12 col-xs-12">
                <a onclick="window.parent.tb_remove(true);" href="javascript:void(0);" class="btn btn-danger btn-xs pull-right"><i class="fa fa-times"> </i> Close</a>
                <div class="x_panel">
                <!--<div class="x_title">
                  <h2>Edit Work Experience</h2> 
                  <div class="clearfix"></div>
                </div>-->
                
                <div class="row">
                <?php if(!empty($formdata)) { ?>
                        <form method="post" name="editedufrm" id="editedufrm" action="<?php echo $this->config->base_url().'EditEduDetails/'.$formdata['cedu_encrypt_id'];?>">
                            <div class="col-md-12 space-top-12">
                                <label for="edit_school">School/University <span id="edit_school_validate"></span></label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-university"></i></span>
                                    <input type="text" class="form-control" placeholder="School/University" value="<?php echo $formdata['cedu_school'];?>" name="edit_school" id="edit_school" required>
                                </div>
                             </div>

                             <div class="col-md-6 space-top-12">
                                <label for="edit_degree_type">Qualification  <span id="edit_degree_type_validate"></span></label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>
                                    <?php echo form_dropdown('edit_degree_type',$degree_type_list,$formdata['deg_type_id'],'id="edit_degree_type" class=" form-control" tabindex="1" required');?>
                                </div>
                            </div>

                            <div class="col-md-6 space-top-12">
                                <label for="edit_degree">Degree  <span id="edit_degree_validate"></span></label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lightbulb-o"></i></span>
                                    <?php echo form_dropdown('edit_degree',$degree_list,$formdata['deg_id'],'id="edit_degree" class=" form-control" tabindex="1" required');?>
                                </div>
                            </div>
                             
                             <div class="col-md-12 space-top-12">
                                <label for="edit_spec">Specification  <span id="edit_spec_validate"></span></label>
                                <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-share-alt"></i></span>
                                    <input type="text" class="form-control" placeholder="Specification" value="<?php echo $formdata['cedu_specialization'];?>" name="edit_spec" id="edit_spec" required>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 space-top-12">
                                <label for="edit_edufrmyr">Start  <span id="edit_edufrmyr_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    <?php echo form_dropdown('edit_edufrmyr',$year_list,$formdata['cedu_startdt'],'id="edit_edufrmyr" class=" form-control" tabindex="1" required');?>
                                </div>
                            </div>

                            <div class="col-md-6 col-sm-6 space-top-12">
                                <label for="edit_edutoyr">End  <span id="edit_edutoyr_validate"></span></label>
                                <div class="form-group input-group">
                                    <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                    <?php echo form_dropdown('edit_edutoyr',$year_list,$formdata['cedu_enddt'],'id="edit_edutoyr" class=" form-control" tabindex="1" required');?>
                                </div>
                            </div>
                            
                            <div class="col-md-12 space-top-12">                                
                                <input type="submit" value="Update" class="btn btn-primary pull-right">
                            </div>
                        </form>
                       <?php } else { ?>  
                       <div class="x_title error">
                  		<h2>Sorry unable to process!</h2> 
                  		<div class="clearfix"></div>
                        </div>
                        <?php } ?>
                    </div>
                 
                 	
                    </div>
                    </div>

    <script src="<?php echo $this->config->base_url();?>assets/js/bootstrap.min.js"></script>

	<script src="<?php echo $this->config->item('web_url');?>js/jquery.validate.js"></script>
   <script type="text/javascript" src="<?php echo $this->config->item('web_url');?>js/editcandidate.js"></script>
<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>js/thickbox.js"></script>