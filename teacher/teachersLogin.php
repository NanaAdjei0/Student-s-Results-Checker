<?php
   
    include('dbconnection.php');

    if(isset($_POST['login']))
    {
      $user_id = $_POST['user_id'];
      $username = $_POST['username'];
        $password = $_POST['password'];
        

        // Use prepared statements to prevent SQL injection
        $stmt = mysqli_prepare($con, "SELECT * FROM users WHERE username = ? AND password = ?");
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        // Check if there is a row with the provided credentials
        if (mysqli_stmt_num_rows($stmt) > 0)
        {
            // Fetch user data
            mysqli_stmt_bind_result($stmt, $username, $password); // Replace these with actual column names
            mysqli_stmt_fetch($stmt);
          
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $password;

            // Redirect to a dashboard or another page
            header("Location: ./dashboard.php");
            exit();
        }
        else
        {
            $errorMsg = "<div class='alert alert-danger' role='alert'>Invalid Username/Password!</div>";
        }

        // Close the prepared statement
        mysqli_stmt_close($stmt);
    }
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- poppins font  -->

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="./images/ava.jpeg" type="image/x-icon">
    <title>SBA || Almighty Vision Academy</title>
</head>
<body>


  <div class="container">
    <!-- <div style="display: flex; justify-content: center; align-items: center">
    <span class="material-symbols-outlined" style="font-size: 19px; padding: 10px 3px 11px 0; color: grey;"></span>
   </div> -->
  <div class="container" style=" justify-content: center; align-items: center; text-align: center; margin-top: 11vh;">
  <div style="display: flex; justify-content: center; align-items: center; margin-top: 2vh;">
    <img src="./images/logo.png" style="width: 45px; height: 40px; background-size: cover; object-fit: cover;" alt="">
    <div><h6 style="font-weight: 900; color: rgba(75, 75, 2 0) ; text-transform: uppercase; ">Students' Based Assessment </h6></div>
    <span class="material-symbols-outlined" style="font-size: 19px; padding: 10px 3px 11px 0; color: grey;"></span>
   </div>
   <div class="info">
            <h5 class="" style="color: crimson; font-weight: bolder; font-size: 19px; font-weight: 900; ">Teacher's Panel</h5>
            <p class="" style="font-size: 13px; color: lightgrey;">Log in with valid credentials below</p>
        </div>     <form method="POST">
            <div class="input-container">
                <input type="text" name="username" id="username" required>
                <label for="name">Email</label>
            </div>
            <div class="input-container">
                <input type="password" name="password" id="password" required>
                <label for="email">Password</label>
                <div style="justify-content: end; align-items: end; margin-left: 30vh;"><a href="forgotpassword.php"><p style="font-size: 11px;">Forgot Password?</p></a></div>
            </div>
            <button type="submit" name="login" style="font-family: 'Poppins', sans-serif;">SIGN IN</button>
        </form>
    </div>

   
<!-- </form> -->



        <!-- </div> -->

    


        <style>
body {
    font-family: 'Poppins', sans-serif;
}
          /* new style */


          /* Reset some default styles */

.logdetails{
    padding-right: 16vh;
}


/* Form styles */
form {
    display: flex;
    flex-direction: column;
    align-items: center;
}

.input-container {
    position: relative;
    margin-bottom: 20px;
}

input {
    margin: 0;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    width: 300px; /* Set a fixed width for the input field */
    outline: none;
}


/* Style for focused input field */
input:focus {
    border-color:black; /* Change border color when focused */
     /* Add a subtle box shadow on focus */
}

label {
    position: absolute;
    left: 10px;
    top: 12px;
    transition: all 0.3s ease;
    pointer-events: none;
    font-size: 14px;
}

/* Move label to the left when input is focused or has value */
input:focus + label,
input:valid + label {
    top: -10px;
    left: 5px;
    background-color: #fff;
    padding: 0 5px;
    font-size: 12px;
}

button {
    background: linear-gradient(to right, crimson,blue);
    width: 320px;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 13px;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: #333;
}





/* old style */
          

.tag {
  padding: 10px 10px;
 
}
.tag h6 {
  font-size: 12px;
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


@media only screen and (max-width: 600px) {
  /* .container {
    width: 90%; */
    /* margin: 2px auto; */

    /* display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  min-height: 70vh; */
  }

  .tag {
  padding: 10px 10px;
 
}
.tag h6 {
  font-size: 11px;
}
.tag img {
 width: 2px;
}
/* } */


/* Responsive adjustments using media queries */
@media (max-width: 768px) {
    input {
        width:  300px; /* Change the width to 100% for screens smaller than 768px */
    }
}







        </style>

  </div>
    
</body>
</html>