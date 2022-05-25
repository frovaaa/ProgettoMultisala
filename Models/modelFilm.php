<?php

class Film {

  private $idFilm;
  private $titolo;
  private $trama;
  private $copertina;
  private $regista;
  private $durata;
  private $trailer;
  private $anno;

  public function getIdFilm() {
    return $this->idFilm;
  }

  public function setIdFilm($idFilm) {
    $this->idFilm = $idFilm;
  }

  public function getTitolo() {
    return $this->titolo;
  }

  public function setTitolo($titolo) {
    $this->titolo = $titolo;
  }

  public function getTrama() {
    return $this->trama;
  }

  public function setTrama($trama) {
    $this->trama = $trama;
  }

  public function getCopertina() {
    return $this->copertina;
  }

  public function setCopertina($copertina) {
    $this->copertina = $copertina;
  }

  public function getRegista() {
    return $this->regista;
  }

  public function setRegista($regista) {
    $this->regista = $regista;
  }

  public function getDurata() {
    return $this->durata;
  }

  public function setDurata($durata) {
    $this->durata = $durata;
  }

  public function getTrailer() {
    return $this->trailer;
  }

  public function setTrailer($trailer) {
    $this->trailer = $trailer;
  }

  public function getAnno() {
    return $this->anno;
  }

  public function setAnno($anno) {
    $this->anno = $anno;
  }

}
