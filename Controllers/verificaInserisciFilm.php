<?php

$titolo = $_POST['Titolo'];
$trama = $_POST['Trama'];
$copertina = $_POST['Copertina'];

$nuovoFilm = new Film();
$nuovoFilm->setTitolo($titolo);
$nuovoFilm->setTrama($trama);
$nuovoFilm->setCopertina($copertina);

$_SESSION["log"] = (insertFilm($nuovoFilm)) ? "Inserimento avvenuto con successo!!" : "Inserimento fallito :(";

header(""); //TODO Inserisci header
exit();