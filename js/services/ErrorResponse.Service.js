'use strict';

//REFACTOR PLAN

//1. Setup a model variable outside the httpProvider and compileProvider
//2. Inside the interceptor, push error messages to the model variable
//3. Inside directive, take the model variable, and bind it to the scope.
//4. Inside the HTML, take the model and do an ng-repeat (apply ng-show) on that model too!
//5. Messages can be acquired from the response itself! Use error variable... (Actually don't use that, use your own, decouple the client from the server in this case!)
//6. Change the HTML so it's applied like an alert box, but one which appears and fades away. Up on top of the UI... (overlayed on top), AJAX loading always happens first, and then error box message
//7. Remember some messages will be reshown as part of validation...? So these are the temporary messages!

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