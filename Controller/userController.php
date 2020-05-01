<?php

require_once ('Model/model.php');
require_once ('Model/userManager.php');

class UserController
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new Blog\jeremy\Model\UserManager();
    }

    function login()
    {
        require ('View/connect.php');
    }

    function connectUse()
    {
        if (isset($_SESSION['token']) && isset($_POST['token']) && !empty($_SESSION['token']) && !empty($_POST['token'])) {
            if ($_SESSION['token'] == $_POST['token']) {
                $user = new Blog\jeremy\Model\User();
                $this->userManager->ConnectAccount($_POST['pseud'], $_POST['pass']);
                header("Location: /blog-en-php");
            }
        }
        else {
            echo "Erreur de vérification";
        }
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
            $user = new Blog\jeremy\Model\User();
            $count = $this->userManager->controlUser($_POST['pseud']);
            if ($count == 0)
            {   
                $this->userManager->registration($_POST['email'], $_POST['pseud'],$_POST['prenom'], $_POST['pass']);
                header("Location: /blog-en-php");
            }
            else
            {
                header("Location: index.php?action=erreur&id=1");
            }   
        }
    }

    function admin_Users()
    {
        $user = new Blog\jeremy\Model\user();
        $all_Users = $this->userManager->allUsers();
        require ('View/admin_Users.php');
    }

    function validate_Admin($id)
    {
        $id = $_GET['id'];
        $user = new Blog\jeremy\Model\user();
        $validate_Users =$this->userManager->validAdmin($id);
        $all_Users =$this->userManager->allUsers();
        require ('View/admin_Users.php');
    }

    function validate_User($id)
    {
        $id = $_GET['id'];
        $user = new Blog\jeremy\Model\user();
        $validate_Users =$this->userManager->validUser($id);
        $all_Users =$this->userManager->allUsers();
        require ('View/admin_Users.php');
    }

    function logout()
    {
        session_start();
        session_destroy();
        header("location: index.php");
    }
}