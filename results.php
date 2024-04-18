
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
    


<div class="container">
        <aside>

            <!-- TOP LEFT NAVIGATION BAR -->
            <div class="top">
                <div class="logo">
                    <img src="./images/logo.png" style="background-image: none; background-size: cover; object-fit: cover;" width="50" alt="">
                    <h2 style="color: rgb(6, 6, 37);">SBA<span class="danger"></span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">close</span>
                </div>
            </div>

            <!-- TOP LEFT NAVIGATION BAR -->

            <!-- SIDE BAR NAVIGATION BAR -->

            <div class="sidebar">
                <a href="dashboard.php">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>

                </a>
                
                <a href="viewStudent.php" >
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Students</h3>

                </a>

          
                
                <a href="viewDepartment.php">
                    <span class="material-icons-sharp">school</span>
                    <h3>Grade</h3>

                </a>
                <a href="viewCourses.php"  >
                    <span class="material-icons-sharp">library_books</span>
                    <h3>Subject</h3>

                </a>
                <a href="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Messages</h3>
                    <span class="message-count">1</span>

                </a>
                <a href="results.php" class="active">
                    <span class="material-icons-sharp">summarize</span>
                    <h3>Results</h3>

                </a>
                <a href="staff.php">
                    <span class="material-icons-sharp">groups</span>
                    <h3>Staff</h3>

                </a>
                <a href="#">
                    <span class="material-icons-sharp">account_circle</span>
                    <h3>Profile</h3>

                </a>
                <a href="#">
                    <span class="material-icons-sharp">add</span>
                    <h3>Add Session</h3>

                </a>
                <a href="logout.php">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>

                </a>
            </div>

            <!-- SIDE BAR NAVIGATION BAR -->

        </aside>
        





 <main>
 <h2 style="margin-bottom: 1vh;">Final Results </h2>
    <!-- Create a form with a select option field for classroom selection -->
    <form method="POST">
        <label for="classroom">Class:</label>
        <select name="classroom" id="classroom">
            <?php
            // Establish a database connection (replace with your connection code)
            include('dbconnection.php');
            include('session.php');
        
            // Fetch unique classroom values from the class table
            $classroom_query = "SELECT  classroom FROM class";
            $classroom_result = mysqli_query($con, $classroom_query);

            if ($classroom_result) {
                while ($row = mysqli_fetch_assoc($classroom_result)) {
                    echo "<option value='" . $row['classroom'] . "'>" . $row['classroom'] . "</option>";
                }
            }

            mysqli_close($con);
            ?>
        </select> <br>

        <label for="term">Term:</label>
    <select name="term" id="term">
        <?php

