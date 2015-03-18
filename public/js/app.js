(function(){
    var app = angular.module('BusinessPlans', []);

    app.controller('businessPlanController', function(){
        this.bp = {
            titulo : "ASkeTIC Coop",
            ejercicios : ['2015','2016','2017'],
            operations : ['Gastos', 'Compras', 'Ventas', 'Inversiones', 'RRHH'],
            meses : ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre']
        };
    });

    app.directive('bpNav', function(){
        return {
            //Hay varios tipos de directivas, está será de tipo elemento.
            restrict: 'E',
            templateUrl: 'partials/bp-nav.html'
        };
    });



    /*
    app.config(['$routeProvider', function($routeProvider){

        $routeProvider
            .when('/', {
                templateUrl: 'views/inicio.html',
                //ahora le inyectamos el contrlador, ahora estamos usando Ajax, vamos a ver después como evitarlo.
                controller: 'inicioCtrl'
            });
    }]);
    */



})();
