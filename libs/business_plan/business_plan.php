<?php

//require_once("ejercicios_fiscales.php");

namespace asketic\business_plan\business_plan;

class BusinessPlan {//extends EjercicioFiscal {

  public $user;
  public $sector;
  public $locale = [];
  public $titulo;

  private $inversion;
  private $ejecicios = [];
  private $RRHH;

  public function __construct(User $user, $sector, $locale, $title){

    $this->user = $user;
    $this->title = $title;
    $this->sector = $sector;
    $this->locale = $locale;

  }

  public function setInversion(Inversion $inversion){

    $this->inversion = $inversion;

  }

  public function setEjercicio( $ejercicio){

    $this->ejercicios[] = $ejercicios;

  }

  public function setRRHH( RRHH $RRHH){

    $this->RRHH = $RRHH;

  }


}//fin clase BusinessPlan

//clase usuario
class User {

	public $nombre;

	public function __construct($nombre = "John Doe"){

		$this->nombre = $nombre;

	}

}//fin clase User




