<?php
ob_start();
session_start();
?>


<section>
    <?php
        $postId = $_GET['id'];
                
        if ($posts->rowCount() > 0)
        {
            while ($donnees = $posts->fetch())
            {
            ?>
                
                <div class="news">
                    <h1><?php echo htmlspecialchars($donnees['title']) ?> <br><br><br></h1>
                    <p><?php echo htmlspecialchars($donnees['content']) ?><br>
                    Mis à jour le <?php echo htmlspecialchars($donnees['fr_date']) ?></p>
                </div><BR></BR>

                <h4>Commentaires sur cet article</h4>
        
            <?php
                    }
                    $posts->closeCursor();
                
                while ($donnees = $comments->fetch())
                {
                    
            ?>

                <div>
                    <strong> <?php echo htmlspecialchars($donnees['author']) ?> </strong> le <?php echo htmlspecialchars($donnees['fr_date_comment']) ?> (<a href="index.php?action=modifComments&amp;postId=<?= htmlspecialchars($donnees['id'])?>">Modifier</a>) <br><br>
                    <?php echo htmlspecialchars($donnees['comment']) ?><br><br><br>
                </div>


            <?php
                }
                $comments->closeCursor();
            ?>
    
                <h4>Postez votre commentaire</h4>

                
                        
                    <form action="index.php?action=addcomment&amp;id=<?= $postId ?>" method="post">
                        <label for="author">Pseudo :</label>
                        <input type="text"id="author" name="author" value="<?php $pseudo?>"><br>

                        <label for="comment">Message :</label>
                        <input type="text"id="comment" name="comment"><br>

                        <input type="submit" name="envoyer"><br><br>
                    </form>

                    <?php
        }
        else{
        ?>
            <h6>Ce billet n'existe pas</h6>
            <a href="index.php">Revenir à la page d'accueil</a>

        <?php
        }
        $content = ob_get_clean();
        require ('View/templat.php');
        ?>
</section>


