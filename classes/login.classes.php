<?php

class login extends dbh {

    protected function getUser ($adresse,$password) {

        $stmt = $this->Coneect()->prepare('SELECT * FROM login WHERE adresse=? OR mot_de_passe=?');

        // THIS $adresse , $password IN IF IS ?? REQUEST BY ORDER
        if(!$stmt->execute(array($adresse,$password)) ) {
            $stmt =null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        //VERIFICATION USER (adresse and password) IF EXISIT OR NOT
        if($stmt->rowCount()==0){
            $stmt=null;
            header("location: ../index.php?error=UserNotFound_1");
            exit();
        }

        //VERIFICATION ADRESSE IF EXISTS OR NOT
        
        if()

        //VERIFICATION PASSWORD IF EXISIT OR NOT

        $pwdHashed=$stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkpawd=password_verify($password,$pwdHashed[0]["mot_de_passe"]);
        
        if($checkpawd==false){
            $stmt=null;
            header("location: ../index.php?error=WrongPassword_1");
            exit();                  
        }


        elseif($checkpawd==true){
            $stmt = $this ->Coneect()->prepare('SELECT adresse FROM login WHERE adresse=?');

            if(!$stmt-> execute(array($adresse))){
                $stmt=null;
                header("locaton: ../index.php?error=stmtfailed");
                exit();
            }
            if(!$stmt->rowCount()==0){
                $stmt=null;
                header("location: ../index.php?error=WrongAdresse");
                exit();
            }

        }
     
        

            // I DONT KNOW IF WORK OR NOT AND HOW DOES'T WORK_w 
        // if($checkpawd==true){

        //     $stmt = $this-> Coneect()->prepare('SELECT * FROM login WHERE  mot_de_passe=? ');
            
        //     if(!$stmt->execute(array($password)) ) {
        //         $stmt =null;
        //         header("location: ../index.php?error=stmtfailed");
        //         exit();
        //     }

        //     if($stmt->rowCount()==0){
        //         $stmt=null;
        //         header("location: ../UserNotFound.php?error=UserNotFoundPassword_2");
        //         exit();
        //     }

        //     $user =$stmt->fetchAll(PDO::FETCH_ASSOC);

        //     session_start();
        //     $_SESSION["adresse"] = $user[0]["adresse"];
        //     $_SESSION["mot_de_passe"]=$user[0]["adresse"];
        //     exit();

        // }
        
        $stmt=null;

        
    }
}

?>