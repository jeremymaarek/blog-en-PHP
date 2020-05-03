<?php

namespace Blog\jeremy\Model;

require_once ('Model/user.php');


class UserManager extends Manager
{
    public function connectAccount($pseudo, $pass)
    {

        $pseudo = $_POST['pseud'];

        $pass = $_POST['pass'];

        $bdd = $this->dbConnect();

        $reponse = $bdd->prepare("SELECT * FROM users WHERE pseudo = ? AND pass = ? AND is_activated = '1'");
        $reponse->execute(array($pseudo, $pass));

        $count = $reponse->rowCount();

        if ($count != 1)
        {
            echo 'verifiez vos identifiants';
        ?>
            <a href="View/inscription.php">S'inscrire</a>
        <?php

        }
        else 
        {
            
            $datas = $reponse->fetch();

            $_SESSION['pseudo'] = $datas['pseudo'];
            $_SESSION['prenom'] = $datas['prenom'];
            $_SESSION['email'] = $datas['email'];
            $_SESSION['admin'] = $datas['admin'];


            header("Location: /blog");


        }
    }

    public function registration($email, $pseudo, $prenom, $pass)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO users (pseudo, email, prenom, pass, date_inscription) VALUES (?, ?, ?, ?, NOW())');
        $req->execute(array($_POST['pseud'], $_POST['email'], $_POST['prenom'], $_POST['pass']));            
    }


    public function allUsers()
    {
        $users = [];
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT * FROM users");
        while ($datas = $req->fetch())
        {
            $user = new User();
            $user->hydrate($datas);
            $users[] = $user;
        }
        return $users;
    }

    public function validAdmin($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("UPDATE users SET admin = '1' WHERE id = ?");
        $req->execute(array($id));
    }

    public function validUser($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("UPDATE users SET is_activated = '1' WHERE id = ?");
        $req->execute(array($id));
    }

            
    public function controlUser($pseudo)
    {
        $pseudo = $_POST['pseud'];
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT * FROM users WHERE pseudo = ?");
        $req->execute(array($pseudo));
        $count = $req->rowCount();
        return $count;
    }
}
