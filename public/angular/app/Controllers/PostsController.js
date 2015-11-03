angular.module('app').controller('PostsController', ['$scope', '$http','$location','$routeParams','posts_service', function($scope,$http,$location,$routeParams,posts_service){ 


   var location = $location.url();

    switch(location) 
    {
        case '/posts' : index() ; break ;
        case '/posts/create'  : create() ; break ;
        case 'main.posts-edit'    : edit() ; break ;
        default : show();
    }

    function index() {
		posts_service.index()
        .success(function(data){
            $scope.posts = data;                        
        })
	}

    function create() {

    }

	function show() {
		var id = $routeParams.postId;
		posts_service.show(id)
        .success(function(data){
            $scope.post = data;                        
        })
		
                  
	}

}]);