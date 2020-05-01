<?php

require_once ('Model/model.php');
require_once ('Model/postManager.php');
require_once ('Model/comment.php');

function listPosts()
{
    $postManager = new Blog\jeremy\Model\PostManager();
    $post = new Blog\jeremy\Model\Post;
    $all_posts = $postManager->allPosts();
    require ('View/index_view.php');

}

function post()
{            
    $postManager = new Blog\jeremy\Model\PostManager();
    $commentManager = new Blog\jeremy\Model\CommentManager();
    $post = new Blog\jeremy\Model\Post;

    $req =$postManager->getPosts($_GET['id']);
    $comments = $commentManager->comments($_GET['id']);
    require ('View/comments.php');
}

function modifPost()
{
    $postManager = new Blog\jeremy\Model\PostManager();
    $post = new Blog\jeremy\Model\Post;
    $req =$postManager->getPosts($_GET['id']);
    require ("View/modifier.php");

}

function add()
{
    require ("View/add.php");
}

function addPost($title,$content,$author,$chapo)
{
    if (isset($_SESSION['token']) && isset($_POST['token']) && !empty($_SESSION['token']) && !empty($_POST['token'])) {
        if ($_SESSION['token'] == $_POST['token']) {
    
            $post = new Blog\jeremy\Model\Post();
            
            $postManager = new Blog\jeremy\Model\PostManager();

            $add_post = $postManager->addPost($title,$content,$author,$chapo);

            header("Location: index.php?action=listeposts");
        }
    }
    else{
        header("Location: index.php");
    }    
}


function postModifPost($id, $title, $content, $author, $chapo, $token)
{
    if (isset($_SESSION['token']) && isset($_POST['token']) && !empty($_SESSION['token']) && !empty($_POST['token'])) {
        if ($_SESSION['token'] == $_POST['token']) {

            $post = new Blog\jeremy\Model\Post();
            $postManager = new blog\jeremy\Model\PostManager();
            $mod_post = $postManager->modPost($id, $title, $content, $author, $chapo);

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

function delete($id)
{
    $postManager = new Blog\jeremy\Model\PostManager();
    $post = new Blog\jeremy\Model\Post();
    $deletePost = $postManager->deleteM($id);
    if ($deletePost === false){
        throw new Exception('Impossible de supprimer le post !');
    }
    else{
    header("Location: index.php?action=listeposts");
    }
}