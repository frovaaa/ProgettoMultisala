<?php

class Film {

  private $idFilm;
  private $titolo;
  private $trama;
  private $copertina;

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

}
