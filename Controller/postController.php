<?php

require_once ('Model/model.php');
require_once ('Model/postManager.php');
require_once ('Model/commentManager.php');


class PostController
{

    private $postManager;

    public function __construct()
    {
        $this->postManager = new Blog\jeremy\Model\PostManager();
    }

    public function listPosts()
    {
        $post = new Blog\jeremy\Model\Post;
        $all_posts = $this->postManager->allPosts();
        require ('View/index_view.php');

    }

    public function post()
    {            
        $commentManager = new Blog\jeremy\Model\CommentManager();
        $post = new Blog\jeremy\Model\Post;

        $req =$this->postManager->getPosts($_GET['id']);
        $com = $commentManager->comments($_GET['id']);
        require ('View/comments.php');
    }

    public function modifPost()
    {
        $post = new Blog\jeremy\Model\Post;
        $req =$this->postManager->getPosts($_GET['id']);
        require ("View/modifier.php");

    }

    public function add()
    {
        require ("View/add.php");
    }

    public function addPost($title,$content,$author,$chapo)
    {
        if (isset($_SESSION['token']) && isset($_POST['token']) && !empty($_SESSION['token']) && !empty($_POST['token'])) {
            if ($_SESSION['token'] == $_POST['token']) {
                        
                $this->postManager->addPost($title,$content,$author,$chapo);

                header("Location: index.php?action=listeposts");
            }
        }
        else{
            header("Location: index.php");
        }    
    }


    public function postModifPost($id, $title, $content, $author, $chapo, $token)
    {
        if (isset($_SESSION['token']) && isset($_POST['token']) && !empty($_SESSION['token']) && !empty($_POST['token'])) {
            if ($_SESSION['token'] == $_POST['token']) {

                $mod_post = $this->postManager->modPost($id, $title, $content, $author, $chapo);

                if ($mod_post === false){
                    throw new Exception('Impossible de modifier le post !');
                }
                else{
                header("Location: index.php?action=listeposts");
                }
            }
        }
        else{
            header("Location: index.php");
        }  

    }

    public function delete($id)
    {
        $deletePost = $this->postManager->deleteM($id);
        if ($deletePost === false){
            throw new Exception('Impossible de supprimer le post !');
        }
        else{
        header("Location: index.php?action=listeposts");
        }
    }
}