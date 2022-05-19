<?php
require_once "queryCollection.php";
session_start();

if(!isset($_POST['id'])){
    $_SESSION['log'] = "Errore nella modifica dell'utente";
    header("Location: listaUtenti.php");
    exit();
}

$utenteVecchio = getUtenteById($_POST['id']);

$utenteModificato = new Utente();
$utenteModificato->setIdUtente($utenteVecchio->getIdUtente());
$utenteModificato->setIdfRuolo($_POST['ruolo']);
$utenteModificato->setAttivo($_POST['attivo']);
$utenteModificato->setNome($_POST['nome']);
$utenteModificato->setCognome($_POST['cognome']);
$utenteModificato->setUsername($_POST['username']);
$utenteModificato->setPassword($utenteVecchio->getPassword());
$utenteModificato->setEmail($_POST['email']);
$utenteModificato->setCellulare($_POST['cellulare']);
$utenteModificato->setImmagineProfilo($utenteVecchio->getImmagineProfilo());
//TODO: aggiornare immagine profilo;
//TODO: aggiornare password

editUtente($utenteVecchio->getIdUtente(), $utenteModificato);

$_SESSION['log'] = "Utente modificato con successo";
header("Location: listaUtenti.php");
exit();