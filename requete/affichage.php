<?php
include 'inc/header.inc.php';

if ($_POST && !empty($_POST['request']))
{
    include 'inc/functions.inc.php';
    include 'model/post_table.php';
    include 'model/get_table.php';

    $request = $_POST['request'];
    $bdd = $_POST['bdd'];

    $database = coBdd($bdd, $request);

    include 'controller/action_form.php';
}
else
{
    header('location: http://wf3/eprojet/eval/requete/page/error404.php');
}

include 'inc/footer.inc.php';