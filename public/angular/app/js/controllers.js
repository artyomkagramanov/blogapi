'use strict';

/* Controllers */

var phonecatControllers = angular.module('phonecatControllers', []);

phonecatControllers.controller('PhoneListCtrl', ['$scope', 'Phone','Post',
  function($scope, Phone) {
    $scope.phones = Phone.query();
    $scope.orderProp = 'age';
  }]);

phonecatControllers.controller('HomeController', ['$scope', '$http', function($scope,$http){ }]);

phonecatControllers.controller('PostsController', ['$scope', '$http','$location', function($scope,$http,$location){ 
/*   console.log($location.url());
   console.log($location.path());
   console.log($location.search());
   console.log($location.hash());*/
   $http.get("/post").success(function(data){
            $scope.posts = data;                        
        })
}]);

phonecatControllers.controller('CategoriesController', ['$scope', '$http', function($scope,$http){ 

   $http.get("/category").success(function(data){
            $scope.categories = data;                        
        })
}]);

phonecatControllers.controller('PostDetailController', ['$scope', '$routeParams', 'Post',
  function($scope, $routeParams, Post) {
    $scope.post = Post.get({postId: $routeParams.postId}, function(post) {
      
    });


  }]);
