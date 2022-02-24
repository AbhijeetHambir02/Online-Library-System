<?php
    include '../connection/connection.inc.php';

    if(isset($_POST['signup_btn']))
    {
        // $status=isset($_POST['st']) ? $_POST['st'] : '';

        // if($status == "Student")
        // {
        //     header('location:student_signup.php');
        //     exit();
            
        // }
        // else if($status == "Teacher")
        // {
        //     header('location:teacher_signup.php');
        //     exit();
            
        // }
        // else
        // {
        //     echo ("<script LANGUAGE='JavaScript'>
        //     window.alert('Please select your status !');
        //     window.location.href='student_signup.php';
        //     </script>");
        // // }

        header('location: student_signup.php');
        exit();
    }

//main form
    if(isset($_POST['login']))
    {
        $mail=$_POST['mail'];
        $password=$_POST['password'];

        $query = "SELECT * FROM students WHERE EMAIL='$mail' AND PASSWORD='$password'";
        $result = mysqli_query($db_connection,$query);

        // $query_teacher = "SELECT * FROM teacher WHERE email='$mail' AND password='$password'";
        // $result2 = mysqli_query($db_connection,$query_teacher);

        if(mysqli_num_rows($result)>0)
        {
            //valid
            session_start();
            $_SESSION['student_mailid']=$mail;
            header('location: ../index.php');
            exit();
        }
        // else if(pg_num_rows($result2)>0)
        // {
        //     $_SESSION['teacher_mailid']=$mail;
        // }
        else
        {
            //invalid
            echo "<script LANGUAGE='JavaScript'>
            window.alert('Invalid Username or PAssword !');
            window.location.href='login.php';
            </script>";
        }
    }

?>
<!-- change password modal -->
<?php
    if(isset($_POST['update']))
    {
        $username=$_POST['username'];
        $resetpas=$_POST['resetpas'];
        $cresetpas=$_POST['cresetpas'];

        if($resetpas == $cresetpas)
        {
            $query_student = "SELECT * FROM students WHERE EMAIL='$username'";
            $result1 = mysqli_query($db_connection,$query_student);

            if(mysqli_num_rows($result1)>0)
            {
                pg_query($db_connection,"UPDATE students SET PASSWORD='$cresetpas' WHERE EMAIL='$username'");
                echo '<script type="text/javascript"> alert("Password updated succesfully!") </script>';
            }
            else
            {
                echo '<script type="text/javascript"> alert("User Not Found!!") </script>';
            }
        }
        else
        {
            echo '<script type="text/javascript"> alert("Password and confirm password does not match!") </script>';
        }      
    }
?>