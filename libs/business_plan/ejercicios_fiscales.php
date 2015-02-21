<?php

namespace asketic\business_plan\ejercicios_fiscales;

class EjercicioFiscal {

  public $year;
  //UN PLAN PUEDE TENER AÑOS CON DIFERENTE TIPO FISCAL ?? ESTA PROPIEDAD PODRIA IR EN EL BUSINESS PLAN
  public $type = "anual";
  public $februaryDays = 28;
  public $meses = ["enero" => 31, "febrero" => 28, "marzo" => 31, "abril" => 30,
                    "mayo" => 31, "junio" => 30, "julio" => 31, "agosto" => 31, "septiembre" => 30,
                    "octubre" => 31, "noviembre" => 30, "diciembre" => 31];

  public $gastos = [];
  public $ventas = [];

  public function __construct($type, $year){

    $this->type = $type;
    $this->year = $year;

    if($this->isFebruaryDays($this->year)){

	     $this->februaryDays = 29;
       $this->meses["febrero"] = $this->februaryDays;
	
    }

  }

  //Devolvemos true si es bisiesto
  private function isFebruaryDays($year){

	return ((($year%4 == 0) && ($year%100)) || $year%400 == 0)? true: false;
	//return date('L', strtotime($date));
  }


}

