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

$route['chat'] = 'ChatController/index';
$route['send-message'] = 'ChatController/send_text_message';
$route['chat-attachment/upload'] = 'ChatController/send_text_message';
$route['get-chat-history-vendor'] = 'ChatController/get_chat_history_by_vendor';

$route['update-notification'] = 'ChatController/update_notification';
$route['D_O/update-notification'] = 'ChatController/update_notification';
$route['JOTO/update-notification'] = 'ChatController/update_notification';

$route['update-activity'] = 'ChatController/update_activity';
$route['D_O/update-activity'] = 'ChatController/update_activity';
$route['JOTO/update-activity'] = 'ChatController/update_activity';

$route['check-notification'] = 'ChatController/check_notification';

$route['D_O/check-notification'] = 'ChatController/check_notification';
$route['JOTO/check-notification'] = 'ChatController/check_notification';

$route['check-activity'] = 'ChatController/check_activity';
$route['D_O/check-activity'] = 'ChatController/check_activity';
$route['JOTO/check-activity'] = 'ChatController/check_activity';


$route['D_O/add_physical_milestone/update-notification'] = 'ChatController/update_notification';
$route['D_O/add_physical_milestone/update-activity'] = 'ChatController/update_activity';
$route['D_O/add_physical_milestone/check-notification'] = 'ChatController/check_notification';
$route['D_O/add_physical_milestone/check-activity'] = 'ChatController/check_activity';

$route['JOTO/add_physical_milestone/update-notification'] = 'ChatController/update_notification';
$route['JOTO/add_physical_milestone/update-activity'] = 'ChatController/update_activity';
$route['JOTO/add_physical_milestone/check-notification'] = 'ChatController/check_notification';
$route['JOTO/add_physical_milestone/check-activity'] = 'ChatController/check_activity';

$route['D_O/view_edit_observation/update-notification'] = 'ChatController/update_notification';
$route['D_O/view_edit_observation/update-activity'] = 'ChatController/update_activity';
$route['D_O/view_edit_observation/check-notification'] = 'ChatController/check_notification';
$route['D_O/view_edit_observation/check-activity'] = 'ChatController/check_activity';

$route['D_O/view_edit_warning/update-notification'] = 'ChatController/update_notification';
$route['D_O/view_edit_warning/update-activity'] = 'ChatController/update_activity';
$route['D_O/view_edit_warning/check-notification'] = 'ChatController/check_notification';
$route['D_O/view_edit_warning/check-activity'] = 'ChatController/check_activity';

$route['D_O/view_edit_inspection/update-notification'] = 'ChatController/update_notification';
$route['D_O/view_edit_inspection/update-activity'] = 'ChatController/update_activity';
$route['D_O/view_edit_inspection/check-notification'] = 'ChatController/check_notification';
$route['D_O/view_edit_inspection/check-activity'] = 'ChatController/check_activity';

$route['D_O/view_edit_officer_record/update-notification'] = 'ChatController/update_notification';
$route['D_O/view_edit_officer_record/update-activity'] = 'ChatController/update_activity';
$route['D_O/view_edit_officer_record/check-notification'] = 'ChatController/check_notification';
$route['D_O/view_edit_officer_record/check-activity'] = 'ChatController/check_activity';

$route['D_O/view_edit_personal_record/update-notification'] = 'ChatController/update_notification';
$route['D_O/view_edit_personal_record/update-activity'] = 'ChatController/update_activity';
$route['D_O/view_edit_personal_record/check-notification'] = 'ChatController/check_notification';
$route['D_O/view_edit_personal_record/check-activity'] = 'ChatController/check_activity';

$route['D_O/view_edit_biography/update-notification'] = 'ChatController/update_notification';
$route['D_O/view_edit_biography/update-activity'] = 'ChatController/update_activity';
$route['D_O/view_edit_biography/check-notification'] = 'ChatController/check_notification';
$route['D_O/view_edit_biography/check-activity'] = 'ChatController/check_activity';

$route['D_O/view_edit_psychologist_report/update-notification'] = 'ChatController/update_notification';
$route['D_O/view_edit_psychologist_report/update-activity'] = 'ChatController/update_activity';
$route['D_O/view_edit_psychologist_report/check-notification'] = 'ChatController/check_notification';
$route['D_O/view_edit_psychologist_report/check-activity'] = 'ChatController/check_activity';

$route['D_O/view_edit_qualities/(:any)/update-notification'] = 'ChatController/$1/update_notification';
$route['D_O/view_edit_qualities/(:any)/update-activity'] = 'ChatController/$1/update_activity';
$route['D_O/view_edit_qualities/(:any)/check-notification'] = 'ChatController/$1/check_notification';
$route['D_O/view_edit_qualities/(:any)/check-activity'] = 'ChatController/$1/check_activity';

$route['D_O/view_edit_punishment/update-notification'] = 'ChatController/update_notification';
$route['D_O/view_edit_punishment/update-activity'] = 'ChatController/update_activity';
$route['D_O/view_edit_punishment/check-notification'] = 'ChatController/check_notification';
$route['D_O/view_edit_punishment/check-activity'] = 'ChatController/check_activity';

$route['JOTO/view_edit_warning/update-notification'] = 'ChatController/update_notification';
$route['JOTO/view_edit_warning/update-activity'] = 'ChatController/update_activity';
$route['JOTO/view_edit_warning/check-notification'] = 'ChatController/check_notification';
$route['JOTO/view_edit_warning/check-activity'] = 'ChatController/check_activity';

