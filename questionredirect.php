<?php
include('config/functions.php');
if (isset($_POST['username']))
{
    if(isset($_POST['response']))
    {
        $user = loadUser($_POST['username']);
        if(is_null($user))
        {
            header('location: question.php?response=wrong&username=' . $_POST['username']);
        }
        elseif($_POST['response']==$user['reponse'])
        {
            setcookie('username', $_POST['username'], time() + 24*3600, null, null, false, true);
            header('Location: index.php');
        }
        else
        {
            header('Location: question.php?response=wrong&username=' . $_POST['username']);
        }
    }
    else
    {
        header('Location: question.php?response=wrong&username=' . $_POST['username']);
    }
}
else
{
    //header('Location: login.php');
}
?>