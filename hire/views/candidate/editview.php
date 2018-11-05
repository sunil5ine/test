	
    <!-- page content -->
	<div class="right_col" role="main">
    	<div class="">
                    <div class="page-title">
                    	<?php echo $message; ?>
                        <div class="title_left">
                            <h3>
                               <?php echo $pagehead; ?>
                                <!--<small>
                                    Some examples to get you started
                                </small>-->
                            </h3>
                        </div>

                        
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
						<form class="form-horizontal form-label-left input_mask" action="<?php echo base_url(); ?>Candidate/Update/<?php echo $formdata['canid']; ?>" method="post" data-toggle="validator" role="form">
                        <div class="col-md-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Basic Informations <!--<small>different form elements</small>--></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                    <input name="canid" id="canid" type="hidden" value="<?php echo $formdata['canid']; ?>" />
										<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control  has-feedback-left" placeholder="First Name" value="<?php echo $formdata['firstname']; ?>" name="firstname" id="firstname" required >
                                            <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control" placeholder="Last Name" value="<?php echo $formdata['lastname']; ?>" name="lastname" id="lastname" required >
                                            <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                        </div>
                                        
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <input type="email" class="form-control has-feedback-left" placeholder="E-mail ID" name="emailid" value="<?php echo $formdata['emailid']; ?>" id="emailid" required>
                                            <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        
                                        <div class="col-md-2 col-sm-2 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control" placeholder="Code" value="<?php echo $formdata['cntrycode']; ?>"  name="cntrycode" id="cntrycode" required >
                                            
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                            				<input type="text" class="form-control" placeholder="Contact Number" value="<?php echo $formdata['phone']; ?>" name="phone" id="phone" required >
                                            <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                        </div>
                                        
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <input type="password" class="form-control has-feedback-left" placeholder="Password" value="<?php echo $formdata['usrpwd']; ?>" name="usrpwd" id="usrpwd" required >
                                            <span class="fa fa-lock form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <input type="password" class="form-control" placeholder="Re-Password" value="<?php echo $formdata['repwd']; ?>" name="repwd" id="repwd" required >
                                            <span class="fa fa-lock form-control-feedback right" aria-hidden="true"></span>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <input autocomplete="off" type="text" class="form-control has-feedback-left" value="<?php echo ($formdata['dob']!=0)?date("d-m-Y", strtotime($formdata['dob'])):''; ?>" data-provide="datepicker" placeholder="Date of Birth (dd-mm-yyyy)" name="dob" id="dob" required>
                                            <span class="fa fa-calendar form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <select name="gender" id="gender" class="form-control has-feedback-left" required>
                                              <option disabled selected>Gender</option>
                                              <option <?php echo ($formdata['gender']=="Male")?'selected':''; ?> value="Male">Male</option>
                                              <option <?php echo ($formdata['gender']=="Female")?'selected':''; ?> value="Female">Female</option>
                                           </select>
                                            <span class="fa fa-female form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        
                                        <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                                            <?php echo form_dropdown('edu',$edu_list,$formdata['edu'],'id="edu" class=" form-control has-feedback-left" tabindex="1" required');?>
                                            <span class="fa fa-book form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                            <?php echo form_dropdown('nation',$country_list,$formdata['nation'],'id="nation" class=" form-control has-feedback-left" tabindex="1" required');?>
                                            <span class="fa fa-flag form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <select name="totexp" id="totexp" class="form-control has-feedback-left" required>
                                              <option disabled selected>Total Exp</option>
                                              <option <?php echo ($formdata['totexp']=="Fresher")?'selected':''; ?> value="Fresher">Fresher</option>
                                              <option <?php echo ($formdata['totexp']=="00")?'selected':''; ?> value="00">0</option>
                                              <option <?php echo ($formdata['totexp']=="01")?'selected':''; ?> value="01">1</option>

                                              <option <?php echo ($formdata['totexp']=="02")?'selected':''; ?> value="02">2</option>
                                              <option <?php echo ($formdata['totexp']=="03")?'selected':''; ?> value="03">3</option>
                                              <option <?php echo ($formdata['totexp']=="04")?'selected':''; ?> value="04">4</option>
                                              <option <?php echo ($formdata['totexp']=="05")?'selected':''; ?> value="05">5</option>
                                              <option <?php echo ($formdata['totexp']=="06")?'selected':''; ?> value="06">6</option>
                                              <option <?php echo ($formdata['totexp']=="07")?'selected':''; ?> value="07">7</option>
                                              <option <?php echo ($formdata['totexp']=="08")?'selected':''; ?> value="08">8</option>
                                              <option <?php echo ($formdata['totexp']=="09")?'selected':''; ?> value="09">9</option>
                                              <option <?php echo ($formdata['totexp']=="10")?'selected':''; ?> value="10">10</option>
                                              <option <?php echo ($formdata['totexp']=="11")?'selected':''; ?> value="11">11</option>
                                              <option <?php echo ($formdata['totexp']=="12")?'selected':''; ?> value="12">12</option>
                                              <option <?php echo ($formdata['totexp']=="13")?'selected':''; ?> value="13">13</option>
                                              <option <?php echo ($formdata['totexp']=="14")?'selected':''; ?> value="14">14</option>
                                              <option <?php echo ($formdata['totexp']=="15")?'selected':''; ?> value="15">15</option>
                                              <option <?php echo ($formdata['totexp']=="16")?'selected':''; ?> value="16">16</option>
                                              <option <?php echo ($formdata['totexp']=="17")?'selected':''; ?> value="17">17</option>
                                              <option <?php echo ($formdata['totexp']=="18")?'selected':''; ?> value="18">18</option>
                                              <option <?php echo ($formdata['totexp']=="19")?'selected':''; ?> value="19">19</option>
                                              <option <?php echo ($formdata['totexp']=="20")?'selected':''; ?> value="20">20</option>
                                              <option <?php echo ($formdata['totexp']=="21")?'selected':''; ?> value="21">21</option>
                                              <option <?php echo ($formdata['totexp']=="22")?'selected':''; ?> value="22">22</option>
                                              <option <?php echo ($formdata['totexp']=="23")?'selected':''; ?> value="23">23</option>
                                              <option <?php echo ($formdata['totexp']=="24")?'selected':''; ?> value="24">24</option>
                                              <option <?php echo ($formdata['totexp']=="25")?'selected':''; ?> value="25">25</option>
                                              <option <?php echo ($formdata['totexp']=="26")?'selected':''; ?> value="26">26</option>
                                              <option <?php echo ($formdata['totexp']=="27")?'selected':''; ?> value="27">27</option>
                                              <option <?php echo ($formdata['totexp']=="28")?'selected':''; ?> value="28">28</option>
                                              <option <?php echo ($formdata['totexp']=="29")?'selected':''; ?> value="29">29</option>
                                              <option <?php echo ($formdata['totexp']=="30")?'selected':''; ?> value="30">30</option>
                                              <option <?php echo ($formdata['totexp']=="31")?'selected':''; ?> value="31">30+</option>
                                          </select>

                                            <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        
                                        <div class="col-md-5 col-sm-5 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control" placeholder="Current Employer" value="<?php echo $formdata['currcompany']; ?>" name="currcompany" id="currcompany" required>
                                            <span class="fa fa-group form-control-feedback right" aria-hidden="true"></span>
                                        </div>
                                        
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" placeholder="Current Location" value="<?php echo $formdata['currloc']; ?>" name="currloc" id="currloc" required>
                                            <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <?php echo form_dropdown('funarea',$funarea_list,$formdata['funarea'],'id="funarea" class=" form-control has-feedback-left" tabindex="1" required');?>
                                            <span class="fa fa-windows form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" placeholder="Resume Headline" value="<?php echo $formdata['resumehead']; ?>" name="resumehead" id="resumehead" required>
                                            <span class="fa fa-file-text form-control-feedback left" aria-hidden="true"></span>
                                        </div>

                                        <!--<div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="file" class="form-control input_syle" id="fileToUpload" name="fileToUpload" required>
                                            </div>
                                        </div>-->
                                        
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" placeholder="Linkdin" value="<?php echo $formdata['linkurl']; ?>" name="linkurl" id="linkurl" >
                                            <span class="fa fa-linkedin form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" placeholder="Facebook" value="<?php echo $formdata['fburl']; ?>" name="fburl" id="fburl" >
                                            <span class="fa fa-facebook form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" placeholder="Twitter" value="<?php echo $formdata['twurl']; ?>" name="twurl" id="twurl" >
                                            <span class="fa fa-twitter form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        
                                        <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                            <input type="text" class="form-control has-feedback-left" placeholder="Google Plus" value="<?php echo $formdata['gurl']; ?>" name="gurl" id="gurl" >
                                            <span class="fa fa-google-plus form-control-feedback left" aria-hidden="true"></span>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                 <input type="checkbox" name="relocate" id="relocate" value="1" <?php echo ($formdata['relocate']==1)?'checked':''; ?> > Willing to relocate. 
                                            </div>
                                        </div>
                                        
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5">
                                                <button type="submit" class="btn btn-primary">Cancel</button>
                                                <button type="submit" class="btn btn-success">Update</button>
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
		<script type="text/javascript" src="<?php echo $this->config->base_url();?>js/bootstrap-filestyle.js"></script>
    <script type="text/javascript">
	$('#fileToUpload').filestyle({
		buttonName : 'btn-danger'
	});
