<?php
    //error_reporting(0);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration </title>

    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">
    <link href="../assets/css/signup.css" type="text/css" rel="stylesheet">
</head>
<body>
    
    <div class="main">
        <h1><a href="student_signup.php"><i class="fas fa-user-plus" aria-hidden="true"></i></a></h1>
    <form class="myform" action="student_signupdb.php" method="POST" autocomplete="off">
        
        <div class="inputval">
        <i class="fas fa-user"></i>
        <input name="username" class="inputvalue" type="text" placeholder="Name" required>
        </div>

        <div class="inputval">
        <i class="fa fa-envelope" aria-hidden="true"></i>
        <input name="email" class="inputvalue" type="email" placeholder="Email-Id" required>
        </div>

        <div class="class">
        <i class="fa fa-users" aria-hidden="true"></i>
        <select name="Class" class="cls" required>
            <option disabled selected value="">Class</option>
            <option class="b" value="FY">FY</option>
            <option class="b" value="SY">SY</option>
            <option class="b" value="TY">TY</option>
        </select>

        <i class="fa fa-list-ol" aria-hidden="true"></i>
        <input name="rollno" class="rollno" type="text" placeholder="Roll.No" required>
        </div>

        <div class="department">
        <i class="fa fa-building" aria-hidden="true"></i>
        <select name="department" class="dept" required>
            <option disabled selected value="">Department</option>
            <option class="b" value="Computer Science">Computer Science</option>
            <option class="b" value="Microbiology">Microbiology</option>
            <option class="b" value="Animation">Animation</option>
            <option class="b" value="Psychology">Psychology</option>
            <option class="b" value="Mathematics">Mathematics</option>
        </select>
        </div>

        <div class="inputval">
        <i class="fa fa-phone-square" aria-hidden="true"></i>
        <input name="mobile" class="inputvalue" type="text" placeholder="Mobile Number" required>
        </div>

        <div class="inputval">
        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
        <i class="far fa-eye" id="togglePassword"></i>
        <input name="password" id="password" class="inputvalue" type="password" placeholder="Password" required>
        </div>
        
        <script>
            const togglePassword = document.querySelector('#togglePassword');
            const password = document.querySelector('#password');
    
            togglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
            });
        </script>

        <div class="inputval">
        <i class="fas fa-lock"></i>
        <i class="far fa-eye" id="ctogglePassword"></i>
        <input name="cpassword" id="cpassword" class="inputvalue" type="password" placeholder="Confirm Password" required>
        </div>
        <script>
            const ctogglePassword = document.querySelector('#ctogglePassword');
            const cpassword = document.querySelector('#cpassword');
    
            ctogglePassword.addEventListener('click', function (e) {
            // toggle the type attribute
            const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
            cpassword.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
            });
        </script>
        
        <input name="signup_btn" class="registerval" type="submit" value="SIGN UP">
        
    </form>
    </div>
    <div class="alusertext">
        <a href="#">Already have an account?</a>
    </div>

    <div class="aluser">    
        <a href="login.php">Sign in</a>
    </div>
</body>
</html>
