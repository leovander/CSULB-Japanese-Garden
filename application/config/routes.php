<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Modified: Israel
 * Date/Time: 3/20/14 4:12pm
 */
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

//$route['memberships'] = 'pages/view/membership';
//$route['memberships/(:any)'] = 'pages/view/$1';
//$route['weddings'] = 'pages/view/wedding';
//$route['weddings/(:any)'] = 'pages/view/$1';

//TEST ROUTES
$route['testhours'] = 'events/testHours';

//ABOUT_US ROUTES
$route['about'] = 'pages/about';

//CONTACT US ROUTES
$route['pages/contact_us'] = 'pages/contact_us';

//VOLUNTEER
$route['pages/volunteer'] = 'pages/volunteer';

//RATE OUR WEBSITE
$route['pages/rate_our_website'] = 'pages/rate_our_website';


//COMMENT
$route['pages/comment'] = 'pages/comment';

//EVENTS ROUTES
$route['events'] = 'events/eventsPage';
$route['events/details/(:num)'] = 'events/eventDetailsPage/$1';
$route['events/events_calendar'] = 'events/calendarPage';
$route['closures'] = 'events/closurePage';
$route['events/create'] = 'events/createEvent';
$route['events/getevents'] = 'events/getEvents';
$route['events/events/getevents'] = 'events/getEvents';
$route['events/getclosures'] = 'events/getClosures';
$route['events/removeevent'] = 'events/removeEvent';

//ADMIN USER SPACE ROUTES
$route['admin_login'] = "login";
$route['admin_logout'] = 'admin/logout';
$route['admin_page'] = 'admin';
$route['verifylogin'] = 'verifylogin';
$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';
$route['deleteimage'] = 'upload/deleteImage';
$route['uploadimage'] = 'upload/uploadImage';
$route['sethours'] = 'admin/setHours';
$route['gethours'] = 'admin/getHours';
//$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */