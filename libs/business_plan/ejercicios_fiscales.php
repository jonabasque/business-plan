<?php

namespace asketic\business_plan;

class EjercicioFiscal {

  private $period; //Mes de inicio. O PUEDE EMPEZAR CUALQUIER DIA DEL MES?

  public $year;

  public $type = "anual";

  public $meses = ["enero" => 31, "febrero" => 28, "marzo" => 31, "abril" => 30,
                    "mayo" => 31, "junio" => 30, "julio" => 31, "agosto" => 31, "septiembre" => 30,
                    "octubre" => 31, "noviembre" => 30, "diciembre" => 31];

  //Datos que recoge el Plan General Contable por día. (contabilidad)
  public $compras = []; //guardará un objeto por dia empezando por el primero del inicio fiscal
  protected $ventas = []; //igual que gastos. Cada objeto tiene atributos: codigo, descripcion, fecha, concepto, importe, unidades.
  protected $RRHH   = [];
  protected $gastos = [];
  protected $inversion = []; //incluye la financiación, y la inversion en inmovilizado. Se invertir en cualquier momento.

  public function __construct($type, $year, $period = "agosto"){

    $this->type = $type;
    $this->year = $year;
    $this->period = $period;

    if($this->isFebruaryDays($this->year)){

       $this->meses["febrero"] = 29;

    }

    $this->prepareArrays();

  }

  private function prepareArrays(){

    //crear los indices de los arrays compras y ventas con el array meses,
    //para saber los dias de febrero y a futuro días festivos, etc...
    $count = 0;
    $init = null;
    foreach($this->meses as $key => $value){

      //necesito que empiece cuando sea igual al periodo y continue hasta el final.
      if($key == $this->period){
        $this->compras[$key] = [];
        $this->ventas[$key] = [];
        $this->RRHH[$key] = [];
        $this->gastos[$key] = [];// se le podría decir que sea de 31 posiciones?
        $init = $count;
      }elseif($init != null){
        $this->compras[$key] = [];
        $this->ventas[$key] = [];
        $this->RRHH[$key] = [];
        $this->gastos[$key] = [];
      }
      $count++;
    }

    foreach($this->meses as $key => $value){
      if($key != $init){
        $this->compras[$key] = [];
        $this->ventas[$key] = [];
        $this->RRHH[$key] = [];
        $this->gastos[$key] = [];
      }
    }
  }


  public function setCompras(ComprasDay $comprasDay){


    $this->compras[$comprasDay->mes][] = $comprasDay;

  }


  //Devolvemos true si es bisiesto
  private function isFebruaryDays($year){

  	return ((($year%4 == 0) && ($year%100)) || $year%400 == 0)? true: false;
  	//return date('L', strtotime($date));
  }


}
