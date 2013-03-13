'use strict';

//SINGLE REUSABLE DIRECTIVE

angular.module('NewsItem.Directive', [])
	.directive('NewsItemDir', [
		'version',
		function(version) {
		
			return function(scope, elm, attrs) {
				elm.text(version);
			};
			
		}
	]);