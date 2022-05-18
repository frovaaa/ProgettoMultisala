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
            <div id="menuProfileWrapper">
                <div id="logoProfile">
                    <img src="">
                </div>
                <div id="listProfile">

                </div>
            </div>

        </div>
    </nav>
</header>

<script>
    const handlerClickHome = function (e){
        window.location.href = "homepage.php";
    }

    document.getElementById("logo").addEventListener("click", handlerClickHome)
</script>