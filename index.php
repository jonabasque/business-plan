<?php

//Index
echo "Planes de negocio";

require_once("libs/business_plan/business_plan.php");
require_once("libs/business_plan/ejercicios_fiscales.php");
require_once("libs/dojo-calculadora/class/calculadora.php");

use asketic\business_plan\User as User;
use asketic\business_plan\EjercicioFiscal as EjercicioFiscal;
use asketic\business_plan\BusinessPlan as BusinessPlan;
use asketic\business_plan\Compras as Compras;

echo "<br \>ESTE ES EL INDICE DE LA APLICACION<br \>";

echo "<br \> ---Instancia de un usuario<br \>";

$user = new User("James");
echo $user->nombre;


echo "<br \><br \> ---Instancia de un ejercicio fiscal (2016)<br \>";

$ejercicio1 = new EjercicioFiscal("mensual","2016");

echo $ejercicio1->meses["February"].", ".$ejercicio1->type." ";
echo "<br />";

$code = "C01";
$concept = "Compra de licencia de Windows";
$importe = 100;
$units = 5;
$ejercicio1->setCompra($code, $concept, $importe, $units);
var_dump($ejercicio1->compras);

$compra = $ejercicio1->getCompra("C01");
$compra->date = $compra->updateDate("12/07/2030");
var_dump($ejercicio1->compras);

echo "<br \><br \> ---Instancia de un plan de negocio<br \>";

//idioma, ubicacion
$locale=["Inglés","EEUU"];

//instancia de un plan de negocio (usamos el alias)
$businessPlan = new BusinessPlan($user,"Alimentacion",$locale,"Ekodenda");

var_dump($ejercicio1);

//agregamos un ejercicio fiscal
$businessPlan->setEjercicio($ejercicio1);

//var_dump($businessPlan);

//echo $businessPlan->user->nombre;
echo "<br />";
echo $businessPlan->getSector();
echo "<br />";
echo $businessPlan->getTitle();
echo "<br />";
echo $businessPlan->getEjercicios(0);
echo "<br />";

echo "<br /><br />";

$calculadora = new Calculadora();

$numeros=[1,5,2,8,6];

//calculo y formateo del resultado de la division
echo "<br>division: ".number_format($calculadora->division(8,3),2);
echo "<br>producto: ".number_format($calculadora->producto($numeros),2);
echo "<br>suma: ".$calculadora->suma($numeros);
echo "<br>resta: ".number_format($calculadora->resta(8,3.5),2);
echo "<br>porcentaje: ".number_format($calculadora->porcentaje(10,20),2);
