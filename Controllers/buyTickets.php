<?php
require_once "../queryCollection.php";
session_start();
$utente = $_SESSION['Utente'];

//If isset IDProgrammazione
if (!isset($_POST['IDProgrammazione'])) {
    $_SESSION['log'] = "Errore: IDProgrammazione non settato";
    header("Location: ../listaFilm?IDProgrammazione=" . $_POST['IDProgrammazione']);
    exit();
}

$postiSelezionati = [];

foreach ($_POST as $key => $value) {
    if (strpos($key, 'osto')) {
        $valore = (int)substr($key, strpos($key, 'posto') + 5);

        $postiSelezionati[$key] = getPostoById($valore);
    }
}

if (count($postiSelezionati) == 0) {
    $_SESSION['log'] = "Errore: non hai selezionato nessun posto";
    header("Location: ../prenotaProgrammazione.php?IDProgrammazione=" . $_POST['IDProgrammazione']);
    exit();
}

$programmazione = getProgrammazioneById($_POST['IDProgrammazione']);

//TODO: Pagina di acquisto

foreach ($postiSelezionati as $posto) {
    $tempPrenotazione = new Prenotazione();

    $tempPrenotazione->setIdfUtente($utente->getIDUtente());
    $tempPrenotazione->setIdfPosto($posto->getIDPosto());
    $tempPrenotazione->setIdfProgrammazione($programmazione->getIDProgrammazione());
    $tempPrenotazione->setCodice(generateRandomString(8));

    insertPrenotazione($tempPrenotazione);
}

$_SESSION['log'] = "Prenotazione effettuata con successo";
header("Location: ../listaFilm.php");
exit();

function generateRandomString($length)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}