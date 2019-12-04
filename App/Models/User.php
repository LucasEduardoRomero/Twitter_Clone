<?php 

namespace App\Models;
use MF\Model\Model;

class User extends Model{

    private $id;
    private $name;
    private $email;
    private $password;

    public function __get($attr){
        return $this->$attr;
    }
    public function __set($attr,$val){
        $this->$attr = $val;
    }
    public function getUserByEmail(){
        $query = "SELECT nome,email FROM users WHERE email = (:email);";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":email",$this->__get('email'));
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }
    //Retorna verdadeiro se o registro é um usuário valido a se cadastrar
    // ou falso caso não seja.
    public function validateRegister(){
        $validate = true;
        if( strlen($this->name) < 3 || strlen($this->email) < 8 || strlen($this->password) < 6 ){
            $validate = false;            
        }    
        return $validate;
    }
    //Salvar Usuario
    public function saveUser(){
        $query = "INSERT INTO users (nome,email,senha) VALUE (:nome,:email,:senha);";
        $stmt = $this->db->prepare($query);
        $stmt->bindvalue(":nome",$this->__get('name'));
        $stmt->bindvalue(":email",$this->__get('email'));
        $stmt->bindvalue(":senha",$this->__get('password'));
        $stmt->execute();
        return $this;        
    }
    public function authUser(){
        $query = "SELECT id,nome,email
        FROM users
        WHERE email = (:email) AND senha = (:senha)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":email",$this->__get('email'));
        $stmt->bindValue(":senha",$this->__get('password'));
        $stmt->execute();
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }
    public function editUser(){}
    public function removeUser(){}

}
?>