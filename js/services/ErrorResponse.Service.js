'use strict';

//REFACTOR PLAN

//1. Setup a model variable outside the httpProvider and compileProvider
//2. Inside the interceptor, push error messages to the model variable
//3. Inside directive, take the model variable, and bind it to the scope.
//4. Inside the HTML, take the model and do an ng-repeat (apply ng-show) on that model too!
//5. Messages can be acquired from the response itself! Use error variable... (Actually don't use that, use your own, decouple the client from the server in this case!)
//6. Change the HTML so it's applied like an alert box, but one which appears and fades away. Up on top of the UI... (overlayed on top), AJAX loading always happens first, and then error box message
//7. Remember some messages will be reshown as part of validation...? So these are the temporary messages!
//MAKE A FADE DIRECTIVE ON THE ITEM THATS BEING ADDED, this means as soon as it exists, it runs a fadein, and later on after a delay can destroy itself...
//OR you can watch the length of the element, and when the length changes, bind a fadein then fadeout and destroy to its children
//OR watch the element add itself to it, and then bind fade in then fadeout then destroy

/**
 * Response Handler for Error Codes across all HTTP requests to show an alert box!
 */
angular.module('ErrorResponse.Service', [])
	.config(
		[
			'$httpProvider',
			'$compileProvider',
			function($httpProvider, $compileProvider){
				
				/*
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
				*/
				
				
				//model variable...
				var httpMessages = [];
				
				$httpProvider.responseInterceptors.push(['$q', function($q) {
				
					return function(promise) {
						
						return promise.then(
							function(successResponse) {
								
								//we only want to show anything that wasn't a GET based request
								//these allow you show messages, you don't have to show these types though (because usually not required)
								switch(successResponse.config.method.toUpperCase()){
									case 'GET':
										httpMessages.push({
											message: 'Successfully Received',
											type: 'success'
										});
										break;
									case 'POST':
										httpMessages.push({
											message: 'Successfully Posted',
											type: 'success'
										});
										break;
									case 'PUT':
										httpMessages.push({
											message: 'Successfully Updated',
											type: 'success'
										});
										break;
									case 'DELETE':
										httpMessages.push({
											message: 'Sucessfully Deleted',
											type: 'success'
										});
										break;
								}
								
								return successResponse;

							},
							function(failureResponse) {
							
								//console.log(failureResponse);
								
								switch(failureResponse.status){
									case 400: //show validation error messages then!
										httpMessages.push({
											message: 'Validation failed, try tweaking your submission.',
											type: 'failure'
										});
										break;
									case 401: //for ionauth authentication, will need to redirect to login screen, or modal box
										httpMessages.push({
											message: 'Unauthorised request, try logging in.',
											type: 'failure'
										});
										break;
									case 403: //returned by server for resources the user should not be able to access directly
										httpMessages.push({
											message: 'You can\'t access this.',
											type: 'failure'
										});
										break;
									case 404:
										httpMessages.push({
											message: '404, sorry could not find what you were looking for.',
											type: 'failure'
										});
										break;
									case 405:
										httpMessages.push({
											message: 'The requested method was incompatible with the requested resource.',
											type: 'failure'
										});
										break;
									case 500:
										httpMessages.push({
											message: 'There was a server error, try again later, or contact the owners.',
											type: 'failure'
										});
										break;
									default:
										httpMessages.push({
											message: failureResponse.status + ' General error processing the request',
											type: 'failure'
										});
								}
								
								return $q.reject(failureResponse);
								
							}
						);
						
					};
					
				}]);
				
				$compileProvider.directive('httpMessages', function() {
					
					return {
					
						link: function(scope, element, attrs){
							
							//binding the httpMessages to the scope of the directive
							scope.httpMessages = httpMessages;
							
							scope.$watch(
								function(){
									//console.log(httpMessages);
									return httpMessages;
								},
								function(newValue, oldValue){
									console.log(newValue, 'NEW VALUE');
									console.log(oldValue, 'OLD VALUE');
									element.fadeIn('fast').delay(2000).fadeOut('slow');
								}
							);
							
						}
					
					};
					
				});
				
			}
		]
	);