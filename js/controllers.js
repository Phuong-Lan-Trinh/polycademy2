'use strict';

/* These are the MAJOR controllers! */
var AppControllers = angular.module('App.controllers', []);

AppControllers
	.controller('NavCtrl', ['$scope', function($scope){
		$scope.data = 'Waat?'
	}])
	.controller('HomeCtrl', ['$scope', function($scope){
		$scope.data = 'HELLO!';
	}]);
	
AppControllers
	.controller('BlogCtrl', ['$scope', function($scope){
		$scope.data = 'YIPPE!';
	}]);

/*
angular.module('App.controllers', [])
	.controller('NavCtrl', ['$scope', function($scope){
		$scope.data = 'Waat?'
	}])
	.controller('HomeCtrl', ['$scope', function($scope){
		$scope.data = 'HELLO!';
	}]);
	
angular.module('App.controllers', [])
	.controller('BlogCtrl', ['$scope', function($scope){
		$scope.data = 'YIPPE!';
	}]);
	
*/