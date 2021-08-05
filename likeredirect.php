<?php
include('config/functions.php');
if(isset($_GET['acteur']) && isset($_COOKIE['username']))
{
    try
    {
        $id_user = loadUSer($_COOKIE['username'])['id_user'];
        $id_acteur = loadActeur(urldecode($_GET['acteur']))['id_acteur'];
    }

    catch (exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    } 
    if($_GET['action'] == 'create'){
        if($_GET['vote'] == 'like'){
            addVote($id_user, $id_acteur, 1);
        }
        elseif($_GET['vote'] == 'dislike'){
            addVote($id_user, $id_acteur, -1);
        }
    }
    else{
        if($_GET['vote'] == 'like'){
            updateVote($id_user, $id_acteur, 1);
        }
        elseif($_GET['vote'] == 'unlike'){
            updateVote($id_user, $id_acteur, 0);
        }
        elseif($_GET['vote'] == 'dislike'){
            updateVote($id_user, $id_acteur, -1);
        }
        elseif($_GET['vote'] == 'undislike'){
            updateVote($id_user, $id_acteur, 0);
        }
    }
}
header('Location: acteur.php?acteur=' . urlencode(urldecode($_GET['acteur'])));
?>