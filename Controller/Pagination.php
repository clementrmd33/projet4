<?php

use \Openclassrooms\Projet4\Controller;

class Pagination
{
  private $_nbreTotalChapitres;
  private $_nbreChapitresParPage;
  private $_nbrePages;
  private $_numeroPage;

  function __construct($Nbrpage)
  {
    this->TotalParPage($Nbrpage);
  }

  public function TotalChapitres()
  {
    $this->_nbreTotalChapitres = $pagiPosts->rowCount();
  }

  public function TotalParPage($Nbrpage)
  {
    if ($this->_nbreChapitresParPage > 1)
    {
      $this->_nbreChapitresParPage = 1;
    }
    elseif ($this->_nbreChapitresParPage < 1)
    {
      $this->_nbreChapitresParPage = 1;
    }
  }

  public function TotalPages()
  {
    $this->_nbrePages = ceil($this->_nbreTotalChapitres/$this->_nbreChapitresParPage);
  }

  public function PageActuel()
  {
    if (isset($_GET['page'] && is_numeric($_GET['page'])) {
      $_numeroPage = $_GET['page'];
    }else {
      $_numeroPage = 1;
    }
    if ($_numeroPage < 1) {
      $_numeroPage = 1;
    }elseif ($_numeroPage > $_nbrePages) {
      $_numeroPage = 1;
    }
  }
}
