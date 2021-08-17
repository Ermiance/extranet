<?php
//essaie une connexion au SQL et traite l'exception
function connectBdd(){
    include('credentials.php');
    try
    {
    return $bdd = new PDO('mysql:host='.$cred["host"].';dbname='.$cred["dbname"].';charset=utf8', 
        $cred['user'], $cred['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }

    catch (exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    } 
}

// charge l'utilisateur à partir du username
function loadUSer($username){
            
    $req = connectBdd()->prepare("SELECT * FROM account WHERE username = ?");

    $req->execute([$username]);
      
    $user = $req->fetch();
 
   return $user;
}

// ajoute un utilisateur à partir du formulaire
function addUser($settings)
{
    $ins = connectBdd()->prepare("INSERT INTO account(nom, prenom, username, password, question, reponse)
    VALUES (:nom, :prenom, :username, :password, :question, :reponse)");

    $ins->execute([
        'nom' => $settings['nom'], 
        'prenom' => $settings['prenom'], 
        'username' => $settings['username'], 
        'password' => $settings['password'], 
        'question' => $settings['question'], 
        'reponse' => $settings['reponse']
    ]);
}

// vérifie le username et le password
function userCheck($username, $password){
            
    $req = connectBdd()->prepare("SELECT username FROM account WHERE (username = ? AND password = ?)");

    $req->execute([$username, $password]);
      
    $user = $req->fetch();
 
   return $user;
}

// met à jour un profil d'utilisateur
function updateBdd($nom, $username) {
    $ins = connectBdd()->prepare("UPDATE account SET nom = :nom WHERE username = :username");

    $ins->execute([
    'nom' => $nom,
    'username' => $username
    ]);
}



// charge une page d'acteur
function loadActeur($acteur){
    $req = connectBdd()->prepare('SELECT * FROM acteur WHERE acteur = ?');

    $req->execute([$acteur]);

    return $req->fetch();
}

// charge les commentaires
function loadPost($id_acteur, $start){
    if(is_int($start))
    {
        $req = connectBdd()->prepare('SELECT * FROM post WHERE id_acteur = ? ORDER BY date_add DESC LIMIT ' . $start . ', 5');

        $req->execute([$id_acteur]);
        
        return $req;
    }
}

//compte les votes
function countVote($id_acteur){
    $req = connectBdd()->prepare('SELECT COALESCE(SUM(vote), 0) AS sum_likes FROM vote WHERE id_acteur = ?');
    
    $req->execute([$id_acteur]);

    return($req->fetch());
}

//compte les commentaires
function countPost($id_acteur){
    $req = connectBdd()->prepare('SELECT COUNT(*) AS nb_com FROM post WHERE id_acteur = ?');

    $req->execute([$id_acteur]);

    return($req->fetch());
}

// charge le vote de l'utilisateur
function loadVote($id_user, $id_acteur){
    $req = connectBdd()->prepare('SELECT * FROM vote WHERE (id_user = ? AND id_acteur = ?)');

    $req->execute([$id_user, $id_acteur]);

    $vote = $req->fetch();

    $result = [
        'create' => 1,
        'like' => 0,
        'dislike' => 0,
    ];

    if($vote != false)
    {
        $result['create'] = 0;
        if($vote['vote'] == 1)
        {
            $result['like'] = 1;
        }
        elseif($vote['vote'] == -1)
        {
            $result['dislike'] = 1;
        }
    }

    return $result;
}

//crée un vote d'utilisateur
function addVote($id_user, $id_acteur, $vote){
    $ins = connectBdd()->prepare("INSERT INTO vote(id_user, id_acteur, vote)
    VALUES (:id_user, :id_acteur, :vote)");

    $ins->execute([
        'id_user' => $id_user, 
        'id_acteur' => $id_acteur, 
        'vote' => $vote
    ]);
}

//change le vote de l'utilisateur
function updateVote($id_user, $id_acteur, $vote) {
    $ins = connectBdd()->prepare("UPDATE vote SET vote = :vote WHERE (id_user = :id_user AND id_acteur = :id_acteur)");

    $ins->execute([
        'id_user' => $id_user, 
        'id_acteur' => $id_acteur, 
        'vote' => $vote
    ]);
} 

//retrouve un prénom d'utilisateur
function userPrenom($id_user){
            
    $req = connectBdd()->prepare("SELECT prenom FROM account WHERE id_user = ?");

    $req->execute([$id_user]);
      
    $user = $req->fetch();
 
   return $user['prenom'];
} 

//ajoute un commentaire
function addPost($id_user, $id_acteur, $post){
    $ins = connectBdd()->prepare("INSERT INTO post(id_user, id_acteur, post)
    VALUES (:id_user, :id_acteur, :post)");

    $ins->execute([
        'id_user' => $id_user, 
        'id_acteur' => $id_acteur, 
        'post' => $post
    ]);
}


// change les paramètres personnels
function settingsUpdate($username, $settings)
{
    foreach ($settings as $setting=>$value)
    {
        if(is_null($value))
        {
            continue;
        }
        $ins = connectBdd()->prepare("UPDATE account SET " . $setting . " = :value WHERE username = :username");

        $ins->execute([
        'value' => $value,
        'username' => $username
        ]);
    }
}

?>