$route['JOTO/view_edit_observation/update-notification'] = 'ChatController/update_notification';
$route['JOTO/view_edit_observation/update-activity'] = 'ChatController/update_activity';
$route['JOTO/view_edit_observation/check-notification'] = 'ChatController/check_notification';
$route['JOTO/view_edit_observation/check-activity'] = 'ChatController/check_activity';

$route['JOTO/view_edit_warning/update-notification'] = 'ChatController/update_notification';
$route['JOTO/view_edit_warning/update-activity'] = 'ChatController/update_activity';
$route['JOTO/view_edit_warning/check-notification'] = 'ChatController/check_notification';
$route['JOTO/view_edit_warning/check-activity'] = 'ChatController/check_activity';

$route['JOTO/view_edit_inspection/update-notification'] = 'ChatController/update_notification';
$route['JOTO/view_edit_inspection/update-activity'] = 'ChatController/update_activity';
$route['JOTO/view_edit_inspection/check-notification'] = 'ChatController/check_notification';
$route['JOTO/view_edit_inspection/check-activity'] = 'ChatController/check_activity';

$route['JOTO/view_edit_officer_record/update-notification'] = 'ChatController/update_notification';
$route['JOTO/view_edit_officer_record/update-activity'] = 'ChatController/update_activity';
$route['JOTO/view_edit_officer_record/check-notification'] = 'ChatController/check_notification';
$route['JOTO/view_edit_officer_record/check-activity'] = 'ChatController/check_activity';

$route['JOTO/view_edit_personal_record/update-notification'] = 'ChatController/update_notification';
$route['JOTO/view_edit_personal_record/update-activity'] = 'ChatController/update_activity';
$route['JOTO/view_edit_personal_record/check-notification'] = 'ChatController/check_notification';
$route['JOTO/view_edit_personal_record/check-activity'] = 'ChatController/check_activity';

$route['JOTO/view_edit_biography/update-notification'] = 'ChatController/update_notification';
$route['JOTO/view_edit_biography/update-activity'] = 'ChatController/update_activity';
$route['JOTO/view_edit_biography/check-notification'] = 'ChatController/check_notification';
$route['JOTO/view_edit_biography/check-activity'] = 'ChatController/check_activity';

$route['JOTO/view_edit_psychologist_report/update-notification'] = 'ChatController/update_notification';
$route['JOTO/view_edit_psychologist_report/update-activity'] = 'ChatController/update_activity';
$route['JOTO/view_edit_psychologist_report/check-notification'] = 'ChatController/check_notification';
$route['JOTO/view_edit_psychologist_report/check-activity'] = 'ChatController/check_activity';

$route['JOTO/view_edit_qualities/(:any)/update-notification'] = 'ChatController/$1/update_notification';
$route['JOTO/view_edit_qualities/(:any)/update-activity'] = 'ChatController/$1/update_activity';
$route['JOTO/view_edit_qualities/(:any)/check-notification'] = 'ChatController/$1/check_notification';
$route['JOTO/view_edit_qualities/(:any)/check-activity'] = 'ChatController/$1/check_activity';

$route['JOTO/view_edit_punishment/update-notification'] = 'ChatController/update_notification';
$route['JOTO/view_edit_punishment/update-activity'] = 'ChatController/update_activity';
$route['JOTO/view_edit_punishment/check-notification'] = 'ChatController/check_notification';
$route['JOTO/view_edit_punishment/check-activity'] = 'ChatController/check_activity';

$route['EXO/check-notification'] = 'ChatController/check_notification';
$route['EXO/check-activity'] = 'ChatController/check_activity';
$route['EXO/update-notification'] = 'ChatController/update_notification';
$route['EXO/update-activity'] = 'ChatController/update_activity';

$route['EXO/add_physical_milestone/update-notification'] = 'ChatController/update_notification';
$route['EXO/add_physical_milestone/update-activity'] = 'ChatController/update_activity';
$route['EXO/add_physical_milestone/check-notification'] = 'ChatController/check_notification';
$route['EXO/add_physical_milestone/check-activity'] = 'ChatController/check_activity';

$route['EXO/view_edit_observation/update-notification'] = 'ChatController/update_notification';
$route['EXO/view_edit_observation/update-activity'] = 'ChatController/update_activity';
$route['EXO/view_edit_observation/check-notification'] = 'ChatController/check_notification';
$route['EXO/view_edit_observation/check-activity'] = 'ChatController/check_activity';

$route['EXO/view_edit_warning/update-notification'] = 'ChatController/update_notification';
$route['EXO/view_edit_warning/update-activity'] = 'ChatController/update_activity';
$route['EXO/view_edit_warning/check-notification'] = 'ChatController/check_notification';
$route['EXO/view_edit_warning/check-activity'] = 'ChatController/check_activity';

$route['EXO/view_edit_inspection/update-notification'] = 'ChatController/update_notification';
$route['EXO/view_edit_inspection/update-activity'] = 'ChatController/update_activity';
$route['EXO/view_edit_inspection/check-notification'] = 'ChatController/check_notification';
$route['EXO/view_edit_inspection/check-activity'] = 'ChatController/check_activity';

