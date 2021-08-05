<?php include('config/header.php'); ?>
    <section>
        <form method="post" action="signupredirect.php">
            <p>
                Nom : <input type="text" name="nom" /><br>
                Prénom : <input type="text" name="prenom" /><br>
                Pseudonyme d'utilisateur : <input type="text" name="username" /><br>
                Mot de passe : <input type="password" name="password" /><br>
                Question de sécurité : <input type="text" name="question" /><br>
                Réponse : <input type="text" name="reponse" /><br>
                <input type="submit" value="Valider" />
            </p>
        </form>
    </section>
    <?php include('config/footer.php'); ?>
</body>
</html>