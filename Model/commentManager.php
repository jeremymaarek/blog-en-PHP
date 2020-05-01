<?php

namespace Blog\jeremy\Model;

require_once 'model/Comment.php';

class CommentManager extends Manager
{
    public function allComments ()
    {
        $comments = [];
        $bdd = $this->dbConnect();
        $all_Comments = $bdd->query("SELECT id, post_id, author, comment, is_activated, DATE_FORMAT(comment_date, '%d/%m/%Y') AS fr_date_comment FROM comments WHERE is_activated IS NULL ORDER BY post_id");
        while ($datas = $all_Comments->fetch())
        {
            $comment = new Comment();
            $comment->hydrate($datas);
            $comments[] = $comment;
        }
        return $comments;
    }

    public function comments ($postId)
    {
        $bdd = $this->dbConnect();
        $comments = $bdd->prepare("SELECT id, post_id, author, comment, is_activated, DATE_FORMAT(comment_date, '%d/%m/%Y %Hh%imin%ss') AS fr_date_comment FROM comments WHERE post_id = ? ORDER BY comment_date");
        $comments->execute(array($postId));
        return $comments;
    }

    public function addComment ($postId,$author, $comment)
    {
        $bdd = $this->dbConnect();
        $add_comment = $bdd->prepare("INSERT INTO comments (post_id, author, comment, comment_date) VALUES(:post_id, :author, :comment, NOW())");
        $add_comment->execute(array(
        'post_id' => $postId,
        'author' => $author,
        'comment' => $comment
        ));
        return $add_comment;
    }
    

    public function modComment ($postId, $pseudo, $content)
    {
    $bdd = $this->dbConnect();
    $req = $bdd->prepare("UPDATE comments SET author = :nvauthor, comment = :nv_comment WHERE id = $postId");

    $req->execute(array(
    'nvauthor' => $pseudo,
    'nv_comment' => $content
    ));
    }

    public function validComment($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("UPDATE comments SET is_activated = '1' WHERE id = ?");
        $req->execute(array($id));

    }
}
