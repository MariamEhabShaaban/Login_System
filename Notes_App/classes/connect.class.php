<?php

class Connect{
public $pdo;
public function __construct(){
    try{
    $dsn="mysql://hostname=localhost;dbname=notes";
    $user="root";
    $pass= "";
    $options=array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION); 
   $this->pdo = new PDO($dsn,$user,$pass,$options);
    }catch(PDOException $e){
        echo "ERROR => ".$e->getMessage()."<br>";
    }
}
public function add_note($title,$des){
    $query="INSERT INTO notes (title,description,note_date) VALUES (?,?,?)";
    $stmt = $this->pdo->prepare($query);
    $date = date("Y-m-d ");
    $stmt->execute(array($title,$des,$date));
    return $stmt;
}
public function get_notes(){
    $query="SELECT * FROM notes";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

public function get_note_by_id($id){
    $query="SELECT * FROM notes WHERE id=?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute(array($id));
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


public function delete_note($id){

   $query="DELETE FROM notes WHERE id=?";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute(array($id));
   
    return $stmt;
}

public function update_note($id,$title, $des){
    $query="UPDATE `notes` SET `title` = ?, `description` = ? WHERE `id` = ?;";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute(array($title, $des,$id));
   return $stmt;
}
}