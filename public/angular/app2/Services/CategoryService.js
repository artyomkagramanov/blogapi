angular
    .module('app')
    .factory('category', ['$http', function($http) {
    	return {
	    	index: function() {
		       return $http.get("/categories");
	    	},
	    	store : function( data ) {
	    		return $http.post('categories', data);
	    	},
	    	update: function( id , data ) {
	    		return $http.put('categories/' + id , data);
	    	},
	    	edit: function( id ) {
	    		return $http.get('/categories/'+ id + '/edit');
	    	},
	    	delete: function( id ) {
	    		return $http.delete('categories/' + id );
	    	}
    	}    	
    }]);