<?php 

namespace App;

class Connection{

    public function getDb(){
        try{
            $conn = new \PDO(
                "mysql:host=localhost;dbname=mvc;charset=utf8",
                "root",
                "");

            return $conn;
        }catch(\PDOException $e){
            //tratar erro//
            echo "Erro na conexao com banco";
        }
    }
}

?>