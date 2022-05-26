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
    <title>Inserisci Film</title>
    <link rel="stylesheet" type="text/css" href="CSS/navbar.css">
</head>
<body>
<?php
require_once "queryCollection.php";
session_start();
if (!isset($_SESSION['Utente'])) {
    $_SESSION['log'] = "Devi effettuare il login per accedere a questa pagina";
    header("Location: homepage.php");
    exit();
}
$utente = $_SESSION['Utente'];
if (!isDirettore($utente) && !isAmministratore($utente)) {
    $_SESSION['log'] = "Devi essere direttore per accedere a questa pagina";
    header("Location: homepage.php");
    exit();
}

?>
<?php include "navBar.php"; ?>
<!--Film edit page-->
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
        <div class="col-sm-12">
            <h1>Inserisci Film</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <form action="verificaInsersciFilm.php" method="post">
                <div class="form-group">
                    <label for="titolo">Titolo</label>
                    <input type="text" class="form-control" id="titolo" name="titolo"
                           value="">
                </div>
                <div class="form-group">
                    <label for="anno">Anno</label>
                    <input type="number" class="form-control" id="anno" name="anno"
                           value="">
                </div>
                <div class="form-group">
                    <label for="regista">Regista</label>
                    <input type="text" class="form-control" id="regista" name="regista"
                           value="">
                </div>
                <!--Multi select genere film-->
                <div class="form-group">
                    <label for="genere">Genere</label>
                    <select class="form-control" id="genere" name="genere[]" multiple size="8">
                        <?php
                        $genere = getAllGenere();
                        foreach ($genere as $g) {
                            echo "<option value='" . $g->getIdGenere() . "'>" . $g->getNome() . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <!--Attore multiselect-->
                <div class="form-group">
                    <label for="attore">Attore</label>
                    <select class="form-control" id="attore" name="attore[]" multiple size="8">
                        <?php
                        $attore = getAllAttori();
                        foreach ($attore as $a) {
                            echo "<option value='" . $a->getIdAttore() . "'>" . $a->getNome() . " " . $a->getCognome() . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group mt-2">
                    <label for="trama">Descrizione</label>
                    <textarea class="form-control" id="trama" name="trama"
                              rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="durata">Durata</label>
                    <input type="number" class="form-control" id="durata" name="durata"
                           value="">
                </div>
                <div class="form-group">
                    <label for="copertina">Immagine</label>
                    <input type="text" class="form-control" id="copertina" name="copertina"
                           value="">
                </div>
                <div class="form-group">
                    <label for="trailer">Trailer</label>
                    <input type="text" class="form-control" id="trailer" name="trailer"
                           value="">
                </div>
                <div class="form-group mt-3 mb-3">
                    <button type="submit" class="btn btn-primary">Inserisci</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>