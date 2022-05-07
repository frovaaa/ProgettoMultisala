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

#endregion