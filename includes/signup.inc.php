<?php


if( isset($_POST["submit"]) )
{
    //Grabbing the data
    $adresse =$_POST["adresse"];
    $password =$_POST["password"];

    //Instantiate signupContr class

    include "../calsses/dbh.classes.php";
    include "../calsses/sigup.classes.php";
    include "../calsses/sigup-contr.classes.php";

    $signup = new SignupContr($adresse,$password);


    //Running error hadlers && user signup
    $signup->singupUser();

    //Going back to front page
    header("location:../index.php?error=none");

}
?>