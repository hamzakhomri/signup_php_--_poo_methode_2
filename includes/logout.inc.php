<?php

session_start();
session_unset();
session_destroy();

//header("location:../index.php/?LOGOUT")

$parent = dirname($_SERVER['REQUEST_URI']);
            header("Location: $parent/../index.php?error=LOGOUT");

?> 