<?php

class Programmazione {

  private $idProgrammazione;
  private $idfEventi;
  private $idfFilm;

  public function getIdProgrammazione() {
    return $this->idProgrammazione;
  }

  public function setIdProgrammazione($idProgrammazione) {
    $this->idProgrammazione = $idProgrammazione;
  }

  public function getIdfEventi() {
    return $this->idfEventi;
  }

  public function setIdfEventi($idfEventi) {
    $this->idfEventi = $idfEventi;
  }

  public function getIdfFilm() {
    return $this->idfFilm;
  }

  public function setIdfFilm($idfFilm) {
    $this->idfFilm = $idfFilm;
  }

}