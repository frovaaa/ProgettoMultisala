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
    <!--DataTables-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.css">

    <link rel="stylesheet" type="text/css" href="CSS/navbar.css">
    <title>Gestione Film</title>
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
if(!isDirettore($utente) && !isAmministratore($utente)){
    $_SESSION['log'] = "Devi essere direttore per accedere a questa pagina";
    header("Location: homepage.php");
    exit();
}

?>
<?php include "navBar.php"; ?>

<!--Table with all Films inside-->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Gestione Film</h1>
            <table class="table table-striped" id="tabellaFilms">
                <thead>
                <tr>
                    <th scope="col">Titolo</th>
                    <th scope="col">Genere</th>
                    <th scope="col">Regista</th>
                    <th scope="col">Attore</th>
                    <th scope="col">Anno</th>
                    <th scope="col">Durata</th>
                    <th scope="col">Descrizione</th>
                    <th scope="col">Immagine</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $films = getFilms();
                //Foreach film in films print data and option buttons
                foreach ($films as $film) {
                    $id = $film->getIdFilm();
                    $titolo = $film->getTitolo();
                    $regista = $film->getRegista();
                    //$attore = $film->getAttore();
                    $anno = $film->getAnno();
                    $durata = $film->getDurata();
                    $trama = $film->getTrama();
                    $copertina = $film->getCopertina();

                    echo "<tr>";
                    echo "<td>" . $film->getTitolo() . "</td>";
                    echo "<td>" . getStringGeneriOfFilm($film->getIdFilm()) . "</td>";
                    echo "<td>$regista</td>";
                    echo "<td>" . getStringAttoriOfFilmID($film->getIdFilm()) . "</td>";
                    echo "<td>$anno</td>";
                    echo "<td>$durata</td>";
                    echo "<td>$trama</td>";
                    echo "<td><img src='$copertina' width='100' height='100'></td>";
                    echo "<td><form action='modificaFilm.php' method='post'>
                            <input type='hidden' name='id' value='$id'>
                            <input type='hidden' name='redirect' value='gestioneFilm.php'>
                            <button type='submit' class='btn btn-primary'><i class='bi bi-pencil'></i></button></form></td>";
                    echo "<td><form action='verificaEliminaFilm.php' method='post'>
                            <input type='hidden' name='id' value='$id'>
                            <input type='hidden' name='redirect' value='gestioneFilm.php'>
                            <button type='submit' class='btn btn-danger'><i class='bi bi-trash'></i></button></form></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.js"></script>

<script>
    $(document).ready(function () {
        $('#tabellaFilms').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Italian.json"
            }
        });
    });
</script>
</body>
</html>