$route['EXO/view_edit_officer_record/update-notification'] = 'ChatController/update_notification';
$route['EXO/view_edit_officer_record/update-activity'] = 'ChatController/update_activity';
$route['EXO/view_edit_officer_record/check-notification'] = 'ChatController/check_notification';
$route['EXO/view_edit_officer_record/check-activity'] = 'ChatController/check_activity';

$route['EXO/view_edit_personal_record/update-notification'] = 'ChatController/update_notification';
$route['EXO/view_edit_personal_record/update-activity'] = 'ChatController/update_activity';
$route['EXO/view_edit_personal_record/check-notification'] = 'ChatController/check_notification';
$route['EXO/view_edit_personal_record/check-activity'] = 'ChatController/check_activity';

$route['EXO/view_edit_biography/update-notification'] = 'ChatController/update_notification';
$route['EXO/view_edit_biography/update-activity'] = 'ChatController/update_activity';
$route['EXO/view_edit_biography/check-notification'] = 'ChatController/check_notification';
$route['EXO/view_edit_biography/check-activity'] = 'ChatController/check_activity';

$route['EXO/view_edit_psychologist_report/update-notification'] = 'ChatController/update_notification';
$route['EXO/view_edit_psychologist_report/update-activity'] = 'ChatController/update_activity';
$route['EXO/view_edit_psychologist_report/check-notification'] = 'ChatController/check_notification';
$route['EXO/view_edit_psychologist_report/check-activity'] = 'ChatController/check_activity';

$route['EXO/view_edit_qualities/(:any)/update-notification'] = 'ChatController/$1/update_notification';
$route['EXO/view_edit_qualities/(:any)/update-activity'] = 'ChatController/$1/update_activity';
$route['EXO/view_edit_qualities/(:any)/check-notification'] = 'ChatController/$1/check_notification';
$route['EXO/view_edit_qualities/(:any)/check-activity'] = 'ChatController/$1/check_activity';

$route['EXO/view_edit_punishment/update-notification'] = 'ChatController/update_notification';
$route['EXO/view_edit_punishment/update-activity'] = 'ChatController/update_activity';
$route['EXO/view_edit_punishment/check-notification'] = 'ChatController/check_notification';
$route['EXO/view_edit_punishment/check-activity'] = 'ChatController/check_activity';

$route['DEAN/check-notification'] = 'ChatController/check_notification';
$route['DEAN/check-activity'] = 'ChatController/check_activity';
$route['DEAN/update-notification'] = 'ChatController/update_notification';
$route['DEAN/update-activity'] = 'ChatController/update_activity';

$route['DEAN/add_physical_milestone/update-notification'] = 'ChatController/update_notification';
$route['DEAN/add_physical_milestone/update-activity'] = 'ChatController/update_activity';
$route['DEAN/add_physical_milestone/check-notification'] = 'ChatController/check_notification';
$route['DEAN/add_physical_milestone/check-activity'] = 'ChatController/check_activity';

$route['DEAN/view_edit_observation/update-notification'] = 'ChatController/update_notification';
$route['DEAN/view_edit_observation/update-activity'] = 'ChatController/update_activity';
$route['DEAN/view_edit_observation/check-notification'] = 'ChatController/check_notification';
$route['DEAN/view_edit_observation/check-activity'] = 'ChatController/check_activity';

$route['DEAN/view_edit_warning/update-notification'] = 'ChatController/update_notification';
$route['DEAN/view_edit_warning/update-activity'] = 'ChatController/update_activity';
$route['DEAN/view_edit_warning/check-notification'] = 'ChatController/check_notification';
$route['DEAN/view_edit_warning/check-activity'] = 'ChatController/check_activity';

$route['DEAN/view_edit_inspection/update-notification'] = 'ChatController/update_notification';
$route['DEAN/view_edit_inspection/update-activity'] = 'ChatController/update_activity';
$route['DEAN/view_edit_inspection/check-notification'] = 'ChatController/check_notification';
$route['DEAN/view_edit_inspection/check-activity'] = 'ChatController/check_activity';

$route['DEAN/view_edit_officer_record/update-notification'] = 'ChatController/update_notification';
$route['DEAN/view_edit_officer_record/update-activity'] = 'ChatController/update_activity';
$route['DEAN/view_edit_officer_record/check-notification'] = 'ChatController/check_notification';
$route['DEAN/view_edit_officer_record/check-activity'] = 'ChatController/check_activity';

$route['DEAN/view_edit_personal_record/update-notification'] = 'ChatController/update_notification';
$route['DEAN/view_edit_personal_record/update-activity'] = 'ChatController/update_activity';
$route['DEAN/view_edit_personal_record/check-notification'] = 'ChatController/check_notification';
$route['DEAN/view_edit_personal_record/check-activity'] = 'ChatController/check_activity';

$route['DEAN/view_edit_biography/update-notification'] = 'ChatController/update_notification';
$route['DEAN/view_edit_biography/update-activity'] = 'ChatController/update_activity';
$route['DEAN/view_edit_biography/check-notification'] = 'ChatController/check_notification';
$route['DEAN/view_edit_biography/check-activity'] = 'ChatController/check_activity';

