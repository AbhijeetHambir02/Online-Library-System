<!DOCTYPE html>
<html>
<head>
    <link href="CSS/issuedbooks.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
    
    <div class="table-container">
            <?php
                require '../connection/connection.inc.php';

                $query = "SELECT * FROM issue_book";
                $result = mysqli_query($db_connection,$query);

               if(mysqli_num_rows($result)<=0)
               {
                    echo "<b style='font-size: 2vw;'>No records found!</b>";
               }
               else
               {
               ?>
                    <div class="heading">
                         <p>Issued Books</p>
                    </div>
               <?php
                echo '<table border="1px" class="books-table" id="book_table">';
                echo '<tr>';
                    echo '<th>'; echo 'Book Id'; echo '</th>';
                    echo '<th>'; echo 'Book Name'; echo '</th>';
                    echo '<th>'; echo 'Student Name'; echo '</th>';
                    echo '<th>'; echo 'Roll No'; echo '</th>';
                    echo '<th>'; echo 'Class'; echo '</th>';
                    echo '<th>'; echo 'Issue Date'; echo '</th>';
                echo '</tr>';

                while($data = mysqli_fetch_assoc($result))
                {
                    echo '<tr>';
                        echo '<td>'; echo $data['BOOK_ID']; echo '</td>';
                        echo '<td>'; echo $data['BOOK_NAME']; echo '</td>';
                        echo '<td>'; echo $data['STUDENT_NAME']; echo '</td>';
                        echo '<td>'; echo $data['ROLL_NO']; echo '</td>';
                        echo '<td>'; echo $data['CLASS']; echo '</td>';
                        echo '<td>'; echo $data['DATE']; echo '</td>';
                    echo '</tr>';
                }
                echo '</table>';
               }
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

</body>
</html>

<?php
    include "layout.php";
?>