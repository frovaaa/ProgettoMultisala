<?php

class Utente {

  private $idUtente;
  private $idfRuolo;
  private $nome;
  private $cognome;
  private $username;
  private $password;
  private $email;
  private $cellulare;
  private $immagineProfilo;

  public function getIdUtente() {
    return $this->idUtente;
  }

  public function setIdUtente($idUtente) {
    $this->idUtente = $idUtente;
  }

  public function getIdfRuolo() {
    return $this->idfRuolo;
  }

  public function setIdfRuolo($idfRuolo) {
    $this->idfRuolo = $idfRuolo;
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

  public function getUsername() {
    return $this->username;
  }

  public function setUsername($username) {
    $this->username = $username;
  }

  public function getPassword() {
    return $this->password;
  }

  public function setPassword($password) {
    $this->password = $password;
  }

  public function getEmail() {
    return $this->email;
  }

  public function setEmail($email) {
    $this->email = $email;
  }

  public function getCellulare() {
    return $this->cellulare;
  }

  public function setCellulare($cellulare) {
    $this->cellulare = $cellulare;
  }

  public function getImmagineProfilo() {
    return $this->immagineProfilo;
  }

  public function setImmagineProfilo($immagineProfilo) {
    $this->immagineProfilo = $immagineProfilo;
  }

}
