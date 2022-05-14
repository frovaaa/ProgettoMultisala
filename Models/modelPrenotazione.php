<?php

class Prenotazione {

  private $idPrenotazione;
  private $idfUtente;
  private $idfPosto;
  private $idfProgrammazione;
  private $codice;

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

  public function getIdfProgrammazione() {
    return $this->idfProgrammazione;
  }

  public function setIdfProgrammazione($idfProgrammazione) {
    $this->idfProgrammazione = $idfProgrammazione;
  }

  public function getCodice() {
    return $this->codice;
  }

  public function setCodice($codice) {
    $this->codice = $codice;
  }

}
