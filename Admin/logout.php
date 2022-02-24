<?php
    session_start();
    unset($_SESSION['mailid']);
    header("location:./admin_login.php");
?>