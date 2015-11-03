angular
    .module('app')
    .controller('PostsController', ['$scope', '$state', '$http','post' , 'category','data','$stateParams', function($scope, $state, $http,post, category, data){

	$scope.success_message 	= null;
	$scope.alerts 			= {};
    $scope.postData     = {};


	var currentState   = $state.$current.self.name;

    switch(currentState) {
        case 'main.posts'         : index() ; break ;
        case 'main.posts-create'  : create() ; break ;
        case 'main.posts-edit'    : edit() ; break ;
    }

    function index() {
        post.index()
        .success(function(data) {
            $scope.posts = data;
        })
    }

    function create() {
        post.create()
        .success(function(data) {
            $scope.categories = data;
        })
    }

    $scope.submit = function() {
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

   function edit(id) {
    category.index()
    .success(function(data){
        $scope.categories = data;
    })
    post.edit( data.data.post.id )
    .success(function(data) {
        $scope.postData = data;
    })

   }

    $scope.deletePost = function(id){
        post.delete( id )
        .success(function(  ) {
            location.reload();
        })
    }
    
    $scope.selectedCategories = function(category_id){
        for( var category in $scope.postData.categories_ids ) {
            if( $scope.postData.categories_ids[category] == category_id ) {
                return true;
            }
        }      
        return false;
    }
}]);