<?php

namespace asketic\business_plan;

class EjercicioFiscal {

  private $period; //Mes de inicio

  public $year;

  public $type = "anual";

  public $meses = ["enero" => 31, "febrero" => 28, "marzo" => 31, "abril" => 30,
                    "mayo" => 31, "junio" => 30, "julio" => 31, "agosto" => 31, "septiembre" => 30,
                    "octubre" => 31, "noviembre" => 30, "diciembre" => 31];

  //Datos que recoge el Plan General Contable por día. (contabilidad)
  protected $compras = []; //guardará un objeto por dia empezando por el primero del inicio fiscal
  protected $ventas = []; //igual que gastos. Cada objeto tiene atributos: codigo, descripcion, fecha, concepto, importe, unidades.
  protected $RRHH   = [];
  protected $otros_gastos = [];
  protected $inversion = []; //incluye la financiación, y la inversion en inmovilizado. Se invertir en cualquier momento.

  public function __construct($type, $year){

    $this->type = $type;
    $this->year = $year;

    if($this->isFebruaryDays($this->year)){

       $this->meses["febrero"] = 29;

    }

  }

  //Devolvemos true si es bisiesto
  private function isFebruaryDays($year){

  	return ((($year%4 == 0) && ($year%100)) || $year%400 == 0)? true: false;
  	//return date('L', strtotime($date));
  }


}
