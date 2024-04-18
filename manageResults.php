
<?php
 include('db.php');
 include('dbconnection.php');
 if(isset($_GET['matricNo']) && isset($_GET['levelId']) && isset($_GET['departmentId']) && isset($_GET['facultyId']) && isset($_GET['sessionId']) && isset($_GET['semesterId'])){
    $alertStyle ="";
  $statusMsg="";
    $matricNo = $_GET['matricNo'];
    $levelId = $_GET['levelId'];
    $departmentId = $_GET['departmentId'];
    $facultyId = $_GET['facultyId'];
    $sessionId = $_GET['sessionId'];
    $semesterId = $_GET['semesterId'];

    
    $stdQuery=mysqli_query($con,"select * from tblstudent where matricNo = '$matricNo'");                        
    $rowStd = mysqli_fetch_array($stdQuery);

    $semesterQuery=mysqli_query($con,"select * from tblsemester where Id = '$semesterId'");                        
    $rowSemester = mysqli_fetch_array($semesterQuery);

    $sessionQuery=mysqli_query($con,"select * from tblsession where Id = '$sessionId'");                        
    $rowSession = mysqli_fetch_array($sessionQuery);

    $levelQuery=mysqli_query($con,"select * from tbllevel where Id = '$levelId'");                        
    $rowLevel = mysqli_fetch_array($levelQuery);


}
else{
    // echo "<script type = \"text/javascript\">
    // window.location = (\"studentList.php\");
    // </script>";
}
// Check if the form is submitted
if (isset($_POST['submit'])) {

    $alertStyle ="";
    $statusMsg="";
 
    include('db.php'); // Include your database connection script

   $fullName = $rowStd['firstName'].' '.$rowStd['lastName'].' '.$rowStd['otherName'] ;
    // Sanitize and validate input
    $headRemarks = mysqli_real_escape_string($con, $_POST['headRemarks']);
    $masRemarks = mysqli_real_escape_string($con, $_POST['masRemarks']);
    $onRoll = $_POST['onRoll'];
    $termEnds = mysqli_real_escape_string($con, $_POST['termEnds']);
    $termBegins = mysqli_real_escape_string($con, $_POST['termBegins']);
    $daysPresent = mysqli_real_escape_string($con, $_POST['daysPresent']);
    $totalAttendance = mysqli_real_escape_string($con, $_POST['totalAttendance']);
    $dateCreated = date("Y-m-d H:i:s"); // Current date and time

    // Insert the data into the database
    $query = mysqli_query($con, "INSERT INTO tblmanresults (headRemarks, masRemarks, onRoll, termEnds, termBegins, daysPresent, totalAttendance, dateCreated,matricNo,fullName) 
                                 VALUES ('$headRemarks', '$masRemarks', '$onRoll', '$termEnds', '$termBegins', '$daysPresent', '$totalAttendance', '$dateCreated','$matricNo','$fullName')");

    if ($query) {
        // Data inserted successfully
        $alertStyle ="alert alert-success";
        $statusMsg = "Data inserted successfully";
    } else {
        // An error occurred while inserting data
        $alertStyle ="alert alert-danger";
        $statusMsg = "An error occurred: " . mysqli_error($con);
    }

    // Close the database connection
    mysqli_close($con);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">



</head>

<body>
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
    <div class="container">
        <aside>
        <button id="goBackBtn">Go Back</button>
            <!-- TOP LEFT NAVIGATION BAR -->
           

            <!-- TOP LEFT NAVIGATION BAR -->

            <!-- SIDE BAR NAVIGATION BAR -->

           

            <!-- SIDE BAR NAVIGATION BAR -->

        </aside>
        




 <main>
    <!-- <h1>Dashboard</h1> -->
   

    <!-- DATE(CALENDER) -->
    <!-- <div class="date">
        <input type="date">
    </div> -->
      <!-- DATE(CALENDER) -->
   
      <div class="">
 <div class="card" style="margin-bottom: 2vh;">
 <!-- [<?php echo $rowSemester['semesterName'];?>] -->
 <strong  class="card-title"><h3 style="font-weight: 600;" align="center">Manage <?php echo  $rowStd['firstName'].' '.$rowStd['lastName']?>'s&nbsp;  - Term Result</h3></strong>
 </div>
<div>
<div class="<?php echo $alertStyle;?>" role="alert"><h6><?php echo $statusMsg;?></h6></div>
<h6 style="color: grey;">Please fill the form below</h6>
 </div>

    <form method="post" action="">

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Remarks</span>
  <input type="text" name="headRemarks"  class="form-control" placeholder="Headmaster's Remarks" aria-label="Username" aria-describedby="basic-addon1" required>
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Remarks</span>
  <input type="text" name="masRemarks"  class="form-control" placeholder="Master's Remarks" aria-label="Username" aria-describedby="basic-addon1" required>
</div>


<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">No. on roll</span>
  <input type="number" name="onRoll"  class="form-control" placeholder="No. on roll" aria-label="Username" aria-describedby="basic-addon1" required>
</div>

<div class="input-group mb-3">
<span class="input-group-text">Term</span>
<input type="text" name="termEnds" class="form-control" placeholder="Ends eg.(20/10/2023)" aria-label="Username" required>
<input type="text" name="termBegins"  class="form-control" placeholder="Next Begins eg.(20/10/2023)" aria-label="Server" required>

</div>

<div class="input-group mb-3">
  
<input type="text" name="daysPresent" class="form-control" placeholder="Days Present" aria-label="Username" required>
  <span class="input-group-text">out of</span>
  <input type="text" name="totalAttendance" class="form-control" placeholder="Total Attendance" aria-label="Server" required>

</div>


<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Student Id</span>
  <input id="" value="<?php echo $matricNo ?>" name="matricNo[]"  type="text"  class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" readonly>
</div>

<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">Fullname</span>
  <input id="" value="<?php echo  $rowStd['firstName'].' '.$rowStd['lastName'].' '.$rowStd['otherName']?>" name="firstName[].' '.lastName[].' '.otherName[]"  type="text"  class="form-control" placeholder="" aria-label="Username" aria-describedby="basic-addon1" readonly>
</div>



<!-- <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon2">@example.com</span>

  <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
</div> -->



        <!-- <label for="headRemarks">Headmaster's Remarks:</label>
        <input type="text" name="headRemarks" required><br> -->

        <!-- <label for="masRemarks">Class Master's Remarks:</label>
        <input type="text" name="masRemarks" required><br> -->

        <!-- <label for="onRoll">No. on Roll:</label>
        <input type="number" name="onRoll" required><br> -->

        <!-- <label for="termEnds">Term Ends:</label>
        <input type="text" name="termEnds" required><br> -->

        <!-- <label for="termBegins">Term Begins:</label>
        <input type="text" name="termBegins" required><br> -->
<!-- 
        <label for="daysPresent">Days Present:</label>
        <input type="text" name="daysPresent" required><br> -->

        <!-- <label for="totalAttendance">Total Attendance:</label>
        <input type="text" name="totalAttendance" required><br> -->

        <button type="submit" name="submit" class="btn btn-primary" style="width: 100%">Submit</button>
    </form>


                            
     </div>
     

     <!-- <div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon1">@</span>
  <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
</div>

<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <span class="input-group-text" id="basic-addon2">@example.com</span>
</div>

<label for="basic-url" class="form-label">Your vanity URL</label>
<div class="input-group mb-3">
  <span class="input-group-text" id="basic-addon3">https://example.com/users/</span>
  <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
</div>

<div class="input-group mb-3">
  <span class="input-group-text">$</span>
  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
  <span class="input-group-text">.00</span>
</div>

<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Username" aria-label="Username">
  <span class="input-group-text">@</span>
  <input type="text" class="form-control" placeholder="Server" aria-label="Server">
</div>

<div class="input-group">
  <span class="input-group-text">With textarea</span>
  <textarea class="form-control" aria-label="With textarea"></textarea>
</div> -->
   
   
 







<style>
    
/* For screens smaller than 768px (tablets and mobiles) */
@media only screen and (max-width: 767px) {

/* Set the width of all input fields to 100% */
input[type="text"], 
input[type="email"], 
input[type="password"], 
textarea {
  width: 100%;
}

/* Set the font size of all labels to 14px */
label {
  font-size: 14px;
}

/* Set the margin and padding of all form elements to 0 */
form * {
  margin: 0;
  padding: 0;
}

}
</style>











<!-- 
                            <form method="post">
                            <div class="card-body">
                                <p id="demo"></p>
                             <div class="<?php if(isset($alertStyle)){echo $alertStyle;}?>" role="alert"><?php if(isset($statusMsg)){echo $statusMsg;}?></div>
                                <table >
                                       <thead>
                                        <tr> -->
                                            <!-- <th>#</th>
                                            <th>Course</th>
                                            <th>Code</th>
                                            <th>Unit</th>
                                            <th>Score</th> -->
                                        <!-- </tr>
                                    </thead>
                                    <tbody>
                                      
                            <?php
                $ret=mysqli_query($con,"SELECT tblcourse.courseCode,tblcourse.courseTitle,tblcourse.dateAdded,tblcourse.Id,
                tblcourse.courseUnit,tbllevel.levelName,tblfaculty.facultyName,tbldepartment.departmentName,tblsemester.semesterName
                from tblcourse 
                INNER JOIN tbllevel ON tbllevel.Id = tblcourse.levelId
                INNER JOIN tblsemester ON tblsemester.Id = tblcourse.semesterId
                INNER JOIN tblfaculty ON tblfaculty.Id = tblcourse.facultyId
                INNER JOIN tbldepartment ON tbldepartment.Id = tblcourse.departmentId
                where tblcourse.levelId ='$levelId' and tblcourse.semesterId ='$semesterId' 
                and tblcourse.departmentId ='$departmentId' and tblcourse.facultyId ='$facultyId'");

                $cnt=1;
                while ($row=mysqli_fetch_array($ret)) {
                ?>
                <tr>
                <td><?php echo $cnt;?></td>
                <td><?php  echo $row['courseTitle'];?></td>
                <td><?php  echo $row['courseCode'];?></td>
                <td><?php  echo $row['courseUnit'];?></td>
                <td><input  name="score[]" id="score" type="text" class="form-control" maxlength="3" onkeypress="return isNumber(event)" ></td>
                <input id="" value="<?php echo $row['courseCode'];?>" name="courseCode[]"  type="hidden" class="form-control" >
                <input id="" value="<?php echo $row['courseUnit'];?>" name="courseUnit[]"  type="hidden" class="form-control" >
                <input id="" name="" value="<?php echo $row['Id'];?>" type="hidden" class="form-control" >
                </tr>
                <?php 
                $cnt=$cnt+1;
                }?>
                                                                                
                                    </tbody>
                                </table> -->
                            <!-- <button type="submit" onclick="myFunction()" name="compute" class="btn btn-success">Compute Result</button> -->
                             <!-- </form>
                            </div> -->









   
   
        </main>
<!-- 
        <div class="right">
            <div class="top">
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
                <div class="theme-toggler">
                    <span class="material-icons-sharp active">light_mode</span>
                    <span class="material-icons-sharp">dark_mode</span>
                </div>
                <div class="profile">
                    <div class="info">
                        <p>Hello <b>Williams</b></p>
                        <small class="text-muted">Admin</small>
                    </div>
                    <div class="profile-photo1">
                        <img style="border-radius: 50rem; object-fit: cover; background-size: cover;"  src="./images/prof1.jpg" width="50">
                    </div>
                </div>
            </div> -->

            <div class="recent-updates">
           
                <!-- <h2> <span  style="left: 300px;" class="material-icons-sharp">addition</span>New Subject</h2> -->
               
                <!-- <button style="margin-bottom: 2vh;" class="gradient-button1"><a href="createCourses.php"><h3 style="font-family: 'Poppins', sans-serif; text-decoration: underline;">Compute Results</h3></a> </button> <br>
                <button style="margin-bottom: 2vh; " class="gradient-button1"><a href="manageResultspage.php"><h3 style="font-family: 'Poppins', sans-serif; text-decoration: underline;">Manage Results</h3></a> </button> <br>
                <button class="gradient-button1"><a href="results.php"><h3 style="font-family: 'Poppins', sans-serif; text-decoration: underline;">Print Results</h3></a> </button>

             -->
                   <style>

                    body {

                        font-family: 'Poppins', sans-serif;
                        font-weight: 600;
                        font-size: 46%;
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
<div class="nav" style="margin-top: 10vh;">
    <!-- <h6 style="font-weight: 2rem;">Copyright &copy;Almighty Vision Academy SBA || Powered by WillOrg</h6> <br> -->
    <!-- <p>Powered by WillOrg</p> -->
</div>

 

    <!-- <script src="./order.js"></script> -->
    <script src="./index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
      <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
      <script>
        	
new DataTable('#example');

var goBackBtn = document.getElementById("goBackBtn");

goBackBtn.addEventListener("click", function() {
  window.history.back();
});
      </script>
</body>
</html>











<!-- 
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

 -->