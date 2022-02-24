<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'root');
   define('DB_PASSWORD', '');
   define('DB_DATABASE', 'lms');
   $db_connection = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);


   if($db_connection === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>