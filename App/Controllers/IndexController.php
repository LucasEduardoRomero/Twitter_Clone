<?php 

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action{
    
  public function index(){
    $this->view->statusLogin = isset($_GET['statusLogin']) ? $_GET['statusLogin'] : '' ;
    $this->render('index');
  } 
  public function inscreverse(){
    $this->view->statusCadastro = 0; 
    $this->view->usuario = array(
      'name' => "",
      'email' => "",
      'password' => ""
    );
    $this->render('inscreverse');
  }   
  public function register(){

    $usuario = Container::getModel('User');
    $usuario->__set('name',$_POST['user_name']);
    $usuario->__set('email',$_POST['user_email']);
    $usuario->__set('password',md5($_POST['user_password']));

    if($usuario->validateRegister()){
      if(count($usuario->getUserByEmail()) == 0){
        $usuario->saveUser();  
        $this->render('cadastro');
      }else{
        $this->view->statusCadastro = 2; //CODIGO 2 = EMAIL JA CADASTRADO   
        $this->view->usuario = array(
          'name' => $_POST['user_name'],
          'email' => $_POST['user_email'],
          'password' => $_POST['user_password']
        );
        $this->render('inscreverse');
      }      
    }else{        
        $this->view->statusCadastro = 1; //CODIGO 1 = CAMPOS INVALIDOS
        $this->view->usuario = array(
          'name' => $_POST['user_name'],
          'email' => $_POST['user_email'],
          'password' => $_POST['user_password']
        );
        $this->render('inscreverse');
        
    }  
      
   
  }  
}
?>