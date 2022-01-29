<?php

if($_SERVER['HTTP_HOST'] === 'localhost' || $_SERVER['HTTP_HOST'] === '127.0.0.1'){

    // identifiants serveur local
    DEFINE('HOST', 'localhost');
    DEFINE('DBNAME', 'colombes');
    DEFINE('USER', 'root');
    DEFINE('PASS', '');

    // activer les erreurs en local
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Options pour PDO
    DEFINE('OPTIONS', array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ));

}else{
    
    // identifiants serveur distant
    DEFINE('HOST', '');
    DEFINE('DBNAME', '');
    DEFINE('USER', '');
    DEFINE('PASS', '');

    // Options pour PDO en serveur distant
    DEFINE('OPTIONS', array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ));

}