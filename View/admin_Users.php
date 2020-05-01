<?php
    ob_start();
    if ($_SESSION['admin'] == 1){
?>

<section>
    <div class="col-lg-12">
        <H1>Administration des utilisateurs :</h1><br><br>
    </div>
    <div class="container">
        <table class="table">
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
                foreach($all_Users as $user){
            ?>
                <tr >
                    <div class="col-md-1">
                        <td><?= htmlspecialchars($user->id()) ?></td>
                    </div>
                    <div class="col-md-2">
                        <td><?= htmlspecialchars($user->pseudo())  ?></td>
                    </div>
                    <div class="col-md-3">
                        <td><?= htmlspecialchars($user->email())  ?></td>  
                    </div>
                    <div class="col-md-2">
                        <td><?= htmlspecialchars($user->prenom())  ?></td>
                    </div>
                    <div class="col-md-1">
                        <td><?= htmlspecialchars($user->admin())  ?></td>
                    </div>
                    <div class="col-md-1">
                        <td><?= htmlspecialchars($user->activated())  ?></td>
                    </div>
                    <div class="col-md-1">
                        <td><a href="index.php?action=validateAdmin&amp;id=<?= htmlspecialchars($user->id()) ?>">Passer admin</a></td>
                    </div>
                    <div class="col-md-1">
                    <td><a href="index.php?action=validateUser&amp;id=<?= htmlspecialchars($user->id()) ?>"> Valider user</a></td>
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
