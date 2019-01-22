<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['Dashboard']                         = "dashboard/index";
$route['MyProfile']                         = "dashboard/index";
$route['ProfileSettings']                   = "dashboard/profile";
$route['Support']                           = "dashboard/support";
$route['PasswordValid']                     = "dashboard/chk_curr_password";
$route['Jobs']                              = "dashboard/index";

$route['MyJobs']                            = "jobs/viewlist";
$route['Jobs/Viewdetails/(:any)']           = "jobs/viewjob_details/$1";
$route['Jobs/ApplyJob/(:any)']              = "jobs/apply_job/$1";
$route['Jobs/EmailJob/(:any)']              = "jobs/email_job/$1";
$route['Jobs/AdvanceSearch']                = "jobs/searchjob";
$route['Jobs/SearchResult']                 = "jobs/searchjob_result";
$route['cvwriting/professional-cv']         = "Cvwriting/professional_cv";
$route['cvwriting/questionnaire/(:any)']    = "Cvwriting/questionnaire/$1";
$route['job-detail/(:any)']                 = "detail/viewjob_details/$1";

$route['Profile/Viewdetails/(:any)']        = "profile/viewdetails/$1";
$route['Profile/GetResume/(:any)']          = "profile/downloadresume/$1";

$route['UpdateBasic/(:any)']                = "candidate/update_candidate_basic/$1";
$route['UpdateSummary/(:any)']              = "candidate/update_candidate_summary/$1";
$route['UpdateWork/(:any)']                 = "candidate/update_candidate_work/$1";
$route['GetWork/(:any)']                    = "candidate/show_candidate_work/$1";
$route['EditWork/(:any)']                   = "candidate/edit_candidate_work/$1";
$route['UpdateEduDetails/(:any)']           = "candidate/update_candidate_eduq/$1";
$route['GetEduDetails/(:any)']              = "candidate/show_candidate_eduq/$1";
$route['EditEduDetails/(:any)']             = "candidate/edit_candidate_eduq/$1";
$route['EditSkill/(:any)']                  = "candidate/update_skill/$1";
$route['UpdateContactInfo/(:any)']          = "candidate/update_contact/$1";
$route['UpdateSocialMedia/(:any)']          = "candidate/update_smedia/$1";
$route['UpdateResume/(:any)']               = "candidate/update_resume/$1";
$route['UpdatePhoto/(:any)']                = "candidate/update_profile_pic/$1";
$route['DeleteCandExp/(:any)']              = "candidate/delete_candidate_work/$1";
$route['DeleteCandEdu/(:any)']              = "candidate/delete_candidate_edu/$1";

$route['JobPortal/List']                    = "jobportal/index";
$route['JobPortal/Job']                     = "jobportal/jobdetails";
$route['JobPortal/Apply']                   = "jobportal/applyjob";
$route['recommended-jobs']                  = "jobs/recommended";

$route['Subscriptions']                     = "subscription/index";
$route['Subscriptions/Order/(:any)']        = "subscription/tocart/$1";
$route['Subscriptions/Cart']                = "subscription/reviewcart";
$route['Subscriptions/Cart/(:any)']         = "subscription/reviewcart/$1";
$route['addwork/(:any)']                    = "Dashboard/addwork/$1";
$route['Subscriptions/RemoveCart/(:any)']   = "subscription/deletecart/$1";
$route['Subscriptions/BillingSection']      = "subscription/billingcart";
$route['Subscriptions/PlaceOrder']          = "subscription/processcart";
$route['Subscriptions/ProcessPayment']      = "subscription/paymentprocess";
$route['Subscriptions/TransDetails']        = "subscription/orderresult";
$route['delete-experience']                 = 'dashboard/delete_work_experience';
$route['edite-experience']                  = 'dashboard/getsingle_work_experience';
$route['TransactionList']                   = "subscription/translist";

$route['Logout']                            = "logout";
$route['LoginProcess']                      = "login";
$route['User/ForgotPassword']               = "login/newpwd_request";
$route['User/RecoverInitiate']              = "login/fpwd_request";
$route['User/ResetInitiate']                = "login/cpwd_request";
$route['User/ConfirmReset']                 = "login/confirm_reset_request";
$route['Main']                              = "main";
$route['PageContent']                       = "pagecontent/pagelist";
$route['default_controller']                = "login";
$route['404_override']                      = 'nopage';
$route['translate_uri_dashes']              = FALSE;
$route['Dashboard/profile_upload/(:any)']   = "Dashboard/profile_upload/$1";

/** package benifits */
$route['cv-visitors']                       = "packagebenifits/index";
/*new routest*/
$route['applied-jobs'] = "candidatedata/applied_jobs";
$route['notification/(:any)'] = "alerts/index/$1";
$route['notification'] = "alerts/index";
$route['notification/get/(:any)'] = "alerts/get/$1";
$route['cancle-applied-jobs/(:any)'] = "candidatedata/cancle_jobs/$1";
$route['saveto-account/(:any)/(:any)'] = "candidatedata/saveto_account/$1/$2";
$route['saved-jobs'] = "candidatedata/saved_jobs";
$route['remove-saved-jobs/(:any)'] = "candidatedata/remove_saved_jobs/$1";

