	<script src="web/js/jquery.accordion.js"></script>
    <style>
		#faqsection {
			padding-top:30px;	
		}
		#faqsection h3{
			margin-top:0px;	
			font-size:22px;
		}
		#sidebar {
			float: left;
			width: 90%;
		}
		#faqsection .nav a {
			background-color: #dd1b2c;
			color: #fff;
			font-size: 1.1em;
			padding: 10px 20px;
		}
		.left_box {
			background-color: #fff;
			border: 1px solid #e3e3e3;
			border-radius: 5px;
			margin: 1em 0;
			padding: 10px;
			text-align: center;
		}
		#faqsection p {
			color: #000;
			font-size: 1.2em;
			font-weight: 600;
			margin: 1em 0;
		}
		.orangeText {
			color: #dd6e00 !important;
		}
		#faqsection .faq_section p {
			color: #000;
			font-size: 1em;
			font-weight: normal;
			margin: 0;
		}
		#faqsection .panel-primary {
			border-color: #333;
		}
		#faqsection .panel-primary > .panel-heading {
			background-color: #333;
			border-color: #333;
			color: #fff;
		}
	</style>
    
    <section id="faqsection">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div id="sidebar">
                        <ul class="nav nav-stacked ">
                            <li class="active"><a href="#postjob">Posting Jobs</a></li>
                            <li><a href="#howwork">How it works</a></li>
                            <li><a href="#sysissue">System Issues</a></li>
                            <li><a href="#gnquest">General Questions</a></li>
                            <li><a href="#accbill">Account and Billing</a></li>                  
                        </ul>
            
                        <div class="left_box hidden-xs"> 
                            <p>Get Started Today</p>                            
                            <h5>Post your first job in minutes.</h5>                            
                            <p class="orangeText">FREE trial!</p>
                            <a href="<?php echo $this->config->base_url().'PostJob';?>" class="btn btn-success">Post a Job</a>
                            <p class="fItalic grayText font14">Satisfaction guaranteed!</p>
                        </div>
                        
                        <div class="left_box hidden-xs"> 
                            <p>Are You a Job Seeker?</p>
                            <h5>Post your resume now</h5>
                            <a href="<?php echo $this->config->base_url().'PostCV';?>" class="btn btn-success">Post CV</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <h3>Frequently Asked Questions</h3>
                    <p id="postjob">POSTING JOBS</p>
                    <div class="faq_section">
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_a1"> What is a Premium Job?</div>
                          <div class="panel-body acc-open" data-acc-content="faq_sec_a1">
                            <p>It is a job posting which can be posted to free and paid job portals. If a job posting created in Cherry Hire is to be promoted on such job portals then the job needs to be upgraded as a Premium job. You can buy Premium job slots from the “Pricing” page under employer tab on our website.</p>
                          </div>
                        </div>
            
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_a2"> What is the validity of a Premium Job posted?</div>
                          <div class="panel-body" data-acc-content="faq_sec_a2">
                            <p>The validity is 30 days.</p>
                          </div>
                        </div>
            
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_a3"> Is there any extra fee for posting jobs to paid job portals? </div>
                          <div class="panel-body" data-acc-content="faq_sec_a3">
                            <p>No extra fee is charged for such posts.</p>
                          </div>
                        </div>
            
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_a4">What happens when I run out of jobs that I purchased? </div>
                          <div class="panel-body" data-acc-content="faq_sec_a4">
                            <p>You can subscribe again and get premium jobs as required.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_a5">How long does it take for my job to appear on job portals? </div>
                          <div class="panel-body" data-acc-content="faq_sec_a5">
                            <p>A new job posting will appear on the portals within 24-48hrs.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_a6"> Which social networks can Cherry Hire post to?</div>
                          <div class="panel-body" data-acc-content="faq_sec_a6">
                            <p>Cherry Hire can post to Facebook, LinkedIn, Pinterest, Twitter and Google+. </p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_a7"> What happens when I close a job?</div>
                          <div class="panel-body" data-acc-content="faq_sec_a7">
                            <p>Once the job is closed it will no longer be available for the candidates to apply. But it can be reopened and reposted as and when required at the cost of one premium job.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_a8"> How do I refresh my postings?</div>
                          <div class="panel-body" data-acc-content="faq_sec_a8">
                            <p>You can repost the job at the cost of one premium job.</p>
                          </div>
                        </div>                        
                    </div>
                    <p id="howwork">HOW IT WORKS</p>
                    <div class="faq_section">
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_b1"> How does Cherry Hire work?</div>
                          <div class="panel-body acc-open" data-acc-content="faq_sec_b1">
                            <p>Cherry Hire is your one stop shop for posting a job. You post your job through us, and we send publish your job to 50+ Job Portals, social networks and forums. This kind of exposure helps drive candidates to your position to fulfil your hiring needs fast.</p>
                          </div>
                        </div>
            
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_b2"> How does job posting to free and paid Job Portals work?</div>
                          <div class="panel-body" data-acc-content="faq_sec_b2">
                            <p>We offer two types of posting to PAID Job Portals: Shared and Master posting. Under shared posting, we post your jobs under our account. This is applicable for both Free and Paid Job Portals. Under master posting, we post your jobs under your account. For master postings you need to provide us your existing account information of the paid Job Portals. We do not offer master postings for Free Job Portals. By default everyone is subscribed to SHARED posting.</p>
                          </div>
                        </div>
            
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_b3"> Do you have any tutorials to get started?</div>
                          <div class="panel-body" data-acc-content="faq_sec_b3">
                            <p>Yes, we do. Once you login please navigate to the wiki page to find short videos which will help you get started.</p>
                          </div>
                        </div>
            
                    </div>
                    
                    <p id="sysissue">SYSTEM ISSUES</p>
                    <div class="faq_section">
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_c1"> Is my browser compatible with Cherry Hire site?</div>
                          <div class="panel-body acc-open" data-acc-content="faq_sec_c1">
                            <p>Our site works best with Firefox, Google Chrome and Internet Explorer 9.0 or higher. If you think you are experiencing a site issue it may be easily resolved by clearing your browsing history and refreshing your page. You can also go to Cherry Hire Pegs.com/cookies-clear to clear your browsing data as well. If you are still experiencing an issue, feel free to reach us through email or call the Customer Support Team for further assistance.</p>
                          </div>
                        </div>
            
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_c2"> Why can't I login to my account?</div>
                          <div class="panel-body" data-acc-content="faq_sec_c2">
                            <p>If you are having problems logging in to your account, please send an email to support@cherryhire.com.</p>
                            <p>There are also a couple solutions you might try on your own: </p>
                            <p>Reset Password: First try resetting your password, and then try to login again.
            Clear Cookies: If resetting your password does not work, you may have problems with your browser cookies. Click here to clear your Cherry Hire cookies and then try to login again. You may also delete all your cookies manually using these instructions. 
            If you still cannot login after trying these two methods, please contact us.</p>
                          </div>
                        </div>
                        
                    </div>
                    
                    <p id="gnquest">GENERAL QUESTIONS</p>
                    <div class="faq_section">
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d1"> Is there a limit on the number of candidates I can receive?</div>
                          <div class="panel-body acc-open" data-acc-content="faq_sec_d1">
                            <p>No! Every plan we offer allows an unlimited number of candidates to apply to each job.</p>
                          </div>
                        </div>
            
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d2"> What if I don't get any candidates?</div>
                          <div class="panel-body" data-acc-content="faq_sec_d2">
                            <p>A new job posting can take up to 24~48 hours to appear on outside Job Portals after you have posted. If you still haven't received any candidates after this time period, please make sure your phone number and/or email address are NOT in the job description. This is because many candidates will call or email you directly rather than applying through Cherry Hire Pegs. We distribute your job and provide the best advice we can about writing quality job titles and descriptions, but we can't guarantee applicants. Feel free to request our feedback on your job ad or ask us other related questions. Use social network and referral tools to seek more application.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d3"> When I rate a candidate using the 5-stars, or apply a status is the rating/status visible to the candidate, or anyone else for that matter?</div>
                          <div class="panel-body" data-acc-content="faq_sec_d3">
                            <p>No. Candidate ratings/status are never visible to candidates, but are shared between users within your company.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d4"> Who can view the "Internal Notes" that appear on the candidate page?</div>
                          <div class="panel-body" data-acc-content="faq_sec_d4">
                            <p>The notes are only visible to you or any users that are on your account. Candidates can never see these notes.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d5"> How can I collaborate with other team members on rating/reviewing candidates?</div>
                          <div class="panel-body" data-acc-content="faq_sec_d5">
                            <p>On the Users page, click the "Add User" button. There you can enter the name and email address of the colleague you would like to invite. Once you add the user, we will send them an invitation email. Then, they click on the link in the email and create their password. Once they are set up, they can access all of the candidates and rate them with their own ratings. You can view other users' ratings on the My Candidates page by using the filter pull-down menu at the top. You can also share internal notes on the candidate and edit their status on the Candidate Detail page.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d6"> Can I upload my own candidates?</div>
                          <div class="panel-body" data-acc-content="faq_sec_d6">
                            <p>Yes, you can manually add candidates to any job posting you have created. You can include their personal information and resume by clicking on the My Candidates page and then clicking on the 'Add New Candidate' button.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d7"> What are labels and how do I use them?</div>
                          <div class="panel-body" data-acc-content="faq_sec_d7">
                            <p>Labels are like tags that you add to candidates to make them easier to find later. You can add labels to a candidate with phrases like “Java”, "call back" or "potential interview." etc. Labels are shared across your company's Cherry Hire account but are never visible to candidates. Labels help you to quickly locate and filter required candidates.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d8"> Can I delete a label?</div>
                          <div class="panel-body" data-acc-content="faq_sec_d8">
                            <p>Yes, on an individual candidate page you can remove any currently-applied labels by clicking the Labels dropdown. You can also go the labels page and edit/delete all the labels created in the system.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d9"> How do candidates contact me?</div>
                          <div class="panel-body" data-acc-content="faq_sec_d9">
                            <p>Candidates are not contacting you unless you put your contact information in the job description. When candidates apply to your job we send you a notification email with their information and their resume is included as an attachment. All of their information is also saved in your account for you to reference once logged in.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d10"> How do I attract more candidates?</div>
                          <div class="panel-body" data-acc-content="faq_sec_d10">
                            <p>Job performance is based on a lot of factors and varies depending on industry and location. We encourage clear and concise job descriptions and titles.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d11"> Why has my candidate flow slowed down?</div>
                          <div class="panel-body" data-acc-content="faq_sec_d11">
                            <p>If you notice your candidate flow has slowed down, it may be time refresh your postings. Often jobs that are 2-3 weeks old see less traffic in comparison to the first weeks. It's a quick fix to refresh your job postings, just close the job and select the "Duplicate Job" button. This copies the content of your job but gives it a fresh date. You can then post your duplicate job and it is published to Job Portals as a new posting.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d12"> How do I add users to my account?</div>
                          <div class="panel-body" data-acc-content="faq_sec_d12">
                            <p>To add a new user to your account, click on the “Manage users” menu. There you will see an Add New User button. Click on the button to add contact information and set password. A confirmation email will be sent to the user. The user has to click on the confirmation link to activate his account. Note: You need to send the temporary password that you have set while creating the user, in a separate email to user. The user has to use this password after activating his account to login into the application.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d13"> How do I remove a user from my account?</div>
                          <div class="panel-body" data-acc-content="faq_sec_d13">
                            <p>To remove a user from your account, click on the "Delete" icon under the specific user. Once deactivated, they will not be able to login or receive any Cherry Hire emails. They will remain on the user list in a deactivated status at the bottom. You can reactivate them at any time.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d14"> What is a Hiring Company?</div>
                          <div class="panel-body" data-acc-content="faq_sec_d14">
                            <p>Cherry Hire allows you to create an unlimited number of "Hiring Companies" associated with your job postings. This gives you the power to post jobs for multiple employers under the same Cherry Hire account. Each Hiring Company has unique settings for company name, company description, logo, website and header color. Each Hiring Company also has a unique page listing all the open jobs for that Hiring Company. To manage your Hiring Companies, go to the Hiring Companies page.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d15"> How can I hide my company name from candidates?</div>
                          <div class="panel-body" data-acc-content="faq_sec_d15">
                            <p>To make your company name confidential, you have to enter something generic (like "Leading manufacturer in GCC Region.") in the Company Name field on the Hiring Companies page. This will change the displayed company name on all of your jobs and interviews for this Hiring Company (currently posted jobs will take up to 24 hours to be updated).</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d16"> How do I change my password?</div>
                          <div class="panel-body" data-acc-content="faq_sec_d16">
                            <p>Go to the Edit Profile page. Enter your new password and click the save button at the bottom to submit.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d17"> What happens when I close a job?</div>
                          <div class="panel-body" data-acc-content="faq_sec_d17">
                            <p>When you close a job, the job is removed from any Job Portals (within 24 hours), and the job URL will no longer be live for candidates to apply for your job. You will not lose any of your candidates associated with the job. You can re-post a job if it is taken offline (for instance, if your subscription is terminated temporarily).</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_d18"> How do I refresh my postings?</div>
                          <div class="panel-body" data-acc-content="faq_sec_d18">
                            <p>You need to click publish button again in the paid promotions tab. Please note this action will cost you one additional premium job.</p>
                          </div>
                        </div>
                        
                    </div>
                    <p id="accbill">ACCOUNT AND BILLING</p>
                    <div class="faq_section">
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_e1"> How will I be billed?</div>
                          <div class="panel-body acc-open" data-acc-content="faq_sec_e1">
                            <p>Billing is done as per the plan you selected.</p>
                          </div>
                        </div>
            
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_e2"> Is there any contract involved?</div>
                          <div class="panel-body" data-acc-content="faq_sec_e2">
                            <p>There is no contract involved.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_e3"> Cancellations or returns?</div>
                          <div class="panel-body" data-acc-content="faq_sec_e3">
                            <p>Ideally we don't have. But, feel free to contact our customer support at support@cherryhire.com.</p>
                          </div>
                        </div>
                        
                        <div class="panel panel-primary">
                          <div class="panel-heading" data-acc-link="faq_sec_e4">  Do you offer free trial job posting?</div>
                          <div class="panel-body" data-acc-content="faq_sec_e4">
                            <p>Yes, please choose our free trial option</p>
                          </div>
                        </div>
                        
                    </div>
                
                </div>  
        	</div>
        </div>
        <div class="clearfix"> </div>  
   	</section>
	<div class="clearfix"> </div>

	<script type="text/javascript">
		$(function() {
			$('.faq_section').accordion({ multiOpen: false });
		});
    </script>
