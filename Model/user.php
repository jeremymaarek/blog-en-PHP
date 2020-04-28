<?php

namespace Blog\jeremy\Model;

class User extends Manager
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
            
            $donnees = $reponse->fetch();

            session_start();

            $_SESSION['pseudo'] = $donnees['pseudo'];
            $_SESSION['prenom'] = $donnees['prenom'];
            $_SESSION['email'] = $donnees['email'];
            $_SESSION['admin'] = $donnees['admin'];


            header("Location: /blog");


        }
    }

    public function registration($email, $pseudo, $prenom, $pass2, $pass)
    {
        $pseudo = $_POST['pseud'];
        $passattente = $_POST['pass'];
        $bdd = $this->dbConnect();
        $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $req = $bdd->prepare('INSERT INTO users (pseudo, email, prenom, pass, date_inscription) VALUES (?, ?, ?, ?, NOW())');
        $req->execute(array($_POST['pseud'], $_POST['email'], $_POST['prenom'], $passattente));            
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

    public function allUsers()
    {
        $bdd = $this->dbConnect();

        $all_Users = $bdd->query("SELECT * FROM users");

        return $all_Users;
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
}