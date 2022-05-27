<!doctype html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" type="text/css" href="CSS/navbar.css">
    <title>Prenotazioni</title>
</head>
<body>
<?php
require_once "queryCollection.php";
session_start();
$utente = $_SESSION['Utente'] ?? null;
if ($utente == null) {
    $_SESSION['log'] = "Devi effettuare il login per accedere a questa pagina";
    header("Location: homepage.php");
    exit();
}
$idUtente = $utente->getIdUtente();

?>
<?php include "navBar.php"; ?>

<!--Show prenotazioni of utente divided by programmazione-->
<div class="container">
    <?php
    if (isset($_SESSION['log'])) {
        echo "<div class='alert alert-primary' role='alert'>
        <strong>Attenzione!</strong> " . $_SESSION['log'] . "
    </div>";
        unset($_SESSION['log']);
    }
    ?>
    <div class="row">
        <div class="col-md-12">
            <h1>Prenotazioni</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Film / Evento</th>
                    <th scope="col">Sala</th>
                    <th scope="col">Data</th>
                    <th scope="col">Ora</th>
                    <th scope="col">Posti</th>
                    <th scope="col">Azione</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $prenotazioni = getPrenotazioniByUtente($idUtente);
                foreach ($prenotazioni as $prenotazione) {
                    $programmazione = getProgrammazioneById($prenotazione->getIdfProgrammazione());

                    $dataProgrammazione = $programmazione->getData();

                    //If programmazione data is in the past, continue
                    if ($dataProgrammazione < date("Y-m-d")) continue;

                    $data = date_create($dataProgrammazione);
                    $data = date_format($data, "d/m/Y");
                    $ora = date_create($dataProgrammazione);
                    $ora = date_format($ora, "H:i");
                    $posti = getPostiFromPrenotazionePosto(getPrenotazioniPostoByPrenotazione($prenotazione->getIdPrenotazione()));
                    echo "<tr>";
                    //Print evento name or film name if evento is null
                    if ($programmazione->getIdfEvento() == null) {
                        $film = getFilmById($programmazione->getIdfFilm());
                        echo "<td>" . $film->getTitolo() . "</td>";
                    } else {
                        $evento = getEventoById($programmazione->getIdfEvento());
                        echo "<td>" . $evento->getDescrizione() . "</td>";
                    }
                    echo "<td>" . $programmazione->getIdfSala() . "</td>";
                    echo "<td>" . $data . "</td>";
                    echo "<td>" . $ora . "</td>";
                    echo "<td>" . $posti . "</td>";
                    //Delete form button in post
                    echo "<td>";
                    echo "<form action='verificaEliminaPrenotazione.php' method='post'>";
                    echo "<input type='hidden' name='idPrenotazione' value='" . $prenotazione->getIdPrenotazione() . "'>";
                    echo "<button type='submit' class='btn btn-danger'>Cancella</button>";
                    echo "</form>";
                    echo "</td>";

                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>