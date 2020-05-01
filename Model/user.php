<?php

namespace Blog\jeremy\Model;

class User
{
    private $_id;
    private $_pseudo;
    private $_email;
    private $_prenom;
    private $_pass;
    private $_date_inscription;
    private $_admin;
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
      
        if (isset($datas['pseudo']))
        {
          $this->setPseudo($datas['pseudo']);
        }
        if (isset($datas['email']))
        {
          $this->setEmail($datas['email']);
        }

        if (isset($datas['prenom']))
        {
          $this->setPrenom($datas['prenom']);
        }
        if (isset($datas['pass']))
        {
          $this->setPass($datas['pass']);
        }
        if (isset($datas['date_inscription']))
        {
          $this->setCreated($datas['date_inscription']);
        }
        if (isset($datas['admin']))
        {
          $this->setAdmin($datas['admin']);
        }
        if (isset($datas['is_activated']))
        {
          $this->setActivated($datas['is_activated']);
        }
    }
  
  
    public function id() {return $this->_id;}
    public function pseudo() {return $this->_pseudo;}
    public function email() {return $this->_email;}
    public function prenom() {return $this->_prenom;}
    public function pass() {return $this->_pass;}
    public function created() {return $this->_date_inscription;}
    public function admin() {return $this->_admin;}
    public function activated() {return $this->_is_activated;}


    public function setId($id)
    {    
      $this->_id = $id;
    }

    public function setPseudo($pseudo)
    {   
      $this->_pseudo = $pseudo;
    }

    public function setEmail($email)
    {   
      $this->_email = $email;
    }

    public function setPrenom($prenom)
    {   
      $this->_prenom = $prenom;
    }

    public function setPass($pass)
    {    
      $this->_pass = $pass;
    }

    public function setCreated($created)
    {
      $this->_date_inscription = $created;
    }

    public function setAdmin($admin)
    {
        $this->_admin = $admin;
    }

    public function setActivated($activated)
    {
        $this->_is_activated = $activated;
    }

}
