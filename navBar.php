<header>
    <nav>
        <div id="list">
            <ul>
                <li id="logo">
                    <img src="Images/logo.png">
                </li>
                <li><a href="login.php">Login</a></li>
                <li><a href="registrazione.php">Registrati</a></li>
                <li><a href="#">Ciao</a></li>
                <li><a href="#">Come</a></li>
                <li><a href="#">va</a></li>
            </ul>
        </div>
    </nav>
</header>

<script>
    const handlerClickHome = function (e){
        window.location.href = "homepage.php";
    }

    document.getElementById("logo").addEventListener("click", handlerClickHome)
</script>