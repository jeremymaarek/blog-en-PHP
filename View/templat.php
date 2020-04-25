<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Jeremy Maarek - CV</title>

    <!-- Bootstrap Core CSS -->
    <link href="view/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="view/css/freelancer.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="view/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<body id="page-top" class="index">

    <!-- Navigation -->
    <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.php">JEREMY MAAREK</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="index.php"></a>
                    </li>
                    <li class="page-scroll">
                        <a href="index.php">Accueil</a>
                    </li>
                    <li class="page-scroll">
                        <a href="index.php?action=listeposts">ARTICLES</a>
                    </li>
                    
                    <?php
                    if (empty($_SESSION['prenom'])) 
                    {
                    ?>
                    
                        <li class="page-scroll">
                            <a href="index.php?action=registration">S'inscrire</a>
                        </li>
                        <li class="page-scroll">
                            <a href="index.php?action=connect">Se connecter</a>
                        </li>
                    <?php
                    }
                    if (!empty($_SESSION['admin'])){
                        if ($_SESSION['admin'] == '1') {
                    ?>
                        <li class="page-scroll">
                            <a href="index.php?action=add">Ajouter un article</a>
                        </li>
                    <?php
                        }
                    }
                    ?>
                     <?php
                    if (!empty($_SESSION['prenom'])) 
                    {
                    ?>
                        <li class="page-scroll">
                            <a href="index.php?action=logout">Déconnexion</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Header -->
    <header>
            
         <?= $content ?>
             
    </header>


    <!-- Footer -->
    <footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Adresse :</h3>
                        <p>6 rue d'armaillé
                            <br>75017 Paris</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Plan du site :</h3>
                        <a href="index.PHP">Page d'accueil</a><br>
                        <a href="#">Articles</a> <br>
                        <?php
                            if (!empty($_SESSION['admin'])){
                                if ($_SESSION['admin'] == '1') {
                        ?>
                        <a href="index.php?action=adminUsers">Admin : utilisateurs</a><br>
                        <a href="index.php?action=adminComments">Admin : commentaires</a><br>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Nous suivre </h3>
                        <ul class="list-inline">
                            <li>
                                <a href="https://www.facebook.com/jmaarek" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/jeremymaarek/?hl=fr" class="btn-social btn-outline"><i class="fa fa-fw fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/in/j%C3%A9r%C3%A9my-maarek-1a2a32158/?originalSubdomain=fr" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="https://github.com/jeremymaarek" class="btn-social btn-outline"><i class="fa fa-fw fa-github"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-top page-scroll hidden-sm hidden-xs hidden-lg hidden-md">
        <a class="btn btn-primary" href="#page-top">
            <i class="fa fa-chevron-up"></i>
        </a>
    </div>



    <!-- jQuery -->
    <script src="vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/freelancer.min.js"></script>

</body>

</html>
