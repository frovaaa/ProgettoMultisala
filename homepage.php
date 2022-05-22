<!doctype html>
<html lang="it">
<head>
    <link rel="stylesheet" type="text/css" href="CSS/homepage.css">
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
            <path d="M20 128 c0 -15 63 -68 80 -68 17 0 80 53 80 68 0 19 -14 14 -40 -13
-13 -14 -31 -25 -40 -25 -9 0 -27 11 -40 25 -26 27 -40 32 -40 13z"/>
        </g>
    </svg>
</div>

<main>
    <div>

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
        window.scroll(0, 0);
        document.getElementById("upToTop").style.display = "none";
    }

    window.addEventListener("scroll", scroll);
    document.getElementById("upToTop").addEventListener("click", click);
</script>

</html>