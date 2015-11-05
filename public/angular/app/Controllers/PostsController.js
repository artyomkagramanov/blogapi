angular.module('app')
.controller('PostsController', ['$scope','$route', '$http','$location','$routeParams','posts_service','categories_service',PostsController]);
    
function PostsController($scope,$route,$http,$location,$routeParams,posts_service,categories_service)
{ 


   var location = $location.url();
   var id = $routeParams.postId;

    switch(location) 
    {
        case '/posts' : index() ; break ;
        case '/posts/create'  : create() ; break ;
        case '/posts/' + id + '/edit'    : edit(id) ; break ;
        default : show();
    }



    function index() {

		posts_service.index()
        .success(function(data){
            $scope.posts = data;                        
        })
	}

    function create() {

        categories_service.index()
        .success(function(data){
            $scope.categories = data;                        
        })
    }

	function show() {
		var id = $routeParams.postId;
		posts_service.show(id)
        .success(function(data){
            $scope.post = data;                        
        })           
	}

    function edit(id) {
        create();
        posts_service.show( id )
        .success(function(data) {
                $scope.postData=data;
        })
    }


    $scope.submit = function() { 

        console.log($scope.postData)
        var inputs = $scope.postData;
        if(location == "/posts/create") {
            posts_service.store(inputs).then(function(response){
                if (response.data.status == "success")  {
                        $location.path('/posts');
                }
                else {
                        $scope.alerts = { errors : response.data.title };
                }
            },
            function(response){
                $scope.alerts = { errors : response.data };
           }); 
        }
        else {
                posts_service.update(id, inputs)
                .then(function(data){
                    if(data.data.status == "success") {
                        $location.path('/posts');
                    }
            });
        }   
    }

    $scope.deletePost = function(id){
        posts_service.delete(id)
        .success(function() {
            $route.reload();
        })
    }

}