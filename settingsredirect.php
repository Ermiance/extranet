<?php
include('config/functions.php');
settingsUpdate($_POST['nom'], $_POST['prenom'], $_POST['username'], $_POST['password'], $_POST['question'], $_POST['reponse']);
setcookie('username', null, time() + 24*3600, null, null, false, true);
header('Location: index.php');
?>