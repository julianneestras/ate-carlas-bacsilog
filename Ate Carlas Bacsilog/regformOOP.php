<?php
session_start();
ob_start();

class RegFormCarla
{

     public function registration($u_Fname, $u_Lname, $Gender, $u_Birthday, $u_Age, $u_Address, $u_Phonenum, $u_Email,$u_Code,$u_Username,$u_Password)
     {  

        include('conn.php');


      $str1="SELECT Username from custinfo WHERE Username='$u_Username'";
      $results1=mysqli_query($conn,$str1);
    
   if((mysqli_num_rows($results1))>0) 
    {
            echo "<center><h3><script>alert('Sorry. This username is already registered !!');</script></h3></center>";
            
   }

   else{
        $registration = "INSERT INTO custinfo ". "(First_Name, Last_Name, Gender, 
            DOB, Age,PhoneNum, Address,Email, Username,Password,Vcode) ". 
           "VALUES('$u_Fname', '$u_Lname', '$Gender', '$u_Birthday' , '$u_Age', '$u_Phonenum',
           '$u_Address','$u_Email','$u_Username','$u_Password','$u_Code')";

        mysqli_select_db($conn, 'ecombacsilog');

            // EXECUTION OF QUERY AND VALIDATION CONFIRM PASSWOR
            if ($_POST["u_Password"] === $_POST['cnfpassword'])
               {
                    $retval = mysqli_query( $conn, $registration);


                          if(! $retval) 
                               {
                                    die('Could not enter data: ' . mysqli_error($conn));
                               }
                    return $registration; 
                    mysqli_close($conn);
               }
               else
               {
                echo "<center><h3><script>alert('Please input matching passwords!!');</script></h3></center>";
               }

            }
            
       }
} 
?>
