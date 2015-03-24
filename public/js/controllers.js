(function(){
    angular.module('bp.controllers', [])
        .controller('bpController', [ '$scope', '$routeParams',function($scope, $routeParams){
            $scope.bp = {
                titulo : "ASkeTIC Coop",
                ejercicios : ['2015','2016','2017'],
                operations : ['Gastos', 'Compras', 'Ventas', 'Inversiones', 'RRHH'],
                meses : ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre']
            };
        }]);
})();
