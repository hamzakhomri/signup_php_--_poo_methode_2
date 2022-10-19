<?php

class login extends dbh {

    protected function getUser ($adresse,$password) {
        
        $stmt = $this->Coneect()->prepare('SELECT mot_de_passe FROM login WHERE adresse=? OR mot_de_passe=?');


        // THIS $adresse , $password IN IF IS ?? REQUEST BY ORDER
        if(!$stmt->execute(array($adresse,$password)) ) {
            $stmt =null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        if($stmt->rowCount()==0){
            $stmt=null;
            header("location: ../index.php?error=UserNotFound");
            exit();
        }
        
        $pwdHashed=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkpawd=password_verify($password,$pwdHashed[0]["mot_de_passe"]);
        
        if($checkpawd==false){
            $stmt=null;
            header("location: ../index.php?error=WrongPassword");
            exit();
        }
        elseif($checkpawd==true){

            $stmt = $this-> Coneect()->prepare('SELECT mot_de_passe FROM login WHERE adresse=? OR mot_de_passe=? ');
            
            if(!$stmt->execute(array($adresse,$password)) ) {
                $stmt =null;
                header("location: ../index.php?error=stmtfailed");
                exit();
            }

            if($stmt->rowCount()==0){
                $stmt=null;
                header("location: ../index.php?error=UserNotFound");
                exit();
            }

            $user =$stmt->fetchAll(PDO::FETCH_ASSOC);

            session_start();
            $_SESSION["adresse"] = $user[0]["adresse"];
            $_SESSION["mot_de_passe"]=$user[0]["adresse"];


        }
        
        $stmt=null;

        
    }
}

?>