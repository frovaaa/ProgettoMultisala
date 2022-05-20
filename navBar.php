<header>
    <nav>
        <div id="list">
            <ul>
                <li id="logo">
                    <img src="Images/logo.png">
                </li>
                <li><a href="login.php">Login</a></li>
                <li><a href="registrazione.php">Registrazione</a></li>
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
        window.location.href = "profile.php";
    }
    const handlerImmagine = function(e) {
        let obj = document.getElementById("c1");

        obj.style.width = obj.height + "px";
    }

    document.getElementById("c1").addEventListener("click", handlerProfile);
    document.getElementById("logo").addEventListener("click", handlerClickHome);
    window.addEventListener("resize", handlerImmagine);
    window.addEventListener("load", handlerImmagine);
</script>