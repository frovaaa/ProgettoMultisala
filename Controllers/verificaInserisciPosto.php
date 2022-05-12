<?php
require_once "../queryCollection.php";

if(!isset($_POST['IDFTipoPosto']) && !isset($_POST['IDFSala']) && !isset($_POST['Riga']) && !isset($_POST['Colonna'])){
    $_SESSION["log"] = "Non sono stati inseriti i dati necessari";
    header("Location:../inserisciPosto.php");
    exit();
}

$nuovoPosto = new Posto();
$nuovoPosto->setIdfTipoPosto((isset($_POST['IDFTipoPosto'])) ? $_POST['IDFTipoPosto'] : null);
$nuovoPosto->setIdfSala((isset($_POST['IDFSala'])) ? $_POST['IDFSala'] : null);
$nuovoPosto->setRiga((isset($_POST['Riga'])) ? $_POST['Riga'] : null);
$nuovoPosto->setColonna((isset($_POST['Colonna'])) ? $_POST['Colonna'] : null);

$_SESSION["log"] = (insertPosto($nuovoPosto)) ? "Inserimento avvenuto con successo!!" : "Inserimento fallito :(";

header("Location:../inserisciPosto.php");
exit();