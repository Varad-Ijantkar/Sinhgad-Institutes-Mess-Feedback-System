<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// -------------------------
// Complaint Controller
// -------------------------
$route['complaint'] = 'Complaint/index';
$route['complaint/register'] = 'Complaint/index';
$route['complaint/submit'] = 'Complaint/submit';
$route['complaint/dashboard'] = 'Complaint/student_dashboard';
$route['complaint/pending_complaints'] = 'Complaint/pending_complaints';
$route['complaint/resolved_complaints'] = 'Complaint/resolved_complaints';
$route['complaint/report/(:num)'] = 'Complaint/generate_report/$1';
$route['logout'] = 'Complaint/logout';

//
// -------------------------
// Admin_Pending_Complaints Controller
// -------------------------
$route['admin_pending_complaints'] = 'Admin_Pending_Complaints/index';
$route['admin_pending_complaints/mark_as_resolved'] = 'Admin_Pending_Complaints/mark_as_resolved';
$route['admin_pending_complaints/generate_report/(:num)'] = 'Admin_Pending_Complaints/generate_report/$1';
$route['admin_pending_complaints/assign_complaint'] = 'Admin_Pending_Complaints/assign_complaint';

//
// -------------------------
// Admin_Resolved_Complaints Controller
// -------------------------
$route['admin_resolved_complaints'] = 'Admin_Resolved_Complaints/index';
$route['admin_resolved_complaints/mark_as_resolved'] = 'Admin_Resolved_Complaints/mark_as_resolved';
$route['admin_resolved_complaints/generate_report/(:num)'] = 'Admin_Resolved_Complaints/generate_report/$1';

//
// -------------------------
// Admin_Total_Complaints Controller
// -------------------------
$route['admin_total_complaints'] = 'Admin_Total_Complaints/index';
$route['admin_total_complaints/resolve'] = 'Admin_Total_Complaints/resolve';

//
// -------------------------
// Admin_Assigned_Complaints Controller
// -------------------------
$route['admin_assigned_complaints'] = 'Admin_Assigned_Complaints/index';
$route['admin_assigned_complaints/accept'] = 'Admin_Assigned_Complaints/accept_complaint';
$route['admin_assigned_complaints/complete'] = 'Admin_Assigned_Complaints/mark_as_completed';
$route['admin_assigned_complaints/report/(:num)'] = 'Admin_Assigned_Complaints/generate_report/$1';

//
// -------------------------
// Admin_Dashboard Controller
// -------------------------
$route['admin_dashboard'] = 'Admin_Dashboard/index';
$route['admin_dashboard/view_student_details'] = 'Admin_Dashboard/view_student_details';
$route['admin_dashboard/upload_student_details'] = 'Admin_Dashboard/upload_student_details';
$route['admin_dashboard/upload_csv'] = 'Admin_Dashboard/upload_csv';
$route['admin_dashboard/manage_access'] = 'Admin_Dashboard/manage_access';
$route['admin_dashboard/submit_access'] = 'Admin_Dashboard/submit_access';
$route['admin_dashboard/mess_ratings'] = 'Admin_Dashboard/mess_ratings';
$route['admin_dashboard/edit_student_details/(:num)'] = 'Admin_Dashboard/edit_student_details/$1';
$route['admin_dashboard/register_student'] = 'Admin_Dashboard/register_student';
$route['admin_dashboard/logout'] = 'Admin_Dashboard/logout';

//
// -------------------------
// Admin_Login Controller
// -------------------------
$route['admin_login'] = 'Admin_Login/index';
$route['admin_login/login'] = 'Admin_Login/login';

//
// -------------------------
// Feedback Controller
// -------------------------
$route['feedback'] = 'Feedback/index';
$route['feedback/submit'] = 'Feedback/submit';

//
// -------------------------
// GetCredentials Controller
// -------------------------
$route['getcredentials'] = 'GetCredentials/index';
$route['getcredentials/send'] = 'GetCredentials/send_credentials';

//
// -------------------------
// PasswordRenew Controller
// -------------------------
$route['passwordrenew'] = 'PasswordRenew/index';
$route['passwordrenew/update'] = 'PasswordRenew/update_password';

//
// -------------------------
// Student_Dashboard Controller
// -------------------------
$route['student_dashboard'] = 'Student_Dashboard/index';


$route['view-report/(:num)'] = 'Admin_Pending_Complaints/generate_report/$1';

// -------------------------
// Mess_Menu Controller
// -------------------------
$route['mess_menu'] = 'Mess_Menu/index';

//
// -------------------------
// Vendor_Menu Controller
// -------------------------
$route['update_menu'] = 'Update_Menu/index';
