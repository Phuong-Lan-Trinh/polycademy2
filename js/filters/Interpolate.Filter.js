'use strict';

//REUSABLE FILTER

angular.module('Interpolate.Filter', [])
	.filter('Interpolate', [
		'version',
		function(version){
			return function(text){
				return String(text).replace(/\%VERSION\%/mg, version);
			};
		}
	]);