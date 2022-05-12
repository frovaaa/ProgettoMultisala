<?php
require_once "../queryCollection.php";

if(!isset($_POST['IDFeventi']) && !isset($_POST['IDFFilm']) && !isset($_POST['Data'])){
    $_SESSION["log"] = "Non sono stati inseriti i dati necessari";
    header("Location:../inserisciProgrammazione.php");
    exit();
}

$nuovoProgrammazione = new Programmazione();
$nuovoProgrammazione->setIdfEventi((isset($_POST['IDFeventi'])) ? $_POST['IDFeventi'] : null);
$nuovoProgrammazione->setIdfFilm((isset($_POST['IDFFilm'])) ? $_POST['IDFFilm'] : null);
$nuovoProgrammazione->setData((isset($_POST['Data'])) ? $_POST['Data'] : null);

$_SESSION["log"] = (insertProgrammazione($nuovoProgrammazione)) ? "Inserimento avvenuto con successo!!" : "Inserimento fallito :(";

header("Location:../inserisciProgrammazione.php");
exit();