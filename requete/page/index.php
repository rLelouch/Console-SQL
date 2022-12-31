    <div class='container-fluid'>
    <?php
        if($_POST){
            echo $msg;
            if(isset($_POST['suppTxt'])) {
                file_put_contents('historique.txt', '');
            }
        }
    ?>
    </div>
    
    <div class='container h-100 pt-5' id="container">
        <div class='row pt-5'>
            <form method='post' action="affichage.php" class='pt-5' novalidate>
                <div class='mb-3'>
                    <label for='bdd'>Bdd : </label>
                    <select name='bdd' id='bdd'>
                        <?php get_database(); ?>
                    </select>
                    <label for='table'>Table : </label>
                    <select name='table' id='table'>
                        <?php get_table(); ?>
                    </select>
                </div>
                <div class='form-floating'>
                    <textarea class='form-control' name='request' id='request' style='height: 100px'></textarea>
                    <label for='request'>Requete</label>
                </div>
                <div class='d-flex justify-content-center mt-3'>
                    <button type='submit' class='btn btn-outline-danger ok'>OK</button>
                </div>
            </form>
        </div>
        <div class='row position-relative mt-5'>
            <form method="POST" novalidate>
                <fieldset class="position-absolute border px-3 pb-3 w-100">
                    <legend class="float-none w-auto p-2">Mon Historique</legend>
                    <div class=" justify-content-center mb-3 text-break txt_file">
                        <?php echo file_get_contents('historique.txt'); ?>
                    </div>
                    <input class="btn btn-outline-danger" type="submit" value="supprimer l'historique" name="suppTxt" id="suppTxt">
                </fieldset>
            </form>
        </div>
    </div>