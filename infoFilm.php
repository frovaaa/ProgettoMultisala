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
    <title>Info Film</title>
</head>
<body>
<?php
require_once "queryCollection.php";
session_start();

$idFilm = $_GET['idFilm'] ?? null;
if (!$idFilm) {
    $_SESSION['log'] = "Errore nella ricerca del film";
    header("Location: homepage.php");
    exit();
}
$film = getFilmById($idFilm) ?? null;
if (null == $film->getIdFilm()) {
    $_SESSION['log'] = "Errore nella ricerca del film";
    header("Location: homepage.php");
    exit();
}

?>
<?php include "navBar.php"; ?>
<!--Film info page-->
<div class="container mt-3">
    <div class="row">
        <div class="col-sm-12">
            <h1 class="text-center">Info Film</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center h2">
                        <?php echo $film->getTitolo(); ?>
                    </h5>
                    <h6 class="card-subtitle mb-2">
                        <?php echo "<b>Anno pubblicazione:</b> " . $film->getAnno(); ?>
                    </h6>
                    <p class="card-text">
                        <?php echo "<b>Trama</b><br>" . $film->getTrama(); ?>
                    </p>
                    <p class="card-text">
                        <b>Genere:</b> <?php echo getStringGeneriOfFilm($film->getIdFilm()); ?>
                    </p>
                    <p class="card-text">
                        <?php echo "<b>Regista:</b> " . $film->getRegista(); ?>
                    </p>
                    <p class="card-text">
                        <b>Cast:</b> <?php echo getStringAttoriOfFilmID($film->getIdFilm()); ?>
                    </p>
                    <p class="card-text">
                        <?php
                        //Minutes to hours and minutes
                        $minutes = $film->getDurata();
                        $hours = floor($minutes / 60);
                        $minutes = $minutes % 60;
                        echo "<b>Durata:</b> " . $hours . "h " . $minutes . "min";
                        ?>
                    </p>
                    <p class="card-text text-center">
                        <?php
                        echo "<b>Trailer</b><br>";
                        //Substring to remove the "https://www.youtube.com/watch?v="
                        $trailer = substr($film->getTrailer(), 32);
                        //Iframe
                        echo "<iframe width='560' height='315' src='https://www.youtube.com/embed/" . $trailer . "' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>";
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>