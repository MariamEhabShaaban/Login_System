<?php
if(isset($_POST["delete"]) ){
    
require 'classes/connect.class.php';
$connect=new Connect();
$connect->delete_note($_POST["delete"]);
header("location:index.php");
}