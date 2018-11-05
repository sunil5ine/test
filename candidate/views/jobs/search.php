<!-- Bootstrap Multi-select -->
<link rel="stylesheet" href="<?php echo $this->config->item('web_url');?>web/dist/css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="<?php echo $this->config->item('web_url');?>web/dist/js/bootstrap-multiselect.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#location').multiselect({
			noneSelectedText: 'Select Location',
			buttonText: function(options, select) {
				//return 'Select Preferred Location';
				 if (options.length == 0) {
					 return 'Select Preferred Location';
				 } else {
					 var selected = 0;
					 options.each(function () {
						 selected += 1;
					 });
					 return 'Selected '+ selected +  ' Location(s)';
				 }
			},
			buttonWidth: '100%'
		});			
	});
</script>
    
<style>
#skill_dummy, #jrole_dummy, #industry_dummy {
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
                        <?php if($this->session->flashdata('errMessage')){ echo $this->session->flashdata('errMessage');} ?>
                        <div class="title_left">
                            <h3>
                               <?php echo $pagehead; ?>
                            </h3>
                        </div>

                        
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <form name="jobfrm" id="jobfrm" action="<?php echo base_url(); ?>Jobs/SearchResult" method="post">
                        <div class="col-md-8 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Advance Search</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <br />										
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                 <input type="text" tabindex="1" class="form-control has-feedback-left" id="jtitle" name="jtitle" placeholder="Job Title - ex: Sr PHP Developer with 2Yr exp" value="">
                                                <span class="fa fa-briefcase form-control-feedback left" aria-hidden="true"></span>
                                                <span id="jtitle_validate"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <select name="location[]" id="location" class="form-control has-feedback-left" tabindex="2" multiple="multiple"  placeholder="Location" >
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="India">India</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                </select> 
                                                <span class="fa fa-flag form-control-feedback left" aria-hidden="true"></span>
                                                <span id="location_validate"></span>
                                            </div>
    
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <select name="jobtype" id="jobtype" class="form-control has-feedback-left"  tabindex="3">                                                
                                                    <option value="" selected="selected">Job Type</option>
                                                    <option value="Full Time">Full Time</option>
                                                    <option value="Part Time">Part Time</option>
                                                    <option value="Freelance">Freelance</option>
                                                    <option value="Temporary">Temporary</option>
                                                </select>
                                                <span class="fa fa-anchor form-control-feedback left" aria-hidden="true"></span>
                                                <span id="jobtype_validate"></span>
                                            </div>
                                        </div>                                        
                                        
                                        <div class="row">
                                            <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                                <?php echo form_dropdown('minexp',$minexp_list,'','id="minexp" class=" form-control has-feedback-left" tabindex="4" ');?>
                                                <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="minexp_validate"></span>
                                            </div>
                                            <div class="col-md-3 col-sm-3 col-xs-12 form-group has-feedback">
                                                <?php echo form_dropdown('maxexp',$maxexp_list,'','id="maxexp" class=" form-control has-feedback-left" tabindex="5" ');?>
                                                <span class="fa fa-clock-o form-control-feedback left" aria-hidden="true"></span>
                                                <span id="maxexp_validate"></span>
                                            </div>
                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <?php echo form_dropdown('monsal',$monsal_list,'','id="monsal" class=" form-control has-feedback-left" tabindex="7" ');?>
                                                <span class="fa fa-usd form-control-feedback left" aria-hidden="true"></span>
                                                <span id="monsal_validate"></span>
                                            </div> 
                                        </div>                                       
                                        
                                        <div class="row">
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <?php echo form_dropdown('farea',$funarea_list,'','id="farea" class=" form-control has-feedback-left" tabindex="8" ');?>
                                                <span class="fa fa-windows form-control-feedback left" aria-hidden="true"></span>
                                                <span id="farea_validate"></span>
                                            </div>
                                            
                                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                                <?php echo form_dropdown('edu',$edu_list,'','id="edu" class=" form-control has-feedback-left" tabindex="9" ');?>
                                                <span class="fa fa-graduation-cap form-control-feedback left" aria-hidden="true"></span>
                                                <span id="edu_validate"></span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                <label><i class="fa fa-sitemap"></i> Industry:</label>
                                                <label for="industry_dummy"> <span id="industry_dummy_validate"></span></label>
                                                <input id="industry" type="text" class="tags" name="industry" value="" >
                                                <input id="industry_dummy" name="industry_dummy" type="text" />
                                            </div>
                                        </div>
                                                                                
                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                <label><i class="fa fa-group"></i> Job Role:</label>
                                                <label for="jrole_dummy"> <span id="jrole_dummy_validate"></span></label>
                                                <input id="jrole" type="text" class="tags" name="jrole" value="" >
                                                <input id="jrole_dummy" name="jrole_dummy" type="text" />
                                            </div>
                                        </div> 

                                        <div class="row">
                                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                                <label><i class="fa fa-tags"></i> Skills: [<em>*only required for IT Jobs</em>]</label>
                                                <label for="skill_dummy"> <span id="skill_dummy_validate"></span></label>
                                                <input id="skillval" type="text" class="tags" name="skillval" value="" >
                                                <input id="skill_dummy" name="skill_dummy" type="text" />
                                            </div>   
                                        </div>
                                        
                                        
                                        
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Latest Jobs</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                        <!-- Right column -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="ln_solid"></div>
                                
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5">
                                    <button type="submit" class="btn btn-success"  tabindex="16">Search Jobs</button>
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
    
    <!--<script type="text/javascript" src="<?php //echo $this->config->item('web_url');?>web/js/jobs.js"></script>-->
        <script>
            $(document).ready(function () {
               
                $(".select2_multiple").select2({
                    maximumSelectionLength: 4,
                    placeholder: "With Max Selection limit 4",
                    allowClear: true,
					tags: true
                });
				
				$(".industry").select2({
                    maximumSelectionLength: 4,
                    placeholder: "With Max Selection limit 4",
                    allowClear: true,
                });
				
				$(".industry").select2({
                    maximumSelectionLength: 4,
                    placeholder: "With Max Selection limit 4",
                    allowClear: true,
                });
				
            });
        </script>
        
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
            'defaultText':'add industry ',
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