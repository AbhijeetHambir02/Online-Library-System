<?php
    if(isset($_POST['addbook']))
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $author = $_POST['author'];
        $department = $_POST['department'];
        $class = $_POST['class'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        include "../connection/connection.inc.php";
        $query = "INSERT INTO books VALUES('$id','$name','$author','$price','$quantity','$department','$class')";
        $result = mysqli_query($db_connection,$query);

        if($result)
        {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Book Added Successfully !');
            window.location.href='addbook.php';
            </script>");
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Error !');
            window.location.href='addbook.php';
            </script>");
        }
    }
?>
