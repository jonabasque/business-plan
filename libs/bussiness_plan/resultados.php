<?php

namespace Asketic\BusinessPlan\Resultados;

use Mathclass;

class Resultados extends MathCalc {

  private $bussinessPlan;

  public function __construct(BussinessPlan $plan){

    $this->bussinessPlan = $plan;

  }

  //Resultado importare
  public function perdidasGanancias(){


  }

  //Resultado importante y recoge el resultado de perdidas y ganacias
  public function balanceDeSituacion(){

  }

  //Recoge todos los 
  public function otrosGastosDeExplotacion(){

  }

  //Lo recoge perdidas y ganancias.
  public function ventas(){

  }

  //Lo recoge perdidas y ganancias.
  public function compras(){

  }

  //Lo recoge el balance de situación
  public function inversionesEnInmovilizado(){

  }

  //Lo recoge el balance de situación
  public function determinadasInversiones(){

  }

  //Lo recoge perdidas y ganacias
  public function RRHH(){

  }

  //Lo recoge balance de situación
  public function liquidacionImpSociedades(){

  }

  //Lo recoge balance de situación
  public function liquidacionIVA(){

  }

  //Analisis al margen, retorno de la inversión.
  public function TIR(){

  }

  //Analisis al margen, de varios datos
  public function margenesRatios(){

  }

  //Sale de los movimientos de cuentas.
  public function tesoreria(){

  }

}
