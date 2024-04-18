
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SBA</title>
  
    <!-- <link rel="stylesheet" href="style.css"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="shortcut icon" href="./images/ava.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<head>
    <style>
        
         /* Container Styles */
         .container {
            max-width: 100%;
            padding: 1rem;
            box-sizing: border-box;
            margin: 0 auto;
        }
       
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        @media(min-width: 768px){
            body{
            padding: 2vh 15vh 10vh 15vh;
        }
      
        table{
            width: 100%;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .mediumlist {
            width: 100%;
            
        }
        /* .name {
            margin-left: 27vh;
        } */
        }
    </style>
</head>
<body>



<?php
// Establish a database connection (replace with your connection code)
$con = mysqli_connect("localhost", "root", "", "a5");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if (isset($_GET['name']) && isset($_GET['stu_index'])) {
    // Define the departmentId and fullName
    $name = $_GET['name'];
    $stu_index = $_GET['stu_index'];
    $class_id = $_GET['class_id'];
    $termid = $_GET['termid']; 
}

if (isset($_GET['name']) && isset($_GET['stu_index']) && isset($_GET['class_id'])) {
    // Define the departmentId and fullName
    $name = $_GET['name'];
    $stu_index = $_GET['stu_index'];
    $class_id = $_GET['class_id'];
    $termid = $_GET['termid'];
    // Retrieve data from tblresult
    $query = "SELECT name, class_id, stu_index, exx1, exx2, exx3, exx4, hw1, hw2, hw3, hw4, clt1, clt2, midTerm, endTerm, sub_name
          FROM tblresult WHERE name = '$name' AND  stu_index = '$stu_index' AND class_id = '$class_id' AND termid = '$termid' ";

    $result = mysqli_query($con, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($con));
    }

    // Initialize variables
    $convClassScoreArray = [];
    $convendTermArray = [];
    $totalScoreArray = [];
    $totalScoreSum = 0; // Variable to calculate the sum of total scores

    // Process the results
    while ($row = mysqli_fetch_assoc($result)) {
        // Calculate convClassScore (sum of exx1 to clt2 scores * 0.23)
        $classScore = $row['exx1'] + $row['exx2'] + $row['exx3'] + $row['exx4'] +
            $row['hw1'] + $row['hw2'] + $row['hw3'] + $row['hw4'] +
            $row['clt1'] + $row['clt2'] + $row['midTerm'];
        $convClassScore = round($classScore * 0.248);

       

        // Calculate convendTerm (endTerm score * 0.7)
        $convendTerm = $row['endTerm'] * 0.7;

        // Calculate totalScore (sum of convClassScore and convendTerm)
        $totalScore = $convClassScore + $convendTerm;

       
        // Store the calculated values in arrays
        $convClassScoreArray[$row['sub_name']] = $convClassScore;
        $convendTermArray[$row['sub_name']] = $convendTerm;
        $totalScoreArray[$row['sub_name']] = $totalScore;
        $totalScoreSum += $totalScore; // Add to the total score sum
    }

    // Calculate the average total score
    $averageTotalScore = round($totalScoreSum / count($totalScoreArray),2);

    $totalScoreForAllSubjects = array_sum($totalScoreArray);


   
// Display the results in a table with CSS styles
echo "<div style='overflow-x:auto; text-align:center;'>";
?>
<div class="toplist" style="display: flex; flex-direction: row; justify-content: center; align-items: center; text-align: center;">
<img src="./images/logo.png" style="width: 90px; height: 80px; background-size: cover; object-fit: cover; " alt="">
<div class="texttop1">
    <h2 class="schname" style="font-size: 1.5rem;">ALMIGHTY VISION ACADEMY</h2>
    <p style="font-size: 0.875rem; font-weight: lighter;">Post Office 2533, Sunyani-Bono, Ghana West Africa</p>
    <p style="font-size: 0.875rem; font-weight: lighter;">Email: almightyvisionsch@gmail.com</p>
    <p style="font-size: 0.875rem; font-weight: lighter;">Mobile: +233 (0)24 641 8995 / 24 402 5998</p>
</div>
<img src="./images/instruction-11.png" style="width: 90px; height: 80px;  background-size: cover; object-fit: cover; " alt="">

</div>

<hr style="width: 460px; ">
    <div style="justify-content: center; align-items: center; text-align:center;"><h4>STUDENT RESULT SHEET</h4></div>


    <div class="mediumlist "  style="display: flex; gap: 4vh; font-weight: lighter; width: 100%; max-width: 800px; margin: 0 auto;">
           <?php  echo "<p class='name';>Name of pupil: $name</p>";   ?>
           <?php   echo "<p class='name'>Grade: $class_id</p>";   ?>
           <?php  echo "<p class='namebottom'>Sch. breaks on: 10th Sept 2023</p>";   ?>
           </div>
           <div class="mediumlist "  style="display: flex; gap: 11vh; width: 100%; max-width: 800px; margin: 0 auto;">
           <?php  echo "<p class='name';>Term: Second</p>";   ?>
           <?php   echo "<p class='name'>Academic Year: 2023</h5>";   ?>
           <?php  echo "<p class='namebottom'>Reopen on: 10th Sept 2023</p>";   ?>
           </div>
            
<?php

echo "<table class='responsive-table' border='1' style='width: 100%; max-width: 800px; margin: 0 auto;'>






    <tr style='background-color: lightgrey; '>
        <th>Subject </th>
        <th>Class Score (30%) </th>
        <th>Exams Score (70%) </th>
        <th>Total (100%)</th>
        <th>Interpretation</th>
    </tr>";

foreach ($convClassScoreArray as $sub_name => $convClassScore) {
    echo "<tr>";
    echo "<td>" . $sub_name . "</td>";
    echo "<td>" . $convClassScore . "</td>";
    echo "<td>" . $convendTermArray[$sub_name] . "</td>";
    echo "<td>" . $totalScoreArray[$sub_name] . "</td>";

    // Determine totalScoreInterpretation based on totalScore for each subject
    $subjectTotalScore = $totalScoreArray[$sub_name];
    if ($subjectTotalScore >= 90) {
        $subjectTotalScoreInterpretation = "Outstanding";
    } elseif ($subjectTotalScore >= 80) {
        $subjectTotalScoreInterpretation = "Excellent";
    } elseif ($subjectTotalScore >= 70) {
        $subjectTotalScoreInterpretation = "Very Good";
    } elseif ($subjectTotalScore >= 60) {
        $subjectTotalScoreInterpretation = "Good";
    } elseif ($subjectTotalScore >= 50) {
        $subjectTotalScoreInterpretation = "Credit";
    } elseif ($subjectTotalScore >= 40) {
        $subjectTotalScoreInterpretation = "Pass";
    } elseif ($subjectTotalScore >= 0) {
        $subjectTotalScoreInterpretation = "Fail";
    }

    echo "<td>" . $subjectTotalScoreInterpretation . "</td>";
    echo "</tr>";
}

// Add a row for the average total score






// Add a row for the total score of all subjects







echo "</table>";

echo "</div>";

}
?>
<div class="mediumlist" style="display: flex; gap:  12vh; width: 100%; max-width: 800px; margin: 0 auto;">
<p>Agg. of the best six results:</p>
<p>W.A <strong><?php echo  $averageTotalScore  ?> </strong></p>
<p>Total Score: <?php echo $totalScoreForAllSubjects ?> </p>

</div>
<div class="mediumlist" style="display: flex; gap:  18vh; width: 100%; max-width: 800px; margin: 0 auto;">
         <p>Attendance: 46</p>
         <p>Out of : 46</p>
         <p>No on roll: 46</p>

        </div>
        <div class="mediumlist" style="display: flex; gap:  25vh; width: 100%; max-width: 800px; margin: 0 auto;">
         <p>Class Teacher's Remark: More room for improvement</p>
         <p>Position: </p>

        </div>
       
        <div class="mediumlist "  style="display: flex;  font-weight: lighter; width: 100%; max-width: 800px; margin: 0 auto;">
      <p class="name">Head Sign</p>
    <hr style="width: 460px; ">

    
        </div>
        <div style="justify-content: center; align-items: center; text-align:center; ">Mrs. Hannah Asare (Proprietress)</div>

    <hr style="margin-top: 1vh;">
    <div class="name "  style="display: flex;  gap: 9vh; justify-content: center; align-items: center; text-align: center; font-weight: lighter;">
    <p>Student ID:<?php echo $stu_index?> </p>
    <p>www.almightyvisionacademy.com</p>

    </div>

</body>
</html>