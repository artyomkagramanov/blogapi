'use strict';

/* Services */

var phonecatServices = angular.module('phonecatServices', ['ngResource']);

phonecatServices.factory('Post', ['$resource',
  function($resource){
    return $resource('post/:postId', {}, {
      query: {method:'GET', params:{phoneId:'posts'}, isArray:true}
    });
  }]);
