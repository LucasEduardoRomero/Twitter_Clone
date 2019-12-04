<?php 

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class AuthController extends Action{    
  
    public function auth(){
        
        $usuario = Container::getModel('User');
        $usuario->__set('email',$_POST['login_email']);
        $usuario->__set('password',$_POST['login_password']);      
        $usuario = $usuario->authUser();
        if($usuario->id != '' && $usuario->name != '' && $usuario->email != ''){
            //renderiza timeline
        }else{
            //erro: esse usuario nao existe
        }
    }  

}   
?>
