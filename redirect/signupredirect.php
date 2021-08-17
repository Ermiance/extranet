<?php include('../config/functions.php');
$new_user = [];
foreach ($_POST as $setting=>$value)
{
    if(is_null($value))
    {
        header('Location: ../signup.php?empty=true');
    }
    elseif($setting == 'nom' || $setting == 'prenom')
    {
        $new_user[$setting] = ucfirst($value);
    }
    elseif($setting != 'passwordconfirm')
    {
        $new_user[$setting] = $value;
    }
}

if (loadUser($new_user["username"])) 
{
    header('Location: ../signup.php?exist=true');
} 
elseif ($new_user['password'] != $_POST['passwordconfirm'])
{
    header('Location: ../signup.php?samepw=true');
}
else 
{
    addUser($new_user);
    setcookie('username', $new_user['username'], time() + 24 * 3600, '/', null, false, true);
    setcookie('login', 'true', time() + 60, '/', null, false, true);
    header('Location: ../index.php');
}
?>