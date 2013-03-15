<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Academic Free License version 3.0
 *
 * This source file is subject to the Academic Free License (AFL 3.0) that is
 * bundled with this package in the files license_afl.txt / license_afl.rst.
 * It is also available through the world wide web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2013, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/AFL-3.0 Academic Free License (AFL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
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
| There are two reserved routes:
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
*/

Pigeon::map(function($r){
	
	//STILL ONE MORE PROBLEM TO SOLVE, you need to figure out how to route the Robot requests and serve up proper html snapshots or do the year of moo thing...
	
	
	//Route all API requests to the correct controller/method
	$r->route('api', false, function($r){
		
		//phones resource RESTFUL AS SHIT!
		$r->get('phones', 'phones/index');
		$r->get('phones/(:any)', 'phones/show/$1');
		$r->post('phones', 'phones/create');
		$r->put('phones/(:any)', 'phones/update/$1');
		$r->delete('phones/(:any)', 'phones/delete/$1');
		
		//courses resource, we put in and acquire new courses, so this is where we would setup dates and stuff
		//each 11 weeks course constitute a subcourse
		//there could different types!
		$r->resources('courses');
		
		//applications resource, we put in people's applications here
		$r->resources('applications');
		
		
		//migration comment these in production
		$r->get('migrate', 'migrate/index');
		$r->get('migrate/revert', 'migrate/revert');
		
		//options for CORS will need to be implemented
		
	});
	
	//Route everything else to AngularJS, no parameters allowed!
	$r->route('(.*)', 'home#index'); //THIS ONE IS CAUSING A BUG, infinite partial requests due to constant redirection (the relative requests for partials are incorrect) (its fixed now, due to the fixing of the base_url to the javascript code!)
	//$r->route('(:any)', 'home#index');
	//$r->route('(:any)/(:any)', 'home#index');
	
});

$route = Pigeon::draw();

$route['default_controller'] = 'home';
$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */