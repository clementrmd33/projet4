<?php
  class CommentManager
  {
    public function __construct($db)
    {
      $this->setDb($db);
    }
    public function add()
    {
      //Ajouter un commentaire
    }
    public function delete()
    {
      //Supprimer un commentaire
    }
    public function get()
    {
      //obtenir une information un id, un nom...
    }
    public function modify()
    {
      //modifié une information
    }
    private function dbConnect()
    {
      $db = new PDO('mysql:host=localhost;dbname=blog_forteroche;charset=utf8', 'root', 'root');
        return $db;
    }
  }

?>
