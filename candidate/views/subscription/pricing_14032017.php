	<link rel="stylesheet" href="<?php echo $this->config->item('web_url'); ?>css/pricing.css">
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
						<form class="form-horizontal form-label-left input_mask" action="#" method="post">
                        
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Current Subscription Status</h2>
                                    <a href="<?php echo $this->config->base_url(); ?>Subscriptions/Cart"><button type="button"  class="btn btn-info pull-right" id="cart" > <i class="fa fa-shopping-cart "></i> <strong><?php echo $cart_count; ?></strong> item(s) in Cart </button></a>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                    	<p>Current Account Type : <strong><?php echo ($subdetails['pr_id']!=0)?$subdetails['pr_name']:'Starter'; ?></strong></p>                                        
                                    	<p>Expires on :  <strong><?php echo ($subdetails['csub_expire_dt']==0)?'Not Set':date("j-M-Y", strtotime($subdetails['csub_expire_dt'])); ?></strong> </p>
                                        <p>Job(s) applied : <strong><?php echo $totjobapply.' / '.$subdetails['csub_nojobs']; ?></strong></p>
                                    </div>
                                    <!-- <div class="col-md-6 col-sm-6 col-xs-12">
                                    	<p>Latest Plan : <strong><?php //echo ($subdetails['csub_type']==2)?'Premium':'Free trial'; ?></strong></p>
                                        <p>Expires on :  <strong><?php //echo ($subdetails['csub_expire_dt']==0)?'Not Set':date("j-M-Y", strtotime($subdetails['csub_expire_dt'])); ?></strong> </p>
                                    </div> -->
                                    
                                    
                                    
                                </div>
                            </div>
                            
                            <div class="x_panel">
                                <!-- <div class="x_title">
                                    <h2>Buy a Subscription</h2>                                   
                                    
                                    <div class="clearfix"></div>
                                </div> -->

                                <section class="pricing-plans section-padding">
                                <div class="container">

                                    <div class="row plan-duration">
                                        <div style="background: none; cursor: auto" class="plan--monthly plan--item active">
                                            <div class="row plan" id="monthlydiv" >
                                                <div class="plans">
                                                	<div class="plan-item">
                                                        <div class="plan-header"><p class="plan__name small-uppercase--bold">Starter</p></div>                                                        
                                                        <div class="price">
                                                            Free 
                                                        </div>
                                                        <div class="plan-mobile">
                                                            <p class="name__mobile"> Starter </p>
                                                            <p class="small-uppercase--bold"> 1 job</p>
                                                        </div>
                                                        <div>
                                                            <a data-tooltip="An Premium job is a position you can apply for" class="jobsplan"> 1 job </a>
                                                        </div>
                                                        <div> <a class="days"> <strong>7</strong> days validity </a> </div>
                                                        <div class="distxt">
                                                        <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" class="hidden-xs text-success text-capitalize" data-html="true" data-original-title="- Personalised Job Alerts <br> - View Employer Details"><strong>KNOW MORE...</strong><i class="fa fa-question-circle text-success"></i></a>
                                                        </div>                                                        
                                                        <button type="button"  class="btn btn-danger" id="cart" >Active</button>
                                                    </div>
                                                    
                                                	<?php if(!empty($mon_plan)) { $x=0; foreach ($mon_plan as $result) { $x++; ?>
                                                    <div class="plan-item <?php echo($x==1)?'lite':''; ?>">
                                                        <div class="plan-header"><p class="plan__name small-uppercase--bold"><?php echo $result->pr_name;?></p></div>
                                                        <!-- <div class="price oldprice">
                                                            <span><i class="fa fa-usd"></i></span> <?php //echo number_format($result->pr_orginal,0);?> 
                                                        </div>
                                                        <br> -->
                                                        <div class="price">
                                                            <span><i class="fa fa-usd"></i></span> <?php echo number_format($result->pr_offer,0);?> 
                                                        </div>
                                                        <div class="plan-mobile">
                                                            <p class="name__mobile"> <?php echo $result->pr_name;?> </p>
                                                            <p class="small-uppercase--bold"> <?php echo $result->pr_nojob;?> jobs</p>
                                                        </div>
                                                        <div>
                                                            <a data-tooltip="An Premium job is a position you can apply for" class="jobsplan"> <?php echo $result->pr_nojob;?> jobs </a>
                                                        </div>
                                                        <div> <a class="days"> <strong><?php echo $result->pr_limit;?></strong> month validity </a> </div>
                                                        <div class="distxt">
                                                        <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" class="hidden-xs text-success text-capitalize" data-html="true" data-original-title="<?php echo $result->pr_details;?>"><strong>KNOW MORE...</strong><i class="fa fa-question-circle text-success"></i></a>
                                                        </div>
                                                        
                                                        <?php if($result->pr_notify != '') { ?>
                                                        <a href="<?php echo $this->config->base_url();?>Subscriptions/Order/<?php echo $result->pr_encrypt_id;?>" class="btn--primary">ADD TO CART</a>
                                                        <div class="popular-plan small-uppercase--bold"> <span><?php echo $result->pr_notify;?></span> </div>
                                                        <?php } else { ?>
                                                        <a href="<?php echo $this->config->base_url();?>Subscriptions/Order/<?php echo $result->pr_encrypt_id;?>" class="btn--border">ADD TO CART</a>
                                                        <?php } ?>
                                                    </div>
													<?php } } ?>
                                                    
                                                
                                                </div>
                                            </div>                                           
                                            
                                            
                                        </div>
                                    </div>

                                </div>
                            </section>
                                
                            </div>
                            
                            <div class="ln_solid"></div>
                                
                            <!--<div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-5">
                                    <button type="reset" class="btn btn-primary"  tabindex="17">Cancel</button>
                                    <button type="submit" class="btn btn-success"  tabindex="16">Submit</button>
                                </div>
                            </div>-->
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
<script type="text/javascript">
function chnglabel(labltxt, clabltxt, thelabel, clabel) {
    var labelvar = document.getElementById(thelabel);
	var clabelvar = document.getElementById(clabel);
	var sid = document.getElementById(thelabel+'div');
	var hid = document.getElementById(clabel+'div');
	labelvar.innerHTML = "<i class='fa fa-check-square-o'></i> " + labltxt;
	clabelvar.innerHTML = "<i class='fa fa-square-o'></i> " + clabltxt;
    
	$(labelvar).addClass('btn-success');	
	$(labelvar).removeClass('btn-danger');	
	$(clabelvar).addClass('btn-danger');	
	$(clabelvar).removeClass('btn-success');	
	
	$(hid).hide();
	$(sid).show();
	
	$(document).ready(function() {
        $(function () {
            jQuery('[data-toggle="tooltip"]').tooltip()
        });       
	});
}

</script>