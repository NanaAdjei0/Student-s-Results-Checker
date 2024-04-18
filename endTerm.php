<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBA</title>
  
    <link rel="stylesheet" href="compute.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="shortcut icon" href="./images/ava.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    <style>
        body {
            font-family: 'Poppins',sans-serif;
            /* font-size: 75%; */
            font-weight: 300;
            display: flex;
            flex-direction: column;
            /* align-items: flex-start; */
        }

        .student-list {
            display: flex;
            flex-direction: column;
         
            /* align-items: flex-start; */
        }

        .student {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
            width: 100%;
           
        }

        .student-name {
            width: 100%;
            margin-right: 10px;
            margin-left: 300vh;
        }

        .student-input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 12px;
            margin-bottom: 6px;
        }

        .status {
            width: 20%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
        }

        button[type="submit"] {
            padding: 10px;
            background-color: blue;
            /* background-color: #4CAF50; */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-family: 'Poppins';
            margin-top: 5px;
        }

        button[type="submit"]:hover {
            background-color: #3e8e41;
        }

        #statusMessage {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
            font-size: 10px;
            font-weight: 800;
        }

        .error {
            color: red;
        }

        /* Apply Poppins font to the entire page */
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <style>
   

    /* Add new styles for "filled" and "unfilled" status */
    .status.filled {
        color: green;
    }

    .status.unfilled {
        color: crimson;
    }
</style>

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.7/css/jquery.dataTables.min.css">

    <!-- DataTables JavaScript -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.7/js/jquery.dataTables.min.js"></script>

    <!-- Add Poppins font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400&display=swap" rel="stylesheet">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Custom JavaScript -->
   
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
                <a href="results.php" class="active">
                    <span class="material-icons-sharp">summarize</span>
                    <h3>Results</h3>

                </a>
                <a href="#">
                    <span class="material-icons-sharp">contact_support</span>
                    <h3>Help Desk</h3>

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
 <h2 style="margin-bottom: 2vh;">Compute Results/ End of Term</h2>
