

var app = angular.module('app', []);

/* Config */
app.config([
  '$routeProvider', '$locationProvider',
  function($routeProvide, $locationProvider){
    $routeProvide
        .when('/',{
          templateUrl:'/angular/app/views/main/index.html',
          controller:'MainController',
        })
        .when('/post',{
          templateUrl:'views/post/index.html',
          controller:'PostsController'
        })
        .when('/category',{
          templateUrl:'views/category/index.html',
          controller:'CategoriesController'
        })
        .otherwise({
          redirectTo: '/'
        });
  }
]);

