<?php
    session_start();
    require '../connection/connection.inc.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title> Admin | Login </title>

    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Gruppo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&display=swap" rel="stylesheet">
    
    
    <link href="CSS/admin_login.css" type="text/css" rel="stylesheet">

</head>

<nav>
    <div class="aaa">
    <div class="logo">
        <i class="fas fa-book-open"></i>
        <b>LIBRARY MANAGEMENT SYSTEM</b>
    </div>
    </div>
</nav>

<body>
<!-- login form -->
    <div id="main">
    <form class="myform" method="POST" autocomplete="off">
        <h1><i class="fas fa-user-circle"></i></h1>
        
        <br>
        <div class="inputval">
        <i class="fas fa-user"></i>
        <input name="username" class="inputvalue" type="text" placeholder="Username" required>
        </div>
        <br>
        <div class="inputval">
        <i class="fas fa-lock"></i>
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
        <br>
        <input name="login" class="loginval" type="submit" value="LOGIN">
    </form>
</body>
<html>

<?php
    if(isset($_POST['login']))
    {
        $username=$_POST['username'];
        $password=$_POST['password'];

        $query = "SELECT * FROM admin_login WHERE username='$username' AND password='$password'";
        $result1 = mysqli_query($db_connection,$query);


        if(mysqli_num_rows($result1)>0)
        {
            //valid
            $_SESSION['username']=$username;
            ?>
            <script type="text/javascript"> window.location.href='homepage.php'; </script>
            <?php
        }
        else
        {
            //invalid
            echo '<script type="text/javascript"> alert("Invalid Username or password") </script>';
        }
    }
?>