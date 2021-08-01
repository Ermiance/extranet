<?php
//essaie une connexion au SQL et traite l'exception
function connectBdd(){
    try
    {
    return $bdd = new PDO('mysql:host=localhost;dbname=gbaf;charset=utf8', 
        'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    catch (exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    } 
}

// vérifie l'existence du username
function userExist($username){
            
    $req = connectBdd()->prepare("SELECT username FROM account WHERE username = ?");

    $req->execute(array($username));
      
    $user = $req->fetch();
 
   return $user;
}

// ajoute un utilisateur à partir du formulaire
function addUser($nom, $prenom, $username, $password, $question, $reponse){

    $ins = connectBdd()->prepare("INSERT INTO account(nom, prenom, username, password, question, reponse)
    VALUES (:nom, :prenom, :username, :password, :question, :reponse)");

    $ins->execute(array(
        'nom' => $nom, 
        'prenom' => $prenom, 
        'username' => $username, 
        'password' => $password, 
        'question' => $question, 
        'reponse' => $reponse
    ));
}

// vérifie le username et le password
function userCheck($username, $password){
            
    $req = connectBdd()->prepare("SELECT username FROM account WHERE (username = ? AND password = ?)");

    $req->execute(array($username, $password));
      
    $user = $req->fetch();
 
   return $user;
}

// change les paramètres personnels
function settingsUpdate($nom, $prenom, $username, $password, $question, $reponse){
    if(!empty($nom))
    {
        $ins = connectBdd()->prepare("UPDATE account SET nom = :nom WHERE username = :username");

    $ins->execute(array(
        'nom' => $nom,
        'username' => $username
    ));
    }
    if(!empty($prenom))
    {
        $ins = connectBdd()->prepare("UPDATE account SET prenom = :prenom WHERE username = :username");

    $ins->execute(array(
        'prenom' => $prenom,
        'username' => $username
    ));
    }
    if(!empty($password))
    {
        $ins = connectBdd()->prepare("UPDATE account SET password = :password WHERE username = :username");

    $ins->execute(array(
        'password' => $password,
        'username' => $username
    ));
    }
    if(!empty($question))
    {
        $ins = connectBdd()->prepare("UPDATE account SET question = :question WHERE username = :username");

    $ins->execute(array(
        'question' => $question,
        'username' => $username
    ));
    }
    if(!empty($reponse))
    {
        $ins = connectBdd()->prepare("UPDATE account SET reponse = :reponse WHERE username = :username");

    $ins->execute(array(
        'reponse' => $reponse,
        'username' => $username
    ));
    }
    
}

?>