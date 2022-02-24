<?php

    include '../connection/connection.inc.php';

    if(isset($_POST['signup_btn']))
    {
        $name=$_POST['username'];
        $email=$_POST['email'];
        $class=$_POST['Class'];
        $rollno=$_POST['rollno'];
        $dept=$_POST['department'];
        $mobileno=$_POST['mobile'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        
        $mobb="/^\d{4}$/";
        $mob="/^\d{10}$/";

        if(!preg_match($mob,$mobileno))
        {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Entered Mobile Number is incorrect !');
            window.location.href='student_signup.php';
            </script>");
        }
        else if(!preg_match($mobb,$rollno))
        {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Invalid Roll Number !');
            window.location.href='student_signup.php';
            </script>");
        }
        else if(strlen($password)<5)
        {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Password should contain at least 6 characters !');
            window.location.href='student_signup.php';
            </script>");
        }
        else if($password==$cpassword)
        {
            $query = "SELECT * FROM students WHERE ROLL_NO='$rollno'";
            $result = mysqli_query($db_connection,$query);

            if(mysqli_num_rows($result)>0)
            {
                echo "<script LANGUAGE='JavaScript'>
                window.alert('User already exists !');
                window.location.href='student_signup.php';
                </script>";
            }
            else
            {
                echo "<script LANGUAGE='JavaScript'>
                window.alert('Your Account Created Successfully ! ');
                window.location.href='login.php';
                </script>";

                $query1 = "INSERT INTO students VALUES (DEFAULT, '$rollno', '$name', '$email', '$class', '$dept', '$mobileno', '$password')";
                $result1 = mysqli_query($db_connection, $query1);


            }
        }
        else
        {
            echo ("<script LANGUAGE='JavaScript'>
            window.alert('Password and Confirm password does not match!');
            window.location.href='student_signup.php';
            </script>");
        }  
    }        
?>