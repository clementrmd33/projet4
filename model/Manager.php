<?php

class Manager
{
  protected function bddConnect()
  {
    $bdd = new PDO('mysql:host=db735815705.db.1and1.com;dbname=db735815705', 'dbo735815705', 'Clem-12111991', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    return $bdd;
  }
}
