<!DOCTYPE html>
<html>
    <head>
        <link href="css/addbook.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
    </head>
<body>
    <div class="container">
        <form action="addbookdb.php" method="POST">

            <div class="details">
                <div class="heading">
                    <p>Add Book</p>
                </div>

            <div class="issuetable">
                <div class="b1">
                    <label>Book id</label>
                    <input type="text" class="id" name="id" placeholder=".........." required>
                </div>
                <div class="b2">
                    <label>Book Name</label>
                    <input type="text" class="book_name" name="name" placeholder=".........." required>
                </div>
                <div class="b3">
                    <label>Author</label>
                    <input type="text" class="author" name="author" placeholder=".........." required>
                </div>
                <div class="b4">
                    <label>Department</label>
                    <input type="text" class="department" name="department" placeholder=".........." required>
                </div>
                <div class="b5">
                    <label>Class</label>
                    <input type="text" class="class" name="class" placeholder=".........." required>
                </div>
                <div class="b6">
                    <label>Price</label>
                    <input type="text" class="price" name="price" placeholder=".........." required>
                </div>
                <div class="b7">
                    <label>Quantity</label>
                    <input type="text" class="qty" name="quantity" placeholder=".........." required>
                </div>
                
                <div class="issue_btn">
                    <input type="submit" class="issueBtn" name="addbook" value="Add Book">
                </div>
            </div>
            
            </div>
        </form>
    </div>
</body>
</html>



<?php
    include "layout.php";
?>
