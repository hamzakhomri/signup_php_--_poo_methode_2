<?php

session_start();
session_unset();
session_destroy();

header("location:VerifySession.inc.php/?LOGOUT");

// $parent = dirname($_SERVER['REQUEST_URI']);
//             header("Location: $parent/VerifySession.inc.php?error=LOGOUT");
echo "LOUGOUT INC PHP";
?> 
