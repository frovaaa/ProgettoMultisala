<?php
require_once "../queryCollection.php";

if(!isset($_POST['IDFCinema']) && !isset($_POST['NumSala']) && !isset($_POST['PostiMax'])){
    $_SESSION["log"] = "Non sono stati inseriti i dati necessari";
    header("Location:../inserisciSala.php");
    exit();
}

$nuovoSala = new Sala();
$nuovoSala->setIdfCinema((isset($_POST['IDFCinema'])) ? $_POST['IDFCinema'] : null);
$nuovoSala->setNumSala((isset($_POST['NumSala'])) ? $_POST['NumSala'] : null);
$nuovoSala->setPostiMax((isset($_POST['PostiMax'])) ? $_POST['PostiMax'] : null);

$_SESSION["log"] = (insertSala($nuovoSala)) ? "Inserimento avvenuto con successo!!" : "Inserimento fallito :(";

header("Location:../inserisciSala.php");
exit();