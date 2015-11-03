angular
	.module('app')
	.factory('post',['$http', function($http) {
		return {
			index : function() {
				return $http.get("/posts");
			},
			create : function( data ) {
				return $http.get('/posts/create');
			},
			store : function( data ) {
				return $http.post('posts', data);
			},
			update : function( id , data ) {
				return $http.put('posts/' + id , data);
			},
			edit : function( id ) {
				return $http.get('/posts/'+ id + '/edit');
			},
			delete : function( id ) {
				return $http.delete('posts/' + id );
			}
		}
	}])