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
                                    
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table class="table table-striped responsive-utilities jambo_table">
                                        <thead>
                                            <tr class="headings">
                                                <th>Invoice ID</th>
                                                <th>Product</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                                <th class="centered no-link last" align="center"><span class="nobr">Date</span></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                        <?php $sumamt = 0; if(!empty($transdata)) { $x=0; foreach ($transdata as $result) { $x++; ?>
                                        <?php
											if($x%2 == 0)
											{
												$tdcls = 'even pointer';
											}
											else
											{
												$tdcls = 'odd pointer';
											}
											$sumamt = $sumamt + $result->ord_amt;
										?>
                                            <tr class="<?php echo $tdcls; ?>">
                                                <td class=" "><?php echo $result->trans_pt_invoice_id;?></td>
                                                <td class=" "><?php echo 'Plan:- '.$result->ord_product;?></td>
                                                <td class=" "><i class="fa fa-usd "></i> <?php echo $result->ord_amt;?></td>
                                                <td class=" "><?php echo ($result->trans_status==1)?'Success':'Failed';?></td>
                                                <td class=" last" align="center"><?php echo $result->ord_date;?></td>
                                            </tr>
                                            <?php  } } if($sumamt > 0) {?>
                                            <tr>
                                                <td class=" "></td>
                                                <td class=" " align="right"> <strong>Total Amount</strong></td>
                                                <td class=" "><i class="fa fa-usd "></i> <?php echo number_format($sumamt,2);?></td>
                                                <td class=" "></td>
                                                <td class=" last" align="center"></td>
                                            </tr>
                                            <?php } else { ?>
                                            <tr>
                                                <td colspan="5" class=" " align="center"> No transaction details!</td>
                                             </tr>   
                                             <?php } ?>   
                                        </tbody>

                                    </table>
                                    </div>
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