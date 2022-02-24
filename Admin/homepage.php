<?php
    include ("../connection/connection.inc.php");
    session_start();
    error_reporting(0);
    $username = $_SESSION['username'];

    if(!isset($_SESSION['username']))
    {
        header('location:admin_login.php');

    }
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="CSS/homepage.css" type="text/css" rel="stylesheet">
    </head>
<body>
    <div class="container">
        <div class="a1">
            <a href="books.php">Books</a>
            <i class="fa fa-book" aria-hidden="true"></i>
        </div>
        <div class="a2">
            <a href="students.php">Students</a>
            <i class="fas fa-user-graduate"></i>
        </div>
        <div class="a3">
            <a href="departments.php">Departments</a>
            <i class="fa fa-building" aria-hidden="true"></i>
        </div>
        <div class="a4">
            <a href="returnbook.php">Return Book</a>
            <i class="fa fa-history" aria-hidden="true"></i>
        </div>
        <div class="a5">
            <a href="addbook.php">Add Book</a>
            <i class="fas fa-folder-plus"></i>
        </div>
        <div class="a6">
            <a href="removebook.php">Remove Book</a>
            <i class="fas fa-trash-alt"></i>
        </div>
    </div>
</body>
</html>

<?php
    include "layout.php";
?>