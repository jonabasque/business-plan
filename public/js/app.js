(function(){
    var app = angular.module('BusinessPlans', [
        'ngRoute',
        'bp.controllers',
        'bp.directives',
        'bp.filters',
        'bp.services'
    ]);


    app.config(['$routeProvider', function($routeProvider){

        $routeProvider
            .when('/', {
                templateUrl: 'views/bp.html',
                //ahora le inyectamos el contrlador, ahora estamos usando Ajax, vamos a ver después como evitarlo.
                controller: 'bpController'
            });
    }]);



})();
