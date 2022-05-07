<?php

class Genere {

  private $idFilmGenere;
  private $nome;
  private $descrizione;
  private $limitazioni;

  public function getIdFilmGenere() {
    return $this->idFilmGenere;
  }

  public function setIdFilmGenere($idFilmGenere) {
    $this->idFilmGenere = $idFilmGenere;
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

  public function getLimitazioni() {
    return $this->limitazioni;
  }

  public function setLimitazioni($limitazioni) {
    $this->limitazioni = $limitazioni;
  }

}
