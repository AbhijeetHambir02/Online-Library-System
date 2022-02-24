<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Homepage</title>
        <link href="css/layout.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    </head>
<body>
    <div class="main">
        <nav>
            <div class="nav">
                <div class="logo">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="heading">
                    <a href="homepage.php">LIBRARY</a>
                </div>
                <div class="searchbar">
                    <input type="text" name="search" id="search" placeholder="Search...">
                </div>
                <div class="notification">
                <i class="fa fa-bell" aria-hidden="true"></i>
                </div>
            </div>
        </nav>

        <div class="sidepanel">
            <div class="home"><a href="homepage.php"><i class="fas fa-home"></i>Home</a></div>
            <div class="books"><a href="books.php"><i class="fa fa-book" aria-hidden="true"></i>Books</a></div>
            <div class="students"><a href="students.php"><i class="fas fa-user-graduate"></i>Students</a></div>
            <div class="teachers"><a href="departments.php"><i class="fa fa-building" aria-hidden="true"></i>Departments</a></div>
            <div class="issued-books"><a href="issuedbooks.php"><i class="fas fa-clipboard-check"></i>Issued Book</a></div>
            <div class="return-books"><a href="returnbook.php"><i class="fa fa-history" aria-hidden="true"></i>Return Book</a></div>
            <div class="addbook"><a href="addbook.php"><i class="fas fa-folder-plus"></i>Add Books</a></div>
            <div class="history"><a href="history.php"><i class="fas fa-file-alt"></i>History</a></div>
            <div class="logout"><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></div>
        </div>
    </div>
    
    <script>
        var modal=document.getElementById("modal");
        var Btn=document.getElementById("profileBtn");
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        Btn.onclick=function()
        {
            modal.style.display="block";
        }

        span.onclick = function()
        {
            modal.style.display = "none";
        }

        window.onclick=function(event)
        {
            if(event.target==modal)
            {
                modal.style.display="none";
            }
        }
</script>
</body>
</html>

<?php
    // if(isset($_POST['updateBtn']))
    // {
    //     $name = $_POST['name'];
    //     $class = $_POST['class'];
    //     $rollno = $_POST['rollno'];
    //     $department = $_POST['department'];
    //     $mobileno = $_POST['phone'];

    //     $query_update = "SELECT * FROM students WHERE EMAIL='$emailid'";
    //     $result1 = mysqli_query($db_connection,$query_update);

    //     if(mysqli_num_rows($result1)>0)
    //     {
    //         mysqli_query($db_connection,"UPDATE students SET NAME='$name', class='$class', rollno='$rollno', department='$department', mobileno='$mobileno' WHERE email='$emailid'");
    //         echo '<script type="text/javascript"> alert("Updated successfully!") </script>';
    //     }
    //     else
    //     {
    //         echo '<script type="text/javascript"> alert("User Not Found!!") </script>';
    //     }
    // }
?>