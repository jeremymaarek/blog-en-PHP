<?php
ob_start();
$token = bin2hex(random_bytes(32));;
$_SESSION['token'] = $token;
?>

<section>
    <?php
        $postId = htmlspecialchars($_GET['id']);
        
        if (!empty($post))
        {
            ?>
                
                <div class="news">
                    <h1><?= htmlspecialchars($req->title()) ?></h1> écrit par <?= htmlspecialchars($req->author()) ?>, mise à jour le <?= htmlspecialchars($req->created()) ?> <br><br><br>
                    <p>Introduction :<br><?= htmlspecialchars($req->chapo()) ?><br>
                    <p><?= htmlspecialchars($req->content()) ?><br>
                </div><BR></BR>

                <h4>Commentaires sur cet article</h4>
        
            <?php
                
                foreach($all_Comments as $comment){

                    if (htmlspecialchars($comment->activated()) == '1')
                    {
                    
            ?>

                <div>
                    <strong> <?= htmlspecialchars($comment->author()) ?> </strong> le <?= htmlspecialchars($comment->commentDate()) ?> 
                    <?php
                        if (htmlspecialchars(!empty($_SESSION['admin']))){
                            if ($_SESSION['admin'] == '1') {
                    ?>
                    (<a href="index.php?action=modifComments&amp;postId=<?= htmlspecialchars($comment->id()) ?>">Modifier</a>) <br><br>
                    <?php
                            }
                        }
                    ?>
                    <?= htmlspecialchars($comment->comment()) ?><br><br><br>
                </div>


            <?php
                    }
                }
            ?>
    
                <h4>Postez votre commentaire </h4>

                <?php 
                    if (!empty($_SESSION['pseudo'])){

                ?>
                        
                    <form action="index.php?action=addcomment&amp;id=<?= $postId ?>" method="post">
                        <label for="author">Pseudo :</label>
                        <input type="text"id="author" name="author" value="<?= $_SESSION['pseudo']?>"><br>

                        <label for="comment">Message :</label>
                        <input type="text"id="comment" name="comment"><br>

                        <input type="hidden" name="token" id="token" value="<?php echo $token; ?>" />

                        <input type="submit" name="envoyer"><br><br>
                    </form>

                    <?php
                    }
                    else {
                        echo "Veuillez vous connectez pour poster un commentaire";
                    ?>
                        <br><a href="/blog/index.php?action=connect" class="btn btn-lg btn-outline">Se connecter</a></p>
                    
                    <?php

                    }

        }
        else{
        ?>
            <h6>Ce billet n'existe pas</h6>
            <a href="index.php">Revenir à la page d'accueil</a>
</section>

<?php
    }
    $content = ob_get_clean();
    require ('View/templat.php');

