<?php

require_once ('Model/comment.php');

function addcom($postId,$author, $comment, $token)
{
    if (isset($_SESSION['token']) && isset($_POST['token']) && !empty($_SESSION['token']) && !empty($_POST['token'])) {
        if ($_SESSION['token'] == $_POST['token']) {

            $commentManager = new Blog\jeremy\Model\CommentManager();

            $add_comment = $commentManager->addComment($postId,$author, $comment);

            if ($add_comment === false){
                throw new Exception('Impossible d\'ajouter le commentaire !');
            }
            else{
            header("Location: index.php?action=post&id=$postId");
            }
        }
    }
    else {
        echo "Erreur de vérification";
    }
}

function modifComments()
{

    require ("View/modif_comment_view.php");
}

function postModifComments($postId, $pseudo, $content, $token)
{
    if (isset($_SESSION['token']) && isset($_POST['token']) && !empty($_SESSION['token']) && !empty($_POST['token'])) {
        if ($_SESSION['token'] == $_POST['token']) {
            $commentManager = new Blog\jeremy\Model\CommentManager();

            $mod_comment = $commentManager->modComment($_GET['postId'], $_POST['pseudo'], $_POST['content']);

            if ($mod_comment === false){
                throw new Exception('Impossible de modifier le commentaire !');
            }
            else{
            header("Location: index.php?action=post&id=$postId");
            }
        }
    }
    else {
        echo "Erreur de vérification";
    }

}

function admin_Comments()
{
    $manager = new Blog\jeremy\Model\CommentManager();
    $all_Comments =$manager->allComments();
    require ('View/admin_Comments.php');
}

function validate_Comment($id)
{
    $id = $_GET['id'];
    $manager = new Blog\jeremy\Model\CommentManager();
    $validate_Comment =$manager->validComment($id);
    $all_Comments =$manager->allComments();
    require ('View/admin_Comments.php');
}