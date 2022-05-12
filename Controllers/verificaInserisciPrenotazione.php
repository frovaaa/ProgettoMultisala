<?php
require_once "../queryCollection.php";

if(!isset($_POST['IDFUtente']) || !isset($_POST['IDFPosto'])){
    $_SESSION["log"] = "Non sono stati inseriti i dati necessari";
    header("Location:../inserisciPrenotazione.php");
    exit();
}

$nuovoPrenotazione = new Prenotazione();
$nuovoPrenotazione->setIdfUtente($_POST['IDFPosto']);
$nuovoPrenotazione->setIdfPosto($_POST['IDFSala']);

$_SESSION["log"] = (insertPrenotazione($nuovoPrenotazione)) ? "Inserimento avvenuto con successo!!" : "Inserimento fallito :(";

header("Location:../inserisciPrenotazione.php");
exit();