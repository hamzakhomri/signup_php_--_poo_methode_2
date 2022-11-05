<?php

class loginContr extends login{

    private $adresse;
    private $password;

    public function __construct($adresse,$password){

        $this->adresse=$adresse;
        $this->password=$password;

    }

    public function getAllUsers()
    {
        $this ->getUsers();    
    }

    public function loginUser(){

        if($this->emptyInput() == false){
            //echo "Invalid Input";
            $parent = dirname($_SERVER['REQUEST_URI']);
            header("Location: $parent/../index.php?error=emptyInput");
            echo '<script>alert("empty input")</script>';
            
            // header ("location : /index.php?error=emptyInput");

            
            exit();
        }
        $this->getUser($this->adresse,$this->password);

    }
    
    private function emptyInput(){

       $result;
        if( empty($this->adresse) || empty( $this->password))
        {
            $result =false;
        }	

        else
        {
            $result = true;
        }

        return $result;
    }
}

?>