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

$ejercicioFiscal = new EjercicioFiscal("mensual","2016");

echo $ejercicioFiscal->meses["febrero"].", ".$ejercicioFiscal->type." ";

echo "<br \><br \> ---Instancia de un plan de negocio<br \>";

//idioma, ubicacion
$locale=["Inglés","EEUU"];

//instancia de un plan de negocio (usamos el alias)
$planDeNegocio = new BusinessPlan($user,"profesional",$locale,"titulo");

//var_dump($businessPlan);

echo $planDeNegocio->user->nombre;
echo "<br \>".$planDeNegocio->sector;
echo "<br \>".$planDeNegocio->title;
echo "<br \>[".$planDeNegocio->locale[0].", ".$planDeNegocio->locale[1]."]";

/*use BusinessPlan;

echo "Business Plans";

$bp = new BusinessPlan();

echo "Objeto";

echo $bp->type;*/
