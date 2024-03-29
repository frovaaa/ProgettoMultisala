<?php
require_once "queryCollection.php";
session_start();

//se arrivo da modifica profilo imposto a 1 altrimenti se arrivo da modifica utente imposto a 2
$sourceModifica = null;
if (isset($_POST['sourceModifica'])) {
    $sourceModifica = $_POST['sourceModifica'];
} else {
    $_SESSION['log'] = "Non riconosco l'origine della richiesta";
    header("Location: homepage.php");
    exit();
}

$utenteVecchio = null;
switch ($sourceModifica) {
    case '1':
        $utenteVecchio = $_SESSION['Utente'];
        break;
    case '2':
        if (!isset($_POST['id'])) {
            $_SESSION['log'] = "Errore nella modifica dell'utente";
            header("Location: listaUtenti.php");
            exit();
        }
        $utenteVecchio = getUtenteById($_POST['id']);
        break;
    default:
        $_SESSION['log'] = "Non riconosco l'origine della richiesta";
        header("Location: homepage.php");
        exit();
}

$utenteModificato = $utenteVecchio;
$utenteModificato->setIdUtente($utenteVecchio->getIdUtente());
if (isset($_POST['attivo'])) $utenteModificato->setAttivo($_POST['attivo']);

if (isset($_POST['ruolo'])) $utenteModificato->setIdfRuolo($_POST['ruolo']);

if (isset($_POST['nome'])) $utenteModificato->setNome($_POST['nome']);

if (isset($_POST['cognome'])) $utenteModificato->setCognome($_POST['cognome']);

if (isset($_POST['username'])) $utenteModificato->setUsername($_POST['username']);

if (isset($_POST['password']) && $_POST['password'] !== '') $utenteModificato->setPassword(password_hash($_POST['password'], PASSWORD_BCRYPT));

if (isset($_POST['email'])) $utenteModificato->setEmail($_POST['email']);

if (isset($_POST['cellulare'])) $utenteModificato->setCellulare($_POST['cellulare']);

if (isset($_POST['immagineProfilo'])) $utenteModificato->setImmagineProfilo($_POST['immagineProfilo']);

if (editUtente($utenteVecchio->getIdUtente(), $utenteModificato)) {
    $_SESSION['log'] = "Utente modificato con successo";
    if ($sourceModifica == '1' || $utenteModificato->getIdUtente() == $_SESSION['Utente']->getIdUtente()) {
        $_SESSION['Utente'] = $utenteModificato;
        header("Location: profile.php");
    } else header("Location: listaUtenti.php");
} else {
    $_SESSION['log'] = "Errore nella modifica dell'utente";
}

exit();
