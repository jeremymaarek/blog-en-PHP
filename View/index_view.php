<?php
ob_start();
session_start();
?>

<section>
    <div class="row">
        <div class="col-lg-12">
            <H1>Derniers articles :</H1><BR>
        </div>
    </div>
    <?php
        while ($donnees = $all_posts->fetch())
        {
    ?>
    <div class="row">
        <div class="news">
            <h5><?php echo htmlspecialchars($donnees['title']) ?> <br></h5>
            <p><?php echo htmlspecialchars($donnees['chapo']) ?><br><br>
            Mise à jour le <?php echo htmlspecialchars($donnees['fr_date']) ?><br><br>
            <a href="index.php?action=post&amp;id=<?php echo htmlspecialchars($donnees['id']) ?>" class="btn-block btn-lg btn-outline">Lire la suite</a>
            <?php 
                if (!empty(htmlspecialchars($_SESSION['admin']))){
                    if (htmlspecialchars($_SESSION['admin']) == '1') {
            ?>
            <a href="index.php?action=delete&amp;id=<?php echo htmlspecialchars($donnees['id']) ?>" class="btn-block btn-lg btn-outline">Supprimer</a>
            <a href="index.php?action=modifPost&amp;id=<?php echo htmlspecialchars($donnees['id']) ?>" class="btn-block btn-lg btn-outline">Modifier</a><br>
            <?php
                }
            }
            ?>
        </div>
    </div>
</section>

<?php
        }
    $all_posts->closeCursor();
    $content = ob_get_clean();
    require ('View/templat.php');
?>
