	<!-- page content -->
	<div class="right_col" role="main">
    	<div class="">
                    <div class="page-title">
                    	<?php echo $message; ?>
                    </div>
                    <div class="clearfix"></div>
    <?php if($this->session->flashdata('success'))
            { ?>
                <div class="alert alert-success alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Success!</strong><br> <?php echo $this->session->flashdata('success'); ?>
                </div>
           <?php } if($this->session->flashdata('error')) { ?>
                    <div class="alert alert-danger alert-dismissible fade in">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Error!</strong><br> <?php echo $this->session->flashdata('error'); ?>
                </div>
           <?php } ?>
                    <div class="row">

                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2><?php echo $pagehead; ?></h2>
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                	<form class="form-horizontal form-label-left input_mask" action="<?php echo $this->config->base_url('cvwriting/billingcart'); ?>" method="post">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <th>SLNo</th>
                                                <th>Description</th>
                                                <th class="no-link last"><span class="nobr">Amount</span></th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php $sumamt = 0; $x=0; if(!empty($cartdata)) { $x=0; foreach ($cartdata as $result) { $x++; ?>
                                        <?php
											if($x%2 == 0)
											{
												$tdcls = 'even pointer';
											}
											else
											{
												$tdcls = 'odd pointer';
											}
											$sumamt = $sumamt + $result->cvw_amt;
											//$sumamt = 49;
										?>
                                            <tr class="<?php echo $tdcls; ?>">
                                                <td class=" "><?php echo $x;?></td>
                                                <td class=" ">Professional CV services</td>
                                                <td class=" last"><i class="fa fa-usd "></i> <?php echo number_format($result->cvw_amt,2);?></td>
                                                </td>
                                                <td><a href="<?php echo base_url() ?>cvwriting/deleteit?id=<?php echo $result->cvw_id ?>"  class="btn btn-danger btn-xs del-btn" valt='<?php echo $result->cvw_id?>'><i class="fa fa-trash-o "></i></a></td>
                                            </tr>
                                            <?php  } } if($sumamt > 0) {?>
                                            <tr>
                                                <td class=" "></td>
                                                <td class=" " align="right"> <strong>Total Amount</strong></td>
                                                <td class=" last"><i class="fa fa-usd "></i> <?php echo number_format($sumamt,2);?></td>
                                                <td></td>
                                            </tr>
                                            <?php } else { ?>
                                            <tr>
                                                <td colspan="4" class=" " align="center"> Cart is Empty</td>
                                             </tr>   
                                             <?php } ?>   
                                        </tbody>

                                    </table>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                            <label>
                                                <input type="checkbox" name="cvcover" id="cvcover" <?php if(!empty($result->cvw_cover)) {echo ($result->cvw_cover==1?'checked':''); }?> value="1" tabindex="2"> Cover Letter + $10.00
                                            </label>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                            <label>
                                                <input type="checkbox" name="cvexpress" id="cvexpress" <?php if(!empty($result->cvw_express)) { echo ($result->cvw_express==1?'checked':'');} ?> value="1" tabindex="3"> Express Delivery + $10.00 (24-48 Hours)
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    	<input name="totamt" type="hidden" value="<?php echo $sumamt;?>" />
                                        <input name="canid" type="hidden" value="<?php echo base64_encode($this->encryption->encrypt($this->session->userdata('cand_chid')));?>" />
										<?php if($sumamt > 0) { ?><button class="btn btn-success pull-right" type="submit">Place Order</button><?php } ?>
                                        <a title="Edit" href="<?php echo $this->config->base_url('cvwriting/questionnaire'); ?>"><button type="button" class="btn btn-primary pull-left">Edit</button></a>
                                    </div>
                                    </form>
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
                var oTable = $('#cvwritelist').dataTable({
                    "aoColumnDefs": [
                        {
                            'bSortable': false,
                            'aTargets': [0, 1]
                        } //disables sorting for column one
            		],
                    "dom": 'T<"clear">lfrtip',
					"paging": false,
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

 <script>
    $(document).ready(function(){
        $('.del-btn').click(function(){
            if (!confirm("Do you want to delete")){
              return false;
            }
            else{
               return true;
            }
        });

        $('#cvexpress').click(function(){
            if($(this). prop("checked") == true)
            {
               var cvexpress = '1';
            }
            else{
                 var cvexpress = '0';
            }

            $.ajax({
                data:{cvexpress:cvexpress},
                type:'GET',
                url:'<?php echo base_url() ?>Cvwriting/cvexpressup',
                success(){

                }

            });
        });

        $('#cvcover').click(function(){
            if($(this). prop("checked") == true)
            {
               var cvcover = '1';
            }
            else{
                 var cvcover = '0';
            }

            $.ajax({
                data:{cvcover:cvcover},
                type:'GET',
                url:'<?php echo base_url() ?>Cvwriting/cvw_coverup',
                success(){

                }

            });
        });
    })
</script>