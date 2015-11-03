angular
    .module('app')
    .factory('categories_service', ['$http', function($http) {
    	return {
	    	index: function() {
		       return $http.get("/category");
	    	}
	    	
    	}    	
    }]);