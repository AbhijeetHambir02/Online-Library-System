<!DOCTYPE html>
<html>
<head>
    <link href="CSS/students.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
    <div class="heading">
          <p>Students</p>
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

                $query = "SELECT * FROM students ORDER BY ROLL_NO";
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
        url:'fetch_studentstable.php',
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