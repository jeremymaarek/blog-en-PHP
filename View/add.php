<?php
    ob_start();
    session_start();
?>
<section>
    <div class="col-lg-12">
        <H1>Ajouter un post :</h1><br><br>
    </div>

    <form action="index.php?action=addPost" method="POST">

        <label for="author">Autheur :</label><br>
        <textarea id="author" name="author" rows="1" class="form-control"></textarea><BR></BR>

        <label for="title">Titre :</label><br>
        <textarea id="title" name="title" rows="2" class="form-control"></textarea><BR></BR>

        <label for="chapo">Chapô :</label><br>
        <textarea id="chapo" name="chapo" rows="3" class="form-control"></textarea><BR></BR>

        <label for="content">Contenu :</label><br>
        <textarea id="content" name="content" rows="20" class="form-control"></textarea><BR></BR>

        <input type="submit" name="Ajouter l'article" class="btn btn-lg btn-outline"><br><br>
    </form>
</section>
<?php
    $content = ob_get_clean();
    require ('templat.php')
?>
