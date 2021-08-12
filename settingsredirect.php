<?php
include('config/header.php');
if(isset($_POST))
{
    $settings = ['nom', 'prenom', 'password', 'question', 'reponse'];
    $values = [];
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
            }
            else
            {
                $values[$setting] = $_POST[$setting];
            }
        }
    }
}
    var_dump($values);
    settingsUpdate($user['username'], $values);
    header('Location: settings.php?update=true');
?>