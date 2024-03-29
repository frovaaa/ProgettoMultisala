<header>
    <nav>
        <div id="list">
            <ul>
                <li id="logo">
                    <!--img src="Images/logo.png"-->
                    <a href="homepage.php">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                             width="85.000000px" height="64.000000px" viewBox="0 0 85.000000 64.000000"
                             preserveAspectRatio="xMidYMid meet">

                            <g transform="translate(0.000000,64.000000) scale(0.100000,-0.100000)"
                               fill="#FFFFFF" stroke="none">
                                <path d="M335 511 l-60 -38 -3 -91 -3 -91 70 -40 c38 -23 77 -41 86 -41 9 0
48 18 86 41 l70 40 -3 91 -3 91 -60 38 c-35 22 -73 38 -90 38 -17 0 -55 -16
-90 -38z m114 0 c11 -7 10 -11 -5 -19 -25 -13 -65 5 -43 19 18 11 30 11 48 0z
m-57 -47 c28 -15 34 -15 68 1 27 12 43 14 56 7 15 -8 10 -14 -36 -40 -52 -30
-55 -30 -84 -15 -62 32 -78 46 -64 54 18 12 25 11 60 -7z m-23 -69 c41 -25 41
-26 41 -85 0 -33 -4 -60 -8 -60 -18 0 -32 26 -32 61 0 32 -5 41 -35 59 -21 13
-35 30 -35 42 0 23 10 21 69 -17z m180 -22 l0 -58 -20 49 c-16 39 -17 51 -7
57 24 16 28 9 27 -48z m-75 -10 c-4 -16 -13 -44 -20 -63 l-13 -35 0 51 c-1 46
11 74 31 74 5 0 5 -12 2 -27z m-146 -25 c13 -13 16 -48 4 -48 -14 0 -32 23
-32 42 0 21 11 23 28 6z m182 -8 c0 -5 -5 -10 -11 -10 -5 0 -7 5 -4 10 3 6 8
10 11 10 2 0 4 -4 4 -10z m5 -40 c-3 -5 -12 -10 -18 -10 -7 0 -6 4 3 10 19 12
23 12 15 0z"/>
                                <path d="M266 138 c-8 -33 -8 -33 19 -34 29 -2 29 -3 13 31 -14 31 -24 32 -32
3z"/>
                                <path d="M330 130 c0 -23 4 -30 20 -30 11 0 20 5 20 10 0 6 -4 10 -10 10 -5 0
-10 9 -10 20 0 11 -4 20 -10 20 -5 0 -10 -13 -10 -30z"/>
                                <path d="M386 144 c-9 -22 17 -49 39 -40 10 3 15 15 13 28 -4 29 -42 37 -52
12z m34 -14 c0 -5 -4 -10 -10 -10 -5 0 -10 5 -10 10 0 6 5 10 10 10 6 0 10 -4
10 -10z"/>
                                <path d="M466 144 c-11 -29 33 -60 49 -34 7 12 -16 50 -31 50 -7 0 -15 -7 -18
-16z m34 -14 c0 -5 -4 -10 -10 -10 -5 0 -10 5 -10 10 0 6 5 10 10 10 6 0 10
-4 10 -10z"/>
                                <path d="M544 145 c-8 -21 2 -45 19 -45 8 0 20 7 27 15 10 12 10 18 0 30 -7 8
-19 15 -27 15 -7 0 -16 -7 -19 -15z m36 -15 c0 -5 -4 -10 -10 -10 -5 0 -10 5
-10 10 0 6 5 10 10 10 6 0 10 -4 10 -10z"/>
                            </g>
                        </svg>
                    </a>
                </li>
                <li> <a href="listaFilm.php">Film</a> </li>
                <li> <a href="listaPrenotazioni.php">Prenotazioni</a> </li>
                <?php
                    $utente = $_SESSION['Utente'] ?? null;
                    if($utente != null){
                        if(isResponsabile($utente)){
                            echo "<li> <a href='#'>Verifica Ticket</a> </li>";
                        }
                        if(isDirettore($utente)){
                            echo "<li> <a href='#'>Verifica Ticket</a> </li>";
                            echo "<li> <a href='gestioneFilm.php'>Gestione Film</a> </li>";
                            echo "<li> <a href='inserisciFilm.php'>Inserisci Film</a> </li>";
                        }
                        if(isAmministratore($utente)){
                            echo "<li> <a href='#'>Verifica Ticket</a> </li>";
                            echo "<li> <a href='listaUtenti.php'>Gestione Utenti</a> </li>";
                            echo "<li> <a href='gestioneFilm.php'>Gestione Film</a> </li>";
                            echo "<li> <a href='inserisciFilm.php'>Inserisci Film</a> </li>";
                            echo "<li> <a href='gestioneCinemas.php'>Gestione Cinema</a> </li>";
                        }
                        echo "<li> <a href='logout.php'>Logout</a> </li>";
                    }
                ?>
            </ul>
        </div>
        <div id="profile">
        <?php
        $utente = null;

        if (isset($_SESSION['Utente'])) {
            $utente = $_SESSION["Utente"];
            $default = "Images/blankProfile.png";

            if($utente->getImmagineProfilo() != null) $default = $utente->getImmagineProfilo();

            echo ('<div id="logoProfile">
                            <img id="c1" src="'. $default .'">
                        </div>');

        }else{
            ?>
            <a href="login.php">Login</a>
            <?php
        }
        ?>
        </div>
    </nav>
</header>

<script>
    const handlerClickHome = function (e){
        window.location.href = "homepage.php";
    }
    const handlerProfile = function (e) {
        window.location.href = "profile.php";
    }
    const handlerImmagine = function(e) {
        let obj = document.getElementById("c1");

        obj.style.width = obj.height + "px";

        document.getElementById("c1").addEventListener("click", handlerProfile);
        document.getElementById("logo").addEventListener("click", handlerClickHome);
        window.addEventListener("resize", handlerImmagine);
    }

    window.addEventListener("load", handlerImmagine);
</script>