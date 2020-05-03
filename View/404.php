<?php
    ob_start();?>

<section>
    <div class="col-lg-12">
        <H1>ERREUR 404 : cette page n'existe pas </h1><br><br>
    </div>
</section>

<?php
    $content = ob_get_clean();
    require ('View/templat.php');
    