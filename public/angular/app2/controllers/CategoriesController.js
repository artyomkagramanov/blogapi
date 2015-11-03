angular
    .module('app')
    .controller('CategoriesController', ['$scope', '$state','category', '$http', 'data','$stateParams', function($scope, $state,category, $http, data,$stateParams){

    $scope.success_message  = null;
    $scope.alerts           = {};
    $scope.categoryData     = {};

    var currentState   = $state.$current.self.name;

    switch(currentState) {
        case 'main.categories'         : index() ; break ;
        case 'main.categories-create'  : create() ; break ;
        case 'main.categories-edit'    : edit() ; break ;
    }

    function index() {       
        category.index()
        .success(function(data){
            $scope.categories = data;                        
        })
    }

    function create() {
    	category.index()
        .success( function(data){
            $scope.categories = data;
        } )
    }

    $scope.submit = function() {
        if(currentState == "main.categories-create") {
            category.store( $scope.categoryData )
            .then(function(data) {
                if (data.data.status == "success") {
                    $state.transitionTo('main.categories',{'message' :  data.data.message});
                    $scope.success_message = data.data.message;
                }
                else {
                    $scope.error_message = data.data.message;
                }
            },
            function(response) {
                $scope.alerts = { errors : response.data };
            }); 
        }
        else {
            category.update( data.data.id , { name: $scope.categoryData.name } )
            .then(function(data){
                if(data.data.status == "success") {
                    $state.transitionTo('main.categories',{'message' : data.data.message});
                    $scope.success_message = data.data.message;
                }
            });
        }	
    }

   function edit(id) {
    category.edit( id )
    .success(function() {
         $scope.categoryData.name = data.data.name; 
    })
   }
 
    $scope.deleteCategory = function(id){
        category.delete( id )
        .success(function(  ) {
            location.reload();
        })
    } 
}]);