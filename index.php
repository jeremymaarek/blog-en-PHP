<?php

require ('controller/controller.php');

try {
    if (isset($_GET['action']))
    {
        if ($_GET['action'] == 'listeposts'){
            listPosts();
        }


        elseif ($_GET['action'] == 'post')
        {
            if (!empty($_GET['id']) && $_GET['id'] > 0){
                post();
            }
            else
            {
                throw new Exception('Aucun identifiant de billet envoyé');

            }
        }

        elseif($_GET['action'] == 'addcomment')
        {
            if (!empty($_GET['id']) && $_GET['id'] > 0){
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addcom($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else{
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
        }

        elseif ($_GET['action'] == 'connect'){
            login();
        }

        elseif ($_GET['action'] == 'connectUser'){

            if(!empty($_POST['pseud']) && !empty($_POST['pass']))
            {
                connectUse($_POST['pseud'], $_POST['pass']);
            }

        }


        elseif ($_GET['action'] == 'logout'){
            logout();
        }

        elseif ($_GET['action'] == 'registration'){
            registration();

            if (!empty($_GET['id'])) 
            {
                if ($_GET['id'] == 1){
                echo 'Désolé, cet identifiant est déjà utilisé par un membre. Veuillez en choisir un autre';
                }

                if ($_GET['id'] == 2){
                    echo 'Attention, les deux mots de passe sont différents. Merci de vérifier votre saisie.';
                }
            }

        }

        elseif ($_GET['action'] == 'inscription_post'){

            if(!empty($_POST['email']) && !empty($_POST['pseud']) && !empty($_POST['prenom']) && !empty($_POST['pass2']) && !empty($_POST['pass']))
            {
            inscription_post();
            }
        }


        elseif ($_GET['action'] == 'addUser'){
            
        }

        elseif ($_GET['action'] == 'modifComments')
        {
            if (!empty($_GET['postId']) && $_GET['postId'] > 0)
                { 
                modifComments();
                }
        }

        elseif ($_GET['action'] == 'postModifComments')
        {
            if (!empty($_GET['postId']) && $_GET['postId'] > 0)
                { 
                    postModifComments($_GET['postId'], $_POST['pseudo'], $_POST['content']);
                }
        }

        elseif ($_GET['action'] == 'modifPost')
        {
            if (!empty($_GET['id']) && $_GET['id'] > 0)
                { 
                    modifPost();
                }
        }

        elseif ($_GET['action'] == 'postModifPost')
        {
            if (!empty($_GET['id']) && $_GET['id'] > 0)
                { 
                    postModifPost($_GET['id'], $_POST['title'], $_POST['content']);
                }
        }

        elseif ($_GET['action'] == 'delete')
        {
            if (!empty($_GET['id']) && $_GET['id'] > 0)
                { 
                    delete($_GET['id']);
                }
        }

        elseif ($_GET['action'] == 'add')
        {
            add();
        }

        elseif ($_GET['action'] == 'addPost')
        {
            if (!empty($_POST['title']) && !empty($_POST['content']))
                { 
                    addPost($_POST['title'], $_POST['content']);
                }
        }

        elseif ($_GET['action'] == 'erreur'){

            require ('View/inscription.php');

            if (!empty($_GET['id'])) 
            {
                if ($_GET['id'] == 1){
                echo 'Désolé, cet identifiant est déjà utilisé par un membre. Veuillez en choisir un autre';
                }

                if ($_GET['id'] == 2){
                    echo 'Attention, les deux mots de passe sont différents. Merci de vérifier votre saisie.';
                }
            }
            
        }

    }
    else
    {
        home();

    }
}
catch(Exception $e) { 
    echo 'Erreur : ' . $e->getMessage();
}
