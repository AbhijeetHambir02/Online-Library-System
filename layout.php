<!DOCTYPE html>
<html>
    <head>
        <title>Homepage</title>
        <link href="assets/css/layout.css" type="text/css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dela+Gothic+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
                    <a href="index.php">LIBRARY</a>
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
            <div class="profile-pic-div">
                <img src="assets/img/hehe.png" id="photo">
                <input type="file" id="file">
                <label for="file" id="uploadBtn">Choose Photo</label>
                <script src="assets/js/upload.js"></script>
             </div>
            
            <?php

                include "connection/connection.inc.php";  
                // session_start();
                $student_emailid = $_SESSION['student_mailid'];
                // $teacher_emailid = $_SESSION['teacher_mailid'];

                $query_student = "SELECT * FROM students WHERE EMAIL='$student_emailid'";
                // $query_teacher = "SELECT * FROM teacher WHERE email='$teacher_emailid'";
                $student_result = mysqli_query($db_connection,$query_student);
                // $teacher_result = pg_query($db_connection,$query_teacher);
                $student_data = mysqli_fetch_assoc($student_result);
                // $teacher_data = pg_fetch_assoc($teacher_result);
            ?>

             <div class="showname">
                <p> <?php echo $student_data['NAME'] ?> </p>
                <!-- <p> <?php //echo $teacher_data['name'] ?> </p> -->
            </div>
            <div class="menu">
                <div class="home"><a href="index.php"><i class="fas fa-home"></i>Home</a></div>
                <div class="profile"><a id="profileBtn"><i class="far fa-address-card"></i>Profile</a></div>
                <div class="departments"><a href="departments.php"><i class="fa fa-building" aria-hidden="true"></i>Departments</a></div>
                <div class="books"><a href="books.php"><i class="fa fa-book" aria-hidden="true"></i>Books</a></div>
                <div class="issue-books"><a href="issuebooks.php"><i class="fas fa-clipboard-list"></i>Issue Book</a></div>
                <div class="issued-books"><a href="issuedbooks.php"><i class="fas fa-clipboard-check"></i>Issued Books</a></div>
                <div class="return-books"><a href="returnbooks.php"><i class="fa fa-history" aria-hidden="true"></i>Returned Books</a></div>
                <div class="logout"><a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></div>
            </div>
        </div>
        <?php 
            if(isset($student_emailid))
        { ?>
        <div class="mymodal" id="modal">
            <div class="modalcontent">
                <span class="close"><i class="fa fa-times" aria-hidden="true"></i></span>
                
                <div class="myprof">My Profile</div>
                <form method="POST">
                <div class='label'>Email Id:</div>
                <div class="userval"> <input type="text" name="email" value="<?php echo $student_data['EMAIL'] ?>" readonly> </div>
                <div class='label'>Name:</div>
                <div class="userval"> <input type="text" name="name" value="<?php echo $student_data['NAME'] ?>"> </div>
                <div class='label'>Class:</div>
                <div class="userval"> <select name="class" class="cls">
                                        <option value="<?php echo $student_data['CLASS'] ?>"><?php echo $student_data['CLASS'] ?></option>
                                        <option class="b" value="FY">FY</option>
                                        <option class="b" value="SY">SY</option>
                                        <option class="b" value="TY">TY</option>
                                    </select></div>
                <div class='label'>Roll No:</div>
                <div class="userval"> <input type="text" name="rollno" value="<?php echo $student_data['ROLL_NO'] ?>"></div>
                <div class='label'>Department:</div>
                <div class="userval"> <select name="department" class="dept">
                                        <option value="<?php echo $student_data['DEPARTMENT'] ?>"><?php echo $student_data['DEPARTMENT'] ?></option>
                                        <option class="b" value="Computer Science">Computer Science</option>
                                        <option class="b" value="Microbiology">Microbiology</option>
                                        <option class="b" value="Animation">Animation</option>
                                        <option class="b" value="Psychology">Psychology</option>
                                        <option class="b" value="Mathematics">Mathematics</option>
                                    </select></div>
                <div class='label'>Mobile No:</div>
                <div class="userval"> <input type="text" name="phone" value="<?php echo $student_data['MOBILE_NO'] ?>"></div>

                <div class="update"> <input type="submit" name="updateBtn" value="Update profile"> </div>
                </form>
                <div class="note">
                    <p>To update profile select and make changes</p>
                </div>
            </div>
        </div>
        <?php 
        }
        ?>
        <!-- <?php
        //else if(isset($teacher_emailid))
        {?> -->
            <!-- <div class="mymodal" id="modal">
            <div class="modalcontent">
                <span class="close"><i class="fa fa-times" aria-hidden="true"></i></span>
                
                <div class="myprof">My Profile</div>
                <form method="POST">
                <div class='label'>Email Id:</div>
                <div class="userval"> <input type="text" name="email" value="<?php //echo $teacher_data['email'] ?>" readonly> </div>
                <div class='label'>Name:</div>
                <div class="userval"> <input type="text" name="name" value="<?php //echo $teacher_data['name'] ?>"> </div>
                <div class='label'>Teacher Id:</div>
                <div class="userval"> <input type="text" name="teacher_id" value="<?php //echo $teacher_data['teacher_id'] ?>"></div>
                <div class='label'>Department:</div>
                <div class="userval"> <select name="department" class="dept">
                                        <option value="<?php //echo $teacher_data['department'] ?>"><?php //echo $teacher_data['department'] ?></option>
                                        <option class="b" value="Computer Science">Computer Science</option>
                                        <option class="b" value="Microbiology">Microbiology</option>
                                        <option class="b" value="Animation">Animation</option>
                                        <option class="b" value="Psychology">Psychology</option>
                                        <option class="b" value="Mathematics">Mathematics</option>
                                    </select></div>
                <div class='label'>Mobile No:</div>
                <div class="userval"> <input type="text" name="phone" value="<?php //echo $teacher_data['mobileno'] ?>"></div>

                <div class="update"> <input type="submit" name="updateBtn" value="Update profile"> </div>
                </form>
                <div class="note">
                    <p>To update profile select and make changes</p>
                </div>
            </div>
        </div>
        <?php } ?> -->
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
    if(isset($_POST['updateBtn']))
    {
        $name = $_POST['name'];
        $class = $_POST['class'];
        $rollno = $_POST['rollno'];
        $department = $_POST['department'];
        $mobileno = $_POST['phone'];
        // $teacher_id = $_POST['teacher_id'];

        if(isset($student_emailid))
        {
            $query_update = "SELECT * FROM students WHERE EMAIL='$student_emailid'";
            $result1 = mysqli_query($db_connection,$query_update);

            if(mysqli_num_rows($result1)>0)
            {
                mysqli_query($db_connection,"UPDATE students SET NAME='$name', CLASS='$class', ROLL_NO='$rollno', DEPARTMENT='$department', MOBILE_NO='$mobileno' WHERE EMAIL='$student_emailid'");
                echo '<script type="text/javascript"> alert("Updated successfully!") </script>';
            }
            else
            {
                echo '<script type="text/javascript"> alert("User Not Found!!") </script>';
            }
        }
        // else if($teacher_emailid)
        // {
        //     $query_update = "SELECT * FROM teacher WHERE email='$teacher_emailid'";
        //     $result2 = pg_query($db_connection,$query_update);

        //     if(pg_num_rows($result2)>0)
        //     {
        //         pg_query($db_connection,"UPDATE teacher SET name='$name', teacher_id='$teacher_id', department='$department', mobileno='$mobileno' WHERE email='$teacher_emailid'");
        //         echo '<script type="text/javascript"> alert("Updated successfully!") </script>';
        //     }
        //     else
        //     {
        //         echo '<script type="text/javascript"> alert("User Not Found!!") </script>';
        //     }
        // }
    }
?>