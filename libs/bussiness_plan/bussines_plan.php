<?php

namespace Asketic\BusinessPlan\BusinesPlan ;

use EjercicioFiscal;


class BusinessPlan extends EjercicioFiscal {

  private $user;
  private $sector;
  private $locale = [];
  private $titulo;

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


}
