<?php

class dbh{

    protected function Coneect(){

        try{

            $username="root";
            $password="";
            $dbh = new PDO('mysql:host=localhost;dbname=motoristyle_db',$username,$password);
          
            return $dbh;

        }
        catch(PDOException $e){
            print "ERROR :".$e->getMessage()."<br/>";
            die;
        }

    }



    }
?>