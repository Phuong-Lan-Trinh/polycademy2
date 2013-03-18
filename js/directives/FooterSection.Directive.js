'use strict';

angular.module('FooterSection.Directive', []);

angular.module('FooterSection.Directive')
	.directive('footerSectionDir', [ //DIRECTIVES must have camelcased names
		//this function is a DI factory, we can inject dependencies here...
		function(){
			//can run some default configuration of stuff here
			return {
				scope: {},
				link: function(scope, element, attributes){
				
					//we're not using scope.watch here because, watch would require the values to change, and it can't watch browser events like window.resize, also we're not watching value changes, but events! therefore we're doing jquery event binding
					//another method here: http://jsfiddle.net/bY5qe/
					
					//change this to reflect an input to the directive later on
					var selector = 'section > p';
					
					var items = element.find(selector);
					
					var equaliseHeight = function(){
						var maxHeight = 0;
						items
							.height('auto') //reset the heights to auto to see if the content pushes down to the same height
							.each(function(){
								//find out which has the max height
								maxHeight = $(this).height() > maxHeight ? $(this).height() : maxHeight; 
							})
							.height(maxHeight); //then make them all the same maximum height!
					};
					
					//run it once
					equaliseHeight();
					
					//on the resize event from jquery, run a function, this function is a pointer!
					$(window).resize(equaliseHeight);
					
				}
			};
			
		}
	]);