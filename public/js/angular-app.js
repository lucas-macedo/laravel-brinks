var app = angular.module('myApp', [], function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
});

app.controller('testeController', function ($scope) {
	$scope.user = {name: 'Lucas'}
});

app.controller('countController', function ($scope) {
	$scope.counter = 0;
	$scope.addOne = function(){
			$scope.counter++;
	}
});

app.controller('loopController', function ($scope) {
	$scope.fruits = ['banana','maça','ameixa'];
});

