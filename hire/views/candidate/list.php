	<!-- page content -->
	<div class="right_col" role="main">
    	<div class="">
                    <div class="page-title">
                    	<?php echo $message; ?>
                        <!--<div class="title_left">
                            <h3>
                               <?php //echo $pagehead; ?>
                            </h3>
                        </div>-->

                        <!--<div class="title_right">
                            <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                                </div>
                            </div>
                        </div>-->
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $pagehead; ?></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <!--<li><a href="#"><i class="fa fa-chevron-up"></i></a> </li>-->
                                        <li>
                                            <a title="Add New Job" href="<?php echo $this->config->base_url();?>Candidate/Add"><button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-plus-circle"></i> Add New Candidate</button></a>
                                        </li>
                                        <!--<li><a href="#"><i class="fa fa-close"></i></a> </li>-->
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table id="mechantlist" class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="bg-olive">
                                                <th data-sortable="false"></th>
                                                <th data-sortable="false"></th>
                                                <th data-sortable="false"></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php if(!empty($records)) { $x=0; foreach ($records as $result) { $x++; ?>
                                        <?php
											if($x%2 == 0)
											{
												$tdcls = 'even pointer';
											}
											else
											{
												$tdcls = 'odd pointer';
											}
										?>
                                            <tr class="<?php echo $tdcls; ?>">
                                                <td class=" " width="1%">
                                                </td>
                                                <td class=" " width="75%">
												<div class="col-md-12 col-sm-12 col-xs-12">
                                                	<h2><a href="<?php echo $this->config->base_url();?>Candidate/ViewDetails/<?php echo $result->can_id;?>" target="_blank"><?php echo $result->can_fname.' '.$result->can_lname;?></a></h2>
                                                	<div class="row form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-envelope"></i> <?php echo $result->can_email;?></div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-mobile"></i> <?php echo $result->can_ccode.'-'.$result->can_phone;?></div>
                                                    </div>
                                                    
                                                    <div class="row form-group">
                                                        <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-clock-o"></i> <?php echo $result->can_experience;?> Year(s) of experience</div>
                                                        
                                                        <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-flag"></i> <?php echo $result->co_name;?></div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-6 col-sm-3 col-xs-12"><i class="fa fa-building"></i> <?php echo $result->can_curr_company;?></div>
                                                        <div class="col-md-6 col-sm-3 col-xs-12"><i class="fa fa-map-marker"></i> <?php echo $result->can_curr_loc;?></div>
                                                    </div>  
                                                    <div class="row form-group">  
                                                        <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-sitemap"></i> <?php echo $result->fun_name;?></div>
                                                        <div class="col-md-6 col-sm-6 col-xs-12"><i class="fa fa-graduation-cap"></i> <?php echo $result->edu_name;?></div>
                                                    </div>
                                                    
                                                </div>
												
                                                
                                                </td>
                                                <td class=" " width="24%" style="background:#FFC; vertical-align:middle;">
                                                <div class="row form-group">
                                                        <div class="col-md-12 col-sm-12 col-xs-12"><a href="<?php echo $this->config->base_url();?>Candidate/Edit/<?php echo $result->can_id;?>"><i class="fa fa-pencil-square-o"></i> Edit Candidate</a></div>
                                                </div>
                                                <div class="row form-group">
                                                        <div class="col-md-12 col-sm-12 col-xs-12"><a href="<?php echo $this->config->base_url();?>Candidate/ViewDetails/<?php echo $result->can_id;?>" target="_blank"><i class="fa fa-eye"></i> View Resume</a></div>
                                                </div>
                                                <div class="row form-group">
                                                        <div class="col-md-12 col-sm-12 col-xs-12"><a href="<?php echo $this->config->base_url();?>Candidate/Delete/<?php echo $result->can_id;?>"><i class="fa fa-trash"></i> Close/Expire</a></div>
                                                </div>
                                                
                                                </td>
                                            </tr>
                                            <?php  } }?>
                                            
                                        </tbody>

                                    </table>
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
      
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
		/*$('#co_code').editable();
		$('#co_name').editable();
		$('#co_del_status').editable();*/
		$('.is_editable').editable();
});
</script>
<script>
	var asInitVals = new Array();
            $(document).ready(function () {
                var oTable = $('#mechantlist').dataTable({
                    "oLanguage": {
                        "sSearch": "Search all columns:"
                    },
                    "aoColumnDefs": [
						{ "aTargets": [ 0 ], "bSortable": false },
						{ "aTargets": [ 1 ], "bSortable": false },
						{ "aTargets": [ 2 ], "bSortable": false }
					],
					"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        			"iDisplayLength": 25,
                    "sPaginationType": "full_numbers",
                    "dom": 'T<"clear">lfrtip',
                    "tableTools": {
                        "sSwfPath": "<?php echo base_url().'js/datatables/tools/swf/copy_csv_xls_pdf.swf'; ?>"
                    }
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