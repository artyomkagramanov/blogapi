angular
	.module('app')
    .controller('TimerController', ['$scope','$timeout', function($scope,$timeout){
    	$scope.counter = 0;
    	$scope.timeout = $timeout;
    }])
    .directive('timer', timer); 

    function timer() {
    	var directive = {
    		link : link,
    		restrict : 'EA',
    		controller : 'TimerController'
    	};

    	return directive;

    	function link($scope) {
    		
    		$scope.counter = 0;
    		$scope.start = function(){
	    	    var mytimeout = $scope.timeout($scope.onTimeout,1000);
    		}
			$scope.onTimeout = function(){
    	        $scope.counter++;
    	        mytimeout = $scope.timeout($scope.onTimeout,1000);
    	    }
    	    
    	    $scope.stop = function(){
    	        $scope.timeout.cancel(mytimeout);
    	    }
    	}
    }
    TimerController.$inject = ['$scope'];

    function TimerController($scope) {
    	var vm = this;
    	vm.counter = {};
    }