angular
    .module('app')
    .factory('posts_service', ['$http', function($http) {
    	return {
	    	index: function() {
		       return $http.get("/post");
	    	},
	    	show: function(id) {
		       return $http.get("/post/"+id);
	    	},
			store : function( data ) {
				//console.log(data)
				return $http.post('post', data);
			},
			update : function( id , data ) {
				return $http.put('post/' + id , data);
			},
	    	
    	}    	
    }]);