
<?php

    include('dbconnection.php');
    include('session.php');
    error_reporting(0);

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
function showValues(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","ajaxCall2.php?fid="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>

<body>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;700&display=swap');

:root {
    --color-primary: rgb(167, 115, 194);
    --color-danger: rgb(216, 85, 111);
    --color-success: rgb(122, 182, 122);
    --color-warning: rgb(207, 207, 125);
    --color-white: white;
    --color-info-dark: grey;
    --color-info-light: rgb(231, 224, 224);
    --color-dark: rgb(49, 49, 49);
    --color-info-dark: rgb(102, 102, 102);
    --color-light: rgb(219, 216, 216);
    --color-primary-variant: rgb(13, 13, 77);
    --color-dark-variant: grey;
    --color-background: rgba(240, 236, 236, 0.877);

    --color-border-radius: 2rem;
    --border-radius-1: 0.4rem;
    --border-radius-2: 0.8rem;
    --borer-radius-3: 1.2rem;

    --card-border-radius: 3em;
    --card-padding: 1rem;
    --padding: 2.2rem;
    --box-shadow: 0 3rem 2rem var(--color-light);

}

.dark-theme-variables {
    --color-background: #181a1e;
    --color-white: #202528;
    --color-dark: white;
    --color-dark-variant: rgb(216, 206, 206); 
    --color-light: rgba(0, 0, 0, 0.4);
    --box-shadow: 0 2rem 3rem var(--color-light);










}
* {
    margin:0;
    padding: 0;
    outline:0;
    appearance: none;
    border: 0;
    text-decoration: none;
    list-style: none;
    box-sizing:border-box;
}
html {
    font-size: 14px;
}

body{
    width: 100vw;
    height: 100vh;
    font-family: poppins, sans-serif;
    font-size: 0.88rem;
    background: var( --color-background);
    user-select: none;
    overflow-x: hidden ;
    color: var(--color-dark);

}

.container {
    display: grid;
    width: 90%;
    margin: 0 auto;
    
    gap: 1.8em;
    grid-template-columns: 14rem auto 23rem;
}

a {
    color: var(--color-dark)
}

img {
    display: block;
    
}

h1 {
    font-weight: 800;
    font-size: 1.8rem;

}
h2{
    font-size: 1.4rem;
}
h3{
    font-size: 0.87rem;
}
h4{
    font-size: 0.8rem;

}
h5{
    font-size: 0.77rem;
}

small {
    font-size: 0.75rem;
}

.profile-photo {
    width: 2.8rem;
    height: 2.8rem;
    border-radius: 50%;
    overflow: hidden;
}
.text-muted {
    color: var( --color-info-dark);

}

p {
    color:var(--color-dark-variant);
}
b {
    color: var(--color-dark);
}

.primary{
    color: var(--color-primary);
}
.danger{
    color: var(--color-danger);
}
.success{
    color: var(--color-success);
}
.warning{
    color: var(--color-warning);
}


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


aside {
    height: 100vh;
    

}

aside .top{
    
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-top: 1.4rem;
}

aside .logo{
    display:flex;
    gap: 0.8rem;
}
aside .logo .img {
    width: 0.1rem;
    height: 2rem;
}

aside .close {
    display: none;
}

.container .logo h2 {
    padding-top:0.7em;
 }
 


aside .sidebar {
    
    display: flex;
    flex-direction: column;
    height: 86vh;
    position: relative;
    top: 3rem;

}
aside h3 {
    font-weight: 500;
}
aside .sidebar a{ 
    display: flex;
    color: var(--color-info-dark);
    margin-left: 2rem;
    gap: 1rem;
    align-items: center;
    position: relative;
    height: 3.7rem;
    transition: all 300ms ease;
}

aside .sidebar a span {
    font-size: 1.6rem;
    transition: all 300ms ease;
}
aside .sidebar a:last-child{
    position: absolute;
    bottom: 2rem;
    width: 100%;
}
aside .sidebar a.active {
    background: var(--color-light);
    color: var(--color-primary);
    margin-left: 0;
}

aside .sidebar a.active:before {
    content: '';
    width: 6px;
    height: 100%;
    background: var(--color-primary);

}
aside .sidebar a.active span {
    color: var(--color-primary);
    margin-left: calc(1rem -3px)
}
aside .sidebar a:hover{
    color: var(--color-primary);

}
aside .sidebar a:hover{
    margin-left: 1rem;
}

aside .sidebar .message-count {
    background: var(--color-danger);
    color: var(--color-white);
    padding: 2px 10px;
    font-size: 11px;
    border-radius: var(--border-radius-1);
}





/* nav */

.nav {
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: rgb(61, 61, 61);
}







main {
    margin-top:1.4rem;
}

main .date {
    display: inline-block;
    background: var(--color-light);
    border-radius: var(--border-radius-1);
    margin-top: 1rem;
    padding: 0.5rem 1.6rem;
}
main .date input[type='date'] {
    background: transparent;
    color: var(--color-dark);
}

main .insights{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 1.6rem;
    
}

main .insights > div{
    background: var(--color-white);
    padding: var(--card-padding);
    border-radius: var(--card-border-radius);
    margin-top: 1rem;
    box-shadow: var(--box-shadow);
    transition: all 300ms ease;
}

main .insights > div:hover{
    box-shadow: none;
}
main .insights > div span {
    background: var(--color-primary);
    padding: 0.5rem;
    border-radius: 50%;
    color: var(--color-white);
    font-size: 2rem;
}
main .insights > div.expenses span{
    background: var(--color-danger);

}
main .insights > div.income span{
    background: var(--color-success);
}
main .insights > div .middle{
    display: flex;
    align-items: center;
    justify-content: space-between;

}
main .insights h3 {
    margin: 1rem 0 0.6rem;
    font-size: 1rem;
}

main .insights .progress {
    position: relative;
    width: 92px;
    height: 92px;
    border-radius: 50%;
}
main .insights svg {
    width: 7rem;
    height:7rem;
}
main .insights svg circle{
    fill: none;
    stroke: var(--color-primary);
    stroke-width: 14;
    stroke-linecap: round;
    transform: translate(5px, 5px);
   
    
}
main .insights .sales svg circle{
    stroke-dashoffset: -30;
    stroke-dasharray: 200;
}
main .insights.expenses svg circle{
    stroke-dashoffset: -35;
    stroke-dasharray: 110;
}
main .insights .income svg circle{
    stroke-dashoffset: -35;
    stroke-dasharray: 110;
}

main .insights .progress .number{
    position:absolute;
    top:0;
    left: 0;
    height: 100%;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;

    
}

main .insights small {
    margin-top: 1.3rem;
    display:block;
}







main .recent-orders{
    margin-top: 2rem;
}

main .recent-orders h2 {
    margin-bottom: 0.8rem;
    
}

main .recent-orders table{
    background: var(--color-white);
    width: 100%;
    border-radius: var(--card-border-radius);
    padding: var(--card-padding);
    box-shadow: var(--box-shadow);
    transition: all 300ms ease;
    text-align: center;
}

main .recent-orders table:hover{
    box-shadow: none;
    
}

main table tbody td {
    height: 2.8rem;
    border-bottom: 1px solid var(--color-light);
    color: var(--color-dark-variant);

}

main table tbody tr:last-child{
    border: none;
}

main .recent-orders a {
    text-decoration: none;
    text-align: center;
    display: block;
    margin: 1rem 1rem;
    color: var(--color-primary);
}











.right {
    margin-top:1.4rem;
}
.right .top {
    display:flex;
    justify-content: end;
    gap: 2rem;
   
}
.right .top button {
    display: none;
}
.right .theme-toggler {
    background: var(--color-light);
    display:flex;
    justify-content: space-between;
    align-items: center;
    height: 1.6rem;
    width: 4.2rem;
    cursor: pointer;
    border-radius: var(--border-radius-1);

}
.right .theme-toggler span {
    font-size: 1.2rem;
    height: 100%;
    width: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}
.right .theme-toggler span.active {
    background: var(--color-primary);
    color: white;
    border-radius: var(--border-radius-1);
}

.right .top .profile {
    display: flex;
    gap: 2rem;
    text-align: right;
}


.right .recent-updates {
    margin-top: 1rem;
}
.right .recent-updates h2{
    margin-bottom: 0.8rem;
}
.right .recent-updates .updates {
    background: var(--color-white);
    padding: var(--card-padding);
    border-radius: var(--card-border-radius);
    box-shadow: var(--box-shadow);
    transition: all 300ms ease;
}
.right .recent-updates .updates:hover {
    box-shadow: none;
}
.right .recent-updates .updates .update{
    display:grid;
    grid-template-columns: 2.6rem auto;
    gap: 2.9rem;
    margin-bottom: 1rem;

}


.right .sales-analytics{
    margin-top: 2rem;
}
.right .sales-analytics h2 {
    margin-bottom: 0.8rem;

}

.right .sales-analytics .item{
    background: var(--color-white);
    display:flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 0.7rem;
    padding:1.4rem var(--card-padding);
    border-radius: var(--borer-radius-3);
    box-shadow: var(--box-shadow);
    transition: all 300ms ease;
}
.right .sales-analytics:hover{
    box-shadow: none;

}
.right .sales-analytics .item .right{
    display: flex;
    justify-content: space-between;
    align-items: start;
    margin:0;
    width: 100%;
}

.right .sales-analytics .item .icon{
    padding: 0.6rem;
    color: var(--color-white);
    border-radius: 50%;
    background: var(--color-primary);
    display: flex;
}
.right .sales-analytics .item.offline .icon{
    background: var(--color-danger);
}
.right .sales-analytics .item.offline .icon{
    background: var(--color-danger);
}

.right .sales-analytics .item.customers .icon{
    background: var(--color-success);
}
.right .sales-analytics .add-product{
    background-color: transparent;
    border: 2px dashed var(--color-primary);
    color: var(--color-primary);
    display: flex;
    align-items: center;
    justify-content: center;
    width: 90%;
    margin-left: 1.8rem;
}

.right .sales-analytics .add-product:hover{
    background: var(--color-primary);
    color: white;
}
.right .sales-analytics .add-product div{
   display:flex;
   align-items: center;
   gap: 0.6rem;
}
.right .sales-analytics .add-product div h3{
    font-weight: 600;
}





@media screen and (max-width:1200px){
    .container{
        width: 94%;
        grid-template-columns: 7rem auto 23rem;
        
    
    }
    aside .logo h2 {
        display: none;
    }
    aside .sidebar h3{
        display:none;
    }
    aside .sidebar a {
        width: 5.6rem;
    }
    aside .sidebar a:last-child{
        position: relative;
        margin-top: 1.8rem;

    }

    main .insights{
        grid-template-columns: 1fr;
        gap: 0;
    }
    main .recent-orders {
        width: 94%;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        margin: 2rem 0 0 0 8.8rem;
    }
    main .recent-orders table{
        width: 83vw;}
    /* }
    main table thead tr th:last-child, 
    main table thead tr th:first-child{
        display: none;
    }
    main table tbody tr td:last-child, 
    main table tbody tr td:first-child{
        display: none;
    } */
}





@media screen and (max-width: 768px){
    .container{
        width: 95%;  
        grid-template-columns: 1fr;
       
    }
    aside {
        position:fixed;
        left: -100%;
        background: var(--color-white);
        width: 18rem;
        z-index: 3;
        box-shadow: 1rem 3rem 4rem var(--color-light);
        height: 100vh;
        padding-right: var(--card-padding);
        display: none;
        animation: showMenu 400ms ease forwards;
    }
    @keyframes showMenu {
        to {
            left: 0;
        }
    }

    aside .logo {
        margin-left: 1rem;

    }
    aside .logo h2{
        display: inline;
    }
    aside .sidebar h3{
        display: inline;
    }

    aside .sidebar a {
        width: 100%;
        height: 3.4rem;
    }
    aside .sidebar a:last-child{
        position: absolute;
        bottom: 5rem;
    }
    aside .close {
        display: inline-block;
        cursor: pointer;
    }

    main {
        margin-top: 8rem;
        padding: 0 1rem;
    }
    main .recent-orders {
        position: relative;
        margin: 3rem 0 0 0;
        width: 100%;
    }
    main .recent-orders table {
        width: 100%;
        margin: 0;
    }
    right {
        width: 94%;
        margin: 0 auto 4rem;
    }

    .right .top {
        position: fixed;
        top: 0;
        left: 0;
        align-items: center;
        padding: 0 0.8rem;
        height: 4.6rem;
        background: var(--color-white);
        width: 100%;
        margin: 0;
        z-index: 2;
        box-shadow: 0 1rem 1rem var(--color-light);
    }
    .right .top .theme-toggler {
        display: none;
        /* width: 4.4rem;
        position: absolute;
        left: 74%; */
    }

    .right .profile .info {
        
        display: none;
    }
    .right .top button {
        display: inline-block;
        background: transparent;
        cursor: pointer;
        color: var(--color-dark);
        position: absolute;
        left: 1rem;
        font-size: 1rem;
    }
    /* .right .top button span {
        font-size: 2rem;
    } */
   
    .right .top .profile-photo1 {
        font-size: 39px;
        margin-right: 3vh;
        width: 100%;
        height: 4rem;
        border-radius: 50%;
        overflow: hidden;
   
    }
    main .date {
        display: inline-block;
        background: var(--color-light);
        border-radius: var(--border-radius-1);
        margin-top: 1rem;
        padding: 0.5rem 1.6rem;
        
    }

}







</style>
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
                
                <a href="viewStudent.php" >
                    <span class="material-icons-sharp">person_outline</span>
                    <h3>Students</h3>

                </a>

          
                
                <a href="viewDepartment.php">
                    <span class="material-icons-sharp">school</span>
                    <h3>Grade</h3>

                </a>
                <a href="viewCourses.php"  >
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
                <a href="#">
                    <span class="material-icons-sharp">logout</span>
                    <h3>Logout</h3>

                </a>
            </div>

            <!-- SIDE BAR NAVIGATION BAR -->

        </aside>
        





 <main>
    <!-- <h1>Dashboard</h1> -->
   

    <!-- DATE(CALENDER) -->
    <!-- <div class="date">
        <input type="date">
    </div> -->
      <!-- DATE(CALENDER) -->


      <div class="card-body">
                                       <div class="<?php echo $alertStyle;?>" role="alert"><?php echo $statusMsg;?></div>
                                        <form method="Post" action="">
                                            
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                      <label for="x_card_code" class="control-label mb-1">Dept. Sort</label>
                                                    <?php 
                                                $query=mysqli_query($con,"select * from tbllevel");                        
                                                $count = mysqli_num_rows($query);
                                                if($count > 0){                       
                                                    echo ' <select required name="levelId" class="custom-select form-control">';
                                                    echo'<option value="">--Select Dept. Sort--</option>';
                                                    while ($row = mysqli_fetch_array($query)) {
                                                    echo'<option value="'.$row['Id'].'" >'.$row['levelName'].'</option>';
                                                        }
                                                            echo '</select>';
                                                        }
                                                ?>   
                                                    </div>
                                                </div>
                                            <div class="col-6">
                                                <div class="form-group">
                                                     <label for="x_card_code" class="control-label mb-1">Acad. year</label>
                                                    <?php 
                                                    $query=mysqli_query($con,"select * from tblsession where isActive = 1");                        
                                                    $count = mysqli_num_rows($query);
                                                    if($count > 0){                       
                                                        echo ' <select required name="sessionId" class="custom-select form-control">';
                                                        echo'<option value="">--Select Academic Year--</option>';
                                                        while ($row = mysqli_fetch_array($query)) {
                                                        echo'<option value="'.$row['Id'].'" >'.$row['sessionName'].'</option>';
                                                            }
                                                                echo '</select>';
                                                            }
                                                ?>   
                                                </div>
                                            </div>
                                        </div>
                                         <div class="row">
                                                <div class="col-6">
                                                    <div class="form-group">
                                                    <label for="x_card_code" class="control-label mb-1">Dept.</label>
                                                    <?php 
                                                    $query=mysqli_query($con,"select * from tblfaculty ORDER BY facultyName ASC");                        
                                                    $count = mysqli_num_rows($query);
                                                    if($count > 0){                       
                                                        echo ' <select required name="facultyId" onchange="showValues(this.value)" class="custom-select form-control">';
                                                        echo'<option value="">--Select Department--</option>';
                                                        while ($row = mysqli_fetch_array($query)) {
                                                        echo'<option value="'.$row['Id'].'" >'.$row['facultyName'].'</option>';
                                                            }
                                                                echo '</select>';
                                                            }
                                                    ?>                                                     
                                                 </div>
                                                </div>
                                                 <div class="col-6">
                                                    <div class="form-group">
                                                   <?php
                                                        echo"<div id='txtHint'></div>";
                                                    ?>                                    
                                                 </div>
                                                </div>
                                             </div>
                                                <div>
												<!-- Log on to codeastro.com for more projects! -->
                                                <button type="submit" name="submit" class="gradient-button1" style="font-family: 'Poppins', sans-serif; text-decoration: underline; color:rgb(13, 13, 77); margin-top: 2vh; margin-bottom: 2vh;">View Student</button>
                                            </div>
                                        </form>
                                    </div>


   
            <div class="" style="margin-bottom:3vh;">
                <h2> Manage Results</h2>

                
                <div class="card-body">
                                <table id="example" class="display" style="width:100%">
                                     <thead>
                                        <tr><!-- Log on to codeastro.com for more projects! -->
                                            <th>#</th>
                                            <th>Student</th>
                                            <!-- <th>MatricNo</th> -->
                                            <!-- <th>Level</th> -->
                                            <!-- <th>Faculty</th> -->
                                            <th>Grade</th>
                                            <!-- <th>Session</th> -->
                                            <!-- <th>Date Added</th> -->
                                            <th>Manage</th>
                                            <th>View</th>
                                            <!-- <th>Second Semester</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                      
                            <?php
                if(isset($_POST['submit']))
                {

                    $levelId=$_POST['levelId'];
                    $sessionId=$_POST['sessionId'];
                    $departmentId=$_POST['departmentId'];
                    $facultyId=$_POST['facultyId'];

                    $ret=mysqli_query($con,"SELECT tblstudent.Id, tblstudent.firstName, tblstudent.lastName, tblstudent.otherName,tblstudent.matricNo,
                    tblstudent.dateCreated, tbllevel.levelName,tblfaculty.facultyName,tbldepartment.departmentName,tblsession.sessionName,
                    tblstudent.levelId,tblstudent.sessionId,tblstudent.facultyId,tblstudent.departmentId
                    from tblstudent
                    INNER JOIN tbllevel ON tbllevel.Id = tblstudent.levelId
                    INNER JOIN tblsession ON tblsession.Id = tblstudent.sessionId
                    INNER JOIN tblfaculty ON tblfaculty.Id = tblstudent.facultyId
                    INNER JOIN tbldepartment ON tbldepartment.Id = tblstudent.departmentId
                    where tblstudent.levelId ='$levelId' and tblstudent.sessionId ='$sessionId' 
                    and tblstudent.departmentId ='$departmentId' and tblstudent.facultyId ='$facultyId'");
                    $cnt=1;
                    while ($row=mysqli_fetch_array($ret)) {
                                        ?>
                    <tr>
                    <td><?php echo $cnt;?></td>
                    <td><?php  echo $row['firstName'].' '.$row['lastName'].' '.$row['otherName'];?></td>
                    <!-- <td><?php  echo $row['matricNo'];?></td> -->
                    <!-- <td><?php  echo $row['levelName'];?></td> -->
                    <!-- <td><?php  echo $row['facultyName'];?></td> -->
                    <td><?php  echo $row['departmentName'];?></td>
                     <!-- <td><?php  echo $row['sessionName'];?></td> -->
                    <!-- <td><?php  echo $row['dateCreated'];?></td> -->
                    <td>  <button class="gradient-button"><a href="manageResults.php?semesterId=1&matricNo=<?php echo $row['matricNo'];?>&levelId=<?php echo $row['levelId'];?>&facultyId=<?php echo $row['facultyId'];?>&departmentId=<?php echo $row['departmentId'];?>&sessionId=<?php echo $row['sessionId'];?>" title="Manage"><h3 style="font-family: 'Poppins', sans-serif; text-decoration: underline; color: whitesmoke;">Manage</h3></a> </button>
</td>
                    <td><a href="viewMan.php?semesterId=1&matricNo=<?php echo $row['matricNo'];?>&levelId=<?php echo $row['levelId'];?>&facultyId=<?php echo $row['facultyId'];?>&departmentId=<?php echo $row['departmentId'];?>&sessionId=<?php echo $row['sessionId'];?>" title="Edit Details"><i class="fa fa-eye fa-1x"></i> View </a></td> 
                    <!-- <td><a href="courseList.php?semesterId=2&matricNo=<?php echo $row['matricNo'];?>&levelId=<?php echo $row['levelId'];?>&facultyId=<?php echo $row['facultyId'];?>&departmentId=<?php echo $row['departmentId'];?>&sessionId=<?php echo $row['sessionId'];?>" title="Edit Details"><i class="fa fa-eye fa-1x"></i> View Course</a></td> --> 
                    </tr>
                    <?php 
                    $cnt=$cnt+1;
                    }
                }?>
                                                                               
                                </tbody>
                                </table>
                            </div>


















   
   
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

            <div class="recent-updates">
           
                <!-- <h2> <span  style="left: 300px;" class="material-icons-sharp">addition</span>New Subject</h2> -->
               
                <button style="margin-bottom: 2vh;" class="gradient-button1"><a href="computeResults.php"><h3 style="font-family: 'Poppins', sans-serif; text-decoration: underline;">Compute Results</h3></a> </button> <br>
                <button style="margin-bottom: 2vh; " class="gradient-button1"><a href="manageResultspage.php"><h3 style="font-family: 'Poppins', sans-serif; text-decoration: underline;">Manage Results</h3></a> </button> <br>
                <button class="gradient-button1"><a href="results.php"><h3 style="font-family: 'Poppins', sans-serif; text-decoration: underline;">Check Results</h3></a> </button>

            
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
    
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
      <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
      <script>
        	
new DataTable('#example');
      </script>
</body>
</html>











