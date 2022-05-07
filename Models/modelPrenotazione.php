<?php

class Prenotazione {

  private $idPrenotazione;
  private $idfUtente;
  private $idfPosto;

  public function getIdPrenotazione() {
    return $this->idPrenotazione;
  }

  public function setIdPrenotazione($idPrenotazione) {
    $this->idPrenotazione = $idPrenotazione;
  }

  public function getIdfUtente() {
    return $this->idfUtente;
  }

  public function setIdfUtente($idfUtente) {
    $this->idfUtente = $idfUtente;
  }

  public function getIdfPosto() {
    return $this->idfPosto;
  }

  public function setIdfPosto($idfPosto) {
    $this->idfPosto = $idfPosto;
  }

}