$route['DEAN/view_edit_psychologist_report/update-notification'] = 'ChatController/update_notification';
$route['DEAN/view_edit_psychologist_report/update-activity'] = 'ChatController/update_activity';
$route['DEAN/view_edit_psychologist_report/check-notification'] = 'ChatController/check_notification';
$route['DEAN/view_edit_psychologist_report/check-activity'] = 'ChatController/check_activity';

$route['DEAN/view_edit_qualities/(:any)/update-notification'] = 'ChatController/$1/update_notification';
$route['DEAN/view_edit_qualities/(:any)/update-activity'] = 'ChatController/$1/update_activity';
$route['DEAN/view_edit_qualities/(:any)/check-notification'] = 'ChatController/$1/check_notification';
$route['DEAN/view_edit_qualities/(:any)/check-activity'] = 'ChatController/$1/check_activity';

$route['DEAN/view_edit_punishment/update-notification'] = 'ChatController/update_notification';
$route['DEAN/view_edit_punishment/update-activity'] = 'ChatController/update_activity';
$route['DEAN/view_edit_punishment/check-notification'] = 'ChatController/check_notification';
$route['DEAN/view_edit_punishment/check-activity'] = 'ChatController/check_activity';

$route['HOUGP/check-notification'] = 'ChatController/check_notification';
$route['HOUGP/check-activity'] = 'ChatController/check_activity';
$route['HOUGP/update-notification'] = 'ChatController/update_notification';
$route['HOUGP/update-activity'] = 'ChatController/update_activity';

$route['HOUGP/add_physical_milestone/update-notification'] = 'ChatController/update_notification';
$route['HOUGP/add_physical_milestone/update-activity'] = 'ChatController/update_activity';
$route['HOUGP/add_physical_milestone/check-notification'] = 'ChatController/check_notification';
$route['HOUGP/add_physical_milestone/check-activity'] = 'ChatController/check_activity';

$route['HOUGP/view_edit_observation/update-notification'] = 'ChatController/update_notification';
$route['HOUGP/view_edit_observation/update-activity'] = 'ChatController/update_activity';
$route['HOUGP/view_edit_observation/check-notification'] = 'ChatController/check_notification';
$route['HOUGP/view_edit_observation/check-activity'] = 'ChatController/check_activity';

$route['HOUGP/view_edit_warning/update-notification'] = 'ChatController/update_notification';
$route['HOUGP/view_edit_warning/update-activity'] = 'ChatController/update_activity';
$route['HOUGP/view_edit_warning/check-notification'] = 'ChatController/check_notification';
$route['HOUGP/view_edit_warning/check-activity'] = 'ChatController/check_activity';

$route['HOUGP/view_edit_inspection/update-notification'] = 'ChatController/update_notification';
$route['HOUGP/view_edit_inspection/update-activity'] = 'ChatController/update_activity';
$route['HOUGP/view_edit_inspection/check-notification'] = 'ChatController/check_notification';
$route['HOUGP/view_edit_inspection/check-activity'] = 'ChatController/check_activity';

$route['HOUGP/view_edit_officer_record/update-notification'] = 'ChatController/update_notification';
$route['HOUGP/view_edit_officer_record/update-activity'] = 'ChatController/update_activity';
$route['HOUGP/view_edit_officer_record/check-notification'] = 'ChatController/check_notification';
$route['HOUGP/view_edit_officer_record/check-activity'] = 'ChatController/check_activity';

$route['HOUGP/view_edit_personal_record/update-notification'] = 'ChatController/update_notification';
$route['HOUGP/view_edit_personal_record/update-activity'] = 'ChatController/update_activity';
$route['HOUGP/view_edit_personal_record/check-notification'] = 'ChatController/check_notification';
$route['HOUGP/view_edit_personal_record/check-activity'] = 'ChatController/check_activity';

$route['HOUGP/view_edit_biography/update-notification'] = 'ChatController/update_notification';
$route['HOUGP/view_edit_biography/update-activity'] = 'ChatController/update_activity';
$route['HOUGP/view_edit_biography/check-notification'] = 'ChatController/check_notification';
$route['HOUGP/view_edit_biography/check-activity'] = 'ChatController/check_activity';

$route['HOUGP/view_edit_psychologist_report/update-notification'] = 'ChatController/update_notification';
$route['HOUGP/view_edit_psychologist_report/update-activity'] = 'ChatController/update_activity';
$route['HOUGP/view_edit_psychologist_report/check-notification'] = 'ChatController/check_notification';
$route['HOUGP/view_edit_psychologist_report/check-activity'] = 'ChatController/check_activity';

$route['HOUGP/view_edit_qualities/(:any)/update-notification'] = 'ChatController/$1/update_notification';
$route['HOUGP/view_edit_qualities/(:any)/update-activity'] = 'ChatController/$1/update_activity';
$route['HOUGP/view_edit_qualities/(:any)/check-notification'] = 'ChatController/$1/check_notification';
$route['HOUGP/view_edit_qualities/(:any)/check-activity'] = 'ChatController/$1/check_activity';

$route['HOUGP/view_edit_punishment/update-notification'] = 'ChatController/update_notification';
$route['HOUGP/view_edit_punishment/update-activity'] = 'ChatController/update_activity';
$route['HOUGP/view_edit_punishment/check-notification'] = 'ChatController/check_notification';
$route['HOUGP/view_edit_punishment/check-activity'] = 'ChatController/check_activity';

