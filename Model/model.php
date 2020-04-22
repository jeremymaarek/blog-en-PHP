<?php

namespace Blog\jeremy\Model;

class Manager
{
    protected function dbConnect()
    {
        $bdd = new \PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
        return $bdd;
    }

}

class postManager extends Manager
{

    public function all_posts()
    {
        $bdd = $this->dbConnect();

        $all_posts = $bdd->query("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y %Hh%imin%ss') AS fr_date FROM posts ORDER BY id DESC LIMIT 0, 5");

        return $all_posts;
    }

    public function posts($postId)
    {
        $bdd = $this->dbConnect();
        $posts = $bdd->prepare("SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y %Hh%imin%ss') AS fr_date FROM posts WHERE id = ?");
        $posts->execute(array($postId));
        return $posts;

    }

    public function add_post ()
    {
        $bdd = $this->dbConnect();
        $add_post = $bdd->prepare('INSERT INTO posts(title, content, creation_date) VALUES(:title, :content, NOW())');
        return $add_post;
    }

    public function modPost ($id, $title, $content)
    {
    $bdd = $this->dbConnect();
    $req = $bdd->prepare("UPDATE posts SET title = :nvtitle, content = :nv_content, creation_date = NOW() WHERE id = $id");

    $req->execute(array(
    'nvtitle' => $title,
    'nv_content' => $content
    ));
    }


    public function deleteM ($id)
    {
        $bdd = $this->dbConnect();
        $delete = $bdd->exec(" DELETE FROM posts WHERE id = $id");

    }


}

class commentManager extends Manager
{
    public function add_comment ($postId,$author, $comment)
    {
        $bdd = $this->dbConnect();
        $add_comment = $bdd->exec("INSERT INTO comments (post_id, author, comment, comment_date) VALUES($postId,$author, $comment, now())");
        return $add_comment;
    }

    public function comments ($postId)
    {
        $bdd = $this->dbConnect();
        $comments = $bdd->prepare("SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, '%d/%m/%Y %Hh%imin%ss') AS fr_date_comment FROM comments WHERE post_id = ?");
        $comments->execute(array($postId));
        return $comments;
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
}

class user extends Manager
{
    public function ConnectAccount($pseudo, $pass)
    {

        $pseudo = $_POST['pseud'];

        $pass = $_POST['pass'];


        if(isset($_POST['co_auto']))
        {
            setcookie('pseudo', "$pseudo", time() + 365*24*3600, null, null, false, true);
        }

        $bdd = $this->dbConnect();

        $reponse = $bdd->query("SELECT * FROM visiteurs WHERE pseudo = '$pseudo' AND pass = '$pass'");

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

            header("Location: /blog");


        }
    }

    public function registration($email, $pseudo, $prenom, $pass2, $pass)
    {
        $pseudo = $_POST['pseud'];
        $passattente = $_POST['pass'];
        $bdd = $this->dbConnect();
        $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $req = $bdd->prepare('INSERT INTO visiteurs (pseudo, email, prenom, pass, date_inscription) VALUES (?, ?, ?, ?, NOW())');
        $req->execute(array($_POST['pseud'], $_POST['email'], $_POST['prenom'], $passattente));            
    }

        
    public function controlUser($pseudo)
    {
        $pseudo = $_POST['pseud'];

        $bdd = $this->dbConnect();

        $req = $bdd->query("SELECT * FROM visiteurs WHERE pseudo = '$pseudo'");

        $count = $req->rowCount();

        return $count;

    }


}
