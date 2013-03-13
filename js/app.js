'use strict';

//BOOTSTRAPPER

//app is an module that is dependent on several top level modules
var app = angular.module('App', ['Controllers', 'Filters', 'Services', 'Directives']);

//Define all the page level controllers (Application Logic)
angular.module('Controllers', ['Nav.Controllers', 'Home.Controllers', 'Blog.Controllers']);
//Define all shared services (Interaction with Backend)
angular.module('Services', ['Version.Service']);
//Define all shared directives (UI Logic)
angular.module('Directives', ['NewsItem.Directive']);
//Define all shared filters (UI Filtering)
angular.module('Filters', ['Interpolate.Filter']);

//ROUTER

//Define all routes here and which page level controller should handle them
app.config(
	[
		'$routeProvider',
		function($routeProvider) {
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