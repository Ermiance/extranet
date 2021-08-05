<?php
//essaie une connexion au SQL et traite l'exception
function connectBdd(){
    include('credentials.php');
    try
    {
    return $bdd = new PDO($host, 
        $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }

    catch (exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    } 
}

// charge l'utilisateur à partir du username
function loadUSer($username){
            
    $req = connectBdd()->prepare("SELECT * FROM account WHERE username = ?");

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

// met à jour un profil d'utilisateur
function updateBdd($nom, $username) {
    $ins = connectBdd()->prepare("UPDATE account SET nom = :nom WHERE username = :username");

    $ins->execute(array(
    'nom' => $nom,
    'username' => $username
    ));
}



// charge une page d'acteur
function loadActeur($acteur){
    $req = connectBdd()->prepare('SELECT * FROM acteur WHERE acteur = ?');

    $req->execute(array($acteur));

    return $donnees = $req->fetch();
}

// charge les commentaires
function loadPost($id_acteur){
    $req = connectBdd()->prepare('SELECT * FROM post WHERE id_acteur = ?');

    $req->execute(array($id_acteur));

    return $req;
}

//compte les votes
function countVote($id_acteur){
    $req = connectBdd()->prepare('SELECT COALESCE(SUM(vote), 0) AS sum_likes FROM vote WHERE id_acteur = ?');
    
    $req->execute(array($id_acteur));

    return($req->fetch());
}

//compte les commentaires
function countPost($id_acteur){
    $req = connectBdd()->prepare('SELECT COUNT(*) AS nb_com FROM post WHERE id_acteur = ?');

    $req->execute(array($id_acteur));

    return($req->fetch());
}

// charge le vote de l'utilisateur
function loadVote($id_user, $id_acteur){
    $req = connectBdd()->prepare('SELECT * FROM vote WHERE (id_user = ? AND id_acteur = ?)');

    $req->execute(array($id_user, $id_acteur));

    return $donnees = $req->fetch();
}

//crée un vote d'utilisateur
function addVote($id_user, $id_acteur, $vote){
    $ins = connectBdd()->prepare("INSERT INTO vote(id_user, id_acteur, vote)
    VALUES (:id_user, :id_acteur, :vote)");

    $ins->execute(array(
        'id_user' => $id_user, 
        'id_acteur' => $id_acteur, 
        'vote' => $vote
    ));
}

//change le vote de l'utilisateur
function updateVote($id_user, $id_acteur, $vote) {
    $ins = connectBdd()->prepare("UPDATE vote SET vote = :vote WHERE (id_user = :id_user AND id_acteur = :id_acteur)");

    $ins->execute(array(
        'id_user' => $id_user, 
        'id_acteur' => $id_acteur, 
        'vote' => $vote
    ));
} 

//retrouve un prénom d'utilisateur
function userPrenom($id_user){
            
    $req = connectBdd()->prepare("SELECT prenom FROM account WHERE id_user = ?");

    $req->execute(array($id_user));
      
    $user = $req->fetch();
 
   return $user['prenom'];
} 

//ajoute un commentaire
function addPost($id_user, $id_acteur, $post){
    $ins = connectBdd()->prepare("INSERT INTO post(id_user, id_acteur, post)
    VALUES (:id_user, :id_acteur, :post)");

    $ins->execute(array(
        'id_user' => $id_user, 
        'id_acteur' => $id_acteur, 
        'post' => $post
    ));
}

//foreach ()
    //updateBdd()
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