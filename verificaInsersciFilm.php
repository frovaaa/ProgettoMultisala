<?php
require_once "queryCollection.php";
session_start();

$nuovoFilm = new Film();

if (isset($_POST['titolo'])) $nuovoFilm->setTitolo($_POST['titolo']);
if (isset($_POST['trama'])) $nuovoFilm->setTrama($_POST['trama']);
if (isset($_POST['copertina'])) $nuovoFilm->setCopertina($_POST['copertina']);
if (isset($_POST['regista'])) $nuovoFilm->setRegista($_POST['regista']);
if (isset($_POST['durata'])) $nuovoFilm->setDurata((int)$_POST['durata']);
if (isset($_POST['trailer'])) $nuovoFilm->setTrailer($_POST['trailer']);
if (isset($_POST['anno'])) $nuovoFilm->setAnno($_POST['anno']);

if (!insertFilm($nuovoFilm)) {
    $_SESSION['log'] = "Errore nell'inserimento del film";
    header("Location: homepage.php");
    exit();
}

$idFilm = getFilmByFilm($nuovoFilm)->getIdfilm();

//Foreach genere creo un elemento FilmGenere
$genere = $_POST['genere'] ?? null;
if ($genere != null) {
    deleteFilmGenereByFilm($idFilm);
    foreach ($genere as $idGenere) {
        $tempFilmGenere = new FilmGenere();
        $tempFilmGenere->setIdfFilm((int)$idFilm);
        $tempFilmGenere->setIdfGenere((int)$idGenere);
        if (!insertFilmGenere($tempFilmGenere)) {
            $_SESSION['log'] = "Errore nell'inserimento dei generi del film";
            header("Location: homepage.php");
            exit();
        }
    }
}

//Foreach attore creo un elemento FilmAttore
$attore = $_POST['attore'] ?? null;
if ($attore != null) {
    deleteFilmAttoreByFilm($idFilm);
    foreach ($attore as $idAttore) {
        $tempFilmAttore = new FilmAttore();
        $tempFilmAttore->setIdfFilm((int)$idFilm);
        $tempFilmAttore->setIdfAttore((int)$idAttore);
        if (!insertFilmAttore($tempFilmAttore)) {
            $_SESSION['log'] = "Errore nell'inserimento degli attori del film";
            header("Location: homepage.php");
            exit();
        }
    }
}

$_SESSION['log'] = "Film inserito correttamente";
header("Location: gestioneFilm.php");
exit();