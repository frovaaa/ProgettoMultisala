<?php
require_once "queryCollection.php";
session_start();

$nomeAttore = $_POST['nomeAttore'] ?? null;
$cognomeAttore = $_POST['cognomeAttore'] ?? null;
$dataNascita = $_POST['dataNascita'] ?? null;
$redirect = $_POST['redirect'] ?? null;
$idFilm = $_POST['idFilm'] ?? null;

if ($nomeAttore != null && $cognomeAttore != null && $dataNascita != null && $idFilm != null) {
    $nuovoAttore = new Attore();
    $nuovoAttore->setNome($nomeAttore);
    $nuovoAttore->setCognome($cognomeAttore);
    $nuovoAttore->setDataDiNascita($dataNascita);

    insertAttore($nuovoAttore);
    $_SESSION['log'] = "Attore inserito correttamente";
} else $_SESSION['log'] = "Inserire tutti i campi";

if($redirect != null){
    header("Location: $redirect?id=$idFilm");
    exit();
}
header("Location: $redirect");
exit();
