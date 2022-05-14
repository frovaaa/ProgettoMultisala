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

$arrayFilm = getFilms();
?>

<div class="container mt-3">
    <div class="row">
        <?php
        //Foreachloop with arrayFilm
        foreach ($arrayFilm as $film) {
            $copertina = $film->getCopertina();
            ?>
            <div class="card m-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="<?php echo "$copertina" ?>" class="img-fluid rounded-start"
                             alt="Copertina non disponibile">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $film->getTitolo() ?></h5>
                            <h6 class="card-title">Genere: <?php
                                $generiFilm = getFilmGenereByFilm($film->getIdFilm());
                                //Foreach loop echo genere of generiFilm
                                foreach ($generiFilm as $genere) {
                                    echo getGenereById($genere->getIdfGenere())->getNome() . " / ";
                                }
                                ?></h6>
                            <p class="card-text"><?php echo $film->getTrama() ?></p>
                            <a href="#" class="btn btn-primary">Scheda film</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

</body>
</html>