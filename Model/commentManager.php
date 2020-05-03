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
        $comments = [];
        $bdd = $this->dbConnect();
        $com = $bdd->prepare("SELECT id, post_id, author, comment, is_activated, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin') AS fr_date_comment FROM comments WHERE post_id = ? ORDER BY comment_date");
        $com->execute(array($postId));
        while ($datas = $com->fetch())
        {
            $comment = new Comment();
            $comment->hydrate($datas);
            $comments[] = $comment;
        }
        return $comments;
    }

    public function addComment ($postId,$author, $comm)
    {
        $bdd = $this->dbConnect();
        $add_comment = $bdd->prepare("INSERT INTO comments (post_id, author, comment, comment_date) VALUES(:post_id, :author, :comment, NOW())");
        $add_comment->execute(array(
        'post_id' => $postId,
        'author' => $author,
        'comment' => $comm,
        ));
        return $add_comment;
    }
    

    public function validComment($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("UPDATE comments SET is_activated = '1' WHERE id = ?");
        $req->execute(array($id));
    }
}
