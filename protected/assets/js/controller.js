var LG = function( a, b ) { console.log([a,b]); }

function purchaseCtrl( $scope, $routeParams, $http, $location,  api ) {

	$scope.refresh = function( data ) {
		$scope.purchase = data;
	};

	$scope.update = function($http) {
		api.update($scope.purchase, 'purchase', $http );
	}

	$scope.add = function($http) {
		api.add($scope.purchase, 'purchase', $http );
	}

	api.get( 59 , 'purchase', $http, $scope.refresh );
}

function customerCtrl( $scope, $routeParams, $http, api ){
	App.scopes['customer'] = $scope;

	$scope.showOne = false;
	$scope.customer = {'name': 'a',id: 'b'};
}

function listCtrl( $scope, $routeParams, $http, api ) {
	App.scopes['list'] = $scope;

	$scope.list = {};

	$scope.lists = [
		{ 'name':"Joe", "id":1},
		{ 'name':"Bill", "id":2}
	];

	setTimeout( function() {
		api.list( 'purchase', $http, $scope.setList );
	}, 3000);

	$scope.setList = function( data ) {
		App.scopes['list'].lists = data;
	}

	$scope.view = function(list) {
		App.scopes['customer']['customer'] = list;
		App.scopes['customer']['showOne'] = true;
		LG( $scope.lists );
	};

}
