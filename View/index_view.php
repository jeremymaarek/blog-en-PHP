<?php
ob_start();
?>

    <div class="row">
        <div class="col-lg-12">
            <BR></BR><H1>Derniers articles :</H1><BR>
        </div>
    </div>

    <div class="row">
        <div class="news">
            <?php  
            foreach($all_posts as $post){
            ?>

            <h5><?= htmlspecialchars($post->title()) ?> <br></h5>
            <p><?= htmlspecialchars($post->chapo()) ?><br><br>
            Mise à jour le <?= htmlspecialchars($post->created()) ?><br><br>
            <a href="index.php?action=post&amp;id=<?= htmlspecialchars($post->id()) ?>" class="btn-block btn-lg btn-outline">Lire la suite</a>
            <?php 
                if (htmlspecialchars(!empty($_SESSION['admin']))){
                    if (htmlspecialchars($_SESSION['admin']) == '1') {
            ?>
            <a href="index.php?action=delete&amp;id=<?=  htmlspecialchars($post->id()) ?>" class="btn-block btn-lg btn-outline">Supprimer</a>
            <a href="index.php?action=modifPost&amp;id=<?= htmlspecialchars($post->id()) ?>" class="btn-block btn-lg btn-outline">Modifier</a><br>
            <?php
                        }
                }
            }
            ?>
        </div>
    </div>

<?php
    $content = ob_get_clean();
    require ('View/templat.php');
