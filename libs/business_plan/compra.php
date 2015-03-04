<?php

namespace asketic\business_plan;

class Compra{

  private $id;
  private $code;
  public $date;
  private $concept;
  private $imp;
  private $units;

  public function __construct($code, $concept, $imp, $units ){

    $this->code = $code;
    $this->date = getdate();
    $this->concept = $concept;
    $this->imp = $imp;
    $this->units = $units;

  }

}
