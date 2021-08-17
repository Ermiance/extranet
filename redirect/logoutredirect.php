<?php
if($_GET['logout'] == "true")
{
    setcookie('username', null, time() + 24*3600, '/', null, false, true);
    setcookie('login', 'false', time() + 60, '/', null, false, true);
}
header('Location: ../index.php');
?>