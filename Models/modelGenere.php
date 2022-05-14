<?php

class Genere {

  private $idGenere;
  private $nome;
  private $limitazioni;

  public function getIdGenere() {
    return $this->idGenere;
  }

  public function setIdGenere($idGenere) {
    $this->idGenere = $idGenere;
  }

  public function getNome() {
    return $this->nome;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function getLimitazioni() {
    return $this->limitazioni;
  }

  public function setLimitazioni($limitazioni) {
    $this->limitazioni = $limitazioni;
  }

}
