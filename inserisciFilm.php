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
    <title>Inserimento Film</title>
</head>
<body>
<?php
require_once "queryCollection.php";
session_start();


?>
<center>
    <h1>Inserimento Film</h1>

</center>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">

<form action="verificaInsersciFilm.php" method="post">
    <div class="form-group">
        <label for="titolo">Titolo</label>
        <input type="text" class="form-control" id="titolo" name="titolo" placeholder="Inserisci il titolo">
    </div>
    <div class="form-group">
        <label for="link">Link</label>
        <input type="text" class="form-control" id="link" name="link" placeholder="Inserisci il link">
    </div>
    <div class="form-group">
        <label for="descrizione">Trama</label>
        <input type="text" class="form-control" id="descrizione" name="descrizione" placeholder="Inserisci la trama">
    </div>
    <br>
    <button type="submit" class="btn btn-primary">Inserisci</button>
</form>
        </div>
    </div>
</div>



</body>
</html>

