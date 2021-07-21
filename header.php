<header>
    <img id="logo" src="logo_gbaf.png" alt="Logo GBAF">
    <div id="membre">
        <img id="photo_membre" src="membre.png" alt="Photo membre">
        <p>
            <?php 
            if (is_null($_COOKIE['pseudo']))
            {
                echo "<a href='login.php'>Se connecter</a>"
            }
            else
            {
                echo $_COOKIE['pseudo']
            }
            ?>
        </p>
    </div>
</header>