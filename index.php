<?php

//Index
echo "Planes de negocio";

require_once("libs/business_plan/business_plan.php");
require_once("libs/business_plan/ejercicios_fiscales.php");

use asketic\business_plan\business_plan\User as User;
use asketic\business_plan\ejercicios_fiscales\EjercicioFiscal as EjercicioFiscal;
use asketic\business_plan\business_plan\BusinessPlan as BusinessPlan;

echo "<br \>ESTE ES EL INDICE DE LA APLICACION<br \>";

echo "<br \> ---Instancia de un usuario<br \>";

$user = new User("James");
echo $user->nombre;


echo "<br \><br \> ---Instancia de un ejercicio fiscal (2016)<br \>";

$ejercicio1 = new EjercicioFiscal("mensual","2016");

echo $ejercicio1->meses["febrero"].", ".$ejercicio1->type." ";

echo "<br \><br \> ---Instancia de un plan de negocio<br \>";

//idioma, ubicacion
$locale=["Inglés","EEUU"];

//instancia de un plan de negocio (usamos el alias)
$businessPlan = new BusinessPlan($user,"Alimentacion",$locale,"Ekodenda");

//agregamos un ejercicio fiscal
$businessPlan->setEjercicio($ejercicio1);

//var_dump($businessPlan);

//echo $businessPlan->user->nombre;
echo "<br />";
echo $businessPlan->getSector();
echo "<br />";
echo $businessPlan->getTitle();
echo "<br />";
//echo $businessPlan->getEjercicios();
