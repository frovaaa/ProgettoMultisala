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
    <title>Programmazioni</title>
</head>
<body>
<?php
require_once "queryCollection.php";
session_start();

if (!isset($_SESSION['Utente'])) {
    $_SESSION['log'] = "Devi effettuare il login per accedere a questa pagina";
    header("Location: login.php");
}
//Check if programmazione in post exists
$programmazione = null;
if (isset($_POST['IDProgrammazione'])) {
    $programmazione = getProgrammazioneById($_POST['IDProgrammazione']);
} else if (isset($_GET['IDProgrammazione'])) {
    $programmazione = getProgrammazioneById($_POST['IDProgrammazione']);
} else {
    $_SESSION['log'] = "Programmazione non trovata";
    header("Location: listaFilm.php");
}
$data = new DateTime($programmazione->getData());

$sala = getSalaById($programmazione->getIdfSala());

$nMaxColonna = 10;
$postiMax = $sala->getPostiMax();
/*
 * TODO: Da inserire in gestioneSale per riempimento
$postiSala = count(getPostiBySala($sala->getIdSala()));
if ($postiSala == $postiMax) {
    $_SESSION['log'] = "Sala piena";
} else {
    $postiDisponibili = $postiMax - $postiSala;
    //$postiDisponibili = 5;
    var_dump(insertPosti($sala->getIdSala(), $postiDisponibili, $nMaxColonna));
}
*/

?>

<div class="container mt-3">
    <!--Show programmazione infos-->
    <div class="card">
        <div class="card-header">
            <h3>Programmazione</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="film">Film</label>
                        <input type="text" class="form-control" id="film"
                               value="<?php echo $programmazione->getIdfFilm() ?>"
                               readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sala">Sala</label>
                        <input type="text" class="form-control" id="sala"
                               value="<?php echo $programmazione->getIdfSala() ?>"
                               readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="data">Data</label>
                        <input type="text" class="form-control" id="data"
                               value="<?php echo $data->format('d/m/Y') ?>" readonly>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ora">Ora</label>
                        <input type="text" class="form-control" id="ora" value="<?php echo $data->format('H:i') ?>"
                               readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="prezzo">Prezzo</label>
                        <input type="text" class="form-control" id="prezzo"
                               value="<?php echo "Prezzo..." ?>" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Show n seats up to Sala PostiMax-->
    <div class="card mt-3 mb-3">
        <div class="card-header">
            <h3>Posti disponibili</h3>
        </div>
        <div class="card-body">
            <div class="row m-3">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="posti">Posti</label>
                        <input type="text" class="form-control" id="posti"
                               value="<?php echo $postiMax ?>"
                               readonly>
                    </div>
                </div>
            </div>
            <form action="Controllers/buyTickets.php" method="post">
                <!--Print 70 icons in order-->
                <?php
                $posti = getPostiBySala($programmazione->getIdfSala());
                echo "<div class='row m-1'>";
                foreach ($posti as $key => $posto) {
                    if ($key % $nMaxColonna == 0 && $key != 0) {
                        echo "</div><div class='row m-1'>";
                    }
                    $IDPosto = $posto->getIdPosto();
                    ?>
                    <div class="col text-center">
                        <div class="btn-group" role="group">
                            <?php
                            if (isPostoOccupato($IDPosto, $programmazione->getIdProgrammazione())) {
                            ?>
                            <input type="checkbox" class="btn-check" id="posto<?php echo $IDPosto ?>"
                                   name="posto<?php echo $IDPosto ?>"
                                   autocomplete="off" disabled>
                            <label class="btn btn-outline-primary" for="posto<?php echo $IDPosto ?>">
                                <?php
                                echo "<img src='Imgs/chair.png' alt='Occupato' width='32px' height='32px'>";
                                } else {
                                ?>
                                <input type="checkbox" class="btn-check" id="posto<?php echo $IDPosto ?>"
                                       name="posto<?php echo $IDPosto ?>"
                                       autocomplete="off">
                                <label class="btn btn-outline-primary" for="posto<?php echo $IDPosto ?>">
                                    <?php
                                    echo "<img src='Imgs/chairFree.png' alt='Libero' width='32px' height='32px'>";
                                    }
                                    ?>
                                </label>
                        </div>
                    </div>
                    <?php
                }
                ?>
                <div class="card-header mt-3">
                    <h3>Acquista biglietto</h3>
                </div>
                <div class="card-body">
                    <input type="hidden" name="IDProgrammazione"
                           value="<?php echo $programmazione->getIdProgrammazione() ?>">
                    <button type="submit" class="btn btn-primary">Acquista</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>