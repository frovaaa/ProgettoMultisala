<?php
require_once "../queryCollection.php";

if(!isset($_POST['IDFFilm']) && !isset($_POST['IDFGenere'])){
    $_SESSION["log"] = "Non sono stati inseriti i dati necessari";
    header("Location:../inserisciFilmGenere.php");
    exit();
}

$nuovoFilmGenere = new FilmGenere();
$nuovoFilmGenere->setIdfFilm($_POST['IDFFilm']);
$nuovoFilmGenere->setIdfGenere($_POST['IDFGenere']);

$_SESSION["log"] = (insertFilmGenere($nuovoFilmGenere)) ? "Inserimento avvenuto con successo!!" : "Inserimento fallito :(";

header("Location:../inserisciFilmGenere.php");
exit();