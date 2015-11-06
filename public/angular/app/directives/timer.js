angular.module('app')
    .directive('dirTimer', function() {        
        return {
        	restrict: 'E',
        	scope:{
        		hello:"@",
        		start:"@",
        		update:"@",
        		timer:'@'

        	},
            controller: ['$scope','$interval', function ($scope,$interval) {
            	$scope.time = 0;
            	$scope.timer = null;

            	$scope.start = function(){
            		if(!$scope.timer){
            			
            			flag = true;
            			$scope.timer = $interval($scope.update,1000);
            		}	
            	}
            	$scope.update = function(){
            		$scope.time += 1;
            	}
            	$scope.stop  = function(){
            		if($scope.timer){
            			$interval.cancel($scope.timer);
            			$scope.timer = null;
            		}	
            	}
            	$scope.reset  = function(){
            		if($scope.timer){
            			$interval.cancel($scope.timer);
            			$scope.timer = null;
            			$scope.time = 0;
            		}
            		else{
            			$scope.time = 0;
            		}	
            	}

            }],
            template:"<input ng-model='time'></br> <input type='button' ng-click='start()' value='Start'> <input type='button' ng-click='stop()' value='Stop'> <input type='button' ng-click='reset()' value='Reset'>"

        }
    });