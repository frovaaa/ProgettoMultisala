<?php

class TipoPosto {

  private $idTipoPosto;
  private $nome;

  public function getIdTipoPosto() {
    return $this->idTipoPosto;
  }

  public function setIdTipoPosto($idTipoPosto) {
    $this->idTipoPosto = $idTipoPosto;
  }

  public function getNome() {
    return $this->nome;
  }

  public function setNome($nome) {
    $this->nome = $nome;
  }

}
