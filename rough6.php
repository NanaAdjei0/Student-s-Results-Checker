<?php

    include('dbconnection.php');
    include('session.php');



  

  ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBA</title>
  
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="shortcut icon" href="./images/ava.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">




</head>


<body>
<table  id="example" class="display" style="width:100%" >
        <thead>
            <tr>
                <!-- <th> ID</th> -->
                <th>dept id  </th>
                <th>dept name</th>
               
                
            </tr>
        </thead>
        <tbody>
            <?php
           

   // Perform the SQL query to select the desired columns
   $query = "SELECT departid, depart_name FROM department";
   $result = mysqli_query($con, $query);

   if ($result) {
       while ($row = mysqli_fetch_assoc($result)) {
           echo "<tr>";
           echo "<td>" . $row['departid'] . "</td>";
           echo "<td>" . $row['depart_name'] . "</td>";
        
           echo "</tr>";
       }
   }


    
      
        
          else {
                echo "Error: " . mysqli_error($con);
            }

            // Close the database connection
            mysqli_close($con);
            ?>
        </tbody>
    </table>

    <script>
        	
          new DataTable('#example');
                </script>
</body>
</html>