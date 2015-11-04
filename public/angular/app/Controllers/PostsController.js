angular.module('app').controller('PostsController', ['$scope', '$http','$location','$routeParams','posts_service','categories_service', function($scope,$http,$location,$routeParams,posts_service,categories_service){ 


   var location = $location.url();
   var id = $routeParams.postId;
   var s="";

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
/*                $scope.postData.description=data.description;
                console.log(data.categories)*/
                //$scope.postData.title=data.title
        })
    }
    $scope.fileNameChaged=function(image){
            console.log(image)
    }

    $scope.submit = function() {
        var x = document.getElementById("myFile");
        console.log(x);
        $scope.postData.file=s;
        console.log($scope.postData);
        if(currentState == "main.posts-create") {
            post.store($scope.postData).then(function(data){
                if (data.data.status == "success")  {
                    $state.transitionTo('main.posts',{'message' :  data.data.message});
                    $scope.success_message = data.data.message;
                }
                else {
                    $scope.error_message = data.data.message;
                }
            },
            function(response){
                $scope.alerts = { errors : response.data };
           }); 
        }
        else {
            post.update( data.data.post.id , { title: $scope.postData.title,description: $scope.postData.description,categories_ids: $scope.postData.categories_ids,image: $scope.postData.image })
                .then(function(data){
                    if(data.data.status == "success") {
                        $state.transitionTo('main.posts',{'message' : data.data.message});
                        $scope.success_message = data.data.message;
                    }
            });
        }   
    }

    $scope.selectedCategories = function(category_id){
return true;
    }

}]);