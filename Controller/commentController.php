<?php

require_once ('Model/model.php');
require_once ('Model/commentManager.php');

class CommentController
{

    private $commentManager;

    public function __construct()
    {
        $this->commentManager = new Blog\jeremy\Model\commentManager();
    }


    public function addcom($postId,$author, $comment, $token)
    {
        if (isset($_SESSION['token']) && isset($_POST['token']) && !empty($_SESSION['token']) && !empty($_POST['token'])) {
            if ($_SESSION['token'] == $_POST['token']) {

                $add_comment = $this->commentManager->addComment($postId,$author, $comment);

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

    public function modifComments()
    {

        require ("View/modif_comment_view.php");
    }

    public function postModifComments($postId, $pseudo, $content, $token)
    {
        if (isset($_SESSION['token']) && isset($_POST['token']) && !empty($_SESSION['token']) && !empty($_POST['token'])) {
            if ($_SESSION['token'] == $_POST['token']) {

                $mod_comment = $this->commentManager->modComment($_GET['postId'], $_POST['pseudo'], $_POST['content']);

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

    public function admin_Comments()
    {
        $all_Comments =$this->commentManager->allComments();
        require ('View/admin_Comments.php');
    }

    public function validate_Comment($id)
    {
        $id = $_GET['id'];
        $validate_Comment =$this->commentManager->validComment($id);
        $all_Comments =$this->commentManager->allComments();
        require ('View/admin_Comments.php');
    }
}