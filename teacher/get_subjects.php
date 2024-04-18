<?php
// Establish a database connection (replace with your connection code)
$con = mysqli_connect("localhost", "root", "", "a5");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['classroom'])) {
    $classroom = $_POST['classroom'];

    // Retrieve sub_name options from the "subjects" table for the selected class
    $subQuery = "SELECT subjects.sub_name FROM subjects
    JOIN class ON subjects.classid = class.class_id 
    WHERE class.classroom = '$classroom'";
    $subResult = mysqli_query($con, $subQuery);

    $subjectOptions = [];
    if ($subResult) {
        while ($subRow = mysqli_fetch_assoc($subResult)) {
            $subjectOptions[] = $subRow['sub_name'];
        }
    }

    // Close the database connection
    mysqli_close($con);

    // Return the subject options as a JSON response
    echo json_encode($subjectOptions);
} else {
    echo "Invalid request";
}
?>
