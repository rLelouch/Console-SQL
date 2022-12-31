    <div class='container-fluid'>
        <?php
            if($_POST){
                echo $msg;
            }
        ?>
    </div>
    <div class='container'>
        <p>
            Bdd : <?php echo $bdd; ?>
        </p>
        <p>
            Requete : <?php echo $request; ?>
        </p>
        <p>
            Lignes concernées : <?php echo $database[1]; ?>
        </p>
        <div>
            <?php
                $result = $database[0];
                post_table($result);
            ?>
        </div>
        <div class='d-flex justify-content-center align-items-center mt-3'>
            <a href='http://wf3/eprojet/eval/requete?table=<?php echo $bdd; ?>' class='btn btn-outline-danger'>Retour</a>
        </div>
    </div>