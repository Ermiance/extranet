<?php
include('config/functions.php');
if(isset($_POST['id_acteur']) && isset($_COOKIE['username']))
{
    try
    {
        $id_user = loadUSer($_COOKIE['username'])['id_user'];
    }
    catch (exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
    addPost($id_user, $_POST['id_acteur'], $_POST['post']);
    header('location: acteur.php?acteur='. $_POST['acteur']);
}
else
{
    header('location: index.php');
}
?>