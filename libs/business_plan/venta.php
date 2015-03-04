<?php

namespace asketic\business_plan;

require_once("registro.php");

class Venta extends Registro{

  public function __construct($code, $concept, $imp, $units ){

    parent::__construct($code, $concept, $imp, $units );

    $this->code = $code;
    $this->date = getdate();
    $this->concept = $concept;
    $this->imp = $imp;
    $this->units = $units;

  }

}
