<?php
function post_table($result){
    echo "<table class='table table-striped'>";
    while ($data = $result->fetch(PDO::FETCH_ASSOC)) {
        $embody = [];
        foreach ($data as $key => $value) {
            $embody[] = $value;
        }
        $line[] = $embody;
    }

    if ($result->rowCount() > 0)
    {
        echo "<table class='table table-striped'>
            <thead>
                <tr>";
        for ($i = 0; $i < $result->columnCount(); $i++) {
            $column = $result->getColumnMeta($i);
            echo "<th scope='col'>" . $column['name'] . "</th>";
        }
        echo "</tr>
            </thead>
            <tbody>";
        for ($j = 0; $j < count($line); $j++) {
            echo "<tr>";
            for ($i = 0; $i < $result->columnCount(); $i++) {
                echo "<td>" . $line[$j][$i] . "</td>";
            }
            echo "</tr>";
        }
        echo "</tbody>
        </table>";
    }
}

function post_txt($bdd, $txt){
    if(filesize('historique.txt') == 0){
        //On écrit un premier texte dans notre fichier  
        file_put_contents('historique.txt', '');
    }

    
    date_default_timezone_set('Europe/Paris'); 
    $curdate = date("d M Y à H:i:s");

    //On récupère le contenu du fichier
    $texte = file_get_contents('historique.txt');
    
    //On ajoute notre nouveau texte à l'ancien
    $texte .= "\n- " . $curdate." | <span>base = <span>" . $bdd . "</span> ; requete = <span class='text_txt'>" . $txt . "</span></span><br>";
    
    //On écrit tout le texte dans notre fichier
    file_put_contents('historique.txt', $texte);
}