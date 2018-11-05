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
                                    <h2>Get your profile Verified!</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <?php if(count($prdata)>0) { ?>
                                    <div style="margin-top: 16px;" class="alert alert-warning"><button data-dismiss="alert" class="close" type="button">x</button>  Already registered for the Psychometric Test service! If you proceed again it will only considered as a new request.</div>
                                    <?php } ?>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    	The ability and aptitude tests give an employer an overall snapshot of an applicant’s ability and intelligence via numerical, logical and abstract testing whilst the personality test gives an idea of how the candidates deal with certain situations.

Within these tests, employer gets an idea of the candidate’s abilities, of how they work in given situations, what their strengths and weaknesses are, what makes them tick and how they prefer to work in given situations, how they work under pressure, and how they work alone or as part of a team.
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5">
                                    <a href="<?php echo $this->config->base_url('psychotest/plans'); ?>"><button type="button" class="btn btn-success"  tabindex="16">Proceed</button></a>
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