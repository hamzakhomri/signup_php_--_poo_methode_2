<?php

session_destroy();
session_unset();
session_start();

//header("location:../index.php/?LOGOUT")

$parent = dirname($_SERVER['REQUEST_URI']);
            header("Location: $parent/VerifySession.inc.php");



?> 