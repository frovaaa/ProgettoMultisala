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
    <?php
    //Foreachloop with arrayFilm
    foreach ($arrayFilm as $film) {
        $copertina = $film->getCopertina();
        ?>
        <div class="row">
            <div class="col">
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
                                    $stringaGeneri = "";
                                    foreach ($generiFilm as $genere) {
                                        $stringaGeneri .= getGenereById($genere->getIdfGenere())->getNome() . " / ";
                                    }
                                    $stringaGeneri = substr($stringaGeneri, 0, -3);
                                    echo $stringaGeneri;
                                    ?></h6>
                                <p class="card-text"><?php echo $film->getTrama() ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Tabella date disponibili-->
            <div class="col mt-3">
                <h5 class="card-title">Date disponibili</h5>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Giorno</th>
                        <th scope="col">Ora</th>
                        <th scope="col">Prenota</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    //Get all programmazioni of film
                    $programmazioniFilm = getProgrammazioniFilmByFilm($film->getIdFilm());
                    //Foreach loop with programmazioniFilm
                    foreach ($programmazioniFilm as $programmazione) {
                        //Get datetime from string
                        $data = new DateTime($programmazione->getData());
                        //If datetime is greater than now
                        if ($data > new DateTime()) {
                            //If prenotazioni by programmazione > sala postiMax
                            if (count(getPrenotazioniPostoByProgrammazione($programmazione->getIdProgrammazione())) == getSalaById($programmazione->getIdfSala())->getPostiMax()) {
                                ?>
                                <tr>
                                    <td><?php echo $data->format('d/m/Y') ?></td>
                                    <td><?php echo $data->format('H:i') ?></td>
                                    <td>
                                        <button class="btn btn-danger" disabled>Sold Out</button>
                                    </td>
                                </tr>
                                <?php
                            } else {
                                ?>
                                <tr>
                                    <td><?php echo $data->format('d/m/Y') ?></td>
                                    <td><?php echo $data->format('H:i') ?></td>
                                    <td>
                                        <form action="prenotaProgrammazione.php" method="post">
                                            <input type="hidden" name="IDProgrammazione"
                                                   value="<?php echo $programmazione->getIdProgrammazione() ?>">
                                            <button class="btn btn-success">Prenota</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php
    }
    ?>
</body>
</html>