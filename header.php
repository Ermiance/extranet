<header>
    <a href="index.php"><img id="logo" src="logo_gbaf.png" alt="Logo GBAF"></a>
        <div id="membre">
            <img id="photo_membre" src="membre.png" alt="Photo membre">
            <p>
                <?php 
                // include('functions.php');
                if (!isset($_COOKIE['username']))
                {
                    echo "<a href='login.php'>Se connecter</a></br><a href='signup.php'>Créer un profil</a>";
                }
                else
                {
                    echo "<a href='settings.php'>" . $_COOKIE['username'] . '</a></br><a href="logoutredirect.php?logout=true">Se déconnecter</a>';
                }
                ?>
            </p>
        </div>
</header>