<?php
require_once "../queryCollection.php";

if(!isset($_POST['Nome']) && !isset($_POST['Email']) && !isset($_POST['Telefono']) && !isset($_POST['Citta']) && !isset($_POST['Provincia']) && !isset($_POST['Via']) && !isset($_POST['CAP'])){
    $_SESSION["log"] = "Non sono stati inseriti i dati necessari";
    header("Location:../inserisciCinema.php");
    exit();
}

$nuovoCinema = new Cinema();
$nuovoCinema->setNome((isset($_POST['Nome'])) ? $_POST['Nome'] : null);
$nuovoCinema->setEmail((isset($_POST['Email'])) ? $_POST['Email'] : null);
$nuovoCinema->setTelefono((isset($_POST['Telefono'])) ? $_POST['Telefono'] : null);
$nuovoCinema->setCitta((isset($_POST['Citta'])) ? $_POST['Citta'] : null);
$nuovoCinema->setProvincia((isset($_POST['Provincia'])) ? $_POST['Provincia'] : null);
$nuovoCinema->setVia((isset($_POST['Via'])) ? $_POST['Via'] : null);
$nuovoCinema->setCap((isset($_POST['CAP'])) ? $_POST['CAP'] : null);

$_SESSION["log"] = (insertCinema($nuovoCinema)) ? "Inserimento avvenuto con successo!!" : "Inserimento fallito :(";

header("Location:../inserisciCinema.php");
exit();