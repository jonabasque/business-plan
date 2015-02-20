<?php

namespace Asketic\BusinessPlan\EjercicioFiscal;

class EjercicioFiscal {

  private $year;
  //UN PLAN PUEDE TENER AÑOS CON DIFERENTE TIPO FISCAL ?? ESTA PROPIEDAD PODRIA IR EN EL BUSSINESS PLAN
  private $type = "anual";
  private $februaryDays = 28;
  private $meses = [enero => 31, febrero => $februayDays, marzo => 31, abril => 30,
                    mayo => 31, junio => 30, julio => 31, agosto => 31, septiembre => 30,
                    octubre => 31 , noviembre => 30, diciembre => 31 ];

  protected $gastos = [];
  protected $ventas = [];

  public function __constructor($type, $year){

    $this->type = $type;
    $this->year = $year;

    if($this->setFebruaryDays()){

	$this->februaryDays = 29;
	
    };

  }

  //Devolvemos true si es bisiesto
  private function isFebruaryDays($now = timestamp()){

	//return ((($year%4 == 0) && ($year%100)) || $year%400 == 0)? true: false;
	return date('L', strtotime($date));
  }


}
