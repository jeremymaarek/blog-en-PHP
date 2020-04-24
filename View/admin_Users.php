<?php
    ob_start();
    session_start();
?>
<section>
    <div class="col-lg-12">
        <H1>Administration des utilisateurs :</h1><br><br>
    </div>
    <div class="container">
        <table class='row'>
            <tr>
                <div class="col-md-1">
                    <th>id</th>
                </div>
                <div class="col-md-2">
                    <th>pseudo</th>
                </div>    
                <div class="col-md-3">
                    <th>email</th>
                </div>
                <div class="col-md-2">
                    <th>prenom</th>
                </div>  
                <div class="col-md-1">
                    <th>admin</th>
                </div> 
                <div class="col-md-1">
                    <th>activé</th>
                </div>
            
            </tr>
            <?php
                while ($donnees = $all_Users->fetch())
                {
            ?>
                <tr >
                    <div class="col-md-1">
                        <td><?php echo htmlspecialchars($donnees['id']) ?></td>
                    </div>
                    <div class="col-md-2">
                        <td><?php echo htmlspecialchars($donnees['pseudo']) ?></td>
                    </div>
                    <div class="col-md-3">
                        <td><?php echo htmlspecialchars($donnees['email']) ?></td>  
                    </div>
                    <div class="col-md-2">
                        <td><?php echo htmlspecialchars($donnees['prenom']) ?></td>
                    </div>
                    <div class="col-md-1">
                        <td><?php echo htmlspecialchars($donnees['admin']) ?></td>
                    </div>
                    <div class="col-md-1">
                        <td><?php echo htmlspecialchars($donnees['is_activated']) ?></td>
                    </div>
                    <div class="col-md-1">
                        <td><a href="index.php?action=validateAdmin&amp;id=<?php echo htmlspecialchars($donnees['id']) ?>">Passer admin</a></td>
                    </div>
                    <div class="col-md-1">
                    <td><a href="#"> Valider user</a></td>
                    </div>
                </tr>
                <?php
                }
                ?>
        </table>
    </div>
</section>

<?php
    $all_Users->closeCursor();
    $content = ob_get_clean();
    require ('View/templat.php');
?>

