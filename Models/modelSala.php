<?php

class Sala {

  private $idSala;
  private $idfCinema;
  private $numSala;
  private $postiMax;

  public function getIdSala() {
    return $this->idSala;
  }

  public function setIdSala($idSala) {
    $this->idSala = $idSala;
  }

  public function getIdfCinema() {
    return $this->idfCinema;
  }

  public function setIdfCinema($idfCinema) {
    $this->idfCinema = $idfCinema;
  }

  public function getNumSala() {
    return $this->numSala;
  }

  public function setNumSala($numSala) {
    $this->numSala = $numSala;
  }

  public function getPostiMax() {
    return $this->postiMax;
  }

  public function setPostiMax($postiMax) {
    $this->postiMax = $postiMax;
  }

}
