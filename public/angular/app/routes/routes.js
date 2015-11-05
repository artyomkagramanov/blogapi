angular.module('app').config(['$routeProvider',
  function($routeProvider) {
    $routeProvider.
      when('/', {
        templateUrl: 'angular/app/views/index/main.html',
        controller: 'HomeController'
      }).

      when('/posts', {
        templateUrl: 'angular/app/views/posts/main.html',
        controller: 'PostsController'
      }).
      when('/posts/create', {
        templateUrl: 'angular/app/views/posts/form.html',
        controller: 'PostsController'
      }).
      when('/posts/:postId', {
        templateUrl: 'angular/app/views/posts/show.html',
        controller: 'PostsController'
      }).
      when('/posts/:postId/edit', {
        templateUrl: 'angular/app/views/posts/form.html',
        controller: 'PostsController'
      }).
    
      when('/categories', {
        templateUrl: 'angular/app/views/categories/main.html',
        controller: 'CategoriesController'
      }).
      when('/categories/create', {
        templateUrl: 'angular/app/views/categories/form.html',
        controller: 'CategoriesController'
      }).
      when('/categories/:categoryId', {
        templateUrl: 'angular/app/views/categories/show.html',
        controller: 'CategoriesController'
      }).
      when('/categories/:categoryId/edit', {
        templateUrl: 'angular/app/views/categories/form.html',
        controller: 'CategoriesController'
      }).



      otherwise({
        redirectTo: '/'
      });
  }]);