<?php
require_once "Models/modelUtente.php";
require_once "Models/modelCinema.php";
require_once "Models/modelAttore.php";

#region FUNZIONI UTENTE
function getUtenteById($IDUtente): Utente
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Utente WHERE IDUtente=" . $IDUtente;
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $utente = new Utente();

    $utente->setIdfRuolo($data['IDFRuolo']);
    $utente->setNome($data['Nome']);
    $utente->setCognome($data['Cognome']);
    $utente->setUsername($data['Username']);
    $utente->setPassword($data['Username']);
    $utente->setEmail($data['Email']);
    $utente->setCellulare($data['Cellulare']);

    return $utente;
}

function insertUtente(Utente $utente): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Utente (IDFRuolo, Nome, Cognome, Username, Password, Email, Cellulare)
    VALUES (" . $utente->getIdfRuolo() . ", '" . $utente->getNome() . "', '" . $utente->getCognome() . "', '" . $utente->getUsername() . "', '" . $utente->getPassword() . "', '" . $utente->getEmail() . "', '" . $utente->getCellulare() . "');";

    return $connection->query($query);
}

function editUtente($idUtente, $newUtente): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Utente 
    SET IDFRuolo=" . $newUtente->getIdfRuolo() . ", Nome=" . $newUtente->getNome() . ", Cognome=" . $newUtente->getCognome() . ", Username=" . $newUtente->getUsername() . ", Password=" . $newUtente->getPassword() . ", Email=" . $newUtente->getEmail() . ", Cellulare=" . $newUtente->getCellulare() . "
    WHERE IDUtente=$idUtente;";

    return $connection->query($query);
}

#endregion

#region FUNZIONI ATTORE
function getAttoreById($IDAttore): Attore
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Attore WHERE IDAttore=" . $IDAttore;
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $attore = new Attore();

    $attore->setIdAttore($data['IDAttore']);
    $attore->setNome($data['Nome']);
    $attore->setCognome($data['Cognome']);
    $attore->setDataDiNAscita($data['DataDiNascita']);

    return $attore;
}

function insertAttore(Attore $attore): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Attore (Nome, Cognome, DataDiNAscita)
    VALUES ('" . $attore->getNome() . "', '" . $attore->getCognome() . "', '" . $attore->getDataDiNAscita() . "');";

    return $connection->query($query);
}

function editAttore($idAttore, $newAttore): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Attore 
    SET Nome=" . $newAttore->getNome() . ", Cognome=" . $newAttore->getCognome() . ", DataDiNascita=" . $newAttore->getDataDiNascita() .
        " WHERE IDAttore=$idAttore;";

    return $connection->query($query);
}

#endregion

#region FUNZIONI CINEMA
function getCinemaById($IDCinema): Cinema
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");

    $query = "SELECT * FROM Cinema WHERE IDCinema=" . $IDCinema;
    $data = $connection->query($query);
    $data = $data->fetch_assoc();

    $cinema = new Cinema();

    $cinema->setNome($data['Nome']);
    $cinema->setEmail($data['Email']);
    $cinema->setTelefono($data['Telefono']);
    $cinema->setCitta($data['Citta']);
    $cinema->setProvincia($data['Provincia']);
    $cinema->setVia($data['Via']);
    $cinema->setCap($data['CAP']);

    return $cinema;
}

function insertCinema(Cinema $cinema): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "INSERT INTO Cinema (Nome, Email, Telefono, Citta, Provincia, Via, CAP)
    VALUES (" . $cinema->getNome() . ", '" . $cinema->getEmail() . "', '" . $cinema->getTelefono() . "', '" . $cinema->getCitta() . "', '" . $cinema->getProvincia() . "', '" . $cinema->getVia() . "', ." . $cinema->getCap() . ");";

    return $connection->query($query);
}

function editCinema($idCinema, $newCinema): bool
{
    $connection = new mysqli("localhost", "Frova", "Frova", "multisala_frova_pocaterra_sannazzaro");
    $query = "UPDATE Cinema 
    SET Nome=" . $newCinema->getNome() . ", Email=" . $newCinema->getEmail() . ", Telefono=" . $newCinema->getTelefono() . ", Citta=" . $newCinema->getCitta() . ", Provincia=" . $newCinema->getProvincia() . ", Via=" . $newCinema->getVia() . ", CAP=" . $newCinema->getCap() . "
    WHERE IDCinema=$idCinema;";

    return $connection->query($query);
}

#endregion