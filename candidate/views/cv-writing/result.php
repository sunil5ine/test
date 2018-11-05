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
                                    <?php if($transaction['trans_status'] == 1 && $transaction['trans_pay_respcode']==100){?>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                   	 	Thanks for availing CV writing service with us, we will process it for you and get back to you asap.!
                                    </div>
                                    <?php  } else { ?>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                   	 	Sorry! We are unable to process your request, payment failed. Please try again.
                                    </div>
                                    <?php } ?>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                    <table class="table table-striped responsive-utilities jambo_table">
                                        <tbody>
                                            <tr class="even pointer">
                                                <td class=" ">Transaction Result : </td>
                                                <td class=" "><?php echo $transaction['trans_result'];?></td>
                                                </td>
                                            </tr>
                                            <tr class="odd pointer">
                                                <td class=" ">Transaction No : </td>
                                                <td class=" "><?php echo $transaction['trans_pt_invoice_id'];?></td>
                                                </td>
                                            </tr>
                                            <tr class="odd pointer">
                                                <td class=" ">Amount : </td>
                                                <td class=" ">$<?php echo $transaction['trans_amt']/0.38;?></td>
                                                </td>
                                            </tr>
                                            
                                        </tbody>

                                    </table>
                                    </div>
                                    <div class="col-md-12 col-sm-12 col-xs-12">
										<?php if($transaction['trans_status'] == 1 && $transaction['trans_pay_respcode']==100){?> 
                                        	<a title="Edit" href="<?php echo $this->config->base_url().'MyJobs'; ?>"><button type="button" class="btn btn-primary pull-right">Recommended Jobs!</button></a>
										<?php } else { ?>
                                        	<a title="Edit" href="<?php echo $this->config->base_url().'cvwriting'; ?>"><button class="btn btn-success pull-right" type="submit">Try Again</button></a>
										
										<?php } ?>
                                        
                                        
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