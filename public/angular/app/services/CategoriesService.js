angular
    .module('app')
    .factory('categories_service', ['$http', function($http) {
    	
    	return {
	    	index: function() {
	    		//console.log($http.get("/category"))
		       return $http.get("/category");
	    	},
	    	show: function(id) {
		       return $http.get("/category/"+id);
	    	},
	    	store : function( data ) {
	    		return $http.post('/category', data);
	    	},
	    	update: function( id , data ) {
	    		return $http.put('category/' + id , data);
	    	},
	    	delete: function( id ) {
	    		return $http.delete('category/' + id );
	    	}
	    	
    	}    	
    }]);