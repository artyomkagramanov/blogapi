angular
    .module('app')
    .factory('category_service', ['$http', function($http) {
    	return {
	    	index: function() {
		       return $http.get("/category");
	    	}
	    	
    	}    	
    }]);