<?php

class PrenotazionePosto {

  private $idPrenotazionePosto;
  private $idfPrenotazione;
  private $idfPosto;

  public function getIdPrenotazionePosto() {
    return $this->idPrenotazionePosto;
  }

  public function setIdPrenotazionePosto($idPrenotazionePosto) {
    $this->idPrenotazionePosto = $idPrenotazionePosto;
  }

  public function getIdfPrenotazione() {
    return $this->idfPrenotazione;
  }

  public function setIdfPrenotazione($idfPrenotazione) {
    $this->idfPrenotazione = $idfPrenotazione;
  }

  public function getIdfPosto() {
    return $this->idfPosto;
  }

  public function setIdfPosto($idfPosto) {
    $this->idfPosto = $idfPosto;
  }

}
