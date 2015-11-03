angular
    .module('app')
    .factory('posts_service', ['$http', function($http) {
    	return {
	    	index: function() {
		       return $http.get("/post");
	    	},
	    	show: function(id) {
		       return $http.get("/post/"+id);
	    	}
	    	
    	}    	
    }]);