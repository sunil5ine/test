	<style>
	.contact-main h2 {
		text-align: center;
	}
	.contact-left {
		/*text-align: center;*/
		padding-top: 2em;
		padding-left:60px;
	}
	.contact-left a{
		color:#000;
		text-decoration:none;
	}
	.map{
		background-color: rgba(119, 119, 119, 0.12);
		padding-bottom: 4em;
	}
	iframe{
		 width:100%;
		 height:400px;
		 margin-bottom:10px;
	}
	.contact-main form input[type="submit"] {
		font-size: 18px;
		padding: 5px;
		width: 100%;
	}
	@media(max-width:320px){
		.contact-main form input[type="submit"] {
			width: 45%;
			font-size: 12px;
		}
		.contact-main h3 {
			font-size: 1.7em;
			margin: -1px 0px 0.5em 0px;
		}
		.contact-left {
			padding-top: 1em;
			padding-left:0px;
		}
	}
	</style>

	<section id="commonsection">
		<div class="container">
            <div class="row">
                <!--contact start here-->
                <div class="contact-main">
                    <h2>Contact Us </h2>
                    <?php if(isset($status) && $status=='success') { echo $message; } if(isset($status) && $status=='fail') { echo $message; } ?>
                    <div class="col-md-8 contact-right">
                        <form name="contactfrm" action="<?php echo $this->config->base_url();?>Contact" method="post" id="contactfrm" data-toggle="validator" role="form">
                            <div class="form-group row">
                                <div class="col-md-12 space-top-20">          
                                    <label for="cname" class="control-label">Name</label>                	  
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                        <input type="text" class="form-control" id="cname" name="cname" value="" placeholder="Name" required>
                                    </div>
                                    <span id="cname_validate"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 space-top-20">      
                                    <label for="cemail" class="control-label">Email</label>                    	  
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email" class="form-control" id="cemail" name="cemail" value="" placeholder="Email" required>
                                    </div>
                                    <span id="cemail_validate"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 space-top-20">       
                                    <label for="cphone" class="control-label">Contact No</label>                   	  
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                        <input type="text" class="form-control" id="cphone" name="cphone" value="" placeholder="Contact No" required>
                                    </div>
                                    <span id="cphone_validate"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12 space-top-20">    
                                    <label for="cmsg" class="control-label">Message</label>                      	  
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-info"></i></span>
                                        <textarea placeholder="Message"  class="form-control" name="cmsg" id="cmsg" required></textarea>
                                    </div>
                                    <span id="cmsg_validate"></span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-8 space-top-20">    
                                    <label for="captcha" class="control-label col-sm-3">Verify you are human</label>
                                    <div class="input-group">
                                        <div class="col-sm-3"><?php echo $number1.' + '.$number2.' = '; ?></div>
                                        <div class="col-sm-4">
                                            <input autocomplete="off" class="form-control" type="text" name="captcha" id="captcha" value="" required>
                                        </div>
                                    </div>
                                    <span id="captcha_validate"></span>
                                </div>
                                <div class="col-md-4 space-top-20">
                                <input type="submit" value="Submit" class="btn btn-success pull-right" onclick="ga('send', 'event', { eventCategory: 'Contact Us', eventAction: 'Contact Query', eventLabel: 'Contact Form', eventValue: 1});">
                            </div>
                            </div>
                            
                        </form>
                    </div>
                    <div class="col-md-4 contact-left">
                        <div itemscope itemtype="http://schema.org/PostalAddress">  
                            <h4><span itemprop="name">Cherry Hire Bahrain Address</span></h4>
                           <p> <!-- <span itemprop="streetAddress">IPF Consulting WLL<br> -->
                            PO Box 76056<br><!-- , IPF Tower, Office No.33<br>
                            Building No. 872, Road 3618</span>, <span itemprop="addressLocality">Block 436</span><br>
                            <span itemprop="addressRegion">Seef</span>, <span itemprop="addressCountry">Kingdom of Bahrain</span><br> -->
                            <!-- <span itemprop="telephone">Phone :+973 1711 2166</span><br> -->
                            Email: <a href="mailto:support@cherryhire.com"><span itemprop="email">support@cherryhire.com</span></a></p>
                        </div>
                    
                    </div>
                </div>
        	</div>
        </div>
    	<div class="clearfix"> </div>
    </section>


	<script type="text/javascript">
		/************Form Validation*****************/
		jQuery(document).ready(function ($) {
			/***********************************************************/
			$('#cname').bind('keyup blur',function(){ 
				var node = $(this);
				node.val(node.val().replace(/[^a-zA-Z ]/g,'')); 
			});
			
			$('#cname').bind('keypress', function(e) {
				var charCode = e.keyCode || e.which;
				var val = $('#cname').val();
				 if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123) || (charCode==8)  || (charCode==32))
				 {
					 $('#cname').val(val.substr(0, 1).toUpperCase() + val.substr(1));
					 return true;
				 }
				 else {
					return false;
				 }
			});
			
			$('#cname').change(function(){
				var val = $('#cname').val();	
				$('#cname').val(val.substr(0, 1).toUpperCase() + val.substr(1));
			});
			/*************************************************************/
		
			// Function that validates email address through a regular expression.
			function validateEmail(sEmail) {
				var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,10}$/;
				if (filter.test(sEmail)) {
					return true;
				}
				else {
					return false;
				}
			}
		
			$.validator.addMethod("formatEmail", function(value, element) {
				var response;	
				var sEmail = value;
				var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,10}$/;
				if (filter.test(sEmail)) {
					return true;
				}
				else {
					return false;
				}	
			}, "");
		
		
			/**************************************************************/
			$("#contactfrm").validate({
				 rules: {
					cname:{
						required: true
					},
					cemail:{ 
					   required: true,
					   email: true,
					   formatEmail: true
					},
					cphone:{ 
					   required: true
					},
					cmsg:{ 
					   required: true
					},
					captcha:{ 
					   required: true
					}
				 },
				 messages: {
					cname:{
						required: 'Enter your name'
					},
					cemail:{ 
					   required: 'Enter your email id',
					   email: 'Enter a valid email id',
					   formatEmail: 'Enter a valid email id',
					},
					cphone:{
						required: 'Enter your contact number'
					},
					cmsg:{
						required: 'Enter your message'
					},
					captcha:{
						required: 'Verification required'
					}
				 },
				errorPlacement : function(error, element) {
					//$('#EmpAlert').append(error);
					var name = $(element).attr("name");
					error.appendTo($("#" + name + "_validate"));
				},
				success: function (label, element) {
					label.parent().removeClass('error');
					label.remove();
				}
			});
			/*************************************************************/
		});
	</script>