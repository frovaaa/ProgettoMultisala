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
    <title>Pannello Amministratore</title>
</head>
<body>
<?php
require_once "queryCollection.php";
session_start();

if (!isset($_SESSION['Utente'])) {
    $_SESSION['log'] = "Devi effettuare il login per accedere a questa pagina";
    header("Location: login.php");
}
?>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="homepage.php">
        <img src="Images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Cinema
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="listaFilm.php">Film</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listaSala.php">Sale</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listaProgrammazione.php">Programmazioni</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listaPrenotazioni.php">Prenotazioni</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="listaUtenti.php">Utenti</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>
<!-- Fine navbar -->


<!--Administrator Panel-->
<div class="container">
    <div class="row text-center">
        <div class="col-md-12">
            <h1>Pannello Amministratore</h1>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <h3>Utenti</h3>
                    <a href="utenti.php" class="btn btn-success">Visualizza</a>
                </div>
                <div class="col-md-4">
                    <h3>Sedi</h3>
                    <a href="listaCinema.php" class="btn btn-success">Visualizza</a>
                </div>
                <div class="col-md-4">
                    <h3>Reportistica</h3>
                    <a href="categorie.php" class="btn btn-success">Visualizza</a>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>