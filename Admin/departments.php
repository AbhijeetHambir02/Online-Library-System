<?php
    include "../connection/connection.inc.php";
    session_start();
    error_reporting(0);
    $student_emailid = $_SESSION['student_mailid'];
?>

<!DOCTYPE html>
<html>
    <head>
    <link href="../assets/css/departments.css" type="text/css" rel="stylesheet">

    
    </head>
<body>
    <div class="container">
        <form action="departmentbooks.php" method="POST">
        <div class="a1">
            <a href="departmentbooks.php?dept=Computer Science"><input name="CS" value="Computer Science"></a>
        </div>
        <div class="a2">
        <a href="departmentbooks.php?dept=Animation"><input name="Animation" value="Animation"></a>
        </div>
        <div class="a3">
        <a href="departmentbooks.php?dept=Microbiology"><input name="Microbiology" value="Microbiology"></a>   
        </div>
        <div class="a4">
        <a href="departmentbooks.php?dept=Mathematics"><input name="Mathematics" value="Mathematics"></a>
        </div>
        <div class="a5">
        <a href="departmentbooks.php?dept=Psychology"><input name="Psychology" value="Psychology"></a>   
        </div>
</form>
    </div>
</body>
</html>

<?php
    include "layout.php";
?>