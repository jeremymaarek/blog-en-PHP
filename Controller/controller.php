<?php

require('Model/model.php');

function listPosts()
{
    $postManager = new Blog\jeremy\Model\PostManager();
    $all_posts = $postManager->all_posts();
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

    $posts =$postManager->posts($_GET['id']);
    $comments = $commentManager->comments($_GET['id']);
    require ('View/comments.php');
}

function addcom($postId,$author, $comment)
{
    $commentManager = new Blog\jeremy\Model\CommentManager();

    $add_comment = $commentManager->add_comment($postId,$author, $comment);

    if ($add_comment === false){
        throw new Exception('Impossible d\'ajouter le commentaire !');
    }
    else{
    header("Location: index.php?id=$postId");
    }
}
function login()
{
    require ('View/connect.php');
}

function connectUse($pseudo, $pass)
{
        $user = new Blog\jeremy\Model\user();
        $donnees = $user->ConnectAccount($_POST['pseud'], $_POST['pass']);
        header("Location: /blog");
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
            $donnees = $user->registration($_POST['email'], $_POST['pseud'],$_POST['prenom'], $_POST['pass2'], $_POST['pass']);
            header("Location: /blog");
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

function postModifComments($postId, $pseudo, $content)
{
    $commentManager = new Blog\jeremy\Model\CommentManager();

    $mod_comment = $commentManager->modComment($_GET['postId'], $_POST['pseudo'], $_POST['content']);

    if ($mod_comment === false){
        throw new Exception('Impossible de modifier le commentaire !');
    }
    else{
    header("Location: index.php?id=$postId");
    }

}

function modifPost()
{
    require ("View/modifier.php");
}

function add()
{
    require ("View/add.php");
}

function addPost($title,$content)
{
    $title = $_POST['title'];
    $content = $_POST['content'];
    
    $postManager = new Blog\jeremy\Model\PostManager();

	$add_post = $postManager->add_post();

	$add_post->execute(array(
		'title' => $title,
		'content' => $content,
		));

		header("Location: index.php");
}


function postModifPost($id, $title, $content)
{
    $postManager = new Blog\jeremy\Model\PostManager();

    $mod_post = $postManager->modPost($_GET['id'], $_POST['title'], $_POST['content']);

    if ($mod_post === false){
        throw new Exception('Impossible de modifier le post !');
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
    header("Location: index.php");
    }

}