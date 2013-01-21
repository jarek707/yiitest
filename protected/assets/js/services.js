angular.module('app.service', [])
.
value('api', {
		get: function( id, route, $http, cb ) {
			$http.get( App.cfg.baseUrl + route + '/get?id=' + id ).success(
				function( data ) { if ( typeof cb != 'undefined' ) cb( data ); }
			);
		},

		update: function( data, route, $http, cb ) {
			$.post( App.cfg.baseUrl + route + '/update', data ).success(
				function( data ) { if ( typeof cb != 'undefined' ) cb( data ); }
			);
		},

		add: function( data, route, $http, cb ) {
			$.post( App.cfg.baseUrl + route + '/set', data ).success(
				function( data ) { if ( typeof cb != 'undefined' ) cb( data ); }
			);
		},

		list: function( route, $http, cb ) {
			$http.get( App.cfg.baseUrl + route + '/list').success(
				function( data ) { if ( typeof cb != 'undefined' ) cb( data ); }
			);
		}
	}
)
