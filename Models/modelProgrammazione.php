<?php

class Programmazione {

  private $idProgrammazione;
  private $idfEvento;
  private $idfFilm;
  private $data;

  public function getIdProgrammazione() {
    return $this->idProgrammazione;
  }

  public function setIdProgrammazione($idProgrammazione) {
    $this->idProgrammazione = $idProgrammazione;
  }

  public function getIdfEvento() {
    return $this->idfEvento;
  }

  public function setIdfEvento($idfEvento) {
    $this->idfEvento = $idfEvento;
  }

  public function getIdfFilm() {
    return $this->idfFilm;
  }

  public function setIdfFilm($idfFilm) {
    $this->idfFilm = $idfFilm;
  }

  public function getData() {
    return $this->data;
  }

  public function setData($data) {
    $this->data = $data;
  }

}
