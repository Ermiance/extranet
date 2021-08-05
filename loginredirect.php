<?php
include('config/functions.php');
if (isset($_POST['username']))
{
    $usercheck = userCheck($_POST['username'], $_POST['password']);
    if (isset($usercheck))
    {
        setcookie('username', $_POST['username'], time() + 24*3600, null, null, false, true);
    }
}
header('Location: index.php');
?>