	<link rel="stylesheet" href="<?php echo $this->config->item('web_url'); ?>web/css/pricing.css">
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
                        
                        <div class="col-md-12 col-sm-12 col-xs-12" id="emppricing">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Current Subscription Status</h2>
                                    <a href="<?php echo $this->config->base_url(); ?>Subscriptions/Cart"><button type="button"  class="btn btn-info pull-right" id="cart" > <i class="fa fa-shopping-cart "></i> <strong><?php echo $cart_count; ?></strong> item(s) in Cart </button></a>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <p>Premium Job(s) left : <strong><?php echo $subdetails['sub_nojobs']; ?></strong></p>
                                    <p>Premium Job(s) expires on :  <strong><?php echo ($subdetails['sub_expire_dt']==0)?'Not Set':date("j-M-Y", strtotime($subdetails['sub_expire_dt'])); ?></strong> </p>
                                </div>
                            </div>
                            
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Buy a Subscription</h2>
                                    
                                    <div class="form-group">
                                        <label  class="btn btn-success pull-right" id="monthly" onclick="chnglabel('Monthly','Annual','monthly','annual');"> <i class="fa fa-check-square-o"></i> Monthly </label>
                                        <label  class="btn btn-danger pull-right" id="annual" onclick="chnglabel('Annual','Monthly','annual','monthly');"> <i class="fa fa-square-o"></i> Annual </label>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>

                                <section class="pricing-plans section-padding">
                                <div class="container">

                                    <div class="row plan-duration">
                                        <div style="background: none; cursor: auto" class="plan--monthly plan--item active">
                                            <div class="row plan" id="monthlydiv" >
                                                <div class="plans">
                                                	<?php if(!empty($mon_plan)) { $x=0; foreach ($mon_plan as $result) { $x++; ?>
                                                    <div class="plan-item <?php echo($x==1)?'lite':''; ?>" <?php echo($x==1)?'style="border-left: 1px solid #333;"':''; ?>>
                                                        <div class="plan-header"><p class="plan__name small-uppercase--bold"><?php echo $result->pr_name;?></p></div>
                                                        <div class="price oldprice">
                                                            <span><i class="fa fa-usd"></i></span> <?php echo number_format($result->pr_orginal,0);?> 
                                                        </div>
                                                        <br>
                                                        <div class="price">
                                                            <span><i class="fa fa-usd"></i></span> <?php echo number_format($result->pr_offer,0);?> 
                                                        </div>
                                                        <div class="plan-mobile">
                                                            <p class="name__mobile"> <?php echo $result->pr_name;?> </p>
                                                            <p class="small-uppercase--bold"> <?php echo $result->pr_limit;?> Premium <?php echo ($result->pr_limit==1)?'Job':'Jobs';?></p>
                                                        </div>
                                                        <div>
                                                            <a data-tooltip="An Premium job is a position you are hiring for" class="jobsplan"> <?php echo $result->pr_limit;?> Premium <?php echo ($result->pr_limit==1)?'Job':'Jobs';?> </a>
                                                        </div>
                                                        <div> <a class="days"> <strong>30</strong> days validity </a> </div>
                                                        <div class="distxt"> Unlimited Candidates</div>
                                                        <br />
                                                        <?php if($result->pr_notify != '') { ?>
                                                        <a href="<?php echo $this->config->base_url();?>Subscriptions/Order/<?php echo $result->pr_encrypt_id;?>" class="btn btn--primary">Add to cart</a>
                                                        <div class="popular-plan small-uppercase--bold"> <span><?php echo $result->pr_notify;?></span> </div>
                                                        <?php } else { ?>
                                                        <a href="<?php echo $this->config->base_url();?>Subscriptions/Order/<?php echo $result->pr_encrypt_id;?>" class="btn btn--border">Add to cart</a>
                                                        <?php } ?>
                                                    </div>
													<?php } } ?>
                                                    
                                                
                                                </div>
                                            </div>
                                            
                                            <div class="row plan" id="annualdiv" style="display:none;">
                                                <!--<span class="annual-text"> Just pay only for the jobs you post. </span>-->
                                                <div class="plans">
                                                    <?php if(!empty($ann_plan)) { $x=0; foreach ($ann_plan as $result) { $x++; ?>
                                                    <div class="plan-item <?php echo($x==1)?'lite':''; ?>" <?php echo($x==1)?'style="border-left: 1px solid #333;"':''; ?>>
                                                        <div class="plan-header"><p class="plan__name small-uppercase--bold"><?php echo $result->pr_name;?></p></div>
                                                        <div class="price oldprice">
                                                            <span><i class="fa fa-usd"></i></span> <?php echo number_format($result->pr_orginal,0);?> 
                                                        </div>
                                                        <br>
                                                        <div class="price">
                                                            <span><i class="fa fa-usd"></i></span> <?php echo number_format($result->pr_offer,0);?> 
                                                        </div>
                                                        <div class="plan-mobile">
                                                            <p class="name__mobile"> <?php echo $result->pr_name;?> </p>
                                                            <p class="small-uppercase--bold"> <?php echo $result->pr_limit;?> Premium <?php echo ($result->pr_limit==1)?'Job':'Jobs';?></p>
                                                        </div>
                                                        <div>
                                                            <a data-tooltip="An Premium job is a position you are hiring for" class="jobsplan"> <?php echo $result->pr_limit;?> Premium <?php echo ($result->pr_limit==1)?'Job':'Jobs';?> </a>
                                                        </div>
                                                        <div> <a class="days"> <strong>1</strong> year validity </a> </div>
                                                        <div class="distxt"> Unlimited Candidates</div>
                                                        <br />
                                                        <?php if($result->pr_notify != '') { ?>
                                                        <a href="<?php echo $this->config->base_url();?>Subscriptions/Order/<?php echo $result->pr_encrypt_id;?>" class="btn btn--primary">Add to cart</a>
                                                        <div class="popular-plan small-uppercase--bold"> <span><?php echo $result->pr_notify;?></span> </div>
                                                        <?php } else { ?>
                                                        <a href="<?php echo $this->config->base_url();?>Subscriptions/Order/<?php echo $result->pr_encrypt_id;?>" class="btn btn--border">Add to cart</a>
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
	
}

</script>