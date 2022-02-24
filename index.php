<?php
    session_start();
    if(!isset($_SESSION['student_mailid']))
    {
        header('location: login/login.php');
        exit();
    }

    // error_reporting(0);
?>



<!DOCTYPE html>
<html>
    <head>
        <link href="assets/css/homepage.css" type="text/css" rel="stylesheet">
    </head>
<body>
    <div class="container">
        <div class="a1">
            <a href="books.php">Books</a>
            <i class="fa fa-book" aria-hidden="true"></i>
        </div>
        <div class="a2">
            <a href="issuebooks.php">Issue Book</a>
            <i class="fas fa-clipboard-list"></i>
        </div>
        <div class="a3">
            <a href="message.php">Messages</a>
            <i class="fa fa-envelope" aria-hidden="true"></i>
        </div>
        <div class="a4">
            <a href="returnbooks.php">Returned</a>
            <i class="fa fa-thumbs-up" aria-hidden="true"></i>
        </div>
        <div class="a5">
            <a href="issuedbooks.php">Not Returned</a>
            <i class="fa fa-thumbs-down" aria-hidden="true"></i>
        </div>
    </div>
</body>
</html>

<?php
    include "layout.php";
?>