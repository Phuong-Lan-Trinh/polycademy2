'use strict';

angular.module('Footer.Controllers', ['ErrorResponse.Service']);

angular.module('Footer.Controllers')
	.controller('FooterCtrl', [
		'$scope',
		'httpMessages',
		function($scope, httpMessages){
		
			//we want only error messages
			//console.log(httpMessages);
			//for(var i = 0; i < http
		
			$scope.httpMessages = httpMessages;
		}
	]);