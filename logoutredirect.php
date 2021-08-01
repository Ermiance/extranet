<?php
if($_GET['logout'] == "true")
{
    setcookie('username', null, time() + 24*3600, null, null, false, true);
}
header('Location: index.php');
?>