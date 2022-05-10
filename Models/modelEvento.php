<?php

class Evento {

  private $idEvento;
  private $descrizione;

  public function getIdEvento() {
    return $this->idEvento;
  }

  public function setIdEvento($idEvento) {
    $this->idEvento = $idEvento;
  }

  public function getDescrizione() {
    return $this->descrizione;
  }

  public function setDescrizione($descrizione) {
    $this->descrizione = $descrizione;
  }

}
