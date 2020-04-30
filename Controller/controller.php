<?php

session_start();

require_once ('Model/model.php');
require_once ('Model/user.php');
require_once ('Model/postManager.php');
require_once ('Model/comment.php');


function listPosts()
{
    $postManager = new Blog\jeremy\Model\PostManager();
    $post = new Blog\jeremy\Model\Post;
    $all_posts = $postManager->allPosts();
    require ('View/index_view.php');

}

function home()
{
    require ('View/home.php');
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
function login()
{
    require ('View/connect.php');
}

function connectUse()
{
    if (isset($_SESSION['token']) && isset($_POST['token']) && !empty($_SESSION['token']) && !empty($_POST['token'])) {
        if ($_SESSION['token'] == $_POST['token']) {
            $user = new Blog\jeremy\Model\user();
            $user->ConnectAccount($_POST['pseud'], $_POST['pass']);
            header("Location: /blog-en-php");
        }
    }
    else {
        echo "Erreur de vérification";
    }
}

function logout()
{
    session_start();
    session_destroy();

    header("location: index.php");
}

function registration()
{
    require ('View/inscription.php');
}

function inscription_post()
{
    
    if ($_POST['pass'] != $_POST['pass2'])
    {
        header("Location: index.php?action=erreur&id=2");
    }
    else 
    {
        $user = new Blog\jeremy\Model\user();
        $count = $user->controlUser($_POST['pseud']);
        if ($count == 0)
        {   
            $user->registration($_POST['email'], $_POST['pseud'],$_POST['prenom'], $_POST['pass2'], $_POST['pass']);
            header("Location: /blog-en-php");
        }
        else
        {
            header("Location: index.php?action=erreur&id=1");

        }   

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

function modifPost()
{
    $postManager = new Blog\jeremy\Model\PostManager();
    $posts =$postManager->posts($_GET['id']);
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

            $title = $_POST['title'];
            $content = $_POST['content'];
            $author = $_POST['author'];
            $chapo = $_POST['chapo'];

            
            $postManager = new Blog\jeremy\Model\PostManager();

            $add_post = $postManager->addPost();

            $add_post->execute(array(
                'title' => $title,
                'content' => $content,
                'author' => $author,
                'chapo' => $chapo,

                ));

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

            $postManager = new blog\jeremy\Model\PostManager();

            $mod_post = $postManager->modPost($_GET['id'], $_POST['title'], $_POST['content'], $_POST['author'], $_POST['chapo']);

            if ($mod_post === false){
                throw new Exception('Impossible de modifier le post !');
            }

            else{
            header("Location: index.php");
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

    $deletePost = $postManager->deleteM($id);
    if ($deletePost === false){
        throw new Exception('Impossible de supprimer le post !');
    }
    else{
    header("Location: index.php?action=listeposts");
    }

}

function admin_Users()
{
    $user = new Blog\jeremy\Model\user();

    $all_Users =$user->allUsers();
    require ('View/admin_Users.php');
}

function validate_Admin($id)
{
    $id = $_GET['id'];
    $user = new Blog\jeremy\Model\user();
    $validate_Users =$user->validAdmin($id);
    $all_Users =$user->allUsers();
    require ('View/admin_Users.php');

}

function validate_User($id)
{
    $id = $_GET['id'];
    $user = new Blog\jeremy\Model\user();
    $validate_Users =$user->validUser($id);
    $all_Users =$user->allUsers();
    require ('View/admin_Users.php');

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