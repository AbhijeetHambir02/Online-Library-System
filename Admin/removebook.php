<?php
    error_reporting(0);
    include "../connection/connection.inc.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="CSS/removebook.css" type="text/css" rel="stylesheet">
    </head>
<body>
    <div class="container">
        <form action="removebook.php" method="POST">
            <div class="inputval">
                <input class="book_id" type="text" name="book_id" placeholder="Book Id">
                <input class="searchBtn" type="submit" name="search" value='Search'>
            </div>

            <div class="details">
                <div class="heading">
                    <p>Details:</p>
                </div>

            <?php
                $book_id = $_POST['book_id'];

                $query = "SELECT * FROM books WHERE BOOK_ID='$book_id'";
                $result = mysqli_query($db_connection,$query);
                $data = mysqli_fetch_assoc($result);

                if(isset($_POST['search']))
                {
                    if(mysqli_num_rows($result)>0)
                    {
                        $id= $data['BOOK_ID'];
                        $book_name=$data['NAME'];
                        $author=$data['AUTHOR'];
                        $department=$data['DEPARTMENT'];
                        $class=$data['CLASS'];
                        $price=$data['PRICE'];
                    }
                    else
                    {
                        echo '<script> alert("There is no such book") </script>';
                    }
                }
            ?>
            <div class="removebooktable">
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
                <div class="b4">
                    <label>Department</label>
                    <input type="text" class="department" name="department" value="<?php echo $department ?>"readonly>
                </div>
                <div class="b5">
                    <label>Class</label>
                    <input type="text" class="class" name="class" value="<?php echo $class ?>"readonly>
                </div>
                <div class="b6">
                    <label>Price</label>
                    <input type="text" class="price" name="price" value="<?php echo $price ?>"readonly>
                </div>

                <div class="issue_btn">
                    <input type="submit" class="issueBtn" name="returnBtn" value="Remove Book">
                </div>
            </div>
            <?php
                if(isset($_POST['returnBtn']))
                {
                    $id = $_POST['id'];

                    $remove_book = "DELETE FROM books WHERE id='$id'";
                    $query_run = mysqli_query($db_connection,$remove_book);

                    if($result)
                    {
                        echo '<script> alert("Sucess!") </script>';
                    }
                    else
                    {
                        echo '<script> alert("ERROR!") </script>';
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