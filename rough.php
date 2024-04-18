<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-size: 75%;
            font-weight: 300;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .student-list {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .student {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px;
            width: 100%;
        }

        .student-name {
            width: 40%;
            margin-right: 10px;
        }

        .student-input {
            width: 8%;
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
        $(document).ready(function () {
            // Add an event listener for input fields to update status
            $("input[name^='scores']").on("input", function () {
                var inputField = $(this);
                var statusField = inputField.siblings(".status");
                var score = inputField.val();

                // Update the status immediately on the client side
                if (score !== "") {
                    statusField.text("filled");
                } else {
                    statusField.text("unfilled");
                }
            });

            $("form").submit(function (event) {
                event.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: window.location.href, // Use the current URL
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
    <h5 style="color: grey; font-weight: bolder;">Results/ Compute Results / Exercise 1</h5>
<?php
    // Store error messages
    $errorMsg = "";
    $statusMsg = "";
    $status = "";




    
    // Connect to database
    include('dbconnection.php');
    include('session.php');






    

    // Initialize variables
    $levelId = $sessionId = $departmentId = $facultyId = "";

    // Check if POST variables are set
    if (isset($_POST['levelId'])) {
        $levelId = $_POST['levelId'];
    }
    if (isset($_POST['sessionId'])) {
        $sessionId = $_POST['sessionId'];
    }
    if (isset($_POST['departmentId'])) {
        $departmentId = $_POST['departmentId'];
    }
    if (isset($_POST['facultyId'])) {
        $facultyId = $_POST['facultyId'];
    }


    $courseCode = isset($_GET['courseCode']) ? $_GET['courseCode'] : '';




    // Retrieve student names and additional data from the database
    $sql = "SELECT tblstudent.firstName, tblstudent.lastName, tblstudent.otherName, tblstudent.matricNo, tblstudent.levelId, tblstudent.facultyId,
    tblstudent.departmentId
    from tblstudent
    where tblstudent.levelId ='$levelId' and tblstudent.sessionId ='$sessionId' 
                    and tblstudent.departmentId ='$departmentId' and tblstudent.facultyId ='$facultyId' ";
    $result = mysqli_query($con, $sql);
    if (
        isset($_POST['fullName']) &&
        isset($_POST['exx1']) &&
        isset($_POST['matricNo']) &&
        isset($_POST['departmentId']) &&
        isset($_POST['levelId']) &&
        isset($_POST['facultyId']) &&
        isset($_POST['courseCode']) // Retrieve the courseCode from the form
    ) {
        $fullName = $_POST['fullName'];
        $exx1 = $_POST['exx1'];
        $matricNo = $_POST['matricNo'];
        $deptId = $_POST['departmentId'];
        $lvlId = $_POST['levelId'];
        $facId = $_POST['facultyId'];
        $courseCode = $_POST['courseCode']; // Retrieve the courseCode from the form
    
        // Check if the number of full names, scores, and additional data match
        $count = count($fullName); // Get the count once to avoid redundant calls
        if (
            $count === count($exx1) &&
            $count === count($matricNo) &&
            $count === count($deptId) &&
            $count === count($lvlId) &&
            $count === count($facId)
        ) {
            for ($i = 0; $i < $count; $i++) {
                $currentFullName = $fullName[$i];
                $currentExx1 = $exx1[$i];
                $currentMatricNo = $matricNo[$i];
                $currentDepartmentId = $deptId[$i];
                $currentLevelId = $lvlId[$i];
                $currentFacultyId = $facId[$i];
    
                // Check if a score is entered
                if ($currentExx1 !== "") {
                    // Check if a score already exists for the student with the same courseCode
                    $checkSql = "SELECT * FROM tblresult WHERE fullName='" . mysqli_real_escape_string($con, $currentFullName) . "' AND courseCode='$courseCode'";
                    $checkResult = mysqli_query($con, $checkSql);
    
                    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
                        // Update the existing score in the database
                        $updateSql = "UPDATE tblresult SET exx1='$currentExx1', matricNo='$currentMatricNo', departmentId='$currentDepartmentId', levelId='$currentLevelId', facultyId='$currentFacultyId' WHERE fullName='" . mysqli_real_escape_string($con, $currentFullName) . "' AND courseCode='$courseCode'";
                        if (mysqli_query($con, $updateSql)) {
                            $statusMsg .= "Score updated successfully for " . $currentFullName . "<br>";
                        } else {
                            $errorMsg .= "Error updating score for " . $currentFullName . ": " . mysqli_error($con) . "<br>";
                        }
                    } else {
                        // Save the score in the database
                        $insertSql = "INSERT INTO tblresult (fullName, exx1, matricNo, departmentId, levelId, facultyId, courseCode) VALUES (
                            '" . mysqli_real_escape_string($con, $currentFullName) . "',
                            '$currentExx1',
                            '$currentMatricNo',
                            '$currentDepartmentId',
                            '$currentLevelId',
                            '$currentFacultyId',
                            '$courseCode'
                        )";
                        if (mysqli_query($con, $insertSql)) {
                            $statusMsg .= "Score saved successfully for " . $currentFullName . "<br>";
                        } else {
                            $errorMsg .= "Error: " . $insertSql . "<br>" . mysqli_error($con) . "<br>";
                        }
                    }
                }
            }
        } else {
            $errorMsg .= "Error: The number of full names, scores, and additional data fields doesn't match.<br>";
        }
    }
    // Display error messages if there are any
    if ($errorMsg !== "") {
        echo "<div class='error'>" . $errorMsg . "</div>";
    }

    // Initialize an associative array to store scores for each student
    $scoresMap = array();

    // Retrieve existing scores from the database
    $existingScoresSql = "SELECT fullName, exx1 FROM tblresult";
    $existingScoresResult = mysqli_query($con, $existingScoresSql);

    if ($existingScoresResult) {
        while ($row = mysqli_fetch_assoc($existingScoresResult)) {
            $studentName = $row['fullName'];
            $exx1 = $row['exx1'];
            $scoresMap[$studentName] = $exx1;
        }
    }
    ?>

    <form method="post" class="student-list">
        <!-- Add hidden fields to store student names and status -->
        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $studentName = $row['firstName'] . ' ' . $row['lastName'] . ' ' . $row['otherName'];
                $matricNo = $row['matricNo'];
                $departmentId = $row['departmentId'];
                $levelId = $row['levelId'];
                $facultyId = $row['facultyId'];
                echo "<input type='hidden' name='courseCode'  value='" . $courseCode . "'>";
                echo "<input type='hidden' name='fullName[]' value='" . $studentName . "'>";
                echo "<input type='hidden' name='matricNo[]' value='" . $matricNo . "'>";
                echo "<input type='hidden' name='departmentId[]' value='" . $departmentId . "'>";
                echo "<input type='hidden' name='levelId[]' value='" . $levelId . "'>";
                echo "<input type='hidden' name='facultyId[]' value='" . $facultyId . "'>";

                echo "<div class='student'>";
                echo "<div class='student-name'>" . $studentName . "</div>";
                echo "<input type='text' class='student-input' value='" . (isset($scoresMap[$studentName]) ? $scoresMap[$studentName] : "") . "' name='exx1[]'>";
                echo '<span class="status">' . (isset($scoresMap[$studentName]) && $scoresMap[$studentName] !== "" ? "filled" : "unfilled") . '</span>';
                echo "</div>";
            }
        }
        ?>

        <button type="submit">Save Scores</button>
    </form>

    <div id="statusMessage"><?php echo $statusMsg; ?></div>

</body>
</html>


