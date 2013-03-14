'use strict';

//BOOTSTRAPPER

//app is an module that is dependent on several top level modules
var app = angular.module('App', [
	'Controllers',
	'Filters',
	'Services',
	'Directives',
	'ngResource', //for RESTful resources
	'ngCookies'
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
			$locationProvider.html5Mode(true).hashPrefix('!');
		
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

//XSRF!!
app.run([
	'$rootScope',
	'$cookies',
	'$http',
	function($rootScope, $cookies, $http){
		//establish a watch loop for the csrf_cookie!
		$rootScope.$watch(
			function(){
				return $cookies[serverVars.csrfCookieName];
			},
			function(){
				//HERE CHANGE THE XSRF HEADER VALUES... using $http
				//Then change on the server code to check for header XSRF
				console.log($cookies[serverVars.csrfCookieName], 'IT CHANGED!');
			}
		);
	}
]);