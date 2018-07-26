<?php
require_once ('model/Manager.php');

class userManager extends Manager
{
    public function inscription($pseudo,$passhash){
        $bdd = $this->bddConnect();
        $userform = $bdd->prepare('INSERT INTO Users (pseudo, password)
                                                  VALUES (?,?)');
        $userform->execute(array($pseudo,$passhash));

        return $userform;
    }

    public function verifPassword($pseudo){
        $bdd = $this->bddConnect();
        $login = $bdd->prepare("SELECT password FROM Users WHERE pseudo = ?");

        $login->execute(array($pseudo));

        return $resultat = $login->fetch();
    }
}