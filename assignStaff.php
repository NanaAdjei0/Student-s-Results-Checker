<?php

$statusMsg = "";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if 'sub_code' key exists in the $_POST array
    if (isset($_POST['sub_code'])) {
        // Retrieve user_id and subject from the form submission
        $user_id = $_POST['user_id'];
        $sub_code = $_POST['sub_code'];

        // Replace with your database connection code
        include('dbconnection.php');
        include('session.php');
        // Check if the user is already assigned to the subject
        // $check_assignment_query = "SELECT urid FROM subjects WHERE urid ='$user_id' AND sub_code = '$sub_code'";
        $update_assignment_query = "UPDATE subjects SET urid = '$user_id' WHERE sub_code = '$sub_code'";
        if (mysqli_query($con, $update_assignment_query)) {
            echo $statusMsg;
        } else {
            echo "Error updating user assignment: " . mysqli_error($con);
        }

        // $check_assignment_result = mysqli_query($con, $check_assignment_query);

        // if (mysqli_num_rows($check_assignment_result) > 0) {
            // User is already assigned to the subject, update the assignment
            // $update_assignment_query = "UPDATE subjects SET urid = '$user_id' WHERE sub_code = '$sub_code'";
            // if (mysqli_query($con, $update_assignment_query)) {
                // echo "User assignment to the subject updated successfully.";
            } else {
                echo "Error updating user assignment: " . mysqli_error($con);
            }
        // } 

       
    } else {
        // echo "sub_code is missing in the form submission.";
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
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="shortcut icon" href="./images/ava.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    <script>
        // Custom JavaScript code
        $(document).ready(function () {
            $("#scoreForm").submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: '', // Replace with the URL to your server-side processing script
                    data: formData,
                    success: function (response) {
                        $('#statusMessage').html(response);
                    }
                });
            });
        });
    </script>
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

          
                
                <a href="viewGrades.php">
                    <span class="material-icons-sharp">school</span>
                    <h3>Grade</h3>

                </a>
                <a href="viewSubjects.php"  >
                    <span class="material-icons-sharp">library_books</span>
                    <h3>Subject</h3>

                </a>
                <a href="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Messages</h3>
                    <span class="message-count">1</span>

                </a>
                <a href="results.php" >
                    <span class="material-icons-sharp">summarize</span>
                    <h3>Results</h3>

                </a>
                <a href="staff.php" class="active">
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
        <h2 style="margin-bottom: 1vh;">Assign Staff </h2>
    <?php
    // Replace with your database connection code
    include('dbconnection.php');
 echo $statusMsg;
    // Check if the user_id is provided in the query string
    if (isset($_GET['user_id'])) {
        $user_id = $_GET['user_id'];

        // Fetch user details by user_id
        $user_query = "SELECT username FROM users WHERE user_id = $user_id";
        $user_result = mysqli_query($con, $user_query);
        $user_row = mysqli_fetch_assoc($user_result);

        if ($user_row) {
            $username = $user_row['username'];

            echo "<form method='post' action='' id='scoreForm'>";
            echo "<label for='username'>Username:</label>";
            echo "<input type='text' id='username' name='username' value='$username' readonly><br>";

            // Add the 'sub_code' input field here
            echo "<label for='sub_code'>sub_code:</label>";
            echo "<input type='text' id='sub_code' name='sub_code' required><br>";

            echo "<input type='hidden' name='user_id' value='$user_id'>";
            echo "<input type='submit' value='Assign'>";
            echo "</form>";
        } else {
            echo "User not found.";
        }
    } else {
        echo "User ID not provided.";
    }

    
    ?>
    <table  id="example" class="display" style="width:100%" >
        <thead>
            <tr>
                <!-- <th> ID</th> -->
                <th>id   </th>
                <th>Staff  </th>
              <th>Username</th>
               <!-- <th>Email</th> -->
                   <th>Action</th>
                
            </tr>
        </thead>
        <tbody>

        <?php

      
   // Perform the SQL query to select the desired columns
   $query = "SELECT user_id, name, username  FROM users";
   $result = mysqli_query($con, $query);

   if ($result) {
       while ($row = mysqli_fetch_assoc($result)) {
           echo "<tr>";
           echo "<td>" . $row['user_id'] . "</td>";
           echo "<td>" . $row['name'] . "</td>";
           echo "<td>" . $row['username'] . "</td>"; ?>

       

        
    <td>
            <a href="assignStaff.php?user_id=<?php echo $row['user_id']; ?>" title="Edit Details"><i class="fa fa-edit fa-1x"></i></a>


        </td>
        <?php

      
           echo "</tr>";
       }
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
                        <p>Hello <b></b></p>
                        <small class="text-muted"></small>
                    </div>
                    <div class="profile-photo1">
                        <img style="border-radius: 50rem; object-fit: cover; background-size: cover;"  src="./images/instruction-11.png" width="50">
                    </div>
                </div>
                
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
</html>
