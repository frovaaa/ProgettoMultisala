<?php

class Ruolo {

  private $idRuolo;
  private $nome;
  private $descrizione;

  public function getIdRuolo() {
    return $this->idRuolo;
  }

  public function setIdRuolo($idRuolo) {
    $this->idRuolo = $idRuolo;
  }

  public function getNome() {
    return $this->nome;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function getDescrizione() {
    return $this->descrizione;
  }

  public function setDescrizione($descrizione) {
    $this->descrizione = $descrizione;
  }

}
