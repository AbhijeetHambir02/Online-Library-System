<?php
    if($_POST['request'])
    {
        
        $request = $_POST['request'];
        include '../connection/connection.inc.php';
        if($request == 'All')
        {
            $query = "SELECT * FROM books";
        }
        else
        {
            $query = "SELECT * FROM books WHERE CLASS='$request'";
        }
        $result = mysqli_query($db_connection,$query);

        echo '<table border="1px" class="books-table">';
            echo '<tr>';
            echo '<th>'; echo 'Book Id'; echo '</th>';
            echo '<th>'; echo 'Book Name'; echo '</th>';
            echo '<th>'; echo 'Author'; echo '</th>';
            echo '<th>'; echo 'Quantity'; echo '</th>';
            echo '</tr>';

            while($data = mysqli_fetch_assoc($result))
            {
                echo '<tr>';
                echo '<td>'; echo $data['BOOK_ID']; echo '</td>';
                echo '<td>'; echo $data['NAME']; echo '</td>';
                echo '<td>'; echo $data['AUTHOR']; echo '</td>';
                echo '<td>'; echo $data['QUANTITY']; echo '</td>';
                echo '</tr>';
            }
        echo '</table>';
}
?>