$route['CTMWT/check-notification'] = 'ChatController/check_notification';
$route['CTMWT/check-activity'] = 'ChatController/check_activity';
$route['CTMWT/update-notification'] = 'ChatController/update_notification';
$route['CTMWT/update-activity'] = 'ChatController/update_activity';

$route['CTMWT/add_physical_milestone/update-notification'] = 'ChatController/update_notification';
$route['CTMWT/add_physical_milestone/update-activity'] = 'ChatController/update_activity';
$route['CTMWT/add_physical_milestone/check-notification'] = 'ChatController/check_notification';
$route['CTMWT/add_physical_milestone/check-activity'] = 'ChatController/check_activity';

$route['CTMWT/view_edit_observation/update-notification'] = 'ChatController/update_notification';
$route['CTMWT/view_edit_observation/update-activity'] = 'ChatController/update_activity';
$route['CTMWT/view_edit_observation/check-notification'] = 'ChatController/check_notification';
$route['CTMWT/view_edit_observation/check-activity'] = 'ChatController/check_activity';

$route['CTMWT/view_edit_warning/update-notification'] = 'ChatController/update_notification';
$route['CTMWT/view_edit_warning/update-activity'] = 'ChatController/update_activity';
$route['CTMWT/view_edit_warning/check-notification'] = 'ChatController/check_notification';
$route['CTMWT/view_edit_warning/check-activity'] = 'ChatController/check_activity';

$route['CTMWT/view_edit_inspection/update-notification'] = 'ChatController/update_notification';
$route['CTMWT/view_edit_inspection/update-activity'] = 'ChatController/update_activity';
$route['CTMWT/view_edit_inspection/check-notification'] = 'ChatController/check_notification';
$route['CTMWT/view_edit_inspection/check-activity'] = 'ChatController/check_activity';

$route['CTMWT/view_edit_officer_record/update-notification'] = 'ChatController/update_notification';
$route['CTMWT/view_edit_officer_record/update-activity'] = 'ChatController/update_activity';
$route['CTMWT/view_edit_officer_record/check-notification'] = 'ChatController/check_notification';
$route['CTMWT/view_edit_officer_record/check-activity'] = 'ChatController/check_activity';

$route['CTMWT/view_edit_personal_record/update-notification'] = 'ChatController/update_notification';
$route['CTMWT/view_edit_personal_record/update-activity'] = 'ChatController/update_activity';
$route['CTMWT/view_edit_personal_record/check-notification'] = 'ChatController/check_notification';
$route['CTMWT/view_edit_personal_record/check-activity'] = 'ChatController/check_activity';

$route['CTMWT/view_edit_biography/update-notification'] = 'ChatController/update_notification';
$route['CTMWT/view_edit_biography/update-activity'] = 'ChatController/update_activity';
$route['CTMWT/view_edit_biography/check-notification'] = 'ChatController/check_notification';
$route['CTMWT/view_edit_biography/check-activity'] = 'ChatController/check_activity';

$route['CTMWT/view_edit_psychologist_report/update-notification'] = 'ChatController/update_notification';
$route['CTMWT/view_edit_psychologist_report/update-activity'] = 'ChatController/update_activity';
$route['CTMWT/view_edit_psychologist_report/check-notification'] = 'ChatController/check_notification';
$route['CTMWT/view_edit_psychologist_report/check-activity'] = 'ChatController/check_activity';

$route['CTMWT/view_edit_qualities/(:any)/update-notification'] = 'ChatController/$1/update_notification';
$route['CTMWT/view_edit_qualities/(:any)/update-activity'] = 'ChatController/$1/update_activity';
$route['CTMWT/view_edit_qualities/(:any)/check-notification'] = 'ChatController/$1/check_notification';
$route['CTMWT/view_edit_qualities/(:any)/check-activity'] = 'ChatController/$1/check_activity';

$route['CTMWT/view_edit_punishment/update-notification'] = 'ChatController/update_notification';
$route['CTMWT/view_edit_punishment/update-activity'] = 'ChatController/update_activity';
$route['CTMWT/view_edit_punishment/check-notification'] = 'ChatController/check_notification';
$route['CTMWT/view_edit_punishment/check-activity'] = 'ChatController/check_activity';

$route['CT/check-notification'] = 'ChatController/check_notification';
$route['CT/check-activity'] = 'ChatController/check_activity';
$route['CT/update-notification'] = 'ChatController/update_notification';
$route['CT/update-activity'] = 'ChatController/update_activity';

$route['CT/add_physical_milestone/update-notification'] = 'ChatController/update_notification';
$route['CT/add_physical_milestone/update-activity'] = 'ChatController/update_activity';
$route['CT/add_physical_milestone/check-notification'] = 'ChatController/check_notification';
$route['CT/add_physical_milestone/check-activity'] = 'ChatController/check_activity';

$route['CT/view_edit_observation/update-notification'] = 'ChatController/update_notification';
$route['CT/view_edit_observation/update-activity'] = 'ChatController/update_activity';
$route['CT/view_edit_observation/check-notification'] = 'ChatController/check_notification';
$route['CT/view_edit_observation/check-activity'] = 'ChatController/check_activity';

$route['CT/view_edit_warning/update-notification'] = 'ChatController/update_notification';
$route['CT/view_edit_warning/update-activity'] = 'ChatController/update_activity';
$route['CT/view_edit_warning/check-notification'] = 'ChatController/check_notification';
$route['CT/view_edit_warning/check-activity'] = 'ChatController/check_activity';

