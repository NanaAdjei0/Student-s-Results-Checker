<?php
if (isset($_POST['submit'])) {
    // Include the database connection code (update with your connection details)
    $con=mysqli_connect("localhost", "root", "", "a5");

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Get the selected classroom and sub_code from the form
    $classroom = $_POST['classroom'];
    $sub_name = $_POST['sub_name'];

    // Construct the SQL query to retrieve students in the selected class and sub_code
    $query = "
    SELECT students.stu_id, students.name, class.classroom
    FROM students
    JOIN class ON students.class = class.class_id
    WHERE class.classroom = '$classroom' ;
    ";

    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Error: " . mysqli_error($con));
    }

    // Display the students in a table
    echo "<h2>Students in Class $classroom for Subject Code $sub_name</h2>";
    echo "<table border='1'>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Classroom</th>
            </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['stu_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['classroom'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    // Close the database connection
    mysqli_close($con);
} else {
    echo "Invalid request.";
}
?>
