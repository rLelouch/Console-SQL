<?php
function coBdd($data, $request)
{
    try
    {
        $host = 'mysql:host=localhost;dbname='.$data.'';
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

    $request = valid_data($request);
    $req = "" . $request . "";
    $result = $pdo->prepare($req);
    $result->execute();
    $ligne = $result->rowCount();
    $final = [$result, $ligne];

    post_txt($data, $request);

    return $final;
}

function get_database()
{
    global $pdo;
    // afficher toutes les bdd
    $request = "SHOW DATABASES";
    $result = $pdo->prepare($request);
    $result->execute();
    while ($data = $result->fetchAll(PDO::FETCH_ASSOC)) {
        for ($i = 0; $i < $result->rowCount(); $i++) {
            // compter le nombre de table par bdd
            $request_unit = "SELECT COUNT(*) AS nb_table FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = :table";
            $result_unit = $pdo->prepare($request_unit);
            $result_unit->bindParam(':table', $data[$i]['Database']);
            $result_unit->execute();

            $unit = $result_unit->fetch(PDO::FETCH_ASSOC);

            // si seule table on l'affiche dans le select
            //if ($unit['nb_table'] < 5) {
                echo "<option value='" . $data[$i]['Database'] . "'>" . $data[$i]['Database'] . "</option>";
            //}
        }
    }
}

function get_table(){
    if ($_GET) {
        global $pdo;
        $resultBdd = $_GET['table'];
        $request = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = :table";
        $result = $pdo->prepare($request);
        $result->bindParam(':table', $resultBdd);
        $result->execute();

        while ($data = $result->fetchAll(PDO::FETCH_ASSOC)) {
            for ($i = 0; $i < $result->rowCount(); $i++) {
                echo "<option value='" . $data[$i]['TABLE_NAME'] . "'>" . $data[$i]['TABLE_NAME'] . "</option>";
            }
        }
    }
}
