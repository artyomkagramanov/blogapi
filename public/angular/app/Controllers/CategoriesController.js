angular.module('app').controller('CategoriesController', ['$scope', '$http','categories_service','$location', function($scope,$http,categories_service,$location){ 
   
   var location = $location.url();

    switch(location) 
    {
        case '/categories' : index() ; break ;
        case 'main.posts-create'  : create() ; break ;
        case 'main.posts-edit'    : edit() ; break ;
        default : show();
    }

    function index() {
   		categories_service.index()
        .success(function(data){
            $scope.categories = data;                        
        })
	}




}]);