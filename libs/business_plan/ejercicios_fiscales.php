<?php
namespace asketic\business_plan;

require_once("compra.php");
require_once("venta.php");

use asketic\business_plan\Compra as Compra;
use asketic\business_plan\Venta as Venta;

class EjercicioFiscal {

  private $started; //Mes de inicio. O PUEDE EMPEZAR CUALQUIER DIA DEL MES?

  public $year;

  public $type = "anual";

  public $meses = ["January" => 31, "February" => 28, "March" => 31, "April" => 30,
                    "May" => 31, "June" => 30, "July" => 31, "August" => 31, "September" => 30,
                    "October" => 31, "November" => 30, "December" => 31];

  //Datos que recoge el Plan General Contable por día. (contabilidad)
  //guardará un objeto por dia ¿¿O POR TRANSACCION MEJOR?? empezando por el primero del inicio fiscal
  //Cada objeto tiene atributos: codigo, descripcion, fecha, concepto, importe, unidades.
  public $compras = [];
  protected $ventas = [];
  protected $RRHH   = [];
  protected $gastos = [];
  protected $inversion = []; //incluye la financiación, y la inversion en inmovilizado. Se invertir en cualquier momento.

  public function __construct($type, $year, $started = "August"){

    $this->type = $type;
    $this->year = $year;
    $this->started = $started;

    if($this->isFebruaryDays($this->year)){

       $this->meses["February"] = 29;

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
      if($key == $this->started){
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


    foreach($this->meses as $mes => $days){

      for($i = 1; $i <= $days; $i++){
        $this->compras[$mes][$i] = [];
        $this->ventas[$mes][$i] = [];
        $this->gastos[$mes][$i] = [];
        $this->RRHH[$mes][$i] = [];

      }

    }

  }


  //Guarda cada compra en el array del día
  public function setCompra($code, $concept, $importe, $units){

    $compra = new Compra($code, $concept, $importe, $units);
    //comprobar día para insertar en el día que sea.
    $mes = $compra->date['month'];
    $day = $compra->date['mday'];
    $this->compras[$mes][$day][] = $compra;

  }

  public function getCompra($code){

    foreach($this->compras as $month => $mes){
      foreach($mes as $day => $dia){
        foreach($dia as $registro ){
          if($code == $registro->code){
            return $registro;
          }
        }
      }
    }

  }


  //Devolvemos true si es bisiesto
  private function isFebruaryDays($year){

  	return ((($year%4 == 0) && ($year%100)) || $year%400 == 0)? true: false;
  	//return date('L', strtotime($date));
  }


}
