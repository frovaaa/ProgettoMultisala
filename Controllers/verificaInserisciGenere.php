<?php
require_once "../queryCollection.php";

if(!isset($_POST['Nome']) && !isset($_POST['Descrizione']) && !isset($_POST['Limitazioni'])){
    $_SESSION["log"] = "Non sono stati inseriti i dati necessari";
    header("Location:../inserisciGenere.php");
    exit();
}

$nuovoGenere = new Genere();
$nuovoGenere->setNome((isset($_POST['Nome'])) ? $_POST['Nome'] : null);
$nuovoGenere->setDescrizione((isset($_POST['Descrizione'])) ? $_POST['Descrizione'] : null);
$nuovoGenere->setLimitazioni((isset($_POST['Limitazioni'])) ? $_POST['Limitazioni'] : null);

$_SESSION["log"] = (insertGenere($nuovoGenere)) ? "Inserimento avvenuto con successo!!" : "Inserimento fallito :(";

header("Location:../inserisciGenere.php");
exit();