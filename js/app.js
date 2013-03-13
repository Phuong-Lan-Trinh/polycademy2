'use strict';

//BOOTSTRAPPER

//app is an module that is dependent on several top level modules
var app = angular.module('App', [
	'Controllers',
	'Filters',
	'Services',
	'Directives',
	'ngResource' //for RESTful resources
]);

//Define all the page level controllers (Application Logic)
angular.module('Controllers', ['Nav.Controllers', 'Home.Controllers', 'Blog.Controllers']);
//Define all shared services (Interaction with Backend)
angular.module('Services', ['Version.Service', 'BlogData.Service']);
//Define all shared directives (UI Logic)
angular.module('Directives', ['NewsItem.Directive']);
//Define all shared filters (UI Filtering)
angular.module('Filters', ['Interpolate.Filter']);

//ROUTER

//Define all routes here and which page level controller should handle them
app.config(
	[
		'$routeProvider',
		'$locationProvider',
		function($routeProvider, $locationProvider) {
			
			//HTML5 Mode URLs
			$locationProvider.html5Mode(true).hashPrefix('!');;
		
			$routeProvider.when(
				'/',
				{
					templateUrl: 'home_index.html',
					controller: 'HomeIndexCtrl'
				}
			);
			$routeProvider.when(
				'/blog',
				{
					templateUrl: 'blog_index.html',
					controller: 'BlogIndexCtrl'
				}
			);
			$routeProvider.otherwise(
				{
					redirectTo: '/'
				}
			);
		}
	]
);