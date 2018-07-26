<?php

require_once ('model/PostManager.php');
require_once ('model/CommentManager.php');
require_once ('model/userManager.php');

class controllerBackend
{
    private $Chapters;
    private $Comments;
    private $Users;

    public function __construct(){
        $this->Chapters = new PostManager();
        $this->Comments = new CommentManager();
        $this->Users = new userManager();
    }

    //                                      5:PAGE LOGIN

    public function connect(){
        $posts = $this->Chapters->getPosts();
        $reportAdmins = $this->Comments->reportAdmin();
        $_SESSION['pseudo'] = 'Admin';
        require('View/adminView.php');
    }

    //                                      6:PAGE UPDATE

    public function updateView(){
        $modifChapitre = $this->Chapters->getPost($_GET['id']);
        require('View/updateChapter.php');
    }

    //                                   7:MODIFIER UN ARTICLE

    public function updateValidate($title, $content, $id){
        $update = $this->Chapters->updatePost($title, $content, $id);
        $posts = $this->Chapters->getPosts();
        $reportAdmins = $this->Comments->reportAdmin();
        require('View/adminView.php');
    }

    //                                  8:AFFICHAGE PAGE NEW CHAPITRE

    public function addChapter(){
        require('View/addNewChapter.php');
    }

    //                                      9:AJOUTER UN ARTICLE

    public function addNewPost($p_title,$p_content){
        $addpost = $this->Chapters->addPost($p_title,$p_content);
        $posts = $this->Chapters->getPosts();
        $reportAdmins = $this->Comments->reportAdmin();
        require('View/adminView.php');
    }


    //                                     10:SUPPRIMER UN POST

    public function deletepost($delete_id){
        $delete = $this->Chapters->deletePost($delete_id);
        $posts = $this->Chapters->getPosts();
        $reportAdmins = $this->Comments->reportAdmin();
        require('View/adminView.php');
    }

    //                                12:VALIDER UN COMMENTAIRE SIGNALER

    public function validateComments($validate_Id){
        $validate_comments = $this->Comments->validateReport($validate_Id);
        $posts = $this->Chapters->getPosts();
        $reportAdmins = $this->Comments->reportAdmin();
        require ('View/adminView.php');
    }

    //                                  13:SUPPRIMER UN COMMENTAIRE SIGNALER

    public function deleteComments($delete_report){
        $delete_comment = $this->Comments->deleteReport($delete_report);
        $posts = $this->Chapters->getPosts();
        $reportAdmins = $this->Comments->reportAdmin();
        require('View/adminView.php');
    }

    //                                          14:BUTTON RETOUR

    public function retour(){
        $posts = $this->Chapters->getPosts();
        $reportAdmins = $this->Comments->reportAdmin();
        require('View/adminView.php');
    }
    //                                     16:VERIFICATION INSCRIPTION
    public function verifInscription($pseudo,$passhash){
        $this->Users->inscription($pseudo,$passhash);
        require ('View/loginView.php');
    }

    //                                     17:VERIFICATION CONNECTION
    public function verifConnection($pseudo, $motdepasse){
        $erreurPass = false;
        $erreurEmpty = false;
        if (!empty($pseudo) AND !empty($motdepasse)) {
            $resultat =  $this->Users->verifPassword($pseudo);
            $passwordVerify = password_verify($motdepasse, $resultat['password']);
            if($passwordVerify){
                $this->connect();
            } else {
                $erreurPass = true;
                require('View/loginView.php');
            }
        } else {
            $erreurEmpty = true;
            require('View/loginView.php');
        }
    }
}
