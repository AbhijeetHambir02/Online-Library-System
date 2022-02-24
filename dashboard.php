<?php
    include ("../Connection/insertt.php");
    session_start();
    error_reporting(0);
    $student_emailid = $_SESSION['student_mailid'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Homepage</title>
        <link href="CSS/dashboard.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Markazi+Text:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">
    </head>
<body>
    <div class="main">
        <nav>
            <div class="nav">
                <div class="logo">
                    <i class="fas fa-book-open"></i>
                </div>
                <div class="heading">
                    <a href="homepage.php">FC COLLEGE</a>
                </div>
            </div>
        </nav>

        <div class="sidepanel">
            <div class="home"><a href="homepage.php"><i class="fas fa-home"></i>Home</a></div>
            <div class="profile"><a id="profileBtn"><i class="far fa-address-card"></i>Profile</a></div>
            <div class="dashboard"><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a></div>
            <div class="departments"><a href="departments.php"><i class="fa fa-building" aria-hidden="true"></i>Departments</a></div>
            <div class="books"><a href="books.php"><i class="fa fa-book" aria-hidden="true"></i>Books</a></div>
            <div class="issue-books"><a href="issuebooks.php"><i class="fa fa-plus-square" aria-hidden="true"></i>Issue Books</a></div>
            <div class="return-books"><a href="returnbooks.php"><i class="fa fa-history" aria-hidden="true"></i>Return Books</a></div>
            <div class="logout"><a href="../Login_page/login.php"><i class="fas fa-sign-out-alt"></i>Logout</a></div>
        </div>
    </div>

        <div class="container">
            <div class="a1">
                <a href="books.php">Books</a>
                <i class="fa fa-book" aria-hidden="true"></i>
            </div>
            <div class="a2">
                <a href="issuebook.php">Issued Books</a>
                <i class="fa fa-plus-square" aria-hidden="true"></i>
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
                <a href="issuebooks.php"> Not Returned</a>
                <i class="fa fa-thumbs-down" aria-hidden="true"></i>
            </div>
        </div>

        <div class="mymodal" id="modal">
            <div class="modalcontent">
                <span class="close"><i class="fa fa-times" aria-hidden="true"></i></span>
                <?php
                    $query_student = "SELECT * FROM userinfo WHERE email='$student_emailid'";
                    $result1 = pg_query($db_connection,$query_student);
                    $data = pg_fetch_assoc($result1);
                ?>
                <div class="myprof">My Profile</div>
                <div class='label'>Email Id:</div>
                <div class="userval"> <?php echo "$emailid" ?></div>
                <div class='label'>Name:</div>
                <div class="userval"> <?php echo $data['name'] ?></div>
                <div class='label'>Class:</div>
                <div class="userval"> <?php echo $data['class'] ?></div>
                <div class='label'>Roll No:</div>
                <div class="userval"> <?php echo $data['rollno'] ?></div>
                <div class='label'>Department:</div>
                <div class="userval"> <?php echo $data['department'] ?></div>
                <div class='label'>Mobile No:</div>
                <div class="userval"> <?php echo $data['phone'] ?></div>
                <div class="update"><a href="updateprofile.php">Update Profile</a></div>
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