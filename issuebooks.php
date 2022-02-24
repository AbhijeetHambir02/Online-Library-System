<?php
    session_start();
    $student_emailid = $_SESSION['student_mailid'];
?>

<!DOCTYPE html>
<html>
    <head>
        <link href="assets/css/issuebooks.css" type="text/css" rel="stylesheet">
        <title> Issue Book </title>
    </head>
<body>
    <div class="container">
        <form action="issuebooks.php" method="POST">
            <div class="inputval">
                <input class="book_id" type="text" name="book_id" placeholder="Book Id" value="<?php if(isset($_POST['book_id'])) echo $_POST['book_id']; ?>" required>
                <input class="searchBtn" type="submit" name="search" value='Search'>
            </div>

            <div class="details">
                <div class="heading">
                    <p>Details:</p>
                </div>

            <?php
                error_reporting(0);
                $book_id = $_POST['book_id'];

                include "connection/connection.inc.php";
                $query = "SELECT * FROM books WHERE BOOK_ID='$book_id'";
                $result = mysqli_query($db_connection,$query);
                $book_data = mysqli_fetch_assoc($result);

                $query1 = "SELECT * FROM students WHERE EMAIL='$student_emailid'";
                $result1 = mysqli_query($db_connection,$query1);
                $student_data = mysqli_fetch_assoc($result1);

                if(isset($_POST['search']))
                {
                    if(mysqli_num_rows($result)>0)
                    {
                        $id=$book_data['BOOK_ID'];
                        $book_name=$book_data['NAME'];
                        $author=$book_data['AUTHOR'];
                        $price=$book_data['PRICE'];
                        $student_name=$student_data['NAME'];
                        $rollno=$student_data['ROLL_NO'];
                        $department=$student_data['DEPARTMENT'];
                        $class=$student_data['CLASS'];
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
                <div class="s4">
                    <label>Issue Date</label>
                    <input type="text" class="date" name="date" value="<?php echo date("d-m-Y") ?>"readonly>
                </div>
                <div class="issue_btn">
                    <input type="submit" class="issueBtn" name="issueBtn" value="Issue Book">
                </div>
            </div>

            <?php
                if(isset($_POST['issueBtn']))
                {
                    $id = $_POST['id'];
                    $book_name = $_POST['book_name'];
                    $author = $_POST['author'];
                    $student_name = $_POST['student_name'];
                    $rollno = $_POST['rollno'];
                    // $department = $_POST['department'];
                    $price=$book_data['price'];
                    $class = $_POST['class'];
                    $date = date("d-m-Y");

                    $query2 = mysqli_query($db_connection,"SELECT * FROM books WHERE BOOK_ID='$id'");
                    $book_qty = mysqli_fetch_assoc($query2);

                    $result2 = mysqli_query($db_connection,"SELECT * FROM students WHERE EMAIL='$student_emailid'");
                    $count = mysqli_num_rows($result2);

                    $result3 = mysqli_query($db_connection,"SELECT * FROM issue_book WHERE BOOK_ID='$id' AND STUDENT_EMAIL='$student_emailid'");

                    $quantity=$book_qty['QUANTITY'];
                    
                    if(mysqli_num_rows($result3)>0)
                    {
                        echo '<script> alert("You have already issued this book!") </script>';
                    }
                    else
                    {
                        if($count<2)
                        {
                            if($quantity>0)
                            {
                                $query4 = "INSERT INTO issue_book VALUES('$id','$student_emailid','$book_name','$author','$student_name','$rollno','$class','$date','$price')";
                                $result4 = mysqli_query($db_connection, $query4);

                                $update = mysqli_query($db_connection,"UPDATE books SET QUANTITY=$quantity-1 WHERE BOOK_ID='$id'");
                                echo '<script> alert("Successfully issued book!\n You have to return it within 7 days") </script>';
                            }
                            else
                            {
                                echo '<script> alert("Book is not available!") </script>';
                            }
                        }
                        else
                        {
                            echo '<script> alert("You have already issued two books!") </script>';
                        }
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