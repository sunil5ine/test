	<link href="<?php echo $this->config->base_url();?>web/css/pricing.css" rel="stylesheet">

    <link href="<?php echo $this->config->base_url();?>web/css/plan-theme.css" rel="stylesheet">



	<section id="candpricing">

        <div class="container">

            <div class="row">

            	<div class="col-md-12">

                     <div class="pricing-plans ">

                        <h3>Pricing Plan</h3>

                        <p>Choose the best plan which suits you. Get started today to experience the benefits of a premium account!</p>

                      </div>

                      

                      <section class="pricing-plans section-padding">

                                <div class="container">

                

                                    <div class="row plan-duration">

                                        <div style="background: none; cursor: auto" class="plan--monthly plan--item active">

                                            <div class="row plan" id="monthlydiv" >

                                                <div class="plans">

                                                    <div class="col-xs-12 padding-xs-0">

                                                        <div class="col-sm-12 padding-0">

                                                            <div class="row brdr-btm-grey">

                                                                <div class="col-xs-12 col-sm-offset-3 col-sm-12 col-md-offset-3 col-md-12">

                                                                    <div class="row">

                                                                        <div class="col-xs-12 col-sm-2 plan-col-head text-center plan-header pad-bottom-10" style="padding-top:0px;">

                                                                            <div class="font-30 pad-top-20 basic-plan plan-header"><p class="plan__name small-uppercase--bold">Starter</p></div>

                                                                            <?php if($this->session->userdata('cand_chid')) { ?> <a class="btn btn-default raise-2" href="" disabled>Active</a> <?php } else { ?>

                                                                            <a class="btn btn-success raise-2" href="<?php echo $this->config->base_url().'PostCV';?>">Free</a>

                                                                            <?php } ?>

                                                                            <div class="hidden-sm hidden-md hidden-lg clr-white">

                                                                                <div class="pad-top-10 pad-bottom-15"><b>Free*</b></div>

                                                                                <div class="pad-bottom-15"><i class="fa fa-check-circle text-success"></i> Validity 7 days</div>

                                                                                <div class="pad-bottom-15">1 application</div>

                                                                                <div class="pad-bottom-15">Personalised Job Alerts</div>

                                                                                <div class="pad-bottom-15">View Employer Details</div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="hidden-sm hidden-md hidden-lg">

                                                                            &nbsp;

                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-2 plan-col-head text-center pad-bottom-10 plan-header" style="padding-top:0px;">

                                                                            <div class="font-30 pad-top-20 gold-plan plan-header"><p class="plan__name small-uppercase--bold">Standard</p></div>

                                        

                                                                            <div class="half-year-price price-box">

                                                                            	<?php if($this->session->userdata('cand_chid')) { ?> <a class="btn btn-success raise-2" href="http://www.staging.cherryhire.com/candidate/Subscriptions/Order/2c946d595a3f573facffd9938f2aad7d">Try Now</a> <?php } else { ?>

                                                                                <a class="btn btn-success raise-2" href="#buynowModal" role="button" data-toggle="modal" id="buynow_btn">Buy Now</a>

                                                                                <?php } ?>

                                                                            </div>

                                                                            

                                                                            <div class="hidden-sm hidden-md hidden-lg clr-white">

                                                                                <div class="pad-top-10 pad-bottom-15"><b><i class="fa fa-usd"></i> 10</b></div>

                                                                                <div class="pad-bottom-15"><i class="fa fa-check-circle text-success"></i> Validity 1 month</div>

                                                                                <div class="pad-bottom-15">3 applications</div>

                                                                                <div class="pad-bottom-15">Personalised Job Alerts</div>

                                                                                <div class="pad-bottom-15">View Employer Details</div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="hidden-sm hidden-md hidden-lg">

                                                                            &nbsp;

                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-2 plan-col-head text-center pad-bottom-10 plan-header" style="padding-top:0px;">

                                                                            <div class="font-30 pad-top-20 gold-plan plan-header"><p class="plan__name small-uppercase--bold">Premium</p></div>

                                                                            <div class="half-year-price price-box">

                                                                            	<?php if($this->session->userdata('cand_chid')) { ?> <a class="btn btn-danger raise-2" href="http://www.staging.cherryhire.com/candidate/Subscriptions/Order/92b97aeeee65867da0d0c39c7ac4eb68">Try Now</a> <?php } else { ?>

                                                                                <a class="btn btn-danger raise-2" href="#buynowModal" role="button" data-toggle="modal" id="buynow_btn">Buy Now</a>

                                                                                <?php } ?>

                                                                            </div>

                                                                            <div class="most-popular-plan small-uppercase--bold"> <span>Most popular</span> </div>

                                                                            

                                                                            <div class="hidden-sm hidden-md hidden-lg clr-white">

                                                                                <div class="pad-top-10 pad-bottom-15"><b><i class="fa fa-usd"></i> 25</b></div>

                                                                                <div class="pad-bottom-15"><i class="fa fa-check-circle text-success"></i> Validity 2 months</div>

                                                                                <div class="pad-bottom-15">5 applications</div>

                                                                                <div class="pad-bottom-15">Personalised Job Alerts</div>

                                                                                <div class="pad-bottom-15">View Employer Details</div>

                                                                                <div class="pad-bottom-15">Learn Who Viewed Your Profile</div>

                                                                            </div>

                                                                        </div>

                                                                        <div class="hidden-sm hidden-md hidden-lg">

                                                                            &nbsp;

                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-2 plan-col-head text-center pad-bottom-10 plan-header" style="padding-top:0px;">

                                                                            <div class="font-30 pad-top-20 gold-plan plan-header"><p class="plan__name small-uppercase--bold">Platinum</p></div>

                                                                            <div class="half-year-price price-box">

                                                                            	<?php if($this->session->userdata('cand_chid')) { ?> <a class="btn btn-success raise-2" href="http://www.staging.cherryhire.com/candidate/Subscriptions/Order/0e1ea334ea26cbedb6df7e66e8c8015d">Try Now</a> <?php } else { ?>

                                                                                <a class="btn btn-success raise-2" href="#buynowModal" role="button" data-toggle="modal" id="buynow_btn">Buy Now</a>

                                                                                <?php } ?>

                                                                            </div>

                                                                            

                                                                            <div class="hidden-sm hidden-md hidden-lg clr-white">

                                                                                <div class="pad-top-10 pad-bottom-15"><b><i class="fa fa-usd"></i> 75</b></div>

                                                                                <div class="pad-bottom-15"><i class="fa fa-check-circle text-success"></i> Validity 3 months </div>

                                                                                <div class="pad-bottom-15">10 applications </div>

                                                                                <div class="pad-bottom-15">Personalised Job Alerts</div>

                                                                                <div class="pad-bottom-15">View Employer Details</div>

                                                                                <div class="pad-bottom-15">Learn Who Viewed Your Profile</div>

                                                                                <div class="pad-bottom-15">More Profile Views (Profile Boost</div>

                                                                                <div class="pad-bottom-15">Assisted Job Search</div>

                                                                                <div class="pad-bottom-15">Resume Review</div>

                                                                                <div class="pad-bottom-15">Profile Enrichment</div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                           <div class="row hidden-xs">

                                                                <div class="col-xs-12 plan-list">

                                                                    <div class="row brdr-btm-grey">

                                                                        <div class="col-xs-12 col-sm-3 col-md-3 plan-col txt-left">

                                                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" class="hidden-xs text-dark-grey text-capitalize" data-original-title="Price.">Price <i class="fa fa-question-circle text-grey"></i></a>

                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-8 col-md-8">

                                                                            <div class="row">

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <strong>Free*</strong>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-usd"></i> <strong>10</strong>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-usd"></i> <strong>25</strong>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-usd"></i> <strong>75</strong>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row brdr-btm-grey">

                                                                        <div class="col-xs-12 col-sm-3 col-md-3 plan-col txt-left">

                                                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" class="hidden-xs text-dark-grey text-capitalize" data-original-title="Validity Period.">Validity Period <i class="fa fa-question-circle text-grey"></i></a>

                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-8 col-md-8">

                                                                            <div class="row">

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    7 days

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    1 month

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    2 months

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    3 months

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row brdr-btm-grey">

                                                                        <div class="col-xs-12 col-sm-3 col-md-3 plan-col txt-left">

                                                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" class="hidden-xs text-dark-grey text-capitalize" data-original-title="Job applications.">Job applications <i class="fa fa-question-circle text-grey"></i></a>

                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-8 col-md-8">

                                                                            <div class="row">

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    1

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    3

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    5

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    10

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row brdr-btm-grey">

                                                                        <div class="col-xs-12 col-sm-3 col-md-3 plan-col txt-left">

                                                                            <span>

                                                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" class="hidden-xs text-dark-grey text-capitalize" data-original-title="Personalised Job Alerts.">Personalised Job Alerts <i class="fa fa-question-circle text-grey"></i></a>

                                                                        </span>

                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-8 col-md-8">

                                                                            <div class="row">

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-check yes-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-check yes-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-check yes-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-check yes-avail"></i>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row brdr-btm-grey">

                                                                        <div class="col-xs-12 col-sm-3 col-md-3 plan-col txt-left">

                                                                            <span>

                                                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" class="hidden-xs text-dark-grey text-capitalize" data-original-title=" View Employer Details. ">View Employer Details <i class="fa fa-question-circle text-grey"></i></a>

                                                                        </span>

                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-8 col-md-8">

                                                                            <div class="row">

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-check yes-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-check yes-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-check yes-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-check yes-avail"></i>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row brdr-btm-grey">

                                                                        <div class="col-xs-12 col-sm-3 col-md-3 plan-col txt-left">

                                                                            <span>

                                                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" class="hidden-xs text-dark-grey text-capitalize" data-original-title="Learn Who Viewed Your Profile">Learn Who Viewed Your Profile <i class="fa fa-question-circle text-grey"></i></a>

                                                                        </span>

                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-8 col-md-8">

                                                                            <div class="row">

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-remove no-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-remove no-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-check yes-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-check yes-avail"></i>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row brdr-btm-grey">

                                                                        <div class="col-xs-12 col-sm-3 col-md-3 plan-col txt-left">

                                                                            <span>

                                                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" class="hidden-xs text-dark-grey text-capitalize" data-original-title="More Profile Views (Profile Boost)">More Profile Views (Profile Boost) <i class="fa fa-question-circle text-grey"></i></a>

                                                                        </span>

                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-8 col-md-8">

                                                                            <div class="row">

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-remove no-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-remove no-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-remove no-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-check yes-avail"></i>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row brdr-btm-grey">

                                                                        <div class="col-xs-12 col-sm-3 col-md-3 plan-col txt-left">

                                                                            <span>

                                                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" class="hidden-xs text-dark-grey text-capitalize" data-original-title="Assisted Job Search">Assisted Job Search<i class="fa fa-question-circle text-grey"></i></a>

                                                                        </span>

                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-8 col-md-8">

                                                                            <div class="row">

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-remove no-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-remove no-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-remove no-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-check yes-avail"></i>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="row brdr-btm-grey">

                                                                        <div class="col-xs-12 col-sm-3 col-md-3 plan-col txt-left">

                                                                            <span>

                                                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" class="hidden-xs text-dark-grey text-capitalize" data-original-title="Resume Review">Resume Review <i class="fa fa-question-circle text-grey"></i></a>

                                                                        </span>

                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-8 col-md-8">

                                                                            <div class="row">

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-remove no-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-remove no-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-remove no-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center">

                                                                                    <i class="fa fa-check yes-avail"></i>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    

                                                                    <div class="row brdr-btm-grey">

                                                                        <div class="col-xs-12 col-sm-3 col-md-3 plan-col txt-left">

                                                                            <span>

                                                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="" class="hidden-xs text-dark-grey text-capitalize" data-original-title="Profile Enrichment">Profile Enrichment <i class="fa fa-question-circle text-grey"></i></a>

                                                                        </span>

                                                                        </div>

                                                                        <div class="col-xs-12 col-sm-8 col-md-8">

                                                                            <div class="row">

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center btm-grey-brdr">

                                                                                    <i class="fa fa-remove no-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center btm-grey-brdr">

                                                                                    <i class="fa fa-remove no-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center btm-popular-brdr">

                                                                                    <i class="fa fa-remove no-avail"></i>

                                                                                </div>

                                                                                <div class="col-xs-3 col-sm-3 plan-col text-center btm-grey-brdr">

                                                                                    <i class="fa fa-check yes-avail"></i>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    </div>

                                                	<div class="clearfix"> </div>

                                                </div>

                                            </div>

                                        </div>

                                        

                                    </div>

									<div class="clearfix"> </div>

                                </div>

                                

                                <div class="clearfix"> </div>

                            </section>

                      <div class="clearfix"> </div>

                      

                 </div> 

                <div class="clearfix"></div>

 	  	   </div>

           

        </div>

    </section>

    <div id="buynowModal" class="modal fade">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">Job Seeker</h4>

                </div>

                <div class="modal-body">

                    <div class="col-md-12 text-center pad-bottom-20">

                    <a href="http://www.staging.cherryhire.com/candidate"><button  class="btn btn-success mb25" > Already Registered </button></a>

                    <a href="<?php echo $this->config->base_url().'PostCV';?>"><button class="btn btn-danger mb25"> New Registration </button></a>

                     

                     </div>

                     <div class="clearfix"> </div>

                </div>

            </div>

        </div>

         <div class="clearfix"> </div>

    </div>

    <script type="text/javascript">

		$(document).ready(function() {

			$(function () {

				jQuery('[data-toggle="tooltip"]').tooltip()

			});       

        });

    </script>