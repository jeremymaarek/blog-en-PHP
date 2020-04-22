<?php
    session_start();
    ob_start();
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
        <input type="submit" name="Modifier"><br><br>
    
    </form>
</section>


<?php
    $content = ob_get_clean();
    require ('View/templat.php')
?>


