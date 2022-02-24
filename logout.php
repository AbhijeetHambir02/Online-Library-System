<?php
    session_start();
    unset($_SESSION['student_mailid']);
    // unset($_SESSION['teacher_mailid']);
    header("location: login/login.php");
    exit();
?>