'use strict';                                                                       
                                                                                    
var App=angular.module('app',['app.directive', 'app.service'])
	.
	config(['$routeProvider', function( $routeProvider ) {
		$routeProvider.	
			when('/purchase',{templateUrl: '../partials/purchase.html', controller: purchaseCtrl}).
			when('/customer',{templateUrl: '../partials/customer.html', controller: customerCtrl}).
			when('/list',    {templateUrl: '../partials/list.html',     controller: listCtrl}).
			otherwise({redirectTo: '/customer'})
	}])
	.
	run( function() {                                                       
	//initialize app here                                                           
	} 
);  

App.cfg = {
	'baseUrl' :'http://testdrive/api/' 
};

App.scopes = {};
