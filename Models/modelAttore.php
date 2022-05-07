<?php

class Attore {

  private $idAttore;
  private $nome;
  private $cognome;
  private $dataDiNAscita;

  public function getIdAttore() {
    return $this->idAttore;
  }

  public function setIdAttore($idAttore) {
    $this->idAttore = $idAttore;
  }

  public function getNome() {
    return $this->nome;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function getCognome() {
    return $this->cognome;
  }

  public function setCognome($cognome) {
    $this->cognome = $cognome;
  }

  public function getDataDiNAscita() {
    return $this->dataDiNAscita;
  }

  public function setDataDiNAscita($dataDiNAscita) {
    $this->dataDiNAscita = $dataDiNAscita;
  }

}
