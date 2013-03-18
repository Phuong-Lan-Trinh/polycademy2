'use strict';

//SINGLE REUSABLE DIRECTIVE

angular.module('NewsItem.Directive', [])
	.directive('newsItemDir', [
		'version',
		function(version) {
		
			return function(scope, elm, attrs) {
				elm.text(version);
			};
			
		}
	]);