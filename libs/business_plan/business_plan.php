<?php

//require_once("ejercicios_fiscales.php");
use asketic\business_plan\business_plan\User as User;
use asketic\business_plan\ejercicios_fiscales\EjercicioFiscal as EjercicioFiscal;

namespace asketic\business_plan\business_plan;

class BusinessPlan {//extends EjercicioFiscal {

  private $user;
  private $title;
  private $sector;
  private $locale = [];

  private $legalEntity;

  private $inversion_inicial; //Incluimos dentro la financiación inicial

  private $ejercicios = [];

  public function __construct(User $user, $sector, $locale, $title){

    $this->user = $user;
    $this->title = $title;
    $this->sector = $sector;
    $this->locale = $locale;

  }

  public function setInversion(Inversion $inversion){

    $this->inversion = $inversion;

  }

  public function setEjercicio(EjercicioFiscal $ejercicio){

    $this->ejercicios[] = $ejercicio;

  }

  public function setRRHH( RRHH $RRHH){

    $this->RRHH = $RRHH;

  }

  public function getTitle(){

    return $this->title;

  }

  public function getSector(){

    return $this->sector;

  }

  public function getEjercicios(){

    return $this->ejercicios;

  }

}//fin clase BusinessPlan

//clase usuario
class User {

	public $nombre;

	public function __construct($nombre = "John Doe"){

		$this->nombre = $nombre;

	}

}//fin clase User
