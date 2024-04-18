<?php
// Include the database connection file if not already included
include('dbconnection.php');

// Check if studentName and score are provided via POST
if (isset($_POST['studentName']) && isset($_POST['score'])) {
    $studentName = $_POST['studentName'];
    $score = $_POST['score'];

    // Check if a record with the student name exists in the database
    $checkSql = "SELECT * FROM tblres1 WHERE firstName='$studentName'";
    $checkResult = mysqli_query($con, $checkSql);

    if ($checkResult && mysqli_num_rows($checkResult) > 0) {
        // Update the existing score in the database
        $updateSql = "UPDATE tblres1 SET scores='$score' WHERE firstName='$studentName'";
        if (mysqli_query($con, $updateSql)) {
            echo "filled"; // Return "filled" if the score is updated successfully
        } else {
            echo "error";
        }
    } else {
        echo "error";
    }
} else {
    echo "error";
}

// Close the database connection
mysqli_close($con);
?>
