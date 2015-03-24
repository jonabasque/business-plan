<?php

namespace asketic\business_plan;

class Registro{

  private $id;
  public $date;
  private $concept;
  private $imp;
  private $units;

  public function __construct($concept, $imp, $units){

    $this->date = getdate();
    $this->concept = $concept;
    $this->imp = $imp;
    $this->units = $units;

  }

  //Actualizar la fecha del movimiento
  public function updateDate($date){

    /*$day =(int) substr($date,0,2);
    echo $day;
    $month =(int) substr($date,4,2);
    echo $month;
    $year =(int) substr($date,6,4);
    echo $year;*/

    $timestamp = mktime(0,0,0,$month,$day,$year);

    return $date = getdate($timestamp);
  }

}
