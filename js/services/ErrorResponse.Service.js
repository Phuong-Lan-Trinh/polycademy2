'use strict';

/**
 * Response Handler for Error Codes across all HTTP requests to show an alert box!
 */
angular.module('ErrorResponse.Service', [])
	.config(
		[
			'$httpProvider',
			'$compileProvider',
			function($httpProvider, $compileProvider){
				
				var elementsList = $();
				var showMessage = function(content, cl, time){
					$('<div/>')
						.addClass('message')
						.addClass(cl)
						.hide()
						.fadeIn('fast')
						.delay(time)
						.fadeOut('fast', function(){ $(this).remove(); })
						.appendTo(elementsList)
						.text(content);
				};
				
				$httpProvider.responseInterceptors.push(['$q', function($q) {
				
					return function(promise) {
						
						return promise.then(
							function(successResponse) {
								
								if (successResponse.config.method.toUpperCase() != 'GET'){
									showMessage('Success', 'successMessage', 5000);
								}
								
								return successResponse;

							},
							function(failureResponse) {
							
								switch (failureResponse.status) {
									case 401:
										showMessage('Wrong usename or password', 'errorMessage', 20000);
										break;
									case 403:
										showMessage('You don\'t have the right to do this', 'errorMessage', 20000);
										break;
									case 404:
										showMessage('Sorry nothing happened!', 'errorMessage', 20000);
										break;
									case 500:
										showMessage('Server internal error: ' + failureResponse.data, 'errorMessage', 20000);
										break;
									default:
										showMessage('Error ' + failureResponse.status + ': ' + failureResponse.data, 'errorMessage', 20000);
								}
								
								return $q.reject(failureResponse);
								
							}
						);
						
					};
					
				}]);
				
				$compileProvider.directive('appMessages', function() {
				
					var directiveDefinitionObject = {
						link: function(scope, element, attrs) {
						
							//pushes this element into the elementsList, which is a jQuery object, when that object gets updated, there's a direct binding to the new stuff
							elementsList.push(element);
						
						}
					};
					
					return directiveDefinitionObject;
					
				});
				
			}
		]
	);