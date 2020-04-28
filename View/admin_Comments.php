<?php
    ob_start();
    session_start();
    if ($_SESSION['admin'] == 1){
?>

<section>
    <div class="col-lg-12">
        <H1>Administration des commentaires :</h1><br><br>
    </div>
    </div>
    <div class="container">
        <table class='row'>
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
                while ($donnees = $all_Comments->fetch())
                {
            ?>
                <tr >
                    <div class="col-md-1">
                        <td><?php echo htmlspecialchars($donnees['id']) ?></td>
                    </div>
                    <div class="col-md-2">
                        <td><?php echo htmlspecialchars($donnees['post_id']) ?></td>
                    </div>
                    <div class="col-md-3">
                        <td><?php echo htmlspecialchars($donnees['author']) ?></td>  
                    </div>
                    <div class="col-md-2">
                        <td><?php echo htmlspecialchars($donnees['comment']) ?></td>
                    </div>
                    <div class="col-md-1">
                        <td><?php echo htmlspecialchars($donnees['fr_date_comment']) ?></td>
                    </div>
                    <div class="col-md-1">
                        <td><?php echo htmlspecialchars($donnees['is_activated']) ?></td>
                    </div>
                    <div class="col-md-1">
                    <td><a href="index.php?action=validateComment&amp;id=<?php echo htmlspecialchars($donnees['id']) ?>"> Valider</a></td>
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

    $all_Comments->closeCursor();
    $content = ob_get_clean();
    require ('View/templat.php');