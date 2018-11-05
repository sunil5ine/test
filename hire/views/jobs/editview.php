<style>
#skill_dummy, #jrole_dummy, #industry_dummy{
    visibility: hidden!Important;
    height:1px;
    width:1px;
}
</style>	
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
						<!--<form class="form-horizontal form-label-left input_mask" action="<?php //echo base_url(); ?>Jobs/Update/<?php //echo $formdata['jobid']; ?>" method="post">-->
						<form name="jobfrm" id="jobfrm" action="<?php echo base_url(); ?>Jobs/Update/<?php echo $formdata['job_url_id']; ?>" method="post">
                        <div class="col-md-8 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Basic Information <!--<small>different form elements</small>--></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />
                                        <input name="job_id" id="job_id" type="hidden" value="<?php echo $formdata['jobid']; ?>" />
                                        <input name="jobid" id="jobid" type="hidden" value="<?php echo $formdata['job_url_id']; ?>" />
										<div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                 <input type="text" class="form-control  has-feedback-left" id="jtitle" name="jtitle" placeholder="Job Title - ex: Sr PHP Developer with 2Yr exp" value="<?php echo $formdata['jtitle']; ?>">
                                                <span class="fa fa-briefcase form-control-feedback left" aria-hidden="true"></span>
                                                <span id="jtitle_validate"></span>
                                            </div>
                                       </div> 
                                       <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                <!-- <input type="text" class="form-control  has-feedback-left" id="location" name="location" placeholder="Job Location" value="<?php //echo $formdata['location']; ?>"> -->
                                                <?php echo form_dropdown('location',$country_list,$formdata['location'],'id="location" class=" form-control has-feedback-left" tabindex="2" ');?>
                                                <span class="fa fa-flag form-control-feedback left" aria-hidden="true"></span>
                                                <span id="location_validate"></span>
                                            </div>
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                <select name="jobtype" id="jobtype" class="form-control has-feedback-left"  tabindex="3">                                                <option value="">Job Type</option>
                                                    <option value="Full Time" <?php echo ($formdata['jobtype'] == "Full Time")?'selected':''; ?>>Full Time</option>
                                                    <option value="Part Time" <?php echo ($formdata['jobtype'] == "Part Time")?'selected':''; ?>>Part Time</option>
                                                    <option value="Freelance" <?php echo ($formdata['jobtype'] == "Freelance")?'selected':''; ?>>Freelance</option>
                                                    <option value="Temporary" <?php echo ($formdata['jobtype'] == "Temporary")?'selected':''; ?>>Temporary</option>
                                                </select>
                                                <span class="fa fa-anchor form-control-feedback left" aria-hidden="true"></span>
                                                <span id="jobtype_validate"></span>
                                            </div>                              
                                        </div>

                                        <div class="row">
                                            <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                                <?php echo form_dropdown('minexp',$minexp_list,$formdata['minexp'],'id="minexp" class=" form-control has-feedback-left" tabindex="1" ');?>
                                                <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="minexp_validate"></span>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                                <?php echo form_dropdown('maxexp',$maxexp_list,$formdata['maxexp'],'id="maxexp" class=" form-control has-feedback-left" tabindex="1" ');?>
                                                <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="maxexp_validate"></span>
                                            </div>
                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <?php echo form_dropdown('monsal',$monsal_list,$formdata['monsal'],'id="monsal" class=" form-control has-feedback-left" tabindex="7" ');?>
                                                <span class="fa fa-usd form-control-feedback left" aria-hidden="true"></span>
                                                <span id="monsal_validate"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                            <?php echo form_dropdown('farea',$funarea_list,$formdata['farea'],'id="farea" class=" form-control has-feedback-left" tabindex="1" ');?>
                                            <span class="fa fa-windows form-control-feedback left" aria-hidden="true"></span>
                                            <span id="farea_validate"></span>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
											<?php echo form_dropdown('edu',$edu_list,$formdata['edu'],'id="edu" class=" form-control has-feedback-left" tabindex="1" ');?>
                                            <span class="fa fa-graduation-cap form-control-feedback left" aria-hidden="true"></span>
                                            <span id="edu_validate"></span>
                                        </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                <label><i class="fa fa-sitemap"></i> Industry:</label>
                                                <label for="industry_dummy"> <span id="industry_dummy_validate"></span></label>
                                                <?php //echo form_dropdown('industry[]',$ind_list,$formdata['industry'],'id="industry" class="select2_multiple form-control" multiple="multiple" tabindex="1" ');?>
                                                <input id="industry" type="text" class="tags" name="industry" value="<?php echo $formdata['industry']; ?>" >
                                                <input id="industry_dummy" name="industry_dummy" type="text" /><!-- dummy text field -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                <label><i class="fa fa-group"></i> Job Role:</label>
                                                <label for="jrole_dummy"> <span id="jrole_dummy_validate"></span></label>
                                                <?php //echo form_dropdown('jrole[]',$jrole_list,$formdata['jrole'],'id="jrole" class="select2_multiple form-control" multiple="multiple" tabindex="1" ');?>
                                                <input id="jrole" type="text" class="tags" name="jrole" value="<?php echo $formdata['jrole']; ?>" >
                                                <input id="jrole_dummy" name="jrole_dummy" type="text" /><!-- dummy text field -->
                                            </div>
                                        </div>                                        

                                        <!-- <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <label><i class="fa fa-tags"></i> Skills:</label> 
                                                 <?php //echo form_dropdown('skill[]',$skill_list,$formdata['skill'],'id="skill" class="select2_multiple form-control" multiple="multiple" tabindex="1" ');?>
                                                
                                            </div>
                                        </div> -->  

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                <label><i class="fa fa-tags"></i> Skills: [<em>*Mandatory only for IT jobs</em>]</label>
                                                <label for="skill_dummy"> <span id="skill_dummy_validate"></span></label>
                                                <input id="skillval" type="text" class="tags" name="skillval" value="<?php echo $formdata['skillval']; ?>" required >
                                                <input id="skill_dummy" name="skill_dummy" type="text" /><!-- dummy text field -->
                                            </div>   
                                        </div>
                                        
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Job Settings <!--<small>different form elements</small>--></h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
										 <div class="row">
                                         	<p><strong>Hiring For : </strong> <label class="pull-right"><input type="checkbox" name="hire4" id="hire4" value="1"> Set as Confidential</label></p>
                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                <input type="text" class="form-control has-feedback-left" id="hcompany" name="hcompany" placeholder="Hiring For" value="<?php echo $formdata['hcompany']; ?>">
                                                <span class="fa fa-building form-control-feedback left" aria-hidden="true"></span>
                                            </div>
                                        </div> 
                                        <!--<input type="hidden" id="hcompany" name="hcompany" value="Hiring For :- Self">-->
                                        <div class="row">
                                        	<p><strong>Send Notifications to : </strong></p>
                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                 <input type="text" class="form-control has-feedback-left" id="notifyemail" name="notifyemail" placeholder="Enter Email ID"  value="<?php echo $formdata['notifyemail']; ?>">
                                                 <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                                                 <span id="notifyemail_validate"></span>
                                                 <i>Email id where the notifications are to be sent when a candidate applies for this job. Leave blank if you do not want any notifications</i>
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="jobsite" id="jobsite" value="1">
                                        <!-- <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                 <input type="checkbox" name="jobsite" id="jobsite" value="1" checked> Publish on Company Career Site? 
                                            </div>
                                        </div> -->
                                        
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                 <textarea class="form-control" placeholder="Notes" name="jobnotes" id="jobnotes"><?php echo $formdata['jobnotes']; ?></textarea> 
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Job Description</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <textarea class="form-control" placeholder="Job Description" name="jobdesc" id="jobdesc" ><?php echo $formdata['jobdesc']; ?></textarea>
                                Please do not enter any contact email, phone or URL in the description to avoid job being rejected by the Job portals!
                            </div>
                            
                            <div class="ln_solid"></div>
                                
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5">
                                    <button type="reset" class="btn btn-primary"  tabindex="17">Cancel</button>
                                    <button type="submit" class="btn btn-success"  tabindex="16">Submit</button>
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
    <script type="text/javascript" src="<?php echo $this->config->base_url()?>ckeditor/ckeditor.js"></script>
    <script type="text/javascript" src="<?php echo $this->config->item('web_url');?>web/js/jobs.js"></script>
	<script type="text/javascript">
    CKEDITOR.replace( 'jobdesc' );
    </script>
        <!-- editor -->
        <script>
            $(document).ready(function () {
                $('.xcxc').click(function () {
                    $('#desc').val($('#editor').html());
                });
				
				$('#hire4').click(function () {
					if (!$('#hire4').is(':checked')) {
						$('#hcompany').val('<?php echo $this->session->userdata('hirename'); ?>');
					}
					else{						
						$('#hcompany').val('Confidential');
					}
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

    function onAddTag(tag) {
        alert("Added a tag: " + tag);
    }
    function onRemoveTag(tag) {
        alert("Removed a tag: " + tag);
    }

    function onChangeTag(input,tag) {
        alert("Changed a tag: " + tag);
    }

    $(function() {
        //$('#skillval').tagsInput({width:'auto',defaultText:'add a skill'});         

        // Uncomment this line to see the callback functions in action
        //          $('input.tags').tagsInput({onAddTag:onAddTag,onRemoveTag:onRemoveTag,onChange: onChangeTag});

        // Uncomment this line to see an input with no interface for adding new tags.
        //          $('input.tags').tagsInput({interactive:false});
        
        //var tags_array = ["lorem", "ipsum", "dolar", "sit", "amet"];
        $("#skillval").tagsInput({
            'defaultText':'add a skill',
            'width':'auto',
            'autocomplete_url': '',
            'autocomplete' :{
                'source': function (request, response) {
                    $.ajax({
                        url: "<?php echo $this->config->base_url();?>jobs/skilllist",
                        type: "POST",
                        data: {
                            "term": request.term
                        },
                        success: function (data) {
                            response($.map(JSON.parse(data), function (items) {
                                return {
                                    value: items.skillarea_display,
                                    label: items.skillarea_display
                                }
                            }));

                        },
                        error: function (error) {}
                    });
                }
            }
        });

        $("#jrole").tagsInput({
            'defaultText':'add a role',
            'width':'auto',
            'autocomplete_url': '',
            'autocomplete' :{
                'source': function (request, response) {
                    $.ajax({
                        url: "<?php echo $this->config->base_url();?>jobs/jrolelist",
                        type: "POST",
                        data: {
                            "term": request.term
                        },
                        success: function (data) {
                            response($.map(JSON.parse(data), function (items) {
                                return {
                                    value: items.jrole_display,
                                    label: items.jrole_display
                                }
                            }));

                        },
                        error: function (error) {}
                    });
                }
            }
        });

        $("#industry").tagsInput({
            'defaultText':'add industry',
            'width':'auto',
            'autocomplete_url': '',
            'autocomplete' :{
                'source': function (request, response) {
                    $.ajax({
                        url: "<?php echo $this->config->base_url();?>jobs/industrylist",
                        type: "POST",
                        data: {
                            "term": request.term
                        },
                        success: function (data) {
                            response($.map(JSON.parse(data), function (items) {
                                return {
                                    value: items.ind_display,
                                    label: items.ind_display
                                }
                            }));

                        },
                        error: function (error) {}
                    });
                }
            }
        });

    });

</script> 
        