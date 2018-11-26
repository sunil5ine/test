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
$route['Dashboard'] = "dashboard/index";
$route['MyAccount'] = "merchant/viewdetails";
$route['AccountSettings'] = "dashboard/profilesettings";
$route['UpdateSocialMedia/(:any)'] = "dashboard/update_smedia/$1";
$route['profilepic'] = "dashboard/profilepic";

$route['MyJobs'] = "jobs/viewlist";
$route['MyJobs/Expired'] = "jobs/viewexplist";
$route['Jobs/Add'] = "jobs/addnew";
$route['Jobs/Edit/(:any)'] = "jobs/edit_job/$1";
$route['Jobs/Update/(:any)'] = "jobs/update_job/$1";
$route['Jobs/Viewdetails/(:any)'] = "jobs/viewjob_details/$1";
$route['Jobs/Duplicate/(:any)'] = "jobs/copy_job/$1";
$route['Jobs/Delete/(:any)'] = "jobs/delete_job/$1";
$route['Jobs/Reopen/(:any)'] = "jobs/reopen_job/$1";
$route['Jobs/CloseJob/(:any)'] = "jobs/close_job/$1";
$route['Jobs/SubmitJob/(:any)'] = "jobs/submit_job/$1";
$route['Jobs/EmailJob/(:any)'] = "jobs/email_job/$1";
$route['Jobs/CandidateList/(:any)'] = "jobs/cand_list/$1";
$route['Jobs/CreateHireJob/(:any)'] = "jobs/create_hire_job/$1";
$route['verified-cv']       = "jobs/verified_cv";
$route['verified-cv/(:any)']       = "jobs/verified_cv/$1";

$route['Profile/List/(:any)'] = "profile/viewlist/$1";
$route['Profile/Viewdetails/(:any)'] = "profile/viewdetails/$1";
$route['Profile/GetResume/(:any)'] = "profile/downloadresume/$1";

$route['JobPortal/List'] = "jobportal/index";
$route['JobPortal/Job'] = "jobportal/jobdetails";
$route['JobPortal/Apply'] = "jobportal/applyjob";

$route['Subscriptions'] = "subscription/index";
$route['Subscriptions/Order/(:any)'] = "subscription/tocart/$1";
$route['Subscriptions/Cart'] = "subscription/reviewcart";
$route['Subscriptions/Cart/(:any)'] = "subscription/reviewcart/$1";
$route['Subscriptions/RemoveCart/(:any)'] = "subscription/deletecart/$1";
$route['Subscriptions/BillingSection'] = "subscription/billingcart";
$route['Subscriptions/PlaceOrder'] = "subscription/processcart";
$route['Subscriptions/ProcessPayment'] = "subscription/paymentprocess";
$route['Subscriptions/TransDetails'] = "subscription/orderresult";

$route['TransactionList'] = "subscription/translist";

$route['Employer/Active'] = "employer/viewlist";
$route['Employer/Pending'] = "employer/pendinglist";
$route['Employer/Add'] = "employer/addnew";
$route['Employer/EditQ'] = "employer/edit_quick";
$route['Employer/Edit/(:any)'] = "employer/edit_employer/$1";
$route['Employer/ViewDetails/(:any)'] = "employer/viewdetails/$1";
$route['Employer/Update/(:any)'] = "employer/update_employer/$1";
$route['Employer/Delete'] = "employer/delete_employer";
$route['Employer/Delete/(:any)'] = "employer/delete_employer/$1";

$route['Candidate/List'] = "candidate/viewlist";
$route['Candidate/Add'] = "candidate/addnew";
$route['Candidate/EditQ'] = "candidate/edit_quick";
$route['Candidate/Edit/(:any)'] = "candidate/edit_candidate/$1";
$route['Candidate/ViewDetails/(:any)'] = "candidate/viewdetails/$1";
$route['Candidate/Update/(:any)'] = "candidate/update_candidate/$1";
$route['Candidate/Delete'] = "candidate/delete_candidate";
$route['Candidate/Delete/(:any)'] = "candidate/delete_candidate/$1";

$route['Apply/ViewProfile/(:any)'] = "candidate/apply_profile_details/$1";

$route['Apply/ViewProfile/(:any)'] = "candidate/apply_profile_details/$1";

$route['Logout'] = "logout";
$route['Login'] = "login";
$route['User/ForgotPassword'] = "login/newpwd_request";
$route['User/RecoverInitiate'] = "login/fpwd_request";
$route['User/ResetInitiate'] = "login/epwd_request";
$route['User/ConfirmReset'] = "login/confirm_reset_request";
$route['EVerify/(:any)/(:any)'] = "login/verify_account_online/$1/$2";
$route['PageContent'] = "pagecontent/pagelist";
$route['default_controller'] = "login";
$route['404_override'] = 'nopage';
$route['translate_uri_dashes'] = FALSE;
