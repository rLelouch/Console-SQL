<?php
try
{
    $host = 'mysql:host=localhost';
    $login = 'root';
    $password = '';
    $options = array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING, // pour la gestion des erreurs (pour voir les erreurs mysql)
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // pour forcer l'utf-8 
    );
    $pdo = new PDO($host, $login, $password, $options);
}
catch (PDOException $e)
{
    echo 'Erreur: ' . $e->getMessage();
}

// Variable permettant d'afficher des messages utilisateur (vide par défaut)
$msg = '';