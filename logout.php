<?php
    session_start();
    setcookie("username","",time()-120);
    if (isset($_SESSION['username'])) {
        unset($_SESSION['username']);
        session_destroy();
    }
    header("Location: login.php");
?>