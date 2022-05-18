<header>
    <nav>
        <div id="list">
            <ul>
                <li id="logo">
                    <img src="Images/logo.png">
                </li>
                <li><a href="login.php">Tua</a></li>
                <li><a href="registrazione.php">Mamma</a></li>
                <li><a href="#">Ciao</a></li>
                <li><a href="#">Come</a></li>
                <li><a href="#">va</a></li>
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
        window.location.href = "";
    }

    document.getElementById("c1").addEventListener("click", handlerProfile);
    document.getElementById("logo").addEventListener("click", handlerClickHome)
</script>