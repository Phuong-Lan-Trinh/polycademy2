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
angular.module('Controllers', ['Nav.Controllers', 'Home.Controllers', 'Blog.Controllers', 'Courses.Controllers']);
//Define all shared services (Interaction with Backend)
angular.module('Services', ['Version.Service', 'BlogData.Service', 'Courses.Service']);
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
			
			$routeProvider
				.when(
					'/',
					{
						templateUrl: 'home_index.html',
						controller: 'HomeIndexCtrl'
					}
				)
				.when(
					'/courses',
					{
						templateUrl: 'courses_index.html',
						controller: 'CoursesIndexCtrl'
					}
				)
				.when(
					'/blog',
					{
						templateUrl: 'blog_index.html',
						controller: 'BlogIndexCtrl'
					}
				)
				.otherwise(
					{
						redirectTo: '/'
					}
				);
			
		}
	]
);

app.run([
	'$rootScope',
	'$cookies',
	'$http',
	function($rootScope, $cookies, $http){
		
		//watch the cookies, and setup our XSRF token on our headers
		$rootScope.$watch(
			function(){
				return $cookies[serverVars.csrfCookieName];
			},
			function(){
				$http.defaults.headers.common['X-XSRF-TOKEN'] = $cookies[serverVars.csrfCookieName];
			}
		);
		
	}
]);