<?php

class Cinema {

  private $idCinema;
  private $nome;
  private $email;
  private $telefono;
  private $citta;
  private $provincia;
  private $via;
  private $cap;

  public function getIdCinema() {
    return $this->idCinema;
  }

  public function setIdCinema($idCinema) {
    $this->idCinema = $idCinema;
  }

  public function getNome() {
    return $this->nome;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getTelefono() {
    return $this->telefono;
  }

  public function setTelefono($telefono) {
    $this->telefono = $telefono;
  }

  public function getCitta() {
    return $this->citta;
  }

  public function setCitta($citta) {
    $this->citta = $citta;
  }

  public function getProvincia() {
    return $this->provincia;
  }

  public function setProvincia($provincia) {
    $this->provincia = $provincia;
  }

  public function getVia() {
    return $this->via;
  }

  public function setVia($via) {
    $this->via = $via;
  }

  public function getCap() {
    return $this->cap;
  }

  public function setCap($cap) {
    $this->cap = $cap;
  }

}
