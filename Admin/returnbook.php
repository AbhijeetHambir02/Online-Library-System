<!DOCTYPE html>
<html>
    <head>
        <link href="CSS/returnbook.css" type="text/css" rel="stylesheet">
    </head>
<body>
    <div class="container">
        <form action="returnbook.php" method="POST">
            <div class="inputval">
                <input class="book_id" type="text" name="book_id" placeholder="Book Id" value="<?php if(isset($_POST['book_id'])) echo $_POST['book_id']; ?>" required>
                <input class="roll_no" type="text" name="roll_no" placeholder="Roll No" value="<?php if(isset($_POST['roll_no'])) echo $_POST['roll_no']; ?>" required>
                <input class="searchBtn" type="submit" name="search" value='Search'>
            </div>

            <div class="details">
                <div class="heading">
                    <p>Details:</p>
                </div>

            <?php

                error_reporting(0);
                $book_id = $_POST['book_id'];
                $roll_no = $_POST['roll_no'];

                // session_start();
                // $student_emailid = $_SESSION['student_mailid'];
                include "../connection/connection.inc.php";
                $query = "SELECT * FROM issue_book WHERE BOOK_ID='$book_id' AND ROLL_NO='$roll_no'";
                $result = mysqli_query($db_connection,$query);
                $data = mysqli_fetch_assoc($result);

                if(isset($_POST['search']))
                {
                    if(mysqli_num_rows($result)>0)
                    {
                        $id= $data['BOOK_ID'];
                        $book_name=$data['BOOK_NAME'];
                        $author=$data['AUTHOR'];
                        $price=$data['PRICE'];
                        $student_emailid=$data['STUDENT_EMAIL'];
                        $student_name=$data['STUDENT_NAME'];
                        $rollno=$data['ROLL_NO'];
                        $class=$data['CLASS'];
                        $date=$data['DATE'];
                    }
                    else
                    {
                        echo '<script> alert("There is no such book") </script>';
                    }
                }
            ?>
            <div class="issuetable">
                <div class="b1">
                    <label>Book id</label>
                    <input type="text" class="id" name="id" value="<?php echo $id ?>" readonly>
                </div>
                <div class="b2">
                    <label>Book Name</label>
                    <input type="text" class="book_name" name="book_name" value="<?php echo $book_name ?>"readonly>
                </div>
                <div class="b3">
                    <label>Author</label>
                    <input   type="text" class="author" name="author" value="<?php echo $author ?>"readonly>
                </div>
                <div class="s1">
                    <label>Student Name</label>
                    <input type="text" class="student_name" name="student_name" value="<?php echo $student_name ?>"readonly>
                </div>
                <div class="s2">
                    <label>Roll No</label>
                    <input type="text" class="rollno" name="rollno" value="<?php echo $rollno ?>"readonly>
                </div>
                <div class="s3">
                    <label>Class</label>
                    <input type="text" class="class" name="class" value="<?php echo $class ?>"readonly>
                </div>
                <div class="s6">
                    <label>Email Id</label>
                    <input type="text" class="email" name="email" value="<?php echo $student_emailid ?>"readonly>
                </div>
                <div class="s4">
                    <label>Issue Date</label>
                    <input type="text" class="date" name="issuedate" value="<?php echo $date ?>"readonly>
                </div>
                <div class="s5">
                    <label>Return Date</label>
                    <input type="text" class="date" name="date" value="<?php echo date("d-m-Y") ?>"readonly>
                </div>
                
                <div class="issue_btn">
                    <input type="submit" class="issueBtn" name="returnBtn" value="Return Book">
                </div>
            </div>
            <?php
                if(isset($_POST['returnBtn']))
                {
                    $id = $_POST['id'];
                    $book_name = $_POST['book_name'];
                    $author = $_POST['author'];
                    $price=$data['price'];
                    $student_name = $_POST['student_name'];
                    $rollno = $_POST['rollno'];
                    $department = $_POST['department'];
                    $class = $_POST['class'];
                    $issue_date = $_POST['issuedate'];
                    $date = date("d-m-Y");
                    $emailid=$_POST['email'];    

                    $query_qty = "SELECT * FROM issue_book WHERE BOOK_ID='$id' AND ROLL_NO='$rollno'";
                    $result_qty = mysqli_query($db_connection,$query_qty);
                    $qty = mysqli_num_rows($result_qty);


                    
                    if($qty>0)
                    {
                        $remove_book = "DELETE FROM issue_book WHERE BOOK_ID='$id' AND ROLL_NO='$rollno'";
                        $query_run = mysqli_query($db_connection,$remove_book);

                        $query1 = "INSERT INTO return_book VALUES('$id','$book_name','$student_name','$rollno','$class','$emailid','$author','$price','$issue_date','$date')";
                        $result1 = mysqli_query($db_connection,$query1);

                        $query2 = "SELECT QUANTITY FROM books WHERE BOOK_ID='$id'";
                        $result2 = mysqli_query($db_connection, $query2);
                        $book_qty = mysqli_fetch_assoc($result2);
                        $quantity = $book_qty['QUANTITY'];

                        $update = mysqli_query($db_connection,"UPDATE books SET QUANTITY=$quantity+1 WHERE BOOK_ID='$id'");
                        echo '<script> alert("Sucess!") </script>';
                    }
                    else
                    {
                        // echo '<script> alert("ERROR!") </script>';
                    }
                }
            ?>
            </div>
        </form>
    </div>
</body>
</html>

<?php
    include "layout.php";
?>