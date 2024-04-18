
<?php
 
    include('dbconnection.php');
  
    include('session.php');
    include('dataValues.php');
    session_start();

 
   
   
    if(isset($_GET['$staffId'])) {
        $staffId=$_POST['staffId'];
    }
 
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

    <link rel="shortcut icon" href="./images/ava.jpeg" type="image/x-icon">




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

            <div class=" sidebar " >
                <a href="index.html" class="active">
                    <span class="material-icons-sharp">grid_view</span>
                    <h3>Dashboard</h3>

                </a>
                
                <a href="viewStudent.php" >
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Students</h3>

                </a>

          
                
                <a href="viewGrades.php">
                    <span class="material-icons-sharp">school</span>
                    <h3>Grade</h3>

                </a>
                <a href="viewSubjects.php">
                    <span class="material-icons-sharp">library_books</span>
                    <h3>Subject</h3>

                </a>
                <a href="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Messages</h3>
                    <span class="message-count">1</span>

                </a>
                <a href="results.php">
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
    <h1>Dashboard</h1>
   

    <!-- DATE(CALENDER) -->
    <!-- <div class="date">
        <input type="date">
    </div> -->
      <!-- DATE(CALENDER) -->
   
    <div class="insights">

       
        <div class="sales">
            <span class="material-icons-sharp">group_add</span>
            <div class="middle">
                <div class="left">
                    <h3>Students</h3>
<?php 
// Query to count the number of students in the "students" table
$query = "SELECT COUNT(*) as total_students FROM students";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Fetch the count from the result
$row = mysqli_fetch_assoc($result);
$totalStudents = $row['total_students'];


?>
                    <!-- plugin by backend  -->
                    <h1><?php echo $totalStudents;?>+</h1>

                    <!-- plugin by backend  -->

                </div>
                <div class="progress">
                    <svg>
                        <circle cx='38' cy='38' r='36'></circle>
                    </svg>
                    <div class="number">
                        <p><?php echo $totalStudents;?>+</p>
                    </div>
                </div>
            </div>
            <small class="text-muted">Last 24 hours</small>
        </div>
        

        
        <div class="expenses">
            <span class="material-icons-sharp">analytics</span>
            <div class="middle">
                <div class="left">
                    <h3>Grades</h3>
                    <?php 
// Query to count the number of students in the "students" table
$query = "SELECT COUNT(*) as total_class FROM class";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Fetch the count from the result
$row = mysqli_fetch_assoc($result);
$totalClass = $row['total_class'];


?>
                    <!-- plugin by backend  -->
                    <h1><?php echo $totalClass?>+</h1>

                    <!-- plugin by backend  -->
                </div>
                <div class="progress">
                    <svg>
                        <circle cx='38' cy='38' r='36'></circle>
                    </svg>
                    <div class="number">
                        <p><?php echo $totalClass?>+</p>
                    </div>
                </div>
            </div>
            <small class="text-muted">Last 24 hours</small>
         </div>
        <div class="income">
                <span class="material-icons-sharp">local_library</span>
                <div class="middle">
                    <div class="left">
                        <h3>Subjects</h3>

                        <?php 
// Query to count the number of students in the "students" table
$query = "SELECT COUNT(*) as total_subjects FROM subjects";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Fetch the count from the result
$row = mysqli_fetch_assoc($result);
$totalSubjects = $row['total_subjects'];


?>

                         <!-- plugin by backend  -->
                        <h1><?php echo $totalSubjects?>+</h1>
                         <!-- plugin by backend  -->
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx='38' cy='38' r='36'></circle>
                        </svg>
                        <div class="number">
                            <p><?php echo $totalSubjects?>+</p>
                        </div>
                    </div>
                </div>
                <small class="text-muted">Last 24 hours</small>
             </div>

             <div class="income">
                <span class="material-icons-sharp">groups</span>
                <div class="middle">
                    <div class="left">
                        <h3>Staff</h3>
                        <?php 
// Query to count the number of students in the "students" table
$query = "SELECT COUNT(*) as total_users FROM users";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Fetch the count from the result
$row = mysqli_fetch_assoc($result);
$totalUsers = $row['total_users'];


?>

                         <!-- plugin by backend  -->
                        <h1><?php echo $totalUsers ?>+</h1>
                         <!-- plugin by backend  -->
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx='38' cy='38' r='36'></circle>
                        </svg>
                        <div class="number">
                            <p><?php echo $totalUsers ?>+</p>
                        </div>
                    </div>
                </div>
                <small class="text-muted">Last 24 hours</small>
             </div>

             <div class="income">
                <span class="material-icons-sharp">event_repeat</span>
                <div class="middle">
                    <div class="left">
                        <h3>Results in progress</h3>

                        <?php 
// Query to count the number of students in the "students" table
$query = "SELECT COUNT(*) as total_result FROM tblresult";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Fetch the count from the result
$row = mysqli_fetch_assoc($result);
$totalResults = $row['total_result'];


?>

                         <!-- plugin by backend  -->
                        <h1><?php echo $totalResults?>+</h1>
                         <!-- plugin by backend  -->
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx='38' cy='38' r='36'></circle>
                        </svg>
                        <div class="number">
                            <p><?php echo $totalResults?>+</p>
                        </div>
                    </div>
                </div>
                <small class="text-muted">Last 24 hours</small>
             </div>
             <div class="income">
                <span class="material-icons-sharp">view_comfy_alt</span>
                <div class="middle">
                    <div class="left">
                        <h3>Dept.</h3>

                        <?php 