$route['CT/view_edit_inspection/update-notification'] = 'ChatController/update_notification';
$route['CT/view_edit_inspection/update-activity'] = 'ChatController/update_activity';
$route['CT/view_edit_inspection/check-notification'] = 'ChatController/check_notification';
$route['CT/view_edit_inspection/check-activity'] = 'ChatController/check_activity';

$route['CT/view_edit_officer_record/update-notification'] = 'ChatController/update_notification';
$route['CT/view_edit_officer_record/update-activity'] = 'ChatController/update_activity';
$route['CT/view_edit_officer_record/check-notification'] = 'ChatController/check_notification';
$route['CT/view_edit_officer_record/check-activity'] = 'ChatController/check_activity';

$route['CT/view_edit_personal_record/update-notification'] = 'ChatController/update_notification';
$route['CT/view_edit_personal_record/update-activity'] = 'ChatController/update_activity';
$route['CT/view_edit_personal_record/check-notification'] = 'ChatController/check_notification';
$route['CT/view_edit_personal_record/check-activity'] = 'ChatController/check_activity';

$route['CT/view_edit_biography/update-notification'] = 'ChatController/update_notification';
$route['CT/view_edit_biography/update-activity'] = 'ChatController/update_activity';
$route['CT/view_edit_biography/check-notification'] = 'ChatController/check_notification';
$route['CT/view_edit_biography/check-activity'] = 'ChatController/check_activity';

$route['CT/view_edit_psychologist_report/update-notification'] = 'ChatController/update_notification';
$route['CT/view_edit_psychologist_report/update-activity'] = 'ChatController/update_activity';
$route['CT/view_edit_psychologist_report/check-notification'] = 'ChatController/check_notification';
$route['CT/view_edit_psychologist_report/check-activity'] = 'ChatController/check_activity';

$route['CT/view_edit_qualities/(:any)/update-notification'] = 'ChatController/$1/update_notification';
$route['CT/view_edit_qualities/(:any)/update-activity'] = 'ChatController/$1/update_activity';
$route['CT/view_edit_qualities/(:any)/check-notification'] = 'ChatController/$1/check_notification';
$route['CT/view_edit_qualities/(:any)/check-activity'] = 'ChatController/$1/check_activity';

$route['CT/view_edit_punishment/update-notification'] = 'ChatController/update_notification';
$route['CT/view_edit_punishment/update-activity'] = 'ChatController/update_activity';
$route['CT/view_edit_punishment/check-notification'] = 'ChatController/check_notification';
$route['CT/view_edit_punishment/check-activity'] = 'ChatController/check_activity';

$route['CT/view_result/update-notification'] = 'ChatController/update_notification';
$route['CT/view_result/update-activity'] = 'ChatController/update_activity';
$route['CT/view_result/check-notification'] = 'ChatController/check_notification';
$route['CT/view_result/check-activity'] = 'ChatController/check_activity';

$route['CO/check-notification'] = 'ChatController/check_notification';
$route['CO/check-activity'] = 'ChatController/check_activity';
$route['CO/update-notification'] = 'ChatController/update_notification';
$route['CO/update-activity'] = 'ChatController/update_activity';

$route['CO/add_physical_milestone/update-notification'] = 'ChatController/update_notification';
$route['CO/add_physical_milestone/update-activity'] = 'ChatController/update_activity';
$route['CO/add_physical_milestone/check-notification'] = 'ChatController/check_notification';
$route['CO/add_physical_milestone/check-activity'] = 'ChatController/check_activity';

$route['CO/view_edit_observation/update-notification'] = 'ChatController/update_notification';
$route['CO/view_edit_observation/update-activity'] = 'ChatController/update_activity';
$route['CO/view_edit_observation/check-notification'] = 'ChatController/check_notification';
$route['CO/view_edit_observation/check-activity'] = 'ChatController/check_activity';

$route['CO/view_edit_warning/update-notification'] = 'ChatController/update_notification';
$route['CO/view_edit_warning/update-activity'] = 'ChatController/update_activity';
$route['CO/view_edit_warning/check-notification'] = 'ChatController/check_notification';
$route['CO/view_edit_warning/check-activity'] = 'ChatController/check_activity';

$route['CO/view_edit_inspection/update-notification'] = 'ChatController/update_notification';
$route['CO/view_edit_inspection/update-activity'] = 'ChatController/update_activity';
$route['CO/view_edit_inspection/check-notification'] = 'ChatController/check_notification';
$route['CO/view_edit_inspection/check-activity'] = 'ChatController/check_activity';

$route['CO/view_edit_officer_record/update-notification'] = 'ChatController/update_notification';
$route['CO/view_edit_officer_record/update-activity'] = 'ChatController/update_activity';
$route['CO/view_edit_officer_record/check-notification'] = 'ChatController/check_notification';
$route['CO/view_edit_officer_record/check-activity'] = 'ChatController/check_activity';

$route['CO/view_edit_personal_record/update-notification'] = 'ChatController/update_notification';
$route['CO/view_edit_personal_record/update-activity'] = 'ChatController/update_activity';
$route['CO/view_edit_personal_record/check-notification'] = 'ChatController/check_notification';
$route['CO/view_edit_personal_record/check-activity'] = 'ChatController/check_activity';

