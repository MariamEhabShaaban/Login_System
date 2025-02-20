<?php
if($_SERVER['REQUEST_METHOD']==='POST'){
   
 $title = trim($_POST['title']);
 $des=trim($_POST['des']);
 require 'classes/connect.class.php';
 $connect=new Connect();
if($_POST["id"] ){
    $id = $_POST["id"];
    if(!empty($title)  ){ 
        $connect->update_note( $id,$title, $des);
    }
}
else{
    if(!empty($title)  ){ 
    $connect->add_note( $title, $des); 
    } 
}
   header("location:index.php");
}