<?php
    // Include your PHP files
  
  // Include your PHP files
  include('dbconnection.php');

  $statusMsg = "";

  // Define the getStudentScore function
  function getStudentScore($con, $studentName, $sub_name, $classroom) {
      $query = "SELECT endTerm FROM tblresult WHERE name = '$studentName' AND sub_name = '$sub_name' AND class_id = '$classroom'";
      $result = mysqli_query($con, $query);

      if (mysqli_num_rows($result) > 0) {
          $row = mysqli_fetch_assoc($result);
          return $row['endTerm'];
      } else {
          return "";
      }
  }

  // Initialize variables
  $sub_name = isset($_POST['sub_name']) ? $_POST['sub_name'] : "";
  $classroom = isset($_POST['classroom']) ? $_POST['classroom'] : "";
  $stu_index = isset($_POST['stu_index']) ? $_POST['stu_index'] : "";
  $academic = isset($_POST['academic']) ? $_POST['academic'] : "";
  $term = isset($_POST['term']) ? $_POST['term'] : "";
  $scores = isset($_POST['scores']) ? $_POST['scores'] : [];

  // Check if the form was submitted and process accordingly
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      // Loop through scores and save/update in the database
      foreach ($scores as $index => $score) {
          // Retrieve the corresponding student name and stu_index (assuming your form maintains the same order)
          $studentName = isset($_POST['student_names'][$index]) ? $_POST['student_names'][$index] : "";
          $studentStuIndex = isset($_POST['student_stu_index'][$index]) ? $_POST['student_stu_index'][$index] : "";

          // Validate and sanitize the score (you can add more validation)
          $score = filter_var($score, FILTER_SANITIZE_NUMBER_INT);

          // Check if the student name and score are valid
          if (!empty($studentName) && is_numeric($score)) {
              // Perform SQL queries to save/update data in the database
              // Example SQL queries (replace with your actual queries):

              // Check if a score for this student, sub_name, and classroom already exists
              $checkQuery = "SELECT * FROM tblresult WHERE name = '$studentName' AND stu_index = '$studentStuIndex' AND sub_name = '$sub_name' AND class_id = '$classroom'AND yearid = '$academic' AND termid = '$term'";
              $checkResult = mysqli_query($con, $checkQuery);

              if (mysqli_num_rows($checkResult) > 0) {
                  // If a record exists, update the score
                  $updateQuery = "UPDATE tblresult SET endTerm = '$score' WHERE name = '$studentName' AND stu_index = '$studentStuIndex' AND sub_name = '$sub_name' AND class_id = '$classroom'AND yearid = '$academic' AND termid = '$term'";
                  mysqli_query($con, $updateQuery);
                    // Provide a response message for updated score
                $statusMsg = "Score for $studentName updated successfully.";
              } else {
                  // If no record exists, insert a new record
                  $insertQuery = "INSERT INTO tblresult (name, stu_index, endTerm, sub_name, class_id,yearid, termid) VALUES ('$studentName', '$studentStuIndex', '$score', '$sub_name', '$classroom' , '$academic', '$term')";
                  mysqli_query($con, $insertQuery);
                    // Provide a response message for new score
                $statusMsg = "Score for $studentName added successfully.";
              }
          }
      }

      // Provide a response message (success or error)
      $statusMsg = "Scores saved successfully.";
  }
  
  // Check if the form should be displayed
  $displayForm = empty($statusMsg) || !isset($_POST['scores']);
  if ($displayForm) {
      ?>
      <!-- <h5 style="color: grey; font-weight: bolder;">Results/ Compute Results / Exercise 2</h5> -->
      <form id="scoreForm" method="post">
          <input type="hidden" id="sub_name" name="sub_name" value="<?php echo htmlspecialchars($sub_name); ?>">
          <input type="hidden" id="classroom" name="classroom" value="<?php echo htmlspecialchars($classroom); ?>">
          <input type="hidden" name="academic" value="<?php echo htmlspecialchars($academic); ?>">
        <input type="hidden" name="term" value="<?php echo htmlspecialchars($term); ?>">
          <table id="studentTable">
              <tbody>
                  <?php
                  // Execute the SQL query to retrieve students based on classroom
                  $query = "
                      SELECT students.stu_id, students.stu_index, students.name, class.classroom
                      FROM students
                      JOIN class ON students.class = class.class_id
                      WHERE class.classroom = '$classroom';
                  ";
                  $result = mysqli_query($con, $query);

                  // Loop through the result set and display students
                  while ($row = mysqli_fetch_assoc($result)) {
                      $studentName = htmlspecialchars($row['name']);
                      $studentStuIndex = htmlspecialchars($row['stu_index']);

                      // Get the score for this student, sub_name, and classroom
                      $studentScore = getStudentScore($con, $studentName, $sub_name, $classroom);

                      echo "<tr>";
                      echo "<td>$studentName</td>";
                      echo "<td><input type='text' class='student-input' name='scores[]' value='$studentScore'></td>";
                      // Store the student names and stu_index as hidden inputs for later retrieval
                      echo "<input type='hidden' name='student_names[]' value='$studentName'>";
                      echo "<input type='hidden' name='student_stu_index[]' value='$studentStuIndex'>";
                      // Add a status indicator (filled/unfilled) based on the presence of a score
                      echo "<td class='status " . ($studentScore !== "" ? "filled" : "unfilled") . "'>" . ($studentScore !== "" ? "Filled" : "Unfilled") . "</td>";
                      echo "</tr>";
                  }
                  ?>
              </tbody>
          </table>
          <button type="submit">Save Scores</button>
      </form>
      <?php
  } else {
     echo 'Score saved';
      echo "<p id='statusMessage'>$statusMsg</p>";
  }
  ?>

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
                        <p>Hello <b><?php     ;?></b></p>
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
</body>
</html>