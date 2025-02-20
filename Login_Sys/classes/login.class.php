<?php
class Login extends Dbh{

    protected function getUser($uid,$pass){
        $st=$this->connect()->prepare('SELECT users_pass FROM users WHERE user_uid=?');
        $hashpass=password_hash($pass,PASSWORD_DEFAULT);
    
        if(!$st->execute(array($uid))){
            $st=null;
        
            header("location: index.php?error=stfailed");
            die();
           
        }
      
      
       

       if($st->rowCount()==0){
        $st=null;
        header("location: index.php?error=user_not_found");
        die();
       }

       $passHased=$st->fetchAll(PDO::FETCH_ASSOC);
       $checkpass=password_verify($pass,$passHased[0]["users_pass"]);

       if(!$checkpass){
        $st=null;
        header("location: index.php?error=wrong_password");
        die();
       }
       else if($checkpass){
        $st=$this->connect()->prepare('SELECT users_pass ,user_uid FROM users WHERE user_uid=?');
        if(!$st->execute(array($uid))){
            $st=null;
        
            header("location: index.php?error=stfailed");
            die();
           
        }
        if($st->rowCount()==0){
            $st=null;
            header("location: index.php?error=user_not_found");
            die();
           }
           $user=$st->fetchAll(PDO::FETCH_ASSOC);
           session_start();
           $_SESSION["user_uid"]=$user[0]["user_uid"];
           $st=null;

       }
       $st=null;
    }






}