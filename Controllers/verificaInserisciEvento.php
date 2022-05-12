<?php
require_once "../queryCollection.php";

if(!isset($_POST['Descrizione'])){
    $_SESSION["log"] = "Non sono stati inseriti i dati necessari";
    header("Location:../inserisciEvento.php");
    exit();
}

$nuovoEvento = new Evento();
$nuovoEvento->setDescrizione($_POST['Descrizione']);

$_SESSION["log"] = (insertEvento($nuovoEvento)) ? "Inserimento avvenuto con successo!!" : "Inserimento fallito :(";

header("Location:../inserisciEvento.php");
exit();