<?php
session_start();
session_unset();
session_destroy();

    echo "<script type = \"text/javascript\">
    window.location = (\"./teachersLogin.php\")
    </script>";  
?>
<!-- Log on to codeastro.com for more projects! -->
