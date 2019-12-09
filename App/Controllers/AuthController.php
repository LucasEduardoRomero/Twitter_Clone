<?php 

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action{    
  
    public function auth(){
        
        $usuario = Container::getModel('User');
        $usuario->__set('email',$_POST['login_email']);
        $usuario->__set('password',md5($_POST['login_password']));      
        $usuario = $usuario->authUser();
        if( $usuario->__get('id') != '' && $usuario->__get('name') != ''){  
            session_start();
            $_SESSION['id'] = $usuario->__get('id');
            $_SESSION['name'] = $usuario->__get('name');           
            header('location:/timeline');
        }else{ 
            header('location:/?statusLogin=1'); 
        }
    } 
    
    public function quit(){
        session_start();
        session_destroy();
        header('location:/');
    }

}   
?>
