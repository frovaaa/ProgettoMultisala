<?php
require_once "../queryCollection.php";

if(!isset($_POST['Nome'])){
    $_SESSION["log"] = "Non sono stati inseriti i dati necessari";
    header("Location:../inserisciTipoPosto.php");
    exit();
}

$nuovoTipoPosto = new TipoPosto();
$nuovoTipoPosto->setNome($_POST['Nome']);

$_SESSION["log"] = (insertTipoPosto($nuovoTipoPosto)) ? "Inserimento avvenuto con successo!!" : "Inserimento fallito :(";

header("Location:../inserisciTipoPosto.php");
exit();