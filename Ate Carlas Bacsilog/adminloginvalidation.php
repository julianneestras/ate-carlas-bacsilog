<?php

 	  include('conn.php');
$login_error ="";

if(isset($_POST['login']))
   {
    $adminuname= $_POST['A_Username'];
    $adminpass= $_POST['A_Password'];

    function validate($input) 
    {
      $input = trim($input);
      $input = stripslashes($input);
      $input = htmlspecialchars($input);
      return $input;
    }

    $adminuname = validate($_POST['A_Username']);
    $adminpass = validate($_POST['A_Password']);
    $query=    "SELECT * FROM admintable WHERE Username='$adminuname' and Password='$adminpass'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);


    if($count == 1) 
    {
        echo '<script type ="text/JavaScript">';
          echo 'alert("Welcome! Login successful.")';
          echo '</script>';

       header("Location: admindashboard.php#dashboard");

    } 
    else if(empty($adminuname)) 
    {
   
       header("Location: adminlogin.php?error=Username is required");
       exit(); 

     } 
   else if(empty($adminpass)) 
   {
        header("Location: adminlogin.php?error=Password is required");
        exit();

    } 
    else 
    {
        header("Location: adminlogin.php?error=Username and password doesn't match");
        exit();
    }
    }
  

  

?>