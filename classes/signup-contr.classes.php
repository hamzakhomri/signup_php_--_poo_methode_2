<?php

class SignupContr extends signup{

    private $adresse;
    private $aassword;

    public function __constructor($adresse,$password){

        $this->adresse=$adresse;
        $this->password=$password;

    }

    public function singupUser(){

        if($this->emptyInput() == false){
            //echo "Invalid Input";
            header("location : ../index.php?error=emptynput");
            exit();
        }

        $this->setUser($adresse,$password);

    }

    private function emptyInput(){
        $result;
        if(empty($this->adresse) || empty( $this->password))
        {
            $result =false;
        }	

        else
        {
            $result = true;
        }

        return $result;
    }

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

    private function invalidEmail(){

        $result;
        if(!filter_var($this->adresse,FILTER_VAR_VALIDATE_EMAIL)){
            $result =false;
        }

        else{
            $result = true;
        }
        return $result;
    }

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