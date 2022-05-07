<?php

class Posto {

  private $idPosto;
  private $idfTipoPosto;
  private $idfSala;
  private $riga;
  private $colonna;

  public function getIdPosto() {
    return $this->idPosto;
  }

  public function setIdPosto($idPosto) {
    $this->idPosto = $idPosto;
  }

  public function getIdfTipoPosto() {
    return $this->idfTipoPosto;
  }

  public function setIdfTipoPosto($idfTipoPosto) {
    $this->idfTipoPosto = $idfTipoPosto;
  }

  public function getIdfSala() {
    return $this->idfSala;
  }

  public function setIdfSala($idfSala) {
    $this->idfSala = $idfSala;
  }

  public function getRiga() {
    return $this->riga;
  }

  public function setRiga($riga) {
    $this->riga = $riga;
  }

  public function getColonna() {
    return $this->colonna;
  }

  public function setColonna($colonna) {
    $this->colonna = $colonna;
  }

}
