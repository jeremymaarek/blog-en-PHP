<?php
ob_start();
?>

<section>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2>S'inscrire</h2><br><br>
        </div>
        <?php
            if (!empty($_GET['id'])) 
            {
                if ($_GET['id'] == 1){
                    echo 'Désolé, cet identifiant est déjà utilisé par un membre. Veuillez en choisir un autre';
                }
                if ($_GET['id'] == 2){
                    echo 'Attention, les deux mots de passe sont différents. Merci de vérifier votre saisie.';
                }
            }
        ?>
        <form action="index.php?action=inscription_post" method="POST">
            <div class="col-xs-6 text-right">
                <label for="email">Email :</label>
            </div>
            <div class="col-xs-6 text-left">
                <input type="email"id="email" name="email"><br>
            </div>
            <div class="col-xs-6 text-right">
                <label for="pseud">Pseudo :</label>
            </div>
            <div class="col-xs-6 text-left">
                <input type="text"id="pseud" name="pseud"><br>
            </div>
            <div class="col-xs-6 text-right">
                <label for="prenom">Ton prenom :</label>
            </div>
            <div class="col-xs-6 text-left">
                <input type="text"id="prenom" name="prenom"><br>
            </div>
            <div class="col-xs-6 text-right">
                <label for="pass2">Mot de passe :</label>
            </div>
            <div class="col-xs-6 text-left">
                <input type="password"id="pass2" name="pass2"><br>
            </div>
            <div class="col-xs-6 text-right">
                <label for="pass">Confirmez votre mot de passe :</label>
            </div>
            <div class="col-xs-6 text-left">
                <input type="password"id="pass" name="pass"><br>
            </div>
                <input type="submit" name="envoyer" class="btn btn-lg btn-outline"><br><br>
        </form>
    </div>
</section>

<?php
    $content = ob_get_clean();
    require ('View/templat.php');
?>