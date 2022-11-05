<?php

if(isset($_SESSION)){
        echo "Session On";
    }
    else{
        echo "Session Off";
    }
?>
<br><a href="logout.inc.php">LOUGOUT</a>