include('dbconnection.php');
include('session.php');
        // Query the "term" table to retrieve available terms
        $term_query = "SELECT term FROM term";
        $term_result = mysqli_query($con, $term_query);

        if ($term_result) {
            while ($row = mysqli_fetch_assoc($term_result)) {
                echo "<option value='" . $row['term'] . "'>" . $row['term'] . "</option>";
            }
        }
        ?>
    </select>
    <br>
        <input type="submit" class="gradient-button1" style="margin-bottom: 2vh; margin-top: 2vh; color:rgb(6, 6, 37); text-decoration: underline; font-family: 'Poppins', sans-serif;" value="Filter">
    </form>
    

    <!-- Display student data in a DataTable -->
    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Student </th>
                <th>Student ID</th>
                <th>View</th>
                <!-- <th>Second Term</th>
                <th>Third Term</th> -->
            </tr>
        </thead>
        <tbody>
        <?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $selectedClassroom = $_POST['classroom'];
   // Check if 'term' is set in the POST data
   if (isset($_POST['term'])) {
    $selectedTerm = $_POST['term'];
} else {
    $selectedTerm = ""; // Set a default value if 'term' is not set
}
    include('dbconnection.php'); // Make sure this file contains the database connection code
    // Query students based on the selected classroom
   
    $query = "SELECT students.name, students.stu_index ,class.classroom, tblresult.termid
              FROM students 
              INNER JOIN class ON students.class = class.class_id 
              LEFT JOIN tblresult ON students.stu_index = tblresult.stu_index
              WHERE class.classroom = '$selectedClassroom' 
              AND tblresult.termid = '$selectedTerm'";

    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['stu_index'] . "</td>";

            // Add the Actions column with an eye icon
            // Use $selectedTerm in your href links to pass the selected term as a parameter

            echo "<td><a href='finalResults.php?name=" . $row['name'] . "&stu_index=" . $row['stu_index'] . "&class_id=" . $row['classroom'] . "&termid=$selectedTerm' title='Edit Details'><i class='fa fa-edit fa-1x'>..</i></a></td>";
            // echo "<td><a href='finalResults.php?name=" . $row['name'] . "&stu_index=" . $row['stu_index'] . "&class_id=" . $row['classroom'] . "&termid=$selectedTerm' title='Edit Details'><i class='fa fa-edit fa-1x'>..</i></a></td>";
            // echo "<td><a href='finalResults.php?name=" . $row['name'] . "&stu_index=" . $row['stu_index'] . "&class_id=" . $row['classroom'] . "&termid=$selectedTerm' title='Edit Details'><i class='fa fa-edit fa-1x'>..</i></a></td>";

            echo "</tr>";
        }
    }

    mysqli_close($con);
}
?>


        </tbody>
    </table>
    </main>

    <div class="right">
        <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <!-- <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div> -->
                <div class="profile">
                    <div class="info">
                        <p>Hello <b><?php echo $staffId    ;?></b></p>
                        <small class="text-muted"></small>
                    </div>
                    <div class="profile-photo1">
                        <img style="border-radius: 50rem; object-fit: cover; background-size: cover;"  src="./images/instruction-11.png" width="50">
                    </div>
                </div>
            </div>

            <div class="recent-updates">
           
                <!-- <h2> <span  style="left: 300px;" class="material-icons-sharp">addition</span>New Subject</h2> -->
               
                <button style="margin-bottom: 2vh;" class="gradient-button1"><a href="computeResults.php"><h3 style="font-family: 'Poppins', sans-serif; text-decoration: underline;">Compute Results</h3></a> </button> <br>
                <button style="margin-bottom: 2vh; " class="gradient-button1"><a href="manageResultspage.php"><h3 style="font-family: 'Poppins', sans-serif; text-decoration: underline;">Manage Results</h3></a> </button> <br>
                <!-- <button class="gradient-button1"><a href="results.php"><h3 style="font-family: 'Poppins', sans-serif; text-decoration: underline;">Check Results</h3></a> </button> -->

            
                   <style>
::-webkit-scrollbar {
  width: 5px;
  height: 5px;
}

::-webkit-scrollbar-track {
  background-color: #f2f2f2;
}

::-webkit-scrollbar-thumb {
  background-color: #c4c4c4;
}

                    .gradient-button1 {
                        background: linear-gradient(to right, white, aqua);
                        color: white;
                        padding: 10px 20px;
                        border:none;
                        font-weight: bold;
                        border-radius: 5px;
                        
                    }


                    .gradient-button {
                        background: blue;
                        color: white;
                        padding: 7px 10px;
                        border:none;
                        font-weight: bold;
                        border-radius: 5px;
                        
                    }
                    </style>

               
            </div>


            <!-- <div class="sales-analytics">
                <h2>Upcoming Events</h2>
                <div class="item online">
                    <div class="icon">
                        <span class="material-icons-sharp">event_available</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>FIRST TERM</h3>
                            <small class="text-muted">Last 24 hours</small>
                        </div>
                        <h5 class="success">+39%</h5>
                        <h3 style="color: green;">.active</h3>
                    </div>
                </div>
                <div class="item offline">
                    <div class="icon">
                        <span class="material-icons-sharp">event_available</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>SECOND TERM</h3>
                            <small class="text-muted">Last 24 hours</small>
                        </div>
                        <h5 class="danger">-17%</h5>
                        <h3 style="color: crimson;">.offline</h3>
                    </div>
                </div>
                <div class="item customers">
                    <div class="icon">
                        <span class="material-icons-sharp">event_available</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>THIRD TERM</h3>
                            <small class="text-muted">Last 24 hours</small>
                        </div>
                        <h5 class="success">+25%</h5>
                        <h3 style="color: crimson;">.offline</h3>
                       
                    </div>
                </div>
                <!-- <div class="item add-product">
                    <div>
                        <span class="material-icons-sharp">add</span>
                        <h3>Add Product</h3>
                    </div>

                </div> -->
            </div>
        </div>  
    </div>
<div class="nav" style="margin-top: 2vh;">
    <h4>Copyright &copy;Almighty Vision Academy SBA || Powered by WillOrg</h4> <br>
    <!-- <p>Powered by WillOrg</p> -->
</div>

 

    <!-- <script src="./order.js"></script> -->
    <script src="./index.js"></script>

    <!-- Initialize DataTable on the table -->
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
      <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
      <script>
        	
new DataTable('#example');
      </script>
</body>
    </script>
</body>
</html
