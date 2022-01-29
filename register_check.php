<?php

include_once 'inc/globals.php';

// var_dump($_POST);
// exit();

// Récupération des données de $_POST
foreach($_POST AS $key => $val){
    if(isset($key) && !empty($key)){
        $key = htmlspecialchars($key);
        ${$key} = htmlspecialchars($val);
    }
}

// Encryptage du mot de passe
(isset($login) && isset($password)) ? $password = hash('sha256',(hash('md5', $password).hash('sha1', strtolower($login)))) : '';

try{

    // Connexion à la BDD
    $dbh = new PDO('mysql:host='.SERVER.';dbname='.DBB.';charset=utf8', 
    USER, 
    PASS, 
    PDO_OPTIONS);

    //On vérifie si l'émail utilisé exite déjà

    $sql = "SELECT * FROM customer WHERE email = ?";

    $params = array($login);
    $mailCheck = $dbh -> prepare($sql);
    $mailCheck -> execute($params);

    if($mailCheck->rowCount() === 0){

        // Si il n'existe pas on ajoute l'utilisateur
        $sql = "INSERT INTO customer (last_name, first_name, email, address_id, store_id) 
                VALUES (?,?,?,?,?)";
        $params = array($last_name, $first_name, $login, $address, 1);

        $insertCustomer = $dbh -> prepare($sql);
        $insertCustomer -> execute($params);

        // On ajouter également l'utilisateur dans la table user
        $sql = "INSERT INTO user (user_id, password, role) 
                VALUES (
                    (SELECT customer_id FROM customer WHERE email = ?),
                    ?,
                    ?);";
        $params = array($login, $password, 1);
        $insertUser = $dbh -> prepare($sql);
        $insertUser -> execute($params);

        unset($dbh);
        header('location: index.php?code=5');

    }else{
        header('location: register.php?code=1');
    }
    
}catch(PDOException $e){
    // Si erreur on redirige l'utilisateur vers la page login.php avec le code erreur 2 (erreur inconnue)
    // header('location: register.php?code=3');

    echo '<p class="alert alert-danger"> Échec de la connexion : ' . $e->getMessage().'</p>';
}