$route['CO/view_edit_biography/update-notification'] = 'ChatController/update_notification';
$route['CO/view_edit_biography/update-activity'] = 'ChatController/update_activity';
$route['CO/view_edit_biography/check-notification'] = 'ChatController/check_notification';
$route['CO/view_edit_biography/check-activity'] = 'ChatController/check_activity';

$route['CO/view_edit_psychologist_report/update-notification'] = 'ChatController/update_notification';
$route['CO/view_edit_psychologist_report/update-activity'] = 'ChatController/update_activity';
$route['CO/view_edit_psychologist_report/check-notification'] = 'ChatController/check_notification';
$route['CO/view_edit_psychologist_report/check-activity'] = 'ChatController/check_activity';

$route['CO/view_edit_qualities/(:any)/update-notification'] = 'ChatController/$1/update_notification';
$route['CO/view_edit_qualities/(:any)/update-activity'] = 'ChatController/$1/update_activity';
$route['CO/view_edit_qualities/(:any)/check-notification'] = 'ChatController/$1/check_notification';
$route['CO/view_edit_qualities/(:any)/check-activity'] = 'ChatController/$1/check_activity';

$route['CO/view_edit_punishment/update-notification'] = 'ChatController/update_notification';
$route['CO/view_edit_punishment/update-activity'] = 'ChatController/update_activity';
$route['CO/view_edit_punishment/check-notification'] = 'ChatController/check_notification';
$route['CO/view_edit_punishment/check-activity'] = 'ChatController/check_activity';

$route['CAO/check-notification'] = 'ChatController/check_notification';
$route['CAO/check-activity'] = 'ChatController/check_activity';

$route['CAO/add_physical_milestone/update-notification'] = 'ChatController/update_notification';
$route['CAO/add_physical_milestone/update-activity'] = 'ChatController/update_activity';
$route['CAO/add_physical_milestone/check-notification'] = 'ChatController/check_notification';
$route['CAO/add_physical_milestone/check-activity'] = 'ChatController/check_activity';

$route['CAO/view_edit_observation/update-notification'] = 'ChatController/update_notification';
$route['CAO/view_edit_observation/update-activity'] = 'ChatController/update_activity';
$route['CAO/view_edit_observation/check-notification'] = 'ChatController/check_notification';
$route['CAO/view_edit_observation/check-activity'] = 'ChatController/check_activity';

$route['CAO/view_edit_warning/update-notification'] = 'ChatController/update_notification';
$route['CAO/view_edit_warning/update-activity'] = 'ChatController/update_activity';
$route['CAO/view_edit_warning/check-notification'] = 'ChatController/check_notification';
$route['CAO/view_edit_warning/check-activity'] = 'ChatController/check_activity';

$route['CAO/view_edit_inspection/update-notification'] = 'ChatController/update_notification';
$route['CAO/view_edit_inspection/update-activity'] = 'ChatController/update_activity';
$route['CAO/view_edit_inspection/check-notification'] = 'ChatController/check_notification';
$route['CAO/view_edit_inspection/check-activity'] = 'ChatController/check_activity';

$route['CAO/view_edit_officer_record/update-notification'] = 'ChatController/update_notification';
$route['CAO/view_edit_officer_record/update-activity'] = 'ChatController/update_activity';
$route['CAO/view_edit_officer_record/check-notification'] = 'ChatController/check_notification';
$route['CAO/view_edit_officer_record/check-activity'] = 'ChatController/check_activity';

$route['CAO/view_edit_personal_record/update-notification'] = 'ChatController/update_notification';
$route['CAO/view_edit_personal_record/update-activity'] = 'ChatController/update_activity';
$route['CAO/view_edit_personal_record/check-notification'] = 'ChatController/check_notification';
$route['CAO/view_edit_personal_record/check-activity'] = 'ChatController/check_activity';

$route['CAO/view_edit_biography/update-notification'] = 'ChatController/update_notification';
$route['CAO/view_edit_biography/update-activity'] = 'ChatController/update_activity';
$route['CAO/view_edit_biography/check-notification'] = 'ChatController/check_notification';
$route['CAO/view_edit_biography/check-activity'] = 'ChatController/check_activity';

$route['CAO/view_edit_psychologist_report/update-notification'] = 'ChatController/update_notification';
$route['CAO/view_edit_psychologist_report/update-activity'] = 'ChatController/update_activity';
$route['CAO/view_edit_psychologist_report/check-notification'] = 'ChatController/check_notification';
$route['CAO/view_edit_psychologist_report/check-activity'] = 'ChatController/check_activity';

$route['CAO/view_edit_qualities/(:any)/update-notification'] = 'ChatController/$1/update_notification';
$route['CAO/view_edit_qualities/(:any)/update-activity'] = 'ChatController/$1/update_activity';
$route['CAO/view_edit_qualities/(:any)/check-notification'] = 'ChatController/$1/check_notification';
$route['CAO/view_edit_qualities/(:any)/check-activity'] = 'ChatController/$1/check_activity';

$route['CAO/view_edit_punishment/update-notification'] = 'ChatController/update_notification';
$route['CAO/view_edit_punishment/update-activity'] = 'ChatController/update_activity';
$route['CAO/view_edit_punishment/check-notification'] = 'ChatController/check_notification';
$route['CAO/view_edit_punishment/check-activity'] = 'ChatController/check_activity';



