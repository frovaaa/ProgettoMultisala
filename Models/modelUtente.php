<?php

class Utente
{
    private $nome;
    private $cognome;
    private $username;
    private $email;
    private $cellulare;

    public function Utente($IDUtente)
    {
        $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

        $query = "SELECT * FROM Utente WHERE IDUtente=" . $IDUtente;
        $data = $connection->query($query);
        $data = $data->fetch_assoc();

        $this->nome = $data['Nome'];
        $this->cognome = $data['Cognome'];
        $this->username = $data['Username'];
        $this->email = $data['Email'];
        $this->cellulare = $data['Cellulare'];
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getCognome()
    {
        return $this->cognome;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getCellulare()
    {
        return $this->cellulare;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function setCognome($cognome)
    {
        $this->cognome = $cognome;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setCellulare($cellulare)
    {
        $this->cellulare = $cellulare;
    }
}