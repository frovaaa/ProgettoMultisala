<?php
require_once "queryCollection.php";
session_start();

$idFilm = $_POST['idFilm'] ?? null;
if ($idFilm == null) {
    $_SESSION['log'] = "Errore nella modifica del film";
    header("Location: homepage.php");
    exit();
}

$film = getFilmById($idFilm);
$filmModificato = $film;

if (isset($_POST['titolo'])) $filmModificato->setTitolo($_POST['titolo']);
if (isset($_POST['trama'])) $filmModificato->setTrama($_POST['descrizione']);
if (isset($_POST['copertina'])) $filmModificato->setCopertina($_POST['copertina']);
if (isset($_POST['regista'])) $filmModificato->setRegista($_POST['regista']);
if (isset($_POST['durata'])) $filmModificato->setDurata($_POST['durata']);
if (isset($_POST['trailer'])) $filmModificato->setTrailer($_POST['trailer']);
if (isset($_POST['anno'])) $filmModificato->setAnno($_POST['anno']);

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

$_SESSION['log'] = "Film modificato correttamente";
header("Location: gestioneFilm.php");
exit();