<?php
    include '../connection/connection.inc.php';
    // error_reporting(0);
    if(isset($_GET['dept']) && strlen($_GET['dept'])>0)
    {
        $dept = $_GET['dept'];
    }
    else
    {
        header('location: departments.php');
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <link href="css/departmentbooks.css" type="text/css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Orelega+One&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
    <?php

    $query = "SELECT * FROM books WHERE DEPARTMENT='$dept'";
    $result = mysqli_query($db_connection,$query);

    if(mysqli_num_rows($result)<=0)
    {
        echo "<b style='font-size: 2vw;'>No records found!</b>";
    }
    else
    {
    ?>
        <div class="heading">
                <p><?php echo $dept; ?></p>
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
        <div id="table-container">
        <?php
            echo '<table border="1px" class="books-table" id="book_table">';
            echo '<tr>';
            echo '<th>'; echo 'Book_Id'; echo '</th>';
            echo '<th>'; echo 'Book_name'; echo '</th>';
            echo '<th>'; echo 'Author'; echo '</th>';
            echo '<th>'; echo 'Price'; echo '</th>';
            echo '<th>'; echo 'Quantity'; echo '</th>';
            echo '</tr>';

            while($data = mysqli_fetch_assoc($result))
            {
                echo '<tr>';
                echo '<td>'; echo $data['BOOK_ID']; echo '</td>';
                echo '<td>'; echo $data['NAME']; echo '</td>';
                echo '<td>'; echo $data['AUTHOR']; echo '</td>';
                echo '<td>'; echo $data['PRICE']; echo '</td>';
                echo '<td>'; echo $data['QUANTITY']; echo '</td>';
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
          $("#table-container").html(data);
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