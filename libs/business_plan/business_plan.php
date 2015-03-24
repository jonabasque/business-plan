<?php

//require_once("ejercicios_fiscales.php");
use asketic\business_plan\User as User;
use asketic\business_plan\EjercicioFiscal as EjercicioFiscal;

namespace asketic\business_plan;

class BusinessPlan {//extends EjercicioFiscal {

  private $user;
  private $title;
  private $sector;
  private $locale = [];

  private $legalEntity;

  private $inversion_inicial; //Incluimos dentro la financiación inicial

  private $inversiones = [];

  private $RRHH = [];

  private $ejercicios = [];

  public function __construct(User $user, $sector, $locale, $title){

    $this->user = $user;
    $this->title = $title;
    $this->sector = $sector;
    $this->locale = $locale;
  }

  //No me convence
  public function setInversion(Inversion $inversion){

    $this->inversiones[] = $inversion;

  }

  //No me convence
  public function setRRHH(RecursoHumano $RRHH){

    $this->RRHH[] = $RRHH;

  }

  public function setEjercicio(EjercicioFiscal $ejercicio){

    $this->ejercicios[] = $ejercicio;

  }

  public function getTitle(){

    return $this->title;

  }

  public function getSector(){

    return $this->sector;

  }

  public function getEjercicios($year){

      //return $this->ejercicios;

    foreach($this->ejercicios as $ejercicio){
      			if ($ejercicio->year == $year) return $ejercicio;
			}
	return "No se ha encontrado el ejercicio fiscal solicitado.";

  }

  public function getInversion($code){

    foreach($this->inversiones as $inversion){
      			if ($inversion->code == $yecode) return $inversion;
			}
	return "No se ha encontrado la inversion solicitada.";

  }

  //No me convence
  public function getRRHH($code){

    foreach($this->inversiones as $inversion){
      			if ($inversion->code == $code) return $inversion;
			}
	return "No se ha encontrado el recurso humano solicitado.";

  }

}//fin clase BusinessPlan


//clase usuario
class User {

	public $nombre;

	public function __construct($nombre = "John Doe"){

		$this->nombre = $nombre;

	}

}//fin clase User
