<?php

//Index
echo "Planes de negocio<br \>";

//llamamos a business_plan y ejercicios_fiscales, y aparte a calculadora, para algunas operaciones
require_once("libs/business_plan/registro.php");
require_once("libs/business_plan/inversion.php");
require_once("libs/business_plan/recurso_humano.php");
require_once("libs/business_plan/business_plan.php");
require_once("libs/business_plan/ejercicios_fiscales.php");
require_once("libs/dojo-calculadora/class/calculadora.php");

//Utilizamos alias para cada clase
use asketic\business_plan\User as User;
use asketic\business_plan\Inversion as Inversion;
use asketic\business_plan\RecursoHumano as RecursoHumano;
use asketic\business_plan\EjercicioFiscal as EjercicioFiscal;
use asketic\business_plan\BusinessPlan as BusinessPlan;
use asketic\business_plan\Compras as Compras;

echo "<b>ESTE ES EL INDICE DE LA APLICACION</b><br \>";

//CREAMOS UN OBJETO DE TIPO USER
echo "<br \><u> Instancia de un USUARIO</u><br \>";

$user = new User("James");
echo $user->nombre;

//CREAMOS UN OBJETO DE TIPO EJERCICIOFISCAL
echo "<br \><br \><u> Instancia de un EJERCICIO FISCAL (2016)</u><br \><br \>";

$ejercicio1 = new EjercicioFiscal("mensual","2016");
$ejercicio2 = new EjercicioFiscal("mensual","2017");

//Mostramos los d´ias de un mes al azar y el tipo, que puede ser mensual o anual
echo $ejercicio1->meses["February"].", ".$ejercicio1->type."<br /><br />";

//Ejemplo de definición de una COMPRA //////////////////////////////////
//Datos de la COMPRA
$code = "C0005";
$concept = "Compra de licencia de Windows";
$importe = 100;
$units = 5;
$ejercicio1->setMovimiento($code, $concept, $importe, $units);


//MAS MOVIMIENTOS, QUE DEMUESTRAN QUE SE PUEDE INCLUIR CUALQUIER MOVIMIENTO
$code = "V0005";
$concept = "Venta placa arduino";
$importe = 150;
$units = 3;
$ejercicio1->setMovimiento($code, $concept, $importe, $units);


$code = "G0005";
$concept = "Alquiler local";
$importe = 400;
$units = 1;
$ejercicio1->setMovimiento($code, $concept, $importe, $units);

$code = "I0005";
$concept = "Inversion en proveedores largo plazo";
$importe = 600;
$units = 2;
$ejercicio1->setMovimiento($code, $concept, $importe, $units);

$code = "R0005";
$concept = "Contratacion ingeniero tecnico";
$importe = 800;
$units = 1;
$ejercicio1->setMovimiento($code, $concept, $importe, $units);

//Aparecerán todos los anteriores movimientos dentro del día de hoy
//var_dump($ejercicio1->movimientos);

//En las siguientes líneas se cambia la fecha de uno de los movimientos
if($ejercicio1->getMovimiento("C0005")!=false){
	$movimiento = $ejercicio1->getMovimiento("C0005");
	$movimiento->date = $movimiento->updateDate("12/07/2030");
}else{
	echo "No se ha encontrado el movimiento solicitado.";
}


echo "<strong>";
var_dump($ejercicio1->movimientos);
echo "</strong>";

////////////////////////////////////////////////////////////////////////

echo "<br \><br \><u> Instancia de un plan de NEGOCIO</u><br \><br \>";

//idioma, ubicacion
$locale=["Inglés","EEUU"];

//instancia de un plan de negocio (usamos el alias)
$businessPlan = new BusinessPlan($user,"Alimentacion",$locale,"Ekodenda");

//agregamos varios ejercicios fiscales al plan de negocio
$businessPlan->setEjercicio($ejercicio1);
$businessPlan->setEjercicio($ejercicio2);


//Inversion de prueba para meter desde la clase businessPlan
$code = "I0010";
$concept = "Inversion en proveedores corto y medio plazo";
$importe = 1000;
$units = 3;

$inversion1 = new Inversion($code, $concept, $importe, $units);
$businessPlan->setInversion($inversion1);

//Recurso humano de prueba para meter desde la clase businessPlan

$code = "R0010";
$concept = "Renovacion tecnico informatico";
$importe = 800;
$units = 1;

$recurso_humano1 = new RecursoHumano($code, $concept, $importe, $units);
$businessPlan->setRRHH($recurso_humano1);

//echo $businessPlan->user->nombre;
echo "<br /><br />";
echo $businessPlan->getSector();
echo "<br />";
echo $businessPlan->getTitle();
echo "<br />";
echo "<strong>";
var_dump($businessPlan->getEjercicios(2016)); //muestra todo el contenido del ejercicio fiscal buscado
echo "</strong>";
echo "<br />";

echo "<br /><br /><u> Calculadora </u><br />";
$calculadora = new Calculadora();

$numeros=[1,5,2,8,6];

//calculo y formateo del resultado de la division
echo "<br>division: ".number_format($calculadora->division(8,3),2);
echo "<br>producto: ".number_format($calculadora->producto($numeros),2);
echo "<br>suma: ".$calculadora->suma($numeros);
echo "<br>resta: ".number_format($calculadora->resta(8,3.5),2);
echo "<br>porcentaje: ".number_format($calculadora->porcentaje(10,20),2);
