'use strict';

/* App Module */

var blogApp = angular.module('app', [
  'ngRoute',
  'phonecatAnimations',

  'phonecatControllers',
  'phonecatFilters',
  'phonecatServices'
]);

blogApp.config(['$routeProvider',
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
      when('/categories', {
        templateUrl: 'angular/app/views/categories/main.html',
        controller: 'CategoriesController'
      }).
      when('/posts/:postId', {
        templateUrl: 'angular/app/views/posts/show.html',
        controller: 'PostDetailController'
      }).

      otherwise({
        redirectTo: '/'
      });
  }]);
