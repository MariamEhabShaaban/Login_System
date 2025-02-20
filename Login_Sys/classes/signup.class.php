<?php
class Signup extends Dbh{

    protected function setUser($uid,$pass,$email){
        $st=$this->connect()->prepare('INSERT INTO users (user_uid ,users_pass,users_email) VALUES (?,?,?);');
        $hashpass=password_hash($pass,PASSWORD_DEFAULT);
    
        if(!$st->execute(array($uid,$hashpass,$email))){
            $st=null;
        
            header("location: index.php?error=stfailed");
            die();
           
        }
      
        $st=null;
       }
    
    



   protected function checkUser($uid,$email){
    $st=$this->connect()->prepare('SELECT users_id FROM users WHERE user_uid=? OR users_email=?;');

    if(!$st->execute(array($uid,$email))){
        $st=null;
      
        header("location: index.php?error=stfailed");
        die();
   
    }
    $resultCheck=true;
    if($st->rowCount()>0){
         $resultCheck=false;
    }
   
    return $resultCheck;

   }




}