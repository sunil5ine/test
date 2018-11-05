    <!-- page content -->
	<div class="right_col" role="main">
    	<div class="">
                    <div class="page-title">
                    	<?php echo $message; ?>
                        <div class="title_left">
                            <h3>
                               <?php echo $pagehead; ?>
                            </h3>
                        </div>

                        
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Get your Professional CV today!</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php if(count($cvwdata)>0) { ?>
                                    <div style="margin-top: 16px;" class="alert alert-warning"><button data-dismiss="alert" class="close" type="button">x</button>  Already registered for the CV writing service! If you proceed again it will only considered as a new request.</div>
                                    <?php } ?>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    	Our CV Writing Service will ensure that your CV showcases your skills and your qualities, your knowledge and your abilities. Get our experts to write your resume using the right keywords to highlight your career goals and achievements in an effective structure and crisp formatting to make your resume stand out.
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5">
                                    <a href="<?php echo $this->config->base_url('cvwriting/questionnaire'); ?>"><button type="button" class="btn btn-success"  tabindex="16">Proceed</button></a>
                                </div>
                            </div>
                    	</div>
                        <br />
                        <br />
                        <br />

                    </div>
                </div>
    	<!-- footer content -->
    	<?php echo $footer_nav; ?>
        <!-- /footer content -->
    </div>
    <!-- /page content -->