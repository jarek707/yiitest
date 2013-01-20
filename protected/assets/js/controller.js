var LG = function( a, b ) { console.log([a,b]); }

function firstCtrl( $scope, $routeParams, $http, $location,  api ) {

	$scope.refresh = function( data ) {
		$scope.purchase = data;
	};

	$scope.update = function($http) {
		api.update($scope.purchase, 'purchase', $http );
	}

	$scope.add = function($http) {
		api.add($scope.purchase, 'purchase', $http );
	}

	api.get( 10 , 'purchase', $http, $scope.refresh );
}
