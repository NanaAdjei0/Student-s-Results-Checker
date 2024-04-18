<?php 
include('dbconnection.php');
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

   <!-- <script src="./order.js"></script> -->
 
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
                
                <!-- <a href="viewStudent.php" >
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Students</h3>

                </a>

          
                
                <a href="viewGrades.php">
                    <span class="material-icons-sharp">school</span>
                    <h3>Grade</h3>

                </a> -->
                <!-- <a href="viewSubjects.php"  >
                    <span class="material-icons-sharp">library_books</span>
                    <h3>Subject</h3>

                </a> -->
                <a href="#">
                    <span class="material-icons-sharp">mail_outline</span>
                    <h3>Messages</h3>
                    <span class="message-count">1</span>

                </a>
                <a href="computeResults.php" class="active">
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
                <!-- <a href="#">
                    <span class="material-icons-sharp">add</span>
                    <h3>Add Session</h3>

                </a> -->
                <a href="logout.php">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>

                </a>
            </div>

            <!-- SIDE BAR NAVIGATION BAR -->

        </aside>
        





 <main>
    <h2 style="margin-bottom: 1vh;">Compute Results</h2>
    <form action="" method="POST" id="studentFilterForm">
    <label for="class_id">Select Class:</label>
<select name="classroom" id="classroom">
            <?php
            // Establish a database connection (replace with your connection code)
            $con=mysqli_connect("localhost", "root", "", "a5");

            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Retrieve class_id options from the "class" table
            $classQuery = "SELECT classroom FROM class";
            $classResult = mysqli_query($con, $classQuery);

            if ($classResult) {
                while ($classRow = mysqli_fetch_assoc($classResult)) {
                    echo "<option value='" . $classRow['classroom'] . "'>" . $classRow['classroom'] . "</option>";
                }
            }

            ?>
        </select>

        <br>
        <label for="academic">Select Academic Session:</label>
<select name="academic" id="academic">
    <option value="">Select Academic Session</option>
    <?php
    // Establish a database connection (replace with your connection code)
    $con = mysqli_connect("localhost", "root", "", "a5");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve academic year options from the "academic_year" table
    $academicQuery = "SELECT academic FROM academic_year";
    $academicResult = mysqli_query($con, $academicQuery);

    if ($academicResult) {
        while ($academicRow = mysqli_fetch_assoc($academicResult)) {
            echo "<option value='" . $academicRow['academic'] . "'>" . $academicRow['academic'] . "</option>";
        }
    }
    ?>
</select>
<br>

<label for="term">Select Term:</label>
<select name="term" id="term">
    <option value="">Select Term</option>
    <?php
    // Retrieve term options from the "term" table
    $termQuery = "SELECT term FROM term";
    $termResult = mysqli_query($con, $termQuery);

    if ($termResult) {
        while ($termRow = mysqli_fetch_assoc($termResult)) {
            echo "<option value='" . $termRow['term'] . "'>" . $termRow['term'] . "</option>";
        }
    }
    ?>
</select>
        <br>

        <select name="sub_name" id="sub_name">
    <option value="">Select a subject</option>
</select>
<br>
<label for="">Select record type:</label>
            <select id="exerciseSelect" onchange="updateFormAction()">
                <option value="">Select an option</option>
                <option value="exx1.php">Exercise 1</option>
                <option value="exx2.php">Exercise 2</option>
                <option value="exx3.php">Exercise 3</option>
                <option value="exx4.php">Exercise 4</option>
                <option value="hw1.php">Home Work 1</option>
                <option value="hw2.php">Home Work 2</option>
                <option value="hw3.php">Home Work 3</option>
                <option value="hw4.php">Home Work 4</option>
                <option value="classTest1.php">Class Test 1</option>
                <option value="classTest2.php">Class Test 2</option>
                <option value="midTerm.php">Mid-term Exams</option>
                <option value="endTerm.php">End of Term</option>
            </select>
        </label>
<br>
        <input type="submit" name="submit"  class="gradient-button1" style="margin-bottom: 2vh; margin-top: 2vh; color:rgb(6, 6, 37); text-decoration: underline; font-family: 'Poppins', sans-serif; cursor: pointer;" value="Submit">
    </form>

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

 

    <script>
    // Function to update the "Subject Name" dropdown options using AJAX
    function updateSubjectOptions() {
        var classroomSelect = document.getElementById("classroom");
        var selectedClass = classroomSelect.options[classroomSelect.selectedIndex].value;
        var subNameSelect = document.getElementById("sub_name");

        // Clear existing options
        subNameSelect.innerHTML = '<option value="">Select a subject in this option field</option>';

        if (selectedClass !== "") {
            // Fetch subjects for the selected class using fetch API
            fetch('get_subjects.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'classroom=' + selectedClass,
            })
            .then(response => response.json())
            .then(data => {
                data.forEach(subject => {
                    var option = document.createElement("option");
                    option.value = subject;
                    option.text = subject;
                    subNameSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
    }

    // Add an event listener to the "Class" dropdown to trigger the update
    var classroomSelect = document.getElementById("classroom");
    classroomSelect.addEventListener("change", updateSubjectOptions);

    // Call the update function initially
    updateSubjectOptions();

    // Function to update the form's action
    function updateFormAction() {
        // ... (your existing code)
    }
</script>

    <script>
       // Function to update the form's action
function updateFormAction() {
    // Get the selected exercise option
    var exerciseSelect = document.getElementById("exerciseSelect");
    var selectedExercise = exerciseSelect.options[exerciseSelect.selectedIndex].value;

    // Get the selected sub_name
    var subNameSelect = document.getElementById("sub_name");
    var selectedSubName = subNameSelect.options[subNameSelect.selectedIndex].value;

    // Get the selected academic year
    var academicSelect = document.getElementById("academic");
    var selectedAcademic = academicSelect.options[academicSelect.selectedIndex].value;

    // Get the selected term
    var termSelect = document.getElementById("term");
    var selectedTerm = termSelect.options[termSelect.selectedIndex].value;

    // Set the form's action attribute to the selected exercise URL with sub_name, academic, and term parameters
    var studentFilterForm = document.getElementById("studentFilterForm");
    studentFilterForm.action = selectedExercise + "?sub_name=" + selectedSubName + "&academic=" + selectedAcademic + "&term=" + selectedTerm;
}

    </script>
        <!-- <script src="./order.js"></script> -->
        <script src="./index.js"></script>
</body>
</html>
