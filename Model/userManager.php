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

            $user = new User();
            $user->hydrate($datas);

            $_SESSION['pseudo'] = $user->pseudo();
            $_SESSION['prenom'] = $user->prenom();
            $_SESSION['email'] = $user->email();
            $_SESSION['admin'] = $user->admin();


            header("Location: /blog");


        }
    }

    public function registration($email, $pseudo, $prenom, $pass)
    {
        $datas['email'] = $_POST['email'];
        $datas['pseudo'] = $_POST['pseud'];
        $datas['prenom'] = $_POST['prenom'];
        $datas['pass'] = $_POST['pass'];


        $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO users (pseudo, email, prenom, pass, date_inscription) VALUES (?, ?, ?, ?, NOW())');

        $user = new User();
        $user->hydrate($datas);

        $req->execute(array($user->pseudo(), $user->email(), $user->prenom(), $user->pass()));            
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
        $user = new User();
        $datas['id'] = $id;
        $user->hydrate($datas);
        $req->execute(array($user->id()));
    }

    public function validUser($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("UPDATE users SET is_activated = '1' WHERE id = ?");
        $user = new User();
        $datas['id'] = $id;
        $user->hydrate($datas);
        $req->execute(array($user->id()));
    }

            
    public function controlUser($pseudo)
    {
        $pseudo = $_POST['pseud'];
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT * FROM users WHERE pseudo = ?");
        $user = new User();
        $datas['pseudo'] = $pseudo;
        $user->hydrate($datas);
        $req->execute(array($user->pseudo()));
        $count = $req->rowCount();
        return $count;
    }

}