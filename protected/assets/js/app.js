'use strict';                                                                       
                                                                                    
var App=angular.module('app',['app.directive', 'app.service'])
	.
	run( function() {                                                       
	//initialize app here                                                           
	} 
);  

App.cfg = {
	'baseUrl' :'http://testdrive/api/' 
}
