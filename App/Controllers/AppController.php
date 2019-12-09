<?php 

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AppController extends Action{

    
    public function timeline(){ 

            $this->validateAuth();            
            $tweet = Container::getModel('tweet');
            $tweet->__set('id_usuario',$_SESSION['id']);
            $this->view->tweets = $tweet->getAllTweets();            
            $this->render("timeline");
    }

    public function tweet(){ 

            $this->validateAuth();      
            $tweet = Container::getModel('Tweet');
            $tweet->__set('tweet',$_POST['tweet_text']);
            $tweet->__set('id_usuario',$_SESSION['id']);
            $tweet->saveTweet();
            header('location:/timeline');
    }

    public function validateAuth(){
        session_start();
        if(!isset($_SESSION['id']) || !isset($_SESSION['name'])){
            header('location:/?statusLogin=1'); 
        }else{
            return true;
        }       
    }
}

?>