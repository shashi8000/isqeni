<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


//$route['default_controller'] = "Home";
$page_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$route['default_controller'] = (strpos($page_url,'administrator'))?"Home":"Welcome";

$route['bill/(:any)'] = "bill/index/$1";

$route['sitemap/index\.xml'] = "sitemap";
$route['404_override'] = '';
//$route['isqenivendor'] = 'login/index';


/* End of file routes.php */
/* Location: ./application/config/routes.php */