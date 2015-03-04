<?php
namespace asketic\business_plan;

abstract class Registro{

  private $id;
  public $date;
  private $concept;
  private $imp;
  private $units;

  public function __construct($concept, $imp, $units ){

    $this->date = getdate();
    $this->concept = $concept;
    $this->imp = $imp;
    $this->units = $units;

  }

}
