<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['Dashboard']                             = "dashboard/index";
$route['delete-employee/(:any)']                = "employees/delete_employee/$1";
$route['employees/approve/(:any)']              = "employees/approve/$1";
$route['employees/reject/(:any)']               = "employees/reject/$1";
$route['employees/details/(:any)']              = "employees/details/$1";
$route['employees/posted-jobs/(:any)']          = "employees/posted_jobs/$1";
$route['employees/uploaded-resumes/(:any)']     = "employees/uploaded_resumes/$1";
$route['jobs/manage-jobs']                      = "jobs/index";
$route['jobs/detail/(:any)']                    = "jobs/detail/$1";
$route['applied/(:any)']                        = "jobs/applied/$1";
$route['jobs/delete/(:any)']                    = "jobs/delete/$1";
$route['blog/edite/(:any)']                     = "blog/edite/$1";
$route['blog/delete/(:any)']                    = "blog/delete/$1";
$route['admin/delete/(:any)']                   = "admin/delete/$1";
$route['admin/(:any)']                          = "admin/index/$1";
$route['admin']                                 = "admin/index";
$route['update']                                = "admin/update";
$route['setting']                               = "admin/setting";
$route['setting/update']                        = "admin/update_profile";
$route['price/update/(:any)']                   = "price/update/$1";
$route['candidates/download-resume/(:any)']     = "candidates/download_resume/$1";
$route['candidates/detail/(:any)']              = "candidates/detail/$1";
$route['blog/add-new']                          = "blog/index";
$route['Logout']                                = "logout";
$route['Login']                                 = "login";
$route['pricing/emp-price-Edit/(:any)']         = "price/empPricEdite/$1";
$route['pricing/update-emp-package']            = "price/update_emp_package";
$route['pricing/add-emp-package']               = "price/add_emp_package";
$route['price/add-candidate']                   = "price/add_candidate";
$route['price/add-employer']                    = "price/employer";

$route['PageContent']                           = "pagecontent/pagelist";
$route['default_controller']                    = "login";
$route['404_override']                          = 'nopage';
$route['translate_uri_dashes']                  = FALSE;
               

