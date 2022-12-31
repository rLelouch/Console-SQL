<?php

switch (strtolower(explode(" ", $request)[0]))
{
    case 'select';
        $msg = "<div class='alert alert-success' role='alert'>
            Voici les résultats de votre requête.
        </div>";
        include 'page/get_requete.php';
        break;

    case 'update';
        $msg = "<div class='alert alert-success' role='alert'>
            L'action : ".strtoupper(explode(" ", $request)[0])." a bien été effectuée
        </div>";
        if (selected()) {
            $_POST['bdd'] = strtolower(explode(" ", $request)[1]);
            $_POST['request'] = "SELECT * FROM " . $_POST['bdd'] . "";
            $database = coBdd($bdd, $_POST['request']);

            include 'page/get_requete.php';
            break;
        } else{
            header('location: http://wf3/eprojet/eval/requete');
        }

    case 'insert';
        $msg = "<div class='alert alert-success' role='alert'>
            L'action : ".ucfirst(explode(" ", $request)[0])." a bien été effectuée
        </div>";
        
        if (selected()) {
            $_POST['bdd'] = strtolower(explode(" ", $request)[2]);
            $_POST['request'] = "SELECT * FROM ".$_POST['bdd']."";
            $database = coBdd($bdd, $_POST['request']);

            include 'page/get_requete.php';
            break;
        } else{
            header('location: http://wf3/eprojet/eval/requete');
        }

    case 'delete';
        $msg = "<div class='alert alert-success' role='alert'>
            L'action : ".strtoupper(explode(" ", $request)[0])." a bien été effectuée
        </div>";
        
        if (selected()) {
            $_POST['bdd'] = strtolower(explode(" ", $request)[2]);
            $_POST['request'] = "SELECT * FROM ".$_POST['bdd']."";
            $database = coBdd($bdd, $_POST['request']);

            include 'page/get_requete.php';
            break;
        } else{
            header('location: http://wf3/eprojet/eval/requete');
        }

    default:
        $msg = "<div class='alert alert-success' role='alert'>
            L'action : ".strtoupper(explode(" ", $request)[0])." a bien été effectuée
        </div>";
        header('location: http://wf3/eprojet/eval/requete');
}