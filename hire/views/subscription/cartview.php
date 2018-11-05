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

                                	<form class="form-horizontal form-label-left input_mask" action="<?php echo $this->config->base_url().'Subscriptions/BillingSection'; ?>" method="post">

                                    <div class="col-md-12 col-sm-12 col-xs-12">

                                    <table class="table table-striped responsive-utilities jambo_table">

                                        <thead>

                                            <tr class="headings">

                                                <th>SLNo</th>

                                                <th>Description</th>

                                                <th>Amount</th>

                                                <th class="centered no-link last" align="center"><span class="nobr">Action</span></th>

                                            </tr>

                                        </thead>



                                        <tbody>

                                        <?php $sumamt = 0; if(!empty($cartdata)) { $x=0; foreach ($cartdata as $result) { $x++; ?>

                                        <?php

											if($x%2 == 0)

											{

												$tdcls = 'even pointer';

											}

											else

											{

												$tdcls = 'odd pointer';

											}

											$sumamt = $sumamt + $result->temp_amt;

										?>

                                            <tr class="<?php echo $tdcls; ?>">

                                                <td class=" "><?php echo $x;?></td>

                                                <td class=" "><?php echo 'Plan : '.$result->pr_name.' - '.(($result->pr_type==1)?'Monthly':'Annual').' <br> No of Premium Jobs : '.$result->temp_nojobs;?></td>

                                                <td class=" "><i class="fa fa-usd "></i> <?php echo $result->temp_amt;?></td>

                                                <td class=" last" align="center">

                                                <a title="Delete" href="<?php echo $this->config->base_url().'Subscriptions/RemoveCart/'.$result->temp_encrypt_id; ?>"><button type="button" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button></a>

                                                </td>

                                            </tr>

                                            <?php  } } if($sumamt > 0) {?>

                                            <tr>

                                                <td class=" "></td>

                                                <td class=" " align="right"> <strong>Total Amount</strong></td>

                                                <td class=" "><i class="fa fa-usd "></i> <?php echo number_format($sumamt,2);?></td>

                                                <td class=" last" align="center"></td>

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

                                    	<input name="totamt" type="hidden" value="<?php echo $sumamt;?>" />

                                        <input name="empid" type="hidden" value="<?php echo base64_encode($this->encryption->encrypt($this->session->userdata('hireid')));?>" />

										<?php if($sumamt > 0) { ?><button class="btn btn-success pull-right" type="submit">Place Order</button><?php } ?>

                                        <a title="Edit" href="<?php echo $this->config->base_url().'Subscriptions'; ?>"><button type="button" class="btn btn-primary pull-left">Continue Shopping</button></a>

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