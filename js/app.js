'use strict';

// Declare app level module which depends on filters, and services
angular.module('App', ['App.controllers', 'App.filters', 'App.services', 'App.directives'])
	.config(
		[
			'$routeProvider',
			function($routeProvider) {
				$routeProvider.when(
					'/',
					{
						templateUrl: 'home_index.html',
						controller: 'HomeCtrl'
					}
				);
				$routeProvider.when(
					'/blog',
					{
						templateUrl: 'blog_index.html',
						controller: 'BlogCtrl'
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