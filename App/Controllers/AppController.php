<?php 

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action{

    
    public function timeline(){ 
        session_start(); 
        if(($_SESSION['id'] != '') && ($_SESSION['name'] != '')){
            //imprimir timeline!
            $this->render("timeline");
        }else{
            header('location:/?statusLogin=1'); 
        }

    }


}

?>