<?php
    if($_POST['request'])
    {
        $request = $_POST['request'];
        require '../connection/connection.inc.php';
        if($request == 'All')
        {
            $query = "SELECT * FROM students";
        }
        else
        {
            $query = "SELECT * FROM students WHERE CLASS='$request'";
        }
        $result = mysqli_query($db_connection,$query);

        echo '<table border="1px" class="books-table" id="book_table">';
            echo '<tr>';
                echo '<th>'; echo 'Roll No'; echo '</th>';
                echo '<th>'; echo 'Name'; echo '</th>';
                echo '<th>'; echo 'Email Id'; echo '</th>';
                echo '<th>'; echo 'Class'; echo '</th>';
                echo '<th>'; echo 'Department'; echo '</th>';
            echo '</tr>';

            while($data = mysqli_fetch_assoc($result))
            {
                echo '<tr>';
                    echo '<td>'; echo $data['ROLL_NO']; echo '</td>';
                    echo '<td>'; echo $data['NAME']; echo '</td>';
                    echo '<td>'; echo $data['EMAIL']; echo '</td>';
                    echo '<td>'; echo $data['CLASS']; echo '</td>';
                    echo '<td>'; echo $data['DEPARTMENT']; echo '</td>';
                echo '</tr>';
            }
        echo '</table>';
    }
?>