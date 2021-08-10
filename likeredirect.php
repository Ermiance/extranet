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
    if($_GET['create'] == '1')
    {
        if($_GET['vote'] == 'like')
        {
            addVote($id_user, $id_acteur, 1);
        }
        elseif($_GET['vote'] == 'dislike')
        {
            addVote($id_user, $id_acteur, -1);
        }
    }
    else
    {
        if($_GET['vote'] == 'like')
        {
            $user_vote = 1;
        }
        elseif($_GET['vote'] == 'dislike')
        {
            $user_vote = -1;
        }
        $user_vote *= (1-$_GET['cancel']);
        updateVote($id_user, $id_acteur, $user_vote);
    }
}
header('Location: acteur.php?acteur=' . urlencode(urldecode($_GET['acteur'])));
?>