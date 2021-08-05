<?php
include('config/functions.php');
if (isset($_POST['username']))
{
    if(isset($_POST['question']))
    {
        $user = loadUser($_POST['username']);
        if(is_null($user))
        {
            header('location: login.php?login=wronguser');
        }
        else
        {
            header('location: question.php?username=' . $user['username']);
        }
    }
    else
    {
        $usercheck = userCheck($_POST['username'], $_POST['password']);
        if ($usercheck)
        {
            setcookie('username', $_POST['username'], time() + 24*3600, null, null, false, true);
            header('Location: index.php');
        }
        else
        {
            header('location: login.php?login=wrongpw');
        }
    }
}
else
{
    header('Location: login.php?login=wrongpw');
}
?>