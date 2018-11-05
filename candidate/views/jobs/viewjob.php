    <!-- page content -->

	<div class="right_col" role="main">

    	<div class="">

        			<?php if($subsType == 1) { ?>

							<div style="margin-top: 16px;" class="alert alert-success">

                            <h2><i class="fa fa-exclamation-triangle"></i> Free Trial Subscription!</h2>

                            <p>Number of jobs you can apply for : <?php echo $subdetails['csub_nojobs'] - $totjobapply; ?>. To apply for more jobs, <a href="<?php echo $this->config->base_url();?>Subscriptions" style="color:#FFF;"><strong>upgrade your plan</strong></a>.</p>

                        </div>						

						<?php } else { if($this->data["postdisable"]!='') { ?>

                        <div style="margin-top: 16px;" class="alert alert-error">

                            <h2><i class="fa fa-exclamation-triangle"></i> Subscription has been expired!</h2>

                            <p>You need to <a href="<?php echo $this->config->base_url();?>Subscriptions" style="color:#FFF;"><strong>upgrade your plan</strong></a> to apply for more jobs.</p>

                        </div>

                        <?php } } ?>

                    <div class="page-title">

                    	<?php echo $message; ?>

                        <div class="title_left">

                            <?php if($formdata['job_applycount'] > 0) { echo '<span class="label label-success"><i class="fa fa-check-square-o"></i> Already Applied</span>'; }?>

                            <h3>

                               <?php echo $formdata['jtitle'].' ['.$formdata['jobcode'].']'; ?>

                               

                            </h3>

                            <h2><?php echo $formdata['farea']; ?> - <?php echo $formdata['location']; ?></h2>

                            

                        </div>



                        <div class="title_right">

                            <div class="col-md-10 col-sm-10 col-xs-12 form-group pull-right top_search">

                                <?php if($formdata['job_applycount'] == 0) { ?>    

                                    <a href="<?php echo $this->config->base_url().'Jobs/ApplyJob/'.$formdata['job_url_id']; ?>" class="btn btn-primary" <?php echo $this->data["postdisable"]; ?>><i class="fa fa-file-word-o"></i> Apply For Job</a>

                                <?php } ?>  

                                <?php if($subsType == 1 || $this->data["postdisable"]!='') { ?> 

                                	 <a href="<?php echo $this->config->base_url();?>Subscriptions" class="btn btn-success"><i class="fa fa-arrow-circle-up"></i> Upgrade Now!</a>

                                <?php } ?>

                            </div>

                        </div>

                    </div>

                    <div class="clearfix"></div>



                    <div class="row">



                        <div class="col-md-12 col-sm-12 col-xs-12">

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">

                                <!-- <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

                                    <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"><i class="fa fa-suitcase"></i> <strong>Job Details</strong></a>

                                    </li>

                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"><i class="fa fa-share-alt"></i> <strong>Free Promotions</strong></a>

                                    </li>

                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab"  aria-expanded="false"><i class="fa fa-diamond"></i> <strong>Paid Promotions</strong></a>

                                    </li>

                                    <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab3" data-toggle="tab"  aria-expanded="false"><i class="fa fa-line-chart"></i> <strong>Statistics</strong></a>

                                    </li>

                                </ul> -->

                                <div id="myTabContent" class="tab-content">

                                    <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">

                                        <div class="col-md-12 col-xs-12">

                                            <div class="x_panel">

                                                <div class="x_title">

                                                    <h2>Job Information</h2>

                                                    <div class="clearfix"></div>

                                                </div>

                                                <div class="x_content">

                                                    <br />

                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">

                                                        <strong>Job Title</strong> : <?php echo $formdata['jtitle']; ?>

                                                    </div>

                                                    

                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                                        <strong>Location</strong> : <?php echo $formdata['location']; ?>

                                                    </div>

            

                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                                        <strong>Experience</strong> : <?php echo $formdata['minexp'].' to '.$formdata['maxexp'];?>

                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                                        <strong>Monthly Salary</strong> : <?php echo '$'.$formdata['minsal'].' ~ $'.$formdata['maxsal'];?>

                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                                        <strong>Education</strong> : <?php echo $formdata['edu']; ?>

                                                    </div>

                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">

                                                        <strong>Functional Area</strong> : <?php echo $formdata['farea']; ?>

                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                                        <strong>Industry</strong> : <?php echo $formdata['industry']; ?>

                                                    </div>

                                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                                        <strong>Job Role</strong> : <?php echo $formdata['jrole']; ?>

                                                    </div>

                                                    

                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">

                                                       <strong>Skills</strong> :  <?php echo $formdata['skill']; ?>

                                                    </div>

                                                    <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">

                                                       <h2>Job Description</h2>

                                                       <?php echo $formdata['jobdesc']; ?>

                                                    </div>

                                                </div>

                                            </div>

                                        </div>

                                    

                                        

                                        

                                        <div class="clearfix"></div>

                                        

                                    </div>

                                    <!-- Copy URL Modal -->

                                      <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">

                                          <div class="modal-dialog">

                                              <div class="modal-content">

                                                  <div class="modal-header">

                                                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                                      <h4 class="modal-title">Job URL</h4>

                                                  </div>

                                                  <div class="modal-body">

                                                      <p>Copy and paste the below url to share and apply for this job!</p>

                                                      <textarea id="joburl" class="form-control placeholder-no-fix" ><?php echo $this->data['joburl']; ?></textarea>

                                                  </div>

                                                  <div class="modal-footer">

                                                      <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>

                                                  </div>

                                              </div>

                                          </div>

                                      </div>

                                      <!-- modal -->

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

function dupli_confirmation(){

   // return confirm('Are you sure you want to delete?');

     return confirm("Do you really want to make a new copy of this vacancy?");

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

                        {

                            'bSortable': false,

                            'aTargets': [0, 1]

                        } //disables sorting for column one

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



<script type="text/javascript">

$(document).ready(function(){

$('#sharefb').click(function(e){

e.preventDefault();

FB.ui(

{

method: 'feed',

name: '<?php echo $formdata['jtitle']; ?>',

link: '<?php echo 'http://www.cherryhire.com/JobDetails/?jobid='.base64_encode($this->encryption->encrypt($formdata['jobid'])).'&js=7&source=facebook';?>',

caption: '<?php echo $formdata['skill']; ?>',

description: '<?php echo $formdata['hcompany']; ?> is looking to fill <?php echo $formdata['jtitle']; ?> position in <?php echo $formdata['location']; ?>',

message: ''

});

});

});



</script>