
<?php 
include('config/header.php'); 

if(isset($_GET['acteur']) && isset($_COOKIE['username']))
{
    try
    {
        $acteur = loadActeur(urldecode($_GET['acteur']));
    }

    catch (exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    } 
    ?>
    <section id='presentation'>
        <div class='separateur'></div>
        <img id='illu_acteur' src="<?= $acteur['logo'] ?>" alt="Logo de l'acteur">
        <h2><?=$acteur['acteur']?></h2>
        <p id='description_acteur'><?=$acteur['description']?></p>
    </section>
    <section id='commentaires'>
        <div id='header_coms'>
            <div id="compteur_com">
                <p><?=$nb_com = countPost($acteur['id_acteur'])['nb_com'];?>
                <span id="hidden_com"> com.</span>
                <span id="hidden_com2"> commentaires</span></p>
            </div>
            <details id='nouveau_com'>
                <summary><p id='button_com'>Nouveau<br>commentaire</p></summary>
                <form method='post' action='acteurredirect.php'>
                    <textarea name='post' placeholder='Votre commentaire'></textarea>
                    <input type="hidden" name='id_user' value='<?=$id_user?>'>
                    <input type="hidden" name='id_acteur' value='<?=$acteur['id_acteur']?>'>
                    <input type="hidden" name='acteur' value="<?=urlencode($acteur['acteur'])?>">
                    <input type="submit" value='Envoyer'>
                </form>
            </details>
            <div id="votes">
                <?php 
                $id_user = loadUser($_COOKIE['username'])['id_user'];
                $user_vote = loadVote($id_user, $acteur['id_acteur']);
                ?>
                <a href="likeredirect.php?acteur=<?= urlencode($acteur['acteur']) ?>&vote=like&cancel=<?=$user_vote['like']?>&create=<?=$user_vote['create']?>#commentaires">
                <img src="img/like<?=str_repeat('validated', $user_vote['like'])?>.png" alt="Like" width=30></a>
                <p id="compteur_votes"><strong><?=countVote($acteur['id_acteur'])['sum_likes']?>&nbsp;</strong></p>
                <a href="likeredirect.php?acteur=<?= urlencode($acteur['acteur']) ?>&vote=dislike&cancel=<?=$user_vote['dislike']?>&create=<?=$user_vote['create']?>#commentaires">
                <img src="img/dislike<?=str_repeat('validated', $user_vote['dislike'])?>.png" alt="Dislike" width=30></a>
            </div>
        </div>
        
        <div id='liste_commentaires'>
        <?php 
        if(isset($_GET['start']))
        {
            $start = intval($_GET['start']);
        }
        else
        {
            $start = 0;
        }
        $commentaires = loadPost($acteur['id_acteur'], $start);
        while($com = $commentaires->fetch()){
            ?>
            <div class='commentaire'>
                <div class='header_com'><h4 class='prenom'><?=userPrenom($com['id_user'])?></h4>
                <p class='date'><?=date_format(date_create($com['date_add']), 'd/m/Y')?></p></div>
                <p><?=$com['post']?></p>
            </div>
        <?php
        }
        ?>
        </div>
        <div id='pagin_com'>
            <p>
            <?php
            $page = 0;
            if($nb_com > 5)
            {
                while($page < ($nb_com/5))
                {
                    if($page*5 != $start)
                    {
                        ?>
                        <a href="acteur.php?acteur=<?=urlencode($acteur['acteur'])?>&start=<?=$page*5?>#liste_commentaires">
                        <?=$page+1?></a>
                        <?php
                        echo ' - ';
                    }
                    else
                    {
                        echo $page +1 . ' - ';
                    }
                    $page += 1;
                }
                if($start+5 < $page*5)
                {
                    ?>
                    <a href="acteur.php?acteur=<?=urlencode($acteur['acteur'])?>&start=<?=$start+5?>#liste_commentaires">
                    Commentaires suivants</a>
                    <?php
                }
            }
            ?>
        </div>
    </section>
    <?php
}
else
{
    header('Location: index.php');
}
?>
<?php include('config/footer.php'); ?>
</body>
</html>