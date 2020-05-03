<?php

namespace Blog\jeremy\Model;

require_once 'model/Post.php';

class PostManager extends Manager
{
    public function allPosts()
    {
        $Posts = [];
        $bdd = $this->dbConnect();
        $all_posts = $bdd->query("SELECT id, title, content, chapo, author, DATE_FORMAT(creation_date, '%d/%m/%Y') AS fr_date FROM posts ORDER BY id DESC");
        while ($datas = $all_posts->fetch())
        {
            $post = new Post();
            $post->hydrate($datas);
            $Posts[] = $post;
        }
        return $Posts;
    }

    public function getPosts($postId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT id, title, content, chapo, author, DATE_FORMAT(creation_date, '%d/%m/%Y') AS fr_date FROM posts WHERE id = ?");
        $req->execute(array($postId));
        $datas = $req->fetch();
        $post = new Post();
        $post->hydrate($datas);
        return $post;
    }

    public function addPost ($title, $content, $author, $chapo)
    {
        $bdd = $this->dbConnect();
        $add_post = $bdd->prepare('INSERT INTO posts(title, content, chapo, author, creation_date) VALUES(:title, :content, :chapo, :author, NOW())');
        $add_post->execute(array(
            'title' => $title,
            'content' => $content,
            'author' => $author,
            'chapo' => $chapo
            ));
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
        'nvchapo' => $chapo,
        ));
    }

    public function deleteM ($id)
    {
        $bdd = $this->dbConnect();
        $delete = $bdd->prepare("DELETE FROM posts WHERE id = ?");
        $delete->execute(array($id));
    }

    public function controlPost($id)
    {
        $id = $_GET['id'];
        $bdd = $this->dbConnect();
        $cont = $bdd->prepare("SELECT * FROM posts WHERE id = ?");
        $cont->execute(array($id));
        $count = $cont->rowCount();
        var_dump($count);
        return $count;
    }

}
