<?php
    ob_start();
    if ($_SESSION['admin'] == 1){
?>

<section>
    <div class="col-lg-12">
        <H1>Administration des commentaires :</h1><br><br>
    </div>
    </div>
    <div class="container">
        <table class="table">
            <tr>
                <div class="col-md-1">
                    <th>id</th>
                </div>
                <div class="col-md-2">
                    <th>post_id</th>
                </div>    
                <div class="col-md-3">
                    <th>author</th>
                </div>
                <div class="col-md-2">
                    <th>comment</th>
                </div>  
                <div class="col-md-1">
                    <th>comment_date</th>
                </div> 
                <div class="col-md-1">
                    <th>activé</th>
                </div>
            
            </tr>
            <?php
                foreach($all_Comments as $comment){
            ?>
                <tr >
                    <div class="col-md-1">
                        <td><?= htmlspecialchars($comment->id()) ?></td>
                    </div>
                    <div class="col-md-2">
                        <td><?= htmlspecialchars($comment->postId()) ?></td>
                    </div>
                    <div class="col-md-3">
                        <td><?= htmlspecialchars($comment->author()) ?></td>  
                    </div>
                    <div class="col-md-2">
                        <td><?= htmlspecialchars($comment->comment()) ?></td>
                    </div>
                    <div class="col-md-1">
                        <td><?= htmlspecialchars($comment->commentDate()) ?></td>
                    </div>
                    <div class="col-md-1">
                        <td><?= htmlspecialchars($comment->activated()) ?></td>
                    </div>
                    <div class="col-md-1">
                    <td><a href="index.php?action=validateComment&amp;id=<?= htmlspecialchars($comment->id()) ?>"> Valider</a></td>
                    </div>
                </tr>
                <?php
                }
                ?>
        </table>
    </div>
</section>

<?php
    }
    $content = ob_get_clean();
    require ('View/templat.php');