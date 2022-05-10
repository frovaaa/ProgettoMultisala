<?php

class Attore {

  private $idAttore;
  private $nome;
  private $cognome;
  private $dataDiNascita;

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

  public function getDataDiNascita() {
    return $this->dataDiNascita;
  }

  public function setDataDiNascita($dataDiNascita) {
    $this->dataDiNascita = $dataDiNascita;
  }

}
