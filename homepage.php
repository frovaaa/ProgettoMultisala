<!doctype html>
<html lang="it">
<head>
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
    <link rel="stylesheet" type="text/css" href="CSS/navbar.css">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HomePage</title>
</head>
<body>
<?php
    include "queryCollection.php";
    session_start();
?>
<?php include "navBar.php" ?>

<div id="upToTop">
    <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
         width="20.000000px" height="20.000000px" viewBox="0 0 20.000000 20.000000"
         preserveAspectRatio="xMidYMid meet">

        <g transform="translate(0.000000,20.000000) scale(0.100000,-0.100000)"
           fill="#FFFFFF" stroke="none">
            <path d="M20 128 c0 -15 63 -68 80 -68 17 0 80 53 80 68 0 19 -14 14 -40 -13 -13 -14 -31 -25 -40 -25 -9 0 -27 11 -40 25 -26 27 -40 32 -40 13z"/>
        </g>
    </svg>
</div>

<main>
    <div id="selectMultisala">
        <label>I nostri cinema </label>
        <select id="cinemaSelect">
            <?php
                $cinema = getNomeCinema();
                $id = null;

                if($_GET["id"] != null){
                    $id = $_GET["id"];
                    foreach ($cinema as $t){
                        if($t->getIdCinema() == $id){
                            echo("<option value='".$t->getIdCinema()."' selected>
                                ". $t->getNome() ."
                            </option>");
                        }else{
                            echo("<option value='".$t->getIdCinema()."'>
                                ". $t->getNome() ."
                            </option>");
                        }
                    }
                }else{
                    echo ("ciao");
                    $id = $cinema[0]->getIdCinema();
                    foreach ($cinema as $t){
                        echo("<option value='".$t->getIdCinema()."'>
                                ". $t->getNome() ."
                            </option>");
                    }
                }
            ?>
        </select>
    </div>
    <div id="nostriFilm">
        <div id="title">
            <h1>I nostri film</h1>
        </div>
        <div id="cards">

            <?php
                $films = getFilmsLimit(4);

                foreach ($films as $film){
                    echo(
                        '<div class="card" style="background-image: url('. $film->getCopertina() .')">
                            <div class="scopriDipiu">
                                <div class="content">
                                    <p>'. $film->getTitolo() .'</p>
                                    <a href="">Scopri di piu..</a>
                                </div>
                            </div>
                        </div>'
                    );
                }
            ?>

            <div class="card" style="background-image: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT-rgSfqIy93HiXkRq53-XbMlkZsIMoRUIWHpKtPZRbsLeLPY4K');">
            </div>
        </div>
    </div>
</main>


</body>

<script>
    const scroll = function (e){
        if(window.scrollY > 90){
            document.getElementById("upToTop").style.display = "block";
        }else{
            document.getElementById("upToTop").style.display = "none";
        }
    }
    const click = function (e){
        window.tran
        window.scrollTo({top: 0, behavior: "smooth"});
        document.getElementById("upToTop").style.display = "none";
    }
    const x = function (e) {
        let cards = document.getElementsByClassName("card");

        for (let i = 0; i < cards.length; i ++){
            let w = cards[i].clientWidth;
            cards[i].style.height = ((w / 9) * 16) + "px";
        }
    }

    window.addEventListener("scroll", scroll);
    window.addEventListener("load", x);
    window.addEventListener("resize", x);
    document.getElementById("upToTop").addEventListener("click", click);

    document.getElementById("cinemaSelect").addEventListener("change", (e) => {
        let idcinema = e.target.value;

        window.location.href = "homepage.php?id=" + idcinema;
    });
</script>

</html>