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
        $post = new Post();
        $datas['title'] = $title;
        $datas['content'] = $content;
        $datas['author'] = $author;
        $datas['chapo'] = $chapo;
        $post->hydrate($datas);
        $add_post->execute(array(
            'title' => $post->title(),
            'content' => $post->content(),
            'author' => $post->author(),
            'chapo' => $post->chapo(),
            ));
        return $add_post;
    }

    public function modPost ($id, $title, $content, $author, $chapo)
    {
    $bdd = $this->dbConnect();
    $req = $bdd->prepare("UPDATE posts SET title = :nvtitle, content = :nv_content, creation_date = NOW(), author = :nvauthor, chapo = :nvchapo WHERE id = $id");
    $post = new Post();
        $datas['title'] = $title;
        $datas['content'] = $content;
        $datas['author'] = $author;
        $datas['chapo'] = $chapo;
        $post->hydrate($datas);

    $req->execute(array(
        'nvtitle' => $post->title(),
        'nv_content' => $post->content(),
        'nvauthor' => $post->author(),
        'nvchapo' => $post->chapo(),
        ));
    }

    public function deleteM ($id)
    {
        $bdd = $this->dbConnect();
        $delete = $bdd->prepare("DELETE FROM posts WHERE id = ?");
        $post = new Post();
        $datas['id'] = $id;
        $post->hydrate($datas);
        $delete->execute(array($post->id()));

    }


}