// Query to count the number of students in the "students" table
$query = "SELECT COUNT(*) as total_dept FROM department";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($con));
}

// Fetch the count from the result
$row = mysqli_fetch_assoc($result);
$totalDept = $row['total_dept'];


?>

                         <!-- plugin by backend  -->
                        <h1><?php echo $totalDept?>+</h1>
                         <!-- plugin by backend  -->
                    </div>
                    <div class="progress">
                        <svg>
                            <circle cx='38' cy='38' r='36'></circle>
                        </svg>
                        <div class="number">
                            <p><?php echo $totalDept?>+</p>
                        </div>
                    </div>
                </div>
                <small class="text-muted">Last 24 hours</small>
             </div>
           
               
            
                
    

            


            


              
             
   
            
        
            </div>
            <div class="recent-orders">
                <!-- <h2>Recent Updates</h2> -->
                <!-- <table>
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Product Number</th>
                            <th>Payment</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                      
                        
                    </tbody>
                </table> -->
                <!-- <a href="#">Show All</a> -->
               </div>
   
   
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
                        <p>Hello <b><?php     echo   $staffId;?></b></p>
                        <small class="text-muted" style="font-weight: bolder;">Administrator</small>
                    </div>
                    <div class="profile-photo1">
                        <img style="border-radius: 50rem; object-fit: cover; background-size: cover;"  src="./images/instruction-11.png" width="50">
                    </div>
                </div>
            </div>
            <h2>News</h2>
            <div class="recent-updates">
                <!-- <h2>Events</h2> -->
                <div class="sales-analytics">
             
                <div class="item online">
                    <div class="icon">
                        <span class="material-icons-sharp">report</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Assessment filling deadline - 10/04/2023</h3>
                            <!-- <small class="text-muted">Pending</small> -->
                        </div>
                        <!-- <h5 class="success">                <span class="material-icons-sharp">groups</span> -->
<!-- </h5> -->
                        <!-- <h3 style="color: green;">.active</h3> -->
                    </div>
                </div>
                <div class="item offline">
                    <div class="icon">
                        <span class="material-icons-sharp">report</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>Begin assesment from Exercise 1</h3>
                            <!-- <small class="text-muted">Pending</small> -->
                        </div>
                        <!-- <h5 class="success">                <span class="material-icons-sharp">groups</span> -->
<!-- </h5> -->
                        <!-- <h3 style="color: green;">.active</h3> -->
                    </div>
                </div>
                
                <!-- <div class="item add-product">
                    <div>
                        <span class="material-icons-sharp">add</span>
                        <h3>Add Product</h3>
                    </div>

                </div> -->
            </div>
                
                <!-- <div class="updates">

                <div class="container" style="margin-left: 6vh;">
                <table style="font-weight: 600;";>
  <thead>
   <tr>
    <th style="color: green; " colspan="7"><?php echo date('d F Y'); ?></th>
   </tr>
   <tr>
    <th>S</th>
    <th>M</th>
    <th>T</th>
    <th>W</th>
    <th>T</th>
    <th>F</th>
    <th>S</th>
   </tr>
  </thead>
  <tbody style="cursor: cursor">
   <?php
    $firstDayOfMonth = date('N', strtotime(date('Y-m-01')));
    $totalDaysOfMonth = date('t');
    $rows = ceil(($totalDaysOfMonth + $firstDayOfMonth - 1) / 7);
    $dayOfMonth = 1;
    
    for ($i = 0; $i < $rows; $i++) {
     echo '<tr>';
     for ($j = 1; $j <= 7; $j++) {
      if (($i == 0 && $j < $firstDayOfMonth) || ($dayOfMonth > $totalDaysOfMonth)) {
       echo '<td></td>';
      } else {
       echo '<td>' . $dayOfMonth . '</td>';
       $dayOfMonth++;
      }
     }
     echo '</tr>';
    }
   ?>
  </tbody>
 </table>
                </div>
              

                   
                </div> -->
            </div>


            <div class="sales-analytics">
                <h2>Academic Session</h2>
                <div class="item online">
                    <div class="icon">
                        <span class="material-icons-sharp">event_available</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>FIRST TERM</h3>
                            <small class="text-muted">Pending</small>
                        </div>
                        <h5 class="success">                <span class="material-icons-sharp">groups</span>
</h5>
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
                            <small class="text-muted">Pending</small>
                        </div>
                        <h5 class="danger">                <span class="material-icons-sharp">groups</span>
</h5>
                        <h3 style="color: green;">.active</h3>
                    </div>
                </div>
                <div class="item customers">
                    <div class="icon">
                        <span class="material-icons-sharp">event_available</span>
                    </div>
                    <div class="right">
                        <div class="info">
                            <h3>THIRD TERM</h3>
                            <small class="text-muted">Pending</small>
                        </div>
                        <h5 class="success">                <span class="material-icons-sharp">groups</span>
</h5>
                        <h3 style="color:  green;">.active</h3>
                       
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

</style>
<div class="nav">
    <h4>Copyright &copy;Almighty Vision Academy SBA || Powered by WillOrg</h4> <br>
    <!-- <p>Powered by WillOrg</p> -->
</div>

    <script src="./order.js"></script>
    <script src="./index.js"></script>
    
</body>
</html>