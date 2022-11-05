<?php


if( isset($_POST["submit"]) )
{
    //Grabbing the data
    $adresse =$_POST["adresse"];
    $password =$_POST["password"];

    //Instantiate signupContr class
    
    
    include "../classes/dbh.classes.php";
    include "../classes/login.classes.php";
    include "../classes/login-contr.classes.php";

    $login = new loginContr($adresse,$password);


    //Running error hadlers && user signup
    
    $login->loginUser();
    
    //Going back to front page
    header("location: SessionStart.inc.php");


    // $parent = dirname($_SERVER['REQUEST_URI']);
    // header("Location: $parent/index.php");


}
?>