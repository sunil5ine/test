    <!-- page content -->
	<div class="right_col" role="main">
    	<div class="">
                    <div class="page-title">
                    	<?php echo $message; ?>
                        <div class="title_left">
                            <h3>
                               <?php //echo $pagehead; ?>
                            </h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
						<form class="form-horizontal form-label-left input_mask" id="prfrm" name="prfrm" method="post">
                        <div class="col-md-12 col-xs-12 pricing-plans">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Psychometric Test</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content plans">
                                    <br />
                                    	
                                        <div class="col-md-4 col-sm-12 col-xs-12 form-group plan-item">
                                            <h3>General Aptitude Test</h3> 
                                            <p>General Aptitude Test is specially designed to cater to th elevel of aptitude that an employee would be expected to posses in any kind of job role. The test will help you measure Reasoning Skills, Numerical Ability, Verbal Ability and Data Analysis skills.</p>
                                            <p><strong>Test Price : $10.00</strong></p>
                                            <a href="<?php echo base_url().'psychotest/choose_plan'.'/1'; ?>"><button type="button" class="btn btn-success"  tabindex="16">Pay & Take the Test</button></a>
                                        </div>
                                        
                                          <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                            <h3>Job Specific Psychometric Test</h3>
                                            <p>This assessment helps organizations in identifying a leader's strengths and develop breakthrough leadership by mapping it to four functions critical to leadership. This assessment helps in identifying the dominant leadership style of a person, for determining the fitment for a role or organization.</p>
                                            <p><strong>Test Price : $20.00</strong></p>
                                            <a href="<?php echo base_url().'psychotest/choose_plan'.'/2'; ?>"><button type="button" class="btn btn-success"  tabindex="16">Pay & Take the Test</button></a>
                                        </div>                              
                                </div>
                            </div>
                        </div>                        
                        </form>
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
<script type="text/javascript">
$(document).ready(function() {
		
	  $("#qnfrm").validate({
		 rules: {
			qn1:{
				required: true,
			}
		 },
		 messages: {
			qn1:{
				required: 'This field is required'
			}
		 },
		  errorPlacement : function(error, element) {
			     //$('#ErrAlert').append(error);
            var name = $(element).attr("name");
            error.appendTo($("#" + name + "_validate"));
      },
      success: function (label, element) {
			  label.parent().removeClass('error');
    		label.remove();  
      },
	});
	
});
</script> 