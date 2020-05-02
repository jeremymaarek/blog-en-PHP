<?php

namespace Blog\jeremy\Model;

class Comment
{
    private $_id;
    private $_post_id;
    private $_author;
    private $_comment;
    private $_comment_date;
    private $_is_activated;

    public function __construct($datas = [])
    {
        if (!empty($datas))
        {
            $this->hydrate($datas);
        }
    }

     public function hydrate(array $datas)
    {
        if (isset($datas['id']))
        {
          $this->setId($datas['id']);
        }
      
        if (isset($datas['post_id']))
        {
          $this->setPostId($datas['post_id']);
        }
        if (isset($datas['author']))
        {
          $this->setAuthor($datas['author']);
        }

        if (isset($datas['comment']))
        {
          $this->setComment($datas['comment']);
        }
        if (isset($datas['fr_date_comment']))
        {
          $this->setCreated($datas['fr_date_comment']);
        }
        if (isset($datas['is_activated']))
        {
          $this->setActivated($datas['is_activated']);
        }
    }
  
    public function id() {return $this->_id;}
    public function postId() {return $this->_post_id;}
    public function author() {return $this->_author;}
    public function comment() {return $this->_comment;}
    public function commentDate() {return $this->_comment_date;}
    public function activated() {return $this->_is_activated;}


    public function setId($id)
    {    
      $this->_id = $id;
    }

    public function setPostId($postId)
    {   
      $this->_post_id = $postId;
    }

    public function setAuthor($author)
    {   
      $this->_author = $author;
    }

    public function setComment($comment)
    {   
      $this->_comment = $comment;
    }

    public function setCreated($commentDate)
    {    
      $this->_comment_date = $commentDate;
    }
    
    public function setActivated($activated)
    {
        $this->_is_activated = $activated;
    }

}
