	<link href="<?php echo $this->config->base_url();?>web/css/pricing.css" rel="stylesheet">



    <section id="emppricing">

    	<div class="container">

    		<div class="row">

    			<div class="col-md-12">

    				<div class="pricing-plans ">

                        <h3>Pricing Plan</h3>

                        <p>Choose the best plan which suits you. Get started today to experience the benefits of a premium account!</p>

                        <div class="form-group">

                            <label  class="btn btn-success" id="monthly" onclick="changePlan('Monthly','Annual','monthly','annual');"> <i class="fa  fa-check-square"></i> Monthly </label>

                            <label  class="btn btn-danger" id="annual" onclick="changePlan('Annual','Monthly','annual','monthly');"> <i class="fa fa-square-o"></i> Annual </label>

                        </div>

                    </div>

                      

                    <section class="pricing-plans section-padding">

                        <div class="container">

                            <div class="row plan-duration">

                                <div style="background: none; cursor: auto" class="plan--monthly plan--item active">

                                    <div class="row plan" id="monthlydiv" >

                                        <!--<span class="annual-text"> Just pay only for the jobs you post. </span>-->

                                        <div class="plans">

                                            <div class="plan-item lite" style="border-left: 1px solid #333;">

                                                <div class="plan-header"><p class="plan__name small-uppercase--bold">Starter</p></div>

                                                <!-- <div class="price oldprice">

                                                    <span><i class="fa fa-usd"></i></span> 25

                                                </div> -->

                                                <br>

                                                <div class="price">

                                                    <span><i class="fa fa-usd"></i></span> 19

                                                </div>

                                                <div class="plan-mobile">

                                                    <p class="name__mobile">Starter</p>

                                                    <p class="small-uppercase--bold">1 Premium Job</p>

                                                </div>

                                                <div>

                                                    <a data-tooltip="An Premium job is a position you are hiring for" class="jobsplan"> 1 Premium Job </a>

                                                </div>

                                                <div> <a class="days"> <strong>30</strong> days validity </a> </div>

                                                <div class="distxt"> Unlimited Candidates</div>

                                                <a href="<?php echo $this->config->base_url();?>PostJob" class="btn btn--border">Buy Now</a>

                                            </div>



                                            <div class="plan-item"> <!--standard-->

                                                <div class="arrow-up"></div>

                                                <div class="plan-header"><p class="plan__name small-uppercase--bold">Advanced</p></div>

                                                <!-- <div class="price oldprice">

                                                    <span><i class="fa fa-usd"></i></span> 60

                                                </div> -->

                                                <br>

                                                <div class="price">

                                                    <span><i class="fa fa-usd"></i></span> 49

                                                </div>

                                                <div class="plan-mobile">

                                                    <p class="name__mobile">Advanced</p>

                                                    <p class="small-uppercase--bold">3 Premium Jobs</p>

                                                </div>

                                                <div>

                                                    <a data-tooltip="An Premium job is a position you are hiring for" class="jobsplan"> 3 Premium Jobs </a>

                                                </div>

                                                <div> <a class="days"> <strong>30</strong> days validity </a> </div>

                                                <div class="distxt"> Unlimited Candidates</div>

                                                <!--<a href="<?php //echo $this->config->base_url();?>PostJob" class="btn btn--primary">TRY NOW</a>-->

                                                <a class="btn btn--primary" href="#buynowModal" role="button" data-toggle="modal" id="buynow_btn">Buy Now</a>

                                                <div class="popular-plan small-uppercase--bold"> <span>Most popular</span> </div>

                                            </div>

                                            

                                            <div class="plan-item">

                                                <div class="plan-header"><p class="plan__name small-uppercase--bold">Business</p></div>

                                                <!-- <div class="price oldprice">

                                                    <span><i class="fa fa-usd"></i></span> 120

                                                </div> -->

                                                <br>

                                                <div class="price">

                                                    <span><i class="fa fa-usd"></i></span> 79

                                                </div>

                                                <div class="plan-mobile">

                                                    <p class="name__mobile">Business</p>

                                                    <p class="small-uppercase--bold">5 Premium Jobs</p>

                                                </div>

                                                <div>

                                                    <a data-tooltip="An Premium job is a position you are hiring for" class="jobsplan"> 5 Premium Jobs </a>

                                                </div>

                                                <div> <a class="days"> <strong>30</strong> days validity </a></div>

                                                <div class="distxt"> Unlimited Candidates</div>

                                               <!-- <a href="<?php //echo $this->config->base_url();?>PostJob" class="btn btn--border">TRY NOW</a>-->

                                                <a class="btn btn--border" href="#buynowModal" role="button" data-toggle="modal" id="buynow_btn">Buy Now</a>

                                            </div>

                                            

                                            <div class="plan-item">

                                                <div class="plan-header last"><p class="plan__name small-uppercase--bold">Pro</p></div>

                                                <!-- <div class="price oldprice">

                                                    <span><i class="fa fa-usd"></i></span> 230

                                                </div> -->

                                                <br>

                                                <div class="price">

                                                    <span><i class="fa fa-usd"></i></span> 149

                                                </div>

                                                <div class="plan-mobile">

                                                    <p class="name__mobile">Pro</p>

                                                    <p class="small-uppercase--bold">10 Premium Jobs</p>

                                                </div>

                                                <div>

                                                    <a data-tooltip="An Premium job is a position you are hiring for" class="jobsplan"> 10 Premium Jobs </a>

                                                </div>

                                                <div> <a class="days"> <strong>30</strong> days validity </a> </div>

                                                <div class="distxt"> Unlimited Candidates</div>

                                                <!--<a href="<?php //echo $this->config->base_url();?>PostJob" class="btn btn--border">TRY NOW</a>-->

                                                <a class="btn btn--border" href="#buynowModal" role="button" data-toggle="modal" id="buynow_btn">Buy Now</a>

                                                

                                            </div>

                                        

                                        </div>

                                    </div>

                                    

                                    <div class="row plan" id="annualdiv" style="display:none;">

                                        <!--<span class="annual-text"> Just pay only for the jobs you post. </span>-->

                                        <div class="plans">

                                            <div class="plan-item lite" style="border-left: 1px solid #333;">

                                                <div class="plan-header"><p class="plan__name small-uppercase--bold">Starter</p></div>

                                                <!--<div class="price oldprice">

                                                    <span><i class="fa fa-usd"></i></span> 228 

                                                </div> -->

                                                <br>

                                                <div class="price">

                                                    <span><i class="fa fa-usd"></i></span> 179 

                                                </div>

                                                <div class="plan-mobile">

                                                    <p class="name__mobile">Starter</p>

                                                    <p class="small-uppercase--bold">12 Premium Jobs</p>

                                                </div>

                                                <div>

                                                    <a data-tooltip="An Premium job is a position you are hiring for" class="jobsplan"> 12 Premium Jobs </a>

                                                </div>

                                                <div> <a class="days"> <strong>1</strong> year validity </a> </div>

                                                <div class="distxt"> Unlimited Candidates</div>

                                                <!--<a href="<?php //echo $this->config->base_url();?>PostJob" class="btn btn--border">TRY NOW</a>-->

                                                <a class="btn btn--border" href="#buynowModal" role="button" data-toggle="modal" id="buynow_btn">Buy Now</a>

                                            </div>



                                            <div class="plan-item"> <!--standard-->

                                                <div class="arrow-up"></div>

                                                <div class="plan-header"><p class="plan__name small-uppercase--bold">Advanced</p></div>

                                                <!--<div class="price oldprice">

                                                    <span><i class="fa fa-usd"></i></span> 576 

                                                </div> -->

                                                <br>

                                                <div class="price">

                                                    <span><i class="fa fa-usd"></i></span> 449 

                                                </div>

                                                <div class="plan-mobile">

                                                    <p class="name__mobile">Advanced</p>

                                                    <p class="small-uppercase--bold">36 Premium Jobs</p>

                                                </div>

                                                <div>

                                                    <a data-tooltip="An Premium job is a position you are hiring for" class="jobsplan"> 36 Premium Jobs </a>

                                                </div>

                                                <div> <a class="days"> <strong>1</strong> year validity </a> </div>

                                                <div class="distxt"> Unlimited Candidates</div>

                                                

                                                <!--<a href="<?php //echo $this->config->base_url();?>PostJob" class="btn btn--border">TRY NOW</a>-->

                                                <a class="btn btn--border" href="#buynowModal" role="button" data-toggle="modal" id="buynow_btn">Buy Now</a>

                                                

                                            </div>

                                            

                                            <div class="plan-item">

                                                <div class="plan-header"><p class="plan__name small-uppercase--bold">Business</p></div>

                                                <!--<div class="price oldprice">

                                                    <span><i class="fa fa-usd"></i></span> 1188

                                                </div> -->

                                                <br>

                                                <div class="price">

                                                    <span><i class="fa fa-usd"></i></span> 699

                                                </div>

                                                <div class="plan-mobile">

                                                    <p class="name__mobile">Business</p>

                                                    <p class="small-uppercase--bold">60 Premium Jobs</p>

                                                </div>

                                                <div>

                                                    <a data-tooltip="An Premium job is a position you are hiring for" class="jobsplan"> 60 Premium Jobs </a>

                                                </div>

                                                <div> <a class="days"> <strong>1</strong> year validity </a></div>

                                                <div class="distxt"> Unlimited Candidates</div>

                                                <!--<a href="<?php //echo $this->config->base_url();?>PostJob" class="btn btn--primary">TRY NOW</a>-->

                                                <a class="btn btn--primary" href="#buynowModal" role="button" data-toggle="modal" id="buynow_btn">Buy Now</a>

                                                <div class="popular-plan small-uppercase--bold"> <span>Most popular</span> </div>

                                            </div>

                                            

                                            <div class="plan-item">

                                                <div class="plan-header"><p class="plan__name small-uppercase--bold">Pro</p></div>

                                                <!--<div class="price oldprice">

                                                    <span><i class="fa fa-usd"></i></span> 2280

                                                </div> -->

                                                <br>

                                                <div class="price">

                                                    <span><i class="fa fa-usd"></i></span> 1299

                                                </div>

                                                <div class="plan-mobile">

                                                    <p class="name__mobile">Pro</p>

                                                    <p class="small-uppercase--bold">120 Premium Jobs</p>

                                                </div>

                                                <div>

                                                    <a data-tooltip="An Premium job is a position you are hiring for" class="jobsplan"> 120 Premium Jobs </a>

                                                </div>

                                                <div> <a class="days"> <strong>1</strong> year validity </a> </div>

                                                <div class="distxt"> Unlimited Candidates</div>

                                                <!--<a href="<?php //echo $this->config->base_url();?>PostJob" class="btn btn--border">TRY NOW</a>-->

                                                <a class="btn btn--border" href="#buynowModal" role="button" data-toggle="modal" id="buynow_btn">Buy Now</a>

                                                

                                            </div>

                                        

                                        </div>

                                    </div>

                                    <br />

                                    <!--<h3> For custom no of jobs and validy </h3>

                                    <a href="mailto:support@cherryhire.com" class="btn btn--border">Contact us</a>-->

                                </div>

                            </div>



                        </div>

                    </section>

                      

                 </div> 

                <div class="clearfix"></div>

                <div class="col-md-12 cvcount">

                	<h1>100,000 +</h1>

					<h3>Candidate Applications Delivered</h3>

                </div>   

                <div class="clearfix"></div>

                <div class="col-md-12 jblist">

                	<h3>Post to 100+ Job Boards with One Submission</h3>

                    <div class="jblist-list text-center">

                        <ul class="list-inline">

                            <li class="jbimg"><img src="<?php echo $this->config->base_url();?>media/jobboard/fb.png" class="img-responsive"/></li>

                            <li class="jbimg"><img src="<?php echo $this->config->base_url();?>media/jobboard/twitter.png" class="img-responsive" /></li>

                            <li class="jbimg"><img src="<?php echo $this->config->base_url();?>media/jobboard/gplus.png" class="img-responsive" /></li>

                            <li class="jbimg"><img src="<?php echo $this->config->base_url();?>media/jobboard/indeed.png" class="img-responsive" /></li>

                            <li class="jbimg"><img src="<?php echo $this->config->base_url();?>media/jobboard/cherryhire.png" class="img-responsive" /></li>

                            <li class="jbimg"><img src="<?php echo $this->config->base_url();?>media/jobboard/ipf.png" class="img-responsive" /></li>

                            <li class="jbimg"><img src="<?php echo $this->config->base_url();?>media/jobboard/linkedin.png" class="img-responsive" /></li>

                    	</ul>

                    </div>

                    <div class="clearfix"></div>

                </div>            

 	  	   </div>

           

        </div>

    </section>

    

    <div id="buynowModal" class="modal fade">

        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                    <h4 class="modal-title">Employer</h4>

                </div>

                <div class="modal-body">

                    <div class="col-md-12 text-center pad-bottom-20">

                    <a href="http://www.staging.cherryhire.com/hire"><button  class="btn btn-success mb25" > Already Registered </button></a>

                    <a href="<?php echo $this->config->base_url().'PostJob';?>"><button class="btn btn-danger mb25"> New Registration </button></a>

                     

                     </div>

                     <div class="clearfix"> </div>

                </div>

            </div>

        </div>

         <div class="clearfix"> </div>

    </div>

    

    <script type="text/javascript">

		function changePlan(labltxt, clabltxt, thelabel, clabel)

		{

			var labelvar = document.getElementById(thelabel);

			var clabelvar = document.getElementById(clabel);

			var sid = document.getElementById(thelabel+'div');

			var hid = document.getElementById(clabel+'div');

			labelvar.innerHTML = "<i class='fa fa-check-square'></i> " + labltxt;

			clabelvar.innerHTML = "<i class='fa fa-square-o'></i> " + clabltxt;

			

			$(labelvar).addClass('btn-success');	

			$(labelvar).removeClass('btn-danger');	

			$(clabelvar).addClass('btn-danger');	

			$(clabelvar).removeClass('btn-success');	

			

			$(hid).hide();

			$(sid).show();

		}

	</script>

