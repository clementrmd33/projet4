<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

class controllerBackend
{
    private $Chapters;
    private $Comments;

    public function __construct()
    {
        $this->Chapters = new PostManager();
        $this->Comments = new CommentManager();
    }
    //PAGE ADMINISTRATION
    public function connect()
    {
        $posts = $this->Chapters->getPosts();
        $reportAdmins = $this->Comments->reportAdmin();
        require('View/adminView.php');
    }
    //RENVOIE PAGE DE MODIFICATION
    public function updateView()
    {
        $modifChapitre = $this->Chapters->getPost($_GET['id']);
        require('View/updateChapter.php');
    }
    //ENREGISTRER MODIFICATION CHAPITRE
    public function updateValidate($title, $content, $id)
    {
        $update = $this->Chapters->updatePost($title, $content, $id);
        $posts = $this->Chapters->getPosts();
        $reportAdmins = $this->Comments->reportAdmin();
        require('View/adminView.php');
    }
    //SUPPRESSION CHAPITRE
    public function deletepost($delete_id)
    {
        $delete = $this->Chapters->deletePost($delete_id);
        $posts = $this->Chapters->getPosts();
        $reportAdmins = $this->Comments->reportAdmin();
        require('View/adminView.php');
    }
    //AFFICHAGE DE LA PAGE AJOUT D'UN NOUVEAU CHAPITRE
    public function addChapter()
    {
        require('View/addNewChapter.php');
    }
    //AJOUT D'UN CHAPITRE
    public function addNewPost($p_title,$p_content)
    {
        $addpost = $this->Chapters->addPost($p_title,$p_content);
        $posts = $this->Chapters->getPosts();
        $reportAdmins = $this->Comments->reportAdmin();
        require('View/adminView.php');
    }
    //VALIDATION D'UN COMMENTAIRE SIGNALER
    public function validateComments($validate_Id)
    {
        $validate_comments = $this->Comments->validateReport($validate_Id);
        $posts = $this->Chapters->getPosts();
        $reportAdmins = $this->Comments->reportAdmin();
        require ('View/adminView.php');
    }
    //SUPRRESION COMMENTAIRE SIGNALER
    public function deleteComments($delete_report)
    {
        $delete_comment = $this->Comments->deleteReport($delete_report);
        $posts = $this->Chapters->getPosts();
        $reportAdmins = $this->Comments->reportAdmin();
        require('View/adminView.php');
    }
    //ACTUALISATION PAGE BACKEND
    public function retour()
    {
        $posts = $this->Chapters->getPosts();
        $reportAdmins = $this->Comments->reportAdmin();
        require('View/adminView.php');
    }
}
