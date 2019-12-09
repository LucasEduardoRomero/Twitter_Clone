<?php 

namespace App\Models;
use MF\Model\Model;

class Tweet extends Model{

    private $id;
    private $id_usuario;
    private $tweet;
    private $data;

    public function __get($attr){
        return $this->$attr;
    }
    public function __set($attr,$val){
        $this->$attr = $val;
    }


    public function saveTweet(){
        $query = "INSERT INTO tweets (id_usuario,tweet)
        VALUES (:id_usuario,:tweet)";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id_usuario",$this->id_usuario);
        $stmt->bindValue(":tweet",$this->tweet);
        $stmt->execute();        
        
        return $this;
    }

    public function getAllTweets(){
        $query = "SELECT t.id,t.id_usuario,u.nome,t.tweet,DATE_FORMAT(t.data,'%d/%m/%Y %H:%i') as data
        FROM tweets as t LEFT JOIN users as u on (t.id_usuario = u.id)
        WHERE id_usuario = (:id_usuario)
        ORDER BY data desc";
        $stmt = $this->db->prepare($query);
        $stmt->bindValue(":id_usuario",$this->id_usuario);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
?>