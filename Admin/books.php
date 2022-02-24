<!DOCTYPE html>
<html>
<head>
    <link href="CSS/books.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="heading">
          <p>Books</p>
     </div>
        <div class="sort-books">
            Search By Year:
            <select name="year" id="fetchval">
                <option value="All">All</option>
                <option value="FY">FY</option>
                <option value="SY">SY</option>
                <option value="TY">TY</option>
            </select>
        </div>
         
        <div class="table-container">
            <?php
                require '../connection/connection.inc.php';

                $query = "SELECT * FROM books ORDER BY BOOK_ID";
                $result = mysqli_query($db_connection,$query);

                echo '<table border="1px" class="books-table" id="book_table">';
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
            ?>
        </div>
    </div>

    <script>
        $(document).ready(function(){  
            $('#search').keyup(function(){  
                search_table($(this).val());  
            });  
            function search_table(value){  
                $('#book_table tr').each(function(){  
                        var found = 'false';  
                        $(this).each(function(){  
                            if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)
                            {  
                                found = 'true';  
                            }  
                        });  
                        if(found == 'true')  
                        {  
                            $(this).show();  
                        }  
                        else  
                        {  
                            $(this).hide();  
                        }  
                });  
            }  
        });  
    </script>

    <script>
    //sort by year
    $(document).ready(function()
    {
        $("#fetchval").on('change',function()
        {
        var keyword = $(this).val();
        $.ajax({
            url:'fetch_bookstable.php',
            type:'POST',
            data:'request='+keyword,
    
            success:function(data)
            {
            $(".table-container").html(data);
            }
        });
        });
    });
    </script>

</body>
</html>

<?php
    include "layout.php";
?>