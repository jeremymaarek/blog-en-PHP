<?php
    if ($_SESSION['admin'] == 1){
    ob_start();
    $token = bin2hex(random_bytes(32));;
    $_SESSION['token'] = $token;
?>
<section>  
    <div class="col-lg-12">
        <h4>Modifier le commentaire :</h4><br><br>
    </div>

    <form action="index.php?action=postModifComments&amp;postId=<?= $_GET['postId']?>" method="post"> 
        <div class="col-xs-6 text-right">
            <label for="pseudo">Modifier pseudo :</label>
        </div>
        <div class="col-xs-6 text-left">
            <input type="text"id="pseudo" name="pseudo"><br>
        </div>
        <div class="col-xs-6 text-right">
            <label for="content">Modifier commentaire :</label>
        </div>
        <div class="col-xs-6 text-left">
            <input type="text"id="content" name="content"><br>
        </div>
        <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
        <input type="submit" name="Modifier"><br><br>
    
    </form>
</section>


<?php
    }
    $content = ob_get_clean();
    require ('View/templat.php');
