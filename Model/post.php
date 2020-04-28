<?php

namespace Blog\jeremy\Model;

class PostManager extends Manager
{

    public function allPosts()
    {
        $bdd = $this->dbConnect();

        $all_posts = $bdd->query("SELECT id, title, content, chapo, author, DATE_FORMAT(creation_date, '%d/%m/%Y') AS fr_date FROM posts ORDER BY id DESC");

        return $all_posts;
    }

    public function posts($postId)
    {
        $bdd = $this->dbConnect();
        $posts = $bdd->prepare("SELECT id, title, content, chapo, author, DATE_FORMAT(creation_date, '%d/%m/%Y') AS fr_date FROM posts WHERE id = ?");
        $posts->execute(array($postId));
        return $posts;

    }

    public function addPost ()
    {
        $bdd = $this->dbConnect();
        $add_post = $bdd->prepare('INSERT INTO posts(title, content, chapo, author, creation_date) VALUES(:title, :content, :chapo, :author, NOW())');
        return $add_post;
    }

    public function modPost ($id, $title, $content, $author, $chapo)
    {
    $bdd = $this->dbConnect();
    $req = $bdd->prepare("UPDATE posts SET title = :nvtitle, content = :nv_content, creation_date = NOW(), author = :nvauthor, chapo = :nvchapo WHERE id = $id");

    $req->execute(array(
    'nvtitle' => $title,
    'nv_content' => $content,
    'nvauthor' => $author,
    'nvchapo' => $chapo

    ));
    }


    public function deleteM ($id)
    {
        $bdd = $this->dbConnect();
        $delete = $bdd->prepare("DELETE FROM posts WHERE id = ?");
        $delete->execute(array($id));

    }


}