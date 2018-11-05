	

    <!-- page content -->

	<div class="right_col" role="main">

    	<div class="">

                    <div class="page-title">

                    	<?php echo $message; ?>

                        <div class="title_left">

                            <h3>

                               <?php echo $pagehead; ?>

                                <!--<small>

                                    Some examples to get you started

                                </small>-->

                            </h3>

                        </div>



                        

                    </div>

                    <div class="clearfix"></div>



                    <div class="row">

						<form class="form-horizontal form-label-left input_mask" action="<?php echo base_url(); ?>Subscriptions/PlaceOrder" method="post">

                        <div class="col-md-6 col-xs-12">

                            <div class="x_panel">

                                <div class="x_title">

                                    <h2>Billing Address <!--<small>different form elements</small>--></h2>

                                    <div class="clearfix"></div>

                                </div>

                                <div class="x_content">

                                    <br />

										<div class="form-group">

                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                 <input type="text" class="form-control has-feedback-left" id="baddress" name="baddress" placeholder="Address" required  value="<?php echo $formdata['baddress']; ?>">

                                                <span class="fa fa-home form-control-feedback left" aria-hidden="true"></span>

                                            </div>

                                        </div>

                                        

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback-">

                                            <input type="text" class="form-control has-feedback-left" id="bcity" name="bcity" placeholder="City/Town" value="<?php echo $formdata['bcity']; ?>" >

                                            <span class="fa fa-building form-control-feedback left" aria-hidden="true"></span>

                                        </div>

                                        

                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">

                                            <input type="text" class="form-control has-feedback-left" id="bstate" name="bstate" placeholder="State" required  value="<?php echo $formdata['bstate']; ?>">

                                            <span class="fa fa-flag form-control-feedback left" aria-hidden="true"></span>

                                        </div>

                                        

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                            <input type="text" class="form-control  has-feedback-left" id="bpcode" name="bpcode" placeholder="Postal Code" required  value="<?php echo $formdata['bpcode']; ?>">

                                            <span class="fa fa-flag form-control-feedback left" aria-hidden="true"></span>

                                        </div>

                                        

                                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">

                                            <?php echo form_dropdown('bcountry',$country_list,$formdata['bcountry'],'id="bcountry" class=" form-control has-feedback-left" tabindex="1" required');?>

                                            <span class="fa fa-flag form-control-feedback left" aria-hidden="true"></span>

                                        </div>

                                        

                                </div>

                            </div>

                        </div>

                        

                        <div class="col-md-6 col-xs-12">

                            <div class="x_panel">

                                <div class="x_title">

                                    <h2>Cart Details <!--<small>different form elements</small>--></h2>

                                    <div class="clearfix"></div>

                                </div>

                                <div class="x_content">

										<div class="form-group">

                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                                 <table class="table table-striped responsive-utilities jambo_table">

                                                 <thead>

                                                    <tr class="headings">

                                                        <th width="80%">Product</th>

                                                        <th width="20%">Amount</th>

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

                                                    <td><?php echo 'Plan : '.$result->pr_name.' - '.(($result->pr_type==1)?'Monthly':'Annual').' <br> No of Premium Jobs : '.$result->temp_nojobs;?></td>

                                                    <td><i class="fa fa-usd "></i> <?php echo $result->temp_amt;?></td>

                                                  </tr>

                                                  <?php  } }  ?>

                                                  <tr>

                                                    <td class=" " align="right"> <strong>Total Amount</strong></td>

                                                    <td class=" "><i class="fa fa-usd "></i> <strong><?php echo number_format($sumamt,2);?></strong></td>

                                                  </tr>

                                                  </tbody>

                                                </table>

                                                <input name="totamt" type="hidden" value="<?php echo $sumamt;?>" />

                                        		<input name="empid" type="hidden" value="<?php echo base64_encode($this->encryption->encrypt($this->session->userdata('hireid')));?>" />



                                            </div>

                                        </div>

                                        

                                        

                                        

                                        <div class="form-group">

                                            <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5">

                                                <button type="submit" class="btn btn-success"  tabindex="16">Proceed to payment</button>

                                            </div>

                                        </div>

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

    <script type="text/javascript" src="<?php echo $this->config->base_url()?>ckeditor/ckeditor.js"></script>

	<script type="text/javascript">

    CKEDITOR.replace( 'jobdesc' );

    </script>

<!-- form validation -->

<!--        <script type="text/javascript">

            $(document).ready(function () {

                $.listen('parsley:field:validate', function () {

                    validateFront();

                });

                $('#demo-form .btn').on('click', function () {

                    $('#demo-form').parsley().validate();

                    validateFront();

                });

                var validateFront = function () {

                    if (true === $('#demo-form').parsley().isValid()) {

                        $('.bs-callout-info').removeClass('hidden');

                        $('.bs-callout-warning').addClass('hidden');

                    } else {

                        $('.bs-callout-info').addClass('hidden');

                        $('.bs-callout-warning').removeClass('hidden');

                    }

                };

            });



            $(document).ready(function () {

                $.listen('parsley:field:validate', function () {

                    validateFront();

                });

                $('#demo-form2 .btn').on('click', function () {

                    $('#demo-form2').parsley().validate();

                    validateFront();

                });

                var validateFront = function () {

                    if (true === $('#demo-form2').parsley().isValid()) {

                        $('.bs-callout-info').removeClass('hidden');

                        $('.bs-callout-warning').addClass('hidden');

                    } else {

                        $('.bs-callout-info').addClass('hidden');

                        $('.bs-callout-warning').removeClass('hidden');

                    }

                };

            });

            try {

                hljs.initHighlightingOnLoad();

            } catch (err) {}

        </script>

-->        <!-- /form validation -->

        <!-- editor -->

        <script>

            $(document).ready(function () {

                $('.xcxc').click(function () {

                    $('#desc').val($('#editor').html());

                });

            });



            $(function () {

                function initToolbarBootstrapBindings() {

                    var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',

                'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',

                'Times New Roman', 'Verdana'],

                        fontTarget = $('[title=Font]').siblings('.dropdown-menu');

                    $.each(fonts, function (idx, fontName) {

                        fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));

                    });

                    $('a[title]').tooltip({

                        container: 'body'

                    });

                    $('.dropdown-menu input').click(function () {

                            return false;

                        })

                        .change(function () {

                            $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');

                        })

                        .keydown('esc', function () {

                            this.value = '';

                            $(this).change();

                        });



                    $('[data-role=magic-overlay]').each(function () {

                        var overlay = $(this),

                            target = $(overlay.data('target'));

                        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());

                    });

                    if ("onwebkitspeechchange" in document.createElement("input")) {

                        var editorOffset = $('#editor').offset();

                        $('#voiceBtn').css('position', 'absolute').offset({

                            top: editorOffset.top,

                            left: editorOffset.left + $('#editor').innerWidth() - 35

                        });

                    } else {

                        $('#voiceBtn').hide();

                    }

                };



                function showErrorAlert(reason, detail) {

                    var msg = '';

                    if (reason === 'unsupported-file-type') {

                        msg = "Unsupported format " + detail;

                    } else {

                        console.log("error uploading file", reason, detail);

                    }

                    $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +

                        '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');

                };

                initToolbarBootstrapBindings();

                $('#editor').wysiwyg({

                    fileUploadError: showErrorAlert

                });

                window.prettyPrint && prettyPrint();

            });

        </script>

        <!-- /editor -->    