</script>
<!-- form validation -->
        <script type="text/javascript">
            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form .btn').on('click', function () {
                    $('#demo-form').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });

            $(document).ready(function () {
                $.listen('parsley:field:validate', function () {
                    validateFront();
                });
                $('#demo-form2 .btn').on('click', function () {
                    $('#demo-form2').parsley().validate();
                    validateFront();
                });
                var validateFront = function () {
                    if (true === $('#demo-form2').parsley().isValid()) {
                        $('.bs-callout-info').removeClass('hidden');
                        $('.bs-callout-warning').addClass('hidden');
                    } else {
                        $('.bs-callout-info').addClass('hidden');
                        $('.bs-callout-warning').removeClass('hidden');
                    }
                };
            });
            try {
                hljs.initHighlightingOnLoad();
            } catch (err) {}
        </script>
        <!-- /form validation -->
        <!-- editor -->
        <script>
            $(document).ready(function () {
                $('.xcxc').click(function () {
                    $('#descr').val($('#editor').html());
                });
            });

            $(function () {
                function initToolbarBootstrapBindings() {
                    var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                'Times New Roman', 'Verdana'],
                        fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                    $.each(fonts, function (idx, fontName) {
                        fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
                    });
                    $('a[title]').tooltip({
                        container: 'body'
                    });
                    $('.dropdown-menu input').click(function () {
                            return false;
                        })
                        .change(function () {
                            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                        })
                        .keydown('esc', function () {
                            this.value = '';
                            $(this).change();
                        });

                    $('[data-role=magic-overlay]').each(function () {
                        var overlay = $(this),
                            target = $(overlay.data('target'));
                        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                    });
                    if ("onwebkitspeechchange" in document.createElement("input")) {
                        var editorOffset = $('#editor').offset();
                        $('#voiceBtn').css('position', 'absolute').offset({
                            top: editorOffset.top,
                            left: editorOffset.left + $('#editor').innerWidth() - 35
                        });
                    } else {
                        $('#voiceBtn').hide();
                    }
                };

                function showErrorAlert(reason, detail) {
                    var msg = '';
                    if (reason === 'unsupported-file-type') {
                        msg = "Unsupported format " + detail;
                    } else {
                        console.log("error uploading file", reason, detail);
                    }
                    $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                        '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
                };
                initToolbarBootstrapBindings();
                $('#editor').wysiwyg({
                    fileUploadError: showErrorAlert
                });
                window.prettyPrint && prettyPrint();
            });
        </script>
        <!-- /editor -->     
        <script type="text/javascript">
		$(document).ready(function () {
			// When the document is ready
			$('#dob').daterangepicker({
					singleDatePicker: true,
					format: 'DD-MM-YYYY',
					maxDate: '<?php echo date('d-m-Y'); ?>',
					/*minDate: '06/30/2015',*/
					calender_style: "picker_4"
				}, function (start, end, label) {
					console.log(start.toISOString(), end.toISOString(), label);
				});
			});	
		</script>   
