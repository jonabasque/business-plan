<?php

namespace Asketic\BusinessPlan\EjercicioFiscal;

class EjercicioFiscal {

  private $period; //Mes de inicio
  //UN PLAN PUEDE TENER AÑOS CON DIFERENTE TIPO FISCAL ?? ESTA PROPIEDAD PODRIA IR EN EL BUSSINESS PLAN

  private $februaryDays = 28;
  private $meses = [enero => 31, febrero => $februayDays, marzo => 31, abril => 30,
                    mayo => 31, junio => 30, julio => 31, agosto => 31, septiembre => 30,
                    octubre => 31 , noviembre => 30, diciembre => 31 ];

  //Datos que recoge el Plan General Contable por día. (contabilidad)
  protected $compras = []; //guardará un objeto por dia empezando por el primero del inicio fiscal
  protected $ventas = []; //igual que gastos. Cada objeto tiene atributos: codigo, descripcion, fecha, concepto, importe, unidades.
  protected $RRHH   = [];
  protected $otros_gastos = [];
  protected $inversion = []; //incluye la financiación, y la inversion en inmovilizado. Se invertir en cualquier momento.

  public function __constructor($type, $period){

    $this->type = $type;
    $this->year = $year;

    if($this->isBisiesto()){

	     $this->februaryDays = 29;

    }

  }

  //Devolvemos true si es bisiesto
  private function isBisiesto(){

	   //return ((($year%4 == 0) && ($year%100)) || $year%400 == 0)? true: false;
	    return date('L', strtotime($date));
  }


}
