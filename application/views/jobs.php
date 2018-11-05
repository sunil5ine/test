	<!-- Bootstrap Datatable -->
    <script src="<?php echo $this->config->base_url();?>web/js/jquery.dataTables.min.js"></script>
	<link href="<?php echo $this->config->base_url();?>web/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Bootstrap Multi-select -->
    <link rel="stylesheet" href="<?php echo $this->config->base_url();?>web/dist/css/bootstrap-multiselect.css" type="text/css">
	<script type="text/javascript" src="<?php echo $this->config->base_url();?>web/dist/js/bootstrap-multiselect.js"></script>
    <script type="text/javascript">
		$(document).ready(function() {
			$('#location').multiselect({
				nonSelectedText: 'Select Preferred Location',
				/*buttonText: function(options, select) {
					return 'Select Preferred Location';
					 if (options.length == 0) {
						 return 'Select Preferred Location';
					 } else {
						 var selected = 0;
						 options.each(function () {
							 selected += 1;
						 });
						 return 'Selected '+ selected +  ' Location(s)';
					 }
				},*/
				buttonWidth: '100%',
				onChange: function(element, checked) {
					var loc = $('#location option:selected');
					var selected = [];
					$(loc).each(function(index, loc){
						selected.push([$(this).val()]);
					});
			
					//console.log(selected);
				}
			});			
		});
	</script>
    <style>
		#joblist_paginate{
			margin: 0px 10px 0;
		}
		.dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
			color: #333 !important;
		}
		.dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
			color: #333 !important;
		}
		.dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
			color: #000 !important;
			font-weight:bold;
		}
		.paginate_button {
			background-image: linear-gradient(to bottom, #fed136 0px, #eaa938 100%) !important;
			background-repeat: repeat-x !important;
			border-color: #fed136 !important;
			color: #333 !important;
		}
		ul.tsc_pagination li a
		{
			border:solid 1px;
			border-radius:3px;
			-moz-border-radius:3px;
			-webkit-border-radius:3px;
			padding:6px 9px 6px 9px;
		}
		ul.tsc_pagination li
		{
			padding-bottom:1px;
		}
		ul.tsc_pagination li a:hover,
		ul.tsc_pagination li a.current
		{
			color:#FFFFFF;
			box-shadow:0px 1px #EDEDED;
			-moz-box-shadow:0px 1px #EDEDED;
			-webkit-box-shadow:0px 1px #EDEDED;
		}
	
		ul.tsc_pagination
		{
			margin:4px 0;
			padding:0px;
			height:100%;
			overflow:hidden;
			font-size:12px;
			list-style-type:none;
		}
	
		ul.tsc_pagination li
		{
			float:left;
			margin:0px;
			padding:0px;
			margin-left:5px;
		}
		ul.tsc_pagination li a
		{
			color:black;
			display:block;
			text-decoration:none;
			padding:7px 10px 7px 10px;
		}
		ul.tsc_pagination li a img
		{
			border:none;
		}
		ul.tsc_pagination li a
		{
			color:#0A7EC5;
			border-color:#8DC5E6;
			background:#F8FCFF;
		}
		ul.tsc_pagination li a:hover,
		ul.tsc_pagination li a.current
		{
			text-shadow:0px 1px #388DBE;
			border-color:#3390CA;
			background:#58B0E7;
			background:-moz-linear-gradient(top, #B4F6FF 1px, #63D0FE 1px, #58B0E7);
			background:-webkit-gradient(linear, 0 0, 0 100%, color-stop(0.02, #B4F6FF), color-stop(0.02, #63D0FE), color-stop(1, #58B0E7));
		}
		.dataTables_wrapper table thead{
			display:none;
		}
	
		#jobdetails {
			padding:0px;
			margin:0px;	
		}
		#jobdetails h3 a {
		 	color:#008540;
		 	text-decoration:underline;	
		}
		#jobdetails h3 a:hover {
		 	color:#c12e2a;
		 	text-decoration:underline;	
		}
		div.dataTables_wrapper div.dataTables_filter label {
			margin-right: 23px;
		}		
		.input-group .btn-group > .btn:first-child {
			margin-left: 0;
			text-align: left;
			width: 100%;
		}
		.btn-group {
			width: 100%;
		}
		.multiselect-container > ul {
			 width: 100%;
		}
		.multiselect-container > li > a > label.radio, .multiselect-container > li > a > label.checkbox {
			color: #000;
		}
		.multiselect{
			width:100%;	
		}
	</style>
    
    <section id="candjobs">
        <div class="container">
            <div class="row">
            	<div class="col-md-12">
                    <?php if(isset($status) && $status=='success') { echo $message; } if(isset($status) && $status=='fail') { echo $message; } ?>
                    <div class="x_panel">
                        <div class="x_title">
                        	<h2>Find Your Future Job</h2>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding:20px 10px 20px 10px; background:#C5C5C5; margin-bottom:20px;">
                                    <form name="jobfrm" action="<?php echo $this->config->base_url();?>Jobs/?p=Search" method="post" id="jobfrm">
                                        <div class="form-group row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 space-top-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                                                        <input class="form-control" placeholder="Job Title, Keyword" value="<?php echo $formdata['jtitle']; ?>" name="jtitle" id="jtitle" tabindex="1" type="text">
                                                    </div>    
                                                    <span id="jtitle_validate"></span>                      
                                                </div>
                                                
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 space-top-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-map-marker"></i></span>
                                                        <select name="location[]" id="location" class="form-control has-feedback-left" tabindex="2" multiple="multiple"  placeholder="Location" >
                                                            <option value="Bahrain">Bahrain</option>
                                                            <option value="India">India</option>
                                                            <option value="Kuwait">Kuwait</option>
                                                            <option value="Oman">Oman</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="United Arab Emirates">United Arab Emirates</option>
                                                        </select> 
                                                    </div>
                                                    <span id="location_validate"></span>                        
                                                </div>                                            
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 space-top-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                        <?php echo form_dropdown('minexp',$minexp_list,$formdata['minexp'],'id="minexp" class=" form-control has-feedback-left" tabindex="3" ');?>
                                                    </div>
                                                    <span id="minexp_validate"></span>                        
                                                </div>
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 space-top-12">
                                                    <div class="input-group">
                                                        <span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
                                                        <?php echo form_dropdown('maxexp',$maxexp_list,$formdata['maxexp'],'id="maxexp" class=" form-control has-feedback-left" tabindex="4" ');?>
                                                    </div>
                                                    <span id="maxexp_validate"></span>                        
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 space-top-12">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  space-top-12 text-center">
                                                    <button type="submit" name="submit" tabindex="5" value="Search" class="btn btn-danger pull-right"><i class="fa fa-search"></i> Search Job</button>
                                                </div>
                                            </div>
                                        
                                        </div>
                                        
                                    </form>
                                    </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <table id="joblist" class="table table-striped responsive-utilities jambo_table">
                                <thead>
                                    <tr class="bg-olive">
                                        <th data-sortable="false"></th>
                                        <th data-sortable="false" width="95%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                	<?php $this->load->model('jobportalmodel'); ?>
									<?php if(!empty($records)) { $x=0; foreach ($records as $result) { $x++; ?>
                                        <?php
											if($x%2 == 0) {
												$tdcls = 'even pointer';
											} else {
												$tdcls = 'odd pointer';
											}
									?>
                                    <tr class="<?php echo $tdcls; ?>">
                                        <td class=" " width="1%">
                                        </td>
                                        <td class=" " width="95%">
                                        <div class="col-md-12 col-sm-12 col-xs-12" id="jobdetails">
                                            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                                                <h3><a href="<?php echo $this->config->base_url().'JobDetails/'.$result->job_url_id.'/?js=5&source=cherryhire';?>"><?php echo $x.'. '.$result->job_title;?> [<?php echo $this->jobportalmodel->formatedjobid($result->job_id); ?>]</a></h3>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 space-top-12"><i class="fa fa-map-marker"></i> <strong>Location :</strong> <?php echo $result->job_location;?></div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 space-top-12"><i class="fa fa-sitemap"></i> <strong>Functional area :</strong> <?php echo $result->jfun_display;?></div>
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 space-top-12"><i class="fa fa-clock-o"></i> <strong>Experience :</strong> <?php if(($result->maxexp-1) == 0) { echo 'Fresher'; } else { echo ($result->minexp-1).' ~ '.($result->maxexp-1).' Yrs'; }?> </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 space-top-12"><i class="fa fa-usd"></i> <strong>Monthly Salary :</strong> <?php if($result->job_min_sal == 0 && $result->job_max_sal == 0) { echo 'Unspecified'; } else { echo '$'.$result->job_min_sal.' ~ $'.$result->job_max_sal; } ?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 space-top-12"><i class="fa fa-book"></i> <strong>Education :</strong> <?php echo $result->deg_type_display;?></div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 space-top-12"><i class="fa fa-anchor"></i> <strong>Industry :</strong> <?php echo ($result->job_industry)?$result->job_industry:'Not Specified';?></div>
                                                </div>
                                                <?php if($result->job_skills != '') { ?>
                                                <div class="row">
                                                    <div class="col-md-12 col-sm-12 col-xs-12 space-top-12"><i class="fa fa-tags"></i> <strong>Skills required :</strong> <?php echo $result->job_skills;?></div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 space-top-12">
                                                <?php if($result->job_applycount > 0) { ?>
                                                <label class="alert alert-success pull-right space-top-55" style="font-size:11px;">Already Applied!</label>
                                                <?php } else { ?>	
                                                <a title="Apply" href="<?php echo $this->config->base_url().'JobDetails/'.$result->job_url_id.'/?js=5&source=cherryhire';?>"><button class="btn btn-success pull-right space-top-55"><i class="fa fa-share"></i> Apply Now</button></a>
                                                <?php } ?>
                                            </div>
                                            
                                        </div>										
                                        
                                        </td>
                                    </tr>
                                    <?php  } }?>
                                </tbody>
    
                            </table>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                 </div> 
                <div class="clearfix"></div>
 	  	   </div>
           
        </div>
    </section>
    
    <script>
		var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#joblist').dataTable({
                    "oLanguage": {
                        "sSearch": "Quick Search:"
                    },
                    "aoColumnDefs": [
						{ "aTargets": [ 0 ], "bSortable": false },
						{ "aTargets": [ 1 ], "bSortable": false }
					],
					"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        			"iDisplayLength": 25,
                    "sPaginationType": "full_numbers",
                    
                });
                $("tfoot input").keyup(function () {
                    /* Filter on the column based on the index of this element's parent <th> */
                    oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
                });
                $("tfoot input").each(function (i) {
                    asInitVals[i] = this.value;
                });
                $("tfoot input").focus(function () {
                    if (this.className == "search_init") {
                        this.className = "";
                        this.value = "";
                    }
                });
                $("tfoot input").blur(function (i) {
                    if (this.value == "") {
                        this.className = "search_init";
                        this.value = asInitVals[$("tfoot input").index(this)];
                    }
                });
            });
	</script>