<?php

namespace Blog\jeremy\Model;

class Post
{
    private $_id;
    private $_title;
    private $_content;
    private $_created;
    private $_author;
    private $_chapo;

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
      
        if (isset($datas['title']))
        {
          $this->setTitle($datas['title']);
        }

        if (isset($datas['content']))
        {
          $this->setContent($datas['content']);
        }
        if (isset($datas['fr_date']))
        {
          $this->setCreated($datas['fr_date']);
        }
        if (isset($datas['author']))
        {
          $this->setAuthor($datas['author']);
        }
        if (isset($datas['chapo']))
        {
          $this->setChapo($datas['chapo']);
        }
    }
  
  
    public function id() {return $this->_id;}
    public function title() {return $this->_title;}
    public function content() {return $this->_content;}
    public function created() {return $this->_created;}
    public function author() {return $this->_author;}
    public function chapo() {return $this->_chapo;}

    public function setId($id)
    {    
      $this->_id = $id;
    }

    public function setContent($content)
    {   
      $this->_content = $content;
    }

    public function setTitle($title)
    {   
      $this->_title = $title;
    }

    public function setAuthor($author)
    {    
      $this->_author = $author;
    }

    public function setChapo($chapo)
    {
      $this->_chapo = $chapo;
    }

    public function setCreated($created)
    {
        $this->_created = $created;
    }

}
