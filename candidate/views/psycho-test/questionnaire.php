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
						<form class="form-horizontal form-label-left input_mask" id="qnfrm" name="qnfrm" action="<?php echo base_url('cvwriting/questionnaire'); ?>" method="post" enctype="multipart/form-data">
                        <div class="col-md-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>CV Writing</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    	
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                            <label for="qn1">1.	What are your achievements worth adding to your resume?</label> 
                                            <textarea class="form-control" id="qn1" name="qn1" required><?php echo $formdata['qn1']; ?></textarea>
                                            <span id="qn1_validate"></span>
                                        </div>
                                        
                                         <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                            <label for="qn2">2.	How were you able to add value to the operations of your previous employers?</label> 
                                            <textarea class="form-control" id="qn2" name="qn2" required><?php echo $formdata['qn2']; ?></textarea>
                                            <span id="qn2_validate"></span>
                                        </div>

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                            <label for="qn3">3.	What are your technical skills you think can add value to your professional profile?</label> 
                                            <textarea class="form-control" id="qn3" name="qn3" required><?php echo $formdata['qn3']; ?></textarea>
                                            <span id="qn3_validate"></span>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                            <label for="qn4">4.	Explain your professional journey so far?</label> 
                                            <textarea class="form-control" id="qn4" name="qn4" required><?php echo $formdata['qn4']; ?></textarea>
                                            <span id="qn4_validate"></span>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                            <label for="qn5">5.	What are your education qualifications?</label> 
                                            <textarea class="form-control" id="qn5" name="qn5" required><?php echo $formdata['qn5']; ?></textarea>
                                            <span id="qn5_validate"></span>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                            <label for="qn6">6.	Do you have any additional qualifications or training you have attended worth adding to your profile? Provide the same, if any.</label> 
                                            <textarea class="form-control" id="qn6" name="qn6" required><?php echo $formdata['qn6']; ?></textarea>
                                            <span id="qn6_validate"></span>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                            <label for="qn7">7.	What are your technical skills?</label> 
                                            <textarea class="form-control" id="qn7" name="qn7" required><?php echo $formdata['qn7']; ?></textarea>
                                            <span id="qn7_validate"></span>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                            <label for="qn8">8.	What are your personal traits you have acquired over the years as a professional?</label> 
                                            <textarea class="form-control" id="qn8" name="qn8" required><?php echo $formdata['qn8']; ?></textarea>
                                            <span id="qn8_validate"></span>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                            <label for="qn9">9.	What are your career goals?</label> 
                                            <textarea class="form-control" id="qn9" name="qn9" required><?php echo $formdata['qn9']; ?></textarea>
                                            <span id="qn9_validate"></span>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                            <label for="qn10">10.	Where do you want to see yourself over the course of next five years?</label> 
                                            <textarea class="form-control" id="qn10" name="qn10" required><?php echo $formdata['qn10']; ?></textarea>
                                            <span id="qn10_validate"></span>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                            <label for="qn11">11.	What are the interests you have that you think are worth adding to your profile?</label> 
                                            <textarea class="form-control" id="qn11" name="qn11" required><?php echo $formdata['qn11']; ?></textarea>
                                            <span id="qn11_validate"></span>
                                        </div>
                                        <div class="col-md-12 space-top-12">
                                            <label for="resumehead"><span id="fileToUpload_validate"></span></label>
                                            <div class="form-group">
                                                <input type="file" class="form-control input_syle" id="fileToUpload" name="fileToUpload" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5">
                                                <button type="submit" class="btn btn-success"  tabindex="16">Proceed</button>
                                            </div>
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
 <script type="text/javascript" src="<?php echo $this->config->item('web_url');?>web/js/bootstrap-filestyle.js"></script>   
<script type="text/javascript">
$(document).ready(function() {
		$('#fileToUpload').filestyle({
			buttonName : 'btn-danger',
			placeholder : 'Upload your latest CV in word or PDF format'
		});
      $('#usrpwd').tooltip({'trigger':'focus', 'html':'true', 'title': '<b>Password must contain:</b> <br > Atleast 8 characters.'});
      
	  $("#qnfrm").validate({
		 rules: {
			qn1:{
				required: true,
			},
			qn2:{				
				required: true,
			},
			qn3:{
				required: true
			},
            qn4:{
                required: true
            },
            qn5:{
                required: true
            },
            qn6:{
                required: true
            },
            qn7:{
                required: true
            },
            qn8:{
                required: true
            },
            qn9:{
                required: true
            },
            qn10:{
                required: true
            },
            qn11:{
                required: true
            }
		 },
		 messages: {
			qn1:{
				required: 'This field is required'
			},
			qn2:{
				required: 'This field is required'
			},
			qn3:{
				required: 'This field is required'
			},
            qn2:{
                required: 'This field is required'
            },
            qn5:{
                required: 'This field is required'
            },
            qn6:{
                required: 'This field is required'
            },
            qn7:{
                required: 'This field is required'
            },
            qn8:{
                required: 'This field is required'
            },
            qn9:{
                required: 'This field is required'
            },
            qn10:{
                required: 'This field is required'
            },
            qn11:{
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