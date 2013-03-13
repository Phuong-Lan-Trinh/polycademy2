'use strict';

angular.module('Blog.Controllers', ['Blog.Controllers.Index']);

angular.module('Blog.Controllers.Index', [])
	.controller('BlogIndexCtrl', [
		'$scope',
		'BlogDataServ',
		function($scope, BlogDataServ){
			
			BlogDataServ.get({id: 'one-specific'},
				function(response){
					//success callback
					$scope.singlephone = response;
				},
				function(response){
					//error callback
					if(typeof response.data.error !== 'undefined'){
						$scope.singlephone.error = response.data.error;
					}else{
						$scope.singlephone.error = 'Uh oh something did not work!';
					}
				}
			);
			
			$scope.phones = BlogDataServ.query();
			
			$scope.addSomeData = function(){
			
				// var newPhone = new BlogDataServ();
				// newPhone.phoneAge = '5';
				// newPhone.phoneId = 'some random';
				// newPhone.phoneName = 'Some awesome phone';
				// newPhone.phoneDesc = 'Yippee!';
				// newPhone.$save();
				
				BlogDataServ.save(
					{},
					{
						phoneAge: '5',
						phoneId: 'some random',
						phoneName: 'Awesome Phone',
						phoneDesc: 'Yippee!'
					}
				);
			
			};		
			
		}
	]);