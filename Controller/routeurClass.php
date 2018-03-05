<?php

use \Openclassrooms\Projet4\Controller;

require_once ('Controller/ControlClass.php');

class RouteurClass{

  private $ctrlControl;

  public function __construct(){
    $this->ctrlControl = new ControllClass();
  }

  public function routerRequete(){
    try {
    	if (isset($_GET['action'])) {
    		if($_GET['action'] == 'listChapters'){
    			$this->ctrlControl->listChapters();
    		}
    		elseif ($_GET['action'] == 'loginView') {
    			$this->ctrlControl->loginView();
    		}
    		else {
    			throw new \Exception('Impossible de trouver la page demandé');
    		}
    	}
    	else{
    		require('View/homeView.php');
    	}
    } catch (\Exception $e) {
    	$errorMessage = $e->getMessage();
    }
  }
}
