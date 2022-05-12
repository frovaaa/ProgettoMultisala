<?php
require_once "../queryCollection.php";

if(!isset($_POST['Nome']) && !isset($_POST['Descrizione'])){
    $_SESSION["log"] = "Non sono stati inseriti i dati necessari";
    header("Location:../inserisciRuolo.php");
    exit();
}

$nuovoRuolo = new Ruolo();
$nuovoRuolo->setNome((isset($_POST['Nome'])) ? $_POST['Nome'] : null);
$nuovoRuolo->setDescrizione((isset($_POST['Descrizione'])) ? $_POST['Descrizione'] : null);

$_SESSION["log"] = (insertRuolo($nuovoRuolo)) ? "Inserimento avvenuto con successo!!" : "Inserimento fallito :(";

header("Location:../inserisciRuolo.php");
exit();