<?php
include('config/functions.php');
if (!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['passwordconfirm']))
{
    if($_POST['password'] == $_POST['passwordconfirm'])
    {
        $user = loadUser($_POST['username']);
        if(is_null($user))
        {
            header('location: login.php');
        }
        elseif($_POST['password']!=$user['password'])
        {
            $settings = ['password'=>$_POST['password']];
            settingsUpdate($user['username'], $settings);
            setcookie('username', $_POST['username'], time() + 24*3600, null, null, false, true);
            setcookie('login', 'true', time() + 60, null, null, false, true);
            header('Location: index.php');
        }
        else
        {
            header('Location: pwreset.php?error=same');
        }
    }
    else
    {
        header('Location: pwreset.php?error=confirm');
    }
}
else
{
    header('Location: pwreset.php?error=empty');
}
?>