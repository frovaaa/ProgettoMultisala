<?php
require_once "queryCollection.php";
session_start();
$utente = $_SESSION['Utente'];

//If isset IDProgrammazione
if (!isset($_POST['IDProgrammazione'])) {
    $_SESSION['log'] = "Errore: IDProgrammazione non settato";
    header("Location: listaFilm?IDProgrammazione=" . $_POST['IDProgrammazione']);
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
    header("Location: prenotaProgrammazione.php?IDProgrammazione=" . $_POST['IDProgrammazione']);
    exit();
}


//TODO: Pagina di acquisto

$programmazione = getProgrammazioneById($_POST['IDProgrammazione']);
$codice = generateRandomString(8);
$now = new DateTime();

$tempPrenotazione = new Prenotazione();
$tempPrenotazione->setIdfUtente($utente->getIDUtente());
$tempPrenotazione->setIdfProgrammazione($programmazione->getIDProgrammazione());
$tempPrenotazione->setDataPrenotazione($now);
$tempPrenotazione->setCodice(generateRandomString(8));
insertPrenotazione($tempPrenotazione);

$idfPrenotazione = getPrenotazioneByCodiceAndData($tempPrenotazione->getCodice(), $now)->getIdPrenotazione();

foreach ($postiSelezionati as $posto) {
    $tempPrenotazionePosto = new PrenotazionePosto();

    $tempPrenotazionePosto->setIdfPrenotazione($idfPrenotazione);
    $tempPrenotazionePosto->setIdfPosto($posto->getIDPosto());

    insertPrenotazionePosto($tempPrenotazionePosto);
}

$_SESSION['log'] = "Prenotazione effettuata con successo";
header("Location: listaFilm.php");
exit();

function generateRandomString($length): string
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}