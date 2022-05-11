<?php

$titolo = $_POST['Titolo'];
$trama = $_POST['Trama'];
$copertina = $_POST['Copertina'];

$nuovoFilm = new Film();
$nuovoFilm->setTitolo($titolo);
$nuovoFilm->setTrama($trama);
$nuovoFilm->setCopertina($copertina);

insertFilm($nuovoFilm);