<?php
require_once "../queryCollection.php";

if(!isset($_POST['Titolo']) && !isset($_POST['Trama']) && !isset($_POST['Copertina'])){
    $_SESSION["log"] = "Non sono stati inseriti i dati necessari";
    header("Location:../inserisciFilm.php");
    exit();
}

$nuovoFilm = new Film();
$nuovoFilm->setTitolo((isset($_POST['Titolo'])) ? $_POST['Titolo'] : null);
$nuovoFilm->setTrama((isset($_POST['Trama'])) ? $_POST['Trama'] : null);
$nuovoFilm->setCopertina((isset($_POST['Copertina'])) ? $_POST['Copertina'] : null);

$_SESSION["log"] = (insertFilm($nuovoFilm)) ? "Inserimento avvenuto con successo!!" : "Inserimento fallito :(";

header("Location:../inserisciFilm.php");
exit();