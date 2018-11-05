	<link rel="stylesheet" href="<?php echo base_url(); ?>css/thickbox.css" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>js/thickbox.js"></script>
    <!-- page content -->
	<div class="right_col" role="main">
    	<div class="">
                    <div class="page-title">
                    	<?php echo $message; ?>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                        	<?php if($subdetails['sub_expire_dt']==0 || $subdetails['sub_nojobs']==0 || $subdetails['sub_expire_dt']<date('Y-m-d H:i:s')) { ?>
                                <div style="margin-top: 16px;" class="alert alert-error">
                                    <h2><i class="fa fa-exclamation-triangle"></i> Your validity is over!</h2>
                                    <p>Please <a href="<?php echo $this->config->base_url();?>Subscriptions" style="color:#FFF;"><strong>upgrade your plan</strong></a> inorder to have internal jobs posted on Free and Paid Boards.</p>
                                </div>
                                <div class="clearfix"></div>
                        	<?php } ?>
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $pagehead; ?></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <!--<li><a href="#"><i class="fa fa-chevron-up"></i></a> </li>-->
                                        <li>
                                            <a title="Add New Job" href="<?php echo $this->config->base_url();?>Jobs/Add"><button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-plus-circle"></i> Add New Job</button></a>
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
											$this->load->model('jobsmodel');
											$publishcount = $this->jobsmodel->publish_count($result->job_id);
										?>
                                            <tr class="<?php echo $tdcls; ?>">
                                                <td class=" " width="1%">
                                                </td>
                                                <td class=" " width="80%">
												<div class="col-md-12 col-sm-12 col-xs-12">
                                                	<h2><?php echo $x; //echo $result->job_id;?>. <a href="<?php echo $this->config->base_url().'Jobs/Viewdetails/'.$result->job_url_id; ?>"><?php echo $result->job_title;?></a> </h2> 
													<?php if($publishcount > 0) { echo '<span class="label label-success">Already Published</span>'; }?>
                                                    <div class="row form-group">
                                                        <div class="col-md-4 col-sm-4 col-xs-12"><i class="fa fa-map-marker"></i> <strong>Location:</strong> <?php echo $result->job_location;?></div>
                                                        <div class="col-md-5 col-sm-5 col-xs-12"><i class="fa fa-sitemap"></i> <strong>Functional Area:</strong> <?php echo $result->jfun_display;?></div>
                                                        <div class="col-md-3 col-sm-3 col-xs-12"><i class="fa fa-graduation-cap"></i> <strong>Education:</strong> <?php echo $result->deg_type_display;?></div>
                                                    </div>
                                                    
                                                    <div class="row form-group">
                                                        <div class="col-md-4 col-sm-4 col-xs-12"><i class="fa fa-clock-o"></i> <strong>Experience:</strong> <?php echo $result->minexp;?> ~  <?php echo $result->maxexp;?> </div>
                                                        <div class="col-md-5 col-sm-5 col-xs-12"><i class="fa fa-usd"></i> <strong>Monthly Salary:</strong> <?php echo ($result->job_max_sal == 0)?'Unspecified': '$'.$result->job_min_sal.' ~ $'.$result->job_max_sal; ?></div>
                                                        <div class="col-md-3 col-sm-3 col-xs-12"><i class="fa fa-calendar"></i> <strong>Published:</strong> <?php echo date('d/m/Y', strtotime($result->job_created_dt));?></div>
                                                    </div>
                                                    
                                                    <div class="row form-group">
                                                        
                                                        <div class="col-md-8 col-sm-8 col-xs-12"><i class="fa fa-check-square"></i> <strong>Industry:</strong> <?php echo $result->job_industry;?></div>
                                                        
                                                    </div>
                                                    
                                                    <div class="row form-group">
                                                        <div class="col-md-12 col-sm-12 col-xs-12"><i class="fa fa-tags"></i> <strong>Skills:</strong> <?php echo ($result->job_skills)?$result->job_skills:'Not Specified';?></div>
                                                    </div>                                                
                                                    
                                                </div>
												
                                                
                                                </td>
                                                <td class=" " width="19%" style="/*background:#FFC;*/ vertical-align:middle;">

                                                
                                                
                                                <?php if($result->job_status!=1) { ?>
                                                    <div class="row form-group">
                                                        <div class="col-md-12 col-sm-12 col-xs-12"><a href="<?php echo $this->config->base_url().'Jobs/Reopen/'.$result->job_url_id; ?>" onclick="return reopen_confirmation();"><button class="btn btn-warning pull-right col-md-8" style="margin-right: 5px;"><i class="fa fa-folder-open-o"></i> Re-open</button></a></div>
                                                    </div>
                                                    <div class="row form-group">
                                                            <div class="col-md-12 col-sm-12 col-xs-12"><a href="<?php echo $this->config->base_url().'Jobs/Delete/'.$result->job_url_id; ?>" onclick="return del_confirmation();"><button class="btn btn-danger pull-right col-md-8" style="margin-right: 5px;"><i class="fa fa-trash"></i> Remove</button></a></div>
                                                    </div>

                                                <?php } else { ?>
                                                    
                                                    <div class="row form-group">
                                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                                        	<?php if($publishcount > 0) { ?>
                                                            	<a href="<?php echo $this->config->base_url().'Profile/List/'.$result->job_url_id; ?>"><button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-file-word-o"></i> Matching Profiles</button></a>
                                                            <?php } else { ?>
                                                            	<a href="<?php echo $this->config->base_url().'Jobs/Viewdetails/'.$result->job_url_id; ?>"><button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-upload"></i> View Details</button></a>
                                                            <?php } ?>
                                                            
                                                        </div>
                                                	</div>
                                                    
                                                    <div class="row form-group">
                                                            <div class="col-md-12 col-sm-12 col-xs-12"><a href="<?php echo $this->config->base_url().'Jobs/CloseJob/'. $result->job_url_id; ?>" onclick="return close_confirmation();"><button class="btn btn-danger pull-right col-md-8" style="margin-right: 5px;"><i class="fa fa-trash"></i> Close</button></a></div>
                                                    </div>
                                                <?php } ?>
                                                
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
function del_confirmation(){
   // return confirm('Are you sure you want to delete?');
	 return confirm("Do you really want to delete this vacancy?");
}
function close_confirmation(){
   // return confirm('Are you sure you want to delete?');
     return confirm("Do you really want to close this vacancy?");
}
function reopen_confirmation(){
   // return confirm('Are you sure you want to delete?');
     return confirm("Do you really want to re-open this vacancy?");
}

</script>        
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
                    "dom": 'lfrtip',
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

function showlistjob(jobid)
{
	$("#iframeloading").show(); 
	var form_data = {
		jid: jobid,
	}
	$.ajax({
		url: '<?php echo base_url().'jobs/getcandidate_list'; ?>',
		type:'POST',
		data: form_data,
		cache: false,
		success: function(data) {
			$("#iframeloading").hide();
			var passval = data;
			var url = "<?php echo base_url().'Jobs/CandidateList/'; ?>?height=490&width=740"+passval+"&modal=true";
			showpop(url);
	 	}
	});	
}

function showlist(jobid)
{
	var url = "<?php echo base_url().'Jobs/CandidateList/'; ?>"+jobid+"/?height=490&width=740&jid="+jobid+"&modal=true";
	showpop(url);
}

function showpop(url)
{
	tb_show("Candidate List", url);
	return true;
}

</script>