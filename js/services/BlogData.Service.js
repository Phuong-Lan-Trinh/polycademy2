'use strict';

//Blog data service will acquire the data from the blogo!
angular.module('BlogData.Service', [])
	.factory('BlogDataServ', [
		'$resource',
		function($resource){
			return $resource('api/phones/:id');
		}
	]);
	
/*
angular.module('phonecatServices', ['ngResource']).
	factory('Phone', function($resource){
	
		//FACTORIES RETURN WHAT THEY RETURN
		return $resource(
			'phones/:phoneId.json',
			{},
			{
				query: {
					method: 'GET',
					params: {phoneId:'phones'}, 
					isArray: true
				}
			}
		);
	}
);
*/