'use strict';

angular.module('Blog.Controllers', ['Blog.Controllers.Index']);

angular.module('Blog.Controllers.Index', [])
	.controller('BlogIndexCtrl', [
		'$scope',
		function($scope){
			$scope.data = 'YIPPE!';
		}
	]);