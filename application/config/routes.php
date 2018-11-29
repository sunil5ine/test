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
$route['default_controller'] = "site";
$route['EmailValid'] = "site/email_valid_ajax";
$route['EmailCheck'] = "employer/email_valid_ajax";
$route['Home'] = "site/home";

$route['Psychometric'] = "site/psychometric";
$route['blog'] = "blog/index";
$route['blog/(:any)/(:any)'] = "blog/detail/$1/$2";

$route['CV_Writing'] = "site/cv_writing";
$route['About'] = "site/about";
$route['Features'] = "site/features";
$route['Plans'] = "site/plan";
$route['Pricing'] = "site/pricing";
$route['JoBoards'] = "site/joboards";
$route['PostCV'] = "site/postcv";
$route['Faq'] = "site/faq";
$route['Privacy'] = "site/privacy";
$route['Disclaimer'] = "site/disclaimer";
$route['Terms'] = "site/terms";
$route['Contact'] = "site/contact";
$route['PostJob'] = "site/postjob";
$route['PeopleSearch'] = "site/peoplesearch";
$route['FreeTrial'] = "site/reg_freetrial";
$route['Employer/CreateAccount'] = "employer/create_account";
$route['Employer/FreeTrialReg'] = "employer/create_trial_account";
$route['Jobs'] = "jobportal/index";
$route['JobDetails/(:any)'] = "jobportal/jobdetails/$1";
$route['JobApply/(:any)'] = "jobportal/applyjob/$1";
$route['SignIn/(:any)'] = "jobportal/signin_user/$1";
$route['User/ForgotPwd'] = "jobportal/fpwd_request";
$route['User/Changepwd'] = "jobportal/cpwd_request";
$route['User/Logout'] = "jobportal/logout";
$route['404_override'] = 'site/notfound';
$route['translate_uri_dashes'] = FALSE;