$route['SMO/check-notification'] = 'ChatController/check_notification';
$route['SMO/check-activity'] = 'ChatController/check_activity';
$route['SMO/update-notification'] = 'ChatController/update_notification';
$route['SMO/update-activity'] = 'ChatController/update_activity';

$route['SMO/add_physical_milestone/update-notification'] = 'ChatController/update_notification';
$route['SMO/add_physical_milestone/update-activity'] = 'ChatController/update_activity';
$route['SMO/add_physical_milestone/check-notification'] = 'ChatController/check_notification';
$route['SMO/add_physical_milestone/check-activity'] = 'ChatController/check_activity';

$route['SMO/view_edit_observation/update-notification'] = 'ChatController/update_notification';
$route['SMO/view_edit_observation/update-activity'] = 'ChatController/update_activity';
$route['SMO/view_edit_observation/check-notification'] = 'ChatController/check_notification';
$route['SMO/view_edit_observation/check-activity'] = 'ChatController/check_activity';

$route['SMO/view_edit_warning/update-notification'] = 'ChatController/update_notification';
$route['SMO/view_edit_warning/update-activity'] = 'ChatController/update_activity';
$route['SMO/view_edit_warning/check-notification'] = 'ChatController/check_notification';
$route['SMO/view_edit_warning/check-activity'] = 'ChatController/check_activity';

$route['SMO/view_edit_inspection/update-notification'] = 'ChatController/update_notification';
$route['SMO/view_edit_inspection/update-activity'] = 'ChatController/update_activity';
$route['SMO/view_edit_inspection/check-notification'] = 'ChatController/check_notification';
$route['SMO/view_edit_inspection/check-activity'] = 'ChatController/check_activity';

$route['SMO/view_edit_officer_record/update-notification'] = 'ChatController/update_notification';
$route['SMO/view_edit_officer_record/update-activity'] = 'ChatController/update_activity';
$route['SMO/view_edit_officer_record/check-notification'] = 'ChatController/check_notification';
$route['SMO/view_edit_officer_record/check-activity'] = 'ChatController/check_activity';

$route['SMO/view_edit_personal_record/update-notification'] = 'ChatController/update_notification';
$route['SMO/view_edit_personal_record/update-activity'] = 'ChatController/update_activity';
$route['SMO/view_edit_personal_record/check-notification'] = 'ChatController/check_notification';
$route['SMO/view_edit_personal_record/check-activity'] = 'ChatController/check_activity';

$route['SMO/view_edit_biography/update-notification'] = 'ChatController/update_notification';
$route['SMO/view_edit_biography/update-activity'] = 'ChatController/update_activity';
$route['SMO/view_edit_biography/check-notification'] = 'ChatController/check_notification';
$route['SMO/view_edit_biography/check-activity'] = 'ChatController/check_activity';

$route['SMO/view_edit_psychologist_report/update-notification'] = 'ChatController/update_notification';
$route['SMO/view_edit_psychologist_report/update-activity'] = 'ChatController/update_activity';
$route['SMO/view_edit_psychologist_report/check-notification'] = 'ChatController/check_notification';
$route['SMO/view_edit_psychologist_report/check-activity'] = 'ChatController/check_activity';

$route['SMO/view_edit_qualities/(:any)/update-notification'] = 'ChatController/$1/update_notification';
$route['SMO/view_edit_qualities/(:any)/update-activity'] = 'ChatController/$1/update_activity';
$route['SMO/view_edit_qualities/(:any)/check-notification'] = 'ChatController/$1/check_notification';
$route['SMO/view_edit_qualities/(:any)/check-activity'] = 'ChatController/$1/check_activity';

$route['SMO/view_edit_punishment/update-notification'] = 'ChatController/update_notification';
$route['SMO/view_edit_punishment/update-activity'] = 'ChatController/update_activity';
$route['SMO/view_edit_punishment/check-notification'] = 'ChatController/check_notification';
$route['SMO/view_edit_punishment/check-activity'] = 'ChatController/check_activity';

$route['Admin/update-notification'] = 'ChatController/update_notification';
$route['Admin/update-activity'] = 'ChatController/update_activity';
$route['Admin/check-notification'] = 'ChatController/check_notification';
$route['Admin/check-activity'] = 'ChatController/check_activity';

$route['Admin/show_edit_user/update-notification'] = 'ChatController/update_notification';
$route['Admin/show_edit_user/update-activity'] = 'ChatController/update_activity';
$route['Admin/show_edit_user/check-notification'] = 'ChatController/check_notification';
$route['Admin/show_edit_user/check-activity'] = 'ChatController/check_activity';

$route['Admin/edit_user_profile/update-notification'] = 'ChatController/update_notification';
$route['Admin/edit_user_profile/update-activity'] = 'ChatController/update_activity';
$route['Admin/edit_user_profile/check-notification'] = 'ChatController/check_notification';
$route['Admin/edit_user_profile/check-activity'] = 'ChatController/check_activity';



$route['chat-clear'] = 'ChatController/chat_clear_client_cs';



$route['mission/(:any)']='Mission/mission/$1';
$route['mission']='CO/mission';
$route['get_values/(:any)']='Manager/Get_Values/$1';
$route['show_records/(:any)']='Manager/show_records/$1';
$route['default_controller'] = 'User_Login';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
