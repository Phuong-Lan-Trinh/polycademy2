'use strict';

//PAGE CONTROLLER

angular.module('Nav.Controllers', ['Nav.Controllers.Index']);

//METHOD CONTROLLERS

angular.module('Nav.Controllers.Index', [])
	.controller('NavIndexCtrl', [
		'$scope',
		function($scope){
		
			$scope.data = 'Waat?';
			
		}
	]);