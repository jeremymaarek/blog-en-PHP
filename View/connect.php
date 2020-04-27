<?php
ob_start();
session_start();
$token = bin2hex(random_bytes(32));;
$_SESSION['token'] = $token;

?>


<section>
    <div class="row">
        <div class="col-lg-12 text-center">
            <h4>Se connecter</h4><br>
        </div>

        <form action="index.php?action=connectUser" method="POST">
                <div class="col-xs-6 text-right">
                    <label for="pseud">Pseudo :</label>
                </div>
                <div class="col-xs-6 text-left">
                    <input type="text"id="pseud" name="pseud"><br>
                </div>
                <div class="col-xs-6 text-right">
                    <label for="pass">Mot de passe :</label>
                </div>
                <div class="col-xs-6 text-left">
                    <input type="password"id="pass" name="pass"><br>
                </div>

                <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />

                <input type="submit" name="Me connecter" class="btn btn-lg btn-outline"><br><br>
        </form>

        <p><br><br><br>
        <h6>Si vous n'avez pas de compte, vous pouvez vous inscrire en cliquant sur le lien suivant : </h6>
        <a href="/blog/index.php?action=registration" class="btn btn-lg btn-outline">M'inscrire</a></p>
    </div>
</section>

<?php
    $content = ob_get_clean();
    require ('View/templat.php');
?>