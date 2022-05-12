<?php
require_once "../queryCollection.php";

if(!isset($_POST['IDFFilm']) && !isset($_POST['IDFAttore'])){
    $_SESSION["log"] = "Non sono stati inseriti i dati necessari";
    header("Location:../inserisciFilmAttore.php");
    exit();
}

$nuovoFilmAttore = new FilmAttore();
$nuovoFilmAttore->setIdfFilm($_POST['IDFFilm']);
$nuovoFilmAttore->setIdfAttore($_POST['IDFAttore']);

$_SESSION["log"] = (insertFilmAttore($nuovoFilmAttore)) ? "Inserimento avvenuto con successo!!" : "Inserimento fallito :(";

header("Location:../inserisciFilmAttore.php");
exit();