<?php
include('../config/functions.php');
var_dump($_POST);
if($_POST['password'] != $_POST['passwordconfirm'])
{
    header('Location: ../settings.php?samepw=true');
}
else
{
    $user = loadUSer($_POST['username']);
    $settings = ['nom', 'prenom', 'password', 'question', 'reponse'];
    $values = [];
    $update=false;
    foreach($settings as $setting)
    {
        if(empty($_POST[$setting]))
        {
            $values[$setting] = NULL;
        }
        else
        {
            if($setting == 'nom' || $setting == 'prenom')
            {
                $values[$setting] = ucfirst($_POST[$setting]);
                $update=true;
            }
            else
            {
                $values[$setting] = $_POST[$setting];
                $update=true;
            }
        }
    }
    if($update)
    {
        settingsUpdate($user['username'], $values);
        header('Location: ../settings.php?update=true');
    }
    else
    {
        header('Location: ../settings.php');
    }
}
?>