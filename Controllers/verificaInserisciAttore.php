<?php
require_once "../queryCollection.php";

if(!isset($_POST['Nome']) && !isset($_POST['Cognome']) && !isset($_POST['DataDiNascita'])){
    $_SESSION["log"] = "Non sono stati inseriti i dati necessari";
    header("Location:../inserisciAttore.php");
    exit();
}

$nuovoAttore = new Attore();
$nuovoAttore->setNome((isset($_POST['Nome'])) ? $_POST['Nome'] : null);
$nuovoAttore->setCognome((isset($_POST['Cognome'])) ? $_POST['Cognome'] : null);
$nuovoAttore->setDataDiNascita((isset($_POST['DataDiNascita'])) ? $_POST['DataDiNascita'] : null);

$_SESSION["log"] = (insertAttore($nuovoAttore)) ? "Inserimento avvenuto con successo!!" : "Inserimento fallito :(";

header("Location:../inserisciAttore.php");
exit();