<?php

class SignupContr extends signup{

    private $adresse;
    private $password;

    public function __construct($adresse,$password){

        $this->adresse=$adresse;
        $this->password=$password;

    }

    public function singupUser(){

        if($this->emptyInput() == false){
            //echo "Invalid Input";
            $parent = dirname($_SERVER['REQUEST_URI']);
            header("Location: $parent/../index.php?error=emptyInput");
            // header ("location : /index.php?error=emptyInput");
            exit();
        }

        $this->setUser($this->adresse,$this->password);

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

    //Not Calling
    private function invalidUid(){

        $result;
        if(!preg_match("/^[a-zA-Z0-9]*$/", $this->adresse))
        {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }

    //Not Calling
    private function invalidEmail(){ 

        $result;
        if(!filter_var($this->adresse,FILTER_VALIDATE_EMAIL)){
            $result =false;
        }

        else{
            $result = true;
        }
        return $result;
    }

    //Not Calling
    private function pwdMatch(){

        $result;
        if($this->password !== $this->password){
            $result =false;
        }

        else{
            $result = true;
        }
        return $result;
    }

    //Not Calling
    private function idCheck(){

        $result;
        if( !$this->chackUser($this->adresse,$this->password)){
            $result =false;
        }

        else{
            $result = true;
        }
        return $result;
    }
}

?>