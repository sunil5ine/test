	<!-- page content -->
	<div class="right_col" role="main">
    	<div class="">
                    <div class="page-title">
                    	<?php echo $message; ?>
                        
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $pagehead; ?></h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <!--<li><a href="#"><i class="fa fa-chevron-up"></i></a> </li>-->
                                        <!-- <li>
                                            <a title="Add New Job" href="<?php //echo $this->config->base_url().'Candidate/Add';?>"><button class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-plus-circle"></i> Add New Candidate</button></a>
                                        </li> -->
                                        <!--<li><a href="#"><i class="fa fa-close"></i></a> </li>-->
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table id="profilelist" class="table table-striped responsive-utilities jambo_table" style="border-collapse: separate; border-spacing:15px; border:none;">
                                         <thead style="display:none;">
                                            <tr class="bg-olive">
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

                                            if($result['rating'] >= 5)
                                            {
                                                $rating = '<i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"> </i>';
												$labelColor = 'label-success';
                                            }
                                            elseif ($result['rating'] >= 4.5) {
                                                $rating = '<i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-half" aria-hidden="true"></i>';
												$labelColor = 'label-success';
                                            }
                                            elseif ($result['rating'] >= 4) {
                                                $rating = '<i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i>';
												$labelColor = 'label-success';
                                            }
                                            elseif ($result['rating'] >= 3.5) {
                                                $rating = '<i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-half" aria-hidden="true"></i>';
												$labelColor = 'label-primary';
                                            }
                                            elseif ($result['rating'] >= 3) {
                                                $rating = '<i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i>';
												$labelColor = 'label-primary';
                                            }
                                            elseif ($result['rating'] >= 2.5) {
                                                $rating = '<i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-half" aria-hidden="true"></i>';
												$labelColor = 'label-warning';
                                            }
                                            elseif ($result['rating'] >= 2) {
                                                $rating = '<i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star" aria-hidden="true"></i>';
												$labelColor = 'label-warning';
                                            }
                                            elseif ($result['rating'] >= 1.5) {
                                                $rating = '<i class="fa fa-star" aria-hidden="true"></i> <i class="fa fa-star-half" aria-hidden="true"></i>';
												$labelColor = 'label-warning';
                                            }
                                            elseif ($result['rating'] >= 1) {
                                                $rating = '<i class="fa fa-star" aria-hidden="true"></i>';
												$labelColor = 'label-warning';
                                            }
                                            else
                                            {
                                                $rating = '<i class="fa fa-star-half" aria-hidden="true"></i>';
												$labelColor = 'label-danger';
                                            }

										?>
                                            <tr style="border:none; background-color:#FFF;">
                                                <td class="" width="100%" style="border:1px solid #999; padding:5px 0px; color:#000;">
                                                	<div class="col-md-12" style="border-bottom:1px solid #999; line-height:18px; padding:0px;">
                                                    	<div class="col-md-8" style="padding-left:5px;">
                                                        	<h2><a href="<?php echo $this->config->base_url().'Profile/Viewdetails/'.$jobid.'/'.$result['personid'];?>" style="color:#000;"><strong><?php echo ucwords($result['name']);?></strong></a> <span class="label <?php echo $labelColor; ?>"><?php echo $rating.' '.$result['fittype']; ?></span></h2>
                                                        </div>
                                                        <div class="col-md-4">
                                                        <?php if($result['slist_id']==0) {  ?>
                                                        <a data-toggle="modal" href="#myModal" data-id="<?php echo $result['personid'];?>" class="announce"> 
                                                        	<button class="btn btn-default pull-left"><i class="fa fa-download"></i> Add to shortlist</button>
                                                        </a>
                                                        <?php } else {?>
                                                        	<h2><label class="label label-info pull-left"><i class="fa fa-check"></i> Shortlisted</label></h2>
                                                        <?php } ?>
                                                        <a href="<?php echo $this->config->base_url().'Profile/Viewdetails/'.$jobid.'/'.$result['personid'];?>">
                                                        	<button class="btn btn-default pull-right"><i class="fa fa-eye"></i> View Resume</button>
                                                        </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12" style="border-bottom:1px solid #999; line-height:20px; padding:0px;">
                                                    	<table width="100%" border="0" style="line-height:20px;">
                                                        	<tr>
                                                            	<td width="33%" valign="top" style="border-right:1px solid #999; vertical-align:top;">
                                                                <?php if($result['email'] != 'Not Set') { ?>
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    Email : <?php echo $result['email'];?>
                                                                </div>
                                                                <?php } ?>
                                                                <?php if($result['phone'] != 'Not Set') { ?>
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    Phone : <?php echo $result['phone'];?>
                                                                </div>
                                                                <?php } ?>
                                                                <?php if($result['country'] != 'Not Set') { ?>
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <strong>Country :</strong> <?php echo ucwords($result['country']);?>
                                                                </div>
                                                                <?php } ?>
                                                                <?php if($result['location'] != 'Not Set') { ?>
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <strong>Location :</strong> <?php echo ucwords($result['location']);?>
                                                                </div>
                                                                <?php } ?>
                                                                <?php if(isset($result['tot_exp'])) { ?>
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <strong>TOTAL EXPERIENCE :</strong> <?php echo number_format(($result['tot_exp']/12), 1);?> Yr(s)
                                                                </div>
                                                                <?php } ?>
                                                                <?php if($result['gender'] != 'Not Set') { ?>
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <strong>GENDER :</strong> <?php echo ucwords($result['gender']);?>
                                                                </div>
                                                                <?php } ?>
                                                                <?php if($result['job_function'] != 'Not Set') { ?>
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <strong>FUNCTIONAL AREA :</strong> <?php echo $result['job_function'];?>
                                                                </div>
                                                                <?php } ?>
                                                                <?php if($result['curr_company'] != 'Not Set') { ?>
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <strong>CURRENT COMPANY :</strong> <?php echo $result['curr_company'];?>
                                                                </div>
                                                                <?php } ?>
                                                                <?php if($result['edu_timeline']) { ?>
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <strong>EDUCATION</strong>
                                                                    <?php $e=0; foreach ($result['edu_timeline'] as $eduresult) {  ?>
                                                                    <?php if($eduresult['educationname'] != 'unknown') { $e++;?>
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <strong><?php echo $eduresult['educationname'];?> </strong><br />
                                                                        <span style="font-size:11px; color:#666; line-height:15px;"><?php echo $eduresult['school'];?></span>
                                                                    </div> <br />
                                                                    <?php } } ?>
                                                                </div>
                                                                <?php } ?>
                                                                </td>
                                                                <td width="33%" valign="top"  style="border-right:1px solid #999; vertical-align:top;">
                                                                <?php if($result['experience']) { ?>
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <strong>WORK EXPERIENCE</strong>
                                                                    <?php $e=0; foreach ($result['experience'] as $expresult) {  ?>
                                                                    <?php if($expresult['cmpname'] != 'unknown') { $e++;?>
                                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                                        <strong>#<?php echo $e.' '.$expresult['cmpname'];?> </strong><br />
                                                                        <span style="font-size:11px; color:#666; line-height:15px;"><strong>Designation :</strong> <?php echo $expresult['cmprole'];?> <br />
                                                                        <strong>Period :</strong> <?php echo $expresult['cmpstart_dt'].' - '.$expresult['cmpend_dt'].'('.$expresult['cmpperiod'].')';?></span>
                                                                    </div> <br />
                                                                    <?php } } ?>
                                                                </div>
                                                                <?php } ?>
                                                                </td>
                                                                <td valign="top" width="33%" style=" vertical-align:top;">
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <strong>MATCHING SKILLS</strong> <br> <span style="font-size:11px; color:#666; line-height:15px;"><?php echo $result['match_skills'];?></span>
                                                                </div>
                                                                <div class="col-md-12 col-sm-12 col-xs-12">
                                                                    <strong>MISSING SKILLS</strong> <br> <span style="font-size:11px; color:#666; line-height:15px;"><?php echo $result['missed_skills'];?></span>
                                                                </div>
                                                                <?php
																$skillstring = strip_tags($result['skills']);
																if (strlen($skillstring) > 100) {
																	// truncate string
																	$stringCut = substr($skillstring, 0, 100);
																	// make sure it ends in a word so assassinate doesn't become ass...
																	$skillstring = substr($stringCut, 0, strrpos($stringCut, ' ')).'... <a href="javascript:void(0);" onclick="showmore('.$x.')" style="cursor:pointer;"><strong>See More</strong></a>'; 
																}
																?>
                                                                <div class="col-md-12 col-sm-12 col-xs-12" id="seeless_<?php echo $x; ?>">
                                                                    <strong>SKILLS</strong> <br> <span style="font-size:11px; color:#666; line-height:15px;"><?php echo $skillstring;?></span>
                                                                </div>
                                                                <div class="col-md-12 col-sm-12 col-xs-12" id="seemore_<?php echo $x; ?>" style="display:none;">
                                                                    <strong>SKILLS</strong> <br> <span style="font-size:11px; color:#666; line-height:15px; "><?php echo $result['skills'].' <a href="javascript:void(0);" onclick="showless('.$x.')" style="cursor:pointer;"><strong>[Show Less]</strong></a>';?></span>
                                                                </div>
                                                                <?php if($result['slist_id']!=0) {  ?>
                                                                <div class="col-md-12 col-sm-12 col-xs-12" style="background:#E8E8E8; margin-top:10px;">
                                                                    <strong>SHORTLIST COMMENT</strong> <br> <span style="font-size:11px; color:#666; line-height:15px;"><?php echo $result['slist_comment'];?></span>
                                                                </div>
                                                                <?php } ?>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-12" style=" padding:0px;">
                                                    	<div class="col-md-9"><strong>Resume Date </strong> <?php echo ($result['resume_date']==0)?'Not Set': date('d-M-Y', (strtotime($result['resume_date']))); ?></div>
                                                        <div class="col-md-3"><span class="pull-right"><strong>Last Updated </strong> <?php echo ($result['last_updated']==0)?'Not Set': date('d-M-Y', $result['last_updated']/1000); ?></span></div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php  } } ?>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
									 <!-- Copy URL Modal -->
                                      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                                      	  <form id="slistfrm" name="slistfrm" action="<?php echo $this->config->base_url().'Profile/Shortlist/'.$jobid; ?>" method="post">
                                          <div class="modal-dialog">
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                      <h4 class="modal-title">Add to shortlisted</h4>
                                                  </div>
                                                  <div class="modal-body">
                                                      <p>Comment</p>
                                                      <input type="hidden" name="personid" id="personid" value=""  />
                                                      <input type="hidden" name="jobid" id="jobid" value="<?php echo $jobid; ?>"  />
                                                      <textarea id="commentbox" name="commentbox" class="form-control placeholder-no-fix" required="required" ></textarea>
                                                  </div>
                                                  <div class="modal-footer">
                                                       <button class="btn btn-success" type="submit">Save</button>
                                                      <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                                                  </div>
                                              </div>
                                          </div>
                                          </form>
                                      </div>
                                      <!-- modal -->
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
<script>
function showmore(x)
{
	var div = document.getElementById("seemore"+"_"+x);
	var div1 = document.getElementById("seeless"+"_"+x);
	if (div.style.display !== "none") {
		div.style.display = "none";
		div1.style.display = "block";
	}
	else {
		div.style.display = "block";
		div1.style.display = "none";
	}
}
function showless(x)
{
	var div = document.getElementById("seeless"+"_"+x);
	var div1 = document.getElementById("seemore"+"_"+x);
	if (div.style.display !== "none") {
		div.style.display = "none";
		div1.style.display = "block";
	}
	else {
		div.style.display = "block";
		div1.style.display = "none";
	}
}
</script>      
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
		/*$('#co_code').editable();
		$('#co_name').editable();
		$('#co_del_status').editable();*/
		$('.is_editable').editable();
		$(".announce").click(function(){ // Click to only happen on announce links
				 $("#personid").val($(this).data('id'));
			   });

});
</script>
<script>
	var asInitVals = new Array();
            $(document).ready(function () {
				var oTable = $('#profilelist').dataTable({
                    "oLanguage": {
                        "sSearch": "Quick Search:"
                    },
                    "aoColumnDefs": [
						{ "aTargets": [ 0 ], "bSortable": false },
						/*{ "aTargets": [ 3 ], "bSortable": false }*/
					],
					"aLengthMenu": [[25, 50, 75, -1], [25, 50, 75, "All"]],
        			"iDisplayLength": 25,
                    "sPaginationType": "full_numbers",
                    /*"dom": 'T<"clear">lfrtip',
                    "tableTools": {
                        "sSwfPath": "<?php //echo base_url().'js/datatables/tools/swf/copy_csv_xls_pdf.swf'; ?>",
						"aButtons": [
							{
								"sExtends": "copy",
								"sTitle": "Profile List",
								"mColumns": [0, 1, 2],
							},
							{
								"sExtends": "csv",
								"sTitle": "Profile List",
								"mColumns": [0, 1, 2],
							},
							{
								"sExtends": "pdf",
								"sTitle": "Profile List",
								"mColumns": [0, 1, 2],
							}
						],
                    },*/
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