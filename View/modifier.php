<?php
session_start();
if ($_SESSION['admin'] == 1){
ob_start();
$token = bin2hex(random_bytes(32));;
$_SESSION['token'] = $token;
?>

<section>  
    <div class="col-xs-12">
        <h1>Modifier un article :</h1>
    </div>

    <form action="index.php?action=postModifPost&amp;id=<?php echo htmlspecialchars($_GET['id']) ?>" method="POST">

    <?php
        $postId = htmlspecialchars($_GET['id']);
                
        if ($posts->rowCount() > 0)
        {
            while ($donnees = $posts->fetch())
            {
    ?>

        <div class="col-xs-12">
            <label for="author">Modifier l'autheur :</label><BR>
        </div>
        <div class="col-xs-12">
            <textarea id="author" name="author" rows="1" class="form-control" ><?= htmlspecialchars($donnees['author']) ?></textarea><BR></BR>
        </div>
        <div class="col-xs-12">
            <label for="title">Modifier le titre :</label><BR>
        </div>
        <div class="col-xs-12">
            <textarea id="title" name="title" rows="1" class="form-control"><?= htmlspecialchars($donnees['title']) ?></textarea><BR></BR>
        </div>
        <div class="col-xs-12">
            <label for="chapo">Modifier le chapô :</label><BR>
        </div>
        <div class="col-xs-12">
            <textarea id="chapo" name="chapo" rows="2" class="form-control"><?= htmlspecialchars($donnees['chapo']) ?></textarea><BR></BR>
        </div>
        <div class="col-xs-12" >
            <label for="content">Modifier le contenu :</label><BR>
        </div>
        <div class="col-xs-12">
            <textarea id="content" name="content" rows="20"  class="form-control"><?= htmlspecialchars($donnees['content']) ?></textarea><BR></BR>
        </div>
        <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />
        <input type="submit" name="Mettre à jour" class="btn btn-lg btn-outline"><br><br>

    </form>

</section>

<?php
            }
        }
}
$posts->closeCursor();
$content = ob_get_clean();
require ('View/templat.php');
?>
