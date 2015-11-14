angular.module('app')
.controller('CategoriesController', ['$scope','$route', '$http','$routeParams','categories_service','$location', CategoriesController]);

function CategoriesController($scope,$route,$http,$routeParams,categories_service,$location) 
{ 
   
   var location = $location.url();
   var id = $routeParams.categoryId;

    switch(location) 
    {
        case '/categories' : index() ; break ;
        case '/categories/' + id + '/edit'    : edit(id) ; break ;
        case '/categories/' + id : show() ; break ;
    }

    function index() 
    {
        categories_service.index()
        .success(function(data){
            
            $scope.categories = data;  
            console.log($scope.categories)  ;                    
        })
    }

    $scope.submit = function() {
        

    if(location == "/categories/create") {
        categories_service.store( $scope.categoryData )
        .then(function(response) {
            if (response.data.status == "success") {
                $location.path('/categories');
            }
        },
        function(response) {
            console.log(response.data.title);
            $scope.alerts = { errors : response.data.title }
        }); 
    }   
    else{
            categories_service.update( id , $scope.categoryData )
            .then(function(data){
                if(data.data.status == "success") {
                   $location.path('/categories'); 
                }
                else {

                }
            });
        }   
    }



   function edit(id) {
    categories_service.show( id )
    .success(function(data) {
        $scope.categoryData.title=data.title
        })
   }    

    function show() 
    { 
        categories_service.show(id)
        .success(function(data){
            $scope.category = data;                        
        })                    
    } 

    $scope.deleteCategory = function(id){
        categories_service.delete( id )
        .success(function() {
            $route.reload(); 
        })
    }    

}