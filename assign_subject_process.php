<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if 'sub_code' key exists in the $_POST array
    if (isset($_POST['sub_code'])) {
        // Retrieve user_id and subject from the form submission
        $user_id = $_POST['user_id'];
        $sub_code = $_POST['sub_code'];

        // Replace with your database connection code
        include('dbconnection.php');

        // Check if the user is already assigned to the subject
        // $check_assignment_query = "SELECT urid FROM subjects WHERE urid ='$user_id' AND sub_code = '$sub_code'";
        $update_assignment_query = "UPDATE subjects SET urid = '$user_id' WHERE sub_code = '$sub_code'";
        if (mysqli_query($con, $update_assignment_query)) {
            echo "User assignment to the subject updated successfully.";
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

        mysqli_close($con);
    } else {
        echo "sub_code is missing in the form submission.";
    }

?>
