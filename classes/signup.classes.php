<?php

class signup extends dbh {

    protected function setUser ($adresse,$password) {
        
        $stmt = $this->Coneect()->prepare('INSERT INTO login (adresse,mot_de_passe)values (?,?);');

        $hashedPwd = password_hash($password,PASSWORD_DEFAULT);

        if(!$stmt->execute(array($adresse,$hashedPwd)) ) {
            $stmt =null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }
        $stmt=null;

        
    }

    protected function chackUser ($adresse,$password) {
        
        $stmt = $this->Coneect()->prepare('SELECT * FROM login where adresse=? OR mot_de_passe=?;');

        if(!$stmt->execute(array($adresse,$password)) ) {
            $stmt =null;
            header("location: ../index.php?error=stmtfailed");
            exit();
        }

        $reusltChack;

        if( $stmt->rowCount() > 0 ) {
            $reusltChack=false;
        }

        else{
            $reusltChack=true;
        }

        return $reusltChack;
    }



}

?>